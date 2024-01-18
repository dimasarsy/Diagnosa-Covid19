<?php
session_start();
?>
<!DOCTYPE html>
<html>
<head>
<title>Hasil Diagnosa Gejala</title>
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
		<th align="left"> Gejala Pasien </th> 
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
					?></td>
					
					<td valign="top">    
					<?php
					include "koneksi.php";
					$id_aut_pas = $_SESSION['id_pas'];
					$query_gejala_input=mysqli_query($koneksi, "SELECT gejala.gejala AS namagejala,gejala_pasien.kd_gejala FROM gejala,gejala_pasien WHERE gejala_pasien.id_pasien='$id_aut_pas' AND gejala_pasien.kd_gejala=gejala.kd_gejala ORDER by gejala_pasien.id_pasien");
					$nogejala=0;
							while($row_gejala_input=mysqli_fetch_array($query_gejala_input)){
								$nogejala++;
								echo "<li style='list-style:none; font-size:9pt;'><img src='../img/checkbox.jpg' height='20'><strong>".$row_gejala_input['kd_gejala']."|".$row_gejala_input['namagejala']. "</strong></li>";
								}
					?>
					</td>
				</tr>

				


    <?php   
	
	$queryGKasusBaru=mysqli_query($koneksi, "SELECT * FROM gejala_pasien where gejala_pasien.id_pasien='$id_aut_pas' order by kd_gejala desc" );
	$arrKasusBaru=array();
	$arrSumBobotBaru=array();
	$arrNtotal=array();
	while($dataGKasusBaru=mysqli_fetch_array($queryGKasusBaru)){
		$arrKasusBaru[]=$dataGKasusBaru['kd_gejala'];
		}
	$arrBobotLama=array();	
	$arrBobotLama=array();	
	foreach($arrKasusBaru as $kdGejala){
		//print_r($kdGejala); 
		};
		
	$query_relasi=mysqli_query($koneksi,"SELECT * FROM rule WHERE kd_gejala IN(SELECT kd_gejala FROM gejala_pasien where gejala_pasien.id_pasien='$id_aut_pas') GROUP BY kd_penyakit ASC");
	
	while($dataRelasi=mysqli_fetch_array($query_relasi)){		
		//echo $dataRelasi['kd_penyakit']."<br>";
		//echo "<p>Cari Data Gejala dan Bobot di Kasus Lama Pada Jenis Kerusakan $dataRelasi[kd_penyakit]</p>";			
			$queryGKasusLama=mysqli_query($koneksi, "SELECT * FROM rule WHERE kd_penyakit='$dataRelasi[kd_penyakit]' ORDER BY kd_penyakit ASC");
			//echo "<div class='kasusLama'>";
			//echo "<p>Kasus Lama (basis pengetahuan pakar)</p>";
			while($dataGKasusLama=mysqli_fetch_array($queryGKasusLama)){
				//echo $dataGKasusLama['kd_gejala']." | bobot[$dataGKasusLama[bobot]]"."<br>";
				$arrBobotLama[$dataGKasusLama['kd_gejala']]=$dataGKasusLama['bobot'];
				$kdGLama=$dataGKasusLama['kd_gejala']; 
				}
			//echo "</div>";		
			//echo "<div class='kasusBaru'>";
			//echo "<p>Kasus Baru (gejala dipilih)</p>";
				foreach($arrKasusBaru as $kdGejala){
				//print_r($kdGejala); //echo "<br>";
				}
			//echo "</div>";
			//echo "<div class='JBKL'>";
				$sumBobotLama=array_sum($arrBobotLama);
				//echo "<p>Jumlah Bobot Kasus Lama = ".$sumBobotLama."</p>"; 
			//echo "</div>";
			//echo "<p>Menghitung Nilai Similarity :</p>";
			//echo "<img width='400' style='border:1px solid #ccffcc;' src='images/rumus.jpg'><br>";
			//echo "<p>Similarity(X,$dataRelasi[kd_penyakit])="; 
			$kd_penyakit=$dataRelasi['kd_penyakit'];
					$arrayKeys = array_keys($arrBobotLama);
					$lastArrayKey = array_pop($arrayKeys);
					//echo "<span style='border-bottom:1px solid #000000;'><strong>[</strong>";
					foreach($arrBobotLama as $kdG=>$bobotLama){
							if(in_array($kdG,$arrKasusBaru)){
								$kaliBobot=1*$bobotLama; $arrSumBobotBaru[]=$kaliBobot;
								if($kdG == $lastArrayKey) {
									//echo "(1*$bobotLama)";
									 }else{ }//echo "(1*$bobotLama)+"; }
								
							}else { 
								$kaliBobot=0*$bobotLama; $arrSumBobotBaru[]=$kaliBobot;
								if($kdG == $lastArrayKey) {
									//echo "(0*$bobotLama)";
									 }else{ }//echo "(0*$bobotLama)+"; }
							}
						} 
						$jumlahAtas=array_sum($arrSumBobotBaru);
						//echo "<strong>]</strong> = $jumlahAtas</span><br>";
						//echo "<span style='margin-left:200px;'>";
								foreach($arrBobotLama as $gBaru=>$bobotBaru){
									if($gBaru == $lastArrayKey) {
									//echo "$bobotBaru";
									 }else{ }//echo "$bobotBaru+"; }
									}
						//echo "</span> ";
						$jumlahBawah=array_sum($arrBobotLama);
						//echo "= $jumlahBawah<br>";
						$totalNilai=$jumlahAtas/$jumlahBawah;
						//echo "<span style='margin-left:145px;'>= $totalNilai</span>";
			//echo "</p>";
			$arrNtotal[$kd_penyakit]=$totalNilai;
			unset($arrBobotLama); unset($sumBobotLama);	unset($arrSumBobotBaru);
		}
	?>
   
  
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
asort($arrNtotal);
$TotalAkhir=array_sum($arrNtotal);

foreach($arrNtotal as $kdK=>$Nilai)
	{
	$queryK=mysqli_query($koneksi, "SELECT * FROM penyakit WHERE kd_penyakit='$kdK'");
	$dataK=mysqli_fetch_array($queryK);
	$persen=$Nilai/$TotalAkhir*100;
	echo "[$kdK]<strong>".$dataK['nama_penyakit']."</strong> dengan Nilai = ".substr($Nilai,0,5).", Persentase ".substr($persen,0,5)."%<br>";
	echo "<b><p>Catatan:</b> $dataK[keterangan]</p>";

	$query_hasil= "INSERT INTO diagnosa(id_pasien,kd_penyakit,persentase,tanggal) VALUES ('$id','$kdK','$persen','$tanggal')";
	$res_hasil=mysqli_query($koneksi,$query_hasil) 
			or die(mysqli_error());
				$query_hasil=mysqli_query($koneksi, "SELECT * FROM diagnosa ORDER BY id_diagnosa DESC") or die(mysql_error());				
	}

	unset($arrNtotal);
	$tingkat    = $dataK['nama_penyakit'];

?>
<br>
	<?php 
			if ($tingkat == "Gejala Berat") {
	 ?>
	 	<button style="background-color: #760d12;">
			<a class="dropdown-item" href="#" data-toggle="modal" data-target="#keterangan1"><i class="fas fa-info-circle"></i> More</a></li>
		</button>
	<?php 
		} elseif ($tingkat == "Gejala Sedang"){
	?>
		<button style="background-color: #f57854;>
			<a class="dropdown-item" href="#" data-toggle="modal" data-target="#keterangan2"><i class="fas fa-info-circle"></i> More</a></li>
		</button>
	<?php 
		} elseif ($tingkat == "Gejala Ringan"){
	?>
		<button style="background-color: #fbb03b;">
			<a class="dropdown-item" href="#" data-toggle="modal" data-target="#keterangan3"><i class="fas fa-info-circle"></i> More</a></li>
		</button>
	<?php 
		} else{
	?>
		<button style="background-color: #00a99e;">
			<a class="dropdown-item" href="#" data-toggle="modal" data-target="#keterangan4"><i class="fas fa-info-circle"></i> More</a></li>
		</button>
	<?php 
		}
	?>

</td>

<tr>

	<td colspan="2" align='top'> Silahkan pilih dokter sesuai dengan gejala yang anda alami :
		<form action="editrujukan.php" method="POST">
								
			<select name="iduser" id="iduser">	
				<option disabled selected> Pilih Dokter</option>	
					<?php 
						include "koneksi.php";
						$sql3=mysqli_query($koneksi,"SELECT * FROM user where level like '%dokter%'");
						while ($data3=mysqli_fetch_array($sql3)) {
					?>
				<option value="<?=$data3['iduser']?>"><?=$data3['nama']?> :: <?=$data3['level']?></option> 
					<?php
						}
					?>
			</select><br>
			
			<br> Keluahan anda : <br>
				<textarea name="keluhan" class="form-control" id="keluahan"></textarea> 	<br>		  
				<input type="submit" name="simpanrujukan" value="Simpan">
		</form>
	</td>
</tr>

</tr>	
<thead>
<td align="left"><a href="#" class="button" id="btn-download" download="<?php echo $id.".png"; ?>"><img src="../temp/<?php echo $id.".png"; ?>"</a></td>
<td></td>
</thead>  
</table>

<!-- Keterangan 1 Gejala-->
  <div class="modal fade" id="keterangan1" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document" >
      <div class="modal-content">
        <div class="modal-header" style="color: #760d12;">
          <b>⚠ Perhatikan !!!</b>
        </div>
        <div class="modal-body">
        	<h5 style="color: #760d12;">Pasien Gejala Berat</h5>
        	<b>✥ Penanganan :</b> HCU/ICU Rumah Sakit Rujukan <br>
        	<b>✥ Pengobatan :</b> Favipiravir, remdesivir, azitromisin, kartikosteroid, Vitamin C, D, dan Zinc, Antikoagulan LMWH/UFH berdasarkan evaluasi Dokter penanggung jawab (DPJP), pengorbatan komorbid bila ada, HFNC/ventilator, terapi tambahan.<br>
        	<b>✥ Perawatan :</b> 10 hari isolasi sejak timbul gejala dan minimal 3 hari bebas gejala.<br>
        </div>
        
        <div class="modal-footer">
        	<p style="font-size: 13px;">Silahkan Hubungi Dokter terkait, untuk penanganan lebih lanjut. </p><br><br>
          <button class="btn btn-secondary" type="button" data-dismiss="modal">Tutup</button>
        </div>
      </div>
    </div>
  </div>

<!-- Keterangan 2 Gejala-->
  <div class="modal fade" id="keterangan2" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document" >
      <div class="modal-content">
        <div class="modal-header" style="color: #f57854;">
          <b>⚠ Perhatikan !!!</b>
        </div>
        <div class="modal-body">
        	<h5 style="color: #f57854;">Pasien Gejala Sedang</h5>
        	<b>✥ Penanganan :</b> Rumah Sakit Lapangan, Rumah Sakit Darurat COVID-19, Rumah Sakit Non Rujukan, Rumah Sakit Rujukan. <br>
        	<b>✥ Pengobatan :</b> Favipiravir, remdesivir 200 mgIV, azitromisin, kartikosteroid, Vitamin C, D, dan Zinc, Antikoagulan LMWH/UFH berdasarkan evaluasi Dokter penanggung jawab (DPJP), pengorbatan komorbid bila ada, terapi O2 secara noninvasif dengan arus sedang sampai tinggi (HFNC)<br>
        	<b>✥ Perawatan :</b> 10 hari isolasi sejak timbul gejala dan minimal 3 hari bebas gejala.<br>
        </div>
        
        <div class="modal-footer">
        	<p style="font-size: 13px;">Silahkan Hubungi Dokter terkait, untuk penanganan lebih lanjut. </p><br><br>
          <button class="btn btn-secondary" type="button" data-dismiss="modal">Tutup</button>
        </div>
      </div>
    </div>
  </div> 

<!-- Keterangan 3 Gejala-->
  <div class="modal fade" id="keterangan3" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document" >
      <div class="modal-content">
        <div class="modal-header" style="color: #fbb03b;">
          <b>⚠ Perhatikan !!!</b>
        </div>
        <div class="modal-body">
        	<h5 style="color: #fbb03b;">Pasien Gejala Ringan</h5>
        	<b>✥ Penanganan :</b> Fasilitas isolasi pemerintah, isolasi mandiri di rumah bagi yang memenuhi syarat. <br>
        	<b>✥ Pengobatan :</b> Oseltamivir atau favipiravir, Vitamin C, D, dan Zinc.<br>
        	<b>✥ Perawatan :</b> 10 hari isolasi sejak timbul gejala dan minimal 3 hari bebas gejala.<br>
        </div>
        
        <div class="modal-footer">
        	<p style="font-size: 13px;">Silahkan Hubungi Dokter terkait, untuk penanganan lebih lanjut. </p><br><br>
          <button class="btn btn-secondary" type="button" data-dismiss="modal">Tutup</button>
        </div>
      </div>
    </div>
  </div>

<!-- Keterangan 4 Gejala-->
  <div class="modal fade" id="keterangan4" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document" >
      <div class="modal-content">
        <div class="modal-header" style="color: #00a99e;">
          <b>⚠ Perhatikan !!!</b>
        </div>
        <div class="modal-body">
        	<h5 style="color: #00a99e;">Pasien Tanpa Gejala</h5>
        	<b>✥ Penanganan :</b> Isolasi mandiri di rumah, fasilitas isolasi pemerintah. <br>
        	<b>✥ Pengobatan :</b> Vitamin C, D, dan Zinc<br>
        	<b>✥ Perawatan :</b> 10 hari isolasi sejak pengambilan spesimen diagnosis konfirmasi.<br>
        </div>
        
        <div class="modal-footer">
        	<p style="font-size: 13px;">Silahkan Hubungi Dokter terkait, untuk penanganan lebih lanjut. </p><br><br>
          <button class="btn btn-secondary" type="button" data-dismiss="modal">Tutup</button>
        </div>
      </div>
    </div>
  </div>


<br>
 <!-- Bootstrap core JavaScript-->
  <script src="../vend/jquery/jquery.min.js"></script>
  <script src="../vend/bootstrap/js/bootstrap.bundle.min.js"></script>
<!--<center><a href="#" class="no-print" onclick="window.print();">Cetak/Simpan PDF</a>  <a class="no-print" href="halaman_operator.php?top=home.php" >|  Batal</a></center> -->


</body>
</html>