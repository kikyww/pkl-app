<?php 
include '../koneksi/koneksi.php';
session_start();

$nim = $_SESSION['nim_user'];

$query = mysqli_query($konek, "SELECT * FROM tb_biodata LEFT JOIN tb_nilai ON tb_biodata.nim = tb_nilai.nim_nilai WHERE nim = '$nim'");
$data = $query->fetch_assoc();

if($data['rata_rata'] > 84){
  $nilai = 'Sangat Baik';

} else if ($data['rata_rata'] > 69 && $data['rata_rata'] < 85){
  $nilai = 'Cukup Baik';

} else if ($data['rata_rata'] > 59 && $data['rata_rata'] < 71){
  $nilai = 'Baik';

} else if ($data['rata_rata'] > 39 && $data['rata_rata'] < 60){
  $nilai = 'Cukup';

} else if ($data['rata_rata'] < 40){
  $nilai = 'Kurang';

}
?>


<!DOCTYPE html>
<html>
<head>
  <title>Sertifikat</title>
  <style>
    body {
      font-family: Arial, sans-serif;
      background-color: #f5f5f5;
    }

    .certificate {
      width: 900px;
      height: 1100px;
      border: 4px solid #ccc;
      background-color: #fff;
      margin: 50px auto;
      position: relative;
      box-shadow: 0 0 10px rgba(0, 0, 0, 0.2);
    }

    .logo{
        width:60px;
        height: 80px;
    }

    .certificate-header {
      text-align: center;
      margin-top: 50px;
    }

    .certificate-title {
      font-size: 28px;
      font-weight: bold;
    }

    .certificate-subtitle {
      font-size: 16px;
      margin-top: 10px;
    }

    .isi{
      font-size: 16px;
    font-weight: bold;
    }
    .certificate-body {
        margin: auto;
        width: 600px;
        margin-top: 60px;
    }

    .hr-header {
        width: 180px;
        border-bottom: 5px solid red;
        clear: both;
        margin-top: -3px; 
    }

    .certificate-name {
       text-align: center;
      font-size: 28px;
      font-weight: bold;
      text-transform: uppercase;
    }

    .certificate-text {
      font-size: 18px;
      margin-top: 20px;
    }

    .certificate-signature {
      margin-top: 100px;
    }

    .signature-line {
      width: 200px;
      height: 2px;
      background-color: #000;
      margin: 0 auto;
    }

    .signature {
      font-size: 18px;
      font-weight: bold;
      margin-top: 10px;
    }

    .certificate-footer {
      position: absolute;
      bottom: 20px;
      left: 20px;
      font-size: 14px;
    }
  </style>
</head>

<body>
  <div class="certificate">
    <div class="certificate-header">
        <div>
            <img class="logo" src="../assets/img/kalsel.png" alt="">
      <div class="certificate-title">SERTIFIKAT</div>
      <hr class="hr-header">
      </div>
      <div class="certificate-subtitle">Nomor : 423.4 <?= $data['id_siswa'] ?> - UPPD.BJM 1 / <?= date('Y', strtotime($data['tgl_keluar'])) ?> </div>
    </div>
    <div class="certificate-body">
    <table style="margin-left: 50px;">
        <tr>
            <td style="width: 25%">Kepala/Direktur/Pimpinan</td>
            <td style="width: 7%">:</td>
            <td class="isi" style="width: 65%">Unit Pelayanan Pendapatan Daerah (UPPD) Banjarmasin 1</td>
        </tr>
    </table>

    <p style="margin-left: 50px; margin-top: 50px;">Menerangkan bahwa : </p>

    <table style="margin-left: 50px;">
        <tr>
            <td style="width: 25%">Nama</td>
            <td style="width: 5%">:</td>
            <td class="isi" style="width: 65%"><?= $data['nama_mhs'] ?></td>
        </tr>
        <tr style="margin-top: 20px">
            <td style="width: 25%">Tempat/Tanggal Lahir</td>
            <td style="width: 5%">:</td>
            <td class="isi" style="width: 65%"><?= $data['tgl_lahir'] ?></td>
        </tr>
    </table>

    <p style="margin-left: 50px; margin-top: 50px;">Mahasiswa (i) Universitas : <?= $data['asal_pendidikan'] ?></p> 

    <table style="margin-left: 50px;">
        <tr >
            <td style="width: 25%">NPM / Prodi</td>
            <td style="width: 5%">:</td>
            <td class="isi" style="width: 65%"><?= $data['nim'] ?> / <?= $data['jurusan'] ?></td>
        </tr>
        <tr style="margin-top: 20px">
            <td style="width: 25%">Tahun</td>
            <td style="width: 5%">:</td>
            <td class="isi" style="width: 65%"><?= date('Y', strtotime($data['tgl_keluar'])) ?></td>
        </tr>
    </table>       

    <p style="margin-left: 50px; margin-top: 50px;">Telah mengikuti PRAKTEK KERJA LAPANGAN dalam rangka kegiatan magang yang diselenggarakan pada tanggal <?= date('d M Y', strtotime($data['tgl_masuk'])) ?> sampai dengan <?= date('d M Y', strtotime($data['tgl_keluar'])) ?> dengan hasil :</p>
    
    <div class="certificate-name">"<?= $nilai; ?>"</div>
    <div class="signature-line"></div>
 <br>
    <div style="width:200px;float:right;margin-top:12px;">
            <div style="font-weight:bold;text-align:center">
                <p>Kepala UPPD Banjarmasin 1 <br />
                </p>
                <p>&nbsp;</p><br>
                <p><u>ANNI HANISYAH,SE,MM</u><br />
                    pembina(IV/a)<br /></p>
            </div>
        </div>
  </div>
</body>

<script>
    window.print()
</script>

</html>
