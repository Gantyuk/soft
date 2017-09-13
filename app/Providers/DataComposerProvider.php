<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class DataComposerProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        $this->composeData();
    }

    public function composeData()
    {
        view()->composer('pages.navigation', 'App\Http\Composers\DataComposer@navigation');
        view()->composer('pages.navigation-sidebar', 'App\Http\Composers\DataComposer@navigationSidebar');
    }
}
