<?php

use \Illuminate\Support\Facades\Route;

Route::get('/', 'AppController@home')->name('home');

// Auth
Route::prefix('auth')->group(function () {
    Route::get('/login', 'AppController@profile')->name('auth.login');
    Route::get('/reg', 'AppController@profile')->name('auth.reg');
    Route::get('/reset', 'AppController@profile')->name('auth.reset');
});

// Profile
Route::prefix('profile')->middleware('auth')->group(function () {
    Route::get('/', 'AppController@profile')->name('profile');
    Route::get('/edit', 'AppController@profile')->name('profile.edit');
    Route::get('/history', 'AppController@profile')->name('profile.history');

    Route::prefix('addresses')->group(function () {
        Route::get('/', 'AppController@profile')->name('profile.addresses');
        Route::get('/add', 'AppController@profile')->name('profile.addresses.add');
        Route::get('/{id}/edit', 'AppController@profile')->name('profile.addresses.edit');
    });
});