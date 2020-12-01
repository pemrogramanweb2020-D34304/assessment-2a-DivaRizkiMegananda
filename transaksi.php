<?php
require 'koneksi.php';
$transaksi = query("SELECT * FROM transaksi");


?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>ass 2</title>
</head>

<body>

  <h1> Rekapsulasi Pembayaran </h1>

  <table border="1" cellpadding="10" cellspacing="0">

    <tr>
      <th>No</th>
      <th>ID Transaksi</th>
      <th>Nama pengunjung</th>
      <th>Nama Makanan</th>
      <th>Harga Makanan</th>
    </tr>

    <?php $i = 1;  ?>
    <?php foreach ($transaksi as $row) : ?>
      <tr>
        <td><?= $i++; ?></td>

        <td><?= $row["id_transaksi"]; ?></td>
        <td><?= $row["nama_pengunjung"]; ?></td>
        <td><?= $row["nama_makanan"]; ?></td>
        <td><?= $row["harga_makanan"]; ?></td>

      </tr>
    <?php endforeach; ?>
  </table>


</body>

</html>