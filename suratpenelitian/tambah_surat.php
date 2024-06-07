<?php
include '../header/pembimbing/sidebar.php';

?>

<section class="section">
    <div class="card">
        <div class="card-body">
            <h5 class="card-title">Form Tambah Surat</h5>
            <form action="surat.php" method="POST">

                <div class="row mb-3">
                    <label class="col-sm-2 col-form-label">No Surat</label>
                    <div class="col-sm-10">
                        <input name="no_surat" type="text" class="form-control">
                    </div>
                </div>
                <div class="row mb-3">
                    <label class="col-sm-2 col-form-label">Lampiran</label>
                    <div class="col-sm-10">
                        <input name="lampiran" type="text" class="form-control">
                    </div>
                </div>
                <div class="row mb-3">
                    <label class="col-sm-2 col-form-label">Perihal</label>
                    <div class="col-sm-10">
                        <input name="perihal" type="text" class="form-control">
                    </div>
                </div>
                <div class="row mb-3">
                    <label class="col-sm-2 col-form-label">Tujuan Surat</label>
                    <div class="col-sm-10">
                        <input name="tujuan_surat" type="text" class="form-control">
                    </div>
                </div>
                <div class="row mb-3">
                    <label class="col-sm-2 col-form-label">Tanggal Menerima Surat</label>
                    <div class="col-sm-10">
                        <input name="tanggal1" type="text" class="form-control">
                    </div>
                    <div class="row mb-3">
                        <label class="col-sm-2 col-form-label">No Surat Diterima</label>
                        <div class="col-sm-10">
                            <input name="no_surat1" type="text" class="form-control">
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label class="col-sm-2 col-form-label">Nama</label>
                        <div class="col-sm-10">
                            <input name="nama" type="text" class="form-control">
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label class="col-sm-2 col-form-label">Nomor Induk Mahasiswa</label>
                        <div class="col-sm-10">
                            <input name="npm1" type="text" class="form-control">
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

<script>
    document.querySelector('#mhs2').style.display = 'none';
    document.querySelector('#mhs3').style.display = 'none';


    document.querySelector('#tombol2').addEventListener('click', function() {
        document.querySelector('#mhs2').style.display = 'block';
        document.querySelector('#tombol2').style.display = 'none';
    });

    document.querySelector('#tombol3').addEventListener('click', function() {
        document.querySelector('#mhs3').style.display = 'block';
        document.querySelector('#tombol3').style.display = 'none';
    });
</script>

<?php
include '../header/footer.php';
?>