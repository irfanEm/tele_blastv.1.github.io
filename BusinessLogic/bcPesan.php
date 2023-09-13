<?php

require_once __DIR__ . "/../config/koneksi.php";
require_once __DIR__ . "/../config/config.php";
require_once __DIR__ . "/../Model/DataBc.php";


$today = date("d-m-Y");
$dataBc = getDataBcbyDate($today);
// var_dump($dataBc);

// $data_pesan = [];
// $data_group = [];
$g = 1;
$data = [];
while ( $hasil = mysqli_fetch_object($dataBc) ) {           // dapatkan data bc

    $dataPesan = getAllPesanId($hasil->id_pesan);           // dapatkan data pesan
    // array_push($data_pesan, $dataPesan->id);

    $dataGroup = $hasil->id_group;                          // dapatkan data group data group disini masih global berupa array, jadi harus di uraikan lagi
    // var_dump($dataGroup);
    // array_push($data_group, $dataGroup);
    foreach ($dataGroup as $group) {
        $idgroup = getAllGroupId($group);
        $data = array_push(["pesan" => $dataPesan->isi_pesan, "id_group" => $idgroup->id_group]);
        // $bcPesan = bcPesan($data);
        // var_dump($bcPesan);
    }
}

var_dump($dataPesan->isi_pesan);
// function bcPesan($data) 
// {
//     global $token;
//     // $token = "6556939785:AAEc1b9Nk4BR1Pk48heWikKzhqBfUNHH1bM";
//     $data = [
//         "text" =>"$data[pesan]",
//         "chat_id" => "$data[id_group]"  //contoh bot, group id -1001177007534
//     ];
     
//     file_get_contents("https://api.telegram.org/bot$token/sendMessage?" . http_build_query($data) );
//     // $text = "$hasil->"
// }

// bcPesan($data);