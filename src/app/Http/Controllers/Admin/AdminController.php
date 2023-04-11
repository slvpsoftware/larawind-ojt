<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function adminlogin(Request $request)
    {
        // dd($request->all());
        $credentials = [
            'username' => $request->username,
            'password' => $request->password
        ];
        if (Auth::guard('admin')->attempt($credentials))//check the credentials
         {
            // dd(Auth::guard('admin')->user()->id);//display the user id if successfully logged in
            return redirect()->route('addproduct');
        }
        else
        {
            dd('Invalid Credentials');
        }

    //    dd($credentials);
        
    }
    public function login()//display the log in page
    {
        return view('pages.welcome');
    }

    public function register()//display the register page
    {
        return view('pages.signup');
    }

    public function signup(Request $request)//form that accepts registration details
    {
       $admin = new Admin();
       $admin->username = $request->username;
       $admin->password = Hash::make($request->password);
    //    $isGoods =
        $admin->save();//save to database
    
        return 'Account Created Successfully';
    }
}
