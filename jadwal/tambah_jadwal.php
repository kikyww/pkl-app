<?php
include '../header/sidebar.php';
include '../koneksi/koneksi.php';

?>

<section class="section">
    <div class="card">
        <div class="card-body">
            <h5 class="card-title">Form Jadwal Piket</h5>
            <form action="submit_jadwal.php" method="POST">

                <div class="row mb-3">
                    <div class="col-sm-10">
                        <input name="nim_kegiatan" type="text" class="form-control" value="<?= $_SESSION['nim_user']; ?>" readonly hidden>
                    </div>
                </div>

                <div class="row mb-3">
                    <label class="col-sm-2 col-form-label">Nama </label>
                    <div class="col-sm-10">
                        <select class="form-select" name='nama' aria-label="Default select example">
                            <option hidden selected>Pilih Nama</option>
                            <?php
                            $query = mysqli_query($konek, "SELECT * FROM tb_biodata WHERE status_pkl = 'Diterima' ORDER BY nama_mhs ASC");
                            while ($data = mysqli_fetch_array($query)) {
                                echo "<option value='$data[nim]'>$data[nama_mhs] </option>";
                            }
                            ?>
                        </select>
                    </div>
                </div>

                <div class="row mb-3">
                    <label for="tanggal" class="col-sm-2 col-form-label">Tanggal</label>
                    <div class="col-sm-10">
                        <input name="tanggal" type="date" class="form-control" required>
                    </div>
                </div>

                <div class="row mb-3">
                    <label class="col-sm-2 col-form-label">Penempatan </label>
                    <div class="col-sm-10">
                        <select class="form-select" name='piket' aria-label="Default select example">
                            <option selected>Penempatan</option>
                            <?php
                            $query = mysqli_query($konek, "SELECT * FROM tb_piket WHERE id_piket ORDER BY piket ASC");
                            while ($data = mysqli_fetch_array($query)) {
                                echo "<option value='$data[id_piket]'>$data[piket]</option>";
                            }
                            ?>
                        </select>
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

<script>
    // menyembunyikan form input
    document.querySelector('#kegiatanii').style.display = 'none';
    document.querySelector('#tomboliii').style.display = 'none';


    document.querySelector('#tombolii').addEventListener('click', function() {
        document.querySelector('#kegiatanii').style.display = 'block';
        document.querySelector('#tomboliii').style.display = 'block';
        document.querySelector('#tombolii').style.display = 'none';
    });
</script>

<?php
include '../header/footer.php';
?>