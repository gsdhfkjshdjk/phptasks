<!doctype html>
<html>
    <head>
        <meta charset="utf-8">
        <link rel="icon" href="data:;base64,=">
        <title>Заполнить форму</title>
    </head>
    <body>
        <h3>Форма</h3>
        <form method = "post" action = "validate_email.php">
        <pre>
            <input  type = "text" id = "name" name = "name" placeholder = "Введите имя."> 
        </pre>
        <pre>
            <input  type = "email" id = "email" name = "email" placeholder = "Введите почту."> 
        </pre>
        <pre>
            <input  type = "password" id = "password" name = "password" placeholder = "Введите пароль."> 
        </pre>
        <pre>
            <input type = "submit" value = "Отправить">
        </pre>
        </form>
    </body>
</html>