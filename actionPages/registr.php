<?php

mkdir(__DIR__."/../img/userfolder"); //создаёт новую директорию

require(__DIR__.'/../database/connect.php');
require(__DIR__.'/../database/session.php');

$login        = $_POST['login'];
$password     = $_POST['password'];
$repassword   = $_POST['repassword'];
$errorsRegist = [];

// var_dump($_POST);

if(isEmpty($login)){
    $errors[] = 'Без логина не может быть Юзера!';
}
if(isEmpty($password)){
    $errors[] = 'Вы не придумали пароль';
}
if(isEmpty($repassword)){
    $errors[] = 'Вы не ввели проверочный пароль';
}
// if($password !== $repasswod){
//     $errors[] = 'Проверочный пароль не совпадает с проверяенмым!';
// }

dump($errors);

$binds = [
    'login'=>$login
];



if(empty($errors)){
    $searchUserBd = R::getRow("SELECT * FROM users
                           WHERE login = :login LIMIT 1", $binds);
    if(empty($searchUserBd)){
        $users = R::dispense('users');
        $users->login = $login;
        $users->password = password_hash($password, PASSWORD_DEFAULT);
        R::store($users);
        ?>
        <script>
            // window.location.href = window.location.origin + "/";
        </script>
        <?php
    }else{
        $errorsRegist[] = "Такой пользователь уже зарегистрирован!";
        $_SESSION['getuserbd']['errors'] = $errorsRegist;
        ?>
        <script>
            window.location.href = window.location.origin + "/sitePages/errorsPage.php";
        </script>
        <?php
    }
}

 $_SESSION['errors'] = $errors;


 dump($_POST);










function isEmpty($string){
    if($string ==''|| $string == null){
        return true;
    }else{
        return false;
    }
}

function dump($arr){
    echo "<pre>";
    var_dump($arr);
    echo "</pre>";
}

?>
