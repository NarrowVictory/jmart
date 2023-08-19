<div class="container-xxl">
  <div class="authentication-wrapper authentication-basic container-p-y">
    <div class="authentication-inner py-4">

      <!-- Forgot Password -->
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
          <h4 class="mb-2">Lupa Password? 🔒</h4>
          <p class="mb-4">Jangan Khawatir! Masukkan E-mail atau Nomor HP Anda untuk menerima perubahan kodemu.</p>
          <form id="formAuthentication" class="mb-3" action="index.html" method="POST">
            <div class="mb-3">
              <label for="email" class="form-label">Email</label>
              <input type="text" class="form-control" id="email" name="email" placeholder="Enter your email" autofocus="">
            </div>
            <button class="btn btn-primary d-grid w-100">Kirim Link Reset Password</button>
          </form>
          <div class="text-center">
            <a href="<?= base_url('login') ?>" class="d-flex align-items-center justify-content-center">
              <i class="bx bx-chevron-left scaleX-n1-rtl bx-sm"></i>
              Kembali ke Login
            </a>
          </div>
        </div>
      </div>
      <!-- /Forgot Password -->
    </div>
  </div>
</div>