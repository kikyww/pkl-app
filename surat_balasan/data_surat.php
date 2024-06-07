<?php
include '../header/sidebar.php';
include '../koneksi/koneksi.php';
$nim_user = $_SESSION['nim_user'];
$status = $_SESSION['status'];

?>

<div class="pagetitle">
    <h1>Surat Balasan Mahasiswa PKL</h1>
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
                    $query = mysqli_query($konek, "SELECT * FROM tb_surat LEFT JOIN tb_biodata ON tb_surat.biodata_id = tb_biodata.id_siswa ORDER BY tb_surat.id_surat DESC");
                    $no = 0;
                    while ($row = mysqli_fetch_array($query)) {
                        $no++;
                        echo "<tr>
                <td>$no</td>  
                <td>$row[nama_mhs]</td>
                <td>$row[perihal]</td>
                <td>$row[status_pkl]</td>
                <td><div class='btn-row'>
                <div class='btn-group'> ";
                    if ($row['status_pkl'] == 'Diterima'){
                    echo "<a href='surat_terima.php?id=$row[0]' class='btn btn-info'>Cetak</a>";
                } else{
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