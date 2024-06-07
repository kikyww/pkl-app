<?php

include '../koneksi/koneksi.php';
session_start();
$id_user = $_SESSION['id_user'];

if (!isset($_SESSION['id_user'])) {
    header("Location: ../login/halaman_login.php");
}
if ($_SESSION['status'] != "Admin") {
    header("Location: ../404.html");
} else if (isset($_POST['submit'])) {
    $id_user = $_SESSION['id_user'];
    $piket = $_POST['piket'];

    $num = mysqli_query($konek, "SELECT id_piket FROM tb_piket ORDER BY id_piket DESC");
    if (mysqli_num_rows($num) > 0) {
        $num = mysqli_fetch_array($num);
        $idabsen = $num['id_piket'] + 1;
    }else {
        $idabsen = 1;
    }
    $sql = "INSERT INTO tb_piket (id_piket, piket) VALUES ('$idabsen', '$piket')";
    if (mysqli_query($konek, $sql)) {
        echo "<script>alert('piket telah berhasil ditambahkan!');</script>";
        echo '<meta http-equiv="refresh" content="0; url=data_piket.php">';
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($konek);
    }
}
mysqli_close($konek);
