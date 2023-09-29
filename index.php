<?php

// require public
require_once __DIR__ . "/bagian/main_header.php";
require_once __DIR__ . "/config/koneksi.php";
require_once __DIR__ . "/function/function.php";

// echo $content = require_once __DIR__ . '/content/login.php';

// if(isset($login) && $login == true)
// {
//   echo $content = require_once __DIR__ . "/content/index.php";
// }

// if($login == false)
// {
//   $login = false;
// }else{
//   $login = true;
// }

// $_SESSION['login'] = false;

// $url= parseURL();

// var_dump($url);
var_dump($_SESSION['username']);

if($_SESSION['login'] != null) {
  require_once __DIR__ . "/content/index.php";
} else {
  require_once __DIR__ . "/content/login.php";
}

require_once __DIR__ . "/bagian/main_footer.php";
?>