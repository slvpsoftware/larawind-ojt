@extends('layouts.app')
@section('content')
    <style>
        @import url(https://cdnjs.cloudflare.com/ajax/libs/MaterialDesign-Webfont/5.3.45/css/materialdesignicons.min.css);
    </style>
    <style>
        /* Style for the modal */
        .modal {
            display: none;
            position: fixed;
            z-index: 1;
            left: 0;
            top: 0;
            width: 100%;
            height: 100%;
            overflow: auto;
            background-color: rgba(0, 0, 0, 0.4);
        }

        .modal-content {
            background-color: #fefefe;
            margin: 15% auto;
            padding: 20px;
            border: 1px solid #888;
            width: 80%;
        }

        .close {
            color: #aaa;
            float: right;
            font-size: 28px;
            font-weight: bold;
            cursor: pointer;
        }

        .close:hover,
        .close:focus {
            color: black;
            text-decoration: none;
            cursor: pointer;
        }
    </style>
    <main class="relative min-h-screen w-full bg-black">
        <!-- component -->

        <div class="p-6" x-data="app">
            <!-- header -->
            <header class="flex w-full justify-between">
                <a href="{{ route('login') }}">
                    <svg class="h-7 w-7 cursor-pointer text-gray-400 hover:text-gray-300" fill="white" viewBox="0 0 20 20"
                        xmlns="http://www.w3.org/2000/svg" stroke="currentColor">
                        {{-- <path stroke-width="1" fill-rule="evenodd"
                            d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                            clip-rule="evenodd"> </path> --}}
                    </svg>
                </a>

                <!-- buttons -->
                <div class="space-x-4">
                    <a href="{{ route('admin.addproduct') }}" x-show="isLoginPage"
                        class="rounded-2xl border-b-2 border-b-gray-200 bg-black py-3 px-4 font-bold text-white ring-2 ring-gray-300 hover:bg-white hover:text-black hover:border-b-black active:translate-y-[0.125rem] active:border-b-gray-200">
                        ADD PRODUCT
                    </a>

                    <a href="{{ route('admin.viewproduct') }}" x-show="isLoginPage"
                        class="rounded-2xl border-b-2 border-b-gray-200 bg-black py-3 px-4 font-bold text-white ring-2 ring-gray-300 hover:bg-white hover:text-black hover:border-b-black active:translate-y-[0.125rem] active:border-b-gray-200">
                        VIEW PRODUCTS
                    </a>


                    <a href="{{ route('admin.logout') }}" x-show="!isLoginPage"
                        class="rounded-2xl border-b-2 border-b-gray-200 bg-black py-3 px-4 font-bold text-white ring-2 ring-gray-300 hover:bg-white hover:text-black hover:border-b-black active:translate-y-[0.125rem] active:border-b-gray-200">
                        LOGOUT
                    </a>
                </div>
            </header>
            <!-- component -->
            <link rel="preconnect" href="https://rsms.me/">
            <link rel="stylesheet" href="https://rsms.me/inter/inter.css">
            <style>
                :root {
                    font-family: 'Inter', sans-serif;
                }

                @supports (font-variation-settings normal) {
                    :root {
                        font-family: 'Inter var', sans-serif;
                    }
                }
            </style>

            <div class="antialiased bg-black w-full min-h-screen text-slate-300 relative py-4">
                <div class="grid grid-cols-12 mx-auto gap-2 sm:gap-4 md:gap-6 lg:gap-10 xl:gap-14 max-w-7xl my-10 px-2">
                    <div id="menu" class="bg-white/10 col-span-3 rounded-lg p-4 ">
                        <h1
                            class="font-bold text-lg lg:text-3xl bg-gradient-to-br from-white via-white/50 to-transparent bg-clip-text text-transparent">
                            Dashboard<span class="text-indigo-400">.</span></h1>
                        <p class="text-slate-400 text-sm mb-2">Welcome back,</p>
                        <a href="#"
                            class="flex flex-col space-y-2 md:space-y-0 md:flex-row mb-5 items-center md:space-x-2 hover:bg-white/10 group transition duration-150 ease-linear rounded-lg group w-full py-3 px-2">
                            <div>
                                <img class="rounded-full w-10 h-10 relative object-cover"
                                    src="https://img.freepik.com/free-photo/no-problem-concept-bearded-man-makes-okay-gesture-has-everything-control-all-fine-gesture-wears-spectacles-jumper-poses-against-pink-wall-says-i-got-this-guarantees-something_273609-42817.jpg?w=1800&t=st=1669749937~exp=1669750537~hmac=4c5ab249387d44d91df18065e1e33956daab805bee4638c7fdbf83c73d62f125"
                                    alt="">
                            </div>
                            <div>
                                <p class="font-medium group-hover:text-indigo-400 leading-4">{{ $admin->store_name }}</p>
                                <span class="text-xs text-slate-400">Pantazi LLC</span>
                            </div>
                        </a>
                        <hr class="my-2 border-slate-700">
                        <div id="menu" class="flex flex-col space-y-2 my-5 text-lg">
                            <a href="#"
                                class="hover:bg-white/10 transition duration-150 ease-linear rounded-lg py-3 px-2 group">
                                <div class="flex flex-col space-y-2 md:flex-row md:space-y-0 space-x-2 items-center">
                                    <div>
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                            stroke-width="1.5" stroke="currentColor"
                                            class="w-6 h-6 group-hover:text-indigo-400">
                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                d="M2.25 12l8.954-8.955c.44-.439 1.152-.439 1.591 0L21.75 12M4.5 9.75v10.125c0 .621.504 1.125 1.125 1.125H9.75v-4.875c0-.621.504-1.125 1.125-1.125h2.25c.621 0 1.125.504 1.125 1.125V21h4.125c.621 0 1.125-.504 1.125-1.125V9.75M8.25 21h8.25" />
                                        </svg>

                                    </div>
                                    <div>
                                        <p
                                            class="font-bold text-base lg:text-lg text-slate-200 leading-4 group-hover:text-indigo-400">
                                            Dashboard</p>
                                        <p class="text-slate-400 text-sm hidden md:block">Data overview</p>
                                    </div>

                                </div>
                            </a>


                            {{-- <a href="#"
                                class="hover:bg-white/10 transition duration-150 ease-linear rounded-lg py-3 px-2 group"
                                onclick="toggleProductOptions(event)">
                                <div
                                    class="relative flex flex-col space-y-2 md:flex-row md:space-y-0 space-x-2 items-center">
                                    <div>
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                            stroke-width="1.5" stroke="currentColor"
                                            class="w-6 h-6 group-hover:text-indigo-400">
                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                d="M19.5 14.25v-2.625a3.375 3.375 0 00-3.375-3.375h-1.5A1.125 1.125 0 0113.5 7.125v-1.5a3.375 3.375 0 00-3.375-3.375H8.25m2.25 0H5.625c-.621 0-1.125.504-1.125 1.125v17.25c0 .621.504 1.125 1.125 1.125h12.75c.621 0 1.125-.504 1.125-1.125V11.25a9 9 0 00-9-9z" />
                                        </svg>
                                    </div>
                                    <div>
                                        <p
                                            class="font-bold text-base lg:text-lg text-slate-200 leading-4 group-hover:text-indigo-400">
                                            Products</p>
                                        <p class="text-slate-400 text-sm hidden md:block">Manage Products</p>
                                    </div>
                                    <div
                                        class="absolute -top-3 -right-3 md:top-0 md:right-0 px-2 py-1.5 rounded-full bg-indigo-800 text-xs font-mono font-bold">
                                        {{ $count }}</div>
                                </div>
                            </a> --}}

                            {{-- 
                            <a href="#"
                                class="hover:bg-white/10 transition duration-150 ease-linear rounded-lg py-3 px-2 group"> --}}
                            <div class="relative flex flex-col space-y-2 md:flex-row md:space-y-0 space-x-2 items-center">
                                <div class="flex items-center">

                                    <div class="ml-2">

                                        <p
                                            class="font-bold text-base lg:text-xl text-slate-200 leading-4 group-hover:text-indigo-400">
                                            <i class="mdi mdi-cart -ml-2 mr-1"></i>Products
                                        </p>
                                        <ul class="list-none list-inside ml-4">
                                            <li>
                                                <span class="mdi mdi-plus"></span>
                                                <a href="{{ route('admin.addproduct') }}"
                                                    class="font-bold hover:bg-white/10 hover:text-violet-600 transition duration-150 ease-linear rounded-lg py-1 px-1 group">
                                                    Add Products
                                                </a>
                                            </li>
                                            <li>
                                                <span class="mdi mdi-view-agenda"></span>
                                                <a href="{{ route('admin.viewproduct') }}"
                                                    class="font-bold hover:bg-white/10 hover:text-violet-600 duration-150 ease-linear rounded-lg py-1 px-1 group">
                                                    View Products
                                                </a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                                <div
                                    class="absolute -top-3 -right-3 md:top-0 md:right-0 px-2 py-1.5 rounded-full bg-indigo-800 text-xs font-mono font-bold">
                                    {{ $count }}
                                </div>
                            </div>


                            {{-- </a> --}}
                            <div class="relative flex flex-col space-y-2 md:flex-row md:space-y-0 space-x-2 items-center">
                                <div class="flex items-center">

                                    <div class="ml-2">

                                        <p
                                            class="font-bold text-base lg:text-xl text-slate-200 leading-4 group-hover:text-indigo-400">
                                            <i class="mdi mdi-order-bool-ascending -ml-2 mr-1"></i>Orders
                                        </p>
                                        <ul class="list-none list-inside ml-4">
                                            <li>
                                                <span class="mdi mdi-new-box"></span>
                                                <a href="#"
                                                    class="font-bold hover:bg-white/10 hover:text-violet-600 transition duration-150 ease-linear rounded-lg py-1 px-1 group">
                                                    New Orders
                                                </a>
                                            </li>
                                            <li>
                                                <span class="mdi mdi-cash-100"></span>
                                                <a href="#"
                                                    class="font-bold hover:bg-white/10 hover:text-violet-600 duration-150 ease-linear rounded-lg py-1 px-1 group">
                                                    To Pay
                                                </a>
                                            </li>
                                            <li>
                                                <span class="mdi mdi-truck"></span>
                                                <a href="#"
                                                    class="font-bold hover:bg-white/10 hover:text-violet-600 duration-150 ease-linear rounded-lg py-1 px-1 group">
                                                    To Ship
                                                </a>
                                            </li>
                                            <li>
                                                <span class="mdi mdi-clock-time-four"></span>
                                                <a href="#"
                                                    class="font-bold hover:bg-white/10 hover:text-violet-600 duration-150 ease-linear rounded-lg py-1 px-1 group">
                                                    To Be Recieved
                                                </a>
                                            </li>
                                            <li>
                                                <span class="mdi mdi-check-decagram"></span>
                                                <a href="#"
                                                    class="font-bold hover:bg-white/10 hover:text-violet-600 duration-150 ease-linear rounded-lg py-1 px-1 group">
                                                    Completed Orders
                                                </a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                                <div
                                    class="absolute -top-3 -right-3 md:top-0 md:right-0 px-2 py-1.5 rounded-full bg-indigo-800 text-xs font-mono font-bold">
                                    {{ $count }}
                                </div>
                            </div>
                            <a href="#"
                                class="hover:bg-white/10 transition duration-150 ease-linear rounded-lg py-3 px-2 group">
                                <div
                                    class="relative flex flex-col space-y-2 md:flex-row md:space-y-0 space-x-2 items-center">
                                    <div>
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                            stroke-width="1.5" stroke="currentColor"
                                            class="w-6 h-6 group-hover:text-indigo-400">
                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                d="M19.5 14.25v-2.625a3.375 3.375 0 00-3.375-3.375h-1.5A1.125 1.125 0 0113.5 7.125v-1.5a3.375 3.375 0 00-3.375-3.375H8.25m2.25 0H5.625c-.621 0-1.125.504-1.125 1.125v17.25c0 .621.504 1.125 1.125 1.125h12.75c.621 0 1.125-.504 1.125-1.125V11.25a9 9 0 00-9-9z" />
                                        </svg>
                                    </div>
                                    <div>
                                        <p
                                            class="font-bold text-base lg:text-xl text-slate-200 leading-4 group-hover:text-indigo-400">
                                            Invoices</p>
                                        <p class="text-slate-400 text-sm hidden md:block">Manage invoices</p>
                                    </div>
                                    <div
                                        class="absolute -top-3 -right-3 md:top-0 md:right-0 px-2 py-1.5 rounded-full bg-indigo-800 text-xs font-mono font-bold">
                                        23</div>
                                </div>
                            </a>
                            <a href="#"
                                class="hover:bg-white/10 transition duration-150 ease-linear rounded-lg py-3 px-2 group">
                                <div class="flex flex-col space-y-2 md:flex-row md:space-y-0 space-x-2 items-center">
                                    <div>
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                            stroke-width="1.5" stroke="currentColor"
                                            class="w-6 h-6 group-hover:text-indigo-400">
                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                d="M15 19.128a9.38 9.38 0 002.625.372 9.337 9.337 0 004.121-.952 4.125 4.125 0 00-7.533-2.493M15 19.128v-.003c0-1.113-.285-2.16-.786-3.07M15 19.128v.106A12.318 12.318 0 018.624 21c-2.331 0-4.512-.645-6.374-1.766l-.001-.109a6.375 6.375 0 0111.964-3.07M12 6.375a3.375 3.375 0 11-6.75 0 3.375 3.375 0 016.75 0zm8.25 2.25a2.625 2.625 0 11-5.25 0 2.625 2.625 0 015.25 0z" />
                                        </svg>
                                    </div>
                                    <div>
                                        <p
                                            class="font-bold text-base lg:text-xl text-slate-200 leading-4 group-hover:text-indigo-400">
                                            Users</p>
                                        <p class="text-slate-400 text-sm hidden md:block">Manage users</p>
                                    </div>

                                </div>
                            </a>
                            <a href="{{ route('admin.logout') }}"
                                class="hover:bg-white/10 transition duration-150 ease-linear rounded-lg py-3 px-2 group">
                                <div class="flex flex-col space-y-2 md:flex-row md:space-y-0 space-x-2 items-center">
                                    <div>
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                            stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                d="M15.75 9V5.25A2.25 2.25 0 0013.5 3h-6a2.25 2.25 0 00-2.25 2.25v13.5A2.25 2.25 0 007.5 21h6a2.25 2.25 0 002.25-2.25V15M12 9l-3 3m0 0l3 3m-3-3h12.75" />
                                        </svg>


                                    </div>
                                    <div>
                                        <p
                                            class="font-bold text-base lg:text-xl text-slate-200 leading-4 group-hover:text-indigo-400">
                                            Logout</p>
                                        {{-- <p class="text-slate-400 text-sm hidden md:block">Edit settings</p> --}}
                                    </div>

                                </div>
                            </a>
                        </div>
                        <p class="text-sm text-center text-gray-600">v2.0.0.3 | &copy; 2022 Pantazi Soft</p>
                    </div>
                    <div id="content" class="bg-white/10 col-span-9 rounded-lg p-6">
                        <div id="24h">
                            <h1 class="flex font-bold py-4 text-2xl uppercase place-content-center justify-center">New
                                Orders</h1>

                        </div>

                        <div id="last-users">
                            {{-- <h1 class="font-bold py-4 uppercase">New Orders</h1> --}}
                            <div class="overflow-x-scroll">
                                <table class="w-full whitespace-nowrap">
                                    <thead class="bg-white/60">
                                        <th class="text-left text-white py-3 px-2 rounded-l-lg">Invoice #</th>
                                        <th class="text-left text-white py-3 px-2">Order Date</th>
                                        <th class="text-left text-white py-3 px-2">Total</th>
                                        <th class="text-left text-white py-3 px-2">Status</th>
                                        <th class="text-left text-white py-3 px-2 rounded-r-lg">Actions</th>
                                    </thead>
                                    @foreach ($new_orders as $order)
                                        <tr class="border-b border-gray-700">
                                            <td class="py-3 px-2 font-bold">
                                                <div class="inline-flex space-x-3 items-center">
                                                    <span>{{ $order->invoice_id }}</span>
                                                </div>
                                            </td>
                                            <td class="py-3 px-2">{{ $order->payment_date }}</td>
                                            <td class="py-3 px-2">{{ $order->total }}</td>

                                            @if ($order->order_status == 0)
                                                <td class="py-3 px-2">Pending</td>
                                            @elseif($order->order_status == 1)
                                                <td class="py-3 px-2">To be Shipped</td>
                                            @elseif($order->order_status == 2)
                                                <td class="py-3 px-2">To be Recieved</td>
                                            @elseif($order->order_status == 3)
                                                <td class="py-3 px-2">Completed</td>
                                            @endif
                                            <td class="py-6 px-2">
                                                <div class="inline-flex items-center space-x-4">
                                                    <a href="#" title="Edit" class="hover:text-white"
                                                        onclick="openModal('{{ $order->invoice_id }}', event)">
                                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none"
                                                            viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
                                                            class="w-8 h-8 ml-4">
                                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                                d="M16.862 4.487l1.687-1.688a1.875 1.875 0 112.652 2.652L10.582 16.07a4.5 4.5 0 01-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 011.13-1.897l8.932-8.931zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0115.75 21H5.25A2.25 2.25 0 013 18.75V8.25A2.25 2.25 0 015.25 6H10" />
                                                        </svg>
                                                        </a>
                                                </div>
                                            </td>
                                        </tr>
                                    @endforeach
                                </table>
                            </div>

                        </div>

                    </div>

                </div>
            </div>
            {{-- MODALS --}}
            <div id="myModal" class="modal">
                <!-- Modal content -->
                <div class="modal-content">
                    <button class="flex justify-content-end bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded-full"
                                onclick="closeModal()">Close</button>
                    <h1 class="font-bold py-4 uppercase">Order Details</h1>
                    <p id="invoiceId"></p>
                    <div class="overflow-x-scroll">
                        <table class="w-full whitespace-nowrap">
                            <thead class="bg-white/60">
                                <th class="text-left text-black py-3 px-2 rounded-l-lg">Product ID</th>
                                <th class="text-left text-black py-3 px-2">Product Name</th>
                                <th class="text-left text-black py-3 px-2">Product Price</th>
                                <th class="text-left text-black py-3 px-2">Name on Card</th>
                                <th class="text-left text-black py-3 px-2 rounded-r-lg">Card Number</th>
                            </thead>
                            @foreach ($new_orders as $order)
                                <tr class="border-b border-gray-700">
                                    <td class="py-3 px-2 font-bold">
                                        <div class="inline-flex space-x-3 items-center">
                                            <span>{{ $order->invoice_id }}</span>
                                        </div>
                                    </td>
                                    <td class="py-3 px-2">{{ $order->payment_date }}</td>
                                    <td class="py-3 px-2">{{ $order->total }}</td>

                                    @if ($order->order_status == 0)
                                        <td class="py-3 px-2">Pending</td>
                                    @elseif($order->order_status == 1)
                                        <td class="py-3 px-2">To be Shipped</td>
                                    @elseif($order->order_status == 2)
                                        <td class="py-3 px-2">To be Recieved</td>
                                    @elseif($order->order_status == 3)
                                        <td class="py-3 px-2">Completed</td>
                                    @endif
                                    <td class="py-6 px-2">
                                        <div class="inline-flex items-center space-x-4">
                                            <a href="#" title="Edit" class="hover:text-white"
                                                onclick="openModal('{{ $order->invoice_id }}', event)">
                                                <svg xmlns="http://www.w3.org/2000/svg" fill="none"
                                                    viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
                                                    class="w-8 h-8 ml-4">
                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                        d="M16.862 4.487l1.687-1.688a1.875 1.875 0 112.652 2.652L10.582 16.07a4.5 4.5 0 01-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 011.13-1.897l8.932-8.931zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0115.75 21H5.25A2.25 2.25 0 013 18.75V8.25A2.25 2.25 0 015.25 6H10" />
                                                </svg>
                                                </a>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                            
                        </table>
                    </div>
                </div>
            </div>
            {{-- END MODALS --}}

            <script>
                function openModal(invoiceId, event) {
                    event.preventDefault(); // Prevent the default link behavior
                    var modal = document.getElementById("myModal");
                    var invoiceIdElement = document.getElementById("invoiceId");
                    invoiceIdElement.innerText = "Invoice ID: " + invoiceId;
                    modal.style.display = "block";
                }

                function closeModal() {
                    var modal = document.getElementById("myModal");
                    modal.style.display = "none";
                }
            </script>
        @endsection
