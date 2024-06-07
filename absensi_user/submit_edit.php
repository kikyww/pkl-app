<?php
include '../koneksi/koneksi.php';

if (isset($_POST['submit'])) {
    $id = $_POST['id'];
    // $usn = $_POST['usn'];
    $kehadiran = $_POST['kehadiran'];
    $tanggal = $_POST['tanggal'];
    $keterangan = $_POST['keterangan'];
    $sql = "UPDATE tb_absen SET kehadiran = '$kehadiran', tanggal = '$tanggal', keterangan = '$keterangan' WHERE id_absen = '$id'";

    if (mysqli_query($konek, $sql)) {
        echo "<script>alert('Absensi telah berhasil diperbaharui!');</script>";
        echo '<meta http-equiv="refresh" content="0; url=data_absensi.php">';
    } else {
        echo "Gagal Diperbaharui " . mysqli_error($konek);
    }
}
?>
