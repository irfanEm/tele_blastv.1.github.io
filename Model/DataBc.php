<?php

function getAllDataBc ()
{
    global $konek;
    $stmt = "SELECT * FROM bc_pesan order by id desc";
    $exec = mysqli_query($konek, $stmt);
    // $result = mysqli_fetch_array($exec);
    return $exec;
}

function getPesanById($id)
{
    global $konek;
    $stmt = "SELECT * FROM bc_pesan WHERE id = $id";
    $exec = mysqli_query($konek, $stmt);
    // $result = mysqli_fetch_array($exec);
    return $exec;
}

function getDataBcbyDate($tanggal)
{
    global $konek;
    $stmt = "SELECT * FROM bc_pesan WHERE tanggal = '$tanggal'";
    $exec = mysqli_query($konek, $stmt);
    // $hasil = mysqli_fetch_object($exec);
    return $exec;
}