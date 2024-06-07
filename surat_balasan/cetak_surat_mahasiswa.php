<?php
include '../koneksi/koneksi.php'; 
session_start();
$nim = $_SESSION['nim_user'];

    $data = mysqli_query($konek, "SELECT * FROM tb_biodata LEFT JOIN tb_surat ON tb_biodata.id_siswa= tb_surat.biodata_id WHERE tb_biodata.nim = '$nim'");
    $row = $data->fetch_assoc();


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
        /* background-color: lavenderblush; */
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
        border: none;
        border-collapse: collapse;
    }

    th,
    td {
        border: 0px solid #000000;
        padding: 2px;
        text-align: left;
    }

    th {
        background-color: #f2f2f2;
        font-weight: bold;

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



    p {
        margin: 0;
        word-wrap: break-word;
    }
</style>

<body>
    <div class="container">
        <div class="header">
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
                    <p>Nomor : <?php echo $row['no_surat'] ?></p>
                    <p>Lampiran : <?php echo $row['lampiran'] ?></p>
                    <p>Perihal : <?php echo $row['perihal'] ?></p>
                </div>
                <div>
                    <p>Banjarmasin, <?php echo date('d-m-Y')  ?></p>
                    <p>Kepada Yth.</p>
                    <p><?php echo $row['tujuan_surat'] ?></p>
                    <p>Di -</p>
                    <p style="margin-left:3em">Banjarmasin</p>
                </div>
            </div>
            <p>Menindak lanjuti surat pengantar dari <?php echo $row['tujuan_surat'] ?> Tanggal <?php echo $row['tgl_terima'] ?> Nomor : <?php echo $row['tujuan_surat'] ?> perihal <?php echo $row['perihal'] ?></p>
            <br>
            <p>Setelah kami pelajari dan pertimbangkan pada prinsip nya kantor Unit Pelayanan Pendapatan Daerah (UPPD) Banjarmasin 1 dapat menerima calon Mahasiswa/i Magang dari <?php echo $row['asal_pendidikan'] ?>, Mahasiswa/i tersebut adalah </p>
            <br>
            <table>
                <tr>
                    <td style="width: 25%">Nama</td>
                    <td style="width: 5%">:</td>
                    <td style="width: 65%"><?= $row['nama_mhs'] ?></td>
                </tr>
                <tr>
                    <td style="width: 25%">NIM</td>
                    <td style="width: 5%">:</td>
                    <td style="width: 65%"><?= $row['nim'] ?></td>
                </tr>
                <tr>
                    <td style="width: 25%">Jurusan</td>
                    <td style="width: 5%">:</td>
                    <td style="width: 65%"><?= $row['jurusan'] ?></td>
                </tr>
                <tr>
                    <td style="width: 25%">Status</td>
                    <td style="width: 5%">:</td>
                    <td style="width: 65%"><?= $row['status_pkl'] ?></td>
                </tr>
            </table>
            <br>
            <p>Dengan Ketentuan :</p>
            <p>1. Mahasiswa/i Magang harus mentaati Peraturan yang berlaku di kantor kami</p>
            <p>2. Mahasiswa/i Magang harap di lengkapi surat tugas dari Sekolah</p>
            <p>3. Mahasiswa/i Magang harap membawa peralatan/sarana sendiri ( seperti laptop apabila diperlukan) untuk kelancaran kegiatan selama praktik kerja industri/ Magang
            <p>4. Mahasiswa/i harus menjaga kerapian dan tata krama selama Magang </p> <br>
            <p>Demikian di sampaikan untuk dapat diketahui dan pertimbangkan seperlunya
        </div>
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
</body>

<script>
    window.print()
</script>

</html>