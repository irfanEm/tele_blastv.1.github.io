<?php
  if (isset($_POST['tambah']))
  {
    $nama_group = $_POST['nama_group'] ? $_POST['nama_group'] : '';
    $id_group = $_POST['id_group'] ? $_POST['id_group'] : '';
    $username_group = $_POST['username_group'] ? $_POST['username_group'] : '';
    var_dump($nama_group, $id_group, $username_group);
  }
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
                <button type="submit" name="tambah" class="btn btn-success">Tambah</button>
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
          <div class="d-flex my-2">
            <button class="btn btn-success m-1 justify-content-end me-0" onclick="tampilForm();">Tambah Group</button>
          </div>
          <div class="col-lg-12 d-flex align-items-stretch">
            <div class="card w-100">
              <div class="card-body p-4">
                <h5 class="card-title fw-semibold mb-4">
                  Group Telegram
                </h5>
                <div class="table-responsive">
                  <table class="table text-nowrap mb-0 align-middle">
                    <thead class="text-dark fs-4">
                      <tr>
                        <th class="border-bottom-0">
                          <h6 class="fw-semibold mb-0">Id</h6>
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
                          <div class="d-flex align-items-center gap-2">
                            <span
                              class="badge bg-primary rounded-3 fw-semibold"
                              >Low</span
                            >
                          </div>
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
          <!-- akhir konten utama  -->
        </div>
    </div>
</div>
<!-- akhir container -->