<?php
include "koneksi.php";

$res = [
  "status" => 200,
  "msg" => "",
  "body" => [
    "data" => [
      "nama_kategori" => "",
    ]
  ]
];

$id = $_GET['id'];
$id = $_POST['id'];
$nama_kategori = $_POST['nama_kategori'];

$q = mysqli_query($conn, "SELECT * FROM kategori_tb WHERE id='$id'");
$ary = mysqli_fetch_array($q);

// Gunakan prepared statements untuk mencegah SQL injection
$stmt = $conn->prepare("UPDATE kategori_tb SET nama_kategori = ? WHERE id = ?");
$stmt->bind_param("si", $nama_kategori, $id);

if ($stmt->execute()) {
  $res['msg'] = "Data berhasil diupdate";
  $res['body']['data']['nama_kategori'] = $nama_kategori;
} else {
  $res['status'] = 404;
  $res['msg'] = "Gagal mengupdate kategori";
  $res['body']['error'] = "Kesalahan validasi input";
}

$stmt->close();
$conn->close();

echo json_encode($res);
?>
