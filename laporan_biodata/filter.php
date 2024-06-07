<?php
include '../koneksi/koneksi.php';

$start_date = $_POST['start_date'];
$end_date = $_POST['end_date'];

$query = mysqli_query($konek, "SELECT * FROM tb_biodata WHERE status_pkl = 'Diterima' AND tgl_masuk BETWEEN '$start_date' AND '$end_date' ORDER BY tgl_masuk ASC");

if ($query->num_rows > 0) {
    $no = 0;
    while ($row = $query->fetch_array()) {
        $no++;
        echo "
            <tr>
                <td>$no</td>
                <td>$row[nama_mhs]</td>
                <td>$row[nim]</td>
                <td>$row[asal_pendidikan]</td>
                <td>$row[jurusan]</td>
                <td>".date('d-m-Y', strtotime($row['tgl_masuk'])) ."</td>
            </tr>";
    }
} else {
    echo "<tr><td colspan='9'><center>Tidak ada data yang sesuai dengan filter tanggal.</center></td></tr>";
}
