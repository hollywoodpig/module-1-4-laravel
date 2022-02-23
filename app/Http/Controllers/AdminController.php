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

        return View::make('pages.admin.apps', ['apps' => $apps, 'title' => 'все заявки']);
    }

    public function appsByUser($id) {
        if (User::where('id', $id)->exists()) {
            $apps = App::where('user_id', $id)->get();
            $user_name = User::where('id', $id)->value('name');

            return View::make('pages.admin.apps', ['apps' => $apps, 'title' => "заявки пользователя \"$user_name\""]);
        }

        return abort(404);
    }

    // users

    public function users() {
        $users = User::all()->except(Auth::id());

        return View::make('pages.admin.users', ['users' => $users]);
    }
}
