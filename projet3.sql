-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le :  mar. 29 jan. 2019 à 17:53
-- Version du serveur :  5.7.23
-- Version de PHP :  7.2.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `projet3`
--

-- --------------------------------------------------------

--
-- Structure de la table `comment`
--

DROP TABLE IF EXISTS `comment`;
CREATE TABLE IF NOT EXISTS `comment` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `postId` int(11) NOT NULL,
  `author` varchar(50) NOT NULL,
  `comment` text NOT NULL,
  `createdAt` datetime NOT NULL,
  `updated` tinyint(1) NOT NULL DEFAULT '0',
  `updatedAt` datetime DEFAULT NULL,
  `reported` tinyint(1) NOT NULL DEFAULT '0',
  `reportedAt` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=25 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `comment`
--

INSERT INTO `comment` (`id`, `postId`, `author`, `comment`, `createdAt`, `updated`, `updatedAt`, `reported`, `reportedAt`) VALUES
(1, 11, 'test', 'testestestestestestetsetse', '2019-01-24 17:24:37', 0, NULL, 0, NULL),
(2, 11, 'testt', 'testestestesteyjstdjstu', '2019-01-24 17:24:55', 0, NULL, 0, NULL),
(3, 11, 'auteur 1', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', '2019-01-24 18:41:50', 0, NULL, 0, NULL),
(4, 11, 'auteur 2', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', '2019-01-24 18:41:50', 0, NULL, 0, NULL),
(5, 11, 'auteur 1', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', '2019-01-24 18:41:50', 0, NULL, 0, NULL),
(6, 11, 'auteur 1', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', '2019-01-24 18:41:50', 0, NULL, 0, NULL),
(7, 11, 'auteur 3', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', '2019-01-24 18:41:50', 0, NULL, 0, NULL),
(8, 11, 'Pp', 'pp', '2019-01-26 12:16:14', 0, NULL, 0, NULL),
(9, 11, 'Po', 'po', '2019-01-26 12:17:09', 0, NULL, 1, '2019-01-26 14:36:18'),
(10, 10, 'Test', 'test', '2019-01-26 12:17:49', 0, NULL, 0, NULL),
(11, 10, 'Test', 'test', '2019-01-26 12:17:54', 0, NULL, 0, NULL),
(12, 10, 'Test2', 'test', '2019-01-26 12:18:36', 0, NULL, 0, NULL),
(13, 10, 'Test2', 'test', '2019-01-26 12:18:43', 0, NULL, 0, NULL),
(14, 10, 'Test3', 'test', '2019-01-26 12:18:50', 0, NULL, 0, NULL),
(15, 10, 'Test4', 'test', '2019-01-26 12:18:59', 0, NULL, 0, NULL),
(16, 9, 'Test Id9', 'test', '2019-01-26 12:19:18', 0, NULL, 0, NULL),
(17, 9, 'Tyeteyet Id9', 'test', '2019-01-26 12:19:40', 0, NULL, 0, NULL),
(18, 8, 'Ok', 'ok', '2019-01-26 12:35:31', 0, NULL, 1, '2019-01-26 14:37:43'),
(19, 8, 'Po', 'ppo', '2019-01-26 12:54:03', 0, NULL, 0, NULL),
(20, 11, 'Nom', 'commntaire', '2019-01-26 14:33:13', 0, NULL, 1, '2019-01-26 14:35:47'),
(21, 11, 'Nom', 'commntaire', '2019-01-26 14:33:51', 0, NULL, 1, '2019-01-26 14:35:42'),
(22, 8, 'Test', 'testesteste', '2019-01-26 14:39:59', 0, NULL, 0, NULL),
(23, 6, 'Laura', 'Great !', '2019-01-26 15:45:11', 0, NULL, 1, '2019-01-26 15:45:16'),
(24, 6, 'Test', 'test', '2019-01-29 18:50:42', 0, NULL, 1, '2019-01-29 18:50:47');

-- --------------------------------------------------------

--
-- Structure de la table `post`
--

DROP TABLE IF EXISTS `post`;
CREATE TABLE IF NOT EXISTS `post` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `author` varchar(50) NOT NULL,
  `title` varchar(255) NOT NULL,
  `content` text NOT NULL,
  `createdAt` datetime NOT NULL,
  `updated` tinyint(1) NOT NULL DEFAULT '0',
  `updatedAt` datetime DEFAULT NULL,
  `reported` tinyint(1) NOT NULL DEFAULT '0',
  `reportedAt` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=13 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `post`
--

INSERT INTO `post` (`id`, `author`, `title`, `content`, `createdAt`, `updated`, `updatedAt`, `reported`, `reportedAt`) VALUES
(6, 'auteur test', 'test 1', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', '2019-01-24 18:39:07', 0, NULL, 0, NULL),
(7, 'auteur test', 'test 2', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', '2019-01-24 18:40:00', 0, NULL, 0, NULL),
(8, 'auteur test', 'test 3', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', '2019-01-24 18:40:00', 0, NULL, 0, NULL),
(9, 'auteur test', 'test 4', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', '2019-01-24 18:40:00', 0, NULL, 0, NULL),
(10, 'auteur test', 'test 5', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', '2019-01-24 18:40:00', 0, NULL, 0, NULL),
(11, 'auteur test', 'test 6', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', '2019-01-24 18:40:00', 0, NULL, 0, NULL),
(12, 'auteur test', 'test 7', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', '2019-01-28 18:40:00', 0, NULL, 0, NULL);

-- --------------------------------------------------------

--
-- Structure de la table `user`
--

DROP TABLE IF EXISTS `user`;
CREATE TABLE IF NOT EXISTS `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `role` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
