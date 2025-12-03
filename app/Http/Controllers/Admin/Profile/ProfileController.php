<?php

namespace App\Http\Controllers\Admin\Profile;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Profile\ProfileRequest;
use App\Services\Admin\AdminProfileService;
use Exception;
use Illuminate\Http\Request;
use Log;

class ProfileController extends Controller
{

    public function __construct(
        private readonly AdminProfileService $adminProfileService
    )
    {
    }

    public function index()
    {
        return view("admin.pages.profile.index");
    }

    public function update(ProfileRequest $request)
    {
        try {

            $this->adminProfileService->updateAdminProfile($request);

        } catch (Exception $exception) {

            Log::error($exception->getMessage());

            return back()->withInput()->with("error", $exception->getMessage());

        }

        return back()->with("success", __("Profile Updated Successfully"));
    }
}
