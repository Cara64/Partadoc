-- phpMyAdmin SQL Dump
-- version 3.5.1
-- http://www.phpmyadmin.net
--
-- Client: localhost
-- Généré le: Jeu 20 Décembre 2012 à 20:37
-- Version du serveur: 5.5.24-log
-- Version de PHP: 5.4.3

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de données: `partadoc`
--

-- --------------------------------------------------------

--
-- Structure de la table `historique_partadoc`
--

CREATE TABLE IF NOT EXISTS `historique_partadoc` (
  `code` int(5) NOT NULL AUTO_INCREMENT,
  `utilisateur` varchar(51) NOT NULL,
  `operation` varchar(25) NOT NULL,
  `fichier` varchar(50) NOT NULL,
  `dateOperation` varchar(75) NOT NULL,
  PRIMARY KEY (`code`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=16 ;

-- --------------------------------------------------------

--
-- Structure de la table `utilisateurs_partadoc`
--

CREATE TABLE IF NOT EXISTS `utilisateurs_partadoc` (
  `login` varchar(25) NOT NULL,
  `nom` varchar(25) NOT NULL,
  `prenom` varchar(25) NOT NULL,
  `motDePasse` varchar(32) NOT NULL,
  PRIMARY KEY (`login`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `utilisateurs_partadoc`
--

INSERT INTO `utilisateurs_partadoc` (`login`, `nom`, `prenom`, `motDePasse`) VALUES
('gcarayon', 'Carayon', 'Guillaume', 'fc788ab1677e17751913bda2588017dd'),
('user', 'Test', 'Utilisateur', '5f4dcc3b5aa765d61d8327deb882cf99');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
