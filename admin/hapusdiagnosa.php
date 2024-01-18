<?php
include "koneksi.php";
$kdhapus = $_GET['kdhapus'];
$query=mysqli_query($koneksi,"DELETE FROM diagnosa WHERE id_pasien='$kdhapus'")or die(mysqli_error());
$query=mysqli_query($koneksi,"DELETE FROM pasien WHERE id_pasien='$kdhapus'")or die(mysqli_error());
if ($query) {
	
	header("location:halaman_admin.php?top=datadiagnosa.php");
		}else{
			header("location:halaman_admin.php?top=datadiagnosa.php");
			}

?>