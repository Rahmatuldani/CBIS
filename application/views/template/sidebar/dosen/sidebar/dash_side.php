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
  		<li class="nav-item active">
  			<a class="nav-link" href="<?= base_url('dosen') ?>">
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
  			<a class="nav-link" href="<?= base_url('dosen/pilih_matkul') ?>">
  				<i class="fas fa-fw fa-cog"></i>
  				<span>Pilih Matkul</span>
  			</a>
  		</li>

  		<li class="nav-item">
  			<a class="nav-link" href="<?= base_url('dosen/tampil_matkul') ?>">
  				<i class="fas fa-fw fa-cog"></i>
  				<span>Tampil Matkul</span>
  			</a>
  		</li>

		  <li class="nav-item">
  			<a class="nav-link" href="<?= base_url('dosen/tampil_jadwal') ?>">
  				<i class="fas fa-fw fa-cog"></i>
  				<span>Jadwal</span>
  			</a>
  		</li>

  		<!-- Divider -->
  		<hr class="sidebar-divider d-none d-md-block">

  		<!-- Sidebar Toggler (Sidebar) -->
  		<div class="text-center d-none d-md-inline">
  			<button class="rounded-circle border-0" id="sidebarToggle"></button>
  		</div>

  	</ul>
  	<!-- End of Sidebar -->
