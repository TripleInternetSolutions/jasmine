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

});