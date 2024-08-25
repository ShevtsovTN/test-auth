<?php

use Illuminate\Support\Facades\Route;
use Modules\Auth\Http\Controllers\BaseController;

Route::group(['middleware' => ['api', 'auth:sanctum', 'service']], static function () {

    Route::post('/login', [BaseController::class, 'login'])
        ->name('auth.login');

    Route::post('/logout', [BaseController::class, 'logout'])
        ->name('auth.logout');

    Route::post('/register', [BaseController::class, 'register'])
        ->name('auth.register');

    Route::match(['put', 'patch'], '/upgrade-temporary', [BaseController::class, 'upgradeTemporary'])
        ->name('auth.upgradeTemporary');
});
