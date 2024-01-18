<?php
include 'koneksi.php';

$iduser = $_POST['iduser'];
$username = $_POST['username'];
$password = $_POST['password'];

//query update
$query = "UPDATE users SET  username='$username', password='$password' WHERE iduser='$iduser'";
$result=mysqli_query($koneksi,$query) or die ("SQL Error".mysqli_error());
if ($result) {
   header("location:halaman_operator.php?top=datauser.php");
}
else{
    echo "ERROR, data gagal diupdate". mysqli_error();
}
//mysql_close($host);
?>