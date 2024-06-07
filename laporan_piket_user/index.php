<?php
include '../header/user/sidebar.php';
$nim = $_SESSION['nim_user'];
?>

<div class="pagetitle">
    <h1>Halaman Laporan</h1>
    <nav>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="../header/dashboard.php">Home</a></li>
            <li class="breadcrumb-item active">Laporan Piket</li>
        </ol>
    </nav>
</div><!-- End Page Title -->

<section class="section">
    <div class="card">
        <div class="card-body">
            <h5 class="card-title">Cetak Piket</h5>
            <div class="d-flex justify-content-end">
                <a class="btn btn-outline-warning" href="cetak.php">Cetak</a>
            </div>
            <table class="table table-striped" id="idcuy">
                <thead>
                    <tr class="text-center">
                        <th>No.</th>
                        <th>tanggal</th>
                        <th>Nama</th>
                       <th>Penempatan</th>
                    </tr>
                </thead>
                <tbody>

                    <?php
                    include '../koneksi/koneksi.php';

                    $query = "SELECT tb_biodata.nim AS nim, tb_biodata.nama_mhs AS nama_mhs, tb_jadwal.nim_jadwal AS nim_jadwal, tb_jadwal.tanggal AS tanggal, tb_piket.id_piket AS id_piket, tb_piket.piket AS piket FROM tb_biodata LEFT JOIN tb_jadwal ON tb_biodata.nim = tb_jadwal.nim_jadwal LEFT JOIN tb_piket ON tb_jadwal.piket_id = tb_piket.id_piket ORDER BY tanggal DESC";

                    $data = mysqli_query($konek, $query);
                    $no = 0;
                    while ($row = mysqli_fetch_array($data)) {
                        $no++;
                        echo "<tr>
                    <td style='text-align:center'>$no</td>
                    <td style='text-align:center'>$row[tanggal]</td>
                    <td style='text-align:center'>$row[nama_mhs]</td>
                    <td style='text-align:center'>$row[piket]</td>
                
                      ";
                      
                            }
                        
                    
                    ?>
                </tbody>
        </div>
    </div>
</section>



<?php
include '../header/footer.php';
?>