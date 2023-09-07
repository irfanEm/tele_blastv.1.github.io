<?php

function getAllGroup()
{
    global $konek;
    $stmt = "SELECT * FROM group_tele";
    $exec = mysqli_query($konek, $stmt);
    // $result = mysqli_fetch_array($exec);
    return $exec;
}