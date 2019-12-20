-- phpMyAdmin SQL Dump
-- version 4.3.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 16 Feb 2019 pada 09.01
-- Versi Server: 5.6.24
-- PHP Version: 5.6.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `db_ppdb`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `admin`
--

CREATE TABLE IF NOT EXISTS `admin` (
  `id` int(11) NOT NULL,
  `username` varchar(50) DEFAULT NULL,
  `password` varchar(50) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `admin`
--

INSERT INTO `admin` (`id`, `username`, `password`) VALUES
(1, 'admin', 'admin');

-- --------------------------------------------------------

--
-- Struktur dari tabel `auto_reply`
--

CREATE TABLE IF NOT EXISTS `auto_reply` (
  `id` int(11) NOT NULL,
  `pesan` varchar(100) NOT NULL
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `auto_reply`
--

INSERT INTO `auto_reply` (`id`, `pesan`) VALUES
(1, 'Ini Balasan Otomatis dari SMS Gateway (Ahmad Tauhid)');

-- --------------------------------------------------------

--
-- Struktur dari tabel `daemons`
--

CREATE TABLE IF NOT EXISTS `daemons` (
  `Start` text NOT NULL,
  `Info` text NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Struktur dari tabel `events`
--

CREATE TABLE IF NOT EXISTS `events` (
  `id` int(11) NOT NULL,
  `title` varchar(500) COLLATE utf8_bin NOT NULL,
  `start` date NOT NULL,
  `end` date DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data untuk tabel `events`
--

INSERT INTO `events` (`id`, `title`, `start`, `end`) VALUES
(5, 'Penerimaan Peserta Didik Baru 2018', '2018-04-01', '2018-07-11'),
(6, 'Semester Genap Mapel 2016/2018', '2018-06-05', '2018-06-13'),
(7, 'Hari Perdana Masuk & Pengambilan Kartu Test', '2018-07-12', '2018-07-12'),
(8, 'Ujian Masuk (Tulis & Lisan)', '2018-07-13', '2018-07-15'),
(9, 'Masa Ta''aruf Siswa Madrasah (MATSAMA)', '2018-07-17', '2018-07-19');

-- --------------------------------------------------------

--
-- Struktur dari tabel `gammu`
--

CREATE TABLE IF NOT EXISTS `gammu` (
  `Version` int(11) NOT NULL DEFAULT '0'
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `gammu`
--

INSERT INTO `gammu` (`Version`) VALUES
(13);

-- --------------------------------------------------------

--
-- Struktur dari tabel `inbox`
--

CREATE TABLE IF NOT EXISTS `inbox` (
  `UpdatedInDB` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `ReceivingDateTime` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `Text` text NOT NULL,
  `SenderNumber` varchar(20) NOT NULL DEFAULT '',
  `Coding` enum('Default_No_Compression','Unicode_No_Compression','8bit','Default_Compression','Unicode_Compression') NOT NULL DEFAULT 'Default_No_Compression',
  `UDH` text NOT NULL,
  `SMSCNumber` varchar(20) NOT NULL DEFAULT '',
  `Class` int(11) NOT NULL DEFAULT '-1',
  `TextDecoded` text NOT NULL,
  `ID` int(10) unsigned NOT NULL,
  `RecipientID` text NOT NULL,
  `Processed` enum('false','true') NOT NULL DEFAULT 'false'
) ENGINE=MyISAM AUTO_INCREMENT=258 DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `inbox`
--

INSERT INTO `inbox` (`UpdatedInDB`, `ReceivingDateTime`, `Text`, `SenderNumber`, `Coding`, `UDH`, `SMSCNumber`, `Class`, `TextDecoded`, `ID`, `RecipientID`, `Processed`) VALUES
('2017-07-03 06:34:02', '2017-07-03 06:30:50', 'as', '081918405331', 'Default_No_Compression', '', '', -1, 'asdasds', 257, '', 'false');

-- --------------------------------------------------------

--
-- Struktur dari tabel `outbox`
--

CREATE TABLE IF NOT EXISTS `outbox` (
  `UpdatedInDB` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `InsertIntoDB` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `SendingDateTime` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `SendBefore` time NOT NULL DEFAULT '23:59:59',
  `SendAfter` time NOT NULL DEFAULT '00:00:00',
  `Text` text,
  `DestinationNumber` varchar(20) NOT NULL DEFAULT '',
  `Coding` enum('Default_No_Compression','Unicode_No_Compression','8bit','Default_Compression','Unicode_Compression') NOT NULL DEFAULT 'Default_No_Compression',
  `UDH` text,
  `Class` int(11) DEFAULT '-1',
  `TextDecoded` text NOT NULL,
  `ID` int(10) unsigned NOT NULL,
  `MultiPart` enum('false','true') DEFAULT 'false',
  `RelativeValidity` int(11) DEFAULT '-1',
  `SenderID` varchar(255) DEFAULT NULL,
  `SendingTimeOut` timestamp NULL DEFAULT '0000-00-00 00:00:00',
  `DeliveryReport` enum('default','yes','no') DEFAULT 'default',
  `CreatorID` text NOT NULL
) ENGINE=MyISAM AUTO_INCREMENT=3532 DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `outbox`
--

INSERT INTO `outbox` (`UpdatedInDB`, `InsertIntoDB`, `SendingDateTime`, `SendBefore`, `SendAfter`, `Text`, `DestinationNumber`, `Coding`, `UDH`, `Class`, `TextDecoded`, `ID`, `MultiPart`, `RelativeValidity`, `SenderID`, `SendingTimeOut`, `DeliveryReport`, `CreatorID`) VALUES
('2018-05-08 10:54:14', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '23:59:59', '00:00:00', NULL, '12312312312', 'Default_No_Compression', NULL, -1, 'Terima Kasih mUHAMMAD Sudah Mendaftar sebagai santri baru MA Muallimin NW Anjani Thn 2017. Untuk Info lebih lanjut hub. Panitia di 081918405331', 3530, 'false', -1, NULL, '0000-00-00 00:00:00', 'default', ''),
('2018-05-08 10:46:32', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '23:59:59', '00:00:00', NULL, '', 'Default_No_Compression', NULL, -1, 'Terima Kasih AZMI Sudah Mendaftar sebagai santri baru MA Muallimin NW Anjani Thn 2017. Untuk Info lebih lanjut hub. Panitia di 081918405331', 3529, 'false', -1, NULL, '0000-00-00 00:00:00', 'default', ''),
('2018-05-08 10:42:31', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '23:59:59', '00:00:00', NULL, '', 'Default_No_Compression', NULL, -1, 'Terima Kasih asdasDASD Sudah Mendaftar sebagai santri baru MA Muallimin NW Anjani Thn 2017. Untuk Info lebih lanjut hub. Panitia di 081918405331', 3528, 'false', -1, NULL, '0000-00-00 00:00:00', 'default', ''),
('2018-05-08 10:37:46', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '23:59:59', '00:00:00', NULL, '08912182121', 'Default_No_Compression', NULL, -1, 'Terima Kasih Azmi Sudah Mendaftar sebagai santri baru MA Muallimin NW Anjani Thn 2017. Untuk Info lebih lanjut hub. Panitia di 081918405331', 3527, 'false', -1, NULL, '0000-00-00 00:00:00', 'default', ''),
('2018-05-08 08:41:39', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '23:59:59', '00:00:00', NULL, '081918405331', 'Default_No_Compression', NULL, -1, 'Terima Kasih Muhammad Azmi Sudah Mendaftar sebagai santri baru MA Muallimin NW Anjani Thn 2017. Untuk Info lebih lanjut hub. Panitia di 081918405331', 3526, 'false', -1, NULL, '0000-00-00 00:00:00', 'default', ''),
('2018-05-08 06:05:34', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '23:59:59', '00:00:00', NULL, '081918405331', 'Default_No_Compression', NULL, -1, 'Terima Kasih Muhammad Azmi Sudah Mendaftar sebagai santri baru MA Muallimin NW Anjani Thn 2017. Untuk Info lebih lanjut hub. Panitia di 081918405331', 3525, 'false', -1, NULL, '0000-00-00 00:00:00', 'default', ''),
('2018-05-08 06:02:18', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '23:59:59', '00:00:00', NULL, '081918405331', 'Default_No_Compression', NULL, -1, 'Terima Kasih Muhammad Azmi Sudah Mendaftar sebagai santri baru MA Muallimin NW Anjani Thn 2017. Untuk Info lebih lanjut hub. Panitia di 081918405331', 3524, 'false', -1, NULL, '0000-00-00 00:00:00', 'default', ''),
('2018-05-08 05:39:26', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '23:59:59', '00:00:00', NULL, '', 'Default_No_Compression', NULL, -1, 'Terima Kasih asdasdasd Sudah Mendaftar sebagai santri baru MA Muallimin NW Anjani Thn 2017. Untuk Info lebih lanjut hub. Panitia di 081918405331', 3523, 'false', -1, NULL, '0000-00-00 00:00:00', 'default', ''),
('2018-05-08 05:36:27', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '23:59:59', '00:00:00', NULL, '', 'Default_No_Compression', NULL, -1, 'Terima Kasih Azmi Sudah Mendaftar sebagai santri baru MA Muallimin NW Anjani Thn 2017. Untuk Info lebih lanjut hub. Panitia di 081918405331', 3522, 'false', -1, NULL, '0000-00-00 00:00:00', 'default', ''),
('2018-05-08 05:35:05', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '23:59:59', '00:00:00', NULL, '081918405331', 'Default_No_Compression', NULL, -1, 'Terima Kasih Muhammad Azmi Sudah Mendaftar sebagai santri baru MA Muallimin NW Anjani Thn 2017. Untuk Info lebih lanjut hub. Panitia di 081918405331', 3521, 'false', -1, NULL, '0000-00-00 00:00:00', 'default', ''),
('2018-05-08 04:52:13', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '23:59:59', '00:00:00', NULL, '', 'Default_No_Compression', NULL, -1, 'Terima Kasih ewrwerwer Sudah Mendaftar sebagai santri baru MA Muallimin NW Anjani Thn 2017. Untuk Info lebih lanjut hub. Panitia di 081918405331', 3520, 'false', -1, NULL, '0000-00-00 00:00:00', 'default', ''),
('2018-05-08 04:45:40', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '23:59:59', '00:00:00', NULL, '', 'Default_No_Compression', NULL, -1, 'Terima Kasih wswsdsa Sudah Mendaftar sebagai santri baru MA Muallimin NW Anjani Thn 2017. Untuk Info lebih lanjut hub. Panitia di 081918405331', 3519, 'false', -1, NULL, '0000-00-00 00:00:00', 'default', ''),
('2018-05-08 04:35:44', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '23:59:59', '00:00:00', NULL, '', 'Default_No_Compression', NULL, -1, 'Terima Kasih zul Sudah Mendaftar sebagai santri baru MA Muallimin NW Anjani Thn 2017. Untuk Info lebih lanjut hub. Panitia di 081918405331', 3518, 'false', -1, NULL, '0000-00-00 00:00:00', 'default', ''),
('2018-05-08 04:26:52', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '23:59:59', '00:00:00', NULL, '22342323233', 'Default_No_Compression', NULL, -1, 'Terima Kasih asz Sudah Mendaftar sebagai santri baru MA Muallimin NW Anjani Thn 2017. Untuk Info lebih lanjut hub. Panitia di 081918405331', 3517, 'false', -1, NULL, '0000-00-00 00:00:00', 'default', ''),
('2018-05-08 04:13:09', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '23:59:59', '00:00:00', NULL, '343432423423', 'Default_No_Compression', NULL, -1, 'Terima Kasih azmi Sudah Mendaftar sebagai santri baru MA Muallimin NW Anjani Thn 2017. Untuk Info lebih lanjut hub. Panitia di 081918405331', 3516, 'false', -1, NULL, '0000-00-00 00:00:00', 'default', ''),
('2018-05-08 04:06:32', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '23:59:59', '00:00:00', NULL, '43534534536', 'Default_No_Compression', NULL, -1, 'Terima Kasih erwtertert Sudah Mendaftar sebagai santri baru MA Muallimin NW Anjani Thn 2017. Untuk Info lebih lanjut hub. Panitia di 081918405331', 3515, 'false', -1, NULL, '0000-00-00 00:00:00', 'default', ''),
('2018-05-08 04:01:03', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '23:59:59', '00:00:00', NULL, '087768678766', 'Default_No_Compression', NULL, -1, 'Terima Kasih dsfsdf Sudah Mendaftar sebagai santri baru MA Muallimin NW Anjani Thn 2017. Untuk Info lebih lanjut hub. Panitia di 081918405331', 3514, 'false', -1, NULL, '0000-00-00 00:00:00', 'default', ''),
('2019-01-20 00:50:57', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '23:59:59', '00:00:00', NULL, '21312312', 'Default_No_Compression', NULL, -1, 'Terima Kasih wqeqwe Sudah Mendaftar sebagai santri baru MA Muallimin NW Anjani Thn 2018. Untuk Info lebih lanjut hub. Panitia di 081918405331', 3531, 'false', -1, NULL, '0000-00-00 00:00:00', 'default', '');

-- --------------------------------------------------------

--
-- Struktur dari tabel `outbox_multipart`
--

CREATE TABLE IF NOT EXISTS `outbox_multipart` (
  `Text` text,
  `Coding` enum('Default_No_Compression','Unicode_No_Compression','8bit','Default_Compression','Unicode_Compression') NOT NULL DEFAULT 'Default_No_Compression',
  `UDH` text,
  `Class` int(11) DEFAULT '-1',
  `TextDecoded` text,
  `ID` int(10) unsigned NOT NULL DEFAULT '0',
  `SequencePosition` int(11) NOT NULL DEFAULT '1'
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Struktur dari tabel `pbk`
--

CREATE TABLE IF NOT EXISTS `pbk` (
  `ID` int(11) NOT NULL,
  `GroupID` int(11) NOT NULL DEFAULT '-1',
  `Name` text NOT NULL,
  `Number` text NOT NULL
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Struktur dari tabel `pbk_groups`
--

CREATE TABLE IF NOT EXISTS `pbk_groups` (
  `Name` text NOT NULL,
  `ID` int(11) NOT NULL
) ENGINE=MyISAM AUTO_INCREMENT=10 DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Struktur dari tabel `phones`
--

CREATE TABLE IF NOT EXISTS `phones` (
  `ID` text NOT NULL,
  `UpdatedInDB` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `InsertIntoDB` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `TimeOut` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `Send` enum('yes','no') NOT NULL DEFAULT 'no',
  `Receive` enum('yes','no') NOT NULL DEFAULT 'no',
  `IMEI` varchar(35) NOT NULL,
  `Client` text NOT NULL,
  `Battery` int(11) NOT NULL DEFAULT '-1',
  `Signal` int(11) NOT NULL DEFAULT '-1',
  `Sent` int(11) NOT NULL DEFAULT '0',
  `Received` int(11) NOT NULL DEFAULT '0'
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `phones`
--

INSERT INTO `phones` (`ID`, `UpdatedInDB`, `InsertIntoDB`, `TimeOut`, `Send`, `Receive`, `IMEI`, `Client`, `Battery`, `Signal`, `Sent`, `Received`) VALUES
('SMSGateway', '2017-05-27 19:50:31', '2017-05-27 19:48:45', '2017-05-27 19:50:41', 'yes', 'yes', '867767001046305', 'Gammu 1.33.0, Windows Server 2007, GCC 4.7, MinGW 3.11', 0, 39, 1, 18),
('SMSGateway', '2017-05-28 05:03:10', '2017-05-27 20:07:27', '2017-05-28 05:03:20', 'yes', 'yes', '860604005495575', 'Gammu 1.33.0, Windows Server 2007, GCC 4.7, MinGW 3.11', 0, 45, 6, 5);

-- --------------------------------------------------------

--
-- Struktur dari tabel `phone_db`
--

CREATE TABLE IF NOT EXISTS `phone_db` (
  `id` int(11) NOT NULL,
  `Name` varchar(60) NOT NULL,
  `Connection` varchar(30) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=542 DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `phone_db`
--

INSERT INTO `phone_db` (`id`, `Name`, `Connection`) VALUES
(1, 'Huawei D1200P', 'at115200'),
(2, 'Huawei E122', 'at'),
(3, 'Huawei E153', 'at115200'),
(4, 'Huawei E1550', 'at'),
(5, 'Huawei E1552', 'at'),
(6, 'Huawei E156G', 'at'),
(7, 'Huawei E160', 'at'),
(8, 'Huawei E160E', 'at19200'),
(9, 'Huawei E160G', 'at115200'),
(10, 'Huawei E160X', 'at'),
(11, 'Huawei E161', 'at'),
(12, 'Huawei E1612 (movistar)', 'at19200'),
(13, 'Huawei E169', 'at19200'),
(14, 'Huawei E1692', 'at'),
(15, 'Huawei E169G', 'at115200'),
(16, 'Huawei E170', 'at115200'),
(17, 'Huawei E172', 'at'),
(18, 'Huawei E173', 'at115200'),
(19, 'Huawei E1731', 'at19200'),
(20, 'Huawei E1732', 'at115200'),
(21, 'Huawei E1750', 'at'),
(22, 'Huawei E1750C', 'at19200'),
(23, 'Huawei E1752', 'at'),
(24, 'Huawei E1756EC', 'at'),
(25, 'Huawei E1762', 'at'),
(26, 'Huawei E176G', 'at115200'),
(27, 'Huawei E180', 'at115200'),
(28, 'Huawei E1820', 'at19200'),
(29, 'Huawei E220', 'at19200'),
(30, 'Huawei E226', 'at19200'),
(31, 'Huawei E230', 'at115200'),
(32, 'Huawei E272 (Vodafone)', 'at'),
(33, 'Huawei E620', 'at115200'),
(34, 'Huawei E630+', 'at19200'),
(35, 'Huawei E660A', 'at19200'),
(36, 'Huawei E870', 'at'),
(37, 'Huawei EC121', 'at115200'),
(38, 'Huawei EG162G', 'at115200'),
(39, 'Huawei EM770', 'at'),
(40, 'Huawei ets2558', 'Not supported'),
(41, 'Huawei haier c700', 'at115200'),
(42, 'Huawei EG162', 'at115200'),
(43, 'Huawei k3520', 'at'),
(44, 'Huawei K3565', 'at19200'),
(45, 'Huawei K3765', 'at'),
(46, 'Huawei K4505', 'at115200'),
(47, 'Huawei MF627', 'at19200'),
(48, 'Huawei Micromax MMX310G', 'at'),
(49, 'Huawei momo design 302', 'at'),
(50, 'Huawei MTK2', 'at115200'),
(51, 'Huawei SU 9000', 'at115200'),
(52, 'Huawei u1211', 'at'),
(53, 'Huawei u1215', 'fbusdlr3'),
(54, 'Huawei U1250', 'blueat'),
(55, 'Huawei u1280', 'at'),
(56, 'Huawei U3200', 'blueat'),
(57, 'Huawei U526', 'at'),
(58, 'Huawei U7510', 'at115200'),
(59, 'Huawei U8100', 'at115200'),
(60, 'Huawei UMG181', 'at115200'),
(61, 'Huawei vadafone', 'fbus'),
(62, 'Vodafone 810', 'blueobex'),
(63, 'Vodafone K3565', 'at'),
(64, 'Vodafone K3565-Z', 'at'),
(65, 'Vodafone S65v', 'blueobex'),
(66, 'Vodafone VF541', 'at115200'),
(67, 'Vodafone VF543', 'blueat'),
(68, 'Wavecom fastrack extend', 'at115200'),
(69, 'Wavecom Fastrack M1206B', 'at115200'),
(70, 'Wavecom Fasttrack supreme WM20392', 'at'),
(71, 'Wavecom iTegno', 'fbusirda'),
(72, 'Wavecom M1306B', 'at115200'),
(73, 'Wavecom MultiModem MTCBA-G-U-F4', 'at115200'),
(74, 'Wavecom Wavecom Fastrack Go', 'at115200'),
(75, 'Wavecom WMOD2', 'at19200'),
(76, 'ZTE Ace Caracas Dos', 'at115200'),
(77, 'ZTE c261', 'at19200'),
(78, 'ZTE F107', 'at'),
(79, 'ZTE F156', 'at'),
(80, 'ZTE F188', 'at19200'),
(81, 'ZTE G N281', 'blueat'),
(82, 'ZTE G X760', 'at115200'),
(83, 'ZTE Globe', 'at115200'),
(84, 'ZTE K3565-Z', 'at'),
(85, 'ZTE K3565-Z', 'at'),
(86, 'ZTE K3570-Z', 'fbusdlr3'),
(87, 'ZTE K3765-Z', 'at'),
(88, 'ZTE MD2', 'at19200'),
(89, 'ZTE MF-627', 'at19200'),
(90, 'ZTE MF-628', 'at19200'),
(91, 'ZTE MF100', 'at115200'),
(92, 'ZTE MF110', 'at115200'),
(93, 'ZTE MF112', 'at115200'),
(94, 'ZTE MF180', 'at115200'),
(95, 'ZTE MF190', 'at'),
(96, 'ZTE MF622', 'at'),
(97, 'ZTE MF626', 'at19200'),
(98, 'ZTE MF636', 'at115200'),
(99, 'Huawei E173', 'at115200'),
(100, 'Huawei E173', 'at115200'),
(101, 'Huawei E353', 'at'),
(102, 'Sony Ericsson G502', 'at19200'),
(103, 'Sony Ericsson W300i/W300c', 'at19200'),
(104, 'Sony Ericsson T650i', 'blueat'),
(105, 'Sony Ericsson Z530i/Z530c', 'bluerfat'),
(106, 'Sony Ericsson Z800', 'at115200'),
(107, 'Sony Ericsson w902', 'bluerfat'),
(108, 'Sony Ericsson W550i', 'blueat'),
(109, 'Sony Ericsson M600i', 'at'),
(110, 'Sony Ericsson K790a', 'at115200'),
(111, 'Sony Ericsson R320s', 'at115200'),
(112, 'Sony Ericsson Z600', 'at115200'),
(113, 'Sony Ericsson S700i', 'blueat'),
(114, 'Sony Ericsson W302', 'blueat'),
(115, 'Sony Ericsson W890i', 'blueat'),
(116, 'Sony Ericsson W910i', 'blueat'),
(117, 'Sony Ericsson C905', 'at115200'),
(118, 'Sony Ericsson T610', 'at115200'),
(119, 'Sony Ericsson T68i', 'at115200'),
(120, 'Sony Ericsson f305', 'at'),
(121, 'Sony Ericsson Sony W960i', 'blueat'),
(122, 'Sony Ericsson C510', 'at'),
(123, 'Sony Ericsson Z710', 'at19200'),
(124, 'Sony Ericsson W810i/W810c', 'blueat'),
(125, 'Sony Ericsson J300i', 'at115200'),
(126, 'Sony Ericsson C702', 'at19200'),
(127, 'Sony Ericsson C702', 'at19200'),
(128, 'Sony Ericsson K800i', 'at19200'),
(129, 'Sony Ericsson W850i', 'at19200'),
(130, 'Sony Ericsson K530i', 'blueat'),
(131, 'Sony Ericsson TM506', 'blueat'),
(132, 'Sony Ericsson TM506', 'blueat'),
(133, 'Sony Ericsson V600i', 'blueat'),
(134, 'Sony Ericsson K550i/K550c', 'at'),
(135, 'Sony Ericsson k508i', 'at19200'),
(136, 'Sony Ericsson T230', 'at'),
(137, 'Sony Ericsson t290a', 'at'),
(138, 'Sony Ericsson W302', 'at'),
(139, 'Sony Ericsson K500i', 'at115200'),
(140, 'Sony Ericsson W950i', 'at115200'),
(141, 'Sony Ericsson P800', 'at115200'),
(142, 'Sony Ericsson K608i', 'at19200'),
(143, 'Sony Ericsson V640i', 'blueat'),
(144, 'Sony Ericsson R520', 'at115200'),
(145, 'Sony Ericsson V60i', 'at115200'),
(146, 'Sony Ericsson K660i', 'at115200'),
(147, 'Sony Ericsson K320i', 'blueat'),
(148, 'Sony Ericsson Z710i/Z710c', 'at'),
(149, 'Sony Ericsson W660i', 'at'),
(150, 'Sony Ericsson W350i', 'at115200'),
(151, 'Sony Ericsson w380a', 'at115200'),
(152, 'Sony Ericsson Z550i', 'at115200'),
(153, 'Sony Ericsson Z750A', 'at115200'),
(154, 'Sony Ericsson K320i', 'at19200'),
(155, 'Sony Ericsson K700i', 'at19200'),
(156, 'Sony Ericsson K800i', 'at19200'),
(157, 'Sony Ericsson W300i/W300c', 'at19200'),
(158, 'Sony Ericsson W610i/W610c', 'at19200'),
(159, 'Sony Ericsson K550i', 'blueat'),
(160, 'Sony Ericsson K550im', 'blueat'),
(161, 'Sony Ericsson K608i', 'blueat'),
(162, 'Sony Ericsson K618i/V630i', 'blueat'),
(163, 'Sony Ericsson T630', 'blueat'),
(164, 'Sony Ericsson T700', 'blueat'),
(165, 'Sony Ericsson w380a', 'blueat'),
(166, 'Sony Ericsson W710i', 'blueat'),
(167, 'Sony Ericsson W850i', 'blueat'),
(168, 'Sony Ericsson Z310i/Z310c', 'blueat'),
(169, 'Sony Ericsson V800/V802SE/Z800i', 'at'),
(170, 'Sony Ericsson W550i/W550c', 'at'),
(171, 'Sony Ericsson K700c', 'at115200'),
(172, 'Sony Ericsson W200i/W200c', 'at115200'),
(173, 'Sony Ericsson w580i', 'at115200'),
(174, 'Sony Ericsson W700i/W700c', 'at115200'),
(175, 'Sony Ericsson W810i/W810c', 'at115200'),
(176, 'Sony Ericsson Z1010', 'at19200'),
(177, 'Sony Ericsson K610i', 'blueat'),
(178, 'Sony Ericsson W300i', 'blueat'),
(179, 'Sony Ericsson W810i/W810c', 'blueat'),
(180, 'Sony Ericsson W890i', 'blueat'),
(181, 'Sony Ericsson Z1010', 'blueat'),
(182, 'Sony Ericsson Z520i/Z520c', 'blueat'),
(183, 'Sony Ericsson Z770i', 'blueat'),
(184, 'Sony Ericsson K300i', 'at19200'),
(185, 'Sony Ericsson P800', 'blueat'),
(186, 'Sony Ericsson K810i', 'at'),
(187, 'Sony Ericsson C905', 'blueat'),
(188, 'Sony Ericsson S500i/S500c', 'blueat'),
(189, 'Sony Ericsson K530i', 'at115200'),
(190, 'Sony Ericsson W595s', 'at115200'),
(191, 'Sony Ericsson K610i', 'at19200'),
(192, 'Sony Ericsson K618i/V630i', 'at19200'),
(193, 'Sony Ericsson S500i/S500c', 'at19200'),
(194, 'Sony Ericsson W910i', 'at19200'),
(195, 'Sony Ericsson Z610i', 'at19200'),
(196, 'Sony Ericsson K750i', 'blueat'),
(197, 'Sony Ericsson k770i', 'blueat'),
(198, 'Sony Ericsson W830i/W830c', 'blueat'),
(199, 'Sony Ericsson K310i/K310c', 'at'),
(200, 'Sony Ericsson K510i', 'at'),
(201, 'Sony Ericsson K550i/K550c', 'at'),
(202, 'Sony Ericsson K790i/K790c', 'at115200'),
(203, 'Sony Ericsson W880i', 'at115200'),
(204, 'Sony Ericsson Z558i', 'at115200'),
(205, 'Sony Ericsson K600i', 'at19200'),
(206, 'Sony Ericsson K750i', 'at19200'),
(207, 'Sony Ericsson K810i', 'at19200'),
(208, 'Sony Ericsson W760i', 'at19200'),
(209, 'Sony Ericsson W800i/W800c', 'at19200'),
(210, 'Sony Ericsson Z530i/Z530c', 'at19200'),
(211, 'Sony Ericsson K700i', 'blueat'),
(212, 'Sony Ericsson K790i/K790c', 'blueat'),
(213, 'Sony Ericsson K800i', 'blueat'),
(214, 'Sony Ericsson K810i', 'blueat'),
(215, 'Sony Ericsson W610i/W610c', 'blueat'),
(216, 'Sony Ericsson W660i', 'blueat'),
(217, 'Sony Ericsson W800i/W800c', 'blueat'),
(218, 'Sony Ericsson W880i', 'blueat'),
(219, 'Sony Ericsson W910i', 'blueat'),
(220, 'Sony Ericsson K600i', 'bluerfat'),
(221, 'Sony Ericsson K770i', 'at'),
(222, 'Sony Ericsson T700', 'at115200'),
(223, 'Sony Ericsson K530i', 'at19200'),
(224, 'Sony Ericsson W850i', 'at19200'),
(225, 'Sony Ericsson W850i', 'at19200'),
(226, 'Sony Ericsson AAD-3052051-BV', 'blueat'),
(227, 'Sony Ericsson K790i/K790c', 'blueat'),
(228, 'Sony Ericsson Z520a', 'at'),
(229, 'Sony Ericsson W580i/W580c', 'blueat'),
(230, 'Sony Ericsson K630i', 'at115200'),
(231, 'Sony Ericsson W200i/W200c', 'at115200'),
(232, 'Sony Ericsson AAD-3252041-BV (W760i)', 'bluerfat'),
(233, 'Sony Ericsson T630', 'at115200'),
(234, 'Sony Ericsson D750i', 'at19200'),
(235, 'Sony Ericsson K850i', 'at'),
(236, 'Sony Ericsson W900i', 'at19200'),
(237, 'Sony Ericsson K850i', 'blueat'),
(238, 'Sony Ericsson W890i', 'blueat'),
(239, 'Sony Ericsson K510i', 'blueat'),
(240, 'Sony Ericsson C902', 'at115200'),
(241, 'Sony Ericsson T610', 'blueat'),
(242, 'Sony Ericsson C902', 'at115200'),
(243, 'Sony Ericsson FWT G3x Series', 'at115200'),
(244, 'Sony Ericsson K750', 'fbus'),
(245, 'Sony Ericsson c702 AAD-3052081-BV', 'at'),
(246, 'Sony Ericsson W350i/W350c', 'blueat'),
(247, 'Sony Ericsson K550im', 'at19200'),
(248, 'Siemens A56', 'at19200'),
(249, 'Siemens A60', 'at19200'),
(250, 'Siemens C61', 'at19200'),
(251, 'Siemens S45', 'at19200'),
(252, 'Siemens SP65', 'at19200'),
(253, 'Siemens CX75', 'blueat'),
(254, 'Siemens AX75', 'at115200'),
(255, 'Siemens C6V', 'at19200'),
(256, 'Siemens S75', 'blueat'),
(257, 'Siemens C75', 'at115200'),
(258, 'Siemens C75', 'at'),
(259, 'Siemens CX65', 'at115200'),
(260, 'Siemens MC35i', 'at19200'),
(261, 'Siemens ME45', 'at19200'),
(262, 'Siemens S11', 'at19200'),
(263, 'Siemens C65', 'irdaat'),
(264, 'Siemens ME75', 'at115200'),
(265, 'Siemens S75', 'at115200'),
(266, 'Siemens CF62', 'at19200'),
(267, 'Siemens MC60', 'at19200'),
(268, 'Siemens S68', 'blueat'),
(269, 'Siemens C65', 'at19200'),
(270, 'Siemens SK6R', 'at'),
(271, 'Siemens A62', 'at115200'),
(272, 'Siemens A65', 'at19200'),
(273, 'Siemens C35i', 'at19200'),
(274, 'Siemens ES75', 'at19200'),
(275, 'Siemens MC 60', 'at19200'),
(276, 'Siemens MC75', 'at19200'),
(277, 'Siemens S65', 'at19200'),
(278, 'Siemens SL45i', 'at19200'),
(279, 'Siemens C45', 'at19200'),
(280, 'Siemens C60', 'at19200'),
(281, 'Siemens S55', 'at115200'),
(282, 'Siemens M55', 'at19200'),
(283, 'Siemens S25', 'at115200'),
(284, 'Siemens M35i', 'at19200'),
(285, 'Siemens MT50', 'at19200'),
(286, 'Siemens M65', 'at115200'),
(287, 'Siemens C55', 'at19200'),
(288, 'Siemens CF75', 'at19200'),
(289, 'Siemens EL71', 'at115200'),
(290, 'Siemens TC35', 'at19200'),
(291, 'Siemens SL 75', 'blueat'),
(292, 'Siemens S65', 'blueat'),
(293, 'Siemens SK65', 'at'),
(294, 'Samsung SGH-A707', 'at'),
(295, 'Samsung SGH-Z107', 'at'),
(296, 'Samsung c3110', 'at115200'),
(297, 'Samsung SGH-Z150', 'at115200'),
(298, 'Samsung SGH-E310', 'at19200'),
(299, 'Samsung SGH-E770', 'at19200'),
(300, 'Samsung SGH-i607', 'at19200'),
(301, 'Samsung SGH-Z300', 'at19200'),
(302, 'Samsung SGH-Z400', 'at19200'),
(303, 'Samsung SGH-D407', 'blueat'),
(304, 'Samsung SGH-Z510', 'blueat'),
(305, 'Samsung SGH-D780', 'at115200'),
(306, 'Samsung SGH-A701', 'at19200'),
(307, 'Samsung SGH-D407', 'at'),
(308, 'Samsung SGH-D520', 'at'),
(309, 'Samsung SGH-M300V', 'at'),
(310, 'Samsung SGH-M300V', 'at'),
(311, 'Samsung SGH-E215L', 'at115200'),
(312, 'Samsung SGH-U600', 'at115200'),
(313, 'Samsung SGH-ZV40', 'at115200'),
(314, 'Samsung SGH-L760', 'at19200'),
(315, 'Samsung Z370', 'at19200'),
(316, 'Samsung C3050', 'blueat'),
(317, 'Samsung SGH-B510', 'blueat'),
(318, 'Samsung SGH-E530', 'blueat'),
(319, 'Samsung SGH-S501i', 'blueat'),
(320, 'Samsung SGH-F700V', 'at'),
(321, 'Samsung SGH-J700', 'at'),
(322, 'Samsung M8800 Pixon', 'at'),
(323, 'Samsung SGH-A737', 'at'),
(324, 'Samsung SGH-E200', 'at'),
(325, 'Samsung SGH-V710', 'at'),
(326, 'Samsung SGH-D840', 'blueat'),
(327, 'Samsung SGH-J750', 'blueat'),
(328, 'Samsung SGH-E720', 'blueat'),
(329, 'Samsung sph a 680', 'at'),
(330, 'Samsung 129', 'at19200'),
(331, 'Samsung SGH-U900', 'at115200'),
(332, 'Samsung SGH-U900', 'at19200'),
(333, 'Samsung SGH-S400i', 'blueat'),
(334, 'Samsung SGH-C506', 'at'),
(335, 'Samsung SGH-D900i', 'at19200'),
(336, 'Samsung sgh-f250l', 'at19200'),
(337, 'Samsung E250V', 'at115200'),
(338, 'Samsung SGH-E900', 'at115200'),
(339, 'Samsung 1410', 'at19200'),
(340, 'Samsung m 310', 'blueat'),
(341, 'Samsung SGH-Z240', 'blueat'),
(342, 'Samsung SGH-J150', 'at115200'),
(343, 'Nokia 3110 classic', 'at115200'),
(344, 'Nokia E51', 'at115200'),
(345, 'Nokia E51', 'at115200'),
(346, 'Nokia N95', 'at115200'),
(347, 'Nokia 6170', 'at19200'),
(348, 'Nokia 6670', 'at19200'),
(349, 'Nokia 7600', 'at19200'),
(350, 'Nokia 6021', 'bluephonet'),
(351, 'Nokia N65', 'bluephonet'),
(352, 'Nokia 5500', 'bluerfat'),
(353, 'Nokia E61', 'dku2at'),
(354, 'Nokia e63', 'dku2at'),
(355, 'Nokia 3210', 'fbus'),
(356, 'Nokia 6021', 'fbus'),
(357, 'Nokia 6101', 'irdaphonet'),
(358, 'Nokia 6820', 'irdaphonet'),
(359, 'Nokia 3410', 'fbuspl2303'),
(360, 'Nokia 5110', 'fbuspl2303'),
(361, 'Nokia 3220', 'fbusirda'),
(362, 'Nokia 5300', 'at115200'),
(363, 'Nokia N70', 'at115200'),
(364, 'Nokia 6080', 'at19200'),
(365, 'Nokia 7500 prism', 'at19200'),
(366, 'Nokia 9210i', 'at19200'),
(367, 'Nokia RM-325', 'bluephonet'),
(368, 'Nokia 6301', 'bluerfat'),
(369, 'Nokia 3100', 'dlr3'),
(370, 'Nokia 3310', 'fbus'),
(371, 'Nokia 5110', 'fbus'),
(372, 'Nokia 5140', 'fbusdlr3'),
(373, 'Nokia 6340i', 'fbuspl2303'),
(374, 'Nokia 6100', 'irdaphonet'),
(375, 'Nokia 6610', 'fbusdlr3'),
(376, 'Nokia 3120', 'fbuspl2303'),
(377, 'Nokia 6020', 'dlr3'),
(378, 'Nokia 2760', 'bluephonet'),
(379, 'Nokia 2323', 'bluephonet'),
(380, 'Nokia 6310i', 'bluerfphonet'),
(381, 'Nokia 6070', 'fbuspl2303'),
(382, 'Nokia 5140i', 'irdaphonet'),
(383, 'Nokia 6020', 'irdaphonet'),
(384, 'Nokia 6310i', 'irdaphonet'),
(385, 'Nokia 6230i', 'bluephonet'),
(386, 'Nokia 6070', 'fbus'),
(387, 'Nokia 6820', 'bluephonet'),
(388, 'Nokia 6030', 'fbuspl2303'),
(389, 'Nokia 3110 classic', 'bluerfphonet'),
(390, 'Nokia 5200', 'bluerfphonet'),
(391, 'Nokia 6101', 'fbus'),
(392, 'Nokia 3109c', 'at115200'),
(393, 'Nokia 6267', 'at115200'),
(394, 'Nokia 6600', 'at115200'),
(395, 'Nokia 6133', 'blueat'),
(396, 'Nokia 5600 Slide', 'bluerfat'),
(397, 'Nokia 6300', 'bluerfphonet'),
(398, 'Nokia 6230i', 'dku2phonet'),
(399, 'Nokia 6610', 'dku2phonet'),
(400, 'Nokia 3310 Classic', 'fbus'),
(401, 'Nokia 5510', 'fbus'),
(402, 'Nokia 6300', 'fbus'),
(403, 'Nokia 6340i', 'at19200'),
(404, 'Nokia 6270', 'bluephonet'),
(405, 'Nokia 3100', 'fbuspl2303'),
(406, 'Nokia 6100', 'fbuspl2303'),
(407, 'Nokia 6230i', 'irdaphonet'),
(408, 'Nokia 6310', 'irdaphonet'),
(409, 'Nokia 3100', 'fbus'),
(410, 'Nokia 3120', 'fbusdku5'),
(411, 'Nokia 3200', 'irdaphonet'),
(412, 'Nokia 7250i', 'fbus'),
(413, 'Nokia 7600', 'bluefbus'),
(414, 'Nokia 2600', 'bluephonet'),
(415, 'Nokia 3500 classic', 'bluephonet'),
(416, 'Nokia 6234', 'bluephonet'),
(417, 'Nokia 6810', 'bluephonet'),
(418, 'Nokia 7120 supernova', 'bluephonet'),
(419, 'Nokia 6210', 'fbusdlr3'),
(420, 'Nokia 6220', 'fbusdlr3'),
(421, 'Nokia 7360', 'fbuspl2303'),
(422, 'Nokia 5140', 'irdaphonet'),
(423, 'Nokia 3109c', 'phonetblue'),
(424, 'Nokia 2630', 'bluephonet'),
(425, 'Nokia 5130 XpressMusic', 'bluephonet'),
(426, 'Nokia 5300', 'bluephonet'),
(427, 'Nokia 5310', 'bluephonet'),
(428, 'Nokia 6131', 'bluephonet'),
(429, 'Nokia 6300', 'bluephonet'),
(430, 'Nokia 5140i', 'fbusdlr3'),
(431, 'Nokia 3200', 'fbuspl2303'),
(432, 'Nokia 6310i', 'bluerfphonet'),
(433, 'Nokia 6210', 'fbus'),
(434, 'Nokia 6300', 'bluephonet'),
(435, 'Nokia 6230', 'irdaphonet'),
(436, 'Nokia 6021', 'bluephonet'),
(437, 'Nokia 6230i', 'bluephonet'),
(438, 'Nokia 6085', 'dku2phonet'),
(439, 'Nokia 3109c', 'irdaphonet'),
(440, 'Nokia 6233', 'bluephonet'),
(441, 'Nokia 8800', 'bluephonet'),
(442, 'Nokia 3510i', 'fbus'),
(443, 'Nokia 6310i', 'fbusdlr3'),
(444, 'Nokia 3100', 'fbuspl2303'),
(445, 'Nokia 6021', 'irdaphonet'),
(446, 'Nokia 6610', 'irdaphonet'),
(447, 'Nokia 7110', 'mbus'),
(448, 'Nokia N95', 'at115200'),
(449, 'Nokia 3110c', 'at19200'),
(450, 'Nokia 3230', 'at19200'),
(451, 'Nokia 6300', 'at19200'),
(452, 'Nokia 3100', 'bluephonet'),
(453, 'Nokia 5130', 'bluephonet'),
(454, 'Nokia 6021', 'bluephonet'),
(455, 'Nokia 6085', 'bluephonet'),
(456, 'Nokia 6131', 'bluephonet'),
(457, 'Nokia 6230', 'bluephonet'),
(458, 'Nokia 6280', 'bluephonet'),
(459, 'Nokia 6500', 'bluephonet'),
(460, 'Nokia 6500 SLIDE', 'bluephonet'),
(461, 'Nokia 6086', 'bluerfphonet'),
(462, 'Nokia 6310i', 'bluerfphonet'),
(463, 'Nokia 2125i', 'dku2phonet'),
(464, 'Nokia 3220i', 'dku2phonet'),
(465, 'Nokia 6230i', 'dku2phonet'),
(466, 'Nokia 6681', 'dku2phonet'),
(467, 'Nokia 3105', 'dku5fbus'),
(468, 'Nokia 3110c', 'fbus'),
(469, 'Nokia 6030', 'fbus'),
(470, 'Nokia 6133', 'fbus'),
(471, 'Nokia 8250', 'fbus'),
(472, 'Nokia 6230i', 'fbusdlr3'),
(473, 'Nokia RM-392', 'fbusdlr3'),
(474, 'Nokia 6070', 'fbuspl2303'),
(475, 'Nokia 6070', 'irdaphonet'),
(476, 'Nokia 6070', 'irdaphonet'),
(477, 'Nokia 8310', 'irdaphonet'),
(478, 'Nokia 6070', 'phonetblue'),
(479, 'Nokia 6310i', 'dku2phonet'),
(480, 'Nokia 6330', 'bluephonet'),
(481, 'Nokia 6610i', 'irdaphonet'),
(482, 'Nokia 6100', 'dlr3'),
(483, 'Nokia 7360', 'irdaphonet'),
(484, 'Nokia 3586i', 'fbuspl2303'),
(485, 'Nokia 3586i', 'dku5fbus'),
(486, 'Nokia 8250', 'irdaphonet'),
(487, 'Nokia 6300', 'at115200'),
(488, 'Nokia N30 M2M', 'at19200'),
(489, 'Nokia 3120', 'blueat'),
(490, 'Nokia 6300', 'blueat'),
(491, 'Nokia 6151', 'bluephonet'),
(492, 'Nokia 6151', 'bluerfphonet'),
(493, 'Nokia 7210s', 'bluerfphonet'),
(494, 'Nokia N73', 'dku2phonet'),
(495, 'Nokia 3410', 'fbus'),
(496, 'Nokia 5190', 'fbus'),
(497, 'Nokia 2630', 'bluephonet'),
(498, 'Nokia 6288', 'fbus'),
(499, 'Nokia 2630', 'bluephonet'),
(500, 'Nokia 6300', 'bluephonet'),
(501, 'Nokia 3500 classic', 'at19200'),
(502, 'Nokia 6170', 'at19200'),
(503, 'MOTOROLA K1', 'at19200'),
(504, 'MOTOROLA L6', 'at19200'),
(505, 'MOTOROLA L7', 'at/blueat'),
(506, 'MOTOROLA L9', 'at'),
(507, 'MOTOROLA MOTORAZR2 V8', 'bluerfat'),
(508, 'MOTOROLA MTK2', 'at'),
(509, 'MOTOROLA PEBL U6', 'at'),
(510, 'MOTOROLA RAZR V3', 'at115200'),
(511, 'MOTOROLA RAZR V3x', 'at19200'),
(512, 'MOTOROLA RAZR V3xxR', 'at115200'),
(513, 'MOTOROLA ROKR E1', 'at115200'),
(514, 'MOTOROLA THIPHONE', 'blueat'),
(515, 'MOTOROLA V1075', 'at19200'),
(516, 'MOTOROLA V188', 'at'),
(517, 'MOTOROLA V190', 'at19200'),
(518, 'MOTOROLA V195', 'at19200'),
(519, 'MOTOROLA V235', 'at115200'),
(520, 'MOTOROLA V3', 'at'),
(521, 'MOTOROLA V360', 'at115200'),
(522, 'MOTOROLA V3I', 'at115200'),
(523, 'MOTOROLA V3R', 'at115200'),
(524, 'MOTOROLA V3RE', 'at'),
(525, 'MOTOROLA W490', 'blueat'),
(526, 'MOTOROLA Z3', 'at19200'),
(527, 'LG KP210', 'at'),
(528, 'LG CU-500', 'at115200'),
(529, 'LG KE820', 'at19200'),
(530, 'LG KE970', 'at19200'),
(531, 'LG KF750', 'at115200'),
(532, 'LG KG300', 'at19200'),
(533, 'LG KP199', 'at'),
(534, 'LG KP320', 'at115200'),
(535, 'LG KT520', 'blueat'),
(536, 'LG KU990', 'at'),
(537, 'LG MG220d', 'at19200'),
(538, 'LG MTK2', 'at19200'),
(539, 'LG TU550', 'at'),
(540, 'LG U8330', 'at115200'),
(541, 'LG U8360', 'irdaphonet');

-- --------------------------------------------------------

--
-- Struktur dari tabel `read_message`
--

CREATE TABLE IF NOT EXISTS `read_message` (
  `id` int(11) NOT NULL,
  `pengirim` varchar(15) NOT NULL,
  `tanggal_terima` varchar(20) NOT NULL,
  `pesan` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `sentitems`
--

CREATE TABLE IF NOT EXISTS `sentitems` (
  `UpdatedInDB` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `InsertIntoDB` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `SendingDateTime` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `DeliveryDateTime` timestamp NULL DEFAULT NULL,
  `Text` text NOT NULL,
  `DestinationNumber` varchar(20) NOT NULL DEFAULT '',
  `Coding` enum('Default_No_Compression','Unicode_No_Compression','8bit','Default_Compression','Unicode_Compression') NOT NULL DEFAULT 'Default_No_Compression',
  `UDH` text NOT NULL,
  `SMSCNumber` varchar(20) NOT NULL DEFAULT '',
  `Class` int(11) NOT NULL DEFAULT '-1',
  `TextDecoded` text NOT NULL,
  `ID` int(10) unsigned NOT NULL DEFAULT '0',
  `SenderID` varchar(255) NOT NULL,
  `SequencePosition` int(11) NOT NULL DEFAULT '1',
  `Status` enum('SendingOK','SendingOKNoReport','SendingError','DeliveryOK','DeliveryFailed','DeliveryPending','DeliveryUnknown','Error') NOT NULL DEFAULT 'SendingOK',
  `StatusError` int(11) NOT NULL DEFAULT '-1',
  `TPMR` int(11) NOT NULL DEFAULT '-1',
  `RelativeValidity` int(11) NOT NULL DEFAULT '-1',
  `CreatorID` text NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_panitia`
--

CREATE TABLE IF NOT EXISTS `tbl_panitia` (
  `id` int(11) NOT NULL,
  `nama` varchar(50) DEFAULT NULL,
  `jabatan` varchar(50) DEFAULT NULL,
  `username` varchar(50) NOT NULL DEFAULT '0',
  `password` varchar(50) DEFAULT NULL,
  `no_hp` char(13) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_panitia`
--

INSERT INTO `tbl_panitia` (`id`, `nama`, `jabatan`, `username`, `password`, `no_hp`) VALUES
(9, 'asdas', 'asdas', 'asdsad', 'sadasd', '324234'),
(10, 'Azmi', 'Panitia Guru', 'azmi', '1234', '12345');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_siswa`
--

CREATE TABLE IF NOT EXISTS `tbl_siswa` (
  `no_daftar` char(50) NOT NULL,
  `nis` char(50) NOT NULL,
  `nisn` char(50) DEFAULT NULL,
  `nama_lengkap` varchar(45) DEFAULT NULL,
  `tempat_lahir` varchar(45) DEFAULT NULL,
  `tgl_lahir` date DEFAULT NULL,
  `jk` enum('L','P') DEFAULT NULL,
  `agama` varchar(45) DEFAULT NULL,
  `khusus` enum('Ya','Tidak') DEFAULT NULL,
  `anak_ke` int(11) DEFAULT NULL,
  `jml_saudara` int(11) DEFAULT NULL,
  `kps` enum('Ya','Tidak') DEFAULT NULL,
  `seri_kps` char(50) DEFAULT NULL,
  `alamat` varchar(45) DEFAULT NULL,
  `desa` varchar(45) DEFAULT NULL,
  `kecamatan` varchar(45) DEFAULT NULL,
  `kabupaten` varchar(45) DEFAULT NULL,
  `provinsi` varchar(45) DEFAULT NULL,
  `alat_transportasi` varchar(45) DEFAULT NULL,
  `tempat_tggl` varchar(45) DEFAULT NULL,
  `jarak_sekolah` varchar(45) DEFAULT NULL,
  `telpon` varchar(15) DEFAULT NULL,
  `email` varchar(45) DEFAULT NULL,
  `asal_sekolah` varchar(100) DEFAULT NULL,
  `alamat_sekolah` varchar(100) DEFAULT NULL,
  `noujian_smp` varchar(20) DEFAULT NULL,
  `nilai_un` varchar(45) DEFAULT NULL,
  `nilai_us` varchar(45) DEFAULT NULL,
  `seri_ijazah` varchar(45) DEFAULT NULL,
  `seri_skhun` varchar(45) DEFAULT NULL,
  `nama_ayah` varchar(45) DEFAULT NULL,
  `thn_ayah` varchar(45) DEFAULT NULL,
  `pekerjaan_ayah` varchar(45) DEFAULT NULL,
  `pendidikan_ayah` varchar(45) DEFAULT NULL,
  `penghasilan` varchar(12) DEFAULT NULL,
  `alamat_ayah` varchar(50) DEFAULT NULL,
  `nama_ibu` varchar(45) DEFAULT NULL,
  `thn_ibu` varchar(45) DEFAULT NULL,
  `pekerjaan_ibu` varchar(45) DEFAULT NULL,
  `pendidikan_ibu` varchar(45) DEFAULT NULL,
  `penghasilan_ibu` varchar(12) DEFAULT NULL,
  `alamat_ibu` varchar(50) DEFAULT NULL,
  `nama_wali` varchar(50) DEFAULT NULL,
  `lahir_wali` varchar(50) DEFAULT NULL,
  `pendidikan_wali` varchar(50) DEFAULT NULL,
  `pekerjaan_wali` varchar(50) DEFAULT NULL,
  `hasil_wali` varchar(50) DEFAULT NULL,
  `alamat_wali` varchar(50) DEFAULT NULL,
  `no_wali` varchar(50) DEFAULT NULL,
  `tinggi_badan` int(11) DEFAULT NULL,
  `berat_badan` int(11) DEFAULT NULL,
  `hobi` varchar(50) DEFAULT NULL,
  `foto` char(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_siswa`
--

INSERT INTO `tbl_siswa` (`no_daftar`, `nis`, `nisn`, `nama_lengkap`, `tempat_lahir`, `tgl_lahir`, `jk`, `agama`, `khusus`, `anak_ke`, `jml_saudara`, `kps`, `seri_kps`, `alamat`, `desa`, `kecamatan`, `kabupaten`, `provinsi`, `alat_transportasi`, `tempat_tggl`, `jarak_sekolah`, `telpon`, `email`, `asal_sekolah`, `alamat_sekolah`, `noujian_smp`, `nilai_un`, `nilai_us`, `seri_ijazah`, `seri_skhun`, `nama_ayah`, `thn_ayah`, `pekerjaan_ayah`, `pendidikan_ayah`, `penghasilan`, `alamat_ayah`, `nama_ibu`, `thn_ibu`, `pekerjaan_ibu`, `pendidikan_ibu`, `penghasilan_ibu`, `alamat_ibu`, `nama_wali`, `lahir_wali`, `pendidikan_wali`, `pekerjaan_wali`, `hasil_wali`, `alamat_wali`, `no_wali`, `tinggi_badan`, `berat_badan`, `hobi`, `foto`) VALUES
('PPDB/PPSZNW/MA.Mn/001', '12121', '1212', 'wqeqwe', 'qweqwe', '2019-01-20', 'L', 'Islam', 'Tidak', 2, 3, 'Tidak', '', 'erewr', '5203010008', '5203010', '5203', '52', 'Becak', 'Rumah', '&lt; Dari 1 KM', '21312312', '', 'wqeqwewq', '', '2343432', '34', '34', '3434', '34343', 'ederew', '232', 'Pilih Pekerjaan..', 'Pilih Pendidikan Ayah', 'Pilih Pengha', 'rwerewrwe', 'rwerwe', '234', 'Pilih Pekerjaan..', 'Pilih Pendidikan Ibu', 'Pilih Pengha', 'qweqw', '', '', 'Pilih Pekerjaan..', 'Pilih Pendidikan Wali', 'Pilih Penghasilan Ayah', '', '', 23, 23, 'rwer', '');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_syarat`
--

CREATE TABLE IF NOT EXISTS `tbl_syarat` (
  `id` int(11) NOT NULL,
  `no_daftar` char(50) DEFAULT NULL,
  `syarat` varchar(100) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_syarat`
--

INSERT INTO `tbl_syarat` (`id`, `no_daftar`, `syarat`) VALUES
(1, 'PPDB/PPSZNW/MA.Mn/001', 'Uang Pendaftaran Rp 50.000'),
(2, 'PPDB/PPSZNW/MA.Mn/001', 'Copy Kartu Keluarga'),
(3, 'PPDB/PPSZNW/MA.Mn/001', 'Copy Akta Lahir'),
(4, 'PPDB/PPSZNW/MA.Mn/001', 'Copy Ijazah'),
(5, 'PPDB/PPSZNW/MA.Mn/001', 'Copy SKHUN'),
(6, 'PPDB/PPSZNW/MA.Mn/001', 'Uang MATSAMA Rp 25.000');

-- --------------------------------------------------------

--
-- Struktur dari tabel `unread_message`
--

CREATE TABLE IF NOT EXISTS `unread_message` (
  `id` int(11) NOT NULL,
  `pengirim` varchar(15) NOT NULL,
  `tanggal_terima` varchar(20) NOT NULL,
  `pesan` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `auto_reply`
--
ALTER TABLE `auto_reply`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `events`
--
ALTER TABLE `events`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `inbox`
--
ALTER TABLE `inbox`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `outbox`
--
ALTER TABLE `outbox`
  ADD PRIMARY KEY (`ID`), ADD KEY `outbox_date` (`SendingDateTime`,`SendingTimeOut`), ADD KEY `outbox_sender` (`SenderID`);

--
-- Indexes for table `outbox_multipart`
--
ALTER TABLE `outbox_multipart`
  ADD PRIMARY KEY (`ID`,`SequencePosition`);

--
-- Indexes for table `pbk`
--
ALTER TABLE `pbk`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `pbk_groups`
--
ALTER TABLE `pbk_groups`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `phones`
--
ALTER TABLE `phones`
  ADD PRIMARY KEY (`IMEI`);

--
-- Indexes for table `phone_db`
--
ALTER TABLE `phone_db`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `read_message`
--
ALTER TABLE `read_message`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sentitems`
--
ALTER TABLE `sentitems`
  ADD PRIMARY KEY (`ID`,`SequencePosition`), ADD KEY `sentitems_date` (`DeliveryDateTime`), ADD KEY `sentitems_tpmr` (`TPMR`), ADD KEY `sentitems_dest` (`DestinationNumber`), ADD KEY `sentitems_sender` (`SenderID`);

--
-- Indexes for table `tbl_panitia`
--
ALTER TABLE `tbl_panitia`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_siswa`
--
ALTER TABLE `tbl_siswa`
  ADD PRIMARY KEY (`no_daftar`);

--
-- Indexes for table `tbl_syarat`
--
ALTER TABLE `tbl_syarat`
  ADD PRIMARY KEY (`id`), ADD KEY `FK_tbl_syarat_tbl_siswa` (`no_daftar`);

--
-- Indexes for table `unread_message`
--
ALTER TABLE `unread_message`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `auto_reply`
--
ALTER TABLE `auto_reply`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `events`
--
ALTER TABLE `events`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `inbox`
--
ALTER TABLE `inbox`
  MODIFY `ID` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=258;
--
-- AUTO_INCREMENT for table `outbox`
--
ALTER TABLE `outbox`
  MODIFY `ID` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3532;
--
-- AUTO_INCREMENT for table `pbk`
--
ALTER TABLE `pbk`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `pbk_groups`
--
ALTER TABLE `pbk_groups`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `phone_db`
--
ALTER TABLE `phone_db`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=542;
--
-- AUTO_INCREMENT for table `read_message`
--
ALTER TABLE `read_message`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tbl_panitia`
--
ALTER TABLE `tbl_panitia`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `tbl_syarat`
--
ALTER TABLE `tbl_syarat`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `unread_message`
--
ALTER TABLE `unread_message`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `tbl_syarat`
--
ALTER TABLE `tbl_syarat`
ADD CONSTRAINT `FK_tbl_syarat_tbl_siswa` FOREIGN KEY (`no_daftar`) REFERENCES `tbl_siswa` (`no_daftar`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
