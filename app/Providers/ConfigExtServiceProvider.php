<?php

namespace App\Providers;


use App\Models\Site;
use Illuminate\Support\ServiceProvider;


class ConfigExtServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        // 引入网站配置项
        Site::all()->map(function ($conf){
            app('config')->set($conf->key, $conf->value);
        });
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {

    }
}
