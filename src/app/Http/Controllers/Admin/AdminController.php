<?php

namespace App\Http\Controllers\Admin;

use  App\Models\Admin;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    //Admin Login
    public function adminlogin(Request $request)
    {
        //dd($request->all());
        $credentials = [
            'username' => $request->username,
            'password' => $request->password,
        ];
        $loginOk=Auth::guard('admin')->attempt($credentials);
        
        //check if login okay
        if($loginOk)
        {
            dd(Auth::guard('admin')->user()->id);
        }
        else
        {
            dd("Invalid Chaka");
        }

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
        $issGoods = $admin->save();
        dd($issGoods);
    }
}
