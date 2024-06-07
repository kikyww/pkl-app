<?php
include '../header/sidebar.php';


include '../koneksi/koneksi.php';

$id_user = $_SESSION['id_user'];

if (!isset($_SESSION['id_user'])) {
    header("Location: ../login/halaman_login.php");
}
if ($_SESSION['status'] != "Pembimbing") {
    header("Location: ../pages-error-404.html");
} else if (isset($_POST['submit'])) {
    $no_surat = $_POST['no_surat'];
    $lampiran = $_POST['lampiran'];
    $perihal = $_POST['perihal'];
    $tanggal = $_POST['tanggal'];
    $tujuan_surat = $_POST['tujuan_surat'];
    $no_terima = $_POST['no_terima'];
    $hal = $_POST['hal'];
    $asal = $_POST['asal'];
    $nama = $_POST['nama'];
    $npm = $_POST['npm'];
    $jurusan = $_POST['jurusan'];
    $password = $_POST['password'];

    $num = mysqli_query($konek, "SELECT id_surat FROM tb_surat ORDER BY id_surat DESC");
    if (mysqli_num_rows($num) > 0) {
        $num = mysqli_fetch_array($num);
        $id = $num['id_surat'] + 1;
    } else {
        $id = 1;
    }

    $sql = "INSERT INTO tb_surat (id_surat, no_surat, tgl_terima, no_terima, lampiran, perihal, tujuan_surat, hal_surat, asal_surat, nama_surat, npm_surat, jurusan_surat) VALUES ('$id', '$no_surat', '$tanggal', '$no_terima', '$lampiran', '$perihal', '$tujuan_surat', '$hal', '$asal', '$nama', '$npm', '$jurusan')";
    if (mysqli_query($konek, $sql)) {
        mysqli_query($konek, "INSERT INTO tb_biodata (nama_mhs, nim, asal_pendidikan, jurusan, password, status) VALUE ( '$nama', '$npm', '$asal', '$jurusan', '$password', 'user'");
        mysqli_query($konek, "INSERT INTO tb_user (nim_user, password, status) VALUE ('$npm' , '$password', 'user'");
        echo "<script>alert('Surat telah berhasil ditambahkan!');</script>";
        echo '<meta http-equiv="refresh" content="0; url=tambah_surat.php">';
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($konek);
    }
}
mysqli_close($konek);

?>

<section class="section">
    <div class="card">
        <div class="card-body">
            <h5 class="card-title">Form Tambah Surat</h5>
            <form method="POST">

                <div class="row mb-3">
                    <label class="col-sm-2 col-form-label">No Surat</label>
                    <div class="col-sm-10">
                        <input name="no_surat" type="text" class="form-control">
                    </div>
                </div>
                <div class="row mb-3">
                    <label class="col-sm-2 col-form-label">Lampiran</label>
                    <div class="col-sm-10">
                        <input name="lampiran" type="text" class="form-control">
                    </div>
                </div>
                <div class="row mb-3">
                    <label class="col-sm-2 col-form-label">Perihal</label>
                    <div class="col-sm-10">
                        <input name="perihal" type="text" class="form-control">
                    </div>
                </div>
                <div class="row mb-3">
                    <label class="col-sm-2 col-form-label">Tujuan Surat</label>
                    <div class="col-sm-10">
                        <input name="tujuan_surat" type="text" class="form-control">
                    </div>
                </div>
                <div class="row mb-3">
                    <label class="col-sm-2 col-form-label">Tanggal Menerima Surat</label>
                    <div class="col-sm-10">
                        <input name="tanggal" type="text" class="form-control">
                </div>
                <div class="row mb-3">
                    <label class="col-sm-2 col-form-label">No Surat Diterima</label>
                    <div class="col-sm-10">
                        <input name="no_terima" type="text" class="form-control">
                    </div>
                </div>
                <div class="row mb-3">
                    <label class="col-sm-2 col-form-label">Perihal di Terima</label>
                    <div class="col-sm-10">
                        <input name="hal" type="text" class="form-control">
                    </div>
                </div>
                <div class="row mb-3">
                    <label class="col-sm-2 col-form-label">Asal Sekolah/ Universitas </label>
                    <div class="col-sm-10">
                        <input name="asal" type="text" class="form-control">
                    </div>
                </div>
            
                <div class="row mb-3">
                    <label class="col-sm-2 col-form-label">Nama</label>
                    <div class="col-sm-10">
                        <input name="nama" type="text" class="form-control">
                    </div>
                </div>
                <div class="row mb-3">
                    <label class="col-sm-2 col-form-label">NPM</label>
                    <div class="col-sm-10">
                        <input name="npm" type="text" class="form-control">
                    </div>
                </div>
                <div class="row mb-3">
                    <label class="col-sm-2 col-form-label">Jurusan</label>
                    <div class="col-sm-10">
                        <input name="jurusan" type="text" class="form-control">
                    </div>
                    <input name="password" type="text" hidden value="12345" class="form-control">
                </div>

        </div>
        <div class="d-flex justify-content-end mt-3">
            <button name="submit" value="submit" type="submit" class="btn btn-success">Kirim</button>
        </div>
        </form>
    </div>
    </div>
</section>

<script>

document.querySelector('#mhs2').style.display = 'none';
document.querySelector('#mhs3').style.display = 'none';


    document.querySelector('#tombol2').addEventListener('click', function() {
        document.querySelector('#mhs2').style.display = 'block';
        document.querySelector('#tombol2').style.display = 'none';
    });

    document.querySelector('#tombol3').addEventListener('click', function() {
        document.querySelector('#mhs3').style.display = 'block';
        document.querySelector('#tombol3').style.display = 'none';
    });

</script>

<?php
include '../header/footer.php';
?>