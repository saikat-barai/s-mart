<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Warehouse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class WarehouseController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
        $warehouses = Warehouse::all();
        return view('admin.warehouse.index', compact('warehouses'));
    }
    public function warehousestore(Request $request)
    {
        $request->validate([
            'warehouse_name' => 'required|max:20',
            'warehouse_phone' => 'required|digits:11|numeric',
        ]);
        $warehouse = array();
        $warehouse['warehouse_name']=$request->warehouse_name;
        $warehouse['warehouse_address']=$request->warehouse_address;
        $warehouse['warehouse_phone']=$request->warehouse_phone;
        DB::table('warehouses')->insert($warehouse);
        $notification = array('message' => 'Warehouse Added Successfully...', 'alert-type' => 'success');
        return redirect()->back()->with($notification);
    }
    public function warehouseedit($id)
    {
        $warehouse=Db::table('warehouses')->where('id',$id)->first();
        return view('admin.warehouse.edit', compact('warehouse'));
    }
    public function warehouseupdate(Request $request)
    {
        $request->validate([
            'warehouse_name' => 'required|max:20',
            'warehouse_phone' => 'required|digits:11|numeric',
        ]);
        $warehouse = array();
        $warehouse['warehouse_name']=$request->warehouse_name;
        $warehouse['warehouse_address']=$request->warehouse_address;
        $warehouse['warehouse_phone']=$request->warehouse_phone;
        DB::table('warehouses')->where('id', $request->id)->update($warehouse);
        $notification = array('message' => 'Warehouse Updated Successfully...', 'alert-type' => 'success');
        return redirect()->back()->with($notification);
    }
    public function warehousedelete($id)
    {
        DB::table('warehouses')->where('id', $id)->delete();
        $notification = array('message' => 'Warehouse Delete Successfully...', 'alert-type' => 'warning');
        return redirect()->back()->with($notification);
    }
    
}
