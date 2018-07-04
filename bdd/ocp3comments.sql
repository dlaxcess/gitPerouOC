-- phpMyAdmin SQL Dump
-- version 4.7.7
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le :  jeu. 05 juil. 2018 à 01:09
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
(106, 35, 'Dim', 'Wah! Pourri!', '2018-07-05 00:57:38', 'moderated'),
(107, 41, 'léon', 'Très bon chapitre!', '2018-07-05 01:03:06', 'accepted'),
(108, 41, 'Jean Forteroche', 'Merci beaucoup! à bientôt pour la suite!', '2018-07-05 01:04:18', 'accepted'),
(109, 40, 'fifi', 'C est hors sujet!', '2018-07-05 01:05:01', 'reported');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `ocp3comments`
--
ALTER TABLE `ocp3comments`
  ADD PRIMARY KEY (`comment_id`),
  ADD KEY `post_id` (`post_id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `ocp3comments`
--
ALTER TABLE `ocp3comments`
  MODIFY `comment_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=110;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `ocp3comments`
--
ALTER TABLE `ocp3comments`
  ADD CONSTRAINT `fk_postComment` FOREIGN KEY (`post_id`) REFERENCES `ocp3posts` (`post_id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
