<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(Request $request)
    {
       return redirect()->route('login');
    }

    // login page
    public function login(Request $request)
    {

        return view('pages.login');
    }

    //homepage
    public function home(Request $request)
    {
        return view('pages.home');
    }

    public function exit(Request $request)
    {
        return view('pages.exit');
    }
    
}
