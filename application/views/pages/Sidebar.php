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


      <!-- Query Menu -->
      <?php
      $role_id = $this->session->userdata('role_id');
      $queryMenu = "SELECT `tbl_user_menu`.`id`, `menu` 
      FROM `tbl_user_menu` 
      JOIN `tbl_user_access_menu` on `tbl_user_menu`.`id` = `tbl_user_access_menu`.`menu_id` 
      WHERE `tbl_user_access_menu`.`role_id` = $role_id 
      ORDER BY `tbl_user_access_menu`.`menu_id` ASC";

      $menu = $this->db->query($queryMenu)->result_array();
      ?>


      <!-- Looping Menu -->
      <?php foreach ($menu as $m) : ?>
        <li class="nav-header">
          <?= $m['menu'] ?>
        </li>


        <!-- Siapkan Sub Menu sesuai Menu -->
        <?php
        $menuId = $m['id'];
        $querySubMenu = "SELECT * 
        FROM `tbl_user_sub_menu` 
        JOIN `tbl_user_menu` 
        ON `tbl_user_sub_menu`.`menu_id` = `tbl_user_menu`.`id` 
        WHERE `tbl_user_sub_menu`.`menu_id` = $menuId 
        AND `tbl_user_sub_menu`.`is_active` = 1 ";

        $subMenu = $this->db->query($querySubMenu)->result_array();
        ?>

        <?php foreach ($subMenu as $sm) : ?>
          <?php if ($title == $sm['title']) : ?>
            <li class="nav-item active">
            <?php else : ?>
            <li class="nav-item">
            <?php endif ?>
            <a href="<?= base_url($sm['url']) ?>" class="nav-link pb-0">
              <i class="<?= $sm['icon'] ?>"></i>
              <span>
                <?= $sm['title'] ?>
              </span>
            </a>
            </li>
          <?php endforeach ?>

        <?php endforeach ?>


        <!-- <li class="nav-header">EXAMPLES</li>
        <li class="nav-item">
          <a href="CApoteker" class="nav-link">
            <i class="nav-icon fas fa-tachometer-alt"></i>
            <p>
              My Profile
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
              <a href="<?= base_url('CObat') ?>" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Obat</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="<?= base_url('CJenis') ?>" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Jenis</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="<?= base_url('CSatuan') ?>" class="nav-link">
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
              <a href="<?= base_url('CObatProses/masuk_index') ?>" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Obat Masuk</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="<?= base_url('CObatProses/keluar_index') ?>" class="nav-link">
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
          <a href="<?= base_url('CPasien') ?>" class="nav-link">
            <i class="nav-icon fas fa-tachometer-alt"></i>
            <p>
              Pasien
            </p>
          </a>
        </li>
        <li class="nav-item"> -->
    </ul>
  </nav>
  <!-- /.sidebar-menu -->
  </div>
  <!-- /.sidebar -->
</aside>