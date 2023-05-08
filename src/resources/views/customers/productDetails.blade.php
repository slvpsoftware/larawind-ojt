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
                            href="{{ route('customer.listofstores') }}">Store</a>
                        <a class="transform text-gray-700 transition-colors duration-300 hover:text-blue-500 dark:text-gray-200 dark:hover:text-blue-400 lg:mx-8"
                            href="#">Pricing</a>
                        <a class="transform text-gray-700 transition-colors duration-300 hover:text-blue-500 dark:text-gray-200 dark:hover:text-blue-400 lg:mx-8"
                            href="#">Contact</a>
                        <a class="transform text-gray-700 transition-colors duration-300 hover:text-blue-500 dark:text-gray-200 dark:hover:text-blue-400 lg:mx-8"
                            href="{{ route('customer.mycart') }}">MyCart</a>
                        <a class="transform text-gray-700 transition-colors duration-300 hover:text-blue-500 dark:text-gray-200 dark:hover:text-blue-400 lg:mx-8"
                            href="#">Profile</a>
                        <a class="transform text-gray-700 transition-colors duration-300 hover:text-blue-500 dark:text-gray-200 dark:hover:text-blue-400 lg:mx-8"
                            href="{{ route('customer.logout') }}">Logout</a>
                    </div>

                </div>
            </nav>

            <div class="container mx-auto px-6 py-16 text-center">

                {{-- <div class="mx-auto max-w-lg">
                    <h1 class="text-3xl font-bold text-gray-800 dark:text-white lg:text-4xl">{{$product->product_name}}</h1>
                    <p class="mt-6 text-gray-500 dark:text-gray-300"></p>
                </div> --}}
                <style>
                    @import url(https://cdnjs.cloudflare.com/ajax/libs/MaterialDesign-Webfont/5.3.45/css/materialdesignicons.min.css);
                </style>
                @if (session()->has('added'))
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
                                <span class="font-bold">Success!</span> {{ session()->get('added') }}
                            </div>
                        </div>
                    </div>
                @endif
                
                <div class="min-w-full min-h-screen bg-black flex items-center p-5 lg:p-10 overflow-hidden relative">
                    <a href="{{ route('customer.viewproductbystore', $product->admin_id) }}"
                        class="absolute top-0 right-0 mt-5 mr-5 lg:mt-10 lg:mr-10 text-white text-2xl z-10">
                        <input type="hidden" name="admin_id" value="{{ $product->admin_id }}">
                        <i class="mdi mdi-close">Close</i>
                    </a>
                    {{-- <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="white" class="w-20 h-20">
                        <path fill-rule="evenodd" d="M12 2.25c-5.385 0-9.75 4.365-9.75 9.75s4.365 9.75 9.75 9.75 9.75-4.365 9.75-9.75S17.385 2.25 12 2.25zm-4.28 9.22a.75.75 0 000 1.06l3 3a.75.75 0 101.06-1.06l-1.72-1.72h5.69a.75.75 0 000-1.5h-5.69l1.72-1.72a.75.75 0 00-1.06-1.06l-3 3z" clip-rule="evenodd" />
                      </svg> --}}


                    <div
                        class="w-full max-w-6xl rounded bg-white shadow-xl p-10 lg:p-20 mx-auto text-gray-800 relative md:text-left">
                        <div class="md:flex items-center -mx-10">
                            <div class="w-full md:w-1/2 px-10 mb-10 md:mb-0">
                                <div class="relative">
                                    <img class="h-60 w-96 border-2 border-black rounded-lg object-cover"
                                        src="{{ asset('prod_images/' . $product->prod_image) }}" alt="" />
                                    {{-- <div class="border-4 border-yellow-200 absolute top-10 bottom-10 left-10 right-10 z-0">
                                    </div> --}}
                                </div>
                            </div>
                            <div class="w-full md:w-1/2 px-10">
                                <div class="mb-10">
                                    <h1 class="font-bold uppercase text-2xl mb-5">{{ $product->product_name }}</h1>
                                    <label for="desc"
                                        class="font-bold uppercase text-sm text-gray-600">Description</label>
                                    <p class="text-sm italic" id="desc">{{ $product->product_description }} </p>
                                </div>
                                <div>
                                    <div class="inline-block align-bottom mr-5">
                                        <span class="text-2xl leading-none align-baseline">$</span>
                                        <span
                                            class="font-bold text-5xl leading-none align-baseline">{{ $product->product_price }}</span>

                                    </div>

                                    <div class="inline-block align-bottom">
                                        <form action="{{ route('customer.addtocart', $product->id) }}" method="POST"
                                            onsubmit="return confirm('Are you sure to add {{ $product->product_name }} to cart?');">
                                            @csrf
                                            <button
                                                class="bg-black opacity-75 hover:opacity-100 text-white hover:text-white rounded-full px-10 py-2 font-semibold"><i
                                                    class="mdi mdi-cart -ml-2 mr-2"></i> Add To Cart</button>
                                        </form>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                {{-- <!-- BUY ME A BEER AND HELP SUPPORT OPEN-SOURCE RESOURCES -->
                <div class="flex items-end justify-end fixed bottom-0 right-0 mb-4 mr-4 z-10">
                    <div>
                        <a title="Buy me a beer" href="https://www.buymeacoffee.com/scottwindon" target="_blank"
                            class="block w-16 h-16 rounded-full transition-all shadow hover:shadow-lg transform hover:scale-110 hover:rotate-12">
                            <img class="object-cover object-center w-full h-full rounded-full"
                                src="https://i.pinimg.com/originals/60/fd/e8/60fde811b6be57094e0abc69d9c2622a.jpg" />
                        </a>
                    </div>
                </div> --}}
            </div>
        </section>



        <section class="bg-white dark:bg-gray-900">
            <div class="container mx-auto px-6 py-10">
                <div class="mt-8 grid grid-cols-1 gap-8 md:grid-cols-2 xl:mt-12 xl:grid-cols-3 xl:gap-12">

                </div>

                <div class="flex space-x-48 ">

                </div>
                </p>

            </div>
            </div>

            </div>
            </div>
        </section>


        <footer class="bg-white dark:bg-gray-900">
            <div class="container mx-auto px-6 py-12">

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
