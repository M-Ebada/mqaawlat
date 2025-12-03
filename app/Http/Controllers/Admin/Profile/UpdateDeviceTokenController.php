<?php

namespace App\Http\Controllers\Admin\Profile;

use App\Http\Controllers\Controller;
use Auth;
use Illuminate\Http\Request;

class UpdateDeviceTokenController extends Controller
{
    public function __invoke(Request $request)
    {
        $this->validate($request, [
            "device_token" => "required|string"
        ]);

        Auth::user()->update([
            "device_token" => $request->device_token
        ]);

        return $this::sendSuccessResponse([], __("Device Token Updated Successfully"));

    }
}
