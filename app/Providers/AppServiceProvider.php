<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Services\Interfaces\CompanyServiceInterface;
use App\Services\CompanyService;
use App\Services\Interfaces\UserServiceInterface;
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
