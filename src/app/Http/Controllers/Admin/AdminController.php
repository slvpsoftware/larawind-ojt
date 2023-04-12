<?php

namespace App\Http\Controllers\Admin;

use  App\Models\Admin;
use  App\Models\Product;
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
        // dd stands for "Dump and Die." Laravel's dd() function can be defined as a 
        // helper function, which is used to dump a variable's contents 
        // to the browser and prevent the further script execution. Example: dd($array); 

        $credentials = [
            'username' => $request->username,
            'password' => $request->password,
        ];

        $loginOk=Auth::guard('admin')->attempt($credentials);
        
        //check if login okay
        if($loginOk)
        {
         //dd(Auth::guard('admin')->user()->id);
         // $product = Admin::find(Auth::guard('admin')->user()->id)->products;
         //dd($product);
            return redirect()->route('home');
        }
        else
        {
            dd("Invalid Chakas");
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
        $admin->save();
        
        return view('pages.welcome');
    }
   
    public function home()
    {
        return view('pages.home');
    }

    //logout
    public function logout()
    {
        Auth::guard('admin')->logout();
        return redirect()->route('login');
    }
}
