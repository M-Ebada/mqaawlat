<?php

namespace App\Http\Controllers\Admin\Profile;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Profile\PasswordRequest;
use App\Services\Admin\AdminProfileService;
use Exception;
use Log;

class PasswordController extends Controller
{

    public function __construct(
        private readonly AdminProfileService $adminProfileService
    )
    {
    }

    public function __invoke(PasswordRequest $request)
    {

        try {

            $this->adminProfileService->updateAdminPassword($request);

        } catch (Exception $exception) {

            Log::error($exception->getMessage());

            return back()->withInput()->with("error", $exception->getMessage());

        }

        return back()->with("success", __("Password Updated Successfully"));

    }
}
