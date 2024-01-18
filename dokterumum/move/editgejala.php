<?php
include 'koneksi.php';

$kd_gejala = $_REQUEST['kd_gejala'];
$gejala = $_REQUEST['gejala'];


//query update
$query = "UPDATE gejala SET gejala='$gejala' WHERE kd_gejala='$kd_gejala'";
$result=mysqli_query($koneksi,$query) or die ("SQL Error".mysqli_error());
if ($result) {
   header("location:halaman_admin.php?top=datagejala.php");
}
else{
    echo "ERROR, data gagal diupdate". mysqli_error();
}
//mysql_close($host);
?>