<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\HomeController;
use App\Http\Controllers\PagesController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\ProductController;
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
// // //homepage route
// Route::get('/admin', [HomeController::class, 'index'])->name('home');
// Route::get('/login', [AdminController::class, 'login'])->name('login');
// //logout route
// Route::get('/logout', [AdminController::class, 'logout'])->name('logout');

// //login route
// Route::post('/adminlogin', [AdminController::class, 'adminlogin'])->name('adminlogin');

// //signup route
// Route::get('/signup', [AdminController::class, 'register'])->name('signup');
// Route::post('/signup', [AdminController::class, 'signup'])->name('signup');

// //adding of product route
// Route::get('/addproduct', [ProductController::class, 'addprod'])->name('adpproduct');
// Route::post('/addproduct', [ProductController::class, 'addProduct'])->name('addproduct');

// //homapage route
// Route::get('/home', [AdminController::class, 'home'])->name('home');

// //view product
// Route::get('/viewproduct', [ProductController::class, 'viewProduct'])->name('viewproduct');

// //route for deleting product using post
// Route::post('/deleteproduct', [ProductController::class, 'deleteProduct'])->name('deleteproduct');

// //edit product route
// Route::get('/editproduct/{id}', [ProductController::class, 'editProduct'])->name('editproduct');
// //put route for updating product
// Route::post('/editproduct/{id}', [ProductController::class, 'updateProduct'])->name('editproduct');

// //route for deleting image using post
// Route::get('/deleteimage', [ProductController::class, 'deleteImage'])->name('deleteimage');
// //search pruduct route
// Route::get('/search', [ProductController::class, 'search'])->name('search');
// //filter category route
// Route::get('/filtercategory', [ProductController::class, 'filterCategory'])->name('filtercategory');
// //filter price route
// Route::get('/filterprice', [ProductController::class, 'filterPrice'])->name('filterprice');
//-------------------------admin route---------------------------------

// Auth::routes();

// Route::prefix('admin')->name('admin.')->group(function(){

//     Route::middleware(['guest'])->group(function(){
//         Route::view('/login', 'admin.login')->name('login');
//         Route::get('/', [HomeController::class, 'index'])->name('home');
//         Route::post('/login', [AdminController::class, 'login'])->name('login');
//     });
// });
Auth::routes();

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::prefix('admin')->name('admin.')->group(function(){
    
        Route::middleware(['guest'])->group(function(){
            // Route::view('/login', 'pages.login')->name('login');
            // Route::view('/signup', 'pages.signup')->name('signup');
            Route::get('/', [HomeController::class, 'index'])->name('home');
            Route::get('/login', [AdminController::class, 'login'])->name('login');
            Route::post('/login', [AdminController::class, 'adminlogin'])->name('login');
            Route::get('/signup', [AdminController::class, 'register'])->name('signup');
            Route::post('/signup', [AdminController::class, 'signup'])->name('signup');
        });

        //route middleware for sign up
    
        Route::middleware(['auth:admin'])->group(function(){
            Route::get('/logout', [AdminController::class, 'logout'])->name('logout');
            Route::get('/home', [AdminController::class, 'home'])->name('home');
            Route::get('/addproduct', [ProductController::class, 'addprod'])->name('adpproduct');
            Route::post('/addproduct', [ProductController::class, 'addProduct'])->name('addproduct');
            Route::get('/viewproduct', [ProductController::class, 'viewProduct'])->name('viewproduct');
            Route::post('/deleteproduct', [ProductController::class, 'deleteProduct'])->name('deleteproduct');
            Route::get('/editproduct/{id}', [ProductController::class, 'editProduct'])->name('editproduct');
            Route::post('/editproduct/{id}', [ProductController::class, 'updateProduct'])->name('editproduct');
            Route::get('/deleteimage', [ProductController::class, 'deleteImage'])->name('deleteimage');
            Route::get('/search', [ProductController::class, 'search'])->name('search');
            Route::get('/filtercategory', [ProductController::class, 'filterCategory'])->name('filtercategory');
            Route::get('/filterprice', [ProductController::class, 'filterPrice'])->name('filterprice');
        });
    });
//-------------------------customer route---------------------------------
