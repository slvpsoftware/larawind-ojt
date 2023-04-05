<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function adminlogin(Request $request)
    {
        
        
    }
    public function login()
    {
        return view('pages.welcome');
    }

    public function register()
    {
        return view('pages.signup');
    }

    public function signup(Request $request)
    {
       $admin = new Admin();
       $admin->username = $request->username;
       $admin->password = Hash::make($request->password);
    //    $isGoods =
        $admin->save();
    //    dd($isGoods);
        return 'Welcome';
    }
}
