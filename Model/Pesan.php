<?php
function getAllPesan ()
{
    global $konek;
    $stmt = "SELECT * FROM template_pesan";
    $exec = mysqli_query($konek, $stmt);
    // $result = mysqli_fetch_array($exec);
    return $exec;
}