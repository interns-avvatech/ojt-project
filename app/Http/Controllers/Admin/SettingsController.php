<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Currency;
use App\Models\PaymentMethod;
use App\Models\PaymentStatus;
use App\Models\Setting;
use Illuminate\Http\Request;

class SettingsController extends Controller
{
    // Show the settings form
    public function settings(Request $request, $id = null)
    {
        if ($request->isMethod('post')) {
            // dd($request);
            $settings =  Setting::find($id);
            $settings->update([
                'multiplier_default' => $request->multiplier_default,
                'multiplier_cost' => $request->multiplier_cost,
                'tcg_low' => $request->tcg_low,
                'tcg_mid' => $request->tcg_mid,
                'tcg_high' => $request->tcg_high,
                'sold_price' => $request->sold_price,
                'estimated_card_cost' => $request->estimated_card_cost,
                'ship_cost' => $request->ship_cost,
                'ship_price' => $request->ship_price,

            ]);
            return redirect()->back();
        }


        $settings = Setting::with('paymentMethods', 'paymentStatus', 'currency')->first()->toArray();
        $settings['method'] =  PaymentMethod::get()->toArray();
        $settings['status'] =  PaymentStatus::get()->toArray();
        $settings['currency_option'] =  Currency::get(['id', 'currency_name', 'symbol'])->toArray();
        // dd($settings);
        return view('admin.settings.settings')->with(compact('settings'));
    }

    public function addCurrency(Request $request)
    {
        Currency::create([
            'currency_name' => $request->currency_name,
            'symbol' => $request->symbol,
        ]);

        return redirect()->back();
    }

    public function addMethod(Request $request)
    {
        PaymentMethod::create([
            'method' => $request->payment_method,
        ]);

        return redirect()->back();
    }
}
