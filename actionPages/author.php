<?php

require(__DIR__.'/../database/connect.php');
require(__DIR__.'/../database/session.php');

$login = $_POST['login'];
$password = $_POST['password'];
$authorErrors = [];

$binds = [
    'login'=>$login
];

$getUserBd = R::getRow("SELECT * FROM users
WHERE login = :login LIMIT 1" ,$binds);

$_SESSION['getuserbd'] = $getUserBd;

// dump($_SESSION);

if(password_verify($password, $getUserBd['password'])){
        // echo "Добро пожаловать, вы авторизованы!!!";
        ?>
        <script >
             window.location.href = window.location.origin + "/sitePages/userPage.php";
        </script>
        <?php
}else{
    $authorErrors[] = "Ступайте на хуй, я вас не знаю!";
    $_SESSION['getuserbd']['errors'] = $authorErrors;
    ?>
    <script >
         window.location.href = window.location.origin + "/sitePages/errorsPage.php";
    </script>
    <?php
}

// dump($_SESSION);



function dump($arr){
    echo "<pre>";
        var_dump($arr);
    echo "</pre>";
}
?>
