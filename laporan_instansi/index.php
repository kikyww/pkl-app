<?php
include '../header/sidebar.php';
$nim_user = $_SESSION['nim_user'];

?>

<div class="pagetitle">
  <h1>Halaman Instansi </h1>
  <nav>
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="../utilities/dashboard.php">Home</a></li>
      <li class="breadcrumb-item active">Laporan Instansi</li>
    </ol>
  </nav>
</div><!-- End Page Title -->

<section class="section">
<div class="card">
            <div class="card-body">
              <div class="d-flex justify-content-between">
                <h5 class="card-title">Laporan Instansi</h5>
                <a href="cetak_instansi.php" class="btn btn-warning">Cetak</a>
              </div>
                <table class="table table-striped" id="idcuy">
                <thead>
                    <tr class="text-center">
                        <th class="text-center">No.</th>
                        <th class="text-center">Nama Instansi</th>
                        <th class="text-center">Jumlah</th>
                        <th class="text-center">Detail</th>
                    </tr>
                </thead>
                <tbody>

                <?php
                include '../koneksi/koneksi.php';
                
                $data = mysqli_query($konek, "SELECT asal_pendidikan, COUNT(*) AS total FROM tb_biodata WHERE status_pkl = 'Diterima' GROUP BY asal_pendidikan ORDER BY asal_pendidikan ASC");

                // $data = mysqli_query($konek, $query);
                $no = 0;
                while ($row = mysqli_fetch_array($data))     
                {
                    $no++;
                    echo "<tr>
                    <td class='text-center'>$no</td>
                    <td class='text-center'>$row[asal_pendidikan]</td>
                    <td class='text-center'>$row[total]</td>
                    <td><div class='btn-row text-center'>
                            <div class='btn-group '>
                            <a href='./detail_instansi.php?pen=$row[asal_pendidikan]' class='btn btn-info'>Detail</a>
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