<?php

require_once __DIR__ . "/../config/koneksi.php";
require_once __DIR__ . "/../config/config.php";

function cekUser($data)
{
    global $konek;
    $sql = "SELECT username FROM users WHERE username = '$data[username]' AND password = '$data[password]'";
    $result = mysqli_fetch_object(mysqli_query($konek, $sql));
    return $result;
    // var_dump($result);
}

function sanitize($data)
{
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

function setSessionLogin($data)
{
  $daber = array_map("sanitize", $data);
  $hasil = cekUser($daber);

  if($hasil != null){
    $_SESSION["login"] = true;
    $_SESSION["username"] = $hasil->username;
  } else {
    $_SESSION["login"] = false;
  }

  return $_SESSION["login"];

}

function redirect($result)
{
  global $base_url;

  if($result == true){
    header("Location: $base_url");
    exit();
  }
  header("Location: " . $base_url ."login.php");
}

function parseURL(){
    if(isset($_GET['url'])) {
      $url = rtrim($_GET['url'], "/");
      $url = filter_var($url, FILTER_SANITIZE_URL);
      $url = explode("/", $url);
      return $url;
    }
  }

  $url= parseURL();