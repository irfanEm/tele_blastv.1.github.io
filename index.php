<?php

// require public
require_once __DIR__ . "/config/koneksi.php";
require_once __DIR__ . "/function/function.php";
require_once __DIR__ . "/bagian/main_header.php";

?>

<!-- Overlay -->
<div class="layout-overlay layout-menu-toggle"></div>
</div>
<!-- / Layout wrapper -->
<!-- // echo $content = require_once __DIR__ . '/content/login.php';

// if(isset($login) && $login == true)
// {
//   echo $content = require_once __DIR__ . "/content/index.php";
// }

// if($login == false)
// {
//   $login = false;
// }else{
//   $login = true;
// }

// $_SESSION['login'] = false;

// $url= parseURL();

// var_dump($url);
var_dump($_GET);

// if($_SESSION['login'] != null) {
//   require_once __DIR__ . "/content/index.php";
// } else {
//  require_once __DIR__ . "/content/index.php";
// } -->

<?php

    var_dump($_SESSION["login"]);
    if($_SESSION["login"] == true){

        require_once __DIR__ . "/content/index.php";
        

    } else {

        require_once __DIR__ . "/content/login.php";

    }


?>
<?php
require_once __DIR__ . "/bagian/main_footer.php";
?>