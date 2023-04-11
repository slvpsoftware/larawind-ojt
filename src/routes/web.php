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
Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/login', [AdminController::class, 'login'])->name('login');

Route::post('/adminlogin', [AdminController::class, 'adminlogin'])->name('adminlogin');

Route::get('/signup', [AdminController::class, 'register'])->name('signup');
Route::post('/signup', [AdminController::class, 'signup'])->name('signup');

Route::get('/addproduct', [ProductController::class, 'addprod'])->name('adpproduct');
Route::post('/addproduct', [ProductController::class, 'addProduct'])->name('addproduct');