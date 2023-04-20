@extends('layouts.app')
@section('content')
    <main class="relative min-h-screen w-full bg-gray-400">
        <!-- component -->
        <div class="p-6" x-data="app">
            <!-- header -->
            <header class="flex w-full justify-between">
                <svg class="h-7 w-7 cursor-pointer text-gray-400 hover:text-gray-300 font-bold" fill="white"
                    viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg" stroke="currentColor">
                    <path stroke-width="1" fill-rule="evenodd"
                        d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                        clip-rule="evenodd"></path>
                </svg>

                <!-- buttons -->
                <div class="flex space-x-4">
                    <a href="#" x-show="isLoginPage"
                        class="rounded-2xl border-b-2 border-black bg-blue-500 py-3 px-4 font-bold text-white-500 ring-2 ring-gray-300 hover:bg-gray-200 active:translate-y-[0.125rem] active:border-b-gray-200">
                        LOGIN
                    </a>

                    <a href="{{ route('signup') }}" x-show="!isLoginPage"
                        class="rounded-2xl border-b-2 border-black bg-blue-500 py-3 px-4 font-bold text-white-500 ring-2 ring-gray-300 hover:bg-gray-200 active:translate-y-[0.125rem] active:border-b-gray-200">
                        SIGN UP
                    </a>
                </div>
            </header>

            <form action="{{ route('adminlogin') }}" method="POST">
                @csrf
                <section
                    class="absolute top-1/2 left-1/2 mx-auto max-w-sm -translate-x-1/2 -translate-y-1/2 transform space-y-4 text-center">
                    <!-- register content -->
                    <!-- login content -->
                    <div x-show="!isLoginPage" class="space-y-4">
                        <header class="mb-3 text-4xl font-bold uppercase tracking-tight hover:tracking-wide">Log in</header>
                        <div class="w-full rounded-2xl bg-slate-200 px-4 ring-2 ring-gray-200 focus-within:ring-blue-400">
                            <input type="text" name="username" placeholder="Username"
                                class="my-3 w-96 border-none bg-transparent outline-none focus:outline-1" />
                        </div>
                        <div
                            class="flex w-full items-center space-x-2 rounded-2xl bg-slate-200 px-4 ring-2 ring-gray-200 focus-within:ring-blue-400">
                            <input type="password" name="password" placeholder="Password"
                                class="my-3 w-96 border-none bg-transparent outline-none" />
                            <a href="#" class="font-medium text-gray-400 hover:text-gray-500">FORGOT?</a>
                        </div>
                        <button
                            class="w-48 rounded-2xl border-b-4 border-b-blue-600 bg-blue-500 py-3 font-bold text-white hover:bg-blue-400 active:translate-y-[0.125rem] active:border-b-blue-400">
                            LOG IN
                        </button>
                    </div>


                </section>
            </form>
        </div>
    </main>
@endsection
