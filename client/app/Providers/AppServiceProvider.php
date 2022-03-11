<?php

namespace App\Providers;

use App\Services\Symfony\SymfonyApi;
use App\Services\Symfony\SymfonyApiInterface;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(SymfonyApiInterface::class, function () {
            return new SymfonyApi();
        });
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
