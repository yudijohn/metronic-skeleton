<?php

namespace yudijohn\Metronic;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Blade;

class MetronicServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->mergeConfigFrom(
            __DIR__.'/../config/system.php', 'system'
        );
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        // require __DIR__.'/helpers/helpers.php';
        // $this->loadMigrationsFrom( __DIR__.'/database/migrations' );
        $this->loadViewsFrom( __DIR__.'/../resources/views', 'metronic' );
        $this->publishes( [
            __DIR__.'/plugins' => base_path( 'public/plugins/yudijohn/metronic' ),
        ], 'plugins' );
        $this->publishes( [
            // __DIR__.'/Resources' => base_path( 'app/Http/Resources' ),
            // __DIR__.'/database/migrations' => base_path( 'database/migrations' ),
            __DIR__.'/../resources/views/layout/index_parts/aside.blade.php' => resource_path( 'views/vendor/metronic/layout/index_parts/aside.blade.php' ),
            __DIR__.'/../resources/views/components/icons' => resource_path( 'views/vendor/metronic/components/icons' ),
            __DIR__.'/../config/system.php' => config_path( 'system.php' ),
            __DIR__.'/../resources/lang' => resource_path( 'lang/vendor/metronic' ),
        ], 'resources' );
        $this->app[ 'router' ]->pushMiddlewareToGroup( 'web', Middleware\CustomForms::class );
        $this->loadRoutesFrom( __DIR__.'/../routes/web.php' );
        $this->loadRoutesFrom( __DIR__.'/../routes/admin.php' );
        $this->loadRoutesFrom( __DIR__.'/../routes/api.php' );
        $this->mergeConfigFrom( __DIR__.'/../config/system.php', 'system' );
        $this->loadTranslationsFrom(__DIR__.'/../resources/lang', 'metronic' );

        Blade::component( 'icon', \yudijohn\Metronic\View\Components\Icon::class );
        Blade::component( 'app-container', \yudijohn\Metronic\View\Components\AppContainer::class );
        Blade::component( 'card', \yudijohn\Metronic\View\Components\Card::class );
    }
}