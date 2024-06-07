<?php
include '../koneksi/koneksi.php'; 
$id = $_GET['id'];
if(isset($id)){
    $data = mysqli_query($konek, "SELECT * FROM tb_surat LEFT JOIN tb_biodata ON tb_surat.biodata_id = tb_biodata.id_siswa WHERE tb_surat.id_surat = '$id'");
    $row = $data->fetch_assoc();
}


?>

<!DOCTYPE html>
<html>
  <head>
    <title>Surat Balasan</title>
    <link rel="stylesheet" type="text/css" href="style.css">
  </head>

<style>
h2,h1,h3{ padding:0;margin:0;}
h1 {font-size:22px;font-weight:bold}
h2 {font-size:22px;font-weight:bold}
#wrapper {
	width:1100px;
	margin:0 auto;
	font-size:15px;
}
.container {
  width: 900px;
  margin:  auto;
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

th, td {
  border: 0px solid #000000;
  padding: 2px;
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
h2,h1,h3{ padding:0;margin:0;}
h1 {font-size:22px;font-weight:bold; text-align: center;}
h2 {font-size:22px;font-weight:bold; text-align: center;}
#logo {
	width:95px;
	float:left;	
	margin-bottom:8px;
	
}
hr{border-bottom: 5px double #000;clear:both}
#cop {
	float:center;width:850px;text-align:center;
}
.style2 {	font-size: 24px;
}
.style1 {	font-size: 19px;
}

</style>

  <body>
    <div class="container">
      <div class="header">
      <div id="logo"><img src="../img/logo-pemprov-kalimantan-selatan.png" width="120" height="90"></div>
<div id="cop">
  <h2 class="style1">PEMERINTAH PROVINSI KALIMANTAN SELATAN</h2>
  <h1 class="style2">DINAS PENGENDALIAN PENDUDUK KELUARGA BERENCANA</h1>
  <h1 >DAN PEMERDAYAAN MASYARAKAT</h1>
  Jalan Brig Jend. Hasan Basri No. 16 <br />
  Telp./Fax. (0511) 3301346 Banjarmasin 70124</div>
<hr>
      </div>
    <div class="body">
        <div style="display:flex; justify-content:space-between; margin:2rem">
    </div>
    <h1 style="text-align: center;">Surat Balasan PKL</h1>
    <p></p>
    <h4 style="text-align: center;">No.Surat : <?= $row['no_surat'] ?></h4>
    <br>
    <p>Diberikan Hak Cuti Kepada Pegawai :</p>
    <br>    
    <table >
        <tr>
            <td style="width: 25%">Nama</td>
            <td style="width: 5%">:</td>
            <td style="width: 65%"><?= $row['nama_mhs'] ?></td>
        </tr>
        <tr>
            <td style="width: 25%">NIP</td>
            <td style="width: 5%">:</td>
            <td style="width: 65%"><?= $row['nip'] ?></td>
        </tr>
		<tr>
            <td style="width: 25%">Golongan</td>
            <td style="width: 5%">:</td>
            <td style="width: 65%"><?= $row['golongan'] ?></td>
        </tr>
        <tr>
            <td style="width: 25%">Jabatan</td>
            <td style="width: 5%">:</td>
            <td style="width: 65%"><?= $row['nama_jabatan'] ?></td>
        </tr>
        <tr>
            <td style="width: 25%">Bidang</td>
            <td style="width: 5%">:</td>
            <td style="width: 65%"><?= $row['nama_bidang'] ?></td>
        </tr>
        <tr>
            <td style="width: 25%">Alasan</td>
            <td style="width: 5%">:</td>
            <td style="width: 65%"><?= $row['alasan'] ?></td>
        </tr>
    </table>
    <br>
    <p>Bermaksud mengajukan cuti selama <?= $row['jumha'] ?> hari kerja, yaitu terhitung mulai tanggal <?= $row['tgl_awal'] ?> sd <?= $row['tgl_akhir'] ?>.</p>
    <br>
    <p>Demikian surat permohonan cuti ini saya buat dan ajukan untuk bisa mendapatkan persetujuan dari Bapak. Atas perhatian dan waktu yang diberikan saya ucapkan terimakasih</p>

    </div>

        <?php
    function tgl_indo($tanggal)
    {
        $bulan = array(
            1 =>   'Januari',
            'Februari',
            'Maret',
            'April',
            'Mei',
            'Juni',
            'Juli',
            'Agustus',
            'September',
            'Oktober',
            'November',
            'Desember'
        );
        $pecahkan = explode('-', $tanggal);

        // variabel pecahkan 0 = tanggal
        // variabel pecahkan 1 = bulan
        // variabel pecahkan 2 = tahun

        return $pecahkan[2] . ' ' . $bulan[(int) $pecahkan[1]] . ' ' . $pecahkan[0];
    }

    ?>
    <br>
    <div style="float: right;">
        <h5 style="text-align: center;">
            Banjarmasin, <?= date('d-m-Y'); ?>
            <br>KEPALA DINAS,
            <br><br><br><br><br>
			<U>Drs. M. HELFIANNOR, M.Si</U>
            <br>NIP. 19730719 199302 1 002<br></br>
        </h5>

    </div>
    </div>

    

  </body>


  
  <!-- <script>
    window.print()
  </script> -->

</html>
