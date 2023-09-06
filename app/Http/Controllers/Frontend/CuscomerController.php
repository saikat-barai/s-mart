<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Intervention\Image\Facades\Image;

class CuscomerController extends Controller
{
    function customer_profile()
    {
        return view('frontend.customer.profile');
    }
    function customer_profile_update(Request $request){
        if ($request->image == '') {
            User::find(Auth::user()->id)->update([
                'name'=>$request->name,
                'email'=>$request->email,
                'phone'=>$request->phone,
                'address'=>$request->address,
            ]);
            return back();
        } else {
            $img = $request->image;
            $extension = $img->extension();
            $file_name = Auth::user()->id.'.'.$extension;
            if (Auth::user()->image == 'null') {
               Image::make($img)->save(public_path('public/files/customer/'.$file_name));
               User::find(Auth::user()->id)->update([
                'name'=>$request->name,
                'email'=>$request->email,
                'phone'=>$request->phone,
                'address'=>$request->address,
                'image'=>$file_name,
            ]);
            return back();
            } else {
                $current = public_path('public/files/customer/'.Auth::user()->image);
                unlink($current);
                Image::make($img)->save(public_path('public/files/customer/'.$file_name));
               User::find(Auth::user()->id)->update([
                'name'=>$request->name,
                'email'=>$request->email,
                'phone'=>$request->phone,
                'address'=>$request->address,
                'image'=>$file_name,
            ]);
            return back();
            }
            
        }
        
    }

    function customer_password_change()
    {
        return view('frontend.customer.password_change');
    }
    function customer_password_update(Request $request){

        
        if (Hash::check($request->current_password, Auth::user()->password)) {
            
            User::find(Auth::user()->id)->update([
                'password'=>$request->password,
            ]);
            return redirect()->back()->with('password_update', 'Password has been changed...!');
        } else {
           return redirect()->back()->with('password_error', 'Current Password Not Match...!');
        }
        
    }
}
