<?php 

require_once __DIR__ . "/../Model/Pesan.php";
require_once __DIR__ . "/../Model/Group.php";
require_once __DIR__ . "/../Model/DataBc.php";
require_once __DIR__ . "/../BusinessLogic/tambahData.php";
require_once __DIR__ . "/../BusinessLogic/editData.php";
require_once __DIR__ . "/../BusinessLogic/hapusData.php";
require_once __DIR__ . "/../BusinessLogic/bcPesan.php";
require_once __DIR__ . "/../BusinessLogic/getIdGroup.php";

?>

<!-- Layout wrapper -->
<div class="layout-wrapper layout-content-navbar">
    <div class="layout-container">
        <?php require_once __DIR__ . "/../bagian/aside.php"; ?>
        <!-- Menu -->
        <div class="layout-page">
            <?php
            // require_once __DIR__ . "/bagian/header.php";
            // include "bagian/content.php";
            ?>
            <div class="content-wrapper">
                <!-- <h2>hello world</h2> -->
                <?php
                /**
                 * tempat debugging
                */
                // var_dump($data_group, $data_pesan);
                // var_dump();
                // $hasil = getIdGroup();
                // var_dump($hasil);
                /**
                 * tempat debugging
                */

                // $url= parseURL();
                // if ( sizeof( $url ) > 3 )
                // {
                //   header("Location:http://localhost/tele_blastv.1.github.io/404");
                //   $url[0] = "404";
                // }
                if(isset($_GET['url']) && $_GET['url'] = "group_telegram"){

                    echo "group_telegram";
                    require_once __DIR__ . "/group_telegram.php";
                } elseif(isset($_GET['url']) && $_GET['url'] = "template_pesan") {

                    echo "template_pesan";
                    require_once __DIR__ . "/template_pesan.php";
                } elseif(isset($_GET['url']) && $_GET['url'] = "bc_pesan") {

                    echo "bc pesan";
                    require_once __DIR__ . "/bc_pesan.php";
                }
                // if($url == null){
                // }
                // var_dump($url);
                // if (isset($url) && $url != null){
                //     $menu = ["main", "group_telegram", "template_pesan", "bc_pesan", "menu", "edit_data", "404", "bcPesan", "logout"];
                //     if( in_array($url[0], $menu) )
                //     {
                //         require_once __DIR__ . "/".$url[0].".php";
                //     }
                    
                // }
                var_dump($_GET);

                        // var_dump($_GET['content']);
                ?>
            </div>
        </div>
    </div>

<!-- Overlay -->
<div class="layout-overlay layout-menu-toggle"></div>
</div>
<!-- / Layout wrapper -->