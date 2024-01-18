<?php
include 'koneksi.php';

$iduser = $_REQUEST['iduser'];
$nama = $_REQUEST['nama'];
$username = $_REQUEST['username'];
$password = md5($_REQUEST['password']);
$level = $_REQUEST['level'];

//query update
$query = "UPDATE user SET nama='$nama' , username='$username', password='$password', level='$level' WHERE iduser='$iduser'";
$result=mysqli_query($koneksi,$query) or die ("SQL Error".mysqli_error());
if ($result) {
   header("location:halaman_admin.php?top=datauser.php");
}
else{
    echo "ERROR, data gagal diupdate". mysqli_error();
}
//mysql_close($host);
?>