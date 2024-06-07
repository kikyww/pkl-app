<?php
include '../header/sidebar.php';
include '../koneksi/koneksi.php';

$id = $_GET['id'];
$status = $_GET['status'];
if($id){
    $sql = mysqli_query($konek, "SELECT * FROM tb_biodata WHERE id_siswa = '$id'");
    $data = $sql->fetch_assoc();
}

if (isset($_POST['submit'])) {
    $no_surat = $_POST['no_surat'];
    $tgl_terima = $_POST['tgl_terima'];
    $no_terima = $_POST['no_terima'];
    $lampiran = $_POST['lampiran'];
    $perihal = $_POST['perihal'];
    $tujuan_surat = $_POST['tujuan_surat'];
    $hal = $_POST['hal'];
    $id_bio = $_POST['id_bio'];
    
    $num = mysqli_query($konek, "SELECT id_surat FROM tb_surat ORDER BY id_surat DESC");
    if (mysqli_num_rows($num) > 0) {
        $num = mysqli_fetch_array($num);
        $idsurat = $num['id_surat'] + 1;
    }else {
        $idsurat = 1;
    }

    $sql = "INSERT INTO tb_surat (id_surat, no_surat, tgl_terima, no_terima, lampiran, perihal, tujuan_surat, hal_surat, biodata_id) VALUES ('$idsurat', '$no_surat', '$tgl_terima', '$no_terima', '$lampiran', '$perihal', '$tujuan_surat', '$hal', '$id_bio')";

    if (mysqli_query($konek, $sql)) {
        mysqli_query($konek, "UPDATE tb_biodata SET status_pkl = '$status' WHERE id_siswa = '$id'");
        echo "<script>alert(`Surat Terima Telah Dibuat`);</script>";
        echo '<meta http-equiv="refresh" content="0; url=data_daftar.php">';
    } 
}


?>

<section class="section">
    <div class="card">
        <div class="card-body">
            <h5 class="card-title">Surat Terima</h5>
            <form method="POST">
                <div class="row mb-3">
                    <label for="surat" class="col-sm-2 col-form-label">No Surat</label>
                    <div class="col-sm-10">
                        <input name="no_surat" type="text" class="form-control">
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="surat" class="col-sm-2 col-form-label">Tanggal Terima Surat</label>
                    <div class="col-sm-10">
                        <input name="tgl_terima" type="date" class="form-control">
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="surat" class="col-sm-2 col-form-label">No. Surat Diterima</label>
                    <div class="col-sm-10">
                        <input name="no_terima" type="text" class="form-control">
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="surat" class="col-sm-2 col-form-label">Lampiran</label>
                    <div class="col-sm-10">
                        <input name="lampiran" type="text" class="form-control">
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="surat" class="col-sm-2 col-form-label">Perihal</label>
                    <div class="col-sm-10">
                        <input name="perihal" type="text" class="form-control">
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="piket" class="col-sm-2 col-form-label">Tujuan Surat</label>
                    <div class="col-sm-10">
                        <input name="tujuan_surat" type="text" class="form-control">
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="piket" class="col-sm-2 col-form-label">Hal Surat</label>
                    <div class="col-sm-10">
                        <input name="hal" type="text" class="form-control">
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="piket" class="col-sm-2 col-form-label">Nama</label>
                    <div class="col-sm-10">
                        <input type="text" value="<?= $data['nama_mhs'] ?>" readonly class="form-control">
                        <input name="id_bio" hidden type="text" value="<?= $data['id_siswa'] ?>" class="form-control">
                    </div>
                </div>

                <div class="row mb-3">
                    <label for="piket" class="col-sm-2 col-form-label">Asal Sekolah/Universitas</label>
                    <div class="col-sm-10">
                        <input type="text" value="<?= $data['asal_pendidikan'] ?>" readonly class="form-control">
                    </div>
                </div>
                <div class="d-flex justify-content-end mt-3" >
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