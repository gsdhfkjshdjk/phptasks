<?php

//Создадим новый middleware
//php artisan make:middleware CheckPostOwner
// INFO  Middleware [app/Http/Middleware/CheckPostOwner.php] created successfully. 

//в CheckPostOwner.php добавим логику проверки:


namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CheckPostOwner
{
    public function handle(Request $request, Closure $next)
    {
        // Получаем ID поста из маршрута
        $postId = $request->route('post'); // предположим, что имя параметра 'post'
        $post = \App\Models\Post::find($postId);

        if (!$post) {
            // Пост не найден, можно вернуть 404
            abort(404);
        }

        // Проверяем, является ли текущий пользователь владельцем поста
        if ($post->user_id !== Auth::id()) {
            // Если не ваш пост, запрещаем доступ
            abort(403, 'Доступ запрещен');
        }

        return $next($request);
    }
}

//после добавим middleware в массив $routeMiddleware в Kernel.php
protected $routeMiddleware = [
    // другие middleware
    'check.post.owner' => \App\Http\Middleware\CheckPostOwner::class,
];

//применим middleware к маршруту редактирования поста
Route::get('/posts/{post}/edit', [PostController::class, 'edit'])->middleware('check.post.owner');
Route::put('/posts/{post}', [PostController::class, 'update'])->middleware('check.post.owner');

