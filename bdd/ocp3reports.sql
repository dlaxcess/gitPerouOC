-- phpMyAdmin SQL Dump
-- version 4.7.7
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le :  ven. 27 avr. 2018 à 11:46
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
-- Structure de la table `ocp3reports`
--

CREATE TABLE `ocp3reports` (
  `report_id` int(11) NOT NULL,
  `comment_id` int(11) NOT NULL,
  `report_content` text,
  `report_date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `ocp3reports`
--

INSERT INTO `ocp3reports` (`report_id`, `comment_id`, `report_content`, `report_date`) VALUES
(50, 80, '( Pas de raison donnée )', '2018-04-14 14:08:41');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `ocp3reports`
--
ALTER TABLE `ocp3reports`
  ADD PRIMARY KEY (`report_id`),
  ADD KEY `comment_id` (`comment_id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `ocp3reports`
--
ALTER TABLE `ocp3reports`
  MODIFY `report_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=52;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `ocp3reports`
--
ALTER TABLE `ocp3reports`
  ADD CONSTRAINT `fk_commentReport` FOREIGN KEY (`comment_id`) REFERENCES `ocp3comments` (`comment_id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
