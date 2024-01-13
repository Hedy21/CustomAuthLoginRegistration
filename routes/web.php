<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CustomAuthController;

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

Route::get('/',[CustomAuthController::class,'home']);
Route::get('dashboard',[CustomAuthController::class,'dashboard']);
Route::get('/home',[CustomAuthController::class,'home']);
Route::get('login',[CustomAuthController::class,'index'])->name('login');
Route::post('postLogin',[CustomAuthController::class,'login'])->name('postLogin');
Route::get('register',[CustomAuthController::class,'singUp'])->name('register');
Route::post('register',[CustomAuthController::class,'register'])->name('postRegister');
Route::get('signout',[CustomAuthController::class,'signout'])->name('signout');


