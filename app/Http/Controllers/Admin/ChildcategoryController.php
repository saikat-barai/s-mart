<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Childcategory;
use App\Models\Subcategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Intervention\Image\Facades\Image;

class ChildcategoryController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
        $categories=Category::all();
        $childcategories=Childcategory::all();
        return view('admin.category.childcategory.index', compact('categories','childcategories'));
    }
    public function childcategorystore(Request $request)
    {
        $slug = Str::slug($request->childcategory_name);
        $childcategory_name=$slug.'-'.random_int(10,10000);
        $subcategory=DB::table('subcategories')->where('id',$request->subcategory_id)->first(); 
        $default = DB::table('subcategories')->latest()->first();
        $childcategory=array();
        if ($request->subcategory_id) {
            $childcategory['category_id']=$subcategory->category_id;
        }
        else
        {
            $childcategory['category_id']=$default->category_id;
        }
        
        if ($request->subcategory_id) {
            $childcategory['subcategory_id']=$request->subcategory_id;
        }
        else
        {
            $childcategory['subcategory_id']=$default->id;
        }
        $childcategory['childcategory_name']=$request->childcategory_name;
        $childcategory['childcategory_slug']=Str::slug($request->childcategory_name);
        if ($request->childcategory_image) {
            $image = $request->childcategory_image;
            $extension=$image->extension();
            $image_name = $childcategory_name.'.'.$extension;
            Image::make($image)->resize(320, 240)->save(base_path('public/files/childcategory/' . $image_name));
            $childcategory['childcategory_image'] = $image_name;
        }
        DB::table('childcategories')->insert($childcategory);
        $notification = array('message' => 'Childcategory Added Successfully...', 'alert-type' => 'success');
        return redirect()->back()->with($notification);

    }
    public function childcategoryedit($id)
    {
        $childcategory=DB::table('childcategories')->where('id',$id)->first();
        $categories=Category::all();
        return view('admin.category.childcategory.edit',compact('categories','childcategory'));
    }
    public function childcategoryupdate(Request $request)
    {
        $slug = Str::slug($request->childcategory_name);
        $childcategory_name=$slug.'-'.random_int(10,10000);
        $subcategory=DB::table('subcategories')->where('id',$request->subcategory_id)->first(); 
        $default = DB::table('subcategories')->latest()->first();
        $childcategory=array();
        if ($request->subcategory_id) {
            $childcategory['category_id']=$subcategory->category_id;
        }
        else
        {
            $childcategory['category_id']=$default->category_id;
        }
        
        if ($request->subcategory_id) {
            $childcategory['subcategory_id']=$request->subcategory_id;
        }
        else
        {
            $childcategory['subcategory_id']=$default->id;
        }
        $childcategory['childcategory_name']=$request->childcategory_name;
        $childcategory['childcategory_slug']=Str::slug($request->childcategory_name);
        if ($request->childcategory_image) {
            $image_name = $request->old_image;
            $image_path = public_path('public/files/childcategory/' . $image_name);
            if (file_exists($image_path)) {
                unlink($image_path);
            }
            $image = $request->childcategory_image;
            $extension=$image->extension();
            $image_name = $childcategory_name.'.'.$extension;
            Image::make($image)->resize(320, 240)->save(base_path('public/files/childcategory/' . $image_name));
            $childcategory['childcategory_image'] = $image_name;
            DB::table('childcategories')->where('id', $request->id)->update($childcategory);
            $notification = array('message' => 'Childcategory update Successfully...', 'alert-type' => 'success');
            return redirect()->back()->with($notification);
        } else {
            $childcategory['childcategory_image'] = $request->old_image;
            DB::table('childcategories')->where('id', $request->id)->update($childcategory);
            $notification = array('message' => 'Childcategory update Successfully...', 'alert-type' => 'success');
            return redirect()->back()->with($notification);
        }
    }
    public function childcategory_soft_delete($id)
    {
        Childcategory::find($id)->delete();
        return back();
    }
    public function trash_childcategory()
    {
        $trash_childcategories=Childcategory::onlyTrashed()->get();
        return view('admin.category.childcategory.trash', compact('trash_childcategories'));
    }
    public function childcategory_restore($id)
    {
        Childcategory::onlyTrashed()->find($id)->restore();
        return back();
    }
    public function selected_from_trash(Request $request)
    {
        switch ($request->input('action')) {
            case 'delete':
                echo 'delete';
                break;

            case 'restore':
                echo 'restore';
                break;
            
        }
    }
}
