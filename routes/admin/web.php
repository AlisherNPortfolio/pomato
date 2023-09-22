<?php
// use App\Http\Controllers\Admin\DashboardController;

Route::group(['prefix' => 'panel', 'namespace' => 'App\Http\Controllers\Admin'], function () {
    Route::controller('DashboardController')->group(function () {
        Route::get('', 'index')->name('dashboard');
    });

});