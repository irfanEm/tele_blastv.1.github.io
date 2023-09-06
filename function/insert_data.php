<?php

function insert($data)
{
    global $konek;
    $stmt = "INSERT INTO $data[table] VALUES (null, '$data[nama_group]', '$data[id_group]', '$data[username_group]')";
    $exec = mysqli_query($konek, $stmt);
    $error = mysqli_error($konek);
    return $error;
    // echo $stmt;
}