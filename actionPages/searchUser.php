<?php 

require(__DIR__.'/../database/connect.php');
require(__DIR__.'/../database/session.php');

$searchUser = $_POST['searchUser'];
$errorsSearchUser = [];
$binds = [
    'searchuser'=>$searchUser
];

$userFromBd = R::getRow("SELECT * FROM users 
WHERE login = :searchuser LIMIT 1", $binds);

if(empty($userFromBd)){
 $errorsSearchUser[] = "Такой братан не найден!";
 $_SESSION['getuserbd']['errors'] = $errorsSearchUser; 
 ?>
 <script>
     window.location.href = window.location.origin + "/sitePages/errorsPage.php";
 </script>
 <?php
}else{
    $_SESSION['getuserbd']['searchuser'] = $userFromBd;

    ?>
 <script>
     window.location.href = window.location.origin + "/sitePages/userPage.php";
 </script>
 <?php
}



















dump($_SESSION);

function dump($arr){
    echo "<pre>";
        var_dump($arr);
    echo "</pre>";
}

?>