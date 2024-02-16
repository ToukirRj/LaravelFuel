<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Models\Cashier\User;
use Laravel\Cashier\Cashier;
use Illuminate\Pagination\Paginator;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Cashier::useCustomerModel(User::class);
        Paginator::useBootstrap();
    }
}
