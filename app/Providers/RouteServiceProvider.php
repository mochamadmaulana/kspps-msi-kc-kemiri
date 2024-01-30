<?php

namespace App\Providers;

use Illuminate\Cache\RateLimiting\Limit;
use Illuminate\Foundation\Support\Providers\RouteServiceProvider as ServiceProvider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\RateLimiter;
use Illuminate\Support\Facades\Route;

class RouteServiceProvider extends ServiceProvider
{
    /**
     * The path to your application's "home" route.
     *
     * Typically, users are redirected here after authentication.
     *
     * @var string
     */
    // public const HOME = '/home';
    public const ADMIN = '/admin/dashboard';
    public const ASMEN_PEMBIAYAAN = '/asmen-pembiayaan/dashboard';
    public const ASMEN_KEUANGAN = '/asmen-keuangan/dashboard';
    public const STAFF_LAPANGAN = '/staff-lapangan/dashboard';
    public const BRANCH_MANAGER = '/branch-manager/dashboard';

    /**
     * Define your route model bindings, pattern filters, and other route configuration.
     */
    public function boot(): void
    {
        RateLimiter::for('api', function (Request $request) {
            return Limit::perMinute(60)->by($request->user()?->id ?: $request->ip());
        });

        $this->routes(function () {
            Route::middleware('api')
                ->prefix('api')
                ->group(base_path('routes/api.php'));

            Route::middleware('web')
                ->group(base_path('routes/web.php'));

            // Admin
            Route::middleware('web')
            ->group(base_path('routes/admin.php'));

            // Asmen Pembiayaan
            Route::middleware('web')
            ->group(base_path('routes/asmen_pembiayaan.php'));

            // Staff Lapangan
            Route::middleware('web')
            ->group(base_path('routes/staff_lapangan.php'));

            // Branch Manager
            Route::middleware('web')
            ->group(base_path('routes/branch_manager.php'));
        });
    }
}
