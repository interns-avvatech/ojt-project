<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ShippingController extends Controller
{
    //
    public function shipping(){
        return view('admin.shipping.shipping');
    }
}
