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
	$sql="select * from hakkelola where nh like'%$cari%' or
						  kel like '%$cari%' or
						  kec like '%$cari%'";
}else{
	$sql="select * from hakkelola";		
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
	$sql="select * from hakkelola where nh like'%$cari%' or
						  kel like '%$cari%' or
						  kec like '%$cari%'
						  limit $awalData,$jmlDataPerHal";
}else{
	$sql="select * from hakkelola limit $awalData,$jmlDataPerHal";		
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

<!--BEDA SECTION-->
	<?php
	require "koneksi.php";

	$id=$_GET['kode'];
	$sql="select * from hakkelola where id='$id'";
	$qry=mysqli_query($koneksi,$sql);
	$row=mysqli_fetch_assoc($qry);
	?>
	<div class="container1">
		<h4>EDIT DATA BUKU TANAH</h4>	
		<div class="row">	
		<div class="col-sm-9">
			<form enctype="multipart/form-data" method="post" action="simpanEHL.php">
				<div class="form-group">
					<label for="id">Id Buku:</label>
					<input class="form-control" type="text" name="id" id="id" value="<?php echo $row['id']?>" >
				</div>
				<div class="form-group">
					<label for="nh">No.Hak:</label>
					<input class="form-control" type="text" name="nh" id="nh" value="<?php echo $row['nh']?>" >
				</div>
				<div class="form-group">
					<label for="jns">Jenis:</label>
					<input class="form-control" type="text" name="jns" id="jns" value="<?php echo $row['jns']?>">
				</div>
				<div class="form-group">
					<label for="kec">Kecamatan:</label>
					<input class="form-control" type="text" name="kec" id="kec" value="<?php echo $row['kec']?>">
				</div>	
				<div class="form-group">
					<label for="kel">Kelurahan:</label>
					<input class="form-control" type="text" name="kel" id="kel" value="<?php echo $row['kel']?>">
				</div>		
                <div class="form-group">
					<label for="rak">Rak:</label>
					<input class="form-control" type="text" name="rak" id="rak" value="<?php echo $row['rak']?>">
				</div>	
                <div class="form-group">
					<label for="bar">Baris:</label>
					<input class="form-control" type="number" name="bar" id="bar" value="<?php echo $row['bar']?>">
				</div>	
				<div class="form-group">
					<label for="ban">Bandel:</label>
					<input class="form-control" type="text" name="ban" id="ban" value="<?php echo $row['ban']?>">
				</div>			
				<div>		
					<button class="btn btn-primary" type="submit" id="submit">Simpan</button>
				</div>
				<input type="hidden" name="id" id="id" value="<?php echo $id?>">
			</form>
		</div>
		</div>
	</div>
	<script>
		$('#submit').on('click',function(){
			var id 				= $('#id').val();
			var nh 				= $('#nh').val();
			var jns	            = $('#jns').val();
			var kec 	        = $('#kec').val();
			var kel 	        = $('#kel').val();
            var rak 	        = $('#rak').val();
            var bar 	        = $('#bar').val();
			var ban 	        = $('#ban').val();
			$.ajax({
				method	: "POST",
				url		: "simpanEHL.php",
				data	: {id:id, nh:nh, jns:jns, kec:kec, kel:kel, rak:rak, bar:bar ,ban:ban}
			});
		});
	</script>
</body>
</html>