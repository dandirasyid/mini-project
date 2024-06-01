<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class ConfirmPassword
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if ($request->is('editProfile')) {
            if (!Auth::check()) {
                return redirect()->route('login');
            }

            if (!Auth::validate(['username' => Auth::user()->username, 'password' => $request->password_confirmation])) {
                return redirect()->back()->withErrors(['password_confirmation' => 'Password yang Anda masukkan tidak valid']);
            }
        }
        return $next($request);
    }
}
