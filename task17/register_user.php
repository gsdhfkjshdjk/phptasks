<?php

//в .env установим парамтеры почты

//User.php 
use Illuminate\Contracts\Auth\MustVerifyEmail;

class User extends Authenticatable implements MustVerifyEmail
{
    // ...
}

//web.php добавим вызов маршрутов
Auth::routes(['verify' => true]);



Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])
    ->middleware(['auth', 'verified']);

//php artisan vendor:publish --tag=laravel-notifications


//composer require laravel/ui
//php artisan ui vue --auth
//npm install && npm run dev