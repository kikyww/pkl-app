<?php
include '../header/admin/sidebar.php';
include '../koneksi/koneksi.php';
$nim_user = $_SESSION['nim_user'];
$status = $_SESSION['status'];

?>

<div class="pagetitle">
    <h1>Data Penempatan</h1>
    <nav>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="../header/dashboard.php">Home</a></li>
            <li class="breadcrumb-item active">Data Penempatan</li>
        </ol>
    </nav>
</div><!-- End Page Title -->

<section class="section">
    <div class="card">
        <div class="card-body">
            <h5 class="card-title">Penempatan</h5>
            <div style="display:flex; justify-content:space-between; margin-right: 35
                x; margin-bottom: 20px;">
                <?php
                date_default_timezone_set('Singapore');
                echo date('l, d-m-Y / H:i');
                ?>
                
            </div>
            <table class="table table-striped" id="idcuy">
                <thead>
                    <tr class="">
                        <th>No</th>
                        <th>Piket</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    if (isset($_GET['id_user'])) {
                        $nim_user = $_SESSION['nim_user'];
                        $nim_kegiatan = trim($_GET['nim_kegiatan']);
                        $tanggal = trim($_GET['tanggal']);
                        $kegiatan = trim($_GET['kegiatan']);
                        $keterangan = trim($_GET['keterangan']);
                    } else if ($status != 'User') {
                        $query = mysqli_query($konek, "SELECT * FROM tb_piket");
                    } else {
                        $query = mysqli_query($konek, "SELECT * FROM tb_piket");
                    }

                    $no = 0;
                    while ($row = mysqli_fetch_array($query)) {
                        $no++;
                        echo "<tr>
                <td>$no</td>  
                <td>$row[piket]</td>
                    </td>
                <td><div class='btn-row'>
                <div class='btn-group'>
                    <a href='edit_piket_adm.php?id=$row[0]' class='btn btn-warning'>Edit</a>
                    <a href='hapus_piket_adm.php?id=$row[0]' onclick='return confirm(\" Hapus Kegiatan ini?\");' class='btn btn-danger'>Hapus</a>
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
<?php
include '../header/footer.php';
?>