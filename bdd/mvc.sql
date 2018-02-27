-- phpMyAdmin SQL Dump
-- version 4.7.7
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le :  mar. 27 fév. 2018 à 18:06
-- Version du serveur :  10.1.30-MariaDB
-- Version de PHP :  7.2.2

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
(23, 2, 'phil', 'roh c est po grave! enfin!', '2018-01-11 19:26:27'),
(24, 2, 'phil', 'hello', '2018-01-12 18:11:54'),
(25, 2, 'hfdjhd', 'cd,c,c', '2018-01-12 18:12:14'),
(26, 2, 'sshdj', 'kjqskdvb', '2018-01-17 16:37:21'),
(27, 2, 'flou', 'biliboop! tout en POO!', '2018-01-20 02:48:25'),
(28, 2, 'james', 'et la?', '2018-01-22 16:04:53'),
(29, 2, 'phil', 'c est sur? non? youpi', '2018-02-07 21:26:05'),
(30, 2, 'jo', 'hop hop', '2018-02-07 19:24:37'),
(31, 2, 'bob', 'hop lala!! yo', '2018-02-07 19:20:02'),
(32, 2, 'bob', 'lelouarn bis', '2018-02-07 19:19:27'),
(33, 2, 'phil', 'nouveau num d id?', '2018-02-07 21:33:52'),
(34, 2, 'jeff', 'hola! como esta?', '2018-02-07 21:53:11'),
(35, 2, 'jo', 'bi joba!', '2018-02-07 23:00:23'),
(36, 2, 'phil', 'ou ghjkl', '2018-02-07 23:12:01'),
(37, 2, 'phil', 'yopla!', '2018-02-11 20:34:00'),
(38, 2, 'philou', 'framy? frama? oup et c est bon', '2018-02-21 17:27:32');

-- --------------------------------------------------------

--
-- Structure de la table `members`
--

CREATE TABLE `members` (
  `member_id` int(11) NOT NULL,
  `member_name` varchar(255) CHARACTER SET utf8 NOT NULL,
  `member_email` varchar(255) NOT NULL,
  `member_password` varchar(255) NOT NULL,
  `member_acces` enum('member','admin') NOT NULL DEFAULT 'member'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `members`
--

INSERT INTO `members` (`member_id`, `member_name`, `member_email`, `member_password`, `member_acces`) VALUES
(1, 'phil', 'flipiste@free.fr', '$2y$10$3S.Dn6QUb6zGxIYDoKNoiupcvkDEDtNxDcqbxYif./fhThYDpjGT.', 'admin');

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
-- Index pour la table `members`
--
ALTER TABLE `members`
  ADD PRIMARY KEY (`member_id`);

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
  MODIFY `comment_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT pour la table `members`
--
ALTER TABLE `members`
  MODIFY `member_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT pour la table `posts`
--
ALTER TABLE `posts`
  MODIFY `post_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
