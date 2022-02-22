<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use App\Models\App;

class UserController extends Controller {
    // home

    public function home() {
        $solved_apps = App::where('solved', 1)->get();

        return View::make('pages.user.home', ['solved_apps' => $solved_apps]);
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
