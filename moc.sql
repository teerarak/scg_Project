-- phpMyAdmin SQL Dump
-- version 4.6.6
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Nov 20, 2017 at 08:42 AM
-- Server version: 5.7.17-log
-- PHP Version: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `moc`
--

-- --------------------------------------------------------

--
-- Table structure for table `approve`
--

CREATE TABLE `approve` (
  `Approve_ID` int(100) NOT NULL COMMENT 'รหัสการอนุมัติ',
  `Approve_User_ID` int(100) DEFAULT NULL,
  `Comment` varchar(300) CHARACTER SET utf8 DEFAULT NULL COMMENT 'ความคิดเห็นผู้อนุมัติ',
  `Project_ID` int(11) NOT NULL,
  `Status_ID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_520_ci;

--
-- Dumping data for table `approve`
--

INSERT INTO `approve` (`Approve_ID`, `Approve_User_ID`, `Comment`, `Project_ID`, `Status_ID`) VALUES
(1, 1, 'wdsadsadsad', 1, 7),
(2, 11, 'sdxzcxzcas', 1, 7),
(3, 17, '', 1, 7);

-- --------------------------------------------------------

--
-- Table structure for table `choice`
--

CREATE TABLE `choice` (
  `Choice_ID` varchar(100) NOT NULL,
  `choice_name` varchar(100) CHARACTER SET utf8 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `choice`
--

INSERT INTO `choice` (`Choice_ID`, `choice_name`) VALUES
('1', 'คุณภาพ'),
('2', 'การบำรุงรักษา'),
('3', 'กระบวนการ'),
('4', 'ความปลอดภัย'),
('5', 'สิ่งแวดล้อม'),
('6', 'กฎหมาย'),
('7', 'ชุมชน');

-- --------------------------------------------------------

--
-- Table structure for table `employee`
--

CREATE TABLE `employee` (
  `User_ID` int(5) NOT NULL,
  `Username` varchar(100) CHARACTER SET utf8 DEFAULT NULL COMMENT 'ชื่อ-นามสกุล พนักงาน',
  `Password` varchar(50) CHARACTER SET utf8 NOT NULL,
  `Name` varchar(150) CHARACTER SET utf8 NOT NULL,
  `Work_ID` int(10) NOT NULL,
  `Position` varchar(50) CHARACTER SET utf8 NOT NULL,
  `section` varchar(100) CHARACTER SET utf8 NOT NULL,
  `cell` varchar(100) CHARACTER SET utf8 NOT NULL,
  `Status` varchar(100) CHARACTER SET utf8 DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_520_ci COMMENT='ตารางข้อมูลส่วนตัวของพนักงาน';

--
-- Dumping data for table `employee`
--

INSERT INTO `employee` (`User_ID`, `Username`, `Password`, `Name`, `Work_ID`, `Position`, `section`, `cell`, `Status`) VALUES
(1, 'PAOWARIR', 'Rajitdumrong', 'ปวรินทร์', 90032244, 'วิศวกร', 'ส.ผลิต', '-', 'Approve'),
(2, 'AGECHAIN', 'Ngampitugjit', 'เอกชัย งามพิทักษ์จิตต์', 90002054, 'วิศวกร', 'ส.เหมือง', '', 'MOC'),
(3, 'THANAWA', 'Ussawachokanan', 'ฐานวัฒน์ อัศวโชคอนันท์', 90024845, 'วิศวกร', 'ส.ส่งเสริมการผลิต', '', 'MOC'),
(4, 'BUNTOOFU', 'Furkquamdee', 'บัณฑูร ฝึกความดี', 90030909, 'วิศวกร', 'ส.ซ่อมบำรุง', '', 'MOC'),
(5, 'VAROTCHO', 'Chongsatapornpong', 'วรท จงสถาพรพงษ์', 90030905, 'วิศวกร', 'ส.ซ่อมบำรุง', '', 'Approve'),
(6, 'VORAMETS', 'Suwanchompoo', 'วรเมตต์ สุวรรณชมภู', 90012743, 'วิศวกร', 'ส.ผลิต', '', 'Approve'),
(7, 'CHANONKR', 'Krittpholchai', 'ชานนท์ กฤตผลชัย', 90024709, 'วิศวกร', 'ส.ผลิต', '', 'Approve'),
(8, 'APICHJEE', 'Jeemsantia', 'อภิเชษฐ์ จีมสันเทียะ', 90009132, 'วิศวกร', 'ส.เหมือง', '', 'Approve'),
(9, 'PORAMESJ', 'Jaiboon', 'ปรเมษฏ์ ใจบุญ', 90017300, 'วิศวกร', 'ส.ส่งเสริมการผลิต', '', 'Approve'),
(10, 'SONGKRTA', 'Taepaisitpong', 'สงกรานต์  แต่ไพสิฐพงษ์', 90019787, 'วิศวกร', 'ส.ผลิตมอร์ตาร์ แก่งคอย', '', 'Approve'),
(11, 'LIKHITRO', 'Romporee', 'ลิขิต ร่มโพรีย์', 90011180, 'วิศวกร', 'ส.ซ่อมบำรุง', '', 'Approve'),
(12, 'THANASIL', 'Silachote', 'ธนา ศิลาโชติ', 90030902, 'วิศวกร', 'ส.ซ่อมบำรุง', '', 'Approve'),
(13, 'WATTHCHA', 'Chaichankul', 'วรรธนะ ชัยชาญกุล', 90022664, 'วิศวกร', 'ส.ผลิตมอร์ตาร์ แก่งคอย', '', 'Approve'),
(14, 'CHOTIPOT', 'Thammachote', 'โชติพงศ์ ธรรมโชติ', 90008414, 'วิศวกร', 'ส.ผลิต', '', 'Approve'),
(15, 'SUTATCHE', 'Chermmahanon', 'สุทัศน์ เจิมมหานนท์', 90007051, 'วิศวกร', 'ส.ผลิต', '', 'Approve'),
(16, 'PAPARTPU', 'Puthom', 'ปภัทร พุฒหอม', 90013131, 'วิศวกร', 'ส.เหมือง', '', 'Approve'),
(17, 'PEERAWUS', 'Somsuk', 'พีรวุฒิ สมสุข', 6257, 'วิศวกร', 'ส.ซ่อมบำรุง', '', 'Approve'),
(18, 'PAPINWIC', 'Chirasuwan', 'ปภินวิชญ์ ชิระสุวรรณ', 90001743, 'วิศวกร', 'ส.ผลิต', '', 'Approve'),
(19, 'POOPAHPE', 'Petcharat', 'ภูผา เพชรรัตน์', 6510, 'วิศวกร', 'ส.ผลิต', '', 'Approve'),
(20, 'NUTTHASE', 'Setthaolankit', 'ณัฐวรรษ เศรษฐโอฬารกิจ', 7764, 'วิศวกร', 'ส.ซ่อมบำรุง', '', 'Approve'),
(21, 'TUWANONT', 'Timtang', 'ธุวานนท์ ทิมแตง', 90002060, 'วิศวกร', 'ส.ส่งเสริมการผลิต', '', 'Approve'),
(23, 'SORRAWKI', 'Kittithornkul', 'สรวิชญ์ กิตติธรกุล', 14870, 'วิศวกร', 'ส.ส่งเสริมการผลิต', '', 'Approve'),
(24, 'SUVIJAKS', 'Siripochanawan', 'สุวิจักขณ์ ศิริพจนาวรรณ', 14896, 'วิศวกร', 'ส.ซ่อมบำรุง', '', 'Approve'),
(25, 'PHUPANDI', 'Panditkul', 'ภูริ์ บัณฑิตกุล', 18110, 'วิศวกร', 'ส.ซ่อมบำรุง', '', 'Approve'),
(26, 'SUPANUTE', 'Teinteerawan', 'ศุภณัฐ เธียรธีรวรรณ', 18479, 'วิศวกร', 'ส.ซ่อมบำรุง', '', 'Approve'),
(27, 'JIRASATH', 'Thommasila', 'จิระศักดิ์ ธรรมศิลา', 18586, 'วิศวกร', 'ส.ซ่อมบำรุง', '', 'Approve'),
(28, 'SOMPOLK', 'Kaewboonruang', 'สมพล แก้วบุญเรือง', 18488, 'วิศวกร', 'ส.ผลิต', '', 'Approve'),
(29, 'WORAWEEN', 'Neeyakorn', 'วรวีร์ นียากร', 90013679, 'วิศวกรสิ่งแวดล้อม', 'ส.พัฒนาองค์กรอย่างยั่งยืน', '', 'Approve'),
(30, 'CHAIYASA', 'Saadmuang', 'ชัยยันต์ สอาดม่วง', 90007291, 'วิศวกร', 'ส.เหมือง', '', 'Approve'),
(31, 'CHAWALIN', 'Nunthatraithip', 'ชวลิต นันทไตรทิพย์', 90030903, 'วิศวกร', 'ส.ซ่อมบำรุง', '', 'MOC'),
(32, 'LIKHITRO', 'Romporee', 'ลิขิต  ร่มโพรีย์', 140, 'วิศวกร', 'ส.ซ่อมบำรุง', '', 'Approve'),
(33, 'VAROTCHO', 'Chongsatapornpong', 'วรท  จงสถาพรพงษ์', 140, 'วิศวกร', 'ส.ซ่อมบำรุง', '', 'Approve'),
(34, 'CHANONKR', 'Krittpholchai', 'ชานนท์  กฤตผลชัย', 140, 'วิศวกร', 'ส.ผลิต', '', 'Approve'),
(35, 'CHOTIPONG', 'Thammachote', 'โชติพงศ์  ธรรมโชติ', 140, 'วิศวกร', 'ส.ผลิต', '', 'Approve'),
(36, 'VORAMETS', 'Suwanchompoo', 'วรเมตต์  สุวรรณชมภู', 140, 'วิศวกร', 'ส.ผลิต', '', 'Approve'),
(37, 'PORAMESJ', 'Chaichankul', 'ปรเมษฏ์  ใจบุญ', 140, 'วิศวกร', 'ส.ส่งเสริมการผลิต', '', 'Approve'),
(38, 'PAPARTPU', 'Puthom', 'ปภัทร  พุฒหอม', 140, 'วิศวกร', 'ส.เหมือง', '', 'Approve'),
(39, 'APICHJEE', 'Jeemsantia', 'อภิเชษฐ์  จีมสันเทียะ', 140, 'วิศวกร', 'ส.เหมือง', '', 'Approve'),
(40, 'JUTHAMAJ', 'Jitchuen', 'จุฑามาศ จิตต์ชื่น', 7841, 'วิศวกรสิ่งแวดล้อม', 'ส.พัฒนาองค์กรอย่างยั่งยืน', '', 'MOC'),
(41, 'RUNGROPO', 'Poolpanichuppatam', 'รุ่งโรจน์ พูลพานิชอุปถัมย์', 90013690, 'นักวิชาการความปลอดภัยและสิ่งแวดล้อม', 'ส.พัฒนาองค์กรอย่างยั่งยืน', '', 'MOC'),
(42, 'PANUVITS', 'Sasisart', 'ภานุวิทย์ ศศิศาสตร์', 13797, 'นักวิชาการความปลอดภัยและสิ่งแวดล้อม', 'ส.พัฒนาองค์กรอย่างยั่งยืน', '', 'Approve'),
(43, 'RENOOANU', 'Anumat', 'เรณู', 90009019, 'นักวิชาการสิ่งแวดล้อม', 'พัฒนาองค์กรอย่างยั่งยืน', 'ความปลอดภัยและสิ่งแวดล้อม', 'Manager'),
(44, 'ARTHITI', 'Pakorntrakul', 'อาทิตย์  ภากรตระกูล', 1270, 'ผู้ชำนาญการผลิตไฟฟ้า', '', 'Waste Heat Generator SKK', 'Project'),
(45, 'THAWATK', 'Klahan', 'ธวัช  กล้าหาญ', 140, 'จนท.เทคโนโลยีสารสนเทศ', 'น.กจก.', 'เทคโนโลยีสารสนเทศ', 'Project'),
(46, 'NIWABU', 'Bunchonrut', 'นิวัฒน์  บรรชรรัตน์', 140, 'ผู้ชำนาญการ TPM Promoter', 'น.กจก.', 'TPM Promoter', 'Project'),
(47, 'WORASNON', 'Nonsutee', 'วรสิทธิ์  นนท์สุธีย์', 140, 'ผู้ชำนาญการ TPM Promoter', 'น.กจก.', 'TPM Promoter', 'Project'),
(48, 'WECHAYMA', 'Manorut', 'เวชชยันต์  มโนรัตน์', 140, 'ผู้ชำนาญการ TPM Promoter', 'น.กจก.', 'TPM Promoter', 'Project'),
(49, 'SUKSUNB', 'Boonkemthong', 'สุขสันติ์  บุญเข็มทอง', 140, 'หน.สารบรรณโรงงาน', 'น.กจก.', 'สารบรรณ', 'Project'),
(50, 'SUDARUTP', 'Promsin', 'สุดารัตน์  พรหมศิลป์', 140, 'จนท.บุคคล', 'ส.การบุคคล', 'ปฏิบัติงานบุคคล', 'Project'),
(51, 'RUNGRUDT', 'Grobjinda', 'รุ่งฤดี  กรอบจินดา', 140, 'จนท.บุคคล', 'ส.การบุคคล', 'ปฏิบัติงานบุคคล', 'Project'),
(52, 'MANUNYOD', 'Ditcharoen', 'มนุญโญ  ดิษเจริญ', 140, 'จนท.บุคคล', 'ส.การบุคคล', 'พัฒนาพนักงาน', 'Project'),
(53, 'WATCHSUR', 'Suriyakositmongkol', 'วัชรสรณ์  สุริยะโฆษิตมงคล', 140, 'จนท.บุคคล', 'ส.การบุคคล', 'ปฏิบัติงานบุคคล', 'Project'),
(54, 'KRIENGKK', 'Kemwong', 'เกรียงไกร  เข็มวงษ์', 140, 'ผู้ชำนาญการซ่อมวัสดุทนไฟ', 'ส.ซ่อมบำรุง', 'บำรุงรักษาวัสดุทนไฟและงานบริการ', 'Project'),
(55, 'CHLIERMS', 'Songmongkan', 'เฉลิมพล  สองเมืองแก่น', 140, 'ผู้ชำนาญการซ่อมวัสดุทนไฟ', 'ส.ซ่อมบำรุง', 'บำรุงรักษาวัสดุทนไฟและงานบริการ', 'Project'),
(56, 'CHAYANAS', 'Siangsawat', 'ชยานันต์  เสียงสวัสดิ์', 140, 'ผู้ชำนาญการซ่อมเครื่องไฟฟ้า', 'ส.ซ่อมบำรุง', 'บำรุงรักษาเครื่องไฟฟ้าผลิตปูนเม็ดและเชื้อเพลิง KK 3-4', 'Project'),
(57, 'CHAIYPUN', 'Punimit', 'ชัยยะสิทธิ์  ผู้นิมิตต์', 140, 'ผู้ชำนาญซ่อมเครื่องกล', 'ส.ซ่อมบำรุง', 'บำรุงรักษาเครื่องจักรผลิตหิน', 'Project'),
(58, 'NAROSUN', 'Sungkasuk', 'ณรงค์  สังคะสุข', 140, 'ผู้ชำนาญการซ่อมเครื่องกล', 'ส.ซ่อมบำรุง', 'บำรุงรักษาเครื่องจักรผลิตไฟฟ้า WHG', 'Project'),
(59, 'NOPPAWAM', 'Mripadit', 'นพวัฒน์  ไม้ประดิษฐ์', 140, 'ผู้ชำนาญการซ่อมวัสดุทนไฟ', 'ส.ซ่อมบำรุง', 'บำรุงรักษาวัสดุทนไฟและงานบริการ', 'Project'),
(60, 'PARAMIAI', 'Aissara', 'ปรมินทร์  อิศรา', 140, 'ผู้ชำนาญการซ่อมเครื่องไฟฟ้า', 'ส.ซ่อมบำรุง', 'บำรุงรักษาเครื่องจักรจ่ายปูนซีเมนต์และไฟฟ้า', 'Project'),
(61, 'PRAMOTPR', 'Promma', 'ปราโมทย์  พรมมา', 140, 'ผู้ชำนาญการซ่อมเครื่องไฟฟ้า', 'ส.ซ่อมบำรุง', 'บำรุงรักษาเครื่องไฟฟ้าผลิตปูนซีเมนต์ KK3-4', ''),
(62, 'PIBOONW', 'Wongtham', 'พิบูลย์  วงศ์ธรรม', 140, 'ผู้ชำนาญการซ่อมเครื่องไฟฟ้า', 'ส.ซ่อมบำรุง', 'บำรุงรักษาเครื่องจักรผลิตไฟฟ้า WHG', ''),
(63, 'WINKLO', 'Klomchit', 'วินัย  กล่อมจิตต์', 140, 'ผู้ชำนาญการซ่อมเครื่องไฟฟ้า', 'ส.ซ่อมบำรุง', 'บำรุงรักษาเครื่องไฟฟ้าผลิตวัตถุดิบ', ''),
(64, 'SOMPORSI', 'Siriyom', 'สมพร  ศิริยม', 140, 'ผู้ชำนาญการซ่อมเครื่องกล', 'ส.ซ่อมบำรุง', 'บำรุงรักษาเครื่องจักร AFR และ Utility', ''),
(65, 'PETCHKAS', 'Kasorn', 'เพชรสิงห์  กาษร', 560, 'ผชก.บำรุงรักษาเครื่องจักร มอร์ตาร์', 'วิศวกรรมงานบำรุงรักษา', 'ส.ซ่อมบำรุงมอร์ตาร์ แก่งคอย', ''),
(66, 'PARKPOOR', 'Rahya', 'ภาคภูมิ  ระย้า', 560, 'ผชก.บำรุงรักษาเครื่องจักร มอร์ตาร์', 'วิศวกรรมงานบำรุงรักษา', 'ส.ซ่อมบำรุงมอร์ตาร์ แก่งคอย', ''),
(67, 'SURIYPO', 'Pounla', 'สุริยา  ปวนหล้า', 560, 'ผชก.ซ่อมบำรุง', '', 'ส.ซ่อมบำรุงมอร์ตาร์ แก่งคอย', ''),
(68, 'KEMMANUT', 'Thammatanawat', 'เขมณัฎฐ์  ธรรมาธนวัฒน์', 140, 'หน.ศูนย์ควบคุมการผลิต CCR3', 'ส.ผลิต', 'ผลิตปูนเม็ด KK5', ''),
(69, 'CHANANOS', 'Srikhum', 'ชณานพ  ศรีคำ', 140, 'ผู้ชำนาญการผลิต', 'ส.ผลิต', 'ผลิตถุงปูนซีเมนต์', ''),
(70, 'TASSAPOS', 'Srichart', 'ทัศพร  ศรีชาติ', 140, 'ผู้ชำนาญการผลิต', 'ส.ผลิต', 'ผลิตถุงปูนซีเมนต์', ''),
(71, 'TONGCHAT', 'Thongsakul', 'ธงชัย  ทองสกุล', 140, 'หน.ศูนย์ควบคุมการผลิต CCR3', 'ส.ผลิต', 'ผลิตปูนเม็ด KK5', ''),
(72, 'THAWTHI', 'Theanthong', 'ธวัฒน์  เทียรทอง', 140, 'หน.ศูนย์ควบคุมการผลิต CCR2', 'ส.ผลิต', 'ผลิตปูนเม็ด KK3', ''),
(73, 'NOPADONO', 'Nowpradit', 'นพดล  เนาว์ประดิษฐ์', 140, 'หน.ศูนย์ควบคุมการผลิต CCR1', 'ส.ผลิต', 'ผลิตปูนเม็ด KK6', ''),
(74, 'BANJONGY', 'Oiucharoen', 'บรรจง  อยู่เจริญ', 140, 'ผู้ชำนาญการผลิต', 'ส.ผลิต', 'บรรจุและจ่ายซิเมนต์ 1', ''),
(75, 'PRACHERS', 'Seela', 'ประเชิญ  สีลา', 140, 'ผู้ชำนาญการผลิต', 'ส.ผลิต', 'บริการลูกค้า', ''),
(76, 'PRAMANB', 'Boontepin', 'ประมาณ  บุญเตปิน', 140, 'ผู้ชำนาญการผลิต', 'ส.ผลิต', 'บรรจุและจ่ายซิเมนต์ 2-3', ''),
(77, 'PIBOSAM', 'Samajan', 'พิบูลย์  สมาจารย์', 140, 'หน.ศูนย์ควบคุมการผลิต CCR2', 'ส.ผลิต', 'ผลิตปูนเม็ด KK4', ''),
(78, 'PAITONIS', 'Nisasoka', 'ไพฑูรย์  นิสะโสกะ', 140, 'หน.ศูนย์ควบคุมการผลิต CCR2', 'ส.ผลิต', 'ผลิตปูนเม็ด KK3', ''),
(79, 'SAKCHAPO', 'Poaprachummuang', 'ศักดิ์ชาย  เป้าประจำเมือง', 140, 'หน.ศูนย์ควบคุมการผลิต CCR2', 'ส.ผลิต', 'ผลิตปูนเม็ด KK4', ''),
(80, 'SIVAKROK', 'Kruajploy', 'ศิวกรณ์  เครือพลอย', 140, 'ผู้ชำนาญการผลิต', 'ส.ผลิต', 'เตรียมวัตถุดิบและเชื้อเพลิง', ''),
(81, 'SOMCHATP', 'Chatpromrat', 'สมชาติ  ฉัตรพรมราช', 140, 'หน.ศูนย์ควบคุมการผลิต CCR3', 'ส.ผลิต', 'ผลิตปูนเม็ด KK5', ''),
(82, 'SOMPONIY', 'Niyabut', 'สมพร  นิยบุตร', 140, 'หน.ศูนย์ควบคุมการผลิต CCR2', 'ส.ผลิต', 'ผลิตปูนเม็ด KK3', ''),
(83, 'SINGTOTU', 'Tuampudza', 'สิงห์ทอง  ท่วมพุดซา', 140, 'ผู้ชำนาญการผลิต', 'ส.ผลิต', 'บริการลูกค้า', ''),
(84, 'SUTHIPNA', 'Nawaphan', 'สุทธิพงษ์  นวพันธุ์', 140, 'ผู้ชำนาญการผลิต', 'ส.ผลิต', 'เตรียมวัตถุดิบและเชื้อเพลิง', ''),
(85, 'SUTET', 'Thonglor', 'สุธีย์  ทองหล่อ', 140, 'หน.ศูนย์ควบคุมการผลิต CCR1', 'ส.ผลิต', 'ผลิตปูนเม็ด KK6', ''),
(86, 'SAKESUNN', 'Nuchana', 'เสกสรรค์  นุชนา', 140, 'หน.ศูนย์ควบคุมการผลิต CCR2', 'ส.ผลิต', 'ผลิตปูนเม็ด KK4', ''),
(87, 'AUDTHACJ', 'Jaisangiam', 'อรรถไชย  ใจเสงี่ยม', 140, 'ผู้ชำนาญการผลิต', 'ส.ผลิต', 'พัฒนาพลังงานและวัตถุดิบ', ''),
(88, 'ARKOCO', 'Commapol', 'อาคม  คำมาพล', 140, 'หน.ศูนย์ควบคุมการผลิต CCR3', 'ส.ผลิต', 'ผลิตปูนเม็ด KK5', ''),
(89, 'DUANGTRR', 'Krengkrat', 'นางดวงตรา  เคร่งครัด', 140, 'จนท.บริหารระบบคุณภาพ', 'ส.พัฒนาองค์กรอย่างยั่งยืน', 'ระบบบริหารคุณภาพ', ''),
(90, 'UBOLSRIP', 'Promvechyanon', 'นางอุบลศรี  พรหมเวชยานนท์', 140, 'จนท.ชุมชนและรัฐกิจสัมพันธ์', 'ส.พัฒนาองค์กรอย่างยั่งยืน', 'ชุมชนและรัฐกิจสัมพันธ์', ''),
(91, 'NARONAN', 'Angkratok', 'นายณรงค์  อังกระโทก', 140, 'จนท.ชุมชนและรัฐกิจสัมพันธ์', 'ส.พัฒนาองค์กรอย่างยั่งยืน', 'ชุมชนและรัฐกิจสัมพันธ์', ''),
(92, 'PICHAI', 'Chaiman', 'นายพิสิฐ  ใจมั่น', 140, 'จนท.ชุมชนและรัฐกิจสัมพันธ์', 'ส.พัฒนาองค์กรอย่างยั่งยืน', 'ชุมชนและรัฐกิจสัมพันธ์', ''),
(93, 'WITAWAKR', 'Krapun', 'นายวิทวัส  กระพันธ์', 140, 'จนท.ชุมชนและรัฐกิจสัมพันธ์', 'ส.พัฒนาองค์กรอย่างยั่งยืน', 'ชุมชนและรัฐกิจสัมพันธ์', ''),
(94, 'SUKANYAW', 'Wareesri', 'นางสุกัญญา  วารีศรี', 560, 'จนท.ชุมชนและรัฐกิจสัมพันธ์', 'ส.พัฒนาองค์กรอย่างยั่งยืน', 'ชุมชนและรัฐกิจสัมพันธ์', ''),
(95, 'UDOMLUKS', 'Soonpayanoon', 'นางอุดมลักษณ์  สูนพยานนท์', 140, 'ผู้ชำนาญการส่งเสริมการผลิต', 'ส.ส่งเสริมการผลิต', 'วิเคราะห์เคมีและเอ๊กซ์เรย์', ''),
(96, 'KIRATIC', 'Coycasame', 'กีรติ  คอยเกษม', 140, 'ผู้ชำนาญการส่งเสริมการผลิต', 'ส.ส่งเสริมการผลิต', 'วิเคราะห์เคมีและเอ๊กซ์เรย์', ''),
(97, 'BANDISU', 'Supalert', 'บัณฑิต  ศุภเลิศ', 140, 'ผู้ชำนาญการส่งเสริมการผลิต', 'ส.ส่งเสริมการผลิต', 'สนับสนุนการตลาด', ''),
(98, 'PIPOPA', 'Arunrat', 'พิภพ  อรุณรัตน์', 140, 'ผู้ชำนาญการส่งเสริมการผลิต', 'ส.ส่งเสริมการผลิต', 'ควบคุมกรรมวิธีการผลิต 2', ''),
(99, 'SUMPUNK', 'Kiewnoi', 'สัมพันธ์  เขียวน้อย', 140, 'ผู้ชำนาญการส่งเสริมการผลิต', 'ส.ส่งเสริมการผลิต', 'จัดหาและพัสดุวัตถุดิบ', ''),
(100, 'ITTIPOPO', 'Pornanake', 'อิทธิพล  พรเอนก', 140, 'ผู้ชำนาญการส่งเสริมการผลิต', 'ส.ส่งเสริมการผลิต', 'Mixing Plant', ''),
(101, 'CHAMNACH', 'Chingdee', 'นายชำนาญ  จริงดี', 560, 'ผชก.ส่งเสริมการผลิต', 'ส.ส่งเสริมการผลิตมอร์ตาร์ แก่งคอย', '', ''),
(102, 'MANOOND', 'Deesungnoen', 'นายมานนท์  ดีสูงเนิน', 560, 'ผชก.ควบคุมคุณภาพ', 'ส.ส่งเสริมการผลิตมอร์ตาร์ แก่งคอย', 'ควบคุมคุณภาพ', ''),
(103, 'GAROONS', 'Srisung', 'การุณ  ศรีสังข์', 140, 'ผู้ชำนาญการเหมือง', 'ส.เหมือง', 'ตักและขนส่ง', ''),
(104, 'KHUNRAIJ', 'Jumpangam', 'ขวัญไร่  จำปางาม', 140, 'ผู้ชำนาญการเหมือง', 'ส.เหมือง', 'ผลิตหินก่อนย่อย', ''),
(105, 'WICHANI', 'Nilgaew', 'วิชัย  นิลแก้ว', 140, 'ผู้ชำนาญการเหมือง', 'ส.เหมือง', 'ซ่อมเครื่องจักรกลเหมือง', ''),
(106, 'SOMCHKOS', 'Kosinglang', 'สมชาย  ขอสินกลาง', 140, 'ผู้ชำนาญการเหมือง', 'ส.เหมือง', 'พัฒนาและฟื้นฟูเหมือง', ''),
(107, 'SAICHKON', 'Kongsakool', 'สายชล  กองสกูล', 140, 'ผู้ชำนาญการเหมือง', 'ส.เหมือง', 'ย่อยหิน', ''),
(108, 'SANGDUAS', 'Sriwong', 'แสงเดือน  ศรีวงษ์', 140, 'ผู้ชำนาญการเหมือง', 'ส.เหมือง', 'วางแผนงานเหมืองและพัฒนาพนักงาน', ''),
(109, 'WONGRAPR', 'Rutjanachot', 'วงศ์รพี  รุจนโชติ', 140, 'ผจก.TPM Promoter', 'น.กจก.', 'TPM Promoter', 'Approve'),
(110, 'NOLPLUWA', 'Pluwangkarn', 'นล  พลูวังกาญจน์', 140, 'ผจก.ปฏิบัติงานบุคคล', 'ส.การบุคคล', 'ปฏิบัติงานบุคคล', 'Approve'),
(111, 'PRAYOOKI', 'Kijja', 'ประยูร  กิจจะ', 140, 'ผจก.ธุรการโรงงานและบริการกลาง', 'ส.การบุคคล', 'ธุรการโรงงานและบริการกลาง', 'Approve'),
(112, 'SOMMAIN', 'Neammuag', 'สมหมาย  เนียมหมวก', 140, 'ผจก.ประจำส่วนการบุคคล', 'ส.การบุคคล', '', 'Approve'),
(113, 'KRAISORT', 'Tananyai', 'ไกรสร  ทนานใหญ่', 140, 'ผจก.ตรวจและวิเคราะห์สภาพเครื่องจักรผลิตและจ่ายปูนซ', 'ส.ซ่อมบำรุง', 'Measurement and Analysis', 'Approve'),
(114, 'JETARNAR', 'Rangseepanjapong', 'เจตอนันท์  รังสีปัญจพงษ์', 140, 'ผจก.บำรุงรักษาเครื่องจักรผลิตปูนเม็ดและเชื่อเพลิง ', 'ส.ซ่อมบำรุง', 'บำรุงรักษาเครื่องจักรผลิตปูนเม็ดและเชื้อเพลิง KK5-6', 'Approve'),
(115, 'CHERTCHC', 'Chumburut', 'เชิดชัย  ฉ่ำบุรุษ', 140, 'ผจก.บำรุงรักษาเครื่องจักร AFR และ Utility', 'ส.ซ่อมบำรุง', 'บำรุงรักษาเครื่องจักร AFR และ Utility', 'Approve'),
(116, 'NARONGDS', 'Suebchueawong', 'ณรงค์เดช  สืบเชื้อวงค์', 140, 'ผจก.บำรุงรักษาวัสดุทนไฟและงานบริการ', 'ส.ซ่อมบำรุง', 'บำรุงรักษาวัสดุทนไฟและงานบริการ', 'Approve'),
(117, 'PRASENK', 'Senkram', 'ประหยัด  เสนคราม', 140, 'ผจก.บำรุงรักษาเครื่องไฟฟ้าผลิตวัตถุดิบ', 'ส.ซ่อมบำรุง', 'บำรุงรักษาเครื่องไฟฟ้าผลิตวัตถุดิบ', 'Approve'),
(118, 'PREEKATH', 'Kathom', 'ปรีชา  เกตุหอม', 140, 'ผจก.บำรุงรักษาเครื่องจักรผลิตปูนเม็ดและเชื้อเพลิงK', 'ส.ซ่อมบำรุง', 'บำรุงรักษาเครื่องจักรผลิตปูนเม็ดและเชื้อเพลิง KK3-4', 'Approve'),
(119, 'PITSANUP', 'Peamputchana', 'พิษณุ  เปี่ยมพืชนะ', 140, 'ผจก.วางแผนและควบคุม', 'ส.ซ่อมบำรุง', 'วางแผนและควบคุม', 'Approve'),
(120, 'PAIBOPIN', 'Pingkhokruat', 'ไพบูลย์  เพียงโคกกรวด', 140, 'ผจก.บำรุงรักษาเครื่องจักรผลิตหิน', 'ส.ซ่อมบำรุง', 'บำรุงรักษาเครื่องจักรผลิตหิน', 'Approve'),
(121, 'MONCHAVO', 'Vongsee', 'มนต์ชัย  วงษ์ศรี', 140, 'ผจก.บำรุงรักษาเครื่องไฟฟ้าผลิตหินและระบบไฟฟ้า', 'ส.ซ่อมบำรุง', 'บำรุงรักษาเครื่องไฟฟ้าผลิตหินและระบบไฟฟ้า', 'Approve'),
(122, 'WICHACH', 'Chaisiri', 'วิชัย  ชัยศิริ', 140, 'ผจก.ตรวจและวิเคราะห์สภาพเครื่องจักรผลิตปูนเม็ด KK3', 'ส.ซ่อมบำรุง', 'Measurement and Analysis KK3-4', 'Approve'),
(123, 'WITAWITJ', 'Junna', 'วิธวิทย์  จันนา', 140, 'ผจก.บำรุงรักษาเครื่องจักรผลิตไฟฟ้า WHG', 'ส.ซ่อมบำรุง', 'บำรุงรักษาเครื่องจักรผลิตไฟฟ้า WHG', 'Approve'),
(124, 'WIWPRA', 'Prathomrung', 'วิวัฒน์  ประทุมรุ่ง', 140, 'ผจก.บำรุงรักษาเครื่องไฟฟ้าผลิตปูนเม็ดและเชื้อเพลิง', 'ส.ซ่อมบำรุง', 'บำรุงรักษาเครื่องไฟฟ้าผลิตปูนเม็ดและเชื้อเพลิง KK 3-4', 'Approve'),
(125, 'SOMBAYO', 'Yongkasan', 'สมบัติ  ยงกระสัน', 140, 'ผจก.บำรุงรักษาเครื่องไฟฟ้าผลิตปูนเม็ดและเชื้อเพลิง', 'ส.ซ่อมบำรุง', 'บำรุงรักษาเครื่องไฟฟ้าผลิตปูนเม็ดและเชื้อเพลิง KK 5-6', 'Approve'),
(126, 'SACORNP', 'Puwongsa', 'สาคร  ภู่วงค์ษา', 140, 'ผจก.ตรวจและวิเคราะห์สภาพเครื่องจักรผลิตปูนเม็ดKK5-', 'ส.ซ่อมบำรุง', 'Measurement and Analysis KK5-6', 'Approve'),
(127, 'SATITSU', 'Suvannasri', 'สาธิต  สุวรรณศรี', 140, 'ผจก.บำรุงรักษาเครื่องจักรผลิตวัตถุดิบ', 'ส.ซ่อมบำรุง', '', ''),
(128, 'PRATUENE', 'Eamsaard', 'ประเทือง  เอี่ยมสอาด', 140, 'ผจก.ผลิตถุงปูนซีเมนต์', 'ส.ผลิต', 'ผลิตถุงปูนซีเมนต์', ''),
(129, 'PRASIPH', 'Phongpaew', 'ประสิทธิ์  ผ่องแผ้ว', 140, 'ผจก.บรรจุและจ่ายซิเมนต์ 1', 'ส.ผลิต', 'บรรจุและจ่ายซิเมนต์ 1', ''),
(130, 'PAIBOOKL', 'Klumsakul', 'ไพบูลย์  กล่ำสกุล', 140, 'ผจก.บรรจุและจ่ายซิเมนต์ 2-3', 'ส.ผลิต', 'บรรจุและจ่ายซิเมนต์ 2-3', ''),
(131, 'MONTREPR', 'Prasertpon', 'มนตรี  ประเสริฐผล', 140, 'ผจก.บริการลูกค้า', 'ส.ผลิต', 'บริการลูกค้า', ''),
(132, 'VINASA', 'Saybua', 'วินัย  สายบัว', 140, 'ผจก.ผลิต ดูแลงานผลิตปูนเม็ด KK3', 'ส.ผลิต', 'ผลิตปูนเม็ด KK3', ''),
(133, 'WIRAJE', 'Jaengsam', 'วิรัตน์  แจ้งเสม', 140, 'ผจก.เทคนิค-อุตสาหกรรม', 'ส.ผลิต', 'พัฒนาพลังงานและวัตถุดิบ', ''),
(134, 'PHONCHNE', 'Ngamsombat', 'นายพรชัย  งามสมบัติ', 560, 'ผจก.กระบวนการผลิต 1', 'ส.ผลิตมอร์ตาร์ แก่งคอย', 'กระบวนการผลิต 1', ''),
(135, 'PORNNAMA', 'Nama', 'นายพรชัย  นะมา', 560, 'ผจก.กระบวนการผลิต 3', 'ส.ผลิตมอร์ตาร์ แก่งคอย', 'กระบวนการผลิต 3', ''),
(136, 'PICHITTH', 'Thongaram', 'พิชิต  ทองอร่าม', 140, 'ผจก.ความปลอดภัยและอาชีวอนามัย', 'ส.พัฒนาองค์กรอย่างยั่งยืน', 'ความปลอดภัยและอาชีวอนามัย', ''),
(137, 'PANUWATK', 'Khumsai', 'ภานุวัฒน์  คำใสย', 140, 'ผจก.ชุมชนและรัฐกิจสัมพันธ์', 'ส.พัฒนาองค์กรอย่างยั่งยืน', 'ชุมชนและรัฐกิจสัมพันธ์', 'MOC'),
(138, 'SURAPONT', 'Theinngen', 'สุรพงศ์  เทียนเงิน', 140, 'ผจก.สิ่งแวดล้อม', 'ส.พัฒนาองค์กรอย่างยั่งยืน', 'สิ่งแวดล้อม', ''),
(139, 'SONGPOLS', 'Saithong', 'ทรงพล  ไทรทอง', 140, 'ผจก.วิเคราะห์เคมีและเอ๊กซ์เรย์', 'ส.ส่งเสริมการผลิต', 'วิเคราะห์เคมีและเอ๊กซ์เรย์', ''),
(140, 'TAWANC', 'Chitamorn', 'เทวัน  ชิตามร', 140, 'ผจก.ควบคุมกรรมวิธีการผลิต 2', 'ส.ส่งเสริมการผลิต', 'ควบคุมกรรมวิธีการผลิต 2', ''),
(141, 'NAKROBL', 'Limmanee', 'นักรบ  ลิ้มมณี', 140, 'ผจก.จัดหาและพัสดุวัตถุดิบ', 'ส.ส่งเสริมการผลิต', 'จัดหาและพัสดุวัตถุดิบ', ''),
(142, 'RUANGSAW', 'Wongphimol', 'เรืองศักดิ์  วงพิมล', 140, 'ผจก.ควบคุมกรรมวิธีการผลิต 1', 'ส.ส่งเสริมการผลิต', 'ควบคุมกรรมวิธีการผลิต 1', ''),
(143, 'SAYANW', 'Waleekiattikul', 'สายันห์  วลีเกียรติกุล', 140, 'ผจก.ควบคุมกรรมวิธีการผลิต 3', 'ส.ส่งเสริมการผลิต', 'ควบคุมกรรมวิธีการผลิต 3', ''),
(144, 'SUDETR', 'Ruengratwanichaya', 'สุเดช  เรืองรัตน์วณิชยา', 140, 'ผจก.ทดสอบฟิสิกส์', 'ส.ส่งเสริมการผลิต', 'ทดสอบฟิสิกส์', ''),
(145, 'SUVATCHS', 'Saehoon', 'สุวัจชัย  แซ่หุ่น', 140, 'ผจก.พัสดุอะไหล่และทั่วไป', 'ส.ส่งเสริมการผลิต', 'พัสดุอะไหล่และทั่วไป', ''),
(146, 'CHATREP', 'Plodprong', 'ชาตรี  ปลอดโปร่ง', 140, 'ผจก.วางแผนงานเหมืองและพัฒนาพนักงาน', 'ส.เหมือง', 'วางแผนงานเหมืองและพัฒนาพนักงาน', ''),
(147, 'THAWORNS', 'Sriwilai', 'ถาวร  ศรีวิลัย', 140, 'ผจก.ผลิตหินก่อสร้าง', 'ส.เหมือง', 'ผลิตหินก่อสร้าง', ''),
(148, 'PITAKC', 'Chanphibarn', 'พิทักษ์  จันทร์ภิบาล', 140, 'ผจก.ตักและขนส่ง', 'ส.เหมือง', 'ตักและขนส่ง', ''),
(149, 'SOMBOOKR', 'Krengkrud', 'สมบูรณ์  เคร่งครัด', 140, 'ผจก.พัฒนาและฟื้นฟูเหมือง', 'ส.เหมือง', 'พัฒนาและฟื้นฟูเหมือง', ''),
(150, 'ARAKC', 'Chiwarak', 'อารักษ์  ชิวารักษ์', 140, 'ผจก.ย่อยหิน', 'ส.เหมือง', 'ย่อยหิน', ''),
(151, 'NOLPLUWA', 'Pluwangkarn', 'นล พลูวังกาญจน์', 926, 'ผจก.ปฏิบัติงานบุคคล', 'ส.การบุคคล', 'ปฏิบัติงานบุคคล', ''),
(152, 'PRASITT', 'Thongthavonsuwan', 'ประสิทธิ์ ธงถาวรสุวรรณ', 90011754, 'ผจก.แรงงานสัมพันธ์', 'ส.การบุคคล', 'แรงงานสัมพันธ์', ''),
(153, '', 'Phucharoensilp', 'ศุภกิจ ภู่เจริญศิลป์', 140, 'ผู้จัดการส่วนผลิต', 'ส.ผลิต', '', ''),
(154, 'KRIANGSC', 'Sangawong', 'นเรศ สง่าวงค์', 140, 'ผู้จัดการส่วนซ่อมบำรุง', 'ส.ซ่อมบำรุง', '', ''),
(155, 'WIYADAW', 'Sunphetsiri', 'ประพันธ์ สรรเพชรศิริ', 140, 'ผจส.เหมือง', 'ส.เหมือง', '', ''),
(156, 'YODSAKS', 'Intarode', 'ณัฐวุฒิ อินทรส', 140, 'ผจส.ส่งเสริมการผลิต', 'ส.ส่งเสริมการผลิต', '', ''),
(157, 'PASSAKOH', 'Yopinta', 'ประทีป โยปินตา', 140, 'ผจส.พัฒนาองค์กรอย่างยั่งยืน', 'ส.พัฒนาองค์กรอย่างยั่งยืน', '', 'MOC'),
(158, 'SIRIMONT', 'Charoenwongphet', 'ทนงเกียรติ เจริญวงค์เพ็ชร์', 140, 'ผจส.การบุคคล', 'ส.การบุคคล', '', ''),
(159, 'JOR.JITP', 'Panichakul', 'จ.จิตติ พานิชกุล', 10001841, 'วิศวกรอาวุโส - Gear specialist', 'ส.ซ่อมบำรุง', '', ''),
(160, 'KRIANGSC', 'Chunchuenjit', 'เกรียงศักดิ์ ฉุนชื่นจิตต์', 90000806, 'วิศวกรอาวุโส', 'ส.ผลิต', '', 'MOC'),
(161, 'WIYADAW', 'Nunthatraithip', 'วิยะดา', 90000834, 'วิศวกรอาวุโส', 'น.กจก.', '-', 'ADMIN'),
(162, 'YODSAKS', 'Sombutareepanich', 'ยอดศักดิ์ สมบัติอารีพาณิช', 90001953, 'วิศวกรอาวุโส', 'ส.ซ่อมบำรุง', '', ''),
(163, 'PASSAKOH', 'Huttakum', 'ภาสกร หัตถกรรม', 90002798, 'วิศวกรอาวูโส', 'ส.ผลิต', '', ''),
(164, 'SIRIMONT', 'Tummarak', 'ศิริมงคล ธรรมรักษ์', 90003255, 'วิศวกรอาวุโส', 'ส.ผลิต', '', ''),
(165, 'admin', '1234', 'vipawee', 15575, 'kmutnb', 'IT', 'D', 'ADMIN'),
(168, 'ADUTO', 'Tongprasom', 'อดุลย์ ทองประสม', 12834, 'วิศวกร', 'ส.ผลิต', '', 'Approve');

-- --------------------------------------------------------

--
-- Table structure for table `facilities`
--

CREATE TABLE `facilities` (
  `Facilities_ID` varchar(10) NOT NULL,
  `Facilities_name` varchar(100) CHARACTER SET utf8 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `facilities`
--

INSERT INTO `facilities` (`Facilities_ID`, `Facilities_name`) VALUES
('F1', 'อาคารเครื่องจักร,ทางเข้า-ออกของบันไดทางหนีไฟ,ระบบดับเพลิง'),
('F2', 'ระบบท่อก๊าซ,ระบบไฟฟ้า,ระบบลมอัดอากาศ(Compressed Air),ระบบน้ำ,รางระบายน้ำ');

-- --------------------------------------------------------

--
-- Table structure for table `ipm`
--

CREATE TABLE `ipm` (
  `IPM_ID` varchar(10) NOT NULL,
  `IPM_name` varchar(100) CHARACTER SET utf8mb4 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ipm`
--

INSERT INTO `ipm` (`IPM_ID`, `IPM_name`) VALUES
('I1', 'มีการพิจารณาผ่านIPM');

-- --------------------------------------------------------

--
-- Table structure for table `moc`
--

CREATE TABLE `moc` (
  `MOC_ID` int(20) NOT NULL,
  `MOC_Approve_ID` int(100) NOT NULL,
  `Choice_ID` int(20) NOT NULL,
  `Result_ID` int(20) NOT NULL,
  `Comment` varchar(100) COLLATE utf8mb4_unicode_520_ci DEFAULT NULL,
  `Status_ID` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_520_ci;

--
-- Dumping data for table `moc`
--

INSERT INTO `moc` (`MOC_ID`, `MOC_Approve_ID`, `Choice_ID`, `Result_ID`, `Comment`, `Status_ID`) VALUES
(1, 3, 1, 1, 'asdsadzxcx', 8),
(2, 4, 2, 2, 'cxcxzcxzcxzc', 8),
(3, 2, 3, 3, 'dsadsadxzc', 8),
(4, 41, 4, 4, 'sadsad', 8),
(5, 40, 5, 5, 'ghjgfhgfh', 8),
(6, 157, 6, 6, 'asdsdzxczxc', 8),
(7, 137, 7, 7, 'xzcxzcvcasd', 8),
(8, 3, 1, 8, NULL, 3),
(9, 4, 2, 9, NULL, 3),
(10, 160, 3, 10, NULL, 3),
(11, 41, 4, 11, NULL, 3),
(12, 40, 5, 12, NULL, 3),
(13, 157, 6, 13, NULL, 3),
(14, 137, 7, 14, NULL, 3);

-- --------------------------------------------------------

--
-- Table structure for table `project`
--

CREATE TABLE `project` (
  `Project_ID` int(100) NOT NULL COMMENT 'รหัสโครงการ',
  `Project_name` varchar(100) CHARACTER SET utf8 NOT NULL COMMENT 'ชื่อโครงการ',
  `Project_Date` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP COMMENT 'วันที่เขียนโครงการ',
  `Project_Startdate` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `Project_Enddate` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `Project_Process` varchar(100) CHARACTER SET utf8 NOT NULL,
  `Project_Machine` varchar(100) CHARACTER SET utf8 NOT NULL,
  `Project_Place` varchar(100) CHARACTER SET utf8 NOT NULL,
  `Project_Reason` varchar(100) CHARACTER SET utf8 NOT NULL,
  `Project_Howto` varchar(100) CHARACTER SET utf32 NOT NULL,
  `Project_Risk` varchar(100) CHARACTER SET utf8 NOT NULL,
  `User_ID` int(100) NOT NULL,
  `Status_ID` varchar(10) COLLATE utf8mb4_unicode_520_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_520_ci;

--
-- Dumping data for table `project`
--

INSERT INTO `project` (`Project_ID`, `Project_name`, `Project_Date`, `Project_Startdate`, `Project_Enddate`, `Project_Process`, `Project_Machine`, `Project_Place`, `Project_Reason`, `Project_Howto`, `Project_Risk`, `User_ID`, `Status_ID`) VALUES
(1, 'adasdasd', '2017-11-20 00:52:24', '2017-11-08 17:00:00', '2017-11-23 17:00:00', 'asdsadsadsaad', 'sadsad', 'sadasdsa', 'dasdsada', 'asdasdasd', 'ปานกลาง', 3, '7'),
(427, 'asdasd', '2017-11-20 01:23:28', '2017-10-31 17:00:00', '2017-11-22 17:00:00', 'asdasdad', 'asdsadsd', 'adasdsa', 'adasd', 'sdasdasd', 'ปานกลาง', 1, '1');

-- --------------------------------------------------------

--
-- Table structure for table `project_detail`
--

CREATE TABLE `project_detail` (
  `Detail_ID` int(100) NOT NULL,
  `Project_ID` varchar(20) COLLATE utf8mb4_unicode_520_ci NOT NULL,
  `Type_Project` varchar(100) COLLATE utf8mb4_unicode_520_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_520_ci;

--
-- Dumping data for table `project_detail`
--

INSERT INTO `project_detail` (`Detail_ID`, `Project_ID`, `Type_Project`) VALUES
(1, '1', 'asdsad'),
(2, '1', 'F2'),
(4, '427', 'adad'),
(5, '427', 'T6');

-- --------------------------------------------------------

--
-- Table structure for table `result`
--

CREATE TABLE `result` (
  `result_ID` int(100) NOT NULL,
  `Result` varchar(10) CHARACTER SET utf8 NOT NULL,
  `Result_Benefit` varchar(200) CHARACTER SET utf8 NOT NULL,
  `Result_Effect` varchar(200) CHARACTER SET utf8 NOT NULL,
  `Result_Solution` varchar(200) CHARACTER SET utf8 NOT NULL,
  `Result_File` varbinary(300) NOT NULL,
  `Project_ID` varchar(10) CHARACTER SET latin1 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_520_ci;

--
-- Dumping data for table `result`
--

INSERT INTO `result` (`result_ID`, `Result`, `Result_Benefit`, `Result_Effect`, `Result_Solution`, `Result_File`, `Project_ID`) VALUES
(1, 'ไม่มีผล', '', '', '', 0x66696c652f313533323239, '1'),
(2, 'ไม่มีผล', '', '', '', 0x66696c652f313533323239, '1'),
(3, 'ไม่มีผล', '', '', '', 0x66696c652f313533323239, '1'),
(4, 'มีผล', 'ad', 'sadasda', 'sdsad', 0x66696c652f313533323239, '1'),
(5, 'ไม่มีผล', '', '', '', 0x66696c652f313533323239, '1'),
(6, 'ไม่มีผล', '', '', '', 0x66696c652f313533323239, '1'),
(7, 'ไม่มีผล', '', '', '', 0x66696c652f313533323239, '1'),
(8, 'ไม่มีผล', '', '', '', 0x66696c652f3433373032, '426'),
(9, 'ไม่มีผล', '', '', '', 0x66696c652f3433373032, '426'),
(10, 'ไม่มีผล', '', '', '', 0x66696c652f3433373032, '426'),
(11, 'ไม่มีผล', '', '', '', 0x66696c652f3433373032, '426'),
(12, 'ไม่มีผล', '', '', '', 0x66696c652f3433373032, '426'),
(13, 'ไม่มีผล', '', '', '', 0x66696c652f3433373032, '426'),
(14, 'ไม่มีผล', '', '', '', 0x66696c652f3433373032, '426');

-- --------------------------------------------------------

--
-- Table structure for table `status`
--

CREATE TABLE `status` (
  `status_ID` int(100) NOT NULL,
  `status_name` varchar(100) CHARACTER SET utf8 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `status`
--

INSERT INTO `status` (`status_ID`, `status_name`) VALUES
(1, 'Draft'),
(2, 'รอพิจารณาขอบเขต'),
(3, 'รอพิจารณาเบื้องต้น'),
(4, 'รอพิจารณาโดย MOC Expert'),
(5, 'รอพิจารณาอนุมัติในหลักการ'),
(6, 'Denied'),
(7, 'On Progress'),
(8, 'รออนุมัติ PSSR'),
(9, 'Completed');

-- --------------------------------------------------------

--
-- Table structure for table `technology`
--

CREATE TABLE `technology` (
  `Technology_ID` varchar(10) NOT NULL,
  `Technology_Name` varchar(100) CHARACTER SET utf8 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `technology`
--

INSERT INTO `technology` (`Technology_ID`, `Technology_Name`) VALUES
('T1', 'เครื่องจักรเดิมที่มีอยู่หรือเครื่องผลิตไอน้ำและบดเชื้อเพลิง'),
('T2', 'ติดตั้ง/เพิ่มเติม เพื่อเปลี่ยนแปลงการผลิต,เพิ่ม Capacity เครื่องจักร'),
('T3', 'เปลี่ยนแปลงระบบ Safety & Sequence Interlock'),
('T4', 'เปลี่ยนวัตถุดิบเชื้อเพลิง , waste AF AR,สารเคมี,ตัวเร่งปฏิกิริยา'),
('T5', 'เปลี่ยนแปลงวัตถุระเบิด,บรรจุภัณฑ์'),
('T6', 'วิธีการปฏิบัติงาน,ผลิตภัณฑ์ลอยได้และของเสีย');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `approve`
--
ALTER TABLE `approve`
  ADD PRIMARY KEY (`Approve_ID`);

--
-- Indexes for table `employee`
--
ALTER TABLE `employee`
  ADD PRIMARY KEY (`User_ID`);

--
-- Indexes for table `facilities`
--
ALTER TABLE `facilities`
  ADD PRIMARY KEY (`Facilities_ID`);

--
-- Indexes for table `ipm`
--
ALTER TABLE `ipm`
  ADD PRIMARY KEY (`IPM_ID`),
  ADD UNIQUE KEY `IPM_ID` (`IPM_ID`);

--
-- Indexes for table `moc`
--
ALTER TABLE `moc`
  ADD PRIMARY KEY (`MOC_ID`);

--
-- Indexes for table `project`
--
ALTER TABLE `project`
  ADD PRIMARY KEY (`Project_ID`);

--
-- Indexes for table `project_detail`
--
ALTER TABLE `project_detail`
  ADD PRIMARY KEY (`Detail_ID`);

--
-- Indexes for table `result`
--
ALTER TABLE `result`
  ADD PRIMARY KEY (`result_ID`);

--
-- Indexes for table `technology`
--
ALTER TABLE `technology`
  ADD PRIMARY KEY (`Technology_ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `approve`
--
ALTER TABLE `approve`
  MODIFY `Approve_ID` int(100) NOT NULL AUTO_INCREMENT COMMENT 'รหัสการอนุมัติ', AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `employee`
--
ALTER TABLE `employee`
  MODIFY `User_ID` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=171;
--
-- AUTO_INCREMENT for table `moc`
--
ALTER TABLE `moc`
  MODIFY `MOC_ID` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
--
-- AUTO_INCREMENT for table `project`
--
ALTER TABLE `project`
  MODIFY `Project_ID` int(100) NOT NULL AUTO_INCREMENT COMMENT 'รหัสโครงการ', AUTO_INCREMENT=428;
--
-- AUTO_INCREMENT for table `project_detail`
--
ALTER TABLE `project_detail`
  MODIFY `Detail_ID` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `result`
--
ALTER TABLE `result`
  MODIFY `result_ID` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
