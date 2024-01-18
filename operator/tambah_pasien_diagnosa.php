<?php
session_start();

include 'koneksi.php';

$nama = $_POST['nama'];
$jk_pasien = $_POST['jk_pasien'];
$umur = $_POST['umur'];
$alamat = $_POST['alamat'];
$no_telp = $_POST['no_telp'];
$email = $_POST['email'];
$NOIP = $_SERVER['REMOTE_ADDR'];

$id_aut = $_SESSION['id_pas']; 

$sql = "INSERT INTO pasien (nama, kelamin, umur, alamat, noip, tanggal, no_telp, email, iduser) VALUES ('$nama','$jk_pasien','$umur','$alamat','$NOIP',NOW(),'$no_telp','$email','$id_aut')";

mysqli_query($koneksi,$sql) or die ("SQL Error 2".mysqli_error());
				
$query_pasien=mysqli_query($koneksi, "SELECT * FROM pasien ORDER BY id_pasien DESC") or die(mysql_error());
	$row_pasien=mysqli_fetch_array($query_pasien)or die(mysqli_error());
	$id_pasien=$row_pasien['id_pasien'];	
	$_SESSION['id_pas'] = $id_pasien;

if($row_pasien){
		  $nomor = $id_pasien;										
				// include file qrlib.php
				include "../phpqrcode/qrlib.php";
			
				//Nama Folder file QR Code kita nantinya akan disimpan
				$tempdir = "../temp/";
			
				//jika folder belum ada, buat folder 
				if (!file_exists($tempdir)){
					mkdir($tempdir);
				}
			
				#parameter inputan
				$isi_teks = $nomor;
				$namafile = $nomor.".png";
				$quality = 'H'; //ada 4 pilihan, L (Low), M(Medium), Q(Good), H(High)
				$ukuran = 5; //batasan 1 paling kecil, 10 paling besar
				$padding = 2;
			
				QRCode::png($isi_teks,$tempdir.$namafile,$quality,$ukuran,$padding);
				
				echo "<meta http-equiv='refresh' content='0; url=skrining.php'>";
				
	}
	else {
    echo "ERROR, data gagal ditambah". mysqli_error();
}

?>