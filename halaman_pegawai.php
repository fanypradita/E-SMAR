<?php 
//memulai session yang disimpan pada browser
session_start();
//cek apakah sesuai status sudah login? kalau belum akan kembali ke form login
if($_SESSION['status']!="pegawai"){
//melakukan pengalihan
header("location:login/login.php");
} 
?>
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

.container {
    max-width: 1275px;
    width: 100%;
    
}
.btn-info {
    color: #fff;
    background-color: #008080; */
    /* border-color: #17a2b8; */
}

.col-sm-8 {
max-width: 10000px;
}
.bg-petanikode {
    background: #008080;
    padding: 50px;
}
body {
                background: #008080;
                text-align: center;
                color: white;
            }
            a {
                color: gold;
            }
            input[type=text] {
                width: 250px;
                padding: 5px;
            }
            input[type=submit] {
                padding: 10px;
                width:60px;
            }
h1{
  font-size: 60px;
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

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item active">
                    <a class="nav-link" href="halaman_pegawai.php">Home <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="logout.php">Logout</a>
                </li>
            </ul>
        </div>
        </div>
    </nav>
    <div class="col-sm-8">

<!--BEDA SECTION-->
        <?php 
            switch(@$_GET['mod']) { 
                default: ?>
<br><br><br><br><br>
<header>
        <div class="jumbotron jumbotron-fluid bg-petanikode text-white">
            <div class="container">
                <div class="row">
                    <div class="col">
                        <h1>Selamat Datang <?php echo $_SESSION['nama']; ?></h1>
                        <p class="lead">Cari dan Pinjam Buku tanah menjadi mudah dengan E-SMAR</p>
                        <br>
                        <form method="POST" action="?mod=cari">
                          <input type="text" name="keyword" placeholder="Cari buku menjadi mudah.." autofocus>
                          <input class="btn btn-outline-success my-4 my-sm-0" type="submit" value="Cari">
                        </form>
                        <br>
                        <form method="POST" action="?mod=cari">
                          <button class="btn btn-outline-success my-4 my-sm-0" type="submit" value="Cari">
                        </form>
                    </div>
                </div>
           </div>
        </div>
    </header>

    
                <?php
                break;

            case 'cari':

                // Koneksi database
                $db = mysqli_connect('localhost', 'root', '', 'crud');

                // hilangkan spasi kiri dan kanan
                $keyword = trim($_POST['keyword']);

                // pisahkan dan hitung jumlah keyword
                $pisah_kata = explode(" ", $keyword);
                $jumlah_kata = (integer)count($pisah_kata);
                $jml_kata = $jumlah_kata - 1;

                // query untuk pencarian multiple keyword
                $sql = "SELECT * FROM pegawai WHERE ";
                for ($i=0; $i<=$jml_kata; $i++){
                    $sql .= "id LIKE '%$pisah_kata[$i]%'";  
                    if($i < $jml_kata){
                        $sql .= " OR ";
                    }
                }
                $sql .= " ORDER BY id DESC";
                $hasil = $db->query($sql);

                // Tampilkan ke dalam halaman web
                
                echo "<h3><br><br>Keyword Pencarian: <u>$keyword</u></h3>";
                if ($keyword !='') {
                    while ($data = $hasil->fetch_array()) {
                        echo "- $data[id]<br>";
                    }
                        echo "<br><br><a href='javascript:history.go(-1)'>Back</a>";
                }

                elseif ($keyword =='') { 
                    echo "No Result"; 
                    echo "<br><br><a href='javascript:history.go(-1)'>Back</a>";
                }
                break;
            }
            ?>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN"
        crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js" integrity="sha384-b/U6ypiBEHpOf/4+1nzFpr53nxSS+GLCkfwBdFNTxtclqqenISfwAzpKaMNFNmj4"
        crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/js/bootstrap.min.js" integrity="sha384-h0AbiXch4ZDo7tp9hKZ4TsHbi047NrKGLO3SEJAg45jXxnGIfYzk4Si90RDIqNm1"
        crossorigin="anonymous"></script>
</body>

</html>