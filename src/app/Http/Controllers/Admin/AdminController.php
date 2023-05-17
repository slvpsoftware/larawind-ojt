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
        $request->validate([
            'username' => 'required',
            'password' => 'required',
        ]);
        $credentials = 
        [
            'username' => $request->username,
            'password' => $request->password
        ];
        if (Auth::guard('admin')->attempt($credentials))//check the credentials
         {
            // dd(Auth::guard('admin')->user()->id);//display the user id if successfully logged in
            // dd('Successfully Logged In');
            return redirect()->route('admin.home');
        }
        else
        {
            // dd('Invalid Credentials');
            return redirect()->route('login')->with('error', 'Invalid Username or Password');
        }
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
            'username' => 'required|unique:admins|max:255',
            'password' => 'required',
            'store_name' => 'required|max:255',
        ]);

       $admin           = new Admin();
       $admin->username = $request->username;
       $admin->password = Hash::make($request->password);
       $admin->store_name = $request->store_name;
    //    $isGoods =
        $admin->save();//save to database
    
        return view('pages.login');
    }
    //homepage
    public function home()
    {
        $admin = Auth::guard('admin')->user();
        //count number of products
        $products = $admin->products;
        $count = $products->count();
        
        return view('pages.homepage',
        [
            'admin' => $admin,
            'count' => $count,
        ]);
    }
    //logout
    public function logout()
    {
        Auth::guard('admin')->logout();
        return redirect()->route('admin.login');
    }
}
