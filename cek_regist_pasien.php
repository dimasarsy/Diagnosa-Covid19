<?php

session_start();
include 'koneksi.php';

$username = $_POST['username'];
$password = $_POST['password'];
$level = $_POST['level'];


$sql = "INSERT INTO users (username,password,level) VALUES ('$username','$password','$level')";

mysqli_query($koneksi,$sql) or die ("SQL Error 2".mysqli_error());

$query_pasien=mysqli_query($koneksi, "SELECT * FROM users ORDER BY iduser DESC") or die(mysql_error());
   $row_pasien=mysqli_fetch_array($query_pasien)or die(mysqli_error());
   $iduser=$row_pasien['iduser'];   
   $_SESSION['id_pas'] = $iduser;

if ($row_pasien) {
   header("location:index.php");
}
else{
    echo "ERROR, data gagal diupdate". mysqli_error();
}
//mysql_close($host);
?>