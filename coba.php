<?php
 //test sukses

    // $token = "6556939785:AAEc1b9Nk4BR1Pk48heWikKzhqBfUNHH1bM"; // token bot
    $token = "6598949420:AAHQ6JDapP7ujwdcXIglHBlslNuYCOUZ9wM"; // token bot xmltronik

    $data = [
        'text' =>"punten",
         'chat_id' => '-4005188177'  //contoh bot, group id -1001177007534
    ];
    
    $response = file_get_contents("https://api.telegram.org/bot$token/sendMessage?" . http_build_query($data) );

    var_dump(json_decode($response));

 
?>

<!-- butuh data isi pesan sama chat id
data text ( isi pesan ) ambil dari id_pesan yang terhubung ke data template_pesan
data chat_id ambil dari id_group yang terhubung ke data group telegram --> 