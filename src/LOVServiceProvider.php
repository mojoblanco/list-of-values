<?php

namespace Mojoblanco\LOV;

use Artisan;
use Illuminate\Support\ServiceProvider;

class LOVServiceProvider extends ServiceProvider
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
        // Clear config
        Artisan::call('config:clear');

        // Publishes config file
        $this->publishes([
            __DIR__.'/../config/lov.php' => config_path('lov.php')
        ], 'lov-config');

        // Publishes migration file
        if(!class_exists('CreateLOVTables')) {
            $timestamp = date('Y_m_d_His', time());
            $this->publishes([
                __DIR__.'/../database/migrations/create_lov_tables.php.stub' => database_path("/migrations/{$timestamp}_create_lov_tables.php"),
            ], 'lov-migrations');
        }
    }
}
