<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AdminPanelController extends Controller
{
    //
    public function adminPanel(){
        return view('admin.admin-panel.admin-panel');
    }
}
