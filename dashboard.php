<?php
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
          // $menu = ["dashboard", "group_telegram", "template_pesan", "broadcast_pesan"];
          if($url == "template_pesan")
          {
            header("Location: content/template_pesan.php");
          }
        }else{
          $_SESSION['error'] = 'halmaan tidak ditemukan';
          echo "<script>alert('halaman tidak ditemukan');</script>";
          require_once 'dashboard.php';
        }
                // var_dump($_GET['content']);
          include "content/template_pesan.php";
        ?>
    </div>
  </div>

<?php
  require_once 'bagian/main_footer.php';
?>