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
              <form>
                <div class="mb-3">
                    <label for="pesan" class="form-label">Pilih Pesan</label>
                    <select id="pesan" class="form-select">
                        <option>Pilih Pesan</option>
                        <option>Pesan Contoh 1</option>
                        <option>Pesan Contoh 2</option>
                        <option>Pesan Contoh 3</option>
                    </select>
                </div>
                <div class="mb-3">
                    <label for="pesan" class="form-label">Pilih Group Telegram</label>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" id="group_tele">
                        <label class="form-check-label" for="group_tele">
                        Group Tele 1
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" id="group_tele">
                        <label class="form-check-label" for="group_tele">
                        Group Tele 2
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" id="group_tele">
                        <label class="form-check-label" for="group_tele">
                        Group Tele 3
                        </label>
                    </div>
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
