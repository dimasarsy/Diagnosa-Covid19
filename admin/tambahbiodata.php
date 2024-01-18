<?php 
//ob_start();
session_start();

include "koneksi.php";
// mengambil variabel dari halaman konsultasiFM.php
$lahir = $_POST['lahir'];
$tgl_lahir = $_POST['tgl_lahir'];
$kelamin = $_POST['kelamin'];
$praktek = $_POST['praktek'];

$skrining   = '';
$events  = '';

//echo "$events";

   $id_aut_pas = $_SESSION['id_pas'];
     
   $sql="INSERT INTO dokter(lahir,tgl_lahir,kelamin,praktek,iduser) VALUES ('$lahir','$tgl_lahir','$kelamin','$praktek','$id_aut_pas')";
   $query=mysqli_query($koneksi, $sql) or die(mysqli_error());

ob_start();
echo "<meta http-equiv='refresh' content='0; url=halaman_admin.php?top=datauser.php'>";
?>
