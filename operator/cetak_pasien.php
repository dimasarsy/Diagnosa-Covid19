<?php 
  session_start();

  // cek apakah yang mengakses halaman ini sudah login
  if($_SESSION['username']==""){
    header("location:../index.php?pesan=gagal");
}


$id = $_GET['idcetak'];

?>
<!DOCTYPE html>
<html>
<head>
<title>Cetak | Form Rujukan</title>
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

  <link href="../vendor/fontawesome-free/css/all.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

</head>
<body>

<table width="75%"  align="center" border="6" cellpadding="10" cellspacing="0" width="100%">

  <tr> 
  	<th align="left" width="70%"> Identitas Pasien </th>
		<th align="left"> Gejala Pasien </th> 
  </tr>
			
				<tr>
					<td>
					<?php
					include "koneksi.php";
					$query_pasien=mysqli_query($koneksi, "SELECT * FROM pasien where id_pasien='$_GET[idcetak]'");
					$data_pasien=mysqli_fetch_array($query_pasien);
					echo "Nama : ". $data_pasien['nama'] . "<br>";
					echo "<hr>Jenis Kelamin : ". $data_pasien['kelamin']. "<br>";	
					
					echo "<hr>Umur : ". $data_pasien['umur']. "<br>";
					echo "<hr>Alamat : ". $data_pasien['alamat']. "<br>";
					echo "<hr>Email : ". $data_pasien['email']. "<br>";
					echo "<hr>No HP : ". $data_pasien['no_telp']. "<br>";
					echo "<hr>";
					?></td>
					
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
Rujukan ke : <?php 
				 include "koneksi.php";
					$id_cet_pasien3 = $data_pasien['id_pasien'];
				  $sql3=mysqli_query($koneksi,"SELECT * FROM diagnosa,user where diagnosa.id_pasien='$id_cet_pasien3' and diagnosa.iduser = user.iduser");
				  $query_rujukan = mysqli_fetch_array($sql3);
				  echo $query_rujukan['nama'];
				 ?>	
</td>

</tr>	
<thead>
	<td align="left" width="30%" ><a href="#" class="button" id="btn-download" download="<?php echo $id.".png"; ?>"><img src="../temp/<?php echo $id.".png"; ?>"</a></td>
	<td style="font-size: 15px;"><?php echo "<b>Diagnosa : </b><i>" .$data_pasien['tanggal']. "</i><br>"; ?></td>
</thead>
  
</table>
<br>


 	<center>
 		<a href="#" class="no-print" onclick="window.print();"><i class="fas fa-print" style="width: 50px;"></i></a>  
 		<a class="no-print" href="halaman_operator.php?top=datadiagnosa.php"><i class="fas fa-arrow-circle-left"></i></a>
 	</center> 

</body>
</html>