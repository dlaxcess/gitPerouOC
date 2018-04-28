-- phpMyAdmin SQL Dump
-- version 4.7.7
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le :  sam. 28 avr. 2018 à 20:50
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
-- Structure de la table `ocp3posts`
--

CREATE TABLE `ocp3posts` (
  `post_id` int(11) NOT NULL,
  `post_title` varchar(255) CHARACTER SET utf8 NOT NULL,
  `post_content` text CHARACTER SET utf8 NOT NULL,
  `post_creation_date` datetime NOT NULL,
  `post_author` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `ocp3posts`
--

INSERT INTO `ocp3posts` (`post_id`, `post_title`, `post_content`, `post_creation_date`, `post_author`) VALUES
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
(20, '15', 'Entrez le texte ici', '2018-04-04 17:07:26', 'phil'),
(21, 'bouliboula', 'et pour une fois je rentre du texte!', '2018-04-16 23:22:41', 'phil'),
(22, 'et la tout marche!', '&lt;p&gt;Entrez le texte ici&lt;/p&gt;', '2018-04-23 13:04:35', 'phil'),
(23, 'Intro', '&lt;p&gt;dkhdskj hds jkdkj hdsjk hdskj hdskj hdsjk hkdsjh dskj hdskj hdskjhdkjh dskjhdsjkhsdkj hdkjhdskj hdskj hdskj hdskj hdsm kjdjk dslki jdslk jsdlj smlkjcml smlscm ds&amp;nbsp; &amp;nbsp;dlk jslkj dslk j d.&lt;br /&gt;D o i sl idsli li dslkij lcs lk dslklkjc qlk&amp;nbsp; lk j lkjclkj lkj clk jlkjc slkj lscm csmj ok!mcs&amp;nbsp; jllcjkj cs jl!jk !slk js!ljkl!c slk! jlq!c jklkjcqlkj l! jkk jlk!j cljkjk lk!c jlk!j clkjlkj lk .&lt;/p&gt;&lt;br /&gt;\r\n&lt;p&gt;K ml f mslm jdsml jfs lk jslkj qdlk jlq dk jdqcl:kqc m:cq :kj hcqjk hjk hcqkmj hc q&lt;br /&gt;Ajkj o ldlki j dli&amp;nbsp; &amp;nbsp;liudli h ldkjh mfd jh fsmkjhmkfzsm ojh mkj rfshkmj hmkj hmkfs&amp;nbsp; jhm kfsj hmjk hmkfsjh ms kfjhsjk hfskj hsjk hfsjkm fsjkh fsjk dshjk fshfsjk hfsjk hfs.&lt;/p&gt;', '2018-04-24 18:14:37', 'phil'),
(24, 'ertghy', 'hello\r\nworld', '2018-04-25 10:06:49', 'phil'),
(25, 'lkjhgfd', 'hello<br />\r\nworldyo', '2018-04-25 10:08:26', 'phil'),
(26, 'ecriture!', 'hello<br />\r\nvoici du texte avec une tabulation<br />\r\nici avec du gras<br />\r\net la en italique', '2018-04-25 10:14:43', 'phil'),
(27, 'test fonction post', 'yo<br />\r\net hop!<br />\r\ncool', '2018-04-25 11:35:55', 'phil'),
(28, 'dfghjklm', 'Entrez le texte ici', '2018-04-25 17:54:49', 'phil');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `ocp3posts`
--
ALTER TABLE `ocp3posts`
  ADD PRIMARY KEY (`post_id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `ocp3posts`
--
ALTER TABLE `ocp3posts`
  MODIFY `post_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
