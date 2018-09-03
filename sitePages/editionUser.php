<?php

require(__DIR__.'/../database/connect.php');
require(__DIR__.'/../database/session.php');

function dump($arr){
    echo "<pre>";
        var_dump($arr);
    echo "</pre>";
}

$userImg = $_SESSION['getuserbd']['img'];
$searchUserSession = $_SESSION['getuserbd']['login'];



$binds = [
    'login'=>$searchUserSession
];

$getUserBd = R::getRow("SELECT * FROM users
WHERE login =:login LIMIT 1", $binds);


$img_path = "/img/". $getUserBd['img'];
$img_searhuser_path = "/img/".$_SESSION['getuserbd']['searchuser']['img'];
$firstNameUser = $getUserBd['firstname'];
$lastNameUser  = $getUserBd['lastname'];

// dump($getUserBd);

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
    <!-- шрифты -->
    <link href="https://fonts.googleapis.com/css?family=Stalinist+One" rel="stylesheet">

    <link rel="stylesheet" href="/css/main.css">
    <link rel="stylesheet" href="/css/userpage.css">
    <link rel="stylesheet" href="/css/edituser.css">
    <title>Однохаккники</title>
</head>
<body>

    <?php require_once(__DIR__.'/../blocks/header.php'); ?>
<!-- ------------секция середины---------- -->
    <div class="section-center">
      <!-- ----аватар----- -->
      <div class="section-center__item1">
        <div class="contain-left1">
          <div class="avatar-img">
              <img class="userfoto" src="<?php echo $img_path ?>" alt="">
          </div>
          <div class="menuFoto">
            <h6 id="showMenuFoto">Установить фото</h6>
              <form id="formFile" action="/actionPages/avatarLoafer.php" method="post" enctype="multipart/form-data">
                <input name="image" type="file">
                <button name="avatarimage" type="submit">Установить</button>
              </form>
          </div>
          <!-- ----ссылка на страницу редактирования---- -->
          <a href="/sitePages/userPage.php">
            <button type="submit" name="anketaOpen">На главную</button>
          </a>
        </div>
      </div>
      <!-- ----редактор пользователя----- -->
      <div class="section-center__item2">
        <div class="bg-black">
          <div class="border-salat">
            <div class="zagolovok contain__item">
              <h3 id="dos">Досье:</h3>
              <div class="userName">
                <p id="firstName"><?php echo $firstNameUser ?></p>
                <p id="lastName"><?php echo $lastNameUser ?></p>
              </div>
            </div>
            <form class="userData" action="/actionPages/editUser.php" method="post">
              <div class="contain__item">
                <label for="firstName">Имя:</label>
                <input type="text" id="firstName" value="<?php echo $firstNameUser ?>" name="firstName" >
              </div>
              <div class="contain__item">
                <label for="lastName">Фамилия:</label>
                <input type="text" id="lastName" value="<?php echo $lastNameUser ?>" name="lastName" >
              </div>
              <div class="contain__item">
                <label for="userSex">Пол:</label>
                <select class="userSex" name="userSex">
                  <option select value="Мужской">Мужской
                  <option select value="Женский">Женский
                </select>
              </div>
              <div class="contain__item">
                <label for="maritalStatus">Семейное положение:</label>
                <select class="maritalStatus" name="maritalStatus">
                  <option select value="Не скажу">Не скажу
                  <option select value="Встречаюсь">Встречаюсь
                  <option select value="Помолвлен">Помолвлен
                  <option select value="Женат">Женат
                  <option select value="Гражданский брак">Гражданский брак
                  <option select value="Влюблён">Влюблён
                  <option select value="Всё сложно">Всё сложно
                  <option select value="В активном поиске">В активном поиске
                </select>
              </div>
              <div class="contain__item">
                <label for="day">День рождения:</label>
                <div class="birthday">
                  <select class="day" name="day">
                   <option select value="1">1
                   <option select value="2">2
                   <option select value="2">3
                   <option select value="4">4
                   <option select value="5">5
                   <option select value="6">6
                   <option select value="7">7
                   <option select value="8">8
                   <option select value="9">9
                   <option select value="10">10
                   <option select value="11">11
                   <option select value="12">12
                   <option select value="13">13
                   <option select value="14">14
                   <option select value="15">15
                   <option select value="16">16
                   <option select value="17">17
                   <option select value="18">18
                   <option select value="19">19
                   <option select value="20">20
                   <option select value="21">21
                   <option select value="22">22
                   <option select value="23">23
                   <option select value="24">24
                   <option select value="25">25
                   <option select value="26">26
                   <option select value="27">27
                   <option select value="28">28
                   <option select value="29">29
                   <option select value="30">30
                   <option select value="31">31
                  </select>
                  <select class="month" name="month">
                   <option select value="Января">Января
                   <option select value="Февраля">Февраля
                   <option select value="Марта">Марта
                   <option select value="Апреля">Апреля
                   <option select value="Мая">Мая
                   <option select value="Июня">Июня
                   <option select value="Июля">Июля
                   <option select value="Августа">Августа
                   <option select value="Сентября">Сентября
                   <option select value="Октября">Октября
                   <option select value="Ноября">Ноября
                   <option select value="Декабря">Декабря
                  </select>
                  <select class="year" name="year">
                   <option select value="1987">1987
                   <option select value="1988">1988
                   <option select value="1990">1990
                   <option select value="1991">1991
                   <option select value="1992">1992
                   <option select value="1993">1993
                   <option select value="1994">1994
                   <option select value="1995">1995
                   <option select value="1996">1996
                   <option select value="1997">1997
                   <option select value="1998">1998
                   <option select value="1999">1999
                   <option select value="2001">2001
                   <option select value="14">2002
                   <option select value="15">2003
                   <option select value="16">2004
                   <option select value="17">2005
                   <option select value="18">2006
                   <option select value="19">19
                   <option select value="20">20
                   <option select value="21">21
                   <option select value="22">22
                   <option select value="23">23
                   <option select value="24">24
                   <option select value="25">25
                   <option select value="26">26
                   <option select value="27">27
                   <option select value="28">28
                   <option select value="29">29
                   <option select value="30">30
                   <option select value="31">31
                  </select>
                </div>
              </div>
              <div class="contain__item">
                <select class="visibleList" name="visibleList">
                  <option select value="1">Показывать дату рождения
                  <option select value="2">Показывать только месяц и день
                  <option select value="0">Не показывать дату вообще
                </select>
              </div>
              <div class="contain__item">
                <button type="submit" class="saveuserdata">Сохранить</button>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>

    <footer>
        <div class="contain__item-column">
            <a href="/">
                <button name="loadimage" class="btn btn-default" type="submit">На индекс</button>
            </a>
        </div>
    </footer>


    <script src="/js/jQuery-3.3.1.min.js"></script>
    <script src="/js/main.js"></script>
</body>
</html>
