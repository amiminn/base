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
            __DIR__ . '/../resources' => resource_path(),
            __DIR__ . '/../root' => base_path(),
        ]);
    }
}
