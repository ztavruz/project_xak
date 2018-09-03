<?php

require(__DIR__.'/../library/rb.php');

$address  = 'mysql:host=localhost;dbname=odnohakkniki';
$login    = 'root';
$password = '';

if(R::testConnection() == false){
    R::setup($address, $login, $password);
}
