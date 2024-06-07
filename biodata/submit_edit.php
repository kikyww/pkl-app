<?php
include '../koneksi/koneksi.php';

if (isset($_POST['submit'])) {
    $id = $_POST['id'];
    $nama_mhs = $_POST['nama_mhs'];
    $nim = $_POST['nim'];
    $asal_pendidikan = $_POST['asal_pendidikan'];
    $jurusan = $_POST['jurusan'];
    $tgl_lahir = $_POST['tgl_lahir'];
    $alamat = $_POST['alamat'];
    $telepon = $_POST['telepon'];
    $tgl_masuk = $_POST['tgl_masuk'];
    $tgl_keluar = $_POST['tgl_keluar'];
    $password = $_POST['password'];

    $sql = "UPDATE tb_biodata
        INNER JOIN tb_user ON tb_biodata.id_siswa = tb_user.id_user
        SET tb_biodata.nama_mhs='$nama_mhs', tb_biodata.nim='$nim', tb_biodata.asal_pendidikan='$asal_pendidikan', tb_biodata.jurusan='$jurusan', tb_biodata.tgl_lahir='$tgl_lahir',tb_biodata.alamat='$alamat', tb_biodata.telepon='$telepon', tb_biodata.tgl_masuk='$tgl_masuk', tb_biodata.tgl_keluar='$tgl_keluar', tb_biodata.password='$password', tb_user.password='$password' WHERE id_siswa='$id'";

    if (mysqli_query($konek, $sql)) {
        echo "<script>alert('Data $nama_mhs telah berhasil diperbaharui!');</script>";
        echo '<meta http-equiv="refresh" content="0; url=data_biodata.php">';
    } else {
        echo "Error updating record: " . mysqli_error($konek);
    }
}
