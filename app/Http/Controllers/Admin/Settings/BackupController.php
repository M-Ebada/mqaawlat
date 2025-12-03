<?php

namespace App\Http\Controllers\Admin\Settings;

use App\Http\Controllers\Controller;

class BackupController extends Controller
{
    public function index()
    {
        $this->middleware('permission:settings');
        return view("admin.pages.settings.backup");
    }
}
