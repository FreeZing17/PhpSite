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
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css" crossorigin="anonymous">
</head>
<body>
<?php require 'public/blocks/header.php' ?>



<form action="/file/send" method="post" enctype="multipart/form-data">
    <div class="form-group">
        <label>Имя файла<label>
        <input type="text" name="title" class="form-control">
    </div>
    <div class="form-group">
        <input type="file" name="file" class="form-control-file">
    </div>
    <input type="hidden" name="date" id="hiddenField" value="true" />
    <div class="form-group">
        <label>Имя получателя</label>
        <select name="filename" id="selectBox" onchange="changeFunc();">
            <?php for($i = 0; $i < count($data); $i++): ?>
                <option value=<?print_r($data[$i]['login'])?>><?print_r($data[$i]['login'])?></option>
            <?php endfor; ?>
        </select>
    </div>
    <input type="submit" name="submit" class="btn btn-primary" value="Отправить">
</form>


<!--<script type="text/javascript">

    function changeFunc() {
        var selectBox = document.getElementById("selectBox");
        var selectedValue = selectBox.options[selectBox.selectedIndex].value;
        alert("Имя выбранного пользователя: " + selectedValue);
    }

</script>-->

</body>
</html>