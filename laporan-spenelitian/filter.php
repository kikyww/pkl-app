<?php
include '../koneksi/koneksi.php';

$start_date = $_POST['start_date'];
$end_date = $_POST['end_date'];

$query = mysqli_query($konek, "SELECT * FROM tb_spenelitian LEFT JOIN tb_penelitian ON tb_spenelitian.penelitian_id = tb_penelitian.id_penelitian WHERE tgl_spen BETWEEN '$start_date' AND '$end_date' ORDER BY id_spen DESC");

if ($query->num_rows > 0) {
    $no = 0;
    while ($row = $query->fetch_array()) {
        $no++;
        echo "
            <tr>
            <td class='text-center'>$no</td>
                            <td class='text-center'>$row[no_spen]</td>
                                <td class='text-center'>$row[p_nama]</td>
                                <td class='text-center'>$row[p_instansi]</td>
                                <td class='text-center'>".date('d-m-Y', strtotime($row['tgl_spen']))."</td>
                                <td class='text-center'>$row[p_judul]</td>
            </tr>";
    }
} else {
    echo "<tr><td colspan='9'><center>Tidak ada data yang sesuai dengan filter tanggal.</center></td></tr>";
}
