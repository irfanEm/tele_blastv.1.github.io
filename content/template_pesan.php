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
              <form>
                <div class="mb-3">
                  <label for="judul_pesan" class="form-label">Judul Pesan</label>
                  <input type="email" name="judul_pesan" class="form-control" id="judul_pesan" aria-describedby="emailHelp">
                </div>
                <div class="mb-3">
                  <label for="isi_pesan" class="form-label">Isi Pesan</label>
                  <textarea name="isi_pesan" id="isi_pesan" cols="30" rows="10" class="form-control">

                  </textarea>
                </div>
                <button type="submit" class="btn btn-success">Tambah</button>
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
            <button class="btn btn-success m-1 justify-content-end me-0" onclick="tampilForm();">Tambah Template Pesan</button>
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
                          <h6 class="fw-semibold mb-0">Id</h6>
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