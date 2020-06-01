-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jun 01, 2020 at 07:18 PM
-- Server version: 8.0.17
-- PHP Version: 7.3.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bilkod_tpl`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin_login`
--

CREATE TABLE `admin_login` (
  `admin_id` varchar(150) NOT NULL,
  `admin_userID` varchar(50) NOT NULL,
  `admin_pass` varchar(50) NOT NULL,
  `admin_mail` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `ana_slider`
--

CREATE TABLE `ana_slider` (
  `slider_id` int(11) NOT NULL,
  `slider_ad` varchar(100) DEFAULT NULL,
  `slider_resimyolu` varchar(500) DEFAULT NULL,
  `slider_url` varchar(500) DEFAULT NULL,
  `slider_baslik` varchar(100) DEFAULT NULL,
  `slider_aciklama` varchar(500) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
  `slider_durum` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `ayarlar`
--

CREATE TABLE `ayarlar` (
  `ayar_id` int(11) NOT NULL,
  `ayar_logo` varchar(250) DEFAULT NULL,
  `ayar_telefon` varchar(50) DEFAULT NULL,
  `ayar_title` varchar(100) DEFAULT NULL,
  `ayar_description` varchar(500) DEFAULT NULL,
  `ayar_keywords` varchar(500) DEFAULT NULL,
  `ayar_facebook` varchar(150) DEFAULT NULL,
  `ayar_twitter` varchar(150) DEFAULT NULL,
  `ayar_youtube` varchar(150) DEFAULT NULL,
  `ayar_google` varchar(150) DEFAULT NULL,
  `ayar_adres` varchar(500) DEFAULT NULL,
  `ayar_mail` varchar(150) DEFAULT NULL,
  `ayar_fax` varchar(50) DEFAULT NULL,
  `ayar_googleUrl` varchar(500) DEFAULT NULL,
  `ayar_vizyon` varchar(500) DEFAULT NULL,
  `ayar_misyon` varchar(500) DEFAULT NULL,
  `ayar_hakkimizda` varchar(500) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `haberler`
--

CREATE TABLE `haberler` (
  `haber_id` int(11) NOT NULL,
  `haber_ad` varchar(100) COLLATE utf8mb4_turkish_ci NOT NULL,
  `haber_baslik` varchar(500) COLLATE utf8mb4_turkish_ci NOT NULL,
  `haber_makale` varchar(2500) COLLATE utf8mb4_turkish_ci NOT NULL,
  `haber_durum` bit(1) NOT NULL DEFAULT b'0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_turkish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `haber_resimler`
--

CREATE TABLE `haber_resimler` (
  `resim_id` int(11) NOT NULL,
  `haber_id` int(11) NOT NULL,
  `resim_yol` varchar(150) COLLATE utf8mb4_turkish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_turkish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `projeler`
--

CREATE TABLE `projeler` (
  `proje_id` int(11) NOT NULL,
  `proje_ad` varchar(100) COLLATE utf8mb4_turkish_ci NOT NULL,
  `proje_baslik` varchar(500) COLLATE utf8mb4_turkish_ci NOT NULL,
  `proje_makale` varchar(2500) CHARACTER SET utf8mb4 COLLATE utf8mb4_turkish_ci NOT NULL,
  `proje_durum` bit(1) NOT NULL DEFAULT b'0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_turkish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `proje_resimler`
--

CREATE TABLE `proje_resimler` (
  `resim_id` int(11) NOT NULL,
  `proje_id` int(11) NOT NULL,
  `resim_yol` varchar(150) COLLATE utf8mb4_turkish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_turkish_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin_login`
--
ALTER TABLE `admin_login`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `ana_slider`
--
ALTER TABLE `ana_slider`
  ADD PRIMARY KEY (`slider_id`);

--
-- Indexes for table `ayarlar`
--
ALTER TABLE `ayarlar`
  ADD PRIMARY KEY (`ayar_id`);

--
-- Indexes for table `haberler`
--
ALTER TABLE `haberler`
  ADD PRIMARY KEY (`haber_id`);

--
-- Indexes for table `haber_resimler`
--
ALTER TABLE `haber_resimler`
  ADD PRIMARY KEY (`resim_id`);

--
-- Indexes for table `projeler`
--
ALTER TABLE `projeler`
  ADD PRIMARY KEY (`proje_id`);

--
-- Indexes for table `proje_resimler`
--
ALTER TABLE `proje_resimler`
  ADD PRIMARY KEY (`resim_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `haberler`
--
ALTER TABLE `haberler`
  MODIFY `haber_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `haber_resimler`
--
ALTER TABLE `haber_resimler`
  MODIFY `resim_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `projeler`
--
ALTER TABLE `projeler`
  MODIFY `proje_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `proje_resimler`
--
ALTER TABLE `proje_resimler`
  MODIFY `resim_id` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
