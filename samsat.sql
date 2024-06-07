-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 05 Agu 2023 pada 14.25
-- Versi server: 10.4.25-MariaDB
-- Versi PHP: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `samsat`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_absen`
--

CREATE TABLE `tb_absen` (
  `id_absen` int(11) NOT NULL,
  `nim_absen` int(11) NOT NULL,
  `tanggal` varchar(100) NOT NULL,
  `kehadiran` enum('hadir','izin','sakit') NOT NULL,
  `keterangan` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_absen`
--

INSERT INTO `tb_absen` (`id_absen`, `nim_absen`, `tanggal`, `kehadiran`, `keterangan`) VALUES
(3, 2, 'Thursday, 05-01-2023 / 09:56', 'sakit', ':('),
(4, 2, 'Thursday, 05-01-2023 / 10:00', 'izin', ''),
(5, 2, 'Saturday, 07-01-2023 / 10:18', 'hadir', 'p'),
(6, 2, 'Wednesday, 18-01-2023 / 15:20', 'hadir', ''),
(7, 19710028, 'Thursday, 19-01-2023 / 19:54', 'sakit', '..');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_biodata`
--

CREATE TABLE `tb_biodata` (
  `id_siswa` int(11) NOT NULL,
  `nama_mhs` varchar(100) NOT NULL,
  `nim` int(11) NOT NULL,
  `asal_pendidikan` varchar(50) NOT NULL,
  `jurusan` varchar(25) NOT NULL,
  `alamat` varchar(100) NOT NULL,
  `telepon` varchar(30) NOT NULL,
  `tgl_lahir` varchar(100) NOT NULL,
  `tgl_masuk` date NOT NULL,
  `tgl_keluar` date NOT NULL,
  `password` varchar(100) NOT NULL,
  `status` enum('admin','pembimbing','user') NOT NULL,
  `status_pkl` enum('Diterima','Ditolak','Pending') NOT NULL,
  `biodata_stamp` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_biodata`
--

INSERT INTO `tb_biodata` (`id_siswa`, `nama_mhs`, `nim`, `asal_pendidikan`, `jurusan`, `alamat`, `telepon`, `tgl_lahir`, `tgl_masuk`, `tgl_keluar`, `password`, `status`, `status_pkl`, `biodata_stamp`) VALUES
(2, 'Adit', 2, 'Uniska', 'Sistem Informasi', 'jl. hksn', '0871678521234546', 'Banjarmasin, 25 September 2000', '2023-01-01', '2024-01-02', '2', 'user', 'Diterima', '2023-07-15 05:46:36'),
(3, 'Erni Farina Rakhmi', 19710028, 'Uniska', 'Sistem Informasi', 'Gambut km 15', '0878196687', '', '2023-01-16', '2023-01-17', '123', 'user', 'Diterima', '2023-07-24 02:09:57'),
(9, 'p cuy', 12345, 'Uniska', 'Sistem Informasi', 'jasdkafsk', '9894287248', 'Banjarmasin, 1 januari 2000', '2023-07-15', '2023-10-15', 'ghasjfg71tr7t7615236sdgad62', 'user', 'Ditolak', '2023-07-24 02:10:28'),
(10, 'ujang', 123, 'uniska', 'Manajemen', 'a', '0989898', 'Banjarmasin, 25 September 2000', '2023-07-15', '2023-10-28', '12345', 'user', 'Diterima', '2023-07-17 13:34:16'),
(11, 'farina', 333, 'sma gambut', 'ipa', 'gambut', '888888888', 'gambut, 11 maret 2001', '2023-07-18', '2023-07-31', '12345', 'user', 'Pending', '2023-07-17 02:45:11'),
(12, 'rakhmi', 988, 'l', 'l', 'l', '0878196687', 'gambut, 11 maret 2001', '2023-07-20', '2023-07-28', 'ghasjfg71tr7t7615236sdgad62', 'user', 'Ditolak', '2023-07-17 13:35:03'),
(13, '', 0, '', '', '', '', '', '0000-00-00', '0000-00-00', '12345', 'user', 'Pending', '2023-07-29 00:05:38'),
(14, 'Erni Farina Rakhmi', 1234567, 'Uniska', 'SI', 'gambut', '0878196687', 'gambut, 11 maret 2001', '2023-08-02', '2023-08-16', '12345', 'user', 'Pending', '2023-08-02 02:37:23');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_jadwal`
--

CREATE TABLE `tb_jadwal` (
  `id_jadwal` int(11) NOT NULL,
  `tanggal` date NOT NULL,
  `nim_jadwal` int(11) NOT NULL,
  `piket_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_jadwal`
--

INSERT INTO `tb_jadwal` (`id_jadwal`, `tanggal`, `nim_jadwal`, `piket_id`) VALUES
(1, '2023-01-23', 2, 3),
(2, '2023-08-05', 2, 2);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_kegiatan`
--

CREATE TABLE `tb_kegiatan` (
  `id_kegiatan` int(11) NOT NULL,
  `nim_kegiatan` int(25) NOT NULL,
  `jadwal_id` int(11) NOT NULL,
  `tanggal` date NOT NULL,
  `kegiatan` text NOT NULL,
  `keterangan` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_kegiatan`
--

INSERT INTO `tb_kegiatan` (`id_kegiatan`, `nim_kegiatan`, `jadwal_id`, `tanggal`, `kegiatan`, `keterangan`) VALUES
(1, 2, 2, '0000-00-00', 'p', 'p'),
(2, 2, 2, '2023-08-05', 'hadjhad', ''),
(3, 2, 2, '2023-08-05', 'nbnbn', ''),
(4, 2, 2, '2023-08-05', 'asfhjafsa', 'asfhjahsf'),
(5, 2, 2, '2023-08-05', 'asfkaskfjjf', ''),
(6, 2, 2, '2023-08-05', 'pppppppppppppppppppppppppppppppppppppp', '');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_nilai`
--

CREATE TABLE `tb_nilai` (
  `id_nilai` int(11) NOT NULL,
  `nim_nilai` int(11) NOT NULL,
  `n_sopan` int(11) NOT NULL,
  `n_disiplin` int(11) NOT NULL,
  `n_keaktifan` int(11) NOT NULL,
  `n_sungguh` int(11) NOT NULL,
  `n_mandiri` int(11) NOT NULL,
  `n_bersama` int(11) NOT NULL,
  `n_teliti` int(11) NOT NULL,
  `n_pendapat` int(11) NOT NULL,
  `n_menyerap` int(11) NOT NULL,
  `n_kreatif` int(11) NOT NULL,
  `rata_rata` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_nilai`
--

INSERT INTO `tb_nilai` (`id_nilai`, `nim_nilai`, `n_sopan`, `n_disiplin`, `n_keaktifan`, `n_sungguh`, `n_mandiri`, `n_bersama`, `n_teliti`, `n_pendapat`, `n_menyerap`, `n_kreatif`, `rata_rata`) VALUES
(1, 19710028, 90, 90, 90, 90, 90, 90, 90, 90, 90, 95, '90.5');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_penelitian`
--

CREATE TABLE `tb_penelitian` (
  `id_penelitian` int(11) NOT NULL,
  `no_surat` varchar(100) NOT NULL,
  `p_nama` varchar(100) NOT NULL,
  `p_nim` bigint(20) NOT NULL,
  `p_ttl` varchar(255) NOT NULL,
  `p_instansi` varchar(255) NOT NULL,
  `p_prodi` varchar(255) NOT NULL,
  `p_semester` varchar(11) NOT NULL,
  `p_alamat` varchar(255) NOT NULL,
  `p_email` varchar(255) NOT NULL,
  `p_judul` varchar(255) NOT NULL,
  `p_tgl` date NOT NULL,
  `p_status` enum('Diterima','Ditolak','Proses') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_penelitian`
--

INSERT INTO `tb_penelitian` (`id_penelitian`, `no_surat`, `p_nama`, `p_nim`, `p_ttl`, `p_instansi`, `p_prodi`, `p_semester`, `p_alamat`, `p_email`, `p_judul`, `p_tgl`, `p_status`) VALUES
(1, '1', '2', 3, '9', '4', '5', '6', '7', '8', '10', '2023-07-31', 'Diterima'),
(2, '787980', 'farina', 19710000, 'Gambut', 'SMAN 1 Gambut', 'IPS', '2', 'Gambut', '9ureriurddiofdfd', 'jfiroreoiewpoei', '2023-08-01', 'Ditolak'),
(3, '423.4/418-UPPD.BJM1/2022', 'farinaaa', 19710000, 'pppp', 'pppp', 'pppp', 'pppp', 'pppp', 'pppp', 'pppp', '2023-08-02', 'Ditolak'),
(4, '123smk', 'erni', 123, 'Gambut', 'smk', 'tkj', '2', 'gambut', '084858586', 'qwertty', '2023-08-02', 'Ditolak'),
(5, 'ppp', 'Rakhmi', 3456678, 'pp', 'sman1gambut', 'pp', 'pp', 'pp', 'pp', 'ppp', '2023-08-02', 'Ditolak'),
(6, '1smk', 'efr', 321, 'Gambut', 'smk', 'mm', '2', 'bjm', '9ureriurddiofdfd', '10', '2023-08-02', 'Diterima'),
(7, '12jif4', 'karina', 3456, 'Gambut', 'sman1gambut', 'ipa', '2', 'gambut', 'yiyi65o', 'ppppppp', '2023-08-03', 'Diterima'),
(8, '565as6d56sSd', 'Adit', 458475847, 'Banjarmasin coy', 'Uniska', 'SI', '8', 'askdksadkjsdk', '08684764', 'aujkjklklklgh', '2023-08-03', 'Diterima'),
(9, 'qwe538375123123', 'ashfhah', 77868676757, 'ajfjaisf', 'kahsfhfj', 'ahsfyasuf', '8', 'aksfjjahfjtur', '0889899787', 'ajfkkasfkhfjf', '2023-08-03', 'Proses'),
(10, '8787sa8787da8s7', 'asuyuafsyuafs', 98767899, 'hsdjhjsdgh', 'hsafuiasfjsfkasf', 'kaskfhjasfhafjh', 'jahsfhajsfh', 'hasfhdjdgks', 'sdhjsgjkh', 'asjfkhsgj', '2023-08-03', 'Proses'),
(11, 'asdads', 'ajawtkh', 8787878787, 'ABDFSDFSDGF', 'fkakfn', 'hfhjafjshg', '9', 'ahfhasfjsaf', '994947764NAFJ', 'sdfhjhsdf', '2023-08-05', 'Proses');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_piket`
--

CREATE TABLE `tb_piket` (
  `id_piket` int(11) NOT NULL,
  `piket` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_piket`
--

INSERT INTO `tb_piket` (`id_piket`, `piket`) VALUES
(2, 'Ruang TU'),
(3, 'Pelayanan Wajib Pajak'),
(4, 'Ruang Pencatatan Pemutihan Pajak');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_spenelitian`
--

CREATE TABLE `tb_spenelitian` (
  `id_spen` int(11) NOT NULL,
  `penelitian_id` int(11) NOT NULL,
  `no_spen` varchar(255) NOT NULL,
  `tgl_spen` date NOT NULL,
  `tujuan_spen` varchar(255) NOT NULL,
  `perihal_spen` varchar(255) NOT NULL,
  `lampiran` varchar(255) NOT NULL,
  `spen_stamp` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_spenelitian`
--

INSERT INTO `tb_spenelitian` (`id_spen`, `penelitian_id`, `no_spen`, `tgl_spen`, `tujuan_spen`, `perihal_spen`, `lampiran`, `spen_stamp`) VALUES
(1, 1, 'sssssss', '2023-07-25', 'smkn 1 gambut', 'sjdifjiosfj', 'iouuiouoi', '2023-08-02 02:26:45'),
(2, 2, '', '2023-08-02', '', 'fhfhjkhjkfhkdsdk', 'jdsfjdskfjfk', '2023-08-01 03:55:38'),
(4, 4, '123samsat', '2023-08-04', 'pppppp', 'magang', 'menerima mahasiswa magang', '2023-08-02 02:32:14'),
(5, 5, '1samsat', '2023-08-02', '', 'magang', 'smkn 1 gambutmenerima mahasiswa pkm', '2023-08-02 02:51:21'),
(6, 6, '676677a', '2023-09-03', 'akshsf', 'sadyafyuafjasf', 'asfjafjbafaskfjhfjh', '2023-08-03 03:12:56'),
(7, 3, 'ashfgasfgag87', '2023-08-03', 'asjahsfj', 'jfhsuafyuyasfyu', 'asfjajsfgj', '2023-08-03 03:40:14'),
(8, 7, 'jkjskad9d89sda8a9', '2023-08-03', 'akshsf', 'A;SFJKASFK', 'KASFKAKFSHH', '2023-08-03 03:51:13'),
(9, 8, 'yyuyuyu', '2023-08-05', 'jhjhhj', 'jhjhjhjh', 'nmnmnmn', '2023-08-05 07:22:40');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_surat`
--

CREATE TABLE `tb_surat` (
  `id_surat` int(11) NOT NULL,
  `no_surat` varchar(100) NOT NULL,
  `tgl_terima` date NOT NULL,
  `no_terima` varchar(50) NOT NULL,
  `lampiran` varchar(255) NOT NULL,
  `perihal` varchar(255) NOT NULL,
  `tujuan_surat` varchar(50) NOT NULL,
  `hal_surat` varchar(255) NOT NULL,
  `biodata_id` int(11) NOT NULL,
  `surat_stamp` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_surat`
--

INSERT INTO `tb_surat` (`id_surat`, `no_surat`, `tgl_terima`, `no_terima`, `lampiran`, `perihal`, `tujuan_surat`, `hal_surat`, `biodata_id`, `surat_stamp`) VALUES
(1, 'p', '2023-07-17', 'p', 'p', 'p', 'p', 'p', 9, '2023-07-17 02:46:27'),
(2, '429.4/418-UPPD.BJM1/2022', '2023-07-18', 'm', 'm', 'm', 'm', 'm', 10, '2023-07-17 13:34:16');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_user`
--

CREATE TABLE `tb_user` (
  `nim_user` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `password` varchar(255) NOT NULL,
  `status` enum('Admin','Pembimbing','User') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_user`
--

INSERT INTO `tb_user` (`nim_user`, `id_user`, `password`, `status`) VALUES
(1, 1, '1', 'Admin'),
(2, 2, '2', 'User'),
(19710028, 3, '123', 'User'),
(1234, 6, '123', 'User'),
(987, 7, '0987', 'Pembimbing'),
(45, 8, '', 'User'),
(12345, 9, 'ghasjfg71tr7t7615236sdgad62', 'User'),
(123, 10, '12345', 'User'),
(333, 11, '12345', 'User'),
(988, 12, 'ghasjfg71tr7t7615236sdgad62', 'User'),
(0, 13, '12345', 'User'),
(1234567, 14, '12345', 'User');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `tb_absen`
--
ALTER TABLE `tb_absen`
  ADD PRIMARY KEY (`id_absen`),
  ADD KEY `nim_absen` (`nim_absen`);

--
-- Indeks untuk tabel `tb_biodata`
--
ALTER TABLE `tb_biodata`
  ADD PRIMARY KEY (`id_siswa`),
  ADD UNIQUE KEY `nim` (`nim`);

--
-- Indeks untuk tabel `tb_jadwal`
--
ALTER TABLE `tb_jadwal`
  ADD PRIMARY KEY (`id_jadwal`),
  ADD KEY `nim_jadwal` (`nim_jadwal`),
  ADD KEY `piket_id` (`piket_id`);

--
-- Indeks untuk tabel `tb_kegiatan`
--
ALTER TABLE `tb_kegiatan`
  ADD PRIMARY KEY (`id_kegiatan`),
  ADD KEY `nim_kegiatan` (`nim_kegiatan`) USING BTREE,
  ADD KEY `jadwal_id` (`jadwal_id`);

--
-- Indeks untuk tabel `tb_nilai`
--
ALTER TABLE `tb_nilai`
  ADD PRIMARY KEY (`id_nilai`),
  ADD KEY `usn_nilai` (`nim_nilai`);

--
-- Indeks untuk tabel `tb_penelitian`
--
ALTER TABLE `tb_penelitian`
  ADD PRIMARY KEY (`id_penelitian`);

--
-- Indeks untuk tabel `tb_piket`
--
ALTER TABLE `tb_piket`
  ADD PRIMARY KEY (`id_piket`);

--
-- Indeks untuk tabel `tb_spenelitian`
--
ALTER TABLE `tb_spenelitian`
  ADD PRIMARY KEY (`id_spen`),
  ADD KEY `penelitian_id` (`penelitian_id`);

--
-- Indeks untuk tabel `tb_surat`
--
ALTER TABLE `tb_surat`
  ADD PRIMARY KEY (`id_surat`),
  ADD UNIQUE KEY `no_surat` (`no_surat`),
  ADD KEY `biodata_id` (`biodata_id`);

--
-- Indeks untuk tabel `tb_user`
--
ALTER TABLE `tb_user`
  ADD PRIMARY KEY (`id_user`),
  ADD KEY `nim_user` (`nim_user`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `tb_absen`
--
ALTER TABLE `tb_absen`
  MODIFY `id_absen` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT untuk tabel `tb_biodata`
--
ALTER TABLE `tb_biodata`
  MODIFY `id_siswa` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19710030;

--
-- AUTO_INCREMENT untuk tabel `tb_jadwal`
--
ALTER TABLE `tb_jadwal`
  MODIFY `id_jadwal` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `tb_kegiatan`
--
ALTER TABLE `tb_kegiatan`
  MODIFY `id_kegiatan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `tb_nilai`
--
ALTER TABLE `tb_nilai`
  MODIFY `id_nilai` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `tb_penelitian`
--
ALTER TABLE `tb_penelitian`
  MODIFY `id_penelitian` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT untuk tabel `tb_piket`
--
ALTER TABLE `tb_piket`
  MODIFY `id_piket` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `tb_spenelitian`
--
ALTER TABLE `tb_spenelitian`
  MODIFY `id_spen` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT untuk tabel `tb_surat`
--
ALTER TABLE `tb_surat`
  MODIFY `id_surat` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `tb_user`
--
ALTER TABLE `tb_user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `tb_absen`
--
ALTER TABLE `tb_absen`
  ADD CONSTRAINT `tb_absen_ibfk_1` FOREIGN KEY (`nim_absen`) REFERENCES `tb_biodata` (`nim`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `tb_biodata`
--
ALTER TABLE `tb_biodata`
  ADD CONSTRAINT `tb_biodata_ibfk_1` FOREIGN KEY (`nim`) REFERENCES `tb_user` (`nim_user`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `tb_jadwal`
--
ALTER TABLE `tb_jadwal`
  ADD CONSTRAINT `tb_jadwal_ibfk_1` FOREIGN KEY (`nim_jadwal`) REFERENCES `tb_biodata` (`nim`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tb_jadwal_ibfk_2` FOREIGN KEY (`piket_id`) REFERENCES `tb_piket` (`id_piket`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `tb_kegiatan`
--
ALTER TABLE `tb_kegiatan`
  ADD CONSTRAINT `tb_kegiatan_ibfk_1` FOREIGN KEY (`nim_kegiatan`) REFERENCES `tb_biodata` (`nim`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tb_kegiatan_ibfk_3` FOREIGN KEY (`jadwal_id`) REFERENCES `tb_jadwal` (`id_jadwal`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `tb_nilai`
--
ALTER TABLE `tb_nilai`
  ADD CONSTRAINT `tb_nilai_ibfk_1` FOREIGN KEY (`nim_nilai`) REFERENCES `tb_biodata` (`nim`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `tb_surat`
--
ALTER TABLE `tb_surat`
  ADD CONSTRAINT `tb_surat_ibfk_1` FOREIGN KEY (`biodata_id`) REFERENCES `tb_biodata` (`id_siswa`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
