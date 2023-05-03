@extends('layouts.app')
@section('content')
<!-- component -->
<div class="h-screen flex">
    <div class="flex w-1/2 bg-black justify-around items-center">
      <div>
        <h1 class="text-white font-bold text-4xl font-sans">Anime Toy Shop</h1>
        <p class="text-white mt-1">The most popular shop in Cebu</p>
      </div>
    </div>
    <div class="flex w-1/2 justify-center items-center bg-white">
      <form action="{{route('customer.logins')}}" method="POST" class="bg-white">
        @csrf
        <h1 class="text-gray-800 font-bold text-2xl mb-1">Hello My Friend!</h1>
        <p class="text-sm font-normal text-gray-600 mb-7">Welcome </p>
        <div class="flex items-center border-2 py-2 px-3 rounded-2xl mb-4">
          <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
            <path stroke-linecap="round" stroke-linejoin="round" d="M15 19.128a9.38 9.38 0 002.625.372 9.337 9.337 0 004.121-.952 4.125 4.125 0 00-7.533-2.493M15 19.128v-.003c0-1.113-.285-2.16-.786-3.07M15 19.128v.106A12.318 12.318 0 018.624 21c-2.331 0-4.512-.645-6.374-1.766l-.001-.109a6.375 6.375 0 0111.964-3.07M12 6.375a3.375 3.375 0 11-6.75 0 3.375 3.375 0 016.75 0zm8.25 2.25a2.625 2.625 0 11-5.25 0 2.625 2.625 0 015.25 0z" />
          </svg>
          <input class="pl-2 outline-none border-none" type="text" name="username" id="" placeholder="Username" />
        </div>
        <div class="flex items-center border-2 py-2 px-3 rounded-2xl">
          <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
            <path stroke-linecap="round" stroke-linejoin="round" d="M16.5 10.5V6.75a4.5 4.5 0 10-9 0v3.75m-.75 11.25h10.5a2.25 2.25 0 002.25-2.25v-6.75a2.25 2.25 0 00-2.25-2.25H6.75a2.25 2.25 0 00-2.25 2.25v6.75a2.25 2.25 0 002.25 2.25z" />
          </svg>
          <input class="pl-2 outline-none border-none" type="password" name="password" id="" placeholder="Password" />
        </div>
        <button type="submit" class="block w-full bg-black mt-4 py-2 rounded-2xl text-white font-semibold mb-2">Login</button>
        {{-- <span class="text-sm ml-2 hover:text-blue-500 cursor-pointer">Forgot Password ?</span> --}}
        <a href="{{route('customer.register')}}" class="block w-full bg-black text-center mt-4 py-2 rounded-2xl text-white font-semibold mb-2">Register</a>
      </form>
    </div>
  </div>
@endsection