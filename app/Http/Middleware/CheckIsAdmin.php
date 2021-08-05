<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CheckIsAdmin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        $user = Auth::user();

        // isAdmin добавили в /app/Models/User.php
        if(!$user->isAdmin()) {
            session()->flash('warning', 'У вас нет прав администратора');
            return redirect()->route('index');
        }

        return $next($request);
    }
}
