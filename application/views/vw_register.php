<style>
  .loading-overlay {
    position: fixed;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background-color: rgba(255, 255, 255, 0.8);
    display: flex;
    align-items: center;
    justify-content: center;
    z-index: 9999;
  }

  .loading-spinner {
    text-align: center;
  }

  .loading-spinner i {
    font-size: 24px;
    margin-bottom: 10px;
  }
</style>

<div id="loading" class="loading-overlay" style="display: none;">
  <div class="loading-spinner">
    <i class="fas fa-spinner fa-spin"></i>
    Loading...
  </div>
</div>

<div class="page page-center">
  <div class="container container-normal py-4">
    <div class="row align-items-center g-4">
      <div class="col-lg">
        <div class="container-tight">
          <div class="text-center mb-4">
            <a href="<?= base_url('') ?>" class="navbar-brand navbar-brand-autodark"><img src="<?= base_url('public/template/img/favicon/jmart-removebg-preview.png') ?>" height="36" alt=""></a>
          </div>
          <div class="card card-md">
            <div class="card-body">
              <h2 class="h2 text-center mb-4">Buat Akun Baru</h2>
              <form id="form-register" method="POST" autocomplete="off">
                <div class="mb-2">
                  <label for="wa_member" class="form-label">Nomor Whatsapp</label>
                  <input required type="text" class="form-control" id="wa_member" name="wa_member" placeholder="Nomor Whatsapp. Ex: 0852xxxx" autofocus="">
                </div>
                <div class="mb-2">
                  <label for="username" class="form-label">Username</label>
                  <input required type="text" class="form-control" name="username" id="username" placeholder="Enter your username">
                </div>
                <div class="mb-2">
                  <label for="nomor_induk" class="form-label">Nomor Induk</label>
                  <input required type="text" class="form-control" id="nomor_induk" name="nomor_induk" placeholder="Nomor Induk Karyawan">
                </div>
                <div class="mb-2">
                  <label class="form-label">
                    Password
                  </label>
                  <div class="input-group input-group-flat">
                    <input required name="password" id="password-field" type="password" class="form-control" placeholder="Your password" autocomplete="off">
                    <span class="input-group-text">
                      <a href="#" class="link-secondary" title="Show password" data-bs-toggle="tooltip" id="show-password-toggle"><!-- Download SVG icon from http://tabler-icons.io/i/eye -->
                        <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                          <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                          <path d="M10 12a2 2 0 1 0 4 0a2 2 0 0 0 -4 0" />
                          <path d="M21 12c-2.4 4 -5.4 6 -9 6c-3.6 0 -6.6 -2 -9 -6c2.4 -4 5.4 -6 9 -6c3.6 0 6.6 2 9 6" />
                        </svg>
                      </a>
                    </span>
                  </div>
                </div>
                <div class="mb-3">
                  <label class="form-check">
                    <input type="checkbox" class="form-check-input" />
                    <span class="form-check-label">Agree the <a href="./terms-of-service.html" tabindex="-1">terms and policy</a>.</span>
                  </label>
                </div>
                <div class="form-footer">
                  <button type="submit" class="btn btn-primary w-100">Sign Up</button>
                </div>
              </form>
            </div>
          </div>
          <div class="text-center text-secondary mt-3">
            Sudah punya Akun? <a href="<?= base_url('login') ?>" tabindex="-1">Sign In</a>
          </div>
        </div>
      </div>
      <div class="col-lg d-none d-lg-block">
        <img src="<?= base_url() ?>public/template/img/illustrations/undraw_sign_up_n6im.svg" height="300" class="d-block mx-auto" alt="">
      </div>
    </div>
  </div>
</div>