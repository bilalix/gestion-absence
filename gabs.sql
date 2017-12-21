-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Apr 23, 2016 at 10:55 PM
-- Server version: 5.6.17
-- PHP Version: 5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `gabs`
--

-- --------------------------------------------------------

--
-- Table structure for table `absence`
--

CREATE TABLE IF NOT EXISTS `absence` (
  `id_absence` int(11) NOT NULL AUTO_INCREMENT,
  `id_seance` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `justifiee` tinyint(1) NOT NULL,
  `comm_abs` text,
  PRIMARY KEY (`id_absence`),
  KEY `FK_Avoir` (`id_seance`),
  KEY `FK_concerne` (`id_user`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=25 ;

--
-- Dumping data for table `absence`
--

INSERT INTO `absence` (`id_absence`, `id_seance`, `id_user`, `justifiee`, `comm_abs`) VALUES
(2, 1, 4, 1, 'malade'),
(3, 1, 6, 0, NULL),
(4, 5, 6, 1, NULL),
(5, 12, 4, 0, NULL),
(24, 1, 2, 1, 'nonnnn');

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE IF NOT EXISTS `admin` (
  `id_user` int(11) NOT NULL,
  `nom_admin` varchar(30) DEFAULT NULL,
  `prenom_admin` varchar(30) DEFAULT NULL,
  `email_admin` varchar(30) NOT NULL,
  PRIMARY KEY (`id_user`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id_user`, `nom_admin`, `prenom_admin`, `email_admin`) VALUES
(1, 'EL HOUDAIGUI', 'Bilal', 'bilal.elhoudaigui@gmail.com'),
(7, 'DAMOUN', 'Farouk', 'damoun.farouk@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `affecter`
--

CREATE TABLE IF NOT EXISTS `affecter` (
  `id_user` int(11) NOT NULL,
  `id_module` int(11) NOT NULL,
  PRIMARY KEY (`id_user`,`id_module`),
  KEY `FK_affecter2` (`id_module`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `affecter`
--

INSERT INTO `affecter` (`id_user`, `id_module`) VALUES
(3, 1),
(5, 2),
(5, 3),
(8, 3),
(8, 4),
(9, 4),
(8, 5),
(9, 5),
(3, 6);

-- --------------------------------------------------------

--
-- Table structure for table `backup`
--

CREATE TABLE IF NOT EXISTS `backup` (
  `backup_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `backup_name` varchar(255) NOT NULL,
  `backup_location` varchar(255) NOT NULL,
  `created_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`backup_id`),
  UNIQUE KEY `backup_name_UNIQUE` (`backup_name`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `backup`
--

INSERT INTO `backup` (`backup_id`, `backup_name`, `backup_location`, `created_date`) VALUES
(3, '72c848ff48eda75879b2967d089f7447_site.tar.gz', 'backups/sites/', '2016-04-23 20:18:05');

-- --------------------------------------------------------

--
-- Table structure for table `enseignant`
--

CREATE TABLE IF NOT EXISTS `enseignant` (
  `id_user` int(11) NOT NULL,
  `nom_ens` varchar(25) NOT NULL,
  `prenom_ens` varchar(25) NOT NULL,
  `adresse_ens` varchar(30) DEFAULT NULL,
  `ville_ens` varchar(30) DEFAULT NULL,
  `photo_ens` text,
  `email_ens` varchar(25) NOT NULL,
  `phone_ens` varchar(30) DEFAULT NULL,
  PRIMARY KEY (`id_user`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `enseignant`
--

INSERT INTO `enseignant` (`id_user`, `nom_ens`, `prenom_ens`, `adresse_ens`, `ville_ens`, `photo_ens`, `email_ens`, `phone_ens`) VALUES
(3, 'DALAL', 'Imane', 'Adresse dalal', 'Casa', 'img/ens/62025717582425a155.jpg', 'imane.dalal@gmail.com', '0615335244'),
(5, 'SALHI', 'mourad', 'Adresse de Mourad', '', 'img/ens/8g278257254g17872h254.jpg', 'salhi.mourad@gmail.com', '0625352517'),
(8, 'AOI', 'Sora', NULL, NULL, 'img/ens/87245375g4582427f872.jpg', 'aoi.sora@gmail.com', '0654253574'),
(9, 'YAGAMI', 'Himiko', 'Adresse de Himiko', 'Tokyo', 'img/ens/718752425a72452475155.jpg', 'yagami.himiko@gmail.com', '0112716677');

-- --------------------------------------------------------

--
-- Table structure for table `etudiant`
--

CREATE TABLE IF NOT EXISTS `etudiant` (
  `id_user` int(11) NOT NULL,
  `CNE` int(11) NOT NULL,
  `nom_etu` varchar(25) NOT NULL,
  `prenom_etu` varchar(25) NOT NULL,
  `date_naiss_etu` date DEFAULT NULL,
  `ville_naiss_etu` varchar(30) DEFAULT NULL,
  `adresse_etu` varchar(50) DEFAULT NULL,
  `ville_etu` varchar(30) DEFAULT NULL,
  `photo_etu` text,
  `email_etu` varchar(30) NOT NULL,
  `phone_etu` varchar(30) DEFAULT NULL,
  PRIMARY KEY (`id_user`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `etudiant`
--

INSERT INTO `etudiant` (`id_user`, `CNE`, `nom_etu`, `prenom_etu`, `date_naiss_etu`, `ville_naiss_etu`, `adresse_etu`, `ville_etu`, `photo_etu`, `email_etu`, `phone_etu`) VALUES
(2, 1985858585, 'SADKI', 'Hassan', '2000-03-06', 'Larache', 'Adresse sadki', 'Larache', 'img/etu/2524384k287524g25423.jpg', 'sadki.hassan@gmail.com', '0633114488'),
(4, 1155774466, 'ALAOUI', 'Ali', '1990-12-16', 'Rabat', 'Adresse de Alaoui Ali', 'Tanger', NULL, 'alaoui.ali@gmail.com', '0625143658'),
(6, 1254879652, 'MORABET', 'ilyas', '1993-04-11', 'Sale', 'Adresse de MORABET ilyas', 'Tetouan', 'img/etu/7192b42620255a155.jpg', 'morabet.ilyas@gmail.com', '0658472435'),
(11, 88556324, 'Jobs', 'Steve', '1995-12-05', 'California', 'Adresse de Steve', 'London', 'img/etu/620257192b425a155.jpg', 'steve.jobs@gmail.com', '0222555447'),
(12, 10224578, 'HAFFANE', 'Sara', '1991-02-15', '', '', '', '', 'haffane.sara@gmail.com', ''),
(21, 2147483647, 'HANAFI', 'Fadoua', '0000-00-00', '', 'Adresse de Fadoua', 'Asila', 'img/ens/6261571bc9b2e11d8.jpg', 'hanafi.fadoua@gmail.com', '0655442211');

-- --------------------------------------------------------

--
-- Table structure for table `etudier`
--

CREATE TABLE IF NOT EXISTS `etudier` (
  `id_user` int(11) NOT NULL,
  `id_module` int(11) NOT NULL,
  PRIMARY KEY (`id_user`,`id_module`),
  KEY `FK_Etudier2` (`id_module`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `etudier`
--

INSERT INTO `etudier` (`id_user`, `id_module`) VALUES
(2, 1),
(4, 1),
(6, 1),
(2, 2),
(4, 2),
(4, 3),
(6, 3),
(4, 4),
(6, 4),
(6, 5),
(2, 6),
(6, 6),
(2, 9),
(11, 9);

-- --------------------------------------------------------

--
-- Table structure for table `module`
--

CREATE TABLE IF NOT EXISTS `module` (
  `id_module` int(11) NOT NULL AUTO_INCREMENT,
  `intitule_module` varchar(30) NOT NULL,
  PRIMARY KEY (`id_module`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=11 ;

--
-- Dumping data for table `module`
--

INSERT INTO `module` (`id_module`, `intitule_module`) VALUES
(1, 'Developpement web'),
(2, 'JAVA'),
(3, 'Anglais'),
(4, 'Japonaise'),
(5, 'Calighraphie'),
(6, 'NoSQL'),
(9, 'Bioinformatics');

-- --------------------------------------------------------

--
-- Table structure for table `seance`
--

CREATE TABLE IF NOT EXISTS `seance` (
  `id_seance` int(11) NOT NULL AUTO_INCREMENT,
  `id_module` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `date_seance` date NOT NULL,
  `heure_debut` time DEFAULT NULL,
  `heure_fin` time DEFAULT NULL,
  `type_seance` varchar(15) NOT NULL,
  PRIMARY KEY (`id_seance`),
  KEY `FK_Enseigne` (`id_user`),
  KEY `FK_Occupe` (`id_module`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=15 ;

--
-- Dumping data for table `seance`
--

INSERT INTO `seance` (`id_seance`, `id_module`, `id_user`, `date_seance`, `heure_debut`, `heure_fin`, `type_seance`) VALUES
(1, 1, 3, '2016-04-03', '13:30:00', '15:00:00', 'Cours'),
(2, 1, 3, '2016-04-07', '08:30:00', '10:00:00', 'TP'),
(3, 1, 3, '2016-04-11', '10:30:00', '12:00:00', 'Cours'),
(4, 2, 5, '2016-04-05', '10:30:00', '12:00:00', 'Cours'),
(5, 2, 5, '2016-04-07', '08:30:00', '10:00:00', 'TP'),
(6, 3, 5, '2016-04-06', '13:30:00', '15:00:00', 'Cours'),
(7, 3, 8, '2016-04-06', '15:30:00', '17:00:00', 'TD'),
(8, 4, 8, '2016-04-01', '15:30:00', '17:00:00', 'Cours'),
(9, 4, 9, '2016-04-02', '13:30:00', '15:00:00', 'Cours'),
(10, 5, 8, '2016-04-02', '08:30:00', '10:00:00', 'TD'),
(11, 5, 9, '2016-04-03', '10:30:00', '12:00:00', 'Cours'),
(12, 6, 3, '2016-03-01', '10:30:00', '12:00:00', 'Cours'),
(13, 6, 3, '2016-03-03', '08:30:00', '10:00:00', 'TP'),
(14, 6, 3, '2015-05-05', '08:30:00', '10:00:00', 'TP');

-- --------------------------------------------------------

--
-- Table structure for table `session`
--

CREATE TABLE IF NOT EXISTS `session` (
  `session_id` varchar(45) NOT NULL,
  `ip_address` varchar(20) NOT NULL,
  `user_agent` varchar(255) NOT NULL,
  `last_activity` int(10) unsigned NOT NULL,
  `user_data` text NOT NULL,
  PRIMARY KEY (`session_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `id_user` int(11) NOT NULL AUTO_INCREMENT,
  `login` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `type_user` varchar(20) NOT NULL,
  `access` tinyint(1) NOT NULL,
  PRIMARY KEY (`id_user`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=22 ;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id_user`, `login`, `password`, `type_user`, `access`) VALUES
(1, 'bilal', '202cb962ac59075b964b07152d234b70', 'admin', 1),
(2, 'hassan', '202cb962ac59075b964b07152d234b70', 'etudiant', 1),
(3, 'imane', '202cb962ac59075b964b07152d234b70', 'enseignant', 1),
(4, 'Ali', '202cb962ac59075b964b07152d234b70', 'etudiant', 1),
(5, 'SALHI', '202cb962ac59075b964b07152d234b70', 'enseignant', 1),
(6, 'ilyas', '202cb962ac59075b964b07152d234b70', 'etudiant', 1),
(7, 'farouk', '202cb962ac59075b964b07152d234b70', 'admin', 1),
(8, 'sora', '202cb962ac59075b964b07152d234b70', 'enseignant', 1),
(9, 'himiko', '202cb962ac59075b964b07152d234b70', 'enseignant', 0),
(11, 'steve', '202cb962ac59075b964b07152d234b70', 'etudiant', 1),
(12, 'sara', '202cb962ac59075b964b07152d234b70', 'etudiant', 1),
(21, 'fadoua', '202cb962ac59075b964b07152d234b70', 'etudiant', 1);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `absence`
--
ALTER TABLE `absence`
  ADD CONSTRAINT `FK_Avoir` FOREIGN KEY (`id_seance`) REFERENCES `seance` (`id_seance`),
  ADD CONSTRAINT `FK_concerne` FOREIGN KEY (`id_user`) REFERENCES `etudiant` (`id_user`);

--
-- Constraints for table `admin`
--
ALTER TABLE `admin`
  ADD CONSTRAINT `FK_Inheritance_3` FOREIGN KEY (`id_user`) REFERENCES `user` (`id_user`);

--
-- Constraints for table `affecter`
--
ALTER TABLE `affecter`
  ADD CONSTRAINT `FK_affecter` FOREIGN KEY (`id_user`) REFERENCES `enseignant` (`id_user`),
  ADD CONSTRAINT `FK_affecter2` FOREIGN KEY (`id_module`) REFERENCES `module` (`id_module`);

--
-- Constraints for table `enseignant`
--
ALTER TABLE `enseignant`
  ADD CONSTRAINT `FK_Inheritance_1` FOREIGN KEY (`id_user`) REFERENCES `user` (`id_user`);

--
-- Constraints for table `etudiant`
--
ALTER TABLE `etudiant`
  ADD CONSTRAINT `FK_Inheritance_2` FOREIGN KEY (`id_user`) REFERENCES `user` (`id_user`);

--
-- Constraints for table `etudier`
--
ALTER TABLE `etudier`
  ADD CONSTRAINT `FK_Etudier` FOREIGN KEY (`id_user`) REFERENCES `etudiant` (`id_user`),
  ADD CONSTRAINT `FK_Etudier2` FOREIGN KEY (`id_module`) REFERENCES `module` (`id_module`);

--
-- Constraints for table `seance`
--
ALTER TABLE `seance`
  ADD CONSTRAINT `FK_Enseigne` FOREIGN KEY (`id_user`) REFERENCES `enseignant` (`id_user`),
  ADD CONSTRAINT `FK_Occupe` FOREIGN KEY (`id_module`) REFERENCES `module` (`id_module`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
