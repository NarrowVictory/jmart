<style>
  .bg-menu-theme .menu-sub > .menu-item > .menu-link:before {
    background-color: #b4bdc6 !important;
}
</style>

<aside id="layout-menu" class="layout-menu menu-vertical menu bg-menu-theme">
  <div class="app-brand demo ">
    <a href="<?= base_url('home') ?>" class="app-brand-link">
      <span class="app-brand-logo demo">
        <img src="<?= base_url('public/template/img/favicon/jmart.jpg') ?>" alt="" style="height: 28px;width: auto;">
      </span>
      <!-- <span class="app-brand-text demo menu-text fw-bolder ms-2">Sneat</span> -->
    </a>

    <a href="javascript:void(0);" class="layout-menu-toggle menu-link text-large ms-auto d-block d-xl-none">
      <i class="bx bx-chevron-left bx-sm align-middle"></i>
    </a>
  </div>

  <div class="menu-inner-shadow"></div>

  

  <ul class="menu-inner py-1">

    <!-- Dashboard -->
    <li class="menu-item <?= ($this->uri->segment(1) == "home") ? 'active' : '';  ?>">
      <a href="<?= base_url('home') ?>" class="menu-link">
        <i class="menu-icon tf-icons bx bx-home-circle"></i>
        <div data-i18n="Analytics">Beranda</div>
      </a>
    </li>

    <!-- Layouts -->
    <li class="menu-item
    <?= ($this->uri->segment(1) == "provinsi") ? 'active open' : '';  ?>
    <?= ($this->uri->segment(1) == "kabupaten") ? 'active open' : '';  ?>
    <?= ($this->uri->segment(1) == "kecamatan") ? 'active open' : '';  ?>
    <?= ($this->uri->segment(1) == "desa") ? 'active open' : '';  ?>
    ">
      <a href="javascript:void(0);" class="menu-link menu-toggle">
        <i class="menu-icon tf-icons bx bx-globe"></i>
        <div data-i18n="Layouts">Data Wilayah</div>
      </a>

      <ul class="menu-sub">
        <li class="menu-item <?= ($this->uri->segment(1) == "provinsi") ? 'active' : '';  ?>">
          <a href="<?= base_url('provinsi') ?>" class="menu-link">
            <div data-i18n="Without menu">Data Provinsi</div>
          </a>
        </li>
        <li class="menu-item <?= ($this->uri->segment(1) == "kabupaten") ? 'active' : '';  ?>">
          <a href="<?= base_url('kabupaten') ?>" class="menu-link">
            <div data-i18n="Without navbar">Data Kabupaten</div>
          </a>
        </li>
        <li class="menu-item <?= ($this->uri->segment(1) == "kecamatan") ? 'active' : '';  ?>">
          <a href="<?= base_url('kecamatan') ?>" class="menu-link">
            <div data-i18n="Container">Data Kecamatan</div>
          </a>
        </li>
        <li class="menu-item <?= ($this->uri->segment(1) == "desa") ? 'active' : '';  ?>">
          <a href="<?= base_url('desa') ?>" class="menu-link">
            <div data-i18n="Fluid">Data Desa</div>
          </a>
        </li>
      </ul>
    </li>

    <li class="menu-item
    <?= ($this->uri->segment(1) == "kategori") ? 'active open' : '';  ?>
    <?= ($this->uri->segment(1) == "satuan") ? 'active open' : '';  ?>
    <?= ($this->uri->segment(1) == "supplier") ? 'active open' : '';  ?>
    <?= ($this->uri->segment(1) == "barang") ? 'active open' : '';  ?>
    <?= ($this->uri->segment(1) == "user") ? 'active open' : '';  ?>
    ">
      <a href="javascript:void(0);" class="menu-link menu-toggle">
        <i class="menu-icon tf-icons bx bxs-data"></i>
        <div data-i18n="Layouts">Data Master</div>
      </a>

      <ul class="menu-sub">

        <li class="menu-item <?= ($this->uri->segment(1) == "kategori") ? 'active' : '';  ?>">
          <a href="<?= base_url('kategori') ?>" class="menu-link">
            <div data-i18n="Without menu">Data Kategori</div>
          </a>
        </li>
        <li class="menu-item <?= ($this->uri->segment(1) == "satuan") ? 'active' : '';  ?>">
          <a href="<?= base_url('satuan') ?>" class="menu-link">
            <div data-i18n="Without navbar">Data Satuan</div>
          </a>
        </li>
        <li class="menu-item <?= ($this->uri->segment(1) == "supplier") ? 'active' : '';  ?>">
          <a href="<?= base_url('supplier') ?>" class="menu-link">
            <div data-i18n="Container">Data Supplier</div>
          </a>
        </li>
        <li class="menu-item <?= ($this->uri->segment(1) == "barang") ? 'active' : '';  ?>">
          <a href="<?= base_url('barang') ?>" class="menu-link">
            <div data-i18n="Fluid">Data Barang</div>
          </a>
        </li>
        <li class="menu-item">
          <a href="layouts-fluid.html" class="menu-link">
            <div data-i18n="Fluid">Data Member</div>
          </a>
        </li>
      </ul>
    </li>

    <li class="menu-header small text-uppercase">
      <span class="menu-header-text">Manajemen Barang</span>
    </li>
    <li class="menu-item <?= ($this->uri->segment(1) == "barang_masuk") ? 'active' : '';  ?>">
      <a href="<?= base_url('barang_masuk') ?>" class="menu-link">
        <i class='menu-icon tf-icons bx bx-cart'></i>
        <div data-i18n="Basic">Barang Masuk</div>
      </a>
    </li>
    <li class="menu-item">
      <a href="cards-basic.html" class="menu-link">
        <i class="menu-icon tf-icons bx bx-collection"></i>
        <div data-i18n="Basic">Barang R/H/U</div>
      </a>
    </li>
    <li class="menu-item">
      <a href="cards-basic.html" class="menu-link">
        <i class="menu-icon tf-icons bx bx-collection"></i>
        <div data-i18n="Basic">Kasir</div>
      </a>
    </li>
    <li class="menu-item
    <?= ($this->uri->segment(1) == "pesanan") ? 'active open' : '';  ?>
    ">
      <a href="javascript:void(0);" class="menu-link menu-toggle">
        <i class="menu-icon tf-icons bx bx-cart-alt"></i>
        <div data-i18n="Account Settings">Order</div>
      </a>
      <ul class="menu-sub">
        <li class="menu-item <?= ($this->uri->segment(1) == "pesanan") ? 'active' : '';  ?>">
            <a href="<?= base_url('pesanan/all') ?>" class="menu-link">
              <div class="col-6">
                <div data-i18n="Connections">*All</div>
              </div>
              <div class="col-6 justify-content-end text-end float-end">
                <span id="count" class="badge bg-secondary justify-content-end text-end float-end">1</span>
              </div>
            </a>
        </li>

        <li class="menu-item">
          <a href="<?= base_url('pesanan/pending') ?>" class="menu-link">
              <div class="col-6">
                <div data-i18n="Connections">*Pending</div>
              </div>
              <div class="col-6 justify-content-end text-end float-end">
                <span id="count" class="badge bg-danger justify-content-end text-end float-end">0</span>
              </div>
            </a>
        </li>
        <li class="menu-item">
          <a href="pages-account-settings-connections.html" class="menu-link">
            <div class="col-6">
                <div data-i18n="Connections">*Disiapkan</div>
              </div>
              <div class="col-6 justify-content-end text-end float-end">
                <span id="count" class="badge bg-info justify-content-end text-end float-end">0</span>
              </div>
          </a>
        </li>
        <li class="menu-item">
          <a href="pages-account-settings-connections.html" class="menu-link">
            <div class="col-6">
                <div data-i18n="Connections">*Dikirim</div>
              </div>
              <div class="col-6 justify-content-end text-end float-end">
                <span id="count" class="badge bg-primary justify-content-end text-end float-end">0</span>
              </div>
          </a>
        </li>
        <li class="menu-item">
          <a href="pages-account-settings-connections.html" class="menu-link">
            <div class="col-6">
                <div data-i18n="Connections">*Selesai</div>
              </div>
              <div class="col-6 justify-content-end text-end float-end">
                <span id="count" class="badge bg-success justify-content-end text-end float-end">0</span>
              </div>
          </a>
        </li>
        <li class="menu-item">
          <a href="pages-account-settings-connections.html" class="menu-link">
            <div class="col-6">
                <div data-i18n="Connections">*Dibatalkan</div>
              </div>
              <div class="col-6 justify-content-end text-end float-end">
                <span id="count" class="badge bg-warning justify-content-end text-end float-end">0</span>
              </div>
          </a>
        </li>
        <li class="menu-item">
          <a href="pages-account-settings-connections.html" class="menu-link">
            <div class="col-6">
                <div data-i18n="Connections">*Autodebet</div>
              </div>
              <div class="col-6 justify-content-end text-end float-end">
                <span id="count" class="badge bg-danger justify-content-end text-end float-end">0</span>
              </div>
          </a>
        </li>
      </ul>
    </li>

    <li class="menu-item">
      <a href="tables-basic.html" class="menu-link">
        <i class="menu-icon tf-icons bx bx-table"></i>
        <div data-i18n="Tables">Tables</div>
      </a>
    </li>
    <!-- Misc -->
    <li class="menu-header small text-uppercase"><span class="menu-header-text">Misc</span></li>
    <li class="menu-item">
      <a href="https://github.com/themeselection/sneat-html-admin-template-free/issues" target="_blank" class="menu-link">
        <i class="menu-icon tf-icons bx bx-support"></i>
        <div data-i18n="Support">Akuntansi</div>
      </a>
    </li>
    <li class="menu-item">
      <a href="https://themeselection.com/demo/sneat-bootstrap-html-admin-template/documentation/" target="_blank" class="menu-link">
        <i class="menu-icon tf-icons bx bx-file"></i>
        <div data-i18n="Documentation">Laporan</div>
      </a>
    </li>
  </ul>

</aside>
<!-- / Menu -->