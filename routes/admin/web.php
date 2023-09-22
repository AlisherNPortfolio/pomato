<?php

// use App\Http\Controllers\Admin\DashboardController;

use App\Http\Middleware\AuthMiddleware;
use App\Http\Middleware\Guest;
use Illuminate\Support\Facades\Route;

Route::group(['prefix' => 'panel', 'namespace' => 'App\Http\Controllers\Admin'], function () {
    Route::middleware([Guest::class])->group(function () {
        Route::controller('AuthController')->group(function () {
            Route::match(['get', 'post'], 'login', 'login')->name('login');
            Route::get('reset-password', 'reset')->name('reset_password');

            Route::get('/reload-captcha', 'reloadCaptcha');
            Route::post('/check-recaptcha', 'checkRecaptcha');
        });
    });

    Route::middleware([AuthMiddleware::class])->group(function () {
        Route::controller('DashboardController')->group(function () {
            Route::get('', 'index')->name('dashboard');
        });
    });
});
