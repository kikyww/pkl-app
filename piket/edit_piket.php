<?php
include '../header/sidebar.php';

$id = $_GET['id'];
if (isset($id)) {
    include '../koneksi/koneksi.php';
    $query = mysqli_query($konek, "SELECT * FROM tb_piket WHERE id_piket = '$id'");
    $row = mysqli_fetch_array($query);
}
?>

<section class="section">
    <div class="card">
        <div class="card-body">
            <h5 class="card-title">Form Penempatan</h5>
            <form action="submit_edit.php" method="POST">
                <div class="row mb-3">
                    <div class="col-sm-10">
                        <input name="id" type="text" class="form-control" value="<?= $row['id_piket']; ?>" hidden>
                    </div>
                </div>
                    <div class="row mb-3">
                        <label for="piket" class="col-sm-2 col-form-label">Piket</label>
                        <div class="col-sm-10">
                            <input name="piket" type="text" class="form-control" value="<?= $row['piket']; ?>">
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