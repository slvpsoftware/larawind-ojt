<?php

namespace App\Http\Controllers\Admin;

use  App\Models\Admin;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    //Admin Login
    public function adminlogin(Request $request)
    {
        dd($request->all());
    }
    //register
    public function register()
    {
         return view('pages.signup');
    }
    public function login()
    {
        return view('pages.welcome');
    }
    public function registration(Request $request)
    {
        $admin = new Admin();
        $admin->username = $request->username;
        $admin->password = Hash::make($request->password);
        $isGoods = $admin->save();
        dd($isGoods);
    }
}
