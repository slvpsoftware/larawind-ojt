@extends('layouts.app')
@section('content')
    <!-- component -->
    <script src="//unpkg.com/alpinejs" defer></script>

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
                        <button x-cloak @click="isOpen = !isOpen" type="button"
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
                            href="#">Stores</a>
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
                    <h1 class="mb-10 text-center text-2xl font-bold">Cart Items</h1>
                    <div class="mx-auto max-w-5xl justify-center px-6 md:flex md:space-x-6 xl:px-0">

                        <div class="rounded-lg md:w-2/3">

                            @foreach ($myproduct as $item)
                                <div
                                    class="justify-between mb-6 rounded-lg bg-gray-200 p-6 shadow-md sm:flex sm:justify-start">
                                    <img src="{{ asset('prod_images/' . $item->prod_image) }}" alt="product-image"
                                        class="w-full rounded-lg sm:w-40" />
                                    <div class="sm:ml-4 sm:flex sm:w-full sm:justify-between">

                                        <div class="mt-5 sm:mt-0">
                                            <h2 class="text-lg font-bold text-gray-900">{{ $item->product_name }}</h2>
                                            <p class="mt-1 text-xs text-gray-700">{{$item->product_description}}S</p>
                                        </div>
                                        <div class="mt-4 flex justify-between sm:space-y-6 sm:mt-0 sm:block sm:space-x-6">
                                            <label for="qty" class="mb-2   ">Quantity</label>
                                            <div class="flex items-center border-gray-100">
                                                
                                                <span
                                                    class="cursor-pointer rounded-l bg-gray-100 py-1 px-3.5 duration-100 hover:bg-blue-500 hover:text-blue-50">
                                                    - </span>
                                                   
                                                <input class="h-8 w-8 border bg-white text-center text-xs outline-none text-decoration-none"
                                                    type="number" value="0" id="qty" min="1"  />
                                                <span
                                                    class="cursor-pointer rounded-r bg-gray-100 py-1 px-3 duration-100 hover:bg-blue-500 hover:text-blue-50">
                                                    + </span>
                                            </div>
                                            <div class="flex items-center space-x-4">
                                                <p class="text-sm">$ {{ $item->product_price }}</p>
                                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"
                                                    fill="currentColor"
                                                    class="h-5 w-5 cursor-pointer duration-150 hover:text-red-500">>
                                                    <path fill-rule="evenodd"
                                                        d="M16.5 4.478v.227a48.816 48.816 0 013.878.512.75.75 0 11-.256 1.478l-.209-.035-1.005 13.07a3 3 0 01-2.991 2.77H8.084a3 3 0 01-2.991-2.77L4.087 6.66l-.209.035a.75.75 0 01-.256-1.478A48.567 48.567 0 017.5 4.705v-.227c0-1.564 1.213-2.9 2.816-2.951a52.662 52.662 0 013.369 0c1.603.051 2.815 1.387 2.815 2.951zm-6.136-1.452a51.196 51.196 0 013.273 0C14.39 3.05 15 3.684 15 4.478v.113a49.488 49.488 0 00-6 0v-.113c0-.794.609-1.428 1.364-1.452zm-.355 5.945a.75.75 0 10-1.5.058l.347 9a.75.75 0 101.499-.058l-.346-9zm5.48.058a.75.75 0 10-1.498-.058l-.347 9a.75.75 0 001.5.058l.345-9z"
                                                        clip-rule="evenodd" />
                                                </svg>


                                            </div>
                                        </div>

                                    </div>
                                </div>
                            @endforeach
                        </div>

                        <!-- Sub total -->
                        <div class="mt-6 h-full rounded-lg border bg-white p-6 shadow-md md:mt-0 md:w-1/3">
                            <div class="mb-2 flex justify-between">
                                <p class="text-gray-700">Subtotal</p>
                                <p class="text-gray-700">$129.99</p>
                            </div>
                            <div class="flex justify-between">
                                <p class="text-gray-700">Shipping</p>
                                <p class="text-gray-700">$4.99</p>
                            </div>
                            <hr class="my-4" />
                            <div class="flex justify-between">
                                <p class="text-lg font-bold">Total</p>
                                <div class="">
                                    <p class="mb-1 text-lg font-bold">$134.98 USD</p>
                                    <p class="text-sm text-gray-700">including VAT</p>
                                </div>
                            </div>
                            <button
                                class="mt-6 w-full rounded-md bg-blue-500 py-1.5 font-medium text-blue-50 hover:bg-blue-600">Check
                                out</button>
                        </div>
                    </div>
                </div>
                <div class="m-10">
                    {{ $myproduct->links('pagination::tailwind') }}

                </div>

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
@endsection
