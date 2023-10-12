<?php
session_start();

if(isset($_SESSION['login']) && $_SESSION['login'] != null || $_SESSION['login'] != "")
{
  require_once __DIR__ . "/config/config.php";
  // require public
  require_once __DIR__ . "/bagian/main_header.php";
  require_once __DIR__ . "/config/koneksi.php";
  require_once __DIR__ . "/function/function.php";
  require_once __DIR__ . "/content/index.php";
  require_once __DIR__ . "/bagian/main_footer.php";
}else{
  header("Location: login.php");
}

?>