<?php

// require public
require_once __DIR__ . "/bagian/main_header.php";
require_once __DIR__ . "/config/koneksi.php";
require_once __DIR__ . "/function/function.php";

echo $content = require_once __DIR__ . '/content/login.php';

if(isset($login) && $login == true)
{
  echo $content = require_once __DIR__ . "/content/index.php";
}

// if($login == false)
// {
//   $login = false;
// }else{
//   $login = true;
// }

// $_SESSION['login'] = $login;

// $url= parseURL();

// if($_SESSION['login'] == true) {
//   require_once __DIR__ . "/content/index.php";
// } else {
//   require_once __DIR__ . "/content/login.php";
// }

// var_dump($login);

require_once __DIR__ . "/bagian/main_footer.php";
?>