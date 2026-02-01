<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class CheckRole
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next, string ...$roles): Response
    {
        // Check if user is authenticated
        if (! Auth::check()) {
            return redirect()->route('login')->with('error', 'Silakan login terlebih dahulu.');
        }

        $user = Auth::user();

        // Check if user is active
        if (! $user->is_active) {
            Auth::logout();

            return redirect()->route('login')->with('error', 'Akun Anda tidak aktif. Silakan hubungi administrator.');
        }

        // If no specific roles required, just check if user has valid role
        if (empty($roles)) {
            if (in_array($user->role, ['owner', 'admin', 'editor'])) {
                return $next($request);
            }

            return redirect()->route('login')->with('error', 'Anda tidak memiliki akses ke halaman ini.');
        }

        // Check if user has one of the required roles
        if (in_array($user->role, $roles)) {
            return $next($request);
        }

        // User doesn't have required role
        abort(403, 'Anda tidak memiliki izin untuk mengakses halaman ini.');
    }
}
