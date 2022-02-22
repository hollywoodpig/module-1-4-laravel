<?php

namespace App\Http\Controllers;

use App\Models\App;
use Illuminate\Http\Request;
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
}
