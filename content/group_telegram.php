<?php
  // jika tombol tambah diklik
  if ( isset( $_POST['tambah'] ) && $_POST['tambah'] == 1 )
  {
    // tangkap data dari form input dan kondisikan jika data kosong
    $nama_group = $_POST['nama_group'] ? $_POST['nama_group'] : '';
    $id_group = $_POST['id_group'] ? $_POST['id_group'] : '';
    $username_group = $_POST['username_group'] ? $_POST['username_group'] : '';

    // debuging input form
    var_dump($nama_group, $id_group, $username_group);
    $stmtinsert = "INSERT INTO group_tele VALUES (null, '$nama_group', '$id_group', '$username_group')";
    $exec = mysqli_query($konek, $stmtinsert); var_dump($exec);

    $_POST['tambah'] = 0;
  }


  $stmtshow = "SELECT * FROM group_tele order by id DESC";
  $exec = mysqli_query($konek, $stmtshow);
  
?>
<!-- awal container -->
<div class="container-fluid" id="container_form" style="display: none;">
    <div class="card shadow">
      <div class="card-body">
        
        <!-- form input -->
          <div class="d-flex justify-content-between">
            <h5 class="card-title fw-semibold mb-4">Forms Input Group Telegram</h5>
            <button type="button" class="btn-close" aria-label="Close" onclick="sembunyikanForm();"></button>
          </div>
          <div class="card">
            <div class="card-body">
              <form action="" method="post">
                <div class="mb-3">
                  <label for="nama_group" class="form-label">Nama Group</label>
                  <input type="text" name="nama_group" class="form-control" id="nama_group">
                </div>
                <div class="mb-3">
                  <label for="id_group" class="form-label">ID Group</label>
                  <input type="text" name="id_group" class="form-control" id="id_group">
                </div>
                <div class="mb-3">
                  <label for="username_group" class="form-label">Username Group</label>
                  <input type="text" name="username_group" class="form-control" id="username_group">
                </div>
                <button type="submit" name="tambah" class="btn btn-success btn-sm rounded rounded-pill" value="1">Tambah</button>
              </form>
            </div>
          </div>
          <!-- akhir input form -->
          </div>
    </div>
</div>
<!-- akhir container -->

<!-- awal container -->
<div class="container-fluid">
    <div class="card shadow">
        <div class="card-body">

          <!-- kontent utama -->
          <div class="d-flex my-2 justify-content-end">
            <button class="btn btn-success m-1 me-0 btn-sm rounded rounded-pill" onclick="tampilForm();">Tambah Data Group</button>
          </div>
          <div class="col-lg-12 d-flex align-items-stretch">
            <div class="card w-100">
              <div class="card-body p-4">
                <h5 class="card-title fw-semibold mb-4">
                  Group Telegram
                  <?php var_dump($_GET['id']); ?>
                </h5>
                <div class="table-responsive">
                  <table class="table text-nowrap mb-0 align-middle">
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
                        while ( $data = mysqli_fetch_array($exec) ) {
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
                            <a href="?id=<?= $data['id']; ?>" class="btn btn-sm btn-warning rounded rounded-pill">edit</a>
                            <a href="?id=<?= $data['id']; ?>" class="btn btn-sm btn-danger rounded rounded-pill">hapus</a>
                        </td>
                        </td>
                      </tr>
                      <?php  $i++; }  ?>
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
          </div>
          <!-- akhir konten utama  -->
        </div>
    </div>
</div>
<!-- akhir container -->