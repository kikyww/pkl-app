<?php
include '../header/sidebar.php';
include '../koneksi/koneksi.php';
// $id = $_GET['id'];
$nim = $_GET['nim'];


if (!isset($_SESSION['id_user']) && $_SESSION['id_user'] == false) {
  header('location:../login/halaman_login.php');
  exit;
}

if(!isset($_SESSION['nim_user'])){
    echo"<script>window.location.href = '../pages-error-404.html'</script>";
}

if(isset($nim)){
    include '../koneksi/koneksi.php';

    $query = mysqli_query($konek ,"SELECT tb_biodata.nama_mhs, tb_biodata.nim, tb_biodata.asal_pendidikan, tb_nilai.id_nilai, IFNULL(tb_nilai.n_sopan, 0) as n_sopan, IFNULL(tb_nilai.n_disiplin, 0) as n_disiplin, IFNULL(tb_nilai.n_keaktifan, 0) as n_keaktifan, IFNULL(tb_nilai.n_sungguh, 0) as n_sungguh, IFNULL(tb_nilai.n_mandiri, 0) as n_mandiri, IFNULL(tb_nilai.n_bersama, 0) as n_bersama, IFNULL(tb_nilai.n_teliti, 0) as n_teliti, IFNULL(tb_nilai.n_pendapat, 0) as n_pendapat, IFNULL(tb_nilai.n_menyerap, 0) as n_menyerap, IFNULL(tb_nilai.n_kreatif, 0) as n_kreatif, IFNULL(tb_nilai.rata_rata, 0) as rata_rata FROM tb_biodata LEFT JOIN tb_nilai ON tb_biodata.nim = tb_nilai.nim_nilai");
}
?>

 
  <style>
table {
    display: flex;
    /* justify-content:center; */
  width: 100%;
  border-collapse: collapse;
}

th, td {
  text-align: left;
  vertical-align: top;
  border: 1px solid #252525;
  padding: 8px;
}

tr:nth-child(even) {
  background-color: #f2f2f2;
}

th {
  background-color: #f2f2f2;
  color: black;
}

th, td {
  height: 50px;
  display: flex;
  align-items: center;
}

th {
  width: 20rem; 
  text-align: left;
}

td {
  width: 10rem; 
  text-align: right;
}


  </style>



<div class="pagetitle">
    <h1>Halaman Catatan Nilai</h1>
    <nav>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="../header/dashboard.php">Home</a></li>
            <li class="breadcrumb-item active">Catatan Nilai</li>
        </ol>
    </nav>
</div>

<section class="section">
    <div class="card">
        <div class="card-body">
            <h5 class="card-title">Catatan Nilai</h5>
            <table class="table table-header-rotated" id="idcuy">
                <thead>
                    <tr class="">
                        <th hidden>Nama</th>
                        <th>Aktivitas Yang Dinilai</th>
                        <th>Sopan Santun</th>
                        <th>Kedisiplinan</th>
                        <th>Keaktifan</th>
                        <th>Kesungguhan</th>
                        <th>Kemampuan Bekerja Mandiri</th>
                        <th>Kemampuan Bekerja Sama</th>
                        <th>Ketelitian</th>
                        <th>Kemampuan Mengemukakan Pendapat</th>
                        <th>Kemampuan Menyerap Hal Baru</th>
                        <th>Inisiatif dan Kreatifitas</th>
                        <th>Rata-Rata Nilai</th>
                    </tr>
                </thead>
            <tbody>

<?php
$no = 0;
    while ($row = mysqli_fetch_array($query)) {
if ($_GET['nim'] == $row['nim']) {
    $no++;
echo"
    <tr>
        <td hidden>$row[nama_mhs]</td>
        <td class='text-bold'><strong>Nilai</strong></td>
        <td>$row[n_sopan]</td>
        <td>$row[n_disiplin]</td>
        <td>$row[n_keaktifan] </td>
        <td>$row[n_sungguh] </td>
        <td>$row[n_mandiri] </td>
        <td>$row[n_bersama] </td>
        <td>$row[n_teliti] </td>
        <td>$row[n_pendapat] </td>
        <td>$row[n_menyerap] </td>
        <td>$row[n_kreatif] </td>
        <td>$row[rata_rata] </td>
        </tr>
        <div class='btn-row'>
            <div class='btn-group'>
                <a href='edit_nilai.php?id=$row[3]' class='btn btn-warning'>Edit Nilai</a>
                <a href='hapus_nilai.php?id=$row[3]' onclick='return confirm(\" Hapus Nilai ini?\");' class='btn btn-danger'>Hapus Nilai</a>
                </div>
            </div>";
        if ($row['n_sopan'] == false) {
          echo "<div style='display:flex; justify-content:end; margin-bottom: 20px;'>
              <a class='btn btn-success' href='tambah_nilai.php?nim=$row[nim]'>Tambah Nilai</a>
          </div>
          ";
        } else {
          echo "<div style='display:flex; justify-content:end; margin-bottom: 20px;'>
          <a class='btn btn-success'>Tambah Nilai</a>
      </div>";
        }
    }
} 
?>
</tbody>
    </table>
</div>
        
 <?php 
include '../header/footer.php';
 ?>