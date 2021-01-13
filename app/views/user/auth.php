<!doctype html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Авторизация</title>
    <meta name="description" content="Авторизация">

    <link rel="stylesheet" href="/public/css/main.css" charset="utf-8">
    <link rel="stylesheet" href="/public/css/form.css" charset="utf-8">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css" crossorigin="anonymous">
</head>
<body>
<?php require 'public/blocks/header.php' ?>
<?php
$_POST['email'] = null;
$_POST['pass'] = null;
$data['message'] = null;
?>

<div class="container main">
    <h1>Авторизация</h1>
    <p>Здесь вы можете авторизоваться на сайте</p>
    <form action="/user/auth" method="post">
        <div class="form-group">
            <input type="email" name="email" class="form-control" placeholder="Введите email" value="<?=$_POST['email']?>">
        </div>
        <div class="form-group">
            <input type="password" name="pass" class="form-control" placeholder="Введите пароль" value="<?=$_POST['pass']?>">
        </div>

        <div class="error"><?=$data['message']?></div>
        <button class="btn btn-primary" id="send">Готово</button>
    </form>
</div>
<?php /*require 'public/blocks/footer.php' */?>

</body>
</html>