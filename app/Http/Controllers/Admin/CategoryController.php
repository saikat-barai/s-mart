<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;
use Intervention\Image\Facades\Image;
use Laravel\Ui\Presets\React;

class CategoryController extends Controller
{
    protected static $category_image;
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
        $categories = Category::all();
        return view('admin.category.category.index', compact('categories'));
    }
    public function categorystore(Request $request)
    {
        $slug = Str::slug($request->category_name);
        $validated = $request->validate([
            'category_name' => 'required|unique:categories|max:20',
        ]);
        $category = array();
        $category['category_name'] = $request->category_name;
        $category['category_slug'] = Str::slug($request->category_name);
        if ($request->category_image) {
            $image = $request->category_image;
            $image_name = $slug . '.' . $image->getClientOriginalExtension();
            Image::make($image)->resize(320, 240)->save(base_path('public/files/category/' . $image_name));
            $category['category_image'] = $image_name;
        }
        DB::table('categories')->insert($category);
        $notification = array('message' => 'Category Added Successfully...', 'alert-type' => 'success');
        return redirect()->back()->with($notification);
    }
    public function categorydelete($id)
    {
        $category_photo = Category::onlyTrashed()->find($id);
        $delete_from = public_path('files/category/' . $category_photo->category_image);
        unlink($delete_from);
        Category::onlyTrashed()->find($id)->forceDelete();
        $notification = array('message' => 'Category Delete Successfully...', 'alert-type' => 'warning');
        return redirect()->back()->with($notification);
    }
    public function categoryedit($id)
    {
        $category = DB::table('categories')->where('id', $id)->first();
        return view('admin.category.category.edit', compact('category'));
    }
    public function categoryupdate(Request $request)
    {
        $slug = Str::slug($request->category_name);
        $category = array();
        $category['category_name'] = $request->category_name;
        $category['category_slug'] = Str::slug($request->category_name);
        if ($request->category_image) {
            $image_name = $request->old_image;
            $image_path = public_path('public/files/category/' . $image_name);
            if (file_exists($image_path)) {
                unlink($image_path);
            }
            $image = $request->category_image;
            $image_name = $slug . '.' . $image->getClientOriginalExtension();
            Image::make($image)->resize(320, 240)->save(base_path('public/files/category/' . $image_name));
            $category['category_image'] = $image_name;
            DB::table('categories')->where('id', $request->id)->update($category);
            $notification = array('message' => 'Category update Successfully...', 'alert-type' => 'success');
            return redirect()->back()->with($notification);
        } else {
            $category['category_image'] = $request->old_image;
            DB::table('categories')->where('id', $request->id)->update($category);
            $notification = array('message' => 'Category update Successfully...', 'alert-type' => 'success');
            return redirect()->back()->with($notification);
        }
    }

    public function category_soft_delete($id)
    {
        Category::find($id)->delete();
        return back();
    }
    public function category_trash()
    {
        $trash_categories = Category::onlyTrashed()->get();
        return view('admin.category.category.trash', ['trash_categories' => $trash_categories]);
    }
    public function selected_resotre_from_trash(Request $request)
    {
        switch ($request->input('action')) {
            case 'delete':
                foreach ($request->category_id as $category_id) {
                    Category::onlyTrashed()->find($category_id)->forceDelete();
                }
                $notification = array('message' => 'Selected Category Delete...', 'alert-type' => 'warning');
                return redirect()->back()->with($notification);
                break;

            case 'restore':
                foreach ($request->category_id as $category_id) {
                    Category::onlyTrashed()->find($category_id)->restore();
                }
                $notification = array('message' => 'Selected Category Restore...', 'alert-type' => 'warning');
                return redirect()->back()->with($notification);
                break;
        }
    }
    public function category_restore($id)
    {
        Category::onlyTrashed()->find($id)->restore();
        return back();
    }
    public function checked_delete(Request $request)
    {
        foreach ($request->category_id as $category_id) {
            Category::find($category_id)->delete();
        }
        return back();
    }
    public function checked_resotre(Request $request)
    {
        if ($request->category_id) {
            foreach ($request->category_id as $category_id) {
                Category::onlyTrashed()->find($category_id)->restore();
            }
        }
        return back();
    }
}
