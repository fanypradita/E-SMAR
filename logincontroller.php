<?php 
// mengaktifkan session php
session_start();
 
// menghubungkan dengan koneksi
include 'koneksi.php';
 
// menangkap data yang dikirim dari form
$username = $_POST['username'];
$password = $_POST['password'];
 
// menyeleksi data user dengan username dan password yang sesuai
$result = mysqli_query($koneksi,"SELECT * FROM users where username='$username' and password='$password'");

$cek = mysqli_num_rows($result);
 
if($cek > 0) {
	$data = mysqli_fetch_assoc($result);
 
	//menyimpan session user, nama, status dan id login
	if($data['status']=="admin"){
	// buat session login dan username
	$_SESSION['username'] = $username;
	$_SESSION['nama'] = $data['nama'];
	$_SESSION['id_login'] = $data['id'];
	$_SESSION['status'] = "admin";
	// alihkan ke halaman dashboard admin
	header("location:halaman_admin.php");

} else  if($data['status']=="pegawai"){
		// buat session login dan username
		$_SESSION['username'] = $username;
		$_SESSION['nama'] = $data['nama'];
		$_SESSION['id_login'] = $data['id'];
		$_SESSION['status'] = "pegawai";
		// alihkan ke halaman dashboard admin
		header("location:halaman_pegawai1.php");
} else {

header("location:login.php?pesan=gagal login data tidak ditemukan.");
}
}
?>