<?php
include '../koneksi/koneksi.php';
$id = $_GET['id'];
$h_absensi = mysqli_query($konek, "DELETE FROM tb_piket WHERE id_piket='$id'");
echo "<script>alert('Piket berhasil dihapus');</script>";
echo '<meta http-equiv="refresh" content="1;url=data_piket_adm.php">';
