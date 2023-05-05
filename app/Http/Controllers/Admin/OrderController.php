<?php

namespace App\Http\Controllers\Admin;

use App\Models\Order;
use App\Models\Setting;
use App\Models\CheckOut;
use App\Models\Currency;
use App\Models\DataUpload;
use Illuminate\Http\Request;
use App\Models\PaymentMethod;
use App\Models\PaymentStatus;
use App\Http\Controllers\Controller;
use App\Http\Services\PSGCApi;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cache;
use Maatwebsite\Excel\Concerns\ToArray;

class OrderController extends Controller
{
    public function orders()
    {
        $settings = Setting::with('paymentMethods', 'paymentStatus', 'currency')->first()->toArray();
        $settings['method'] =  PaymentMethod::get()->toArray();
        $settings['status'] =  PaymentStatus::get()->toArray();
        $settings['currency_option'] =  Currency::get(['id', 'currency_name', 'symbol'])->toArray();

        $orders = Order::with('product')->get()->toArray();
        $modelWithAddress = collect($orders);
        // Check if locations data is in cache
        if (Cache::has('locations')) {
            $location = Cache::get('locations');
        } else {
            // If not in cache, fetch from API and store in cache for 1 day
            $api = new PSGCApi();
            $location = $api->getAllLocations();
            Cache::put('locations', $location, 1440);
        }

   
        
            
            // dd($location['municipalities']);

        return view('admin.orders.orders')->with(compact('orders', 'settings', 'location'));
    }

    public function getProvinces($regionCode)
    {
       
        $provinces = collect(Cache::get('locations')['provinces'])
            ->where('regionCode', $regionCode)
            ->toArray();
        return response()->json($provinces);
    }

    public function getMunicipalities($provinceCode)
    {
        $municipalities = collect(Cache::get('locations')['municipalities'])
            ->where('provinceCode', $provinceCode)
            ->toArray();
        return response()->json($municipalities);
    }

    public function getBarangays($municipalityCode)
    {
        $barangays = collect(Cache::get('locations')['barangays'])
            ->where('municipalityCode', $municipalityCode)
            ->toArray();
        return response()->json($barangays);
    }


    public function returnOrder($id, $tcgplacer_id)
    {

        $return_order = Order::with('product')->where('tcgplacer_id', (int)$tcgplacer_id)->get()->first()->toArray();


        // DataUpload::where('product_id', $tcgplacer_id)->update([
        //     'quantity' =>  (int)($return_order['qty']) + (int)($return_order['product']['quantity'])
        // ]);

        Order::where('id', $id)->delete();

        return redirect()->route('sortQuantity')->with('success', 'Order Deleted');
    }

    public function editOrder(Request $request, $id)
    {
        $order = Order::find($id)->update(['payment_status' => $request->payment_status]);

        return redirect()->back();
    }

    public function deleteSelectOrder(Request $request)
    {

        $ids = $request->ids;
        Order::whereIn('id', explode(",", $ids))->delete();
        return response()->json(['success' => "Order Deleted."]);
    }

    public function checkout(Request $request, $id)
    {
        $orders = Order::with('product')->get()->toArray();
        // dd($orders);
        // $checkouts = CheckOut::where('checkout_id', $id)->get()->toArray();
        // dd($checkouts);
        // $checkout = json_encode($orders);
        // // dd($checkout);
        // echo"<pre>";print_r($checkout);die;

        foreach ($orders as $order) {
            $dataUpload = DataUpload::find($order['product']['id']);
            $quantity = $dataUpload['quantity'] - $order['qty'];

            if ($quantity < 0) {

                return redirect()->back()->with('error', 'There is only ' . $order['product']['quantity'] . ' stocks available for the product of ' . $order['card_name']);
            }

            $dataUpload->update(['quantity' => $quantity]);
        }

        $checkoutId = uniqid();
        $checkouts = new CheckOut();
        $checkouts->checkout_id = $checkoutId;
        $checkouts->sold_to = $request->name;
        $checkouts->payment_method = $request->payment_methods;
        $checkouts->ship_cost = $request->ship_cost;
        $checkouts->ship_price = $request->ship_price;
        $checkouts->address = $request->address;
        $checkouts->note = $request->note;

        $checkouts->total = 0;
        foreach ($orders as $order) {
            $checkouts->total = floatVal($order['sold_price']) + $checkouts->total;
        }
        $checkouts->user_id  = Auth::user()->id;
        $checkouts->cart_contents  = json_encode($orders);
        $checkouts->save();

        foreach ($orders as $order) {
            Order::find($order['id'])->delete();
        }


        return redirect()->back();
    }


    //Increment QTY
    public function up(Request $request, $id)
    {
        $csvOutput = Order::find($id);

        if ($csvOutput) {
            $csvOutput->increment('qty', 1);
        }

        if ($csvOutput->quantity === 0) {
            return $this->orders();
        } else {
            return redirect()->back();
        }
    }

    //Decrement QTY
    public function down(Request $request, $id)
    {
        $csvOutput = Order::find($id);
        $csvOutput->decrement('qty', 1);
        // if ($csvOutput) {
        //     if ($csvOutput->quantity <= 0) {
        //         $csvOutput->quantity = 0;
        //     } else {
        //         $csvOutput->decrement('qty', 1);
        //     }
        // }
        return redirect()->back();
    }
}
