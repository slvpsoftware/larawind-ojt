@extends('layouts.app')
@section('content')
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
                                    src="https://i.pinimg.com/originals/e9/91/80/e991804378163190adbd288a473edc85.jpg"
                                    alt="">
                            </div>
                            <div>
                                <p class="font-medium text-xl group-hover:text-indigo-400 leading-4">{{ $admin->store_name }}</p>
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
                                    {{ $count }}
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
                                                <a href="{{route('admin.newOrders')}}"
                                                    class="font-bold hover:bg-white/10 hover:text-violet-600 transition duration-150 ease-linear rounded-lg py-1 px-1 group">
                                                    New Orders
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
                                    {{ $count }}
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
                                    {{ $count }}
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
                            <h1 class="font-bold py-4 uppercase">Product Status</h1>
                            <div id="stats" class="grid gird-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                                <div class="bg-black/60 to-white/5 p-6 rounded-lg">
                                    <div class="flex flex-row space-x-4 items-center">
                                        <div id="stats-1">
                                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                                stroke-width="1.5" stroke="currentColor" class="w-10 h-10">
                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                    d="M9 12.75L11.25 15 15 9.75M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                                            </svg>
                                        </div>
                                        <div>
                                            <p class="text-indigo-300 text-sm font-medium uppercase leading-4">Available
                                                Products</p>
                                            <p class="text-white font-bold text-2xl inline-flex items-center space-x-2">
                                                <span>{{ $count }}</span>
                                                <span>Products</span>
                                                <span>
                                                    {{-- <svg xmlns="http://www.w3.org/2000/svg" fill="none"
                                                        viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
                                                        class="w-6 h-6">
                                                        <path stroke-linecap="round" stroke-linejoin="round"
                                                            d="M2.25 18L9 11.25l4.306 4.307a11.95 11.95 0 015.814-5.519l2.74-1.22m0 0l-5.94-2.28m5.94 2.28l-2.28 5.941" />
                                                    </svg> --}}

                                                </span>
                                            </p>
                                        </div>
                                    </div>
                                </div>
                                <div class="bg-black/60 p-6 rounded-lg">
                                    <div class="flex flex-row space-x-4 items-center">
                                        <div id="stats-1">
                                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                                stroke-width="1.5" stroke="currentColor" class="w-10 h-10">
                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                    d="M18.364 18.364A9 9 0 005.636 5.636m12.728 12.728A9 9 0 015.636 5.636m12.728 12.728L5.636 5.636" />
                                            </svg>
                                        </div>
                                        <div>
                                            <p class="text-teal-300 text-sm font-medium uppercase leading-4">Unavailable
                                            </p>
                                            <p class="text-white font-bold text-2xl inline-flex items-center space-x-2">
                                                <span>$2,873.88</span>
                                                <span>
                                                    {{-- <svg xmlns="http://www.w3.org/2000/svg" fill="none"
                                                        viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
                                                        class="w-6 h-6">
                                                        <path stroke-linecap="round" stroke-linejoin="round"
                                                            d="M2.25 18L9 11.25l4.306 4.307a11.95 11.95 0 015.814-5.519l2.74-1.22m0 0l-5.94-2.28m5.94 2.28l-2.28 5.941" />
                                                    </svg> --}}

                                                </span>
                                            </p>
                                        </div>
                                    </div>
                                </div>
                                <div class="bg-black/60 p-6 rounded-lg">
                                    <div class="flex flex-row space-x-4 items-center">
                                        <div id="stats-1">
                                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                                stroke-width="1.5" stroke="currentColor" class="w-10 h-10">
                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                    d="M2.25 6L9 12.75l4.286-4.286a11.948 11.948 0 014.306 6.43l.776 2.898m0 0l3.182-5.511m-3.182 5.51l-5.511-3.181" />
                                            </svg>
                                        </div>
                                        <div>
                                            <p class="text-blue-300 text-sm font-medium uppercase leading-4">Out of Stocks
                                            </p>
                                            <p class="text-white font-bold text-2xl inline-flex items-center space-x-2">
                                                <span>+79</span>
                                                <span>
                                                    {{-- <svg xmlns="http://www.w3.org/2000/svg" fill="none"
                                                        viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
                                                        class="w-6 h-6">
                                                        <path stroke-linecap="round" stroke-linejoin="round"
                                                            d="M2.25 6L9 12.75l4.286-4.286a11.948 11.948 0 014.306 6.43l.776 2.898m0 0l3.182-5.511m-3.182 5.51l-5.511-3.181" />
                                                    </svg> --}}

                                                </span>
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div id="last-incomes">
                            <h1 class="font-bold py-4 uppercase">Last 24h incomes</h1>
                            <div id="stats"
                                class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-4">
                                <div class="bg-black/60 to-white/5 rounded-lg">
                                    <div class="flex flex-row items-center">
                                        <div class="text-3xl p-4">💰</div>
                                        <div class="p-2">
                                            <p class="text-xl font-bold">348$</p>
                                            <p class="text-gray-500 font-medium">Amber Gates</p>
                                            <p class="text-gray-500 text-sm">24 Nov 2022</p>
                                        </div>
                                    </div>
                                    <div class="border-t border-white/5 p-4">
                                        <a href="#" class="inline-flex space-x-2 items-center text-center">
                                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                                stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                    d="M11.25 11.25l.041-.02a.75.75 0 011.063.852l-.708 2.836a.75.75 0 001.063.853l.041-.021M21 12a9 9 0 11-18 0 9 9 0 0118 0zm-9-3.75h.008v.008H12V8.25z" />
                                            </svg>
                                            <span>Info</span>
                                        </a>
                                    </div>
                                </div>
                                <div class="bg-black/60 to-white/5 rounded-lg">
                                    <div class="flex flex-row items-center">
                                        <div class="text-3xl p-4">💰</div>
                                        <div class="p-2">
                                            <p class="text-xl font-bold">68$</p>
                                            <p class="text-gray-500 font-medium">Maia Kipper</p>
                                            <p class="text-gray-500 text-sm">23 Nov 2022</p>
                                        </div>
                                    </div>
                                    <div class="border-t border-white/5 p-4">
                                        <a href="#" class="inline-flex space-x-2 items-center text-center">
                                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                                stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                    d="M11.25 11.25l.041-.02a.75.75 0 011.063.852l-.708 2.836a.75.75 0 001.063.853l.041-.021M21 12a9 9 0 11-18 0 9 9 0 0118 0zm-9-3.75h.008v.008H12V8.25z" />
                                            </svg>
                                            <span>Info</span>
                                        </a>
                                    </div>
                                </div>
                                <div class="bg-black/60 to-white/5 rounded-lg">
                                    <div class="flex flex-row items-center">
                                        <div class="text-3xl p-4">💰</div>
                                        <div class="p-2">
                                            <p class="text-xl font-bold">12$</p>
                                            <p class="text-gray-500 font-medium">Oprah Milles</p>
                                            <p class="text-gray-500 text-sm">23 Nov 2022</p>
                                        </div>
                                    </div>
                                    <div class="border-t border-white/5 p-4">
                                        <a href="#" class="inline-flex space-x-2 items-center text-center">
                                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                                stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                    d="M11.25 11.25l.041-.02a.75.75 0 011.063.852l-.708 2.836a.75.75 0 001.063.853l.041-.021M21 12a9 9 0 11-18 0 9 9 0 0118 0zm-9-3.75h.008v.008H12V8.25z" />
                                            </svg>
                                            <span>Info</span>
                                        </a>
                                    </div>
                                </div>
                                <div class="bg-black/60 to-white/5 rounded-lg">
                                    <div class="flex flex-row items-center">
                                        <div class="text-3xl p-4">💰</div>
                                        <div class="p-2">
                                            <p class="text-xl font-bold">105$</p>
                                            <p class="text-gray-500 font-medium">Jonny Nite</p>
                                            <p class="text-gray-500 text-sm">23 Nov 2022</p>
                                        </div>
                                    </div>
                                    <div class="border-t border-white/5 p-4">
                                        <a href="#" class="inline-flex space-x-2 items-center text-center">
                                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                                stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                    d="M11.25 11.25l.041-.02a.75.75 0 011.063.852l-.708 2.836a.75.75 0 001.063.853l.041-.021M21 12a9 9 0 11-18 0 9 9 0 0118 0zm-9-3.75h.008v.008H12V8.25z" />
                                            </svg>
                                            <span>Info</span>
                                        </a>
                                    </div>
                                </div>
                                <div class="bg-black/60 to-white/5 rounded-lg">
                                    <div class="flex flex-row items-center">
                                        <div class="text-3xl p-4">💰</div>
                                        <div class="p-2">
                                            <p class="text-xl font-bold">52$</p>
                                            <p class="text-gray-500 font-medium">Megane Baile</p>
                                            <p class="text-gray-500 text-sm">22 Nov 2022</p>
                                        </div>
                                    </div>
                                    <div class="border-t border-white/5 p-4">
                                        <a href="#" class="inline-flex space-x-2 items-center text-center">
                                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                                stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                    d="M11.25 11.25l.041-.02a.75.75 0 011.063.852l-.708 2.836a.75.75 0 001.063.853l.041-.021M21 12a9 9 0 11-18 0 9 9 0 0118 0zm-9-3.75h.008v.008H12V8.25z" />
                                            </svg>
                                            <span>Info</span>
                                        </a>
                                    </div>
                                </div>
                                <div class="bg-black/60 to-white/5 rounded-lg">
                                    <div class="flex flex-row items-center">
                                        <div class="text-3xl p-4">💰</div>
                                        <div class="p-2">
                                            <p class="text-xl font-bold">28$</p>
                                            <p class="text-gray-500 font-medium">Tony Ankel</p>
                                            <p class="text-gray-500 text-sm">22 Nov 2022</p>
                                        </div>
                                    </div>
                                    <div class="border-t border-white/5 p-4">
                                        <a href="#" class="inline-flex space-x-2 items-center text-center">
                                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                                stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                    d="M11.25 11.25l.041-.02a.75.75 0 011.063.852l-.708 2.836a.75.75 0 001.063.853l.041-.021M21 12a9 9 0 11-18 0 9 9 0 0118 0zm-9-3.75h.008v.008H12V8.25z" />
                                            </svg>
                                            <span>Info</span>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div id="last-users">
                            <h1 class="font-bold py-4 uppercase">New Orders</h1>
                            <div class="overflow-x-scroll">
                                <table class="w-full whitespace-nowrap">
                                    <thead class="bg-black/60">
                                        <th class="text-left py-3 px-2 rounded-l-lg">Invoice #</th>
                                        <th class="text-left py-3 px-2">Payee's Name</th>
                                        <th class="text-left py-3 px-2">Total Amount</th>
                                        <th class="text-left py-3 px-2">Status</th>
                                        <th class="text-left py-3 px-2 rounded-r-lg">Actions</th>
                                    </thead>
                                    <tr class="border-b border-gray-700">
                                        <td class="py-3 px-2 font-bold">
                                            <div class="inline-flex space-x-3 items-center">
                                                <span><img class="rounded-full w-8 h-8"
                                                        src="https://images.generated.photos/tGiLEDiAbS6NdHAXAjCfpKoW05x2nq70NGmxjxzT5aU/rs:fit:256:256/czM6Ly9pY29uczgu/Z3Bob3Rvcy1wcm9k/LnBob3Rvcy92M18w/OTM4ODM1LmpwZw.jpg"
                                                        alt=""></span>
                                                <span>Thai Mei</span>
                                            </div>
                                        </td>
                                        <td class="py-3 px-2">thai.mei@abc.com</td>
                                        <td class="py-3 px-2">User</td>
                                        <td class="py-3 px-2">Approved</td>
                                        <td class="py-3 px-2">
                                            <div class="inline-flex items-center space-x-3">
                                                <a href="" title="Edit" class="hover:text-white"><svg
                                                        xmlns="http://www.w3.org/2000/svg" fill="none"
                                                        viewBox="0 0 24 24" stroke-width="2.5" stroke="currentColor"
                                                        class="w-6 h-6 ml-4">
                                                        <path stroke-linecap="round" stroke-linejoin="round"
                                                            d="M16.862 4.487l1.687-1.688a1.875 1.875 0 112.652 2.652L10.582 16.07a4.5 4.5 0 01-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 011.13-1.897l8.932-8.931zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0115.75 21H5.25A2.25 2.25 0 013 18.75V8.25A2.25 2.25 0 015.25 6H10" />
                                                    </svg>
                                                </a>
                                                {{-- <a href="" title="Edit password" class="hover:text-white"><svg
                                                        xmlns="http://www.w3.org/2000/svg" fill="none"
                                                        viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
                                                        class="w-5 h-5">
                                                        <path stroke-linecap="round" stroke-linejoin="round"
                                                            d="M16.5 10.5V6.75a4.5 4.5 0 10-9 0v3.75m-.75 11.25h10.5a2.25 2.25 0 002.25-2.25v-6.75a2.25 2.25 0 00-2.25-2.25H6.75a2.25 2.25 0 00-2.25 2.25v6.75a2.25 2.25 0 002.25 2.25z" />
                                                    </svg>
                                                </a>
                                                <a href="" title="Suspend user" class="hover:text-white"><svg
                                                        xmlns="http://www.w3.org/2000/svg" fill="none"
                                                        viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
                                                        class="w-5 h-5">
                                                        <path stroke-linecap="round" stroke-linejoin="round"
                                                            d="M18.364 18.364A9 9 0 005.636 5.636m12.728 12.728A9 9 0 015.636 5.636m12.728 12.728L5.636 5.636" />
                                                    </svg>
                                                </a> --}}
                                            </div>
                                        </td>
                                    </tr>
                                </table>
                            </div>
                        </div>

                        <div id="last-users">
                            <h1 class="font-bold py-4 uppercase">Completed Orders</h1>
                            <div class="overflow-x-scroll">
                                <table class="w-full whitespace-nowrap">
                                    <thead class="bg-black/60">
                                        <th class="text-left py-3 px-2 rounded-l-lg">Invoice #</th>
                                        <th class="text-left py-3 px-2">Payee's Name</th>
                                        <th class="text-left py-3 px-2">Total Amount</th>
                                        <th class="text-left py-3 px-2">Status</th>
                                        <th class="text-left py-3 px-2 rounded-r-lg">Actions</th>
                                    </thead>
                                    <tr class="border-b border-gray-700">
                                        <td class="py-3 px-2 font-bold">
                                            <div class="inline-flex space-x-3 items-center">
                                                <span><img class="rounded-full w-8 h-8"
                                                        src="https://images.generated.photos/tGiLEDiAbS6NdHAXAjCfpKoW05x2nq70NGmxjxzT5aU/rs:fit:256:256/czM6Ly9pY29uczgu/Z3Bob3Rvcy1wcm9k/LnBob3Rvcy92M18w/OTM4ODM1LmpwZw.jpg"
                                                        alt=""></span>
                                                <span>Thai Mei</span>
                                            </div>
                                        </td>
                                        <td class="py-3 px-2">thai.mei@abc.com</td>
                                        <td class="py-3 px-2">User</td>
                                        <td class="py-3 px-2">Completed</td>
                                        <td class="py-3 px-2">
                                            <div class="inline-flex items-center space-x-3">
                                                <a href="" title="Edit" class="hover:text-white"><svg
                                                        xmlns="http://www.w3.org/2000/svg" fill="none"
                                                        viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
                                                        class="w-5 h-5">
                                                        <path stroke-linecap="round" stroke-linejoin="round"
                                                            d="M16.862 4.487l1.687-1.688a1.875 1.875 0 112.652 2.652L10.582 16.07a4.5 4.5 0 01-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 011.13-1.897l8.932-8.931zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0115.75 21H5.25A2.25 2.25 0 013 18.75V8.25A2.25 2.25 0 015.25 6H10" />
                                                    </svg>
                                                </a>
                                                <a href="" title="Edit password" class="hover:text-white"><svg
                                                        xmlns="http://www.w3.org/2000/svg" fill="none"
                                                        viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
                                                        class="w-5 h-5">
                                                        <path stroke-linecap="round" stroke-linejoin="round"
                                                            d="M16.5 10.5V6.75a4.5 4.5 0 10-9 0v3.75m-.75 11.25h10.5a2.25 2.25 0 002.25-2.25v-6.75a2.25 2.25 0 00-2.25-2.25H6.75a2.25 2.25 0 00-2.25 2.25v6.75a2.25 2.25 0 002.25 2.25z" />
                                                    </svg>
                                                </a>
                                                <a href="" title="Suspend user" class="hover:text-white"><svg
                                                        xmlns="http://www.w3.org/2000/svg" fill="none"
                                                        viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
                                                        class="w-5 h-5">
                                                        <path stroke-linecap="round" stroke-linejoin="round"
                                                            d="M18.364 18.364A9 9 0 005.636 5.636m12.728 12.728A9 9 0 015.636 5.636m12.728 12.728L5.636 5.636" />
                                                    </svg>
                                                </a>
                                            </div>
                                        </td>
                                    </tr>
                                </table>
                            </div>
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
            
            @endsection
