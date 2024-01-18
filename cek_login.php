<?php 
// mengaktifkan session pada php
session_start();
 
// menghubungkan php dengan koneksi database
include 'koneksi.php';
 
// menangkap data yang dikirim dari form login
$username = $_POST['username'];
$password = md5($_POST['password']);
 
//query
$query  = "SELECT * FROM user WHERE username='$username' AND password='$password'";
$result     = mysqli_query($koneksi, $query);
$num_row     = mysqli_num_rows($result);
$row         = mysqli_fetch_array($result);

 
// cek apakah username dan password di temukan pada database
if($num_row >= 1){
 
	// cek jika user login sebagai admin
	if($row['level']=="admin"){
 
		echo "admin";
		$_SESSION['iduser'] = $row['iduser'];
		$_SESSION['username'] = $row['username'];
		$_SESSION['level'] = "admin";
 
	// cek jika user login sebagai dokter umum
	}else if($row['level']=="dokterumum"){
		
		echo "dokter";
		$_SESSION['nama'] = $row['nama'];
		$_SESSION['iduser'] = $row['iduser'];
		$_SESSION['username'] = $row['username'];
		$_SESSION['level'] = "dokterumum";
		// alihkan ke halaman dashboard pengurus
 
	}else if($row['level']=="dokterparu"){
		
		echo "dokter";
		$_SESSION['nama'] = $row['nama'];
		$_SESSION['iduser'] = $row['iduser'];
		$_SESSION['username'] = $row['username'];
		$_SESSION['level'] = "dokterparu";
		// alihkan ke halaman dashboard pengurus
 
	}else if($row['level']=="dokterdalam"){
		
		echo "dokter";
		$_SESSION['nama'] = $row['nama'];
		$_SESSION['iduser'] = $row['iduser'];
		$_SESSION['username'] = $row['username'];
		$_SESSION['level'] = "dokterdalam";
		// alihkan ke halaman dashboard pengurus
 
	}else{
 
		// alihkan ke halaman login kembali
		header("location:login_admin.php?pesan=gagal");
	}	
}else{
	header("location:login_admin.php?pesan=gagal");
}
 
?>