<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use App\Models\Product;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function addprod()//view for adding product
    {
        return view('pages.addproduct');
    }
    //save product to database
    public function addProduct(Request $request)
    {
        // dd($request->all());
        $product = new Product();
        $product->product_name = $request->product_name;
        $product->product_description = $request->product_description;
        $product->product_price = $request->product_price;
        $product->prod_image = $request->file('photo')->store('public/product_images');
        $product->admin_id = Auth::guard('admin')->user()->id;
        $product->save();
        dd($product);
        // return 'Product Added Successfully';
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
    // // //save image to local storage
    // // public function saveImage(Request $request)
    // // {
    // //     $image = $request->file('file');
    // //     $imageName = time().'.'.$image->extension();
    // //     $image->move(public_path('images'), $imageName);
    // //     return $imageName;
    // // }
}

