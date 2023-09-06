<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Subcategory;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $categories = Category::all();
        // start for finding subcategory with Fashion category
        $fashion = Category::where('category_name', 'Fashion')->first();
        $fashion_subs = Subcategory::where('category_id', $fashion->id)->get();
        // end for finding subcategory with Fashion category
        return view('frontend.home.home', compact('categories', 'fashion_subs'));
    }
    
}
