<?php
include 'koneksi.php';


$TxtKdPenyakit=$_POST['TxtKdPenyakit'];
$TxtKdGejala=$_POST['TxtKdGejala'];
$bobot=$_POST['txtbobot'];

//query update





$query = "INSERT INTO relasi (kd_penyakit,kd_gejala,bobot) VALUES ('$TxtKdPenyakit','$TxtKdGejala','$bobot')";
$result=mysqli_query($koneksi,$query) or die ("SQL Error".mysqli_error());
if ($result) {
   header("location:halaman_admin.php?top=datarule.php");
}
else{
    echo "ERROR, data gagal diupdate". mysqli_error();
}
//mysql_close($host);
?>