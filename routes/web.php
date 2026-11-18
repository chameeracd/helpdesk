<?php

use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/run-setup', function () {
    Artisan::call('storage:link');
    Artisan::call('optimize:clear');
    Artisan::call('filament:upgrade');
    return 'Commands executed!';
});
