<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\LogoutController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\Admin\AdminUserController;
use App\Http\Controllers\Admin\CategoryController;




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
    return view('home');
});

Route::get('about', function () {
    return view('about');
});

Route::get('category', function () {
    return view('category');
});

route::get('login', [LoginController::class, 'index']);
route::post('post', [LoginController::class, 'poslog'])->name('poslog');

route::get('admindash', function(){
    return view ('admin.index');
});

route::get('petugasdash', function(){
    return view ('petugas.index');
});

route::get('logout', [LogoutController::class, 'logout'] );

// Admin Dashboard
Route::resource('dashboard/users', AdminUserController::class)->except('show')->middleware('admin');
Route::resource('dashboard/category', CategoryController::class)->except('show')->middleware('admin');









