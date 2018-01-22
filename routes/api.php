<?php

use Illuminate\Support\Facades\Route;

Route::prefix('auth')->namespace('Api\Auth')->group(function () {
    Route::post('/login', 'LoginController@index');
    Route::post('/reg', 'RegistrationController@index');
});