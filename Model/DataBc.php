<?php

function getAllDataBc ()
{
    global $konek;
    $stmt = "SELECT * FROM bc_pesan";
    $exec = mysqli_query($konek, $stmt);
    // $result = mysqli_fetch_array($exec);
    return $exec;
}