<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Subcategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;
use Intervention\Image\Facades\Image;

use function PHPUnit\Framework\returnSelf;

class SubcategoryController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
        $subcategories = Subcategory::all();
        $categories = Category::all();
        return view('admin.category.subcategory.index', compact('subcategories', 'categories'));
    }
    public function subcategorystore(Request $request)
    {
        $validated = $request->validate([
            'subcategory_name' => 'required|max:20',
        ]);
        $slug = Str::slug($request->subcategory_name, '-');
        $subcategory = array();
        $subcategory['category_id'] = $request->category_id;
        $subcategory['subcategory_name'] = $request->subcategory_name;
        $subcategory['subcategory_slug'] = Str::slug($request->subcategory_name, '-');
        if ($request->subcategory_image) {
            $image = $request->subcategory_image;
            $image_name = $slug . '.' . $image->getClientOriginalExtension();
            Image::make($image)->resize(320, 240)->save(base_path('public/files/subcategory/' . $image_name));
            $subcategory['subcategory_image'] = $image_name;
        }
        DB::table('subcategories')->insert($subcategory);
        $notification = array('message' => 'Subcategory Added Successfully...', 'alert-type' => 'success');
        return redirect()->back()->with($notification);
    }
    public function subcategoryedit($id)
    {
        $subcategory = DB::table('subcategories')->find($id);
        $categories = Category::all();
        return view('admin.category.subcategory.edit', compact('subcategory', 'categories'));
    }
    public function subcategory_soft_delete($id)
    {
        Subcategory::find($id)->delete();
        return back();
    }
    public function subcategory_selected_restore_from_trash(Request $request)
    {
        switch ($request->input('action')) {
            case 'delete':
                foreach ($request->subcategory_id as $subcategory_id) {
                    Subcategory::onlyTrashed()->find($subcategory_id)->forceDelete();
                }
                $notification = array('message' => 'Selected Subcategory Delete...', 'alert-type' => 'warning');
                return redirect()->back()->with($notification);
                break;

            case 'restore':
                foreach ($request->subcategory_id as $subcategory_id) {
                    Subcategory::onlyTrashed()->find($subcategory_id)->restore();
                }
                $notification = array('message' => 'Selected Subcategory Restore...', 'alert-type' => 'warning');
                return redirect()->back()->with($notification);
                break;
        }
    }
    public function selected_subcategory_soft_delete(Request $request)
    {
       foreach ($request->subcategory_id as $subcategory_id) {
          Subcategory::find($subcategory_id)->delete();
       }
       return back();

    }
    public function subcategory_restore($id)
    {
        Subcategory::onlyTrashed()->find($id)->restore();
        return back();
    }


    // Subcategory::find()->delete();
    // $notification = array('message' => 'Subcategory Delete...', 'alert-type' => 'success');
    // return redirect()->back()->with($notification);

    public function subcategory_trash()
    {
        $trash_subcategories = Subcategory::onlyTrashed()->get();
        return view('admin.category.subcategory.trash', compact('trash_subcategories'));
    }

    public function subcategory_delete_from_trash($id)
    {
        $subcategory_photo=Subcategory::onlyTrashed()->find($id);
        if ($subcategory_photo->subcategory_image) {
            $delete_from = public_path('files/subcategory/'.$subcategory_photo->subcategory_image);
            unlink($delete_from);
        }
        Subcategory::onlyTrashed()->find($id)->forceDelete();
        $notification = array('message' => 'Subcategory Delete Successfully...', 'alert-type' => 'warning');
        return redirect()->back()->with($notification);
    }
    public function subcategoryupdate(Request $request)
    {
        $slug = Str::slug($request->subcategory_name, '-');
        $subcategory = array();
        $subcategory['category_id'] = $request->category_id;
        $subcategory['subcategory_name'] = $request->subcategory_name;
        $subcategory['subcategory_slug'] = Str::slug($request->subcategory_name, '-');
        if ($request->subcategory_image) {
            $image_name = $request->old_image;
            $image_path = public_path('public/files/subcategory/' . $image_name);
            if (file_exists($image_path)) {
                unlink($image_path);
            }
            $image = $request->subcategory_image;
            $image_name = $slug . '.' . $image->getClientOriginalExtension();
            Image::make($image)->resize(320, 240)->save(base_path('public/files/subcategory/' . $image_name));
            $subcategory['subcategory_image'] = $image_name;
            DB::table('subcategories')->where('id', $request->id)->update($subcategory);
            $notification = array('message' => 'Subcategory update Successfully...', 'alert-type' => 'success');
            return redirect()->back()->with($notification);
        } else {
            $subcategory['subcategory_image'] = $request->old_image;
            DB::table('subcategories')->where('id', $request->id)->update($subcategory);
            $notification = array('message' => 'Subcategory update Successfully...', 'alert-type' => 'success');
            return redirect()->back()->with($notification);
        }
    }
}
