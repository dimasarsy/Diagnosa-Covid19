<?php
include 'koneksi.php';

$kd_penyakit = $_POST['kd_penyakit'];
$nama_penyakit = $_POST['nama_penyakit'];
$definisi = $_POST['definisi'];
$solusi = $_POST['solusi'];


$query = "INSERT INTO penyakit (kd_penyakit,nama_penyakit,definisi,solusi) VALUES ('$kd_penyakit','$nama_penyakit','$definisi','$solusi')";	
$result=mysqli_query($koneksi,$query) or die ("SQL Error".mysqli_error());
if ($result) {
   header("location:halaman_admin.php?top=datapenyakit.php");
}
else{
    echo "ERROR, data gagal diupdate". mysqli_error();
}
//mysql_close($host);
?>