<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\View;

class AuthController extends Controller {
    // utils

    public function create(array $data) {
        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password'])
        ]);
    }

    // login

    public function login() {
        if (Auth::check()) {
            return redirect()->route('user.profile');
        }

        return View::make('pages.auth.login');
    }

    public function doLogin(Request $request) {
        $request->validate([
            'email' => 'required',
            'password' => 'required',
        ]);

        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            return redirect()->route('user.profile');
        }

        return redirect()->route('auth.login');
    }

    // register

    public function register() {
        if (Auth::check()) {
            return redirect()->route('user.profile');
        }

        return View::make('pages.auth.register');
    }

    public function doRegister(Request $request) {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6',
        ]);

        $data = $request->all();
        $check = $this->create($data);

        return redirect()->route('auth.login');
    }

    // logout

    public function logout() {
        Session::flush();
        Auth::logout();

        return redirect()->route('auth.login');
    }
}
