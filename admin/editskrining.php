<?php
include 'koneksi.php';

$kd_skrining = $_REQUEST['kd_skrining'];
$skrining = $_REQUEST['skrining'];

//query update
$query = "UPDATE skrining SET kd_skrining='$kd_skrining',skrining='$skrining' WHERE kd_skrining='$kd_skrining'";
$result=mysqli_query($koneksi,$query) or die ("SQL Error".mysqli_error());
if ($result) {
   header("location:halaman_admin.php?top=dataskrining.php");
}
else{
    echo "ERROR, data gagal diupdate". mysqli_error();
}
//mysql_close($host);
?>