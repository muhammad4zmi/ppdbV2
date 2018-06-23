

CREATE TABLE `admin` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(50) DEFAULT NULL,
  `password` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

INSERT INTO admin VALUES("1","admin","admin");





CREATE TABLE `auto_reply` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `pesan` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

INSERT INTO auto_reply VALUES("1","Ini Balasan Otomatis dari SMS Gateway (Ahmad Tauhid)");





CREATE TABLE `daemons` (
  `Start` text NOT NULL,
  `Info` text NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;






CREATE TABLE `events` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(500) COLLATE utf8_bin NOT NULL,
  `start` date NOT NULL,
  `end` date DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

INSERT INTO events VALUES("5","Penerimaan Peserta Didik Baru 2017","2017-05-01","2017-07-11");
INSERT INTO events VALUES("6","Semester Genap Mapel 2016/2017","2017-06-05","2017-06-13");
INSERT INTO events VALUES("7","Hari Perdana Masuk & Pengambilan Kartu Test","2017-07-12","2017-07-12");
INSERT INTO events VALUES("9","Masa Ta\'aruf Siswa Madrasah (MATSAMA)","2017-07-15","2017-07-18");
INSERT INTO events VALUES("10","Tes Masuk Siswa Baru","2017-07-13","2017-07-14");
INSERT INTO events VALUES("12","HULTAH NWDI KE-82","2017-07-23","2017-07-23");





CREATE TABLE `gammu` (
  `Version` int(11) NOT NULL DEFAULT '0'
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

INSERT INTO gammu VALUES("13");
INSERT INTO gammu VALUES("13");
INSERT INTO gammu VALUES("13");





CREATE TABLE `inbox` (
  `UpdatedInDB` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `ReceivingDateTime` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `Text` text NOT NULL,
  `SenderNumber` varchar(20) NOT NULL DEFAULT '',
  `Coding` enum('Default_No_Compression','Unicode_No_Compression','8bit','Default_Compression','Unicode_Compression') NOT NULL DEFAULT 'Default_No_Compression',
  `UDH` text NOT NULL,
  `SMSCNumber` varchar(20) NOT NULL DEFAULT '',
  `Class` int(11) NOT NULL DEFAULT '-1',
  `TextDecoded` text NOT NULL,
  `ID` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `RecipientID` text NOT NULL,
  `Processed` enum('false','true') NOT NULL DEFAULT 'false',
  PRIMARY KEY (`ID`)
) ENGINE=MyISAM AUTO_INCREMENT=258 DEFAULT CHARSET=utf8;

INSERT INTO inbox VALUES("2017-07-03 13:34:02","2017-07-03 13:30:50","as","081918405331","Default_No_Compression","","","-1","asdasds","257","","false");





CREATE TABLE `outbox` (
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
  `ID` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `MultiPart` enum('false','true') DEFAULT 'false',
  `RelativeValidity` int(11) DEFAULT '-1',
  `SenderID` varchar(255) DEFAULT NULL,
  `SendingTimeOut` timestamp NULL DEFAULT '0000-00-00 00:00:00',
  `DeliveryReport` enum('default','yes','no') DEFAULT 'default',
  `CreatorID` text NOT NULL,
  PRIMARY KEY (`ID`),
  KEY `outbox_date` (`SendingDateTime`,`SendingTimeOut`),
  KEY `outbox_sender` (`SenderID`)
) ENGINE=MyISAM AUTO_INCREMENT=3509 DEFAULT CHARSET=utf8;

INSERT INTO outbox VALUES("2017-07-04 14:46:37","2017-07-04 14:46:37","2017-07-04 14:46:37","23:59:59","00:00:00","","081918405331","Default_No_Compression","","-1","dgfdgfg","3508","false","-1","","2017-07-04 14:46:37","default","");
INSERT INTO outbox VALUES("2017-07-03 15:07:44","2017-07-03 15:07:44","2017-07-03 15:07:44","23:59:59","00:00:00","","DAVID PERIAWAN","Default_No_Compression","","-1","azmi tes dulu","3506","false","-1","","2017-07-03 15:07:44","default","");
INSERT INTO outbox VALUES("2017-07-03 15:36:27","2017-07-03 15:36:27","2017-07-03 15:36:27","23:59:59","00:00:00","","","Default_No_Compression","","-1","Terima Kasih  Sudah Mendaftar sebagai santri baru MA Muallimin NW Anjani Thn 2017. Untuk Info lebih lanjut hub. Panitia di 081918405331","3507","false","-1","","2017-07-03 15:36:27","default","");
INSERT INTO outbox VALUES("2017-06-11 09:10:21","2017-06-11 09:10:21","2017-06-11 09:10:21","23:59:59","00:00:00","","081918405331","Default_No_Compression","","-1","Terima Kasih Muhammad Azmi Sudah Mendaftar sebagai santri baru MA Muallimin NW Anjani Thn 2017. Untuk Info lebih lanjut hub. Panitia di 081918405331","3500","false","-1","","2017-06-11 09:10:21","default","");
INSERT INTO outbox VALUES("2017-06-11 10:54:18","2017-06-11 10:54:18","2017-06-11 10:54:18","23:59:59","00:00:00","","081918405331","Default_No_Compression","","-1","Terima Kasih Azmi Sudah Mendaftar sebagai santri baru MA Muallimin NW Anjani Thn 2017. Untuk Info lebih lanjut hub. Panitia di 081918405331","3501","false","-1","","2017-06-11 10:54:18","default","");
INSERT INTO outbox VALUES("2017-06-11 12:17:16","2017-06-11 12:17:16","2017-06-11 12:17:16","23:59:59","00:00:00","","","Default_No_Compression","","-1","Terima Kasih  Sudah Mendaftar sebagai santri baru MA Muallimin NW Anjani Thn 2017. Untuk Info lebih lanjut hub. Panitia di 081918405331","3502","false","-1","","2017-06-11 12:17:16","default","");
INSERT INTO outbox VALUES("2017-06-12 04:12:27","2017-06-12 04:12:27","2017-06-12 04:12:27","23:59:59","00:00:00","","081918405331","Default_No_Compression","","-1","Terima Kasih Azmi Sudah Mendaftar sebagai santri baru MA Muallimin NW Anjani Thn 2017. Untuk Info lebih lanjut hub. Panitia di 081918405331","3503","false","-1","","2017-06-12 04:12:27","default","");
INSERT INTO outbox VALUES("2017-06-11 05:43:12","2017-06-11 05:43:12","2017-06-11 05:43:12","23:59:59","00:00:00","","081918405331","Default_No_Compression","","-1","Terima Kasih Muhammad Azmi Sudah Mendaftar sebagai santri baru MA Muallimin NW Anjani Thn 2017. Untuk Info lebih lanjut hub. Panitia di 081918405331","3499","false","-1","","2017-06-11 05:43:12","default","");
INSERT INTO outbox VALUES("2017-06-11 04:18:03","2017-06-11 04:18:03","2017-06-11 04:18:03","23:59:59","00:00:00","","","Default_No_Compression","","-1","Terima Kasih  Sudah Mendaftar sebagai santri baru MA Muallimin NW Anjani Thn 2017. Untuk Info lebih lanjut hub. Panitia di 081918405331","3496","false","-1","","2017-06-11 04:18:03","default","");
INSERT INTO outbox VALUES("2017-06-11 04:29:07","2017-06-11 04:29:07","2017-06-11 04:29:07","23:59:59","00:00:00","","081918405331","Default_No_Compression","","-1","Terima Kasih Muhammad Azmi Sudah Mendaftar sebagai santri baru MA Muallimin NW Anjani Thn 2017. Untuk Info lebih lanjut hub. Panitia di 081918405331","3497","false","-1","","2017-06-11 04:29:07","default","");
INSERT INTO outbox VALUES("2017-06-11 05:19:25","2017-06-11 05:19:25","2017-06-11 05:19:25","23:59:59","00:00:00","","081918405331","Default_No_Compression","","-1","Terima Kasih Siti Hijratul Sudah Mendaftar sebagai santri baru MA Muallimin NW Anjani Thn 2017. Untuk Info lebih lanjut hub. Panitia di 081918405331","3498","false","-1","","2017-06-11 05:19:25","default","");
INSERT INTO outbox VALUES("2017-06-10 13:00:53","2017-06-10 13:00:53","2017-06-10 13:00:53","23:59:59","00:00:00","","085339464126","Default_No_Compression","050003A70401","-1","Assalamu`laikum wr. wb . di informasikan kepada seluruh calon santri MA Mu`allimin NW Anjani, bahwa seragam sekolah disiapkan sendiri oleh calon santri b","3488","true","-1","","2017-06-10 13:00:53","default","Gammu");
INSERT INTO outbox VALUES("2017-06-10 13:00:53","2017-06-10 13:00:53","2017-06-10 13:00:53","23:59:59","00:00:00","","085238281867","Default_No_Compression","050003A70401","-1","Assalamu`laikum wr. wb . di informasikan kepada seluruh calon santri MA Mu`allimin NW Anjani, bahwa seragam sekolah disiapkan sendiri oleh calon santri b","3487","true","-1","","2017-06-10 13:00:53","default","Gammu");
INSERT INTO outbox VALUES("2017-06-10 13:00:53","2017-06-10 13:00:53","2017-06-10 13:00:53","23:59:59","00:00:00","","081977754938","Default_No_Compression","050003A70401","-1","Assalamu`laikum wr. wb . di informasikan kepada seluruh calon santri MA Mu`allimin NW Anjani, bahwa seragam sekolah disiapkan sendiri oleh calon santri b","3486","true","-1","","2017-06-10 13:00:53","default","Gammu");
INSERT INTO outbox VALUES("2017-06-10 13:00:53","2017-06-10 13:00:53","2017-06-10 13:00:53","23:59:59","00:00:00","","082340494769","Default_No_Compression","050003A70401","-1","Assalamu`laikum wr. wb . di informasikan kepada seluruh calon santri MA Mu`allimin NW Anjani, bahwa seragam sekolah disiapkan sendiri oleh calon santri b","3485","true","-1","","2017-06-10 13:00:53","default","Gammu");
INSERT INTO outbox VALUES("2017-06-10 13:00:53","2017-06-10 13:00:53","2017-06-10 13:00:53","23:59:59","00:00:00","","085337477957","Default_No_Compression","050003A70401","-1","Assalamu`laikum wr. wb . di informasikan kepada seluruh calon santri MA Mu`allimin NW Anjani, bahwa seragam sekolah disiapkan sendiri oleh calon santri b","3484","true","-1","","2017-06-10 13:00:53","default","Gammu");
INSERT INTO outbox VALUES("2017-06-10 13:00:53","2017-06-10 13:00:53","2017-06-10 13:00:53","23:59:59","00:00:00","","087763234179","Default_No_Compression","050003A70401","-1","Assalamu`laikum wr. wb . di informasikan kepada seluruh calon santri MA Mu`allimin NW Anjani, bahwa seragam sekolah disiapkan sendiri oleh calon santri b","3483","true","-1","","2017-06-10 13:00:53","default","Gammu");
INSERT INTO outbox VALUES("2017-06-10 13:00:53","2017-06-10 13:00:53","2017-06-10 13:00:53","23:59:59","00:00:00","","085237189949","Default_No_Compression","050003A70401","-1","Assalamu`laikum wr. wb . di informasikan kepada seluruh calon santri MA Mu`allimin NW Anjani, bahwa seragam sekolah disiapkan sendiri oleh calon santri b","3482","true","-1","","2017-06-10 13:00:53","default","Gammu");
INSERT INTO outbox VALUES("2017-06-10 13:00:53","2017-06-10 13:00:53","2017-06-10 13:00:53","23:59:59","00:00:00","","087763173497","Default_No_Compression","050003A70401","-1","Assalamu`laikum wr. wb . di informasikan kepada seluruh calon santri MA Mu`allimin NW Anjani, bahwa seragam sekolah disiapkan sendiri oleh calon santri b","3481","true","-1","","2017-06-10 13:00:53","default","Gammu");
INSERT INTO outbox VALUES("2017-06-10 13:00:53","2017-06-10 13:00:53","2017-06-10 13:00:53","23:59:59","00:00:00","","081918341246","Default_No_Compression","050003A70401","-1","Assalamu`laikum wr. wb . di informasikan kepada seluruh calon santri MA Mu`allimin NW Anjani, bahwa seragam sekolah disiapkan sendiri oleh calon santri b","3480","true","-1","","2017-06-10 13:00:53","default","Gammu");
INSERT INTO outbox VALUES("2017-06-10 13:00:53","2017-06-10 13:00:53","2017-06-10 13:00:53","23:59:59","00:00:00","","081918210832","Default_No_Compression","050003A70401","-1","Assalamu`laikum wr. wb . di informasikan kepada seluruh calon santri MA Mu`allimin NW Anjani, bahwa seragam sekolah disiapkan sendiri oleh calon santri b","3479","true","-1","","2017-06-10 13:00:53","default","Gammu");
INSERT INTO outbox VALUES("2017-06-10 13:00:53","2017-06-10 13:00:53","2017-06-10 13:00:53","23:59:59","00:00:00","","085338035066","Default_No_Compression","050003A70401","-1","Assalamu`laikum wr. wb . di informasikan kepada seluruh calon santri MA Mu`allimin NW Anjani, bahwa seragam sekolah disiapkan sendiri oleh calon santri b","3478","true","-1","","2017-06-10 13:00:53","default","Gammu");
INSERT INTO outbox VALUES("2017-06-10 13:00:53","2017-06-10 13:00:53","2017-06-10 13:00:53","23:59:59","00:00:00","","081803709489","Default_No_Compression","050003A70401","-1","Assalamu`laikum wr. wb . di informasikan kepada seluruh calon santri MA Mu`allimin NW Anjani, bahwa seragam sekolah disiapkan sendiri oleh calon santri b","3477","true","-1","","2017-06-10 13:00:53","default","Gammu");
INSERT INTO outbox VALUES("2017-06-10 13:00:53","2017-06-10 13:00:53","2017-06-10 13:00:53","23:59:59","00:00:00","","081805298575","Default_No_Compression","050003A70401","-1","Assalamu`laikum wr. wb . di informasikan kepada seluruh calon santri MA Mu`allimin NW Anjani, bahwa seragam sekolah disiapkan sendiri oleh calon santri b","3476","true","-1","","2017-06-10 13:00:53","default","Gammu");
INSERT INTO outbox VALUES("2017-06-10 13:00:53","2017-06-10 13:00:53","2017-06-10 13:00:53","23:59:59","00:00:00","","087865187465","Default_No_Compression","050003A70401","-1","Assalamu`laikum wr. wb . di informasikan kepada seluruh calon santri MA Mu`allimin NW Anjani, bahwa seragam sekolah disiapkan sendiri oleh calon santri b","3475","true","-1","","2017-06-10 13:00:53","default","Gammu");
INSERT INTO outbox VALUES("2017-06-10 13:00:53","2017-06-10 13:00:53","2017-06-10 13:00:53","23:59:59","00:00:00","","085338657547","Default_No_Compression","050003A70401","-1","Assalamu`laikum wr. wb . di informasikan kepada seluruh calon santri MA Mu`allimin NW Anjani, bahwa seragam sekolah disiapkan sendiri oleh calon santri b","3474","true","-1","","2017-06-10 13:00:53","default","Gammu");
INSERT INTO outbox VALUES("2017-06-10 13:00:53","2017-06-10 13:00:53","2017-06-10 13:00:53","23:59:59","00:00:00","","085205159904","Default_No_Compression","050003A70401","-1","Assalamu`laikum wr. wb . di informasikan kepada seluruh calon santri MA Mu`allimin NW Anjani, bahwa seragam sekolah disiapkan sendiri oleh calon santri b","3473","true","-1","","2017-06-10 13:00:53","default","Gammu");





CREATE TABLE `outbox_multipart` (
  `Text` text,
  `Coding` enum('Default_No_Compression','Unicode_No_Compression','8bit','Default_Compression','Unicode_Compression') NOT NULL DEFAULT 'Default_No_Compression',
  `UDH` text,
  `Class` int(11) DEFAULT '-1',
  `TextDecoded` text,
  `ID` int(10) unsigned NOT NULL DEFAULT '0',
  `SequencePosition` int(11) NOT NULL DEFAULT '1',
  PRIMARY KEY (`ID`,`SequencePosition`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

INSERT INTO outbox_multipart VALUES("","Default_No_Compression","050003A70404","-1","asih","0","4");
INSERT INTO outbox_multipart VALUES("","Default_No_Compression","050003A70403","-1","lum berupa,foto copy KK, foto copy Akta lahir,foto copy SKHU, dan ijazah. untuk informasi lebih lanjut bisa menghubungi panitia di 081918405331. terima k","0","3");
INSERT INTO outbox_multipart VALUES("","Default_No_Compression","050003A70402","-1","erupa seragam putih-putih, putih-abu, pramuka dan sepatu hitam. diharapkan juga kepada calon santri baru untuk melengkapi syarat pendaftaran bagi yang be","0","2");





CREATE TABLE `pbk` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `GroupID` int(11) NOT NULL DEFAULT '-1',
  `Name` text NOT NULL,
  `Number` text NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;






CREATE TABLE `pbk_groups` (
  `Name` text NOT NULL,
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`ID`)
) ENGINE=MyISAM AUTO_INCREMENT=10 DEFAULT CHARSET=utf8;






CREATE TABLE `phone_db` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `Name` varchar(60) NOT NULL,
  `Connection` varchar(30) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=542 DEFAULT CHARSET=latin1;

INSERT INTO phone_db VALUES("1","Huawei D1200P","at115200");
INSERT INTO phone_db VALUES("2","Huawei E122","at");
INSERT INTO phone_db VALUES("3","Huawei E153","at115200");
INSERT INTO phone_db VALUES("4","Huawei E1550","at");
INSERT INTO phone_db VALUES("5","Huawei E1552","at");
INSERT INTO phone_db VALUES("6","Huawei E156G","at");
INSERT INTO phone_db VALUES("7","Huawei E160","at");
INSERT INTO phone_db VALUES("8","Huawei E160E","at19200");
INSERT INTO phone_db VALUES("9","Huawei E160G","at115200");
INSERT INTO phone_db VALUES("10","Huawei E160X","at");
INSERT INTO phone_db VALUES("11","Huawei E161","at");
INSERT INTO phone_db VALUES("12","Huawei E1612 (movistar)","at19200");
INSERT INTO phone_db VALUES("13","Huawei E169","at19200");
INSERT INTO phone_db VALUES("14","Huawei E1692","at");
INSERT INTO phone_db VALUES("15","Huawei E169G","at115200");
INSERT INTO phone_db VALUES("16","Huawei E170","at115200");
INSERT INTO phone_db VALUES("17","Huawei E172","at");
INSERT INTO phone_db VALUES("18","Huawei E173","at115200");
INSERT INTO phone_db VALUES("19","Huawei E1731","at19200");
INSERT INTO phone_db VALUES("20","Huawei E1732","at115200");
INSERT INTO phone_db VALUES("21","Huawei E1750","at");
INSERT INTO phone_db VALUES("22","Huawei E1750C","at19200");
INSERT INTO phone_db VALUES("23","Huawei E1752","at");
INSERT INTO phone_db VALUES("24","Huawei E1756EC","at");
INSERT INTO phone_db VALUES("25","Huawei E1762","at");
INSERT INTO phone_db VALUES("26","Huawei E176G","at115200");
INSERT INTO phone_db VALUES("27","Huawei E180","at115200");
INSERT INTO phone_db VALUES("28","Huawei E1820","at19200");
INSERT INTO phone_db VALUES("29","Huawei E220","at19200");
INSERT INTO phone_db VALUES("30","Huawei E226","at19200");
INSERT INTO phone_db VALUES("31","Huawei E230","at115200");
INSERT INTO phone_db VALUES("32","Huawei E272 (Vodafone)","at");
INSERT INTO phone_db VALUES("33","Huawei E620","at115200");
INSERT INTO phone_db VALUES("34","Huawei E630+","at19200");
INSERT INTO phone_db VALUES("35","Huawei E660A","at19200");
INSERT INTO phone_db VALUES("36","Huawei E870","at");
INSERT INTO phone_db VALUES("37","Huawei EC121","at115200");
INSERT INTO phone_db VALUES("38","Huawei EG162G","at115200");
INSERT INTO phone_db VALUES("39","Huawei EM770","at");
INSERT INTO phone_db VALUES("40","Huawei ets2558","Not supported");
INSERT INTO phone_db VALUES("41","Huawei haier c700","at115200");
INSERT INTO phone_db VALUES("42","Huawei EG162","at115200");
INSERT INTO phone_db VALUES("43","Huawei k3520","at");
INSERT INTO phone_db VALUES("44","Huawei K3565","at19200");
INSERT INTO phone_db VALUES("45","Huawei K3765","at");
INSERT INTO phone_db VALUES("46","Huawei K4505","at115200");
INSERT INTO phone_db VALUES("47","Huawei MF627","at19200");
INSERT INTO phone_db VALUES("48","Huawei Micromax MMX310G","at");
INSERT INTO phone_db VALUES("49","Huawei momo design 302","at");
INSERT INTO phone_db VALUES("50","Huawei MTK2","at115200");
INSERT INTO phone_db VALUES("51","Huawei SU 9000","at115200");
INSERT INTO phone_db VALUES("52","Huawei u1211","at");
INSERT INTO phone_db VALUES("53","Huawei u1215","fbusdlr3");
INSERT INTO phone_db VALUES("54","Huawei U1250","blueat");
INSERT INTO phone_db VALUES("55","Huawei u1280","at");
INSERT INTO phone_db VALUES("56","Huawei U3200","blueat");
INSERT INTO phone_db VALUES("57","Huawei U526","at");
INSERT INTO phone_db VALUES("58","Huawei U7510","at115200");
INSERT INTO phone_db VALUES("59","Huawei U8100","at115200");
INSERT INTO phone_db VALUES("60","Huawei UMG181","at115200");
INSERT INTO phone_db VALUES("61","Huawei vadafone","fbus");
INSERT INTO phone_db VALUES("62","Vodafone 810","blueobex");
INSERT INTO phone_db VALUES("63","Vodafone K3565","at");
INSERT INTO phone_db VALUES("64","Vodafone K3565-Z","at");
INSERT INTO phone_db VALUES("65","Vodafone S65v","blueobex");
INSERT INTO phone_db VALUES("66","Vodafone VF541","at115200");
INSERT INTO phone_db VALUES("67","Vodafone VF543","blueat");
INSERT INTO phone_db VALUES("68","Wavecom fastrack extend","at115200");
INSERT INTO phone_db VALUES("69","Wavecom Fastrack M1206B","at115200");
INSERT INTO phone_db VALUES("70","Wavecom Fasttrack supreme WM20392","at");
INSERT INTO phone_db VALUES("71","Wavecom iTegno","fbusirda");
INSERT INTO phone_db VALUES("72","Wavecom M1306B","at115200");
INSERT INTO phone_db VALUES("73","Wavecom MultiModem MTCBA-G-U-F4","at115200");
INSERT INTO phone_db VALUES("74","Wavecom Wavecom Fastrack Go","at115200");
INSERT INTO phone_db VALUES("75","Wavecom WMOD2","at19200");
INSERT INTO phone_db VALUES("76","ZTE Ace Caracas Dos","at115200");
INSERT INTO phone_db VALUES("77","ZTE c261","at19200");
INSERT INTO phone_db VALUES("78","ZTE F107","at");
INSERT INTO phone_db VALUES("79","ZTE F156","at");
INSERT INTO phone_db VALUES("80","ZTE F188","at19200");
INSERT INTO phone_db VALUES("81","ZTE G N281","blueat");
INSERT INTO phone_db VALUES("82","ZTE G X760","at115200");
INSERT INTO phone_db VALUES("83","ZTE Globe","at115200");
INSERT INTO phone_db VALUES("84","ZTE K3565-Z","at");
INSERT INTO phone_db VALUES("85","ZTE K3565-Z","at");
INSERT INTO phone_db VALUES("86","ZTE K3570-Z","fbusdlr3");
INSERT INTO phone_db VALUES("87","ZTE K3765-Z","at");
INSERT INTO phone_db VALUES("88","ZTE MD2","at19200");
INSERT INTO phone_db VALUES("89","ZTE MF-627","at19200");
INSERT INTO phone_db VALUES("90","ZTE MF-628","at19200");
INSERT INTO phone_db VALUES("91","ZTE MF100","at115200");
INSERT INTO phone_db VALUES("92","ZTE MF110","at115200");
INSERT INTO phone_db VALUES("93","ZTE MF112","at115200");
INSERT INTO phone_db VALUES("94","ZTE MF180","at115200");
INSERT INTO phone_db VALUES("95","ZTE MF190","at");
INSERT INTO phone_db VALUES("96","ZTE MF622","at");
INSERT INTO phone_db VALUES("97","ZTE MF626","at19200");
INSERT INTO phone_db VALUES("98","ZTE MF636","at115200");
INSERT INTO phone_db VALUES("99","Huawei E173","at115200");
INSERT INTO phone_db VALUES("100","Huawei E173","at115200");
INSERT INTO phone_db VALUES("101","Huawei E353","at");
INSERT INTO phone_db VALUES("102","Sony Ericsson G502","at19200");
INSERT INTO phone_db VALUES("103","Sony Ericsson W300i/W300c","at19200");
INSERT INTO phone_db VALUES("104","Sony Ericsson T650i","blueat");
INSERT INTO phone_db VALUES("105","Sony Ericsson Z530i/Z530c","bluerfat");
INSERT INTO phone_db VALUES("106","Sony Ericsson Z800","at115200");
INSERT INTO phone_db VALUES("107","Sony Ericsson w902","bluerfat");
INSERT INTO phone_db VALUES("108","Sony Ericsson W550i","blueat");
INSERT INTO phone_db VALUES("109","Sony Ericsson M600i","at");
INSERT INTO phone_db VALUES("110","Sony Ericsson K790a","at115200");
INSERT INTO phone_db VALUES("111","Sony Ericsson R320s","at115200");
INSERT INTO phone_db VALUES("112","Sony Ericsson Z600","at115200");
INSERT INTO phone_db VALUES("113","Sony Ericsson S700i","blueat");
INSERT INTO phone_db VALUES("114","Sony Ericsson W302","blueat");
INSERT INTO phone_db VALUES("115","Sony Ericsson W890i","blueat");
INSERT INTO phone_db VALUES("116","Sony Ericsson W910i","blueat");
INSERT INTO phone_db VALUES("117","Sony Ericsson C905","at115200");
INSERT INTO phone_db VALUES("118","Sony Ericsson T610","at115200");
INSERT INTO phone_db VALUES("119","Sony Ericsson T68i","at115200");
INSERT INTO phone_db VALUES("120","Sony Ericsson f305","at");
INSERT INTO phone_db VALUES("121","Sony Ericsson Sony W960i","blueat");
INSERT INTO phone_db VALUES("122","Sony Ericsson C510","at");
INSERT INTO phone_db VALUES("123","Sony Ericsson Z710","at19200");
INSERT INTO phone_db VALUES("124","Sony Ericsson W810i/W810c","blueat");
INSERT INTO phone_db VALUES("125","Sony Ericsson J300i","at115200");
INSERT INTO phone_db VALUES("126","Sony Ericsson C702","at19200");
INSERT INTO phone_db VALUES("127","Sony Ericsson C702","at19200");
INSERT INTO phone_db VALUES("128","Sony Ericsson K800i","at19200");
INSERT INTO phone_db VALUES("129","Sony Ericsson W850i","at19200");
INSERT INTO phone_db VALUES("130","Sony Ericsson K530i","blueat");
INSERT INTO phone_db VALUES("131","Sony Ericsson TM506","blueat");
INSERT INTO phone_db VALUES("132","Sony Ericsson TM506","blueat");
INSERT INTO phone_db VALUES("133","Sony Ericsson V600i","blueat");
INSERT INTO phone_db VALUES("134","Sony Ericsson K550i/K550c","at");
INSERT INTO phone_db VALUES("135","Sony Ericsson k508i","at19200");
INSERT INTO phone_db VALUES("136","Sony Ericsson T230","at");
INSERT INTO phone_db VALUES("137","Sony Ericsson t290a","at");
INSERT INTO phone_db VALUES("138","Sony Ericsson W302","at");
INSERT INTO phone_db VALUES("139","Sony Ericsson K500i","at115200");
INSERT INTO phone_db VALUES("140","Sony Ericsson W950i","at115200");
INSERT INTO phone_db VALUES("141","Sony Ericsson P800","at115200");
INSERT INTO phone_db VALUES("142","Sony Ericsson K608i","at19200");
INSERT INTO phone_db VALUES("143","Sony Ericsson V640i","blueat");
INSERT INTO phone_db VALUES("144","Sony Ericsson R520","at115200");
INSERT INTO phone_db VALUES("145","Sony Ericsson V60i","at115200");
INSERT INTO phone_db VALUES("146","Sony Ericsson K660i","at115200");
INSERT INTO phone_db VALUES("147","Sony Ericsson K320i","blueat");
INSERT INTO phone_db VALUES("148","Sony Ericsson Z710i/Z710c","at");
INSERT INTO phone_db VALUES("149","Sony Ericsson W660i","at");
INSERT INTO phone_db VALUES("150","Sony Ericsson W350i","at115200");
INSERT INTO phone_db VALUES("151","Sony Ericsson w380a","at115200");
INSERT INTO phone_db VALUES("152","Sony Ericsson Z550i","at115200");
INSERT INTO phone_db VALUES("153","Sony Ericsson Z750A","at115200");
INSERT INTO phone_db VALUES("154","Sony Ericsson K320i","at19200");
INSERT INTO phone_db VALUES("155","Sony Ericsson K700i","at19200");
INSERT INTO phone_db VALUES("156","Sony Ericsson K800i","at19200");
INSERT INTO phone_db VALUES("157","Sony Ericsson W300i/W300c","at19200");
INSERT INTO phone_db VALUES("158","Sony Ericsson W610i/W610c","at19200");
INSERT INTO phone_db VALUES("159","Sony Ericsson K550i","blueat");
INSERT INTO phone_db VALUES("160","Sony Ericsson K550im","blueat");
INSERT INTO phone_db VALUES("161","Sony Ericsson K608i","blueat");
INSERT INTO phone_db VALUES("162","Sony Ericsson K618i/V630i","blueat");
INSERT INTO phone_db VALUES("163","Sony Ericsson T630","blueat");
INSERT INTO phone_db VALUES("164","Sony Ericsson T700","blueat");
INSERT INTO phone_db VALUES("165","Sony Ericsson w380a","blueat");
INSERT INTO phone_db VALUES("166","Sony Ericsson W710i","blueat");
INSERT INTO phone_db VALUES("167","Sony Ericsson W850i","blueat");
INSERT INTO phone_db VALUES("168","Sony Ericsson Z310i/Z310c","blueat");
INSERT INTO phone_db VALUES("169","Sony Ericsson V800/V802SE/Z800i","at");
INSERT INTO phone_db VALUES("170","Sony Ericsson W550i/W550c","at");
INSERT INTO phone_db VALUES("171","Sony Ericsson K700c","at115200");
INSERT INTO phone_db VALUES("172","Sony Ericsson W200i/W200c","at115200");
INSERT INTO phone_db VALUES("173","Sony Ericsson w580i","at115200");
INSERT INTO phone_db VALUES("174","Sony Ericsson W700i/W700c","at115200");
INSERT INTO phone_db VALUES("175","Sony Ericsson W810i/W810c","at115200");
INSERT INTO phone_db VALUES("176","Sony Ericsson Z1010","at19200");
INSERT INTO phone_db VALUES("177","Sony Ericsson K610i","blueat");
INSERT INTO phone_db VALUES("178","Sony Ericsson W300i","blueat");
INSERT INTO phone_db VALUES("179","Sony Ericsson W810i/W810c","blueat");
INSERT INTO phone_db VALUES("180","Sony Ericsson W890i","blueat");
INSERT INTO phone_db VALUES("181","Sony Ericsson Z1010","blueat");
INSERT INTO phone_db VALUES("182","Sony Ericsson Z520i/Z520c","blueat");
INSERT INTO phone_db VALUES("183","Sony Ericsson Z770i","blueat");
INSERT INTO phone_db VALUES("184","Sony Ericsson K300i","at19200");
INSERT INTO phone_db VALUES("185","Sony Ericsson P800","blueat");
INSERT INTO phone_db VALUES("186","Sony Ericsson K810i","at");
INSERT INTO phone_db VALUES("187","Sony Ericsson C905","blueat");
INSERT INTO phone_db VALUES("188","Sony Ericsson S500i/S500c","blueat");
INSERT INTO phone_db VALUES("189","Sony Ericsson K530i","at115200");
INSERT INTO phone_db VALUES("190","Sony Ericsson W595s","at115200");
INSERT INTO phone_db VALUES("191","Sony Ericsson K610i","at19200");
INSERT INTO phone_db VALUES("192","Sony Ericsson K618i/V630i","at19200");
INSERT INTO phone_db VALUES("193","Sony Ericsson S500i/S500c","at19200");
INSERT INTO phone_db VALUES("194","Sony Ericsson W910i","at19200");
INSERT INTO phone_db VALUES("195","Sony Ericsson Z610i","at19200");
INSERT INTO phone_db VALUES("196","Sony Ericsson K750i","blueat");
INSERT INTO phone_db VALUES("197","Sony Ericsson k770i","blueat");
INSERT INTO phone_db VALUES("198","Sony Ericsson W830i/W830c","blueat");
INSERT INTO phone_db VALUES("199","Sony Ericsson K310i/K310c","at");
INSERT INTO phone_db VALUES("200","Sony Ericsson K510i","at");
INSERT INTO phone_db VALUES("201","Sony Ericsson K550i/K550c","at");
INSERT INTO phone_db VALUES("202","Sony Ericsson K790i/K790c","at115200");
INSERT INTO phone_db VALUES("203","Sony Ericsson W880i","at115200");
INSERT INTO phone_db VALUES("204","Sony Ericsson Z558i","at115200");
INSERT INTO phone_db VALUES("205","Sony Ericsson K600i","at19200");
INSERT INTO phone_db VALUES("206","Sony Ericsson K750i","at19200");
INSERT INTO phone_db VALUES("207","Sony Ericsson K810i","at19200");
INSERT INTO phone_db VALUES("208","Sony Ericsson W760i","at19200");
INSERT INTO phone_db VALUES("209","Sony Ericsson W800i/W800c","at19200");
INSERT INTO phone_db VALUES("210","Sony Ericsson Z530i/Z530c","at19200");
INSERT INTO phone_db VALUES("211","Sony Ericsson K700i","blueat");
INSERT INTO phone_db VALUES("212","Sony Ericsson K790i/K790c","blueat");
INSERT INTO phone_db VALUES("213","Sony Ericsson K800i","blueat");
INSERT INTO phone_db VALUES("214","Sony Ericsson K810i","blueat");
INSERT INTO phone_db VALUES("215","Sony Ericsson W610i/W610c","blueat");
INSERT INTO phone_db VALUES("216","Sony Ericsson W660i","blueat");
INSERT INTO phone_db VALUES("217","Sony Ericsson W800i/W800c","blueat");
INSERT INTO phone_db VALUES("218","Sony Ericsson W880i","blueat");
INSERT INTO phone_db VALUES("219","Sony Ericsson W910i","blueat");
INSERT INTO phone_db VALUES("220","Sony Ericsson K600i","bluerfat");
INSERT INTO phone_db VALUES("221","Sony Ericsson K770i","at");
INSERT INTO phone_db VALUES("222","Sony Ericsson T700","at115200");
INSERT INTO phone_db VALUES("223","Sony Ericsson K530i","at19200");
INSERT INTO phone_db VALUES("224","Sony Ericsson W850i","at19200");
INSERT INTO phone_db VALUES("225","Sony Ericsson W850i","at19200");
INSERT INTO phone_db VALUES("226","Sony Ericsson AAD-3052051-BV","blueat");
INSERT INTO phone_db VALUES("227","Sony Ericsson K790i/K790c","blueat");
INSERT INTO phone_db VALUES("228","Sony Ericsson Z520a","at");
INSERT INTO phone_db VALUES("229","Sony Ericsson W580i/W580c","blueat");
INSERT INTO phone_db VALUES("230","Sony Ericsson K630i","at115200");
INSERT INTO phone_db VALUES("231","Sony Ericsson W200i/W200c","at115200");
INSERT INTO phone_db VALUES("232","Sony Ericsson AAD-3252041-BV (W760i)","bluerfat");
INSERT INTO phone_db VALUES("233","Sony Ericsson T630","at115200");
INSERT INTO phone_db VALUES("234","Sony Ericsson D750i","at19200");
INSERT INTO phone_db VALUES("235","Sony Ericsson K850i","at");
INSERT INTO phone_db VALUES("236","Sony Ericsson W900i","at19200");
INSERT INTO phone_db VALUES("237","Sony Ericsson K850i","blueat");
INSERT INTO phone_db VALUES("238","Sony Ericsson W890i","blueat");
INSERT INTO phone_db VALUES("239","Sony Ericsson K510i","blueat");
INSERT INTO phone_db VALUES("240","Sony Ericsson C902","at115200");
INSERT INTO phone_db VALUES("241","Sony Ericsson T610","blueat");
INSERT INTO phone_db VALUES("242","Sony Ericsson C902","at115200");
INSERT INTO phone_db VALUES("243","Sony Ericsson FWT G3x Series","at115200");
INSERT INTO phone_db VALUES("244","Sony Ericsson K750","fbus");
INSERT INTO phone_db VALUES("245","Sony Ericsson c702 AAD-3052081-BV","at");
INSERT INTO phone_db VALUES("246","Sony Ericsson W350i/W350c","blueat");
INSERT INTO phone_db VALUES("247","Sony Ericsson K550im","at19200");
INSERT INTO phone_db VALUES("248","Siemens A56","at19200");
INSERT INTO phone_db VALUES("249","Siemens A60","at19200");
INSERT INTO phone_db VALUES("250","Siemens C61","at19200");
INSERT INTO phone_db VALUES("251","Siemens S45","at19200");
INSERT INTO phone_db VALUES("252","Siemens SP65","at19200");
INSERT INTO phone_db VALUES("253","Siemens CX75","blueat");
INSERT INTO phone_db VALUES("254","Siemens AX75","at115200");
INSERT INTO phone_db VALUES("255","Siemens C6V","at19200");
INSERT INTO phone_db VALUES("256","Siemens S75","blueat");
INSERT INTO phone_db VALUES("257","Siemens C75","at115200");
INSERT INTO phone_db VALUES("258","Siemens C75","at");
INSERT INTO phone_db VALUES("259","Siemens CX65","at115200");
INSERT INTO phone_db VALUES("260","Siemens MC35i","at19200");
INSERT INTO phone_db VALUES("261","Siemens ME45","at19200");
INSERT INTO phone_db VALUES("262","Siemens S11","at19200");
INSERT INTO phone_db VALUES("263","Siemens C65","irdaat");
INSERT INTO phone_db VALUES("264","Siemens ME75","at115200");
INSERT INTO phone_db VALUES("265","Siemens S75","at115200");
INSERT INTO phone_db VALUES("266","Siemens CF62","at19200");
INSERT INTO phone_db VALUES("267","Siemens MC60","at19200");
INSERT INTO phone_db VALUES("268","Siemens S68","blueat");
INSERT INTO phone_db VALUES("269","Siemens C65","at19200");
INSERT INTO phone_db VALUES("270","Siemens SK6R","at");
INSERT INTO phone_db VALUES("271","Siemens A62","at115200");
INSERT INTO phone_db VALUES("272","Siemens A65","at19200");
INSERT INTO phone_db VALUES("273","Siemens C35i","at19200");
INSERT INTO phone_db VALUES("274","Siemens ES75","at19200");
INSERT INTO phone_db VALUES("275","Siemens MC 60","at19200");
INSERT INTO phone_db VALUES("276","Siemens MC75","at19200");
INSERT INTO phone_db VALUES("277","Siemens S65","at19200");
INSERT INTO phone_db VALUES("278","Siemens SL45i","at19200");
INSERT INTO phone_db VALUES("279","Siemens C45","at19200");
INSERT INTO phone_db VALUES("280","Siemens C60","at19200");
INSERT INTO phone_db VALUES("281","Siemens S55","at115200");
INSERT INTO phone_db VALUES("282","Siemens M55","at19200");
INSERT INTO phone_db VALUES("283","Siemens S25","at115200");
INSERT INTO phone_db VALUES("284","Siemens M35i","at19200");
INSERT INTO phone_db VALUES("285","Siemens MT50","at19200");
INSERT INTO phone_db VALUES("286","Siemens M65","at115200");
INSERT INTO phone_db VALUES("287","Siemens C55","at19200");
INSERT INTO phone_db VALUES("288","Siemens CF75","at19200");
INSERT INTO phone_db VALUES("289","Siemens EL71","at115200");
INSERT INTO phone_db VALUES("290","Siemens TC35","at19200");
INSERT INTO phone_db VALUES("291","Siemens SL 75","blueat");
INSERT INTO phone_db VALUES("292","Siemens S65","blueat");
INSERT INTO phone_db VALUES("293","Siemens SK65","at");
INSERT INTO phone_db VALUES("294","Samsung SGH-A707","at");
INSERT INTO phone_db VALUES("295","Samsung SGH-Z107","at");
INSERT INTO phone_db VALUES("296","Samsung c3110","at115200");
INSERT INTO phone_db VALUES("297","Samsung SGH-Z150","at115200");
INSERT INTO phone_db VALUES("298","Samsung SGH-E310","at19200");
INSERT INTO phone_db VALUES("299","Samsung SGH-E770","at19200");
INSERT INTO phone_db VALUES("300","Samsung SGH-i607","at19200");
INSERT INTO phone_db VALUES("301","Samsung SGH-Z300","at19200");
INSERT INTO phone_db VALUES("302","Samsung SGH-Z400","at19200");
INSERT INTO phone_db VALUES("303","Samsung SGH-D407","blueat");
INSERT INTO phone_db VALUES("304","Samsung SGH-Z510","blueat");
INSERT INTO phone_db VALUES("305","Samsung SGH-D780","at115200");
INSERT INTO phone_db VALUES("306","Samsung SGH-A701","at19200");
INSERT INTO phone_db VALUES("307","Samsung SGH-D407","at");
INSERT INTO phone_db VALUES("308","Samsung SGH-D520","at");
INSERT INTO phone_db VALUES("309","Samsung SGH-M300V","at");
INSERT INTO phone_db VALUES("310","Samsung SGH-M300V","at");
INSERT INTO phone_db VALUES("311","Samsung SGH-E215L","at115200");
INSERT INTO phone_db VALUES("312","Samsung SGH-U600","at115200");
INSERT INTO phone_db VALUES("313","Samsung SGH-ZV40","at115200");
INSERT INTO phone_db VALUES("314","Samsung SGH-L760","at19200");
INSERT INTO phone_db VALUES("315","Samsung Z370","at19200");
INSERT INTO phone_db VALUES("316","Samsung C3050","blueat");
INSERT INTO phone_db VALUES("317","Samsung SGH-B510","blueat");
INSERT INTO phone_db VALUES("318","Samsung SGH-E530","blueat");
INSERT INTO phone_db VALUES("319","Samsung SGH-S501i","blueat");
INSERT INTO phone_db VALUES("320","Samsung SGH-F700V","at");
INSERT INTO phone_db VALUES("321","Samsung SGH-J700","at");
INSERT INTO phone_db VALUES("322","Samsung M8800 Pixon","at");
INSERT INTO phone_db VALUES("323","Samsung SGH-A737","at");
INSERT INTO phone_db VALUES("324","Samsung SGH-E200","at");
INSERT INTO phone_db VALUES("325","Samsung SGH-V710","at");
INSERT INTO phone_db VALUES("326","Samsung SGH-D840","blueat");
INSERT INTO phone_db VALUES("327","Samsung SGH-J750","blueat");
INSERT INTO phone_db VALUES("328","Samsung SGH-E720","blueat");
INSERT INTO phone_db VALUES("329","Samsung sph a 680","at");
INSERT INTO phone_db VALUES("330","Samsung 129","at19200");
INSERT INTO phone_db VALUES("331","Samsung SGH-U900","at115200");
INSERT INTO phone_db VALUES("332","Samsung SGH-U900","at19200");
INSERT INTO phone_db VALUES("333","Samsung SGH-S400i","blueat");
INSERT INTO phone_db VALUES("334","Samsung SGH-C506","at");
INSERT INTO phone_db VALUES("335","Samsung SGH-D900i","at19200");
INSERT INTO phone_db VALUES("336","Samsung sgh-f250l","at19200");
INSERT INTO phone_db VALUES("337","Samsung E250V","at115200");
INSERT INTO phone_db VALUES("338","Samsung SGH-E900","at115200");
INSERT INTO phone_db VALUES("339","Samsung 1410","at19200");
INSERT INTO phone_db VALUES("340","Samsung m 310","blueat");
INSERT INTO phone_db VALUES("341","Samsung SGH-Z240","blueat");
INSERT INTO phone_db VALUES("342","Samsung SGH-J150","at115200");
INSERT INTO phone_db VALUES("343","Nokia 3110 classic","at115200");
INSERT INTO phone_db VALUES("344","Nokia E51","at115200");
INSERT INTO phone_db VALUES("345","Nokia E51","at115200");
INSERT INTO phone_db VALUES("346","Nokia N95","at115200");
INSERT INTO phone_db VALUES("347","Nokia 6170","at19200");
INSERT INTO phone_db VALUES("348","Nokia 6670","at19200");
INSERT INTO phone_db VALUES("349","Nokia 7600","at19200");
INSERT INTO phone_db VALUES("350","Nokia 6021","bluephonet");
INSERT INTO phone_db VALUES("351","Nokia N65","bluephonet");
INSERT INTO phone_db VALUES("352","Nokia 5500","bluerfat");
INSERT INTO phone_db VALUES("353","Nokia E61","dku2at");
INSERT INTO phone_db VALUES("354","Nokia e63","dku2at");
INSERT INTO phone_db VALUES("355","Nokia 3210","fbus");
INSERT INTO phone_db VALUES("356","Nokia 6021","fbus");
INSERT INTO phone_db VALUES("357","Nokia 6101","irdaphonet");
INSERT INTO phone_db VALUES("358","Nokia 6820","irdaphonet");
INSERT INTO phone_db VALUES("359","Nokia 3410","fbuspl2303");
INSERT INTO phone_db VALUES("360","Nokia 5110","fbuspl2303");
INSERT INTO phone_db VALUES("361","Nokia 3220","fbusirda");
INSERT INTO phone_db VALUES("362","Nokia 5300","at115200");
INSERT INTO phone_db VALUES("363","Nokia N70","at115200");
INSERT INTO phone_db VALUES("364","Nokia 6080","at19200");
INSERT INTO phone_db VALUES("365","Nokia 7500 prism","at19200");
INSERT INTO phone_db VALUES("366","Nokia 9210i","at19200");
INSERT INTO phone_db VALUES("367","Nokia RM-325","bluephonet");
INSERT INTO phone_db VALUES("368","Nokia 6301","bluerfat");
INSERT INTO phone_db VALUES("369","Nokia 3100","dlr3");
INSERT INTO phone_db VALUES("370","Nokia 3310","fbus");
INSERT INTO phone_db VALUES("371","Nokia 5110","fbus");
INSERT INTO phone_db VALUES("372","Nokia 5140","fbusdlr3");
INSERT INTO phone_db VALUES("373","Nokia 6340i","fbuspl2303");
INSERT INTO phone_db VALUES("374","Nokia 6100","irdaphonet");
INSERT INTO phone_db VALUES("375","Nokia 6610","fbusdlr3");
INSERT INTO phone_db VALUES("376","Nokia 3120","fbuspl2303");
INSERT INTO phone_db VALUES("377","Nokia 6020","dlr3");
INSERT INTO phone_db VALUES("378","Nokia 2760","bluephonet");
INSERT INTO phone_db VALUES("379","Nokia 2323","bluephonet");
INSERT INTO phone_db VALUES("380","Nokia 6310i","bluerfphonet");
INSERT INTO phone_db VALUES("381","Nokia 6070","fbuspl2303");
INSERT INTO phone_db VALUES("382","Nokia 5140i","irdaphonet");
INSERT INTO phone_db VALUES("383","Nokia 6020","irdaphonet");
INSERT INTO phone_db VALUES("384","Nokia 6310i","irdaphonet");
INSERT INTO phone_db VALUES("385","Nokia 6230i","bluephonet");
INSERT INTO phone_db VALUES("386","Nokia 6070","fbus");
INSERT INTO phone_db VALUES("387","Nokia 6820","bluephonet");
INSERT INTO phone_db VALUES("388","Nokia 6030","fbuspl2303");
INSERT INTO phone_db VALUES("389","Nokia 3110 classic","bluerfphonet");
INSERT INTO phone_db VALUES("390","Nokia 5200","bluerfphonet");
INSERT INTO phone_db VALUES("391","Nokia 6101","fbus");
INSERT INTO phone_db VALUES("392","Nokia 3109c","at115200");
INSERT INTO phone_db VALUES("393","Nokia 6267","at115200");
INSERT INTO phone_db VALUES("394","Nokia 6600","at115200");
INSERT INTO phone_db VALUES("395","Nokia 6133","blueat");
INSERT INTO phone_db VALUES("396","Nokia 5600 Slide","bluerfat");
INSERT INTO phone_db VALUES("397","Nokia 6300","bluerfphonet");
INSERT INTO phone_db VALUES("398","Nokia 6230i","dku2phonet");
INSERT INTO phone_db VALUES("399","Nokia 6610","dku2phonet");
INSERT INTO phone_db VALUES("400","Nokia 3310 Classic","fbus");
INSERT INTO phone_db VALUES("401","Nokia 5510","fbus");
INSERT INTO phone_db VALUES("402","Nokia 6300","fbus");
INSERT INTO phone_db VALUES("403","Nokia 6340i","at19200");
INSERT INTO phone_db VALUES("404","Nokia 6270","bluephonet");
INSERT INTO phone_db VALUES("405","Nokia 3100","fbuspl2303");
INSERT INTO phone_db VALUES("406","Nokia 6100","fbuspl2303");
INSERT INTO phone_db VALUES("407","Nokia 6230i","irdaphonet");
INSERT INTO phone_db VALUES("408","Nokia 6310","irdaphonet");
INSERT INTO phone_db VALUES("409","Nokia 3100","fbus");
INSERT INTO phone_db VALUES("410","Nokia 3120","fbusdku5");
INSERT INTO phone_db VALUES("411","Nokia 3200","irdaphonet");
INSERT INTO phone_db VALUES("412","Nokia 7250i","fbus");
INSERT INTO phone_db VALUES("413","Nokia 7600","bluefbus");
INSERT INTO phone_db VALUES("414","Nokia 2600","bluephonet");
INSERT INTO phone_db VALUES("415","Nokia 3500 classic","bluephonet");
INSERT INTO phone_db VALUES("416","Nokia 6234","bluephonet");
INSERT INTO phone_db VALUES("417","Nokia 6810","bluephonet");
INSERT INTO phone_db VALUES("418","Nokia 7120 supernova","bluephonet");
INSERT INTO phone_db VALUES("419","Nokia 6210","fbusdlr3");
INSERT INTO phone_db VALUES("420","Nokia 6220","fbusdlr3");
INSERT INTO phone_db VALUES("421","Nokia 7360","fbuspl2303");
INSERT INTO phone_db VALUES("422","Nokia 5140","irdaphonet");
INSERT INTO phone_db VALUES("423","Nokia 3109c","phonetblue");
INSERT INTO phone_db VALUES("424","Nokia 2630","bluephonet");
INSERT INTO phone_db VALUES("425","Nokia 5130 XpressMusic","bluephonet");
INSERT INTO phone_db VALUES("426","Nokia 5300","bluephonet");
INSERT INTO phone_db VALUES("427","Nokia 5310","bluephonet");
INSERT INTO phone_db VALUES("428","Nokia 6131","bluephonet");
INSERT INTO phone_db VALUES("429","Nokia 6300","bluephonet");
INSERT INTO phone_db VALUES("430","Nokia 5140i","fbusdlr3");
INSERT INTO phone_db VALUES("431","Nokia 3200","fbuspl2303");
INSERT INTO phone_db VALUES("432","Nokia 6310i","bluerfphonet");
INSERT INTO phone_db VALUES("433","Nokia 6210","fbus");
INSERT INTO phone_db VALUES("434","Nokia 6300","bluephonet");
INSERT INTO phone_db VALUES("435","Nokia 6230","irdaphonet");
INSERT INTO phone_db VALUES("436","Nokia 6021","bluephonet");
INSERT INTO phone_db VALUES("437","Nokia 6230i","bluephonet");
INSERT INTO phone_db VALUES("438","Nokia 6085","dku2phonet");
INSERT INTO phone_db VALUES("439","Nokia 3109c","irdaphonet");
INSERT INTO phone_db VALUES("440","Nokia 6233","bluephonet");
INSERT INTO phone_db VALUES("441","Nokia 8800","bluephonet");
INSERT INTO phone_db VALUES("442","Nokia 3510i","fbus");
INSERT INTO phone_db VALUES("443","Nokia 6310i","fbusdlr3");
INSERT INTO phone_db VALUES("444","Nokia 3100","fbuspl2303");
INSERT INTO phone_db VALUES("445","Nokia 6021","irdaphonet");
INSERT INTO phone_db VALUES("446","Nokia 6610","irdaphonet");
INSERT INTO phone_db VALUES("447","Nokia 7110","mbus");
INSERT INTO phone_db VALUES("448","Nokia N95","at115200");
INSERT INTO phone_db VALUES("449","Nokia 3110c","at19200");
INSERT INTO phone_db VALUES("450","Nokia 3230","at19200");
INSERT INTO phone_db VALUES("451","Nokia 6300","at19200");
INSERT INTO phone_db VALUES("452","Nokia 3100","bluephonet");
INSERT INTO phone_db VALUES("453","Nokia 5130","bluephonet");
INSERT INTO phone_db VALUES("454","Nokia 6021","bluephonet");
INSERT INTO phone_db VALUES("455","Nokia 6085","bluephonet");
INSERT INTO phone_db VALUES("456","Nokia 6131","bluephonet");
INSERT INTO phone_db VALUES("457","Nokia 6230","bluephonet");
INSERT INTO phone_db VALUES("458","Nokia 6280","bluephonet");
INSERT INTO phone_db VALUES("459","Nokia 6500","bluephonet");
INSERT INTO phone_db VALUES("460","Nokia 6500 SLIDE","bluephonet");
INSERT INTO phone_db VALUES("461","Nokia 6086","bluerfphonet");
INSERT INTO phone_db VALUES("462","Nokia 6310i","bluerfphonet");
INSERT INTO phone_db VALUES("463","Nokia 2125i","dku2phonet");
INSERT INTO phone_db VALUES("464","Nokia 3220i","dku2phonet");
INSERT INTO phone_db VALUES("465","Nokia 6230i","dku2phonet");
INSERT INTO phone_db VALUES("466","Nokia 6681","dku2phonet");
INSERT INTO phone_db VALUES("467","Nokia 3105","dku5fbus");
INSERT INTO phone_db VALUES("468","Nokia 3110c","fbus");
INSERT INTO phone_db VALUES("469","Nokia 6030","fbus");
INSERT INTO phone_db VALUES("470","Nokia 6133","fbus");
INSERT INTO phone_db VALUES("471","Nokia 8250","fbus");
INSERT INTO phone_db VALUES("472","Nokia 6230i","fbusdlr3");
INSERT INTO phone_db VALUES("473","Nokia RM-392","fbusdlr3");
INSERT INTO phone_db VALUES("474","Nokia 6070","fbuspl2303");
INSERT INTO phone_db VALUES("475","Nokia 6070","irdaphonet");
INSERT INTO phone_db VALUES("476","Nokia 6070","irdaphonet");
INSERT INTO phone_db VALUES("477","Nokia 8310","irdaphonet");
INSERT INTO phone_db VALUES("478","Nokia 6070","phonetblue");
INSERT INTO phone_db VALUES("479","Nokia 6310i","dku2phonet");
INSERT INTO phone_db VALUES("480","Nokia 6330","bluephonet");
INSERT INTO phone_db VALUES("481","Nokia 6610i","irdaphonet");
INSERT INTO phone_db VALUES("482","Nokia 6100","dlr3");
INSERT INTO phone_db VALUES("483","Nokia 7360","irdaphonet");
INSERT INTO phone_db VALUES("484","Nokia 3586i","fbuspl2303");
INSERT INTO phone_db VALUES("485","Nokia 3586i","dku5fbus");
INSERT INTO phone_db VALUES("486","Nokia 8250","irdaphonet");
INSERT INTO phone_db VALUES("487","Nokia 6300","at115200");
INSERT INTO phone_db VALUES("488","Nokia N30 M2M","at19200");
INSERT INTO phone_db VALUES("489","Nokia 3120","blueat");
INSERT INTO phone_db VALUES("490","Nokia 6300","blueat");
INSERT INTO phone_db VALUES("491","Nokia 6151","bluephonet");
INSERT INTO phone_db VALUES("492","Nokia 6151","bluerfphonet");
INSERT INTO phone_db VALUES("493","Nokia 7210s","bluerfphonet");
INSERT INTO phone_db VALUES("494","Nokia N73","dku2phonet");
INSERT INTO phone_db VALUES("495","Nokia 3410","fbus");
INSERT INTO phone_db VALUES("496","Nokia 5190","fbus");
INSERT INTO phone_db VALUES("497","Nokia 2630","bluephonet");
INSERT INTO phone_db VALUES("498","Nokia 6288","fbus");
INSERT INTO phone_db VALUES("499","Nokia 2630","bluephonet");
INSERT INTO phone_db VALUES("500","Nokia 6300","bluephonet");
INSERT INTO phone_db VALUES("501","Nokia 3500 classic","at19200");
INSERT INTO phone_db VALUES("502","Nokia 6170","at19200");
INSERT INTO phone_db VALUES("503","MOTOROLA K1","at19200");
INSERT INTO phone_db VALUES("504","MOTOROLA L6","at19200");
INSERT INTO phone_db VALUES("505","MOTOROLA L7","at/blueat");
INSERT INTO phone_db VALUES("506","MOTOROLA L9","at");
INSERT INTO phone_db VALUES("507","MOTOROLA MOTORAZR2 V8","bluerfat");
INSERT INTO phone_db VALUES("508","MOTOROLA MTK2","at");
INSERT INTO phone_db VALUES("509","MOTOROLA PEBL U6","at");
INSERT INTO phone_db VALUES("510","MOTOROLA RAZR V3","at115200");
INSERT INTO phone_db VALUES("511","MOTOROLA RAZR V3x","at19200");
INSERT INTO phone_db VALUES("512","MOTOROLA RAZR V3xxR","at115200");
INSERT INTO phone_db VALUES("513","MOTOROLA ROKR E1","at115200");
INSERT INTO phone_db VALUES("514","MOTOROLA THIPHONE","blueat");
INSERT INTO phone_db VALUES("515","MOTOROLA V1075","at19200");
INSERT INTO phone_db VALUES("516","MOTOROLA V188","at");
INSERT INTO phone_db VALUES("517","MOTOROLA V190","at19200");
INSERT INTO phone_db VALUES("518","MOTOROLA V195","at19200");
INSERT INTO phone_db VALUES("519","MOTOROLA V235","at115200");
INSERT INTO phone_db VALUES("520","MOTOROLA V3","at");
INSERT INTO phone_db VALUES("521","MOTOROLA V360","at115200");
INSERT INTO phone_db VALUES("522","MOTOROLA V3I","at115200");
INSERT INTO phone_db VALUES("523","MOTOROLA V3R","at115200");
INSERT INTO phone_db VALUES("524","MOTOROLA V3RE","at");
INSERT INTO phone_db VALUES("525","MOTOROLA W490","blueat");
INSERT INTO phone_db VALUES("526","MOTOROLA Z3","at19200");
INSERT INTO phone_db VALUES("527","LG KP210","at");
INSERT INTO phone_db VALUES("528","LG CU-500","at115200");
INSERT INTO phone_db VALUES("529","LG KE820","at19200");
INSERT INTO phone_db VALUES("530","LG KE970","at19200");
INSERT INTO phone_db VALUES("531","LG KF750","at115200");
INSERT INTO phone_db VALUES("532","LG KG300","at19200");
INSERT INTO phone_db VALUES("533","LG KP199","at");
INSERT INTO phone_db VALUES("534","LG KP320","at115200");
INSERT INTO phone_db VALUES("535","LG KT520","blueat");
INSERT INTO phone_db VALUES("536","LG KU990","at");
INSERT INTO phone_db VALUES("537","LG MG220d","at19200");
INSERT INTO phone_db VALUES("538","LG MTK2","at19200");
INSERT INTO phone_db VALUES("539","LG TU550","at");
INSERT INTO phone_db VALUES("540","LG U8330","at115200");
INSERT INTO phone_db VALUES("541","LG U8360","irdaphonet");





CREATE TABLE `phones` (
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
  `Received` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`IMEI`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

INSERT INTO phones VALUES("SMSGateway","2017-05-28 02:50:31","2017-05-28 02:48:45","2017-05-28 02:50:41","yes","yes","867767001046305","Gammu 1.33.0, Windows Server 2007, GCC 4.7, MinGW 3.11","0","39","1","18");
INSERT INTO phones VALUES("SMSGateway","2017-05-28 12:03:10","2017-05-28 03:07:27","2017-05-28 12:03:20","yes","yes","860604005495575","Gammu 1.33.0, Windows Server 2007, GCC 4.7, MinGW 3.11","0","45","6","5");





CREATE TABLE `read_message` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `pengirim` varchar(15) NOT NULL,
  `tanggal_terima` varchar(20) NOT NULL,
  `pesan` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;






CREATE TABLE `sentitems` (
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
  `CreatorID` text NOT NULL,
  PRIMARY KEY (`ID`,`SequencePosition`),
  KEY `sentitems_date` (`DeliveryDateTime`),
  KEY `sentitems_tpmr` (`TPMR`),
  KEY `sentitems_dest` (`DestinationNumber`),
  KEY `sentitems_sender` (`SenderID`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;






CREATE TABLE `tbl_siswa` (
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
  PRIMARY KEY (`no_daftar`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO tbl_siswa VALUES("M/LBR/V/2017-005","0","0","SYAHIDAN AFGANISTAN","MEDAS MUNAWARAH","2001-12-23","L","Islam","Tidak","2","3","Tidak","","MEDAS MUNAWARAH","5201060008","5201060","5201","52","Jalan Kaki","Kosan","&gt; Dari 1 KM","085205159904","","MTS ADDINUL QAYYIM","MEDAS MUNAWARAH","03-138-075-6","0","0","0","0","SUJAI","0","Petani","SD","Kurang 1 Jut","MEDAS MUNAWARAH","RAHMI","0","Petani","SD","Kurang 1 Jut","MEDAS MUNAWARAH","SUJAI","0","Petani","SD","Kurang 1 Juta","MEDAS MUNAWARAH","085205159904","0","0","");
INSERT INTO tbl_siswa VALUES("M/LBR/V/2017-006","0","0","ULUL AZMI","MEDAS","2002-07-20","L","Islam","Tidak","1","2","Tidak","","MEDAS  PINTU AIR","5201060008","5201060","5201","52","Jalan Kaki","Kosan","&lt; Dari 1 KM","085338657547","","MTS ADDINUL QAYYIM","KAPEK","00-000-00-000","0","0","0","0","MUS MULIADI","0","Wiraswasta","SD","Lebih 1 Juta","BENTARU","MURADAH","0","Petani","SD","Kurang 1 Jut","BENTARU","MUS MULIADI","0","Wiraswasta","SD","Lebih 1 Juta","BENTARU","085338657547","0","0","");
INSERT INTO tbl_siswa VALUES("M/LTG/V/2017-003","0","0","MOH NURWAHYUDDIN AWATONI","MASBAGIK","2002-07-28","L","Islam","Tidak","1","3","Tidak","","BUSE, BUNUT BAOK","5202060018","5202060","5202","52","Jalan Kaki","Kosan","&lt; Dari 1 KM","087865187465","","MTS NURUL YAQIN NW ","KARANG LEBAH","00-000-00-000","0","0","0","0","MASWAN","0","Wiraswasta","S1","Lebih 1 Juta","BUSE, BUNUT BAOK","RAHNIM","0","Wiraswasta","S2","Lebih 1 Juta","BUSE, BONUT BAOK","MASWAN","0","Wiraswasta","S1","Lebih 1 Juta","BUSE, BUNUT BAOK","087865187465","0","0","");
INSERT INTO tbl_siswa VALUES("M/LTG/V/2017-012","0","0","M. ZAINUL ARYA AHADI","PUYUNG","2002-03-10","L","Islam","Tidak","1","2","Tidak","","RETOT TIMUR","5202050004","5202050","5202","52","Jalan Kaki","Kosan","&lt; Dari 1 KM","081805298575","","MTS NURUL MUJTAHIDIN","LEMPUAN","0","0","0","0","0","MUHSIN","0","Lainnya","SMA","Kurang 1 Jut","RETOT TIMUR","MAULINA HAMDANI","0","IRT","SMA","Kurang 1 Jut","RETOT TIMUR","MUHSIN","0","Lainnya","SMA","Kurang 1 Juta","RETOT TIMUR","081805298575","0","0","");
INSERT INTO tbl_siswa VALUES("M/LTG/V/2017-013","0","0","HAGMAN GOZI","REPOK PRAI","2002-05-12","L","Islam","Tidak","2","3","Tidak","","REPOK PRAI","5202061008","5202061","5202","52","Jalan Kaki","Kosan","&lt; Dari 1 KM","081803709489","","MTS ALBAQIATUSSOLIHAT","RAS","0","0","0","0","0","H. MUHIR","0","Petani","S1","Kurang 1 Jut","REPOK PRAI","JULI ARTINI","0","Petani","SMA","Kurang 1 Jut","REPOK PRAI","H. MUHIR","0","Petani","S1","Kurang 1 Juta","REPOK PRAI","081803709489","0","0","");
INSERT INTO tbl_siswa VALUES("M/LTG/VI/2017-032","0","0","ABDUL KADIR JAELANI","SELANGLET PENUJAK","2003-08-16","L","Islam","Tidak","3","3","Tidak","","SELANGLET PENUJAK","5202010014","5202010","5202","52","Jalan Kaki","Kosan","&lt; Dari 1 KM","085338035066","","MTs MI&#039;RAJUSSIBYAN","SELANGLET","05-331-001-8","0","0","0","0","JUNAIDI","0","Petani","SMP","Kurang 1 Jut","SELANGLET","ROHATINI","0","Petani","SMP","Kurang 1 Jut","SELANGLET","","","Pilih Pekerjaan..","Pilih Pendidikan Wali","Pilih Penghasilan Ayah","","","0","0","BADMINTON");
INSERT INTO tbl_siswa VALUES("M/LTM/V/2017-002","111","111","DAVID PERIAWAN","LOKOK BATA","2002-05-10","L","Islam","Tidak","1","2","Tidak","","LOKOK BATA","5208040002","5208040","5208","52","Jalan Kaki","Kosan","&lt; Dari 1 KM","0","","MTS ABQ NW SANTONG","SANTONG","00-000-00-000","0","0","0","0","RASMAN","0","Petani","SD","Kurang 1 Jut","LOKOK BATA","AIWATI","0","Petani","SD","Kurang 1 Jut","LOKOKBATA","RASMAN","0","Petani","SD","Kurang 1 Juta","LOKOK BATA","0","0","0","");
INSERT INTO tbl_siswa VALUES("M/LTM/V/2017-007","5203015202930001","0","M. AINUL AMIN FAJRI","PENYENGGIR","2001-08-10","L","Islam","Tidak","6","5","Tidak","","PENYENGGIR","5203040014","5203040","5203","52","Jalan Kaki","Kosan","&lt; Dari 1 KM","081918210832","","MTS NW SIKUR","SIKUR","06-153-046","0","0","0","0","SAPRUDIN","0","Petani","SD","Kurang 1 Jut","PENYENGGIR","SAPIAH","0","Petani","SD","Kurang 1 Jut","PENYENGGIR","SAPRUDIN","0","Petani","SD","Kurang 1 Juta","PENYENGGIR","081918210832","0","0","");
INSERT INTO tbl_siswa VALUES("M/LTM/V/2017-008","0","0","M. HIZBUL ASROR","TENGAING","2002-12-09","L","Islam","Tidak","1","2","Tidak","","TENGGAING","5203040014","5203040","5203","52","Jalan Kaki","Kosan","&lt; Dari 1 KM","081918341246","","MTS NW SIKUR","SIKUR","23-06-153-049","0","0","0","0","M. AZHARI","0","Petani","SD","Kurang 1 Jut","TENGGAING","SAMSUL MARAAH","0","Petani","SD","Kurang 1 Jut","TENGGAING","M. AZHARI","0","Petani","SD","Kurang 1 Juta","TENGGAING","081918341246","0","0","");
INSERT INTO tbl_siswa VALUES("M/LTM/V/2017-011","0","0","ASRUL WATHANI","TAMPATAN","2001-12-01","L","Islam","Tidak","1","2","Tidak","","TAMPATAN","5203091004","5203091","5203","52","Jalan Kaki","Kosan","&lt; Dari 1 KM","087763173497","","MTS NW KARANG BARU","KARANG BARU","0","0","0","0","0","SURUL HARDI","0","Petani","SMA","Kurang 1 Jut","TAMPATAN","HUSRIANI","0","Petani","SMA","Kurang 1 Jut","TAMPATAN","SURUL HARDI","0","Petani","SMA","Kurang 1 Juta","TAMPATAN","087763173497","0","0","");
INSERT INTO tbl_siswa VALUES("M/LTM/V/2017-015","123456","12345","IZZUDIN HABIB TANTHAWI","LENDANG BUNGA","2002-09-01","L","Islam","Tidak","1","2","Tidak","","LENDANG BUNGA","5203090004","5203090","5203","52","Jalan Kaki","Kosan","&lt; Dari 1 KM","085237189949","example@mail.com","MTS DARUSSHOLIHIN NW KALIJAGA SELATAN","KALIJAGA SELATAN","00-000-00-000","0","0","0","0","MISBAH","1970","Petani","SMP","Kurang 1 Jut","LENDANG BUNGA","RUHYATUL HAZMI","1970","Petani","SMA","Kurang 1 Jut","LENDANG BUNGA","MISBAH","1970","Petani","SMP","Kurang 1 Juta","LENDANG BUNGA","085237189949","150","35","TAHFIZD");
INSERT INTO tbl_siswa VALUES("M/LTM/V/2017-017","0","0","AHMAD ZULFAN AZZUHRI","DASAN BARU","2002-06-01","L","Islam","Tidak","1","2","Tidak","","DASAN BARU","5203010018","5203010","5203","52","Jalan Kaki","Kosan","&lt; Dari 1 KM","087763234179","","MTS MU&#039;ALLIMIN NW ANJANI","ANJANI","00-000-00-000","0","0","0","0","JALALUDDIN,S.Ag","0","Guru Honor","S1","Lebih 1 Juta","DASAN BARU","RINA HELMI","0","IRT","SMA","Kurang 1 Jut","DASAN BARU","JALALUDDIN,S.Ag","0","Guru Honor","S1","Lebih 1 Juta","DASAN BARU","087763234179","150","35","MEMBACA");
INSERT INTO tbl_siswa VALUES("M/LTM/VI/2017-034","0","0","M. ROY AL ANSORI","MONTONG KELEK","2002-12-17","L","Islam","Tidak","1","1","Tidak","","MONTONG KELEK","5203011002","5203011","5203","52","Jalan Kaki","Kosan","&lt; Dari 1 KM","085337477957","","MTS MU&#039;ALLIMIN NW ANJANI","ANJANI","0","0","0","0","0","GUNATIH","0","Petani","Tidak Sekolah","Kurang 1 Jut","MOTONG KELEK","MINASI","0","Petani","Tidak Sekolah","Kurang 1 Jut","MONTONG KELEK","","","Pilih Pekerjaan..","Pilih Pendidikan Wali","Pilih Penghasilan Ayah","","","0","0","MAEN BOLA");
INSERT INTO tbl_siswa VALUES("M/LTM/VI/2017-035","0","0","MUHAMMD HABIBULLAH","PENE","2002-01-14","L","Islam","Tidak","5","5","Tidak","","PENE","5203011011","5203011","5203","52","Jalan Kaki","Kosan","&lt; Dari 1 KM","082340494769","","MTs ISLAHUDDINY","KEDIRI, LOMBOK BARAT","0","0","0","0","0","SERINAH","0","PNS","S1","Lebih 1 Juta","PENE","MASA&#039;AH","0","IRT","Tidak Sekolah","Kurang 1 Jut","PENE","","","Pilih Pekerjaan..","Pilih Pendidikan Wali","Pilih Penghasilan Ayah","","","0","0","MAIN BOLA");
INSERT INTO tbl_siswa VALUES("S/LTM/V/2017-010","0","0","LALU SULTAN GUNAWAN","SUEALAGA","2002-07-01","L","Islam","Tidak","1","2","Tidak","","TELAGA TAMPA","5203061005","5203061","5203","52","Kendaraan Pribadi","Rumah","&gt; Dari 1 KM","081977754938","","SMP PLUS MUNIRUL ARIFIN","KETEJER","00-000-00-000","0","0","0","0","LALU MAZKUR","0","Wiraswasta","SMA","Lebih 1 Juta","SURALAGA","BQ.SITI FATIMAH","0","Wiraswasta","SD","Kurang 1 Jut","SURALAGA","LALU MAZKUR","0","Wiraswasta","SMA","Lebih 1 Juta","SURALAGA","081977754938","0","0","");
INSERT INTO tbl_siswa VALUES("S/LTM/V/2017-014","0","0","HUDIATMA","BATU CANGKU","2002-09-09","L","Islam","Tidak","1","0","Tidak","","BAYU CANGKU","5203081005","5203081","5203","52","Jalan Kaki","Kosan","&lt; Dari 1 KM","085238281867","","SMPN 2 SUELA","SAPIT","00-000-00-000","0","0","0","0","HUDRI","0","Petani","SD","Kurang 1 Jut","SAPIT","YANTI","0","Petani","SD","Kurang 1 Jut","SAPIT","HUDRI","0","Petani","SD","Kurang 1 Juta","SAPIT","085238281867","0","0","");
INSERT INTO tbl_siswa VALUES("S/LTM/V/2017-016","11111","1111","KHAERUL ANWAR","LENDANG BUNGA","2003-10-11","L","Islam","Tidak","1","2","Tidak","111111","LENDANG BUNGA","5203090004","5203090","5203","52","Jalan Kaki","Asrama","&lt; Dari 1 KM","085339464126","example@mail.com","SMPN 3 AIKMEL","LENDANG BUNGA","00-000-00-000","0","0","0","0","SUNARDI","1970","Petani","SMP","Kurang 1 Jut","LENDANG BUNGA","SUKNI","1970","Petani","SMP","Kurang 1 Jut","LENDANG BUNGA","SUANRDI","1970","Petani","SMP","Kurang 1 Juta","LENDANG BUNGA","085339464126","150","30","BULU TANGKIS");





CREATE TABLE `tbl_syarat` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `no_daftar` char(50) DEFAULT NULL,
  `syarat` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_tbl_syarat_tbl_siswa` (`no_daftar`),
  CONSTRAINT `FK_tbl_syarat_tbl_siswa` FOREIGN KEY (`no_daftar`) REFERENCES `tbl_siswa` (`no_daftar`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=74 DEFAULT CHARSET=latin1;

INSERT INTO tbl_syarat VALUES("14","M/LTM/V/2017-015","Uang Pendaftaran Rp 35.000");
INSERT INTO tbl_syarat VALUES("15","M/LTM/V/2017-015","Copy Kartu Keluarga");
INSERT INTO tbl_syarat VALUES("16","S/LTM/V/2017-016","Uang Pendaftaran Rp 35.000");
INSERT INTO tbl_syarat VALUES("17","S/LTM/V/2017-016","Copy Kartu Keluarga");
INSERT INTO tbl_syarat VALUES("18","S/LTM/V/2017-016","Copy Akta Lahir");
INSERT INTO tbl_syarat VALUES("20","M/LTM/V/2017-002","Uang Pendaftaran Rp 35.000");
INSERT INTO tbl_syarat VALUES("21","M/LTG/V/2017-003","Uang Pendaftaran Rp 35.000");
INSERT INTO tbl_syarat VALUES("23","M/LBR/V/2017-005","Uang Pendaftaran Rp 35.000");
INSERT INTO tbl_syarat VALUES("24","M/LBR/V/2017-006","Uang Pendaftaran Rp 35.000");
INSERT INTO tbl_syarat VALUES("25","S/LTM/V/2017-010","Uang Pendaftaran Rp 35.000");
INSERT INTO tbl_syarat VALUES("26","S/LTM/V/2017-010","Copy Kartu Keluarga");
INSERT INTO tbl_syarat VALUES("27","S/LTM/V/2017-014","Uang Pendaftaran Rp 35.000");
INSERT INTO tbl_syarat VALUES("28","M/LTM/V/2017-007","Uang Pendaftaran Rp 35.000");
INSERT INTO tbl_syarat VALUES("29","M/LTM/V/2017-007","Copy Kartu Keluarga");
INSERT INTO tbl_syarat VALUES("30","M/LTM/V/2017-007","Copy Akta Lahir");
INSERT INTO tbl_syarat VALUES("31","M/LTM/V/2017-008","Uang Pendaftaran Rp 35.000");
INSERT INTO tbl_syarat VALUES("32","M/LTM/V/2017-008","Copy Kartu Keluarga");
INSERT INTO tbl_syarat VALUES("33","M/LTM/V/2017-008","Copy Akta Lahir");
INSERT INTO tbl_syarat VALUES("35","M/LTG/V/2017-013","Uang Pendaftaran Rp 35.000");
INSERT INTO tbl_syarat VALUES("36","M/LTG/V/2017-012","Uang Pendaftaran Rp 35.000");
INSERT INTO tbl_syarat VALUES("37","M/LTG/V/2017-012","Copy Kartu Keluarga");
INSERT INTO tbl_syarat VALUES("38","M/LTG/V/2017-012","Copy Akta Lahir");
INSERT INTO tbl_syarat VALUES("39","M/LTM/V/2017-011","Uang Pendaftaran Rp 35.000");
INSERT INTO tbl_syarat VALUES("40","M/LTM/V/2017-017","Uang Pendaftaran Rp 35.000");
INSERT INTO tbl_syarat VALUES("41","M/LTM/V/2017-017","Copy Kartu Keluarga");
INSERT INTO tbl_syarat VALUES("42","M/LTM/V/2017-017","Copy Akta Lahir");
INSERT INTO tbl_syarat VALUES("68","M/LTG/VI/2017-032","Uang Pendaftaran Rp 35.000");
INSERT INTO tbl_syarat VALUES("69","M/LTG/VI/2017-032","Copy Kartu Keluarga");
INSERT INTO tbl_syarat VALUES("70","M/LTG/VI/2017-032","Copy Akta Lahir");
INSERT INTO tbl_syarat VALUES("71","M/LTM/VI/2017-034","Uang Pendaftaran Rp 35.000");
INSERT INTO tbl_syarat VALUES("72","M/LTM/VI/2017-034","Copy Kartu Keluarga");
INSERT INTO tbl_syarat VALUES("73","M/LTM/VI/2017-035","Uang Pendaftaran Rp 35.000");





CREATE TABLE `unread_message` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `pengirim` varchar(15) NOT NULL,
  `tanggal_terima` varchar(20) NOT NULL,
  `pesan` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;




