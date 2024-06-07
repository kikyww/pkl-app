<?php
    include '../koneksi/koneksi.php';
    $id = $_GET['id'];
    $h_absensi = mysqli_query($konek, "DELETE FROM tb_absen WHERE id_absen='$id'");
    echo "<script>alert('Absen berhasil dihapus');</script>";
    echo '<meta http-equiv="refresh" content="1;url=data_absensi_adm.php">';
