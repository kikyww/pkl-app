<?php
include '../header/pembimbing/sidebar.php';
$nim = $_SESSION['nim_user'];
$status = $_SESSION['status'];
if (!isset($status)) {
    echo "<script>
    window.location.href='../pages-error-404.html'
    </script>";
} else {
?>

    <div class="pagetitle">
        <h1>Halaman Laporan</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="../header/dashboard.php">Home</a></li>
                <li class="breadcrumb-item active">Laporan Sertifikat</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->

    <section class="section">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">Cetak Sertifikat</h5>
                <table class="table table-striped" id="idcuy">
                    <thead>
                        <th>No.</th>
                        <th>Nama</th>
                        <th>Instansi</th>
                        <th class="text-center">Nilai Akhir</th>
                        <th>Detail</th>
                        </tr>
                    </thead>
                    <tbody>

                        <?php
                        include '../koneksi/koneksi.php';

                        $query = mysqli_query($konek, "SELECT tb_biodata.nama_mhs, tb_biodata.nim, tb_biodata.asal_pendidikan, IFNULL(tb_nilai.rata_rata, 0) as rata_rata FROM tb_biodata LEFT JOIN tb_nilai ON tb_biodata.nim = tb_nilai.nim_nilai ORDER BY nama_mhs ASC");
                        $no = 0;
                        while ($row = mysqli_fetch_array($query)) {
                            $no++;
                            echo "<tr>
                    <td>$no</td>
                    <td>$row[nama_mhs]</td>
                    <td>$row[asal_pendidikan]</td>
                    <td class='text-center'>$row[rata_rata]</td>";
                            if ($_SESSION['status'] != 'pembimbing') {
                                echo "<td><div class='btn-row'>
                            <div class='btn-group'>
                            <a href='./cetak.php?nim=$row[nim]' class='btn btn-info'>Cetak</a>
                            </div>
                            </div>
                            </td>";
                            } else {
                                if ($_SESSION['nim'] == $row['nim']) {
                                    echo "<td><div class='btn-row'>
                                <div class='btn-group'>
                                <a href='./cetak.php?nim=$row[nim]' class='btn btn-info'>Cetak</a>
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


<?php } ?>
<?php
include '../header/footer.php';
?>