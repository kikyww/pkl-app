<?php
include '../header/user/sidebar.php';
include '../koneksi/koneksi.php';

?>

<section class="section">
    <div class="card">
        <div class="card-body">
            <h5 class="card-title">Form Kegiatan</h5>
            <form action="submit_kegiatan_user.php" method="POST">

                <div class="row mb-3">
                    <div class="col-sm-10">
                        <input name="nim_kegiatan" type="text" class="form-control" value="<?php echo $_SESSION['nim_user']; ?>" readonly hidden>
                    </div>
                </div>

                <div class="row mb-3">
                    <label for="tanggal" class="col-sm-2 col-form-label">Tanggal</label>
                    <div class="col-sm-10">
                        <input id="tanggal" name="tanggal" type="date" class="form-control" required>
                    </div>
                </div>

                <div class="row mb-3" hidden>
                    <label class="col-sm-2 col-form-label">Penempatan </label>
                    <div class="col-sm-10">
                        <input class="form-select" id="piket" name='piket' aria-label="Default select example">
                            <!-- <script>
                            document.getElementById("tanggal").addEventListener("change", function(){
                            fetch("url_server.php", {
                                method: "POST",
                                body: JSON.stringify({ tanggal: this.value }),
                                headers: {
                                    "Content-Type": "application/json"
                                }
                            })
                            .then(response => response.json())
                            .then(data => {
                                const piket = document.querySelector("select[name='piket']");
                                data.forEach(item => {
                                    const option = document.createElement("option");
                                    option.value = item.id_jadwal;
                                    option.text = item.jadwal;
                                    piket.appendChild(option);
                                    console.log(item)
                                });
                            });
                        });
                        </script>
                           
                            if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                                $data = json_decode(file_get_contents('php://input'), true);
                                $tanggal = $data['tanggal'];
                                $query = mysqli_query($konek, "SELECT * FROM tb_jadwal LEFT JOIN tb_piket ON tb_jadwal.piket_id = tb_piket.id_piket WHERE tanggal = '$tanggal' ORDER BY id_jadwal DESC");
                                $jadwal = array();
                                while ($row = mysqli_fetch_assoc($query)) {
                                    echo "<option value='$row[id_jadwal]'>$row[jadwal]</option>";
                                    $jadwal[] = $row;
                                }
                                echo json_encode($jadwal);
                            } -->
                            
                                <!-- $query = mysqli_query($konek, "SELECT * FROM tb_jadwal INNER JOIN tb_piket ON tb_jadwal.piket_id = tb.piket.id_piket  ORDER BY id_jadwal DESC");
                                while ($data = mysqli_fetch_array($query)) {
                            } -->
                            
                    </div>
                </div>

                <div id="kegiatani" class="row mb-3">
                    <label for="kegiatani" class="col-sm-2 col-form-label">Kegiatan 1</label>
                    <div class="col-sm-10">
                        <textarea name="kegiatani" type="text" class="form-control"></textarea>
                        <div class="mt-3">
                            <div id="tombolii" class="btn btn-primary">Tambah Kegiatan</div>
                        </div>
                    </div>
                </div>

                <div id="kegiatanii" class="row mb-3">
                    <label for="kegiatani" class="col-sm-2 col-form-label">Kegiatan 2</label>
                    <div class="col-sm-10">
                        <textarea name="kegiatanii" type="text" class="form-control"></textarea>
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