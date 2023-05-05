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
use Illuminate\Support\Facades\Auth;
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


        // dd($orders);
        return view('admin.orders.orders', [
            'orders' => $orders, 'settings' => $settings,
        ]);

        // return view('orders')->with(compact('orders'));
    }

    public function returnOrder($id, $tcgplacer_id)
    {

        $return_order = Order::with('product')->where('tcgplacer_id', (int)$tcgplacer_id)->get()->first()->toArray();


        DataUpload::where('product_id', $tcgplacer_id)->update([
            'quantity' =>  (int)($return_order['qty']) + (int)($return_order['product']['quantity'])
        ]);

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
}
