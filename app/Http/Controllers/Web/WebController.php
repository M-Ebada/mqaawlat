<?php

namespace App\Http\Controllers\Web;

use App\Helper\Helper;
use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Contact;
use App\Models\Gallery;
use App\Models\GeneralSetting;
use App\Models\HelpCenter;
use App\Models\Product;
use App\Models\Testmonial;
use App\Models\Topic;
use Exception;
use Log;
use Illuminate\Http\Request;

class WebController extends Controller
{
    public function index()
    {
        $categories = Category::query()->where('status', 1)->orderByDesc('id')->get();

        $reviews = Testmonial::query()->where('status' , 1)->get();

        $gs = Helper::getGeneral();

        $images = Gallery::query()->where('status',1)->latest()->take(10)->get();

        return view('web.pages.index')->with([
            'categories' => $categories,
            'reviews'    => $reviews,
            'gs'         => $gs,
            "gallery"     => $images
        ]);
    }

    public function services()
    {
        $categories = Category::query()->where('status', 1)->orderByDesc('id')->get();

        return view('web.pages.services')->with([
            'categories'    => $categories
        ]);
    }

    public function category($id)
    {
        $category = Category::query()->with('products')->where('status',1)->findOrFail($id);
        $gs = Helper::getGeneral();
        return view('web.pages.category')->with([
            'category'  => $category,
            'gs'    => $gs
        ]);
    }

    public function showService($slug)
    {
        $service = Product::query()->with('category')->where('status',1)->where('slug', $slug)->firstOrFail();
        $gs = Helper::getGeneral();
        $similars = Product::query()->where('status',1)->whereNotIn('id', [$service->id])->where('category_id',$service->category_id)->take(3)->get();
        return view('web.pages.service')->with([
            'service'   => $service,
            'gs'    => $gs,
            'similars'  => $similars
        ]);
    }

    public function about()
    {
        $gs = GeneralSetting::query()->first();
        $reviews = Testmonial::query()->where('status',1)->get();
        return view('web.pages.about', compact('reviews', 'gs'));
    }


    public function contact(){
        $gs = GeneralSetting::query()->first();
        return view('web.pages.contact',compact('gs'));
    }

    public function contactStore(Request $request)
    {
        $request->validate([
            'name'      => ['required' , 'string'],
            'mssg'      => ['required' , 'string']
        ]);

        try {

            Contact::query()->create([
                'name'  => $request->name,
                'email'  => $request->email,
                'whatsapp'  => $request->whatsapp,
                'mssg'  => $request->mssg,
            ]);

        } catch (Exception $exception) {

            Log::error($exception->getMessage());

            return back()->withInput()->with('error', $exception->getMessage());
        }

        return redirect()->route('web.thanks');

    }

    public function thanks()
    {
        return view('web.pages.thanks');
    }

    public function gallery()
    {
        $images = Gallery::query()->where('status',1)->latest()->get();
        return view('web.pages.gallery',compact('images'));
    }
    
}
