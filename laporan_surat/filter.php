<?php
include '../koneksi/koneksi.php';

$start_date = $_POST['start_date'];
$end_date = $_POST['end_date'];

$query = mysqli_query($konek, "SELECT * FROM tb_surat LEFT JOIN tb_biodata ON tb_surat.biodata_id = tb_biodata.id_siswa WHERE tgl_masuk BETWEEN '$start_date' AND '$end_date' ORDER BY id_surat DESC");
if ($query->num_rows > 0) {
    $no = 0;
    while ($row = $query->fetch_array()) {
        $no++;
        echo "
            <tr>
            <td class='text-center'>$no</td>
            <td class='text-center'>$row[no_surat]</td>
            <td class='text-center'>$row[no_terima]</td>
            <td class='text-center'>".date('d-m-Y', strtotime($row['tgl_terima']))."</td>
            <td class='text-center'>$row[nama_mhs]</td>
            </tr>";
    }
} else {
    echo "<tr><td colspan='9'><center>Tidak ada data yang sesuai dengan filter tanggal.</center></td></tr>";
}
