<?php

// fungsi input
if ( isset( $_POST['bc_pesan'] ) )
{
  // tangkap data dari post user
  $pesan = $_POST['pesan']; 
  $tanggal = date_format(date_create($_POST['tanggal']), "d-m-Y"); 
  $waktu = date_format(date_create($tanggal.$_POST['waktu']), "H:i:s");
  $group = [];
  foreach ($_POST['group_tele'] as $value)
  {
    array_push($group, $value);
  }

  $group = implode(', ', $group);  $data = array ( "id_pesan" => "$pesan", "id_group" => "$group", "tanggal" => "$tanggal", "waktu" => "$waktu", "table" => "bc_pesan");

  $result = tambahData($data);
}

// fungsi hapus
if ( isset( $_POST['id_hapus'] ) )
{
  $data = array("table" => "bc_pesan", "id" => $id = $_POST['id_hapus']);
  hapus_data($data);
}

// edit data bc pesan
if( isset ( $_POST['editBc_pesan'] ) )
{
  $group = [];
  foreach ($_POST['group_tele'] as $value)
  {
    array_push($group, $value);
  }

  $group = implode(', ', $group);  
  $data = array ( "id" => $_POST['id'], "id_pesan" => "$_POST[pesan]", "id_group" => "$group", "tanggal" => "$_POST[tanggal]", "waktu" => "$_POST[waktu]", "table" => "bc_pesan");
  $edit = editData($data); // var_dump($edit);
}



?>
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
              <h5 class="modal-title" id="exampleModalLabel1">Forms Input Broadcast Pesan Baru</h5>
              <button
                type="button"
                class="btn-close"
                data-bs-dismiss="modal"
                aria-label="Close"
              ></button>
            </div>
            <div class="modal-body">
            <form action="" method="post">
              
              <div class="mb-3">
                <label for="pesan" class="form-label">Pilih Pesan</label>
                <select id="pesan" name="pesan" class="form-select" required>
                  <?php
                  $pesan = getAllPesan();
                  $h = 1;
                  while ( $hasil = mysqli_fetch_array( $pesan ) )
                  {
                  ?>
                    <option value="<?= $hasil['id']; ?>"><?= $hasil['judul_pesan']; ?></option>
                  <?php $h++; } ?>
                </select>
              </div>
              <div class="mb-3">
                  <label for="tanggal" class="form-label">Tanggal</label>
                  <input type="date" class="form-control" id="tanggal" name="tanggal" required> 
              </div>
              <div class="mb-3">
                  <label for="waktu" class="form-label">Waktu</label>
                  <input type="time" class="form-control" id="waktu" name="waktu" required> 
              </div>
              
              <div class="row gy-3">
                  <div class="col-md">
                    <label for="pesan" class="form-label" require>Pilih Group Telegram</label>
                      <?php 
                        $group = getAllGroup();
                        $l = 1;
                        while ( $data_group = mysqli_fetch_array($group) )
                        {
                        ?>
                      <div class="form-check mt-1">
                          <input class="form-check-input" type="checkbox" id="group_tele" name="group_tele[<?= $l; ?>]" value="<?= $data_group['id']; ?>">
                          <label class="form-check-label" for="group_tele">
                          <?= $data_group['nama']; ?>
                          </label>
                      </div>
                      <?php $l++; } ?>
                  </div>
              </div>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-outline-secondary rounded rounded-pill" data-bs-dismiss="modal">
                Tutup
              </button>
              <button type="submit" name="bc_pesan" id="tombolTambahData" class="btn btn-primary rounded rounded-pill" value="1">Tambah Data</button>
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
          <table class="table text-nowrap mb-0 align-middle" id="bc_pesan" class="display">
            <thead class="text-dark fs-4">
              <tr>
                <th class="border-bottom-0">
                  <h6 class="fw-semibold mb-0">#</h6>
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
              $pesan = getAllPesanId($data_bc['id_pesan']);
              $groups = [];
              $id_groups = explode(", ",$data_bc['id_group']);
              foreach ( $id_groups as $idPesan ) {
                $group = getAllGroupId($idPesan);
                // var_dump($group);
                array_push($groups, $group->nama);
              }
            ?>
              <tr>
                <td class="border-bottom-0">
                  <h6 class="fw-semibold mb-0"><?=$n; ?></h6>
                </td>
                <td class="border-bottom-0">
                  <h6 class="fw-normal mb-1"><?= $pesan->judul_pesan; ?></h6>
                </td>
                <td class="border-bottom-0">
                  <h6 class="mb-0 fw-normal"><?= implode(", ",$groups); ?></h6>
                </td>
                <td class="border-bottom-0">
                  <h6 class="mb-0 fw-normal"><?= $data_bc['tanggal']; ?></h6>
                </td>
                        <td class="border-bottom-0">
                  <h6 class="mb-0 fw-normal"><?= $data_bc['waktu']; ?></h6>
                </td>
                <td class="border-bottom-0">
                    <a class="btn btn-sm btn-warning rounded rounded-pill mb-2 text-white"  data-bs-toggle="modal" data-bs-target="#updateData<?= $data_bc['id'];?>">
                      edit
                    </a>
                  <form action="" method="post">
                    <input type="hidden" name="id_hapus" value="<?= $data_bc['id']; ?>">
                    <button type="submit"class="btn btn-sm btn-danger rounded rounded-pill mb-2" onclick="return confirm('kamu yakin ?');">
                      hapus
                    </button>
                  </form>
                </td>
              </tr>
              
              <!-- modal update data -->
              <div class="col-lg-4 col-md-6">
                <!-- <small class="text-light fw-semibold">Default</small> -->
                <div class="mt-3">
                  <!-- Modal Input-->
                  <div class="modal fade" id="updateData<?= $data_bc['id'];?>" tabindex="-1" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h5 class="modal-title" id="exampleModalLabel1">Forms Ubah Broadcast Pesan Baru</h5>
                          <button
                            type="button"
                            class="btn-close"
                            data-bs-dismiss="modal"
                            aria-label="Close"
                          ></button>
                        </div>
                        <div class="modal-body">
                        <form action="" method="post">
                          
                          <input type="hidden" name="id" value="<?= $data_bc['id'];?>">
                          <div class="mb-3">
                            <label for="pesan" class="form-label">Pilih Pesan</label>
                            <select id="pesan" name="pesan" class="form-select" required>
                              <?php
                              $pesanId = mysqli_fetch_array(getPesanById($data_bc['id']));
                              $pesan = getAllPesan();
                              $h = 1;
                              while ( $hasil = mysqli_fetch_array( $pesan ) )
                              {
                              ?>
                                <option value="<?= $hasil['id']; ?>" <?php if ($hasil['judul_pesan'] == $pesanId['id_pesan'] ) { echo 'selected'; } ?>><?= $hasil['judul_pesan']; ?></option>
                              <?php $h++; } ?>
                            </select>
                          </div>
                          <div class="mb-3">
                              <label for="tanggal" class="form-label">Tanggal</label>
                              <input type="text" class="form-control" id="tanggal" name="tanggal" value="<?= $pesanId['tanggal']; ?>" required> 
                          </div>
                          <div class="mb-3">
                              <label for="waktu" class="form-label">Waktu</label>
                              <input type="time" class="form-control" id="waktu" name="waktu" value="<?= $pesanId['waktu']; ?>" required> 
                          </div>

                          <div class="row gy-3">
                              <div class="col-md">
                                <label for="pesan" class="form-label">Pilih Group Telegram</label>
                                  <?php 
                                    $groups = explode(',', $pesanId['id_group']); //var_dump($groups);
                                    $group = getAllGroup();
                                    $l = 1;
                                    while ( $data_group = mysqli_fetch_array($group) )
                                    {
                                    ?>
                                    
                                  <div class="form-check mt-1">
                                    <input class="form-check-input" type="checkbox" id="group_tele" name="group_tele[<?= $l; ?>]" value="<?= $data_group['id']; ?>" <?php if ( in_array($data_group['nama'], $groups) ) { echo "checked"; } ?>>
                                    <label class="form-check-label" for="group_tele">
                                      <?= $data_group['nama']; ?>
                                    </label>
                                  </div>
                                  <?php $l++; } ?>
                              </div>
                          </div>
                        </div>
                        <div class="modal-footer">
                          <button type="button" class="btn btn-outline-secondary rounded rounded-pill" data-bs-dismiss="modal">
                            Tutup
                          </button>
                          <button type="submit" name="editBc_pesan" id="tombolTambahData" class="btn btn-primary rounded rounded-pill" value="1">Ubah Data</button>
                        </div>
                        </form>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <?php $n++; } ?>
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
</div>
          <!-- akhir content utama -->
