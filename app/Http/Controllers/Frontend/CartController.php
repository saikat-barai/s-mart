<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Cart;
use App\Models\Inventory;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    function add_to_card(Request $request){
       
        $quantity = Inventory::where('product_id', $request->product_id)->where('color_id', $request->color_id)->first()->quantity;
        if ($quantity <= $request->qty1) {
           return redirect()->back()->with('stockout', $quantity);
        }
        if (Cart::where('customer_id', Auth::user()->id)->where('product_id', $request->product_id)->where('color_id', $request->color_id)->exists()) {
            Cart::where('customer_id', Auth::user()->id)->where('product_id', $request->product_id)->where('color_id', $request->color_id)->increment('quantity', $request->qty1);
            return redirect()->back()->with('cart-success', 'Cart Added Successfull...');
        } 
        else {
            Cart::insert([
                'customer_id' => Auth::user()->id,
                'product_id' => $request->product_id,
                'color_id' => $request->color_id,
                'size_id' => $request->size_id,
                'quantity' => $request->qty1,
                'created_at' =>Carbon::now(),
            ]);
            return redirect()->back()->with('cart-success', 'Cart Added Successfull...');
        }  
    }
    function cart_update(Request $request){
        foreach ($request->qty0 as $cart_id => $quantity) {
             Cart::find($cart_id)->update([
                'quantity' => $quantity,
            ]);
        }
        return back();
       
    }
    function cart_delete($id){
        Cart::find($id)->delete();
        return back();
    }
}
