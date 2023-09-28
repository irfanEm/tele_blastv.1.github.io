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

function setLogin($hasil)
{
  //$username = $hasil->username;
  $login = true;
  //$dataLogin = array("username"=>"$username", "login"=>"$login");
}

// function getLogin($data)
// {
//   return $data;
// }

function parseURL(){
    if(isset($_GET['url'])) {
      $url = rtrim($_GET['url'], "/");
      $url = filter_var($url, FILTER_SANITIZE_URL);
      $url = explode("/", $url);
      return $url;
    }
  }

  $url= parseURL();