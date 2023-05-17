@extends('layouts.app')
@section('content')
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        @import url('https://rsms.me/inter/inter.css');
        .sf { font-family: 'Inter', sans-serif; }
        .sign { font-family: 'Homemade Apple', cursive; }
    </style>
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <link href="https://fonts.googleapis.com/css2?family=Homemade+Apple&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://maxst.icons8.com/vue-static/landings/line-awesome/line-awesome/1.3.0/css/line-awesome.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/flag-icon-css/3.5.0/css/flag-icon.min.css" integrity="sha512-Cv93isQdFwaKBV+Z4X8kaVBYWHST58Xb/jVOcV9aRsGSArZsgAnFIhMpDoMDcFNoUtday1hdjn0nGp3+KZyyFw==" crossorigin="anonymous" />
</head>
<body class="bg-gray-200 print:bg-white md:flex lg:flex xl:flex print:flex md:justify-center lg:justify-center xl:justify-center print:justify-center sf">
<div class="lg:w-1/12 xl:w-1/4"></div>
{{-- @foreach($orders as $invoice) --}}
<div class="w-full bg-white lg:w-full xl:w-2/3 lg:mt-20 lg:mb-20 lg:shadow-xl xl:mt-02 xl:mb-20 xl:shadow-xl print:transform print:scale-90">
  <header class="flex flex-col items-center px-8 pt-20 text-lg text-center bg-white border-t-8 border-green-700 md:block lg:block xl:block print:block md:items-start lg:items-start xl:items-start print:items-start md:text-left lg:text-left xl:text-left print:text-left print:pt-8 print:px-2 md:relative lg:relative xl:relative print:relative">
        <img class="w-3/6 h-auto md:w-1/4 lg:ml-12 xl:ml-12 print:px-0 print:py-0" src="https://via.placeholder.com/200x100.png" />
        <div class="flex flex-row mt-12 mb-2 ml-0 text-2xl font-bold md:text-3xl lg:text-4xl xl:text-4xl print:text-2xl lg:ml-12 xl:ml-12">INVOICE
          <div class="text-green-700">
            <span class="mr-4 text-sm">■ </span> #
          </div>

          <span id="invoice_ids" class="text-gray-500">{{$invoice_id}}</span>
        </div>
        <div class="flex flex-col lg:ml-12 xl:ml-12 print:text-sm">
          {{-- @php dd($payments); @endphp --}}
          @foreach($payments->unique('payment_date') as $payment)
          <span>Payment Date: {{$payment->payment_date}}</span>
          @endforeach
        </div>
        <div class="px-8 py-2 mt-16 text-3xl font-bold text-green-700 border-4 border-green-700 border-dotted md:absolute md:right-0 md:top-0 md:mr-12 lg:absolute lg:right-0 lg:top-0 xl:absolute xl:right-0 xl:top-0 print:absolute print:right-0 print:top-0 lg:mr-20 xl:mr-20 print:mr-2 print:mt-8">PAID</div>
        <contract class="flex flex-col m-12 text-center lg:m-12 md:flex-none md:text-left md:relative md:m-0 md:mt-16 lg:flex-none lg:text-left lg:relative xl:flex-none xl:text-left xl:relative print:flex-none print:text-left print:relative print:m-0 print:mt-6 print:text-sm">
         @foreach($orders->unique() as $order)
          <span class="font-extrabold md:hidden lg:hidden xl:hidden print:hidden">FROM</span>
          <from class="flex flex-col">
              <span id="company-name" class="font-medium">{{$order->customer_fname}}{{$order->customer_lname}}</span>
              <span id="company-country"><span class="flag-icon flag-icon-ph"></span>{{$order->customer_address}}</span>
              <div class="flex-row">
                  <span id="c-city">{{$order->customer_contact}}</span>
              
              </div>
              <span id="company-mail">{{$order->customer_email}}</span>
          </from>
          @endforeach 
          {{-- <span class="mt-12 font-extrabold md:hidden lg:hidden xl:hidden print:hidden">TO</span>
          <to class="flex flex-col md:absolute md:right-0 md:text-right lg:absolute lg:right-0 lg:text-right print:absolute print:right-0 print:text-right">
          <span id="person-name" class="font-medium">Cloud Solutions Inc</span>
              <span id="person-country"><span class="flag-icon flag-icon-hu"></span> Hungary</span>
              <div class="flex-row">
                  <span id="p-postal">3100</span>
                  <span id="p-city">Salgótarján</span>,
              </div>
              <span id="person-address">Rákóczi út 12.</span>
              <span id="person-phone">+36300000000</span>
              <span id="person-mail">info@cloudsolutions.hu</span> 
          </to> --}}
      </contract>
    </header>
    <hr class="border-gray-300 md:mt-8 print:hidden">
    <content>
      <div id="content" class="flex justify-center md:p-8 lg:p-20 xl:p-20 print:p-2">
          <table class="w-full text-left table-auto print:text-sm" id="table-items">
              <thead>
                <tr class="text-white bg-gray-700 print:bg-gray-300 print:text-black">
                  <th class="px-4 py-2">Item</th>
                  <th class="px-4 py-2 text-right">Qty</th>
                  <th class="px-4 py-2 text-right">Unit Price</th>
                  <th class="px-4 py-2 text-right">Subtotal</th>
                </tr>
              </thead>
              @foreach($orders as $invoice)
              <tbody>
                <tr>
                  <td class="px-4 py-2 border">{{$invoice->product_name}}</td>
                  <td class="px-4 py-2 text-right border tabular-nums slashed-zero">{{$invoice->prod_quantity}}</td>
                  <td class="px-4 py-2 text-right border tabular-nums slashed-zero">{{$invoice->prod_price}}</td>
                  <td class="px-4 py-2 text-right border tabular-nums slashed-zero">{{$invoice->prod_quantity * $invoice->prod_price}}</td>
                </tr>
                @endforeach
                {{-- <tr class="text-white bg-gray-700 print:bg-gray-300 print:text-black" >
                  <td class="invisible"></td>
                  <td class="invisible"></td>
                  <td class="px-4 py-2 text-right border"><span class="flag-icon flag-icon-hu print:hidden"></span> VAT</td>
                  <td class="px-4 py-2 text-right border tabular-nums slashed-zero">27%</td>
                </tr>
                <tr class="text-white bg-gray-700 print:bg-gray-300 print:text-black" >
                  <td class="invisible"></td>
                  <td class="invisible"></td>
                  <td class="px-4 py-2 text-right border">TAX</td>
                  <td class="px-4 py-2 text-right border tabular-nums slashed-zero">$145.77</td>
                </tr> --}}
                <tr class="text-white bg-gray-700 print:bg-gray-300 print:text-black" >
                  <td class="invisible"></td>
                  <td class="invisible"></td>
                  <td class="px-4 py-2 font-extrabold text-right border">Total</td>
                  <td class="px-4 py-2 text-right border tabular-nums slashed-zero">{{$finaltotal}}</td>
                </tr>
              </tbody>
            
            </table>  
      </div>
  </content>
    <payment-history>
      <div class="mt-20 mb-20 print:mb-2 print:mt-2">
        <h2 class="text-xl font-semibold text-center print:text-sm">Payment History</h2>
        <div class="flex flex-col items-center text-center print:text-sm">
        <p class="font-medium">  2020/09/06 06:43PM CET <span class="font-light"><i class="lab la-cc-mastercard la-lg"></i> Credit Card Payment: $685.66 (Mastercard XXXX-XXXX-XXXX-0122)</span></p>
      </div>

     </div>
    </payment-history>
    <div class="flex flex-col items-center mb-24 leading-relaxed print:mt-0 print:mb-0">
      <span class="w-64 text-4xl text-center text-black border-b-2 border-black border-dotted opacity-75 sign print:text-lg">Csendes</span>
      <span class="text-center">Buyer</span>
  </div>
  <footer class="flex flex-col items-center justify-center pb-20 leading-loose text-white bg-gray-700 print:bg-white print:pb-0">
      <span class="mt-4 text-xs print:mt-0">Invoice generated on 2020/09/06 17:35</span>
      <span class="mt-4 text-base print:text-xs">© 2020 BroHosting.  All rights reserved.</span>
      <span class="print:text-xs">US - New York, NY 10023 98-2 W 67th St</span>
  </footer>
</div>
{{-- @endforeach --}}
<div class="lg:w-1/12 xl:w-1/4"></div>  
</body>
</html>
@endsection