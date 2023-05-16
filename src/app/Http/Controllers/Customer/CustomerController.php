<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Customer\Customer;
use App\Models\Customer\Checkout;
use App\Models\Product;
use App\Models\Admin;
use App\Models\Customer\Payment;
use App\Models\Customer\Cart;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Carbon\Carbon;

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
        $customer = new Customer();
        $customer->customer_fname       = $request->fname;
        $customer->customer_lname       = $request->lname;
        $customer->customer_email       = $request->email;
        $customer->customer_address     = $request->address;
        $customer->customer_contact     = $request->contact;
        $customer->username             = $request->username;
        $customer->password             = Hash::make($request->password);

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
        $customer = Auth::guard('customer')->user();
        $cust_name = $customer->customer_fname;
        $cust_lname = $customer->customer_lname;
         
        return view('customers.welcome',
            [
                'customer' => $customer,
                'cust_name' => $cust_name,
                'cust_lname' => $cust_lname,
            ]);
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
        $store = Admin::find($id);
        $products = Product::where("admin_id", $id)->get();
        return view('customers.viewproductbystore', [
            'products' => $products,
            'store'    => $store,
        ]);
    }
    public function addtocart(Request $request, $id)
    {
        //add selected cart to database
        $product = Product::find($id);
        $customer_id = Auth::guard('customer')->user()->id;
        //check if the product is already in the cart
        $cart = Cart::where('customer_id', $customer_id)->where('product_id', $product->id)->exists();
        if ($cart) {
            return redirect()->back()->with('error', 'Product is already in cart');
        } else {
            //add product to cart
            $cart               = new Cart();
            $cart->product_id   = $product->id;
            $cart->customer_id  = $customer_id;
            $cart->save();
            return redirect()->back()->with('added', 'Product added to cart successfully');

        }
    }

    public function viewcart(Request $request)
{
    $customer_id = Auth::guard('customer')->user()->id;
    $myproduct = DB::table('carts')
        ->leftjoin('products', 'carts.product_id', '=', 'products.id')
        ->leftjoin('checkouts', 'checkouts.cart_id', '=', 'carts.id')
        ->where('carts.customer_id', $customer_id)
        ->select(
            'products.product_name',
            'products.product_price',
            'products.prod_image',
            'products.product_description',
            'products.product_quantity',
            'carts.created_at',
            'carts.id',
            'checkouts.quantity'
        )
        ->orderByDesc('carts.created_at')->paginate(3);

    $total = DB::table('carts')
        ->leftjoin('products', 'carts.product_id', '=', 'products.id')
        ->where('carts.customer_id', $customer_id)
        ->selectRaw('SUM(products.product_price) as total')
        ->first()
        ->total;

        //get subtotal per cart
        $subtotal = DB::table('carts')
        ->join('checkouts', 'checkouts.cart_id', '=', 'carts.id')
        ->join('products', 'carts.product_id', '=', 'products.id')
        ->where('carts.customer_id', $customer_id)
        ->groupBy('carts.id')   
        ->select('carts.id', DB::raw('SUM(products.product_price * checkouts.quantity) as subtotal'))
        ->get();
        
        $totalFSubtotal = $subtotal->sum('subtotal');
      
        $qty = 1;

    return view('customers.mycart', [
        'myproduct' => $myproduct,
        'total' => $total,
        'qty' => $qty,
        'subtotal' => $subtotal->keyBy('id'),
        'totalFSubtotal' => $totalFSubtotal,
        'customer_id' => $customer_id,
    ]);
    
}

    public function submitMyCart(Request $request)
    {
        if ($request->submit == 'deleteCart') {
            return $this->deleteProduct($request);
        } else if ($request->submit == 'checkoutCart') {
            return $this->checkout($request);
        }
    }

    public function deleteProduct(Request $request)
    {
        $cart = Cart::find($request->id);
        $cart->delete();
        return redirect()->route('customer.mycart')->with('deleted', 'Product deleted successfully');
    }
    //view product details 
    public function productDetails(Request $request, $id)
    {
        $product = Product::find($id);
        return view('customers.productDetails', [
            'product' => $product,
        ])->with('added', 'This product added to cart successfully');
    }

    //checkout
    public function checkout(Request $request)
    {
        $customer_id = Auth::guard('customer')->user()->id;
        $cart_ids = $request->product_id;
        $cust_id = $request->customer_id;
        $price = $request->price_total;
        $finalqty = $request->finalqty;
        $qty = $request->qty;
        // dd($finalqty);

        foreach ($cart_ids as $cart_id) {
            $existingCheckout = Checkout::where('cart_id', $cart_id)->first();

            if ($existingCheckout) {
                // dd('ni add');
                $quantity = $qty[$cart_id] + $finalqty[$cart_id];
                // dd($quantity);
                // dd($qty[$cart_id]);
                // Update the quantity and total of existing checkout item
                $existingCheckout::find($cart_id);
                $existingCheckout->quantity = $finalqty[$cart_id];
                // $existingCheckout->quantity += $finalqty[$cart_id];
                //check if total has existing value
                
                $existingCheckout->total = $price[$cart_id];
                $existingCheckout->update();
            } else {
                // dump('wala ni add');
                // Create a new checkout item
                $checkout = new Checkout();
                $checkout->cart_id = $cart_id;
                $checkout->customer_id = $customer_id;
                $checkout->total = $price[$cart_id];
                $checkout->quantity = $finalqty[$cart_id];
                $checkout->save();
            }
        }

        return redirect()->route('customer.checkoutdetails')->with('checkout', 'Checkout successful');
    }


    //view checkout
    public function viewcheckout(Request $request)
    {
        $customer_id = Auth::guard('customer')->user()->id;
        $mycheckout = DB::table('checkouts')
            ->leftjoin('carts', 'checkouts.cart_id', '=', 'carts.id')
            ->leftjoin('products', 'carts.product_id', '=', 'products.id')
            ->where('carts.customer_id', $customer_id)
            ->select(
                'products.product_name',
                'products.product_price',
                'products.prod_image',
                'products.product_description',
                'products.product_quantity',
                'checkouts.created_at',
                'checkouts.id',
                'checkouts.total',
                'checkouts.quantity',    
            )
            ->orderByDesc('checkouts.created_at')->paginate(3);

            $total = DB::table('checkouts')
                ->leftjoin('carts', 'checkouts.cart_id', '=', 'carts.id')
                ->leftjoin('products', 'carts.product_id', '=', 'products.id')
                ->where('carts.customer_id', $customer_id)
                ->select(DB::raw('total * quantity as total'))
                ->get();

            $finaltotal = 0;
            foreach ($total as $key => $value) {
                $finaltotal += $value->total;
            }
            // dd($finaltotal);
            return view('customers.checkoutdetails',
            [
                
                'mycheckout' => $mycheckout,
                'total'      => $total,
                'finaltotal' => $finaltotal,
            ]);
    }   
    
    //payment
    public function paymentinfo()
    {
        $customer_id = Auth::guard('customer')->user()->id;
        $payee = Customer::find($customer_id);
        $payment_s = DB::table('checkouts')
            ->leftjoin('carts', 'checkouts.cart_id', '=', 'carts.id')
            ->leftjoin('products', 'carts.product_id', '=', 'products.id')
            ->leftjoin('customers', 'carts.customer_id', '=', 'customers.id')
            ->where('carts.customer_id', $customer_id)
            ->select(
                'carts.id as cart_id',
                'customers.id as customer_id',
                'customers.customer_fname',
                'products.id as product_id',
                'products.product_name',
                'products.product_price',
                'products.prod_image',
                'products.product_description',
                'products.product_quantity',
                'checkouts.created_at',
                'checkouts.id as checkout_id',
                'checkouts.total',
                'checkouts.quantity',
            )
            ->orderByDesc('checkouts.created_at')->paginate(3);
         
            
        $total = DB::table('checkouts')
                ->select(DB::raw('total * quantity as total'))
                ->get();
        $finaltotal = 0;
        foreach ($total as $key => $value) {
            $finaltotal += $value->total;
        }

        return view('customers.payment',
        [
            'customer_id' => $customer_id,
            'total'      => $total,
            'finaltotal' => $finaltotal,
            'payment_s'  => $payment_s,
            'payee'      => $payee,
            // 'checkout_id' => $checkout_id,
        ]);
    }
    //saving payment info
    public function postpayment(Request $request)
    {
     
        $customer_id = Auth::guard('customer')->user()->id;
        $check_ids = $request->checkout_id;
        $cart_ids = $request->cart_id;
        $quantity = $request->quantity;
        $price = $request->price;
        $name_of_card = $request->cardname;
        $card_number = $request->card_number;
        $payment_date = $request->payment_date;
        $expiry_month = $request->expMonth;
        $expiry_year = $request->expYear;
        $cvv = $request->cvv;

        foreach ($check_ids as $check_id) 
        {
            $existing_payment = Payment::where('customer_id', $customer_id)
            ->where('checkout_id', $check_id)
            ->first();
            if(!$existing_payment)
            {
                $payment = new Payment();
                $payment->customer_id = $customer_id;
                $payment->checkout_id = $check_id;
                $payment->product_id = $cart_ids[$check_id];
                $payment->prod_quantity = $quantity[$check_id];
                $payment->prod_price = $price[$check_id];
                $payment->payment_date = $payment_date[$check_id];
                $payment->name_of_card = $name_of_card;
                $payment->card_number = $card_number;
                $payment->expiry_month = $expiry_month;
                $payment->expiry_year = $expiry_year;
                $payment->cvv = $cvv;
                
               
                $payment->save();
            }
            if($existing_payment)
            {
                return redirect()->route('customer.paymentinfo')->with('error_payment', 'This item is already checked out');
            }
        }

        foreach($check_ids as $check_id){
            $product = Product::find($cart_ids[$check_id]);
            $product->product_quantity -= $quantity[$check_id];
            $product->update();
        }

       
        $cart = Cart::where('customer_id', $customer_id)->get();
        foreach ($cart as $carts) {
            $carts->delete();
        }

        // //delete checkout
        $checkouts = Checkout::where('customer_id', $customer_id)->get();
        foreach ($checkouts as $checkout) {
            $checkout->delete();
        }

        return redirect()->route('customer.paymentinfo')->with('payment', 'Payment successful');

    }
    public function orderDetails()
    {
        $cus_id = Auth::guard('customer')->user()->id;
        $orders = Payment::leftjoin('products', 'payments.product_id', '=', 'products.id')
        ->leftjoin('customers', 'payments.customer_id', '=', 'customers.id')
        ->select(
            'customers.id as customer_id',
            'customers.customer_fname',
            'customers.customer_lname',
            'customers.customer_address',
            'customers.customer_contact',
            'customers.customer_email',
            'products.id as product_id',
            'products.product_name',
            'products.product_price',
            'products.prod_image',
            'products.product_description',
            'products.product_quantity',
            'payments.id as payment_id',
            'payments.prod_price',
            'payments.prod_quantity',
            'payments.name_of_card',
            'payments.payment_date',
            'payments.card_number',
            'payments.expiry_month',
            'payments.expiry_year',
            'payments.cvv',
        )->where('customer_id', $cus_id)->get()
        ->groupBy('name_of_card');


        $total = DB::table('payments')
        ->select(DB::raw('prod_quantity * prod_price as total'))
        ->get();
        $finaltotal = 0;
        foreach ($total as $key => $value) {
            $finaltotal += $value->total;
        }
         
        return view('customers.orderDetails',
        [
            'orders' => $orders,
            'finaltotal' => $finaltotal,
        ]);
    }
    public function checkpayment()
    {

    }
}
    