<?php

require_once __DIR__ . "/../config/koneksi.php";
require_once __DIR__ . "/../Model/DataBc.php";


$today = date("d-m-Y");
$dataBc = getDataBcbyDate($today);
// $data_pesan = [];
// $data_group = [];
$g = 1;
while ( $hasil = mysqli_fetch_object($dataBc) ) {           // dapatkan data bc

    $dataPesan = getAllPesanId($hasil->id_pesan);           // dapatkan data pesan
    // array_push($data_pesan, $dataPesan->id);

    $dataGroup = $hasil->id_group;                          // dapatkan data group data group disini masih global berupa array, jadi harus di uraikan lagi
    // var_dump($dataGroup);
    // array_push($data_group, $dataGroup);
    foreach ($dataGroup as $group) {
        $idgroup = getAllGroupId($group);
    }
}

function bcPesan($today) 
{
    $token = "6556939785:AAEc1b9Nk4BR1Pk48heWikKzhqBfUNHH1bM";
    // $text = "$hasil->"
}