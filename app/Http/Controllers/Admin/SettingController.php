<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SettingController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
        return view('admin.setting.setting.index');
    }
    public function updatesetting(Request $request)
    {
        $setting = array();
        $setting['country'] = $request->country;
        $setting['currency'] = $request->currency;
        $setting['email'] = $request->email;
        $setting['support_email'] = $request->support_email;
        $setting['logo'] = $request->logo;
        $setting['icon'] = $request->icon;
        $setting['address'] = $request->address;
        $setting['facebook'] = $request->facebook;
        $setting['twitter'] = $request->twitter;
        $setting['instragram'] = $request->instragram;
        $setting['linkdin'] = $request->linkdin;
        $setting['youtube'] = $request->youtube;
        DB::table('settings')->where('id', $request->id)->update($setting);
        $notification = array('message' => 'Setting update Successfully...', 'alert-type' => 'success');
        return redirect()->back()->with($notification);
    }
}
