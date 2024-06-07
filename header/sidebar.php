<?php
include '../koneksi/koneksi.php';
session_start();

$n = $_SESSION['nim_user'];

if (!isset($_SESSION['id_user']) && $_SESSION['id_user'] == false) {
  header('location:../login/halaman_login.php');
  exit;
}

?>
<!DOCTYPE html>
<!-- Breadcrumb-->
<html lang="en">

<head>
  <base href="./">
  <meta charset="utf-9">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
  <meta name="description" content="CoreUI - Open Source Bootstrap Admin Template">
  <meta name="author" content="Łukasz Holeczek">
  <meta name="keyword" content="Bootstrap,Admin,Template,Open,Source,jQuery,CSS,HTML,RWD,Dashboard">
  <title> UPPD Banjarmasin 1 </title>
  <link rel="apple-touch-icon" sizes="57x57" href="../assets/favicon/apple-icon-57x57.png">
  <link rel="apple-touch-icon" sizes="60x60" href="../assets/favicon/apple-icon-60x60.png">
  <link rel="apple-touch-icon" sizes="72x72" href="../assets/favicon/apple-icon-72x72.png">
  <link rel="apple-touch-icon" sizes="76x76" href="../assets/favicon/apple-icon-76x76.png">
  <link rel="apple-touch-icon" sizes="114x114" href="../assets/favicon/apple-icon-114x114.png">
  <link rel="apple-touch-icon" sizes="120x120" href="../assets/favicon/apple-icon-120x120.png">
  <link rel="apple-touch-icon" sizes="144x144" href="../assets/favicon/apple-icon-144x144.png">
  <link rel="apple-touch-icon" sizes="152x152" href="../assets/favicon/apple-icon-152x152.png">
  <link rel="apple-touch-icon" sizes="180x180" href="../assets/favicon/apple-icon-180x180.png">
  <link rel="icon" type="image/png" sizes="192x192" href="../assets/favicon/android-icon-192x192.png">
  <link rel="icon" type="image/png" sizes="32x32" href="../assets/favicon/favicon-32x32.png">
  <link rel="icon" type="image/png" sizes="96x96" href="../assets/favicon/favicon-96x96.png">
  <link rel="icon" type="image/png" sizes="16x16" href="../assets/favicon/favicon-16x16.png">
  <link rel="manifest" href="../assets/favicon/manifest.json">
  <meta name="msapplication-TileColor" content="#ffffff">
  <meta name="msapplication-TileImage" content="../assets/favicon/ms-icon-144x144.png">
  <meta name="theme-color" content="#ffffff">
  <!-- Vendors styles-->
  <link rel="stylesheet" href="../vendors/simplebar/css/simplebar.css">
  <link rel="stylesheet" href="../css/vendors/simplebar.css">
  <!-- jQuery CDN -->
  <!-- <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script> -->

  <!-- jQuery CDN -->
  <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>

  <!-- DataTables.js CDN -->
  <script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>

  <!-- DataTables CSS CDN -->
  <link rel="stylesheet" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.min.css">


  <!-- Main styles for this application-->
  <link href="../css/style.css" rel="stylesheet">
  <!-- We use those styles to show code examples, you should remove them in your application.-->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/prismjs@1.23.0/themes/prism.css">
  <link href="../css/examples.css" rel="stylesheet">
  <!-- Global site tag (gtag.js) - Google Analytics-->
  <script async="" src="https://www.googletagmanager.com/gtag/js?id=UA-118965717-3"></script>
  <script>
    window.dataLayer = window.dataLayer || [];

    function gtag() {
      dataLayer.push(arguments);
    }
    gtag('js', new Date());
    // Shared ID
    gtag('config', 'UA-118965717-3');
    // Bootstrap ID
    gtag('config', 'UA-118965717-5');
  </script>
  <link href="vendors/@coreui/chartjs/css/coreui-chartjs.css" rel="stylesheet">
</head>

<body>
  <div class="sidebar sidebar-dark sidebar-fixed" id="sidebar" style="background-color:#252525;">
    <div class="sidebar-brand d-none d-md-flex">
      <img src="../assets/img/kalsel.png" class="sidebar-brand-full" width="30" height="30">
      <a class="navbar-brand" href="#">
        <use xlink:href="../assets/favicon/kalsel.png"></use>
        </svg> UPPD Banjarmasin 1 <span class="badge badge-sm bg-info ms-auto"></span>
      </a></li>
      </svg>
      <svg class="sidebar-brand-narrow" width="36" height="36" alt="CoreUI Logo">
        <use xlink:href="../assets/img/kalsel.png"></use>
      </svg>
    </div>
    <ul class="sidebar-nav" data-coreui="navigation" data-simplebar="">
      <li class="nav-item"><a class="nav-link" href="../dashboard/index.php">
          <svg class="nav-icon">
          </svg> Dashboard<span class="badge badge-sm bg-info ms-auto"></span></a></li>
      </li>

      <?php if($_SESSION["status"] == 'Pembimbing'){ ?>
      <li class="nav-group"><a class="nav-link nav-group-toggle" href="#">
          <svg class="nav-icon">
          </svg> Surat PKL </a>
        <ul class="nav-group-items">
          <li class="nav-item"><a class="nav-link" href="../pendaftaran/data_daftar.php">
              <svg class="nav-icon">
              </svg> Pengajuan PKL</a>
          </li>
          <li class="nav-item"><a class="nav-link" href="../surat_balasan/data_surat.php">
              <svg class="nav-icon">
              </svg> Surat Balasan PKL </a>
          </li>
        </ul>
      </li>
      <li class="nav-group"><a class="nav-link nav-group-toggle" href="#">
          <svg class="nav-icon">
          </svg> Surat Penelitian </a>
        <ul class="nav-group-items">
          <li class="nav-item"><a class="nav-link" href="../penelitian/data_penelitian.php">
              <svg class="nav-icon">
              </svg> Pengajuan Penelitian </a>
          </li>
          <li class="nav-item"><a class="nav-link" href="../surat_pbalasan/data_surat.php">
              <svg class="nav-icon">
              </svg> Surat Balasan Penelitian</a>
          </li>
        </ul>
      </li>
      <?php } ?>

      <?php if($_SESSION["status"] == 'User'): ?>
      <li class="nav-item"><a class="nav-link" href="../surat_balasan/cetak_surat_mahasiswa.php">
        <svg class="nav-icon">
        </svg> Surat Balasan PKL</a>
      </li>
      <?php endif; ?>

      <li class="nav-group"><a class="nav-link nav-group-toggle" href="#">
          <svg class="nav-icon">
          </svg> Mastar Data </a>
        <ul class="nav-group-items">
          <li class="nav-item"><a class="nav-link" href="../biodata/data_biodata.php"><span class="nav-icon"></span>Data Mahasiswa</a></li>
          <li class="nav-item"><a class="nav-link" href="../absensi/data_absensi.php"><span class="nav-icon"></span> Absensi</a></li>

          <?php if ($_SESSION['status']  == "User") {
            echo '
            <li class="nav-item"><a class="nav-link" href="../kegiatan/data_kegiatan.php"><span class="nav-icon"></span> Kegiatan </a></li>
            ';
          } else {
            echo '
            <li class="nav-item"><a class="nav-link" href="../kegiatan/admin_kegiatan.php"><span class="nav-icon"></span> Kegiatan </a></li>
            ';
          } ?>
          <li class="nav-item"><a class="nav-link" href="../jadwal/data_jadwal.php"><span class="nav-icon"></span> Jadwal Piket</a></li>

      <?php if($_SESSION["status"] != 'User'){ ?>
          <li class="nav-item"><a class="nav-link" href="../piket/data_piket.php"><span class="nav-icon"></span> Penempatan </a></li>
          <li class="nav-item"><a class="nav-link" href="../nilai/data_nilai.php"><span class="nav-icon"></span> Penilaian</a></li>
          <?php } ?>

        </ul>
      </li>
      <li class="nav-group"><a class="nav-link nav-group-toggle" href="#">
          <svg class="nav-icon">
          </svg> Laporan </a>
        <ul class="nav-group-items">
        <?php if($_SESSION["status"] != 'User'){ ?>
          <li class="nav-item"><a class="nav-link" href="../laporan_surat/index.php" target="_top">
              <svg class="nav-icon">
              </svg> Arsip Surat Balasan PKL </a></li>
          <li class="nav-item"><a class="nav-link" href="../laporan-spenelitian/index.php" target="_top">
              <svg class="nav-icon">
              </svg> Arsip Surat Penelitian </a></li>
          <li class="nav-item"><a class="nav-link" href="../laporan_biodata/index.php" target="_top">
              <svg class="nav-icon">
              </svg> Biodata mahasiswa PKL </a></li>
              <?php } ?>
              
          <li class="nav-item"><a class="nav-link" href="../laporan_absen/index.php" target="_top">
              <svg class="nav-icon">
              </svg> Laporan Absensi</a></li>
          <li class="nav-item"><a class="nav-link" href="../laporan_kegiatan/index.php" target="_top">
              <svg class="nav-icon">
              </svg> Laporan Kegiatan </a></li>
          <li class="nav-item"><a class="nav-link" href="../laporan_nilai/index.php" target="_top">
              <svg class="nav-icon">
              </svg> Laporan Penilaian </a></li>
          <li class="nav-item"><a class="nav-link" href="../laporan_piket/index.php" target="_top">
              <svg class="nav-icon">
              </svg> Laporan Jadwal Piket </a></li>
              
      <?php if($_SESSION["status"] != 'User'){ ?>
        <li class="nav-item"><a class="nav-link" href="../sertifikat/index.php" target="_top">
              <svg class="nav-icon">
              </svg> Sertifikat </a></li>
              <li class="nav-item"><a class="nav-link" href="../laporan_instansi/index.php" target="_top">
                  <svg class="nav-icon">
                  </svg> Laporan Instansi </a></li>
        <?php } else { ?>
          <li class="nav-item"><a class="nav-link" href="../sertifikat/sertifikat-siswa.php" target="_top">
          <svg class="nav-icon">
          </svg> Sertifikat </a></li>
        <?php } ?>

        </ul>
      </li>
    </ul>
    <button class="sidebar-toggler" type="button" data-coreui-toggle="unfoldable"></button>
  </div>
  <div class="wrapper d-flex flex-column min-vh-100 bg-light">
    <header class="header header-sticky mb-4" style="background-color:orange;">
      <div class="container-fluid">
        <button class="header-toggler px-md-0 me-md-3" type="button" onclick="coreui.Sidebar.getInstance(document.querySelector('#sidebar')).toggle()">
          <svg class="icon icon-lg">
            <use xlink:href="../vendors/@coreui/icons/svg/free.svg#cil-menu"></use>
          </svg>
        </button><a class="header-brand d-md-none" href="#">
          <svg width="118" height="46" alt="CoreUI Logo">
            <use xlink:href="../assets/brand/coreui.svg#full"></use>
          </svg></a>
        <ul class="header-nav d-none d-md-flex">
          <li class="nav-item"><a class="nav-link" href="#">Dashboard</a></li>
        </ul>
        <ul class="header-nav ms-auto">
        </ul>
        <ul class="header-nav ms-4">

      <?php if($_SESSION["status"] != 'User'){ ?>
          <li class="nav-item dropdown"><a class="nav-link py-0" data-coreui-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">
              <div class="dropdown"><h5><?= $_SESSION['status'] ?></h5></div>
            </a>
            <div class="dropdown-menu dropdown-menu-end pt-0">
              <div class="dropdown-header bg-light py-2">
                <div class="fw-semibold">Account</div>
              </div><a class="dropdown-item" href="../login/logout.php">
                <svg class="icon me-2">
                  <use xlink:href="../vendors/@coreui/icons/svg/free.svg#cil-account-logout"></use>
                </svg> Logout</a>
            </div>
          </li>
          <?php } else { ?>
            <?php
            $que = mysqli_query($konek, "SELECT * FROM tb_biodata WHERE nim = '$n'");
            $res = $que->fetch_assoc();
            ?>

            <li class="nav-item dropdown"><a class="nav-link py-0" data-coreui-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">
              <div class="dropdown"><h5><?= $res['nama_mhs'] ?></h5></div>
            </a>
            <div class="dropdown-menu dropdown-menu-end pt-0">
              <div class="dropdown-header bg-light py-2">
                <div class="fw-semibold">Account</div>
              </div><a class="dropdown-item" href="../login/logout.php">
                <svg class="icon me-2">
                  <use xlink:href="../vendors/@coreui/icons/svg/free.svg#cil-account-logout"></use>
                </svg> Logout</a>
            </div>
        <?php } ?>
        </ul>
      </div>
    </header>

    <div class="body flex-grow-1 px-3">
      <div class="container-lg">