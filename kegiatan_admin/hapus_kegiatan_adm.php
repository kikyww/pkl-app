<?php
    include '../koneksi/koneksi.php';
    $id = $_GET['id'];
    $h_kegiatan = mysqli_query($konek, "DELETE FROM tb_kegiatan WHERE id_kegiatan='$id'");
    echo "<script>alert('Kegiatan berhasil dihapus');</script>";
    echo '<meta http-equiv="refresh" content="1;url=data_kegiatan_adm.php">';
