  <!-- Page Wrapper -->
  <div id="wrapper">

    <!-- Sidebar -->
    <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

      <!-- Sidebar - Brand -->
      <a class="sidebar-brand d-flex align-items-center justify-content-center" href="#">
        <div class="sidebar-brand-icon">
			<img src="<?= base_url('assets/img/Logo_UPN.png') ?>" width="30" height="30" alt="">
          <!-- <i class="fas fa-laugh-wink"></i> -->
        </div>
        <div class="sidebar-brand-text mx-3"><?= $login ?></div>
      </a>

      <!-- Divider -->
      <hr class="sidebar-divider my-0">

      <!-- Nav Item - Dashboard -->
      <li class="nav-item">
        <a class="nav-link" href="<?= base_url('admin') ?>">
          <i class="fas fa-fw fa-tachometer-alt"></i>
          <span>Dashboard</span></a>
      </li>

      <!-- Divider -->
      <hr class="sidebar-divider">

      <!-- Heading -->
      <div class="sidebar-heading">
        Interface
      </div>

			<li class="nav-item">
				<a class="nav-link" href="<?= base_url('admin/tambah') ?>">
          <i class="fas fa-fw fa-cog"></i>
          <span>Add User</span>
        </a>
      </li>

      <!-- Nav Item - Pages Collapse Menu -->
      <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
          <i class="fas fa-fw fa-cog"></i>
          <span>Data CBIS</span>
        </a>
        <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">Data :</h6>
            <a class="collapse-item" href="<?= base_url('admin/admin') ?>">Administrator</a>
            <a class="collapse-item" href="<?= base_url('admin/mahasiswa') ?>">Mahasiswa</a>
            <a class="collapse-item" href="<?= base_url('admin/dosen') ?>">Dosen</a>
            <a class="collapse-item" href="<?= base_url('admin/matkul') ?>">Mata Kuliah</a>
          </div>
        </div>
      </li>

      <!-- Nav Item - Utilities Collapse Menu -->
      <li class="nav-item active">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUtilities" aria-expanded="true" aria-controls="collapseUtilities">
          <i class="fas fa-fw fa-wrench"></i>
          <span>Update Data CBIS</span>
        </a>
        <div id="collapseUtilities" class="collapse show" aria-labelledby="headingUtilities" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">Update :</h6>
            <a class="collapse-item" href="<?= base_url('admin/update_admin') ?>">Administrator</a>
            <a class="collapse-item active" href="<?= base_url('admin/update_mahasiswa') ?>">Mahasiswa</a>
            <a class="collapse-item" href="<?= base_url('admin/update_dosen') ?>">Dosen</a>
            <a class="collapse-item" href="<?= base_url('admin/update_matkul') ?>">Mata Kuliah</a>
          </div>
        </div>
      </li>

			<li class="nav-item">
        <a class="nav-link" href="<?= base_url('admin/pilih_semester') ?>">
          <i class="fas fa-fw fa-tachometer-alt"></i>
          <span>Pilih Semester</span></a>
      </li>

      <!-- Divider -->
      <hr class="sidebar-divider d-none d-md-block">

      <!-- Sidebar Toggler (Sidebar) -->
      <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
      </div>

    </ul>
    <!-- End of Sidebar -->
