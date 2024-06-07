<tbody>
    <?php
    if (isset($_GET['id_user'])) {
        $nim_user = $_SESSION['nim_user'];
        $nim_kegiatan = trim($_GET['nim_kegiatan']);
        $tanggal = trim($_GET['tanggal']);
        $kegiatan = trim($_GET['kegiatan']);
        $keterangan = trim($_GET['keterangan']);
    } else if ($status != 'User') {
        $query = mysqli_query($konek, "SELECT * FROM tb_piket");
    } else {
        $query = mysqli_query($konek, "SELECT * FROM tb_piket");
    }

    $no = 0;
    while ($row = mysqli_fetch_array($query)) {
        $no++;
        echo "<tr>
                <td>$no</td>  
                <td>$row[piket]</td>
                    </td>
                <td><div class='btn-row'>
                <div class='btn-group'>
                    <a href='edit_piket.php?id=$row[0]' class='btn btn-warning'>Edit</a>
                    <a href='hapus.php?id=$row[0]' onclick='return confirm(\" Hapus Kegiatan ini?\");' class='btn btn-danger'>Hapus</a>
                    </div>
                </div>
            </td>
        </tr>";
    }
    ?>
</tbody>