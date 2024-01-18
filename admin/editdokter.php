<?php
include 'koneksi.php';

$iduser = $_REQUEST['iduser'];
$nama = $_REQUEST['nama'];
$kelamin = $_REQUEST['kelamin'];
$lahir = $_REQUEST['lahir'];
$tgl_lahir = $_REQUEST['tgl_lahir'];
$praktek = $_REQUEST['praktek'];

//query update
$query = "UPDATE user INNER JOIN dokter ON user.iduser = dokter.iduser SET nama='$nama', kelamin='$kelamin', lahir='$lahir', tgl_lahir='$tgl_lahir', praktek='$praktek' WHERE user.iduser='$iduser'";
$result=mysqli_query($koneksi,$query) or die ("SQL Error".mysqli_error());
if ($result) {
   header("location:halaman_admin.php?top=datadokter.php");
}
else{
    echo "ERROR, data gagal diupdate". mysqli_error();
}
//mysql_close($host);
?>