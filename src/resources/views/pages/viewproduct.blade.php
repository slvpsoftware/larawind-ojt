@extends('layouts.app')
@section('content')
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

            <a href="{{route('add_product')}}">
                <svg xmlns="http://www.w3.org/2000/svg" fill="" viewBox="0 0 24 24" stroke-width="3.5" stroke="violet" class="h-5 w-5 cursor-pointer">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M10.5 19.5L3 12m0 0l7.5-7.5M3 12h18"/>
                </svg>
            </a>

            <!-- buttons -->
            <div class="space-x-4">
                <a href="{{route('add_product')}}"  x-show="isLoginPage"
                    class="rounded-2xl border-b-3 border-b-gray-300 py-3 px-4 font-bold text-violet-700 ring-2 ring-gray-300 hover:bg-violet-200 active:translate-y-[0.125rem] active:border-b-gray-200">
                    ADD PRODUCTS 
                </a>
                <a href="{{route('logout')}}"   x-show="!isLoginPage"
                   class="rounded-2xl border-b-3 border-b-gray-300 py-3 px-4 font-bold text-violet-700 ring-2 ring-gray-300 hover:bg-violet-200 active:translate-y-[0.125rem] active:border-b-gray-200">
                   LOGOUT
                </a>
            </div>

        </header>  
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
          <div class="relative h-20 w-20">
            {{-- <img
              class="h-full w-full rounded-full object-cover object-center"
              src="https://images.unsplash.com/photo-1535713875002-d1d0cf377fde?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=2&w=256&h=256&q=80"
              alt=""
            /> --}}
            {{-- fetch image from database --}}
           
            <img
              class="h-full w-full rounded-full object-cover object-center border-4 border-violet-400"
              src="{{asset('product_images/'.$products->prod_image)}}"
              alt="">
           
            <span class="absolute right-0 bottom-0 h-2 w-2 rounded-full bg-violet-400 ring ring-white"></span>
          </div>
        
        </th>
         <td class="px-6 py-4 text-violet-900">
          <span> {{$products->prod_name}}</span>
        </td>
        <td class="px-6 py-4">
          <span
            class="inline-flex items-center gap-1 rounded-full bg-green-50 px-2 py-1 text-xs font-semibold text-green-600">
            <span class="h-1.5 w-1.5 rounded-full bg-green-600"></span>
            <h3>$ {{$products->prod_price}}</h3>
          </span>
        </td>
         <td class="px-6 py-4">
          <span
            class="inline-flex items-center gap-1 rounded-full bg-green-50 px-2 py-1 text-xs font-semibold text-green-600">
            <span class="h-1.5 w-1.5 rounded-full bg-green-600"></span>
            {{-- {{Category Here}} --}}
             
            {{$products->categories->count() > 0 ? $products->categories->first()->name : 'No Category'}}
        </span>
        </td>
        <td class="px-6 py-4">{{$products->prod_description}}</td>
        <td class="px-6 py-4">
          <div class="flex gap-2">
            <span
              class="inline-flex items-center gap-1 rounded-full bg-blue-50 px-2 py-1 text-xs font-semibold text-blue-600">
              {{$products->created_at}}
            </span>
        
          </div>
        </td>
        <td class="px-6 py-4">
          <div class="flex">
            
            <form action={{route('delete_product')}} method="POST" onsubmit="return confirm('Are you sure you want to delete this product?');" style="display: inline-block;">
            @csrf
           
            <input type="hidden" name="id" value="{{$products->id}}">
            <button x-data="{ tooltip: 'Delete' }" type="submit">
             
              <svg
                xmlns="http://www.w3.org/2000/svg"
                fill="none"
                color="red"
                viewBox="0 0 24 24"
                stroke-width="1.5"
                stroke="currentColor"
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

            <a x-data="{ tooltip: 'Edite' }" href="{{route('edit_product',$products->id)}}">
              <svg
                xmlns="http://www.w3.org/2000/svg"
                fill="none"
                color="green"
                viewBox="0 0 24 24"
                stroke-width="1.5"
                stroke="currentColor"
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

  </table>
          <div class="row">
            <div class="col-md-12  border-b-violet-900 py-3 px-4 font-bold">
                {{ $product->links('pagination::tailwind') }}
            </div>
        </div>
</div>

@endsection