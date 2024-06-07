<?php
include '../koneksi/koneksi.php';
session_start();


if (!isset($_SESSION['status']) == "User") {
    echo "<script>window.location.href = '../pages-error-404.html'</script>";
}


// $query = mysqli_query($konek, "SELECT * FROM tb_biodata a INNER JOIN tb_piket b ON a.nim_absen = b.nim ORDER BY tanggal ASC");   
$query = mysqli_query($konek, "SELECT * FROM tb_jadwal LEFT JOIN tb_biodata ON tb_jadwal.nim_jadwal = tb_biodata.nim LEFT JOIN tb_piket ON tb_jadwal.piket_id = tb_piket.id_piket WHERE status_pkl = 'Diterima' ORDER BY tanggal DESC");

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
        font-size: 20px;
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
</style>

<div style="display:flex;">
    <div style="
justify-content: center; align-items: center; margin:auto;">
        <div id="logo"><img src="../assets/img/kalsel.png" width="100" height="130"> </div>
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
                <p style="font-size:22px; text-align: center;">Jadwal Piket UPPD BANJARMASIN 1</p>


                <table class='table table-stripped table-bordered mt-3 table-responsive demo'>

                    <thead>
                        <tr>
                            <th rowspan=3 style='text-align:center; vertical-align: middle;'>No</th>
                            <th rowspan=3 style='text-align:center; vertical-align: middle;'>Tanggal</th>
                            <th rowspan=3 style='text-align:center; vertical-align: middle;'>Nama</th>
                            <th rowspan=3 style='text-align:center; vertical-align: middle;'>Penempatan</th>
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
        <td style='text-align:center;' class='td1'>$data[tanggal]</td>
        <td style='text-align:center;'' class='td1'>$data[nama_mhs] </td>
        <td style='text-align:start;' class='td1'>$data[piket]</td>
        
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
                <p>Kasubbag Tata Usaha<br />
                </p>
                <p>&nbsp;</p>
                <p><u>Pratiwie Noor R, SH</u><br />
                    NIP.19870429 200903 2 004<br /></p>
            </div>
        </div>
    </div>
</div>
<script>
    window.print();
</script>