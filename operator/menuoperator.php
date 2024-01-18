<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

  <!-- Sidebar - Brand -->
  <a class="sidebar-brand d-flex align-items-center justify-content-center" href="halaman_pasien.php">
    <div class="sidebar-brand-icon">
			<img src="../img/logo1.png" width="50" height="50">
    </div>
    <div class="sidebar-brand-text">Diagnosa Covid-19</div>
  </a>

  <!-- ===================================================================== -->
    <li class="nav-item">
      <a class="nav-link" style="color: grey; font-weight: bold;"><span>BIODATA</span></a>
    </li>

  <hr class="sidebar-divider my-0">
    <li class="nav-item">
      <a class="nav-link" href="halaman_operator.php?top=datauser.php">
        <i class="fas fa-user"></i>
        <span>Profil Login</span>
      </a>
    </li>

  <hr class="sidebar-divider my-0">
    <li class="nav-item">
      <a class="nav-link" href="halaman_operator.php?top=datapasien.php">
        <i class="fas fa-hospital-user"></i>
        <span>Data Diri</span>
      </a>
    </li>
    

  <!-- ===================================================================== -->

    <li class="nav-item">
      <a class="nav-link" style="color: grey; font-weight: bold;"><span>HASIL</span></a>
    </li>

	<!-- Nav Item - Tables Laporan Skrining Pasien-->
	<hr class="sidebar-divider my-0">
    <li class="nav-item">
      <a class="nav-link" href="halaman_operator.php?top=dataskrining.php">
        <i class="fas fa-laptop-medical"></i>
        <span>Skrining</span>
      </a>
    </li>

  <!-- Nav Item - Tables Laporan Diagnosa Pasien-->
  <hr class="sidebar-divider my-0">
    <li class="nav-item">
      <a class="nav-link" href="halaman_operator.php?top=datadiagnosa.php">
        <i class="fas fa-diagnoses"></i>
        <span>Diagnosa</span>
      </a>
    </li>

  <!-- Divider -->
  <hr class="sidebar-divider">      

  <!-- Sidebar Toggler (Sidebar) -->
  <div class="text-center d-none d-md-inline">
    <button class="rounded-circle border-0" id="sidebarToggle"></button>
  </div>

</ul>