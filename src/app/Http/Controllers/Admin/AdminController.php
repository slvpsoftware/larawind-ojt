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
        $credentials = 
        [
            'username' => $request->username,
            'password' => $request->password
        ];
        if (Auth::guard('admin')->attempt($credentials))//check the credentials
         {
            // dd(Auth::guard('admin')->user()->id);//display the user id if successfully logged in
            return redirect()->route('home');
        }
        else
        {
            $request->validate([
                'username' => 'required',
                'password' => 'required|min:8'
            ]);
     
            return redirect()->route('login');
        }

    //    dd($credentials);
        
    }
    public function login()//display the log in page
    {
        return view('pages.login');
    }

    public function register()//display the register page
    {
        return view('pages.signup');
    }

    public function signup(Request $request)//form that accepts registration details
    {
       $request->validate([
           'username' => 'required|unique:admins',
           'password' => 'required|min:8'
       ]);

       $admin           = new Admin();
       $admin->username = $request->username;
       $admin->password = Hash::make($request->password);
    //    $isGoods =
        $admin->save();//save to database
    
        return view('pages.login');
    }
    //homepage
    public function home()
    {
        return view('pages.homepage');
    }
    //logout
    public function logout()
    {
        Auth::guard('admin')->logout();
        return redirect()->route('login');
    }
}
