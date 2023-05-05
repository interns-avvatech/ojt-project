<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Imports\DataUploadImport;
use App\Jobs\LocationPH;
use App\Jobs\ProcessCsvImport;
use App\Models\Currency;
use App\Models\DataUpload;
use App\Models\Order;
use App\Models\PaymentMethod;
use App\Models\PaymentStatus;
use App\Models\Setting;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Facades\Excel;

class InventoryController extends Controller
{
    //Inventory Table Function
    public function inventoryTable()
    {
        $condition = "";
        $value = "";

        $settings = Setting::with('paymentMethods', 'paymentStatus', 'currency')->first()->toArray();
        $settings['method'] =  PaymentMethod::get()->toArray();
        $settings['status'] =  PaymentStatus::get()->toArray();
        $settings['currency_option'] =  Currency::get(['id', 'currency_name', 'symbol'])->toArray();

        $inventories = DataUpload::with('product')->where('quantity', '>', 0)->get()->toArray();
        //   dd($inventories);

        return view('admin.inventory.inventory', ['inventories' => $inventories])
            ->with(compact('inventories', 'condition', 'value',  'settings'));
    }

    //Filter Inventory
    public function filterInventory(Request $request)
    {

        $condition = $request->input('filter');
        $value = $request->input('value');

        $settings = Setting::with('paymentMethods', 'paymentStatus', 'currency')->first()->toArray();
        $settings['method'] =  PaymentMethod::get()->toArray();
        $settings['status'] =  PaymentStatus::get()->toArray();
        $settings['currency_option'] =  Currency::get(['id', 'currency_name', 'symbol'])->toArray();

        if ($condition === "default") {
            $inventories = DataUpload::with('product')->where('quantity', '>', 0)->get()->toArray();
            return view('admin.inventory.inventory', ['inventories' => $inventories])
                ->with(compact('inventories', 'condition', 'value', 'settings'));
        } else if ($condition === "all") {
            $inventories = DataUpload::with('product')->orderby('quantity', 'desc')->get()->toArray();

            return view('admin.inventory.inventory')->with(compact('inventories', 'condition', 'value', 'settings'));
        } else {
            $inventories = DataUpload::with('product')->where('quantity', 0)->get()->toArray();
            return view('admin.inventory.inventory', ['inventories' => $inventories])
                ->with(compact('inventories', 'condition', 'value', 'settings'));
        }
    }

    //Sort Quantity Function
    public function sortQuantity(Request $request)
    {

        $condition = $request->input('condition');
        $value = $request->input('value');

        $query = DataUpload::orderBy("quantity")->get();
        $settings = Setting::with('paymentMethods', 'paymentStatus', 'currency')->first()->toArray();
        $settings['method'] =  PaymentMethod::get()->toArray();
        $settings['status'] =  PaymentStatus::get()->toArray();
        $settings['currency_option'] =  Currency::get(['id', 'currency_name', 'symbol'])->toArray();

        switch ($condition) {
            case '=':
                $query->where('quantity', '=', $value);
                $inventories = DataUpload::with('product')->where('quantity', '=', $value)->get()->toArray();
                return view('admin.inventory.inventory', ['inventories' => $inventories])
                    ->with(compact('inventories', 'condition', 'value', 'settings'));
            case '<':
                $query->where('quantity', '<', $value);
                $inventories = DataUpload::with('product')->where('quantity', '<', $value)->get()->toArray();
                return view('admin.inventory.inventory', ['inventories' => $inventories])
                    ->with(compact('inventories', 'condition', 'value', 'settings'));
            case '<=':
                $query->where('quantity', '<=', $value);
                $inventories = DataUpload::with('product')->where('quantity', '<=', $value)->get()->toArray();
                return view('admin.inventory.inventory', ['inventories' => $inventories])
                    ->with(compact('inventories', 'condition', 'value', 'settings'));
            case '>':
                $query->where('quantity', '>', $value);
                $inventories = DataUpload::with('product')->where('quantity', '>', $value)->get()->toArray();
                return view('admin.inventory.inventory', ['inventories' => $inventories])
                    ->with(compact('inventories', 'condition', 'value', 'settings'));
            case '>=':
                $query->where('quantity', '>=', $value);
                $inventories = DataUpload::with('product')->where('quantity', '>=', $value)->get()->toArray();
                return view('admin.inventory.inventory', ['inventories' => $inventories])
                    ->with(compact('inventories', 'condition', 'value', 'settings'));
            default:
                $inventories = DataUpload::with('product')->where('quantity', '>', 0)->get()->toArray();
                return view('admin.inventory.inventory', ['inventories' => $inventories])
                    ->with(compact('inventories', 'condition', 'value',  'settings'));
        }
    }

    //Import CSV
    public function importCsv(Request $request)
    {

        $request->validate([
            'file' => 'required|mimes:csv,text',
        ], [
            'file.required' => ['Required CSV File', 'Please double-check that you are submitting a CSV (Comma Separated Values) file before clicking submit. Any other file formats will not be accepted.'],
            'file.mimes' => ['The file must be a CSV', 'Please ensure that the file you upload is in CSV (Comma Separated Values) format. Only CSV files are accepted.'],
        ]);

        $path = $request->file('file')->getRealPath();
        $data = Excel::toArray(new DataUploadImport, $path)[0];

        ProcessCsvImport::dispatch($data);

        return redirect()->route('inventoryTable');
    }

    //Increment QTY
    public function up(Request $request, $id)
    {
        $csvOutput = DataUpload::find($id);

        if ($csvOutput) {
            $csvOutput->increment('quantity', 1);
        }

        if ($csvOutput->quantity === 0) {
            return $this->inventoryTable();
        } else {
            return redirect()->back();
        }
    }

    //Decrement QTY
    public function down(Request $request, $id)
    {
        $csvOutput = DataUpload::find($id);

        if ($csvOutput) {
            if ($csvOutput->quantity <= 0) {
                $csvOutput->quantity = 0;
            } else {
                $csvOutput->decrement('quantity', 1);
            }
        }
        return redirect()->back();
    }

    //Edit Price
    public function edit(Request $request, $id)
    {

        $csvOutput = DataUpload::find($id);
        $priceEach = $request->price_each;


        // Remove any non-numeric characters except decimal point
        $priceEach = preg_replace('/[^0-9\.]/', '', $priceEach);

        // Convert to float
        $priceEach = number_format(floatval($priceEach), 2, '.', '');

        $csvOutput->update(['price_each' => $priceEach]);
        return redirect()->back();
    }




    //Sold
    public function sold(Request $request, $id)
    {

        //SOLD POP UP STORED IN DATA TABLES OF 'Order'
        $csv = DataUpload::with('product')->find($id)->toArray();
        $order = Order::where('tcgplacer_id', $csv['product_id'])->first();


        // DataUpload::find($id)->update([
        //     'quantity' =>  (int)($csv['quantity']) -  (int)$request->quantity

        // ]);

        if ($order) {

            $order->qty += $request->quantity;
            $order->sold_price += $request->sold;
            $order->save();
            
        } else {

            $orders = new Order();
            $orders->sold_date = Carbon::now()->format('Y/m/d');
            $orders->sold_to = $request->name;
            $orders->card_name = $csv['product']['name'];
            $orders->set = $csv['product']['set_name'];
            $orders->finish = $csv['printing'];
            $orders->tcg_mid = $csv['price_each'];
            $orders->qty = $request->quantity;
            $orders->sold_price = $request->sold;
            $orders->ship_cost = $request->ship_cost;
            $orders->payment_status = $request->payment_status;
            $orders->payment_method = $request->payment_methods;
            $orders->tcgplacer_id = $csv['product_id'];
            $orders->ship_price = $request->ship_price;
            $orders->multiplier = $request->multiplier;
            $orders->multiplier_price = $request->multiplied_price;
            $orders->note = $request->note;
            $orders->product_id = $csv['id'];
            $orders->save();
        }



        return redirect()->route('sortQuantity')->with('success', 'Product updated');
    }

    //Delete Row
    public function delete($id)
    {
        $csv = DataUpload::find($id);
        $csv->delete();

        return redirect()->back()->with('sucess', 'Product deleted');
    }

    //Delete Selected Row
    public function deleteSelectInventory(Request $request)
    {

        $ids = $request->ids;
        $csv =  DataUpload::whereIn('id', explode(",", $ids));
        $csv->delete();

        return response()->json(['success' => "Order Deleted."]);
    }
}
