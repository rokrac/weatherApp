<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Services\Api;

class ApiServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(Api::class, function ($app) {
            return new Api();
        });
    }

    /**
     * Get the services provided by the provider.
     *
     * @return array
     */
    public function provides()
    {
        return [Api::class];
    }
}
