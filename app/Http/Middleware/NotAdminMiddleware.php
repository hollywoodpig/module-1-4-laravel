<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class NotAdminMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     */
    public function handle(Request $request, Closure $next) {
        if (auth()->check() && !auth()->user()->admin) {
            return $next($request);
        }

        if (auth()->check() && auth()->user()->admin) {
            return redirect()->route('admin.dashboard');
        }

        return abort(404);
    }
}
