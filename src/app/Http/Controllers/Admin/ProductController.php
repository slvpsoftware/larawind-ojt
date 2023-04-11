<?php

namespace App\Http\Controllers\Admin;

use  App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
     public function addedProduct(Request $request)
    {
        $new_product = new Product();
        $new_product->prod_name = $request->prod_name;
        $new_product->prod_price = $request->prod_price;
        $new_product->prod_description = $request->prod_description;
        $new_product->prod_image = $request->file('photo')->store('public/product_images');
        $new_product->admin_id = Auth::guard('admin')->user()->id;
        $new_product->save();
        // Store Categories
        foreach($request->category as $category)
        {
            $new_category = new Category();
            $new_category->product_id = $new_product->id;
            $new_category->category = $category;
            $new_category->save();
        }


        return view('pages.viewproduct', [
            'new_product' => $new_product
        ]);
        //return view('pages.addproduct');
    }

     public function add_product()
    {
        $category_list = [
            'figures',
            'funko',
            'keychains',
        ];

        $test_item = 'test';

        $test_item2 = 123;

         return view('pages.addproduct', [
            'category_list' => $category_list,
            'test_item' => $test_item,
            'test_item2' => $test_item2,
         ]);
    }
}