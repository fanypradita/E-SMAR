<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>E-SMAR</title>
    <link rel="icon" href="/BT/image/a.png" type="image/png" sizes="144x144">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/css/bootstrap.min.css" integrity="sha384-/Y6pD6FV/Vv2HJnA6t+vslU6fwYXjCFtcEpHbNJ0lyAFsXTsjBbfaDjzALeQsN6M"
        crossorigin="anonymous">
    <link rel="stylesheet" href="style2.css">
	<style>
.dropdown-content {
  display: none;
  position: absolute;
  background-color: #f9f9f9;
  min-width: 160px;
  box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
  z-index: 1;
}
.dropdown-content a {
  float: none;
  color: black;
  padding: 12px 16px;
  text-decoration: none;
  display: block;
  text-align: left;
}
.dropdown-content a:hover {
  background-color: #ddd;
}

.dropdown:hover .dropdown-content {
  display: block;
}
    </style>
</head>

<body>

    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container">
        
        <a class="navbar-brand" href="halaman_admin2.php"><img src="/BT/image/logo.png" width="150" height="40" class="d-inline-block align-top rounded-circle"
            alt=""></a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
            aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
        </button>

<!--BEDA SECTION-->

<?php
//memanggil file berisi fungsi2 yang sering dipakai
require "koneksi.php";

//jumlah data per halaman
$jmlDataPerHal = 3;

//cari jumlah data
if (isset($_POST['cari'])){
	$cari=$_POST['cari'];
	$sql="select * from dhakkelola where no_hak like'%$cari%' or
						  kel like '%$cari%' or
						  kec like '%$cari%'";
}else{
	$sql="select * from dhakkelola";		
}
$qry = mysqli_query($koneksi,$sql) or die(mysqli_error($koneksi));
$jmlData = mysqli_num_rows($qry);

$jmlHal = ceil($jmlData / $jmlDataPerHal);
if (isset($_GET['hal'])){
	$halAktif=$_GET['hal'];
}else{
	$halAktif=1;
}

$awalData=($jmlDataPerHal * $halAktif)-$jmlDataPerHal;

//Jika tabel data kosong
$kosong=false;
if (!$jmlData){
	$kosong=true;
}
//data berdasar pencarian atau tidak
if (isset($_POST['cari'])){
	$cari=$_POST['cari'];
	$sql="select * from dhakkelola where no_hak like'%$cari%' or
						  kel like '%$cari%' or
						  kec like '%$cari%'
						  limit $awalData,$jmlDataPerHal";
}else{
	$sql="select * from dhakkelola limit $awalData,$jmlDataPerHal";		
}
//Ambil data untuk ditampilkan
$hasil=mysqli_query($koneksi,$sql) or die(mysqli_error($koneksi));

?>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item active">
                    <a class="nav-link" href="halaman_admin.php">Home <span class="sr-only">(current)</span></a>
                </li>
                <ul class="navbar-nav">
                <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDarkDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                    Jenis Hak
                </a>
                <ul class="dropdown-content" aria-labelledby="navbarDarkDropdownMenuLink">
                    <li><a class="nav-link" href="HM.php">Hak Milik</a></li>
                    <li><a class="nav-link" href="HGU.php">Hak Guna Usaha</a></li>
                    <li><a class="nav-link" href="HP.php">Hak Pakai</a></li>
                    <li><a class="nav-link" href="HW.php">Hak Wakaf</a></li>
                    <li><a class="nav-link" href="HL.php">Hak Pengelolaan</a></li>
                    <li><a class="nav-link" href="HT.php">Hak Tanggungan</a></li>
                </ul>
                </li>
            </ul>
                <li class="nav-item">
                    <a class="nav-link" href="logout.php">Logout</a>
                </li>
            </ul>
            <form action="" method="post" class="form-inline my-2 my-lg-0">
                <input class="form-control mr-sm-2" name="cari" type="text" placeholder="Kata Kunci" aria-label="Search" autofocus autocomplete="off">
                <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Cari</button>
            </form>
        </div>
        </div>
    </nav>

    <!-- BEDA SECTION -->

<div class="jumbotron jumbotron-fluid bg-petanikode1 text-white">
            <div class="container">
                <div class="row">
                    <div class="col">
					<center>
							<h1 class="an">~ Buku Tanah J.Hak Pengelolaan ~</h1>
						</center>
	<div class="text-center"><a href="prnPdf.php"><span class="fas fa-print">&nbsp;Print</span></a></div>
    </div>
    </div>
</div>
</div>
<div class="utama">
    <span class="float-left">
		<a class="btn btn-success" href="tambahDHL.php">Tambah Data</a>
	</span>
    <!--
	<span class="float-right">
		<form action="" method="post" class="form-inline">
			<button class="btn btn-success" type="submit">Cari</button>
			<input class="form-control mr-2 ml-2" type="text" name="cari" placeholder="cari data mahasiswa..." autofocus autocomplete="off">
		</form>
	</span>-->
	<br><br>
	<ul class="pagination">
		<?php
		//navigasi pagination
		//cetak navigasi back
		if ($halAktif>1){
			$back=$halAktif-1;
			echo "<li class='page-item'><a class='page-link' href=?hal=$back>&laquo;</a></li>";
		}
		//cetak angka halaman
		for($i=1;$i<=$jmlHal;$i++){
			if ($i==$halAktif){
				echo "<li class='page-item'><a class='page-link' href=?hal=$i style='font-weight:bold;color:red;'>$i</a></li>";
			}else{
				echo "<li class='page-item'><a class='page-link' href=?hal=$i>$i</a></li>";
			}	
		}
		//cetak navigasi forward
		if ($halAktif<$jmlHal){
			$forward=$halAktif+1;
			echo "<li class='page-item'><a class='page-link' href=?hal=$forward>&raquo;</a></li>";
		}
		?>
	</ul>	
	<!-- Cetak data dengan tampilan tabel -->
	<table class="table table-hover">
	<thead class="thead-light">
	<tr>
		<th>No.</th>
		<th>Id Buku</th>
        <th>No.Hak</th>
		<th>Tahun</th>
		<th>Jenis</th>
		<th>Nama Pemegang Hak</th>
		<th>Kecamatan</th>
		<th>Desa</th>
		<th>Opsi</th>
	</tr>
	</thead>
	<tbody>
	<?php
	//jika data tidak ada
	if ($kosong){
		?>
		<tr><th colspan="6">
			<div class="alert alert-info alert-dismissible fade show text-center">
			<!--<button type="button" class="close" data-dismiss="alert">&times;</button>-->
			Data tidak ada
			</div>
		</th></tr>
		<?php
	}else{	
		if($awalData==0){
			$no=$awalData+1;
		}else{
			$no=$awalData;
		}
		while($row=mysqli_fetch_assoc($hasil)){
			?>	
			<tr>
				<td><?php echo $no?></td>
				<td><?php echo $row["id"]?></td>
				<td><?php echo $row["no_hak"]?></td>
				<td><?php echo $row["thn"]?></td>
				<td><?php echo $row["jns"]?></td>
                <td><?php echo $row["npk"]?></td>
                <td><?php echo $row["kec"]?></td>
                <td><?php echo $row["kel"]?></td>
				<td>
				<a class="btn btn-outline-primary btn-sm" href="editDHL.php?kode=<?php echo $row['id']?>">Edit</a>
				<a class="btn btn-outline-danger btn-sm" href="hpsDHL.php?kode=<?php echo $row["id"]?>" id="linkHps" onclick="return confirm('Yakin dihapus nih?')">Hapus</a>
				</td>
			</tr>
			<?php 
			$no++;
		}
	}
	?>
	</tbody>
	</table>
</div>
</body>
</html>	
