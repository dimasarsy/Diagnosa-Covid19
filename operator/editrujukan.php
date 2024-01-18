<?php
session_start();
include "koneksi.php";

 if (isset($_POST['simpanrujukan'])) {	
	$iduserrujukan = $_POST['iduser'];
	$id_cet_pasien3 = $_SESSION['id_pas'];	
	//tambah keluhan
	$catatan = $_POST['keluhan'];

	$sql = "INSERT INTO diagnosa (keluhan) VALUES ('$keluhan')";
	
	mysqli_query($koneksi,$sql) or die ("SQL Error 2".mysqli_error());
	$queryrujukan = "update diagnosa set iduser='$iduserrujukan', keluhan='$catatan' where id_pasien='$id_cet_pasien3'";
	$resultrujukan=mysqli_query($koneksi,$queryrujukan) or die ("SQL Error".mysqli_error());
	header("location:halaman_operator.php?top=datadiagnosa.php");
 }
?>