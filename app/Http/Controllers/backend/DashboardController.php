<?php

namespace App\Http\Controllers\backend;

use App\Setting;
use Illuminate\Http\Request;

class DashboardController extends BackendController
{
    public function index(){
        $Setting = Setting::all();
        $SettingCount = Setting::count();
        return view("layouts.dashboard",compact("Setting","SettingCount"));
    }
}
