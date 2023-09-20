<?php

require_once __DIR__ . "/../config/koneksi.php";
require_once __DIR__ . "/../config/config.php";
require_once __DIR__ . "/../Model/DataBc.php";
require_once __DIR__ . "/../Model/Group.php";
require_once __DIR__ . "/../Model/Pesan.php";

$waktu = date("H:i");
$dataBc = getAllDataBc();      // dapatkan data bc dengan tanggal hari ini
$times = [];

while ( $hasil = mysqli_fetch_object($dataBc) ) {

    array_push($times,$hasil->waktu);

}

if(in_array($waktu, $times)) { 

    $data = getDataBcbyDate($waktu);

    $dataPesan = getAllPesanId($data->id_pesan);

    $dataGroup = explode (", ", $data->id_group);

    foreach ($dataGroup as $group) {                            // lakukan pengulangan terhadap data array dari id_group menggunakan foreach

        $idgroup = getAllGroupId($group);                       // tampung data group berdasarkan id_group dalam variabel $idgroup

        $result = bcPesan($dataPesan->isi_pesan, $idgroup->id_group); 
        //  var_dump($result);   // lakukan bc pesan ke group telegram menggunakan function bcPesan

    }
}

function bcPesan($pesan, $group) 
{
    global $token;

    $data = [
        "text" =>"$pesan",
        "chat_id" => "$group"  
    ];

    $exec = file_get_contents("https://api.telegram.org/bot$token/sendMessage?" . http_build_query($data) );
    return $exec;
}