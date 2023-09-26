<?php

// require public
require_once __DIR__ . "/bagian/main_header.php";
require_once __DIR__ . "/config/koneksi.php";
require_once __DIR__ . "/function/function.php";
require_once __DIR__ . "/function/sanitaze.php";
require_once __DIR__ . "/function/cekUser.php";


$_SESSION["login"] = false;

  $url= parseURL();
  if(isset($_SESSION["login"]) && $_SESSION["login"] == true) {
    require_once __DIR__ . "/content/index.php";
  } else {
    require_once __DIR__ . "/content/login.php";
  }
  
?>

<?php
  require_once __DIR__ . "/bagian/main_footer.php";
?>