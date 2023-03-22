<?php

namespace SR\Leads;

use Illuminate\Support\ServiceProvider as LumenServiceProvider;
use CCM\Leads\Providers\ValidatorServiceProvider;
use Route;

class ServiceProvider extends LumenServiceProvider
{
    private $path = __DIR__.'/../';
    /**
     * Bootstrap the application services.
     */
    public function boot()
    {
        $this->loadTranslationsFrom($this->path.'resources/lang', 'main');

    /**
     * Register the application services.
     */
    public function register()
    {
        require_once $this->path.'src/Helpers/Helpers.php';

        $this->mergeConfigFrom($this->path.'config/main.php', 'main');
        $this->mergeConfigFrom($this->path.'config/services.php', 'services');
        $this->mergeConfigFrom($this->path.'config/rabbitmq.php', 'rabbitmq');

        // Register the main class to use with the facade
        $this->app->singleton('leads', function () {
            return new Leads;
        });

        Route::group(['as' => 'service-data.' ], function ($router) {
            include $this->path . 'routes/main.php';
        });

        $this->app->register(ValidatorServiceProvider::class);
    }
}
