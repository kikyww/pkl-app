<?php
    include '../koneksi/koneksi.php';

    if (isset($_POST['login'])) {
        // $nim_user = $_POST["nim_user"];
    $nim_user = $_POST["nim_user"];
    $password = $_POST["password"];
    $query = "SELECT * FROM tb_user WHERE nim_user = '$nim_user' AND password = '$password'";
    $result = $konek->query($query);

    if ($result->num_rows > 0) {
        $status = $result->fetch_assoc();
        session_start();
        $_SESSION["id_user"] = true;
        $_SESSION["nim_user"] = $nim_user;
        $_SESSION["status"] = $status["status"];

        if ($status["status"] == "User") {
            header("location:../header/dashboard.php");
        } else if ($status["status"] == "Admin") {
            header("location:../header/dashboard.php");
        } else if ($status["status"] == "Pembimbing") {
            header("location:../header/dashboard.php");
        }    exit;
    } else {
        echo "<script>alert('Username atau Password yang anda masukkan salah!')</script>";
        echo '<meta http-equiv="refresh" content="0; url=../login/halaman_login.php">';
    }
}

?>
