<?php 
include '../header/sidebar.php';

$id = $_GET['id'];
if(isset($id)){
    include '../koneksi/koneksi.php';
    $query = mysqli_query($konek, "SELECT * FROM tb_absen WHERE id_absen = '$id'");
    $row = mysqli_fetch_array($query);
}
?>

<section class="section">
        <div class="card">
            <div class="card-body">
              <h5 class="card-title">Form Absen</h5>
              <form action="submit_edit.php" method="POST">
              <div class="row mb-3">
                  <div class="col-sm-10">
                    <input name="id" type="text" class="form-control" value="<?= $row['id_absen'];?>" hidden>
                  </div>
                </div>
              <fieldset class="row mb-3">
                  <legend class="col-form-label col-sm-2 pt-0">Kehadiran</legend>
                  <div class="col-sm-10">
                    <div class="form-check">
                      <input name="kehadiran" value="Hadir" class="form-check-input" type="radio" name="kehadiran" id="gridRadios1" checked>
                      <label class="form-check-label" for="gridRadios1">
                        Hadir
                      </label>
                    </div>
                    <div class="form-check">
                      <input name="kehadiran" value="Izin" class="form-check-input" type="radio" name="kehadiran" id="gridRadios2">
                      <label class="form-check-label" for="gridRadios2">
                        Izin
                      </label>
                    </div>
                    <div class="form-check">
                      <input name="kehadiran" value="Sakit" class="form-check-input" type="radio" name="kehadiran" id="gridRadios3">
                      <label class="form-check-label" for="gridRadios3">
                        Sakit
                      </label>
                    </div>
                  </div>


                <div class="row mb-3">
                  <label for="tanggal" class="col-sm-2 col-form-label">Tanggal</label>
                  <div class="col-sm-10">
                    <input name="tanggal" type="text" class="form-control" value="<?= $row['tanggal']; ?>" readonly>
                  </div>
                </div>

                <div class="row mb-3">
                  <label for="username" class="col-sm-2 col-form-label">Keterangan</label>
                  <div class="col-sm-10">
                    <textarea name="keterangan" type="text" class="form-control" value="<?= $row['keterangan'];?>"></textarea>
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