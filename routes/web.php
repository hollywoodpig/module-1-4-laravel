<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\View;
use \App\Http\Controllers\UserController;

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

Route::get('/', [UserController::class, 'home'])->name('user.home');
Route::get('dashboard', [UserController::class, 'dashboard'])->name('user.dashboard');
Route::get('login', [UserController::class, 'login'])->name('user.login');
Route::get('register', [UserController::class, 'register'])->name('user.register');
Route::post('doLogin', [UserController::class, 'doLogin'])->name('user.doLogin');
Route::post('doRegister', [UserController::class, 'doRegister'])->name('user.doRegister');
Route::post('logout', [UserController::class, 'logout'])->name('user.logout');
