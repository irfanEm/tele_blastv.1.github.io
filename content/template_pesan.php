<?php
  // jika tombol tambah diklik
  if ( isset( $_POST['tambah'] ) && $_POST['tambah'] == 1 )
  {
    $data = array("judul_pesan" => "$_POST[judul_pesan]", "isi_pesan" => "$_POST[isi_pesan]", "table" => "template_pesan");
    tambahData($data);
  }


  // hapus template pesan
  if ( isset( $_POST['id_hapus'] ) )
  {
    $data = array("id" => "$_POST[id_hapus]", "table" => "template_pesan");
    hapusData($data);
  }

  // update data
  if ( isset( $_POST['editData'] ) )
  {
    $data = array("id" => "$_POST[id]", "judul_pesan" => "$_POST[judul_pesan]", "isi_pesan" => "$_POST[isi_pesan]", "table" => "template_pesan");
    $edit = editData($data);
  }
?>

<!-- container pembungkus utama -->
<div class="container-xxl flex-grow-1 container-p-y">

  <!-- modal-input -->
  <div class="col-lg-4 col-md-6">
    <!-- <small class="text-light fw-semibold">Default</small> -->
    <div class="mt-3">
      <!-- Modal Input-->
      <div class="modal fade" id="tambahData" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel1">Forms Input Template Pesan</h5>
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
                  <label for="judul_pesan" class="form-label">Judul Pesan</label>
                  <input type="text" id="judul_pesan" name="judul_pesan" class="form-control" placeholder="Masukan Nama Judul Pesan" />
                </div>
              </div>
              <div class="row g-2">
                <div class="col mb-0">
                  <label for="isi_pesan" class="form-label">Isi Pesan</label>
                  <textarea class="form-control" id="exampleFormControlTextarea1" name="isi_pesan" rows="10"></textarea>
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
        <!-- container -->
          <div class="d-flex justify-content-end my-2">
            <button class="btn btn-success rounded rounded-pill m-2"  data-bs-toggle="modal" data-bs-target="#tambahData">Tambah Template Pesan</button>
          </div>
          <div class="col-lg-12 d-flex align-items-stretch">
            <div class="card w-100">
              <div class="card-body p-4">
                <h5 class="card-title fw-semibold mb-4">
                  Template Pesan
                </h5>
                <div class="table-responsive">
                  <table class="table text-nowrap mb-0 align-middle" id="template_pesan" class="display">
                    <thead class="text-dark fs-4">
                      <tr>
                        <th style="width:5%;" class="border-bottom-0">
                          <h6 class="fw-semibold mb-0">#</h6>
                        </th>
                        <th style="width: 25%;" class="border-bottom-0">
                          <h6 class="fw-semibold mb-0">Judul Pesan</h6>
                        </th>
                        <th style="width: 60%;" class="border-bottom-0">
                          <h6 class="fw-semibold mb-0">Isi Pesan</h6>
                        </th>
                        <th style="width: 10%;" class="border-bottom-0">
                          <h6 class="fw-semibold mb-0">Aksi</h6>
                        </th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php
                        $i = 1;
                        $pesan = getAllPesan();
                        while ( $data = mysqli_fetch_array($pesan) ) {
                      ?>
                      <tr>
                        <td class="border-bottom-0">
                          <h6 class="fw-semibold mb-0"><?= $i; ?></h6>
                        </td>
                        <td class="border-bottom-0">
                          <h6 class="fw-normal mb-1"><?= $data['judul_pesan']; ?></h6>
                        </td>
                        <td class="border-bottom-0">
                          <div class="accordion mt-3" id="accordionExample<?= $i; ?>">
                            <div class="card accordion-item">
                              <h2 class="accordion-header" id="headingOne">
                                <button
                                  type="button"
                                  class="accordion-button"
                                  data-bs-toggle="collapse"
                                  data-bs-target="#accordionOne<?= $i; ?>"
                                  aria-expanded="true"
                                  aria-controls="accordionOne"
                                >
                                  Lihat Detail
                                </button>
                              </h2>

                              <div
                                id="accordionOne<?= $i; ?>"
                                class="accordion-collapse collapse"
                                data-bs-parent="#accordionExample<?= $i; ?>"
                              >
                                <div class="accordion-body">
                                  <?= $data['isi_pesan']; ?>
                                </div>
                              </div>
                            </div>
                          <!-- <h6 class="mb-0 fw-normal"><?= $data['isi_pesan']; ?></h6> -->
                        </td>
                        <td class="border-bottom-0">
                          <a href="?id=<?= $data['id']; ?>" class="btn btn-sm btn-warning rounded rounded-pill mb-1" data-bs-toggle="modal" data-bs-target="#editData<?= $data['id']; ?>">edit</a>
                          <form action="" method="post">
                            <input type="hidden" name="id_hapus" value="<?= $data['id']; ?>">
                            <button type="submit"class="btn btn-sm btn-danger rounded rounded-pill mb-1" onclick="return confirm('kamu yakin ?');">
                              hapus
                            </button>
                          </form>
                        </td>
                      </tr>

                      <!-- modal-input -->
                      <div class="col-lg-4 col-md-6">
                        <!-- <small class="text-light fw-semibold">Default</small> -->
                        <div class="mt-3">
                          <!-- Modal Input-->
                          <div class="modal fade" id="editData<?= $data['id']; ?>" tabindex="-1" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                              <div class="modal-content">
                                <div class="modal-header">
                                  <h5 class="modal-title" id="exampleModalLabel1">Forms Edit Template Pesan</h5>
                                  <button
                                    type="button"
                                    class="btn-close"
                                    data-bs-dismiss="modal"
                                    aria-label="Close"
                                  ></button>
                                </div>
                                <div class="modal-body">
                                <form action="" method="post">
                                  <input type="hidden" name="id" value="<?= $data['id']; ?>">
                                  <?php
                                    $pesanId = getAllPesanId($data['id']);
                                  ?>
                                  <div class="row">
                                    <div class="col mb-3">
                                      <label for="judul_pesan" class="form-label">Judul Pesan</label>
                                      <input type="text" id="judul_pesan" name="judul_pesan" class="form-control" value="<?= $pesanId -> judul_pesan; ?>" />
                                    </div>
                                  </div>
                                  <div class="row g-2">
                                    <div class="col mb-0">
                                      <label for="isi_pesan" class="form-label">Isi Pesan</label>
                                      <textarea class="form-control" id="ubahPesan" name="isi_pesan" rows="10"> <?= $pesanId -> isi_pesan; ?></textarea>
                                    </div>
                                  </div>
                                </div>
                                <div class="modal-footer">
                                  <button type="button" class="btn btn-outline-secondary rounded rounded-pill" data-bs-dismiss="modal">
                                    Close
                                  </button>
                                  <button type="submit" name="editData" id="tombolTambahData" class="btn btn-primary rounded rounded-pill" value="1">Ubah Data</button>
                                </div>
                                </form>
                              </div>
                            </div>
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
          <!-- akhir content utama -->
      </div>
<!-- akhir container -->