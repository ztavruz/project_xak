<?php

require(__DIR__.'/../database/connect.php');
require(__DIR__.'/../database/session.php');

function dump($arr){
    echo "<pre>";
        var_dump($arr);
    echo "</pre>";
}

dump($_SESSION);
//поиск текущего друга
$currentSearchUserSession = $_SESSION['getuserbd']['searchuser']['login'];
$binds = [
    'login'=> $currentSearchUserSession
];
$currentSearchUserBd = R::getRow("SELECT * FROM users
WHERE login = :login LIMIT 1", $binds);





?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="icon" href="/img/ico/logohakk.png">
    <link rel="stylesheet" href="/css/bootstrap.min.css">
    <link rel="stylesheet" href="/css/font-awesome.min.css">
    <link rel="stylesheet" href="/css/main.css">
    <link rel="stylesheet" href="/css/userpage.css">
    <link rel="stylesheet" href="/css/visitToUser.css">
    <title>Однохаккники</title>
</head>
<body>

    <header>
        <div class="contain-row">

        </div>
    </header>

        <div class="contain__item-column">
            <a href="/">
                <button name="loadimage" class="btn btn-default" type="submit">На индекс</button>
            </a>
        </div>


    <script src="/js/jQuery-3.3.1.min.js"></script>
    <script src="/js/main.js"></script>
</body>
</html>
