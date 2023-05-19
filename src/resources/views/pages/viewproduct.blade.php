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
    <style>
        @import url(https://cdnjs.cloudflare.com/ajax/libs/MaterialDesign-Webfont/5.3.45/css/materialdesignicons.min.css);
    </style>
    <main class="relative min-h-screen w-full bg-black">
        <!-- component -->

        <div class="p-6" x-data="app">
            <!-- header -->
            <header class="flex w-full justify-between">
                <a href="{{ route('login') }}">
                    <svg class="h-7 w-7 cursor-pointer text-gray-400 hover:text-gray-300" fill="white" viewBox="0 0 20 20"
                        xmlns="http://www.w3.org/2000/svg" stroke="currentColor">
                        {{-- <path stroke-width="1" fill-rule="evenodd"
                            d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                            clip-rule="evenodd"> </path> --}}
                    </svg>
                </a>

                <!-- buttons -->
                <div class="space-x-4">
                    <a href="{{ route('admin.addproduct') }}" x-show="isLoginPage"
                        class="rounded-2xl border-b-2 border-b-gray-200 bg-black py-3 px-4 font-bold text-white ring-2 ring-gray-300 hover:bg-white hover:text-black hover:border-b-black active:translate-y-[0.125rem] active:border-b-gray-200">
                        ADD PRODUCT
                    </a>

                    <a href="{{ route('admin.viewproduct') }}" x-show="isLoginPage"
                        class="rounded-2xl border-b-2 border-b-gray-200 bg-black py-3 px-4 font-bold text-white ring-2 ring-gray-300 hover:bg-white hover:text-black hover:border-b-black active:translate-y-[0.125rem] active:border-b-gray-200">
                        VIEW PRODUCTS
                    </a>


                    <a href="{{ route('admin.logout') }}" x-show="!isLoginPage"
                        class="rounded-2xl border-b-2 border-b-gray-200 bg-black py-3 px-4 font-bold text-white ring-2 ring-gray-300 hover:bg-white hover:text-black hover:border-b-black active:translate-y-[0.125rem] active:border-b-gray-200">
                        LOGOUT
                    </a>
                </div>
            </header>
            <!-- component -->
            <link rel="preconnect" href="https://rsms.me/">
            <link rel="stylesheet" href="https://rsms.me/inter/inter.css">
            <style>
                :root {
                    font-family: 'Inter', sans-serif;
                }

                @supports (font-variation-settings: normal) {
                    :root {
                        font-family: 'Inter var', sans-serif;
                    }
                }
            </style>

            <div class="antialiased bg-black w-full min-h-screen text-slate-300 relative py-4">
                <div class="grid grid-cols-12 mx-auto gap-2 sm:gap-4 md:gap-6 lg:gap-10 xl:gap-14 max-w-7xl my-10 px-2">
                    <div id="menu" class="bg-white/10 col-span-3 rounded-lg p-4 ">
                        <h1
                            class="font-bold text-white text-center text-lg lg:text-3xl bg-gradient-to-br from-white via-white/50 to-transparent bg-clip-text ">
                            Dashboard<span class="text-indigo-400">.</span></h1>
                        <p class="text-slate-400 text-sm mb-2 text-center">Welcome back,</p>
                        <a href="#"
                            class="flex flex-col space-y-2 md:space-y-0 md:flex-row mb-5 items-center md:space-x-2 hover:bg-white/10 group transition duration-150 ease-linear rounded-lg group w-full py-3 px-2">
                            <div>
                                <img class="rounded-full w-24 h-24 relative object-cover"
                                    src="https://img.freepik.com/free-photo/no-problem-concept-bearded-man-makes-okay-gesture-has-everything-control-all-fine-gesture-wears-spectacles-jumper-poses-against-pink-wall-says-i-got-this-guarantees-something_273609-42817.jpg?w=1800&t=st=1669749937~exp=1669750537~hmac=4c5ab249387d44d91df18065e1e33956daab805bee4638c7fdbf83c73d62f125"
                                    alt="">
                            </div>
                            <div>
                                <p class="font-medium text-xl group-hover:text-indigo-400 leading-4"></p>
                                <span class="text-xs text-slate-400">Pantazi LLC</span>
                            </div>
                        </a>
                        <hr class="my-2 border-slate-700">
                        <div id="menu" class="flex flex-col space-y-2 my-5 text-lg">
                            <a href="#"
                                class="hover:bg-white/10 transition duration-150 ease-linear rounded-lg py-3 px-2 group">
                                <div class="flex flex-col space-y-2 md:flex-row md:space-y-0 space-x-2 items-center">
                                    <div>
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                            stroke-width="1.5" stroke="currentColor"
                                            class="w-6 h-6 group-hover:text-indigo-400">
                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                d="M2.25 12l8.954-8.955c.44-.439 1.152-.439 1.591 0L21.75 12M4.5 9.75v10.125c0 .621.504 1.125 1.125 1.125H9.75v-4.875c0-.621.504-1.125 1.125-1.125h2.25c.621 0 1.125.504 1.125 1.125V21h4.125c.621 0 1.125-.504 1.125-1.125V9.75M8.25 21h8.25" />
                                        </svg>

                                    </div>
                                    <div>
                                        <p
                                            class="font-bold text-base lg:text-lg text-slate-200 leading-4 group-hover:text-indigo-400">
                                            Dashboard</p>
                                        <p class="text-slate-400 text-sm hidden md:block">Data overview</p>
                                    </div>

                                </div>
                            </a>


                            {{-- <a href="#"
                                class="hover:bg-white/10 transition duration-150 ease-linear rounded-lg py-3 px-2 group"
                                onclick="toggleProductOptions(event)">
                                <div
                                    class="relative flex flex-col space-y-2 md:flex-row md:space-y-0 space-x-2 items-center">
                                    <div>
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                            stroke-width="1.5" stroke="currentColor"
                                            class="w-6 h-6 group-hover:text-indigo-400">
                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                d="M19.5 14.25v-2.625a3.375 3.375 0 00-3.375-3.375h-1.5A1.125 1.125 0 0113.5 7.125v-1.5a3.375 3.375 0 00-3.375-3.375H8.25m2.25 0H5.625c-.621 0-1.125.504-1.125 1.125v17.25c0 .621.504 1.125 1.125 1.125h12.75c.621 0 1.125-.504 1.125-1.125V11.25a9 9 0 00-9-9z" />
                                        </svg>
                                    </div>
                                    <div>
                                        <p
                                            class="font-bold text-base lg:text-lg text-slate-200 leading-4 group-hover:text-indigo-400">
                                            Products</p>
                                        <p class="text-slate-400 text-sm hidden md:block">Manage Products</p>
                                    </div>
                                    <div
                                        class="absolute -top-3 -right-3 md:top-0 md:right-0 px-2 py-1.5 rounded-full bg-indigo-800 text-xs font-mono font-bold">
                                        {{ $count }}</div>
                                </div>
                            </a> --}}

                            {{-- 
                            <a href="#"
                                class="hover:bg-white/10 transition duration-150 ease-linear rounded-lg py-3 px-2 group"> --}}
                            <div class="relative flex flex-col space-y-2 md:flex-row md:space-y-0 space-x-2 items-center">
                                <div class="flex items-center">

                                    <div class="ml-2">

                                        <p
                                            class="font-bold text-base lg:text-xl text-slate-200 leading-4 group-hover:text-indigo-400">
                                            <i class="mdi mdi-cart -ml-2 mr-1"></i>Products
                                        </p>
                                        <ul class="list-none list-inside ml-4">
                                            <li>
                                                <span class="mdi mdi-plus"></span>
                                                <a href="{{ route('admin.addproduct') }}"
                                                    class="font-bold hover:bg-white/10 hover:text-violet-600 transition duration-150 ease-linear rounded-lg py-1 px-1 group">
                                                    Add Products
                                                </a>
                                            </li>
                                            <li>
                                                <span class="mdi mdi-view-agenda"></span>
                                                <a href="{{ route('admin.viewproduct') }}"
                                                    class="font-bold hover:bg-white/10 hover:text-violet-600 duration-150 ease-linear rounded-lg py-1 px-1 group">
                                                    View Products
                                                </a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                                <div
                                    class="absolute -top-3 -right-3 md:top-0 md:right-0 px-2 py-1.5 rounded-full bg-indigo-800 text-xs font-mono font-bold">
                                    {{-- {{ $count }} --}}
                                </div>
                            </div>


                            {{-- </a> --}}
                            <div class="relative flex flex-col space-y-2 md:flex-row md:space-y-0 space-x-2 items-center">
                                <div class="flex items-center">
                                    <div class="ml-2">
                                        <p
                                            class="font-bold text-base lg:text-xl text-slate-200 leading-4 group-hover:text-indigo-400">
                                            <i class="mdi mdi-order-bool-ascending -ml-2 mr-1"></i>Orders
                                        </p>
                                        <ul class="list-none list-inside ml-4">
                                            <li>
                                                <span class="mdi mdi-new-box"></span>
                                                <a href="#"
                                                    class="font-bold hover:bg-white/10 hover:text-violet-600 transition duration-150 ease-linear rounded-lg py-1 px-1 group">
                                                    New Orders
                                                </a>
                                            </li>
                                            <li>
                                                <span class="mdi mdi-cash-100"></span>
                                                <a href="#"
                                                    class="font-bold hover:bg-white/10 hover:text-violet-600 duration-150 ease-linear rounded-lg py-1 px-1 group">
                                                    To Pay
                                                </a>
                                            </li>
                                            <li>
                                                <span class="mdi mdi-truck"></span>
                                                <a href="#"
                                                    class="font-bold hover:bg-white/10 hover:text-violet-600 duration-150 ease-linear rounded-lg py-1 px-1 group">
                                                    To Ship
                                                </a>
                                            </li>
                                            <li>
                                                <span class="mdi mdi-clock-time-four"></span>
                                                <a href="#"
                                                    class="font-bold hover:bg-white/10 hover:text-violet-600 duration-150 ease-linear rounded-lg py-1 px-1 group">
                                                    To Be Recieved
                                                </a>
                                            </li>
                                            <li>
                                                <span class="mdi mdi-check-decagram"></span>
                                                <a href="#"
                                                    class="font-bold hover:bg-white/10 hover:text-violet-600 duration-150 ease-linear rounded-lg py-1 px-1 group">
                                                    Completed Orders
                                                </a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                                <div
                                    class="absolute -top-3 -right-3 md:top-0 md:right-0 px-2 py-1.5 rounded-full bg-indigo-800 text-xs font-mono font-bold">
                                    {{-- {{ $count }} --}}
                                </div>
                            </div>
                            <div class="relative flex flex-col space-y-2 md:flex-row md:space-y-0 space-x-2 items-center">
                                <div class="flex items-center">
                                    <div class="ml-2">
                                        <p
                                            class="font-bold text-base lg:text-xl text-slate-200 leading-4 group-hover:text-indigo-400">
                                            <i class="mdi mdi-file-outline -ml-2 mr-1"></i>Invoice
                                        </p>
                                        <ul class="list-none list-inside ml-4">
                                            <li>
                                                <span class="mdi mdi-send"></span>
                                                <a href="#"
                                                    class="font-bold hover:bg-white/10 hover:text-violet-600 transition duration-150 ease-linear rounded-lg py-1 px-1 group">
                                                    Send Invoice
                                                </a>
                                            </li>
                                            <li>
                                                <span class="mdi mdi-printer"></span>
                                                <a href="#"
                                                    class="font-bold hover:bg-white/10 hover:text-violet-600 duration-150 ease-linear rounded-lg py-1 px-1 group">
                                                    Print Invoice
                                                </a>
                                            </li>
                                            <li>
                                                <span class="mdi mdi-truck"></span>
                                                <a href="#"
                                                    class="font-bold hover:bg-white/10 hover:text-violet-600 duration-150 ease-linear rounded-lg py-1 px-1 group">
                                                    To Ship
                                                </a>
                                            </li>
                                            <li>
                                                <span class="mdi mdi-clock-time-four"></span>
                                                <a href="#"
                                                    class="font-bold hover:bg-white/10 hover:text-violet-600 duration-150 ease-linear rounded-lg py-1 px-1 group">
                                                    To Be Recieved
                                                </a>
                                            </li>
                                            <li>
                                                <span class="mdi mdi-check-decagram"></span>
                                                <a href="#"
                                                    class="font-bold hover:bg-white/10 hover:text-violet-600 duration-150 ease-linear rounded-lg py-1 px-1 group">
                                                    Completed Orders
                                                </a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                                <div
                                    class="absolute -top-3 -right-3 md:top-0 md:right-0 px-2 py-1.5 rounded-full bg-indigo-800 text-xs font-mono font-bold">
                                    {{-- {{ $count }} --}}
                                </div>
                            </div>
                            {{-- <a href="#"
                                class="hover:bg-white/10 transition duration-150 ease-linear rounded-lg py-3 px-2 group">
                                <div
                                    class="relative flex flex-col space-y-2 md:flex-row md:space-y-0 space-x-2 items-center">
                                    <div>
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                            stroke-width="1.5" stroke="currentColor"
                                            class="w-6 h-6 group-hover:text-indigo-400">
                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                d="M19.5 14.25v-2.625a3.375 3.375 0 00-3.375-3.375h-1.5A1.125 1.125 0 0113.5 7.125v-1.5a3.375 3.375 0 00-3.375-3.375H8.25m2.25 0H5.625c-.621 0-1.125.504-1.125 1.125v17.25c0 .621.504 1.125 1.125 1.125h12.75c.621 0 1.125-.504 1.125-1.125V11.25a9 9 0 00-9-9z" />
                                        </svg>
                                    </div>
                                    <div>
                                        <p
                                            class="font-bold text-base lg:text-xl text-slate-200 leading-4 group-hover:text-indigo-400">
                                            Invoices</p>
                                        <p class="text-slate-400 text-sm hidden md:block">Manage invoices</p>
                                    </div>
                                    <div
                                        class="absolute -top-3 -right-3 md:top-0 md:right-0 px-2 py-1.5 rounded-full bg-indigo-800 text-xs font-mono font-bold">
                                        23</div>
                                </div>
                            </a> --}}
                            <a href="#"
                                class="hover:bg-white/10 transition duration-150 ease-linear rounded-lg py-3 px-2 group">
                                <div class="flex flex-col space-y-2 md:flex-row md:space-y-0 space-x-2 items-center">
                                    <div>
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                            stroke-width="1.5" stroke="currentColor"
                                            class="w-6 h-6 group-hover:text-indigo-400">
                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                d="M15 19.128a9.38 9.38 0 002.625.372 9.337 9.337 0 004.121-.952 4.125 4.125 0 00-7.533-2.493M15 19.128v-.003c0-1.113-.285-2.16-.786-3.07M15 19.128v.106A12.318 12.318 0 018.624 21c-2.331 0-4.512-.645-6.374-1.766l-.001-.109a6.375 6.375 0 0111.964-3.07M12 6.375a3.375 3.375 0 11-6.75 0 3.375 3.375 0 016.75 0zm8.25 2.25a2.625 2.625 0 11-5.25 0 2.625 2.625 0 015.25 0z" />
                                        </svg>
                                    </div>
                                    <div>
                                        <p
                                            class="font-bold text-base lg:text-xl text-slate-200 leading-4 group-hover:text-indigo-400">
                                            Users</p>
                                        <p class="text-slate-400 text-sm hidden md:block">Manage users</p>
                                    </div>

                                </div>
                            </a>
                            <a href="{{ route('admin.logout') }}"
                                class="hover:bg-white/10 transition duration-150 ease-linear rounded-lg py-3 px-2 group">
                                <div class="flex flex-col space-y-2 md:flex-row md:space-y-0 space-x-2 items-center">
                                    <div>
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                            stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                d="M15.75 9V5.25A2.25 2.25 0 0013.5 3h-6a2.25 2.25 0 00-2.25 2.25v13.5A2.25 2.25 0 007.5 21h6a2.25 2.25 0 002.25-2.25V15M12 9l-3 3m0 0l3 3m-3-3h12.75" />
                                        </svg>


                                    </div>
                                    <div>
                                        <p
                                            class="font-bold text-base lg:text-xl text-slate-200 leading-4 group-hover:text-indigo-400">
                                            Logout</p>
                                        {{-- <p class="text-slate-400 text-sm hidden md:block">Edit settings</p> --}}
                                    </div>

                                </div>
                            </a>
                        </div>
                        <p class="text-sm text-center text-gray-600">v2.0.0.3 | &copy; 2022 Pantazi Soft</p>
                    </div>
                    <div id="content" class="bg-white/10 col-span-9 rounded-lg p-6">
                        <div id="24h">
                            <h1 class="font-bold py-4 uppercase">Available Products</h1>


                            {{-- start --}}
                            <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.min.js" defer></script>
                            <div
                                class="w-full text-gray-700 bg-transparent mt-10 md-5 dark-mode:text-gray-200 dark-mode:bg-gray-800">
                                <div x-data="{ open: false }"
                                    class="flex flex-col max-w-screen-xl px-4 mx-auto md:items-center md:justify-between md:flex-row md:px-6 lg:px-8">
                                    <div class="p-4 flex flex-row items-center justify-between">

                                        <!-- component -->

                                        {{--  --}}
                                        <button class="md:hidden rounded-lg focus:outline-none focus:shadow-outline"
                                            @click="open = !open">
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
                                            class="relative  rounded-2xl bg-transparent pb-20  shadow-xl ring-1 ring-gray-900/5 sm:my-auto sm:max-w-lg sm:px-10">
                                            <div class="my-auto max-w-md">
                                                <form action="{{ route('admin.search') }}" method="GET"
                                                    class="relative my-auto w-max ">
                                                    <input type="search" name="search"
                                                        class="peer cursor-pointer relative z-10 h-10 w-8 rounded-full border bg-slate-300 pl-12 outline-black focus:w-full 
                  focus:cursor-text focus:border-black focus:pl-16 focus:pr-4 text-black" />
                                                    <svg xmlns="http://www.w3.org/2000/svg"
                                                        class="absolute inset-y-0 my-auto h-8 w-12 border-r border-white stroke-white px-3.5 peer-focus:border-black peer-focus:stroke-black"
                                                        fill="none" viewBox="0 0 24 24" stroke="currentColor"
                                                        stroke-width="2">
                                                        <path stroke-linecap="round" stroke-linejoin="round"
                                                            d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                                                    </svg>
                                                </form>
                                            </div>
                                        </div>

                                        {{-- Price Range --}}
                                        <form action="{{ route('admin.filterprice') }}" method="GET">
                                            <div x-data="range()" x-init="mintrigger();
                                            maxtrigger()"
                                                class="relative max-w-xl w-60 py-2 ">
                                                <div>
                                                    <input type="range" name="" value="{{ $min_price ?? 0 }}"
                                                        step="100" x-bind:min="min"
                                                        x-bind:max="max" x-on:input="mintrigger"
                                                        x-model="minprice"
                                                        class="absolute pointer-events-none appearance-none z-20 h-2 w-full opacity-0 cursor-pointer">

                                                    <input type="range" name=""
                                                        value="{{ $max_price ?? 10000 }}" step="100"
                                                        x-bind:min="min" x-bind:max="max"
                                                        x-on:input="maxtrigger" x-model="maxprice"
                                                        class="absolute pointer-events-none appearance-none z-20 h-2 w-full opacity-0 cursor-pointer">

                                                    <div class="relative z-10 h-2">
                                                        <div
                                                            class="absolute z-10 left-0 right-0 bottom-0 top-0 rounded-md bg-gray-200">
                                                        </div>
                                                        <div class="absolute z-20 top-0 bottom-0 rounded-md bg-white"
                                                            x-bind:style="'right:' + maxthumb + '%; left:' + minthumb + '%'">
                                                        </div>
                                                        <div class="absolute z-30 w-6 h-6 top-0 left-0 bg-white rounded-full -mt-2 -ml-1"
                                                            x-bind:style="'left: ' + minthumb + '%'"></div>
                                                        <div class="absolute z-30 w-6 h-6 top-0 right-0 bg-white rounded-full -mt-2 -mr-3"
                                                            x-bind:style="'right: ' + maxthumb + '%'"></div>
                                                    </div>
                                                </div>

                                                <div class="flex justify-between items-center py-5">
                                                    <div>
                                                        <p
                                                            class="uppercase px-3 py-2 border border-none rounded w-24 text-center text-white">
                                                            from
                                                        </p>
                                                        <input type="text" name="min_price"
                                                            value="{{ $min_price ?? 0 }}" maxlength="5"
                                                            x-on:input="mintrigger" x-model="minprice"
                                                            class="px-3 py-2 border border-black rounded w-24 text-center">
                                                    </div>
                                                    <div>
                                                        <p
                                                            class="uppercase px-3 py-2 border border-none rounded w-24 text-center text-white">
                                                            to
                                                        </p>
                                                        <input type="text" name="max_price"
                                                            value="{{ $max_price ?? 10000 }}" maxlength="5"
                                                            x-on:input="maxtrigger" x-model="maxprice"
                                                            class="px-3 py-2 border border-black rounded w-24 text-center">
                                                    </div>
                                                </div>
                                                <div class="px-24 w-20">
                                                    <button type="submit"
                                                        class="bg-slate-400 hover:bg-slate-200 hover:text-black text-white font-bold py-2 px-4 rounded">Filter
                                                    </button>
                                                </div>
                                            </div>
                                        </form>
                                        {{-- Category --}}
                                        <div @click.away="open = false" class="relative" x-data="{ open: false }">
                                            <button @click="open = !open"
                                                class="flex flex-row items-center w-full px-4 py-2 mt-2 text-sm font-semibold text-left bg-black rounded-lg dark-mode:bg-transparent dark-mode:focus:text-white dark-mode:hover:text-black dark-mode:focus:bg-gray-600 dark-mode:hover:bg-gray-600 md:w-auto md:inline md:mt-0 md:ml-4 hover:text-black focus:text-black hover:bg-gray-200 focus:bg-gray-200 focus:outline-none focus:shadow-outline">
                                                <span class="uppercase text-white">filter by category </span>
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
                                                                <label for="category_{{ $key }}"
                                                                    class="cursor-pointer">
                                                                    <div
                                                                        class="content-center font-bold rounded-2xl bg-white text-black py-2 px-8 ring-2 ring-gray-200 focus-within:ring-blue-400">
                                                                        <div
                                                                            class="rounded-2xl flex space-x-4 w-32 bg-white pr-6 ring-2 ring-gray-200 focus-within:ring-blue-400">
                                                                            <input type="checkbox" name="category[]"
                                                                                value="{{ $key }}"
                                                                                id="category_{{ $key }}"
                                                                                placeholder=""
                                                                                class="my-3 border-none bg-transparent outline-none focus:outline-none"
                                                                                {{ in_array($key, $category_filter ?? []) ? 'checked' : '' }} />
                                                                            <p class="pt-1">
                                                                                <span>{{ $category }}</span></p>
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
                            {{-- 
            <div class="flex flex-wrap bg-green-100 py-4 mx-4 place-content-center w-100">
                @if (session()->has('success'))
                   <strong class="font-bold text-green" >Success!</strong> 
                    <span class="block sm:inline">{{ session()->get('success') }}</span>
                
                @endif
                

            </div> --}}
                            @if (session()->has('success'))
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
                                            <span class="font-bold">Success!</span> {{ session()->get('success') }}
                                        </div>
                                    </div>
                                </div>
                            @endif



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
                                                                src="{{ asset('prod_images/' . $product->prod_image) }}"
                                                                alt="">
                                                        @endif


                                                    </div>

                                                </th>
                                                <td class="px-6 py-4 ">
                                                    <div class="text-base ">
                                                        <div class="font-medium text-gray-700 capitalize">
                                                            {{ $product->product_name }}
                                                        </div>
                                                    </div>
                                                </td>
                                                <td class="px-6 py-4">
                                                    <div class="text-base">
                                                        <div class="font-medium text-gray-700">
                                                            {{ $product->product_price }}</div>
                                                    </div>
                                                </td>

                                                <td class="px-6 py-4">
                                                    <div class="text-base">
                                                        <div class="font-medium text-gray-700">
                                                            {{ $product->product_quantity }}</div>
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
                                                                    <span
                                                                        class="bg-gray-200 rounded-full px-2 py-1 text-sm font-semibold text-gray-700 mr-2">{{ $category->name }}</span>
                                                                @endforeach
                                                            @else
                                                                <span
                                                                    class="bg-gray-200 rounded-full px-2 py-1 text-sm font-semibold text-gray-700 mr-2">No
                                                                    Category</span>
                                                            @endif
                                                        </div>
                                                </td>
                                                <td class="px-6 py-4">
                                                    <div class="text-base">
                                                        <div class="font-medium text-gray-700">
                                                            {{ $product->product_description }}</div>
                                                    </div>
                                                </td>
                                                <td class="px-6 py-4">
                                                    <div class="text-base">
                                                        <div class="font-medium text-gray-700">{{ $product->created_at }}
                                                        </div>
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
                                                                <input type="hidden" name="id"
                                                                    value="{{ $product->id }}">
                                                                <svg xmlns="http://www.w3.org/2000/svg" fill="none"
                                                                    viewBox="0 0 24 24" stroke-width="1.5" stroke="red"
                                                                    class="h-6 w-6" x-tooltip="tooltip">
                                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                                        d="M14.74 9l-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 01-2.244 2.077H8.084a2.25 2.25 0 01-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 00-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 013.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 00-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 00-7.5 0" />
                                                                </svg>
                                                            </button>
                                                    </form>

                                                    <a x-data="{ tooltip: 'Edite' }"
                                                        href="{{ route('admin.editproduct', $product->id) }}">
                                                        {{-- <input type="hidden" name="id" value="{{$product->id}}"> --}}
                                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none"
                                                            viewBox="0 0 24 24" stroke-width="1.5" stroke="green"
                                                            class="h-6 w-6" x-tooltip="tooltip">
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
                            {{-- end --}}

                        </div>


                    </div>
                </div>
            </div>
            {{-- <script>
                function toggleProductOptions(event) {
                    event.preventDefault();
                    var nestedList = document.getElementById("nestedList");

                    if (nestedList) {
                        nestedList.style.display = nestedList.style.display === "none" ? "block" : "none";
                        return;
                    }

                    nestedList = document.createElement("ul");
                    nestedList.id = "nestedList";

                    var viewProductsItem = document.createElement("li");
                    var viewProductsLink = document.createElement("a");
                    viewProductsLink.href = "{{ route('admin.addproduct') }}"; // Set the link URL here
                    viewProductsLink.textContent = "View Products";
                    viewProductsItem.appendChild(viewProductsLink);

                    var addProductsItem = document.createElement("li");
                    var addProductsLink = document.createElement("a");
                    addProductsLink.href = "#"; // Set the link URL here
                    addProductsLink.textContent = "Add Products";
                    addProductsItem.appendChild(addProductsLink);

                    nestedList.appendChild(viewProductsItem);
                    nestedList.appendChild(addProductsItem);

                    var link = event.target;
                    var parent = link.parentNode;
                    parent.appendChild(nestedList);
                }
            </script> --}}
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
