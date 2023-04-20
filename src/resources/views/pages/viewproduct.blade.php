@extends('layouts.app')
@section('content')
    {{-- Style for Price Range --}}
    <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.min.js" defer></script>
    <style>
        input[type=range]::-webkit-slider-thumb {
            pointer-events: all;
            width: 24px;
            height: 24px;
            -webkit-appearance: none;
            /* @apply w-6 h-6 appearance-none pointer-events-auto; */
        }
    </style>
    <!-- component -->
    <main class="relative min-h-screen w-full bg-white">
        <!-- component -->
        <div class="p-6" x-data="app">
            <header class="flex w-full justify-between">
                {{-- <svg class="h-7 w-7 cursor-pointer text-gray-400 hover:text-gray-300" fill="currentColor"
                viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg" stroke="currentColor">
                <path stroke-width="1" fill-rule="evenodd"
                    d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                    clip-rule="evenodd"></path>
            </svg> --}}

                <a href="{{ route('add_product') }}">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="" viewBox="0 0 24 24" stroke-width="3.5" stroke="violet"
                        class="h-5 w-5 cursor-pointer">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M10.5 19.5L3 12m0 0l7.5-7.5M3 12h18" />
                    </svg>
                </a>

                <!-- buttons -->
                <div class="space-x-4">
                    <a href="{{ route('add_product') }}" x-show="isLoginPage"
                        class="rounded-2xl border-b-3 border-b-gray-300 py-3 px-4 font-bold text-violet-700 ring-2 ring-gray-300 hover:bg-violet-200 active:translate-y-[0.125rem] active:border-b-gray-200">
                        ADD PRODUCTS
                    </a>
                    <a href="{{ route('logout') }}" x-show="!isLoginPage"
                        class="rounded-2xl border-b-3 border-b-gray-300 py-3 px-4 font-bold text-violet-700 ring-2 ring-gray-300 hover:bg-violet-200 active:translate-y-[0.125rem] active:border-b-gray-200">
                        LOGOUT
                    </a>
                </div>

            </header>

            <script src="https://unpkg.com/@themesberg/flowbite@latest/dist/flowbite.bundle.js"></script>
            <!-- component -->
            <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.min.js" defer></script>
            <br>
            <div class="w-full text-gray-700 bg-white dark-mode:text-gray-200 dark-mode:bg-gray-800">

                <nav :class="{ 'flex': open, 'hidden': !open }"
                    class="flex-col flex-grow pb-4 md:pb-0 hidden md:flex md:justify-end md:flex-row">
                    <div class="my-auto max-w-md ps-6">

                        {{-- Search  --}}
                        <form action="{{ route('search') }}" method="GET" class="relative mx-auto me-8">
                            <input name="search" type="search"
                                class="peer cursor-pointer relative z-10 h-9 w-12  bg-transparent pl-12 outline-none focus:w-full focus:cursor-text focus:border-violet-900 focus:pl-16 focus:pr-4 " />
                            <svg xmlns="http://www.w3.org/2000/svg"
                                class="absolute inset-y-0 my-auto h-4 w-12 border-r border-transparent stroke-violet-900 px-3.5 peer-focus:border-violet-900 peer-focus:stroke-violet-900"
                                fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="3">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                            </svg>
                        </form>

                    </div>

                    {{-- Filter --}}
                    <div @click.away="open = false" class="relative" x-data="{ open: false }">

                        <button @click="open = !open"
                            class="flex flex-row items-center w-full px-4 py-2 mt-2 text-sm font-semibold text-left bg-transparent rounded-lg dark-mode:bg-transparent dark-mode:focus:text-white dark-mode:hover:text-white dark-mode:focus:bg-gray-600 dark-mode:hover:bg-gray-600 md:w-auto md:inline md:mt-0 md:ml-4 hover:text-gray-900 focus:text-gray-900 hover:bg-violet-200 focus:bg-violet-200 focus:outline-none focus:shadow-outline">
                            <span class="text-violet-900 ">FILTER</span>

                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20" stroke-width="1.5"
                                stroke="currentColor" class="w-3 h-3">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M12 3c2.755 0 5.455.232 8.083.678.533.09.917.556.917 1.096v1.044a2.25 2.25 0 01-.659 1.591l-5.432 5.432a2.25 2.25 0 00-.659 1.591v2.927a2.25 2.25 0 01-1.244 2.013L9.75 21v-6.568a2.25 2.25 0 00-.659-1.591L3.659 7.409A2.25 2.25 0 013 5.818V4.774c0-.54.384-1.006.917-1.096A48.32 48.32 0 0112 3z" />
                            </svg>


                        </button>

                        <div x-show="open" x-transition:enter="transition ease-out duration-100"
                            x-transition:enter-start="transform opacity-0 scale-95"
                            x-transition:enter-end="transform opacity-100 scale-100"
                            x-transition:leave="transition ease-in duration-75"
                            x-transition:leave-start="transform opacity-100 scale-100"
                            x-transition:leave-end="transform opacity-0 scale-95"
                            class="absolute right-0 w-full mt-2 origin-top-right rounded-md shadow-lg md:w-48">
                            <div class="px-2 py-2 bg-white rounded-md shadow dark-mode:bg-gray-800">

                                {{-- Price Range --}}

                                <div class="pb-2">
                                    <span class="text-violet-900 font-bold">Price Range</span>
                                </div>

                                <form action="{{ route('filterPrice') }}" method="GET">
                                    <div x-data="range()" x-init="mintrigger();
                                    maxtrigger()" class="relative max-w-sm">
                                        <div>
                                            <input type="range" value="{{ $minprice ?? 0 }}" step="5"
                                                x-bind:min="min" x-bind:max="max"
                                                x-on:input="mintrigger" x-model="minprice"
                                                class="absolute pointer-events-none appearance-none z-20 h-2 w-full opacity-0 cursor-pointer">

                                            <input type="range" value="{{ $maxprice ?? 10000 }}" step="5"
                                                x-bind:min="min" x-bind:max="max"
                                                x-on:input="maxtrigger" x-model="maxprice"
                                                class="absolute pointer-events-none appearance-none z-20 h-2 w-full opacity-0 cursor-pointer">

                                            <div class="relative z-10 h-1">

                                                <div
                                                    class="absolute z-10 left-0 right-0 bottom-0 top-0 rounded-md bg-violet-200">
                                                </div>

                                                <div class="absolute z-20 top-0 bottom-0 rounded-md bg-violet-500"
                                                    x-bind:style="'right:' + maxthumb + '%; left:' + minthumb + '%'"></div>

                                                <div class="absolute z-30 w-5 h-5 top-0 left-0 bg-violet-500 rounded-full -mt-2 -ml-1"
                                                    x-bind:style="'left: ' + minthumb + '%'"></div>

                                                <div class="absolute z-30 w-5 h-5 top-0 right-0 bg-violet-500 rounded-full -mt-2 -mr-3"
                                                    x-bind:style="'right: ' + maxthumb + '%'"></div>
                                            </div>
                                        </div>
                                        {{-- Input box for price range --}}
                                        <div class="flex justify-between items-center py-5">


                                            <div>
                                                <input name="minprice" value="{{ $minprice ?? 0 }}" type="text"
                                                    maxlength="5" x-on:input="mintrigger" x-model="minprice"
                                                    class=" border-gray-200 rounded w-20 text-center">

                                            </div>
                                            <div>
                                                <input type="text" value="{{ $maxprice ?? 10000 }}" name="maxprice"
                                                    maxlength="5" x-on:input="maxtrigger" x-model="maxprice"
                                                    class=" border-gray-200 rounded w-20 text-center">

                                            </div>
                                        </div>
                                        <div class="py-2 px-4">
                                            <button
                                                class=" px-4 py-2  text-sm font-semibold bg-transparent rounded-lg md:mt-0 text-white
                                  bg-violet-500 focus:outline-none focus:shadow-outline">Price
                                            </button>
                                        </div>
                                    </div>
                                </form>
                                <form action="{{ route('filterCategory') }}" method="GET">
                                    <div class="pb-2">
                                        <span class="text-violet-900 font-bold">Categories</span>
                                    </div>
                                    @foreach (config('const.CATEGORY_LIST') as $key => $category)
                                        <label for="category_{{ $key }}" class="cursor-pointer">
                                            <div class=" px-4 ring-2 ring-gray-200 focus-within:ring-blue-400">
                                                <input type="checkbox" name="category[]" value="{{ $key }}"
                                                    {{-- check if key is in catgeory_filter, if yes, return checked string --}}
                                                    {{ in_array($key, $category_filter ?? []) ? 'checked' : '' }} />
                                                {{ $category }}
                                            </div>
                                        </label>
                                    @endforeach
                                    <div class="py-2 px-4">
                                        <button
                                            class=" px-4 py-2  text-sm font-semibold bg-transparent rounded-lg md:mt-0 text-white
                                        bg-violet-500 focus:outline-none focus:shadow-outline">Filter
                                        </button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </nav>
            </div>
            <div class="overflow-hidden rounded-lg border border-gray-200 shadow-md m-5">
                <table class="w-full border-collapse bg-violet text-left text-sm text-white-500">
                    <thead class="bg-violet-600">
                        <tr>
                            <th scope="col" class="px-6 py-4 font-medium text-white">Image</th>
                            <th scope="col" class="px-6 py-4 font-medium text-white">Product Name</th>
                            <th scope="col" class="px-6 py-4 font-medium text-white">Price</th>
                            <th scope="col" class="px-6 py-4 font-medium text-white">Category</th>
                            <th scope="col" class="px-6 py-4 font-medium text-white">Description</th>
                            <th scope="col" class="px-6 py-4 font-medium text-white">Created At</th>
                            <th scope="col" class="px-6 py-4 font-medium text-white">Action</th>
                        </tr>
                    </thead>
                    @foreach ($product as $products)
                        <tbody class="divide-y divide-gray-100 border-t border-gray-100">

                            <tr class="hover:bg-gray-50">

                                {{-- Product Image --}}
                                <th class="flex gap-3 px-6 py-4 font-normal text-gray-900">
                                    <div class="relative h-20 w-20 rounded-full bg-violet-400">
                                        {{-- <img
              class="h-full w-full rounded-full object-cover object-center"
              src="https://images.unsplash.com/photo-1535713875002-d1d0cf377fde?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=2&w=256&h=256&q=80"
              alt=""
            /> --}}
                                        {{-- fetch image from database --}}
                                        @if ($products->prod_image != '')
                                            <img class="h-full w-full rounded-full object-cover object-center border-4 border-violet-400"
                                                src="{{ asset('product_images/' . $products->prod_image) }}"
                                                alt="">
                                        @endif
                                        <span
                                            class="absolute right-0 bottom-0 h-2 w-2 rounded-full bg-violet-400 ring ring-white"></span>
                                    </div>
                                </th>
                                <td class="px-6 py-4 text-violet-900">
                                    <span> {{ $products->prod_name }}</span>
                                </td>
                                <td class="px-6 py-4">
                                    <span
                                        class="inline-flex items-center gap-1 rounded-full bg-green-50 px-2 py-1 text-xs font-semibold text-green-600">
                                        <span class="h-1.5 w-1.5 rounded-full bg-green-600"></span>
                                        <h3>$ {{ $products->prod_price }}</h3>
                                    </span>
                                </td>
                                <td class="px-6 py-4">
                                    <span
                                        class="inline-flex items-center gap-1 rounded-full bg-green-50 px-2 py-1 text-xs font-semibold text-green-600">
                                        <span class="h-1.5 w-1.5 rounded-full bg-green-600"></span>
                                        {{-- {{Category Here}} --}}

                                        {{ $products->categories->count() > 0 ? $products->categories->first()->name : 'No Category' }}
                                    </span>
                                </td>
                                <td class="px-6 py-4">{{ $products->prod_description }}</td>
                                <td class="px-6 py-4">
                                    <div class="flex gap-2">
                                        <span
                                            class="inline-flex items-center gap-1 rounded-full bg-blue-50 px-2 py-1 text-xs font-semibold text-blue-600">
                                            {{ $products->created_at }}
                                        </span>

                                    </div>
                                </td>
                                <td class="px-6 py-4">
                                    <div class="flex">

                                        <form action={{ route('delete_product') }} method="POST"
                                            onsubmit="return confirm('Are you sure you want to delete this product?');"
                                            style="display: inline-block;">
                                            @csrf

                                            <input type="hidden" name="id" value="{{ $products->id }}">
                                            <button x-data="{ tooltip: 'Delete' }" type="submit">

                                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" color="red"
                                                    viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
                                                    class="h-6 w-6" x-tooltip="tooltip">
                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                        d="M14.74 9l-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 01-2.244 2.077H8.084a2.25 2.25 0 01-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 00-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 013.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 00-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 00-7.5 0" />
                                                </svg>
                                            </button>
                                        </form>

                                        <a x-data="{ tooltip: 'Edite' }" href="{{ route('edit_product', $products->id) }}">
                                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" color="green"
                                                viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
                                                class="h-6 w-6" x-tooltip="tooltip">
                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                    d="M16.862 4.487l1.687-1.688a1.875 1.875 0 112.652 2.652L6.832 19.82a4.5 4.5 0 01-1.897 1.13l-2.685.8.8-2.685a4.5 4.5 0 011.13-1.897L16.863 4.487zm0 0L19.5 7.125" />
                                            </svg>
                                        </a>
                                    </div>
                                </td>
                            </tr>
                        </tbody>
                    @endforeach

                </table>
                {{-- Pagination --}}
                <div class="row">
                    <div class="col-md-12  border-b-violet-900 py-3 px-4 font-bold">
                        {{ $product->links('pagination::tailwind') }}
                    </div>
                </div>
            </div>

            {{-- Script for Price Range --}}
            <script>
                function range() {
                    return {
                        minprice: parseInt("{{ $minprice ?? 0 }}"),
                        maxprice: parseInt("{{ $maxprice ?? 10000 }}"),
                        min: 100,
                        max: 10000,
                        minthumb: parseInt("{{ $minprice ?? 0 }}"),
                        maxthumb: parseInt("{{ $maxprice ?? 10000 }}"),

                        mintrigger() {
                            this.minprice = Math.min(this.minprice, this.maxprice - 500);
                            this.minthumb = ((this.minprice - this.min) / (this.max - this.min)) * 100;
                        },

                        maxtrigger() {
                            this.maxprice = Math.max(this.maxprice, this.minprice + 500);
                            this.maxthumb = 100 - (((this.maxprice - this.min) / (this.max - this.min)) * 100);
                        },
                    }
                }
            </script>
        @endsection
