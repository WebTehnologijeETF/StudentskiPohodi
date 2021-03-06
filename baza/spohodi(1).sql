-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jun 11, 2015 at 10:43 PM
-- Server version: 5.6.17
-- PHP Version: 5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `spohodi`
--

-- --------------------------------------------------------

--
-- Table structure for table `komentar`
--

CREATE TABLE IF NOT EXISTS `komentar` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `novost` int(11) NOT NULL,
  `tekst` text COLLATE utf8_slovenian_ci NOT NULL,
  `autor` varchar(20) COLLATE utf8_slovenian_ci NOT NULL,
  `email` text COLLATE utf8_slovenian_ci NOT NULL,
  `vrijeme` timestamp NOT NULL,
  PRIMARY KEY (`id`),
  KEY `novost` (`novost`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_slovenian_ci AUTO_INCREMENT=63 ;

--
-- Dumping data for table `komentar`
--

INSERT INTO `komentar` (`id`, `novost`, `tekst`, `autor`, `email`, `vrijeme`) VALUES
(1, 1, 'Komentar na prvi pohod', 'boss', 'agranulo1@etf.unsa.ba', '2015-05-28 16:43:57'),
(2, 2, 'Pohod u Istanbul je bio super. Jedva čekam sljedeći. :) :)', 'Belma', '', '2015-05-28 00:37:07'),
(3, 3, 'U gradu ljubavi, lako se zavoliii', 'Zaljubljena<3', '', '2015-05-28 00:37:36'),
(39, 2, 'Istanbul seni kokuyor. :)', 'Aida', 'agranulo1@etf.unsa.ba', '2015-05-28 17:26:13'),
(42, 2, 'komentarcic', 'Aidica', '', '2015-05-29 05:34:40'),
(43, 1, 'komennnn', 'ime', '', '2015-06-08 13:20:39'),
(51, 2, 'aaaaaaa', 'aaaaa', '', '2015-06-08 23:53:52'),
(54, 1, 'komentar kao anonmius', 'Anonimac', '', '2015-06-09 19:33:10'),
(55, 1, 'anonmiac fkt', 'Anonimac', '', '2015-06-09 19:35:41'),
(56, 3, 'kommmm kao Korisnik aBD', 'korisnik', '', '2015-06-09 19:36:29'),
(57, 3, 'komentar kao Aida', 'Aida', '', '2015-06-09 19:38:03'),
(58, 2, 'kommmmmmmm', 'Anonimac', '', '2015-06-11 18:47:29'),
(62, 1, 'bdfjdndjs', 'korisnik', '', '2015-06-11 19:33:02');

-- --------------------------------------------------------

--
-- Table structure for table `korisnik`
--

CREATE TABLE IF NOT EXISTS `korisnik` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` text COLLATE utf8_slovenian_ci NOT NULL,
  `password` text COLLATE utf8_slovenian_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_slovenian_ci AUTO_INCREMENT=2 ;

--
-- Dumping data for table `korisnik`
--

INSERT INTO `korisnik` (`id`, `username`, `password`) VALUES
(1, 'Aida', 'aida');

-- --------------------------------------------------------

--
-- Table structure for table `novosti`
--

CREATE TABLE IF NOT EXISTS `novosti` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `naslov` varchar(100) COLLATE utf8_slovenian_ci NOT NULL,
  `slika` varchar(200) COLLATE utf8_slovenian_ci NOT NULL,
  `tekst` text COLLATE utf8_slovenian_ci NOT NULL,
  `autor` varchar(20) COLLATE utf8_slovenian_ci NOT NULL,
  `vrijeme` timestamp NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_slovenian_ci AUTO_INCREMENT=6 ;

--
-- Dumping data for table `novosti`
--

INSERT INTO `novosti` (`id`, `naslov`, `slika`, `tekst`, `autor`, `vrijeme`) VALUES
(1, 'Pohod u Prag', '"Prag.jpg"', 'U periodu 26.2-2.3.2015.godine organizirali smo pohod u Prag. U ovom pohodu priključilo nam se 1200 pohodaša i doživjelo prelijepe trenutke u Zlatnom gradu. U toku pohoda, obišli smo i Dresden i Budimpeštu.\r\n', 'Aida', '2015-05-27 16:53:50'),
(2, 'Pohod u Istanbul', '"Istanbul.jpg"', 'Istanbul je ponovo osvojen. Vjerni pohodaši uspjeli su zauzeti i ovaj grad. Turci su još jednom pokazali koliko vole naš narod. Hvala svima koji su bili dio nezaboravnog sedmodnevnog provoda. Vidimo se i sljedeće godine.', 'Aida', '2015-05-27 13:13:45'),
(3, 'Pohod u Pariz', '"Pariz.jpg"', 'Hiljadu pohodaša pohodilo je u Grad ljubavi. Imali su priliku uživati u ljepotama Sene, Aiffelovog tornja,  muzeja Luvr i Versaj te u mnogobrojnim drugim atrakcijama.', 'Aida', '2015-05-27 16:32:35');

-- --------------------------------------------------------

--
-- Table structure for table `obicnikorisnik`
--

CREATE TABLE IF NOT EXISTS `obicnikorisnik` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(50) COLLATE utf8_slovenian_ci NOT NULL,
  `password` varchar(50) COLLATE utf8_slovenian_ci NOT NULL,
  `email` text COLLATE utf8_slovenian_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_slovenian_ci AUTO_INCREMENT=7 ;

--
-- Dumping data for table `obicnikorisnik`
--

INSERT INTO `obicnikorisnik` (`id`, `username`, `password`, `email`) VALUES
(1, 'korisnik', 'sifra', 'korisnik@hotmail.com'),
(2, 'kor2', 'VP@ $lqz%]i+', 'agranulo1@etf.unsa.ba'),
(4, 'asa', 'asa', 'asa@hotmail.com'),
(5, 'novi', 'novi', 'novi@hotmail.com'),
(6, 'user', 'user', 'user@hotmail.com');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `komentar`
--
ALTER TABLE `komentar`
  ADD CONSTRAINT `komentar_ibfk_1` FOREIGN KEY (`novost`) REFERENCES `novosti` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
