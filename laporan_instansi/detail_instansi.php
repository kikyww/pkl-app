<?php
include '../header/sidebar.php';
include '../koneksi/koneksi.php';
$nim_user = $_SESSION['nim_user'];
$pen = $_GET['pen']; 

$query = mysqli_query($konek, "SELECT *, COUNT(status_pkl) AS total FROM tb_biodata WHERE asal_pendidikan = '$pen' AND status_pkl = 'Diterima' GROUP BY jurusan ORDER BY jurusan ASC");

?>

<div class="pagetitle">
    <h1>Halaman Laporan Instansi</h1>
    <nav>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="../header/dashboard.php">Home</a></li>
            <li class="breadcrumb-item active">Laporan Jurusan</li>
        </ol>
    </nav>
</div>

<section class="section">
    <div class="card">
        <div class="card-body">
            <div class="d-flex justify-content-between">
                <h5 class="card-title">Laporan Jurusan</h5>
                <a href="index.php" class="btn btn-warning">Kembali</a>
            </div>
            <table class="table table-striped" id="idcuy">
                <thead>
                    <tr class="">
                        <th>Jurusan</th>
                        <th>Jumlah</th>
                        <th>Detail</th>
                    </tr>
                </thead>
                <tbody>

                    <?php
                    $no = 0;
                    while ($data = mysqli_fetch_array($query)) {
                         
                            $no++;
                            echo "
    <tr>
        <td>$data[jurusan]</td>
        <td>$data[total]</td>
       <td><div class='btn-row text-center'>
                            <div class='btn-group '>
                            <a href='./detail_jurusan.php?pen=$data[asal_pendidikan]&jurusan=$data[jurusan]' class='btn btn-info'>Detail</a>
                            </div>
                            </div>
                            </td>
        
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