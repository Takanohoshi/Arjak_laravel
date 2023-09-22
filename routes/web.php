<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\LogoutController;
use App\Http\Controllers\AdminController;

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
    return view ('admin.dashboard');
});

route::get('petugasdash', function(){
    return view ('petugas.dashboard');
});

route::get('logout', [LogoutController::class, 'logout'] );