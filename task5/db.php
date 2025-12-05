<?php 
// настройки подключения
$host = 'localhost';
$db = 'blog';
$user = 'root';
$pass = '!1-QsE_'; //m(_ _)m не забыть убрать пароль
$charset = 'utf8mb4';

//строка DSN, содержащая информацию для подклбчения PDO к БД 
$dsn = "mysql:host=$host;dbname=$db;charset=$charset";

// массив для настройки опций PDO 
$options = [
    //режим ошибок => выбрасыватль исключения при ошибках
    PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
    //режим выборки данных => ассоциативный массив (ключ значение)
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    //отключение эмуляции подготовленных выражений
    PDO::ATTR_EMULATE_PREPARES   => false,
];


try {
    //попытка установки соединения
    //объект pdo для подклбчения к БД
    $pdo = new PDO($dsn, $user, $pass, $options);
} catch (PDOException $e) {
    //в случае ошибки выводим сообщение об ошибке и убиваем скрипт
    die("Ошибка при подключении: " . $e->getMessage());
}