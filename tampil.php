<?php
require 'koneksi.php';
$makanan = query("SELECT * FROM makanan");

if (isset($_POST["submit"])) {
  //cekkk data berhasil
  if (tambahPesan1($_POST) > 0) {
    echo "
    <script>
    alert('data berhasil ditambahkan, terimakasih telah memesan');
    document.location.href = 'transaksi.php';
    </script>
    ";
  } else {

    echo "<script>
    alert('data gagal ditambahkan!');
    document.location.href = 'tampil.php';
    </script>";
  }
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>ass 2</title>
</head>

<body>

  <h1> tampilan menu </h1>

  <table border="1" cellpadding="10" cellspacing="0">

    <tr>
      <th>No</th>
      <th>ID Makanan</th>
      <th>Nama makanan</th>
      <th>harga makanan</th>
    </tr>

    <?php $i = 1;  ?>
    <?php foreach ($makanan as $row) : ?>
      <tr>
        <td><?= $i++; ?></td>

        <td><?= $row["id_makanan"]; ?></td>
        <td><?= $row["nama_makanan"]; ?></td>
        <td><?= $row["harga_makanan"]; ?></td>

      </tr>
    <?php endforeach; ?>
  </table>

  <form action="" method="POST">

    <ul>
      <li>
        <label for="nama_makanan">
          Nama Makanan 1
          <input type="text" name="nama_makanan" id="nama_makanan" required>
        </label>
      </li>
      <li>
        <label for="nama_makanan">
          Nama Makanan 2
          <input type="text" name="nama_makanan" id="nama_makanan" required>
        </label>
      </li>
      <li><button type="submit" name="submit">Submit</button></li>
    </ul>

  </form>

</body>

</html>