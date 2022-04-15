-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 12, 2020 at 12:57 PM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.2.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `harmonidb`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_abangunan`
--

CREATE TABLE `tbl_abangunan` (
  `id_asetbangunan` int(11) NOT NULL,
  `kd_jenis` varchar(50) NOT NULL,
  `kode_bangunan` varchar(30) NOT NULL,
  `nama_bangunan` varchar(30) NOT NULL,
  `lokasi` varchar(50) NOT NULL,
  `asal` varchar(50) NOT NULL,
  `no_sertifikat` varchar(20) NOT NULL,
  `luas` varchar(20) NOT NULL,
  `tahun` year(4) NOT NULL,
  `kondisi` varchar(30) NOT NULL,
  `harga` varchar(30) NOT NULL,
  `status` varchar(30) NOT NULL,
  `ket` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_abangunan`
--

INSERT INTO `tbl_abangunan` (`id_asetbangunan`, `kd_jenis`, `kode_bangunan`, `nama_bangunan`, `lokasi`, `asal`, `no_sertifikat`, `luas`, `tahun`, `kondisi`, `harga`, `status`, `ket`) VALUES
(10, 'Aset Bangunan', 'Q89ERQ', 'Gedung Kantor', 'Jalan Sekuntum No.2B', 'Pekanbaru', '192/HGK/168.1.1', '100m2', 2020, 'Baru', '150000000', 'Terpakai', 'Meliputi ruang desain dll'),
(82, 'Aset Bangunan', 'HGKWRKS', 'Workshop', 'Jalan Swadaya', 'Pekanbaru', 'B7816IGK01S', '100m2', 2020, 'Baru', '150000000', 'Terpakai', '-');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_asetgerak`
--

CREATE TABLE `tbl_asetgerak` (
  `id_aset` int(11) NOT NULL,
  `kode_aset` varchar(30) NOT NULL,
  `nama_aset` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_asetgerak`
--

INSERT INTO `tbl_asetgerak` (`id_aset`, `kode_aset`, `nama_aset`) VALUES
(1, 'HGK-KEN', 'Aset Kendaraan'),
(2, 'HGK-AK', 'Aset Kantor'),
(3, 'HGK-AP', 'Aset Produksi');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_asetkantor`
--

CREATE TABLE `tbl_asetkantor` (
  `id_aset` int(11) NOT NULL,
  `kd_jenis` varchar(30) NOT NULL,
  `kd_AKantor` varchar(11) NOT NULL,
  `nm_Akantor` varchar(30) NOT NULL,
  `merk` varchar(30) NOT NULL,
  `asal` varchar(30) NOT NULL,
  `tahun` year(4) NOT NULL,
  `jumlah` int(10) NOT NULL,
  `satuan` varchar(10) NOT NULL,
  `ukuran` varchar(30) NOT NULL,
  `status` varchar(20) NOT NULL,
  `kondisi` varchar(20) NOT NULL,
  `harga` int(10) NOT NULL,
  `spek_lain` varchar(30) NOT NULL,
  `ket` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_asetkantor`
--

INSERT INTO `tbl_asetkantor` (`id_aset`, `kd_jenis`, `kd_AKantor`, `nm_Akantor`, `merk`, `asal`, `tahun`, `jumlah`, `satuan`, `ukuran`, `status`, `kondisi`, `harga`, `spek_lain`, `ket`) VALUES
(5, 'Aset Kantor', 'HGK9012', 'PENA', 'Kenko', 'Pekanbaru', 2020, 12, 'biji', '3cm', 'Terpakai', 'Baru', 1500, '-', '-'),
(9, 'Aset Kantor', 'HGKIIX812', 'Komputer Design', 'Lenovo', 'Pekanbaru', 2019, 3, 'Unit', '-', 'Terpakai', 'Baru', 15000000, 'Ram 16GB', '-'),
(10, 'Aset Kantor', 'NUBASAJX21', 'Kamera Canon', 'Canon', 'Pekanbaru', 2020, 1, 'Unit', '-', 'Terpakai', 'baru', 2500000, '-', '-'),
(11, 'Aset Kantor', 'HGKSPK81', 'Speaker Polytron', 'Polytron', 'Pekanbaru', 2020, 2, 'Unit', '-', 'Terpakai', 'baru', 750000, 'Full Bass', '-'),
(12, 'Aset Kantor', 'HGKKPS1', 'Kipas Angin Maspion', 'Maspion', 'Pekanbaru', 2020, 4, 'Unit', '-', 'Terpakai', 'Baru', 200000, '-', 'Dingin'),
(13, 'Aset Kantor', 'HGKPPN1', 'Papan Tulis', 'White Board', 'Pekanbaru', 2020, 2, 'Unit', '-', 'Terpakai', 'Baru', 200000, '-', '-');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_asetkendaraan`
--

CREATE TABLE `tbl_asetkendaraan` (
  `id_AsetKendaraan` int(11) NOT NULL,
  `kd_jenis` varchar(50) NOT NULL,
  `kd_Kendaraan` varchar(30) NOT NULL,
  `nm_Akantor` varchar(30) NOT NULL,
  `merk` varchar(30) NOT NULL,
  `asal` varchar(30) NOT NULL,
  `tahun` year(4) NOT NULL,
  `jumlah` varchar(30) NOT NULL,
  `status` varchar(30) NOT NULL,
  `kondisi` varchar(30) NOT NULL,
  `harga` varchar(30) NOT NULL,
  `nomor_Rangka` varchar(30) NOT NULL,
  `nomor_polisi` varchar(30) NOT NULL,
  `nomor_bpkb` varchar(30) NOT NULL,
  `spek_lain` varchar(30) NOT NULL,
  `ket` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_asetkendaraan`
--

INSERT INTO `tbl_asetkendaraan` (`id_AsetKendaraan`, `kd_jenis`, `kd_Kendaraan`, `nm_Akantor`, `merk`, `asal`, `tahun`, `jumlah`, `status`, `kondisi`, `harga`, `nomor_Rangka`, `nomor_polisi`, `nomor_bpkb`, `spek_lain`, `ket`) VALUES
(6, 'Aset Kendaraan', 'BQ890ASD', 'Traktor', 'CAT', 'Tangerang', 2019, '2 UNIT', 'Terpakai', 'Baru', '150000000', 'BG-901982RZK', 'BM8945AD', 'BJQIASIJJ9012', 'Ga ada apa', 'tes'),
(7, 'Aset Kendaraan', 'BXGH716', 'Minibus', 'Avanza', 'Jakarta', 2015, '15', 'Terpakai', 'Baru', '167000', 'BXRTY871', 'BM 8562 AD', 'KLM0IOQP', '1300 Horse Power', 'Terpakai'),
(8, 'Aset Kendaraan', 'HGKMTR81', 'Motor Vario', 'Honda', 'Pekanbaru', 2020, '1', 'Terpakai', 'Baru', '18000000ddd', 'CM891AZK-PO', 'BM8912AD', 'NUBYASR9012', '-', '-');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_asetproduksi`
--

CREATE TABLE `tbl_asetproduksi` (
  `id_asetproduksi` int(11) NOT NULL,
  `kd_jenis` varchar(30) NOT NULL,
  `kd_Aproduksi` varchar(30) NOT NULL,
  `nama_AsetProduksi` varchar(50) NOT NULL,
  `merk` varchar(50) NOT NULL,
  `asal` varchar(50) NOT NULL,
  `tahun` year(4) NOT NULL,
  `jumlah` varchar(50) NOT NULL,
  `satuan` varchar(50) NOT NULL,
  `ukuran` varchar(50) NOT NULL,
  `status` varchar(50) NOT NULL,
  `kondisi` varchar(50) NOT NULL,
  `harga` varchar(50) NOT NULL,
  `spek_lain` varchar(50) NOT NULL,
  `ket` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_asetproduksi`
--

INSERT INTO `tbl_asetproduksi` (`id_asetproduksi`, `kd_jenis`, `kd_Aproduksi`, `nama_AsetProduksi`, `merk`, `asal`, `tahun`, `jumlah`, `satuan`, `ukuran`, `status`, `kondisi`, `harga`, `spek_lain`, `ket`) VALUES
(4, 'Aset Produksi', 'BNJUIA', 'MS WORD', 'Microsoft', 'USA', 2020, '3bb', 'unit', '-', '-', 'Baru', '150000ggg', '-', '-');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_asettanah`
--

CREATE TABLE `tbl_asettanah` (
  `id_asettanah` int(11) NOT NULL,
  `kd_jenis` varchar(50) NOT NULL,
  `kd_tanah` varchar(50) NOT NULL,
  `nama_tanah` varchar(50) NOT NULL,
  `lokasi` varchar(50) NOT NULL,
  `asal` varchar(50) NOT NULL,
  `nomor_sertifikat` varchar(20) NOT NULL,
  `luas` varchar(30) NOT NULL,
  `tahun` year(4) NOT NULL,
  `kondisi` varchar(30) NOT NULL,
  `harga` varchar(30) NOT NULL,
  `status` varchar(30) NOT NULL,
  `ket` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_asettanah`
--

INSERT INTO `tbl_asettanah` (`id_asettanah`, `kd_jenis`, `kd_tanah`, `nama_tanah`, `lokasi`, `asal`, `nomor_sertifikat`, `luas`, `tahun`, `kondisi`, `harga`, `status`, `ket`) VALUES
(2, 'Aset Tanah', 'BQYJ81912', 'Tanah Gabungan', 'Jl.Kh Ahmad Dahlan', 'USA', '190-0012oakow', '13m2', 2020, 'Baru', '10000ss', 'Terpakai', 'sasas');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_barangkeluar`
--

CREATE TABLE `tbl_barangkeluar` (
  `id_nmr` int(11) NOT NULL,
  `id_barangkeluar` varchar(50) NOT NULL,
  `tgl_barangkeluar` date NOT NULL,
  `id_barang` varchar(50) NOT NULL,
  `jumlah_barangkeluar` int(30) NOT NULL,
  `ket` varchar(50) NOT NULL,
  `kode_posisi` varchar(50) NOT NULL,
  `kode_pekerjaan` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_barangkeluar`
--

INSERT INTO `tbl_barangkeluar` (`id_nmr`, `id_barangkeluar`, `tgl_barangkeluar`, `id_barang`, `jumlah_barangkeluar`, `ket`, `kode_posisi`, `kode_pekerjaan`) VALUES
(12, 'HGK-BRJAKw', '2020-08-23', 'Papan Tulis Putih', 70, 'bagus', 'PROYEK-PALAS', 'BHAS8231');

--
-- Triggers `tbl_barangkeluar`
--
DELIMITER $$
CREATE TRIGGER `barang_keluar` AFTER INSERT ON `tbl_barangkeluar` FOR EACH ROW BEGIN
 UPDATE tbl_forminputbarang SET stoktersedia=stoktersedia-NEW.jumlah_barangkeluar
  WHERE nm_barang=NEW.id_barang;
 
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_barangmasuk`
--

CREATE TABLE `tbl_barangmasuk` (
  `id_nmr` int(11) NOT NULL,
  `id_barangmasuk` varchar(50) NOT NULL,
  `tgl_barangmasuk` date NOT NULL,
  `no_faktur` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_barangmasuk`
--

INSERT INTO `tbl_barangmasuk` (`id_nmr`, `id_barangmasuk`, `tgl_barangmasuk`, `no_faktur`) VALUES
(12, 'HGK9201', '2020-12-12', 'BM92032');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_detailbarangmasuk`
--

CREATE TABLE `tbl_detailbarangmasuk` (
  `id_nmr` int(11) NOT NULL,
  `no_detail` int(6) NOT NULL,
  `id_barangmasuk` varchar(50) NOT NULL,
  `id_barang` varchar(50) NOT NULL,
  `jlh_masuk` int(11) NOT NULL,
  `kd_posisi` varchar(50) NOT NULL,
  `no_kontrak` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_detailbarangmasuk`
--

INSERT INTO `tbl_detailbarangmasuk` (`id_nmr`, `no_detail`, `id_barangmasuk`, `id_barang`, `jlh_masuk`, `kd_posisi`, `no_kontrak`) VALUES
(42, 3, 'HGKBM891', 'Mouse Logitech', 2, 'PROYEK-DELIMA', 'NJOPQ'),
(49, 4, 'HGK9182NCS', 'Papan Tulis Putih', 213, 'KANTOR-RUANG MEETING', '-'),
(50, 4, 'HGK9182NCS', 'Mouse Logitech', 10, 'PROYEK-PALAS', 'HGK901281'),
(56, 12, 'HGK9201', 'Papan Tulis Putih', 123, 'KANTOR-RUANG MEETING', '-'),
(57, 11, 'HGK9201', 'Papan Tulis Putih', 123, 'WORKSHOP', '-');

--
-- Triggers `tbl_detailbarangmasuk`
--
DELIMITER $$
CREATE TRIGGER `barang_masuk` AFTER INSERT ON `tbl_detailbarangmasuk` FOR EACH ROW BEGIN
 UPDATE tbl_forminputbarang SET stoktersedia=stoktersedia+NEW.jlh_masuk
  WHERE nm_barang=NEW.id_barang;
 
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_detailpbarang`
--

CREATE TABLE `tbl_detailpbarang` (
  `id_nmr` int(11) NOT NULL,
  `no_detail` varchar(30) NOT NULL,
  `no_pb` varchar(50) NOT NULL,
  `id_barang` varchar(50) NOT NULL,
  `jlh_satuan` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_detailpbarang`
--

INSERT INTO `tbl_detailpbarang` (`id_nmr`, `no_detail`, `no_pb`, `id_barang`, `jlh_satuan`) VALUES
(20, '3', '0001', 'Kursi (NAPOLI)', '21'),
(22, '12', '0001-P', 'Papan Tulis Putih', '12'),
(23, '15', '0001-K', 'Papan Tulis Putih', '12'),
(24, '38', '0002-K', 'Mouse Logitech', '12'),
(27, '39', '0003-P', 'Mouse Logitech', '12'),
(28, '39', '0003-P', 'Papan Tulis Putih', '125'),
(33, '42', '0003-P', 'Papan Tulis Putih', '12'),
(34, '42', '0003-P', 'Mouse Logitech', '125'),
(37, '44', '0002-K', 'Papan Tulis Putih', '12'),
(38, '45', '0003-P', 'Papan Tulis Putih', '12'),
(39, '46', '0004-W', 'Mouse Logitech', '12'),
(42, '48', '0001-P', 'Mouse Logitech', '125'),
(43, '50', '0002-K', 'Papan Tulis Putih', '12');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_detailpembelian`
--

CREATE TABLE `tbl_detailpembelian` (
  `id_nmr` int(11) NOT NULL,
  `no_detail` varchar(50) NOT NULL,
  `barang` varchar(50) NOT NULL,
  `jlh_ok` varchar(30) NOT NULL,
  `harga_satuan` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_forminputbarang`
--

CREATE TABLE `tbl_forminputbarang` (
  `id_nmr` int(11) NOT NULL,
  `id_barang` varchar(50) NOT NULL,
  `nm_barang` varchar(50) NOT NULL,
  `satuan` varchar(50) NOT NULL,
  `minstok` int(30) NOT NULL,
  `maxstok` int(30) NOT NULL,
  `stoktersedia` int(30) NOT NULL,
  `kisaran_hargasatuan` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_forminputbarang`
--

INSERT INTO `tbl_forminputbarang` (`id_nmr`, `id_barang`, `nm_barang`, `satuan`, `minstok`, `maxstok`, `stoktersedia`, `kisaran_hargasatuan`) VALUES
(2, 'HGKPPT812', 'Papan Tulis Putih', 'Buah', 10, 100, 1553, 12000),
(3, 'HGK-19022', 'Mouse Logitech', 'Buah', 4, 100, 258, 13000);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_forminputpembelian`
--

CREATE TABLE `tbl_forminputpembelian` (
  `id_nmr` int(11) NOT NULL,
  `no_po` varchar(50) NOT NULL,
  `tgl_po` date NOT NULL,
  `no_pembelian` varchar(50) NOT NULL,
  `id_sup` varchar(50) NOT NULL,
  `cara_bayar` varchar(50) NOT NULL,
  `ongkir` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_forminputpembelian`
--

INSERT INTO `tbl_forminputpembelian` (`id_nmr`, `no_po`, `tgl_po`, `no_pembelian`, `id_sup`, `cara_bayar`, `ongkir`) VALUES
(11, '290809', '2020-12-12', 'HGK99271', 'PS0001', 'Cash', '150000');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_hak_akses`
--

CREATE TABLE `tbl_hak_akses` (
  `id` int(11) NOT NULL,
  `id_user_level` int(11) NOT NULL,
  `id_menu` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_hak_akses`
--

INSERT INTO `tbl_hak_akses` (`id`, `id_user_level`, `id_menu`) VALUES
(31, 1, 10),
(32, 1, 11),
(33, 1, 12),
(34, 1, 13),
(35, 1, 14),
(38, 1, 17),
(39, 1, 18),
(40, 1, 19),
(41, 1, 20),
(42, 1, 1),
(43, 1, 2),
(44, 1, 3),
(45, 1, 9),
(46, 2, 16),
(47, 2, 14),
(48, 2, 13),
(49, 2, 12),
(50, 2, 11),
(51, 2, 10),
(52, 2, 18),
(53, 1, 21),
(54, 1, 22),
(55, 1, 23),
(56, 1, 24),
(57, 1, 25),
(58, 1, 26),
(59, 1, 27),
(60, 1, 28),
(61, 1, 29),
(62, 1, 30),
(63, 1, 16),
(64, 1, 15),
(65, 1, 31),
(66, 1, 32),
(67, 1, 33),
(68, 1, 34),
(69, 1, 35),
(70, 2, 34),
(71, 2, 33),
(72, 2, 17);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_jaset`
--

CREATE TABLE `tbl_jaset` (
  `id_jaset` int(11) NOT NULL,
  `kd_jenis` varchar(20) NOT NULL,
  `nama_jenis` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_jaset`
--

INSERT INTO `tbl_jaset` (`id_jaset`, `kd_jenis`, `nama_jenis`) VALUES
(6, 'HGK-AB', 'Bangunan'),
(7, 'HGK-AK', 'Kantor'),
(8, 'HGK-KEN', 'Kendaraan'),
(9, 'HGK-AP', 'Produksi'),
(10, 'HGK-ATAN', 'Tanah');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_mastersupplier`
--

CREATE TABLE `tbl_mastersupplier` (
  `id_nmr` int(11) NOT NULL,
  `id_sup` varchar(50) NOT NULL,
  `alamat_sup` varchar(50) NOT NULL,
  `telp_sup` int(15) NOT NULL,
  `nm_kontrak` varchar(50) NOT NULL,
  `produk` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_mastersupplier`
--

INSERT INTO `tbl_mastersupplier` (`id_nmr`, `id_sup`, `alamat_sup`, `telp_sup`, `nm_kontrak`, `produk`) VALUES
(1, 'SP001', 'Jalan Kertama', 761, 'HGK990128', 'Flanel');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_menu`
--

CREATE TABLE `tbl_menu` (
  `id_menu` int(11) NOT NULL,
  `title` varchar(50) NOT NULL,
  `url` varchar(30) NOT NULL,
  `icon` varchar(30) NOT NULL,
  `is_main_menu` int(11) NOT NULL,
  `is_aktif` enum('y','n') NOT NULL COMMENT 'y=yes,n=no'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_menu`
--

INSERT INTO `tbl_menu` (`id_menu`, `title`, `url`, `icon`, `is_main_menu`, `is_aktif`) VALUES
(1, 'KELOLA MENU', 'kelolamenu', 'fa fa-server', 0, 'n'),
(2, 'KELOLA PENGGUNA', 'user', 'fa fa-user-o', 0, 'n'),
(3, 'level PENGGUNA', 'userlevel', 'fa fa-users', 0, 'n'),
(9, 'Contoh Form', 'welcome/form', 'fa fa-id-card', 0, 'n'),
(10, 'Aset Bangunan', 'abangunan', 'fa fa-building', 17, 'y'),
(11, 'Aset Kantor', 'asetkantor', 'fa  fa-paperclip', 17, 'y'),
(12, 'Aset Kendaraan', 'asetkendaraan', 'fa fa-truck', 17, 'y'),
(13, 'Aset Produksi', 'asetproduksi', 'fa fa-gear', 17, 'y'),
(14, 'Aset Tanah', 'asettanah', 'fa fa-file-text-o', 17, 'y'),
(15, 'Jenis Aset', 'jaset', 'fa fa-bookmark-o', 17, 'y'),
(16, 'Data Posisi', 'posisi', 'fa fa-location-arrow', 17, 'y'),
(17, 'Inventaris Aset', '/', 'fa fa-folder-open-o', 0, 'y'),
(18, 'Mutasi Aset', 'mutasi', 'fa fa-arrows-h', 17, 'y'),
(19, 'tesitem', 'tesitem', 'fa fa-building', 0, 'n'),
(20, 'Aset Bergerak', 'asetgerak', 'fa fa-car', 17, 'n'),
(21, 'Permintaan Barang', 'permintaanbarang', 'fa fa-dropbox', 23, 'y'),
(22, 'Detail Permintaan Barang', 'detailpbarang', 'fa fa-dropbox', 23, 'n'),
(23, 'INVENTORY (STOK)', '#', 'fa fa-cubes', 0, 'y'),
(24, 'Master Barang', 'forminputbarang', 'fa fa-inbox', 23, 'y'),
(25, 'Master Supplier', 'mastersupplier', 'fa fa-user', 23, 'y'),
(26, 'PEMBELIAN', 'forminputpembelian', 'fa fa-shopping-cart', 23, 'y'),
(27, 'Detail Pembelian', 'detailpembelian', 'fa fa-shopping-cart', 23, 'n'),
(28, 'Barang Masuk', 'barangmasuk', 'fa fa-compress', 23, 'y'),
(29, 'Detail Barang Masuk', 'detailbarangmasuk', 'fa fa-compress', 23, 'n'),
(30, 'BarangKeluar', 'barangkeluar', 'fa fa-expand', 23, 'y'),
(32, 'Pembelian', 'pembelian', 'fa fa-shopping-cart', 23, 'n'),
(33, 'Laporan B.Masuk (PDF)', '/barangmasuk/c_laporanm', 'fa fa-print', 23, 'n'),
(34, 'Laporan Mutasi (PDF)', '/mutasi/c_mutasi', 'fa fa-print', 17, 'n');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_mutasi`
--

CREATE TABLE `tbl_mutasi` (
  `id_mutasi` int(11) NOT NULL,
  `kd_mutasi` varchar(30) NOT NULL,
  `nama_alpro` varchar(50) NOT NULL,
  `nama_bmutasi` varchar(40) NOT NULL,
  `jumlah` varchar(30) NOT NULL,
  `posisi_asetawal` varchar(50) NOT NULL,
  `posisi_asetakhir` varchar(50) NOT NULL,
  `kondisi` varchar(30) NOT NULL,
  `penanggungjawab` varchar(30) NOT NULL,
  `nokontrak` varchar(30) NOT NULL,
  `ket` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_pembelian`
--

CREATE TABLE `tbl_pembelian` (
  `id_nmr` int(11) NOT NULL,
  `no_po` varchar(50) NOT NULL,
  `tgl_po` date NOT NULL,
  `no_pembelian` varchar(50) NOT NULL,
  `id_sup` varchar(30) NOT NULL,
  `carabayar` varchar(30) NOT NULL,
  `ongkir` varchar(50) NOT NULL,
  `barang` text NOT NULL,
  `jlh_ok` text NOT NULL,
  `harga_satuan` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_permintaanbarang`
--

CREATE TABLE `tbl_permintaanbarang` (
  `id` int(11) NOT NULL,
  `nomor_pb` varchar(50) NOT NULL,
  `tanggal` date NOT NULL,
  `status_pb` varchar(50) NOT NULL,
  `kd_posisi` varchar(50) NOT NULL,
  `no_kontrak` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_permintaanbarang`
--

INSERT INTO `tbl_permintaanbarang` (`id`, `nomor_pb`, `tanggal`, `status_pb`, `kd_posisi`, `no_kontrak`) VALUES
(49, '0001-K', '2020-08-23', 'Pending', 'KANTOR-RUANG MEETING', '-'),
(50, '0002-K', '2020-08-23', 'Pending', 'KANTOR-RUANG DESAIN', '-');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_posisi`
--

CREATE TABLE `tbl_posisi` (
  `id_posisi` int(11) NOT NULL,
  `kd_posisi` varchar(20) NOT NULL,
  `nama_posisi` varchar(50) NOT NULL,
  `keterangan` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_posisi`
--

INSERT INTO `tbl_posisi` (`id_posisi`, `kd_posisi`, `nama_posisi`, `keterangan`) VALUES
(8, '001', 'SILAHKAN PILIH LOKASI', 'JANGAN DIHAPUS BUAT DROPDOWN HEHE'),
(9, 'K0R01', 'KANTOR - GARASI', 'KANTOR JL. SEKUNTUM RAYA NO.2B. ruang GARASI. UNTUK PENAMBAHAN KANTOR LAIN, KODE TERUS BERURUT MENJADI K1, K2 DST'),
(10, 'K0R02', 'KANTOR - DESAIN', 'Sekuntum - divisi DESAIN/PROYEK'),
(13, 'K0R03', 'KANTOR - ADM/KEUANGAN', 'Sekuntum - divisi UMUM'),
(14, 'K0R04', 'KANTOR - IT/MULTIMEDIA', 'Sekuntum - divisi IT/Multimedia'),
(15, 'K0R05', 'KANTOR - MEETING ROOM', 'Sekuntum - divisi UMUM'),
(16, 'K0R06', 'KANTOR - PANTRY', 'Sekuntum - divisi UMUM'),
(17, 'K0R07', 'KANTOR - HRD ROOM', 'Sekuntum - divisi HRD'),
(18, 'K0R08', 'KANTOR - MARKETING SPV', 'Sekuntum - divisi Marketing'),
(19, 'K0R09', 'KANTOR - MARKETING MANAGER', 'Sekuntum - divisi Marketing'),
(20, 'K0R10', 'KANTOR - VIP ROOM', 'Sekuntum - Direktur'),
(21, 'K0R11', 'KANTOR - OP. MANAGER', 'Sekuntum - divisi UMUM'),
(22, 'K0R12', 'KANTOR - GUDANG', 'Sekuntum - divisi LOGISTIK'),
(23, 'M0000', 'MESS HARMONI', 'Mess jl. xxxx'),
(24, 'W0000', 'WORKSHOP HARMONI', 'WORKSHOP JL. Swadaya LB. Kompleks Widya Graha III - divisi Logistik'),
(25, 'P0100', 'PROYEK PALAS', 'Proyek Bpk. Heru');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_setting`
--

CREATE TABLE `tbl_setting` (
  `id_setting` int(11) NOT NULL,
  `nama_setting` varchar(50) NOT NULL,
  `value` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_setting`
--

INSERT INTO `tbl_setting` (`id_setting`, `nama_setting`, `value`) VALUES
(1, 'Tampil Menu', 'ya');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_tesitem`
--

CREATE TABLE `tbl_tesitem` (
  `kd_jenis` varchar(11) NOT NULL,
  `kd_bangunan` varchar(30) NOT NULL,
  `maman` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_tesitem`
--

INSERT INTO `tbl_tesitem` (`kd_jenis`, `kd_bangunan`, `maman`) VALUES
('F8OAKQI', '', 'aadasd');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_user`
--

CREATE TABLE `tbl_user` (
  `id_users` int(11) NOT NULL,
  `full_name` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `images` text NOT NULL,
  `id_user_level` int(11) NOT NULL,
  `is_aktif` enum('y','n') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_user`
--

INSERT INTO `tbl_user` (`id_users`, `full_name`, `email`, `password`, `images`, `id_user_level`, `is_aktif`) VALUES
(1, 'Harmoni', 'hgk', '$2y$04$Wbyfv4xwihb..POfhxY5Y.jHOJqEFIG3dLfBYwAmnOACpH0EWCCdq', 'logo.png', 1, 'y'),
(7, 'Admin HGK', 'hgkadmin', '$2y$04$Y6aFwykG9DpIkRr3bXSZS.o3jRrvMWZddSFLVrshTuwRhcsTPnn8C', '', 2, 'y');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_user_level`
--

CREATE TABLE `tbl_user_level` (
  `id_user_level` int(11) NOT NULL,
  `nama_level` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_user_level`
--

INSERT INTO `tbl_user_level` (`id_user_level`, `nama_level`) VALUES
(1, 'Super Admin'),
(2, 'Admin');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_abangunan`
--
ALTER TABLE `tbl_abangunan`
  ADD PRIMARY KEY (`id_asetbangunan`),
  ADD UNIQUE KEY `kode_bangunan` (`kode_bangunan`);

--
-- Indexes for table `tbl_asetgerak`
--
ALTER TABLE `tbl_asetgerak`
  ADD PRIMARY KEY (`id_aset`),
  ADD UNIQUE KEY `kode_aset` (`kode_aset`);

--
-- Indexes for table `tbl_asetkantor`
--
ALTER TABLE `tbl_asetkantor`
  ADD PRIMARY KEY (`id_aset`),
  ADD UNIQUE KEY `kd_AKantor` (`kd_AKantor`);

--
-- Indexes for table `tbl_asetkendaraan`
--
ALTER TABLE `tbl_asetkendaraan`
  ADD PRIMARY KEY (`id_AsetKendaraan`),
  ADD UNIQUE KEY `kd_Kendaraan` (`kd_Kendaraan`);

--
-- Indexes for table `tbl_asetproduksi`
--
ALTER TABLE `tbl_asetproduksi`
  ADD PRIMARY KEY (`id_asetproduksi`),
  ADD UNIQUE KEY `kd_Aproduksi` (`kd_Aproduksi`);

--
-- Indexes for table `tbl_asettanah`
--
ALTER TABLE `tbl_asettanah`
  ADD PRIMARY KEY (`id_asettanah`),
  ADD UNIQUE KEY `kd_tanah` (`kd_tanah`);

--
-- Indexes for table `tbl_barangkeluar`
--
ALTER TABLE `tbl_barangkeluar`
  ADD PRIMARY KEY (`id_nmr`);

--
-- Indexes for table `tbl_barangmasuk`
--
ALTER TABLE `tbl_barangmasuk`
  ADD PRIMARY KEY (`id_nmr`),
  ADD UNIQUE KEY `id_barangmasuk` (`id_barangmasuk`);

--
-- Indexes for table `tbl_detailbarangmasuk`
--
ALTER TABLE `tbl_detailbarangmasuk`
  ADD PRIMARY KEY (`id_nmr`);

--
-- Indexes for table `tbl_detailpbarang`
--
ALTER TABLE `tbl_detailpbarang`
  ADD PRIMARY KEY (`id_nmr`);

--
-- Indexes for table `tbl_detailpembelian`
--
ALTER TABLE `tbl_detailpembelian`
  ADD PRIMARY KEY (`id_nmr`),
  ADD UNIQUE KEY `no_po` (`barang`);

--
-- Indexes for table `tbl_forminputbarang`
--
ALTER TABLE `tbl_forminputbarang`
  ADD PRIMARY KEY (`id_nmr`),
  ADD UNIQUE KEY `id_barang` (`id_barang`);

--
-- Indexes for table `tbl_forminputpembelian`
--
ALTER TABLE `tbl_forminputpembelian`
  ADD PRIMARY KEY (`id_nmr`),
  ADD UNIQUE KEY `no_pembelian` (`no_pembelian`),
  ADD UNIQUE KEY `id_supplier` (`id_sup`),
  ADD UNIQUE KEY `no_po` (`no_po`);

--
-- Indexes for table `tbl_hak_akses`
--
ALTER TABLE `tbl_hak_akses`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_jaset`
--
ALTER TABLE `tbl_jaset`
  ADD PRIMARY KEY (`id_jaset`),
  ADD UNIQUE KEY `kd_jenis` (`kd_jenis`);

--
-- Indexes for table `tbl_mastersupplier`
--
ALTER TABLE `tbl_mastersupplier`
  ADD PRIMARY KEY (`id_nmr`),
  ADD UNIQUE KEY `id_sup` (`id_sup`);

--
-- Indexes for table `tbl_menu`
--
ALTER TABLE `tbl_menu`
  ADD PRIMARY KEY (`id_menu`);

--
-- Indexes for table `tbl_mutasi`
--
ALTER TABLE `tbl_mutasi`
  ADD PRIMARY KEY (`id_mutasi`),
  ADD UNIQUE KEY `kd_mutasi` (`kd_mutasi`);

--
-- Indexes for table `tbl_pembelian`
--
ALTER TABLE `tbl_pembelian`
  ADD PRIMARY KEY (`id_nmr`),
  ADD UNIQUE KEY `no_po` (`no_po`),
  ADD UNIQUE KEY `no_pembelian` (`no_pembelian`),
  ADD UNIQUE KEY `id_sup` (`id_sup`),
  ADD UNIQUE KEY `barang` (`barang`) USING HASH;

--
-- Indexes for table `tbl_permintaanbarang`
--
ALTER TABLE `tbl_permintaanbarang`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `nomor_pb` (`nomor_pb`);

--
-- Indexes for table `tbl_posisi`
--
ALTER TABLE `tbl_posisi`
  ADD PRIMARY KEY (`id_posisi`);

--
-- Indexes for table `tbl_setting`
--
ALTER TABLE `tbl_setting`
  ADD PRIMARY KEY (`id_setting`);

--
-- Indexes for table `tbl_tesitem`
--
ALTER TABLE `tbl_tesitem`
  ADD PRIMARY KEY (`kd_bangunan`),
  ADD UNIQUE KEY `kd_jenis` (`kd_jenis`);

--
-- Indexes for table `tbl_user`
--
ALTER TABLE `tbl_user`
  ADD PRIMARY KEY (`id_users`);

--
-- Indexes for table `tbl_user_level`
--
ALTER TABLE `tbl_user_level`
  ADD PRIMARY KEY (`id_user_level`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_abangunan`
--
ALTER TABLE `tbl_abangunan`
  MODIFY `id_asetbangunan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=104;

--
-- AUTO_INCREMENT for table `tbl_asetgerak`
--
ALTER TABLE `tbl_asetgerak`
  MODIFY `id_aset` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tbl_asetkantor`
--
ALTER TABLE `tbl_asetkantor`
  MODIFY `id_aset` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `tbl_asetkendaraan`
--
ALTER TABLE `tbl_asetkendaraan`
  MODIFY `id_AsetKendaraan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `tbl_asetproduksi`
--
ALTER TABLE `tbl_asetproduksi`
  MODIFY `id_asetproduksi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tbl_asettanah`
--
ALTER TABLE `tbl_asettanah`
  MODIFY `id_asettanah` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tbl_barangkeluar`
--
ALTER TABLE `tbl_barangkeluar`
  MODIFY `id_nmr` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `tbl_barangmasuk`
--
ALTER TABLE `tbl_barangmasuk`
  MODIFY `id_nmr` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `tbl_detailbarangmasuk`
--
ALTER TABLE `tbl_detailbarangmasuk`
  MODIFY `id_nmr` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=58;

--
-- AUTO_INCREMENT for table `tbl_detailpbarang`
--
ALTER TABLE `tbl_detailpbarang`
  MODIFY `id_nmr` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;

--
-- AUTO_INCREMENT for table `tbl_detailpembelian`
--
ALTER TABLE `tbl_detailpembelian`
  MODIFY `id_nmr` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=130;

--
-- AUTO_INCREMENT for table `tbl_forminputbarang`
--
ALTER TABLE `tbl_forminputbarang`
  MODIFY `id_nmr` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tbl_forminputpembelian`
--
ALTER TABLE `tbl_forminputpembelian`
  MODIFY `id_nmr` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `tbl_hak_akses`
--
ALTER TABLE `tbl_hak_akses`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=73;

--
-- AUTO_INCREMENT for table `tbl_jaset`
--
ALTER TABLE `tbl_jaset`
  MODIFY `id_jaset` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `tbl_mastersupplier`
--
ALTER TABLE `tbl_mastersupplier`
  MODIFY `id_nmr` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_menu`
--
ALTER TABLE `tbl_menu`
  MODIFY `id_menu` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT for table `tbl_mutasi`
--
ALTER TABLE `tbl_mutasi`
  MODIFY `id_mutasi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=66;

--
-- AUTO_INCREMENT for table `tbl_pembelian`
--
ALTER TABLE `tbl_pembelian`
  MODIFY `id_nmr` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_permintaanbarang`
--
ALTER TABLE `tbl_permintaanbarang`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;

--
-- AUTO_INCREMENT for table `tbl_posisi`
--
ALTER TABLE `tbl_posisi`
  MODIFY `id_posisi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `tbl_setting`
--
ALTER TABLE `tbl_setting`
  MODIFY `id_setting` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_user`
--
ALTER TABLE `tbl_user`
  MODIFY `id_users` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `tbl_user_level`
--
ALTER TABLE `tbl_user_level`
  MODIFY `id_user_level` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
