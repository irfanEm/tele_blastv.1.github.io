<?php

// fungsi input
if ( isset( $_POST['bc_pesan'] ) )
{
  // tangkap data dari post user
  $pesan = $_POST['pesan']; 
  $table = "bc_pesan"; 
  $tanggal = date_format(date_create($_POST['tanggal']), "d-m-Y"); 
  $waktu = date_format(date_create($tanggal.$_POST['waktu']), "H:i:s");
  $group = [];
  foreach ($_POST['group_tele'] as $value)
  {
    array_push($group, $value);
  }

  $group = implode(', ', $group);  $data = array ( "id_pesan" => "$pesan", "id_group" => "$group", "tanggal" => "$tanggal", "waktu" => "$waktu", "table" => "$table");

  $result = insert($data);
}

// fungsi hapus
if ( isset( $_POST['id_hapus'] ) )
{
  $table = "bc_pesan";
  $data = array("table" => $table, "id" => $id = $_POST['id_hapus']);
  hapus_data($data);


}



?>
<!-- awal container -->
<div class="container-fluid" id="container_form" style="display: none;">
    <div class="card shadow">
        <div class="card-body">

          <!-- form input -->
          <div class="d-flex justify-content-between">
            <h5 class="card-title fw-semibold mb-4" >Broadcast Pesan Baru</h5>
            <button type="button" class="btn-close" aria-label="Close" onclick="sembunyikanForm();"></button>
          </div>
          <div class="card">
            <div class="card-body">
              <form action="" method="post">
                <div class="mb-3">
                    <label for="pesan" class="form-label">Pilih Pesan</label>
                    <select id="pesan" name="pesan" class="form-select">
                      <?php
                      $pesan = getAllPesan();
                      $h = 1;
                      while ( $hasil = mysqli_fetch_array( $pesan ) )
                      {
                      ?>
                        <option value="<?= $hasil['judul_pesan']; ?>"><?= $hasil['judul_pesan']; ?></option>
                      <?php $h++; } ?>
                    </select>
                </div>
                <div class="mb-3">
                    <label for="tanggal" class="form-label">Tanggal</label>
                    <input type="date" class="form-control" id="tanggal" name="tanggal"> 
                </div>
                <div class="mb-3">
                    <label for="waktu" class="form-label">Waktu</label>
                    <input type="time" class="form-control" id="waktu" name="waktu"> 
                </div>
                <div class="mb-3">
                    <label for="pesan" class="form-label">Pilih Group Telegram</label>
                    <?php 
                      $group = getAllGroup();
                      $l = 1;
                      while ( $data_group = mysqli_fetch_array($group) )
                      {
                      ?>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" id="group_tele" name="group_tele[<?= $l; ?>]" value="<?= $data_group['nama']; ?>">
                        <label class="form-check-label" for="group_tele">
                        <?= $data_group['nama']; ?>
                        </label>
                    </div>
                    <?php $l++; } ?>
                </div>
                <button type="submit" class="btn btn-success" name="bc_pesan" value="1">Bc Pesan</button>
              </form>
            </div>
          </div>
          <!-- akhir input form -->
          </div>
    </div>
</div>
<!-- akhir container -->

<div class="container-xxl flex-grow-1 container-p-y">

<!-- modal tambah data -->

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
                <input type="text" id="nama_group" name="nama_group" class="form-control" placeholder="Masukan Nama Group" />
              </div>
            </div>
            <div class="row g-2">
              <div class="col mb-0">
                <label for="id_group" class="form-label">ID Group</label>
                <input type="number" id="id_group" name="id_group" class="form-control" placeholder="cth : -987654322" />
              </div>
              <div class="col mb-0">
                <label for="username_group" class="form-label">Username Group</label>
                <input type="text" id="username_group" name="username_group" class="form-control" placeholder="cth : t.me/@contoh" />
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
  <div class="d-flex justify-content-end my-2">
    <button class="btn btn-success rounded rounded-pill m-2"  data-bs-toggle="modal" data-bs-target="#tambahData">Bc Pesan Baru</button>
  </div>
  <div class="col-lg-12 d-flex align-items-stretch">
    <div class="card w-100">
      <div class="card-body p-4">
        <h5 class="card-title fw-semibold mb-4">
          Broadcast Pesan
        </h5>
        <div class="table-responsive">
          <table class="table text-nowrap mb-0 align-middle">
            <thead class="text-dark fs-4">
              <tr>
                <th class="border-bottom-0">
                  <h6 class="fw-semibold mb-0">Id</h6>
                </th>
                <th class="border-bottom-0">
                  <h6 class="fw-semibold mb-0">Judul Pesan</h6>
                </th>
                <th class="border-bottom-0">
                  <h6 class="fw-semibold mb-0">Group</h6>
                </th>
                <th class="border-bottom-0">
                  <h6 class="fw-semibold mb-0">Tanggal</h6>
                </th>
                        <th class="border-bottom-0">
                  <h6 class="fw-semibold mb-0">Waktu</h6>
                </th>
                <th class="border-bottom-0">
                  <h6 class="fw-semibold mb-0">Aksi</h6>
                </th>
              </tr>
            </thead>
            <tbody>
            <?php
            $dataBc = getAllDataBc();
            $n = 1;
            while ( $data_bc = mysqli_fetch_array($dataBc) )
            { 
            ?>
              <tr>
                <td class="border-bottom-0">
                  <h6 class="fw-semibold mb-0"><?=$n; ?></h6>
                </td>
                <td class="border-bottom-0">
                  <h6 class="fw-semibold mb-1"><?= $data_bc['id_pesan']; ?></h6>
                </td>
                <td class="border-bottom-0">
                  <h6 class="mb-0 fw-normal"><?= $data_bc['id_group']; ?></h6>
                </td>
                <td class="border-bottom-0">
                  <h6 class="mb-0 fw-normal"><?= $data_bc['tanggal']; ?></h6>
                </td>
                        <td class="border-bottom-0">
                  <h6 class="mb-0 fw-normal"><?= $data_bc['waktu']; ?></h6>
                </td>
                <td class="border-bottom-0">
                  <form action="" method="post">
                    <input type="hidden" name="id_edit" value="<?= $data_bc['id']; ?>">
                            <button type="submit"class="btn btn-sm btn-warning rounded rounded-pill mb-1">
                      edit
                    </button>
                  </form>                          
                  <form action="" method="post">
                    <input type="hidden" name="id_hapus" value="<?= $data_bc['id']; ?>">
                    <button type="submit"class="btn btn-sm btn-danger rounded rounded-pill mb-1" onclick="return confirm('kamu yakin ?');">
                      hapus
                    </button>
                  </form>
                </td>
              </tr>
              <?php $n++; } ?>
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
</div>
          <!-- akhir content utama -->
