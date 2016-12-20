-- phpMyAdmin SQL Dump
-- version 3.2.4
-- http://www.phpmyadmin.net
--
-- Vert: localhost
-- Generert den: 13. Mai, 2011 11:00 
-- Tjenerversjon: 5.1.41
-- PHP-Versjon: 5.3.1

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `cashkings`
--
CREATE DATABASE `cashkings` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `cashkings`;

-- --------------------------------------------------------

--
-- Tabellstruktur for tabell `ansatte`
--

CREATE TABLE IF NOT EXISTS `ansatte` (
  `ansattnavn` varchar(40) NOT NULL,
  `ansattnr` int(5) NOT NULL,
  `passord` varchar(500) NOT NULL,
  PRIMARY KEY (`ansattnr`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dataark for tabell `ansatte`
--

INSERT INTO `ansatte` (`ansattnavn`, `ansattnr`, `passord`) VALUES
('Viji', 7, '*0A58C0E5B4DED804081147C2BF00A2E5B22E84CA '),
('Jon', 8, '*DCA916B15A07EC55511A9C75515F8BA7BCDEC17E'),
('Einar', 9, '*0B0D2D7B314909BCE5548CCE4105E5A637A54CF8');

-- --------------------------------------------------------

--
-- Tabellstruktur for tabell `frakt`
--

CREATE TABLE IF NOT EXISTS `frakt` (
  `fraktmåte` varchar(50) NOT NULL,
  `pris` decimal(5,2) NOT NULL,
  `fraktnr` int(4) NOT NULL AUTO_INCREMENT,
  `Frakttid` varchar(50) NOT NULL,
  PRIMARY KEY (`fraktnr`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dataark for tabell `frakt`
--

INSERT INTO `frakt` (`fraktmåte`, `pris`, `fraktnr`, `Frakttid`) VALUES
('Kameltransport', '75.00', 1, 'Tre uker'),
('Hestetransport', '130.00', 2, 'En uke'),
('Bil', '200.00', 3, 'To dager'),
('Hurtiglevering', '250.00', 4, 'Maks 5 timer og gjelder bare på Østlandet');

-- --------------------------------------------------------

--
-- Tabellstruktur for tabell `kunde`
--

CREATE TABLE IF NOT EXISTS `kunde` (
  `fornavn` varchar(30) NOT NULL,
  `etternavn` varchar(30) NOT NULL,
  `adresse` varchar(50) NOT NULL,
  `tlf` int(8) NOT NULL,
  `epost` varchar(50) NOT NULL,
  `postnr` varchar(4) NOT NULL,
  `sted` varchar(30) NOT NULL,
  `passord` varchar(50) NOT NULL,
  `kundenr` int(5) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`kundenr`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dataark for tabell `kunde`
--

INSERT INTO `kunde` (`fornavn`, `etternavn`, `adresse`, `tlf`, `epost`, `postnr`, `sted`, `passord`, `kundenr`) VALUES
('test', 'werwerm', 'dgoerl', 23121314, 'lol@nubmail.com', '1245', 'Oslo', '*C32D3DEDE839BCD90C3AF7843F05C9CB3999AA64', 1);

-- --------------------------------------------------------

--
-- Tabellstruktur for tabell `ordre`
--

CREATE TABLE IF NOT EXISTS `ordre` (
  `ordrenr` int(6) NOT NULL AUTO_INCREMENT,
  `kundenr` int(5) NOT NULL,
  `ansattnr` int(5) NOT NULL,
  `ordredato` date NOT NULL,
  `totalpris` decimal(12,0) NOT NULL,
  PRIMARY KEY (`ordrenr`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=231129 ;

--
-- Dataark for tabell `ordre`
--

INSERT INTO `ordre` (`ordrenr`, `kundenr`, `ansattnr`, `ordredato`, `totalpris`) VALUES
(231123, 0, 0, '2011-05-20', '0'),
(231124, 1, 231, '2011-05-20', '0'),
(231125, 1, 0, '2011-05-12', '0'),
(231126, 1, 1, '2011-05-12', '0'),
(231127, 1, 0, '2011-05-27', '0'),
(231128, 1, 0, '2011-05-27', '0');

-- --------------------------------------------------------

--
-- Tabellstruktur for tabell `ordrelinje`
--

CREATE TABLE IF NOT EXISTS `ordrelinje` (
  `ordrenr` int(6) NOT NULL,
  `varenr` int(5) NOT NULL,
  `prisprenhet` decimal(10,2) NOT NULL,
  `antall` int(7) NOT NULL,
  PRIMARY KEY (`ordrenr`,`varenr`),
  UNIQUE KEY `ordrenr` (`ordrenr`,`varenr`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dataark for tabell `ordrelinje`
--


-- --------------------------------------------------------

--
-- Tabellstruktur for tabell `vare`
--

CREATE TABLE IF NOT EXISTS `vare` (
  `varenavn` varchar(30) NOT NULL,
  `varenr` int(5) NOT NULL AUTO_INCREMENT,
  `pris` decimal(10,2) NOT NULL,
  `antall` int(7) NOT NULL,
  `kategorinr` int(5) NOT NULL,
  `hyllenr` int(5) NOT NULL,
  `betegnelse` text NOT NULL,
  `bildeadresse` varchar(200) NOT NULL,
  PRIMARY KEY (`varenr`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=11147 ;

--
-- Dataark for tabell `vare`
--

INSERT INTO `vare` (`varenavn`, `varenr`, `pris`, `antall`, `kategorinr`, `hyllenr`, `betegnelse`, `bildeadresse`) VALUES
('Tbane', 1, '181000.00', 189, 4, 111, 'Løp og kjøp', 'http://localhost/admin/bilder/Transport/Tbanen.jpg'),
('Airbus A300', 2, '360000.99', 5, 4, 2, 'Airbus A300', 'http://localhost/admin/bilder/Transport/Airbus-A300-600S.jpg'),
('Mercedes Vito', 3, '45599.99', 2, 4, 21, 'Poltibil fra Oslo', 'http://localhost/admin/bilder/Transport/Mercedes_Benz_Vito_Oslo_Police_Van_-_2007.04.03.jpg'),
('MC ', 4, '5000.99', 1, 4, 32, 'KUPP!!!\r\n2011 - modell MC', 'http://localhost/admin/bilder/Transport/MC1.jpg'),
('Politibil', 5, '34000.99', 1, 4, 21, 'Politibil fra NEW YORK ', 'http://localhost/admin/bilder/Transport/39_-143991323.jpg'),
('sykkel', 6, '99.99', 2, 4, 4, 'Utgående modell sykler', 'http://localhost/admin/bilder/Transport/fargerik%20sykkel.jpg'),
('Toyota', 7, '15100.00', 1, 4, 21, 'Billig Toyota fra Japan', 'http://localhost/admin/bilder/Transport/Toyota1.jpg'),
('Motorsykkel', 8, '3399.99', 2, 4, 32, 'Motorsykkel', 'http://localhost/admin/bilder/Transport/motorsykkel%20bl%C3%A5.jpg'),
('Falsk Rolex', 9, '50.00', 800, 3, 3, 'Lur vennene dine med denne', 'http://localhost/admin/bilder/Klokker_Smykker/fake_Rolex.jpg'),
('Rolex', 10, '1599.99', 50, 3, 3, 'Ekte Rolex', 'http://localhost/admin/bilder/Klokker_Smykker/Rolex.jpg'),
('Macbook Pro', 11, '699.99', 500, 1, 1111, 'Billig Macbook ', 'http://localhost/admin/bilder/Data/MAC.jpg'),
('Smykke', 12, '699.99', 50, 3, 310, 'Gullsmykke', 'http://localhost/admin/bilder/Klokker_Smykker/smykke.jpg'),
('Lenovo Thinkpad', 13, '12000.00', 5000, 1, 1112, 'Veldig bra pc til veldig lite pc', 'http://localhost/admin/bilder/Data/lenovo_thinkpad_x61_tablet_pc_425.jpg'),
('Maskin med skjerm', 14, '300.00', 11, 1, 1113, 'Billig pc med skjerm', 'http://localhost/admin/bilder/Data/gammel%20pc.png'),
('Medion media pc', 11123, '400.00', 50000, 1, 1113, 'Billig pc uten skjerm', 'http://localhost/admin/bilder/Data/pc1.jpg'),
('Tastatur med skjerm', 11124, '500.00', 90000, 1, 1115, 'Tastatur med skjerm selges billig', 'http://localhost/admin/bilder/Data/Logitech_tastatur_19600d.jpg'),
('Apple tastatur', 11125, '600.00', 600, 1, 1115, 'Apple tastatur', 'http://localhost/admin/bilder/Data/apple-tastatur_42175a.jpg'),
('Billig PC-skjerm', 11126, '200.00', 50, 1, 1114, 'Billige skjermer som skal ut', 'http://localhost/admin/bilder/Data/430486-9-1286140545048.jpg'),
('MAC', 11129, '11500.00', 50, 1, 1111, 'Billig mac', 'http://localhost/admin/bilder/Data/cam24.jpg'),
('HP Bærbar pc', 11130, '10000.00', 20, 1, 1112, 'HP PAVILION DV3- 4030eo', 'http://localhost/admin/bilder/Data/hp_pavilion_dv3-4030er_1.jpg'),
('HP PC-skjerm', 11127, '800.00', 500, 1, 1114, 'HP PC skjerm', 'http://localhost/admin/bilder/Data/HP_skjerm_45338a.jpg'),
('Sony Ericsson T610', 11131, '500.00', 40, 2, 20, 'Sony Ericsson T610 med all utstyr og Bluetooth handsfreeset', 'http://localhost/admin/bilder/Elektronikk/954-main-medium-sony-ericsson-t610.jpg'),
('Nokia N97', 11132, '1500.00', 61, 2, 20, 'Nokia N97 med full GPS software fra OVI', 'http://localhost/admin/bilder/Elektronikk/Nokia-N97-0.jpg'),
('Nokia 6460', 11133, '400.00', 69, 2, 20, 'Kul mobil til utrolig lav pris', 'http://localhost/admin/bilder/Elektronikk/i_211290.jpg'),
('Nokia ', 11134, '340.00', 28, 2, 20, 'Mobil uten fargeskjerm som passer til eldre mennesker', 'http://localhost/admin/bilder/Elektronikk/nokia.jpg'),
('Nokia 3310', 11135, '150.00', 10, 2, 20, 'Nokia 3310 uten fargeskjerm', 'http://localhost/admin/bilder/Elektronikk/nokia3310.jpg'),
('Tom Tom 150', 11136, '1999.00', 151, 2, 30, 'Tom Tom 150', 'http://localhost/admin/bilder/Elektronikk/gps5.jpg'),
('Tom Tom 350', 11137, '1999.00', 151, 2, 30, 'Tom Tom 350', 'http://localhost/admin/bilder/Elektronikk/gps1.jpg'),
('Garmin GPS', 11141, '499.00', 49, 2, 30, 'Garmin GPS med norgeskart', 'http://localhost/admin/bilder/Elektronikk/gps4.jpg'),
('NAVIGON', 11140, '500.00', 39, 2, 30, 'NAVIGON GPS med Europakart', 'http://localhost/admin/bilder/Elektronikk/gps2.jpg'),
('Mp3 spiller', 11142, '400.00', 40, 2, 40, 'Billig mp3 spiller med fargeskjerm', 'http://localhost/admin/bilder/Elektronikk/mp31.jpg'),
('Mp3 spiller', 11143, '500.00', 40, 2, 40, 'Billig mp3 spiller uten fargeskjerm', 'http://localhost/admin/bilder/Elektronikk/mp32.jpg'),
('Mp3 spiller', 11144, '800.00', 40, 2, 40, 'Billig mp3 spiller med fargeskjerm', 'http://localhost/admin/bilder/Elektronikk/mp33.jpg'),
('Mp3 spiller', 11145, '400.00', 40, 2, 40, 'Billig mp3 spiller uten fargeskjerm', 'http://localhost/admin/bilder/Elektronikk/mp34.jpg'),
('blå smykke', 11146, '400.00', 500, 3, 310, 'blå smykke', 'http://localhost/admin/bilder/Klokker_Smykker/bl%C3%A5ttsmykke.jpg');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
