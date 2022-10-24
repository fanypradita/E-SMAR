<!DOCTYPE html>
<html>
<head>
 <title>E-SMAR</title>
</head>
<body>
 <style type="text/css">
 body{
 font-family: sans-serif;
 }
 table{
 margin: 20px auto;
 border-collapse: collapse;
 }
 table th,
 table td{
 border: 1px solid #3c3c3c;
 padding: 3px 8px;

 }
 a{
 background: blue;
 color: #fff;
 padding: 8px 10px;
 text-decoration: none;
 border-radius: 2px;
 }

    .tengah{
        text-align: center;
    }
 </style>
 <title>Laporan Cetak</title>
    <div id="print">
    <table class='table1'>
            <tr>
<td><img src='/BT/image/a.png' height="100" width="100"></td>
                <td>
<h2>Scrip Print Data dan Save PDF Pada PHP dan MySQL </h2>
<h2>kodingbuton.com</h2>
<p style="font-size:14px;"><i> Jl. kodingbuton.com</i></p>
    </td>
    </tr>
</table>
 <table>
 <tr>
    <th>No.Buku</th>
	<th>Jenis</th>
	<th>Kelurahan</th>
	<th>Kecamatan</th>
		<th>Rak</th>
        <th>Tingkat</th>
 </tr>
 <?php 
 // koneksi database
 $koneksi = mysqli_connect("localhost","root","","crud");

 // menampilkan data pegawai
 $data = mysqli_query($koneksi,"select * from db");
 while($d = mysqli_fetch_array($data)){
 ?>
 <tr>
 <td style='text-align: center;'><?php echo $d['no_buku'] ?></td>
 <td><?php echo $d['jns']; ?></td>
 <td><?php echo $d['kel']; ?></td>
 <td><?php echo $d['kec']; ?></td>
 <td><?php echo $d['rak']; ?></td>
 <td><?php echo $d['tkt']; ?> </td>
 </tr>
 <?php 
 }
 ?>
    </table>
    <script>
 window.print();
 </script>
</body>
</html>