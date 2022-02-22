<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;
use \App\Http\Controllers\UserController;
use \App\Http\Controllers\AppController;

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

// user

Route::get('', [UserController::class, 'home'])->name('user.home');
Route::middleware(['notAdmin'])->group(function() {
    Route::get('profile', [UserController::class, 'profile'])->name('user.profile');
});

// admin

Route::middleware(['admin'])->group(function() {
    Route::get('admin', [AdminController::class, 'dashboard'])->name('admin.dashboard');

    Route::get('admin/apps', [AdminController::class, 'apps'])->name('admin.apps');

    Route::get('admin/users', [AdminController::class, 'users'])->name('admin.users');
});

// auth

Route::group(['prefix' => 'auth'], function() {
    Route::get('login', [AuthController::class, 'login'])->name('auth.login');
    Route::post('doLogin', [AuthController::class, 'doLogin'])->name('auth.doLogin');

    Route::get('register', [AuthController::class, 'register'])->name('auth.register');
    Route::post('doRegister', [AuthController::class, 'doRegister'])->name('auth.doRegister');

    Route::post('logout', [AuthController::class, 'logout'])->name('auth.logout');
});

// apps

Route::group(['prefix' => 'app'], function() {
    Route::get('add', [AppController::class, 'add'])->name('app.add');
    Route::post('doAdd', [AppController::class, 'doAdd'])->name('app.doAdd');

    Route::get('{id}', [AppController::class, 'view'])->name('app.view');
});

Route::middleware(['app'])->group(function() {
    Route::get('app/{id}/edit', [AppController::class, 'edit'])->name('app.edit');
    Route::post('app/{id}/doEdit', [AppController::class, 'doEdit'])->name('app.doEdit');

    Route::get('app/{id}/remove', [AppController::class, 'remove'])->name('app.remove');
    Route::post('app/{id}/doRemove', [AppController::class, 'doRemove'])->name('app.doRemove');
});
