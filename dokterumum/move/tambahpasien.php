<?php
include 'koneksi.php';


$nama = $_POST['nama'];
$jk_pasien = $_POST['jk_pasien'];
$umur = $_POST['umur'];
$alamat = $_POST['alamat'];
$email = $_POST['email'];
$NOIP = $_SERVER['REMOTE_ADDR'];

//query update





$query = "INSERT INTO pasien (nama,kelamin,umur,alamat,noip,tanggal,email) 
			VALUES ('$nama','$jk_pasien','$umur','$alamat','$NOIP',NOW(),'$email')";
$result=mysqli_query($koneksi,$query) or die ("SQL Error".mysqli_error());
if ($result) {
   header("location:halaman_admin.php?top=datapasien.php");
}
else{
    echo "ERROR, data gagal diupdate". mysqli_error();
}
//mysql_close($host);
?>