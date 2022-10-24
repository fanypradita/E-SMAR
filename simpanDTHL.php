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


// Check jika terjadi kesalahan
if ($uploadOk == 0) {
    echo "Maaf, file tidak dapat terupload<br>";
// jika semua berjalan lancar
} else {
    if ($uploadOk == 1) {
        //membuat query
		$sql="insert dhakkelola values('$id','$no_hak','$thn','$jns','$npk','$kec','$kel')";
		mysqli_query($koneksi,$sql);
		header("location:detailHL.php");
		//echo "File ". basename( $_FILES["foto"]["name"]). " berhasil diupload";
    } else {
        echo "Maaf, terjadi kesalahan saat mengupload file foto<br>";
    }
}
?>