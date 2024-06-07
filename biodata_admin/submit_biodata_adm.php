<?php 

include '../koneksi/koneksi.php';
if (isset($_POST['submit'])) {
    $nama = $_POST['nama'];
    $nim = $_POST['nim'];
    $pendidikan = $_POST['pendidikan'];
    $jurusan = $_POST['jurusan'];
    $alamat = $_POST['alamat'];
    $telepon = $_POST['telepon'];
    $lahir = $_POST['lahir'];
    $masuk = $_POST['masuk'];
    $keluar = $_POST['keluar'];
    $password = $_POST['password'];
    $status = $_POST['status'];

    $num = mysqli_query($konek, "SELECT id_user FROM tb_user ORDER BY id_user DESC");
    if (mysqli_num_rows($num) > 0) {
        $num = mysqli_fetch_array($num);
        $idUser = $num['id_user'] + 1;
    }else {
        $idUser = 1;
    }
    $sql = "INSERT INTO tb_user VALUE ('$nim', '$idUser', '$password', '$status')";
    if (mysqli_query($konek, $sql)) {
    $sql = "INSERT INTO tb_biodata VALUE ('$idUser', '$nama', '$nim', '$pendidikan', '$jurusan', '$alamat', '$telepon', '$lahir', '$masuk', '$keluar',  '$password', '$status')";
        mysqli_query($konek, $sql);
        echo "<script>alert(`1 $status telah anda tambahkan`);</script>";
        echo '<meta http-equiv="refresh" content="0; url=data_biodata.php">';
    } else {
        echo "<script>alert(`Nim Telah Digunakan!`);</script>";
    }
}
