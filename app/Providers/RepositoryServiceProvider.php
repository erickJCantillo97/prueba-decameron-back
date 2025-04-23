<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        $models =  [
            'Hotel',
            'Room'
        ];

        foreach ($models as $model) {
            $this->app->bind('App\\Interfaces\\' . $model . 'RepositoryInterface', 'App\\Repositories\\' . $model . 'Repository');
        }
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }
}
