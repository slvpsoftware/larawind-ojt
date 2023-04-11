<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use  App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProductController extends Controller
{
     public function addedProduct(Request $request)
    {
        $addProduct = new Product();
        $addProduct->prod_name = $request->prod_name;
        $addProduct->prod_price = $request->prod_price;
        $addProduct->prod_description = $request->prod_description;
        $addProduct->admin_id = Auth::guard('admin')->user()->id;
        // $addProduct->product_image = $this->saveImage($request->product_image);
        $addProduct->save();
        dd($addProduct);
        //return view('pages.addproduct');
    }

     public function add_product()
    {
         return view('pages.addproduct');
    }
}
