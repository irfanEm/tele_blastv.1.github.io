<?php
 //test sukses
$token = "6556939785:AAEc1b9Nk4BR1Pk48heWikKzhqBfUNHH1bM"; // token bot
 
$data = [
    'text' =>"punten",
    'chat_id' => '-1001177007534'  //contoh bot, group id -1001177007534
];
 
file_get_contents("https://api.telegram.org/bot$token/sendMessage?" . http_build_query($data) );
 
?>

<!-- butuh data isi pesan sama chat id
data text ( isi pesan ) ambil dari id_pesan yang terhubung ke data template_pesan
data chat_id ambil dari id_group yang terhubung ke data group telegram --> 