<?php

namespace BeautyCoding\ApiUtils\Providers;

use BeautyCoding\ApiUtils\Responses\ResponseBuilder;
use Illuminate\Support\ServiceProvider;

class ApiUtilsServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        $this->publishes([
            __DIR__ . '/../../config/apiutils.php' => config_path('apiutils.php'),
        ]);

        $this->loadTranslationsFrom(__DIR__ . '/../../resources/lang/', 'apiutils');

        $this->publishes([
            __DIR__ . '/../../resources/lang/' => resource_path('lang/vendor/apiutils'),
        ]);
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton('ApiResponse', function ($app) {
            $apiTypeClass = config('apiutils.responseType');
            return new ResponseBuilder(new $apiTypeClass());
        });
    }
}
