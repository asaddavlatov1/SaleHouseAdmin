<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

use App\Services\Interface\CompanyServiceInterface;
use App\Servicec\CompanyService;
use App\Services\Interface\UserServiceInterface;
use App\Services\UserService;

class AppServiceProvider extends ServiceProvider
{

    public function register(): void
    {
        $this->app->bind(CompanyServiceInterface::class, CompanyService::class);
        $this->app->bind(UserServiceInterface::class, UserService::class);
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
