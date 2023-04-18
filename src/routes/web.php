<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\HomeController;
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
Route::get('/', [HomeController::class, 'index'])->name('home');
Route::post('/adminlogin', [AdminController::class, 'adminlogin'])->name('adminlogin');

Route::get('/login', [AdminController::class, 'login'])->name('login');

Route::get('/signup', [AdminController::class, 'register'])->name('signup');
Route::post('/signup', [AdminController::class, 'registration'])->name('signup');

Route::get('/home', [AdminController::class, 'home'])->name('home');
Route::get('/logout', [AdminController::class, 'logout'])->name('logout');

Route::get('/add_product', [ProductController::class, 'add_product'])->name('add_product');
Route::post('/new_product', [ProductController::class, 'addedProduct'])->name('new_product');
Route::get('/view_product', [ProductController::class, 'view_product'])->name('view_product');

//delete product
Route::post('/delete_product', [ProductController::class, 'delete_product'])->name('delete_product');

//view edit product
Route::get('/edit_product/{id}', [ProductController::class, 'edit_product'])->name('edit_product');

//edit product
Route::post('/edited_product/{id}', [ProductController::class, 'edited_product'])->name('edited_product');

//delete image
Route::get('/delete_image', [ProductController::class, 'delete_image'])->name('delete_image');

//filter
Route::get('/filterCategory', [ProductController::class, 'filterCategory'])->name('filterCategory');