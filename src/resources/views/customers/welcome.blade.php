@extends('layouts.app')
@section('content')

<!-- component -->
<script src="//unpkg.com/alpinejs" defer></script>

<main>
    <section class="bg-white dark:bg-gray-900">
    <nav x-data="{ isOpen: false }" class="container mx-auto p-6 lg:flex lg:items-center lg:justify-between">
        <div class="flex items-center justify-between">
        <div>
            
            <a class="text-2xl font-bold text-gray-800 hover:text-gray-700 dark:text-white dark:hover:text-gray-300 lg:text-3xl" href="#">Anime ToyShop</a>
        </div>

        <!-- Mobile menu button -->
        <div class="flex lg:hidden">
            <button x-cloak @click="isOpen = !isOpen" type="button" class="text-gray-500 hover:text-gray-600 focus:text-gray-600 focus:outline-none dark:text-gray-200 dark:hover:text-gray-400 dark:focus:text-gray-400" aria-label="toggle menu">
            <svg x-show="!isOpen" xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                <path stroke-linecap="round" stroke-linejoin="round" d="M4 8h16M4 16h16" />
            </svg>

            <svg x-show="isOpen" xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
            </svg>
            </button>
        </div>
        </div>

        <!-- Mobile Menu open: "block", Menu closed: "hidden" -->
        <div x-cloak :class="[isOpen ? 'translate-x-0 opacity-100 ' : 'opacity-0 -translate-x-full']" class="absolute inset-x-0 z-20 w-full bg-white px-6 py-4 shadow-md transition-all duration-300 ease-in-out dark:bg-gray-900 lg:relative lg:top-0 lg:mt-0 lg:flex lg:w-auto lg:translate-x-0 lg:items-center lg:bg-transparent lg:p-0 lg:opacity-100 lg:shadow-none lg:dark:bg-transparent">
        <div class="lg:-px-8 flex flex-col space-y-4 lg:mt-0 lg:flex-row lg:space-y-0">
            <a class="transform text-gray-700 transition-colors duration-300 hover:text-blue-500 dark:text-gray-200 dark:hover:text-blue-400 lg:mx-8" href="#">Home</a>
            <a class="transform text-gray-700 transition-colors duration-300 hover:text-blue-500 dark:text-gray-200 dark:hover:text-blue-400 lg:mx-8" href="{{route('customer.listofstores')}}">Stores</a>
            <a class="transform text-gray-700 transition-colors duration-300 hover:text-blue-500 dark:text-gray-200 dark:hover:text-blue-400 lg:mx-8" href="#">Pricing</a>
            <a class="transform text-gray-700 transition-colors duration-300 hover:text-blue-500 dark:text-gray-200 dark:hover:text-blue-400 lg:mx-8" href="#">Contact</a>
            <a class="transform text-gray-700 transition-colors duration-300 hover:text-blue-500 dark:text-gray-200 dark:hover:text-blue-400 lg:mx-8" href="#">Profile</a>
            <a class="transform text-gray-700 transition-colors duration-300 hover:text-blue-500 dark:text-gray-200 dark:hover:text-blue-400 lg:mx-8" href="{{route('customer.logout')}}">Logout</a>
        </div>

       </div>
    </nav>

    <div class="container mx-auto px-6 py-16 text-center">
        <div class="mx-auto max-w-lg">
        <h1 class="text-3xl font-bold text-gray-800 dark:text-white lg:text-4xl">Turn Your World Into Anime</h1>
        <p class="mt-6 text-gray-500 dark:text-gray-300">Lorem ipsum dolor sit, amet consectetur adipisicing elit. Libero similique obcaecati illum mollitia.</p>
        <p class="mt-3 text-sm text-gray-400">No credit card required</p>
        </div>

        <div class="mt-10 flex justify-center">
        <img class="h-3/4 w-full rounded-xl object-cover lg:w-4/5" src="https://live.staticflickr.com/7400/9206713573_1360304d1d_b.jpg" />
        </div>
    </div>
    </section>

    <section class="bg-white dark:bg-gray-900">
    <div class="container mx-auto px-6 py-10">
        <h1 class="text-center text-3xl font-semibold capitalize text-gray-800 dark:text-white lg:text-4xl">Store</h1>

        <p class="mt-4 text-center text-gray-500 dark:text-gray-300">Lorem ipsum dolor sit amet consectetur, adipisicing elit. Nostrum quam voluptatibus</p>

        <div class="mt-8 grid grid-cols-1 gap-8 md:grid-cols-2 xl:mt-12 xl:grid-cols-3 xl:gap-12">
        <div>
            <img class="h-96 w-full rounded-lg object-cover" src="data:image/jpeg;base64,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" alt="" />
            <h2 class="mt-4 text-2xl font-semibold capitalize text-gray-800 dark:text-white">Best website collections</h2>
            <p class="mt-2 text-lg uppercase tracking-wider text-blue-500 dark:text-blue-400">Website</p>
        </div>

        <div>
            <img class="h-96 w-full rounded-lg object-cover" src="https://resizing.flixster.com/wZjUa7-xZ3B--Ts4OqkDdrNol0o=/300x300/v2/https://flxt.tmsimg.com/assets/p18329599_e_h9_aa.jpg" alt="" />
            <h2 class="mt-4 text-2xl font-semibold capitalize text-gray-800 dark:text-white">Block of Ui kit collections</h2>
            <p class="mt-2 text-lg uppercase tracking-wider text-blue-500 dark:text-blue-400">Ui kit</p>
        </div>

        <div>
            <img class="h-96 w-full rounded-lg object-cover" src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQdBjcbP29ZoU_7r2Fn46hp2kRyx9VVeK6GA3m3FQfJYLEK0X2h63J4X9Lf4HPgwAIiuIM&usqp=CAU" alt="" />
            <h2 class="mt-4 text-2xl font-semibold capitalize text-gray-800 dark:text-white">Ton’s of mobile mockup</h2>
            <p class="mt-2 text-lg uppercase tracking-wider text-blue-500 dark:text-blue-400">Mockups</p>
        </div>
        </div>
    </div>
    </section>

    <section class="bg-white dark:bg-gray-900">
    <div class="h-[32rem] bg-gray-100 dark:bg-gray-800">
        <div class="container mx-auto px-6 py-10">
        <h1 class="text-center text-3xl font-semibold capitalize text-gray-800 dark:text-white lg:text-4xl">The Executive Team</h1>

        <div class="mx-auto mt-6 flex justify-center">
            <span class="inline-block h-1 w-40 rounded-full bg-blue-500"></span>
            <span class="mx-1 inline-block h-1 w-3 rounded-full bg-blue-500"></span>
            <span class="inline-block h-1 w-1 rounded-full bg-blue-500"></span>
        </div>

        <p class="mx-auto mt-6 max-w-2xl text-center text-gray-500 dark:text-gray-300">Lorem ipsum dolor sit amet consectetur adipisicing elit. Illo incidunt ex placeat modi magni quia error alias, adipisci rem similique, at omnis eligendi optio eos harum.</p>
        </div>
    </div>

    <div class="container mx-auto -mt-72 px-6 py-10 sm:-mt-80 md:-mt-96">
        <div class="mt-8 grid grid-cols-1 gap-8 md:grid-cols-2 xl:mt-16 xl:grid-cols-3">
        <div class="flex flex-col items-center rounded-xl border p-4 dark:border-gray-700 sm:p-6">
            <img class="aspect-square w-full rounded-xl object-cover" src="https://images-wixmp-ed30a86b8c4ca887773594c2.wixmp.com/f/e49d24c6-b958-4bd7-ac83-deabde99d70e/dex4zqm-a861248e-62c7-4d5e-b244-f6dc99457746.png?token=eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJzdWIiOiJ1cm46YXBwOjdlMGQxODg5ODIyNjQzNzNhNWYwZDQxNWVhMGQyNmUwIiwiaXNzIjoidXJuOmFwcDo3ZTBkMTg4OTgyMjY0MzczYTVmMGQ0MTVlYTBkMjZlMCIsIm9iaiI6W1t7InBhdGgiOiJcL2ZcL2U0OWQyNGM2LWI5NTgtNGJkNy1hYzgzLWRlYWJkZTk5ZDcwZVwvZGV4NHpxbS1hODYxMjQ4ZS02MmM3LTRkNWUtYjI0NC1mNmRjOTk0NTc3NDYucG5nIn1dXSwiYXVkIjpbInVybjpzZXJ2aWNlOmZpbGUuZG93bmxvYWQiXX0.c7iqAu28D3xyDLQVjJmHApdm7NWUQUh-hd7D5T4rUG0" alt="" />

            <h1 class="mt-4 text-2xl font-semibold capitalize text-gray-700 dark:text-white">Zoro Roronoa</h1>

            <p class="mt-2 capitalize text-gray-500 dark:text-gray-300">design director</p>

            <div class="-mx-2 mt-3 flex">
            <a href="#" class="mx-2 text-gray-600 transition-colors duration-300 hover:text-blue-500 dark:text-gray-300 dark:hover:text-blue-400" aria-label="Reddit">
                <svg class="h-6 w-6 fill-current" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M12 22C6.47715 22 2 17.5228 2 12C2 6.47715 6.47715 2 12 2C17.5228 2 22 6.47715 22 12C21.9939 17.5203 17.5203 21.9939 12 22ZM6.807 10.543C6.20862 10.5433 5.67102 10.9088 5.45054 11.465C5.23006 12.0213 5.37133 12.6558 5.807 13.066C5.92217 13.1751 6.05463 13.2643 6.199 13.33C6.18644 13.4761 6.18644 13.6229 6.199 13.769C6.199 16.009 8.814 17.831 12.028 17.831C15.242 17.831 17.858 16.009 17.858 13.769C17.8696 13.6229 17.8696 13.4761 17.858 13.33C18.4649 13.0351 18.786 12.3585 18.6305 11.7019C18.475 11.0453 17.8847 10.5844 17.21 10.593H17.157C16.7988 10.6062 16.458 10.7512 16.2 11C15.0625 10.2265 13.7252 9.79927 12.35 9.77L13 6.65L15.138 7.1C15.1931 7.60706 15.621 7.99141 16.131 7.992C16.1674 7.99196 16.2038 7.98995 16.24 7.986C16.7702 7.93278 17.1655 7.47314 17.1389 6.94094C17.1122 6.40873 16.6729 5.991 16.14 5.991C16.1022 5.99191 16.0645 5.99491 16.027 6C15.71 6.03367 15.4281 6.21641 15.268 6.492L12.82 6C12.7983 5.99535 12.7762 5.993 12.754 5.993C12.6094 5.99472 12.4851 6.09583 12.454 6.237L11.706 9.71C10.3138 9.7297 8.95795 10.157 7.806 10.939C7.53601 10.6839 7.17843 10.5422 6.807 10.543ZM12.18 16.524C12.124 16.524 12.067 16.524 12.011 16.524C11.955 16.524 11.898 16.524 11.842 16.524C11.0121 16.5208 10.2054 16.2497 9.542 15.751C9.49626 15.6958 9.47445 15.6246 9.4814 15.5533C9.48834 15.482 9.52348 15.4163 9.579 15.371C9.62737 15.3318 9.68771 15.3102 9.75 15.31C9.81233 15.31 9.87275 15.3315 9.921 15.371C10.4816 15.7818 11.159 16.0022 11.854 16C11.9027 16 11.9513 16 12 16C12.059 16 12.119 16 12.178 16C12.864 16.0011 13.5329 15.7863 14.09 15.386C14.1427 15.3322 14.2147 15.302 14.29 15.302C14.3653 15.302 14.4373 15.3322 14.49 15.386C14.5985 15.4981 14.5962 15.6767 14.485 15.786V15.746C13.8213 16.2481 13.0123 16.5208 12.18 16.523V16.524ZM14.307 14.08H14.291L14.299 14.041C13.8591 14.011 13.4994 13.6789 13.4343 13.2429C13.3691 12.8068 13.6162 12.3842 14.028 12.2269C14.4399 12.0697 14.9058 12.2202 15.1478 12.5887C15.3899 12.9572 15.3429 13.4445 15.035 13.76C14.856 13.9554 14.6059 14.0707 14.341 14.08H14.306H14.307ZM9.67 14C9.11772 14 8.67 13.5523 8.67 13C8.67 12.4477 9.11772 12 9.67 12C10.2223 12 10.67 12.4477 10.67 13C10.67 13.5523 10.2223 14 9.67 14Z"></path>
                </svg>
            </a>

            <a href="#" class="mx-2 text-gray-600 transition-colors duration-300 hover:text-blue-500 dark:text-gray-300 dark:hover:text-blue-400" aria-label="Facebook">
                <svg class="h-6 w-6 fill-current" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M2.00195 12.002C2.00312 16.9214 5.58036 21.1101 10.439 21.881V14.892H7.90195V12.002H10.442V9.80204C10.3284 8.75958 10.6845 7.72064 11.4136 6.96698C12.1427 6.21332 13.1693 5.82306 14.215 5.90204C14.9655 5.91417 15.7141 5.98101 16.455 6.10205V8.56104H15.191C14.7558 8.50405 14.3183 8.64777 14.0017 8.95171C13.6851 9.25566 13.5237 9.68693 13.563 10.124V12.002H16.334L15.891 14.893H13.563V21.881C18.8174 21.0506 22.502 16.2518 21.9475 10.9611C21.3929 5.67041 16.7932 1.73997 11.4808 2.01722C6.16831 2.29447 2.0028 6.68235 2.00195 12.002Z"></path>
                </svg>
            </a>

            <a href="#" class="mx-2 text-gray-600 transition-colors duration-300 hover:text-blue-500 dark:text-gray-300 dark:hover:text-blue-400" aria-label="Github">
                <svg class="h-6 w-6 fill-current" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M12.026 2C7.13295 1.99937 2.96183 5.54799 2.17842 10.3779C1.395 15.2079 4.23061 19.893 8.87302 21.439C9.37302 21.529 9.55202 21.222 9.55202 20.958C9.55202 20.721 9.54402 20.093 9.54102 19.258C6.76602 19.858 6.18002 17.92 6.18002 17.92C5.99733 17.317 5.60459 16.7993 5.07302 16.461C4.17302 15.842 5.14202 15.856 5.14202 15.856C5.78269 15.9438 6.34657 16.3235 6.66902 16.884C6.94195 17.3803 7.40177 17.747 7.94632 17.9026C8.49087 18.0583 9.07503 17.99 9.56902 17.713C9.61544 17.207 9.84055 16.7341 10.204 16.379C7.99002 16.128 5.66202 15.272 5.66202 11.449C5.64973 10.4602 6.01691 9.5043 6.68802 8.778C6.38437 7.91731 6.42013 6.97325 6.78802 6.138C6.78802 6.138 7.62502 5.869 9.53002 7.159C11.1639 6.71101 12.8882 6.71101 14.522 7.159C16.428 5.868 17.264 6.138 17.264 6.138C17.6336 6.97286 17.6694 7.91757 17.364 8.778C18.0376 9.50423 18.4045 10.4626 18.388 11.453C18.388 15.286 16.058 16.128 13.836 16.375C14.3153 16.8651 14.5612 17.5373 14.511 18.221C14.511 19.555 14.499 20.631 14.499 20.958C14.499 21.225 14.677 21.535 15.186 21.437C19.8265 19.8884 22.6591 15.203 21.874 10.3743C21.089 5.54565 16.9181 1.99888 12.026 2Z"></path>
                </svg>
            </a>
            </div>
        </div>

        <div class="flex flex-col items-center rounded-xl border p-4 dark:border-gray-700 sm:p-6">
            <img class="aspect-square w-full rounded-xl object-cover" src="https://rare-gallery.com/mocahbig/1375173-luffy-gear-5-sun-god-nika-one-piece-4k-pc-wallpaper.jpg" alt="" />

            <h1 class="mt-4 text-2xl font-semibold capitalize text-gray-700 dark:text-white">monkey d. luffy</h1>

            <p class="mt-2 capitalize text-gray-500 dark:text-gray-300">Lead Developer</p>

            <div class="-mx-2 mt-3 flex">
            <a href="#" class="mx-2 text-gray-600 transition-colors duration-300 hover:text-blue-500 dark:text-gray-300 dark:hover:text-blue-400" aria-label="Reddit">
                <svg class="h-6 w-6 fill-current" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M12 22C6.47715 22 2 17.5228 2 12C2 6.47715 6.47715 2 12 2C17.5228 2 22 6.47715 22 12C21.9939 17.5203 17.5203 21.9939 12 22ZM6.807 10.543C6.20862 10.5433 5.67102 10.9088 5.45054 11.465C5.23006 12.0213 5.37133 12.6558 5.807 13.066C5.92217 13.1751 6.05463 13.2643 6.199 13.33C6.18644 13.4761 6.18644 13.6229 6.199 13.769C6.199 16.009 8.814 17.831 12.028 17.831C15.242 17.831 17.858 16.009 17.858 13.769C17.8696 13.6229 17.8696 13.4761 17.858 13.33C18.4649 13.0351 18.786 12.3585 18.6305 11.7019C18.475 11.0453 17.8847 10.5844 17.21 10.593H17.157C16.7988 10.6062 16.458 10.7512 16.2 11C15.0625 10.2265 13.7252 9.79927 12.35 9.77L13 6.65L15.138 7.1C15.1931 7.60706 15.621 7.99141 16.131 7.992C16.1674 7.99196 16.2038 7.98995 16.24 7.986C16.7702 7.93278 17.1655 7.47314 17.1389 6.94094C17.1122 6.40873 16.6729 5.991 16.14 5.991C16.1022 5.99191 16.0645 5.99491 16.027 6C15.71 6.03367 15.4281 6.21641 15.268 6.492L12.82 6C12.7983 5.99535 12.7762 5.993 12.754 5.993C12.6094 5.99472 12.4851 6.09583 12.454 6.237L11.706 9.71C10.3138 9.7297 8.95795 10.157 7.806 10.939C7.53601 10.6839 7.17843 10.5422 6.807 10.543ZM12.18 16.524C12.124 16.524 12.067 16.524 12.011 16.524C11.955 16.524 11.898 16.524 11.842 16.524C11.0121 16.5208 10.2054 16.2497 9.542 15.751C9.49626 15.6958 9.47445 15.6246 9.4814 15.5533C9.48834 15.482 9.52348 15.4163 9.579 15.371C9.62737 15.3318 9.68771 15.3102 9.75 15.31C9.81233 15.31 9.87275 15.3315 9.921 15.371C10.4816 15.7818 11.159 16.0022 11.854 16C11.9027 16 11.9513 16 12 16C12.059 16 12.119 16 12.178 16C12.864 16.0011 13.5329 15.7863 14.09 15.386C14.1427 15.3322 14.2147 15.302 14.29 15.302C14.3653 15.302 14.4373 15.3322 14.49 15.386C14.5985 15.4981 14.5962 15.6767 14.485 15.786V15.746C13.8213 16.2481 13.0123 16.5208 12.18 16.523V16.524ZM14.307 14.08H14.291L14.299 14.041C13.8591 14.011 13.4994 13.6789 13.4343 13.2429C13.3691 12.8068 13.6162 12.3842 14.028 12.2269C14.4399 12.0697 14.9058 12.2202 15.1478 12.5887C15.3899 12.9572 15.3429 13.4445 15.035 13.76C14.856 13.9554 14.6059 14.0707 14.341 14.08H14.306H14.307ZM9.67 14C9.11772 14 8.67 13.5523 8.67 13C8.67 12.4477 9.11772 12 9.67 12C10.2223 12 10.67 12.4477 10.67 13C10.67 13.5523 10.2223 14 9.67 14Z"></path>
                </svg>
            </a>

            <a href="#" class="mx-2 text-gray-600 transition-colors duration-300 hover:text-blue-500 dark:text-gray-300 dark:hover:text-blue-400" aria-label="Facebook">
                <svg class="h-6 w-6 fill-current" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M2.00195 12.002C2.00312 16.9214 5.58036 21.1101 10.439 21.881V14.892H7.90195V12.002H10.442V9.80204C10.3284 8.75958 10.6845 7.72064 11.4136 6.96698C12.1427 6.21332 13.1693 5.82306 14.215 5.90204C14.9655 5.91417 15.7141 5.98101 16.455 6.10205V8.56104H15.191C14.7558 8.50405 14.3183 8.64777 14.0017 8.95171C13.6851 9.25566 13.5237 9.68693 13.563 10.124V12.002H16.334L15.891 14.893H13.563V21.881C18.8174 21.0506 22.502 16.2518 21.9475 10.9611C21.3929 5.67041 16.7932 1.73997 11.4808 2.01722C6.16831 2.29447 2.0028 6.68235 2.00195 12.002Z"></path>
                </svg>
            </a>

            <a href="#" class="mx-2 text-gray-600 transition-colors duration-300 hover:text-blue-500 dark:text-gray-300 dark:hover:text-blue-400" aria-label="Github">
                <svg class="h-6 w-6 fill-current" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M12.026 2C7.13295 1.99937 2.96183 5.54799 2.17842 10.3779C1.395 15.2079 4.23061 19.893 8.87302 21.439C9.37302 21.529 9.55202 21.222 9.55202 20.958C9.55202 20.721 9.54402 20.093 9.54102 19.258C6.76602 19.858 6.18002 17.92 6.18002 17.92C5.99733 17.317 5.60459 16.7993 5.07302 16.461C4.17302 15.842 5.14202 15.856 5.14202 15.856C5.78269 15.9438 6.34657 16.3235 6.66902 16.884C6.94195 17.3803 7.40177 17.747 7.94632 17.9026C8.49087 18.0583 9.07503 17.99 9.56902 17.713C9.61544 17.207 9.84055 16.7341 10.204 16.379C7.99002 16.128 5.66202 15.272 5.66202 11.449C5.64973 10.4602 6.01691 9.5043 6.68802 8.778C6.38437 7.91731 6.42013 6.97325 6.78802 6.138C6.78802 6.138 7.62502 5.869 9.53002 7.159C11.1639 6.71101 12.8882 6.71101 14.522 7.159C16.428 5.868 17.264 6.138 17.264 6.138C17.6336 6.97286 17.6694 7.91757 17.364 8.778C18.0376 9.50423 18.4045 10.4626 18.388 11.453C18.388 15.286 16.058 16.128 13.836 16.375C14.3153 16.8651 14.5612 17.5373 14.511 18.221C14.511 19.555 14.499 20.631 14.499 20.958C14.499 21.225 14.677 21.535 15.186 21.437C19.8265 19.8884 22.6591 15.203 21.874 10.3743C21.089 5.54565 16.9181 1.99888 12.026 2Z"></path>
                </svg>
            </a>
            </div>
        </div>

        <div class="flex flex-col items-center rounded-xl border p-4 dark:border-gray-700 sm:p-6">
            <img class="aspect-square w-full rounded-xl object-cover" src="https://i.pinimg.com/originals/9d/f8/89/9df8896fa08451a7943b873c95462341.jpg" alt="" />

            <h1 class="mt-4 text-2xl font-semibold capitalize text-gray-700 dark:text-white">Sanji Vinsmoke</h1>

            <p class="mt-2 capitalize text-gray-500 dark:text-gray-300">Full stack developer</p>

            <div class="-mx-2 mt-3 flex">
            <a href="#" class="mx-2 text-gray-600 transition-colors duration-300 hover:text-blue-500 dark:text-gray-300 dark:hover:text-blue-400" aria-label="Reddit">
                <svg class="h-6 w-6 fill-current" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M12 22C6.47715 22 2 17.5228 2 12C2 6.47715 6.47715 2 12 2C17.5228 2 22 6.47715 22 12C21.9939 17.5203 17.5203 21.9939 12 22ZM6.807 10.543C6.20862 10.5433 5.67102 10.9088 5.45054 11.465C5.23006 12.0213 5.37133 12.6558 5.807 13.066C5.92217 13.1751 6.05463 13.2643 6.199 13.33C6.18644 13.4761 6.18644 13.6229 6.199 13.769C6.199 16.009 8.814 17.831 12.028 17.831C15.242 17.831 17.858 16.009 17.858 13.769C17.8696 13.6229 17.8696 13.4761 17.858 13.33C18.4649 13.0351 18.786 12.3585 18.6305 11.7019C18.475 11.0453 17.8847 10.5844 17.21 10.593H17.157C16.7988 10.6062 16.458 10.7512 16.2 11C15.0625 10.2265 13.7252 9.79927 12.35 9.77L13 6.65L15.138 7.1C15.1931 7.60706 15.621 7.99141 16.131 7.992C16.1674 7.99196 16.2038 7.98995 16.24 7.986C16.7702 7.93278 17.1655 7.47314 17.1389 6.94094C17.1122 6.40873 16.6729 5.991 16.14 5.991C16.1022 5.99191 16.0645 5.99491 16.027 6C15.71 6.03367 15.4281 6.21641 15.268 6.492L12.82 6C12.7983 5.99535 12.7762 5.993 12.754 5.993C12.6094 5.99472 12.4851 6.09583 12.454 6.237L11.706 9.71C10.3138 9.7297 8.95795 10.157 7.806 10.939C7.53601 10.6839 7.17843 10.5422 6.807 10.543ZM12.18 16.524C12.124 16.524 12.067 16.524 12.011 16.524C11.955 16.524 11.898 16.524 11.842 16.524C11.0121 16.5208 10.2054 16.2497 9.542 15.751C9.49626 15.6958 9.47445 15.6246 9.4814 15.5533C9.48834 15.482 9.52348 15.4163 9.579 15.371C9.62737 15.3318 9.68771 15.3102 9.75 15.31C9.81233 15.31 9.87275 15.3315 9.921 15.371C10.4816 15.7818 11.159 16.0022 11.854 16C11.9027 16 11.9513 16 12 16C12.059 16 12.119 16 12.178 16C12.864 16.0011 13.5329 15.7863 14.09 15.386C14.1427 15.3322 14.2147 15.302 14.29 15.302C14.3653 15.302 14.4373 15.3322 14.49 15.386C14.5985 15.4981 14.5962 15.6767 14.485 15.786V15.746C13.8213 16.2481 13.0123 16.5208 12.18 16.523V16.524ZM14.307 14.08H14.291L14.299 14.041C13.8591 14.011 13.4994 13.6789 13.4343 13.2429C13.3691 12.8068 13.6162 12.3842 14.028 12.2269C14.4399 12.0697 14.9058 12.2202 15.1478 12.5887C15.3899 12.9572 15.3429 13.4445 15.035 13.76C14.856 13.9554 14.6059 14.0707 14.341 14.08H14.306H14.307ZM9.67 14C9.11772 14 8.67 13.5523 8.67 13C8.67 12.4477 9.11772 12 9.67 12C10.2223 12 10.67 12.4477 10.67 13C10.67 13.5523 10.2223 14 9.67 14Z"></path>
                </svg>
            </a>

            <a href="#" class="mx-2 text-gray-600 transition-colors duration-300 hover:text-blue-500 dark:text-gray-300 dark:hover:text-blue-400" aria-label="Facebook">
                <svg class="h-6 w-6 fill-current" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M2.00195 12.002C2.00312 16.9214 5.58036 21.1101 10.439 21.881V14.892H7.90195V12.002H10.442V9.80204C10.3284 8.75958 10.6845 7.72064 11.4136 6.96698C12.1427 6.21332 13.1693 5.82306 14.215 5.90204C14.9655 5.91417 15.7141 5.98101 16.455 6.10205V8.56104H15.191C14.7558 8.50405 14.3183 8.64777 14.0017 8.95171C13.6851 9.25566 13.5237 9.68693 13.563 10.124V12.002H16.334L15.891 14.893H13.563V21.881C18.8174 21.0506 22.502 16.2518 21.9475 10.9611C21.3929 5.67041 16.7932 1.73997 11.4808 2.01722C6.16831 2.29447 2.0028 6.68235 2.00195 12.002Z"></path>
                </svg>
            </a>

            <a href="#" class="mx-2 text-gray-600 transition-colors duration-300 hover:text-blue-500 dark:text-gray-300 dark:hover:text-blue-400" aria-label="Github">
                <svg class="h-6 w-6 fill-current" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M12.026 2C7.13295 1.99937 2.96183 5.54799 2.17842 10.3779C1.395 15.2079 4.23061 19.893 8.87302 21.439C9.37302 21.529 9.55202 21.222 9.55202 20.958C9.55202 20.721 9.54402 20.093 9.54102 19.258C6.76602 19.858 6.18002 17.92 6.18002 17.92C5.99733 17.317 5.60459 16.7993 5.07302 16.461C4.17302 15.842 5.14202 15.856 5.14202 15.856C5.78269 15.9438 6.34657 16.3235 6.66902 16.884C6.94195 17.3803 7.40177 17.747 7.94632 17.9026C8.49087 18.0583 9.07503 17.99 9.56902 17.713C9.61544 17.207 9.84055 16.7341 10.204 16.379C7.99002 16.128 5.66202 15.272 5.66202 11.449C5.64973 10.4602 6.01691 9.5043 6.68802 8.778C6.38437 7.91731 6.42013 6.97325 6.78802 6.138C6.78802 6.138 7.62502 5.869 9.53002 7.159C11.1639 6.71101 12.8882 6.71101 14.522 7.159C16.428 5.868 17.264 6.138 17.264 6.138C17.6336 6.97286 17.6694 7.91757 17.364 8.778C18.0376 9.50423 18.4045 10.4626 18.388 11.453C18.388 15.286 16.058 16.128 13.836 16.375C14.3153 16.8651 14.5612 17.5373 14.511 18.221C14.511 19.555 14.499 20.631 14.499 20.958C14.499 21.225 14.677 21.535 15.186 21.437C19.8265 19.8884 22.6591 15.203 21.874 10.3743C21.089 5.54565 16.9181 1.99888 12.026 2Z"></path>
                </svg>
            </a>
            </div>
        </div>
        </div>
    </div>
    </section>

    <section class="bg-white dark:bg-gray-900">
    <div class="container mx-auto px-6 py-10">
        <h1 class="text-center text-3xl font-semibold capitalize text-gray-800 dark:text-white lg:text-4xl">What clients saying</h1>

        <div class="mx-auto mt-6 flex justify-center">
        <span class="inline-block h-1 w-40 rounded-full bg-blue-500"></span>
        <span class="mx-1 inline-block h-1 w-3 rounded-full bg-blue-500"></span>
        <span class="inline-block h-1 w-1 rounded-full bg-blue-500"></span>
        </div>

        <div class="mx-auto mt-16 flex max-w-6xl items-start">
        <button class="hidden rounded-full border p-2 text-gray-800 transition-colors duration-300 hover:bg-gray-100 rtl:-scale-x-100 dark:border-gray-700 dark:text-gray-200 dark:hover:bg-gray-800 lg:block">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
            <path stroke-linecap="round" stroke-linejoin="round" d="M15 19l-7-7 7-7" />
            </svg>
        </button>

        <div>
            <p class="flex items-center text-center text-gray-500 lg:mx-8">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aperiam, quam. Odio voluptatem officiis eos illo! Pariatur, totam alias. Beatae accusamus earum quos obcaecati minima molestias. Possimus minima dolores itaque! Esse! Lorem ipsum dolor sit amet consectetur adipisicing elit. Ea voluptates fugiat corrupti laudantium dolores reiciendis pariatur esse quod nihil quia cupiditate debitis quisquam nemo, accusamus animi explicabo? Architecto, unde laboriosam?</p>

            <div class="mt-8 flex flex-col items-center justify-center">
            <img class="h-14 w-14 rounded-full object-cover" src="https://images.unsplash.com/photo-1499470932971-a90681ce8530?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1470&q=80" alt="" />

            <div class="mt-4 text-center">
                <h1 class="font-semibold text-gray-800 dark:text-white">Mia Brown</h1>
                <span class="text-sm text-gray-500 dark:text-gray-400">Marketer</span>
            </div>
            </div>
        </div>

        <button class="hidden rounded-full border p-2 text-gray-800 transition-colors duration-300 hover:bg-gray-100 rtl:-scale-x-100 dark:border-gray-700 dark:text-gray-200 dark:hover:bg-gray-800 lg:block">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
            <path stroke-linecap="round" stroke-linejoin="round" d="M9 5l7 7-7 7" />
            </svg>
        </button>
        </div>
    </div>
    </section>

    <section class="bg-white dark:bg-gray-900">
    <div class="container mx-auto px-6 py-10">
        <div class="text-center">
        <h1 class="text-3xl font-semibold capitalize text-gray-800 dark:text-white lg:text-4xl">From the blog</h1>

        <p class="mx-auto mt-4 max-w-lg text-gray-500">Salami mustard spice tea fridge authentic Chinese food dish salt tasty liquor. Sweet savory foodtruck pie.</p>
        </div>

        <div class="mt-8 grid grid-cols-1 gap-8 md:mt-16 md:grid-cols-2 xl:grid-cols-3">
        <div>
            <div class="relative">
            <img class="h-64 w-full rounded-lg object-cover object-center lg:h-80" src="https://images.unsplash.com/photo-1624996379697-f01d168b1a52?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1470&q=80" alt="" />

            <div class="absolute bottom-0 flex bg-white p-3 dark:bg-gray-900">
                <img class="h-10 w-10 rounded-full object-cover object-center" src="https://images.unsplash.com/photo-1438761681033-6461ffad8d80?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1470&q=80" alt="" />

                <div class="mx-4">
                <h1 class="text-sm text-gray-700 dark:text-gray-200">Tom Hank</h1>
                <p class="text-sm text-gray-500 dark:text-gray-400">Creative Director</p>
                </div>
            </div>
            </div>

            <h1 class="mt-6 text-xl font-semibold text-gray-800 dark:text-white">What do you want to know about UI</h1>

            <hr class="my-6 w-32 text-blue-500" />

            <p class="text-sm text-gray-500 dark:text-gray-400">Lorem ipsum dolor sit amet consectetur adipisicing elit. Blanditiis fugit dolorum amet dolores praesentium, alias nam? Tempore</p>

            <a href="#" class="mt-4 inline-block text-blue-500 underline hover:text-blue-400">Read more</a>
        </div>

        <div>
            <div class="relative">
            <img class="h-64 w-full rounded-lg object-cover object-center lg:h-80" src="https://images.unsplash.com/photo-1590283603385-17ffb3a7f29f?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1470&q=80" alt="" />

            <div class="absolute bottom-0 flex bg-white p-3 dark:bg-gray-900">
                <img class="h-10 w-10 rounded-full object-cover object-center" src="https://images.unsplash.com/photo-1535713875002-d1d0cf377fde?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=880&q=80" alt="" />

                <div class="mx-4">
                <h1 class="text-sm text-gray-700 dark:text-gray-200">arthur melo</h1>
                <p class="text-sm text-gray-500 dark:text-gray-400">Creative Director</p>
                </div>
            </div>
            </div>

            <h1 class="mt-6 text-xl font-semibold text-gray-800 dark:text-white">All the features you want to know</h1>

            <hr class="my-6 w-32 text-blue-500" />

            <p class="text-sm text-gray-500 dark:text-gray-400">Lorem ipsum dolor sit amet consectetur adipisicing elit. Blanditiis fugit dolorum amet dolores praesentium, alias nam? Tempore</p>

            <a href="#" class="mt-4 inline-block text-blue-500 underline hover:text-blue-400">Read more</a>
        </div>

        <div>
            <div class="relative">
            <img class="h-64 w-full rounded-lg object-cover object-center lg:h-80" src="https://images.unsplash.com/photo-1597534458220-9fb4969f2df5?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1374&q=80" alt="" />

            <div class="absolute bottom-0 flex bg-white p-3 dark:bg-gray-900">
                <img class="h-10 w-10 rounded-full object-cover object-center" src="https://images.unsplash.com/photo-1531590878845-12627191e687?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=764&q=80" alt="" />

                <div class="mx-4">
                <h1 class="text-sm text-gray-700 dark:text-gray-200">Amelia. Anderson</h1>
                <p class="text-sm text-gray-500 dark:text-gray-400">Lead Developer</p>
                </div>
            </div>
            </div>

            <h1 class="mt-6 text-xl font-semibold text-gray-800 dark:text-white">Which services you get from Meraki UI</h1>

            <hr class="my-6 w-32 text-blue-500" />

            <p class="text-sm text-gray-500 dark:text-gray-400">Lorem ipsum dolor sit amet consectetur adipisicing elit. Blanditiis fugit dolorum amet dolores praesentium, alias nam? Tempore</p>

            <a href="#" class="mt-4 inline-block text-blue-500 underline hover:text-blue-400">Read more</a>
        </div>
        </div>
    </div>
    </section>

    <div class="bg-white dark:bg-gray-900">
    <div class="container mx-auto px-6 py-8">
        <h1 class="text-center text-3xl font-semibold capitalize text-gray-800 dark:text-white lg:text-4xl">Pricing Plan</h1>

        <p class="mx-auto mt-4 max-w-2xl text-center text-gray-500 dark:text-gray-300 xl:mt-6">Lorem ipsum, dolor sit amet consectetur adipisicing elit. Alias quas magni libero consequuntur voluptatum velit amet id repudiandae ea, deleniti laborum in neque eveniet.</p>

        <div class="mt-6 grid grid-cols-1 gap-8 md:grid-cols-2 lg:grid-cols-3 xl:mt-12 xl:gap-12">
        <div class="w-full space-y-8 rounded-lg border border-gray-100 p-8 text-center dark:border-gray-700">
            <p class="font-medium uppercase text-gray-500 dark:text-gray-300">Free</p>

            <h2 class="text-5xl font-bold uppercase text-gray-800 dark:text-gray-100">$0</h2>

            <p class="font-medium text-gray-500 dark:text-gray-300">Life time</p>

            <button class="mt-10 w-full transform rounded-md bg-blue-600 px-4 py-2 capitalize tracking-wide text-white transition-colors duration-300 hover:bg-blue-500 focus:bg-blue-500 focus:outline-none focus:ring focus:ring-blue-300 focus:ring-opacity-80">Start Now</button>
        </div>

        <div class="w-full space-y-8 rounded-lg bg-blue-600 p-8 text-center">
            <p class="font-medium uppercase text-gray-200">Premium</p>

            <h2 class="text-5xl font-bold uppercase text-white dark:text-gray-100">$40</h2>

            <p class="font-medium text-gray-200">Per month</p>

            <button class="mt-10 w-full transform rounded-md bg-white px-4 py-2 capitalize tracking-wide text-blue-500 transition-colors duration-300 hover:bg-gray-100 focus:bg-gray-100 focus:outline-none focus:ring focus:ring-gray-200 focus:ring-opacity-80">Start Now</button>
        </div>

        <div class="w-full space-y-8 rounded-lg border border-gray-100 p-8 text-center dark:border-gray-700">
            <p class="font-medium uppercase text-gray-500 dark:text-gray-300">Enterprise</p>

            <h2 class="text-5xl font-bold uppercase text-gray-800 dark:text-gray-100">$100</h2>

            <p class="font-medium text-gray-500 dark:text-gray-300">Life time</p>

            <button class="mt-10 w-full transform rounded-md bg-blue-600 px-4 py-2 capitalize tracking-wide text-white transition-colors duration-300 hover:bg-blue-500 focus:bg-blue-500 focus:outline-none focus:ring focus:ring-blue-300 focus:ring-opacity-80">Start Now</button>
        </div>
        </div>
    </div>
    </div>

    <section class="bg-white dark:bg-gray-900">
    <div class="container mx-auto max-w-4xl px-6 py-10">
        <h1 class="text-center text-4xl font-semibold text-gray-800 dark:text-white">Frequently asked questions</h1>

        <div class="mt-12 space-y-8">
        <div class="rounded-lg border-2 border-gray-100 dark:border-gray-700">
            <button class="flex w-full items-center justify-between p-8">
            <h1 class="font-semibold text-gray-700 dark:text-white">How i can play for my appoinment ?</h1>

            <span class="rounded-full bg-gray-200 text-gray-400">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M18 12H6" />
                </svg>
            </span>
            </button>

            <hr class="border-gray-200 dark:border-gray-700" />

            <p class="p-8 text-sm text-gray-500 dark:text-gray-300">Lorem ipsum dolor sit, amet consectetur adipisicing elit. Voluptas eaque nobis, fugit odit omnis fugiat deleniti animi ab maxime cum laboriosam recusandae facere dolorum veniam quia pariatur obcaecati illo ducimus?</p>
        </div>

        <div class="rounded-lg border-2 border-gray-100 dark:border-gray-700">
            <button class="flex w-full items-center justify-between p-8">
            <h1 class="font-semibold text-gray-700 dark:text-white">Is the cost of the appoinment covered by private health insurance?</h1>

            <span class="rounded-full bg-blue-500 text-white">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6" />
                </svg>
            </span>
            </button>
        </div>

        <div class="rounded-lg border-2 border-gray-100 dark:border-gray-700">
            <button class="flex w-full items-center justify-between p-8">
            <h1 class="font-semibold text-gray-700 dark:text-white">Do i need a referral?</h1>

            <span class="rounded-full bg-blue-500 text-white">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6" />
                </svg>
            </span>
            </button>
        </div>

        <div class="rounded-lg border-2 border-gray-100 dark:border-gray-700">
            <button class="flex w-full items-center justify-between p-8">
            <h1 class="font-semibold text-gray-700 dark:text-white">What are your opening house?</h1>

            <span class="rounded-full bg-blue-500 text-white">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6" />
                </svg>
            </span>
            </button>
        </div>

        <div class="rounded-lg border-2 border-gray-100 dark:border-gray-700">
            <button class="flex w-full items-center justify-between p-8">
            <h1 class="font-semibold text-gray-700 dark:text-white">What can i expect at my first consultation?</h1>

            <span class="rounded-full bg-blue-500 text-white">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6" />
                </svg>
            </span>
            </button>
        </div>
        </div>
    </div>
    </section>

    <section class="min-h-screen bg-white dark:bg-gray-900 dark:from-gray-700 dark:via-gray-800 dark:to-gray-900">
    <div class="container mx-auto flex min-h-screen flex-col px-6 py-12">
        <div class="flex-1 lg:-mx-6 lg:flex lg:items-center">
        <div class="text-white lg:mx-6 lg:w-1/2">
            <h1 class="text-3xl font-semibold capitalize lg:text-5xl">Get a quote</h1>

            <p class="mt-6 max-w-xl">Ask us everything and we would love to hear from you</p>

            <div class="mt-6 space-y-8 md:mt-8">
            <p class="-mx-2 flex items-start">
                <svg xmlns="http://www.w3.org/2000/svg" class="mx-2 h-6 w-6 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                <path stroke-linecap="round" stroke-linejoin="round" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                <path stroke-linecap="round" stroke-linejoin="round" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                </svg>

                <span class="mx-2 w-72 truncate text-white"> Cecilia Chapman 711-2880 Nulla St. Mankato Mississippi 96522 </span>
            </p>

            <p class="-mx-2 flex items-start">
                <svg xmlns="http://www.w3.org/2000/svg" class="mx-2 h-6 w-6 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                <path stroke-linecap="round" stroke-linejoin="round" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z" />
                </svg>

                <span class="mx-2 w-72 truncate text-white">(257) 563-7401</span>
            </p>

            <p class="-mx-2 flex items-start">
                <svg xmlns="http://www.w3.org/2000/svg" class="mx-2 h-6 w-6 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                <path stroke-linecap="round" stroke-linejoin="round" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                </svg>

                <span class="mx-2 w-72 truncate text-white">acb@example.com</span>
            </p>
            </div>

            <div class="mt-6 md:mt-8">
            <h3 class="text-gray-300">Follow us</h3>

            <div class="-mx-1.5 mt-4 flex">
                <a class="mx-1.5 transform text-white transition-colors duration-300 hover:text-blue-500" href="#">
                <svg class="h-10 w-10 fill-current" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M18.6668 6.67334C18.0002 7.00001 17.3468 7.13268 16.6668 7.33334C15.9195 6.49001 14.8115 6.44334 13.7468 6.84201C12.6822 7.24068 11.9848 8.21534 12.0002 9.33334V10C9.83683 10.0553 7.91016 9.07001 6.66683 7.33334C6.66683 7.33334 3.87883 12.2887 9.3335 14.6667C8.0855 15.498 6.84083 16.0587 5.3335 16C7.53883 17.202 9.94216 17.6153 12.0228 17.0113C14.4095 16.318 16.3708 14.5293 17.1235 11.85C17.348 11.0351 17.4595 10.1932 17.4548 9.34801C17.4535 9.18201 18.4615 7.50001 18.6668 6.67268V6.67334Z" />
                </svg>
                </a>

                <a class="mx-1.5 transform text-white transition-colors duration-300 hover:text-blue-500" href="#">
                <svg class="h-8 w-8" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M15.2 8.80005C16.4731 8.80005 17.694 9.30576 18.5941 10.2059C19.4943 11.1061 20 12.327 20 13.6V19.2H16.8V13.6C16.8 13.1757 16.6315 12.7687 16.3314 12.4687C16.0313 12.1686 15.6244 12 15.2 12C14.7757 12 14.3687 12.1686 14.0687 12.4687C13.7686 12.7687 13.6 13.1757 13.6 13.6V19.2H10.4V13.6C10.4 12.327 10.9057 11.1061 11.8059 10.2059C12.7061 9.30576 13.927 8.80005 15.2 8.80005Z" fill="currentColor" />
                    <path d="M7.2 9.6001H4V19.2001H7.2V9.6001Z" fill="currentColor" />
                    <path d="M5.6 7.2C6.48366 7.2 7.2 6.48366 7.2 5.6C7.2 4.71634 6.48366 4 5.6 4C4.71634 4 4 4.71634 4 5.6C4 6.48366 4.71634 7.2 5.6 7.2Z" fill="currentColor" />
                </svg>
                </a>

                <a class="mx-1.5 transform text-white transition-colors duration-300 hover:text-blue-500" href="#">
                <svg class="h-8 w-8" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M7 10.2222V13.7778H9.66667V20H13.2222V13.7778H15.8889L16.7778 10.2222H13.2222V8.44444C13.2222 8.2087 13.3159 7.9826 13.4826 7.81591C13.6493 7.64921 13.8754 7.55556 14.1111 7.55556H16.7778V4H14.1111C12.9324 4 11.8019 4.46825 10.9684 5.30175C10.1349 6.13524 9.66667 7.2657 9.66667 8.44444V10.2222H7Z" fill="currentColor" />
                </svg>
                </a>

                <a class="mx-1.5 transform text-white transition-colors duration-300 hover:text-blue-500" href="#">
                <svg class="h-8 w-8" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M11.9294 7.72275C9.65868 7.72275 7.82715 9.55428 7.82715 11.825C7.82715 14.0956 9.65868 15.9271 11.9294 15.9271C14.2 15.9271 16.0316 14.0956 16.0316 11.825C16.0316 9.55428 14.2 7.72275 11.9294 7.72275ZM11.9294 14.4919C10.462 14.4919 9.26239 13.2959 9.26239 11.825C9.26239 10.354 10.4584 9.15799 11.9294 9.15799C13.4003 9.15799 14.5963 10.354 14.5963 11.825C14.5963 13.2959 13.3967 14.4919 11.9294 14.4919ZM17.1562 7.55495C17.1562 8.08692 16.7277 8.51178 16.1994 8.51178C15.6674 8.51178 15.2425 8.08335 15.2425 7.55495C15.2425 7.02656 15.671 6.59813 16.1994 6.59813C16.7277 6.59813 17.1562 7.02656 17.1562 7.55495ZM19.8731 8.52606C19.8124 7.24434 19.5197 6.10901 18.5807 5.17361C17.6453 4.23821 16.51 3.94545 15.2282 3.88118C13.9073 3.80621 9.94787 3.80621 8.62689 3.88118C7.34874 3.94188 6.21341 4.23464 5.27444 5.17004C4.33547 6.10544 4.04628 7.24077 3.98201 8.52249C3.90704 9.84347 3.90704 13.8029 3.98201 15.1238C4.04271 16.4056 4.33547 17.5409 5.27444 18.4763C6.21341 19.4117 7.34517 19.7045 8.62689 19.7687C9.94787 19.8437 13.9073 19.8437 15.2282 19.7687C16.51 19.708 17.6453 19.4153 18.5807 18.4763C19.5161 17.5409 19.8089 16.4056 19.8731 15.1238C19.9481 13.8029 19.9481 9.84704 19.8731 8.52606ZM18.1665 16.5412C17.8881 17.241 17.349 17.7801 16.6456 18.0621C15.5924 18.4799 13.0932 18.3835 11.9294 18.3835C10.7655 18.3835 8.26272 18.4763 7.21307 18.0621C6.51331 17.7837 5.9742 17.2446 5.69215 16.5412C5.27444 15.488 5.37083 12.9888 5.37083 11.825C5.37083 10.6611 5.27801 8.15832 5.69215 7.10867C5.97063 6.40891 6.50974 5.8698 7.21307 5.58775C8.26629 5.17004 10.7655 5.26643 11.9294 5.26643C13.0932 5.26643 15.596 5.17361 16.6456 5.58775C17.3454 5.86623 17.8845 6.40534 18.1665 7.10867C18.5843 8.16189 18.4879 10.6611 18.4879 11.825C18.4879 12.9888 18.5843 15.4916 18.1665 16.5412Z" fill="currentColor" />
                </svg>
                </a>
            </div>
            </div>
        </div>

        <div class="mt-8 lg:mx-6 lg:w-1/2">
            <div class="mx-auto w-full overflow-hidden rounded-xl bg-white px-8 py-10 shadow-2xl dark:bg-gray-900 lg:max-w-xl">
            <h1 class="text-2xl font-medium text-gray-700 dark:text-gray-200">Contact form</h1>

            <form class="mt-6 bg-slate">
                <div class="flex-1">
                <label class="mb-2 block text-sm text-gray-600 dark:text-gray-200">Full Name</label>
                <input type="text" placeholder="John Doe" class="mt-2 block w-full rounded-md border border-gray-200 bg-white px-5 py-3 text-gray-700 focus:border-blue-400 focus:outline-none focus:ring focus:ring-blue-300 focus:ring-opacity-40 dark:border-gray-600 dark:bg-gray-900 dark:text-gray-300 dark:focus:border-blue-300" />
                </div>

                <div class="mt-6 flex-1">
                <label class="mb-2 block text-sm text-gray-600 dark:text-gray-200">Email address</label>
                <input type="email" placeholder="johndoe@example.com" class="mt-2 block w-full rounded-md border border-gray-200 bg-white px-5 py-3 text-gray-700 focus:border-blue-400 focus:outline-none focus:ring focus:ring-blue-300 focus:ring-opacity-40 dark:border-gray-600 dark:bg-gray-900 dark:text-gray-300 dark:focus:border-blue-300" />
                </div>

                <div class="mt-6 w-full">
                <label class="mb-2 block text-sm text-gray-600 dark:text-gray-200">Message</label>
                <textarea class="mt-2 block h-32 w-full rounded-md border border-gray-200 bg-white px-5 py-3 text-gray-700 placeholder-gray-400 focus:border-blue-400 focus:outline-none focus:ring focus:ring-blue-300 focus:ring-opacity-40 dark:border-gray-600 dark:bg-gray-900 dark:text-gray-300 dark:focus:border-blue-300 md:h-48" placeholder="Message"></textarea>
                </div>

                <button class="mt-6 w-full transform rounded-md bg-blue-600 px-6 py-3 text-sm font-medium capitalize tracking-wide text-white transition-colors duration-300 hover:bg-blue-500 focus:outline-none focus:ring focus:ring-blue-400 focus:ring-opacity-50">get in touch</button>
            </form>
            </div>
        </div>
        </div>
    </div>
    </section>

    <footer class="bg-white dark:bg-gray-900">
    <div class="container mx-auto px-6 py-12">
        <div class="md:-mx-3 md:flex md:items-center md:justify-between">
        <h1 class="text-3xl font-semibold tracking-tight text-gray-800 dark:text-white md:mx-3 xl:text-4xl">Subscribe our newsletter to get update.</h1>

        <div class="mt-6 shrink-0 md:mx-3 md:mt-0 md:w-auto">
            <a href="#" class="inline-flex w-full items-center justify-center rounded-lg bg-gray-800 px-4 py-2 text-sm text-white duration-300 hover:bg-gray-700 focus:ring focus:ring-gray-300 focus:ring-opacity-80">
            <span class="mx-2">Sign Up Now</span>

            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="mx-2 h-6 w-6">
                <path stroke-linecap="round" stroke-linejoin="round" d="M17.25 8.25L21 12m0 0l-3.75 3.75M21 12H3" />
            </svg>
            </a>
        </div>
        </div>

        <hr class="my-6 border-gray-200 dark:border-gray-700 md:my-10" />

        <div class="grid grid-cols-1 gap-6 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4">
        <div>
            <p class="font-semibold text-gray-800 dark:text-white">Quick Link</p>

            <div class="mt-5 flex flex-col items-start space-y-2">
            <a href="#" class="text-gray-600 transition-colors duration-300 hover:text-blue-500 hover:underline dark:text-gray-300 dark:hover:text-blue-400">Home</a>
            <a href="#" class="text-gray-600 transition-colors duration-300 hover:text-blue-500 hover:underline dark:text-gray-300 dark:hover:text-blue-400">Who We Are</a>
            <a href="#" class="text-gray-600 transition-colors duration-300 hover:text-blue-500 hover:underline dark:text-gray-300 dark:hover:text-blue-400">Our Philosophy</a>
            </div>
        </div>

        <div>
            <p class="font-semibold text-gray-800 dark:text-white">Industries</p>

            <div class="mt-5 flex flex-col items-start space-y-2">
            <a href="#" class="text-gray-600 transition-colors duration-300 hover:text-blue-500 hover:underline dark:text-gray-300 dark:hover:text-blue-400">Retail & E-Commerce</a>
            <a href="#" class="text-gray-600 transition-colors duration-300 hover:text-blue-500 hover:underline dark:text-gray-300 dark:hover:text-blue-400">Information Technology</a>
            <a href="#" class="text-gray-600 transition-colors duration-300 hover:text-blue-500 hover:underline dark:text-gray-300 dark:hover:text-blue-400">Finance & Insurance</a>
            </div>
        </div>

        <div>
            <p class="font-semibold text-gray-800 dark:text-white">Services</p>

            <div class="mt-5 flex flex-col items-start space-y-2">
            <a href="#" class="text-gray-600 transition-colors duration-300 hover:text-blue-500 hover:underline dark:text-gray-300 dark:hover:text-blue-400">Translation</a>
            <a href="#" class="text-gray-600 transition-colors duration-300 hover:text-blue-500 hover:underline dark:text-gray-300 dark:hover:text-blue-400">Proofreading & Editing</a>
            <a href="#" class="text-gray-600 transition-colors duration-300 hover:text-blue-500 hover:underline dark:text-gray-300 dark:hover:text-blue-400">Content Creation</a>
            </div>
        </div>

        <div>
            <p class="font-semibold text-gray-800 dark:text-white">Contact Us</p>

            <div class="mt-5 flex flex-col items-start space-y-2">
            <a href="#" class="text-gray-600 transition-colors duration-300 hover:text-blue-500 hover:underline dark:text-gray-300 dark:hover:text-blue-400">+880 768 473 4978</a>
            <a href="#" class="text-gray-600 transition-colors duration-300 hover:text-blue-500 hover:underline dark:text-gray-300 dark:hover:text-blue-400">info@merakiui.com</a>
            </div>
        </div>
        </div>

        <hr class="my-6 border-gray-200 dark:border-gray-700 md:my-10" />

        <div class="flex flex-col items-center justify-between sm:flex-row">
        <a href="#" class="text-2xl font-bold text-gray-800 transition-colors duration-300 hover:text-gray-700 dark:text-white dark:hover:text-gray-300">Anime ToyShop</a>

        <p class="mt-4 text-sm text-gray-500 dark:text-gray-300 sm:mt-0">© Copyright 2021. All Rights Reserved.</p>
        </div>
    </div>
    </footer>
</main>
@endsection