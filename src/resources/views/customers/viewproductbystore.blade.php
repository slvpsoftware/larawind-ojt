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

                <div class="mx-auto max-w-lg">
                    <h1 class="text-3xl font-bold text-gray-800 dark:text-white lg:text-4xl">{{ $store->store_name }}</h1>
                    <p class="mt-6 text-gray-500 dark:text-gray-300">Lorem ipsum dolor sit, amet consectetur adipisicing
                        elit. Libero similique obcaecati illum mollitia.</p>
                </div>
            </div>
        </section>
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
        
        @if (session()->has('error'))
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
                        <span class="font-bold"></span>{{ session()->get('error') }}
                    </div>
                </div>
            </div>
        @endif


        <section class="bg-white dark:bg-gray-900">
            <div class="container mx-auto px-6 py-10">
                <div class="mt-8 grid grid-cols-1 gap-8 md:grid-cols-2 xl:mt-12 xl:grid-cols-3 xl:gap-12">
                    @foreach ($products as $key => $product)
                        <div>
                            <img class="h-96 w-96 border-2 border-black rounded-lg object-cover"
                                src="{{ asset('prod_images/' . $product->prod_image) }}" alt="" />
                            <div class="">
                                <hr>
                                <div class="flex space-x-60 py-3 ">
                                    <h1
                                        class=" text-center text-2xl font-semibold capitalize text-gray-800 dark:text-white">
                                        {{ $product->product_name }}
                                        <a href="{{route('customer.productDetails', $product->id)}}">
                                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"
                                                class="w-6 h-6">
                                                <path d="M12 15a3 3 0 100-6 3 3 0 000 6z" />
                                                <path fill-rule="evenodd"
                                                    d="M1.323 11.447C2.811 6.976 7.028 3.75 12.001 3.75c4.97 0 9.185 3.223 10.675 7.69.12.362.12.752 0 1.113-1.487 4.471-5.705 7.697-10.677 7.697-4.97 0-9.186-3.223-10.675-7.69a1.762 1.762 0 010-1.113zM17.25 12a5.25 5.25 0 11-10.5 0 5.25 5.25 0 0110.5 0z"
                                                    clip-rule="evenodd" />
                                            </svg>
                                        </a>

                                    </h1>
                                    <form action="{{ route('customer.addtocart', $product->id) }}" method="POST"
                                        onsubmit="return confirm('Are you sure to add {{ $product->product_name }} to cart?');">
                                        @csrf
                                        <input type="hidden" name="product_id" value="{{ $product->product_id }}">
                                        <button type="submit"
                                            class="bg-transparent hover:bg-transparent text-white font-bold py-2 px-4 rounded">
                                            <svg href="" xmlns="http://www.w3.org/2000/svg" color="red"
                                                viewBox="0 0 24 24" fill="currentColor" class="w-6 h-6">
                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                    d="M2.25 2.25a.75.75 0 000 1.5h1.386c.17 0 .318.114.362.278l2.558 9.592a3.752 3.752 0 00-2.806 3.63c0 .414.336.75.75.75h15.75a.75.75 0 000-1.5H5.378A2.25 2.25 0 017.5 15h11.218a.75.75 0 00.674-.421 60.358 60.358 0 002.96-7.228.75.75 0 00-.525-.965A60.864 60.864 0 005.68 4.509l-.232-.867A1.875 1.875 0 003.636 2.25H2.25zM3.75 20.25a1.5 1.5 0 113 0 1.5 1.5 0 01-3 0zM16.5 20.25a1.5 1.5 0 113 0 1.5 1.5 0 01-3 0z" />
                                            </svg>
                                        </button>
                                    </form>
                                    {{-- <a href="#" class="text-red-500 hover:text-red-600">
                                        <input type="hidden" name="product_id" value="{{ $product->id }}">
                                        <svg href="" xmlns="http://www.w3.org/2000/svg" color="red"
                                            viewBox="0 0 24 24" fill="currentColor" class="w-6 h-6">
                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                d="M2.25 2.25a.75.75 0 000 1.5h1.386c.17 0 .318.114.362.278l2.558 9.592a3.752 3.752 0 00-2.806 3.63c0 .414.336.75.75.75h15.75a.75.75 0 000-1.5H5.378A2.25 2.25 0 017.5 15h11.218a.75.75 0 00.674-.421 60.358 60.358 0 002.96-7.228.75.75 0 00-.525-.965A60.864 60.864 0 005.68 4.509l-.232-.867A1.875 1.875 0 003.636 2.25H2.25zM3.75 20.25a1.5 1.5 0 113 0 1.5 1.5 0 01-3 0zM16.5 20.25a1.5 1.5 0 113 0 1.5 1.5 0 01-3 0z" />
                                        </svg>
                                    </a> --}}
                                </div>
                                <p class="mt-2 text-sm">
                                    {{-- <span>Product Description:</span> --}}
                                    {{ $product->product_description }}</p>
                                <p class="mt-2 text-lg uppercase tracking-wider text-blue-500 dark:text-blue-400">
                                    {{-- <span>Product Quantity:</span> --}}
                                <div class="flex space-x-48 ">
                                    <span class="text-red-500 font-bold">${{ $product->product_price }}.00</span>
                                    <span class="text-red-500 font-bold ">QTY: {{ $product->product_quantity }}</span>
                                </div>
                                </p>
                                @foreach ($product->categories as $category)
                                    <span
                                        class="bg-gray-200 rounded-full px-2 py-1 text-sm font-semibold text-gray-700 mr-2">{{ $category->name }}</span>
                                @endforeach
                            </div>
                        </div>
                    @endforeach
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
