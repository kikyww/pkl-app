<?php
include '../koneksi/koneksi.php';

if (isset($_POST['submit'])) {
    $id = $_POST['id'];
    // $usn = $_POST['usn'];
    $sopan = $_POST['sopan'];
    $disiplin = $_POST['disiplin'];
    $aktif = $_POST['aktif'];
    $sungguh = $_POST['sungguh'];
    $mandiri = $_POST['mandiri'];
    $bersama = $_POST['bersama'];
    $teliti = $_POST['teliti'];
    $pendapat = $_POST['pendapat'];
    $menyerap = $_POST['menyerap'];
    $kreatif = $_POST['kreatif'];
    $ratarata = $_POST['ratarata'];

    $sql = "UPDATE tb_nilai SET n_sopan = '$sopan', n_disiplin = '$disiplin', n_keaktifan = '$aktif', n_sungguh = '$sungguh', n_mandiri = '$mandiri', n_bersama = '$bersama', n_teliti = '$teliti', n_pendapat = '$pendapat', n_menyerap = '$menyerap', n_kreatif = '$kreatif', rata_rata = '$ratarata' WHERE id_nilai = '$id'";

    if (mysqli_query($konek, $sql)) {
        echo "<script>alert('Nilai telah berhasil diperbaharui!');</script>";
        echo '<meta http-equiv="refresh" content="0; url=data_nilai.php">';
    } else {
        echo "Gagal Diperbaharui " . mysqli_error($konek);
    }
}
