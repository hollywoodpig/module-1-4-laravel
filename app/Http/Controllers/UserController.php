<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class UserController extends Controller {
    // home

    public function home() {
        return View::make('pages.user.home');
    }

    // profile

    public function profile() {
        if (Auth::check()) {
            $apps = auth()->user()->apps;

            return View::make('pages.user.profile', ['apps' => $apps]);
        }

        return redirect()->route('user.login');
    }
}
