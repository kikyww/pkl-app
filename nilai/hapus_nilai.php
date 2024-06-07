<?php
    include '../koneksi/koneksi.php';
    $id = $_GET['id'];
    $h_nilai = mysqli_query($konek, "DELETE FROM tb_nilai WHERE id_nilai='$id'");
    echo "<script>alert('Nilai berhasil dihapus');</script>";
    echo '<meta http-equiv="refresh" content="1;url=data_nilai.php">';
