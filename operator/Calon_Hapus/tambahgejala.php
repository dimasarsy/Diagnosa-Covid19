<?php
include 'koneksi.php';

$kd_gejala = $_POST['kd_gejala'];
$gejala = $_POST['gejala'];




$query = "INSERT INTO gejala (kd_gejala,gejala) VALUES ('$kd_gejala','$gejala')";
$result=mysqli_query($koneksi,$query) or die ("SQL Error".mysqli_error());
if ($result) {
   header("location:halaman_admin.php?top=datagejala.php");
}
else{
    echo "ERROR, data gagal diupdate". mysqli_error();
}
//mysql_close($host);
?>