<?php

include '../koneksi/koneksi.php';
session_start();
$id_user = $_SESSION['id_user'];

if (!isset($_SESSION['id_user'])) {
    header("Location: ../login/halaman_login.php");
}
if ($_SESSION['status'] == "User") {
    header("Location: ../pages-error-404.html");
} else if (isset($_POST['submit'])) {
    $id_user = $_SESSION['id_user'];
    $nama = $_POST['nama'];
    $tanggal = $_POST['tanggal'];
    $piket = $_POST['piket'];
  


    $num = mysqli_query($konek, "SELECT id_jadwal FROM tb_jadwal ORDER BY id_jadwal DESC");
    if (mysqli_num_rows($num) > 0) {
        $num = mysqli_fetch_array($num);
        $idkegiatan = $num['id_jadwal'] + 1;
    } else {
        $idkegiatan = 1;
    }
    $sql = "INSERT INTO tb_jadwal (id_jadwal, nim_jadwal, tanggal, piket_id) VALUES ('$idkegiatan', '$nama', '$tanggal', '$piket')";

    if (mysqli_query($konek, $sql)) {
        echo "<script>alert('Jadwal telah berhasil ditambahkan!');</script>";
        echo '<meta http-equiv="refresh" content="0; url=data_jadwal.php">';
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($konek);
    }
}
mysqli_close($konek);
