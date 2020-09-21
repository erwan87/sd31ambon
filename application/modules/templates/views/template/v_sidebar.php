<!-- Sidebar -->
<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">
	<!-- Sidebar - Brand -->
	<a class="sidebar-brand d-flex align-items-center justify-content-center" href="<?= base_url('dashboard'); ?>">
		<div class="sidebar-brand-icon">
			SI AKADEMIK
		</div>
		<div class="sidebar-brand-text mx-3"></div>
	</a>
	<!-- Divider -->
	<hr class="sidebar-divider my-0">

	<!-- Nav Item - Dashboard Start -->
	<li class="nav-item">
		<a class="nav-link" href="<?= base_url('dashboard'); ?>">
			<i class="fas fa-fw fa-home"></i>
			<span>Dashboard</span>
		</a>
	</li>
	<!-- Nav Item - Dashboard End -->

	<!-- Nav Item - Guru Start -->
	<li class="nav-item">
		<a class="nav-link" href="<?= base_url('dashboard/guru'); ?>">
			<i class="fas fa-fw fa-user"></i>
			<span>Guru</span>
		</a>
	</li>
	<!-- Nav Item - Guru End -->
	
	<!-- Nav Item - Siswa Start -->
	<li class="nav-item">
		<a class="nav-link" href="<?= base_url('Siswa'); ?>">
			<i class="fas fa-fw fa-users"></i>
			<span>Siswa</span>
		</a>
	</li>
	<!-- Nav Item - Siswa End -->

	<!-- Nav Item - Kelas Start -->
	<li class="nav-item">
		<a class="nav-link" href="<?= base_url('kelas'); ?>">
			<i class="fas fa-fw fa-tachometer-alt"></i>
			<span>Kelas</span>
		</a>
	</li>
	<!-- Nav Item - Kelas End -->

	<!-- Nav Item - Mata Pelajaran Start -->
	<li class="nav-item">
		<a class="nav-link" href="<?= base_url('mapel'); ?>">
			<i class="fa fa-fw fa-book"></i>
			<span>Mata Pelajaran</span>
		</a>
	</li>
	<!-- Nav Item - Mata Pelajaran End -->

	<!-- Nav Item - Jadwal Start -->
	<li class="nav-item">
		<a class="nav-link" href="<?= base_url('jadwal'); ?>">
			<i class="fas fa-fw fa-calendar"></i>
			<span>Jadwal</span>
		</a>
	</li>
	<!-- Nav Item - Jadwal End -->

	<!-- Nav Item - User Start -->
	<li class="nav-item">
		<a class="nav-link" href="<?= base_url('dashboard/user'); ?>">
			<i class="fas fa-fw fa-user-circle"></i>
			<span>User</span>
		</a>
	</li>
	<!-- Nav Item - User End -->

	<!-- Nav Item - About Start -->
	<li class="nav-item">
		<a class="nav-link" href="<?= base_url('about'); ?>">
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