<?php
session_start();

// cek apakah yang mengakses halaman ini sudah login
	if($_SESSION['level']==""){
		header("location:../index.php?pesan=gagal");
}
?>
<!DOCTYPE html>
<html>
<head>
<title>Form Rujukan</title>
<link rel="icon" href="../img/favicon.png" type="image/png">
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

  <link href="../vendor/fontawesome-free/css/all.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

</head>
<body>

<table width="75%"  align="center" border="6" cellpadding="10" cellspacing="0" width="100%">

  <tr> 
  	<th align="left" width="60%"> Identitas Pasien </th>
		<th align="left"> Gejala Pasien </th> 
  </tr>
			
	<tr>
		<td>
			<?php
				include "koneksi.php";
				$id_aut_dok = $_SESSION['iduser'];	
				$id_pasien = $_POST['id_pasien'];
				$query_pasien=mysqli_query($koneksi, "SELECT * FROM diagnosa,pasien where diagnosa.iduser='$id_aut_dok' AND  diagnosa.id_pasien='$id_pasien' AND diagnosa.id_pasien=pasien.id_pasien order by diagnosa.id_pasien");
				$data_pasien=mysqli_fetch_array($query_pasien);
				echo "Nama : ". $data_pasien['nama'] . "<br>";
				echo "<hr>Jenis Kelamin : ". $data_pasien['kelamin']. "<br>";	
				echo "<hr>Umur : ". $data_pasien['umur']. "<br>";
				echo "<hr>Alamat : ". $data_pasien['alamat']. "<br>";
				echo "<hr>Email : ". $data_pasien['email']. "<br>";
				echo "<hr>No HP : ". $data_pasien['no_telp']. "<br>";
				echo "<hr>";
			?>
		</td>
					
		<td valign="top">    
			<?php
				include "koneksi.php";
				$id_cet_pasien = $data_pasien['id_pasien'];
				$query_gejala_input=mysqli_query($koneksi, "SELECT gejala.gejala AS namagejala,gejala_pasien.kd_gejala FROM gejala,gejala_pasien WHERE gejala_pasien.id_pasien='$id_cet_pasien' AND gejala_pasien.kd_gejala=gejala.kd_gejala order by kd_gejala asc");
				$nogejala=0;

				while($row_gejala_input=mysqli_fetch_array($query_gejala_input)){
				$nogejala++;
				echo "<li style='list-style:none; font-size:9pt;'><img src='../img/checkbox.jpg' height='20'><strong>".$row_gejala_input['kd_gejala']."|".$row_gejala_input['namagejala']. "</strong></li>";
				}
			?>
		</td>
	</tr>

	<tr >
  
		<td colspan="2">
			Penyakit yang di derita : <br>
				
				<?php
					include "koneksi.php";
					$id_cet_pasien2 = $data_pasien['id_pasien'];
					$query_gejala_input2=mysqli_query($koneksi, "SELECT * FROM diagnosa,penyakit where id_pasien='$id_cet_pasien2' and diagnosa.kd_penyakit=penyakit.kd_penyakit order by diagnosa.kd_penyakit asc");
					$nogejala2=0;

					while($row_gejala_input2=mysqli_fetch_array($query_gejala_input2)){
					$nogejala2++;
					echo "<li style='list-style:none; font-size:9pt;'><img src='../img/checkbox.jpg' height='20'><strong>".$row_gejala_input2['kd_penyakit']." | ".$row_gejala_input2['nama_penyakit']." |<br> Solusi : ".$row_gejala_input2['solusi']."</strong></li>";
					}
				?>

		</td>
	</tr>				

	<tr >
  
		<td colspan="2">
			Rujukan ke : 
			
			<?php
				include "koneksi.php";
				$id_cet_pasien3 = $data_pasien['id_pasien'];
				$sql3=mysqli_query($koneksi,"SELECT * FROM diagnosa,user where diagnosa.id_pasien='$id_cet_pasien3' and diagnosa.iduser = user.iduser");
				$query_rujukan = mysqli_fetch_array($sql3);
				echo $query_rujukan['nama'];
				print("<br>Keluhan : ");
				echo $query_rujukan['keluhan'];
			?>	
		</td>
	</tr>

	<thead>
		<td align="left" width="30%" ><a href="#" class="button" id="btn-download" download="<?php echo $id_pasien.".png"; ?>"><img src="../temp/<?php echo $id_pasien.".png"; ?>"</a></td>
		<td style="font-size: 15px;"><?php echo "<b>Diagnosa : </b><i>" .$data_pasien['tanggal']. "</i><br>"; ?></td>
	</thead>
  
</table>

<br>

 	<center>
 		<a href="#" class="no-print" onclick="window.print();"><i class="fas fa-print" style="width: 50px;"></i></a>  
 		<a class="no-print" href="halaman_dokter.php?top=datadiagnosa.php"><i class="fas fa-arrow-circle-left"></i></a>
 	</center> 

</body>
</html>