<?php
include '../header/sidebar.php';

?>

<div class="pagetitle">
    <h1>Penerimaan Mahasiswa Penelitian</h1>
    <nav>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="../header/dashboard.php">Home</a></li>
            <li class="breadcrumb-item active">Data Mahasiswa Penelitian</li>
        </ol>
    </nav>
</div><!-- End Page Title -->

<section class="section">
    <div class="card">
        <div class="card-body">
            <h5 class="card-title">Data Penelitian</h5>
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
                        <th>Judul Penelitian</th>
                        <th>Status</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                <?php
                include '../koneksi/koneksi.php';
                $query = "SELECT * FROM tb_penelitian WHERE p_status = 'Proses' OR p_status = 'Ditolak' ORDER BY p_status DESC";
                $data = mysqli_query($konek, $query);
                $tanggal_sekarang = date('Y-m-d');
                $no = 0;
                while ($row = mysqli_fetch_assoc($data)) {
                    $no++;
                    ?> 
                    <tr>
                        <td><?= $no ?></td>
                        <td><?= $row['p_nama'] ?></td>
                        <td><?= $row['p_nim'] ?></td>
                        <td><?= $row['p_instansi'] ?></td>
                        <td><?= $row['p_prodi'] ?></td>
                        <td><?= $row['p_judul'] ?></td>
                        <td><?= $row['p_status'] ?></td>
                        <?php 
                            if($row['p_status'] == "Proses"){
                        ?>
                        <td>
                            <div class='btn-row'>
                                <div class='btn-group'>
                                    <a href='./proses.php?id=<?= $row['id_penelitian'] ?>&status=Diterima' class='btn btn-info'>Terima</a>
                                    <a href='./proses.php?id=<?= $row['id_penelitian'] ?>&status=Ditolak' class='btn btn-danger'>Tolak</a>
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