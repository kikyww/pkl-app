<?php
include '../header/admin/sidebar.php';
$nim = $_SESSION['nim_user'];
?>

<div class="pagetitle">
    <h1>Halaman Laporan</h1>
    <nav>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="../header/dashboard.php">Home</a></li>
            <li class="breadcrumb-item active">Laporan Absensi</li>
        </ol>
    </nav>
</div><!-- End Page Title -->

<section class="section">
    <div class="card">
        <div class="card-body">
            <h5 class="card-title">Cetak Absensi</h5>
            <table class="table table-striped" id="idcuy">
                <thead>
                    <tr class="text-center">
                        <th>No.</th>
                        <th>Nama</th>
                        <th>Hadir</th>
                        <th>Sakit</th>
                        <th>Izin</th>
                        <th>Cetak</th>
                    </tr>
                </thead>
                <tbody>

                    <?php
                    include '../koneksi/koneksi.php';

                    $query = "SELECT tb_biodata.nim AS nim, tb_biodata.nama_mhs AS nama_mhs, tb_absen.nim_absen AS nim_absen, SUM(kehadiran = 'hadir') AS jumlah_hadir, SUM(kehadiran = 'sakit') AS jumlah_sakit, SUM(kehadiran = 'izin') AS jumlah_izin FROM tb_biodata LEFT JOIN tb_absen ON tb_biodata.nim = nim_absen GROUP BY tb_biodata.nim";

                    $data = mysqli_query($konek, $query);
                    $no = 0;
                    while ($row = mysqli_fetch_array($data)) {
                        $no++;
                        echo "<tr>
                    <td style='text-align:center'>$no</td>
                    <td style='text-align:center'>$row[nama_mhs]</td>
                    <td style='text-align:center'>$row[jumlah_hadir]</td>
                    <td style='text-align:center'>$row[jumlah_sakit]</td>
                    <td style='text-align:center'>$row[jumlah_izin]</td>";
                        if ($_SESSION['status'] != 'User') {
                            echo "<td><div class='btn-row'>
                            <div class='btn-group'>
                            <a href='./cetak.php?nim_user=$row[nim]' class='btn btn-info '>Cetak</a>
                            </div>
                            </div>
                            </td>";
                        } else {
                            if ($_SESSION['nim_user'] == $row['nim']) {
                                echo "<td><div class='btn-row'>
                            <div class='btn-group'>
                            <a href='./cetak_adm.php?nim_user=$row[nim]' class='btn btn-info'>Cetak</a>
                            </div>
                            </div>
                            </td>
                    </tr>";
                            } else {
                                echo "<td><div class='btn-row'>
                        <div class='btn-group'>
                        </div>
                        </div>
                        </td>";
                            }
                        }
                    }
                    ?>
                </tbody>
        </div>
    </div>
</section>



<?php
include '../header/footer.php';
?>