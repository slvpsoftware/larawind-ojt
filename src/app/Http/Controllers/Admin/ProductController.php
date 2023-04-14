<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use App\Models\Product;
use App\Models\Category;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
//pagination
use Illuminate\Pagination\Paginator;

class ProductController extends Controller
{
    public function addprod()//view for adding product
    {
        $category_list = [
            'figures',
            'funko',
            'keychains',
        ];
         return view('pages.addproduct', [
            'category_list' => $category_list]);
    }
    //save product to database
    public function addProduct(Request $request)
    {
       
        $product = new Product();
        $product->product_name = $request->product_name;
        $product->product_description = $request->product_description;
        $product->product_price = $request->product_price;
        // $product->prod_image = $request->file('photo')->store('public/product_images');
        $product->admin_id = Auth::guard('admin')->user()->id;
        if($request->hasFile('photo'))
        {
            $image = $request->file('photo');
            $extension = $image->getClientOriginalExtension();
            $image_name = time().'.'.$extension;
            $image->move(public_path('prod_images'), $image_name);
            $product->prod_image = $image_name;
        }
        
        
          // Store Categories
          $product->save();
          foreach($request->category as $category)
          {
              $new_category = new Category();
              $new_category->product_id = $product->id;
              $new_category->category = $category;
              $new_category->save();
          }
        //   return view('pages.homepage' );
        return redirect()->route('viewproduct');
    }

      

    public function viewProduct()
    {
        // $productad = new Product();
        $admin_id = Auth::guard('admin')->user()->id;
        $products = Product::where("admin_id", $admin_id)->orderByDesc("created_at")->paginate(5);
        
        //eloquent
        // $product = $admin_id->products()->orderByDesc("created_at")->get();
        
        return view('pages.viewproduct', [
            'products' => $products
        ]);
    }
    //delete product
    public function deleteProduct(Request $request)
    {
        
        $product = Product::find($request->id);
        $product->delete();
        return redirect()->route('viewproduct');
    }



    public function editProduct(Request $request)
    {
        $admin_id = Auth::guard('admin')->user()->id;
        $product = Product::where("admin_id", $admin_id)->where ("id", $request->id)->get();
        // $products = Product::find($request->id);
        if($product->count() == 0)
        {
            return redirect()->back();
        }
        else
        {
            $product = $product->first();
        }

        $product_categories = $product->categories->pluck('category')->all();
        $category_list = [
            'figures',
            'funko',
            'keychains',
        ];
        
        return view('pages.editproduct', [
            'category_list' => $category_list,
            'product' => $product, 'product_categories' => $product_categories]);
    }
    

    public function updateProduct(Request $request)
    {
        $admin_id = Auth::guard('admin')->user()->id;
        $product = Product::where("admin_id", $admin_id)->where ("id", $request->id)->get();
        if($product->count() == 0)
        {
            return redirect()->back();
        }
        else
        {
            $product = $product->first();
        }


        $product = Product::find($request->id);
        $product->product_name = $request->product_name;
        $product->product_description = $request->product_description;
        $product->product_price = $request->product_price;
       
        if($request->hasFile('photo'))
        {
            $image = $request->file('photo');
            $extension = $image->getClientOriginalExtension();
            $image_name = time().'.'.$extension;
            $image->move(public_path('prod_images'), $image_name);
            $product->prod_image = $image_name;
        }
         $product->update();
        
         $product->categories()->delete();

        foreach($request->category ?? [] as $category)
        {
            $new_category = new Category();
            $new_category->product_id = $product->id;
            $new_category->category = $category;
            $new_category->save();
        }
        return redirect()->route('viewproduct');
    }
         
   
}

