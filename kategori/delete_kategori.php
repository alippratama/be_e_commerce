<?php 
include "koneksi.php";

$res = [
  "status" => 200,
  "msg" => "",
  "body" => "",
];

$id = $_GET['id'];

$q = mysqli_query($conn, "DELETE FROM kategori_tb WHERE id='$id'");

if ($q){
  $res['status'] = 200;
  $res['msg'] = "Data berhasil dihapus";
  $res['body'] = "";
} else {
  $res['status'] = 404;
  $res['msg'] = "Data tidak ditemukan";
  $res['body'] = "";
}

echo json_encode($res);

?>