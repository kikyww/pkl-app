<?php
include '../koneksi/koneksi.php';
session_start();

$no = $_POST['no_surat'];
$lampiran = $_POST['lampiran'];
$perihal = $_POST['perihal'];
$tujuan_surat = $_POST['tujuan_surat'];
$tanggal1 = $_POST['tanggal1'];
$kampus = $_POST['asal'];
$no_surat1 = $_POST['no_surat1'];
$hal = $_POST['hal'];
$asal = $_POST['asal'];
$jumlah = $_POST['jumlah'];

$nama1 = $_POST['nama1'];
$npm1 = $_POST['npm1'];
$jurusan1 = $_POST['jurusan1'];

$nama2 = $_POST['nama2'];
$npm2 = $_POST['npm2'];
$jurusan2 = $_POST['jurusan2'];

$nama3 = $_POST['nama3'];
$npm3 = $_POST['npm3'];
$jurusan3 = $_POST['jurusan3'];


?>


<!DOCTYPE html>
<html>

<head>
  <title>Surat Resmi</title>
  <link rel="stylesheet" type="text/css" href="style.css">
</head>

<style>
  .container {
    width: 800px;
    margin: 0 auto;
    background-color: lavenderblush;
    font-family: Arial, sans-serif;
  }

  .header {
    text-align: center;
    margin-bottom: 30px;
  }

  .body {
    line-height: 1.5;
  }

  table {
    width: 100%;
    border-collapse: collapse;
  }

  hr {
    border-bottom: 5px double #000;
    clear: both
  }

  #cop {
    float: left;
    width: 550px;
    text-align: center;
  }

  .style1 {
    font-size: 16
  }

  .style2 {
    font-size: 18px;
  }

  h2,
  h1,
  h3 {
    padding: 0;
    margin: 0;
  }

  h1 {
    font-size: 22px;
    font-weight: bold
  }

  h2 {
    font-size: 22px;
    font-weight: normal
  }

  #logo {
    width: 95px;
    float: left;
    margin-bottom: 8px;
  }

  td {
    border: 1px solid #dddddd;
    padding: 8px;
    text-align: left;
  }

  th {
    background-color: #f2f2f2;
    font-weight: bold;
  }

  p {
    margin: 0;
    word-wrap: break-word;
  }
</style>

<body>
  <div class="container">
    <div class="header" >
      <div id="logo" style="margin-left:5em"><img src="../assets/img/kalsel.png" width="100" height="130"> </div>
      <div id="cop" style="margin-top:1em">
        <h1 class="style2">PEMERINTAH PROVINSI KALIMANTAN SELATAN</h1>
        <h1 class="style2">BADAN KEUANGAN DAERAH</h1>
        <h1 class="style2">UNIT PELAYANAN PENDAPATAN DAERAH BANJARMASIN 1</h1>
        Jl. Jend A. Yani km.6 Telp/Fax(0511) 3257025 Kode Pos 70249<br />
        BANJARMASIN
      </div>
      <hr>
    </div>
    <div class="body">
      <div style="display:flex; justify-content:space-between; margin:2rem">

        <div>
          <p>Nomor : <?php echo $no ?></p>
          <p>Lampiran : <?php echo $lampiran ?></p>
          <p>Perihal : <?php echo $perihal ?></p>
        </div>
        <div>
          <p>Banjarmasin, <?php echo date('d M Y')  ?></p>
          <p>Kepada Yth.</p>
          <p><?php echo $tujuan_surat ?></p>
          <p>Di -</p>
          <p style="margin-left:3em">Banjarmasin</p>
        </div>
      </div>
      <p>Menindak lanjuti surat pengantar dari <?php echo $tujuan_surat ?> Tanggal <?php echo $tanggal1 ?> Nomor : <?php echo $no_surat1 ?> perihal <?php echo $hal ?></p>
      <br>
      <p>Setelah kami pelajari dan pertimbangkan pada prinsip nya kantor Unit Pelayanan Pendapatan Daerah (UPPD) Banjarmasin 1 dapat menerima calon Mahasiswa/i Magang dari <?php echo $kampus ?> Sebanyak <?php echo $jumlah ?> , Mahasiswa/i tersebut adalah </p>
      <br>
      <table>
        <tr>
          <th>No</th>
          <th>Nama</th>
          <th>NIM</th>
          <th>Jurusan</th>
        </tr>

        <?php
        if ($nama1 == true){
          echo "
          <tr>
          <td>1</td>
          <td>$nama1</td>
          <td>$npm1</td>
          <td>$jurusan1</td>
        </tr>";

        if ($nama2 == true){
          echo "
          <tr>
          <td>2</td>
          <td>$nama2</td>
          <td>$npm2</td>
          <td>$jurusan2</td>
        </tr>";

        if ($nama3 == true){
          echo "
          <tr>
          <td>3</td>
          <td>$nama3</td>
          <td>$npm3</td>
          <td>$jurusan3</td>
        </tr>";
        }
        }
      }
        ?>

        <!-- <tr>
          <td>2</td>
          <td>Rizky</td>
          <td>122</td>
          <td>SI</td>
        </tr>
        <tr>
          <td>3</td>
          <td>Kikii</td>
          <td>130</td>
          <td>SI</td>
        </tr> -->
        
      </table>
      <br>
      <p>Dengan Ketentuan :</p>
      <p>1. Mahasiswa/i Magang harus mentaati Peraturan yang berlaku di kantor kami</p>
      <p>2. Mahasiswa/i Magang harap di lengkapi surat tugas dari Sekolah</p>
      <p>3. Mahasiswa/i Magang harap membawa peralatan/sarana sendiri ( seperti laptop apabila diperlukan) untuk kelancaran kegiatan selama praktik kerja industri/ Magang
      <p>4. Mahasiswa/i harus menjaga kerapian dan tata krama selama Magang </p> <br>
      <p>Demikian di sampaikan untuk dapat diketahui dan pertimbangkan seperlunya
    </div>
    <div style="width:200px;float:right;">
      <div style="font-weight:bold;text-align:center">
        <p>Kepala UPPD Banjarmasin 1 <br />
        </p>
        <p>&nbsp;</p><br>
        <p><u>ANNI HANISYAH,SE,MM</u><br />
          pembina(IV/a)<br /></p>
      </div>
    </div>
</body>

<script>
   window.print()
</script>

</html>
