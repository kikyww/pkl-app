<?php
include '../header/sidebar.php';

?>

<div class="pagetitle">
    <h1>Master Data</h1>
    <nav>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="../header/dashboard.php">Home</a></li>
            <li class="breadcrumb-item active">Data Mahasiswa PKL</li>
        </ol>
    </nav>
</div><!-- End Page Title -->

<section class="section">
    <div class="card">
        <div class="card-body">
            <h5 class="card-title">Data Mahasiswa PKL</h5>
            <div class="d-flex justify-content-end align-items-center" style="margin-right: 35x;">
                <a class="btn btn-success" href="tambah_biodata.php">Tambah</a>
            </div>
            <table class="table table-striped" id="idcuy">
                <thead>
                    <tr class="text-center">
                        <th>No.</th>
                        <th>Nama</th>
                        <th>NPM</th>
                        <th>Instansi</th>
                        <th>Jurusan</th>
                        <th>Tanggal Masuk</th>
                        <th>Tanggal Keluar</th>
                        <th>Status</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    include '../koneksi/koneksi.php';
                    $query = "SELECT * FROM tb_biodata WHERE status_pkl = 'Diterima' ORDER BY tgl_keluar ASC";
                    $data = mysqli_query($konek, $query);
                    $tanggal_sekarang = date('Y-m-d');
                    $no = 0;
                    while ($row = mysqli_fetch_assoc($data)) {
                        if ($row['tgl_keluar'] >= $row['tgl_masuk'] && $tanggal_sekarang < $row['tgl_keluar']) {
                            $status = "<span class='badge rounded-pill bg-success'>Aktif</span>";
                        } else {
                            $status = "<span class='badge rounded-pill bg-danger'>Non Aktif</span>";
                        }
                        $no++;
                        echo "<tr>
                        <td>$no</td>
                        <td>$row[nama_mhs]</td>
                        <td>$row[nim]</td>
                        <td>$row[asal_pendidikan]</td>
                        <td>$row[jurusan]</td>
                        <td>". date('d-m-Y', strtotime($row['tgl_masuk'])) ."</td>
                        <td>". date('d-m-Y', strtotime($row['tgl_keluar'])) ."</td>
                        <td>$status</td>
                        <td><div class='btn-row'>
                            <div class='btn-group'>
                                <a href='./sertifikat.php?nim=$row[nim]' class='btn btn-info'>Cetak</a>
                                </div>
                            </div>
                                </td>";
                    }
                    ?>
                </tbody>
        </div>
    </div>
</section>



<?php
include '../header/footer.php';
?>