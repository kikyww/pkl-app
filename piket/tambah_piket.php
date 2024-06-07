<?php
include '../header/sidebar.php';

?>

<section class="section">
    <div class="card">
        <div class="card-body">
            <h5 class="card-title">Form Piket</h5>
            <form action="submit_piket.php" method="POST">
                    <div class="row mb-3">
                        <div class="col-sm-10">
                            <input name="nim" type="text" class="form-control" value="<?php echo $_SESSION['nim_user']; ?>" readonly hidden>
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label for="piket" class="col-sm-2 col-form-label">Piket</label>
                        <div class="col-sm-10">
                            <input name="piket" type="text" class="form-control">
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