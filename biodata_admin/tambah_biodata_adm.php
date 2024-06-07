<?php
include '../header/admin/sidebar.php';

?>

<section class="section">
    <div class="card">
        <div class="card-body">
            <h5 class="card-title">Tambah Biodata</h5>
            <form action="submit_biodata_adm.php" method="POST">

                <div class="row mb-3">
                    <label for="nama" class="col-sm-2 col-form-label">Nama Lengkap</label>
                    <div class="col-sm-10">
                        <input name="nama" type="text" class="form-control">
                    </div>
                </div>

                <div class="row mb-3">
                    <label for="nim" class="col-sm-2 col-form-label">NIM</label>
                    <div class="col-sm-10">
                        <input name="nim" type="text" class="form-control">
                    </div>
                </div>

                <div class="row mb-3">
                    <label for="pendidikan" class="col-sm-2 col-form-label">Asal Pendidikan</label>
                    <div class="col-sm-10">
                        <input name="pendidikan" type="text" class="form-control">
                    </div>
                </div>

                <div class="row mb-3">
                    <label for="jurusan" class="col-sm-2 col-form-label">Jurusan</label>
                    <div class="col-sm-10">
                        <input name="jurusan" type="text" class="form-control">
                    </div>
                </div>

                <div class="row mb-3">
                    <label for="alamat" class="col-sm-2 col-form-label">Alamat</label>
                    <div class="col-sm-10">
                        <textarea name="alamat" type="text" class="form-control"></textarea>
                    </div>
                </div>

                <div class="row mb-3">
                    <label for="telepon" class="col-sm-2 col-form-label">Telepon</label>
                    <div class="col-sm-10">
                        <input name="telepon" type="number" class="form-control">
                    </div>
                </div>

                <div class="row mb-3">
                    <label for="lahir" class="col-sm-2 col-form-label">Tempat Tanggal Lahir</label>
                    <div class="col-sm-10">
                        <input name="lahir" type="text" class="form-control">
                    </div>
                </div>

                <div class="row mb-3">
                    <label for="masuk" class="col-sm-2 col-form-label">Tanggal Masuk</label>
                    <div class="col-sm-10">
                        <input name="masuk" type="date" class="form-control">
                    </div>
                </div>

                <div class="row mb-3">
                    <label for="keluar" class="col-sm-2 col-form-label">Tanggal Keluar</label>
                    <div class="col-sm-10">
                        <input name="keluar" type="date" class="form-control">
                    </div>
                </div>

                <div class="row mb-3">
                    <label for="password" class="col-sm-2 col-form-label">Password</label>
                    <div class="col-sm-10">
                        <input name="password" type="text" class="form-control">
                    </div>
                </div>

                <fieldset class="row mb-3">
                    <legend class="col-form-label col-sm-2 pt-0">Status</legend>
                    <div class="col-sm-10">
                        <div class="form-check">
                            <input name="status" value="User" class="form-check-input" type="radio" name="status" id="gridRadios1" checked>
                            <label class="form-check-label" for="gridRadios1">
                                User
                            </label>
                        </div>
                        <div class="form-check">
                            <input name="status" value="Pembimbing" class="form-check-input" type="radio" name="status" id="gridRadios2">
                            <label class="form-check-label" for="gridRadios2">
                                Pembimbing
                            </label>
                        </div>
                        <div class="form-check">
                            <input name="status" value="Admin" class="form-check-input" type="radio" name="status" id="gridRadios3">
                            <label class="form-check-label" for="gridRadios3">
                                Admin
                            </label>
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