<?php

namespace DondePauto\Website;

use Illuminate\Support\ServiceProvider;

class WebsiteServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     */
    public function boot()
    {
        // Registrar proveedores de servicios
        $this->app->register(Providers\RouteServiceProvider::class);

        // Registrar recursos
        $this->publishResources([
            'resources/views/errors',
        ]);
        $this->loadTranslationsFrom(__DIR__.'/../resources/lang', 'dondepauto');
        $this->loadViewsFrom(__DIR__.'/../resources/views', 'dondepauto');
    }

    /**
     * Register any application services.
     */
    public function register()
    {
        //
    }

    /**
     * Register the publishable files.
     *
     * @param  array  $paths
     */
    private function publishResources( $paths )
    {
        $package_path = realpath(__DIR__.'/..');
        $paths = collect($paths)->reduce(function($map, $path) use ($package_path) {
            $map["{$package_path}/{$path}/"] = base_path($path);
            return $map;
        }, []);

        $this->publishes($paths, 'dondepauto');
    }
}
