<?php

namespace App\Providers;

use App\Contracts\ServiceRepositoryContract;
use App\Repositories\ServiceRepository;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    public array $bindings = [
        ServiceRepositoryContract::class => ServiceRepository::class,
    ];
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
        //
    }
}
