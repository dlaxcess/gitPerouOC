-- phpMyAdmin SQL Dump
-- version 4.7.7
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le :  mar. 24 avr. 2018 à 20:55
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
-- Structure de la table `ocp3members`
--

CREATE TABLE `ocp3members` (
  `member_id` int(11) NOT NULL,
  `member_name` varchar(255) CHARACTER SET utf8 NOT NULL,
  `member_email` varchar(255) NOT NULL,
  `member_password` varchar(255) NOT NULL,
  `member_acces` enum('member','admin') NOT NULL DEFAULT 'member'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `ocp3members`
--

INSERT INTO `ocp3members` (`member_id`, `member_name`, `member_email`, `member_password`, `member_acces`) VALUES
(1, 'phil', 'flipiste@free.fr', '$2y$10$3S.Dn6QUb6zGxIYDoKNoiupcvkDEDtNxDcqbxYif./fhThYDpjGT.', 'admin'),
(2, 'fifi', 'heroinestones@gmail.com', '$2y$10$9QcAtJjRhOw71BYv6ZhXtOmJpmkvmVjRS0zhnnbYUWuR4n0FofL3O', 'member'),
(3, 'jo', 'blibli@blabla.com', '$2y$10$9q15epa9wlTQLefiIHpOAu8iiELG.Y4UlVaBLTeryVW2Tg1K93keS', 'member'),
(4, 'bilbo', 'bilbo.lehobit@mordor.mor', '$2y$10$4U0euU0bpQHpkNqkSS5FHeavBUjhqh4DXV9gByoD6e.Q.7ISN3rhO', 'member');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `ocp3members`
--
ALTER TABLE `ocp3members`
  ADD PRIMARY KEY (`member_id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `ocp3members`
--
ALTER TABLE `ocp3members`
  MODIFY `member_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
