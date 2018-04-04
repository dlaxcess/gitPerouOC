-- phpMyAdmin SQL Dump
-- version 4.7.7
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le :  mer. 04 avr. 2018 à 16:53
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
  `comment_date` datetime NOT NULL,
  `comment_moderation` enum('accepted','reported','moderated') CHARACTER SET utf8 NOT NULL DEFAULT 'accepted'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `comments`
--

INSERT INTO `comments` (`comment_id`, `post_id`, `comment_author`, `comment`, `comment_date`, `comment_moderation`) VALUES
(1, 1, 'Phil', 'et voici un commentaire!\r\nil faut l\'afficher...', '2018-01-08 13:37:06', 'accepted'),
(2, 1, 'john', 'bah c\'est super!', '2018-01-08 13:38:26', 'accepted'),
(3, 1, 'phil', 'yo!', '2018-01-11 09:58:14', 'accepted'),
(4, 1, 'jo', '', '2018-01-08 20:51:35', 'accepted'),
(5, 1, 'doc', '', '2018-01-08 20:52:47', 'accepted'),
(6, 1, 'flo', 'hello', '2018-01-11 10:41:13', 'accepted'),
(7, 1, 'ki', '', '2018-01-08 21:28:38', 'accepted'),
(8, 1, 'yo', '', '2018-01-08 23:09:04', 'accepted'),
(9, 1, 'sdf', '', '2018-01-08 23:15:02', 'accepted'),
(10, 1, 'jo', '', '2018-01-08 23:23:56', 'accepted'),
(11, 1, 'jo', 'poiuytre', '2018-01-11 19:23:01', 'accepted'),
(12, 1, 'jo', '', '2018-01-08 23:33:10', 'accepted'),
(13, 1, 'jo', '', '2018-01-08 23:33:17', 'accepted'),
(14, 1, 'jo', '', '2018-01-08 23:34:39', 'accepted'),
(15, 1, 'jo', '', '2018-01-09 00:01:34', 'accepted'),
(16, 1, 'jo', 'tout marche!', '2018-01-11 18:26:27', 'accepted'),
(17, 1, 'jo', '', '2018-01-11 01:30:24', 'accepted'),
(18, 1, 'phil', 'et la ça marche?', '2018-01-09 09:59:43', 'accepted'),
(19, 1, 'bob', 'moi, c\'est bob!', '2018-01-10 14:36:35', 'accepted'),
(20, 1, 'phil', 'avec les use', '2018-01-11 18:26:10', 'accepted'),
(21, 1, 'phil', 'tic toc!', '2018-01-11 19:15:22', 'accepted'),
(22, 1, 'jo', 'blou!', '2018-01-11 19:16:31', 'accepted'),
(23, 2, 'phil', 'roh c est po grave! enfin!', '2018-01-11 19:26:27', 'accepted'),
(24, 2, 'phil', 'hello', '2018-01-12 18:11:54', 'accepted'),
(25, 2, 'hfdjhd', 'cd,c,c', '2018-01-12 18:12:14', 'accepted'),
(26, 2, 'sshdj', 'kjqskdvb', '2018-01-17 16:37:21', 'accepted'),
(27, 2, 'flou', 'biliboop! tout en POO!', '2018-01-20 02:48:25', 'accepted'),
(28, 2, 'james', 'et la?', '2018-01-22 16:04:53', 'accepted'),
(29, 2, 'phil', 'c est sur? non? youpi', '2018-02-07 21:26:05', 'accepted'),
(30, 2, 'jo', 'hop hop', '2018-02-07 19:24:37', 'accepted'),
(31, 2, 'bob', 'hop lala!! yo', '2018-02-07 19:20:02', 'accepted'),
(32, 2, 'bob', 'lelouarn bis', '2018-02-07 19:19:27', 'accepted'),
(33, 2, 'phil', 'nouveau num d id?', '2018-02-07 21:33:52', 'accepted'),
(34, 2, 'jeff', 'hola! como esta?', '2018-02-07 21:53:11', 'accepted'),
(35, 2, 'jo', 'bi joba!', '2018-02-07 23:00:23', 'accepted'),
(36, 2, 'phil', 'ou ghjkl', '2018-02-07 23:12:01', 'accepted'),
(37, 2, 'phil', 'yopla!', '2018-02-11 20:34:00', 'accepted'),
(38, 2, 'philou', 'framy? frama? oup et c est bon', '2018-02-21 17:27:32', 'accepted'),
(39, 2, 'phil', 'tac', '2018-03-04 15:50:55', 'accepted'),
(40, 2, 'phil', 'hop', '2018-03-04 15:53:01', 'accepted'),
(41, 2, 'jo', 'zef', '2018-03-04 15:54:19', 'accepted'),
(42, 2, 'bab', 'bobine', '2018-03-04 15:56:03', 'accepted'),
(43, 2, 'toc', 'bafbif', '2018-03-04 15:56:25', 'accepted'),
(44, 2, 'phil', 'hop', '2018-03-10 16:06:52', 'accepted'),
(45, 2, 'phil', 'hop la', '2018-03-10 16:06:37', 'accepted'),
(46, 3, 'phil', 'yop!', '2018-03-26 15:31:59', 'accepted'),
(47, 15, 'jo', 'ploum', '2018-03-27 12:43:29', 'accepted'),
(48, 16, 'phil', 'youpla!', '2018-03-27 16:34:22', 'accepted'),
(50, 16, 'toc', 'tac ho pa ho', '2018-04-04 02:17:50', 'accepted'),
(59, 19, 'phil', 'jkhdfgd', '2018-04-03 20:49:41', 'accepted'),
(64, 18, 'phil', 'jhgf  pou!', '2018-04-04 02:18:19', 'reported'),
(66, 19, 'phil', 'kjckj', '2018-04-04 02:43:50', 'reported'),
(67, 18, 'phil', 'xcvbn', '2018-04-04 02:44:24', 'moderated'),
(68, 18, 'phil', 'azertyu', '2018-04-04 02:44:28', 'accepted');

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
(1, 'phil', 'flipiste@free.fr', '$2y$10$3S.Dn6QUb6zGxIYDoKNoiupcvkDEDtNxDcqbxYif./fhThYDpjGT.', 'admin'),
(2, 'fifi', 'heroinestones@gmail.com', '$2y$10$9QcAtJjRhOw71BYv6ZhXtOmJpmkvmVjRS0zhnnbYUWuR4n0FofL3O', 'member');

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
(1, 'Premier post!', 'Ceci est le premier article posté sur ce blog mais avec phpmyadmin', '0000-00-00 00:00:00', 'Philou Perou'),
(2, 'Et hop! un nouvel article!', 'Ça y est c\'est lancé, mais ce n\'est pas très beau... ;) ', '2018-01-11 18:24:12', 'Jo'),
(3, 'test fonction post', 'Ceci est le vrai nouvel article posté!', '2018-03-23 04:05:04', 'phil'),
(8, 'rfetghh', 'Entrez le texte ici', '2018-03-21 00:26:03', 'phil'),
(9, '5eme article', 'Entrez le texte ici', '2018-03-26 17:25:52', 'phil'),
(10, '6eme article', 'Entrez le texte ici', '2018-03-26 17:26:12', 'phil'),
(11, '7', 'Entrez le texte ici', '2018-03-26 17:35:18', 'phil'),
(12, '8', 'Entrez le texte ici', '2018-03-26 17:35:25', 'phil'),
(13, '9', 'Entrez le texte ici', '2018-03-26 17:35:31', 'phil'),
(14, '10', 'Entrez le texte ici', '2018-03-26 17:35:38', 'phil'),
(15, '11', 'Entrez le texte ici', '2018-03-26 17:35:46', 'phil'),
(16, '12', 'Entrez le texte ici pof', '2018-03-27 06:32:03', 'phil'),
(18, '13', 'Entrez le texte ici et la', '2018-03-27 06:57:02', 'phil'),
(19, '14', 'Entrez le texte ici post d\'un membre', '2018-03-27 23:00:08', 'fifi');

-- --------------------------------------------------------

--
-- Structure de la table `reports`
--

CREATE TABLE `reports` (
  `report_id` int(11) NOT NULL,
  `comment_id` int(11) NOT NULL,
  `report_content` text,
  `report_date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `reports`
--

INSERT INTO `reports` (`report_id`, `comment_id`, `report_content`, `report_date`) VALUES
(39, 66, 'xdfgvg', '2018-04-04 02:43:58'),
(40, 64, 'lkx', '2018-04-04 02:44:20'),
(41, 67, 'Pas de raison donnée', '2018-04-04 02:44:33');

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
-- Index pour la table `reports`
--
ALTER TABLE `reports`
  ADD PRIMARY KEY (`report_id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `comments`
--
ALTER TABLE `comments`
  MODIFY `comment_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=69;

--
-- AUTO_INCREMENT pour la table `members`
--
ALTER TABLE `members`
  MODIFY `member_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT pour la table `posts`
--
ALTER TABLE `posts`
  MODIFY `post_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT pour la table `reports`
--
ALTER TABLE `reports`
  MODIFY `report_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
