<?php

function hapusData($data)
{
    global $konek;
    $stmt = "DELETE FROM $data[table] WHERE id = $data[id]";
    $exec = mysqli_query($konek, $stmt);
    $error = mysqli_error_list($konek);
    return $stmt;
}