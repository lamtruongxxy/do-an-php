<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

use App\Utilities\FormatPriceVND;

class FormatVNDServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind('FormatVND', function() {
            return new FormatPriceVND();
        });
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        
    }
}
