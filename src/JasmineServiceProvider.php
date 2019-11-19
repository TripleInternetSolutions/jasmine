<?php

namespace TIS\Jasmine;

use Illuminate\Routing\Router;
use Illuminate\Support\Arr;
use Illuminate\Support\ServiceProvider;
use TIS\Jasmine\Console\Commands\CreateUser;
use TIS\Jasmine\Http\Middleware\Authenticate;

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

        if ($this->app->runningInConsole()) {
            $this->registerConsoleCommands();
        }
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot(Router $router)
    {
        $this->mergeConfigFrom(__DIR__ . '/../config/auth.php', 'auth');

        $this->loadViewsFrom(__DIR__ . '/../resources/views', 'jasmine');

        $router->aliasMiddleware('jasmineAuth', Authenticate::class);

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


    private function registerConsoleCommands()
    {
        $this->commands(CreateUser::class);
    }


    /**
     * Merge the given configuration with the existing configuration.
     *
     * @param string $path
     * @param string $key
     *
     * @return void
     */
    protected function mergeConfigFrom($path, $key)
    {
        $config = $this->app['config']->get($key, []);
        $this->app['config']->set($key, $this->mergeConfig(require $path, $config));
    }


    /**
     * Merges the configs together and takes multi-dimensional arrays into account.
     *
     * @param array $original
     * @param array $merging
     *
     * @return array
     */
    protected function mergeConfig(array $original, array $merging)
    {
        $array = array_merge($original, $merging);
        foreach ($original as $key => $value) {
            if (!is_array($value)) {
                continue;
            }
            if (!Arr::exists($merging, $key)) {
                continue;
            }
            if (is_numeric($key)) {
                continue;
            }
            $array[$key] = $this->mergeConfig($value, $merging[$key]);
        }
        return $array;
    }
}
