<?php
include '../header/sidebar.php';
$nim_user = $_SESSION['nim_user'];

?>

<div class="pagetitle">
  <h1>Halaman Kegiatan</h1>
  <nav>
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="../utilities/dashboard.php">Home</a></li>
      <li class="breadcrumb-item active">Catatan Kegiatan</li>
    </ol>
  </nav>
</div><!-- End Page Title -->

<section class="section">
<div class="card">
            <div class="card-body">
                <h5 class="card-title">Catatan Kegiatan PKL</h5>
                <table class="table table-striped" id="idcuy">
                <thead>
                    <tr class="text-center">
                        <th class="text-center">No.</th>
                        <th class="text-center">Nama</th>
                        <th class="text-center">Jumlah</th>
                        <th class="text-center">Detail</th>
                    </tr>
                </thead>
                <tbody>

                <?php
                include '../koneksi/koneksi.php';
                $query = "SELECT *,  COUNT(tanggal) AS total FROM tb_biodata LEFT JOIN tb_kegiatan ON tb_kegiatan.nim_kegiatan = tb_biodata.nim WHERE tb_biodata.status_pkl = 'Diterima' GROUP BY tb_biodata.nim ORDER BY tanggal DESC";

                $data = mysqli_query($konek, $query);
                $no = 0;
                while ($row = mysqli_fetch_array($data))     
                {
                    $no++;
                    echo "<tr>
                    <td class='text-center'>$no</td>
                    <td class='text-center'>$row[nama_mhs]</td>
                    <td class='text-center'>$row[total]</td>
                    <td><div class='btn-row text-center'>
                            <div class='btn-group '>
                            <a href='./detail_kegiatan.php?nim=$row[nim]' class='btn btn-info'>Detail</a>
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