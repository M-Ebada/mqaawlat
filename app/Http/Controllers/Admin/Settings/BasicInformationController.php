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

class BasicInformationController extends Controller
{

    public function __construct(private readonly SettingServices $settingServices)
    {
        $this->middleware('permission:settings');
    }

    public function index()
    {
        $products = Product::query()->get();
        return view("admin.pages.settings.basic-information")->with([
            "gs" => GeneralSetting::query()->first(),
            'products'  => $products
        ]);
    }
    public function privacy()
    {
        return view("admin.pages.settings.privacy")->with([
            "gs" => GeneralSetting::query()->first()
        ]);
    }

    public function privacyStore(Request $request)
    {
        $gs = GeneralSetting::query()->first();
        $gs->update([
            'privacy'   => $request->privacy
        ]);

        return back()->with("success", __("Privacy Page Updated Successfully"));
    }

    public function update(BasicInformationRequest $request, $id)
    {
        try {

            $this->settingServices->updateBasicInformation($request);

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
