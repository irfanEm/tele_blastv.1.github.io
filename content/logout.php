<?php

session_destroy();
session_unset();
header('Location: ' . $base_url . '/content/login.php');

// header('dashboard.php');
// var_dump($_GET['url']);
// include "function/function.php";
//   $url= parseURL();
//   // var_dump($url);
// if (isset($url) && $url != null){
//   $menu = ["dashboard", "group_telegram", "template_pesan", "broadcast_pesan"];
//   if(in_array($url, $menu))
//   {
//     echo "$url";
//   }else{
//     echo "ngga ada";
//   }
//   // if($url == "template_pesan")
//   // {
//   //   header("Location: content/template_pesan.php");
//   // }
// }else{
//   $_SESSION['error'] = 'halmaan tidak ditemukan';
//   echo "<script>alert('halaman tidak ditemukan');</script>";
//   require_once 'dashboard.php';
// }

