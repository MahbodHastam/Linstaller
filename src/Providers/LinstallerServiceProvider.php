<?php

namespace MahbodHastam\Linstaller\Providers;

use Illuminate\Routing\Router;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\ServiceProvider;
use MahbodHastam\Linstaller\Http\Middlewares\CheckAlreadyInstalled;

class LinstallerServiceProvider extends ServiceProvider {

    protected $router;

    public function __construct($app) {
        parent::__construct($app);
        $this->router = $this->app->make(Router::class);
    }

    public function boot() {

        $this->registerRoutes();

        $this->publishables();

        $this->registerMiddlewares();

        $this->loadTranslationsFrom(__DIR__ . '/../../resources/lang', 'linstaller');

    }

    public function register() {
        $this->loadViewsFrom(__DIR__ . '/../../resources/views', 'linstaller');
    }

    protected function publishables() {
        $this->publishes([
            __DIR__ . '/../../public' => public_path('vendor/linstaller'),
        ], 'public');

        $this->publishes([
            __DIR__ . '/../../config' => config_path(),
        ], 'config');
    }

    protected function registerRoutes() {
        Route::group($this->routeConfiguration(), function () {
            $this->loadRoutesFrom(__DIR__ . '/../../routes/web.php');
        });
    }

    protected function routeConfiguration() {
        return [
            'prefix' => config('linstaller.url_prefix', 'linstaller') ?? 'linstaller',
            'middleware' => ['web', 'check_already_installed'],
            'as' => 'linstaller.',
        ];
    }

    protected function registerMiddlewares() {
        $this->router->aliasMiddleware('check_already_installed', CheckAlreadyInstalled::class);
    }
}
