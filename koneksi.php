<?php

$conn = mysqli_connect("localhost", "root", "", "restoran");

function query($query)
{

  global $conn;
  $result = mysqli_query($conn, "SELECT * FROM  makanan");
  $rows = [];
  while ($row = mysqli_fetch_assoc($result)) {
    $rows[] = $row;
  }
  return $rows;
}

function queryPesan1($query)
{

  global $conn;
  $result = mysqli_query($conn, "SELECT * FROM  transaksi");
  $rows = [];
  while ($row = mysqli_fetch_assoc($result)) {
    $rows[] = $row;
  }
  return $rows;
}

function tambah($data)
{
  global $conn;
  $nama_pengunjung = htmlspecialchars($data["nama_pengunjung"]);

  //insert data
  $query = "INSERT INTO pengunjung
   VALUES 
   ('','$nama_pengunjung');
";
  mysqli_query($conn, $query);
  return mysqli_affected_rows($conn);
}

function tambahPesan1($data)
{
  global $conn;
  $nama_pengunjung = htmlspecialchars($data["nama_pengunjung"]);
  $nama_makanan = htmlspecialchars($data["nama_makanan"]);
  $harga_makanan = htmlspecialchars($data["harga_makanan"]);
  //insert data
  $query = "INSERT INTO transaksi
   VALUES 
   ('','$nama_pengunjung','$nama_makanan','$harga_makanan');
";
  mysqli_query($conn, $query);
  return mysqli_affected_rows($conn);
}

// nyoba upload 
function upload()
{
  $namaFile = $_FILES['gambar']['name'];
  $ukuranFile = $_FILES['gambar']['size'];
  $error = $_FILES['gambar']['error'];
  $tmpName = $_FILES['gambar']['tmp_name'];

  //cek apakah tidak ada gambar yg diupload
  if ($error === 4) {
    echo "<script>
				alert('Pilih gambar terlebih dahulu!');
			</script>";
    return false;
  }

  //cek apakah yang diupload adalah gambar
  $ekstensiGambarValid = ['jpg', 'jpeg', 'png'];
  $ekstensiGambar = explode('.', $namaFile);
  $ekstensiGambar = strtolower(end($ekstensiGambar));
  if (!in_array($ekstensiGambar, $ekstensiGambarValid)) {
    echo "<script>
				alert('Yang diupload bukan berekstensi gambar!');
			</script>";
    return false;
  }

  //cek jika ukuran terlalu bEEsarrr
  if ($ukuranFile > 5000000) {
    echo "<script>
				alert('Ukuran gambar terlalu besar!');
			</script>";
    return false;
  }

  //lolos pengecekan, gambar siap diupload
  // generate nama gambar baru
  $namaFileBaru = uniqid();
  $namaFileBaru .= '.';
  $namaFileBaru .= $ekstensiGambar;
  move_uploaded_file($tmpName, 'img/' . $namaFileBaru);
  return $namaFileBaru;
}
