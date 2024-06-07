<?php
  include '../koneksi/koneksi.php';

  $tanggal = $_POST["tanggal"];
  $nim = $_POST["nim"];
  
  // Query untuk mendapatkan jadwal sesuai tanggal dan NIM
  $query = "SELECT * FROM tb_jadwal
            LEFT JOIN tb_user ON tb_jadwal.nim_jadwal = tb_user.nim_user LEFT JOIN tb_piket ON tb_jadwal.piket_id = tb_piket.id_piket WHERE tb_jadwal.tanggal = '$tanggal' AND tb_jadwal.nim_jadwal = '$nim'";
  
  $result = $konek->query($query);
  
  $jadwalData = array();
  if ($result->num_rows > 0) {
      while ($row = $result->fetch_assoc()) {
          $jadwalData[] = $row;
      }
  }
  
  $konek->close();
  
  // Mengirim data dalam format JSON
  echo json_encode($jadwalData);
  ?>
  
