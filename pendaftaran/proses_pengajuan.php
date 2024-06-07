<?php
include '../koneksi/koneksi.php';

$id = $_GET['id'];
$status = $_GET['status'];

if($status == 'Diterima'){
    $sql = mysqli_query($konek, "UPDATE tb_biodata SET status_pkl = '$status' WHERE id_siswa = '$id'");
    if ($sql) {
        echo "<script>alert(`Pengajuan Diterima`);</script>";
        echo '<meta http-equiv="refresh" content="0; url=./data_daftar.php">';
    }
} else {
    $sql = mysqli_query($konek, "UPDATE tb_biodata SET status_pkl = '$status', password = 'ghasjfg71tr7t7615236sdgad62' WHERE id_siswa = '$id'");
    mysqli_query($konek, "UPDATE tb_user SET password = 'ghasjfg71tr7t7615236sdgad62' WHERE id_user = '$id'");
    if ($sql) {
        echo "<script>alert(`Pengajuan Ditolak`);</script>";
        echo '<meta http-equiv="refresh" content="0; url=./data_daftar.php">';
    }
}

$konek->close();
exit();
?>
