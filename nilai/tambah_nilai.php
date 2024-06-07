<?php
include '../header/sidebar.php';
include '../koneksi/koneksi.php';

$nim = $_GET['nim'];
?>

<section class="section">
    <div class="row">
        <div class="col-lg-9">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Tambah Nilai</h5>
                    <form action="submit_nilai.php" method="POST">
                        <div class="row mb-3" hidden>
                            <div class="col-sm-10">
                                <input name="id" type="text" class="form-control" value="<?= $nim ?>" readonly>
                            </div>
                        </div> 
                        <div class="row mb-3">
                            <label for="sopan" class="col-sm-2 col-form-label">Nilai Kesopanan</label>
                            <div class="col-sm-10">
                                <input name="sopan" id="sopan" type="number" class="form-control" required>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="disiplin" class="col-sm-2 col-form-label">Nilai Kedisiplinan</label>
                            <div class="col-sm-10">
                                <input name="disiplin" id="disiplin" type="number" class="form-control" required>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="aktif" class="col-sm-2 col-form-label">Nilai Keaktifan</label>
                            <div class="col-sm-10">
                                <input name="aktif" id="aktif" type="number" class="form-control" required>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="sungguh" class="col-sm-2 col-form-label">Nilai Kesungguhan</label>
                            <div class="col-sm-10">
                                <input name="sungguh" id="sungguh" type="number" class="form-control" required>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="mandiri" class="col-sm-2 col-form-label">Kemampuan Bekerja Mandiri</label>
                            <div class="col-sm-10">
                                <input name="mandiri" id="mandiri" type="number" class="form-control" required>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="bersama" class="col-sm-2 col-form-label">Kemampuan Bekerja Sama</label>
                            <div class="col-sm-10">
                                <input name="bersama" id="bersama" type="number" class="form-control" required>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="teliti" class="col-sm-2 col-form-label">Nilai Ketelitian</label>
                            <div class="col-sm-10">
                                <input name="teliti" id="teliti" type="number" class="form-control" required>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="pendapat" class="col-sm-2 col-form-label">Kemampuan Mengemukakan Pendapat</label>
                            <div class="col-sm-10">
                                <input name="pendapat" id="pendapat" type="number" class="form-control" required>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="menyerap" class="col-sm-2 col-form-label">Kemampuan Menyerap Hal Baru</label>
                            <div class="col-sm-10">
                                <input name="menyerap" id="menyerap" type="number" class="form-control" required>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="kreatif" class="col-sm-2 col-form-label">Inisiatif dan Kreatifitas</label>
                            <div class="col-sm-10">
                                <input name="kreatif" id="kreatif" type="number" class="form-control" required>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="ratarata" class="col-sm-2 col-form-label">Rata Rata Nilai</label>
                            <div class="col-sm-10">
                                <input name="ratarata" id="ratarata" type="number" class="form-control" required readonly>
                            </div>
                        </div>
                        <div class="d-flex justify-content-end mt-3">
                            <button name="submit" id="submit" value="submit" type="submit" class="btn btn-success">Kirim</button>
                        </div>
                    </form>
                    <button class="btn btn-primary" id="jumlah" onclick="hitungRataRata()">Jumlah</button>
                </div>
            </div>
        </div>
        <div class="col-lg-3">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Format Penilaian</h4>
                </div>
            </div>
        </div>
    </div>
</section>


<script>
    function hitungRataRata() {
        let sopan = document.getElementById('sopan').value;
        let disiplin = document.getElementById('disiplin').value;
        let aktif = document.getElementById('aktif').value;
        let sungguh = document.getElementById('sungguh').value;
        let mandiri = document.getElementById('mandiri').value;
        let bersama = document.getElementById('bersama').value;
        let teliti = document.getElementById('teliti').value;
        let pendapat = document.getElementById('pendapat').value;
        let menyerap = document.getElementById('menyerap').value;
        let kreatif = document.getElementById('kreatif').value;
        let submit = document.getElementById('submit')

        let rataRata = (parseInt(sopan) + parseInt(disiplin) + parseInt(aktif) + parseInt(sungguh) + parseInt(mandiri) + parseInt(bersama) + parseInt(teliti) + parseInt(pendapat) + parseInt(menyerap) + parseInt(kreatif)) / 10;
        document.getElementById('ratarata').value = rataRata;

        if (rataRata == false) {

        }

    }
</script>


<?php
include '../header/footer.php';
?>