<?php
include '../header/sidebar.php';
include '../koneksi/koneksi.php';
$status = $_SESSION['status'];

?>

<div class="pagetitle">
    <h1>Surat Balasan Mahasiswa Penelitian</h1>
    <nav>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="../header/dashboard.php">Home</a></li>
            <li class="breadcrumb-item active">Surat Balasan</li>
        </ol>
    </nav>
</div><!-- End Page Title -->

<section class="section">
    <div class="card">
        <div class="card-body">
            <h5 class="card-title">Surat Balasan</h5>
            <div style="display:flex; justify-content:space-between; margin-right: 35
                x; margin-bottom: 20px;">
                <?php
                date_default_timezone_set('Singapore');
                echo date('l, d-m-Y / H:i');
                ?>
                <!-- <a class="btn btn-success" href="tambah_surat.php">Tambah</a> -->
            </div>
            <table class="table table-striped" id="idcuy">
                <thead>
                    <tr class="">
                        <th>No</th>
                        <th>Nama Siswa</th>
                        <th>Perihal</th>
                        <th>Status</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $query = mysqli_query($konek, "SELECT * FROM tb_penelitian LEFT JOIN tb_spenelitian ON tb_penelitian.id_penelitian = tb_spenelitian.penelitian_id WHERE tb_penelitian.p_status = 'Diterima' OR tb_penelitian.p_status = 'Ditolak' ORDER BY tb_penelitian.p_status ASC");
                    $no = 0;
                    while ($row = mysqli_fetch_array($query)) {
                        $no++;
                        echo "<tr>
                <td>$no</td>  
                <td>$row[p_nama]</td>
                <td>$row[lampiran]</td>
                <td>$row[p_status]</td>
                <td><div class='btn-row'>
                <div class='btn-group'> ";
                        if ($row['p_status'] == 'Diterima') {
                            echo "<a href='surat_terima.php?id=$row[0]' class='btn btn-info'>Cetak</a>";
                        } else {
                            echo "<a href='surat_tolak.php?id=$row[0]' class='btn btn-info'>Cetak</a>";
                        }
                        echo "<a href='edit_surat.php?id=$row[0]' class='btn btn-warning'>Edit</a>
                    <a href='hapus_surat.php?id=$row[0]' onclick='return confirm(\" Hapus Kegiatan ini?\");' class='btn btn-danger'>Hapus</a>
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