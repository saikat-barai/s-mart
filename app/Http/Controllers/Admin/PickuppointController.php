<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Pickuppoint;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PickuppointController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
        $pickuppoints=DB::table('pickuppoints')->get();
        return view('admin.pickup-point.pickup_point',compact('pickuppoints'));
    }
    public function pickuppointstore(Request $request)
    {
        $request->validate([
            'pickup_name' => 'required|max:20',
            'pickup_phone_one' => 'required|digits:11|numeric',
            'pickup_phone_two' => 'required|digits:11|numeric',
        ]);
        $pickuppoint = array();
        $pickuppoint['pickup_name']=$request->pickup_name;
        $pickuppoint['pickup_address']=$request->pickup_address;
        $pickuppoint['pickup_phone_one']=$request->pickup_phone_one;
        $pickuppoint['pickup_phone_two']=$request->pickup_phone_two;
        DB::table('pickuppoints')->insert($pickuppoint);
        $notification = array('message' => 'Pickup Point Added Successfully...', 'alert-type' => 'success');
        return redirect()->back()->with($notification);
    }
    public function pickuppointedit($id)
    {
        $pickuppoint=DB::table('pickuppoints')->where('id',$id)->first();
        return view('admin.pickup-point.pickup_point_edit',compact('pickuppoint'));
    }
    public function pickuppointupdate(Request $request)
    {
        $request->validate([
            'pickup_name' => 'required|alpha',
            'pickup_phone_one' => 'required|digits:11|numeric',
            'pickup_phone_two' => 'required|digits:11|numeric',
        ]);
        $pickuppoint = array();
        $pickuppoint['pickup_name']=$request->pickup_name;
        $pickuppoint['pickup_address']=$request->pickup_address;
        $pickuppoint['pickup_phone_one']=$request->pickup_phone_one;
        $pickuppoint['pickup_phone_two']=$request->pickup_phone_two;
        DB::table('pickuppoints')->where('id',$request->id)->update($pickuppoint);
        $notification = array('message' => 'Pickup Point Update Successfully...', 'alert-type' => 'success');
        return redirect()->back()->with($notification);
    }
    public function pickuppointdelete($id)
    {
        $pickuppoint=Pickuppoint::find($id);
        $pickuppoint->delete();
        $notification = array('message' => 'Pickup Point Delete...!!!', 'alert-type' => 'warning');
        return redirect()->back()->with($notification);
    }
}
