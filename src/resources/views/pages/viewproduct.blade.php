@extends('layouts.app')

@section('content')
<main class="relative min-h-screen w-full bg-gray-400">
    <!-- component -->
    <div class="p-6" x-data="app">
<header class="flex w-full justify-between">

          {{-- <!-- Latest compiled and minified CSS -->
      <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

      <!-- Optional theme -->
      <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">

      <!-- Latest compiled and minified JavaScript -->
      <script src="https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script> --}}

  
    <a href="{{route('login')}}">
        <svg class="h-7 w-7 cursor-pointer text-gray-400 hover:text-gray-300" fill="currentColor"
            viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg" stroke="currentColor">
            <path stroke-width="1" fill-rule="evenodd"
                d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                clip-rule="evenodd"> </path>
        </svg>
    </a>

    <!-- buttons -->
    <div class="space-x-4">
        <a href="{{route('home')}}" x-show="isLoginPage"
            class="rounded-2xl border-b-2 border-b-gray-300 bg-white py-3 px-4 font-bold text-blue-500 ring-2 ring-gray-300 hover:bg-gray-200 active:translate-y-[0.125rem] active:border-b-gray-200">
            HOME
         </a>
        
         <a href="{{route('addproduct')}}" x-show="isLoginPage"
            class="rounded-2xl border-b-2 border-b-gray-300 bg-white py-3 px-4 font-bold text-blue-500 ring-2 ring-gray-300 hover:bg-gray-200 active:translate-y-[0.125rem] active:border-b-gray-200">
            ADD PRODUCTS
         </a>
         

        <a href=""  x-show="!isLoginPage"
            class="rounded-2xl border-b-2 border-b-gray-300 bg-white py-3 px-4 font-bold text-blue-500 ring-2 ring-gray-300 hover:bg-gray-200 active:translate-y-[0.125rem] active:border-b-gray-200">
            SIGN UP
        </a>
    </div>
</header>
        {{-- Search Bar --}}
        <!-- component -->
        <div class="relative flex h-5 flex-col-reverse justify-center overflow-hidden bg-gradient-to-br from-black to-black p-6 sm:py-12">
          <div class="relative  flex rounded-2xl bg-transparent px-2 pt-2  shadow-xl ring-1 ring-gray-900/5 sm:my-auto sm:max-w-lg sm:px-10">
            <div class="my-auto max-w-md">
              <form action="{{route('search')}}" method="GET" class="relative my-auto w-max">
                <input type="search" 
                      class="peer cursor-pointer relative z-10 h-12 w-12 rounded-full border bg-transparent pl-12 outline-none focus:w-full focus:cursor-text focus:border-black focus:pl-16 focus:pr-4 text-black" 
                      name="search"/>
                      
                <svg xmlns="http://www.w3.org/2000/svg" class="absolute inset-y-0 my-auto h-8 w-12 border-r border-transparent stroke-black px-3.5 peer-focus:border-black peer-focus:stroke-black" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                  <path stroke-linecap="round" stroke-linejoin="round" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                </svg>
              </form>
            </div>
          </div>
        </div>
<!-- component -->
<div class="overflow-hidden rounded-lg border border-gray-200 shadow-md m-5">
    <table class="w-full border-collapse bg-white text-left text-base text-gray-500">
      <thead class="bg-gray-300">
        <tr>
          <th scope="col" class="px-6 py-4 font-medium text-gray-900 "> Image       </th>
          <th scope="col" class="px-6 py-4 font-medium text-gray-900 "> Name        </th>
          <th scope="col" class="px-6 py-4 font-medium text-gray-900">  Price       </th>
          <th scope="col" class="px-6 py-4 font-medium text-gray-900">  Category    </th>
          <th scope="col" class="px-6 py-4 font-medium text-gray-900">  Description </th>
          <th scope="col" class="px-6 py-4 font-medium text-gray-900">  Created At  </th>
          <th scope="col" class="px-6 py-4 font-medium text-gray-900">  Action      </th>
        </tr>
      </thead>
      @foreach ($products as $product)
      
      <tbody class="divide-y divide-gray-100 border-t border-gray-100">
        <tr class="hover:bg-gray-200">
          <th class="flex gap-3 px-6 py-4 font-normal text-gray-900">
            <div class="relative h-24 w-24 rounded-full bg-gray-400">
                @if ($product->prod_image !="")
                      <img
                        class="h-full w-full  rounded-full object-fit object-center border-2 border-black"
                        src="{{asset('prod_images/'.$product->prod_image)}}"
                        alt="">
                  @endif
            </div>
          </th>

          <td class="px-6 py-4 ">
            <div class="text-base ">
                <div class="font-medium text-gray-700 capitalize">{{$product->product_name}}</div>
            </div>
          </td>

          <td class="px-6 py-4">
            <div class="text-base">
                <div class="font-medium text-gray-700">{{$product->product_price}}</div>
            </div>
          </td>

          <td class="px-6 py-4">
            <div class="text-base">
              <div class="font-medium text-gray-700"> {{$product->categories->count() > 0 ? $product->categories->first()->name : "No Category"}}</div>
            </div>
            {{-- category --}}
          </td>

          <td class="px-6 py-4">
            <div class="text-base">
                <div class="font-medium text-gray-700">{{$product->product_description}}</div>
            </div>
          </td>

          <td class="px-6 py-4">
            <div class="text-base">
              <div class="font-medium text-gray-700">{{$product->created_at}}</div>
            </div>
          </td>

          <td class="px-6 py-4">
            <form action="{{route('deleteproduct')}}" method="POST" onsubmit="return confirm('Are you sure you want to delete this product?');" style="display: inline-block;">
              @csrf
            <div class="flex space-x-2">
              
              <button x-data="{ tooltip: 'Delete' }" type="submit" >
                <input type="hidden" name="id" value="{{$product->id}}">
                <svg
                  xmlns="http://www.w3.org/2000/svg"
                  fill="none"
                  viewBox="0 0 24 24"
                  stroke-width="1.5"
                  stroke="red"
                  class="h-6 w-6"
                  x-tooltip="tooltip"
                >
                  <path
                    stroke-linecap="round"
                    stroke-linejoin="round"
                    d="M14.74 9l-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 01-2.244 2.077H8.084a2.25 2.25 0 01-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 00-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 013.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 00-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 00-7.5 0"
                  />
                </svg>
              </button>
            </form>


              <a x-data="{ tooltip: 'Edite' }" href="{{route('editproduct',$product->id)}}">
                {{-- <input type="hidden" name="id" value="{{$product->id}}"> --}}
                <svg
                  xmlns="http://www.w3.org/2000/svg"
                  fill="none"
                  viewBox="0 0 24 24"
                  stroke-width="1.5"
                  stroke="green"
                  class="h-6 w-6"
                  x-tooltip="tooltip"
                >
                  <path
                    stroke-linecap="round"
                    stroke-linejoin="round"
                    d="M16.862 4.487l1.687-1.688a1.875 1.875 0 112.652 2.652L6.832 19.82a4.5 4.5 0 01-1.897 1.13l-2.685.8.8-2.685a4.5 4.5 0 011.13-1.897L16.863 4.487zm0 0L19.5 7.125"
                  />
                </svg>
              </a>
            </div>
          </td>
        </tr>
      </tbody>
      @endforeach
      <div class="row">
        <div class="col md-12">
           {{$products->links('pagination::tailwind')}}
        </div>
    </div>
    </table>
    
    {{-- Sweetalert Delete --}}
    {{-- <script>
      window.addEventListener('delete-confirmation', event => {
        Swal.fire(
        {
          title: 'Are you sure?',
          text: "You won't be able to revert this!",
          icon: 'warning',
          showCancelButton: true,
          confirmButtonColor: '#3085d6',
          cancelButtonColor: '#d33',
          confirmButtonText: 'Yes, delete it!'
        }).then((result) => 
        {
          if (result.isConfirmed) 
          {
           Livewire.emit('deleteProduct');
          }
        })
      });


      // Swal.fire(
      //   {
      //     title: 'Are you sure?',
      //     text: "You won't be able to revert this!",
      //     icon: 'warning',
      //     showCancelButton: true,
      //     confirmButtonColor: '#3085d6',
      //     cancelButtonColor: '#d33',
      //     confirmButtonText: 'Yes, delete it!'
      //   }).then((result) => 
      //   {
      //     if (result.isConfirmed) 
      //     {
      //       Swal.fire(
      //         'Deleted!',
      //         'Your file has been deleted.',
      //         'success'
      //       )
      //     }
      //   }
      //   )
    </script> --}}
   
  </div>
  
@endsection