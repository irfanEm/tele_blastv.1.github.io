<?php

// require public
require_once __DIR__ . "/bagian/main_header.php";
require_once __DIR__ . "/config/koneksi.php";
require_once __DIR__ . "/function/function.php";


  $url= parseURL();
  $dataLogin = setLogin($data); // var_dump($dataLogin);
  $dataLogin["login"] = true;

  if(isset($dataLogin["login"]) && $dataLogin["login"] == true) {
    require_once __DIR__ . "/content/index.php";
  } else {
    require_once __DIR__ . "/content/login.php";
  }


require_once __DIR__ . "/bagian/main_footer.php";
?>