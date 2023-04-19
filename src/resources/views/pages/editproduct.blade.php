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

            <a href="{{route('home')}}">
                <svg xmlns="http://www.w3.org/2000/svg" fill="" viewBox="0 0 24 24" stroke-width="3.5" stroke="violet" class="h-5 w-5 cursor-pointer">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M10.5 19.5L3 12m0 0l7.5-7.5M3 12h18"/>
                </svg>
            </a>

            <!-- buttons -->
            <div class="space-x-4">
                <a href="{{route('view_product')}}"  x-show="isLoginPage"
                    class="rounded-2xl border-b-3 border-b-gray-300 py-3 px-4 font-bold text-violet-700 ring-2 ring-gray-300 hover:bg-violet-200 active:translate-y-[0.125rem] active:border-b-gray-200">
                    VIEW PRODUCTS 
                </a>
                <a href="{{route('logout')}}"   x-show="!isLoginPage"
                   class="rounded-2xl border-b-3 border-b-gray-300 py-3 px-4 font-bold text-violet-700 ring-2 ring-gray-300 hover:bg-violet-200 active:translate-y-[0.125rem] active:border-b-gray-200">
                   LOGOUT
                </a>
            </div>

        </header>
        <section class="mx-auto max-w-sm   space-y-4 text-center">
            <!-- register content -->
            {{-- <div x-show="isLoginPage" class="space-y-4">
                <header class="mb-3 text-2xl font-bold">Create your profile</header>
                <div class="w-full rounded-2xl bg-gray-50 px-4 ring-2 ring-gray-200 focus-within:ring-blue-400">
                    <input type="text" placeholder="Age"
                        class="my-3 w-full border-none bg-transparent outline-none focus:outline-none" />
                </div>
                <div class="w-full rounded-2xl bg-gray-50 px-4 ring-2 ring-gray-200 focus-within:ring-blue-400">
                    <input type="text" placeholder="Name (optional)"
                        class="my-3 w-full border-none bg-transparent outline-none focus:outline-none" />
                </div>
                <div class="w-full rounded-2xl bg-gray-50 px-4 ring-2 ring-gray-200 focus-within:ring-blue-400">
                    <input type="text" placeholder="Email"
                        class="my-3 w-full border-none bg-transparent outline-none focus:outline-none" />
                </div>
                <div class="w-full rounded-2xl bg-gray-50 px-4 ring-2 ring-gray-200 focus-within:ring-blue-400">
                    <input type="password" placeholder="Password"
                        class="my-3 w-full border-none bg-transparent outline-none focus:outline-none" />
                </div>
                <button
                    class="w-full rounded-2xl border-b-4 border-b-blue-600 bg-blue-500 py-3 font-bold text-white hover:bg-blue-400 active:translate-y-[0.125rem] active:border-b-blue-400">
                    CREATE ACCOUNT
                </button>
            </div> --}}

            <form action={{route('edited_product',$product->id)}} method="POST" enctype="multipart/form-data">
                <!-- login content -->
                <div x-show="!isLoginPage" class="space-y-4">
                    <header class="mb-3 text-4xl text-violet-800  font-bold">Edit Product</header>
                        @csrf
                        <br>
                       <div class="w-full rounded-2xl bg-violet-50 px-4 ring-2 ring-gray-200 focus-within:ring-blue-400">
                             <input type="text" name="prod_name" value="{{$product->prod_name}}"
                             class="my-3 w-full border-none bg-transparent outline-none focus:outline-none" />
                            
                       </div>
                       <div class="w-full rounded-2xl bg-violet-50 px-4 ring-2 ring-gray-200 focus-within:ring-blue-400">
                            <input type="text" name="prod_price" value="{{$product->prod_price}}"
                            class="my-3 w-full border-none bg-transparent outline-none focus:outline-none" />
                       </div>
                        <div class="w-full rounded-2xl bg-violet-50 px-4 ring-2 ring-gray-200 focus-within:ring-blue-400">
                            <textarea type="text" style="resize:none" name="prod_description" placeholder="Description"
                                class="my-3 w-96 border-none bg-transparent outline-none focus:outline-none" > {{$product->prod_description}}</textarea>
                                
                       </div>
                    {{--  Category Select  --}}
                    <div class="flex justify-between">
                        @foreach($category_list as $key => $category)
                        <label for="category_{{ $key }}" class="cursor-pointer">
                            <div class="rounded-2xl bg-violet-50 px-4 ring-2 ring-gray-200 focus-within:ring-blue-400">
                                <input type="checkbox" name="category[]" value="{{$key}}" id="category_{{ $key }}" placeholder="Product Description"
                                class="my-3 border-none bg-transparent outline-none focus:outline-none" 
                                    {{ in_array($key, $product_categories) ? 'checked':''}} 
                                />
                              {{$category}}
                            </div> 
                        </label>
                        @endforeach
                    </div>

                    {{--  Image Upload  --}}
                    <div x-data="{photoName: null, photoPreview: null}" class="col-span-6 ml-2 sm:col-span-4 md:mr-3">
                               
                                <!-- Photo File Input -->
                                <input type="file" class="hidden" id="productPhoto" name="photo">
                                <br>
                                <label class="block text-gray-700 text-sm font-bold mb-2 text-center" for="photo">
                                    Profile Photo <span class="text-red-600"> </span>
                                </label>

                        <div class="text-center">
                                <!-- Current Profile Photo -->
                                <div class="mt-2" x-show="! photoPreview">
                                    <img id="productPreview" src="{{asset('product_images/'.$product->prod_image)}}"  class=" bg-violet-400 w-40 h-40 m-auto rounded-full shadow">
                                </div>
                                <!-- New Profile Photo Preview -->
                                <div class="mt-2" x-show="photoPreview" style="display: none;">
                                    <span class="block w-40 h-40 rounded-full m-auto shadow" x-bind:style="'background-size: cover; background-repeat: no-repeat; background-position: center center; background-image: url(\'' + photoPreview + '\');'" style="background-size: cover; background-repeat: no-repeat; background-position: center center; background-image: url('null');">
                                    </span>
                                </div>
                                
                                <button  id="imageUpload" type="button"  class="inline-flex items-center px-4 py-2 bg-white border border-gray-300 rounded-md font-semibold text-xs text-gray-700 uppercase tracking-widest shadow-sm hover:text-gray-500 focus:outline-none focus:border-blue-400 focus:shadow-outline-blue active:text-gray-800 active:bg-gray-50 transition ease-in-out duration-150 mt-2 ml-3">
                                    Select New Photo
                                </button>

                                {{-- <input type="hidden" name="id" value="{{$product->id}}"> --}}
                                <div class="ml-10">
                               
                                @if ($product->prod_image != "")
                                <button name="submit" value="delete_image" x-data="{ tooltip: 'Delete' }" href="{{route('delete_image',$product->id)}}">
                        
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
                                @endif   
                                 </div>
                              
                        </div>
                    </div>

                    <button 
                        value="editForm" name="submit" class="w-96 rounded-2xl border-b-4 border-b-violet-600 bg-violet-500 py-3 font-bold text-white hover:bg-violet-400 active:translate-y-[0.125rem] active:border-b-violet-400">
                        UPDATE
                    </button>

                </div>
               
            </form>

            {{-- <div class="flex items-center space-x-4">
                <hr class="w-full border border-gray-300" />
                <div class="font-semibold text-gray-400">OR</div>
                <hr class="w-full border border-gray-300" />
            </div> --}}

            {{-- <footer>
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
                </div>
            </footer> --}}
        </section>
    </div>
</main>

        <script>
            $("#imageUpload").on('click', function(){
                console.log('Upload!');
                $('#productPhoto').click();
            });

            $("#productPhoto").on('change', function(){
                const file = this.files[0]

                // Update Preview Src
                $("#productPreview").attr('src', URL.createObjectURL(file));
            });
            
        </script>
@endsection