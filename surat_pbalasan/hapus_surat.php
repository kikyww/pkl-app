<?php
    include '../koneksi/koneksi.php';
    $id = $_GET['id'];
    
    mysqli_query($konek, "UPDATE tb_penelitian SET p_status = 'Proses' WHERE id_penelitian = '$id'");
    mysqli_query($konek, "DELETE FROM tb_spenelitian WHERE id_spen='$id'");
    
    echo "<script>alert('Surat Balasan Izin Penelitian berhasil dihapus');</script>";
    echo '<meta http-equiv="refresh" content="1;url=data_surat.php">';
?>