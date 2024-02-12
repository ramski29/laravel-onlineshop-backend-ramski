<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('pages.auth.login');
});

Route::get('/users', function () {
    return view('pages.users.index');
});

Route::get('/products', function () {
    return view('pages.products.index');
});

Route::middleware('auth')->group(function () {
    Route::get('home', function () {
        return view('pages.dashboard');
    })->name('home');
    // route from user controller
    Route::resource('users', 'App\Http\Controllers\UserController');
    // route from product controller
    Route::resource('products', 'App\Http\Controllers\ProductController');
    // route from category controller
    Route::resource('categories', 'App\Http\Controllers\CategoryController');
});
