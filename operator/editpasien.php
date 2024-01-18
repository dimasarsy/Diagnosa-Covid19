<?php
include 'koneksi.php';

$iduser = $_POST['iduser'];
$nama = $_POST['nama'];
$kelamin = $_POST['kelamin'];
$umur = $_POST['umur'];
$alamat = $_POST['alamat'];
$no_telp = $_POST['no_telp'];

//query update
$query = "UPDATE pasien SET nama='$nama', kelamin='$kelamin', umur='$umur', alamat='$alamat', no_telp='$no_telp' WHERE iduser='$iduser'";

$result=mysqli_query($koneksi,$query) or die ("SQL Error".mysqli_error());
if ($result) {
   header("location:halaman_operator.php?top=datapasien.php");
}
else{
    echo "ERROR, data gagal diupdate". mysqli_error();
}
//mysql_close($host);
?>