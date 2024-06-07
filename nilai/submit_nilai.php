<?php

include '../koneksi/koneksi.php';
session_start();
$id_user = $_SESSION['id_user'];

if (!isset($_SESSION['id_user'])) {
    header("Location: ../login/halaman_login.php");
}
if ($_SESSION['status'] != "Admin") {
    header("Location: ../pages-error-404.html");
} else if (isset($_POST['submit'])) {
    $id_user = $_SESSION['id_user'];
    $id_nilai = $_POST['id'];
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

    $num = mysqli_query($konek, "SELECT id_nilai FROM tb_nilai ORDER BY id_nilai DESC");
    if (mysqli_num_rows($num) > 0) {
        $num = mysqli_fetch_array($num);
        $id = $num['id_nilai'] + 1;
    }else {
        $id = 1;
    }

    $sql = "INSERT INTO tb_nilai (id_nilai, nim_nilai, n_sopan, n_disiplin, n_keaktifan, n_sungguh, n_mandiri, n_bersama, n_teliti, n_pendapat, n_menyerap, n_kreatif, rata_rata) VALUES ('$id', '$id_nilai', '$sopan', '$disiplin', '$aktif', '$sungguh', '$mandiri', '$bersama', '$teliti', '$pendapat', '$menyerap', '$kreatif', '$ratarata')";
    if (mysqli_query($konek, $sql)) {       
            echo "<script>alert('Nilai telah berhasil ditambahkan!');</script>";
            echo '<meta http-equiv="refresh" content="0; url=data_nilai.php">';
        } else {
            echo "Error: " . $sql . "<br>" . mysqli_error($konek);
        }
    }
mysqli_close($konek);
