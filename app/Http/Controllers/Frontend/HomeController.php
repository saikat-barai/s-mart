<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Cart;
use App\Models\Category;
use App\Models\City;
use App\Models\Country;
use App\Models\Coupon;
use App\Models\Inventory;
use App\Models\Product;
use App\Models\Subcategory;
use App\Models\Thumbnail;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }
    function index()
    {
        $categories = Category::all();
        // start for finding subcategory with Fashion category
        $fashion = Category::where('category_name', 'Fashion')->first();
        $fashion_subs = Subcategory::where('category_id', $fashion->id)->get();
        // end for finding subcategory with Fashion category
        return view('frontend.home.home', compact('categories', 'fashion_subs'));
    }
    function product_details($slug)
    {
        $product = Product::where('slug', $slug)->get();
        $product_id = $product->first()->id;
        $product_details = Product::find($product_id);
        $thumbnails = Thumbnail::where('product_id', $product_id)->get();
        $related_products = Product::where('subcategory_id', $product_details->subcategory_id)->where('id', '!=', $product_id)->get();
        $colors = Inventory::where('product_id', $product_id)->groupBy('color_id')->selectRaw('count(*) as total, color_id')->get();
        $sizes = Inventory::where('product_id', $product_id)->groupBy('size_id')->selectRaw('count(*) as total, size_id')->get();
        $product_quantity = Inventory::where('product_id', $product_id)->get();
        return view('frontend.details.product_details', compact('product_details', 'thumbnails', 'related_products', 'colors', 'sizes','product_quantity'));
    }



    function cart(Request $request)
    {
        $carts = Cart::where('customer_id', Auth::user()->id)->get();


        $coupon_information = Coupon::where('coupon_name', $request->coupon)->get();
        $type = '';
        $amount = '0';
        $message = '';
        if ($request->coupon != '') {
            if (Coupon::where('coupon_name', $request->coupon)->exists()) {
                if (Carbon::now()->format('Y-m-d') > $coupon_information->first()->validity) {
                    $amount = 0;
                    $message = 'Coupon Code Already Expired';
                } else {
                    $amount = $coupon_information->first()->amount;
                    $type = $coupon_information->first()->type;
                    $message = 'Coupon Apply...!!!';
                }
            } else {
                $amount = 0;
                $message = 'Invalid Coupon Code';
            }
        }

        return view('frontend.cart.cart', compact('carts', 'amount', 'message', 'type'));
    }


    function checkout()
    {
        $countries = Country::all();
        $cities = City::all();
        // return $countries;
        return view('frontend.checkout.checkout', compact('countries','cities'));
    }



    function order_success(){
        return view('frontend.order.order_success');
    }

    function customer_login()
    {
        return view('frontend.login.customer_login');
    }
    function customer_login_form(Request $request)
    {
        $validated = $request->validate([
            'email' => 'required|email',
            'password' => 'required |min:8',
        ]);
        if (auth()->attempt(array('email' => $request->email, 'password' => $request->password))) {
            if (auth()->user()->is_admin == 1) {
                $notification = array('message' => 'You Are Logged In...!', 'alert-type' => 'success');
                return redirect()->route('admin-home')->with($notification);
            }
            return redirect()->route('/');
        }
        return redirect()->back()->with('error', 'Invalid Email Or Password');
    }
    function customer_logout()
    {
        Auth::logout();
        $notification = array('message' => 'You Are Logged Out...!', 'alert-type' => 'warning');
        // return "Logout Successfully";
        return redirect()->route('/')->with($notification);
    }
}
