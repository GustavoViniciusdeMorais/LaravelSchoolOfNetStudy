<?php

namespace Modules\Pages\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Route;

class PageServiceProvider extends ServiceProvider
{

    public function boot()
    {
        Route::namespace('Modules\Pages\Http\Controllers')
            ->group(__DIR__ . '/../Routes/web.php');
        
        $this->loadViewsFrom(__DIR__ . '/../Views', 'Page');

        $this->loadMigrationsFrom(__DIR__ . '/../database/migrations');
    }

    public function register()
    {

    }
}
