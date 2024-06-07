<?php
include '../header/admin/sidebar.php';

$nim = $_GET['nim'];
if (isset($nim)) {
    include '../koneksi/koneksi.php';
    $query = mysqli_query($konek, "SELECT * FROM tb_biodata WHERE nim = '$nim'");
    $row = mysqli_fetch_array($query);
}

?>

<section class="section">
    <div class="card">
        <div class="card-body">
            <h5 class="card-title">Edit Biodata</h5>
            <form action="submit_edit_adm.php" method="POST">

                <div class="row mb-3">
                    <div class="col-sm-10">
                        <input name="id" type="text" class="form-control" value="<?= $row['id_siswa']; ?>" hidden readonly>
                    </div>
                </div>

                <div id="nama_mhs" class="row mb-3">
                    <label for="nama_mhs" class="col-sm-2 col-form-label">Nama</label>
                    <div class="col-sm-10">
                        <input name="nama_mhs" type="text" class="form-control" value="<?= $row['nama_mhs'] ?>">
                    </div>
                </div>

                <div class="row mb-3">
                    <label for="nim" class="col-sm-2 col-form-label">NIM </label>
                    <div class="col-sm-10">
                        <input name="nim" type="text" class="form-control" value="<?= $row['nim'] ?>">
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="asal_pendidikan" class="col-sm-2 col-form-label">Asal Pendidikan </label>
                    <div class="col-sm-10">
                        <input name="asal_pendidikan" type="text" class="form-control" value="<?= $row['asal_pendidikan'] ?>">
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="jurusan" class="col-sm-2 col-form-label">Jurusan </label>
                    <div class="col-sm-10">
                        <input name="jurusan" type="text" class="form-control" value="<?= $row['jurusan'] ?>">
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="tgl_lahir" class="col-sm-2 col-form-label">Tempat Tanggal Lahir </label>
                    <div class="col-sm-10">
                        <input name="tgl_lahir" type="text" class="form-control" value="<?= $row['tgl_lahir'] ?>">
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="alamat" class="col-sm-2 col-form-label">Alamat </label>
                    <div class="col-sm-10">
                        <input name="alamat" type="text" class="form-control" value="<?= $row['alamat'] ?>">
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="telepon" class="col-sm-2 col-form-label">Nomor Telepon/WA </label>
                    <div class="col-sm-10">
                        <input name="telepon" type="text" class="form-control" value="<?= $row['telepon'] ?>">
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="tgl_masuk" class="col-sm-2 col-form-label">Tanggal Mulai PKL </label>
                    <div class="col-sm-10">
                        <input name="tgl_masuk" type="text" class="form-control" value="<?= $row['tgl_masuk'] ?>">
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="tgl_keluar" class="col-sm-2 col-form-label">Tanggal Selesai PKL </label>
                    <div class="col-sm-10">
                        <input name="tgl_keluar" type="text" class="form-control" value="<?= $row['tgl_keluar'] ?>">
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="password" class="col-sm-2 col-form-label">Password </label>
                    <div class="col-sm-10">
                        <input name="password" type="text" class="form-control" value="<?= $row['password'] ?>">
                    </div>
                </div>
                <div class="d-flex justify-content-end">
                    <div class=" mt-3">
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