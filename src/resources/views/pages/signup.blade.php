@extends('layouts.app')
@section('content')
    <main class="relative min-h-screen w-full bg-white">
        <!-- component -->
        <div class="p-6" x-data="app">
            <!-- header -->
            <header class="flex w-full justify-between">
                <svg class="h-7 w-7 cursor-pointer text-2xl text-gray-400 hover:text-gray-300 font-bold" fill="white"
                    viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg" stroke="currentColor">
                    {{-- <path stroke-width="1" fill-rule="evenodd"
                        d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                        clip-rule="evenodd"></path> --}}
                </svg>

                <!-- buttons -->
                <div class="flex space-x-4">
                    <a href="{{ route('admin.login') }}" x-show="isLoginPage"
                        class="rounded-2xl border-b-2 border-b-gray-200 bg-black py-3 px-4 font-bold text-white ring-2 ring-gray-300 hover:bg-white hover:text-black hover:border-b-black active:translate-y-[0.125rem] active:border-b-gray-200">
                        LOGIN
                    </a>

                    <a href="" x-show="!isLoginPage"
                        class="rounded-2xl border-b-2 border-b-gray-200 bg-black py-3 px-4 font-bold text-white ring-2 ring-gray-300 hover:bg-white hover:text-black hover:border-b-black active:translate-y-[0.125rem] active:border-b-gray-200">
                        SIGN UP
                    </a>
                </div>
            </header>

            <form action="{{ route('admin.signup') }}" method="POST" autocomplete="off">
                @csrf
                <section
                    class="absolute top-1/2 left-1/2 mx-auto max-w-sm -translate-x-1/2 -translate-y-1/2 transform space-y-4 text-center">
                    <!-- register content -->
                    <div x-show="isLoginPage" class="space-y-4">
                        <header class="mb-3 text-2xl font-bold">Create your profile</header>
                        <div class="w-96 rounded-2xl bg-transparent px-4 ring-2 ring-gray-200 focus-within:ring-blue-400">
                            <span class="text-red-500 w-24 border-black bg-pink-200 ">@error('username'){{$message}}@enderror</span>
                        </div>
                        <div class="w-96 rounded-2xl bg-transparent px-4 ring-2 ring-gray-200 focus-within:ring-blue-400">
                            <span class="text-red-500 w-24 border-black bg-pink-200 ">@error('username'){{$message}}@enderror</span>
                        </div>
                        <div class="w-96 rounded-2xl bg-transparent px-4 ring-2 ring-gray-200 focus-within:ring-blue-400">
                            <span class="text-red-500 w-24 border-black bg-pink-200 ">@error('password'){{$message}}@enderror</span>
                        </div>
                        <div class="w-96 rounded-2xl bg-slate-200 px-4 ring-2 ring-gray-200 focus-within:ring-blue-400">
                            <input type="text" name="store_name" value="{{old('store_name')}}" placeholder="Store Name"
                                class="my-3 w-full border-none bg-transparent outline-none focus:outline-none" />
                        </div>

                        <div class="w-96 rounded-2xl bg-slate-200 px-4 ring-2 ring-gray-200 focus-within:ring-blue-400">
                            <input type="text" name="username" value="{{old('username')}}" placeholder="Username"
                                class="my-3 w-full border-none bg-transparent outline-none focus:outline-none" />
                        </div>
                        <div class="w-96 rounded-2xl bg-slate-200 px-4 ring-2 ring-gray-200 focus-within:ring-blue-400">
                            <input type="password" name="password" value="{{old('password')}}" placeholder="Password"
                                class="my-3 w-full border-none bg-transparent outline-none focus:outline-none" />
                        </div>
                        <button
                            class="w-48 rounded-2xl border-b-4 border-b-gray-200 bg-black py-3 font-bold text-white hover:bg-gray-200 hover:border-b-black hover:text-black active:translate-y-[0.125rem] active:border-b-blue-400"">
                            CREATE ACCOUNT
                        </button>
                    </div>



                    {{-- <div class="flex items-center space-x-4">
                        <hr class="w-full border border-gray-300" />
                        <div class="font-semibold text-gray-400">OR</div>
                        <hr class="w-full border border-gray-300" />
                    </div>

                    <footer>
                        <div class="grid grid-cols-2 gap-4">
                            <a href="#"
                                class="rounded-2xl border-b-2 border-b-gray-300 bg-white py-2.5 px-4 font-bold text-blue-700 ring-2 ring-gray-300 hover:bg-gray-200 active:translate-y-[0.125rem] active:border-b-gray-200">FACEBOOK</a>
                            <a href="#"
                                class="rounded-2xl border-b-2 border-b-gray-300 bg-white py-2.5 px-4 font-bold text-blue-500 ring-2 ring-gray-300 hover:bg-gray-200 active:translate-y-[0.125rem] active:border-b-gray-200">GOOGLE</a>
                        </div>

                        <div class="mt-8 text-sm text-gray-400">
                            By signing in to ********, you agree to our
                            <a href="#" class="font-medium text-gray-500">Terms</a> and
                            <a href="#" class="font-medium text-gray-500">Privacy Policy</a>.
                        </div> --}}
                    </footer>
                </section>
            </form>
        </div>
    </main>
@endsection
