<?php

namespace App\Providers;

use Illuminate\Http\Request;
use Illuminate\Routing\Router;
use Illuminate\Support\Facades\Route;
use Illuminate\Foundation\Support\Providers\RouteServiceProvider as ServiceProvider;

class RouteServiceProvider extends ServiceProvider
{
    /**
     * This namespace is applied to your controller routes.
     *
     * In addition, it is set as the URL generator's root namespace.
     *
     * @var string
     */
    protected $namespace = 'App\Http\Controllers';

    /**
     * Define your route model bindings, pattern filters, etc.
     *
     * @return void
     */
    public function boot()
    {
        //

        parent::boot();
    }

    /**
     * Define the routes for the application.
     *
     * @return void
     */
    public function map(Router $router, Request $request)
    {
        $this->mapApiRoutes();

        $this->mapWebRoutes();

        $this->mapOtherRoutes();

        $this->mapCustomerRoutes();

        $this->mapEditorRoutes();

    }



    /**
     * Define the "editor" routes for the application.
     *
     * These routes all receive session state, CSRF protection, etc.
     *
     * @return void
     */
    protected function mapEditorRoutes()
    {
        Route::group([
            'middleware' => ['web', 'editor', 'auth:editor'],
            'prefix' => 'editor',
            'as' => 'editor.',
            'namespace' => $this->namespace,
        ], function ($router) {
            require base_path('routes/editor.php');
        });
    }

    /**
     * Define the "customer" routes for the application.
     *
     * These routes all receive session state, CSRF protection, etc.
     *
     * @return void
     */
    protected function mapCustomerRoutes()
    {
        Route::group([
            'middleware' => ['web', 'customer', 'auth:customer'],
            'prefix' => 'customer',
            'as' => 'customer.',
            'namespace' => $this->namespace,
        ], function ($router) {
            require base_path('routes/customer.php');
        });
    }

    /**
     * Define the "other" routes for the application.
     *
     * These routes all receive session state, CSRF protection, etc.
     *
     * @return void
     */
    protected function mapOtherRoutes()
    {
        Route::group([
            'middleware' => ['web', 'other', 'auth:other'],
            'prefix' => 'other',
            'as' => 'other.',
            'namespace' => $this->namespace,
        ], function ($router) {
            require base_path('routes/other.php');
        });
    }

    /**
     * Define the "web" routes for the application.
     *
     * These routes all receive session state, CSRF protection, etc.
     *
     * @return void
     */
    protected function mapWebRoutes()
    {
        Route::middleware('web')
             ->namespace($this->namespace)
             ->group(base_path('routes/web.php'));
    }


    /**
     * Define the "api" routes for the application.
     *
     * These routes are typically stateless.
     *
     * @return void
     */
    protected function mapApiRoutes()
    {
        Route::prefix('api')
             ->middleware('api')
             ->namespace($this->namespace)
             ->group(base_path('routes/api.php'));
    }
}
