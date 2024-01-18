<?php 
  session_start();

  // cek apakah yang mengakses halaman ini sudah login
  if($_SESSION['username']==""){
    header("location:../index.php?pesan=gagal");
}


?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Dokter | Dokter Paru-Paru</title>
  <link rel="icon" href="../img/logo1.png" type="image/png">

  <!-- Vendor CSS Files -->
  <link href="../vendor/animate.css/animate.min.css" rel="stylesheet">
  <link href="../vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="../vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="../vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="../vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
  <link href="../vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="../css/style_beranda.css" rel="stylesheet">

  <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">

</head>

<body>

  <!-- ======= Header ======= -->
  <header id="header" class="fixed-top d-flex align-items-center">
    <div class="container d-flex justify-content-between align-items-center">

      <div class="logo">
        <h1><a href="halaman_pasien.php">DIAGNOSA COVID</a></h1>
      </div>

      <nav id="navbar" class="navbar">
        <ul>
          <li><a class="nav-link scrollto active" href="halaman_pasien.php">Beranda</a></li>
          <li><a class="nav-link scrollto" href="about.php">Covid-19</a></li>
          <li><a class="nav-link scrollto" href="halaman_pasien.php">Gejala</a></li>
          <li><a class="nav-link scrollto" href="halaman_pasien.php">Protokol 6M</a></li>
          <li class="dropdown"><a href=""><span>Dokter</span> <i class="bi bi-chevron-down"></i></a>
            <ul>
              <li><a href="dokter_umum.php">Dokter Umum</a></li>
              <li><a href="dokter_paru.php">Dokter Spesialis Paru</a></li>
              <li><a href="dokter_dalam.php">Dokter Spesialis Penyakit Dalam</a></li>
            </ul>
          </li>
          <li><a class="nav-link scrollto" href="halaman_pasien.php">Tentang</a></li>
        </ul>

        <!-- Informasi User -->
        <nav class="navbar">
          <ul>

          <!-- Nav Item - User Information -->
            <li class="dropdown">
              <a href="#">
                <img class="img-profile rounded-circle" src="../img/adminis.png" style="width:30px;">
                <span class="mr-2 d-none d-lg-inline text-gray-600 small">Hai, <?=$_SESSION['username'];?></span>
                <i class="bi bi-chevron-down"></i>
              </a>
                <ul>
                  <li><a class="dropdown-item" href="halaman_operator.php?top=datauser.php">My Account</a></li>
                  <li><a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">Logout</a></li>
                </ul>
            </li>
          </ul>
        </nav>

    </div>
  </header>

  
  <!-- End Header -->
    <section id="about" class="about">

      <!-- covid-19 -->
        <div class="coronata">
          <div class="container">
              <div class="row d_flex grid">
                 <div class="col-md-7">
                    <div class="coronata_img text_align_center">
                       <figure><img src="../img/dokter_paru.png" style="width:700px" data-aos="fade-right"></figure>
                    </div>
                 </div>

                 <div class="col-md-5 oder1">
                    <div class="titlepage text_align_right">
                       <h2 style="color: #830A13" data-aos="fade-left">DOKTER SPESIALIS PARU-PARU</h2>
                       <p data-aos="fade-left">Dokter spesialis paru adalah seorang dokter ahli yang menangani penyakit dan gangguan pada paru-paru dan saluran pernapasan bagian bawah. Penyakit paru adalah salah satu gangguan pernapasan yang paling sering ditemukan. Tugas utama dokter spesialis paru adalah mendiagnosis dan menentukan jenis pengobatan yang tepat untuk berbagai masalah pada sistem pernapasan.
                       </p>
                   
                    </div>
                 </div>
              </div>
          </div>
        </div>

    </section>

      <!-- end covid-19 -->

    
    <!-- ======= Doctors Section ======= -->
    <section id="dokter" class="doctors">
      <div class="container" data-aos="fade-up">

        <div class="section-title">
          <h2 data-aos="fade-up">BIODATA</h2>
        </div>

        <div class="row">
          <?php
            include "koneksi.php";

              $sql = "SELECT user.iduser, user.nama, dokter.lahir, dokter.tgl_lahir,dokter.kelamin, dokter.praktek FROM user INNER JOIN dokter ON user.iduser = dokter.iduser where user.level='dokterparu' order by user.iduser";
              $qry = mysqli_query($koneksi,$sql)  or die ("SQL Error".mysqli_error());
              $no=0;

              while ($data=mysqli_fetch_array($qry)) {
              $no++;

          ?>

          <div class="col-lg-6">
            <div class="member d-flex align-items-start">
              <div class="pic"><img src="../img/icon_dokter.png" class="img-fluid" alt=""></div>
              <div class="member-info">

                <h4><?php echo $data['nama'];?></h4>
                <span>Dokter Umum</span>
                  <p><b>Tempat Lahir   : </b><?php echo $data['lahir'];?></p>
                  <p><b>Tanggal Lahir  : </b><?php echo $data['tgl_lahir'];?></p>
                  <p><b>Jenis Kelamin  : </b><?php echo $data['kelamin'];?></p>
                  <p><b>Tempat Praktek : </b><?php echo $data['praktek'];?></p>
              </div>
            </div>
          </div>

        <?php } ?>

          

    <!-- ======= Team Section ======= -->
    <section id="tentang" class="team section-bg">
      <div class="container" data-aos="fade-up">

      </div>

      </div>
    </section>
    <!-- End Team Section -->


  </main><!-- End #main -->

  <!-- ======= Footer ======= -->
  <footer id="footer">
    <div class="container d-md-flex py-4">
      <div class="me-md-auto text-center text-md-start">
        <div class="copyright">
          &copy; Copyright <strong><span>TAU Team</span></strong>. All Rights Reserved
        </div>
        <div class="credits">
          <!-- All the links in the footer should remain intact. -->
          <!-- You can delete the links only if you purchased the pro version. -->
          <!-- Licensing information: https://bootstrapmade.com/license/ -->
          <!-- Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/medilab-free-medical-bootstrap-theme/ -->
          Designed by <a href="https://bootstrapmade.com/">BootstrapMade</a>
        </div>
      </div>
      <div class="social-links text-center text-md-right pt-3 pt-md-0">
        <a href="#" class="twitter"><i class="bx bxl-twitter"></i></a>
        <a href="#" class="facebook"><i class="bx bxl-facebook"></i></a>
        <a href="#" class="instagram"><i class="bx bxl-instagram"></i></a>
        <a href="#" class="google-plus"><i class="bx bxl-skype"></i></a>
        <a href="#" class="linkedin"><i class="bx bxl-linkedin"></i></a>
      </div>
    </div>
  </footer><!-- End Footer -->

  <!-- Scroll to Top Button-->
  <a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
  </a>

  <!-- Logout Modal-->
  <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          Logout 
        </div>
        <div class="modal-body">Apakah yakin anda akan keluar dari Sistem ?</div>
        <div class="modal-footer">
          <button class="btn btn-secondary" type="button" data-dismiss="modal">Batal</button>
          <a class="btn btn-primary" href="../logout.php">Logout</a>
        </div>
      </div>
    </div>
  </div>

  <!-- Bootstrap core JavaScript -->

  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files -->
  <script src="../vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="../vendor/glightbox/js/glightbox.min.js"></script>
  <script src="../vendor/isotope-layout/isotope.pkgd.min.js"></script>
  <script src="../vendor/php-email-form/validate.js"></script>
  <script src="../vendor/swiper/swiper-bundle.min.js"></script>
  
  <!-- Bootstrap core JavaScript-->
  <script src="../vend/jquery/jquery.min.js"></script>
  <script src="../vend/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="../vend/jquery-easing/jquery.easing.min.js"></script>

  <!-- Custom scripts for all pages-->
  <script src="../js/spj.js"></script>

  <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
  <script> AOS.init(); </script>
</body>

</html>