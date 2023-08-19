-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Waktu pembuatan: 19 Agu 2023 pada 11.50
-- Versi server: 10.8.3-MariaDB-log
-- Versi PHP: 7.4.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `koperasi`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_barang`
--

CREATE TABLE `tb_barang` (
  `id_brg` int(11) NOT NULL,
  `id_kategori_brg` int(11) NOT NULL,
  `id_satuan` int(11) NOT NULL,
  `nama_brg` varchar(100) NOT NULL,
  `slug_brg` varchar(50) NOT NULL,
  `keterangan_brg` tinytext NOT NULL,
  `harga_pokok` int(20) NOT NULL,
  `harga_jual` int(20) NOT NULL,
  `promo_brg` enum('Off','On') NOT NULL,
  `expired_time` int(20) NOT NULL,
  `harga_promo` int(20) NOT NULL,
  `stock_brg` int(11) NOT NULL,
  `alert_quantity` int(11) NOT NULL,
  `gambar_barang1` varchar(100) NOT NULL,
  `gambar_barang2` varchar(100) NOT NULL,
  `gambar_barang3` varchar(100) NOT NULL,
  `gambar_barang4` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_barang`
--

INSERT INTO `tb_barang` (`id_brg`, `id_kategori_brg`, `id_satuan`, `nama_brg`, `slug_brg`, `keterangan_brg`, `harga_pokok`, `harga_jual`, `promo_brg`, `expired_time`, `harga_promo`, `stock_brg`, `alert_quantity`, `gambar_barang1`, `gambar_barang2`, `gambar_barang3`, `gambar_barang4`) VALUES
(1, 1, 1, 'Kratindaeng Energy Drink 150 ml', 'kratingdaeng-150', '-', 5000, 7100, 'On', 0, 6500, 100, 10, 'https://c.alfagift.id/product/1/1_A12630003501_20210708151453027_small.jpg', '', '', ''),
(2, 1, 1, 'Frestea Teh Hijau Madu 500 ml', 'frestea-500', '-', 4000, 5900, 'On', 0, 5500, 100, 10, 'https://c.alfagift.id/product/1/A12790002792_A12790002792_20200127163357659_small.jpg', '', '', ''),
(3, 1, 1, 'Sedaap Mie Instant Goreng 5 x 90 g ', 'mie-sedap', '-', 15000, 16000, 'On', 0, 15500, 100, 10, 'https://c.alfagift.id/product/1/1_A7145990001037_20210821213759411_small.jpg', '', '', ''),
(4, 1, 1, 'Paroti Roti Sisir Mentega 140 g', 'roti-sisir', '-', 9000, 11000, 'On', 0, 10500, 76, 10, 'https://c.alfagift.id/product/1/1_A7408030002168_20200618140614763_small.jpg', '', '', ''),
(5, 1, 1, 'Sprite Zero Sugar Pet 390 ml', 'sprite-390ml', '-', 5000, 5600, 'On', 0, 5500, 54, 10, 'https://c.alfagift.id/product/1/1_A7967860002167_20230627145404304_small.jpg', '', '', '');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_barang_masuk_data`
--

CREATE TABLE `tb_barang_masuk_data` (
  `id_barang_masuk_data` int(11) NOT NULL,
  `id_brg` int(11) NOT NULL,
  `id_supplier` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `created_by` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_barang_masuk_detail`
--

CREATE TABLE `tb_barang_masuk_detail` (
  `id_barang_masuk` int(11) NOT NULL,
  `id_barang_masuk_data` int(11) NOT NULL,
  `barcode` int(11) NOT NULL,
  `status_barang_masuk` enum('In','Out') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_desa`
--

CREATE TABLE `tb_desa` (
  `id_desa` int(11) NOT NULL,
  `id_kecamatan` int(11) NOT NULL,
  `nama_desa` varchar(50) NOT NULL,
  `ongkos_kirim` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_desa`
--

INSERT INTO `tb_desa` (`id_desa`, `id_kecamatan`, `nama_desa`, `ongkos_kirim`) VALUES
(1, 1, 'Kelurahan Karawang Kulon', 5000),
(2, 1, 'Kelurahan Adiarsa Barat', 5500),
(3, 2, 'Desa Ciptasari', 4500),
(4, 2, 'Desa Tamanmekar', 6000),
(5, 3, 'Desa Telukjambe', 3000),
(6, 3, 'Desa Sukaharja', 4000);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_kabupaten`
--

CREATE TABLE `tb_kabupaten` (
  `id_kabupaten` int(11) NOT NULL,
  `id_provinsi` int(11) NOT NULL,
  `nama_kabupaten` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_kabupaten`
--

INSERT INTO `tb_kabupaten` (`id_kabupaten`, `id_provinsi`, `nama_kabupaten`) VALUES
(1, 1, 'Kabupaten Karawang');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_kategori`
--

CREATE TABLE `tb_kategori` (
  `id_kategori_brg` int(11) NOT NULL,
  `nama_kategori_brg` varchar(255) NOT NULL,
  `icon_kategori` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_kategori`
--

INSERT INTO `tb_kategori` (`id_kategori_brg`, `nama_kategori_brg`, `icon_kategori`) VALUES
(1, 'Kesehatan', 'https://down-id.img.susercontent.com/file/eb7d583e4b72085e71cd21a70ce47d7a_tn'),
(2, 'Fashion', 'https://down-id.img.susercontent.com/file/1f18bdfe73df39c66e7326b0a3e08e87_tn'),
(4, 'Tas Pria', 'https://down-id.img.susercontent.com/file/47ed832eed0feb62fd28f08c9229440e_tn'),
(5, 'Minuman', 'https://down-id.img.susercontent.com/file/7873b8c3824367239efb02d18eeab4f5_tn'),
(6, 'Peralatan Rumah', 'https://down-id.img.susercontent.com/file/c1494110e0383780cdea73ed890e0299_tn'),
(7, 'Alat Sekolah', 'https://down-id.img.susercontent.com/file/998c7682fd5e7a3563b2ad00aaa4e6f3_tn');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_kecamatan`
--

CREATE TABLE `tb_kecamatan` (
  `id_kecamatan` int(11) NOT NULL,
  `id_kabupaten` int(11) NOT NULL,
  `nama_kecamatan` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_kecamatan`
--

INSERT INTO `tb_kecamatan` (`id_kecamatan`, `id_kabupaten`, `nama_kecamatan`) VALUES
(1, 1, 'Kecamatan Karawang Barat'),
(2, 1, 'Kecamatan Pangkalan'),
(3, 1, 'Kecamatan Telukjambe Timur');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_keranjang`
--

CREATE TABLE `tb_keranjang` (
  `id_keranjang` int(11) NOT NULL,
  `id_brg` int(11) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `id_user` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_keranjang`
--

INSERT INTO `tb_keranjang` (`id_keranjang`, `id_brg`, `jumlah`, `id_user`) VALUES
(45, 1, 12, 27),
(46, 2, 20, 27);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_krisan`
--

CREATE TABLE `tb_krisan` (
  `id_krisan` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `perihal` varchar(50) NOT NULL,
  `kritik_saran` mediumtext NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_pesanan`
--

CREATE TABLE `tb_pesanan` (
  `id_pesanan` varchar(30) NOT NULL,
  `id_user` int(11) NOT NULL,
  `tgl_pesanan` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `atas_nama` varchar(50) NOT NULL,
  `jenis_order` enum('ambil_sendiri','dianterin') NOT NULL,
  `status_pembayaran` enum('menunggu pembayaran','lunas','expired') NOT NULL,
  `metode_bayar` enum('cash','transfer','autodebet') NOT NULL,
  `status_pesanan` enum('Pending','Pesanan Disiapkan','Dikirim','Selesai','Dibatalkan') NOT NULL,
  `diskon` int(10) NOT NULL,
  `grand_total` int(15) NOT NULL,
  `total_bayar` int(15) NOT NULL,
  `kembalian` int(15) NOT NULL,
  `created_by` int(11) NOT NULL,
  `updated_by` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_pesanan`
--

INSERT INTO `tb_pesanan` (`id_pesanan`, `id_user`, `tgl_pesanan`, `atas_nama`, `jenis_order`, `status_pembayaran`, `metode_bayar`, `status_pesanan`, `diskon`, `grand_total`, `total_bayar`, `kembalian`, `created_by`, `updated_by`) VALUES
('20230804210835146', 27, '2023-08-04 14:08:51', '', 'ambil_sendiri', 'menunggu pembayaran', 'transfer', 'Pending', 0, 10000, 10000, 0, 27, NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_pesanan_detail`
--

CREATE TABLE `tb_pesanan_detail` (
  `id_pesanan_detail` int(11) NOT NULL,
  `id_pesanan` varchar(30) NOT NULL,
  `id_brg` int(11) NOT NULL,
  `harga_saat_ini` int(15) NOT NULL,
  `jumlah_jual` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_pesanan_detail`
--

INSERT INTO `tb_pesanan_detail` (`id_pesanan_detail`, `id_pesanan`, `id_brg`, `harga_saat_ini`, `jumlah_jual`) VALUES
(56, '20230804210835146', 4, 10500, 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_pesanan_tracking`
--

CREATE TABLE `tb_pesanan_tracking` (
  `id_tracking` int(11) NOT NULL,
  `id_pesanan` int(11) NOT NULL,
  `status_tracking` enum('Pending','Pesanan Disiapkan','Dikirim','Selesai','Dibatalkan') NOT NULL,
  `updated_at` datetime NOT NULL,
  `updated_by` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_provinsi`
--

CREATE TABLE `tb_provinsi` (
  `id_provinsi` int(11) NOT NULL,
  `nama_provinsi` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_provinsi`
--

INSERT INTO `tb_provinsi` (`id_provinsi`, `nama_provinsi`) VALUES
(1, 'Jawa Barat');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_supplier`
--

CREATE TABLE `tb_supplier` (
  `id_supplier` int(11) NOT NULL,
  `nama_supplier` varchar(255) NOT NULL,
  `pic` varchar(100) NOT NULL,
  `kontak_supplier` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_user`
--

CREATE TABLE `tb_user` (
  `id_user` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `nama_member` varchar(255) NOT NULL,
  `email_member` varchar(100) NOT NULL,
  `wa_member` varchar(15) NOT NULL,
  `nomor_induk` int(20) NOT NULL,
  `dept` varchar(32) NOT NULL,
  `level` enum('Super Administrator','Administrator','Kasir','Kurir','User') NOT NULL,
  `avatar` varchar(100) NOT NULL,
  `access_key_registration` varchar(50) NOT NULL,
  `verification_code_registration` int(6) NOT NULL,
  `access_key_forgotten` varchar(50) NOT NULL,
  `verifivation_key_forgotten` int(6) NOT NULL,
  `status_registrasi` enum('Y','N') NOT NULL,
  `status_akun` enum('Y','N') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_user`
--

INSERT INTO `tb_user` (`id_user`, `username`, `password`, `nama_member`, `email_member`, `wa_member`, `nomor_induk`, `dept`, `level`, `avatar`, `access_key_registration`, `verification_code_registration`, `access_key_forgotten`, `verifivation_key_forgotten`, `status_registrasi`, `status_akun`) VALUES
(27, 'user', '$2y$10$sNgmAA3.iPXlLira2usekenO.pkSLX/ZIBOLJ9nR5yKF4RkmL6rzO', 'Muhammad Rifki Kardawi', 'user1@gmail.com', '628521729471', 55281, '', 'User', 'default.jpg', 'GnN3Ac9kXJ6oDUT54FIKyiVQprjuSgHsCt0RbmfY72weBlxqv8', 251470, '', 0, 'N', 'N'),
(28, 'admin', '$2y$10$.9XGkSJvwkSqiTKWPxkj6.SJaEW0PPLjoABXzVzDdiG7w7P/wpgVa', '', '', '1111', 11111, '', 'Administrator', '', 'eQ3Npma5MFblPG6UWi04RKgEzD9kHqY7jAsSXd2tBv1LwOJVux', 53746, '', 0, 'N', 'N');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_user_alamat`
--

CREATE TABLE `tb_user_alamat` (
  `id_alamat_user` int(22) NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_desa` int(22) NOT NULL,
  `nama_penerima` varchar(50) NOT NULL,
  `kontak_penerima` varchar(25) NOT NULL,
  `kode_pos` int(7) NOT NULL,
  `detail_lainnya` tinytext NOT NULL,
  `jenis` enum('Rumah','Kantor','Lainnya') NOT NULL,
  `set_default` enum('Main','Secondary') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `tb_barang`
--
ALTER TABLE `tb_barang`
  ADD PRIMARY KEY (`id_brg`),
  ADD KEY `id_kategori_brg` (`id_kategori_brg`),
  ADD KEY `id_satuan` (`id_satuan`);

--
-- Indeks untuk tabel `tb_barang_masuk_data`
--
ALTER TABLE `tb_barang_masuk_data`
  ADD PRIMARY KEY (`id_barang_masuk_data`),
  ADD KEY `id_brg` (`id_brg`),
  ADD KEY `id_user` (`created_by`),
  ADD KEY `id_supplier` (`id_supplier`);

--
-- Indeks untuk tabel `tb_barang_masuk_detail`
--
ALTER TABLE `tb_barang_masuk_detail`
  ADD PRIMARY KEY (`id_barang_masuk`),
  ADD KEY `id_brg` (`id_barang_masuk_data`);

--
-- Indeks untuk tabel `tb_desa`
--
ALTER TABLE `tb_desa`
  ADD PRIMARY KEY (`id_desa`),
  ADD KEY `id_kecamatan` (`id_kecamatan`);

--
-- Indeks untuk tabel `tb_kabupaten`
--
ALTER TABLE `tb_kabupaten`
  ADD PRIMARY KEY (`id_kabupaten`),
  ADD KEY `id_provinsi` (`id_provinsi`);

--
-- Indeks untuk tabel `tb_kategori`
--
ALTER TABLE `tb_kategori`
  ADD PRIMARY KEY (`id_kategori_brg`);

--
-- Indeks untuk tabel `tb_kecamatan`
--
ALTER TABLE `tb_kecamatan`
  ADD PRIMARY KEY (`id_kecamatan`),
  ADD KEY `id_kabupaten` (`id_kabupaten`);

--
-- Indeks untuk tabel `tb_keranjang`
--
ALTER TABLE `tb_keranjang`
  ADD PRIMARY KEY (`id_keranjang`),
  ADD KEY `id_brg` (`id_brg`),
  ADD KEY `id_user` (`id_user`);

--
-- Indeks untuk tabel `tb_krisan`
--
ALTER TABLE `tb_krisan`
  ADD PRIMARY KEY (`id_krisan`),
  ADD KEY `id_user` (`id_user`);

--
-- Indeks untuk tabel `tb_pesanan`
--
ALTER TABLE `tb_pesanan`
  ADD PRIMARY KEY (`id_pesanan`),
  ADD KEY `created_by` (`created_by`),
  ADD KEY `id_user` (`id_user`);

--
-- Indeks untuk tabel `tb_pesanan_detail`
--
ALTER TABLE `tb_pesanan_detail`
  ADD PRIMARY KEY (`id_pesanan_detail`),
  ADD KEY `id_pesanan` (`id_pesanan`),
  ADD KEY `id_brg` (`id_brg`);

--
-- Indeks untuk tabel `tb_pesanan_tracking`
--
ALTER TABLE `tb_pesanan_tracking`
  ADD PRIMARY KEY (`id_tracking`),
  ADD KEY `id_pesanan` (`id_pesanan`),
  ADD KEY `updated_by` (`updated_by`);

--
-- Indeks untuk tabel `tb_provinsi`
--
ALTER TABLE `tb_provinsi`
  ADD PRIMARY KEY (`id_provinsi`);

--
-- Indeks untuk tabel `tb_supplier`
--
ALTER TABLE `tb_supplier`
  ADD PRIMARY KEY (`id_supplier`);

--
-- Indeks untuk tabel `tb_user`
--
ALTER TABLE `tb_user`
  ADD PRIMARY KEY (`id_user`),
  ADD UNIQUE KEY `username` (`username`,`email_member`,`wa_member`,`nomor_induk`);

--
-- Indeks untuk tabel `tb_user_alamat`
--
ALTER TABLE `tb_user_alamat`
  ADD PRIMARY KEY (`id_alamat_user`),
  ADD KEY `id_user` (`id_user`),
  ADD KEY `id_desa` (`id_desa`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `tb_barang`
--
ALTER TABLE `tb_barang`
  MODIFY `id_brg` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `tb_barang_masuk_data`
--
ALTER TABLE `tb_barang_masuk_data`
  MODIFY `id_barang_masuk_data` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `tb_barang_masuk_detail`
--
ALTER TABLE `tb_barang_masuk_detail`
  MODIFY `id_barang_masuk` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `tb_desa`
--
ALTER TABLE `tb_desa`
  MODIFY `id_desa` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `tb_kabupaten`
--
ALTER TABLE `tb_kabupaten`
  MODIFY `id_kabupaten` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `tb_kategori`
--
ALTER TABLE `tb_kategori`
  MODIFY `id_kategori_brg` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT untuk tabel `tb_kecamatan`
--
ALTER TABLE `tb_kecamatan`
  MODIFY `id_kecamatan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `tb_keranjang`
--
ALTER TABLE `tb_keranjang`
  MODIFY `id_keranjang` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;

--
-- AUTO_INCREMENT untuk tabel `tb_krisan`
--
ALTER TABLE `tb_krisan`
  MODIFY `id_krisan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT untuk tabel `tb_pesanan_detail`
--
ALTER TABLE `tb_pesanan_detail`
  MODIFY `id_pesanan_detail` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=57;

--
-- AUTO_INCREMENT untuk tabel `tb_pesanan_tracking`
--
ALTER TABLE `tb_pesanan_tracking`
  MODIFY `id_tracking` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `tb_provinsi`
--
ALTER TABLE `tb_provinsi`
  MODIFY `id_provinsi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `tb_supplier`
--
ALTER TABLE `tb_supplier`
  MODIFY `id_supplier` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `tb_user`
--
ALTER TABLE `tb_user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT untuk tabel `tb_user_alamat`
--
ALTER TABLE `tb_user_alamat`
  MODIFY `id_alamat_user` int(22) NOT NULL AUTO_INCREMENT;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `tb_barang_masuk_data`
--
ALTER TABLE `tb_barang_masuk_data`
  ADD CONSTRAINT `tb_barang_masuk_data_ibfk_1` FOREIGN KEY (`id_brg`) REFERENCES `tb_barang` (`id_brg`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `tb_barang_masuk_data_ibfk_2` FOREIGN KEY (`created_by`) REFERENCES `tb_user` (`id_user`) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `tb_barang_masuk_detail`
--
ALTER TABLE `tb_barang_masuk_detail`
  ADD CONSTRAINT `tb_barang_masuk_detail_ibfk_4` FOREIGN KEY (`id_barang_masuk_data`) REFERENCES `tb_barang_masuk_data` (`id_barang_masuk_data`) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `tb_desa`
--
ALTER TABLE `tb_desa`
  ADD CONSTRAINT `tb_desa_ibfk_1` FOREIGN KEY (`id_kecamatan`) REFERENCES `tb_kecamatan` (`id_kecamatan`) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `tb_kabupaten`
--
ALTER TABLE `tb_kabupaten`
  ADD CONSTRAINT `tb_kabupaten_ibfk_1` FOREIGN KEY (`id_provinsi`) REFERENCES `tb_provinsi` (`id_provinsi`) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `tb_kecamatan`
--
ALTER TABLE `tb_kecamatan`
  ADD CONSTRAINT `tb_kecamatan_ibfk_1` FOREIGN KEY (`id_kabupaten`) REFERENCES `tb_kabupaten` (`id_kabupaten`) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `tb_user_alamat`
--
ALTER TABLE `tb_user_alamat`
  ADD CONSTRAINT `tb_user_alamat_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `tb_user` (`id_user`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `tb_user_alamat_ibfk_2` FOREIGN KEY (`id_desa`) REFERENCES `tb_desa` (`id_desa`) ON DELETE NO ACTION ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
