/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

CREATE TABLE IF NOT EXISTS `bayar` (
  `id_bayar` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_daftar` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_jenazah` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_lokasi` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_biaya` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_harga` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tanggal_bayar` date NOT NULL,
  `jenis_bayar` enum('cash','transfer') COLLATE utf8mb4_unicode_ci NOT NULL,
  `jumlah` int NOT NULL,
  `status` enum('terbayar','belum') COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id_bayar`),
  KEY `bayar_id_daftar_foreign` (`id_daftar`),
  KEY `bayar_id_jenazah_foreign` (`id_jenazah`),
  CONSTRAINT `bayar_id_daftar_foreign` FOREIGN KEY (`id_daftar`) REFERENCES `daftar` (`id_daftar`) ON DELETE CASCADE,
  CONSTRAINT `bayar_id_jenazah_foreign` FOREIGN KEY (`id_jenazah`) REFERENCES `jenazah` (`id_jenazah`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `bayar` (`id_bayar`, `id_daftar`, `id_jenazah`, `id_lokasi`, `id_biaya`, `id_harga`, `tanggal_bayar`, `jenis_bayar`, `jumlah`, `status`, `created_at`, `updated_at`) VALUES
	('BY001', 'DF001', 'JZ001', 'LK001', 'BY001', 'HR001', '2024-01-02', 'cash', 5000000, 'terbayar', '2024-07-03 00:00:58', '2024-07-03 00:00:58');

CREATE TABLE IF NOT EXISTS `biaya` (
  `id_biaya` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama_pekerjaan` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama_paket` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `jumlah_pekerja` int NOT NULL,
  `fasilitas` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `harga` int NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id_biaya`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `biaya` (`id_biaya`, `nama_pekerjaan`, `nama_paket`, `jumlah_pekerja`, `fasilitas`, `harga`, `created_at`, `updated_at`) VALUES
	('BY001', 'Pekerjaan A', 'Paket A', 10, 'Fasilitas A', 5000000, '2024-07-03 00:00:58', '2024-07-03 00:00:58');

CREATE TABLE IF NOT EXISTS `blok` (
  `id_blok` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama_blok` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id_blok`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `blok` (`id_blok`, `nama_blok`, `created_at`, `updated_at`) VALUES
	('BL001', 'Blok A', '2024-07-03 00:00:58', '2024-07-03 00:00:58');

CREATE TABLE IF NOT EXISTS `daftar` (
  `id_daftar` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `no_hp` varchar(12) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tanggal_meninggal` date NOT NULL,
  `id_jenazah` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id_daftar`),
  KEY `daftar_id_jenazah_foreign` (`id_jenazah`),
  CONSTRAINT `daftar_id_jenazah_foreign` FOREIGN KEY (`id_jenazah`) REFERENCES `jenazah` (`id_jenazah`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `daftar` (`id_daftar`, `nama`, `no_hp`, `tanggal_meninggal`, `id_jenazah`, `created_at`, `updated_at`) VALUES
	('DF001', 'Jane Doe', '081234567890', '2024-01-01', 'JZ001', '2024-07-03 00:00:58', '2024-07-03 00:00:58');

CREATE TABLE IF NOT EXISTS `gaji` (
  `id_gaji` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_pekerja` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `bulan_gaji` date NOT NULL,
  `tanggal_gaji` date NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id_gaji`),
  KEY `gaji_id_pekerja_foreign` (`id_pekerja`),
  CONSTRAINT `gaji_id_pekerja_foreign` FOREIGN KEY (`id_pekerja`) REFERENCES `pekerja` (`id_pekerja`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `gaji` (`id_gaji`, `id_pekerja`, `bulan_gaji`, `tanggal_gaji`, `created_at`, `updated_at`) VALUES
	('GJ001', 'PK001', '2024-01-01', '2024-01-31', '2024-07-03 00:00:58', '2024-07-03 00:00:58');

CREATE TABLE IF NOT EXISTS `harga_makam` (
  `id_harga` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_blok` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `harga_makam` int NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id_harga`),
  KEY `harga_makam_id_blok_foreign` (`id_blok`),
  CONSTRAINT `harga_makam_id_blok_foreign` FOREIGN KEY (`id_blok`) REFERENCES `blok` (`id_blok`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `harga_makam` (`id_harga`, `id_blok`, `harga_makam`, `created_at`, `updated_at`) VALUES
	('HR001', 'BL001', 10000000, '2024-07-03 00:00:58', '2024-07-03 00:00:58');

CREATE TABLE IF NOT EXISTS `jenazah` (
  `id_jenazah` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nik` varchar(16) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tempat_lahir` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tanggal_lahir` date NOT NULL,
  `jenis_kelamin` enum('L','P') COLLATE utf8mb4_unicode_ci NOT NULL,
  `status_kawin` enum('Kawin','Belum Kawin') COLLATE utf8mb4_unicode_ci NOT NULL,
  `kewarganegaraan` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `provinsi` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `kabupaten` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `kecamatan` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `kelurahan` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `rt` int NOT NULL,
  `rw` int NOT NULL,
  `alamat_lengkap` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `alamat_singkat` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `agama` enum('Islam','Kristen','Katholik','Hindu','Buddha','Konghucu') COLLATE utf8mb4_unicode_ci NOT NULL,
  `pendidikan` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pekerjaan` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id_jenazah`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `jenazah` (`id_jenazah`, `nama`, `nik`, `tempat_lahir`, `tanggal_lahir`, `jenis_kelamin`, `status_kawin`, `kewarganegaraan`, `provinsi`, `kabupaten`, `kecamatan`, `kelurahan`, `rt`, `rw`, `alamat_lengkap`, `alamat_singkat`, `agama`, `pendidikan`, `pekerjaan`, `created_at`, `updated_at`) VALUES
	('JZ001', 'John Doe', '1234567890123456', 'City A', '1980-01-01', 'L', 'Belum Kawin', 'Indonesia', 'Province A', 'Kabupaten A', 'Kecamatan A', 'Kelurahan A', 1, 1, 'Address A', 'Address A', 'Islam', 'S1', 'Engineer', '2024-07-03 00:00:58', '2024-07-03 00:29:48');

CREATE TABLE IF NOT EXISTS `lokasi` (
  `id_lokasi` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_blok` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id_lokasi`),
  KEY `lokasi_id_blok_foreign` (`id_blok`),
  CONSTRAINT `lokasi_id_blok_foreign` FOREIGN KEY (`id_blok`) REFERENCES `blok` (`id_blok`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `lokasi` (`id_lokasi`, `id_blok`, `created_at`, `updated_at`) VALUES
	('LK001', 'BL001', '2024-07-03 00:00:58', '2024-07-03 00:00:58');

CREATE TABLE IF NOT EXISTS `migrations` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
	(1, '2019_12_14_000001_create_personal_access_tokens_table', 1),
	(2, '2024_07_03_000001_create_pekerja_table', 1),
	(3, '2024_07_03_000001_create_user_table', 1),
	(4, '2024_07_03_000002_create_gaji_table', 1),
	(5, '2024_07_03_000003_create_jenazah_table', 1),
	(6, '2024_07_03_000004_create_blok_table', 1),
	(7, '2024_07_03_000005_create_harga_makam_table', 1),
	(8, '2024_07_03_000006_create_lokasi_table', 1),
	(9, '2024_07_03_000007_create_daftar_table', 1),
	(10, '2024_07_03_000008_create_biaya_table', 1),
	(11, '2024_07_03_000009_create_rawat_table', 1),
	(12, '2024_07_03_000010_create_proses_makam_table', 1),
	(13, '2024_07_03_000011_create_bayar_table', 1);

CREATE TABLE IF NOT EXISTS `pekerja` (
  `id_pekerja` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tempat_lahir` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tanggal_lahir` date NOT NULL,
  `jenis_kelamin` enum('L','P') COLLATE utf8mb4_unicode_ci NOT NULL,
  `alamat` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `no_hp` varchar(12) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id_pekerja`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `pekerja` (`id_pekerja`, `nama`, `tempat_lahir`, `tanggal_lahir`, `jenis_kelamin`, `alamat`, `no_hp`, `created_at`, `updated_at`) VALUES
	('PK001', 'Worker A', 'City B', '1985-02-02', 'L', 'Address B', '081234567891', '2024-07-03 00:00:57', '2024-07-03 00:00:57');

CREATE TABLE IF NOT EXISTS `personal_access_tokens` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint unsigned NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;


CREATE TABLE IF NOT EXISTS `proses_makam` (
  `id_pemakaman` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_jenazah` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_lokasi` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_biaya` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_pekerja` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tanggal_pemakaman` date NOT NULL,
  `jumlah_pekerja` int NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id_pemakaman`),
  KEY `proses_makam_id_jenazah_foreign` (`id_jenazah`),
  KEY `proses_makam_id_lokasi_foreign` (`id_lokasi`),
  KEY `proses_makam_id_biaya_foreign` (`id_biaya`),
  KEY `proses_makam_id_pekerja_foreign` (`id_pekerja`),
  CONSTRAINT `proses_makam_id_biaya_foreign` FOREIGN KEY (`id_biaya`) REFERENCES `biaya` (`id_biaya`) ON DELETE CASCADE,
  CONSTRAINT `proses_makam_id_jenazah_foreign` FOREIGN KEY (`id_jenazah`) REFERENCES `jenazah` (`id_jenazah`) ON DELETE CASCADE,
  CONSTRAINT `proses_makam_id_lokasi_foreign` FOREIGN KEY (`id_lokasi`) REFERENCES `lokasi` (`id_lokasi`) ON DELETE CASCADE,
  CONSTRAINT `proses_makam_id_pekerja_foreign` FOREIGN KEY (`id_pekerja`) REFERENCES `pekerja` (`id_pekerja`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `proses_makam` (`id_pemakaman`, `id_jenazah`, `id_lokasi`, `id_biaya`, `id_pekerja`, `tanggal_pemakaman`, `jumlah_pekerja`, `created_at`, `updated_at`) VALUES
	('PM001', 'JZ001', 'LK001', 'BY001', 'PK001', '2024-01-03', 10, '2024-07-03 00:00:58', '2024-07-03 00:00:58');

CREATE TABLE IF NOT EXISTS `rawat` (
  `id_rawat` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_lokasi` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_jenazah` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_pekerja` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `jumlah_pekerja` int NOT NULL,
  `jumlah_perawatan` int NOT NULL,
  `tanggal_rawat` date NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id_rawat`),
  KEY `rawat_id_lokasi_foreign` (`id_lokasi`),
  KEY `rawat_id_jenazah_foreign` (`id_jenazah`),
  KEY `rawat_id_pekerja_foreign` (`id_pekerja`),
  CONSTRAINT `rawat_id_jenazah_foreign` FOREIGN KEY (`id_jenazah`) REFERENCES `jenazah` (`id_jenazah`) ON DELETE CASCADE,
  CONSTRAINT `rawat_id_lokasi_foreign` FOREIGN KEY (`id_lokasi`) REFERENCES `lokasi` (`id_lokasi`) ON DELETE CASCADE,
  CONSTRAINT `rawat_id_pekerja_foreign` FOREIGN KEY (`id_pekerja`) REFERENCES `pekerja` (`id_pekerja`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `rawat` (`id_rawat`, `id_lokasi`, `id_jenazah`, `id_pekerja`, `jumlah_pekerja`, `jumlah_perawatan`, `tanggal_rawat`, `created_at`, `updated_at`) VALUES
	('RW001', 'LK001', 'JZ001', 'PK001', 5, 3, '2024-01-04', '2024-07-03 00:00:58', '2024-07-03 00:00:58');

CREATE TABLE IF NOT EXISTS `user` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `nama` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `username` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `role` enum('admin','user') COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `user` (`id`, `nama`, `username`, `password`, `role`, `created_at`, `updated_at`) VALUES
	(1, 'Admin', 'admin', '$2y$10$cM03zv153oFJW6RDHHVah.1tJ7jAzCH9vCrvWAUTWPhExeR/fm/s6', 'admin', '2024-07-03 00:00:57', '2024-07-03 00:00:57');

/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
