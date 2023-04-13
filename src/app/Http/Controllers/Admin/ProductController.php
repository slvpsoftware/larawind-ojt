<?php

namespace App\Http\Controllers\Admin;

use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class ProductController extends Controller
{
     public function addedProduct(Request $request)
    {
        $new_product = new Product();
        $new_product->prod_name = $request->prod_name;
        $new_product->prod_price = $request->prod_price;
        $new_product->prod_description = $request->prod_description;
        $new_product->admin_id = Auth::guard('admin')->user()->id;

        if($request->hasFile('photo'))
        {
            $file = $request->file('photo');
            $extension = $file->getClientOriginalExtension();
            $filename = time() . '.' . $extension;
            $file->move('product_images', $filename);
            $new_product->prod_image = $filename;
        }
        
            $new_product->save();
       
        // Store Categories
        foreach($request->category as $category
        )
        {
            $new_category = new Category();
            $new_category->product_id = $new_product->id;
            $new_category->category = $category;
            $new_category->save();
        }

        return view('pages.home');
        //return view('pages.addproduct');
    }

     public function add_product()
    {
        $category_list = [
            'figures',
            'funko',
            'keychains',
        ];
   
        return view('pages.addproduct', [
            'category_list' => $category_list
         ]);
    }

    public function view_product()
    {
        $admin_id = Auth::guard('admin')->user()->id;
        $product = Product::where("admin_id", $admin_id)->orderByDesc("created_at")->paginate(4);
        
        //Eloquent Relationship
        // $admin = Auth::guard('admin')->user();
        // $product = $admin->products()->orderByDesc("created_at")->get();
        
        // dd([
        //     'product1' => $product1,
        //     'product2' => $product2
        // ]
        // );
        return view('pages.viewproduct', [
            'product' => $product
        ]);
    }
}