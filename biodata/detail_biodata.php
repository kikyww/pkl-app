<?php
include '../header/sidebar.php';

$nim = $_GET['nim'];
if (isset($nim)) {
    include '../koneksi/koneksi.php';
    $query = mysqli_query($konek, "SELECT * FROM tb_biodata WHERE nim = '$nim'");
    $row = mysqli_fetch_array($query);
}

$tanggal_sekarang = date('Y-m-d');
if ($row['tgl_keluar'] >= $row['tgl_masuk'] && $tanggal_sekarang < $row['tgl_keluar']) {
    $status = "<span class='badge rounded-pill bg-success'>Aktif</span>";
} else {
    $status = "<span class='badge rounded-pill bg-danger'>Non Aktif</span>";
}

?>

<div class="pagetitle">
    <h1>Profile</h1>
    <nav>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="index.html">Home</a></li>
            <li class="breadcrumb-item">Master Data</li>
            <li class="breadcrumb-item active">Detail Profile</li>
        </ol>
    </nav>
</div><!-- End Page Title -->

<section class="section profile">
    <div class="row">
        <div class="col-xl-12">

            <div class="card">
                <div class="card-body pt-3">
                    <!-- Bordered Tabs -->
                    <ul class="nav nav-tabs nav-tabs-bordered">

                        <li class="nav-item">
                            <button class="nav-link active" data-bs-toggle="tab" data-bs-target="#profile-overview">Profil</button>
                        </li>

                        <li class="nav-item">
                            <?php
                            if ($_SESSION['nim_user'] == $row['nim']) {
                                echo "<a href ='edit_biodata.php?nim=$row[nim]' class='nav-link'data-bs-toggle='tab' data-bs-target=''>Edit Profil</a> ";
                            }
                            ?>
                
                        </li>
                    </ul>
                    <div class="tab-content pt-2">
                        <div class="tab-pane fade show active profile-overview" id="profile-overview">
                            <h5 class="card-title">Detail Profil</h5>

                            <div class="row" hidden>
                                <div class="col-lg-9 col-md-8"><?= $row['id_siswa'] ?></div>
                            </div>

                            <div class="row">
                                <div class="col-lg-3 col-md-4 label ">Nama</div>
                                <div class="col-lg-9 col-md-8"><?= $row['nama_mhs'] ?></div>
                            </div>

                            <div class="row">
                                <div class="col-lg-3 col-md-4 label">NIM</div>
                                <div class="col-lg-9 col-md-8"><?= $row['nim'] ?></div>
                            </div>

                            <div class="row">
                                <div class="col-lg-3 col-md-4 label">Asal Pendidikan</div>
                                <div class="col-lg-9 col-md-8"><?= $row['asal_pendidikan'] ?></div>
                            </div>

                            <div class="row">
                                <div class="col-lg-3 col-md-4 label">Jurusan</div>
                                <div class="col-lg-9 col-md-8"><?= $row['jurusan'] ?></div>
                            </div>

                            <div class="row">
                                <div class="col-lg-3 col-md-4 label">Tempat Tanggal Lahir</div>
                                <div class="col-lg-9 col-md-8"><?= $row['tgl_lahir'] ?></div>
                            </div>

                            <div class="row">
                                <div class="col-lg-3 col-md-4 label">Alamat</div>
                                <div class="col-lg-9 col-md-8"><?= $row['alamat'] ?></div>
                            </div>

                            <div class="row">
                                <div class="col-lg-3 col-md-4 label">Telepon</div>
                                <div class="col-lg-9 col-md-8"><?= $row['telepon'] ?></div>
                            </div>

                            <div class="row">
                                <div class="col-lg-3 col-md-4 label">Tanggal Mulai</div>
                                <div class="col-lg-9 col-md-8"><?= $row['tgl_masuk'] ?></div>
                            </div>

                            <div class="row">
                                <div class="col-lg-3 col-md-4 label">Tanggal Selesai</div>
                                <div class="col-lg-9 col-md-8"><?= $row['tgl_keluar'] ?></div>
                            </div>
                        </div>

                    </div>

                    
                    </div><!-- End Bordered Tabs -->
                </div>
            </div>

        </div>
    </div>
</section>

<?php
include '../header/footer.php';
?>