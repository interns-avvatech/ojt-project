<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Http\Request;
use Xendit\Invoice;
use GuzzleHttp\Client;

class CheckoutController extends Controller
{
    //
    public function checkout(Request $request)
    {
        $orders = Order::with('product')->get()->toArray();
        // dd($orders[0]['set']);
        // dd($request->all());

        $data = '{
            "id": "579c8d61f23fa4ca35e52da4",
            "user_id": "5781d19b2e2385880609791c",
            "external_id": "demo_1475801962607",
            "status": "PENDING",
            "merchant_name": "Xendit",
            "merchant_profile_picture_url": "https://xnd-companies.s3.amazonaws.com/prod/1493610897264_473.png",
            "amount": 220000,
            "payer_email": "wildan@xendit.co",
            "description": "This is a description",
            "invoice_url": "https://invoice.xendit.co/web/invoices/595b6248c763ac05592e3eb4",
            "expiry_date": "2020-08-01T11:20:01.017Z",
            "available_banks": [
                {
                    "bank_code": "MANDIRI",
                    "collection_type": "POOL",
                    "transfer_amount": 50000,
                    "bank_branch": "Virtual Account",
                    "account_holder_name": "LANSUR13"
                },
                {
                    "bank_code": "BRI",
                    "collection_type": "POOL",
                    "transfer_amount": 50000,
                    "bank_branch": "Virtual Account",
                    "account_holder_name": "LANSUR13"
                },
                {
                    "bank_code": "BNI",
                    "collection_type": "POOL",
                    "transfer_amount": 50000,
                    "bank_branch": "Virtual Account",
                    "account_holder_name": "LANSUR13"
                }
            ],
            "available_retail_outlets": [
                {
                    "retail_outlet_name": "ALFAMART"
                }
            ],
            "available_paylaters": [
                {
                    "paylater_type": "AKULAKU"
                }
            ],
            "should_exclude_credit_card": false,
            "should_send_email": false,
            "created": "2020-01-12T14:00:00.306Z",
            "updated": "2020-01-12T14:00:00.306Z",
            "mid_label": "test-mid",
            "currency": "PHP",
            "fixed_va": true,
            "locale": "en",
            "customer": {
                "addresses": [
                    {
                        "city": "Jakarta Selatan",
                        "country": "Indonesia",
                        "postal_code": "12345",
                        "state": "Daerah Khusus Ibukota Jakarta",
                        "street_line1": "Jalan Makan",
                        "street_line2": "Kecamatan Kebayoran Baru"
                    }
                ],
                "email": "johndoe@example.com",
                "given_names": "John",
                "mobile_number": "+6287774441111",
                "surname": "Doe"
            },
            "items": [
                {
                    "name": "Emba Classic Appardo Two",
                    "quantity": 1,
                    "price": 200000,
                    "category": "Fashion",
                    "url": "https://yourcompany.com/example_item"
                }
            ],
            "fees": [
                {
                    "type": "ADMIN",
                    "value": 20000
                }
            ]
        }';

        // Set up the HTTP client
        $client = new Client([
            'headers' => [
                'Authorization' => 'Basic ' . base64_encode('xnd_development_PAtbDwxZXldNJafMc70Ax7fRpwHquLpwYA3yN1kKCW3Kr5iR41YVGzL8kAht08mT:'),
            ],
        ]);

        //Retrieve order details from the request
        $orderID = $orders[0]['set'];
        $amount = $orders[0]['sold_price'];
        $customerName = $request['name'];
        $shipPrice = $request['ship_price'];
        $shipCost = $request['ship_cost'];


        //create payment request
        $response = $client->post('https://api.xendit.co/v2/invoices', ['json'=> json_decode($data, true)]);

        // Get the invoice URL from the response
        $invoice = json_decode($response->getBody(), true);

        return redirect($invoice['invoice_url']);
    }
}
