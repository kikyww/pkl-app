<?php
include '../header/user/sidebar.php';
$nim_user= $_SESSION['nim_user'];

?>

<div class="pagetitle">
    <h1>Halaman Laporan</h1>
    <nav>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="../header/dashboard.php">Home</a></li>
            <li class="breadcrumb-item active">Laporan Kegiatan</li>
        </ol>
    </nav>
</div><!-- End Page Title -->

<section class="section">
    <div class="card">
        <div class="card-body">
            <h5 class="card-title">Cetak Kegiatan</h5>
            <table class="table table-striped" id="idcuy">
                <thead>
                    <tr class="">
                        <th>No.</th>
                        <th>Nama</th>
                        <th>Kegiatan</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>

                    <?php
                    include '../koneksi/koneksi.php';


// $query = "SELECT * FROM tb_biodata LEFT JOIN tb_kegiatan ON tb_biodata.nim =  tb_kegiatan.nim_kegiatan LEFT JOIN tb_jadwal ON tb_kegiatan.jadwal_id = tb_jadwal.id_jadwal LEFT JOIN tb_piket ON tb_piket.id_piket = tb_jadwal.piket_id GROUP BY nim"; 
 

$query = "SELECT tb_biodata.id_siswa, tb_biodata.nama_mhs, tb_biodata.nim, tb_kegiatan.id_kegiatan, tb_kegiatan.nim_kegiatan, tb_kegiatan.jadwal_id, tb_kegiatan.kegiatan, tb_kegiatan.keterangan, tb_jadwal.id_jadwal, tb_jadwal.nim_jadwal, tb_jadwal.piket_id, tb_piket.id_piket, tb_piket.piket, COUNT(tb_kegiatan.tanggal) AS tanggal FROM tb_biodata LEFT JOIN tb_kegiatan ON tb_biodata.nim =  tb_kegiatan.nim_kegiatan LEFT JOIN tb_jadwal ON tb_kegiatan.jadwal_id = tb_jadwal.id_jadwal LEFT JOIN tb_piket ON tb_piket.id_piket = tb_jadwal.piket_id GROUP BY tb_biodata.nim";

                    $data = mysqli_query($konek, $query);
                    $no = 0;
                    while ($row = mysqli_fetch_array($data)) {
                        $no++;
                        echo "<tr>
                    <td>$no</td>
                    <td>$row[nama_mhs]</td>
                    <td>$row[tanggal]</td>
                    ";
                        if ($_SESSION['status'] != 'User') {
                            echo "<td><div class='btn-row'>
                            <div class='btn-group'>
                            <a href='./cetak.php?nim_user=$row[nim]' class='btn btn-info'>Cetak</a>
                            </div>
                            </div>
                            </td>";
                        } else {
                            if ($_SESSION['nim_user'] == $row['nim']) {
                                echo "<td><div class='btn-row'>
                                <div class='btn-group'>
                                <a href='./cetak.php?nim_user=$row[nim]' class='btn btn-info'>Cetak</a>
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