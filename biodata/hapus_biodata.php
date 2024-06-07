<?php
    include '../koneksi/koneksi.php';
    $nim = $_GET['nim'];
    mysqli_query($konek, "DELETE FROM tb_biodata WHERE nim ='$nim'");
    mysqli_query($konek, "DELETE FROM tb_user WHERE nim_user ='$nim'");
    echo "<script>alert('Biodata berhasil dihapus');</script>";
    echo '<meta http-equiv="refresh" content="1;url=data_biodata.php">';
