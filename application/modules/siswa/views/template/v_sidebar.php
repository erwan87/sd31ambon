<!-- Sidebar -->
<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">
	<!-- Sidebar - Brand -->
	<a class="sidebar-brand d-flex align-items-center justify-content-center" href="<?= base_url('dashboard'); ?>">
		<div class="sidebar-brand-icon">
			IDS AKADEMIK
		</div>
		<div class="sidebar-brand-text mx-3"></div>
	</a>
	<!-- Divider -->
	<hr class="sidebar-divider my-0">

	<!-- Nav Item - Dashboard Start -->
	<li class="nav-item">
		<a class="nav-link" href="<?= base_url('siswa'); ?>">
			<i class="fas fa-fw fa-home"></i>
			<span>Dashboard</span>
		</a>
	</li>
	<!-- Nav Item - Dashboard End -->

	<!-- Nav Item - Jadwal Start -->
	<li class="nav-item">
		<a class="nav-link" href="<?= base_url('siswa/jadwal'); ?>">
			<i class="fas fa-fw fa-calendar"></i>
			<span>Jadwal</span>
		</a>
	</li>
	<!-- Nav Item - Jadwal End -->

	<!-- Nav Item - Nilai Start -->
	<li class="nav-item">
		<a class="nav-link" href="<?= base_url('siswa/user'); ?>">
			<i class="fas fa-fw fa-book"></i>
			<span>Nilai</span>
		</a>
	</li>
	<!-- Nav Item - Nilai End -->

	<!-- Nav Item - About Start -->
	<li class="nav-item">
		<a class="nav-link" href="<?= base_url('siswa/about'); ?>">
			<i class="fas fa-fw fa-info"></i>
			<span>About</span>
		</a>
	</li>
	<!-- Nav Item - About End -->

	<!-- Divider -->
	<hr class="sidebar-divider d-none d-md-block">
	<!-- Sidebar Toggler (Sidebar) -->
	<div class="text-center d-none d-md-inline">
		<button class="rounded-circle border-0" id="sidebarToggle"></button>
	</div>
</ul>
<!-- End of Sidebar -->