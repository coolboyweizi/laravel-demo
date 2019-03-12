<?php
/**
 * 批量启动Services下的服务
 */
namespace App\Providers;

use App\Services\BootService;
use Illuminate\Support\ServiceProvider;

class BootServiceProvider extends ServiceProvider
{
    private $bootService = BootService::class;

    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {

    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        $service = config('extension');
        foreach ($service as $key=>$value){
            $this->app->singleton(
                $key.'.abstract',
                $this->bootService
            );
            $instance = $this->app->make($key.'.abstract');
            $instance->setModel(array_get($value,'model'));
            $instance->setLogic(array_get($value,'logic',[]));
        }
    }
}
