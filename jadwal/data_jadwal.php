<?php
include '../header/sidebar.php';
include '../koneksi/koneksi.php';
$nim_user = $_SESSION['nim_user'];
$status = $_SESSION['status'];

?>

<div class="pagetitle">
    <h1>Jadwal Piket</h1>
    <nav>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="../header/dashboard.php">Home</a></li>
            <li class="breadcrumb-item active">Jadwal Piket</li>
        </ol>
    </nav>
</div><!-- End Page Title -->

<section class="section">
    <div class="card">
        <div class="card-body">
            <h5 class="card-title">Jadwal Piket</h5>
            <div style="display:flex; justify-content:space-between; margin-right: 35
                x; margin-bottom: 20px;">
                <?php
                date_default_timezone_set('Singapore');
                echo date('l, d-m-Y / H:i');
                ?>
        <?php if($_SESSION["status"] != 'User'){ ?>
                <a class="btn btn-success" href="tambah_jadwal.php">Tambah</a>
        <?php } ?>

            </div>
            <table class="table table-striped" id="idcuy">
                <thead>
                    <tr class="">
                        <th>No</th>
                        <th>Nama</th>
                        <th>Tanggal</th>
                        <th>Penempatan</th>
        <?php if($_SESSION["status"] != 'User'){ ?>

                        <th>Aksi</th>
        <?php } ?>

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
                    } else if ($status == true) {
                        $query = mysqli_query($konek, "SELECT * FROM tb_jadwal LEFT JOIN tb_piket ON tb_jadwal.piket_id = tb_piket.id_piket LEFT JOIN tb_biodata ON tb_jadwal.nim_jadwal = tb_biodata.nim ");
                    }

                    $no = 0;
                    while ($row = mysqli_fetch_array($query)) {
                        $no++;
                        echo "<tr>
                <td>$no</td>
                         
                        <td>$row[nama_mhs]</td>
                        <td>$row[tanggal]</td>
                        <td>$row[piket]</td>";
                        if ($_SESSION["status"] != 'User') {
                            echo"<td><div class='btn-row'>
                            <div class='btn-group'>
                                <a href='edit_kegiatan.php?id=$row[0]' class='btn btn-warning'>Edit</a>
                                <a href='hapus_kegiatan.php?id=$row[0]' onclick='return confirm(\" Hapus Kegiatan ini?\");' class='btn btn-danger'>Hapus</a>
                                </div>
                            </div>
                        </td>";
                        }
                
        echo "</tr>";
                    }
                    ?>
                </tbody>
        </div>
    </div>
</section>
<?php
include '../header/footer.php';
?>