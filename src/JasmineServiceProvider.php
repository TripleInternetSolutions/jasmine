<?php

namespace TIS\Jasmine;

use Illuminate\Support\ServiceProvider;

class JasmineServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton('jasmine', function () {
            return new Jasmine();
        });
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        $this->loadViewsFrom(__DIR__ . '/../resources/views', 'jasmine');

        $this->assureAssetsSymlink();
    }

    public function assureAssetsSymlink()
    {
        // TODO: make better
        if (!file_exists(public_path('jasmine-assets'))) {
            app('files')->link(
                __DIR__ . DIRECTORY_SEPARATOR . '..' . DIRECTORY_SEPARATOR . 'public',
                public_path('jasmine-assets')
            );
        }
    }
}
