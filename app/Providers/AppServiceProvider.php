<?php

namespace App\Providers;

use App\Contracts\ShipInterface;
use App\Repositories\ShipRepository;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * All the containers bindings that should be registered
     *
     * @var string[]
     */
    public $bindings = [
        ShipInterface::class => ShipRepository::class,
    ];
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
