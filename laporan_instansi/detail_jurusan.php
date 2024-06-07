<?php
include '../header/sidebar.php';
include '../koneksi/koneksi.php';
$nim_user = $_SESSION['nim_user'];
$pen = $_GET['pen'];
$jurusan = $_GET['jurusan'];

$query = mysqli_query($konek, "SELECT * FROM tb_biodata WHERE asal_pendidikan = '$pen' AND jurusan = '$jurusan' AND status_pkl = 'Diterima' ORDER BY nama_mhs ASC");

?>

<div class="pagetitle">
    <h1>Halaman Laporan Instansi</h1>
    <nav>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="../header/dashboard.php">Home</a></li>
            <li class="breadcrumb-item active">Laporan Instansi <?= $pen ?> </li>
        </ol>
    </nav>
</div>

<section class="section">
    <div class="card">
        <div class="card-body">
            <div class="d-flex justify-content-between">
                <h5 class="card-title">Laporan Jurusan <?= $jurusan ?></h5>
                <div>
                    <a href="cetak_jurusan.php?pen=<?= $pen ?>&jurusan=<?= $jurusan ?>" class="btn btn-warning">Cetak</a>
                    <a href="index.php" class="btn btn-info">Kembali</a>
                </div>
            </div>
            <table class="table table-striped" id="idcuy">
                <thead>
                    <tr class="">
                        <th>No</th>
                        <th>Nama</th>
                        <th>NIM</th>
                        <th>Tanggal PKL</th>
                    </tr>
                </thead>
                <tbody>

                    <?php
                    $no = 0;
                    while ($data = mysqli_fetch_array($query)) {

                        $no++;
                        echo "
    <tr>
        <td>$no</td>
        <td>$data[nama_mhs]</td>
        <td>$data[nim]</td>
        <td>".date('d-m-Y', strtotime($data['tgl_masuk'])). " - " . date('d-m-Y', strtotime($data['tgl_keluar'])) . "</td>
    </tr>";
                    }
                    ?>

                </tbody>
        </div>
    </div>
</section>
<script>
    // window.print();
</script>
<?php
include '../header/footer.php';
?>