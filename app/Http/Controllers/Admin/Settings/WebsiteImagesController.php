<?php

namespace App\Http\Controllers\Admin\Settings;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Settings\BasicInformationRequest;
use App\Http\Requests\Admin\Settings\WebsiteImageRequest;
use App\Models\GeneralSetting;
use App\Services\Setting\SettingServices;
use Exception;
use Log;

class WebsiteImagesController extends Controller
{

    public function __construct(private readonly SettingServices $settingServices)
    {
        $this->middleware('permission:settings');
    }

    public function index()
    {
        return view("admin.pages.settings.website-images")->with([
            "gs" => GeneralSetting::query()->first(),
        ]);
    }

    public function update(WebsiteImageRequest $request, $id)
    {
        try {

            $this->settingServices->updateWebsiteImage($request);

        } catch (Exception $exception) {

            Log::error($exception->getMessage());

            return back()->withInput()->with("error", $exception->getMessage());

        }

        return back()->with("success", __("Image Updated Successfully"));
    }
}
