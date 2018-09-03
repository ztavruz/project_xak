<?php

require(__DIR__.'/../database/connect.php');
require(__DIR__.'/../database/session.php');


$tmp = $_FILES['image']['tmp_name'];
$downloadPath = "./../img/".basename($_FILES['image']['name']);

move_uploaded_file($tmp,$downloadPath);
// dump($_FILES);


$user = R::load("users", $_SESSION['getuserbd']['id']);
$user->img = $_FILES['image']['name'];
R::store($user);

?>

<script>
    window.location.href = window.location.origin + "/sitePages/userPage.php";
</script>

<?php










/**
 * В массив $_FILES приходят все данные из input type=file
 */

 /**
  * tmp_name = ячейка в которой временно сохранен файл на сервере
  */

//move_uploaded_file(Временный файл , окончательный путь куда его сохранить);
//basename - преобразует имя файла в нужную кодировку


// $smart_string = "uploads/images/" .  basename($_FILES['image']['name']);
// $tmp = $_FILES['image']['tmp_name'];

// move_uploaded_file($tmp ,$smart_string);

// $users = R::dispense("users");
// $users->name = "Something name";
// $users->image = basename($_FILES['image']['name']);
// R::store($users);



// dump($_FILES);






dump($_FILES);

dump($_SESSION);

// dump($_FILES);

function dump($arr){
    echo "<pre>";
        var_dump($arr);
    echo "</pre>";
}

?>
