<?php
// fungsi input
if ( isset( $_POST['bc_pesan'] ) )
{
  // tangkap data dari post user
  $pesan = $_POST['pesan'] ? $_POST['pesan'] : '';
  $tanggal = date_format(date_create($_POST['tanggal']), "d-m-Y") ?  : '';
  $waktu = date_format(date_create($tanggal.$_POST['waktu']), "H:i:s") ?  : '';
  $group = [];
  foreach ($_POST['group_tele'] as $value)
  {
    array_push($group, $value);
  }
  $group = implode(', ', $group);
  $stmtinsert = "INSERT INTO bc_pesan VALUES (null, '$pesan', '$group', '$tanggal', '$waktu')";
  $xstmtinsert = mysqli_query($konek, $stmtinsert);
  // var_dump($stmtinsert);
  // var_dump($pesan, $tanggal, $waktu, $group);
}

// fungsi hapus
if ( isset( $_POST['id_hapus'] ) )
{
  $id = $_POST['id_hapus'];
  $stmthps = "DELETE FROM bc_pesan WHERE id = $id";
  // var_dump($stmthps);
  $xstmthps = mysqli_query($konek, $stmthps);

}

// dapatkan data template pesan
$sdata_pesan = "SELECT * FROM template_pesan";
$xdata_pesan = mysqli_query($konek, $sdata_pesan);

// dapatkan data group 
$sdata_group = "SELECT * FROM group_tele";
$xdata_group = mysqli_query($konek, $sdata_group);

// dapatkan data bc_pesan 
$sdata_pesanbc = "SELECT * FROM bc_pesan";
$xdata_pesanbc = mysqli_query($konek, $sdata_pesanbc);


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
                      $h = 1;
                      while ( $data_pesan = mysqli_fetch_array( $xdata_pesan ) )
                      {
                      ?>
                        <option value="<?= $data_pesan['judul_pesan']; ?>"><?= $data_pesan['judul_pesan']; ?></option>
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
                      $l = 1;
                      while ( $data_group = mysqli_fetch_array($xdata_group) )
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

<!-- container -->
<div class="container-fluid">
    <div class="card shadow">
        <div class="card-body">
          <!-- kontent utama -->
          <div class="d-flex justify-content-end my-2">
            <button class="btn btn-success btn-sm rounded rounded-pill m-1" onclick="tampilForm();">Bc Pesan Baru</button>
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
                    $n = 1;
                    while ( $hdata_pesanbc = mysqli_fetch_array($xdata_pesanbc) )
                    { 
                    ?>
                      <tr>
                        <td class="border-bottom-0">
                          <h6 class="fw-semibold mb-0"><?=$n; ?></h6>
                        </td>
                        <td class="border-bottom-0">
                          <h6 class="fw-semibold mb-1"><?= $hdata_pesanbc['id_pesan']; ?></h6>
                        </td>
                        <td class="border-bottom-0">
                          <h6 class="mb-0 fw-normal"><?= $hdata_pesanbc['id_group']; ?></h6>
                        </td>
                        <td class="border-bottom-0">
                          <h6 class="mb-0 fw-normal"><?= $hdata_pesanbc['tanggal']; ?></h6>
                        </td>
                        <td class="border-bottom-0">
                          <h6 class="mb-0 fw-normal"><?= $hdata_pesanbc['waktu']; ?></h6>
                        </td>
                        <td class="border-bottom-0">
                          <form action="" method="post">
                            <input type="hidden" name="id_edit" value="<?= $hdata_pesanbc['id']; ?>">
                            <button type="submit"class="btn btn-sm btn-warning rounded rounded-pill mb-1">
                              edit
                            </button>
                          </form>                          
                          <form action="" method="post">
                            <input type="hidden" name="id_hapus" value="<?= $hdata_pesanbc['id']; ?>">
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
          <!-- akhir content utama -->
        </div>
    </div>
</div>
<!-- akhir container -->
