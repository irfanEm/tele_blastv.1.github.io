<?php
require_once 'config/koneksi.php';
  require_once 'bagian/main_header.php';
  require_once "bagian/aside.php";
?>
  <div class="body-wrapper">
    <?php
      include "bagian/header.php";
          // include "bagian/content.php";
    ?>
    <div class="container-fluid">
        <?php
        include "function/function.php";
          $url= parseURL();
          // var_dump($url);
        if (isset($url) && $url != null){
          $menu = ["main", "group_telegram", "template_pesan", "bc_pesan", "menu"];
          if( in_array($url, $menu) )
          {

            include "content/".$url.".php";
          }

        }
                // var_dump($_GET['content']);
        ?>
    </div>
  </div>

<?php
  require_once 'bagian/main_footer.php';
?>