<?php

require_once __DIR__ . "/../function/sanitaze.php";
  //jika tombol tambah diklik
  if ( isset( $_POST['tambah'] ) && $_POST['tambah'] == 1 )
  {
    $daber = array_map("sanitize", $_POST);
    $data = array( "nama_group" => "$daber[nama_group]", "id_group" => "$daber[id_group]", "username_group" => "$daber[username_group]", "table" => "group_tele");
    if(tambahData($data)){
      $error = array(
        "pesan" => "Gagal menambah template pesan",
        "class" => "danger"
      );
    }else{
      $error = array(
        "pesan" => "Berhasil menambah template pesan",
        "class" => "success"
      );
    }
  }

  // fungsi hapus 
  if ( isset( $_POST['id_hapus'] ) )
  {
    $data = array("id" => $_POST['id_hapus'], "table" => "group_tele");
    if(hapusData($data)){
      $error = array(
        "pesan" => "Gagal menghapus template pesan",
        "class" => "danger"
      );
    }else{
      $error = array(
        "pesan" => "Berhasil menghapus template pesan",
        "class" => "success"
      );
    }
  }
    
  if( isset($_POST['editData']))
  {
    $daber = array_map("sanitize", $_POST);
    $data = array("id" => "$_POST[id]",  "nama_group" => "$daber[nama_group]", "id_group" => "$daber[id_group]", "username_group" => "$daber[username_group]", "table" => "group_tele");
    if(editData($data)){
      $error = array(
        "pesan" => "Gagal mengedit template pesan",
        "class" => "danger"
      );
    }else{
      $error = array(
        "pesan" => "Berhasil mengedit template pesan",
        "class" => "success"
      );
    }
  }
?>

<div class="container-xxl flex-grow-1 container-p-y">

<?php if(isset($error)) { ?>
  <div class="alert alert-<?=$error['class'] ?> alert-dismissible border border-light" role="alert">
    <strong><?= $error['pesan']; ?></strong>
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
  </div>
<?php } ?>

<!-- modal-input -->
<div class="col-lg-4 col-md-6">
  <!-- <small class="text-light fw-semibold">Default</small> -->
  <div class="mt-3">
    <!-- Modal Input-->
    <div class="modal fade" id="tambahData" tabindex="-1" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel1">Forms Input Group Telegram</h5>
            <button
              type="button"
              class="btn-close"
              data-bs-dismiss="modal"
              aria-label="Close"
            ></button>
          </div>
          <div class="modal-body">
          <form action="" method="post">
            <div class="row">
              <div class="col mb-3">
                <label for="nama_group" class="form-label">Nama Group</label>
                <input type="text" id="nama_group" name="nama_group" class="form-control" placeholder="Masukan Nama Group" required/>
              </div>
            </div>
            <div class="row g-2">
              <div class="col mb-0">
                <label for="id_group" class="form-label">ID Group</label>
                <input type="number" id="id_group" name="id_group" class="form-control" placeholder="cth : -987654322" required/>
              </div>
              <div class="col mb-0">
                <label for="username_group" class="form-label">Username Group</label>
                <input type="text" id="username_group" name="username_group" class="form-control" placeholder="cth : t.me/@contoh" required />
              </div>
            </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-outline-secondary rounded rounded-pill" data-bs-dismiss="modal">
              Close
            </button>
            <button type="submit" name="tambah" id="tombolTambahData" class="btn btn-primary rounded rounded-pill" value="1">Tambah Data</button>
          </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>

  <!-- kontent utama -->
  <div class="d-flex my-2 justify-content-end">
    <button class="btn btn-success m-2 me-0 rounded rounded-pill tombolTambahData"  data-bs-toggle="modal" data-bs-target="#tambahData" >Tambah Data Group</button>
  </div>
  <div class="col-lg-12 d-flex align-items-stretch">
    <div class="card w-100">
      <div class="card-body p-4">
        <h5 class="card-title fw-semibold mb-4">
          Group Telegram
          <?php //var_dump($_GET['id']); ?>
        </h5>
        <div class="table-responsive" class="display">
          <table class="table text-nowrap mb-0 align-middle" id="group_telegram">
            <thead class="text-dark fs-4">
              <tr>
                <th class="border-bottom-0">
                  <h6 class="fw-semibold mb-0">#</h6>
                </th>
                <th class="border-bottom-0">
                  <h6 class="fw-semibold mb-0">Nama Group</h6>
                </th>
                <th class="border-bottom-0">
                  <h6 class="fw-semibold mb-0">ID Group</h6>
                </th>
                <th class="border-bottom-0">
                  <h6 class="fw-semibold mb-0">Username Group</h6>
                </th>
                <th class="border-bottom-0">
                  <h6 class="fw-semibold mb-0">Aksi</h6>
                </th>
              </tr>
            </thead>
            <tbody>
              <?php
                $i = 1;
                $group = getAllGroup();
                while ( $data = mysqli_fetch_array($group) ) {
              ?>
              <tr>
                <td class="border-bottom-0">
                  <h6 class="fw-normal mb-0"><?= $i; ?></h6>
                </td>
                <td class="border-bottom-0">
                  <h6 class="fw-normal mb-1"><?= $data['nama']; ?></h6>
                </td>
                <td class="border-bottom-0">
                  <h6 class="mb-0 fw-normal"><?= $data['id_group']; ?></h6>
                </td>
                <td class="border-bottom-0">
                  <h6 class="mb-0 fw-normal"><?= $data['username_group']; ?></h6>
                </td>
                <td class="border-bottom-0">
                    <a class="btn btn-sm btn-warning rounded rounded-pill mb-2 text-white"  data-bs-toggle="modal" data-bs-target="#updateData<?= $data['id'];?>">
                      edit
                    </a>
                    <form action="" method="post">
                      <input type="hidden" name="id_hapus" value="<?= $data['id']; ?>">
                      <button type="submit"class="btn btn-sm btn-danger rounded rounded-pill mb-2" onclick="return confirm('kamu yakin ?');">
                        hapus
                      </button>
                    </form>
                </td>
                </td>
              </tr>
              <!-- modal update data -->
              <div class="modal fade" id="updateData<?= $data['id'];?>" tabindex="-1" aria-hidden="true">
                <div class="modal-dialog" role="document">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title" id="exampleModalLabel1">Forms Edit Group Telegram</h5>
                      <button
                        type="button"
                        class="btn-close"
                        data-bs-dismiss="modal"
                        aria-label="Close"
                      ></button>
                    </div>
                    <div class="modal-body">
                    <form action="" method="post">
                      <?php
                        $groupedit = getAllGroupId($data['id']);
                      ?>
                      <input type="hidden" name="id" value="<?= $data['id']; ?>">
                      <div class="row">
                        <div class="col mb-3">
                          <label for="nama_group" class="form-label">Nama Group</label>
                          <input type="text" id="nama_group" name="nama_group" class="form-control" value="<?= $groupedit->nama; ?>" required/>
                        </div>
                      </div>
                      <div class="row g-2">
                        <div class="col mb-0">
                          <label for="id_group" class="form-label">ID Group</label>
                          <input type="number" id="id_group" name="id_group" class="form-control" value="<?= $groupedit->id_group; ?>" required />
                        </div>
                        <div class="col mb-0">
                          <label for="username_group" class="form-label">Username Group</label>
                          <input type="text" id="username_group" name="username_group" class="form-control" value="<?= $groupedit->username_group; ?>" required/>
                        </div>
                      </div>
                    </div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-outline-secondary rounded rounded-pill" data-bs-dismiss="modal">
                        Close
                      </button>
                      <button type="submit" name="editData" id="tombolTambahData" class="btn btn-primary rounded rounded-pill" value="1">Edit Data</button>
                    </div>
                    </form>
                  </div>
                </div>
              </div>
              <?php  $i++; }  ?>
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
  <!-- akhir konten utama  -->
</div>
