<?php 

require_once __DIR__ . "";
function removeWebhook($token)
{

    $curl = curl_init();
    
    curl_setopt_array($curl, [
        CURLOPT_URL => "https://api.telegram.org/bot$token/setWebhook?remove=",
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => "",
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 30,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => "POST",
        CURLOPT_POSTFIELDS => json_encode([
            'url' => 'Empty'
        ]),
        CURLOPT_HTTPHEADER => [
            "User-Agent: Telegram Bot SDK - (https://github.com/irazasyed/telegram-bot-sdk)",
            "accept: application/json",
            "content-type: application/json"
        ],
    ]);
    
    $response = curl_exec($curl);
    $err = curl_error($curl);
    
    curl_close($curl);
    
    if ($err) {
        echo "cURL Error #:" . $err;
    } else {
        echo $response;
    }
    
}