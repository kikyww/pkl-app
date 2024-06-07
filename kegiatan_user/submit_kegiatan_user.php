<?php

include '../koneksi/koneksi.php';
session_start();
$id_user = $_SESSION['id_user'];

if (!isset($_SESSION['id_user'])) {
    header("Location: ../login/halaman_login.php");
}
if ($_SESSION['status'] == "Admin") {
    header("Location: ../pages-error-404.html");
} else if (isset($_POST['submit'])) {
    $id_user = $_SESSION['id_user'];
    $nim_kegiatan = $_POST['nim_kegiatan'];
    $piket = $_POST['piket'];
    $tanggal = $_POST['tanggal'];
    $kegiatani = $_POST['kegiatani'];
    $kegiatanii = $_POST['kegiatanii'];
  

    $num = mysqli_query($konek, "SELECT id_kegiatan FROM tb_kegiatan ORDER BY id_kegiatan DESC");
    if (mysqli_num_rows($num) > 0) {
        $num = mysqli_fetch_array($num);
        $idkegiatan = $num['id_kegiatan'] + 1;
    }else {
        $idkegiatan = 1;
    }

    if(isset($_POST['tanggal']) && isset($_POST['kegiatani'])){
        $nim_kegiatan = $_POST['nim_kegiatan'];
        $tanggal = $_POST['tanggal'];
        $kegiatan = $_POST['kegiatani'];
        $kegiatanii = $_POST['kegiatanii'];

        $check_tanggal = mysqli_query($konek, "SELECT id_jadwal FROM tb_jadwal WHERE tanggal = '$tanggal'");
        if (mysqli_num_rows($check_tanggal) > 0) {
            $penempatan = mysqli_fetch_assoc($check_tanggal)['id_jadwal'];
            mysqli_query($konek, "INSERT INTO tb_kegiatan (id_kegiatan, nim_kegiatan, jadwal_id, tanggal, kegiatan, keterangan) VALUES ('$idkegiatan', '$nim_kegiatan', '$penempatan', '$tanggal', '$kegiatani', '$kegiatanii')");
            echo "<script>alert('Kegiatan telah berhasil ditambahkan!');</script>";
            echo '<meta http-equiv="refresh" content="0; url=data_kegiatan_user.php">';
        }else{
            echo "Tanggal tidak ditemukan";
        }
    }



    // $sql = "INSERT INTO tb_kegiatan (id_kegiatan, nim_kegiatan, jadwal_id, tanggal, kegiatan, keterangan) VALUES ('$idkegiatan', '$nim_kegiatan', '$piket', '$tanggal', '$kegiatani', '$kegiatanii')";
    
    // if (mysqli_query($konek, $sql)) {
    //     echo "<script>alert('Kegiatan telah berhasil ditambahkan!');</script>";
    //     echo '<meta http-equiv="refresh" content="0; url=data_kegiatan.php">';
    // } else {
    //     echo "Error: " . $sql . "<br>" . mysqli_error($konek);
    // }
}
mysqli_close($konek);
