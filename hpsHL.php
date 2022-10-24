<?php
 require "koneksi.php"; // untuk memanggil file koneksi.php

$id=$_GET['kode'];
//query untuk delete data
$sql="delete from hakmilik where id=$id";
mysqli_query($koneksi,$sql);
//setelah data dihapus redirect ke halaman tampil.php
header("Location:HL.php");
?>