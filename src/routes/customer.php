<?php

use Illuminate\Support\Facades\Route;
// use App\Http\Controllers\HomeController;
use App\Http\Controllers\Customer\CustomerController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
//homepage route
//customer route
Route::get('/customer', [CustomerController::class, 'customer_index'])->name('customer_index');
Route::get('/register', [CustomerController::class, 'customer_reg'])->name('register');
Route::post('/register', [CustomerController::class, 'customer_register'])->name('register');

//login route
Route::get('/customer', [CustomerController::class, 'customer_login'])->name('customer');
Route::post('/customer', [CustomerController::class, 'customerlogin'])->name('customer');

//welcome route
Route::get('/welcome', [CustomerController::class, 'welcome'])->name('welcome');