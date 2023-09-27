<?php

require_once __DIR__ . "/../config/koneksi.php";

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

function kirimHasil($hasil)
{
  $_SESSION['username'] = $hasil->username;
  $_SESSION['login'] = true;
  $dataLogin = array("username"=>"$_SESSION[username]", "login"=>"$_SESSION[login]");
  return $dataLogin;
}

$dataLogin = kirimHasil($hasil);

function setLogin($dataLogin)
{
  return $dataLogin;
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