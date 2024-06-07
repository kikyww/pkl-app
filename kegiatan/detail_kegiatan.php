<?php
include '../header/sidebar.php';
include '../koneksi/koneksi.php';
$nim_user = $_SESSION['nim_user'];

$query = mysqli_query($konek, "SELECT * FROM tb_kegiatan LEFT JOIN tb_biodata  ON  tb_kegiatan.nim_kegiatan = tb_biodata.nim LEFT JOIN tb_jadwal ON tb_kegiatan.jadwal_id = tb_jadwal.id_jadwal WHERE tb_biodata.status_pkl = 'Diterima' ORDER BY tb_kegiatan.tanggal DESC");

?>

<div class="pagetitle">
  <h1>Halaman Catatan Kegiatan</h1>
  <nav>
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="../header/dashboard.php">Home</a></li>
      <li class="breadcrumb-item active">Catatan Kegiatan</li>
    </ol>
  </nav>
</div>

<section class="section">
<div class="card">
            <div class="card-body">
            <div class="d-flex justify-content-between">    
            <h5 class="card-title">Catatan Kegiatan</h5>
                <a href="admin_kegiatan.php" class="btn btn-warning">Kembali</a>
                </div>
                <table class="table table-striped" id="idcuy">
                <thead>
                    <tr class="">
                        <th>Nama</th>
                        <th>No Induk</th>
                        <th>Tanggal</th>
                        <th>Kegiatan</th>
                        <th>Kegiatan</th>
                    </tr>
                </thead>
            <tbody>

<?php
$no = 0;
    while ($data = mysqli_fetch_array($query)) {
if ($_GET['nim'] == $data['nim']) {
    $no++;
echo"
    <tr>
        <td>$data[nama_mhs]</td>
        <td>$data[nim]</td>
        <td>".date('d-m-Y', strtotime($data['tanggal']))."</td>
        <td>$data[kegiatan]</td>
        <td>$data[keterangan]</td>
    </tr>";
 }
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