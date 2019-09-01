<?php

namespace DevLabor\Push;

use Illuminate\Support\ServiceProvider;

class PushServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->publishes([
			__DIR__ . '/../config/push.php' => config_path('push.php'),
		], 'push');
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
	    $this->loadMigrationsFrom(__DIR__ . '/../database/migrations');
	    $this->loadRoutesFrom(__DIR__ . '/../routes/web.php');
    }
}
