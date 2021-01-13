<!doctype html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Все файлы</title>
    <meta name="description" content="Главная страница интернет магазина">

    <link rel="stylesheet" href="/public/css/main.css" charset="utf-8">
    <link rel="stylesheet" href="/public/css/form.css" charset="utf-8">
    <link rel="stylesheet" href="/public/css/file.css" charset="utf-8">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css" crossorigin="anonymous">
</head>
<body>
<?php require 'public/blocks/header.php' ?>

<table class="table">
    <thead>
        <tr>
            <th class="text-center">Файл</th>
            <th class="text-center">Действия</th>
            <th class="text-center">Имя файла</th>
        </tr>
    </thead>
    <tbody>
        <?php for($i = 0; $i < count($data); $i++): ?>
            <tr>
                <td width="70%">
                    <object data="../public/media/<?=$data[$i]['media']?>">
                </td>
                <td width="15%" class="align-middle text-center">
                    <a href="../public/media/<?=$data[$i]['media']?>" download="file">Загрузить</a>
                </td>
                <td width="15%" class="align-middle text-center"><?=$data[$i]['title']?></td>
            </tr>
        <?php endfor; ?>
    </tbody>
</table>



</body>
</html>
