<?php
include '../header/sidebar.php';

?>

<div class="pagetitle">
    <h1>Penerimaan PKL</h1>
    <nav>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="../header/dashboard.php">Home</a></li>
            <li class="breadcrumb-item active">Data Mahasiswa PKL</li>
        </ol>
    </nav>
</div><!-- End Page Title -->

<section class="section">
    <div class="card">
        <div class="card-body">
            <h5 class="card-title">Data Pendaftaran</h5>
            <div class="d-flex justify-content-end align-items-center" style="margin-right: 35x;">
            </div>
            <table class="table table-striped" id="idcuy">
                <thead>
                    <tr class="text-center">
                        <th>No.</th>
                        <th>Nama</th>
                        <th>NPM</th>
                        <th>Instansi</th>
                        <th>Jurusan</th>
                        <th>Tanggal Masuk</th>
                        <th>Tanggal Keluar</th>
                        <th>Status</th>
                        <?php 
                            if($_SESSION['status'] ==  'Pembimbing'):
                        ?>
                        <th>Aksi</th>
                        <?php endif; ?>
                    </tr>
                </thead>
                <tbody>
                <?php
                include '../koneksi/koneksi.php';
                $query = "SELECT * FROM tb_biodata WHERE status_pkl = 'Pending' OR status_pkl = 'Ditolak' ORDER BY status_pkl DESC";
                $data = mysqli_query($konek, $query);
                $tanggal_sekarang = date('Y-m-d');
                $no = 0;
                while ($row = mysqli_fetch_assoc($data)) {
                    $no++;
                    ?> 
                    <tr>
                        <td><?= $no ?></td>
                        <td><?= $row['nama_mhs'] ?></td>
                        <td><?= $row['nim'] ?></td>
                        <td><?= $row['asal_pendidikan'] ?></td>
                        <td><?= $row['jurusan'] ?></td>
                        <td><?= date('d-m-Y', strtotime($row['tgl_masuk'])) ?></td>
                        <td><?= date('d-m-Y', strtotime($row['tgl_keluar'])) ?></td>
                        <td><?= $row['status_pkl'] ?></td>
                        <?php 
                            if($row['status_pkl'] == "Pending" && $_SESSION['status'] ==  'Pembimbing'){
                        ?>
                        <td>
                            <div class='btn-row'>
                                <div class='btn-group'>
                                    <a href='./surat_terima.php?id=<?= $row['id_siswa'] ?>&status=Diterima' class='btn btn-info'>Terima</a>
                                    <a href='./surat_tolak.php?id=<?= $row['id_siswa'] ?>&status=Ditolak' class='btn btn-danger'>Tolak</a>
                                </div>
                            </div>
                        </td>
                <?php } else {
                    echo"<td></td>";
                }
            
            } ?>
            </tbody>
        </div>
    </div>
</section>



<?php
include '../header/footer.php';
?>