<!-- Sidebar -->
<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

  <!-- Sidebar - Brand -->
  <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
    <div class="sidebar-brand-icon rotate-n-15">
      <!-- <i class="fas fa-dice-d6"></i> -->
    </div>
    <div class="sidebar-brand-text mx-3">AKN Nganjuk</div>
  </a>

  <!-- Divider -->
  <hr class="sidebar-divider ">

  <!-- query menu, nama menu-->
  <?php
  $role_id = $this->session->userdata('role_id');
  $queryMenu = "SELECT menu.id_menu, menu
                FROM menu JOIN menu_akses 
                ON menu.id_menu = menu_akses.id_menu
                WHERE menu_akses.id_role = $role_id
                ORDER BY menu_akses.id_menu ASC
                ";

  $menu = $this->db->query($queryMenu)->result_array();
  ?>
  <!-- looping menu -->
  <?php foreach ($menu as $m) : ?>
    <!-- Heading -->
    <div class="sidebar-heading">
      <?= $m['menu']; ?>
    </div>



    <!-- siapkan sub-menu sesuai menu -->
    <?php
    $menuId = $m['id_menu'];
    // SELECT * FORM user_sub_menu where menu_id =$menuId AND is_active = 1
    $querySubMenu = "  SELECT *
                  FROM menu_sub JOIN menu
                  ON menu_sub.id_menu = menu.id_menu
                  WHERE menu_sub.id_menu = $menuId
";
    $subMenu = $this->db->query($querySubMenu)->result_array();
    ?>
    <?php foreach ($subMenu as $sm) : ?>
      <!-- Nav Item - Dashboard -->
      <li class="nav-item">
        <a class="nav-link pb-0" href="<?= base_url($sm['url']); ?>">
          <i class="<?= $sm['icon']; ?>"></i>
          <span><?= $sm['judul']; ?></span></a>
      </li>
    <?php endforeach; ?>
    <!-- Divider -->
    <hr class="sidebar-divider mt-3">
  <?php endforeach; ?>
  <li class="nav-item">
    <a class="nav-link" href="" data-toggle="modal" data-target="#logoutModal">
      <i class="fas fa-fw fa-sign-out-alt"></i>
      <span>Logout</span></a>
  </li>

  <!-- Divider -->
  <hr class="sidebar-divider d-none d-md-block">

  <!-- Sidebar Toggler (Sidebar) -->
  <div class="text-center d-none d-md-inline">
    <button class="rounded-circle border-0" id="sidebarToggle"></button>
  </div>

</ul>
<!-- End of Sidebar -->