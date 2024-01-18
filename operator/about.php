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

  <title>Covid-19 | About</title>
  <link rel="icon" href="../img/logo1.png" type="image/png">

  <!-- Vendor CSS Files -->
  <link href="../vendor/animate.css/animate.min.css" rel="stylesheet">
  <link href="../vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="../vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="../vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="../vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
  <link href="../vendor/swiper/swiper-bundle.min.css" rel="stylesheet">
<!-- CSS Animasi -->
  <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="../css/style_beranda.css" rel="stylesheet">
  

</head>

<body>

  <!-- ======= Header ======= -->
  <header id="header" class="fixed-top d-flex align-items-center">
    <div class="container d-flex justify-content-between align-items-center">

      <div class="logo">
        <h1><a href="index.html">DIAGNOSA COVID</a></h1>
      </div>

      <nav id="navbar" class="navbar">
        <ul>
          <li><a class="nav-link scrollto" href="halaman_pasien.php">Beranda</a></li>
          <li><a class="nav-link scrollto active" href="about.php">Covid-19</a></li>
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
  </header><!-- End Header -->  

  <section id="about" class="about">

      <!-- covid-19 -->
        <div class="coronata">
           <div class="container">
              <div class="row d_flex grid">
                 <div class="col-md-7">
                    <div class="coronata_img text_align_center">
                       <figure><img src="../img/corona.png"data-aos="fade-up" data-aos-delay="600"></figure>
                    </div>
                 </div>

                 <div class="col-md-5 oder1">
                    <div class="titlepage text_align_left">
                       <h2 data-aos="fade-down" data-aos-delay="600">Virus Corona, Apakah itu?</h2>
                       <p data-aos="fade-right" data-aos-delay="100">Suatu penyakit menular yang disebabkan oleh virus corona. Sebagian besar orang yang tertular COVID-19 akan mengalami gejala ringan hingga sedang, dan akan pulih tanpa penanganan khusus. Virus ini menyebar melalui mulut ataupun hidung orang yang terinfeksi partikel cairan ini menyebar dengan cepat. Pertama kali diidentifikasi di Wuhan, Cina. Virus COVID-19 adalah virus baru yang terkait dengan keluarga virus yang sama dengan Sindrom Pernafasan Akut Parah (SARS) dan beberapa jenis flu biasa.
                       </p>
                    </div>
                 </div>
              </div>
           </div>
        </div>
    </section>
     <section class="hero-sellection" id="hero"style ="background: url(../img/bg_covid.jpeg);position: relative;
      background-size: cover;background-position: center;">
     <div class="container">
      <div class="row align-items-center">
        <div class="col-12 hero-text-image">
          <div class="row">
            <div class="col-lg-12 text-center text-lg-start">
              <div class="section-title">
                <h2 data-aos="fade-up" style="color: #FFF;">Varian Covid-19</h2>
              </div>
              <p class="mb-5" data-aos="fade-right" data-aos-delay="100" style="color: #FFF;">Dampak dari virus menular covid ini belum juga usai dikarena banyaknya mutasi-mutasi yang ditemukan di berbagai negara. WHO memutuskan memberikan nama-nama baru bagi varian virus corona yang tidak terkait dengan suatu negara, namun masih tetap mudah diingat.

<pre style="color:white;">
  Berikut ini adalah  5 varian virus corona yang berada di indonesia:

  1)  ALPHA 
      Varian virus corona B.1.1.7 sering disebut juga Alpha Varian B.1.1.7 merupakan mutasi dari virus covid-19. Mutasi ini yang pertama
      kali muncul di Inggris pada Desember 2020. Pada awal mengenai varian baru virus corona tersebut menunjukkan potensi peningkatan
      penularan seperti dan rawat inap

  2)  BETA
      Varian virus corona Afrika Selatan B.1.351 disebut juga Beta Virus corona varian B.1.351 pertama kali ditemukan di Teluk Nelson
      Mandela, Afrika Selatan pada Oktober 2020. Dikutip dari Kompas.com (3/5/2021) varian virus corona B.1351 dapat mempengaruhi
      netralisasi beberapa antibody, akan tetapi belum terdeteksi apakah jenis tersebut mampu meningkatkan risiko keparahan penyakit.
      Juru Bicara Vaksinasi Covid-19 Kemenkes Siti Nadia Tarmizi sebelumnya mengatakan diduga varian virus corona Beta ini mempengaruhi
      penurunan efikasi vaksin Covid-19. Varian virus corona Beta ini juga memiliki kemampuan penularan yang lebih cepat dan berpotensi
      mengakibatkan kematian yang tinggi.
 
  3)  GAMMA
      Varian virus mutasi Brasil P.1 disebut juga Gamma Varian P.1 merupakan salah satu mutasi dari virus corona yang ditemukan di
      Brasil. Varian virus corona Gama ini juga sama dengan varian B.1.352 ditemukan lolos dari netralisasi saat diinkubasi dengan
      antibody yang dihasilkan sebagai respon terhadap gelombang pertama pandemi.

  4)  DELTA
      Varian India B.1.617.2 disebut Delta Virus corona varian B.1.617 merupakan varian baru dari mutasi ganda E484Q dan L452R. E484Q
      mirip dengan E484K, yang merupakan mutasi yang terlihat pada varian Afrika Selatan B.13.53 dan pada varian Brasil, P1. Adapun L452R
      juga terdeteksi dalam varian virus California, B.1.429.

  5)  KAPPA
      Varian virus corona Kappa merupakan varian baru yang terdiri dari mutasi ganda. Di India, yang melaporkan lebih dari 2,7 juta kasus
      infeksi, sub-garis keturunan B1617,1 dan B1617,2 ditemukan masing-masing pada 21 persen dan 7 persen dari semua sampel. B1617.1 dan
      B1617.2 terbukti resisten terhadap antibodi Bamlanivimab yang digunakan untuk pengobatan COVID-19, serta "berkurangnya kerentanan
      terhadap antibodi netralisasi" untuk B1617.1.
</pre>
            </div>
            </div>
          </div>
        </div>
      </div>
    </div>

  </section><!-- End Hero -->

      <!-- end covid-19 -->

          <!-- vaksinasi -->
        <div class="coronata">
          <div class="section-title">
            <h2 data-aos="fade-up">Vaksinasi</h2>
          </div>
          <div class="container">
            <div class="row d_flex grid">
              <div class="col-md-6">
                <div class="coronata_img text_align_right">
                  <figure><img src="../img/vaksinn.png" data-aos="fade-right"></figure>
                </div>
              </div>
              <div class="col-md-6 oder1">
                <div class="titlepage text_align_right">
                  <h2 data-aos="fade-up">Mengapa Harus Vaksinasi ?</h2>
                    <p data-aos="fade-left">Vaksinasi digunakan untuk membantu membuat kekebalan tubuh yang digunakan agar melindungi dari infeksi. Paparan penyakit menular seringkali memberikan perlindungan seumur hidup (kekebalan) agar kita tidak tertular penyakit yang sama lagi.Vaksin melatih sistem kekebalan Anda untuk membuat antibodi, sama seperti ketika terpapar penyakit. Namun, karena vaksin hanya mengandung kuman yang mati atau dilemahkan seperti virus atau bakteri, vaksin tidak menyebabkan penyakit atau membuat Anda berisiko mengalami komplikasinya.
                    </p>
                </div>
              </div>
            </div>
          </div>
        </div>
    </section>

      <!-- end covid-19 -->
    <!-- ======= Vaksin Section ======= -->
    <section id="gejala" class="departments"data-aos="fade-right">
      <div class="container">

        <div class="section-title">
          <h2>vaksin corona yang berada di indonesia</h2>
        </div>

        <div class="row">
          <div class="col-lg-3">
            <ul class="nav nav-tabs flex-column">
              <li class="nav-item">
                <a class="nav-link active show" data-bs-toggle="tab" href="#tab-1" style="color:#FF6347">Sinovac</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" data-bs-toggle="tab" href="#tab-2" style="color:#800080">AstraZeneca</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" data-bs-toggle="tab" href="#tab-3" style="color:#40E0D0">Sinopharm</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" data-bs-toggle="tab" href="#tab-4" style="color:#760d12">Moderna</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" data-bs-toggle="tab" href="#tab-5" style="color:#4682B4">Pfizer</a>
              </li>
            </ul>
          </div>
          <div class="col-lg-9 mt-4 mt-lg-0">
            <div class="tab-content">
              <div class="tab-pane active show" id="tab-1">
                <div class="row">
                  <div class="col-lg-8 details order-2 order-lg-1">
                    <h3 style="background-color: #FF6347;">Sinovac</h3>
                    <p>◘ Vaksin Covid-19 dari perusahaan China ini merupakan yang paling pertama tersedia di Indonesia. Vaksin Covid-19 Sinovac dikembangkan dari inactivated virus dan diberikan melalui intramuskular <br><br>
                      <b>◘ Efek Samping: </b>nyeri, iritasi, pembengkakan, nyeri otot, dan demam<br><br>
                    </p>
                  </div>
                  <div class="col-lg-4 text-center order-1 order-lg-2">
                    <img src="../img/vaksin/sinovac.jpg" alt="" class="img-fluid">
                  </div>
                </div>
              </div>
              <div class="tab-pane" id="tab-2">
                <div class="row">
                  <div class="col-lg-8 details order-2 order-lg-1">
                    <h3 style="background-color:#800080">AstraZeneca</h3>
                    <p>◘ Vaksin Covid-19 AstraZeneca ini memiliki platform berupa viral vector (non replicating), dan diberikan dalam dua dosis. Vaksin Covid-19 AstraZeneca diberikan dalam interval yang paling jauh dibandingkan vaksin lainnya di Indonesia, hingga 12 minggu. Vaksin Covid-19 Astrazeneca telah mendapatkan EUA dari Badan Pengawas Obat dan Makanan (BPOM) pada 22 Februari 2021 dengan nomor EUA2158100143A1. Selain itu, vaksin Covid-19 AstraZeneca ini juga diklaim ampuh melawan virus Corona varian Delta dan Kappa.
                      <br><br>
                      <b>◘ Efek Samping:</b> nyeri, kemerahan, gatal, pembengkakan, kelelahan, sakit kepala, meriang, dan mual<br><br>
                    </p>
                  </div>
                  <div class="col-lg-4 text-center order-1 order-lg-2">
                    <img src="../img/vaksin/astra.jpg" alt="" class="img-fluid">
                  </div>
                </div>
              </div>
              <div class="tab-pane" id="tab-3">
                <div class="row">
                  <div class="col-lg-8 details order-2 order-lg-1">
                    <h3 style="background-color: #40E0D0">Sinopharm</h3>
                    <p>◘  Vaksin Covid-19 Sinopharm juga telah mendapatkan izin penggunaan darurat untuk dipakai di Indonesia. Vaksin Covid-19 Sinopharm ini produksi perusahaan farmasi Tiongkok dengan karakter yang mirip dengan Sinovac termasuk dalam hal platform maupun jumlah dosisnya.
                      <br><br>
                      <b>◘ Efek Samping:</b> nyeri atau kemerahan di tempat suntikan, efek samping sistemik berupa sakit kepala, nyeri otot, kelelahan, diare, dan batuk
                    </p>
                  </div>
                  <div class="col-lg-4 text-center order-1 order-lg-2">
                    <img src="../img/vaksin/sinopharm.jpg" alt="" class="img-fluid">
                  </div>
                </div>
              </div>
              <div class="tab-pane" id="tab-4">
                <div class="row">
                  <div class="col-lg-8 details order-2 order-lg-1">
                    <h3 style="background-color:#760d12">Moderna</h3>
                    <p>◘  Vaksin Covid-19 Moderna diproduksi oleh Moderna Incorporation AS, diklaim ampuh melawan varian Delta, Kappa dan Gamma. Selain itu, vaksin Covid-19 Moderna ini dinilai aman untuk orang dengan komorbid alias penyekit penyerta.<br><br>
                      <b>◘ Efek Samping:</b> lemas, sakit kepala, menggigil, demam, dan mual<br><br>
                    </p>
                  </div>
                  <div class="col-lg-4 text-center order-1 order-lg-2">
                    <img src="../img/vaksin/moderna.jpg" alt="" class="img-fluid">
                  </div>
                </div>
              </div>
               <div class="tab-pane" id="tab-5">
                <div class="row">
                  <div class="col-lg-8 details order-2 order-lg-1">
                    <h3 style="background-color:#4682B4">Pfizer</h3>
                    <p>◘ Vaksin Covid-19 Pfizer ini diberikan dalam dosis yang lebih kecil, hanya 0,3 ml dalam satu kali vaksinasi. Namun dibutuhkan dua tahap vaksin untuk mendapatkan perlindungan dari vaksin yang disebut ampuh melawan varian Delta ini.<br><br>
                      <b>◘ Efek Samping:</b> nyeri badan di tempat bekas suntikan, kelelahan, nyeri kepala, nyeri otot, nyeri sendi, dan demam <br><br>
                    </p>
                  </div>
                  <div class="col-lg-4 text-center order-1 order-lg-2">
                    <img src="../img/vaksin/pfizer.jpg" alt="" class="img-fluid">
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>

      </div>
    </section><!-- End Vaksin Section -->


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

   <a href="#" class="back-to-top"><i class="icofont-simple-up"></i></a>

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
 <!-- Animate-->
  <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
   <script>AOS.init();</script>
</body>

</html>