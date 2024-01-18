<?php
include 'koneksi.php';

$kd_skrining = $_POST['kd_skrining'];
$skrining = $_POST['skrining'];



$query = "INSERT INTO skrining (kd_skrining,skrining) VALUES ('$kd_skrining','$skrining')";	
$result=mysqli_query($koneksi,$query) or die ("SQL Error".mysqli_error());
if ($result) {
   header("location:halaman_admin.php?top=dataskrining.php");
}
else{
    echo "ERROR, data gagal diupdate". mysqli_error();
}
//mysql_close($host);
?>