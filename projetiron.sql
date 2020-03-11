-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le :  mar. 26 nov. 2019 à 16:04
-- Version du serveur :  5.7.26
-- Version de PHP :  7.2.18

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
(4, 2),
(4, 4);

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
  `num_entity` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_entity`),
  KEY `num_entity` (`num_entity`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `entity`
--

INSERT INTO `entity` (`id_entity`, `nom`, `contenant`, `dimensionx`, `dimensiony`, `dimensionz`, `positionx`, `positiony`, `positionz`, `num_entity`) VALUES
(1, 'Marteau', 0, 12, 40, 4, 0, 0, 0, 2),
(2, 'Carton_1', 1, 80, 80, 40, 0, 0, 0, 4),
(3, 'Vélo', 0, 150, 110, 38, 400, 0, 0, NULL),
(4, 'Boite_1', 1, 200, 200, 120, 0, 0, 0, NULL);

-- --------------------------------------------------------

--
-- Structure de la table `keyword`
--

DROP TABLE IF EXISTS `keyword`;
CREATE TABLE IF NOT EXISTS `keyword` (
  `id_keyword` int(16) NOT NULL AUTO_INCREMENT,
  `name` varchar(30) NOT NULL,
  PRIMARY KEY (`id_keyword`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `keyword`
--

INSERT INTO `keyword` (`id_keyword`, `name`) VALUES
(1, 'Rouge'),
(2, 'Bleu'),
(3, 'Vert'),
(4, 'Acier'),
(5, 'Nylon'),
(6, 'Carton');

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `asso_entity_keyword`
--
ALTER TABLE `asso_entity_keyword`
  ADD CONSTRAINT `asso_entity_keyword_ibfk_1` FOREIGN KEY (`num_entity`) REFERENCES `entity` (`id_entity`),
  ADD CONSTRAINT `asso_entity_keyword_ibfk_2` FOREIGN KEY (`num_keyword`) REFERENCES `keyword` (`id_keyword`);

--
-- Contraintes pour la table `entity`
--
ALTER TABLE `entity`
  ADD CONSTRAINT `entity_ibfk_1` FOREIGN KEY (`num_entity`) REFERENCES `entity` (`id_entity`) ON DELETE SET NULL ON UPDATE SET NULL;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
