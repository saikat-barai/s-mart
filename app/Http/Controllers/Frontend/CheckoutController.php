<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use App\Mail\InvoiceMail;
use App\Models\Billing;
use App\Models\Cart;
use App\Models\City;
use App\Models\Inventory;
use App\Models\Order;
use App\Models\OrderProduct;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class CheckoutController extends Controller
{
    function checkout_store(Request $request)
    {
        $charge = 0;
        if ($request->delivery_charge == 1) {
            $charge = 70;
        } else {
            $charge = 100;
        }
        if ($request->payment_mathod == 1) {
            $order_id = '#' . random_int(10000000, 90000000);
            Order::insert([
                'order_id' => $order_id,
                'customer_id' => Auth::user()->id,
                'charge' => $charge,
                'subtotal' => $request->sub_total,
                'discount' => $request->discount,
                'total' => $request->total,
                'created_at' => Carbon::now(),
            ]);
            Billing::insert([
                'order_id' => $order_id,
                'customer_id' => Auth::user()->id,
                'fname' => $request->fname,
                'lname' => $request->lname,
                'email' => $request->email,
                'phone' => $request->phone,
                'country_id' => $request->country_id,
                'city_id' => $request->city_id,
                'zip' => $request->zip,
                'company_name' => $request->company_name,
                'address' => $request->address,
                'additional_info' => $request->additional_info,
                'created_at' => Carbon::now(),

            ]);
            $carts = Cart::where('customer_id', Auth::user()->id)->get();
            foreach ($carts as $cart) {
                OrderProduct::insert([
                    'order_id' => $order_id,
                    'customer_id' => Auth::user()->id,
                    'product_id' => $cart->product_id,
                    'color_id' => $cart->color_id,
                    'size_id' => $cart->size_id,
                    'quantity' => $cart->quantity,
                    'created_at' => Carbon::now(),
                ]);

                // sending mail 
                Mail::to($request->email)->send(new InvoiceMail($order_id));

                Inventory::where('product_id', $cart->product_id)->where('color_id', $cart->color_id)->where('size_id', $cart->size_id)->decrement('quantity', $cart->quantity);
                $cart->delete();
            }

            $notification = array('message' => 'Order Confirmed...', 'alert-type' => 'success');
            return redirect()->route('order.success')->with($notification);
        } 
        elseif ($request->payment_mathod == 2) {
            echo 'ssl';
        }
         else {
            echo 'stripe';
        }
    }

    function getcity(Request $request)
    {
        $str = '';
        $cities = City::where('country_id', $request->country_id)->get();
        foreach ($cities as $city) {
            $str .= '<option value="' . $city->id . '"> ' . $city->name . '</option>';
        }
        echo $str;
    }
}
