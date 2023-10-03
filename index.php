<?php

// require public
require_once __DIR__ . "/config/koneksi.php";
require_once __DIR__ . "/function/function.php";
require_once __DIR__ . "/bagian/main_header.php";

    var_dump($_SESSION);
    if($_SESSION["login"] == true){

        require_once __DIR__ . "/content/index.php";
        

    } else {

        require_once __DIR__ . "/content/login.php";

    }

require_once __DIR__ . "/bagian/main_footer.php";
?>