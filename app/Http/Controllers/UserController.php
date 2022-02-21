<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class UserController extends Controller {
    // utils

    public function create(array $data) {
        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password'])
        ]);
    }

    // home

    public function home() {
        return View::make('pages.user.home');
    }

    // dashboard

    public function dashboard() {
        if (Auth::check()) {
            return View::make('pages.user.dashboard');
        }

        return redirect()->route('user.login');
    }

    // login

    public function login() {
        if (Auth::check()) {
            return redirect()->route('user.dashboard');
        }

        return View::make('pages.user.login');
    }

    public function doLogin(Request $request) {
        $request->validate([
            'email' => 'required',
            'password' => 'required',
        ]);

        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            return redirect()->route('user.dashboard');
        }

        return redirect()->route('user.login');
    }

    // register

    public function register() {
        if (Auth::check()) {
            return redirect()->route('user.dashboard');
        }

        return View::make('pages.user.register');
    }

    public function doRegister(Request $request) {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6',
        ]);

        $data = $request->all();
        $check = $this->create($data);

        return redirect()->route('user.dashboard');
    }

    // logout

    public function logout() {
        Session::flush();
        Auth::logout();

        return redirect()->route('user.login');
    }
}
