<?php
include '../koneksi/koneksi.php';

if (isset($_POST['submit'])) {
    $id = $_POST['id'];
    $tanggal = $_POST['tanggal'];
    $piket = $_POST['piket'];
    $kegiatan = $_POST['kegiatan'];
    $keterangan = $_POST['keterangan'];
    $sql = "UPDATE tb_kegiatan SET tanggal = '$tanggal', kegiatan = '$kegiatan', keterangan = '$keterangan' WHERE id_kegiatan = '$id'";

    if (mysqli_query($konek, $sql)) {
        echo "<script>alert('Kegiatan telah berhasil diperbaharui!');</script>";
        echo '<meta http-equiv="refresh" content="0; url=data_kegiatan_user.php">';
    } else {
        echo "Gagal Diperbaharui " . mysqli_error($konek);
    }
}
?>
