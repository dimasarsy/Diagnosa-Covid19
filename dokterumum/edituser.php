<?php
include 'koneksi.php';

$iduser = $_POST['iduser'];
$nama = $_POST['nama'];
$username = $_POST['username'];
$password = $_POST['password'];
$level = $_POST['level'];

//query update
$query = "UPDATE user SET nama='$nama' , username='$username', password='$password', level='$level' WHERE iduser='$iduser'";
$result=mysqli_query($koneksi,$query) or die ("SQL Error".mysqli_error());
if ($result) {
   header("location:halaman_dokter.php?top=datauser.php");
}
else{
    echo "ERROR, data gagal diupdate". mysqli_error();
}
//mysql_close($host);
?>