<?php

namespace App\Http\Controllers;

use App\Models\App;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\View;

class AdminController extends Controller {
    // dashboard

    public function dashboard() {
        return View::make('pages.admin.dashboard');
    }

    // apps

    public function apps() {
        $apps = App::all();

        return View::make('pages.admin.apps', ['apps' => $apps]);
    }

    public function appsByUser($id) {
        $apps = App::where('user_id', $id)->get();

        return View::make('pages.admin.apps', ['apps' => $apps]);
    }

    // users

    public function users() {
        $users = User::all()->except(Auth::id());

        return View::make('pages.admin.users', ['users' => $users]);
    }
}
