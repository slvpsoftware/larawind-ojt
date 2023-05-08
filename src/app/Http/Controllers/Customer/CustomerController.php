<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Customer\Customer;
use App\Models\Product;
use App\Models\Admin;
use App\Models\Customer\Cart;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;

class CustomerController extends Controller
{
    public function customer_index()
    {
        return view('customers.customerlogin');
    }
    public function customer_reg()
    {
        return view('customers.customerregister');
    }
    //save the customer registration details
    public function customer_register(Request $request)
    {

        // $request->validate([
        //     'fname' => 'required|max:255',
        //     'lname' => 'required|max:255',
        //     'email' => 'required|max:255',
        //     'address' => 'required|max:255',
        //     'contact' => 'required|max:255',
        //     'username' => 'required|unique:customers|max:255',
        //     'password' => 'required|min:8|confirmed',
        // ]);

        $customer = new Customer();
        $customer->customer_fname = $request->fname;
        $customer->customer_lname = $request->lname;
        $customer->customer_email = $request->email;
        $customer->customer_address = $request->address;
        $customer->customer_contact = $request->contact;
        $customer->username = $request->username;
        $customer->password = Hash::make($request->password);

        $customer->save(); //save to database
        // dd('Customer Registration Successful');
        return view('customers.customerlogin');
    }

    public function customerlogin(Request $request)
    {
        $request->validate([
            'username' => 'required',
            'password' => 'required',
        ]);

        $credentials =
            [
                'username' => $request->username,
                'password' => $request->password
            ];
        if (Auth::guard('customer')->attempt($credentials)) //check the credentials
        {

            return redirect()->route('customer.welcome');
        } else {
            dd('Invalid Credentials');
        }

    }
    public function customer_login() //display the log in page
    {
        return view('customers.customerlogin');
    }

    public function welcome() //display the welcome page
    {
        return view('customers.welcome');

    }
    public function logout()
    {
        Auth::guard('customer')->logout();
        return redirect()->route('customer.login');
    }
    //function that display all store admins to the customer page
    public function list()
    {
        $admins = Admin::all();
        return view('customers.listofstores', compact('admins'));
    }
    //viewproductbystore
    public function viewproductbystore(Request $request, $id)
    {
        // dd($id);
        // $products
        // // $admin = Admin::all();
        $store = Admin::find($id);
        // dd($store);
        $products = Product::where("admin_id", $id)->get();
        // dd($products);
        // $products = Product::all()->where("admin_id", $request->id);
        

        return view('customers.viewproductbystore',[
            'products' => $products,
            'store' => $store,
        ]);
       
    }
    public function addtocart(Request $request, $id)
    {
        //add selected cart to database
        $product = Product::find($id);
        $cart = new Cart();
        $cart->product_id = $product->id;
        $cart->customer_id = Auth::guard('customer')->user()->id;
        $cart->save();
      
         return redirect()->back()->with('added', 'Product added to cart successfully');

    }

    public function viewcart(Request $request)
    {
       $customer_id = Auth::guard('customer')->user()->id;
       $myproduct = DB::table('carts')
                ->leftjoin('products', 'carts.product_id', '=', 'products.id')
                ->where('carts.customer_id', $customer_id)
                ->select(
                    'products.product_name',
                    'products.product_price',
                    'products.prod_image',
                    'products.product_description',
                    'products.product_quantity',
                    'carts.created_at',
                    'carts.id',
                    'products.id as product_id'
                    ) 
                ->orderByDesc('carts.created_at')->paginate(3);
               
    
            $total = DB::table('carts')
            ->leftjoin('products', 'carts.product_id', '=', 'products.id')
            ->where('carts.customer_id', $customer_id)
            ->selectRaw('SUM(products.product_price) as total')
            ->first()
            ->total;
            // dd($total);
      //dd($product);
            $qty=1;

            //dd($qty);
      
       return view('customers.mycart',[
           'myproduct' => $myproduct,
              'total' => $total,
                'qty' => $qty,
       ]);
       
    }
    

    public function deleteProduct(Request $request)
    {
        $cart= Cart::find($request->id);  
        $cart->delete();
        return redirect()->route('customer.mycart')->with('deleted', 'Product deleted successfully');
    }
    //view product details 
    public function productDetails(Request $request, $id)
    {
        $product = Product::find($id);
        return view('customers.productDetails',[
            'product' => $product,
        ])->with('added', 'This product added to cart successfully');
    }
    

}