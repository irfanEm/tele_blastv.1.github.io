<?php

require_once __DIR__ . "/../config/koneksi.php";
require_once __DIR__ . "/../config/config.php";
require_once __DIR__ . "/../Model/DataBc.php";
require_once __DIR__ . "/../Model/Group.php";
require_once __DIR__ . "/../Model/Pesan.php";

$waktu = date("H:i");
$today = date("d-m-Y");                 // deklarasikan tanggal hari ini
$dataBc = getDataBcbyDate($today);      // dapatkan data bc dengan tanggal hari ini

while ( $hasil = mysqli_fetch_object($dataBc) ) {           // lakukan pengulangan terhadap data bc pesan hari ini

    $dataPesan = getAllPesanId($hasil->id_pesan);           // dapatkan data pesan berdasarkan id_pesan dari data bc_pesan hari ini

    $dataGroup = explode (", ", $hasil->id_group);          // convert data id_group dari data bc pesan menjadi array dengan fungsi explode

    $waktuBc =date("H:i", strtotime($hasil->waktu));

    if($waktuBc == $waktu) {

        foreach ($dataGroup as $group) {                            // lakukan pengulangan terhadap data array dari id_group menggunakan foreach
    
            $idgroup = getAllGroupId($group);                       // tampung data group berdasarkan id_group dalam variabel $idgroup
            
            bcPesan($dataPesan->isi_pesan, $idgroup->id_group);     // lakukan bc pesan ke group telegram menggunakan function bcPesan
    
        }
    }

}

function bcPesan($pesan, $group) 
{
    global $token;

    $data = [
        "text" =>"$pesan",
        "chat_id" => "$group"  
    ];

    file_get_contents("https://api.telegram.org/bot$token/sendMessage?" . http_build_query($data) );
    $token = null;
}