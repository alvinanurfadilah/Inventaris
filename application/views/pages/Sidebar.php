  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="" class="brand-link">
      <img src="" alt="" class="" style="opacity: .8">
      <span class="brand-text font-weight-light">KLINIK ALFARMA</span>
    </a>

    <!-- Sidebar Menu -->
    <nav class="mt-2">
      <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
        <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
        <li class="nav-item menu-open">
          <a href="index.php" class="nav-link active">
            <i class="nav-icon fas fa-tachometer-alt"></i>
            <p>
              Dashboard
            </p>
          </a>
        </li>
        <li class="nav-item">
          <a href="#" class="nav-link">
            <i class="nav-icon fas fa-tachometer-alt"></i>
            <p>
              Data Master
              <i class="fas fa-angle-left right"></i>
            </p>
          </a>
          <ul class="nav nav-treeview">
            <li class="nav-item">
              <a href="<?= base_url('') ?>master/Obat.php" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Obat</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="<?= base_url('master/Jenis.php') ?>" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Jenis</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="<?= base_url('') ?>master/Satuan.php" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Satuan</p>
              </a>
            </li>
          </ul>
        </li>
        <li class="nav-item">
          <a href="#" class="nav-link">
            <i class="nav-icon fas fa-tachometer-alt"></i>
            <p>
              Data Transaksi
              <i class="fas fa-angle-left right"></i>
            </p>
          </a>
          <ul class="nav nav-treeview">
            <li class="nav-item">
              <a href="../obatMasuk.php" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Obat Masuk</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="../obatKeluar.php" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Obat Keluar</p>
              </a>
            </li>
          </ul>
        </li>
        <li class="nav-item">
          <a href="../history.php" class="nav-link">
            <i class="nav-icon fas fa-tachometer-alt"></i>
            <p>
              History
            </p>
          </a>
        </li>
        <li class="nav-item">
      </ul>
    </nav>
    <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>