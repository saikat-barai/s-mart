<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use App\Models\Category;
use App\Models\Childcategory;
use App\Models\Product;
use App\Models\Subcategory;
use App\Models\Thumbnail;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
use Intervention\Image\Facades\Image;

class ProductController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function add_product()
    {
        $categories=Category::all();
        $subcategories = Subcategory::all();
        $childcategories=Childcategory::all();
        $brands=Brand::all();
        return view('admin.product.add_product', compact('categories', 'subcategories', 'brands', 'childcategories'));
    }
    public function product_store(Request $request)
    {
        
        $category_name=Category::where('id',$request->category_id)->first()->category_name;
        $sku = Str::upper(substr($category_name, 0, 3)).'-'. random_int(10000,1000000);
        $slug=Str::lower(str_replace(' ','-',$request->product_name)).random_int(10000,1000000);
        $image_name=Str::lower(str_replace(' ','-',$request->product_name)).random_int(1000,10000);

        $preview=$request->preview;
        $extension=$preview->extension();
        $preview_name=$image_name.'.'.$extension;
        Image::make($preview)->resize(800,960)->save(public_path('files/product/preview/'.$preview_name));


       $product_id= Product::insertGetId([
            'added_by'=> Auth::id(),
            'category_id'=>$request->category_id,
            'subcategory_id'=>$request->subcategory_id,
            'childcategory_id'=>$request->childcategory_id,
            'brand_id'=>$request->brand_id,
            'product_name'=>$request->product_name,
            'price'=>$request->price,
            'discount_price'=>$request->discount_price,
            'after_discount_price'=>$request->price-$request->price*$request->discount_price/100,
            'sku'=>$sku,
            'slug'=>$slug,
            'tags'=>$request->tags,
            'short_description'=>$request->short_description,
            'long_description'=>$request->long_description,
            'additional_information'=>$request->additional_information,
            'preview'=>$preview_name,
            'created_at'=>Carbon::now(),
        ]);
        $thumbnails = $request->images;
        foreach ($thumbnails as $thumbnail) {
           $thumbnail_extension=$thumbnail->extension();
           $image_name=Str::lower(str_replace(' ','-',$request->product_name)).random_int(1000,10000).'.'.$thumbnail_extension;
           Image::make($thumbnail)->resize(800,960)->save(public_path('files/product/thumbnail/'.$image_name));
           Thumbnail::insert([
            'added_id'=>Auth::id(),
            'product_id'=>$product_id,
            'thumbnail'=>$image_name,
            'created_at'=>Carbon::now(),
           ]);

        }
        $notification = array('message' => 'Product Insert Successfully...', 'alert-type' => 'success');
        return redirect()->back()->with($notification);
    }
    public function manage_product()
    {
        $products=Product::all();
        return view('admin.product.manage_product', compact('products'));
    }
    public function delete_product($id)
    {
        $product_preview= Product::find($id)->first()->preview;

       $product_thumbnails = Thumbnail::where('product_id', $id)->get();
       
       

    }


    // ajax getchildcategory
    public function getsubcategory(Request $request)
    {
       $opt='<option value="">Select A Subcategory</option>';
       $subcategories= Subcategory::where('category_id', $request->category_id)->get();
       foreach ($subcategories as $subcategory) {
         $opt .= '<option value="'.$subcategory->id.'">'.$subcategory->subcategory_name.'</option>';
       }
       echo $opt;
    }

    // ajax get getchildcategory
    public function getchildcategory(Request $request)
    {
        $opt='<option value="">Select A ChildCategory</option>';
       $childcategories= Childcategory::where('subcategory_id', $request->subcategory_id)->get();
       foreach ($childcategories as $childcategory) {
         $opt .= '<option value="">'.$childcategory->childcategory_name.'</option>';
       }
       echo $opt;
    }

}
