<?php 
//ob_start();
session_start();

include "koneksi.php";
// mengambil variabel dari halaman konsultasiFM.php
$skrining 	= '';
$events 	= '';
if (isset($_POST['skrining']))
{
	$selectors 	= htmlentities(implode(',', $_POST['skrining']));
	//$events 	= htmlentities(implode('', $_POST['bobot']));
}
$data=$selectors;
//$databobot=$events;
echo "$selectors<br>";
//echo "$events";
$input = $data;
	  //memecahkan string input berdasarkan karakter '\r\n\r\n'
	  $pecah = explode("\r\n\r\n", $input);
	  // string kosong inisialisasi
	  $text = "";
	  //untuk setiap substring hasil Jantung, sisipkan <p> di awal dan </p> di akhir
	  // lalu menggabungnya menjadi satu string untuk $text
	  for ($i=0; $i<=count($pecah)-1; $i++)
	  {
	  	$part = str_replace($pecah[$i], "<p>".$pecah[$i]."</p>", $pecah[$i]);
		$text .=$part;
	  }
	  //menampilkan outputnya
echo $text;
//$kosongtabel=mysqli_query($koneksi,"DELETE FROM skrining_pasien");
$text_line=$data;
$text_line =$data; //"Poll number 1, 1500, 250, 150, 100, 1000";
$text_line = explode(",",$text_line);
$posisi=0;
for ($start=0; $start < count($text_line); $start++) {
	$baris=$text_line[$start]; //echo "$baris<br>";
	// Untuk nilai bobot	
	// $bobot=substr($databobot,$posisi,1); echo $bobot. "<br>";
	$id_aut_pas = $_SESSION['id_pas'];	
	$sql="INSERT INTO skrining_pasien (kd_skrining,id_pasien) VALUES ('$baris','$id_aut_pas')";
	$query=mysqli_query($koneksi, $sql) or die(mysqli_error());
	$posisi++;
print $text_line[$start] . "<BR>";
}
ob_start();
echo "<meta http-equiv='refresh' content='0; url=hasil_skrining.php'>";
?>
