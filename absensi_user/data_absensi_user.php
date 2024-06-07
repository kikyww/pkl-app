<?php
include '../header/user/sidebar.php';
include '../koneksi/koneksi.php';
$username = $_SESSION['id_user'];
$status = $_SESSION['status'];

?>

<div class="pagetitle">
    <h1>Absensi</h1>
    <nav>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="../header/dashboard.php">Home</a></li>
            <li class="breadcrumb-item active">Tambah Absen</li>
        </ol>
    </nav>
</div><!-- End Page Title -->

<section class="section">
    <div class="card">
        <div class="card-body">
            <h5 class="card-title">Absensi</h5>
            <div style="display:flex; justify-content:space-between; margin-right: 35
                x; margin-bottom: 20px;">
                <?php
                date_default_timezone_set('Singapore');
                echo date('l, d-m-Y / H:i');
                ?>
                <a class="btn btn-success" href="tambah_absensi_user.php">Absen</a>
            </div>
            <table class="table table-striped" id="nim_absen">
                <thead>
                    <tr class="">
                        <th>No</th>
                        <?php if ($status != "User") {
                            echo "<th>Username</th>";
                        } ?>
                        <th>Tanggal dan Waktu</th>
                        <th>Kehadiran</th>
                        <th>Keterangan</th>
                        <?php if ($status != "User") {
                            echo "<th>Aksi</th>";
                        } ?>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    if (isset($_GET['id_user'])) {
                        $username = $_SESSION['nim_user'];
                        $nim_absen = trim($_GET['nim_absen']);
                        $tanggal = trim($_GET['tanggal']);
                        $kehadiran = trim($_GET['kehadiran']);
                        $keterangan = trim($_GET['keterangan']);
                    } else if ($status != 'User') {
                        $query = mysqli_query($konek, "SELECT * FROM tb_absen ORDER BY tanggal DESC");
                    } else {
                        $query = mysqli_query($konek, "SELECT * FROM tb_absen WHERE nim_absen = '$username' ORDER BY tanggal DESC");
                    }

                    $no = 0;
                    while ($row = mysqli_fetch_array($query)) {
                        $no++;
                        echo "<tr>
                <td>$no</td>";
                        if ($status != "User") {
                            echo "<td>$row[nim_absen]</td>";
                        }
                        echo "<td>$row[tanggal]</td>
                <td>$row[kehadiran]</td>
                <td>$row[keterangan]</td>";
                        if ($status != "User") {
                            echo "<td><div class='btn-row'>
                <div class='btn-group'>
                    <a href='edit_absensi.php?id=$row[0]' class='btn btn-warning'>Edit</a>
                    <a href='hapus_absensi.php?id=$row[0]' onclick='return confirm(\" Hapus Data ini?\");' class='btn btn-danger'>Hapus</a>
                    </div>
                </div>";
                        }
                        echo "</td>
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