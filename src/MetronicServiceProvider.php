<?php

namespace yudijohn\Metronic;

use Illuminate\Support\ServiceProvider;

class MetronicServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        // require __DIR__.'/helpers/helpers.php';
        $this->loadViewsFrom(__DIR__.'/views', 'metronic' );
        $this->publishes( [
            __DIR__.'/plugins' => base_path( 'public/plugins/yudijohn/metronic' ),
            __DIR__.'/views' => resource_path( 'views/vendor/yudijohn/metronic-skeleton' ),
        ] );
        $this->app[ 'router' ]->pushMiddlewareToGroup( 'web', Middleware\CustomForms::class );
    }
}