<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Intervention\Image\Facades\Image;

class AdminController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
        return view('admin.profile.index');
    }
    public function profileupdate(Request $request)
    {

        $request->validate([
            'profile_photo'    => 'required',
        ]);
        $name = $request->name;
        $profile = array();
        $profile['name'] = $request->name;
        $profile['email'] = $request->email;
        if (Auth::user()->profile_photo != NULL) {
            $profile_photo= base_path('public/files/profile/'.Auth::user()->profile_photo);
            if (file_exists($profile_photo)) {
             unlink($profile_photo);
         }
            $photo=$request->profile_photo;
            $extension=$photo->extension();
            $photo_name=Auth::user()->name.'.'.$extension;
            Image::make($photo)->save(base_path('public/files/profile/'.$photo_name));
            $profile['profile_photo'] = $photo_name;
         }
         else{
             $photo=$request->profile_photo;
            $extension=$photo->extension();
            $photo_name=Auth::user()->name.'.'.$extension;
            Image::make($photo)->save(base_path('public/files/profile/'.$photo_name));
            $profile['profile_photo'] = $photo_name;
         }
        DB::table('users')->where('id', $request->id)->update($profile);
        $notification = array('message' => 'Your Profile Update...!', 'alert-type' => 'success');
        return redirect()->back()->with($notification);
    }
    public function admin()
    {
        return view('admin.home.home');
    }


    // password change
    public function passwordupdate(Request $request)
    {
        $request->validate([
            'password'    => 'required|string|confirmed',
        ]);
        $current_pass = Auth::user()->password;
        $oldpass = $request->old_password;
        if (Hash::check($oldpass, $current_pass)) {
            User::find(Auth::id())->update([
                'password' => bcrypt($request->password),

            ]);
            Auth::logout();
            $notification = array('message' => 'Your Password Update...!', 'alert-type' => 'success');
            return redirect()->route('login')->with($notification);
        } else {
            return back()->with('not_match', 'Current Password Not Match');
        }
    }
    public function dashboardlogout()
    {
        Auth::logout();
        $notification = array('message' => 'You Are Logged Out...!', 'alert-type' => 'warning');
        // return "Logout Successfully";
        return redirect()->route('login')->with($notification);
    }
}
