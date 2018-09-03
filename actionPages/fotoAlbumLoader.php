<?php

require(__DIR__.'/../database/connect.php');
require(__DIR__.'/../database/session.php');

//переадрессация пути для файла
$tmp = $_FILES['image']['tmp_name'];
$filename = preg_replace("#(\..*$)#" , uniqid() . "$1" , basename($_FILES['image']['name']));
$downloadPath = "./../img/".$filename;
move_uploaded_file($tmp,$downloadPath);


$fotoAlbum = R::dispense($_SESSION['getuserbd']['login'].'fotoalbum');
$fotoAlbum->image = $filename;
R::store($fotoAlbum);



function dump($arr){
    echo "<pre>";
        var_dump($arr);
    echo "</pre>";
}

?>
