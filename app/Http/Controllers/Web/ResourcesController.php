<?php

namespace App\Http\Controllers\Web;

use App\Enums\CourseEnum;
use App\Enums\StatusEnum;
use App\Helper\Helper;
use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Course;
use App\Models\CourseProgress;
use Exception;
use Log;
use App\Models\User;
use App\Models\UserCourse;
use App\Models\Video;
use Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class ResourcesController extends Controller
{
    public function index()
    {
        $papers = Category::query()->where('status', 1)->where('type' , 'parent')->get();

        return view("front.pages.papers.index")->with([
            'papers'    => $papers
        ]);
    }

    public function module(Request $request, $parentId, $module)
    {
        $childs = Category::query()->where('type' , 'child')->where('status' , 1)->where('resource', $module)->where('category_id' , $parentId)->get();
        $category = Category::query()->where('status',1)->findOrFail($parentId);

        return view('front.pages.papers.show')->with([
            'childs'    => $childs,
            'category'  => $category,
            'module'    => $module
        ]);
    }

    public function courses(Request $request)
    {
        $courses = Course::query()
        ->whereHas('videos')
        ->where('status' , 1)
        ->when($request->filled('board') && strlen($request->board >= 1), function($q){
            $q->where('board' , request()->board);
        })
        ->when($request->filled('group') && strlen($request->group >= 1), function($q){
            $q->where('group' , request()->group);
        })
        ->when($request->filled('search'), function($q){
            $q->where('title','LIKE' , '%'.request()->search.'%');
        })
        ->paginate(12);
        return view('front.pages.courses.index')->with([
            'courses'   => $courses
        ]);
    }

    public function course(Request $request, $slug)
    {
        $course = Course::query()->with(['videos' , 'attachements'])->where('status', 1)->where('slug' , $slug)->firstOrFail();

        if(auth()->user()){
            $enrolled = UserCourse::query()->where('course_id' , $course->id)->where('user_id' , auth()->user()->id)->first();
            if($enrolled?->status == StatusEnum::APPROVED){
                // get current video

                foreach($course->videos as $video)
                {
                    $userPlayList = CourseProgress::query()->where('video_id', $video->id)->where('user_id' , auth()->user()->id)->where('course_id' , $course->id)->first();
                    if($userPlayList?->views ?? 0 < CourseEnum::MAXVIEWS || !$userPlayList){
                        // found
                        return redirect()->route('web.course.watch' , ['id' => $course->id , 'video_id' => $video->id]);
                    }
                }

                return view('front.pages.courses.course')->with([
                    'course'   => $course
                ]);
            }
        }

        return view('front.pages.courses.show')->with([
            'course'   => $course
        ]);
    }

    public function buy(Request $request, $id)
    {
        $course = Course::query()->where('status', 1)->findOrFail($id);
        return view('front.pages.courses.buy')->with([
            'course'    => $course,
            'video'     => null
        ]);
    }

    public function buyVideo(Request $request, $id)
    {
        $video = Video::query()->where('status', 1)->findOrFail($id);
        return view('front.pages.courses.buy')->with([
            'video'     => $video,
            'course'    => null
        ]);
    }

    public function buyStore(Request $request)
    {
        
        $user = null;
        if(auth()->user()){
            $user = auth()->user();
        }else{
            if($request->login == 1){
                $is_login = Auth::attempt(['email' => $request->email, 'password' => $request->password]);

                if (!$is_login) {
                    return back()->withErrors(['errors' => __('Email or password incorrect')]);
                }

                $user = Auth::user();
            }else{
                // create new account
                $user =  User::create([
                    'first_name' => $request->first_name,
                    'email' => $request->email,
                    'password' => Hash::make($request->password),
                    'country' => $request->country_id,
                ]);
        
                Auth::login($user);
            }
        }

        if($request->course_id){
            // check if user already enrolled to this course
            $userCourse = UserCourse::query()->where('user_id' , $user->id)->where('course_id', $request->course_id);
            if($userCourse->exists()){
                $userCourse->delete();
                //return back()->withErrors(['errors' => __('You have already enrolled or applied to this course')]);
            }
        }elseif($request->video_id)
        {
            $userCourse = UserCourse::query()->where('user_id' , $user->id)->where('video_id', $request->video_id);
            if($userCourse->exists()){
                $userCourse->delete();
                //return back()->withErrors(['errors' => __('You have already enrolled or applied to this session')]);
            }
        }
        
        // register user course
        $order = UserCourse::query()->create([
            'user_id'   => $user->id,
            'course_id'   => $request->course_id,
            'video_id'   => $request->video_id,
            'notes'     => $request->notes
        ]);
        
        if($request->course_id){
            CourseProgress::query()->where('course_id' , $request->course_id)->where('user_id' , auth()->user()->id)->delete();
        }elseif($request->video_id){
            CourseProgress::query()->where('video_id' , $request->video_id)->where('user_id' , auth()->user()->id)->delete();
        }

        if ($request->hasFile('file')) {
            $order->addMedia($request->file('file'))->toMediaCollection('file');
        }

        return redirect()->route('client.profile.my-courses', ['profile' => 'my-courses']);
    }

    public function viewVideo(Request $request, $courseId , $videoId)
    {
        $course = Course::query()->findOrFail($courseId);
        $video = Video::query()->findOrFail($videoId);

        // check if user bought whether the course or the session
        $videoEnrollment = UserCourse::query()->where('video_id' , $video->id)->where('user_id', auth()->user()->id)->where('status' , StatusEnum::APPROVED)->first();
        $firstTime = false;
        if($videoEnrollment){
            // check on course
            $videoProgress = CourseProgress::query()->where('user_id', auth()->user()?->id)->where('course_id' , $courseId)->where('video_id', $videoId)->first();
            if(!$videoProgress){
                $videoProgress = CourseProgress::query()->create([
                    'user_id'   => auth()->user()->id,
                    'course_id' => $course->id,
                    'video_id'  => $video->id,
                    'views'     => 1
                ]);
            }
            $firstTime = true;
        }else{
            // check if has bought the course
            $courseEnrollment = UserCourse::query()->where('course_id' , $course->id)->where('user_id', auth()->user()->id)->where('status' , StatusEnum::APPROVED)->first();
            if(!$courseEnrollment){
                return redirect()->route('web.course' , ['slug' => $course->slug]);
            }
        }

        $videoProgress = CourseProgress::query()->where('user_id', auth()->user()?->id)->where('course_id' , $courseId)->where('video_id', $videoId)->first();

        if(!$videoProgress){
            $videoProgress = CourseProgress::query()->create([
                'user_id'   => auth()->user()->id,
                'course_id' => $course->id,
                'video_id'  => $videoId,
                'views'     => 1
            ]);
        }else{
            if(!$firstTime){
                $videoProgress->update([
                    'views' => $videoProgress->views+1
                ]);
                $videoProgress->refresh();
            }
        }

        $isExpired = ($videoProgress->views > CourseEnum::MAXVIEWS) ? true : false;

        return view('front.pages.courses.course')->with([
            'video'         => $video,
            'is_expired'    => $isExpired,
            'course'        => $course
        ]);
    }

    

}
