<?php

namespace Amiminn\Support\Config;

use Illuminate\Support\ServiceProvider;

class App extends ServiceProvider
{
    public function boot()
    {
        $this->loadRoutesFrom(__DIR__ . '/../routes/web.php');
        $this->loadMigrationsFrom(__DIR__ . '/../database/migrations');
        $this->publishes([
            __DIR__ . '/../public' => public_path('amiminn/support'),
        ], 'public');
    }
}
