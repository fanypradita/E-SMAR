<?php
//memanggil file pustaka fungsi
require "koneksi.php";

//memindahkan data kiriman dari form ke var biasa
$id=$_POST["id"];
$no_hak=$_POST["no_hak"];
$thn=$_POST["thn"];
$jns=$_POST["jns"];
$npk=$_POST["npk"];
$kec=$_POST["kec"];
$kel=$_POST["kel"];
$uploadOk=1;

//membuat query
$sql="update dhakpakai set  no_hak='$no_hak',
                     thn='$thn',
                     jns='$jns',
                     npk='$npk',
                     kec='$kec',
                     kel='$kel'
					 where id='$id'";
mysqli_query($koneksi,$sql) or die(mysqli_error($koneksi));
header("location:detailHT.php");
?>