<?php

include '../koneksi/koneksi.php';
session_start();
$id_user = $_SESSION['id_user'];

if (!isset($_SESSION['id_user'])) {
    header("Location: ../login/halaman_login.php");
}
if ($_SESSION['status'] != "User") {
    header("Location: ../404.html");
} else if (isset($_POST['submit'])) {
    $id_user = $_SESSION['id_user'];
    $kehadiran = $_POST['kehadiran'];
    $nim = $_POST['nim'];
    $tanggal = $_POST['tanggal'];
    $keterangan = $_POST['keterangan'];

    $num = mysqli_query($konek, "SELECT id_absen FROM tb_absen ORDER BY id_absen DESC");
    if (mysqli_num_rows($num) > 0) {
        $num = mysqli_fetch_array($num);
        $idabsen = $num['id_absen'] + 1;
    }else {
        $idabsen = 1;
    }
    $sql = "INSERT INTO tb_absen (id_absen, kehadiran, nim_absen, tanggal, keterangan) VALUES ('$idabsen', '$kehadiran', '$nim', '$tanggal', '$keterangan')";
    if (mysqli_query($konek, $sql)) {
        echo "<script>alert('Absensi telah berhasil ditambahkan!');</script>";
        echo '<meta http-equiv="refresh" content="0; url=data_absensi_user.php">';
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($konek);
    }
}
mysqli_close($konek);


?>