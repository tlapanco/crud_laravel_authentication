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
     * The path to the "home" route for your application.
     *
     * This is used by Laravel authentication to redirect users after login.
     *
     * @var string
     */
    public const HOME = '/home';

    /**
     * The controller namespace for the application.
     *
     * When present, controller route declarations will automatically be prefixed with this namespace.
     *
     * @var string|null
     */
    // protected $namespace = 'App\\Http\\Controllers';

    /**
     * Define your route model bindings, pattern filters, etc.
     *
     * @return void
     */
    public function boot()
    {
        $this->configureRateLimiting();

        $this->routes(function () {
            Route::prefix('api')
                ->middleware('api')
                ->namespace($this->namespace)
                ->group(base_path('routes/api.php'));

            Route::middleware('web')
                ->namespace($this->namespace)
                ->group(base_path('routes/web.php'));
        });

        Route::bind('item', function ($value, $route) {
            return $this->getModel(\App\Models\Prueba::class, $value);
        });
        Route::bind('libro', function ($value, $route) {
            return $this->getModel(\App\Models\libro::class, $value);
        });
        Route::bind('estudiantes', function ($value, $route) {
            return $this->getModel(\App\Models\estudiantes::class, $value);
        });
        Route::bind('asesores_academicos', function ($value, $route) {
            return $this->getModel(\App\Models\asesores_academicos::class, $value);
        });
        Route::bind('solicitudes', function ($value, $route) {
            return $this->getModel(\App\Models\solicitudes::class, $value);
        });
        Route::bind('empresas', function ($value, $route) {
            return $this->getModel(\App\Models\empresas::class, $value);
        });
        Route::bind('asesores_industriales', function ($value, $route) {
            return $this->getModel(\App\Models\asesores_industriales::class, $value);
        });
        Route::bind('estatus', function ($value, $route) {
            return $this->getModel(\App\Models\estatus::class, $value);
        });


    }

    /**
     * Configure the rate limiters for the application.
     *
     * @return void
     */
    protected function configureRateLimiting()
    {
        RateLimiter::for('api', function (Request $request) {
            return Limit::perMinute(60)->by(optional($request->user())->id ?: $request->ip());
        });
    }

    private function getModel($model, $routeKey)
    {
        $id = \Hashids::connection($model)->decode($routeKey)[0] ?? null;
        $modelInstance = resolve($model);
        return $modelInstance->findOrFail($id);
    }
}
