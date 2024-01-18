<?php
include "koneksi.php";
$kdhapus = $_GET['kdhapus'];
if ($kdhapus!="") {
	$sql = "DELETE FROM gejala WHERE kd_gejala='$kdhapus'";
	$result=mysqli_query($koneksi,$sql)	or die ("SQL Error". mysqli_error());
	if($result){
		header("location:halaman_admin.php?top=datagejala.php");
		}else{
			header("location:halaman_admin.php?top=datagejala.php");
			}
}
?>