  <?php 
  if ($this->session->flashdata('error') != '') {
    echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">';
    echo $this->session->flashdata('error');
    echo '<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>';
    echo '</div>';
  }
  ?>

  <?php 
  if ($this->session->flashdata('success_register') != '') {
    echo '<div class="alert alert-info alert-dismissible fade show" role="alert">';
    echo $this->session->flashdata('success_register');
    echo '<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>';
    echo '</div>';
  }
  ?>

  <div class="container-xxl">
    <div class="authentication-wrapper authentication-basic container-p-y">
      <div class="authentication-inner">
        <!-- Register -->
        <div class="card">
          <div class="card-body">
            <!-- Logo -->
            <div class="app-brand justify-content-center">
              <a href="index.html" class="app-brand-link gap-2">
                <span class="app-brand-logo demo">
                  <img src="<?= base_url('public/template/img/favicon/jmart.jpg') ?>" alt="" style="height: 30px;width: auto;">
                </span>
              </a>
            </div>
            <!-- /Logo -->
            <h4 class="mb-2">Welcome to J-MART! 👋</h4>
            <p class="mb-4">Masukkan Informasi dibawah ini untuk masuk ke akun Anda.</p>

            <form id="formAuthentication" class="mb-3" action="<?php echo base_url(); ?>login/proses" method="POST">
              <div class="mb-3">
                <label for="email" class="form-label">Email or Username</label>
                <input required type="text" class="form-control" id="username" name="username" placeholder="Enter your email or username" autofocus>
              </div>
              <div class="mb-3 form-password-toggle">
                <div class="d-flex justify-content-between">
                  <label class="form-label" for="password">Password</label>
                  <a href="<?= base_url('forgotten') ?>">
                    <small>Lupa Password?</small>
                  </a>
                </div>
                <div class="input-group input-group-merge">
                  <input required type="password" id="password" class="form-control" name="password" placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;" aria-describedby="password" />
                  <span class="input-group-text cursor-pointer"><i class="bx bx-hide"></i></span>
                </div>
              </div>
              <div class="mb-3">
                <div class="form-check">
                  <input class="form-check-input" type="checkbox" id="remember-me">
                  <label class="form-check-label" for="remember-me">
                    Remember Me
                  </label>
                </div>
              </div>
              <div class="mb-3">
                <button class="btn btn-primary d-grid w-100" type="submit">Sign in</button>
              </div>
            </form>

            <p class="text-center">
              <span>Belum Punya Akun?</span>
              <a href="<?= base_url('register') ?>">
                <span>Daftar Sekarang</span>
              </a>
            </p>
          </div>
        </div>
        <!-- /Register -->
      </div>
    </div>
  </div>
