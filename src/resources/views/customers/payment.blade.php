@extends('layouts.app')
@section('content')
    <!-- component -->
    <style>
        @import url('https://cdnjs.cloudflare.com/ajax/libs/MaterialDesign-Webfont/5.3.45/css/materialdesignicons.min.css')
    </style>
    <style>
        /*
        module.exports = {
            plugins: [require('@tailwindcss/forms'),]
        };
        */
        .form-radio {
            -webkit-appearance: none;
            -moz-appearance: none;
            appearance: none;
            -webkit-print-color-adjust: exact;
            color-adjust: exact;
            display: inline-block;
            vertical-align: middle;
            background-origin: border-box;
            -webkit-user-select: none;
            -moz-user-select: none;
            -ms-user-select: none;
            user-select: none;
            flex-shrink: 0;
            border-radius: 100%;
            border-width: 2px;
        }

        .form-radio:checked {
            background-image: url("data:image/svg+xml,%3csvg viewBox='0 0 16 16' fill='white' xmlns='http://www.w3.org/2000/svg'%3e%3ccircle cx='8' cy='8' r='3'/%3e%3c/svg%3e");
            border-color: transparent;
            background-color: currentColor;
            background-size: 100% 100%;
            background-position: center;
            background-repeat: no-repeat;
        }

        @media not print {
            .form-radio::-ms-check {
                border-width: 1px;
                color: transparent;
                background: inherit;
                border-color: inherit;
                border-radius: inherit;
            }
        }

        .form-radio:focus {
            outline: none;
        }

        .form-select {
            background-image: url("data:image/svg+xml,%3csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 24 24' fill='%23a0aec0'%3e%3cpath d='M15.3 9.3a1 1 0 0 1 1.4 1.4l-4 4a1 1 0 0 1-1.4 0l-4-4a1 1 0 0 1 1.4-1.4l3.3 3.29 3.3-3.3z'/%3e%3c/svg%3e");
            -webkit-appearance: none;
            -moz-appearance: none;
            appearance: none;
            -webkit-print-color-adjust: exact;
            color-adjust: exact;
            background-repeat: no-repeat;
            padding-top: 0.5rem;
            padding-right: 2.5rem;
            padding-bottom: 0.5rem;
            padding-left: 0.75rem;
            font-size: 1rem;
            line-height: 1.5;
            background-position: right 0.5rem center;
            background-size: 1.5em 1.5em;
        }

        .form-select::-ms-expand {
            color: #a0aec0;
            border: none;
        }

        @media not print {
            .form-select::-ms-expand {
                display: none;
            }
        }

        @media print and (-ms-high-contrast: active),
        print and (-ms-high-contrast: none) {
            .form-select {
                padding-right: 0.75rem;
            }
        }
    </style>
    <style>
        @import url(https://cdnjs.cloudflare.com/ajax/libs/MaterialDesign-Webfont/5.3.45/css/materialdesignicons.min.css);
    </style>
    {{-- <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <script>
    $(document).ready(function() {
      $('#credit-card-number').on('input', function() {
        var value = $(this).val();
        value = value.replace(/\s+/g, '').replace(/[^0-9]/gi, '');
        var matches = value.match(/\d{4,16}/g);
        var result = matches ? matches.join(' ') : '';
        $(this).val(result);
      });
    });
  </script> --}}
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <div>
        <section class="bg-white dark:bg-gray-900">
            <nav x-data="{ isOpen: false }" class="container mx-auto p-6 lg:flex lg:items-center lg:justify-between">
                <div class="flex items-center justify-between">
                    <div>

                        <a class="text-2xl font-bold text-gray-800 hover:text-gray-700 dark:text-white dark:hover:text-gray-300 lg:text-3xl"
                            href="#">Anime ToyShop</a>
                    </div>

                    <!-- Mobile menu button -->
                    <div class="flex lg:hidden">
                        <button x-cloak @click="isOpen  !isOpen" type="button"
                            class="text-gray-500 hover:text-gray-600 focus:text-gray-600 focus:outline-none dark:text-gray-200 dark:hover:text-gray-400 dark:focus:text-gray-400"
                            aria-label="toggle menu">
                            <svg x-show="!isOpen" xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none"
                                viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M4 8h16M4 16h16" />
                            </svg>

                            <svg x-show="isOpen" xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none"
                                viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                            </svg>
                        </button>
                    </div>
                </div>

                <!-- Mobile Menu open: "block", Menu closed: "hidden" -->
                <div x-cloak :class="[isOpen ? 'translate-x-0 opacity-100 ' : 'opacity-0 -translate-x-full']"
                    class="absolute inset-x-0 z-20 w-full bg-white px-6 py-4 shadow-md transition-all duration-300 ease-in-out dark:bg-gray-900 lg:relative lg:top-0 lg:mt-0 lg:flex lg:w-auto lg:translate-x-0 lg:items-center lg:bg-transparent lg:p-0 lg:opacity-100 lg:shadow-none lg:dark:bg-transparent">
                    <div class="lg:-px-8 flex flex-col space-y-4 lg:mt-0 lg:flex-row lg:space-y-0">
                        <a class="transform text-gray-700 transition-colors duration-300 hover:text-blue-500 dark:text-gray-200 dark:hover:text-blue-400 lg:mx-8"
                            href="{{ route('customer.welcome') }}">Home</a>
                        <a class="transform text-gray-700 transition-colors duration-300 hover:text-blue-500 dark:text-gray-200 dark:hover:text-blue-400 lg:mx-8"
                            href="{{ route('customer.listofstores') }}">Stores</a>
                        <a class="transform text-gray-700 transition-colors duration-300 hover:text-blue-500 dark:text-gray-200 dark:hover:text-blue-400 lg:mx-8"
                            href="#">Pricing</a>
                        <a class="transform text-gray-700 transition-colors duration-300 hover:text-blue-500 dark:text-gray-200 dark:hover:text-blue-400 lg:mx-8"
                            href="#">Contact</a>
                        <a class="transform text-gray-700 transition-colors duration-300 hover:text-blue-500 dark:text-gray-200 dark:hover:text-blue-400 lg:mx-8"
                            href="{{route('customer.orderDetails')}}">Orders</a>
                        <a class="transform text-gray-700 transition-colors duration-300 hover:text-blue-500 dark:text-gray-200 dark:hover:text-blue-400 lg:mx-8"
                            href="#">Profile</a>
                        <a class="transform text-gray-700 transition-colors duration-300 hover:text-blue-500 dark:text-gray-200 dark:hover:text-blue-400 lg:mx-8"
                            href="{{ route('customer.logout') }}">Logout</a>
                    </div>

                </div>
            </nav>

    </div>

    <div class="min-w-screen min-h-screen bg-gray-50 py-5">
        <div class="px-5">

            <div class="mb-2">
                <h1 class="text-3xl md:text-5xl text-center font-bold text-gray-600">Checkout</h1>
            </div>
            @if (session()->has('payment'))
                <div class="max-w-lg mx-auto">
                    <div class="flex bg-green-200 rounded-lg p-4 mb-4 text-sm text-green-700 place-content-center"
                        role="alert">
                        <svg class="w-5 h-5 inline mr-3" fill="currentColor" viewBox="0 0 20 20"
                            xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd"
                                d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z"
                                clip-rule="evenodd"></path>
                        </svg>
                        <div class="">
                            <span class="font-bold">Success!</span> {{ session()->get('payment') }}
                        </div>
                    </div>
                </div>
            @endif
            @if (session()->has('error_payment'))
                <div class="max-w-lg mx-auto">
                    <div class="flex bg-red-200 rounded-lg p-4 mb-4 text-sm text-red-700 place-content-center"
                        role="alert">
                        <svg class="w-5 h-5 inline mr-3" fill="currentColor" viewBox="0 0 20 20"
                            xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd"
                                d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z"
                                clip-rule="evenodd"></path>
                        </svg>
                        <div class="">
                            <span class="font-bold">Warning!</span> {{ session()->get('error_payment') }}
                        </div>
                    </div>
                </div>
            @endif
        </div>
        <form action="{{ route('customer.postpayment') }}" method="POST">
            @csrf

            <div class="w-full bg-white border-t border-b border-gray-200 px-5 py-10 text-gray-800">
                <div class="w-full">
                    <div class="-mx-3 md:flex items-start">

                        <div class="px-3 md:w-7/12 lg:pr-10">
                            @foreach ($payment_s as $payment)
                                {{-- @php dd($payment_s); @endphp --}}
                                <div class="w-full mx-auto text-gray-800 font-light mb-6 border-b border-gray-200 pb-6">
                                    <div class="w-full flex items-center">

                                        <div class="overflow-hidden rounded-lg w-24 h-24 bg-gray-50 border border-gray-200">
                                            <img src="{{ asset('prod_images/' . $payment->prod_image) }}" alt="">
                                        </div>

                                        
                                        <input type="hidden" name="checkout_id[{{ $payment->checkout_id }}]"
                                            value="{{ $payment->checkout_id }}" />

                                        <input type="hidden" name="cart_id[{{ $payment->checkout_id }}]"
                                            value="{{ $payment->product_id }}" />
                                        <input type="hidden" name="quantity[{{ $payment->checkout_id }}]"
                                            value="{{ $payment->quantity }}" />
                                        <input type="hidden" name="payment_date[{{ $payment->checkout_id }}]"
                                            value="{{ date('Y-m-d') }}" />
                                        <input type="hidden" name="price[{{ $payment->checkout_id }}]"
                                            value="{{ $payment->total }}" />

                                        <div class="flex-grow pl-3">
                                            <h6 class="font-semibold uppercase text-gray-600">{{ $payment->product_name }}
                                            </h6>
                                            <p class="text-gray-400 font-bold">
                                                x{{ $payment->quantity }}{{ ' (' }}<span>{{ $payment->total }}{{ ') ' }}</span>
                                            </p>
                                        </div>
                                        <div>
                                            <span
                                                class="font-semibold text-gray-600 text-xl">${{ $payment->quantity * $payment->total }}</span><span
                                                class="font-semibold text-gray-600 text-sm">.00</span>
                                        </div>

                                    </div>
                                </div>
                            @endforeach

                            <div class="mb-6 pb-6 border-b border-gray-200 md:border-none text-gray-800 text-xl">
                                <div class="w-full flex items-center">
                                    <div class="flex-grow">
                                        <span class="text-gray-600">Total</span>
                                    </div>
                                    <div class="pl-3">
                                        <span class="font-semibold text-gray-400 text-sm">AUD</span> <span
                                            class="font-semibold">$ {{ $finaltotal }}</span>
                                    </div>
                                </div>
                            </div>
                        </div>


                        <div class="px-3 md:w-5/12">


                            <div
                                class="w-full mx-auto rounded-lg bg-white border border-gray-200 p-3 text-gray-800 font-light mb-6">
                                <div class="w-full flex mb-3 items-center">
                                    <div class="w-32">
                                        <span class="text-gray-600 font-semibold">Contact Person</span>
                                    </div>
                                    <div class="flex-grow pl-3">
                                        <span>{{ $payee->customer_fname }}{{ ' ' }}{{ $payee->customer_lname }}</span>
                                    </div>
                                </div>
                                <div class="w-full flex mb-3 items-center">
                                    <div class="w-32">
                                        <span class="text-gray-600 font-semibold">Contact Number</span>
                                    </div>
                                    <div class="flex-grow pl-3">
                                        <span>{{ $payee->customer_contact }}</span>
                                    </div>
                                </div>
                                <div class="w-full flex items-center">
                                    <div class="w-32">
                                        <span class="text-gray-600 font-semibold">Billing Address</span>
                                    </div>
                                    <div class="flex-grow pl-3">
                                        <span>{{ $payee->customer_address }}</span>
                                    </div>
                                </div>
                            </div>
                            {{-- @php dd($checkout_id); @endphp --}}
                            <div
                                class="w-full mx-auto rounded-lg bg-white border border-gray-200 text-gray-800 font-light mb-6">
                                <div class="w-full p-3 border-b border-gray-200">
                                    <div class="mb-5">
                                        {{-- <label for="type1" class="flex items-center cursor-pointer">
                                    <input type="radio" class="form-radio h-5 w-5 text-indigo-500" name="type" id="type1" checked>
                                    <img src="https://leadershipmemphis.org/wp-content/uploads/2020/08/780370.png" class="h-6 ml-3">
                                </label> --}}
                                    </div>
                                    <div>
                                        <div class="mb-3">
                                            <label class="text-gray-600 font-semibold text-sm mb-2 ml-1">Name on
                                                card</label>
                                            <div>
                                                <input type="hidden" name="customer_id" value="{{ $customer_id }}" />
                                                {{-- <input type="hidden" name="checkout_id{{$checkout_id}}" value=""/> --}}
                                                <input name="cardname"
                                                    class="w-full px-3 py-2 mb-1 border border-gray-200 rounded-md focus:outline-none focus:border-indigo-500 transition-colors"
                                                    placeholder="ex. Hello Name" type="text" />
                                            </div>
                                        </div>
                                        <div class="mb-3">
                                            <label id=""
                                                class="text-gray-600 font-semibold text-sm mb-2 ml-1">Card number</label>
                                            <div>
                                                <input name="card_number" id="credit-card-number" maxlength="19"
                                                    class="w-full px-3 py-2 mb-1 border border-gray-200 rounded-md focus:outline-none focus:border-indigo-500 transition-colors"
                                                    placeholder="0000 0000 0000 0000" type="text" />
                                            </div>
                                        </div>
                                        <div class="mb-3 -mx-2 flex items-end">
                                            <div class="px-2 w-1/4">
                                                <label class="text-gray-600 font-semibold text-sm mb-2 ml-1">Expiration
                                                    date</label>
                                                <div>
                                                    <select name="expMonth"
                                                        class="form-select w-full px-3 py-2 mb-1 border border-gray-200 rounded-md focus:outline-none focus:border-indigo-500 transition-colors cursor-pointer">
                                                        <option value="1">January</option>
                                                        <option value="2">February</option>
                                                        <option value="3">March</option>
                                                        <option value="4">April</option>
                                                        <option value="5">May</option>
                                                        <option value="6">June</option>
                                                        <option value="7">July</option>
                                                        <option value="8">August</option>
                                                        <option value="9">September</option>
                                                        <option value="10">October</option>
                                                        <option value="11">November</option>
                                                        <option value="12">December</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="px-2 w-1/4">
                                                <select name="expYear"
                                                    class="form-select w-full px-3 py-2 mb-1 border border-gray-200 rounded-md focus:outline-none focus:border-indigo-500 transition-colors cursor-pointer">
                                                    <option value="2020">2020</option>
                                                    <option value="2021">2021</option>
                                                    <option value="2022">2022</option>
                                                    <option value="2023">2023</option>
                                                    <option value="2024">2024</option>
                                                    <option value="2025">2025</option>
                                                    <option value="2026">2026</option>
                                                    <option value="2027">2027</option>
                                                    <option value="2028">2028</option>
                                                    <option value="2029">2029</option>
                                                </select>
                                            </div>
                                            <div class="px-2 w-1/4">
                                                <label class="text-gray-600 font-semibold text-sm mb-2 ml-1">Security
                                                    code</label>
                                                <div>
                                                    <input name="cvv" maxlength="3"
                                                        class="w-full px-3 py-2 mb-1 border border-gray-200 rounded-md focus:outline-none focus:border-indigo-500 transition-colors"
                                                        placeholder="000" type="text" />
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>
                            <div>
                                <button type="submit"
                                    class="block w-full max-w-xs mx-auto bg-indigo-500 hover:bg-indigo-700 focus:bg-indigo-700 text-white rounded-lg px-3 py-2 font-semibold"><i
                                        class="mdi mdi-lock-outline mr-1"></i> PAY NOW</button>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </form>

    </div>
    <script>
        const cardNumberInput = document.getElementById("credit-card-number");
        cardNumberInput.addEventListener("input", formatCardNumber);

        function formatCardNumber() {
            let cardNumber = cardNumberInput.value;
            // Remove all non-numeric characters
            cardNumber = cardNumber.replace(/[^0-9]/g, "");
            let formattedCardNumber = "";
            // Format the card number in "0000 0000 0000 0000" format
            for (let i = 0; i < cardNumber.length; i++) {
                if (i % 4 == 0 && i != 0) {
                    formattedCardNumber += " ";
                }
                formattedCardNumber += cardNumber.charAt(i);
            }
            cardNumberInput.value = formattedCardNumber;
        }
    </script>
@endsection
