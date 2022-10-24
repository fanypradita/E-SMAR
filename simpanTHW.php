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


// Check jika terjadi kesalahan
if ($uploadOk == 0) {
    echo "Maaf, file tidak dapat terupload<br>";
// jika semua berjalan lancar
} else {
    if ($uploadOk == 1) {
        //membuat query
		$sql="insert hakwakaf values('$id','$nh','$jns','$kec','$kel','$rak','$bar','$ban')";
		mysqli_query($koneksi,$sql);
		header("location:HW.php");
		//echo "File ". basename( $_FILES["foto"]["name"]). " berhasil diupload";
    } else {
        echo "Maaf, terjadi kesalahan saat mengupload file foto<br>";
    }
}
?>