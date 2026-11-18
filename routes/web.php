<?php

use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Route;

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/run-setup', function () {
    Artisan::call('storage:link');
    Artisan::call('optimize:clear');
    Artisan::call('filament:upgrade');
    return 'Commands executed!';
});

Route::get('/run-mail', function () {
    $mail =  Mail::raw('This email confirms that everything was set up correctly!', function ($message) {
        $message->to('chameeracd@gmail.com')->subject('Testing Laravel + Mailgun');
    });

    return 'Commands executed!';
});
