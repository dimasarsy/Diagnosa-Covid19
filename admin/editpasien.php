<?php
include 'koneksi.php';

$id_pasien = $_POST['id_pasien'];
$nama = $_POST['nama'];
$jk_pasien = $_POST['jk_pasien'];
$umur = $_POST['umur'];
$alamat = $_POST['alamat'];
$email = $_POST['email'];
$NOIP = $_SERVER['REMOTE_ADDR'];

//query update
$query = "UPDATE pasien SET nama='$nama' , kelamin='$jk_pasien', umur='$umur', alamat='$alamat', noip='$NOIP', email='$email' WHERE id_pasien='$id_pasien'";
$result=mysqli_query($koneksi,$query) or die ("SQL Error".mysqli_error());
if ($result) {
   header("location:halaman_admin.php?top=datapasien.php");
}
else{
    echo "ERROR, data gagal diupdate". mysqli_error();
}
//mysql_close($host);
?>