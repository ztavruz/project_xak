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
$imgRename = $_FILES['image']['name'];

$binds = [
    'login'=>$searchUserSession
];

$getUserBd = R::getRow("SELECT * FROM users
WHERE login =:login LIMIT 1", $binds);


$img_path = "/img/". $getUserBd['img'];
$img_searhuser_path = "/img/".$_SESSION['getuserbd']['searchuser']['img'];
$firstNameUser = $getUserBd['firstname'];
$lastNameUser  = $getUserBd['lastname'];

// dump($_SESSION);

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
    <title>Однохаккники</title>
</head>
<body>
  <?php require_once(__DIR__.'/../blocks/header.php'); ?>
<!-- ------------секция середины---------- -->
    <div class="section-center">
      <div class="section-center__item1">
        <div class="contain-left1">
          <div class="zagolovok">
            <div class="userName">
              <p id="firstName"><?php echo $firstNameUser?></p>
              <p id="lastName"><?php echo $lastNameUser ?></p>
            </div>
          </div>
          <div class="avatar-img">
              <img class="userfoto" src="<?php echo $img_path ?>" alt="">
          </div>
          <div class="menuFoto">
            <h6 id="showMenuFoto">Редактировать аватар</h6>
              <form id="formFile" action="/actionPages/avatarLoafer.php" method="post" enctype="multipart/form-data">
                <div class="input-container">
                  <label id="avatar__label" for="avatar__loader">Выбрать фото</label>
                  <input id="avatar__loader" name="image" type="file">
                  <button id="avatarbutton" name="avatarimage" type="submit" value="Установить" >Установить</button>
                </div>
              </form>
          </div>
          <!-- ----ссылка на страницу редактирования---- -->
          <a href="/sitePages/editionUser.php">
            <button type="submit" id="anketaOpen" name="anketaOpen">анкета</button>
          </a>
        </div>
        <div class="contain-left2">
                  <div class="contain__item-column">
                    <!-- <h2>Загрузить фото в альбом</h2>
                    <form id="formFile" action="/actionPages/fotoAlbumLoader.php" method="post" enctype="multipart/form-data">
                        <input name="image" type="file">
                        <button name="albumimage" type="submit">Загрузить</button>
                    </form> -->
                      <div class="menuVertical">
                        <ul>
                          <li class="menuVertical__list">
                            <div class="menuVertical__list-name">
                              <i class="fa fa-camera-retro" aria-hidden="true"></i>
                              <p>Фото:</p>
                            </div>
                              <ul class="menuVertical__drop">
                                <li id="fotoAlbumGo"><a id="showMyFoto" href="#">Мои</a></li>
                                <li><a id="showMyFotoAlbum" href="#">Фотоальбомы</a></li>
                              </ul>
                          </li>
                          <li class="menuVertical__list">
                            <div class="menuVertical__list-name">
                              <i class="fa fa-handshake-o" aria-hidden="true"></i>
                              <p>Группы:</p>
                            </div>
                            <ul class="menuVertical__drop">
                              <li>Имя 1-й группы</li>
                              <li>Имя 2-й группы</li>
                              <li>Имя 3-й группы</li>
                              <li>Поиск групп</li>
                            </ul>
                          </li>
                          <li class="menuVertical__list">
                            <div class="menuVertical__list-name">
                              <i class="fa fa-gamepad" aria-hidden="true"></i>
                              <p>Игры:</p>
                            </div>
                            <ul class="menuVertical__drop">
                              <li>Мои игры</li>
                              <li>Популярные</li>
                              <li>Новые</li>
                              <li>Поиск игр</li>
                            </ul>
                          </li>
                          <li class="menuVertical__list">
                            <div class="menuVertical__list-name">
                              <i class="fa fa-gift" aria-hidden="true"></i>
                              <p>Подарки:</p>
                            </div>
                            <ul class="menuVertical__drop">
                              <li>Мои подарки</li>
                              <li>Популярные</li>
                              <li>Новые</li>
                              <li>Поиск подарков</li>
                            </ul>
                          </li>
                          <li class="menuVertical__list">
                            <div class="menuVertical__list-name">
                              <i class="fa fa-shopping-cart" aria-hidden="true"></i>
                              <p>Товары:</p>
                            </div>
                            <ul class="menuVertical__drop">
                              <li>Товары друзей</li>
                              <li>Мои товары</li>
                              <li>Новые</li>
                              <li>Поиск товаров</li>
                            </ul>
                          </li>
                          <li class="menuVertical__list">
                            <div class="menuVertical__list-name">
                              <i class="fa fa-gratipay" aria-hidden="true"></i>
                              <p>Знакомства:</p>
                            </div>
                            <ul class="menuVertical__drop">
                              <li>Моя анкета</li>
                              <li>Анкеты друзей</li>
                              <li>Все анкеты</li>
                              <li>Поиск анкет</li>
                            </ul>
                          </li>
                          <li class="menuVertical__list">
                            <div class="menuVertical__list-name">
                              <i class="fa fa-retweet" aria-hidden="true"></i>
                              <p>Файломен</p>
                            </div>
                            <ul class="menuVertical__drop">
                              <li>Изображения</li>
                              <li>Видео</li>
                              <li>Музыка</li>
                              <li>Книги</li>
                              <li>Поиск книг</li>
                            </ul>
                          </li>
                          <li></li>
                          <li></li>
                          <li></li>
                        </ul>
                      </div>
                  </div>
                  <div class="contain__item-column">
                  <h2>Мой фотоальбом</h2>
                    <a href="/sitePages/myFotoAlbumPage.php">
                      <button type="submit">Зайти</button>
                    </a>
                  </div>
              <div class="contain__item-column dop_class1">

                  <div class="contain__item-column">
                      <div class="contain__item-column">
                          <h3>Поиск другого дорогого друга))!!!</h3>
                      </div>
                      <div class="contain__item-column">
                          <img id="userfoto" src="<?php echo $img_searhuser_path ?>" alt="">
                      </div>

                  </div>

                  <div class="contain__item-column">
                      <h2>Введите имя друга</h2>
                      <a href="/sitePages/visitToUser.php">
                          <button name="visitToUser" type="submit">Зайти в гости</button>
                      </a>
                  </div>

              </div>
          </div>
        </div>
      <div class="section-center__item2">
        <div class="bg-black">
          <div class="border-salat">
            <div class="contain__foto">
              <?php ?>
            </div>
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

    <script src="/js/class/Shower.js" >
    </script>
    <script src="/js/jQuery-3.3.1.min.js"></script>
    <script src="/js/main.js"></script>
</body>
</html>
