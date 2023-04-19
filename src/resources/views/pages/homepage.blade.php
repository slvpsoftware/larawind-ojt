@extends('layouts.app')
@section('content')
    <main class="relative min-h-screen w-full bg-gray-400">
        <!-- component -->
        <div class="p-6" x-data="app">
            <!-- header -->
            <header class="flex w-full justify-between">
                <a href="{{ route('login') }}">
                    <svg class="h-7 w-7 cursor-pointer text-gray-400 hover:text-gray-300" fill="white" viewBox="0 0 20 20"
                        xmlns="http://www.w3.org/2000/svg" stroke="currentColor">
                        <path stroke-width="1" fill-rule="evenodd"
                            d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                            clip-rule="evenodd"> </path>
                    </svg>
                </a>

                <!-- buttons -->
                <div class="space-x-4">
                    <a href="{{ route('addproduct') }}" x-show="isLoginPage"
                        class="rounded-2xl border-b-2 border-b-gray-300 bg-white py-3 px-4 font-bold text-blue-500 ring-2 ring-gray-300 hover:bg-gray-200 active:translate-y-[0.125rem] active:border-b-gray-200">
                        ADD PRODUCT
                    </a>

                    <a href="{{ route('viewproduct') }}" x-show="isLoginPage"
                        class="rounded-2xl border-b-2 border-b-gray-300 bg-white py-3 px-4 font-bold text-blue-500 ring-2 ring-gray-300 hover:bg-gray-200 active:translate-y-[0.125rem] active:border-b-gray-200">
                        VIEW PRODUCTS
                    </a>


                    <a href="{{ route('logout') }}" x-show="!isLoginPage"
                        class="rounded-2xl border-b-2 border-b-gray-300 bg-white py-3 px-4 font-bold text-blue-500 ring-2 ring-gray-300 hover:bg-gray-200 active:translate-y-[0.125rem] active:border-b-gray-200">
                        LOGOUT
                    </a>
                </div>
            </header>
        @endsection
