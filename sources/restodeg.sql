-- phpMyAdmin SQL Dump
-- version 4.0.6deb1
-- http://www.phpmyadmin.net
--
-- Client: localhost
-- Généré le: Jeu 24 Avril 2014 à 11:46
-- Version du serveur: 5.5.37-0ubuntu0.13.10.1
-- Version de PHP: 5.5.3-1ubuntu2.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de données: `restodeg`
--

-- --------------------------------------------------------

--
-- Structure de la table `plats`
--

CREATE TABLE IF NOT EXISTS `plats` (
  `id_plats` smallint(6) NOT NULL AUTO_INCREMENT,
  `nom_plats` varchar(16) NOT NULL,
  `contenu_plats` varchar(128) DEFAULT NULL,
  `tarif_plats` varchar(45) NOT NULL,
  PRIMARY KEY (`id_plats`),
  UNIQUE KEY `id_plats_UNIQUE` (`id_plats`),
  UNIQUE KEY `nom_plats_UNIQUE` (`nom_plats`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=6 ;

--
-- Contenu de la table `plats`
--

INSERT INTO `plats` (`id_plats`, `nom_plats`, `contenu_plats`, `tarif_plats`) VALUES
(1, 'Onigiri thon may', 'riz, algue, thon avec mayonaise', '2,80'),
(2, 'Onigiri saumon', 'riz, algue, saumon', '2,80'),
(3, 'Onigiri bonite', 'riz, algue, bonite', '2,80'),
(4, 'Katsudon', 'porc pané, oeuf, riz', '7.80'),
(5, 'Gyuudon', 'lamelles de boeuf, oeuf,oignons, riz', '7.80');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
