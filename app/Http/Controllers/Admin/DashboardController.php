<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Spatie\Activitylog\Models\Activity;

class DashboardController extends Controller
{
    public function dashboard()
    {
        $logs = Activity::get()->toArray();
        return view('admin.dashboard.logs')->with(compact('logs'));
    }
}
