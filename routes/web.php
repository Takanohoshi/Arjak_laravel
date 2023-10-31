<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\LogoutController;
use App\Http\Controllers\Admin\AdminUserController;
use App\Http\Controllers\Admin\CategoryController;
use App\http\Controllers\Admin\DataartikelContoller;
use App\http\Controllers\dataa;
use App\Http\Controllers\petugas\dataController;

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


Route::get('/', [dataa::class, 'index'])->name('home');

Route::get('about', function () {
    return view('about');
});

Route::get('category', function () {
    return view('category');
});

route::get('/login', [LoginController::class, 'index']);
route::post('post', [LoginController::class, 'poslog'])->name('poslog');



route::get('logout', [LogoutController::class, 'logout'] );

// // seesion logout
// Route::middleware(['auth:admin,petugas'])->group(function(){
// });

Route::middleware(['auth'])->group(function(){
    
    route::get('admindash', function(){
        return view ('admin.index');
    });
    
    route::get('petugasdash', function(){
        return view ('petugas.index');
    });
// Admin Dashboard
Route::resource('dashboard/users', AdminUserController::class)->except('show')->middleware('admin');
Route::resource('dashboard/category', CategoryController::class)->except('show')->middleware('admin');
Route::resource('dashboard/artikeldata', DataartikelContoller::class)->except('show')->middleware('admin');

// Petugas Dashboard
Route::resource('dashboard/datapetugas', dataController::class)->except('show')->middleware('petugas');
});






