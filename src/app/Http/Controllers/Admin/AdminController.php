<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Customer\Payment;
use App\Models\Customer\Customer;
use App\Models\Admin;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function adminlogin(Request $request)
    {
        // dd($request->all());
        $request->validate([
            'username' => 'required',
            'password' => 'required',
        ]);
        $credentials =
            [
                'username' => $request->username,
                'password' => $request->password
            ];
        if (Auth::guard('admin')->attempt($credentials)) //check the credentials
        {
            // dd(Auth::guard('admin')->user()->id);//display the user id if successfully logged in
            // dd('Successfully Logged In');
            return redirect()->route('admin.home');
        } else {
            // dd('Invalid Credentials');
            return redirect()->route('login')->with('error', 'Invalid Username or Password');
        }
    }
    public function login() //display the log in page
    {
        return view('pages.login');
    }

    public function register() //display the register page
    {
        return view('pages.signup');
    }

    public function signup(Request $request) //form that accepts registration details
    {

        $request->validate([
            'username' => 'required|unique:admins|max:255',
            'password' => 'required',
            'store_name' => 'required|max:255',
        ]);

        $admin = new Admin();
        $admin->username = $request->username;
        $admin->password = Hash::make($request->password);
        $admin->store_name = $request->store_name;
        //    $isGoods =
        $admin->save(); //save to database

        return view('pages.login');
    }
    //homepage
    public function home()
    {
        $admin = Auth::guard('admin')->user();
        //count number of products
        $products = $admin->products;
        $count = $products->count();

        return view(
            'pages.homepage',
            [
                'admin' => $admin,
                'count' => $count,
            ]
        );
    }
    public function newOrders(Request $request)
    {
        // $admin = Auth::guard('admin')->user();
        // $customer = Customer::all(); 
        // $orders = Payment::with('customer')->where('order_status', '0')->get();
        // $invoiceNumber =$orders->pluck('customer.invoice_number');
        // $new_orders = $orders;
        // $count = $orders->count();
        // // dd($customer);
        // $total = DB::table('payments')->select(DB::raw('prod_quantity * prod_price as total'))->where('order_status', '0')->get();
        // $f_total = 0;
        // foreach ($total as $key => $value) {
        //     $f_total += $value->total;
        // }
        // // dd($f_total);

        // return view('pages.newOrders',
        // [
        //     'admin' => $admin,
        //     'count' => $count,
        //     'new_orders' => $new_orders,
        //     'invoiceNumber' => $invoiceNumber,
        // ]);
        $admin = Auth::guard('admin')->user();
        $customers = Customer::all();
        // $invoiceNumber = Payment::where('order_status', '0')->pluck('invoice_id');
        $selectedInvoiceId = $request->input('invoice_id');
        // dd($selectedInvoiceId);
        $new_orders = DB::table('payments')
            ->select(
                'customer_id',
                'invoice_id',
                'order_status',
                'payment_date',
                'order_status',
                DB::raw('SUM(prod_quantity * prod_price) as total')
            )
            ->where('order_status', '0')
            ->groupBy('customer_id', 'invoice_id', 'order_status', 'payment_date', 'order_status')
            ->get();

        $orderDetails = [];
        foreach ($new_orders as $order) {
            $details = Payment::where('invoice_id', $order->invoice_id)->get();
            $orderDetails[$order->invoice_id] = $details;
        }

        $count = $new_orders->count();

        return view('pages.newOrders', [
            'admin' => $admin,
            'count' => $count,
            'new_orders' => $new_orders,
            'selectedInvoiceId' => $selectedInvoiceId,

        ]);
    }
    //logout
    public function logout()
    {
        Auth::guard('admin')->logout();
        return redirect()->route('admin.login');
    }
}