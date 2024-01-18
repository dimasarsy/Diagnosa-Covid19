<?php
include "koneksi.php";
$kdhapus = $_GET['kdhapus'];
if ($kdhapus!="") {
	$sql = "DELETE FROM relasi WHERE id_relasi='$kdhapus'";
	$result=mysqli_query($koneksi,$sql)	or die ("SQL Error". mysqli_error());
	if($result){
		header("location:halaman_admin.php?top=datarule.php");
		}else{
			header("location:halaman_admin.php?top=datarule.php");
			}
}
?>