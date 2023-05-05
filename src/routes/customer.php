<?php

use Illuminate\Support\Facades\Route;
// use App\Http\Controllers\HomeController;
use App\Http\Controllers\Customer\CustomerController;
use App\Http\Controllers\Admin\AdminController;

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
Route::prefix('customer')->name('customer.')->group(function(){
     Route::middleware(['guest:customer','PreventBackHistory'])->group(function(){
        Route::get('/', [CustomerController::class, 'customer_index'])->name('customer_index');
        Route::get('/register', [CustomerController::class, 'customer_reg'])->name('register');
        Route::post('/registers', [CustomerController::class, 'customer_register'])->name('registers');
        //login route
        Route::get('/login', [CustomerController::class, 'customer_login'])->name('login');
        Route::post('/logins', [CustomerController::class, 'customerlogin'])->name('logins');
        

    });

    Route::middleware(['auth:customer','PreventBackHistory'])->group(function(){
        Route::get('/welcome', [CustomerController::class, 'welcome'])->name('welcome');
        Route::get('/logout', [CustomerController::class, 'logout'])->name('logout');  
        Route::get('/listofstores', [CustomerController::class, 'list'])->name('listofstores');
        Route::get('/viewproductbystore/{id}', [CustomerController::class, 'viewproductbystore'])->name('viewproductbystore');
        Route::post('/addtocart/{id}', [CustomerController::class, 'addtocart'])->name('addtocart');
        Route::get('/mycart', [CustomerController::class, 'viewcart'])->name('mycart');
        Route::post('/deleteproduct', [CustomerController::class, 'deleteProduct'])->name('deleteproduct');
    });
});


