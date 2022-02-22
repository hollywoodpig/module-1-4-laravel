<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\View;
use App\Models\App;

class AppController extends Controller {
    // add

    public function add() {
        if (Auth::check()) {
            return View::make('pages.app.add');
        }

        return redirect()->route('user.home');
    }

    public function doAdd(Request $request) {
        if (Auth::check()) {
            $request->validate([
                'title' => 'required',
                'text' => 'required',
                'img_before' => 'required|image'
            ]);

            $app = new App();

            $app->user_id = auth()->user()->id;
            $app->title = $request->input('title');
            $app->text = $request->input('text');
            $app->img_before = base64_encode(file_get_contents($request->file('img_before')));

            $app->save();

            return redirect()->route('user.profile');
        }

        return redirect()->route('app.add');
    }
}
