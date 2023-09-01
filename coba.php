<?php
 //test sukses
$token = "6556939785:AAEc1b9Nk4BR1Pk48heWikKzhqBfUNHH1bM"; // token bot
 
$data = [
    'text' =>"oke makasih sudah boleh testing 🙂 dan mohon maaf mengganggu 🙏.",
    'chat_id' => '-1001177007534'  //contoh bot, group id -1001177007534
];
 
file_get_contents("https://api.telegram.org/bot$token/sendMessage?" . http_build_query($data) );
 
?>