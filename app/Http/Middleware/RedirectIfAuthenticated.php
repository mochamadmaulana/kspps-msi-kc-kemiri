<?php

namespace App\Http\Middleware;

use App\Providers\RouteServiceProvider;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class RedirectIfAuthenticated
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next, string ...$guards): Response
    {
        $guards = empty($guards) ? [null] : $guards;

        foreach ($guards as $guard) {
            if (Auth::guard($guard)->check()) {
                if (Auth::user()->role == 'Admin') {
                    return redirect(RouteServiceProvider::ADMIN);
                }elseif (Auth::user()->role == 'Asmen Pembiayaan') {
                    return redirect(RouteServiceProvider::ASMEN_PEMBIAYAAN);
                // }elseif (Auth::user()->role == 'Asmen Keuangan') {
                //     return redirect(RouteServiceProvider::ASMEN_KEUANGAN);
                }elseif (Auth::user()->role == 'Staff Lapangan') {
                    return redirect(RouteServiceProvider::STAFF_LAPANGAN);
                }else{
                    return redirect(RouteServiceProvider::BRANCH_MANAGER);
                }
            }
        }

        return $next($request);
    }
}
