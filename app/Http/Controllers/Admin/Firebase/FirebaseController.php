<?php

namespace App\Http\Controllers\Admin\Firebase;

use App\Http\Controllers\Controller;

class FirebaseController extends Controller
{
    public function __invoke()
    {
        return response()->view("global.sw_firebase")->header("Content-Type", "application/javascript");
    }
}
