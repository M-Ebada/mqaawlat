<?php

namespace App\Http\Controllers\Admin\Profile;

use App\Http\Controllers\Controller;
use Auth;

class MeController extends Controller
{
    public function __invoke()
    {
        return $this->sendSuccessResponse(Auth::user());
    }
}
