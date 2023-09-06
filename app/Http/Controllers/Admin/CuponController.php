<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Coupon;
use Carbon\Carbon;
use Illuminate\Http\Request;

class CuponController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    function coupon(){
        $coupons = Coupon::all();
        return view('admin.coupon.coupon', compact('coupons'));
    }
    function coupon_add(Request $request){
        Coupon::insert([
            'coupon_name' => $request->coupon_name,
            'type' => $request->coupon_type,
            'amount' => $request->coupon_ammount,
            'validity' => $request->coupon_validity,
            'created_at' =>Carbon::now(),
        ]);
        $notification = array('message' => 'Coupon Added...', 'alert-type' => 'success');
        return redirect()->back()->with($notification);
    }
    function coupon_delete($id){
        Coupon::find($id)->delete();
        $notification = array('message' => 'Coupon Delete...', 'alert-type' => 'warning');
        return redirect()->back()->with($notification);
    }
}
