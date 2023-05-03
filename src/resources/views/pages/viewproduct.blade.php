@extends('layouts.app')

@section('content')
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

    <main class="relative min-h-screen w-full bg-white">
        <!-- component -->
        <div class="p-6" x-data="app">
            <header class="flex w-full justify-between">

                <a href="{{ route('login') }}">
                    <svg class="h-7 w-7 cursor-pointer text-gray-400 hover:text-gray-300" fill="currentColor"
                        viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg" stroke="currentColor">
                        {{-- <path stroke-width="1" fill-rule="evenodd"
                            d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                            clip-rule="evenodd"> </path> --}}
                    </svg>
                </a>

                <!-- buttons -->
                <div class="space-x-4">
                    <a href="{{ route('admin.home') }}" x-show="isLoginPage"
                        class="rounded-2xl border-b-2 border-b-gray-300 bg-black py-3 px-4 font-bold text-white ring-2 ring-gray-300 hover:bg-white hover:text-black hover:border-b-black active:translate-y-[0.125rem] active:border-b-gray-200">
                        HOME
                    </a>

                    <a href="{{ route('admin.addproduct') }}" x-show="isLoginPage"
                        class="rounded-2xl border-b-2 border-b-gray-300 bg-black py-3 px-4 font-bold text-white ring-2 ring-gray-300 hover:bg-white hover:text-black hover:border-b-black active:translate-y-[0.125rem] active:border-b-gray-200">
                        ADD PRODUCTS
                    </a>


                    {{-- <a href="" x-show="!isLoginPage"
                        class="rounded-2xl border-b-2 border-b-gray-300 bg-white py-3 px-4 font-bold text-blue-500 ring-2 ring-gray-300 hover:bg-gray-200 active:translate-y-[0.125rem] active:border-b-gray-200">
                        SIGN UP
                    </a> --}}
                </div>
            </header>
            <!-- component -->
            <!-- component -->
            <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.min.js" defer></script>
            <div class="w-full text-gray-700 bg-transparent mt-10 md-5 dark-mode:text-gray-200 dark-mode:bg-gray-800">
                <div x-data="{ open: false }"
                    class="flex flex-col max-w-screen-xl px-4 mx-auto md:items-center md:justify-between md:flex-row md:px-6 lg:px-8">
                    <div class="p-4 flex flex-row items-center justify-between">

                        <!-- component -->

                        {{--  --}}
                        <button class="md:hidden rounded-lg focus:outline-none focus:shadow-outline" @click="open = !open">
                            <svg fill="currentColor" viewBox="0 0 20 20" class="w-6 h-6">
                                <path x-show="!open" fill-rule="evenodd"
                                    d="M3 5a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 10a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM9 15a1 1 0 011-1h6a1 1 0 110 2h-6a1 1 0 01-1-1z"
                                    clip-rule="evenodd"></path>
                                <path x-show="open" fill-rule="evenodd"
                                    d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                                    clip-rule="evenodd"></path>
                            </svg>
                        </button>
                    </div>
                    <nav :class="{ 'flex': open, 'hidden': !open }"
                        class="flex-col flex-grow pb-4 md:pb-0 hidden md:flex md:justify-end md:flex-row">

                        {{-- Search bar --}}
                        <div
                            class="relative   rounded-2xl bg-transparent pb-20  shadow-xl ring-1 ring-gray-900/5 sm:my-auto sm:max-w-lg sm:px-10">
                            <div class="my-auto max-w-md">
                                <form action="{{ route('admin.search') }}" method="GET" class="relative my-auto w-max ">
                                    <input type="search" name="search"
                                        class="peer cursor-pointer relative z-10 h-10 w-8 rounded-full border bg-transparent pl-12 outline-none focus:w-full 
                  focus:cursor-text focus:border-black focus:pl-16 focus:pr-4 text-black" />
                                    <svg xmlns="http://www.w3.org/2000/svg"
                                        class="absolute inset-y-0 my-auto h-8 w-12 border-r border-transparent stroke-black px-3.5 peer-focus:border-black peer-focus:stroke-black"
                                        fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                                    </svg>
                                </form>
                            </div>
                        </div>

                        {{-- Price Range --}}
                        <form action="{{ route('admin.filterprice') }}" method="GET">
                            <div x-data="range()" x-init="mintrigger();
                            maxtrigger()" class="relative max-w-xl w-60 py-2 ">
                                <div>
                                    <input type="range" name="" value="{{ $min_price ?? 0 }}" step="100"
                                        x-bind:min="min" x-bind:max="max" x-on:input="mintrigger"
                                        x-model="minprice"
                                        class="absolute pointer-events-none appearance-none z-20 h-2 w-full opacity-0 cursor-pointer">

                                    <input type="range" name="" value="{{ $max_price ?? 10000 }}" step="100"
                                        x-bind:min="min" x-bind:max="max" x-on:input="maxtrigger"
                                        x-model="maxprice"
                                        class="absolute pointer-events-none appearance-none z-20 h-2 w-full opacity-0 cursor-pointer">

                                    <div class="relative z-10 h-2">
                                        <div class="absolute z-10 left-0 right-0 bottom-0 top-0 rounded-md bg-gray-200">
                                        </div>
                                        <div class="absolute z-20 top-0 bottom-0 rounded-md bg-black"
                                            x-bind:style="'right:' + maxthumb + '%; left:' + minthumb + '%'"></div>
                                        <div class="absolute z-30 w-6 h-6 top-0 left-0 bg-black rounded-full -mt-2 -ml-1"
                                            x-bind:style="'left: ' + minthumb + '%'"></div>
                                        <div class="absolute z-30 w-6 h-6 top-0 right-0 bg-black rounded-full -mt-2 -mr-3"
                                            x-bind:style="'right: ' + maxthumb + '%'"></div>
                                    </div>
                                </div>

                                <div class="flex justify-between items-center py-5">
                                    <div>
                                        <p class="uppercase px-3 py-2 border border-none rounded w-24 text-center">from
                                        </p>
                                        <input type="text" name="min_price" value="{{ $min_price ?? 0 }}" maxlength="5"
                                            x-on:input="mintrigger" x-model="minprice"
                                            class="px-3 py-2 border border-black     rounded w-24 text-center">
                                    </div>
                                    <div>
                                        <p class="uppercase px-3 py-2 border border-none rounded w-24 text-center">to
                                        </p>
                                        <input type="text" name="max_price" value="{{ $max_price ?? 10000 }}"
                                            maxlength="5" x-on:input="maxtrigger" x-model="maxprice"
                                            class="px-3 py-2 border border-black rounded w-24 text-center">
                                    </div>
                                </div>
                                <div class="px-24 w-20">
                                    <button type="submit"
                                        class="bg-black hover:bg-slate-200 hover:text-black text-white font-bold py-2 px-4 rounded">Filter
                                    </button>
                                </div>
                            </div>
                        </form>
                        {{-- Category --}}
                        <div @click.away="open = false" class="relative" x-data="{ open: false }">
                            <button @click="open = !open"
                                class="flex flex-row items-center w-full px-4 py-2 mt-2 text-sm font-semibold text-left bg-transparent rounded-lg dark-mode:bg-transparent dark-mode:focus:text-white dark-mode:hover:text-white dark-mode:focus:bg-gray-600 dark-mode:hover:bg-gray-600 md:w-auto md:inline md:mt-0 md:ml-4 hover:text-gray-900 focus:text-gray-900 hover:bg-gray-200 focus:bg-gray-200 focus:outline-none focus:shadow-outline">
                                <span class="uppercase">filter by category </span>
                                <svg fill="currentColor" viewBox="0 0 20 20"
                                    :class="{ 'rotate-180': open, 'rotate-0': !open }"
                                    class="inline w-4 h-4 mt-1 ml-1 transition-transform duration-200 transform md:-mt-1">
                                    <path fill-rule="evenodd"
                                        d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                        clip-rule="evenodd">
                                    </path>
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

                                    <form action="{{ route('admin.filtercategory') }}" method="GET">
                                        <div class="flex flex-col justify-between">
                                            @foreach (config('const.CATEGORY_LIST') as $key => $category)
                                                <label for="category_{{ $key }}" class="cursor-pointer">
                                                    <div
                                                        class="content-center font-bold rounded-2xl bg-white text-black py-2 px-8 ring-2 ring-gray-200 focus-within:ring-blue-400">
                                                        <div
                                                            class="rounded-2xl flex space-x-4 w-32 bg-white pr-6 ring-2 ring-gray-200 focus-within:ring-blue-400">
                                                            <input type="checkbox" name="category[]"
                                                                value="{{ $key }}"
                                                                id="category_{{ $key }}" placeholder=""
                                                                class="my-3 border-none bg-transparent outline-none focus:outline-none"
                                                                {{ in_array($key, $category_filter ?? []) ? 'checked' : '' }} />
                                                            <p class="pt-1"><span>{{ $category }}</span></p>
                                                        </div>
                                                    </div>
                                                </label>
                                            @endforeach
                                            <button type="submit"
                                                class="bg-black hover:bg-slate-200 hover:text-black text-white font-bold py-2 px-4 rounded">Filter
                                            </button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </nav>
                </div>
            </div>

            <!-- component -->
            <div class="overflow-hidden rounded-lg border border-gray-200 shadow-md m-5">
                <table class="w-full border-collapse bg-white text-left text-base text-gray-500">
                    <thead class="bg-black text-white">
                        <tr>
                            <th scope="col" class="px-6 py-4 font-medium text-white "> Image </th>
                            <th scope="col" class="px-6 py-4 font-medium text-white "> Name </th>
                            <th scope="col" class="px-6 py-4 font-medium text-white"> Price </th>
                            <th scope="col" class="px-6 py-4 font-medium text-white"> Quantity </th>
                            <th scope="col" class="px-6 py-4 font-medium text-white"> Category </th>
                            <th scope="col" class="px-6 py-4 font-medium text-white"> Description </th>
                            <th scope="col" class="px-6 py-4 font-medium text-white"> Created At </th>
                            <th scope="col" class="px-6 py-4 font-medium text-white"> Status </th>
                            <th scope="col" class="px-6 py-4 font-medium text-white"> Action </th>
                        </tr>
                    </thead>
                    @foreach ($products as $product)
                        <tbody class="divide-y divide-gray-100 border-t border-gray-100">
                            <tr class="hover:bg-gray-200">
                                <th class="flex gap-3 px-6 py-4 font-normal text-gray-900">
                                    <div class="relative h-24 w-24 rounded-full bg-gray-400">
                                        {{-- fetch image from database --}}

                                        @if ($product->prod_image != '')
                                            <img class="h-full w-full  rounded-full object-fit object-center border-2 border-black"
                                                src="{{ asset('prod_images/' . $product->prod_image) }}" alt="">
                                        @endif


                                    </div>

                                </th>
                                <td class="px-6 py-4 ">
                                    <div class="text-base ">
                                        <div class="font-medium text-gray-700 capitalize">{{ $product->product_name }}
                                        </div>
                                    </div>
                                </td>
                                <td class="px-6 py-4">
                                    <div class="text-base">
                                        <div class="font-medium text-gray-700">{{ $product->product_price }}</div>
                                    </div>
                                </td>

                                <td class="px-6 py-4">
                                    <div class="text-base">
                                        <div class="font-medium text-gray-700">{{ $product->product_quantity }}</div>
                                    </div>
                                </td>

                                <td class="px-6 py-4">
                                    {{-- <div class="text-base">
                                        <div class="font-medium text-gray-700">
                                            {{ $product->categories->count() > 0 ? $product->categories->name() : 'No Category' }}
                                        </div>
                                    </div> --}}
                                    {{-- category --}}
                                    <div class="text-base">
                                        <div class="font-medium text-gray-700">
                                           @if ($product->categories->count() > 0)
                                                @foreach ($product->categories as $category)
                                                    <span class="bg-gray-200 rounded-full px-2 py-1 text-sm font-semibold text-gray-700 mr-2">{{ $category->name }}</span>
                                                @endforeach
                                            @else
                                                <span class="bg-gray-200 rounded-full px-2 py-1 text-sm font-semibold text-gray-700 mr-2">No Category</span>
                                            @endif
                                        </div>
                                </td>
                                <td class="px-6 py-4">
                                    <div class="text-base">
                                        <div class="font-medium text-gray-700">{{ $product->product_description }}</div>
                                    </div>
                                </td>
                                <td class="px-6 py-4">
                                    <div class="text-base">
                                        <div class="font-medium text-gray-700">{{ $product->created_at }}</div>
                                    </div>
                                </td>

                                <td class="px-6 py-4">
                                    <div class="text-base">
                                        <div class="font-medium text-gray-700 uppercase ">
                                            {{ $product->prod_status == 0 ? 'Unpublished' : 'Published' }}
                                        </div>
                                    </div>
                                </td>

                                <td class="px-6 py-4">
                                    <form action="{{ route('admin.deleteproduct') }}" method="POST"
                                        onsubmit="return confirm('Are you sure you want to delete this product?');"
                                        style="display: inline-block;">
                                        @csrf
                                        <div class="flex space-x-2">

                                            <button x-data="{ tooltip: 'Delete' }" type="submit">
                                                <input type="hidden" name="id" value="{{ $product->id }}">
                                                <svg xmlns="http://www.w3.org/2000/svg" fill="none"
                                                    viewBox="0 0 24 24" stroke-width="1.5" stroke="red"
                                                    class="h-6 w-6" x-tooltip="tooltip">
                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                        d="M14.74 9l-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 01-2.244 2.077H8.084a2.25 2.25 0 01-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 00-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 013.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 00-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 00-7.5 0" />
                                                </svg>
                                            </button>
                                    </form>

                                    <a x-data="{ tooltip: 'Edite' }" href="{{ route('admin.editproduct', $product->id) }}">
                                        {{-- <input type="hidden" name="id" value="{{$product->id}}"> --}}
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                            stroke-width="1.5" stroke="green" class="h-6 w-6" x-tooltip="tooltip">
                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                d="M16.862 4.487l1.687-1.688a1.875 1.875 0 112.652 2.652L6.832 19.82a4.5 4.5 0 01-1.897 1.13l-2.685.8.8-2.685a4.5 4.5 0 011.13-1.897L16.863 4.487zm0 0L19.5 7.125" />
                                        </svg>
                                    </a>
                                </td>
                            </tr>
                        </tbody>
                    @endforeach
                </table>

            </div>
            <div class="m-10">
                {{ $products->links('pagination::tailwind') }}

            </div>
            <script>
                function range() {
                    return {
                        minprice: parseInt("{{ $min_price ?? 10 }}"),
                        maxprice: parseInt("{{ $max_price ?? 10000 }}"),
                        min: 10,
                        max: 10000,
                        minthumb: parseInt("{{ $min_price ?? 10 }}"),
                        maxthumb: parseInt("{{ $max_price ?? 10000 }}"),

                        mintrigger() {
                            this.minprice = Math.min(this.minprice, this.maxprice - 100);
                            this.minthumb = ((this.minprice - this.min) / (this.max - this.min)) * 100;
                        },
                        maxtrigger() {
                            this.maxprice = Math.max(this.maxprice, this.minprice + 100);
                            this.maxthumb = 100 - (((this.maxprice - this.min) / (this.max - this.min)) * 100);
                        },
                    }
                }
            </script>
        @endsection
