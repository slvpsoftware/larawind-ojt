<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(Request $request)
    {
       return redirect()->route('admin.login');
    }

    // login page
    public function login(Request $request)
    {

        // return redirect()->rp=out('pages.login');
        return redirect()->route('admin.login');
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

    // public function customer_index()
    // {
    //     return view('customer.customer');
    // }
    
}
