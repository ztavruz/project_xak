<?php

require(__DIR__.'/../database/connect.php');
require(__DIR__.'/../database/session.php');

$firstName       = $_POST['firstName'];
$lastName        = $_POST['lastName'];
$userSex         = $_POST['userSex'];
$maritalStatus   = $_POST['maritalStatus'];
// -----дата рождения--------
$day             = $_POST['day'];
$month           = $_POST['month'];
$year            = $_POST['year'];
// --------------------------
$visibleList     = $_POST['visibleList'];
$errorsUserData  = [];

$_SESSION['userdata'] = $_POST;
// dump($_POST);
$user = R::load("users",$_SESSION['getuserbd']['id']);
$user->firstname      = $_SESSION['userdata']['firstName'];
$user->lastname       = $_SESSION['userdata']['lastName'];
$user->usersex        = $_SESSION['userdata']['userSex'];
$user->maritalstatus  = $_SESSION['userdata']['maritalStatus'];
$user->day            = $_SESSION['userdata']['day'];
$user->month          = $_SESSION['userdata']['month'];
$user->year           = $_SESSION['userdata']['year'];
$user->visibleList    = $_SESSION['userdata']['visibleList'];
R::store($user);
// dump($_SESSION);
?>
<script >
     window.location.href = window.location.origin + "/sitePages/editionUser.php";
</script>
<?php


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
