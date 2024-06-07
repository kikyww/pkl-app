<?php
include '../koneksi/koneksi.php';

if (isset($_POST['submit'])) {
    $nama = $_POST['nama'];
    $nim = $_POST['nim'];
    $pendidikan = $_POST['pendidikan'];
    $jurusan = $_POST['jurusan'];
    $alamat = $_POST['alamat'];
    $telepon = $_POST['telepon'];
    $lahir = $_POST['lahir'];
    $masuk = $_POST['masuk'];
    $keluar = $_POST['keluar'];
    $password = $_POST['password'];
    $status = $_POST['status'];
    $status_pkl = $_POST['status_pkl'];

    $num = mysqli_query($konek, "SELECT id_user FROM tb_user ORDER BY id_user DESC");
    if (mysqli_num_rows($num) > 0) {
        $num = mysqli_fetch_array($num);
        $idUser = $num['id_user'] + 1;
    }else {
        $idUser = 1;
    }

    mysqli_query($konek, "INSERT INTO tb_user (nim_user, id_user, password, status) VALUES ('$nim', '$idUser', '$password', '$status')" );
    
    $sql = "INSERT INTO tb_biodata (id_siswa, nama_mhs, nim, asal_pendidikan, jurusan, alamat, telepon, tgl_lahir, tgl_masuk, tgl_keluar, password, status, status_pkl) VALUES ('$idUser', '$nama', '$nim', '$pendidikan', '$jurusan', '$alamat', '$telepon', '$lahir', '$masuk', '$keluar',  '$password', '$status', '$status_pkl')";
    if (mysqli_query($konek, $sql)) {
        echo "<script>alert(`Telah Berhasil Mendaftar`);</script>";
        echo '<meta http-equiv="refresh" content="0; url=../index.php">';
    } else {
        echo "<script>alert(`Nim Telah Digunakan!`);</script>";
    }
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
  <link rel="stylesheet" href="vendors/simplebar/css/simplebar.css">
  <link rel="stylesheet" href="../css/vendors/simplebar.css">
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
      <li class="nav-item active"><a class="nav-link" href="daftar.php">
          <svg class="nav-icon">
          </svg>Pengajuan PKL<span class="badge badge-sm bg-info ms-auto"></span></a></li>
      </li>
  
      <li class="nav-item"><a class="nav-link" href="../penelitian/index.php">
          <svg class="nav-icon">
          </svg>Pengajuan Penelitian<span class="badge badge-sm bg-info ms-auto"></span></a></li>
      </li>
  
      <li class="nav-item"><a class="nav-link" href="../login/halaman_login.php">
          <svg class="nav-icon">
          </svg> Login<span class="badge badge-sm bg-info ms-auto"></span></a></li>
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
          <li class="nav-item"><a class="nav-link" href="#">Form Pendaftaran</a></li>
        </ul>
        <ul class="header-nav ms-auto">
        </ul>

      </div>
    </header>

    <div class="body flex-grow-1 px-3">
      <div class="container-lg"></div>
      
<section class="section">
  <div class="card">
    <div class="card-body">
      <h5 class="card-title">Pendaftaran</h5>
      <form action="" method="POST">

        <div class="row mb-3">
          <label for="nama" class="col-sm-2 col-form-label">Nama Lengkap</label>
          <div class="col-sm-10">
            <input name="nama" type="text" class="form-control">
          </div>
        </div>

        <div class="row mb-3">
          <label for="nim" class="col-sm-2 col-form-label">NIM</label>
          <div class="col-sm-10">
            <input name="nim" type="text" class="form-control">
          </div>
        </div>

        <div class="row mb-3">
          <label for="pendidikan" class="col-sm-2 col-form-label">Asal Pendidikan</label>
          <div class="col-sm-10">
            <input name="pendidikan" type="text" class="form-control">
          </div>
        </div>

        <div class="row mb-3">
          <label for="jurusan" class="col-sm-2 col-form-label">Jurusan</label>
          <div class="col-sm-10">
            <input name="jurusan" type="text" class="form-control">
          </div>
        </div>

        <div class="row mb-3">
          <label for="alamat" class="col-sm-2 col-form-label">Alamat</label>
          <div class="col-sm-10">
            <textarea name="alamat" type="text" class="form-control"></textarea>
          </div>
        </div>

        <div class="row mb-3">
          <label for="telepon" class="col-sm-2 col-form-label">Telepon</label>
          <div class="col-sm-10">
            <input name="telepon" type="number" class="form-control">
          </div>
        </div>

        <div class="row mb-3">
          <label for="lahir" class="col-sm-2 col-form-label">Tempat Tanggal Lahir</label>
          <div class="col-sm-10">
            <input name="lahir" type="text" class="form-control">
          </div>
        </div>

        <div class="row mb-3">
          <label for="masuk" class="col-sm-2 col-form-label">Tanggal Masuk</label>
          <div class="col-sm-10">
            <input name="masuk" type="date" class="form-control">
          </div>
        </div>

        <div class="row mb-3">
          <label for="keluar" class="col-sm-2 col-form-label">Tanggal Keluar</label>
          <div class="col-sm-10">
            <input name="keluar" type="date" class="form-control">
          </div>
        </div>

        <input name="password" hidden value="12345" type="text" class="form-control">
        <input name="status" type="text" hidden value="user" class="form-control">
        <input name="status_pkl" type="text" hidden value="Pending" class="form-control">
            
          <div class="d-flex justify-content-end mt-3">
            <button name="submit" value="submit" type="submit" class="btn btn-success">Kirim</button>
          </div>
      </form>
    </div>
  </div>
</section>

<?php
include '../header/footer.php';
?>