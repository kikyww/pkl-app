<?php
include '../koneksi/koneksi.php';
session_start();


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
                <p style="font-size:22px; text-align: center;">LAPORAN INSTANSI</p>

                <!-- <?php
                $sql = mysqli_query($konek, "SELECT * FROM tb_biodata");
                while ($r = mysqli_fetch_array($sql)) {
                    if ($_GET['nim_user'] == $r['nim']) {
                ?>
                        <p style='font-size:15px; text-align: start;'>Nama : <?= $r['nama_mhs'] ?></p>
                        <p style='font-size:15px; text-align: start;'>No. Induk : <?= $r['nim'] ?></p>
                        <p style='font-size:15px; text-align: start;'>Tanggal PKL : <?= $r['tgl_masuk'] ?> s/d <?= $r['tgl_keluar'] ?></p>
                        <p style='font-size:15px; text-align: start;'>Instansi/Sekolah : <?= $r['asal_pendidikan'] ?></p>
                <?php
                    }
                }
                ?> -->
                <table class='table table-stripped table-bordered mt-3 table-responsive demo'>

                    <thead>
                        <tr>
                            <th rowspan="4" style='text-align:center; vertical-align: middle;'>Instansi</th>
                            <th rowspan="2" style='text-align:center; vertical-align: middle;'>Jurusan</th>
                            <th rowspan="2" style='text-align:center; vertical-align: middle;'>Jumlah</th>
                        </tr>
                        </tr>
                    </thead>
                    <tbody>

                    <?php
$query = mysqli_query($konek, "SELECT asal_pendidikan, jurusan, COUNT(*) AS total FROM tb_biodata WHERE status_pkl = 'Diterima' GROUP BY asal_pendidikan, jurusan ORDER BY asal_pendidikan ASC");
$no = 0;
$current_asal_pendidikan = "";

while ($data = mysqli_fetch_array($query)) {
    $asal_pendidikan = $data['asal_pendidikan'];

    if ($current_asal_pendidikan !== $asal_pendidikan) {
        $current_asal_pendidikan = $asal_pendidikan;
        $no++;
    }
    ?>
    <tr>
        <?php if ($current_asal_pendidikan === $asal_pendidikan) : ?>
            <td rowspan="<?= $data['total'] ?>" style='text-align:center;' class='td1'><?= $data['asal_pendidikan'] ?></td>
        <?php endif; ?>
        <td style='text-align:center;' class='td1'><?= $data['jurusan'] ?></td>
        <td style='text-align:center;' class='td1'><?= $data['total'] ?></td>
    </tr>
<?php } ?>



                        <!-- <?php
                        $query = mysqli_query($konek, "SELECT * FROM tb_biodata WHERE status_pkl = 'Diterima' GROUP BY asal_pendidikan ORDER BY asal_pendidikan ASC");
                        $no = 0;
                        while ($data = mysqli_fetch_array($query)) {
                            $q = mysqli_query($konek, "SELECT *,  GROUP_CONCAT(jurusan SEPARATOR ', ') as jurusan_list, COUNT(jurusan) AS total FROM tb_biodata WHERE status_pkl = 'Diterima' AND asal_pendidikan = '$data[asal_pendidikan]' GROUP BY asal_pendidikan, jurusan ORDER BY asal_pendidikan ASC");
                            while ($d = mysqli_fetch_array($q)) {

                                $no++;
                             ?>
                            
                            <tr>
                                <td rowspan="4" style='text-align:center;' class='td1'><?= $data['asal_pendidikan'] ?></td>
                            </tr>
                            <tr>
                            <td rowspan="2" style='text-align:center;' class='td1'><?= $d['jurusan'] ?></td>
                            <td rowspan="2" style='text-align:center;' class='td1'><?= $d['total'] ?></td>
                            </tr>
                    <?php  } }  ?> -->

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