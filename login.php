    <?php
    
    // require public
    require_once __DIR__ . "/bagian/main_header.php";
    require_once __DIR__ . "/config/koneksi.php";
    require_once __DIR__ . "/config/config.php";
    require_once __DIR__ . "/function/function.php";

      if(isset($_POST['username']) && isset($_POST['password'])) 
      {

        $daber = array_map("sanitize", $_POST);
        $hasil = cekUser($daber);
        // var_dump($hasil);
        if($hasil != null){

          echo "isinya g null nih" . PHP_EOL;
          $login = true;
          $_SESSION["login"] = $login;
          $_SESSION["username"] = $hasil->username;
          var_dump($_SESSION);
          // $_SESSION["login"] = true;
          // var_dump($base_url);
          echo "<script>window.location.replace = '$base_url'; </script>";

        } else {

          echo "isinya null gais" . PHP_EOL;
          $login = false;
          $_SESSION["login"] = $login;
          var_dump($_SESSION);
          // $_SESSION["username"] = "";
          // $_SESSION["login"] = false;

        }

        // var_dump($_SESSION["login"], $_SESSION["username"]);

        // $login = setLogin($hasil); // var_dump($login);

        // $dataLogin = getLogin(); var_dump($dataLogin);

        //var_dump($hasil);
        // var_dump($hasil->username);
        // if ($hasil != null) { var_dump($hasil->username); setLogin($hasil);}
        // var_dump(kirimHasil($hasil));

      }

      // var_dump($_SESSION['login']);

      ?>
    <div class="container-xxl">
      <div class="authentication-wrapper authentication-basic container-p-y">
        <div class="authentication-inner">
          <!-- Register -->
          <div class="card">
            <div class="card-body">
              <!-- Logo -->
              <div class="app-brand justify-content-center">
                <a href="<?= $base_url ?>" class="app-brand-link gap-2">
                  <span class="app-brand-logo demo">
                  </span>
                  <span class="app-brand-text demo text-body fw-bolder text-capitalize">Tele_blasT.v.1</span>
                </a>
              </div>
              <!-- /Logo -->
              <h4 class="mb-2 text-capitalize">selamat datang</h4>
              <p class="mb-4 text-capitalize">silahkan masuk ke akunmu</p>

              <form id="formAuthentication" class="mb-3" action="" method="POST">
                <div class="mb-3">
                  <label for="email" class="form-label">Username</label>
                  <input type="text" class="form-control" id="email" name="username" placeholder="Enter your email or username" autofocus/>
                </div>
                <div class="mb-3 form-password-toggle">
                  <div class="d-flex justify-content-between">
                    <label class="form-label" for="password">Password</label>
                    <a href="auth-forgot-password-basic.html">
                      <small>Forgot Password?</small>
                    </a>
                  </div>
                  <div class="input-group input-group-merge">
                    <input type="password" id="password" class="form-control" name="password" placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;" aria-describedby="password"/>
                    <span class="input-group-text cursor-pointer"><i class="bx bx-hide"></i></span>
                  </div>
                </div>
                <!-- <div class="mb-3">
                  <div class="form-check">
                    <input class="form-check-input" type="checkbox" id="remember-me" />
                    <label class="form-check-label" for="remember-me"> Remember Me </label>
                  </div>
                </div> -->
                <div class="mb-3">
                  <button class="btn btn-primary d-grid w-100" type="submit">Sign in</button>
                </div>
              </form>

            </div>
          </div>
          <!-- /Register -->
        </div>
      </div>
    </div>