<?php
session_start();

require_once __DIR__ . "/function/function.php";


$result = false;
session_destroy();
redirect($result);