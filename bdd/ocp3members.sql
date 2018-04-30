-- phpMyAdmin SQL Dump
-- version 4.7.7
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le :  lun. 30 avr. 2018 à 11:59
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
(8, 'Phil', 'heroinestones@gmail.com', '$2y$10$nPpGq3sQLA1fDjgo9.gN9O1yYjX5Cpb4TZAtH5tVQEzLukamncvgG', 'admin'),
(9, 'Jean Forteroche', 'flipiste@free.fr', '$2y$10$Z5kSnr.8gGazerR3uvha7uaM8OALnHNTqw7rp9yDwHt2Dqo.gspWO', 'admin'),
(10, 'fifi', 'fifi@free.fr', '$2y$10$68ggSjG2Si6L8gUlLYj3/OxZl6CoyPLT42mBgFoSU9u6xb12oGNty', 'member'),
(11, 'jo', 'jo@fg.fr', '$2y$10$GqhmH0xVTESW0K1JkEoJ4O3XpJuaxvF5KHWvXPwWHEvW4qWAIURKK', 'member'),
(12, 'dom', 'dom@free.fr', '$2y$10$tjRTOILEN1xDu/KvoHt88udeRDaNk.1IECr7wZ3vzD1VkTbdEXsN2', 'member'),
(13, 'bob', 'bob@free.fr', '$2y$10$zY6NJqN8ybZEkScQ6RJ70eLZ.9i1iWVXndfR6fkgBOHOzb0zzOTKm', 'member'),
(14, 'bilbo', 'bilbo.lehobit@mordor.mor', '$2y$10$hEC.t8Bfk96Z6rlsLBCUpOHMuMoBoUhcHUg9UQW/XyhljG0sqn8aa', 'member'),
(15, 'leon', 'ljkldsksd@knjdf.con', '$2y$10$z2/bMRIb8XgqhMlHK4ArH.y5odOGVMz63l8oj3B0Fwiseb5H0TL6q', 'member');

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
  MODIFY `member_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
