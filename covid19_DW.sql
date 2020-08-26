-- phpMyAdmin SQL Dump
-- version 4.9.4
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Aug 26, 2020 at 07:10 AM
-- Server version: 5.6.48-cll-lve
-- PHP Version: 7.3.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `covid19_DW`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(150) NOT NULL,
  `name` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `email`, `password`, `name`) VALUES
(1, 'admin@covid19-checker.com', '8bb0cf6eb9b17d0f7d22b456f121257dc1254e1f01665370476383ea776df414', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `answer`
--

CREATE TABLE `answer` (
  `id` int(11) NOT NULL,
  `gender` varchar(30) NOT NULL,
  `age` varchar(30) NOT NULL,
  `diseases` varchar(1000) NOT NULL,
  `smoker` varchar(30) NOT NULL,
  `city` varchar(1000) NOT NULL,
  `cough` varchar(30) NOT NULL,
  `temp` varchar(30) NOT NULL,
  `breath` varchar(30) NOT NULL,
  `illness_person` varchar(30) NOT NULL,
  `name` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `phoneno` varchar(12) NOT NULL,
  `payment_status` enum('no','yes') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `answer`
--

INSERT INTO `answer` (`id`, `gender`, `age`, `diseases`, `smoker`, `city`, `cough`, `temp`, `breath`, `illness_person`, `name`, `email`, `phoneno`, `payment_status`) VALUES
(1, 'Male', '0-33 years old', 'Respiratory system disease ( e.g. asthma)', 'Yes', 'China', 'yes', 'No', 'No', 'No', 'Valmir', 'valmir@oeue.com', '8282772', 'no'),
(2, 'Male', '0-33 years old', 'No', 'Yes', 'No', 'yes', 'No', 'No', '', 'valmri', 'ksagdhfkj@kjsfdh.com', '82397409', 'no'),
(3, 'Male', '0-33 years old', 'No', 'Yes', 'No', 'yes', 'No', 'No', '', 'ksdah', 'v@kdjfh.com', '3490578', 'no'),
(4, 'Male', '0-33 years old', 'No', 'Yes', 'No', 'No', 'No', 'No', '', 'Ram', 'ram@gmail.com', '7458868452', 'no'),
(5, 'Male', '0-33 years old', 'No', 'Yes', 'No', 'No', 'No', 'No', '', 'test', 'test@gmail.com', '328772382', 'no'),
(6, 'Male', '0-33 years old', 'No', 'Yes', 'No', 'No', 'No', 'No', '', 'gshsdh', 'js@Gjsd.sd', '6267326723', 'yes'),
(7, 'Male', '0-33 years old', 'No', 'Yes', 'No', 'No', 'No', 'No', '', 'Ram', 'abc@gmail.com', '634676337', 'yes'),
(8, 'Male', '34-66 years old', 'No', 'Yes', 'France', 'No', 'No', 'No', '', 'Senkaz ', 'msenkaz@hotmail.fr', '0621168874', 'no'),
(9, 'Other', '34-66 years old', 'No', 'Yes', 'No', 'No', 'No', 'No', '', 'Mohammedi ', 'melomar@outlook.fr', '0650306398', 'no'),
(10, 'Male', '34-66 years old', 'Respiratory system disease ( e.g. asthma)', 'Yes', 'No', 'No', 'No', 'No', '', 'David wray ', 'djdave1980@hotmail.com', '07730468149', 'no'),
(11, 'Male', '34-66 years old', 'Autoimmune disease', 'Yes', 'No', 'yes', 'No', 'No', '', 'Steve White ', 'crazyfisthead@yahoo.com', '1', 'no'),
(12, 'Male', '0-33 years old', 'No', 'Yes', 'No', 'yes', 'yes', 'Yes', 'No', 'Jv', 'v@v.com', '668', 'yes'),
(13, 'Male', '34-66 years old', 'No', 'Yes', 'No', 'No', 'No', 'No', '', 'leewood', 'leewood770@gmail.com', '07528164420', 'no'),
(14, 'Male', '0-33 years old', 'No', 'Yes', 'No', 'No', 'No', 'No', '', 'أيهم ', 'ayhamaleek@gmail.com', '0622058549', 'no'),
(15, 'Male', '34-66 years old', 'No', 'Yes', 'No', 'yes', 'No', 'No', '', 'Istvan Laszlo Pap', 'istvanpap2015@gmail.com', '07450203119', 'no'),
(16, 'Male', '0-33 years old', 'No', 'Yes', 'No', 'No', 'yes', 'Yes', '', 'Sam miles', 'sammiles3110@hotmail.co.uk', '07583323111', 'no'),
(17, 'Male', '0-33 years old', 'No', 'Yes', 'No', 'yes', 'No', 'No', '', 'Nicholas whittle ', 'lozymac@yahoo.co.uk', '07555466130', 'no'),
(18, 'Male', '34-66 years old', 'Respiratory system disease ( e.g. asthma)', 'Yes', 'France', 'yes', 'No', 'Yes', 'No', 'Lorimier Morgan', 'morgan5908@laposte.net', '0629895859', 'no'),
(19, 'Male', '0-33 years old', 'Respiratory system disease ( e.g. asthma)', 'Yes', 'No', 'yes', 'No', 'Yes', '', 'Simon kershaw', 'skershaw71@gmail.com', '07510675439', 'no'),
(20, 'Male', '0-33 years old', 'No', 'Yes', 'Germany', 'yes', 'No', 'Yes', 'Yes', 'Farhad', 'farhad_279497@yahoo.com', '004917869260', 'no'),
(21, 'Male', '34-66 years old', 'No', 'Yes', 'No', 'No', 'No', 'No', '', 'Phillip mould', 'phillipjmould@gmail.com', '07807415290', 'no'),
(22, 'Male', '0-33 years old', 'No', 'Yes', 'No', 'No', 'No', 'No', '', 'James ', 'ghostridin_101@hotmail.com', '07543290851', 'no'),
(23, 'Male', '34-66 years old', 'No', 'Yes', 'No', 'yes', 'No', 'No', '', 'Carl', 'carl.main2@uk.bosch.com', '01684302304', 'no'),
(24, 'Male', '34-66 years old', 'No', 'Yes', 'No', 'yes', 'No', 'No', '', 'Kandil', 'tapankandil@hotmail.com', '0684184574', 'no'),
(25, 'Male', '34-66 years old', 'No', 'Yes', 'No', 'No', 'No', 'No', '', 'Stephen smith', 'typhoon30@icloud.com', '07581313593', 'no'),
(26, 'Male', '34-66 years old', 'No', 'Yes', 'No', 'yes', 'No', 'No', '', 'Molla', 'osemekhian404@yahoo.com', '07582421553', 'no'),
(27, 'Female', '34-66 years old', 'Autoimmune disease', 'Yes', 'No', 'No', 'No', 'Yes', '', 'Liz Batchelor ', 'lurbie@hotmail.com', '07854152426', 'no'),
(28, 'Male', '0-33 years old', 'No', 'Yes', 'Germany', 'No', 'yes', 'No', 'Yes', '45635345', 'info@blabla.com', '14', 'no'),
(29, 'Male', '0-33 years old', 'No', 'Yes', 'No', 'No', 'No', 'No', '', 'Ram', 'ram@gmail.com', '7458868452', 'yes'),
(30, 'Male', '0-33 years old', 'No', 'Yes', 'No', 'No', 'No', 'No', '', 'Ram', 'ram@gmail.com', '7458868452', 'yes'),
(31, 'Male', '0-33 years old', 'No', 'Yes', 'No', 'No', 'No', 'No', '', 'test', 'test@gmail.com', '347786347683', 'yes'),
(32, 'Male', '0-33 years old', 'No', 'Yes', 'No', 'No', 'No', 'No', '', 'Shubham', 'shubham.designoweb@gmail.com', '123456', 'yes'),
(33, 'Male', '0-33 years old', 'No', 'Yes', 'No', 'No', 'No', 'No', '', 'test', 'test@abc.com', '2376623', 'yes'),
(34, 'Male', '0-33 years old', 'No', 'Yes', 'No', 'No', 'No', 'No', '', 'sjsh', 'sdj@Jsdsd.sd', '676237623', 'yes'),
(35, 'Male', '0-33 years old', 'No', 'Yes', 'No', 'No', 'No', 'No', '', 'sdjjsdh', 'djs@jds.ss', '776347634', 'yes'),
(36, 'Male', '0-33 years old', 'No', 'Yes', 'No', 'No', 'No', 'No', '', 'djnjsd', 'sdjh@ghhds.sdsd', '3478783478', 'yes'),
(37, 'Male', '0-33 years old', 'No', 'Yes', 'No', 'yes', 'yes', 'Yes', 'Yes', 'Jdjs', 'v@v.com', '83737', 'yes'),
(38, 'Male', '0-33 years old', 'Cardiovascular disease,Diabetes', 'Yes', 'China,Hong Kong,Italy,Spain', 'yes', 'yes', 'Yes', 'Yes', 'Phisher', 'Conta3@gmail.com', '666666666', 'yes'),
(39, 'Female', '34-66 years old', 'Cardiovascular disease', 'Yes', 'Iran', 'No', 'yes', 'Yes', 'Yes', 'j', 'tuman@man.com', '123456789510', 'yes'),
(40, 'Male', '34-66 years old', 'No', 'Yes', 'Hong Kong,Spain', 'yes', 'No', 'Yes', 'No', 'gaga@gaga.com', 'gaga@gaga.com', '1', 'yes'),
(41, 'Male', '0-33 years old', 'Cardiovascular disease,Diabetes,Respiratory system disease ( e.g. asthma),Liver or kidney disease,high blood pressure', 'Yes', 'Singapore', 'yes', 'yes', 'Yes', 'Yes', 'Zebi Kbir', 'virkgghx@gmail.com', '556', 'yes'),
(42, 'Male', '34-66 years old', 'No', 'Yes', 'No', 'No', 'No', 'No', '', 'Valmir', 'vkhs', '23894709', 'yes'),
(43, 'Male', '34-66 years old', 'No', 'Yes', 'South Korea', 'yes', 'yes', 'Yes', 'Yes', 'Jyjy', 'v@v.com', '9373', 'yes'),
(44, 'Male', '0-33 years old', 'No', 'Yes', 'Germany', 'yes', 'No', 'No', 'No', 'Flo', 'schubert.heilbronn@gmx.de', '0753797546', 'yes'),
(45, 'Male', '0-33 years old', 'No', 'Yes', 'No', 'No', 'No', 'No', '', 'Erlis', 'plakuerlis09@gmail.com', '0692602227', 'yes'),
(46, 'Male', '0-33 years old', 'Respiratory system disease ( e.g. asthma)', 'Yes', 'No', 'No', 'No', 'Yes', '', 'H', '133@gmail.com', '6', 'yes'),
(47, 'Male', '0-33 years old', 'No', 'Yes', 'No', 'No', 'No', 'Yes', '', 'X', 'wikimani4@gmail.com', '0888005800', 'yes'),
(48, 'Male', '0-33 years old', 'Cardiovascular disease,Diabetes', 'Yes', 'China,Hong Kong', 'yes', 'No', 'No', 'No', 'A', 'a@a.ch', '69', 'yes'),
(49, 'Male', '0-33 years old', 'Respiratory system disease ( e.g. asthma)', 'Yes', 'Germany', 'No', 'No', 'No', '', 'Oralkanone', 'msrbgqfhewpwaflxxk@ttirv.com', '014043833639', 'yes'),
(50, 'Male', '0-33 years old', 'Respiratory system disease ( e.g. asthma)', 'Yes', 'Germany', 'No', 'No', 'No', '', 'Ch', 'ff', '55', 'yes'),
(51, 'Male', '0-33 years old', 'No', 'Yes', 'Germany', 'No', 'No', 'No', '', 'Hh', 'jhhh@ghhh.com', '88', 'yes'),
(52, 'Male', '0-33 years old', 'No', 'Yes', 'No', 'No', 'No', 'No', '', 'Bb', 'bhg@hm.com', '77', 'yes'),
(53, 'Male', '0-33 years old', 'No', 'Yes', 'Germany', 'No', 'No', 'No', '', 'Albert', 'asllanpordha@outlook.com', '02799377836', 'yes'),
(54, 'Male', '0-33 years old', 'No', 'Yes', 'Germany', 'No', 'No', 'No', '', 'Jj', 'mdjr@gmx.de', '01662738', 'yes'),
(55, 'Male', '0-33 years old', 'high blood pressure', 'Yes', 'Germany', 'yes', 'No', 'Yes', 'No', 'ghhv', 'gge@hotmail.com', '01554699800', 'yes'),
(56, 'Male', '0-33 years old', 'No', 'Yes', 'Germany', 'No', 'No', 'Yes', '', 'Brian', '@', '1', 'yes'),
(57, 'Male', '0-33 years old', 'No', 'Yes', 'Germany', 'No', 'No', 'No', '', 'Mustafa sapan', 'musti-supreme96@web.de', '017649477827', 'yes'),
(58, 'Male', '0-33 years old', 'No', 'Yes', 'Germany', 'yes', 'yes', 'No', 'No', 'Hamudi', 'king@gmail.com', '017543234458', 'yes'),
(59, 'Female', '34-66 years old', 'high blood pressure', 'Yes', 'No', 'No', 'No', 'No', '', 'A', 'a@a.ch', '0123', 'yes'),
(60, 'Female', '34-66 years old', 'No', 'Yes', 'No', 'No', 'No', 'No', '', 'Bdbdbje', 'sp@sgf', '122456', 'yes'),
(61, 'Male', '0-33 years old', 'Respiratory system disease ( e.g. asthma)', 'Yes', 'Germany', 'yes', 'No', 'No', 'No', 'Dominik Funken ', 'dominikfunken37@gmail.com', '0919', 'yes'),
(62, 'Male', '34-66 years old', 'No', 'Yes', 'No', 'No', 'No', 'No', '', 'Hh', 'hgg', '88', 'yes'),
(63, 'Male', '0-33 years old', 'No', 'Yes', 'Germany', 'yes', 'No', 'No', 'No', 'Hh', 'vv', '98', 'yes'),
(64, 'Male', '0-33 years old', 'No', 'Yes', 'Germany', 'No', 'No', 'No', '', 'Ww', 'qq', '11', 'yes'),
(65, 'Male', '0-33 years old', 'No', 'Yes', 'No', 'No', 'No', 'No', '', 'Thomas', 'thomas.kesel@live.de', '015202808582', 'yes'),
(66, 'Male', '0-33 years old', 'No', 'Yes', 'Germany', 'yes', 'No', 'No', 'No', 'Tim', 'timholderle@gmx.de', '071812020082', 'yes'),
(67, 'Male', '0-33 years old', 'No', 'Yes', 'Germany', 'No', 'No', 'No', '', 'Markus Meier', 'quirl.fendt@icloud.com', '01718668562', 'yes'),
(68, 'Male', '0-33 years old', 'high blood pressure', 'Yes', 'No', 'No', 'No', 'No', '', 'Tom', 'tommi.baumann@gmail.coml', '113', 'yes'),
(69, 'Male', '0-33 years old', 'No', 'Yes', 'No', 'No', 'No', 'No', '', 'Matthias Oetiker ', 'oetikermatthias1611@gmail.com', '0774497681', 'yes'),
(70, 'Male', '0-33 years old', 'No', 'Yes', 'Germany', 'No', 'No', 'No', '', 'Mathis', 'mathisworm@gmail.com', '20081999', 'yes'),
(71, 'Male', '0-33 years old', 'No', 'Yes', 'Germany', 'No', 'No', 'No', '', 'Hdfvbb', 'detjbfrh@htedf.chj', '123455677888', 'yes'),
(72, 'Male', '0-33 years old', 'No', 'Yes', 'Germany', 'No', 'No', 'No', '', 'Furkan', 'zumgeier@gmail.com', '31147', 'yes'),
(73, 'Male', '0-33 years old', 'No', 'Yes', 'Germany', 'yes', 'No', 'No', 'No', 'Henrik', 'ironlennoxhide@gmail.com', '123', 'yes'),
(74, 'Male', '0-33 years old', 'No', 'Yes', 'Germany', 'No', 'No', 'No', '', 'Horst', 'h@h.com', '5854566555', 'yes'),
(75, 'Male', '0-33 years old', 'No', 'Yes', 'Germany', 'No', 'No', 'No', '', 'Jsjdj', 'ndbdbd', '3839297263', 'yes'),
(76, 'Male', '0-33 years old', 'No', 'Yes', 'Germany', 'No', 'No', 'No', '', 'Gg', 'vhfx@web.de', '643456', 'yes'),
(77, 'Male', '0-33 years old', 'high blood pressure', 'Yes', 'Germany', 'No', 'No', 'No', '', 'J', 'h', '5', 'yes'),
(78, 'Male', '0-33 years old', 'No', 'Yes', 'Germany', 'No', 'No', 'No', '', 'Daniel', 'daniel.polinski.1982000@gmail.com', '01732603667', 'yes'),
(79, 'Male', '0-33 years old', 'No', 'Yes', 'No', 'yes', 'No', 'No', '', 'Haso', 'sikik@outlock.com', '62625639292', 'yes'),
(80, 'Male', '0-33 years old', 'No', 'Yes', 'No', 'No', 'No', 'No', '', 'Bashkim', 'nüe.nüe@gmx.ch', '079643257', 'yes'),
(81, 'Male', '0-33 years old', 'Respiratory system disease ( e.g. asthma)', 'Yes', 'Germany', 'No', 'No', 'Yes', '', 'L', 'l@web.de', '1', 'yes'),
(82, 'Male', '0-33 years old', 'Respiratory system disease ( e.g. asthma)', 'Yes', 'No', 'No', 'No', 'No', '', '1a', 'ldsfg', '123654789', 'yes'),
(83, 'Male', '0-33 years old', 'No', 'Yes', 'No', 'No', 'No', 'No', '', 'Penis ', 'king@hotmail.com', '8998', 'yes'),
(84, 'Male', '0-33 years old', 'No', 'Yes', 'No', 'No', 'No', 'No', '', 'Jürgen', 'ju@glanzer@gmail.com', '06642066314', 'yes'),
(85, 'Female', '0-33 years old', 'Autoimmune disease', 'Yes', 'Germany', 'No', 'No', 'Yes', '', 'Marieta', 'marieta_haziraj@web.de', '01776064817', 'yes'),
(86, 'Male', '0-33 years old', 'No', 'Yes', 'Germany', 'No', 'No', 'No', '', 'Ghz', 'fhzzt@gmx.dr', '017766756457', 'yes'),
(87, 'Male', '0-33 years old', 'No', 'Yes', 'Germany', 'yes', 'No', 'No', 'No', 'Baran', 'urfalibaran@gmail.com', '537974367', 'yes'),
(88, 'Male', '0-33 years old', 'No', 'Yes', 'No', 'No', 'No', 'No', '', 'Lesh', 'leshi@gmail.com', '01689423372', 'yes'),
(89, 'Male', '0-33 years old', 'No', 'Yes', 'No', 'No', 'No', 'No', '', 'Günther', 'thebrix20.2cbc255@m.evernote.com', '256468619194', 'yes'),
(90, 'Male', '0-33 years old', 'No', 'Yes', 'No', 'No', 'No', 'No', '', 'Hans', 'hans@web.de', '46899', 'yes'),
(91, 'Male', '0-33 years old', 'No', 'Yes', 'Germany', 'No', 'No', 'No', '', 'Ramez ', 'ramjeblal@gmail.com', '71638293519', 'yes'),
(92, 'Male', '0-33 years old', 'No', 'Yes', 'No', 'yes', 'No', 'No', '', 'Seydi', 'SeydiTas97@gmail.com', '067763712518', 'yes'),
(93, 'Male', '0-33 years old', 'Cardiovascular disease', 'Yes', 'China', 'yes', 'No', 'Yes', 'Yes', 'Iii', 'ollk', '0854', 'yes'),
(94, 'Male', '0-33 years old', 'No', 'Yes', 'No', 'yes', 'No', 'No', '', 'ananin ami', 'kkaskskskskksk@ail.com', '18181717177', 'yes'),
(95, 'Male', '0-33 years old', 'No', 'Yes', 'Germany', 'No', 'No', 'No', '', 'Leeroy', 'leeroy@trash-mail.com', '004980030085', 'yes'),
(96, 'Male', '0-33 years old', 'No', 'Yes', 'No', 'yes', 'No', 'No', '', 'Joel', 'joelulmann@gmail.com', '0764735195', 'yes'),
(97, 'Male', '0-33 years old', 'No', 'Yes', 'Germany', 'No', 'No', 'No', '', 'Jamie ', 'jamie19876@gmail.com', '17', 'yes'),
(98, 'Male', '0-33 years old', 'No', 'Yes', 'No', 'No', 'yes', 'No', '', 'rmn', 'jhh', '0000', 'yes'),
(99, 'Male', '0-33 years old', 'No', 'Yes', 'No', 'No', 'No', 'No', '', 'N', 'msil@.com', '2', 'yes'),
(100, 'Male', '0-33 years old', 'No', 'Yes', 'No', 'yes', 'No', 'No', '', 'Piep', 'piep', '0000', 'yes'),
(101, 'Male', '0-33 years old', 'Respiratory system disease ( e.g. asthma)', 'Yes', 'Germany', 'No', 'No', 'No', '', 'Jonas', 'ruhland.jonas@gmail.com', '015772523550', 'yes'),
(102, 'Male', '0-33 years old', 'Respiratory system disease ( e.g. asthma)', 'Yes', 'Germany', 'No', 'No', 'No', '', 'Schramm', 't.schramm12@t-online.de', '015146241824', 'yes'),
(103, 'Male', '0-33 years old', 'Respiratory system disease ( e.g. asthma),high blood pressure', 'Yes', 'Germany', 'yes', 'No', 'Yes', 'No', 'hhb', 'vvbb', '6556', 'yes'),
(104, 'Male', '0-33 years old', 'No', 'Yes', 'Germany', 'No', 'No', 'No', '', 'Finian ', 'finian@wyss@gmail.con', '015154769638', 'yes'),
(105, 'Male', '0-33 years old', 'No', 'Yes', 'No', 'No', 'No', 'Yes', '', 'Lmf', 'lmf', '11234', 'yes'),
(106, 'Male', '0-33 years old', 'No', 'Yes', 'Germany', 'No', 'No', 'No', '', 'Checket', 'ghchjv@gmx.de', '1234567899', 'yes'),
(107, 'Male', '0-33 years old', 'No', 'Yes', 'No', 'No', 'No', 'No', '', 'Nexhmedin krasniqi', 'nexha_dini@hotmail.com', '044149018', 'yes'),
(108, 'Male', '0-33 years old', 'No', 'Yes', 'No', 'No', 'No', 'No', '', 'Avdi', 'qendrimhyseni231@gmail.com', '044999863', 'yes'),
(109, 'Male', '0-33 years old', 'No', 'Yes', 'No', 'No', 'No', 'No', '', 'Ergon krasniqi', 'ergoni_87@hotmail.com', '049149018', 'yes'),
(110, 'Male', '34-66 years old', 'No', 'Yes', 'No', 'No', 'No', 'No', '', 'Nexhmedin krasniqi', 'nexha_dini@hotmail.com', '044149018', 'yes'),
(111, 'Male', '0-33 years old', 'No', 'Yes', 'No', 'No', 'No', 'No', '', 'Edon', 'doni_gon_l@hotmail.com', '049421557', 'yes'),
(112, 'Female', '0-33 years old', 'No', 'Yes', 'No', 'No', 'No', 'No', '', 'Elmedina', 'tanny-lindda@live.com', '045951455', 'yes'),
(113, 'Female', '34-66 years old', 'No', 'Yes', 'No', 'yes', 'No', 'No', '', 'Shahadie selimi', 'shahadie.selimi@hotmail.com', '0797855282', 'yes'),
(114, 'Female', '0-33 years old', 'No', 'Yes', 'Germany', 'No', 'No', 'Yes', '', 'Lendita', 'lendita.amrllahi@gmail.com', '045678933', 'yes'),
(115, 'Female', '34-66 years old', 'No', 'Yes', 'No', 'No', 'No', 'No', '', 'Xhevrije', 'xhevrije@gmail.com', '049243058', 'yes'),
(116, 'Male', '34-66 years old', 'No', 'Yes', 'No', 'yes', 'No', 'No', '', 'Hasan kungji', 'shdhje@hhdjd.com', '849645648', 'yes'),
(117, 'Female', '34-66 years old', 'high blood pressure', 'Yes', 'No', 'No', 'No', 'No', '', 'Shnnijhh', '@sksbd@m', '078665433', 'yes'),
(118, 'Male', '0-33 years old', 'No', 'Yes', 'No', 'yes', 'No', 'No', '', 'Liridon', 'liridon_ismajli@outlook.com', '045624487', 'yes'),
(119, 'Male', '0-33 years old', 'No', 'Yes', 'Germany', 'yes', 'No', 'No', 'No', 'Lorenz ', 'lorenz-kliemen@gmx.net', '017645746589', 'yes'),
(120, 'Male', '0-33 years old', 'No', 'Yes', 'Germany', 'yes', 'No', 'No', 'No', 'Florian', 'florianpagel7@gmail.com', '015232059741', 'yes'),
(121, 'Male', '34-66 years old', 'No', 'Yes', 'Germany', 'yes', 'No', 'No', 'No', 'Jonas', 'jonas.frei@gmail.com', '93749823783', 'yes'),
(122, 'Male', '0-33 years old', 'No', 'Yes', 'Germany', 'No', 'No', 'Yes', '', 'X', 'ffff@web.de', '1114', 'yes'),
(123, 'Male', '0-33 years old', 'No', 'Yes', 'No', 'No', 'No', 'No', '', 'Hhg', 'ssfhxyy@gmx.at', '1', 'yes'),
(124, 'Male', '0-33 years old', 'No', 'Yes', 'No', 'No', 'No', 'No', '', 'Hhg', 'ssfhxyy@gmx.at', '1', 'yes'),
(125, 'Male', '0-33 years old', 'No', 'Yes', 'No', 'No', 'No', 'Yes', '', 'Rudi ', 'h@gmx.de', '47749', 'yes'),
(126, 'Male', '0-33 years old', 'No', 'Yes', 'Germany', 'No', 'No', 'No', '', 'K', 'b', '66', 'yes'),
(127, 'Male', '0-33 years old', 'No', 'Yes', 'Germany', 'No', 'No', 'No', '', 'Jannik ', 'mrkay1011@gmail.com', '0905', 'yes'),
(128, 'Female', '0-33 years old', 'No', 'Yes', 'No', 'No', 'No', 'No', '', 'Nini', 'nohomo@gmail.com', '096588743688', 'yes'),
(129, 'Male', '0-33 years old', 'No', 'Yes', 'Germany', 'No', 'No', 'No', '', 'Hff', 'hrgc@gmail.com', '01574668441', 'yes'),
(130, 'Male', '0-33 years old', 'No', 'Yes', 'Italy', 'No', 'No', 'No', '', 'F', 'f', '5', 'yes'),
(131, 'Female', '0-33 years old', 'No', 'Yes', 'No', 'No', 'No', 'No', '', 'Viktoria ', 'wrzesniewski@gmx.de', '017677031416', 'yes'),
(132, 'Male', '0-33 years old', 'No', 'Yes', 'Germany', 'No', 'No', 'No', '', 'Gg', 'gg@hh.de', '66', 'yes'),
(133, 'Male', '0-33 years old', 'No', 'Yes', 'Germany', 'No', 'No', 'No', '', 'Kevin ', 'shhs@gmail.com', '64646464949', 'yes'),
(134, 'Female', '0-33 years old', 'high blood pressure', 'Yes', 'Germany', 'No', 'No', 'No', '', 'Nicole ', 'niciakascube@gmail.com', '017695767595', 'yes'),
(135, 'Female', '0-33 years old', 'high blood pressure', 'Yes', 'Germany', 'No', 'No', 'No', '', 'Nicole ', 'niciakascube@gmail.com', '017695767595', 'yes'),
(136, 'Male', '0-33 years old', 'No', 'Yes', 'No', 'yes', 'No', 'No', '', 'j', 'b', '7887', 'yes'),
(137, 'Male', '0-33 years old', 'No', 'Yes', 'Germany', 'yes', 'No', 'No', 'No', 'G', 't', '5', 'yes'),
(138, 'Male', '0-33 years old', 'No', 'Yes', 'No', 'No', 'No', 'No', '', 'Patrick Seidel ', 'seidel.02@gmx.de', '01735208986', 'yes'),
(139, 'Male', '0-33 years old', 'No', 'Yes', 'No', 'yes', 'No', 'No', '', 'Sebastian Reinfurt ', 'anastasia.1991@gmx.de', '111111', 'yes'),
(140, 'Male', '0-33 years old', 'high blood pressure', 'Yes', 'Germany', 'No', 'No', 'Yes', '', 'King', 'loui@king.com', '5', 'yes'),
(141, 'Male', '0-33 years old', 'No', 'Yes', 'No', 'No', 'No', 'No', '', 'Rino Hunziker', 'rino.h94@hotmail.com', '0791281994', 'yes'),
(142, 'Male', '0-33 years old', 'No', 'Yes', 'Germany', 'yes', 'No', 'No', 'No', 'D', '5', '1', 'yes'),
(143, 'Male', '0-33 years old', 'No', 'Yes', 'Germany', 'No', 'No', 'No', '', 'Deine MUDDA', 'cet82143@eoopy.com', '69', 'yes'),
(144, 'Female', '0-33 years old', 'No', 'Yes', 'Germany', 'No', 'No', 'Yes', '', 'Tanya', 'almeida.tanya@icloud.com', '16', 'yes'),
(145, 'Male', '0-33 years old', 'No', 'Yes', 'Germany', 'No', 'No', 'Yes', '', 'H', 'f', '3', 'yes'),
(146, 'Male', '0-33 years old', 'No', 'Yes', 'Germany', 'No', 'No', 'No', '', 'Gk', 'um@web.de', '45789843247', 'yes'),
(147, 'Male', '0-33 years old', 'No', 'Yes', 'Germany', 'No', 'No', 'No', '', 'Leon ', 'leon.randel03@gmail.com', '007', 'yes'),
(148, 'Female', '34-66 years old', 'Respiratory system disease ( e.g. asthma)', 'Yes', 'Germany', 'No', 'No', 'No', '', 'Rosemarie ', 'rosemariespielmann01@gmail.com', '56', 'yes'),
(149, 'Male', '0-33 years old', 'No', 'Yes', 'No', 'yes', 'No', 'No', '', 'mo', 'mohamed.abtn@gmail.com', '16', 'yes'),
(150, 'Male', '0-33 years old', 'No', 'Yes', 'Germany', 'yes', 'No', 'No', 'No', 'Florian', 'i7v2mail@gmail.com', '015778271119', 'yes'),
(151, 'Male', '0-33 years old', 'No', 'Yes', 'No', 'yes', 'No', 'No', '', 'emr', 'dndn', '12345', 'yes'),
(152, 'Male', '34-66 years old', 'No', 'Yes', 'No', 'No', 'No', 'Yes', '', 'Hhu', 'h', '134578990', 'yes'),
(153, 'Male', '0-33 years old', 'No', 'Yes', 'Germany', 'No', 'No', 'No', '', 'vb', 'jh@.com', '99', 'yes'),
(154, 'Male', '34-66 years old', 'high blood pressure', 'Yes', 'No', 'No', 'No', 'No', '', 'Asd', 'test@gmail.com', '158155546688', 'yes'),
(155, 'Male', '0-33 years old', 'No', 'Yes', 'Germany', 'yes', 'No', 'No', 'No', '€##', 'jgfzg@mail.de', '0178554785', 'yes'),
(156, 'Female', '0-33 years old', 'No', 'Yes', 'No', 'No', 'No', 'No', '', 'Ardita Hashani ', 'ardita.hashani@gmx.ch', '004176489217', 'yes'),
(157, 'Male', '34-66 years old', 'No', 'Yes', 'No', 'No', 'No', 'No', '', 'xnvnv', 'vbcnbcvb@yahoo.com', '534565465454', 'yes'),
(158, 'Male', '34-66 years old', 'Respiratory system disease ( e.g. asthma)', 'Yes', 'Hong Kong', 'yes', 'yes', 'Yes', 'Yes', 'varun negi', 'varunnegi@cuminte.com', '3333333333', 'yes'),
(159, 'Male', '34-66 years old', 'Diabetes,Respiratory system disease ( e.g. asthma),high blood pressure', 'Yes', 'No', 'No', 'No', 'No', '', 'leonard ', 'lenniemallinson@yahoo.co.uk', '01302788491', 'yes'),
(160, 'Male', '66-99', 'Diabetes,Respiratory system disease ( e.g. asthma),high blood pressure', 'Yes', 'No', 'No', 'No', 'Yes', '', 'lenniemallinson@yahoo.co.uk', 'lenniemallinson@yahoo.co.uk', '01202788491', 'yes'),
(161, 'Male', '66-99', 'Diabetes,Respiratory system disease ( e.g. asthma),high blood pressure', 'Yes', 'No', 'No', 'No', 'Yes', 'Yes', 'lenniemallinson@yahoo.co.uk', 'lenniemallinson@yahoo.co.uk', '01202788491', 'yes'),
(162, 'Female', '34-66 years old', 'No', 'Yes', 'No', 'No', 'No', 'No', '', 'Marisa', 'mifsudmarisa@hotmail.com', '79728670', 'yes'),
(163, 'Male', '0-33 years old', 'No', 'Yes', 'No', 'No', 'No', 'No', '', 'test', 'test@gmail.com', '7457478478', 'yes'),
(164, 'Male', '0-33 years old', 'No', 'Yes', 'No', 'No', 'yes', 'No', '', 'Jg', 'jamesjayeola77@gmail.com', '07065847027', 'yes'),
(165, 'Female', '34-66 years old', 'No', 'Yes', 'No', 'yes', 'No', 'No', '', 'Lesley Ashton', 'srmachin21@btinterent.com', '07775728843', 'yes'),
(166, 'Male', '0-33 years old', 'No', 'Yes', 'No', 'yes', 'yes', 'Yes', 'Yes', '\' or 1=1 limit 1 -- -+ ', 'mohammad.hatta@spambox.me', '09123457646', 'yes'),
(167, 'Male', '0-33 years old', 'No', 'Yes', 'Spain', 'yes', 'yes', 'Yes', 'No', 'Watch', '\'=\'\'or\'@gmail.com', '3', 'yes'),
(168, 'Male', '34-66 years old', 'Diabetes,Respiratory system disease ( e.g. asthma),high blood pressure', 'Yes', 'United States', 'No', 'No', 'No', '', 'Anthony Raymond Salazar', 'kingars1979@gmail.com', '18056315715', 'yes'),
(169, 'Female', '34-66 years old', 'Autoimmune disease', 'Yes', 'United States', 'yes', 'No', 'No', 'No', 'Ana Alicia Salazar', 'Organicgirl57@gmail.com@', '18056315715', 'yes'),
(170, 'Male', '0-33 years old', 'No', 'Yes', 'No', 'yes', 'yes', 'Yes', 'No', 'dndns', 'djhsd@JHjs.sdsd', '237878237823', 'yes'),
(171, 'Male', '34-66 years old', 'No', 'Yes', 'No', 'yes', 'No', 'No', '', 'Tony', 'tony_franklin@msn.com', '4079288128', 'yes'),
(172, 'Male', '0-33 years old', 'No', 'Yes', 'No', 'No', 'No', 'No', '', 'abcd', 'abcd@gmail.com', '1234567890', 'yes');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `answer`
--
ALTER TABLE `answer`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `answer`
--
ALTER TABLE `answer`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=173;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
