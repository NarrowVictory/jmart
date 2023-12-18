<div class="page page-center">
    <div class="container container-normal py-4">
        <div class="row align-items-center g-4">
            <div class="col-lg">
                <div class="container-tight">
                    <div class="text-center mb-4">
                        <a href="<?= base_url('') ?>" class="navbar-brand navbar-brand-autodark"><img src="<?= base_url('public/template/img/favicon/jmart-removebg-preview.png') ?>" height="36" alt=""></a>
                    </div>
                    <div class="card card-md">
                        <form class="card card-md" action="<?= base_url('forgotten/konfirmasi_password') ?>" method="POST" autocomplete="off">
                            <div class="card-body">
                                <h2 class="card-title text-center mb-4">Ubah password</h2>
                                <div class="mb-3">
                                    <label class="form-label">Password Baru</label>
                                    <input name="password" required type="password" class="form-control" placeholder="Masukkan Password">
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Konfirmasi Password Baru</label>
                                    <input name="password_baru" required type="password" class="form-control" placeholder="Konfirmasi Password">
                                    <input type="hidden" name="access_key_forgotten" id="access_key_forgotten" value="<?= $id ?>">
                                </div>
                                <div class="form-footer">
                                    <button type="submit" class="btn btn-primary w-100">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" style="fill: rgba(255, 255, 255, 1);">
                                            <path d="M3.433 17.325 3.079 19.8a1 1 0 0 0 1.131 1.131l2.475-.354C7.06 20.524 8 18 8 18s.472.405.665.466c.412.13.813-.274.948-.684L10 16.01s.577.292.786.335c.266.055.524-.109.707-.293a.988.988 0 0 0 .241-.391L12 14.01s.675.187.906.214c.263.03.519-.104.707-.293l1.138-1.137a5.502 5.502 0 0 0 5.581-1.338 5.507 5.507 0 0 0 0-7.778 5.507 5.507 0 0 0-7.778 0 5.5 5.5 0 0 0-1.338 5.581l-7.501 7.5a.994.994 0 0 0-.282.566zM18.504 5.506a2.919 2.919 0 0 1 0 4.122l-4.122-4.122a2.919 2.919 0 0 1 4.122 0z"></path>
                                        </svg>
                                        &nbsp;&nbsp;Change my Password
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="text-center text-secondary mt-3">
                        Ingat Sekarang? <a href="<?= base_url('login') ?>" tabindex="-1">Silahkan Login</a>
                    </div>
                </div>
            </div>
            <div class="col-lg d-none d-lg-block">
                <img src="<?= base_url() ?>public/template/img/illustrations/undraw_authentication_re_svpt.svg" height="300" class="d-block mx-auto" alt="">
            </div>
        </div>
    </div>
</div>