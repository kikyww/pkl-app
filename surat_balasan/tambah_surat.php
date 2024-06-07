<?php
include '../header/sidebar.php';

?>

<section class="section">
    <div class="card">
        <div class="card-body">
            <h5 class="card-title">Form Tambah Surat</h5>
            <form action="submit_surat.php" method="POST">
                <div class="row mb-3">
                    <label for="surat" class="col-sm-2 col-form-label">No Surat</label>
                    <div class="col-sm-10">
                        <input name="no_surat" type="text" class="form-control">
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
                        <input name="Perihal" type="text" class="form-control">
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="piket" class="col-sm-2 col-form-label">Tujuan Surat</label>
                    <div class="col-sm-10">
                        <input name="tujuan_surat" type="text" class="form-control">
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="piket" class="col-sm-2 col-form-label">Nama Mahasiswa</label>
                    <div class="col-sm-10">
                        <input name="no_surat" type="text" class="form-control">
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="piket" class="col-sm-2 col-form-label">No Surat</label>
                    <div class="col-sm-10">
                        <input name="no_surat" type="text" class="form-control">
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="piket" class="col-sm-2 col-form-label">NIM </label>
                    <div class="col-sm-10">
                        <input name="nim_surat" type="text" class="form-control">
                    </div>
                </div>
        </div>
        <div class="d-flex justify-content-end mt-3">
            <button name="submit" value="submit" type="submit" class="btn btn-success">Kirim</button>
        </div>
        </form>
    </div>
    </div>
</section>

<?php
include '../header/footer.php';
?>