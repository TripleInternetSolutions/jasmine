<?php

Route::group([
    'namespace' => '\\TIS\\Jasmine\\Http\Controllers',
    'as' => 'jasmine.',
    'name' => 'jasmine.',
], function () {

    // Authentication Routes...
    Route::get('login', 'Auth\LoginController@showLoginForm')->name('login');
    Route::post('login', 'Auth\LoginController@login');
    Route::post('logout', 'Auth\LoginController@logout')->name('logout');

    // Password Reset Routes...
    Route::get('password/reset', 'Auth\ForgotPasswordController@showLinkRequestForm')->name('password.request');
    Route::post('password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail')->name('password.email');
    Route::get('password/reset/{token}', 'Auth\ResetPasswordController@showResetForm')->name('password.reset');
    Route::post('password/reset', 'Auth\ResetPasswordController@reset')->name('password.update');


    // Authenticated routes
    Route::group([
        'middleware' => ['jasmineAuth:jasmine_web'],
    ], function () {
        Route::get('/', 'DashboardController@show')->name('dashboard');
    });

});