<?php

namespace App\Providers;

use App\Models\Config;
use Illuminate\Support\ServiceProvider;


class configsProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
       $configs = Config::first();
       view()->share('configs', $configs);
    }
}
