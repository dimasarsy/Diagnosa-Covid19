<?php
session_start();
?>
<!DOCTYPE html>
<html>
<head>
<title>Diagnosa | Hasil Skrining Awal</title>
  <link rel="icon" href="../img/logo1.png" type="image/png">
<style type="text/css">
		body{
			font-family: Arial;
		}

		@media print{
			.no-print{
				display: none;
			}
		}

		table{
			border-collapse: collapse;
		}
	</style>
	  <!-- Vendor CSS Files -->

  <link href="../vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

  <link href="../vendor/fontawesome-free/css/all.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

</head>
<body>

<table width="80%"  align="center" border="6" cellpadding="10" cellspacing="0" width="100%">

  <tr> <th align="left"> Identitas Pasien </th>
		<th align="left"> Data Skrining </th> 
  </tr>
			
				<tr>
					<td>
					<?php
					include "koneksi.php";
					$query_pasien=mysqli_query($koneksi, "SELECT * FROM pasien ORDER BY id_pasien DESC");
					$data_pasien=mysqli_fetch_array($query_pasien);
					echo "Nama : ". $data_pasien['nama'] . "<br>";
					echo "<hr>Jenis Kelamin : ". $data_pasien['kelamin']. "<br>";
					echo "<hr>Umur : ". $data_pasien['umur']. "<br>";
					echo "<hr>Alamat : ". $data_pasien['alamat']. "<br>";
					echo "<hr>Email : ". $data_pasien['email']. "<br>";
					echo "<hr>";
					?>
						
					</td>
					
					<td valign="top">    
					<?php
						include "koneksi.php";
						$id_aut_pas = $_SESSION['id_pas'];
						$query_gejala_input=mysqli_query($koneksi, "SELECT skrining.skrining AS namaskrining,skrining_pasien.kd_skrining FROM skrining,skrining_pasien WHERE skrining_pasien.id_pasien='$id_aut_pas' AND skrining_pasien.kd_skrining=skrining.kd_skrining ORDER by skrining_pasien.id_pasien");
							$nogejala=0;
							
							while($row_gejala_input=mysqli_fetch_array($query_gejala_input)){
								$nogejala++;
								echo "<li style='list-style:none; font-size:9pt;'><img src='../img/checkbox.jpg' height='20'><strong>".$row_gejala_input['kd_skrining']."|".$row_gejala_input['namaskrining']. "</strong></li>";
							 }

							 $count    =mysqli_num_rows($query_gejala_input);
							 	echo "<br>";
							 	echo "Jumlah Hasil Skrining : " .$count;

					?>
					 
							 
					</td>
				</tr>
  
  <tr >
<td colspan="2">
<?php
$query_temp=mysqli_query($koneksi, "SELECT * FROM pasien ORDER BY id_pasien DESC") or die(mysql_error()); //idpasien
			$row_pasien=mysqli_fetch_array($query_temp)or die(mysqli_error());
			$id=$row_pasien['id_pasien']; 
			$nama=$row_pasien['nama'];
			$kelamin=$row_pasien['kelamin'];
			$umur=$row_pasien['umur'];
			$alamat=$row_pasien['alamat'];
			$tanggal =$row_pasien['tanggal'];
			$email=$row_pasien['email'];
?>
<h4>Hasil Skrining Awal Anda Menunjukan Bahwa :</h4>
<?php 
	if ($count >= 5) {
		echo "<b>~POTENSI TINGGI~</b><br>";
		echo "Ket. : Anda Sangat Berpotensi Terkena Covid-19<br>";
		echo "Solusi : Segera Lakukan Tes SWAB/PCR";
?>
		<br><br>
		<button>
			<a class="dropdown-item" href="#" data-toggle="modal" data-target="#keterangan1"><i class="fas fa-info-circle"></i> More</a></li>
		</button>

<?php
	} else if ($count >= 3){
		echo "<b>~POTENSI SEDANG~</b><br>";
		echo "Ket. : Anda Memiliki Potensi Terkena Covid-19<br>";
		echo "Solusi : Segera Lakukan Tes SWAB/PCR";
?>
		<br><br>
		<button>
			<a class="dropdown-item" href="#" data-toggle="modal" data-target="#keterangan1"><i class="fas fa-info-circle"></i> More</a></li>
		</button>

<?php
	} else if ($count >= 1){
		echo "<b>~POTENSI RENDAH~ </b><br>";
		echo "Ket. : Anda Memiliki Potensi Rendah Terkena Covid-19 <br>";
		echo "Solusi : Istirahat dan Isolasi di Rumah 7 Hari";
?>
		<br><br>
		<button>
			<a class="dropdown-item" href="#" data-toggle="modal" data-target="#keterangan2"><i class="fas fa-info-circle"></i> More</a></li>
		</button>
<?php
	} else{
		echo "<b>~TIDAK BERPOTENSI~ </b><br>";
		echo "Ket. : Anda Tidak Berpotensi terkena Covid-19";
		echo "Solusi : Tetap patuhi protokol kesehatan dan Minum Vitamin";

?>
		<br><br>
		<button>
			<a class="dropdown-item" href="#" data-toggle="modal" data-target="#keterangan2"><i class="fas fa-info-circle"></i> More</a></li>
		</button>

<?php
	}
	
 ?>

 <center>
 		<a href="#" class="no-print" onclick="window.print();"><i class="fas fa-print" style="width: 50px;"></i></a>  
 		<a class="no-print" href="halaman_operator.php?top=dataskrining.php" ><i class="fas fa-arrow-circle-left"></i></a>
 	</center> 

 <br><br>
 
</table>
<br>
<!--<center><a href="#" class="no-print" onclick="window.print();">Cetak/Simpan PDF</a>  <a class="no-print" href="halaman_operator.php?top=home.php" >|  Batal</a></center> -->

 <!-- Keterangan 1 Modal-->
  <div class="modal fade" id="keterangan1" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document" >
      <div class="modal-content">
        <div class="modal-header" style="color: red;">
          <b>⚠ Alert !!!</b>
        </div>
        <div class="modal-body">✥ Anda diharuskan melakukan <b>Tes SWAB / PCR</b> terlebih Dahulu untuk mengetahui keakuratan, Apakah anda terkonfirmasi positif Covid-19 atau Tidak. <br>✥ Jika terkonfirmasi <b>Positif</b>, Anda dapat melanjutkan proses Diagnosa pada halaman website ini<br></div>
        
        <div class="modal-footer">
        	<p style="font-size: 13px;">Apakah anda sudah melakukan Tes Covid-19 dan Terkonfirmasi Positif Covid-19 ?<br></p>
          <button class="btn btn-secondary" type="button" data-dismiss="modal">Belum</button>
          <a class="btn btn-danger" href="konsultasi_gejala.php">Sudah</a>
        </div>
      </div>
    </div>
  </div>

  <!-- Keterangan 2 Modal-->
  <div class="modal fade" id="keterangan2" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document" >
      <div class="modal-content">
        <div class="modal-header" style="color: blue;">
          <b>⚠ Alert !!!</b>
        </div>
        <div class="modal-body">✥ Anda hanya perlu istirahat dan minum vitamin<br>✥ Anda juga bisa melakukan <b>Tes SWAB / PCR</b> untuk mengetahui keakuratan lebih lanjut <br>✥ Jika terkonfirmasi <b>Positif</b>, Anda dapat melanjutkan proses Diagnosa pada halaman website ini<br></div>
        
        <div class="modal-footer">
        	<p style="font-size: 13px;">Apakah anda sudah melakukan Tes Covid-19 dan Terkonfirmasi Positif Covid-19 ?<br></p>
          <button class="btn btn-secondary" type="button" data-dismiss="modal">Belum</button>
          <a class="btn btn-primary" href="konsultasi_gejala.php">Sudah</a>
        </div>
      </div>
    </div>
  </div>



  
 <!-- Bootstrap core JavaScript-->
  <script src="../vend/jquery/jquery.min.js"></script>
  <script src="../vend/bootstrap/js/bootstrap.bundle.min.js"></script>




</body>
</html>