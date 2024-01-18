<?php 
session_start();
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Diagnosa Printer CBR</title><br />
<style type="text/css">
p{ padding-left:2px; text-indent:0px;}
.kasusLama { border:1px solid #069; width:375px; float:left; min-height:210px; max-height:210px; overflow:scroll;}
.kasusLama p { background-color:#0CC;}
.kasusBaru { border:1px solid #069; width:375px; float:left; margin-left:2px; min-height:210px; max-height:210px; overflow:scroll; }
.kasusBaru p { background-color:#F90;}
.Cleared { position:fixed; width:750px; background:linear-gradient(to top, #9CC, #9CF);}
</style>
</head>
<body>
<div class="konten">
<table width="100%" border="0" bgcolor="#0099FF" cellspacing="1" cellpadding="4" bordercolor="#0099FF">
  <tr bgcolor="#ffffff">
    <td height="32"  style="color:#C60;"><div style="text-align:center; background-color:#7500EA; color:#ffffff; font-family:Calibri; border-radius:50px 50px; height:25px; margin-bottom:8px;">
<a style="background-color:#CCC; cursor:pointer;" href="index.php?top=konsultasifm.php"><strong>ULANG DIAGNOSA</strong></a>
<a style="background-color:#CCC;" href="index.php?top=pasien_add_fm.php"><strong>BACK HOME</strong></a></div></td>
  </tr>
  <tr bgcolor="#ffffff">
    <td height="32"  style="color:#C60;"><table width="100%" border="1">
  <tr>
    <td width="27%"><div style='border-radius:50px 50px;background-color:#0099FF; padding:2px 2px 2px 5px; color:#ffffff;'><strong>IDENTITAS PENGGUNA</strong></div>
   <?php

    include "koneksi.php";

			$query_pasien=mysqli_query($koneksi, "SELECT * FROM pasien ORDER BY id_pasien DESC");
			$data_pasien=mysqli_fetch_array($query_pasien);

			echo "Nama : <br>". $data_pasien['nama'] . "<br>";
			echo "<hr>Jenis Kelamin :<br> ";
			$lk=$data_pasien['kelamin']; if($lk=="L"){ echo "Laki-laki"; }else { echo "Perempuan";}; echo "<br>";
			echo "<hr>Umur : <br>". $data_pasien['umur']. "<br>";
			echo "<hr>Alamat : <br>". $data_pasien['alamat']. "<br>";
			echo "<hr>Email : <br>". $data_pasien['email']. "<br>";
			echo "<hr>";
			
			?></td>
		    <td width="73%">    
			<?php
		    include "koneksi.php";
			$id_aut_pas = $_SESSION['id_pas'];	
			echo "<div style='border-radius:50px 50px;background-color:#0099FF; padding:2px 2px 2px 5px; color:#ffffff;'><strong>GEJALA YANG DIALAMI</strong></div>";
			$query_gejala_input=mysqli_query($koneksi, "SELECT gejala.gejala AS namagejala,tmp_gejala.kd_gejala FROM gejala,tmp_gejala WHERE tmp_gejala.id_pasien='$id_aut_pas' AND tmp_gejala.kd_gejala=gejala.kd_gejala ORDER by tmp_gejala.id_pasien");
			$nogejala=0;
			while($row_gejala_input=mysqli_fetch_array($query_gejala_input)){
				$nogejala++;
				echo "<li style='list-style:none; font-size:9pt;'><img src='images/checkbox.jpg' width='20' height='20'><strong>".$row_gejala_input['kd_gejala']."|".$row_gejala_input['namagejala']. "</strong></li>";
				}
		?>
    <p></p></td>
  </tr>
</table>
</td>
  </tr>
  <tr bgcolor="#ffffff">
    <td height="32" style="font-family:'Courier New', Courier, monospace;">
    <?php
    echo "<h3>PROSES DIAGNOSA METODE CBR</h3><hr>";
	echo "<p>Mencari Data Relasi Dari Gejala Yang dipilih, adalah sebagai berikut : </p>";
	$id_aut_pas2 = $_SESSION['id_pas'];
	$queryGKasusBaru=mysqli_query($koneksi, "SELECT * FROM tmp_gejala where tmp_gejala.id_pasien='$id_aut_pas2' order by kd_gejala desc" );
	$arrKasusBaru=array();
	$arrSumBobotBaru=array();
	$arrNtotal=array();
	while($dataGKasusBaru=mysqli_fetch_array($queryGKasusBaru)){
		$arrKasusBaru[]=$dataGKasusBaru['kd_gejala'];
		}
	$arrBobotLama=array();
	echo "<div style='border:1px solid blue;'>";
	echo "<p>Berikut ini adalah gejala yang dipilih, ini dinamakan dengan kasus baru :</p>";
	foreach($arrKasusBaru as $kdGejala){
		print_r($kdGejala); echo "<br>";
		} echo "</div>";
	$query_relasi=mysqli_query($koneksi,"SELECT * FROM relasi WHERE kd_gejala IN(SELECT kd_gejala FROM tmp_gejala) GROUP BY kd_penyakit ASC");
	while($dataRelasi=mysqli_fetch_array($query_relasi)){
		echo "<p><strong>Data Kerusakan Yang Memiliki Relasi Ke Gejala Yang Terpilih Adalah : </strong></p>";
		echo $dataRelasi['kd_penyakit']."<br>";
		echo "<p>Cari Data Gejala dan Bobot di Kasus Lama Pada Jenis Kerusakan $dataRelasi[kd_penyakit]</p>";
			$queryGKasusLama=mysqli_query($koneksi, "SELECT * FROM relasi WHERE kd_penyakit='$dataRelasi[kd_penyakit]' ORDER BY kd_penyakit ASC");
			echo "<div class='kasusLama'>";
			echo "<p>Kasus Lama (basis pengetahuan pakar)</p>";
			while($dataGKasusLama=mysqli_fetch_array($queryGKasusLama)){
				echo $dataGKasusLama['kd_gejala']." | bobot[$dataGKasusLama[bobot]]"."<br>";
				$arrBobotLama[$dataGKasusLama['kd_gejala']]=$dataGKasusLama['bobot'];
				$kdGLama=$dataGKasusLama['kd_gejala']; 
				}
			echo "</div>";		
			echo "<div class='kasusBaru'>";
			echo "<p>Kasus Baru (gejala dipilih)</p>";
				foreach($arrKasusBaru as $kdGejala){
				print_r($kdGejala); echo "<br>";
				}
			echo "</div>";
			echo "<div class='JBKL'>";
				$sumBobotLama=array_sum($arrBobotLama);
				echo "<p>Jumlah Bobot Kasus Lama = ".$sumBobotLama."</p>"; 
			echo "</div>";
			echo "<p>Menghitung Nilai Similarity :</p>";
			echo "<img width='400' style='border:1px solid #ccffcc;' src='images/rumus.jpg'><br>";
			echo "<p>Similarity(X,$dataRelasi[kd_penyakit])="; $kd_penyakit=$dataRelasi['kd_penyakit'];
					$arrayKeys = array_keys($arrBobotLama);
					$lastArrayKey = array_pop($arrayKeys);
					echo "<span style='border-bottom:1px solid #000000;'><strong>[</strong>";
					foreach($arrBobotLama as $kdG=>$bobotLama){
							if(in_array($kdG,$arrKasusBaru)){
								$kaliBobot=1*$bobotLama; $arrSumBobotBaru[]=$kaliBobot;
								if($kdG == $lastArrayKey) {
									echo "(1*$bobotLama)";
									 }else{ echo "(1*$bobotLama)+"; }
								
							}else { 
								$kaliBobot=0*$bobotLama; $arrSumBobotBaru[]=$kaliBobot;
								if($kdG == $lastArrayKey) {
									echo "(0*$bobotLama)";
									 }else{ echo "(0*$bobotLama)+"; }
							}
						} 
						$jumlahAtas=array_sum($arrSumBobotBaru);
						echo "<strong>]</strong> = $jumlahAtas</span><br>";
						echo "<span style='margin-left:200px;'>";
								foreach($arrBobotLama as $gBaru=>$bobotBaru){
									if($gBaru == $lastArrayKey) {
									echo "$bobotBaru";
									 }else{ echo "$bobotBaru+"; }
									}
						echo "</span> ";
						$jumlahBawah=array_sum($arrBobotLama);
						echo "= $jumlahBawah<br>";
						$totalNilai=$jumlahAtas/$jumlahBawah;
						echo "<span style='margin-left:145px;'>= $totalNilai</span>";
			echo "</p>";
			$arrNtotal[$kd_penyakit]=$totalNilai;
			unset($arrBobotLama); unset($sumBobotLama);	unset($arrSumBobotBaru);
		}
	?>
    </td>
  </tr>
  <tr bgcolor="#FFFFFF">
    <td align="center"><div style='border-radius:50px 50px;background-color:#0099FF; text-align:center; padding:2px 2px 2px 5px; color:#ffffff;'><strong>HASIL DIAGNOSA PENYAKIT MATA</strong></div>
<p style="color:#06F; font-weight:bold;">BERDASARKAN HASIL DIAGNOSA PENYAKIT JANTUNG MAKA DIPEROLEH HASIL YANG TERDETEKSI PENYAKIT ADALAH :</p>
<?php
$query_temp=mysqli_query($koneksi, "SELECT * FROM pasien ORDER BY id_pasien DESC") or die(mysql_error()); //idpasien
			$row_pasien=mysqli_fetch_array($query_temp)or die(mysqli_error());
			$id=$row_pasien['id_pasien']; //idpasien
			$nama=$row_pasien['nama'];
			$kelamin=$row_pasien['kelamin'];
			$umur=$row_pasien['umur'];
			$alamat=$row_pasien['alamat'];
			$tanggal =$row_pasien['tanggal'];
			$email=$row_pasien['email'];
arsort($arrNtotal);
$TotalAkhir=array_sum($arrNtotal);
//echo $TotalAkhir;
foreach($arrNtotal as $kdK=>$Nilai)
	{
	$queryK=mysqli_query($koneksi, "SELECT * FROM penyakit WHERE kd_penyakit='$kdK' ");
	$dataK=mysqli_fetch_array($queryK);
	$persen=$Nilai/$TotalAkhir*100;
	echo "[$kdK]<strong>".$dataK['nama_penyakit']."</strong> dengan Nilai = ".substr($Nilai,0,5).", Persentase ".substr($persen,0,5)."%<br>";
	echo "<p>Solusi : $dataK[solusi]</p><hr>";
	$query_hasil="INSERT INTO diagnosa(id_pasien,kd_penyakit,persentase,tanggal) VALUES ('$id','$kdK','$persen','$tanggal')";
	$res_hasil=mysqli_query($koneksi,$query_hasil) 
			or die(mysqli_error());
				$query_hasil=mysqli_query($koneksi, "SELECT * FROM diagnosa ORDER BY id_diagnosa DESC") or die(mysql_error());	
					$row_hasil=mysqli_fetch_array($query_hasil)or die(mysqli_error());						
			
	}
	unset($arrNtotal);	
	
?>
<tr>
	<td>Klik Gambar untuk simpan QR Code</td>
</tr>
<tr>
			
			
</tr>	
</td>
  </tr>
  <tr bgcolor="#FFFFFF">
    <td><a href="index.php?top=pasien_add_fm.php"><strong>&laquo;&laquo;Kembali</strong></a>
    </td>
  </tr>
</table>
</div>
</body>
</html>