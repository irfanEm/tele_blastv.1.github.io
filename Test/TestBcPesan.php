<?php 

require_once __DIR__ . "/../BusinessLogic/bcPesan.php";

$pesan = "Testing";
$group = "-4052016028";
// $group = "-4003316598";

bcPesan($pesan, $group);