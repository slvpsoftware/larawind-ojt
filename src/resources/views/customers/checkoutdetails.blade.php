@extends('layouts.app')
@section('content')
    <!-- component -->
    <script src="//unpkg.com/alpinejs" defer></script>
    <style>
        @import url(https://cdnjs.cloudflare.com/ajax/libs/MaterialDesign-Webfont/5.3.45/css/materialdesignicons.min.css);
    </style>

    <main>
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
                            href="#">Profile</a>
                        <a class="transform text-gray-700 transition-colors duration-300 hover:text-blue-500 dark:text-gray-200 dark:hover:text-blue-400 lg:mx-8"
                            href="{{ route('customer.logout') }}">Logout</a>
                    </div>

                </div>
            </nav>

            <div class="container mx-auto px-6 py-16 text-center ">
                {{-- <div class="mx-auto max-w-lg">
                    <h1 class="text-3xl font-bold text-gray-800 dark:text-white lg:text-4xl mb-8 uppercase">My Cart</h1>
                 
                    <table class="flex flex-col space-x-4 w-full">
                      
                        
                    </table>
                </div> --}}
                <div class="h-screen bg-white pt-20">
                    <h1 class="mb-10 text-center text-2xl font-bold">Checked Out Items</h1>
                    <div class="mx-auto max-w-5xl justify-center px-6 md:flex md:space-x-6 xl:px-0">

                        <div class="rounded-lg md:w-2/3">
                           

                            <form action="{{route('customer.payment')}}" method="GET">
                                @csrf
                               @foreach($mycheckout as $checkoutitem)
                                    {{-- @php dd($item)@endphp --}}
                                    <input type="hidden" name="cart_id" value="">
                                    <div
                                        class="justify-between mb-6 rounded-lg bg-gray-200 p-6 shadow-md sm:flex sm:justify-start">
                                        <img src="{{ asset('prod_images/' . $checkoutitem->prod_image) }}" alt="product-image"
                                            class="w-full rounded-lg sm:w-40" />
                                        <div class="sm:ml-4 sm:flex sm:w-full sm:justify-between">

                                            <div class="mt-5 sm:mt-0 text-align-left">
                                                <h2 class="text-lg font-bold text-gray-900">
                                                    {{ $checkoutitem->product_name }}{{ "( $" }}{{ $checkoutitem->product_price }}{{ ')' }}
                                                </h2>
                                                <input type="hidden" name="product_id[{{$checkoutitem->id}}]" value="{{ $checkoutitem->id }}">
                                                <input type="hidden" name="price_total[{{$checkoutitem->id}}]" value="{{ $checkoutitem->product_price }}">

                                                <p class="mt-1 text-xs text-gray-700">{{ $checkoutitem->product_description }}S</p>
                                            </div>
                                            <div
                                                class="mt-4 flex justify-between sm:space-y-6 sm:mt-0 sm:block sm:space-x-6">
                                                <div>

                                                    <div
                                                        class="mt-4 flex justify-between sm:space-y-6 sm:mt-0 sm:block sm:space-x-6">
                                                        <div>
                                                            <div>
                                                                <label for="">Quantity:</label>
                                                                <div>
                                                                    <input
                                                                        class="w-10 bg-slate-200 py-1 text-center border border-gray-400 rounded-none appearance-none focus:outline-none"
                                                                        type="text" id=""
                                                                        name="" value="{{ $checkoutitem->quantity }}"
                                                                        min="1" step="1" inputmode="numeric"
                                                                        pattern="\\d*"
                                                                        readonly
                                                                        onchange="">
                                                                        <input type="hidden" name="" value="">
                                                                        <input type="hidden" name="p" value="">
                                                                        {{-- Final Quantity --}}
                                                                        <input type="hidden" name="}]" value="1"
                                                                        id="">
                                                                </div>
                                                                <p>Total: $ {{ $checkoutitem->total * $checkoutitem->quantity }}</p>
                                                                </p>
                                                            </div>
                                                        </div>
                                                    </div>

                                                </div>

                                                <div class="flex items-center space-x-4">
                                                  
                                                      
                                                  

                                                </div>
                                            </div>

                                        </div>
                                    </div>
                               @endforeach
                        </div>

                        <!-- Sub total -->
                        <div class="mt-6 h-full rounded-lg border bg-white p-6 shadow-md md:mt-0 md:w-1/3">
                            <div class="flex justify-between">
                                <p class="text-lg font-bold">Total</p>
                                <div class="">
                                    <p id="final-total">${{" "}}{{$finaltotal}}</p>
                                    
                                    {{-- Final total input --}}
                                    <input type="hidden" name="final_total_input" id="final-total-input">
                                    <p id="demo"></p>

                                    <p class="text-sm text-gray-700">including VAT</p>
                                </div>
                            </div>
                            <button type="submit"
                                class="mt-6 w-full rounded-md bg-blue-500 py-1.5 font-medium text-blue-50 hover:bg-blue-600">
                                <i class="mdi mdi-credit-card -ml-2 mr-2"></i>Pay Now</button>
                        </div>
                    </form>
                    </div>
                </div>
            </div>
            <div class="m-10">
                {{ $mycheckout->links('pagination::tailwind') }}

            </div>
        </section>

        <section class="bg-white dark:bg-gray-900">
            <div class="container mx-auto px-6 py-10">

                <div class="mt-8 grid grid-cols-1 gap-8 md:grid-cols-2 xl:mt-12 xl:grid-cols-3 xl:gap-12">

                </div>
            </div>

        </section>

        <footer class="bg-white dark:bg-gray-900">
            <div class="container mx-auto px-6 py-12">
                <div class="md:-mx-3 md:flex md:items-center md:justify-between">

                    <div class="mt-6 shrink-0 md:mx-3 md:mt-0 md:w-auto">

                    </div>
                </div>

                <hr class="my-6 border-gray-200 dark:border-gray-700 md:my-10" />

                <div class="grid grid-cols-1 gap-6 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4">
                    <div>
                        <p class="font-semibold text-gray-800 dark:text-white">Quick Link</p>

                        <div class="mt-5 flex flex-col items-start space-y-2">
                            <a href="#"
                                class="text-gray-600 transition-colors duration-300 hover:text-blue-500 hover:underline dark:text-gray-300 dark:hover:text-blue-400">Home</a>
                            <a href="#"
                                class="text-gray-600 transition-colors duration-300 hover:text-blue-500 hover:underline dark:text-gray-300 dark:hover:text-blue-400">Who
                                We Are</a>
                            <a href="#"
                                class="text-gray-600 transition-colors duration-300 hover:text-blue-500 hover:underline dark:text-gray-300 dark:hover:text-blue-400">Our
                                Philosophy</a>
                        </div>
                    </div>

                    <div>
                        <p class="font-semibold text-gray-800 dark:text-white">Industries</p>

                        <div class="mt-5 flex flex-col items-start space-y-2">
                            <a href="#"
                                class="text-gray-600 transition-colors duration-300 hover:text-blue-500 hover:underline dark:text-gray-300 dark:hover:text-blue-400">Retail
                                & E-Commerce</a>
                            <a href="#"
                                class="text-gray-600 transition-colors duration-300 hover:text-blue-500 hover:underline dark:text-gray-300 dark:hover:text-blue-400">Information
                                Technology</a>
                            <a href="#"
                                class="text-gray-600 transition-colors duration-300 hover:text-blue-500 hover:underline dark:text-gray-300 dark:hover:text-blue-400">Finance
                                & Insurance</a>
                        </div>
                    </div>

                    <div>
                        <p class="font-semibold text-gray-800 dark:text-white">Services</p>

                        <div class="mt-5 flex flex-col items-start space-y-2">
                            <a href="#"
                                class="text-gray-600 transition-colors duration-300 hover:text-blue-500 hover:underline dark:text-gray-300 dark:hover:text-blue-400">Translation</a>
                            <a href="#"
                                class="text-gray-600 transition-colors duration-300 hover:text-blue-500 hover:underline dark:text-gray-300 dark:hover:text-blue-400">Proofreading
                                & Editing</a>
                            <a href="#"
                                class="text-gray-600 transition-colors duration-300 hover:text-blue-500 hover:underline dark:text-gray-300 dark:hover:text-blue-400">Content
                                Creation</a>
                        </div>
                    </div>

                    <div>
                        <p class="font-semibold text-gray-800 dark:text-white">Contact Us</p>

                        <div class="mt-5 flex flex-col items-start space-y-2">
                            <a href="#"
                                class="text-gray-600 transition-colors duration-300 hover:text-blue-500 hover:underline dark:text-gray-300 dark:hover:text-blue-400">+880
                                768 473 4978</a>
                            <a href="#"
                                class="text-gray-600 transition-colors duration-300 hover:text-blue-500 hover:underline dark:text-gray-300 dark:hover:text-blue-400">info@merakiui.com</a>
                        </div>
                    </div>
                </div>

                <hr class="my-6 border-gray-200 dark:border-gray-700 md:my-10" />

                <div class="flex flex-col items-center justify-between sm:flex-row">
                    <a href="#"
                        class="text-2xl font-bold text-gray-800 transition-colors duration-300 hover:text-gray-700 dark:text-white dark:hover:text-gray-300">Anime
                        ToyShop</a>

                    <p class="mt-4 text-sm text-gray-500 dark:text-gray-300 sm:mt-0">© Copyright 2021. All Rights Reserved.
                    </p>
                </div>
            </div>
        </footer>
    </main>

    {{-- <script>
        function decrementQty(itemId) {
            const qtyInput = document.getElementById(`qty-${itemId}`);
            let qtyValue = parseInt(qtyInput.value);

            if (qtyValue > 1) {
                qtyValue--;
                qtyInput.value = qtyValue;
                calculateTotal(itemId, {{ $item->product_price }});
            }
        }

        function incrementQty(itemId) {
            const qtyInput = document.getElementById(`qty-${itemId}`);
            let qtyValue = parseInt(qtyInput.value);

            qtyValue++;
            qtyInput.value = qtyValue;
            calculateTotal(itemId, {{ $item->product_price }});
        }

        function calculateTotal(itemId, itemPrice) {
            const qtyInput = document.getElementById(`qty-${itemId}`);
            const qtyValue = parseInt(qtyInput.value);
            const total = qtyValue * itemPrice;
            document.getElementById(`total-${itemId}`).textContent = total.toFixed(2);
        }
        // function finalTotal() {
        //     const total = document.getElementById('total').textContent;
        //     document.getElementById('final-total').textContent = total;
        // }
        let total = 0;

        // function calculateTotal(itemId, itemPrice) {
        //     const qtyInput = document.getElementById(`qty-${itemId}`);
        //     const qtyValue = parseInt(qtyInput.value);
        //     const subtotal = qtyValue * itemPrice;
        //     document.getElementById(`total-${itemId}`).textContent = subtotal.toFixed(2);

        //     // Update the total variable
        //     total = total + itemPrice;
        // }
    </script> --}}
    <script>
        let total = 0;

        function calculateTotal(itemId, itemPrice) {
            const qtyInput = document.getElementById(`qty-${itemId}`);
            const qtyValue = parseInt(qtyInput.value);
            const subtotal = qtyValue * itemPrice;
            document.getElementById(`total-${itemId}`).textContent = subtotal.toFixed(2);

            const finalQtyInput = document.getElementById(`final-qty-${itemId}`);
            finalQtyInput.value = qtyValue; // Assign the quantity value to the final-qty input
            console.log(finalQtyInput.value);

            // Update the total variable
            total = 0;
            document.querySelectorAll('[id^="total-"]').forEach(function(el) {
                total += parseFloat(el.textContent);
            });
            document.getElementById('final-total').textContent = total.toFixed(2);

            // Update the final total input value
            const finalTotalInput = document.getElementById('final-total-input');
            finalTotalInput.value = total.toFixed(2);

        }


        // function decrementQty(itemId, itemPrice) {
        //     const qtyInput = document.getElementById(`qty-${itemId}`);
        //     let qtyValue = parseInt(qtyInput.value);

        //     if (qtyValue > 1) {
        //         qtyValue--;
        //         qtyInput.value = qtyValue;
        //         calculateTotal(itemId, itemPrice);
        //     }
        // }

        // function incrementQty(itemId, itemPrice) {
        //     const qtyInput = document.getElementById(`qty-${itemId}`);
        //     let qtyValue = parseInt(qtyInput.value);

        //     qtyValue++;
        //     qtyInput.value = qtyValue;
        //     calculateTotal(itemId, itemPrice);
        // }
    </script>
@endsection
