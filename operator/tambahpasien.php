<?php
session_start();

include 'koneksi.php';


$nama = $_POST['nama'];
$kelamin = $_POST['kelamin'];
$umur = $_POST['umur'];
$alamat = $_POST['alamat'];

//query update


$query = "INSERT INTO users (nama,kelamin,umur,alamat,tanggal) 
			VALUES ('$nama','$kelamin','$umur','$alamat',NOW())";
$result=mysqli_query($koneksi,$query) or die ("SQL Error".mysqli_error());

      $_SESSION['id'] = $id;
      $_SESSION['nama'] = $nama; 
      $_SESSION['kelamin'] = $kelamin;    
      $_SESSION['umur'] = $umur;
      $_SESSION['alamat'] = $alamat;

if ($result) {
   header("location:halaman_operator.php?top=datapasien.php");
}
else{
    echo "ERROR, data gagal diupdate". mysqli_error();
}
//mysql_close($host);
?>