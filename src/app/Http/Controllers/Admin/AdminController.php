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

    // public function addedProduct(Request $request)
    // {
    //     $addProduct = new Product();
    //     $addProduct->prod_name = $request->prod_name;
    //     $addProduct->prod_price = $request->prod_price;
    //     $addProduct->prod_description = $request->prod_description;
    //     $addProduct->admin_id = Auth::guard('admin')->user()->id;
    //     // $addProduct->product_image = $this->saveImage($request->product_image);
    //     $addProduct->save();
    //     dd($addProduct);
    //     //return view('pages.addproduct');
    // }

    //  public function add_product()
    // {
    //      return view('pages.addproduct');
    // }

        
     //view product
    // public function view_product()
    // {
    //     dd($request->all());
    //     return view('pages.viewproduct');
    // }
    
    //save image to local storage
    // public function saveImage($image)
    // {
    //     $image_name = time() . '.' . $image->getClientOriginalExtension();
    //     $image->move(public_path('images'), $image_name);
    //     return $image_name;
    // } 
    
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
