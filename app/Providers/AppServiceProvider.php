<?php

namespace App\Providers;

// use App\Services\Admin\UserAdminService;
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
        //
        $this->app->bind(\App\Repositories\Interfaces\UserRepositoryInterface::class, \App\Repositories\Repository\UserRepository::class);
        $this->app->bind(\App\Services\Admin\UserAdminService::class, function ($app) {
            return new \App\Services\Admin\UserAdminService(
                $app->make(\App\Repositories\Repository\UserRepository::class)
            );
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
