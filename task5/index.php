<?php

require 'db.php';

// обработка удаления
if (isset($_GET['delete'])) {
    $id = (int) $_GET['delete'];
    $stmt = $pdo->prepare("DELETE FROM posts WHERE id = ?");
    $stmt->execute([$id]);
    header("Location: index.php");
    exit;
}

// получение всех постов
    $stmt = $pdo->query("SELECT * FROM posts ORDER BY created_at DESC");
    $posts = $stmt->fetchAll();
?>

<!doctype html>


    <head>
        <meta charset="utf-8">
        <title>Блог</title>
    </head>


    <body>
        <h1>Последние посты</h1>

        <form action="add.php">
        <button>Форма добавления поста</button>
        </form>

        <table border="0" cellpadding="20" cellspacing="10">
            <tr>
                <th>ID</th>
                <th>Заголовок</th>
                <th>Контент</th>
                <th>Дата</th>
                <th>Действия</th>
            </tr>

            <?php foreach ($posts as $post): ?>

            <tr>
                <td><?= htmlspecialchars($post['id']) ?></td>
                <td><?= htmlspecialchars($post['title']) ?></td>
                <td><?= htmlspecialchars($post['content']) ?></td>
                <td><?= htmlspecialchars($post['created_at']) ?></td>
                <td>
                    <a href="?delete=<?= $post['id'] ?>" onclick="return confirm('Удалить пост?')">Удалить</a>
                </td>
            </tr>

            <?php endforeach; ?>

        </table>
    </body>


</html>