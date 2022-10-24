<?php
//memanggil file pustaka fungsi
require "koneksi.php";

//memindahkan data kiriman dari form ke var biasa
$id=$_POST["id"];
$nh=$_POST["nh"];
$jns=$_POST["jns"];
$kec=$_POST["kec"];
$kel=$_POST["kel"];
$rak=$_POST["rak"];
$bar=$_POST["bar"];
$ban=$_POST["ban"];
$uploadOk=1;

//membuat query
$sql="update haktanggung set  nh='$nh',
                     jns='$jns',
                     kec='$kec',
                     kel='$kel',
                     rak='$rak',
                     bar='$bar',
                     ban='$ban'
					 where id='$id'";
mysqli_query($koneksi,$sql) or die(mysqli_error($koneksi));
header("location:HT.php");
?>