<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Intervention\Image\Facades\Image;

class BrandController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
        $brands=Brand::all();
        return view('admin.brand.index',compact('brands'));
    }
    public function brandstore(Request $request)
    {
        $slug=Str::slug($request->brand_name);
        $validated = $request->validate([
            'brand_name' => 'required|unique:brands|max:20',
        ]);
        $brand = array();
        $brand['brand_name'] = $request->brand_name;
        $brand['brand_slug'] = Str::slug($request->brand_name);
        if ($request->brand_image) {
            $image = $request->brand_image;
            $image_name = $slug . '.' . $image->getClientOriginalExtension();
            Image::make($image)->resize(320, 240)->save(base_path('public/files/brand/' . $image_name));
            $brand['brand_image'] = $image_name;
        }
        DB::table('brands')->insert($brand);
        $notification = array('message' => 'Brand Added Successfully...', 'alert-type' => 'success');
        return redirect()->back()->with($notification);
    }
    public function brandedit($id)
    {
        $brand = DB::table('brands')->where('id', $id)->first();
        return view('admin.brand.edit',compact('brand'));
    }
    public function brandupdate(Request $request)
    {
        $slug = Str::slug($request->brand_name);
        $brand = array();
        $brand['brand_name'] = $request->brand_name;
        $brand['brand_slug'] = Str::slug($request->brand_name);
        if ($request->brand_image) {
            $image_name = $request->old_image;
            $image_path = public_path('public/files/brand/' . $image_name);
            if (file_exists($image_path)) {
                unlink($image_path);
            }
            $image = $request->brand_image;
            $image_name = $slug . '.' . $image->getClientOriginalExtension();
            Image::make($image)->resize(320, 240)->save(base_path('public/files/brand/' . $image_name));
            $brand['brand_image'] = $image_name;
            DB::table('brands')->where('id', $request->id)->update($brand);
            $notification = array('message' => 'Brand update Successfully...', 'alert-type' => 'success');
            return redirect()->back()->with($notification);
        } else {
            $brand['brand_image'] = $request->old_image;
            DB::table('brands')->where('id', $request->id)->update($brand);
            $notification = array('message' => 'Brand update Successfully...', 'alert-type' => 'success');
            return redirect()->back()->with($notification);
        }
    }
    public function branddelete($id)
    {
        $brand = DB::table('brands')->where('id', $id)->first();
        $image_name = $brand->brand_image;
        if ($image_name) {
            $image_path = base_path('public/files/brand/' . $image_name);
            if (file_exists($image_path)) {
                unlink($image_path);
            }
        }
        DB::table('brands')->where('id', $id)->delete();
        $notification = array('message' => 'Brand Delete Successfully...', 'alert-type' => 'warning');
        return redirect()->back()->with($notification);
    }
}
