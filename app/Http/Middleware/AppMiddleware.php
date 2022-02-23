<?php

namespace App\Http\Middleware;

use App\Models\App;
use Closure;
use Illuminate\Http\Request;

class AppMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     */
    public function handle(Request $request, Closure $next) {
        $app_id = $request->route()->parameter('id');
        $user_id = auth()->user()->id ?? '';

        $is_users_app = false;
        $is_admin = auth()->user()->admin ?? '';

        if ($user_id) {
            $app = App::where([
                ['id', $app_id],
                ['user_id', $user_id]
            ])->get();

            $is_users_app = !$app->isEmpty();
        }

        if ($is_users_app || $is_admin) {
            return $next($request);
        }

        return redirect()->route('app.view', $app_id);
    }
}
