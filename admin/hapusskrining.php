<?php
include "koneksi.php";
$kdhapus = $_GET['kdhapus'];
if ($kdhapus!="") {
	$sql = "DELETE FROM skrining WHERE kd_skrining='$kdhapus'";
	$result=mysqli_query($koneksi,$sql)	or die ("SQL Error". mysqli_error());
	if($result){
		header("location:halaman_admin.php?top=dataskrining.php");
		}else{
			header("location:halaman_admin.php?top=dataskrining.php");
			}
}
?>