<?php

namespace App\Http\Controllers\Admin\Settings;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Settings\BasicInformationRequest;
use App\Models\GeneralSetting;
use App\Models\Product;
use App\Services\Setting\SettingServices;
use Exception;
use Illuminate\Http\Request;
use Log;

class DesignController extends Controller
{

    public function __construct(private readonly SettingServices $settingServices)
    {
        $this->middleware('permission:settings');
    }

    public function index()
    {
        
        return view("admin.pages.settings.design")->with([
            "gs" => GeneralSetting::query()->first()
        ]);
    }

    public function update(Request $request, $id)
    {
        try {
            $this->settingServices->updateDesign($request);

        } catch (Exception $exception) {

            Log::error($exception->getMessage());

            return back()->with("error", $exception->getMessage());

        }

        return back()->with("success", __("Basic Information Updated Successfully"));
    }

    public function homepage(Request $request)
    {
        try {

            $this->settingServices->updateHomepage($request);

        } catch (Exception $exception) {


            Log::error($exception->getMessage());

            return back()->with("error", $exception->getMessage());

        }

        return back()->with("success", __("Basic Information Updated Successfully"));
    }
}
