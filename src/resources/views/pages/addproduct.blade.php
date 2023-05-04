@extends('layouts.app')
@section('content')
    <main class="relative min-h-screen w-full bg-white">
        <!-- component -->
        <div class="p-6" x-data="app">
            <!-- header -->
            <header class="flex w-full justify-between">
                <a href="{{ route('admin.viewproduct') }}">
                    <svg class="h-7 w-7 cursor-pointer text-gray-400 hover:text-gray-300" fill="currentColor"
                        viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg" stroke="currentColor">
                        <path stroke-width="1" fill-rule="evenodd"
                            d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                            clip-rule="evenodd"> </path>
                    </svg>
                </a>

                <!-- buttons -->
                <div class="space-x-4">
                    <a href="{{ route('admin.home') }}" x-show="isLoginPage"
                        class="rounded-2xl border-b-2 border-b-gray-200 bg-black py-3 px-4 font-bold text-white ring-2 ring-gray-300 hover:bg-white hover:text-black hover:border-b-black active:translate-y-[0.125rem] active:border-b-gray-200">
                        HOME
                    </a>

                    <a href="{{ route('admin.viewproduct') }}" x-show="!isLoginPage"
                        class="rounded-2xl border-b-2 border-b-gray-200 bg-black py-3 px-4 font-bold text-white ring-2 ring-gray-300 hover:bg-white hover:text-black hover:border-b-black active:translate-y-[0.125rem] active:border-b-gray-200">
                        VIEW PRODUCT
                    </a>
                </div>
            </header>

            <form action="{{ route('admin.addproduct') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <section
                    class="absolute top-1/2 left-1/2 mx-auto max-w-sm -translate-x-1/2 -translate-y-1/2 transform space-y-4 text-center">

                    <div x-show="isLoginPage" class="space-y-4">
                        <header class="mb-5 text-4xl font-serif tracking-widest text-black">Add Product</header>

                       
                        <div class="w-full rounded-2xl bg-gray-200 px-4 ring-2 ring-gray-200 focus-within:ring-blue-400">
                            <input type="text" name="product_name" value="{{old ('product_name')}}" placeholder="Product Name"
                                class="my-3 w-96 border-none bg-transparent outline-none focus:outline-none" />
                        </div>
                        <span class="text-red-500 w-24 border-black ">@error('product_name'){{$message}}@enderror</span>
                        


                        <div class="w-full rounded-2xl bg-gray-200 px-4 ring-2 ring-gray-200 focus-within:ring-blue-400">
                            <input type="number" name="product_price" value="{{old('product_price')}}" placeholder="Price"
                                class="my-3 w-96 border-none bg-transparent outline-none focus:outline-none" />
                        </div>
                        <span class="text-red-500 w-24 border-black ">@error('product_price'){{$message}}@enderror</span>

                        <div class="w-full rounded-2xl bg-gray-200 px-4 ring-2 ring-gray-200 focus-within:ring-blue-400">
                            <input type="number" name="product_quantity" value="{{old('product_quantity')}}" placeholder="Quantity"
                                class="my-3 w-96 border-none bg-transparent outline-none focus:outline-none" />
                              
                        </div>
                        <span class="text-red-500 w-24 border-black ">@error('product_quantity'){{$message}}@enderror</span>

                        <div class="w-full rounded-2xl bg-gray-200 px-4 ring-2 ring-gray-200 focus-within:ring-blue-400">


                            <textarea type="text" name="product_description" placeholder="Description"

                                style="resize:none" type="text" name="product_description" placeholder="Description"

                                class="my-3 w-96 border-none bg-transparent outline-none focus:outline-none">{{old('product_description')}}</textarea>                  
                                
                        </div>
                        <span class="text-red-500 w-24 border-black ">@error('product_description'){{$message}}@enderror</span>
                        
                       
                         <input type="hidden" name="prod_status" value="0">
                           

                        {{--  Category Select  --}}
                        
                        <div class="flex justify-between">
                            @foreach ($category_list as $key => $category)
                                <label for="category_{{ $key }}" class="cursor-pointer">
                                    <div
                                        class="rounded-2xl bg-violet-50 px-4 ring-2 ring-gray-200 focus-within:ring-blue-400">
                                        {{-- <input type="checkbox" name="category[]" value="{{ $key }}"  --}}
                                        <input type="checkbox" name="category[]" value="{{ $key }}" {{ (is_array(old('category')) && in_array($key, old('category'))) ? ' checked' : '' }}      
                                            
                                            id="category_{{ $key }}" placeholder=""
                                            class="my-3 border-none bg-transparent outline-none focus:outline-none" />
                                             {{-- {{ in_array($key, $product_categories) ? 'checked' : '' }} --}}
                                    {{-- 
    <input class="form-check-input" type="checkbox" name="hobby[]" value="1" {{ (is_array(old('hobby')) and in_array(1, old('hobby'))) ? ' checked' : '' }}> football
 --}}
                                        {{ $category }}
                                    </div>
                                </label>
                              
                            @endforeach
                           
                        </div>
                        <div>
                            <span class="text-red-500 w-24 border-black bg-pink-200 ">@error('category'){{$message}}@enderror</span>
                        </div>
                        {{--  Image Upload  --}}
                        <div x-data="{ photoName: null, photoPreview: null }" class="col-span-6 ml-2 sm:col-span-4 md:mr-3">
                            <!-- Photo File Input -->
                            <input type="file" class="hidden" id="productPhoto" name="photo">

                            <label class="block text-gray-700 text-sm font-bold mb-2 text-center" for="photo">
                                Product Photo <span class="text-red-600"> </span>
                            </label>

                            <div class="text-center">
                                <!-- Current Profile Photo -->
                                <div class="mt-2" x-show="! photoPreview">
                                    <img id="productPreview" class=" bg-gray-400 w-40 h-40 m-auto rounded-full shadow">
                                </div>
                                <!-- New Profile Photo Preview -->
                                <div class="mt-2" x-show="photoPreview" style="display: none;">
                                    <span class="block w-40 h-40 rounded-full m-auto shadow"
                                        x-bind:style="'background-size: cover; background-repeat: no-repeat; background-position: center center; background-image: url(\'' +
                                        photoPreview + '\');'"
                                        style="background-size: cover; background-repeat: no-repeat; background-position: center center; background-image: url('null');">
                                    </span>
                                    
                                </div>
                              
                                <button id="imageUpload" type="button"
                                    class="inline-flex items-center px-4 py-2 bg-white border border-gray-300 rounded-md font-semibold text-xs text-gray-700 uppercase tracking-widest shadow-sm hover:text-gray-500 focus:outline-none focus:border-blue-400 focus:shadow-outline-blue active:text-gray-800 active:bg-gray-50 transition ease-in-out duration-150 mt-2 ml-3">
                                    Add Photo
                                </button>
                               
                            </div>
                            <span class="text-red-500 w-24 border-black bg-pink-200 ">@error('photo'){{$message}}@enderror</span>   
                        </div>

                        <button
                            class="w-48 rounded-2xl border-b-4 border-b-gray-200 bg-black py-3 font-bold text-white hover:bg-gray-200 hover:border-b-black hover:text-black active:translate-y-[0.125rem] active:border-b-blue-400">
                            ADD
                        </button>
                    </div>


                </section>
            </form>
        </div>
    </main>

    <script>
        $("#imageUpload").on('click', function() {
            console.log('Upload!');
            $('#productPhoto').click();
        });

        $("#productPhoto").on('change', function() {
            const file = this.files[0]

            // Update Preview Src
            $("#productPreview").attr('src', URL.createObjectURL(file));
        });
    </script>
@endsection
