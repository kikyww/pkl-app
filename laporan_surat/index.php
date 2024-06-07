<?php
include '../header/sidebar.php';
?>

    <section class="section">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">Arsip Surat</h5>
            
                <form method="POST" action="cetak.php" target="_blank" id="filter_form">
                <div id='date-filter'>
                    <div class="row m-3">
                        <label for="start_date" class="col-sm-2 col-form-label">Mulai Tanggal:</label>
                        <div class="col-sm-4">
                            <input type="date" class="form-control" id="start_date" name="start_date" required>
                        </div>
                        <label for="end_date" class="col-sm-2 col-form-label">Sampai Tanggal:</label>
                        <div class="col-sm-4">
                            <input type="date" class="form-control" id="end_date" name="end_date" required>
                        </div>
                    </div>
                    <div class="d-flex justify-content-end mb-2">
                        <button type="submit" name="submit" class="btn btn-primary" id="pdf-start" style="margin-right:10px;">PDF</button>
                        <button class="btn btn-primary" id="filter-btn" style="margin-right:30px;">Filter</button>
                    </div>
                </div>
            </form>

            <script>
                $(document).ready(function() {
                    $('#filter-btn').click(function(event) {
                            event.preventDefault()

                            var start_date = $('#start_date').val()
                            var end_date = $('#end_date').val()
                        
                            $.ajax({
                                url: 'filter.php',
                                type: 'POST',
                                data: {
                                    start_date: start_date,
                                    end_date: end_date
                                },
                                success: function(response) {
                                    $('#idcuy tbody').html(response)
                                console.log();
                                }
                            })
                        })
                    })
                </script>
                
                <table class="table table-striped" id="idcuy">
                    <thead>
                        <tr class="">
                            <th class='text-center'>No.</th>
                            <th class='text-center'>No. Surat</th>
                            <th class='text-center'>No. Surat Terima</th>
                            <th class='text-center'>Tanggal Terima Surat</th>
                            <th class='text-center'>Penerima Surat</th>
                        </tr>
                    </thead>
                    <tbody>

                        <?php
                        include '../koneksi/koneksi.php';

                        $query = "SELECT * FROM tb_surat LEFT JOIN tb_biodata ON tb_surat.biodata_id = tb_biodata.id_siswa ORDER BY id_surat DESC ";

                        $data = mysqli_query($konek, $query);
                        $no = 0;
                        while ($row = mysqli_fetch_array($data)) {
                            $no++;
                            echo "<tr>
                                <td class='text-center'>$no</td>
                                <td class='text-center'>$row[no_surat]</td>
                                <td class='text-center'>$row[no_terima]</td>
                                <td class='text-center'>".date('d-m-Y', strtotime($row['tgl_terima']))."</td>
                                <td class='text-center'>$row[nama_mhs]</td>
                                </tr>";
                        }
                        ?>
                    </tbody>
            </div>
        </div>
    </section>

    <?php
    include '../header/footer.php';
    ?>
    <!-- /.container-fluid -->