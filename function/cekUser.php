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

