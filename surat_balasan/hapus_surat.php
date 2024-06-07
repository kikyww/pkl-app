<?php
    include '../koneksi/koneksi.php';
    $id = $_GET['id'];
    $h_kegiatan = mysqli_query($konek, "DELETE FROM tb_surat WHERE id_surat='$id'");
    echo "<script>alert('Surat Balasan Izin PKL berhasil dihapus');</script>";
    echo '<meta http-equiv="refresh" content="1;url=data_surat.php">';
?>