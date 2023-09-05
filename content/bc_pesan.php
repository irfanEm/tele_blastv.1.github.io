<?php
// dapatkan data template pesan
$sdata_pesan = "SELECT * FROM template_pesan";
$xdata_pesan = mysqli_query($konek, $sdata_pesan);
// dapatkan data group 
$sdata_group = "SELECT * FROM group_tele";
$xdata_group = mysqli_query($konek, $sdata_group);

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
                        <option value="<?= $data_pesan['id']; ?>"><?= $data_pesan['judul_pesan']; ?></option>
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
                        <input class="form-check-input" type="checkbox" id="group_tele" name="group_tele" value="<?= $data_group['id']; ?>">
                        <label class="form-check-label" for="group_tele">
                        <?= $data_group['nama']; ?>
                        </label>
                    </div>
                    <?php $l++; } ?>
                </div>
                <button type="submit" class="btn btn-success">Bc Pesan</button>
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
          <div class="d-flex my-2">
            <button class="btn btn-success m-1 justify-content-end me-0" onclick="tampilForm();">Bc Pesan Baru</button>
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
                          <h6 class="fw-semibold mb-0">Waktu</h6>
                        </th>
                        <th class="border-bottom-0">
                          <h6 class="fw-semibold mb-0">Aksi</h6>
                        </th>
                      </tr>
                    </thead>
                    <tbody>
                      <tr>
                        <td class="border-bottom-0">
                          <h6 class="fw-semibold mb-0">1</h6>
                        </td>
                        <td class="border-bottom-0">
                          <h6 class="fw-semibold mb-1">Sunil Joshi</h6>
                          <span class="fw-normal">Web Designer</span>
                        </td>
                        <td class="border-bottom-0">
                          <p class="mb-0 fw-normal">Elite Admin</p>
                        </td>
                        <td class="border-bottom-0">
                          <p class="mb-0 fw-normal">Elite Admin</p>
                        </td>
                        <td class="border-bottom-0">
                          <h6 class="fw-semibold mb-0 fs-4">$3.9</h6>
                        </td>
                      </tr>
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
