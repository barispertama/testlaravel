<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\DashboardController;

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
    return view('welcome');
});

Route::get('login', function () {
    return view('auth/login');
});

// Route::get('register', function () {
//     return view('auth/register');
// });



Route::get('/login', [LoginController::class,'index'])->name('login')->middleware('guest');
Route::post('/login', [LoginController::class,'auth']);
Route::get('/logout', [LoginController::class,'logout']);
Route::get('register', [RegisterController::class,'index'])->middleware('guest');
Route::post('register', [RegisterController::class,'registerStore']);
Route::get('/dashboard', [DashboardController::class,'index'])->middleware('auth');

Route::get('getdata', [DashboardController::class, 'index'])->name('getdata.index');
Route::post('getdata/store', [DashboardController::class, 'store'])->name('getdata.store');
Route::get('getdata/edit/{id}/', [DashboardController::class, 'edit']);
Route::post('getdata/update', [DashboardController::class, 'update'])->name('getdata.update');
Route::get('getdata/destroy/{id}/', [DashboardController::class, 'destroy']);
