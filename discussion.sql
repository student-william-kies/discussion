-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : jeu. 03 déc. 2020 à 16:21
-- Version du serveur :  5.7.31
-- Version de PHP : 7.3.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `discussion`
--

-- --------------------------------------------------------

--
-- Structure de la table `messages`
--

DROP TABLE IF EXISTS `messages`;
CREATE TABLE IF NOT EXISTS `messages` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `message` varchar(140) NOT NULL,
  `id_utilisateur` int(11) NOT NULL,
  `date` date NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=131 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `messages`
--

INSERT INTO `messages` (`id`, `message`, `id_utilisateur`, `date`) VALUES
(130, 'A toute la ziz', 4, '2020-12-03'),
(129, 'Yes a toute mec !', 2, '2020-12-03'),
(128, 'Temps pis hein, moi les gars je vais dormir un peu on vas rentrer en zone temporelle accÃ©lÃ©rÃ© ! a toute', 1, '2020-12-03'),
(127, 'Ah les gars y&#039;a des prioritÃ© ! La nouvelle XRTZX de chez Nvidia c&#039;est une tuerie je ne pouvais pas manquÃ© sa !', 4, '2020-12-03'),
(125, 'Dit-il alors qu&#039;il regrette de venir !', 1, '2020-12-03'),
(126, 'C&#039;est vrai sa ! Traitre', 2, '2020-12-03'),
(124, 'On est bien sur Terre sur nous haha !', 4, '2020-12-03'),
(123, 'Yes nickel ! Franchement la compagnie au top !', 2, '2020-12-03'),
(121, 'Ah c&#039;est cool ! Bien passÃ© le voyage ?', 1, '2020-12-03'),
(122, 'On est encore dans la navette nous, direction pluton Wallah', 1, '2020-12-03'),
(119, 'Bonjour les ziz ! Bien arrivÃ© sur VÃ©nus ! C&#039;est vraiment... WoW !', 2, '2020-12-03');

-- --------------------------------------------------------

--
-- Structure de la table `utilisateurs`
--

DROP TABLE IF EXISTS `utilisateurs`;
CREATE TABLE IF NOT EXISTS `utilisateurs` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `login` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `utilisateurs`
--

INSERT INTO `utilisateurs` (`id`, `login`, `password`) VALUES
(1, 'William', '$2y$10$qqXAnaZgJ87a3ApekPBi9ONKzTNBhWpYnIQSPcer2SkLvp1ZwdKVW'),
(2, 'Guillaume', '$2y$10$puuDbw8Z7G72FKjLDmdBNeIxW5AtwAjYrUSbACLEOEWE3lsu9I9mm'),
(3, 'Joris', '$2y$10$CYdA/lWWtt7sTfhkbk0KG.6c4HXk0V5HqiIhZiBXWEARerz7SOUu6'),
(4, 'Maxime', '$2y$10$5P6Lz/8DCZbt9VJn2tRi2uekX57/GBJ8YYFnUbzcwIrWmcyI9Cs5G'),
(5, 'Eivor', '$2y$10$WWl9p4/dGcexGlcwYwayducE7iL.YRBT9cJgmeCy24TBbcLKuHhDm'),
(6, 'Ben', '$2y$10$IuBr186iUUTQf603.uDNN.oFpoB4rlSir7pJ6IAOTRJhpQQkk5nlm'),
(7, 'Secure', '$2y$10$ycoQlRxsjHq7iF/tbeoB8uyUHwyHfY8PAjHE/OBGkc39eisJ.o4tq');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
