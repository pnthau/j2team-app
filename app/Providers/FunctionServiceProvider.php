<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class FunctionServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
        require_once base_path() . '/app/functions/helper.php';
    }
}
