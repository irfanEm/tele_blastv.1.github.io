<?php
  // jika tombol tambah diklik
  if ( isset( $_POST['tambah'] ) && $_POST['tambah'] == 1 )
  {
    //inisialisasi data 
    $judul_pesan = $_POST['judul_pesan']; $isi_pesan = $_POST['isi_pesan']; $table = "template_pesan";
    $data = array(
      "judul_pesan" => "$judul_pesan",
      "isi_pesan" => "$isi_pesan",
      "table" => "$table",
    );

    insert($data);
  }


  // hapus template pesan
  if ( isset( $_POST['id_hapus'] ) )
  {
    $id = $_POST['id_hapus'];
    $stmthps = "DELETE FROM template_pesan WHERE id = $id";
    // var_dump($stmthps);
    $xstmthps = mysqli_query($konek, $stmthps);
  }


  $stmtshow = "SELECT * FROM template_pesan order by id DESC";
  $exec = mysqli_query($konek, $stmtshow);
  
?>

<!-- awal container -->
<div class="container-fluid" id="container_form" style="display: none;">
    <div class="card shadow">
        <div class="card-body">

          <!-- form input -->
          <div class="d-flex justify-content-between">
            <h5 class="card-title fw-semibold mb-4">Forms Input Template Pesan</h5>
            <button type="button" class="btn-close" aria-label="Close" onclick="sembunyikanForm();"></button>
          </div>
          <div class="card">
            <div class="card-body">
              <form action="" method="post">
                <div class="mb-3">
                  <label for="judul_pesan" class="form-label">Judul Pesan</label>
                  <input type="text" name="judul_pesan" class="form-control" id="judul_pesan" aria-describedby="emailHelp">
                </div>
                <div class="mb-3">
                  <label for="isi_pesan" class="form-label">Isi Pesan</label>
                  <textarea name="isi_pesan" id="isi_pesan" cols="30" rows="10" class="form-control">

                  </textarea>
                </div>
                <button type="submit" class="btn btn-success" name="tambah" value="1">Tambah</button>
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
            <button class="btn btn-success btn-sm rounded rounded-pill m-1" onclick="tampilForm();">Tambah Template Pesan</button>
          </div>
          <div class="col-lg-12 d-flex align-items-stretch">
            <div class="card w-100">
              <div class="card-body p-4">
                <h5 class="card-title fw-semibold mb-4">
                  Template Pesan
                </h5>
                <div class="table-responsive">
                  <table class="table text-nowrap mb-0 align-middle">
                    <thead class="text-dark fs-4">
                      <tr>
                        <th class="border-bottom-0">
                          <h6 class="fw-semibold mb-0">#</h6>
                        </th>
                        <th class="border-bottom-0">
                          <h6 class="fw-semibold mb-0">Judul Pesan</h6>
                        </th>
                        <th class="border-bottom-0">
                          <h6 class="fw-semibold mb-0">Isi Pesan</h6>
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
                          <h6 class="fw-semibold mb-0"><?= $i; ?></h6>
                        </td>
                        <td class="border-bottom-0">
                          <h6 class="fw-normal mb-1"><?= $data['judul_pesan']; ?></h6>
                        </td>
                        <td class="border-bottom-0">
                          <div class="accordion" id="accordionExample">
                            <div class="accordion-item">
                              <h2 class="accordion-header">
                                <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne" style="width: 30em;">
                                  lihat detail
                                </button>
                              </h2>
                              <div id="collapseOne" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
                                <div class="accordion-body text-wrap" style="width: 30em;">
                                  <?= $data['isi_pesan']; ?>
                                </div>
                              </div>
                            </div>
                          </div>
                          <!-- <h6 class="mb-0 fw-normal"><?= $data['isi_pesan']; ?></h6> -->
                        </td>
                        <td class="border-bottom-0">
                          <a href="?id=<?= $data['id']; ?>" class="btn btn-sm btn-warning rounded rounded-pill mb-1">edit</a>
                          <form action="" method="post">
                            <input type="hidden" name="id_hapus" value="<?= $data['id']; ?>">
                            <button type="submit"class="btn btn-sm btn-danger rounded rounded-pill mb-1" onclick="return confirm('kamu yakin ?');">
                              hapus
                            </button>
                          </form>
                        </td>
                      </tr>
                      <?php  $i++; }  ?>
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