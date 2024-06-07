<?php
include '../header/admin/sidebar.php';
include '../koneksi/koneksi.php';
$nim_user = $_SESSION['nim_user'];
$status = $_SESSION['status'];

?>

<div class="pagetitle">
    <h1>Catatan Kegiatan</h1>
    <nav>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="../header/dashboard.php">Home</a></li>
            <li class="breadcrumb-item active">Catatan Kegiatan</li>
        </ol>
    </nav>
</div><!-- End Page Title -->

<section class="section">
    <div class="card">
        <div class="card-body">
            <h5 class="card-title">Catatan Kegiatan Harian</h5>
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
                        <?php if ($status == "Admin") {
                            echo "<th>Nim</th>";
                        } ?>
                        <th>Tanggal</th>
                        <th>Penempatan</th>
                        <th>Kegiatan</th>
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
                    } else if ($status != "User") {
                        $query = mysqli_query($konek, "SELECT * FROM tb_kegiatan INNER JOIN tb_jadwal ON tb_kegiatan.jadwal_id = tb_jadwal.id_jadwal INNER JOIN tb_piket ON tb_jadwal.piket_id = tb_piket.id_piket ");
                    } else {
                        $query = mysqli_query($konek, "SELECT * FROM tb_kegiatan INNER JOIN tb_jadwal ON tb_kegiatan.jadwal_id = tb_jadwal.id_jadwal INNER JOIN tb_piket ON tb_jadwal.piket_id = tb_piket.id_piket WHERE nim_kegiatan = '$nim_user' ");
                    }

                    $no = 0;
                    while ($row = mysqli_fetch_array($query)) {
                        $no++;
                        echo "<tr>
                <td>$no</td>";
                        if ($status == "Admin") {
                            echo "<td>$row[nim_kegiatan]</td>";
                        }
                        echo "<td>$row[tanggal]</td>
                        <td>$row[piket]</td>
                <td>- $row[kegiatan]<br>";
                        if ($row['keterangan'] == true) {
                            echo "- $row[keterangan] <br>";
                        }
                        echo "</td>
                <td><div class='btn-row'>
                <div class='btn-group'>
                    <a href='edit_kegiatan_adm.php?id=$row[0]' class='btn btn-warning'>Edit</a>
                    <a href='hapus_kegiatan_adm.php?id=$row[0]' onclick='return confirm(\" Hapus Kegiatan ini?\");' class='btn btn-danger'>Hapus</a>
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