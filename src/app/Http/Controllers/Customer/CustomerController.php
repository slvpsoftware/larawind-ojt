<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Customer\Customer;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;


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
        $request->validate([
            'username' => 'required|unique:customers|max:255',
            'password' => 'required',
        ]);

        $customer           = new Customer();
        $customer->customer_fname = $request->fname;
        $customer->customer_lname = $request->lname;
        $customer->customer_email = $request->email;
        $customer->customer_address = $request->address;
        $customer->customer_contact = $request->contact;
        $customer->username = $request->username;
        $customer->password = Hash::make($request->password);
        $customer->save();//save to database
        return view('customers.customerlogin');
    }
   
    public function customerlogin(Request $request)
    {
       
        $credentials = 
        [
            'username' => $request->username,
            'password' => $request->password
        ];
        if (Auth::guard('customer')->attempt($credentials))//check the credentials
         {
          
            return redirect()->route('welcome');
        }
        else
        {
            dd('Invalid Credentials');
        }
  
    }
        public function customer_login()//display the log in page
        {
            return view('customers.customerlogin');
        }
    
        public function welcome()//display the welcome page
        {
            return view('customers.welcome');
        }
       public function customer_logout()
       {
           Auth::guard('customer')->logout();
           return redirect()->route('customer');
       }
            
}