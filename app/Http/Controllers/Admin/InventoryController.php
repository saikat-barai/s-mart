<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Color;
use App\Models\Inventory;
use App\Models\Product;
use App\Models\Size;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;

class InventoryController extends Controller
{
    // color and size 
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function color_size()
    {
        $colors=Color::all();
        $categories = Category::all();
        return view('admin.product.color_size', compact('colors', 'categories'));
    }
    public function color_store(Request $request)
    {
        Color::insert([
            'color_name'=>$request->color_name,
            'color_code'=>$request->color_code,
            'created_at'=>Carbon::now(),
        ]);
        $notification = array('message' => 'Color Added...', 'alert-type' => 'success');
        return redirect()->back()->with($notification);
    }
    public function color_delete($id)
    {
        Color::find($id)->delete();
        return back();
    }
    public function size_store(Request $request)
    {
        Size::insert([
            'category_id'=>$request->category_id,
            'size_name'=>$request->size_name,
            'created_at'=>Carbon::now(),
        ]);
        $notification = array('message' => 'Size Added...', 'alert-type' => 'success');
        return redirect()->back()->with($notification);
    }
    public function inventory($id)
    {
        $product_info = Product::find($id);
        $colors= Color::all();
        $inventories=Inventory::where('product_id', $id)->get();
        $sizes= Size::where('category_id', $product_info->category_id)->get();
        return view('admin.product.inventory', compact('product_info','colors', 'sizes', 'inventories'));
    }
    public function inventory_store(Request $request)
    {
        if (Inventory::where('product_id', $request->product_id)->where('color_id', $request->color_id)->where('size_id', $request->size_id)->exists()) {
            Inventory::where('product_id', $request->product_id)->where('color_id', $request->color_id)->where('size_id', $request->size_id)->increment('quantity', $request->quantity);
            $notification = array('message' => 'Inventory Added...', 'alert-type' => 'success');
            return redirect()->back()->with($notification);
        }
        else
        {
            Inventory::insert([
                'product_id'=>$request->product_id,
                'color_id'=>$request->color_id,
                'size_id'=>$request->size_id,
                'quantity'=>$request->quantity,
                'created_at'=>Carbon::now(),
            ]);
            $notification = array('message' => 'Inventory Added...', 'alert-type' => 'success');
            return redirect()->back()->with($notification);
        }
    }
}
