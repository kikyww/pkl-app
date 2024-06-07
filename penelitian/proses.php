<?php
include '../header/sidebar.php';
include '../koneksi/koneksi.php';

$id = $_GET['id'];
$status = $_GET['status'];
if ($id) {
    $sql = mysqli_query($konek, "SELECT * FROM tb_penelitian WHERE id_penelitian = '$id'");
    $data = $sql->fetch_assoc();
}

if (isset($_POST['submit'])) {
    $id_penelitian = $_POST['id_penelitian'];
    $no_spen = $_POST['no_spen'];
    $tgl_spen = $_POST['tgl_spen'];
    $tujuan_spen = $_POST['tujuan_spen'];
    $perihal_spen = $_POST['perihal_spen'];
    $lampiran = $_POST['lampiran'];

    $num = mysqli_query($konek, "SELECT id_spen FROM tb_spenelitian ORDER BY id_spen DESC");
    if (mysqli_num_rows($num) > 0) {
        $num = mysqli_fetch_array($num);
        $idsurat = $num['id_spen'] + 1;
    } else {
        $idsurat = 1;
    }

    $sql = "INSERT INTO tb_spenelitian (id_spen, penelitian_id, no_spen, tgl_spen, tujuan_spen, perihal_spen, lampiran) VALUES ('$idsurat', '$id_penelitian', '$no_spen', '$tgl_spen', '$tujuan_spen', '$perihal_spen', '$lampiran')";

    if (mysqli_query($konek, $sql)) {
        mysqli_query($konek, "UPDATE tb_penelitian SET p_status = '$status' WHERE id_penelitian = '$id'");
        echo "<script>alert(`Surat Telah Dibuat`);</script>";
        echo '<meta http-equiv="refresh" content="0; url=data_penelitian.php">';
    }
}


?>

<section class="section">
    <div class="card">
        <div class="card-body">
            <h5 class="card-title">Surat Terima</h5> 
            <form method="POST">
                <input name="id_penelitian" type="text" hidden value="<?= $data['id_penelitian'] ?>" class="form-control">
                <div class="row mb-3">
                    <label for="surat" class="col-sm-2 col-form-label">Nomor Surat</label>
                    <div class="col-sm-10">
                        <input name="no_spen" type="text" class="form-control">
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="surat" class="col-sm-2 col-form-label">Tanggal Terima Surat</label>
                    <div class="col-sm-10">
                        <input name="tgl_spen" type="date" class="form-control">
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="surat" class="col-sm-2 col-form-label">Tujuan Surat</label>
                    <div class="col-sm-10">
                        <input name="tujuan_spen" type="text" class="form-control">
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="surat" class="col-sm-2 col-form-label">Perihal</label>
                    <div class="col-sm-10">
                        <input name="perihal_spen" type="text" class="form-control">
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="surat" class="col-sm-2 col-form-label">Lampiran</label>
                    <div class="col-sm-10">
                        <input name="lampiran" type="text" class="form-control">
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="piket" class="col-sm-2 col-form-label">Nama</label>
                    <div class="col-sm-10">
                        <input type="text" value="<?= $data['p_nama'] ?>" readonly class="form-control">
                        <input name="id_penelitian" hidden type="text" value="<?= $data['id_penelitian'] ?>" class="form-control">
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="piket" class="col-sm-2 col-form-label">Asal Sekolah/Universitas</label>
                    <div class="col-sm-10">
                        <input type="text" value="<?= $data['p_instansi'] ?>" readonly class="form-control">
                    </div>
                </div>
                <div class="d-flex justify-content-end mt-3">
                    <button name="submit" value="submit" type="submit" class="btn btn-success">Kirim</button>
                </div>
        </div>
        </form>
    </div>
    </div>
</section>

<?php
include '../header/footer.php';
?>