-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le :  mer. 11 mars 2020 à 09:29
-- Version du serveur :  5.7.26
-- Version de PHP :  7.3.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `projetiron`
--

-- --------------------------------------------------------

--
-- Structure de la table `asso_entity_keyword`
--

DROP TABLE IF EXISTS `asso_entity_keyword`;
CREATE TABLE IF NOT EXISTS `asso_entity_keyword` (
  `num_entity` int(11) NOT NULL,
  `num_keyword` int(11) NOT NULL,
  KEY `num_entity` (`num_entity`),
  KEY `num_entity_2` (`num_entity`),
  KEY `num_keyword` (`num_keyword`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `asso_entity_keyword`
--

INSERT INTO `asso_entity_keyword` (`num_entity`, `num_keyword`) VALUES
(1, 1),
(1, 4),
(2, 2),
(2, 6),
(3, 1),
(3, 3),
(4, 2),
(4, 4),
(6, 1),
(6, 13),
(7, 1),
(7, 1),
(7, 1),
(19, 6),
(19, 14),
(20, 1),
(21, 1),
(22, 1),
(23, 1),
(24, 1),
(25, 1),
(26, 1),
(27, 1),
(28, 15),
(28, 16),
(29, 15),
(29, 16),
(30, 15),
(30, 16),
(31, 15),
(31, 16),
(32, 15),
(32, 16),
(33, 15),
(33, 16),
(34, 15),
(34, 16),
(21, 2),
(22, 2);

-- --------------------------------------------------------

--
-- Structure de la table `entity`
--

DROP TABLE IF EXISTS `entity`;
CREATE TABLE IF NOT EXISTS `entity` (
  `id_entity` int(16) NOT NULL AUTO_INCREMENT,
  `nom` varchar(30) NOT NULL,
  `contenant` tinyint(1) NOT NULL,
  `dimensionx` int(10) NOT NULL,
  `dimensiony` int(10) NOT NULL,
  `dimensionz` int(10) NOT NULL,
  `positionx` int(10) NOT NULL,
  `positiony` int(10) NOT NULL,
  `positionz` int(10) NOT NULL,
  `image` varchar(255) NOT NULL,
  `num_entity` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_entity`),
  KEY `num_entity` (`num_entity`)
) ENGINE=InnoDB AUTO_INCREMENT=35 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `entity`
--

INSERT INTO `entity` (`id_entity`, `nom`, `contenant`, `dimensionx`, `dimensiony`, `dimensionz`, `positionx`, `positiony`, `positionz`, `image`, `num_entity`) VALUES
(1, 'Marteau', 0, 12, 40, 4, 0, 0, 0, '1', 1),
(2, 'Carton_1', 1, 80, 80, 40, 0, 0, 0, '4', 4),
(3, 'Vélo', 0, 150, 110, 38, 400, 0, 0, '3', 3),
(4, 'Boite_1', 1, 200, 200, 120, 0, 0, 0, '2', 2),
(5, 'Clé_de_12', 1, 200, 200, 120, 0, 0, 0, '2', 2),
(6, 'test', 1, 2, 2, 2, 2, 3, 4, '2', 2),
(7, 'marie', 1, 4, 2, 5, 4, 5, 6, '2', 2),
(19, 'Dossier', 0, 0, 0, 0, 0, 0, 0, '3', 7),
(20, 'marie', 0, 0, 0, 0, 0, 0, 0, '1', 2),
(21, 'toto', 0, 0, 0, 0, 0, 0, 0, '1', 2),
(22, 'toto', 0, 0, 0, 0, 0, 0, 0, '1', 2),
(23, 'toto', 0, 0, 0, 0, 0, 0, 0, '1', 2),
(24, 'toto', 0, 0, 0, 0, 0, 0, 0, '1', 2),
(25, 'toto3', 0, 0, 0, 0, 0, 0, 0, '1', 2),
(26, 'toto3', 0, 0, 0, 0, 0, 0, 0, '1', 2),
(27, 'test4', 1, 0, 0, 0, 0, 0, 0, '2', 2),
(28, 'test1', 1, 0, 0, 0, 0, 0, 0, '3', 4),
(29, 'test1', 1, 0, 0, 0, 0, 0, 0, '3', 4),
(30, 'test20', 1, 0, 0, 0, 0, 0, 0, '3', 4),
(31, 'test21', 1, 0, 0, 0, 0, 0, 0, '3', 4),
(32, 'test22', 1, 0, 0, 0, 0, 0, 0, '3', 4),
(33, 'test23', 1, 0, 0, 0, 0, 0, 0, '3', 4),
(34, 'test2325464', 1, 0, 0, 0, 0, 0, 0, '3', 4);

-- --------------------------------------------------------

--
-- Structure de la table `image`
--

DROP TABLE IF EXISTS `image`;
CREATE TABLE IF NOT EXISTS `image` (
  `id_image` int(11) NOT NULL AUTO_INCREMENT,
  `lien` varchar(2200) NOT NULL,
  PRIMARY KEY (`id_image`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `image`
--

INSERT INTO `image` (`id_image`, `lien`) VALUES
(1, 'hammer'),
(2, 'spanner'),
(3, 'box'),
(4, 'bicycle');

-- --------------------------------------------------------

--
-- Structure de la table `keyword`
--

DROP TABLE IF EXISTS `keyword`;
CREATE TABLE IF NOT EXISTS `keyword` (
  `id_keyword` int(16) NOT NULL AUTO_INCREMENT,
  `name` varchar(30) NOT NULL,
  PRIMARY KEY (`id_keyword`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `keyword`
--

INSERT INTO `keyword` (`id_keyword`, `name`) VALUES
(1, 'Rouge'),
(2, 'Bleu'),
(3, 'Vert'),
(4, 'Acier'),
(5, 'Nylon'),
(6, 'Carton'),
(13, ' Bleu'),
(14, 'Gris'),
(15, 'Violet'),
(16, 'Beige');

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `asso_entity_keyword`
--
ALTER TABLE `asso_entity_keyword`
  ADD CONSTRAINT `asso_entity_keyword_ibfk_1` FOREIGN KEY (`num_entity`) REFERENCES `entity` (`id_entity`) ON DELETE CASCADE,
  ADD CONSTRAINT `asso_entity_keyword_ibfk_2` FOREIGN KEY (`num_keyword`) REFERENCES `keyword` (`id_keyword`) ON DELETE CASCADE;

--
-- Contraintes pour la table `entity`
--
ALTER TABLE `entity`
  ADD CONSTRAINT `entity_ibfk_1` FOREIGN KEY (`num_entity`) REFERENCES `entity` (`id_entity`) ON DELETE SET NULL ON UPDATE SET NULL;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
