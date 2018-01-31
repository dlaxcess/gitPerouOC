-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le :  jeu. 11 jan. 2018 à 19:26
-- Version du serveur :  10.1.28-MariaDB
-- Version de PHP :  7.1.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `mvc`
--

-- --------------------------------------------------------

--
-- Structure de la table `comments`
--

CREATE TABLE `comments` (
  `comment_id` int(11) NOT NULL,
  `post_id` int(11) NOT NULL,
  `comment_author` varchar(255) CHARACTER SET utf8 NOT NULL,
  `comment` text CHARACTER SET utf8 NOT NULL,
  `comment_date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `comments`
--

INSERT INTO `comments` (`comment_id`, `post_id`, `comment_author`, `comment`, `comment_date`) VALUES
(1, 1, 'Phil', 'et voici un commentaire!\r\nil faut l\'afficher...', '2018-01-08 13:37:06'),
(2, 1, 'john', 'bah c\'est super!', '2018-01-08 13:38:26'),
(3, 1, 'phil', 'yo!', '2018-01-11 09:58:14'),
(4, 1, 'jo', '', '2018-01-08 20:51:35'),
(5, 1, 'doc', '', '2018-01-08 20:52:47'),
(6, 1, 'flo', 'hello', '2018-01-11 10:41:13'),
(7, 1, 'ki', '', '2018-01-08 21:28:38'),
(8, 1, 'yo', '', '2018-01-08 23:09:04'),
(9, 1, 'sdf', '', '2018-01-08 23:15:02'),
(10, 1, 'jo', '', '2018-01-08 23:23:56'),
(11, 1, 'jo', 'poiuytre', '2018-01-11 19:23:01'),
(12, 1, 'jo', '', '2018-01-08 23:33:10'),
(13, 1, 'jo', '', '2018-01-08 23:33:17'),
(14, 1, 'jo', '', '2018-01-08 23:34:39'),
(15, 1, 'jo', '', '2018-01-09 00:01:34'),
(16, 1, 'jo', 'tout marche!', '2018-01-11 18:26:27'),
(17, 1, 'jo', '', '2018-01-11 01:30:24'),
(18, 1, 'phil', 'et la ça marche?', '2018-01-09 09:59:43'),
(19, 1, 'bob', 'moi, c\'est bob!', '2018-01-10 14:36:35'),
(20, 1, 'phil', 'avec les use', '2018-01-11 18:26:10'),
(21, 1, 'phil', 'tic toc!', '2018-01-11 19:15:22'),
(22, 1, 'jo', 'blou!', '2018-01-11 19:16:31'),
(23, 2, 'phil', 'roh c est po grave! enfin!', '2018-01-11 19:26:27');

-- --------------------------------------------------------

--
-- Structure de la table `posts`
--

CREATE TABLE `posts` (
  `post_id` int(11) NOT NULL,
  `post_title` varchar(255) CHARACTER SET utf8 NOT NULL,
  `post_content` text CHARACTER SET utf8 NOT NULL,
  `post_creation_date` datetime NOT NULL,
  `post_author` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `posts`
--

INSERT INTO `posts` (`post_id`, `post_title`, `post_content`, `post_creation_date`, `post_author`) VALUES
(1, 'Premier post!', 'Ceci est le premier article posté sur ce blog', '2018-01-08 10:41:12', 'Philou Perou'),
(2, 'Et hop! un nouvel article!', 'Ça y est c\'est lancé, mais ce n\'est pas très beau... ;) ', '2018-01-11 18:24:12', 'Jo');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`comment_id`);

--
-- Index pour la table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`post_id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `comments`
--
ALTER TABLE `comments`
  MODIFY `comment_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT pour la table `posts`
--
ALTER TABLE `posts`
  MODIFY `post_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
