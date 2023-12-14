<?php 

// require_once __DIR__ . "/../config/config.php";

// function getIdGroup()
// {
//   global $token;

//   $url = "https://api.telegram.org/bot$token/getUpdates"; // Ganti URL dengan URL yang sesuai
//   $response = file_get_contents($url);
//   $data = json_decode($response, true);
//   return $data;

// }

// $array = getIdGroup();
// $key = "id";
// $value = "";
// function searchNestedArray($array, $key) {
//     $result = array();
//     array_walk_recursive($array, function($value, $index) use ($key, &$result) {
//         if ($index == $key) {
//             array_push($result, $value);
//         }
//     });
//     return $result;
// }

// function searchArray($array, $key, $value)
// {
//     $results = array();

//     if (is_array($array))
//     {
//         if (isset($array[$key]) && $array[$key] == $value)
//         {
//             $results[] = $array;
//         }

//         foreach ($array as $subarray)
//         {
//             $results = array_merge($results, searchArray($subarray, $key, $value));
//         }
//     }

//     return $results;
// }


// $hasil = getIdGroup();
// var_dump($hasil);

