<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Dashboard Admin Tele-blasT</title>
    <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css"
      rel="stylesheet"
      integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9"
      crossorigin="anonymous"
    />
  </head>
  <body>
    <div class="row">
        <!-- menu samping -->
        <div class="col-2 border border-2 p-4">
            <div class="d-flex flex-column border border-2 border-primary p-3">
              <div class="border border-2 border-dark rounded rounded-4 p-2">
                  <h4>Tele_blasT</h4>
              </div>
              <ul>
                <li><a href="index.php" class="text-decoration-none fw-bold">Dashboard</a></li>
                <li><a href="data_group.php" class="text-decoration-none fw-bold">Data Group</a></li>
                <li><a href="template_pesan.php" class="text-decoration-none fw-bold">Template Pesan</a></li>
                <li><a href="bc_pesan.php" class="text-decoration-none fw-bold">Broadcast Pesan</a></li>
              </ul>
            </div>
        </div>

        <!-- Menu utama navbar footer -->
        <div class="col-10 border border-2 border-success p-4">
            <!-- inisialisasi display flex -->
            <div class="d-flex flex-column border border-2 border-warning p-4">
                <div class="border border-2 border-success p-2">Navbar</div>
                <div class="border border-2 border-success p-2 my-2">
                    <form action="" method="post">
                        <label for="group_tele">Pilih Group : </label>
                        <select name="group_tele" id="group_tele">
                            <option value="group1">group1</option>
                            <option value="group2">group2</option>
                            <option value="group3">group3</option>
                        </select> <br>
                        <label for="pesan">Pesan : </label><br>
                        <textarea name="pesan" id="pesan" cols="100" rows="10"></textarea>
                    </form>
                </div>
                <div class="border border-2 border-success p-2">Footer</div>
            </div>
        </div>
    </div>
    <!-- menu samping -->
    <!-- <div class="border border-primary border-2 p-5">
        <p class="bold">menu samping</p>
    </div> -->
    <!-- navbar -->
    <p>NavBar</p>
    <h1>Hello, world!</h1>
    <script
      src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"
      integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm"
      crossorigin="anonymous"
    ></script>
  </body>
</html>
