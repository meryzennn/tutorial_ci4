-- mysqldump-php https://github.com/ifsnop/mysqldump-php
--
-- Host: localhost	Database: perpustakaan_154b
-- ------------------------------------------------------
-- Server version 	10.4.32-MariaDB
-- Date: Thu, 20 Jun 2024 07:57:56 +0000

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40101 SET @OLD_AUTOCOMMIT=@@AUTOCOMMIT */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `tbl_admin`
--

/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbl_admin` (
  `id_admin` varchar(6) NOT NULL,
  `nama_admin` varchar(50) NOT NULL,
  `username_admin` varchar(20) NOT NULL,
  `password_admin` varchar(255) NOT NULL,
  `akses_level` enum('1','2','3') NOT NULL,
  `is_delete_admin` enum('0','1') NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  PRIMARY KEY (`id_admin`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_admin`
--

LOCK TABLES `tbl_admin` WRITE;
/*!40000 ALTER TABLE `tbl_admin` DISABLE KEYS */;
SET autocommit=0;
INSERT INTO `tbl_admin` VALUES ('adm000','developer','developer','$2y$10$BtHHWFXmLuhnP79ievN58O8EivCDmojcmNDivaVhmIlBQNSiqr9Ku','1','0','2024-03-22 09:18:20','2024-03-22 09:18:20'),('ADM001','awikwok','wik','$2y$10$N.UxsAGUCxQt.4hhfikq8.iIdbCZxJM9bU4iODuAunx5RHkDA1/Oa','3','1','2024-05-31 08:24:43','2024-05-31 09:12:08'),('ADM002','cihuy','huy','$2y$10$gRm8npxGOx/Ro89DD2v7BeDMBnNAr3f0oQXTCKbfkksc4Le50UFnW','2','1','2024-05-31 08:30:33','2024-05-31 09:12:43'),('ADM003','hehei','bruh','$2y$10$lv7iG46.7QbCpzsDS.5nmuH5DhiGhqQj/KOaLgYdD3zPrapDXEiBm','3','1','2024-05-31 08:48:49','2024-05-31 09:20:28'),('ADM004','bruakak','keueu','$2y$10$lmc76fnLjIz9pgf9ZsHd5eGrjgOn6s8QTFJ9dFtckchcksv2uLKEi','2','1','2024-05-31 08:56:43','2024-05-31 09:12:21'),('ADM005','manuk','nuk','$2y$10$Oxz6jCoDkK7FZn5voXjLdedecDXezuBgBZJddwDgAZ9EHkI.KI5LG','2','1','2024-05-31 09:00:50','2024-05-31 09:13:15'),('ADM006','bukan saya','15220415','$2y$10$ed1CpYiUXQBKGjalW3oiQu4t9z./3wfkJKLGQ2ceFKUlOiWnQCyg6','3','0','2024-05-31 09:20:50','2024-05-31 09:21:02'),('ADM007','ryo','ryovlrt','$2y$10$z.9fPlEGJOVJpL9fFV5UUuhR2gs8dPGys5YszyYQJPPN0AaaWmPXy','2','0','2024-06-20 07:52:05','2024-06-20 07:52:05');
/*!40000 ALTER TABLE `tbl_admin` ENABLE KEYS */;
UNLOCK TABLES;
COMMIT;

-- Dumped table `tbl_admin` with 8 row(s)
--

--
-- Table structure for table `tbl_anggota`
--

/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbl_anggota` (
  `id_anggota` varchar(6) NOT NULL,
  `nama_anggota` varchar(50) NOT NULL,
  `jenis_kelamin` enum('L','P') NOT NULL,
  `no_tlp` varchar(13) NOT NULL,
  `alamat` varchar(100) NOT NULL,
  `email` varchar(30) NOT NULL,
  `password_anggota` varchar(50) NOT NULL,
  `is_delete_anggota` enum('0','1') NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  PRIMARY KEY (`id_anggota`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_anggota`
--

LOCK TABLES `tbl_anggota` WRITE;
/*!40000 ALTER TABLE `tbl_anggota` DISABLE KEYS */;
SET autocommit=0;
INSERT INTO `tbl_anggota` VALUES ('ANG001','Ramadhoni','L','087721888891','Puri 2','ramdhon1.ssss@gmail.com','maulana24','0','2024-06-20 07:53:22','2024-06-20 07:53:22');
/*!40000 ALTER TABLE `tbl_anggota` ENABLE KEYS */;
UNLOCK TABLES;
COMMIT;

-- Dumped table `tbl_anggota` with 1 row(s)
--

--
-- Table structure for table `tbl_buku`
--

/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbl_buku` (
  `id_buku` varchar(6) NOT NULL,
  `judul_buku` varchar(200) NOT NULL,
  `pengarang` varchar(50) NOT NULL,
  `penerbit` varchar(50) NOT NULL,
  `tahun` varchar(4) NOT NULL,
  `jumlah_eksemplar` int(3) NOT NULL,
  `id_kategori` varchar(6) NOT NULL,
  `keterangan` varchar(500) NOT NULL,
  `id_rak` varchar(6) NOT NULL,
  `cover_buku` varchar(30) NOT NULL,
  `e_book` varchar(30) NOT NULL,
  `is_delete_buku` enum('0','1') NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  PRIMARY KEY (`id_buku`),
  KEY `id_katagori` (`id_kategori`,`id_rak`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_buku`
--

LOCK TABLES `tbl_buku` WRITE;
/*!40000 ALTER TABLE `tbl_buku` DISABLE KEYS */;
SET autocommit=0;
INSERT INTO `tbl_buku` VALUES ('BUK001','Kanjut Mas Rusdi','Mas Rusdi','Gramedia','2024',2,'KAT002','Kisah seorang mas rusdi','RAK001','bg windah.jpg','Chara Building.pdf','0','2024-06-20 07:57:35','2024-06-20 07:57:35');
/*!40000 ALTER TABLE `tbl_buku` ENABLE KEYS */;
UNLOCK TABLES;
COMMIT;

-- Dumped table `tbl_buku` with 1 row(s)
--

--
-- Table structure for table `tbl_kategori`
--

/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbl_kategori` (
  `id_kategori` varchar(6) NOT NULL,
  `nama_kategori` varchar(50) NOT NULL,
  `is_delete_kategori` enum('0','1') NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  PRIMARY KEY (`id_kategori`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_kategori`
--

LOCK TABLES `tbl_kategori` WRITE;
/*!40000 ALTER TABLE `tbl_kategori` DISABLE KEYS */;
SET autocommit=0;
INSERT INTO `tbl_kategori` VALUES ('KAT001','Kanjut','1','2024-06-20 07:56:15','2024-06-20 07:56:19'),('KAT002','Kanjut','0','2024-06-20 07:56:26','2024-06-20 07:56:26');
/*!40000 ALTER TABLE `tbl_kategori` ENABLE KEYS */;
UNLOCK TABLES;
COMMIT;

-- Dumped table `tbl_kategori` with 2 row(s)
--

--
-- Table structure for table `tbl_rak`
--

/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbl_rak` (
  `id_rak` varchar(6) NOT NULL,
  `nama_rak` varchar(50) NOT NULL,
  `is_delete_rak` enum('0','1') NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  PRIMARY KEY (`id_rak`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_rak`
--

LOCK TABLES `tbl_rak` WRITE;
/*!40000 ALTER TABLE `tbl_rak` DISABLE KEYS */;
SET autocommit=0;
INSERT INTO `tbl_rak` VALUES ('RAK001','Kanjut','0','2024-06-20 07:56:37','2024-06-20 07:56:37');
/*!40000 ALTER TABLE `tbl_rak` ENABLE KEYS */;
UNLOCK TABLES;
COMMIT;

-- Dumped table `tbl_rak` with 1 row(s)
--

/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;
/*!40101 SET AUTOCOMMIT=@OLD_AUTOCOMMIT */;
/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on: Thu, 20 Jun 2024 07:57:56 +0000
