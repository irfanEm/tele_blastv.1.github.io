<?php 

require_once __DIR__ . "/../config/config.php";

function getIdGroup()
{
    global $token;

    $curl = curl_init();

    curl_setopt_array($curl, [
      CURLOPT_URL => "https://api.telegram.org/bot$token/getUpdates",
      CURLOPT_RETURNTRANSFER => true,
      CURLOPT_ENCODING => "",
      CURLOPT_MAXREDIRS => 10,
      CURLOPT_TIMEOUT => 30,
      CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
      CURLOPT_CUSTOMREQUEST => "POST",
      CURLOPT_POSTFIELDS => json_encode([
        'offset' => null,
        'limit' => null,
        'timeout' => null
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
      var_dump($response);
    }
}

// $hasil = getIdGroup();
// var_dump($hasil);

// prepare go nangkap ID group heheheheh
// function searchNestedArray($array, $key) {
//     $result = array();
//     array_walk_recursive($array, function($value, $index) use ($key, &$result) {
//         if ($index == $key) {
//             array_push($result, $value);
//         }
//     });
//     return $result;
// }

// $url = 'https://api.telegram.org/bot6598949420:AAHQ6JDapP7ujwdcXIglHBlslNuYCOUZ9wM/getUpdates'; // Ganti URL dengan URL yang sesuai
// $response = file_get_contents($url);
// $data = json_decode($response, true);
// // print_r($data);


// $result = searchNestedArray($data, "id");
// var_dump($result); // Output: Array ( [0] => value )