<?php
  require_once "koneksi.php";
 
  if (isset($_POST['query'])) {
      $query = "SELECT * FROM pegawai WHERE id LIKE '{$_POST['query']}%' LIMIT 100";
      $result = mysqli_query($koneksi, $query);
    if (mysqli_num_rows($result) > 0) {
        while ($res = mysqli_fetch_array($result)) {
        echo $res['id']. "<br/>";
      }
    } else {
      echo "
      <div class='alert alert-danger mt-3 text-center' role='alert'>
          Book not found
      </div>
      ";
    }
  }
?>