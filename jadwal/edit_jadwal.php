<?php
include '../header/sidebar.php';

$id = $_GET['id'];
if (isset($id)) {
    include '../koneksi/koneksi.php';
    $query = mysqli_query($konek, "SELECT * FROM tb_kegiatan WHERE id_kegiatan = '$id'");
    $row = mysqli_fetch_array($query);
}

?>

<section class="section">
    <div class="card">
        <div class="card-body">
            <h5 class="card-title">Form Catatan</h5>
            <form action="submit_edit.php" method="POST">

                <div class="row mb-3">
                    <div class="col-sm-10">
                        <input name="id" type="text" class="form-control" value="<?= $row['id_kegiatan']; ?>" hidden readonly>
                    </div>
                </div>

                <div class="row mb-3">
                    <div class="col-sm-10">
                        <input name="nim" type="text" class="form-control" value="<?= $_SESSION['nim']; ?>" readonly hidden>
                    </div>
                </div>

                <div class="row mb-3">
                    <label for="tanggal" class="col-sm-2 col-form-label">Tanggal</label>
                    <div class="col-sm-10">
                        <input name="tanggal" type="text" class="form-control" value="<?= $row['tanggal'] ?>" readonly>
                    </div>
                </div>

                <div class="row mb-3">
                    <label class="col-sm-2 col-form-label">Penempatan </label>
                    <div class="col-sm-10">
                        <select class="form-select" name='piket' aria-label="Default select example">
                            <?php
                            $query = mysqli_query($konek, "SELECT * FROM tb_piket WHERE id_piket ORDER BY piket ASC");
                            while ($data = mysqli_fetch_array($query)) {
                                echo "<option value='$data[id_piket]'>$data[piket] </option>";
                            }
                            ?>
                        </select>
                    </div>
                </div>

                <div id="kegiatani" class="row mb-3">
                    <label for="kegiatani" class="col-sm-2 col-form-label">Kegiatan 1</label>
                    <div class="col-sm-10">
                        <input name="kegiatan" type="text" class="form-control" value="<?= $row['kegiatan'] ?>">
                    </div>
                </div>

                <div id="kegiatanii" class="row mb-3">
                    <label for="kegiatani" class="col-sm-2 col-form-label">Kegiatan 2</label>
                    <div class="col-sm-10">
                        <input name="keterangan" type="text" class="form-control" value="<?= $row['keterangan'] ?>">
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