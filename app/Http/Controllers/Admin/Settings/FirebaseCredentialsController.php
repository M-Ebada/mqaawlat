<?php

namespace App\Http\Controllers\Admin\Settings;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Settings\BasicInformationRequest;
use App\Http\Requests\Admin\Settings\FirebaseCredentialsRequest;
use App\Models\GeneralSetting;
use App\Services\Setting\SettingServices;
use Exception;
use Log;

class FirebaseCredentialsController extends Controller
{
    public function __construct(private readonly SettingServices $settingServices)
    {
        $this->middleware('permission:settings');
    }

    public function index()
    {
        return view("admin.pages.settings.firebase-credentials")->with([
            "gs" => GeneralSetting::query()->first(),
        ]);
    }

    public function update(FirebaseCredentialsRequest $request, $id)
    {
        try {

            $this->settingServices->updateFirebaseCredentials($request);

        } catch (Exception $exception) {

            Log::error($exception->getMessage());

            return back()->withInput()->with("error", $exception->getMessage());

        }

        return back()->with("success", __("Firebase Credentials Updated Successfully"));
    }

}
