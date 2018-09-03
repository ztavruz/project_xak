<?php

require(__DIR__.'/../database/connect.php');
require(__DIR__.'/../database/session.php');

// var_dump($_SESSION);

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="icon" href="/img/xakk.png">
    <link rel="stylesheet" href="/css/bootstrap.min.css">
    <link rel="stylesheet" href="/css/font-awesome.min.css">
    <link rel="stylesheet" href="/css/index.css">
    <title>Однохаккники</title>
</head>
<body>


    <form action="/actionPages/author.php" method="post" >
    <div class="contain">
        <div class="contain__item">
            <h3>Форма регистрации</h3>
        </div>
        <div class="contain__item">
            <label for="login">Логин: </label>
            <input type="text" id="login" name="login" >

        </div>
        <div class="contain__item">
            <label for="password">Пароль</label>
            <input type="password" id="password" name="password">

        </div>
        <div class="contain__item">
            <label for="repassword">Проверка пароля:</label>
            <input type="password" id="repassword" name="repassword">
        </div>
        <div class="contain__item">
            <button class="btn" id="loadData" type="submit">
            Зарегистрировать
            </button>
        </div>
    </div>
    </form>

    <div class="state" id="state">
        <?php
            echo $errors;
         ?>
    </div>
    <a href="/">
        <button class="btn btn-default">На главную</button>
    </a>


    <script src="/js/jQuery-3.3.1.min.js"></script>
    <script src="/js/main.js"></script>
</body>
</html>
