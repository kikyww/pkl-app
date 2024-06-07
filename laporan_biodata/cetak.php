<?php
include '../koneksi/koneksi.php';
session_start();
    $start_date = $_POST['start_date'];
    $end_date = $_POST['end_date'];
    
    if (!isset($_SESSION['nim_user'])) {
        echo "<script>window.location.href = '../pages-error-404.html'</script>";
    }
    
    if (isset($_POST['submit'])) {
        $start_date = $_POST['start_date'];
        $end_date = $_POST['end_date'];
        
        $query = mysqli_query($konek, "SELECT * FROM tb_biodata WHERE status_pkl = 'Diterima' AND tgl_masuk BETWEEN '$start_date' AND '$end_date' ORDER BY tgl_masuk ASC");
    }

?>

<style>
    .demo {
        border: 1px solid;
        border-collapse: collapse;
        padding: 5px;
    }

    .demo th {
        border: 1px solid;
        padding: 5px;
        font-weight: normal;
    }

    .demo td {
        border: 1px solid;
        padding: 5px;

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
        font-size: 19px;
    }

    h2,
    h1,
    h3 {
        padding: 0;
        margin: 0;
    }

    h1 {
        font-size: 20px;
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
        margin-right: 5px;
    }
</style>

<div style="display:flex;">
    <div style="
justify-content: center; align-items: center; margin:auto;">
        <div id="logo"><img src="../assets/img/kalsel.png" width="100" height="115"> </div>
        <div id="cop">
            <h1 class="style2">PEMERINTAH PROVINSI KALIMANTAN SELATAN</h1>
            <h1 class="style2">BADAN KEUANGAN DAERAH</h1>
            <h1 class="style2">UNIT PELAYANAN PENDAPATAN DAERAH BANJARMASIN 1</h1>
            Jl. Jend A. Yani km.6 Telp/Fax(0511) 3257025 Kode Pos 70249<br />
            BANJARMASIN
        </div>
        <hr>
        <div style="display:flex;">
            <div style="
justify-content: center; align-items: center; margin:auto;">
                <p style="font-size:22px; text-align: center;">LAPORAN PKL</p>
                <p style="font-size:12px; text-align: center;"><?= date('d-m-Y', strtotime($start_date)) ?> s/d <?= date('d-m-Y', strtotime($end_date)) ?></p>


                <table class='table table-stripped table-bordered mt-3 table-responsive demo'>

                    <thead>
                        <tr>
                            <th rowspan=3 style='text-align:center; vertical-align: middle;'>No</th>
                            <th rowspan=3 style='text-align:center; vertical-align: middle;'>Nama</th>
                            <th rowspan=3 style='text-align:center; vertical-align: middle;'>NPM</th>
                            <th rowspan=3 style='text-align:center; vertical-align: middle;'>Instansi</th>
                            <th rowspan=3 style='text-align:center; vertical-align: middle;'>Jurusan</th>
                            <th rowspan=3 style='text-align:center; vertical-align: middle;'>Tanggal Masuk</th>
                            <th rowspan=3 style='text-align:center; vertical-align: middle;'>Tanggal Keluar</th>
                        </tr>
                    </thead>
                    <tbody>

                        <?php
                        $no = 0;
                        while ($data = mysqli_fetch_array($query)) {
                            
                                $no++;
                                echo "
<tr>
<td style='text-align:center;' class='td1'>$no</td>
<td style='text-align:center;' class='td1'>$data[nama_mhs]</td>
<td style='text-align:center;' class='td1'>$data[nim]</td>
<td style='text-align:center;' class='td1'>$data[asal_pendidikan]</td>
<td style='text-align:center;' class='td1'>$data[jurusan]</td>
<td style='text-align:center;' class='td1'>".date('d-m-Y', strtotime($data['tgl_masuk']))."</td>
<td style='text-align:center;' class='td1'>".date('d-m-Y', strtotime($data['tgl_keluar']))."</td>
</tr>";
                            }
                        
                        ?>

                    </tbody>

                </table>
            </div>
        </div>
        <div style="width:300px;float:right;">
            <div style="text-align:center">
                <p>Banjarmasin, <?php echo date('d M Y')  ?><br />
            </div>

            <div style="font-weight:bold;text-align:center">
                <p>KEPALA UPPD Banjarmasin 1<br />
                </p>
                <p>&nbsp;</p>
                <p><u>ANNI HANISYAH,SE,MM</u><br />
                    pembina(IV/a)<br /></p>
            </div>
        </div>
    </div>
    <script>
        window.print();
    </script>