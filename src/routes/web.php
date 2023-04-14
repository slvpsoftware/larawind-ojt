<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\HomeController;
use App\Http\Controllers\PagesController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\ProductController;
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
Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/login', [AdminController::class, 'login'])->name('login');
//logout route
Route::get('/logout', [AdminController::class, 'logout'])->name('logout');

//login route
Route::post('/adminlogin', [AdminController::class, 'adminlogin'])->name('adminlogin');

//signup route
Route::get('/signup', [AdminController::class, 'register'])->name('signup');
Route::post('/signup', [AdminController::class, 'signup'])->name('signup');

//adding of product route
Route::get('/addproduct', [ProductController::class, 'addprod'])->name('adpproduct');
Route::post('/addproduct', [ProductController::class, 'addProduct'])->name('addproduct');

//homapage route
Route::get('/home', [AdminController::class, 'home'])->name('home');

//view product
Route::get('/viewproduct', [ProductController::class, 'viewProduct'])->name('viewproduct');

//route for deleting product using post
Route::post('/deleteproduct', [ProductController::class, 'deleteProduct'])->name('deleteproduct');

//edit product route
Route::get('/editproduct/{id}', [ProductController::class, 'editProduct'])->name('editproduct');
//put route for updating product
Route::post('/editproduct/{id}', [ProductController::class, 'updateProduct'])->name('editproduct');
