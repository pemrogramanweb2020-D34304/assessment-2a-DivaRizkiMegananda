<?php
require 'koneksi.php';
if (isset($_POST["submit"])) {
  //cekkk data berhasil
  if (tambah($_POST) > 0) {
    echo "
    <script>
    alert('data berhasil ditambahkan, sialhkan memesan makanan');
    document.location.href = 'tampil.php';
    </script>
    ";
  } else {

    echo "<script>
    alert('data gagal ditambahkan!');
    document.location.href = 'tambah.php';
    </script>";
  }
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Input Pesanan</title>
</head>

<body>

  <a href="tampil.php">
    <h3>Lihat Menu </h3>
  </a>

  <form action="" method="POST">

    <ul>
      <li>
        <label for="nama_pengunjung">
          Nama Pengunjung
          <input type="text" name="nama_pengunjung" id="nama_pengunjung" required>
        </label>
      </li>
      <li><button type="submit" name="submit">Submit</button></li>
    </ul>

  </form>

</body>

</html>