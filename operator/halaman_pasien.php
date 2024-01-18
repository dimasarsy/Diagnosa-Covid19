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

  <title>Diagnosis Covid | Beranda</title>

  <link rel="icon" href="../img/logo1.png" type="image/png">

  <link href="../vendor/fontawesome-free/css/all.css" rel="stylesheet" type="text/css">

  <!-- Vendor CSS Files -->
  <link href="../vendor/animate.css/animate.min.css" rel="stylesheet">
  <link href="../vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="../vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="../vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="../vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
  <link href="../vendor/swiper/swiper-bundle.min.css" rel="stylesheet">
  <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="../css/style_beranda2.css" rel="stylesheet">
  
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
          <li><a class="nav-link scrollto active" href="#hero">Beranda</a></li>
          <li><a class="nav-link scrollto" href="#covid">Covid-19</a></li>
          <li><a class="nav-link scrollto" href="#gejala">Gejala</a></li>
          <li><a class="nav-link scrollto" href="#protokol">Protokol 6M</a></li>
          <li class="dropdown"><a href="#dokter"><span>Dokter</span> <i class="bi bi-chevron-down"></i></a>
            <ul>
              <li><a href="dokter_umum.php">Dokter Umum</a></li>
              <li><a href="dokter_paru.php">Dokter Spesialis Paru</a></li>
              <li><a href="dokter_dalam.php">Dokter Spesialis Penyakit Dalam</a></li>
            </ul>
          </li>
          <li><a class="nav-link scrollto" href="#tentang">Tentang</a></li>
        </ul>

        <!-- Informasi User -->
        <nav class="navbar">
          <ul>
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


        <a href="#" data-toggle="modal" data-target="#use">
          <i class="fas fa-question-circle"></i>
        </a>

    </div>
  </header><!-- End Header -->

  <!-- ======= Hero Section ======= -->
  <section class="hero-section" id="hero">

    <div class="wave">

      <svg width="100%" height="355px" viewBox="0 0 1920 355" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
        <g id="Page-1" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
          <g id="Apple-TV" transform="translate(0.000000, -402.000000)" fill="#FFFFFF">
            <path d="M0,439.134243 C175.04074,464.89273 327.944386,477.771974 458.710937,477.771974 C654.860765,477.771974 870.645295,442.632362 1205.9828,410.192501 C1429.54114,388.565926 1667.54687,411.092417 1920,477.771974 L1920,757 L1017.15166,757 L0,757 L0,439.134243 Z" id="Path"></path>
          </g>
        </g>
      </svg>

    </div>

    <div class="container">
      <div class="row align-items-center">
        <div class="col-12 hero-text-image">
          <div class="row">

            <div class="col-lg-8 text-center text-lg-start">
              <h1 data-aos="fade-up" data-aos-duration="1600">AYO DIAGNOSA </h1>
              <p class="mb-5" data-aos="fade-right" data-aos-delay="1000">Periksa gejala yang anda alami, apakah anda berpotensi terkena covid-19 atau tidak? Apakah gejala Berat atau Tidak? sehingga dapat ditangani lebih lanjut oleh para profesional. Jaga diri anda dan Keluarga. Kita Sehat bersama.</p>
              <a href="konsultasi_form.php" class="diagnosa">Diagnosa</a>
            </div>
            <div class="col-lg-4 iphone-wrap">
              <img src="../img/phone1.png" alt="Image" class="phone-1" data-aos="fade-left" data-aos-delay="600">
              <img src="../img/phone2.png" alt="Image" class="phone-2" data-aos="fade-right" data-aos-delay="800">
            </div>

          </div>
        </div>
      </div>
    </div>

  </section>
  <!-- End Hero -->


  <!-- ======= About Covid Section ======= -->
  <section id="covid" class="about">
    <div class="coronata">
      <div class="container">
        <div class="row d_flex grid">

          <div class="col-md-7">
            <div class="coronata_img text_align_center">
              <figure><img src="../img/corona.png" data-aos="fade-up" data-aos-delay="600"></figure>
            </div>
          </div>

          <div class="col-md-5 oder1">
            <div class="titlepage text_align_left">
              <h2 data-aos="fade-down" data-aos-delay="300">Coronavirus Apakah itu?</h2>
                <p data-aos="fade-left" data-aos-delay="400">Suatu penyakit menular yang disebabkan oleh virus corona. Sebagian besar orang yang tertular COVID-19 akan mengalami gejala ringan hingga sedang, dan akan pulih tanpa penanganan khusus. [...]</p>
                <a class="read_more" href="about.php"data-aos="fade-up">More Info</a>
            </div>
          </div>

        </div>
      </div>
    </div>
  </section>

  <!-- end covid-19 -->

  <!-- ======= Gejala Section ======= -->
  <section id="gejala" class="departments">
    <div class="container">

      <div class="section-title">
        <h2 data-aos="fade-right">Gejala Covid-19</h2>
        <p data-aos="fade-left">Sebagian besar orang yang tertular COVID-19 akan mengalami gejala ringan hingga sedang bahkan tanpa gejala, dan akan pulih tanpa penanganan khusus. Dan juga gejala sedang hingga berat yang membutuhkan penanganan khusus. Berikut adalah tingkatan gejala covid-19 :</p>
      </div>

      <div class="row" data-aos="fade-right">
        <div class="col-lg-3">
          <ul class="nav nav-tabs flex-column">
            <li class="nav-item">
              <a class="nav-link active show" data-bs-toggle="tab" href="#tab-1" style="color: #00a99e;">Tanpa Gejala</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" data-bs-toggle="tab" href="#tab-2" style="color:#fbb03b">Gejala Ringan</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" data-bs-toggle="tab" href="#tab-3" style="color: #f57854">Gejala Sedang</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" data-bs-toggle="tab" href="#tab-4" style="color:#760d12">Gejala Berat</a>
            </li>
          </ul>
        </div>

        <div class="col-lg-9 mt-4 mt-lg-0">
          <div class="tab-content">
            <div class="tab-pane active show" id="tab-1">
              <div class="row">
                <div class="col-lg-8 details order-2 order-lg-1">
                  <h3 style="background-color: #00a99e;">Tanpa Gejala</h3>
                  <p>
                    <b>◘ Gejala:</b>  Frekuensi napas  sebanyak 12-20 kali per menit dengan saturasi oksigen sama dengan atau lebih dari 95% <br><br>
                    <b>◘ Tempat perawatan:</b> isolasi mandiri/fasilitas isolasi pemerintah <br><br>
                    <b>◘ Terapi/Obat:</b> Vitamin C, D dan zinc <br><br>
                    <b>◘ Lama Perawatan:</b>  10 hari isolasi sejak pengambilan specimen diagnosis konfirmasi
                  </p>
                </div>
                <div class="col-lg-4 text-center order-1 order-lg-2">
                  <img src="../img/gejala1.png" alt="" class="img-fluid">
                </div>
              </div>
            </div>

            <div class="tab-pane" id="tab-2">
              <div class="row">
                <div class="col-lg-8 details order-2 order-lg-1">
                  <h3 style="background-color:#fbb03b">Gejala Ringan</h3>
                  <p>
                    <b>◘ Gejala:</b> Demam, batuk (umumnya batuk kering dan ringanan), fatigue, atau kelelahan ringan, anoreksia, sakit kepala, kehilangan indra penciuman atau anosmia, hilang indra pengecapan atau ageusia, malgia dan nyeri tulang,mnyeri tenggorokan dan pilek, bersin, mual, muntah, nyeri perut, diare, konjungtivitas, kemerahan pada kulit dan atau ada perubahan warna pada jari kaki, 
                    Frekuensi napas 12-20 kali per menit, saturasi kurang lebih atau sama dengan 95 persen<br><br>
                    <b>◘ Tempat perawatan:</b> isolasi pemerintah, isolasi mandiri di rumah bagi yang memenuhi syarat<br><br>
                    <b>◘ Terapi/obat:</b> oseltamivir atau favipiravir, azitromisin, vitamin c, d, zink<br><br>
                    <b>◘ Lama perawatan:</b> 10 hari isolasi sejak timbul gejala dan minimal 3 hari bebas gejala
                  </p>
                </div>

                <div class="col-lg-4 text-center order-1 order-lg-2">
                  <img src="../img/gejala2.jpg" alt="" class="img-fluid">
                </div>
              </div>
            </div>

            <div class="tab-pane" id="tab-3">
              <div class="row">
                <div class="col-lg-8 details order-2 order-lg-1">
                  <h3 style="background-color: #f57854">Gejala Sedang</h3>
                  <p>
                    <b>◘ Gejala:</b> Demam, batuk (umumnya batuk kering dan ringanan), fatigue, atau kelelahan ringan, anoreksia, sakit kepala, kehilangan indra penciuman atau anosmia, hilang indra pengecapan atau ageusia, malgia dan nyeri tulang,mnyeri tenggorokan dan pilek, bersin, mual, muntah, nyeri perut, diare, konjungtivitas, kemerahan pada kulit dan atau ada perubahan warna pada jari kaki
                    Frekuensi napas:  20-30 kali per menit, saturasi oksigen kurang dari 95%, sesak napas tanpa distrees pernapasan<br><br>
                    <b>◘ Tempat perawatan:</b>  RS Lapangan, RS Darurat Covid-19,  RS non rujukan, RS rujukan<br><br>
                    <b>◘ Terapi/obat:</b>  Favipiravir, Remdesivir 200 MgIV, Azitromisin, Kartikosteroid, Vitamin C,D, zink, Antikogulan LMWM/UHV berdasar evaluasi dokter penanggung jawab  (DPJP), pengobatan kormobid bila ada, terapi O2 secara non invasif dengan arus sedang sampai tinggi HFNC <br><br>
                    <b>◘ Lama perawatan:</b> 10 hari isolasai sejak timbul gejala dan minimal 3 hari bebas gejala
                  </p>
                </div>
                <div class="col-lg-4 text-center order-1 order-lg-2">
                  <img src="../img/gejala3.jpg" alt="" class="img-fluid">
                </div>
              </div>
            </div>

            <div class="tab-pane" id="tab-4">
              <div class="row">
                <div class="col-lg-8 details order-2 order-lg-1">
                  <h3 style="background-color:#760d12">Gejala Berat</h3>
                  <p>
                    <b>◘ Gejala:</b> Demam, batuk (umumnya batuk kering dan ringanan), fatigue, atau kelelahan ringan, anoreksia, sakit kepala, kehilangan indra penciuman atau anosmia, hilang indra pengecapan atau ageusia, malgia dan nyeri tulang,mnyeri tenggorokan dan pilek, bersin, mual, muntah, nyeri perut, diare, konjungtivitas, kemerahan pada kulit dan atau ada perubahan warna pada jari kaki
                    Frekuensi napas  lebih dari 30 kali per menit, saturasu kerang dari 95 persebm sesak napas tanpa distress pernapasan<br><br>
                    <b>◘ Kondisi kritis:</b> ARDS/gagal napas, sepsis, syok sepsis, dan multiorgan failure<br><br>
                    <b>◘ Tempat Perawatan:</b> HCU/ICU RS Rujukan<br><br>
                    <b>◘ Terapi:</b>  Favipiravir, Remdesivir 200 MgIV, Azitromisin, Kartikosteroid, Vitamiin C,D, zink, Antikogulan LMWM/UHV berdasar evaluasi dokter penanggung jawab  (DPJP), pengobatan kormobid bila adaa, HFNC/ventilator, terapi tambahan <br><br>
                    <b>◘ Lama Perawatan:</b> sampai dinyatakan sembuh DPJP dengan hasil PCR negatif dan klinis membaik
                  </p>
                </div>
                <div class="col-lg-4 text-center order-1 order-lg-2">
                  <img src="../img/gejala4.jpg" alt="" class="img-fluid">
                </div>
              </div>
            </div>

          </div>
        </div>
      </div>

    </div>
  </section>
  <!-- End Gejala Section -->

  <!-- ======= Diagnosa Kolom Section ======= -->
  <section id="cta" class="cta">
    <div class="container">

      <div class="row">
        <div class="col-lg-9 text-center text-lg-start">
          <h3 data-aos="fade-down" data-aos-easing="linear"data-aos-duration="1000">Ayo Diagnosa Sekarang !!!</h3>
          <p data-aos="fade-up" data-aos-easing="linear"data-aos-duration="1200"> Kami akan memberikan hasil diagnosa terbaik terkait kemungkinan apakah anda terindikasi positif covid-19 atau tidak. Sehingga akan mempermudah anda dalam mendapatkan penanganan lebih lanjut oleh para profesional.</p>
        </div>

        <div class="col-lg-3 cta-btn-container text-center">
          <a class="cta-btn align-middle" href="konsultasi_form.php">Diagnosa</a>
        </div>
      </div>

    </div>
  </section>

  <!-- End Diagnosa Kolom Section -->

  <!-- ======= Protokol 5M Section ======= -->

  <section id="protokol" class="departments">
    <div class="container">
      <div class="section-title">
        <h2 data-aos="fade-right">Protokol Kesehatan 6M</h2>
        <p data-aos="fade-left"> Sehubungan dengan himbauan pemerintah terkait dengan pencegahan covid-19, maka kita harus selalu menjaga diri dan patuh dalam meaksanakan 6M. Selalu terapkan protokol kesehatan 6M di masa pandemi ini. Apa sajakah itu?</p>
      </div>
    </div>

    <div id="carouselExampleDark" class="carousel carousel-dark slide" data-bs-ride="carousel">
      <div class="carousel-indicators">
        <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
        <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="1" aria-label="Slide 2"></button>
        <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="2" aria-label="Slide 3"></button>
        <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="3" aria-label="Slide 4"></button>
        <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="4" aria-label="Slide 5"></button>
        <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="5" aria-label="Slide 6"></button>
      </div>
      
      <div class="carousel-inner">
        <div class="carousel-item active" data-bs-interval="2000">
          <img src="../img/bg-pro1.jpg" class="d-block w-100" alt="...">
          <div class="carousel-caption d-none d-md-block">
            <div class="icon-box">
              <div class="icon"><i><img src="../img/prot1.png"></i></div>
                <h4 class="title">Memakai Masker </h4>
                <p class="description">Protokol kesehatan 6M yang pertama yaitu menggunakan masker dengan cara yang benar. Gunakanlah 2 masker sekaligus untuk lebih mencegah penularan Covid-19. Pastikan hidung dan mulut tertutup serta tidak longgar ya Moms. Jangan juga turunkan masker ke leher.</p>
            </div>
          </div>
        </div>

        <div class="carousel-item" data-bs-interval="2000">
          <img src="../img/bg-pro2.jpg" class="d-block w-100" alt="...">
          <div class="carousel-caption d-none d-md-block">
            <div class="icon-box">
              <div class="icon"><i><img src="../img/prot2.png"></i></div>
                <h4 class="title">Mencuci tangan dengan sabun</h4>
                <p>Protokol kesehtan 6M yang pertama yaitu mencuci tangan dengan sabun untuk mengurangi potensi terjadinya penularan Covid-19. Dan tentu saja di bawah air yang mengalir. Mencuci tangan pun perlu dilakukan dengan cara yang benar selama 20 detik.</p>
            </div>
          </div>
        </div>

        <div class="carousel-item" data-bs-interval="5000">
          <img src="../img/bg-pro3.jpg" class="d-block w-100" alt="...">
          <div class="carousel-caption d-none d-md-block">
            <div class="icon-box">
              <div class="icon"><i><img src="../img/prot3.png"></i></div>
                <h4 class="title">Menjaga jarak</h4>
                <p>Protokol kesehatan 6M yang ketiga yaitu menjaga jarak setidaknya 2 meter dengan orang lain. Sebelum adanya protokol kesehatan 6M, anjuran ini sudah ada sejak awal pandemi dan perlu Moms lakukan hingga saat ini ya.</p>
            </div>
          </div>
        </div>

        <div class="carousel-item" data-bs-interval="5000">
          <img src="../img/bg-pro4.jpg" class="d-block w-100" alt="...">
          <div class="carousel-caption d-none d-md-block">
            <div class="icon-box">
              <div class="icon"><i><img src="../img/prot4.png"></i></div>
                <h4 class="title">Menghindari Keramaian</h4>
                <p>Mengingat perlu jaga jarak, maka Moms juga perlu menghindari keramaian yang menjadi protokol kesehatan 6M yang keempat. Ketika di keramaian, Moms tidak tahu orang asing yang ada di samping apakah memiliki virus atau tidak.</p>
            </div>
          </div>
        </div>

        <div class="carousel-item" data-bs-interval="5000">
          <img src="../img/bg-pro5.jpg" class="d-block w-100" alt="...">
          <div class="carousel-caption d-none d-md-block">
            <div class="icon-box">
              <div class="icon"><i><img src="../img/prot5.png"></i></div>
                <h4 class="title">Menghindari makan bersama</h4>
                <p>Perlu menghindari makan bersama apalagi kalau sambil saling berbicara satu sama lain. Ketika makan pasti Moms akan membuka masker kemudian saling berbicara dikhawatirkan terjadi perpindahan droplet.</p>
            </div>  
          </div>
        </div>

        <div class="carousel-item" data-bs-interval="5000">
          <img src="../img/bg-pro6.jpg" class="d-block w-100" alt="...">
          <div class="carousel-caption d-none d-md-block">
            <div class="icon-box">
              <div class="icon"><i><img src="../img/prot6.png"></i></div>
                <h4 class="title">Mengurangi mobilitas</h4>
                <p>Protokol kesehatan 6M yang terakhir yaitu mengurangi mobilitas yang artinya di rumah saja. Saat ini banyak kantor yang merapkan WFH atau work from home, kemudian pembelian makanan sudah bisa secara digial, dan sekolah pun secara daring. Pastikan keluar rumah hanya dalam keadaan darurat saja ya Moms. </p>
            </div>
          </div>
        </div>

        </div>
          <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleDark" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
          </button>
          <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleDark" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
          </button>
        </div>

    </section>
    <!-- End Protokol 5M Section -->

    <!-- ======= Doctors Section ======= -->
    <section id="dokter" class="doctors">
      <div class="container">

        <div class="section-title">
          <h2 data-aos="fade-left">Dokter</h2>
          <p data-aos="fade-right">Dibawah ini merupakan data dokter yang bertugas dalam penanganan covid-19. para dokter yang terlibat yaitu diantaranya ada dokter umum, dokter spesialis penyakit dalam, dan dokter spesialis paru-paru.</p>
        </div>

        <div class="row" data-aos="fade-up">

          <div class="col-lg-4"><a href="dokter_umum.php">
            <div class="member d-flex align-items-start">
              <div class="pic"><img src="../img/umum.png" class="img-fluid" alt=""></div>
              <div class="member-info" >
                <h4>Dokter Umum</h4>      
              </div>
            </div>
          </div></a>

          <div class="col-lg-4" ><a href="dokter_paru.php">
            <div class="member d-flex align-items-start">
              <div class="pic"><img src="../img/paru.png" class="img-fluid" alt=""></div>
              <div class="member-info" >
                <h4>Dokter Paru-Paru</h4>      
              </div>
            </div>
          </div></a>

          <div class="col-lg-4"><a href="dokter_dalam.php">
            <div class="member d-flex align-items-start">
              <div class="pic"><img src="../img/dalam.png" class="img-fluid" alt=""></div>
              <div class="member-info" >
                <h4>Dokter Penyakit Dalam</h4>      
              </div>
            </div></a>

          </div>
        </div>
      </div>
    </section>
     <!-- End Dokter Section -->

    <!-- ======= Team Section ======= -->
    <section id="tentang" class="team section-bg">
      <div class="container" data-aos="fade-up">

        <div class="section-title">
          <h2 data-aos="fade-right">Tentang</h2>
          <h3 data-aos="fade-left">Web Developer <span>Team</span></h3>
          <p data-aos="fade-right">Anggota tim merupakan mahasiswa dari Tanri Abeng Universitas. tergabung dalaam tim yang dinamakan TAU-IS-IE. Berikut adalah data lengkapnya :</p>
        </div>

        <div class="row">

          <div class="col-lg-4 col-md-6 d-flex align-items-stretch" data-aos="fade-up" data-aos-delay="100">
            <div class="member">
              <div class="member-img">
                <img src="../img/team/rafi1.jpg" class="img-fluid" alt="">
                <div class="social-team">
                  <a href=""><i class="bi bi-twitter"></i></a>
                  <a href=""><i class="bi bi-facebook"></i></a>
                  <a href=""><i class="bi bi-instagram"></i></a>
                  <a href=""><i class="bi bi-linkedin"></i></a>
                </div>
              </div>  
              <div class="member-info">
                <h4>Rafi Irham</h4>
                <hr>
                <span>Leader</span>
                <span>Information System | 2019</span>
              </div>
            </div>
          </div>

          <div class="col-lg-4 col-md-6 d-flex align-items-stretch" data-aos="fade-up" data-aos-delay="200">
            <div class="member">
              <div class="member-img">
                <img src="../img/team/dimas2.jpg" class="img-fluid" alt="">
                <div class="social-team">
                  <a href=""><i class="bi bi-twitter"></i></a>
                  <a href=""><i class="bi bi-facebook"></i></a>
                  <a href=""><i class="bi bi-instagram"></i></a>
                  <a href="https://www.linkedin.com/in/muhammad-dimas/"><i class="bi bi-linkedin"></i></a>
                </div>
              </div>
              <div class="member-info">
                <h4>Muhammad Dimas Arya</h4>
                <hr>
                <span>Staff</span>
                <span>Information System | 2019</span>
              </div>
            </div>
          </div>

          <div class="col-lg-4 col-md-6 d-flex align-items-stretch" data-aos="fade-up" data-aos-delay="300">
            <div class="member">
              <div class="member-img">
                <img src="../img/team/anjar1.jpg" class="img-fluid" alt="">
                <div class="social-team">
                  <a href=""><i class="bi bi-twitter"></i></a>
                  <a href=""><i class="bi bi-facebook"></i></a>
                  <a href=""><i class="bi bi-instagram"></i></a>
                  <a href=""><i class="bi bi-linkedin"></i></a>
                </div>
              </div>
              <div class="member-info">
                <h4>Anjar Setiawan</h4>
                <hr>
                <span>Staff</span>
                <span>Informatics Engineering | 2019</span>
              </div>
            </div>
          </div>


        </div>

      </div>
    </section><!-- End Team Section -->


  </main><!-- End #main -->

  <!-- ======= Footer ======= -->
  <footer id="footer">
    <div class="container d-md-flex py-4">
      <div class="me-md-auto text-center text-md-start">
        <div class="copyright">
          &copy; Copyright <strong><span>TAU Team</span></strong>. All Rights Reserved
        </div>
        <div class="credits">

          Designed by TAU-IS-IE
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
  </footer>
  <!-- End Footer -->

  <!-- Scroll to Top Button-->
  <a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
  </a>

  <!-- ======== Logout Modal =========== -->
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

  <!-- Modal Use -->
  <div class="modal fade" id="use" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document" >
      <div class="modal-content">
        <div class="modal-header" style="color: blue;">
          <b>📖 Petunjuk Penggunaan :</b>
        </div>
        <div class="modal-body">
          <h5 align="center">Selamat Datang di Website Diagnosa Covid-19</h5>
          <hr>
          ✥ Anda Dapat menjelajahi setiap fitur yang terdapat dalam website ini. Gali Informasi tentang covid di Halaman ini.<br><br>
          ✥ Jika anda ingin melakukan Diagnosa Covid-19, Silahkan klik Tombol "Diagnosa". Dan Ikuti langkah selanjutnya. <br><br>
          ✥ Masukan Biodata > Lakukan Skrining Awal > (Jika terconfirm Positif Covid) > Lanjut Diagnosa Covid-19.<br><br>
          ✥ Anda akan diarahkan untuk memilih dokter sesuai gejala yang anda alami, dokter rujukan akan menghubungi anda <br><br>
          ✥ Perhatikan setiap petunjuk untuk hasil analisis lebih maksimal
        </div>
        
        <div class="modal-footer">
          <button class="btn btn-secondary" type="button" data-dismiss="modal">Tutup</button>
        </div>
      </div>
    </div>
  </div>


  <!-- Bootstrap core JavaScript -->

  <a href="#" class="back-to-top d-flex align-items-center justify-content-center">   <i class="bi bi-arrow-up-short"></i>
  </a>

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