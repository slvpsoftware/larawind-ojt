<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PagesController extends Controller
{
    
   public function start(Request $request)
   {
        return view('pages.start');
   }

   public function sample(Request $request)
   {
        return view('pages.sample');
   }
   public function about()
   {
    return view('pages.about');
   }
}
