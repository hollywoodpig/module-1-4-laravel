<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\View;
use App\Models\App;
use Illuminate\Support\Carbon;

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

    // view

    public function view($id) {
        $app = App::find($id);

        if (App::where('id', $id)->exists()) {
            return View::make('pages.app.view', ['app' => $app]);
        }

        return abort(404);
    }

    // edit

    public function edit($id) {
        $app = App::find($id);

        if (App::where('id', $id)->exists()) {
            return View::make('pages.app.edit', ['app' => $app]);
        }

        return abort(404);
    }

    public function doEdit(Request $request, $id) {
        $request->validate([
            'title' => 'string',
            'text' => 'string',
            'img_before' => 'image',
            'img_after' => 'image'
        ]);

        $app = App::find($id);

        $app->title = $request->has('title') ? $request->input('title') : $app->title;
        $app->text = $request->has('text') ? $request->input('text') : $app->text;
        $app->img_before = $request->hasFile('img_before') ? base64_encode(file_get_contents($request->file('img_before'))) : $app->img_before;
        $app->img_after = $request->hasFile('img_after') ? base64_encode(file_get_contents($request->file('img_after'))) : $app->img_after;
        $app->solved = $app->solved;

        if (auth()->user()->admin) {
            $app->solved = $request->has('solved');
        }

        $app->save();

        return redirect()->route('app.view', $id);
    }

    // remove

    public function remove($id) {
        return View::make('pages.app.remove', ['id' => $id]);
    }

    public function doRemove($id) {
        App::find($id)->delete();

        return redirect()->route('user.home')->with('success', 'заявка была удалена ;(');
    }
}
