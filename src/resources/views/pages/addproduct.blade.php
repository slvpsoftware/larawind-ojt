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

            <form action={{route('new_product')}} method="POST" enctype="multipart/form-data">
                <!-- login content -->
                <div x-show="!isLoginPage" class="space-y-4">
                    <header class="mb-3 text-4xl text-violet-800  font-bold">Add Product</header>
                        @csrf
                        <br>
                       <div class="w-full rounded-2xl bg-violet-50 px-4 ring-2 ring-gray-200 focus-within:ring-blue-400">
                             <input type="text" name="prod_name" placeholder="Product Name"
                             class="my-3 w-full border-none bg-transparent outline-none focus:outline-none" />
                       </div>
                       <div class="w-full rounded-2xl bg-violet-50 px-4 ring-2 ring-gray-200 focus-within:ring-blue-400">
                            <input type="text" name="prod_price" placeholder="Product Price"
                            class="my-3 w-full border-none bg-transparent outline-none focus:outline-none" />
                       </div>
                       <div class="w-full rounded-2xl bg-violet-50 px-4 ring-2 ring-gray-200 focus-within:ring-blue-400">
                            <textarea style="resize:none" type="text" name="prod_description" placeholder="Product Description"
                            class="my-3 w-full border-none bg-transparent outline-none focus:outline-none">
                            </textarea>
                       </div>


                    {{--  Category Select  --}}
                    <div class="flex justify-between">
                        @foreach($category_list as $key => $category)
                        <label for="category_{{ $key }}" class="cursor-pointer">
                            <div class="rounded-2xl bg-violet-50 px-4 ring-2 ring-gray-200 focus-within:ring-blue-400">
                                <input type="checkbox" name="category[]" value="{{$key}}" id="category_{{ $key }}" placeholder="Product Description"
                                class="my-3 border-none bg-transparent outline-none focus:outline-none" />
                                {{$category}}
                            </div>
                        </label>
                        @endforeach
                    </div>

                    {{--  Image Upload  --}}
                    <div x-data="{photoName: null, photoPreview: null}" class="col-span-6 ml-2 sm:col-span-4 md:mr-3">
                               
                                <!-- Photo File Input -->
                                <input type="file" class="hidden" id="productPhoto" name="photo">
                                <label class="block text-gray-700 text-sm font-bold mb-2 text-center" for="photo">
                                    Profile Photo <span class="text-red-600"> </span>
                                </label>

                        <div class="text-center">
                                <!-- Current Profile Photo -->
                                <div class="mt-2" x-show="! photoPreview">
                                    <img id="productPreview"  class=" bg-violet-400 w-40 h-40 m-auto rounded-full shadow">
                                </div>
                                <!-- New Profile Photo Preview -->
                                <div class="mt-2" x-show="photoPreview" style="display: none;">
                                    <span class="block w-40 h-40 rounded-full m-auto shadow" x-bind:style="'background-size: cover; background-repeat: no-repeat; background-position: center center; background-image: url(\'' + photoPreview + '\');'" style="background-size: cover; background-repeat: no-repeat; background-position: center center; background-image: url('null');">
                                    </span>
                                </div>
                                <button  id="imageUpload" type="button" class="inline-flex items-center px-4 py-2 bg-white border border-gray-300 rounded-md font-semibold text-xs text-gray-700 uppercase tracking-widest shadow-sm hover:text-gray-500 focus:outline-none focus:border-blue-400 focus:shadow-outline-blue active:text-gray-800 active:bg-gray-50 transition ease-in-out duration-150 mt-2 ml-3">
                                    Select New Photo
                                </button>
                        </div>
                    </div>

                    <button
                        class="w-96 rounded-2xl border-b-4 border-b-violet-600 bg-violet-500 py-3 font-bold text-white hover:bg-violet-400 active:translate-y-[0.125rem] active:border-b-violet-400">
                        ADD
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