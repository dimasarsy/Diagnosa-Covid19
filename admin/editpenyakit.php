<?php
include 'koneksi.php';

$kd_penyakit = $_REQUEST['kd_penyakit'];
$nama_penyakit = $_REQUEST['nama_penyakit'];
$definisi = $_REQUEST['definisi'];
$solusi = $_REQUEST['solusi'];


//query update
$query = "UPDATE penyakit SET kd_penyakit='$kd_penyakit',nama_penyakit='$nama_penyakit',definisi='$definisi',solusi='$solusi' WHERE kd_penyakit='$kd_penyakit'";
$result=mysqli_query($koneksi,$query) or die ("SQL Error".mysqli_error());
if ($result) {
   header("location:halaman_admin.php?top=datapenyakit.php");
}
else{
    echo "ERROR, data gagal diupdate". mysqli_error();
}
//mysql_close($host);
?>