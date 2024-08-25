<?php

namespace Modules\Auth\Providers;

use Illuminate\Foundation\Support\Providers\RouteServiceProvider;
use Illuminate\Support\Facades\Route;

class AuthRouteServiceProvider extends RouteServiceProvider
{
    public function map(): void
    {
        $this->mapApiRoutes();
    }

    protected function mapApiRoutes(): void
    {
        Route::prefix('auth')
            ->middleware('api')
            ->group(base_path('modules/Auth/Routes/api.php'));
    }
}
