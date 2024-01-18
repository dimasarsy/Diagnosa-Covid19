<head>
  <title>Dokter | Dashboard</title>
</head>

<div class="d-sm-flex align-items-center justify-content-between mb-4">
  <h1 class="h3 mb-0 text-gray-800"><i class="fas fa-tachometer-alt"></i> Dashboard</h1>
</div>

<div class="row">

  <!-- Earnings (Monthly) Card Example -->
  <div class="col-xl-4 col-md-6 mb-4">
    <div class="card border-left-danger shadow h-100 py-2">
      <div class="card-body">
        <div class="row no-gutters align-items-center">
          <div class="col mr-2">
            <div class="text-xs font-weight-bold text-danger text-uppercase mb-1">Total Pasien Anda</div>
            <div class="row no-gutters align-items-center">
              <div class="col-auto">
                <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800">
                <?php 
                  include "koneksi.php";
                  $id_aut_dokl = $_SESSION['iduser']; 
                  $sql = "SELECT * FROM pasien,diagnosa where diagnosa.id_pasien = pasien.id_pasien AND diagnosa.iduser='$id_aut_dokl' group by diagnosa.id_pasien desc";
                  $qry = mysqli_query($koneksi,$sql)  or die ("SQL Error".mysqli_error());


                  $count    =mysqli_num_rows($qry);
                  echo "$count";
                ?>
                  
                </div>
              </div>
              <div class="col">
                <div class="progress progress-sm mr-2">
                  <div class="progress-bar bg-danger" role="progressbar" style="width: 50%" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
                </div>
              </div>
            </div>
          </div>

          <div class="col-auto">
            <i class="fas fa-hospital-user fa-2x text-gray-300"></i>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- Earnings (Monthly) Card Example -->
  <div class="col-xl-4 col-md-6 mb-4">
    <div class="card border-left-success shadow h-100 py-2">
      <div class="card-body">
        <div class="row no-gutters align-items-center">
          <div class="col mr-2">
            <div class="text-xs font-weight-bold text-success text-uppercase mb-1">Total Gejala</div>
            <div class="row no-gutters align-items-center">
              <div class="col-auto">
                <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800">

    					  <?php 
    						  include "koneksi.php";
    						  $sql    ="SELECT * FROM gejala";
    							$query    =mysqli_query($koneksi,$sql);
    							$count    =mysqli_num_rows($query);
    							 echo "$count"; 	 
    						?> 
						    </div>
              </div>

              <div class="col">
                <div class="progress progress-sm mr-2">
                  <div class="progress-bar bg-success" role="progressbar" style="width: 50%" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
                </div>
              </div>
            </div>
          </div>

          <div class="col-auto">
            <i class="fas fa-book-medical fa-2x text-gray-300"></i>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- Earnings (Monthly) Card Example -->
  <div class="col-xl-4 col-md-6 mb-4">
    <div class="card border-left-info shadow h-100 py-2">
      <div class="card-body">
        <div class="row no-gutters align-items-center">
          <div class="col mr-2">
            <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Total Tingkatan Gejala</div>
            <div class="row no-gutters align-items-center">
              <div class="col-auto">
                <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800">
    						  <?php 
      						  include "koneksi.php";
      						  $sql    ="SELECT * FROM penyakit";
      							$query    =mysqli_query($koneksi,$sql);
      							$count    =mysqli_num_rows($query);
      							 echo "$count"; 	 
    						  ?>
                </div>
              </div>

              <div class="col">
                <div class="progress progress-sm mr-2">
                  <div class="progress-bar bg-info" role="progressbar" style="width: 50%" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
                </div>
              </div>
            </div>
          </div>
          <div class="col-auto">
            <i class="fas fa-viruses fa-2x text-gray-300"></i>
          </div>
        </div>
      </div>
    </div>
  </div>

  <div class="col-lg-6 mb-4">

    <!-- Project Card Example -->
    <div class="card shadow mb-4">
      <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary"><i class="fas fa-hospital-user"></i> Total Pasien Keseluruhan Berdasarkan Gejala</h6>
      </div>

      <div class="card-body">

        <!-- Tanpa Gejala -->
        <h4 class="small font-weight-bold">Tanpa Gejala
          <?php 
            include "koneksi.php";
            $sql    ="SELECT * FROM diagnosa where kd_penyakit='P001'";
            $query    =mysqli_query($koneksi,$sql);
            $count    =mysqli_num_rows($query);      
          ?> 
          <span class="float-right"><?php echo "$count"; ?></span>
        </h4>

          <div class="progress mb-4">
            <div class="progress-bar bg-danger" role="progressbar" style="width:<?php echo "$count%"; ?>" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
          </div>

        <!-- Gejala Ringan -->
        <h4 class="small font-weight-bold">Gejala Ringan
          <?php 
            include "koneksi.php";
            $sql    ="SELECT * FROM diagnosa where kd_penyakit='P002'";
            $query    =mysqli_query($koneksi,$sql);
            $count    =mysqli_num_rows($query);
          ?> 
          <span class="float-right"><?php echo "$count"; ?></span>
        </h4>
          
          <div class="progress mb-4">
            <div class="progress-bar bg-warning" role="progressbar" style="width: <?php echo "$count%"; ?>" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100"></div>
          </div>

        <!-- Gejala Sedang -->     
        <h4 class="small font-weight-bold">Gejala Sedang
          <?php 
            include "koneksi.php";
            $sql    ="SELECT * FROM diagnosa where kd_penyakit='P003'";
            $query    =mysqli_query($koneksi,$sql);
            $count    =mysqli_num_rows($query);  
          ?>                    
          <span class="float-right"><?php echo "$count"; ?></span>
        </h4>
          
          <div class="progress mb-4">
            <div class="progress-bar" role="progressbar" style="width: <?php echo "$count%"; ?>" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100"></div>
          </div>

        <!-- Gejala Berat -->  
        <h4 class="small font-weight-bold">Gejala Berat
          <?php 
            include "koneksi.php";
            $sql    ="SELECT * FROM diagnosa where kd_penyakit='P004'";
            $query    =mysqli_query($koneksi,$sql);
            $count    =mysqli_num_rows($query);
          ?> 
          <span class="float-right"><?php echo "$count"; ?></span>
        </h4>

          <div class="progress mb-4">
            <div class="progress-bar" role="progressbar" style="width: <?php echo "$count%"; ?>" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100"></div>
          </div>

        <!-- Penyakit Biasa -->  
        <h4 class="small font-weight-bold">Penyakit Biasa
          <?php 
            include "koneksi.php";
            $sql    ="SELECT * FROM diagnosa where kd_penyakit='P005'";
            $query    =mysqli_query($koneksi,$sql);
            $count    =mysqli_num_rows($query);
          ?> 
          <span class="float-right"><?php echo "$count"; ?></span>
        </h4>

          <div class="progress mb-4">
            <div class="progress-bar" role="progressbar" style="width: <?php echo "$count%"; ?>" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100"></div>
          </div>
      </div>
    </div>
  </div>

  <div class="col-lg-6 mb-4">

    <!-- Project Card Example -->
    <div class="card shadow mb-4">
      <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary"><i class="fas fa-stethoscope"></i> Total Dokter Berdasarkan Spesialis</h6>
      </div>

      <div class="card-body">

        <!-- Dokter Umum -->
        <h4 class="small font-weight-bold">Dokter Umum
          <?php 
            include "koneksi.php";
            $sql    ="SELECT * FROM user where level='dokterumum'";
            $query    =mysqli_query($koneksi,$sql);
            $count    =mysqli_num_rows($query);      
          ?> 
          <span class="float-right"><?php echo "$count"; ?></span>
        </h4>

          <div class="progress mb-4">
            <div class="progress-bar bg-danger" role="progressbar" style="width:<?php echo "$count%"; ?>" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
          </div>

        <!-- Dokter Spesialis Paru -->
        <h4 class="small font-weight-bold">Dokter Spesialis Paru
          <?php 
            include "koneksi.php";
            $sql    ="SELECT * FROM user where level='dokterparu'";
            $query    =mysqli_query($koneksi,$sql);
            $count    =mysqli_num_rows($query);
          ?> 
          <span class="float-right"><?php echo "$count"; ?></span>
        </h4>
          
          <div class="progress mb-4">
            <div class="progress-bar bg-warning" role="progressbar" style="width: <?php echo "$count%"; ?>" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100"></div>
          </div>

        <!-- Dokter Spesialis Penyakit Dalam -->     
        <h4 class="small font-weight-bold">Dokter Spesialis Penyakit Dalam
          <?php 
            include "koneksi.php";
            $sql    ="SELECT * FROM user where level='dokterdalam'";
            $query    =mysqli_query($koneksi,$sql);
            $count    =mysqli_num_rows($query);  
          ?>                    
          <span class="float-right"><?php echo "$count"; ?></span>
        </h4>
          
          <div class="progress mb-4">
            <div class="progress-bar" role="progressbar" style="width: <?php echo "$count%"; ?>" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100"></div>
          </div>

      </div>
    </div>
</div>
		  
		 
              

            