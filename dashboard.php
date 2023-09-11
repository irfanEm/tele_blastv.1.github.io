<?php
  require_once __DIR__ . "/config/koneksi.php";
  require_once __DIR__ . "/function/function.php";
  require_once __DIR__ . "/function/insert_data.php";
  require_once __DIR__ . "/function/hapus_data.php";
  require_once __DIR__ . "/bagian/main_header.php";
  require_once __DIR__ . "/bagian/aside.php";
  require_once __DIR__ . "/Model/Pesan.php";
  require_once __DIR__ . "/Model/Group.php";
  require_once __DIR__ . "/Model/DataBc.php";
  require_once __DIR__ . "/BusinessLogic/tambahData.php";  
  require_once __DIR__ . "/BusinessLogic/editData.php";  
  require_once __DIR__ . "/BusinessLogic/hapusData.php";
?>
  <div class="layout-page">
    <?php
      // require_once __DIR__ . "/bagian/header.php";
          // include "bagian/content.php";
    ?>
    <div class="content-wrapper">
        <?php
          $url= parseURL();
          if ( sizeof( $url ) > 3 )
          {
            header("Location:http://localhost/tele_blastv.1.github.io/404");
            $url[0] = "404";
          }
          // var_dump($url[0]);
        if (isset($url) && $url != null){
          $menu = ["main", "group_telegram", "template_pesan", "bc_pesan", "menu", "edit_data", "404"];
          if( in_array($url[0], $menu) )
          {
            require_once __DIR__ . "/content/".$url[0].".php";
          }

        }
                // var_dump($_GET['content']);
        ?>
    </div>
  </div>

<?php
  require_once __DIR__ . "/bagian/main_footer.php";
?>