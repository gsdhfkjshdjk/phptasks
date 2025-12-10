<?php

//установим laravel breeze
//composer require laravel/breeze --dev
//php artisan breeze:install (Blade with Alpine, Pest)
//npm install && npm run dev
//php artisan migrate

//далее настроем маршруты в web.php

use App\Http\Controllers\PostController;

Route::middleware('auth')->group(function () {
    // CRUD маршруты для постов
    Route::resource('posts', PostController::class);
});


//в PostController ограничим доступ к CRUD контроллеру
public function __construct()
{
    $this->middleware('auth');
}