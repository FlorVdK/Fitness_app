<?php

namespace App\Providers;

use App\Repositories\Interfaces\RegimeRepositoryInterface;
use App\Repositories\RegimeRepository;
use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(
            RegimeRepositoryInterface::class,
            RegimeRepository::class
        );
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
