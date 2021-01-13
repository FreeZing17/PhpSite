<!doctype html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Главная страница</title>
    <meta name="description" content="Главная страница интернет магазина">

    <link rel="stylesheet" href="/public/css/main.css" charset="utf-8">
    <link rel="stylesheet" href="/public/css/form.css" charset="utf-8">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css" crossorigin="anonymous">
</head>
<body>
<?php require 'public/blocks/header.php' ?>

<?php
$_POST['email'] = null;
$_POST['login'] = null;
$_POST['pass'] = null;
?>

<?php if (!isset($_COOKIE['login'])): ?>
    <div class="container main">
        <h1>Регистрация</h1>
        <p>Вам нужно загрузить файл? Прежде чем это сделать зарегистрируйтесь на сайте</p>
        <p>(Или кликните <a href="/user/auth">сюда</a>, если уже зарегистрированны)</p>
        <br>
        <form action="/user/reg" method="post">
            <div class="form-group">
                <input type="email" name="email" class="form-control" placeholder="Введите email">
            </div>
            <div class="form-group">
                <input type="text" name="login" class="form-control" placeholder="Введите логин">
            </div>
            <div class="form-group">
                <input type="password" name="pass" class="form-control" placeholder="Введите пароль">
            </div>

            <?php if (isset($_SESSION['messageErr'])): ?>
                <div class="error"><?= $_SESSION['messageErr'] ?></div>
            <?php endif; ?>
            <button class="btn btn-primary" id="send">Готово</button>
        </form>
    </div>
<?php else : ?>
    <div id="wrapper">
        <div id="mainBar" class="container main">
            <nav class="left main-nav">
                <div id="container">
                    <div>
                        <a class="p-2 text-dark navigation" href="/file/all"><h3>Основная таблица</h3></a>
                    </div>
                    <div>
                        <a class="p-2 text-dark navigation" href="/file/send"><h3>Отправь файл</h3></a>
                    </div>
                    <div>
                        <a class="p-2 text-dark navigation" href="/file/received"><h3>Мои файлы</h3></a>
                    </div>
                    <div>
                        <a class="p-2 text-dark navigation" href="/file/sent"><h3>Полученные файлы</h3></a>
                    </div>
                </div>
            </nav>
        </div>
    </div>
<?php endif; ?>


</body>
</html>