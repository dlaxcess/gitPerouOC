-- phpMyAdmin SQL Dump
-- version 4.7.7
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le :  mar. 24 avr. 2018 à 20:51
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
-- Base de données :  `ocp3blogmvc`
--

-- --------------------------------------------------------

--
-- Structure de la table `ocp3comments`
--

CREATE TABLE `ocp3comments` (
  `comment_id` int(11) NOT NULL,
  `post_id` int(11) NOT NULL,
  `comment_author` varchar(255) CHARACTER SET utf8 NOT NULL,
  `comment` text CHARACTER SET utf8 NOT NULL,
  `comment_date` datetime NOT NULL,
  `comment_moderation` enum('accepted','reported','moderated') CHARACTER SET utf8 NOT NULL DEFAULT 'accepted'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `ocp3comments`
--

INSERT INTO `ocp3comments` (`comment_id`, `post_id`, `comment_author`, `comment`, `comment_date`, `comment_moderation`) VALUES
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
(64, 18, 'phil', 'jhgf  pou!', '2018-04-04 02:18:19', 'accepted'),
(71, 20, 'phil', 'yop!&amp;lt;br /&amp;gt;&lt;br /&gt;&lt;br /&gt;\r\nboudiou!', '2018-04-06 11:28:01', 'accepted'),
(72, 20, 'fifi', 'hello', '2018-04-04 20:55:32', 'accepted'),
(73, 20, 'phil', 'bondieux!&lt;br /&gt;\r\nil me met de la merde quand&lt;br /&gt;\r\nje fais espace!&lt;br /&gt;\r\n', '2018-04-04 20:56:05', 'accepted'),
(75, 20, 'phil', 'fhdjkhd&lt;br /&gt;\r\nkjdkjf', '2018-04-06 11:41:35', 'accepted'),
(76, 20, 'phil', 'dhdhjkd<br />\r\nskjdskj', '2018-04-06 11:48:11', 'accepted'),
(77, 20, 'phil', 'jhjhdsf\r\njkdjfgkjdfg', '2018-04-06 11:49:15', 'accepted'),
(78, 20, 'phil', 'kjhkdjhfd<br>\r\nsldkjfldf', '2018-04-06 11:54:24', 'accepted'),
(79, 20, 'phil', 'nlkjhlkdfg<br>\r\nsdkjhfvg', '2018-04-06 11:54:38', 'accepted'),
(80, 20, 'phil', ';jnd,n', '2018-04-14 14:06:45', 'reported'),
(81, 20, 'fifi', 'kjfkjf', '2018-04-14 14:09:30', 'accepted'),
(82, 20, 'phil', '&lt;p&gt;yo&lt;/p&gt;<br>\r\n&lt;p&gt;alors?&lt;/p&gt;', '2018-04-21 15:38:58', 'accepted');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `ocp3comments`
--
ALTER TABLE `ocp3comments`
  ADD PRIMARY KEY (`comment_id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `ocp3comments`
--
ALTER TABLE `ocp3comments`
  MODIFY `comment_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=83;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;