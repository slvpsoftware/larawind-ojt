@extends('layouts.app')
@section('content')
   <!-- component -->


<!-- page -->
<main class="relative min-h-screen w-full bg-white">
    <!-- component -->
    <div class="p-6" x-data="app">
        <!-- header -->
        <header class="flex w-full justify-between">
            {{-- <svg class="h-7 w-7 cursor-pointer text-gray-400 hover:text-gray-300" fill="currentColor"
                viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg" stroke="currentColor">
                <path stroke-width="1" fill-rule="evenodd"
                    d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                    clip-rule="evenodd"></path>
            </svg> --}}

            <svg xmlns="http://www.w3.org/2000/svg" color="violet" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                 <path stroke-linecap="round" stroke-linejoin="round" d="M4.26 10.147a60.436 60.436 0 00-.491 6.347A48.627 48.627 0 0112 20.904a48.627 48.627 0 018.232-4.41 60.46 60.46 0 00-.491-6.347m-15.482 0a50.57 50.57 0 00-2.658-.813A59.905 59.905 0 0112 3.493a59.902 59.902 0 0110.399 5.84c-.896.248-1.783.52-2.658.814m-15.482 0A50.697 50.697 0 0112 13.489a50.702 50.702 0 017.74-3.342M6.75 15a.75.75 0 100-1.5.75.75 0 000 1.5zm0 0v-3.675A55.378 55.378 0 0112 8.443m-7.007 11.55A5.981 5.981 0 006.75 15.75v-1.5" />
            </svg>


            <!-- buttons -->
            <div class="space-x-4">
                <a href="{{route('add_product')}}"  x-show="isLoginPage"
                    class="rounded-2xl border-b-3 border-b-gray-300 py-3 px-4 font-bold text-violet-700 ring-2 ring-gray-300 hover:bg-violet-200 active:translate-y-[0.125rem] active:border-b-gray-200">   
                    ADD PRODUCT
                </a>
                
                <a href="{{route('logout')}}"   x-show="!isLoginPage"
                    class="rounded-2xl border-b-3 border-b-gray-300 py-3 px-4 font-bold text-violet-700 ring-2 ring-gray-300 hover:bg-violet-200 active:translate-y-[0.125rem] active:border-b-gray-200">   
                    LOGOUT
                </a>
            </div>
        </header>     
    </div>
</main>
@endsection