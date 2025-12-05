<?php
//подключение к db.php, содержащего настройки соединения с базой данных через PDO
require 'db.php';



if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    //проверяем был ли отправлен запрос

    //очистка от лишних пробелов в заголовке и в основном содержании поста
    $title = trim($_POST['title']);
    $content = trim($_POST['content']);

    //проверка на пустые значения
    if ($title && $content) {
        //если поля заполнены, то создаем подготовденное выражение для вставки данных в таблицу posts 
        $stmt = $pdo->prepare("INSERT INTO posts (title, content) VALUES (?, ?)");
        
        //выполняем подготовленное выражение с передачей значений для защиты от SQL-инъекций
        $stmt->execute([$title, $content]);

        //после успешной вставки перенаправляем пользователя на index.php
        header("Location: index.php");
        exit;
    } else {
        //в случае, если одно из полей пустое, то выводим сообщение об ошибке
        $error = "Пожалуйста, заполните все поля.";
    }
}
?>

<!DOCTYPE html>


    <head>
        <meta charset="UTF-8">
        <title>Добавить пост</title>
    </head>



    <body>
        <h1>Добавить новый пост</h1>

        <?php if (isset($error)): ?>

        <p style="color:red;"><?= htmlspecialchars($error) ?></p>

        <?php endif; ?>

        <form method="post" action="">
            <label>Заголовок:<br>
                <input type="text" name="title" required>
            </label><br><br>
            <label>Контент:<br>
                <textarea name="content" rows="5" cols="50" required></textarea>
            </label><br><br>
            <button type="submit">Добавить</button>
        </form>

        <form action="index.php">
            <button>Форма добавления поста</button>
        </form>
    </body>


</html> 