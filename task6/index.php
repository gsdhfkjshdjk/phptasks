<?php
/* реализация простого роутера без сторонних библиотек */

//получим URL, который был запрошен
$request_uri = $_SERVER['REQUEST_URI'];

//маршрутизатор
if ($request_uri === '/' || $request_uri === '/index.php') {
    echo "Приветсвие.";
} else {
    //если маршрут не найден 
    http_response_code(404);
    echo "Страница не найдена.";
}

// cd /srv/http
// php -S localhost:8000