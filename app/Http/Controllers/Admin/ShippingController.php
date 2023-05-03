<?php

namespace App\Http\Controllers\Admin;

use App\Models\CheckOut;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ShippingController extends Controller
{
    //
    public function shipping()
    {
        $checkouts = CheckOut::get()->toArray();

        // foreach ($checkouts as $checkout) {
        //     $checkout['cart_contents'] = json_decode($checkout['cart_contents'], true);
        // }
        // // dd($checkout);



        return view('admin.shipping.shipping', [
            'checkouts' => $checkouts,
        ]);
    }
}
