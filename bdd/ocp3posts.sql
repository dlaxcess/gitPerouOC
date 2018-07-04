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
(35, 'Le Chat Noir', 'N&#39;avons-nous pas une perp&eacute;tuelle inclinaison, malgr&eacute; l&#39;excellence de notre jugement, &agrave; violer ce qui est la Loi, simplement parce que nous comprenons que c&#39;est la Loi?', '2018-07-05 00:42:57', 'Jean Forteroche'),
(36, ' Longue vie à Monsieur Moustache', 'Franck s&rsquo;&eacute;tait mis &agrave; ha&iuml;r tout ce qui l&rsquo;entourait et qu&rsquo;il aimait tant avant. Mata Densa, cette for&ecirc;t incroyablement dense, ses arbres gigantesques, le vacarme des animaux, les foug&egrave;res g&eacute;antes, les lianes, les hommes qui travaillaient sans rel&acirc;che, le bruit des tron&ccedil;onneuses, l&rsquo;odeur du bois coup&eacute;, celui de la cendre chaude et humide, la pluie, la chaleur, les insectes partout, les reptiles, la rivi&egrave;re au lourd d&eacute;bit brun&hellip; Franck s&rsquo;&eacute;tait mis &agrave; ha&iuml;r le monde entier depuis qu&rsquo;Alice &eacute;tait malade.&nbsp;Il vivait comme en transe, &eacute;cartel&eacute; entre son corps et son esprit, ses pieds pos&eacute;s sur le sol br&eacute;silien et ses pens&eacute;es au plus pr&egrave;s de son enfant ch&eacute;rie, l&agrave;-bas, dans cet h&ocirc;pital parisien. Il ne dormait plus, parcourait des kilom&egrave;tres harassants &agrave; travers la for&ecirc;t primaire pour pouvoir t&eacute;l&eacute;phoner &agrave; sa femme. Hier soir, les nouvelles avaient &eacute;t&eacute; mauvaises. Alice r&eacute;agissait mal &agrave; la chimio. Les m&eacute;decins n&rsquo;&eacute;taient pas encourageants.&nbsp;Franck avait pass&eacute; trois jours &agrave; Paris un mois plus t&ocirc;t, une semaine apr&egrave;s que le verdict des m&eacute;decins &eacute;tait tomb&eacute;. Il avait trouv&eacute; bonne mine &agrave; sa fille. Bon moral, aussi. &Agrave; la voir ainsi, il &eacute;tait impossible de se douter qu&rsquo;elle &eacute;tait rong&eacute;e de l&rsquo;int&eacute;rieur par la leuc&eacute;mie. D&rsquo;ailleurs, Franck ne voulait pas y croire. Ce n&rsquo;&eacute;tait pas possible. Pas elle. Pas sa fille. Pas Alice, sa merveille, son souci depuis seize ans, son bonheur, sa fiert&eacute;. Pas le cancer. Pas Alice.&nbsp;', '2018-07-05 00:44:59', 'Jean Forteroche'),
(37, 'Les avoir', '&laquo; Mais vas-y donc, &agrave; ta kermesse. &raquo; Dix heures du soir au mois de juin. Ses parents ont du monde. Ils boivent du ros&eacute;. &laquo; Mais vas-y donc, &agrave; ta kermesse. &raquo; Leurs copains sifflent quand elle se montre avec sa robe. Sa m&egrave;re l&rsquo;embrasse et lui frotte la joue &agrave; cause du rouge &agrave; l&egrave;vres. Son p&egrave;re lui donne un billet de dix francs. Elle gambade sur la route, un petit saut &agrave; chaque pas, un bruit glissant, chiff, chiff. Sa robe bat l&rsquo;arri&egrave;re de ses genoux. Des chiens rouges sont brod&eacute;s le long de l&rsquo;ourlet. C&rsquo;est sa robe pr&eacute;f&eacute;r&eacute;e. Elle passe devant chez Monsieur Bihotz, elle est contente qu&rsquo;il ne soit pas sur son perron.', '2018-07-05 00:48:43', 'Jean Forteroche'),
(38, 'Le froid s\'obscurci', 'Un mouvement de foule et elle entend &laquo; ton p&egrave;re ton p&egrave;re &raquo;. Elle l&egrave;ve la t&ecirc;te vers le clocher. Les aiguilles font un angle comme l&rsquo;index et le pouce, un revolver. Minuit moins le quart. Elle avait la permission de onze heures et demie. Putain putain. La bouche ouverte de Nathalie : &laquo; ton p&egrave;re ! &raquo; en rouge humide. Elle le voit. Enti&egrave;rement nu. Un foulard rouge autour du cou, sa casquette Air Inter sur la t&ecirc;te. Avec son copain Georges qui est nu lui aussi. Ils chantent une chanson sur un cur&eacute; et une nonne.', '2018-07-05 00:49:47', 'Jean Forteroche'),
(39, 'La disparition', 'Depuis la fen&ecirc;tre du premier &eacute;tage de la librairie, Gil Coleman aper&ccedil;ut sa d&eacute;funte femme debout sur le trottoir d&rsquo;en face. Il avait pass&eacute; la matin&eacute;e &agrave; fureter dans les &eacute;tag&egrave;res, feuilletant chaque livre d&rsquo;occasion de la premi&egrave;re &agrave; la derni&egrave;re page, s&rsquo;arr&ecirc;tant aux cornes, aux passages soulign&eacute;s, fouillant les volumes un &agrave; un comme si, &agrave; force, il pouvait les convaincre de lui r&eacute;v&eacute;ler quelque secret. Oubli&eacute;e sur la banquette devant la fen&ecirc;tre, la tasse de th&eacute; que Viv lui avait apport&eacute;e avait eu le temps de refroidir. Aux alentours de trois heures, il &eacute;tait tomb&eacute; sur Who was changed and who was dead1, il connaissait ce livre, sans doute l&rsquo;avait-il d&eacute;j&agrave; chez lui. Le volume lui avait &eacute;chapp&eacute; et s&rsquo;&eacute;tait ouvert : &agrave; l&rsquo;int&eacute;rieur, coinc&eacute;e entre les pages, il avait d&eacute;couvert, surpris, une feuille jaune fine et couverte de lignes bleu p&acirc;le pli&eacute;e en quatre.Tremblant, Gil s&rsquo;&eacute;tait assis &agrave; c&ocirc;t&eacute; de sa tasse et il avait pench&eacute; le livre d&rsquo;un c&ocirc;t&eacute; puis de l&rsquo;autre, d&eacute;ployant la feuille sans avoir &agrave; l&rsquo;&ocirc;ter du volume. C&rsquo;&eacute;tait une de ses r&egrave;gles d&rsquo;or : ne jamais d&eacute;placer les choses qu&rsquo;il trouvait de leur emplacement d&rsquo;origine. Il leva donc le morceau de papier et le livre vers la fen&ecirc;tre hachur&eacute;e de pluie. Encore une lettre, &eacute;crite &agrave; la main, &agrave; l&rsquo;encre noire, il parvenait &agrave; deviner la date &ndash; 2 juillet 1992, 14 h 17 &ndash; et dessous, son nom &agrave; lui. Plus bas, les caract&egrave;res rapetissaient et la plume ne tenait plus compte du lignage de la page, les mots suivant des courbes descendantes, comme jet&eacute;s &agrave; la h&acirc;te.', '2018-07-05 00:54:01', 'Jean Forteroche'),
(40, 'la carte des rêve', 'Il t&acirc;ta la poche de poitrine de sa veste, changea le livre de main et plongea l&rsquo;autre main dans sa poche int&eacute;rieure, puis il tapota les jambes de son pantalon. Aucune trace de ses lunettes de lecture. Il approcha puis &eacute;loigna la feuille de son visage, cherchant la bonne distance pour la d&eacute;chiffrer, il s&rsquo;avan&ccedil;a encore plus pr&egrave;s de la fen&ecirc;tre. La lumi&egrave;re &eacute;tait faible ; l&rsquo;orage pr&eacute;vu pour samedi avait un jour d&rsquo;avance. Pendant qu&rsquo;il fermait les portes de sa voiture dans le parking &agrave; c&ocirc;t&eacute; du terrain de jeux Jurassic Crazy Golf, Gil avait aper&ccedil;u un sac plastique plaqu&eacute; par le vent sur l&rsquo;une des griffes du Tyrannosaurus Rex, la cr&eacute;ature semblait ainsi sur le point de franchir la grille pour aller faire ses courses. Et tandis que Gil poursuivait son chemin le long de la promenade jusqu&rsquo;&agrave; la librairie, le vent creusait des d&eacute;pressions dans la mer grise et venait pr&eacute;cipiter les l&egrave;vres des vagues contre le rivage, de sorte qu&rsquo;&agrave; pr&eacute;sent, au milieu de tous ses vieux livres, il sentait le go&ucirc;t du sel jusque sur ses l&egrave;vres.', '2018-07-05 00:55:03', 'Jean Forteroche'),
(41, 'Chant de blizzard', 'Une bourrasque de pluie fouetta la fen&ecirc;tre, attirant son attention vers l&rsquo;ext&eacute;rieur et la petite rue &eacute;troite en bas.Sur le trottoir d&rsquo;en face, une femme dans un pardessus trop grand pour elle scrutait la route. Seul le bout de ses doigts d&eacute;passait de ses manches et l&rsquo;ourlet en bas du manteau lui arrivait presque aux chevilles. D&eacute;tremp&eacute; par la pluie, l&rsquo;habit avait vir&eacute; &agrave; l&rsquo;oliv&acirc;tre, sombre et sale &ndash; cette nuance que rev&ecirc;t la mer apr&egrave;s une averse &ndash; Gil se dit que sa fille Flora saurait le nom exact de cette couleur. D&rsquo;un geste du poignet, la femme d&eacute;gagea une m&egrave;che de cheveux humide de son visage et se tourna vers la librairie. Ce geste &eacute;tait si familier qu&rsquo;aussit&ocirc;t Gil bondit sur ses pieds, sans m&ecirc;me se rendre compte qu&rsquo;il avait renvers&eacute; sa tasse de th&eacute;. La femme bascula son visage en forme de c&oelig;ur vers l&rsquo;arri&egrave;re, levant les yeux vers lui comme si elle savait que Gil &eacute;tait en train de l&rsquo;observer, et &agrave; ce moment-l&agrave; il comprit que c&rsquo;&eacute;tait sa femme ; plus &acirc;g&eacute;e, certes, mais c&rsquo;&eacute;tait bien elle, aucun doute. La pluie avait aplati et assombri ses cheveux, l&rsquo;eau lui d&eacute;goulinait le long du menton, mais elle le d&eacute;visageait de ce m&ecirc;me air de d&eacute;fi qu&rsquo;elle avait le jour o&ugrave; il l&rsquo;avait rencontr&eacute;e. Il aurait reconnu cette expression et cette femme n&rsquo;importe o&ugrave;.', '2018-07-05 00:56:07', 'Jean Forteroche');

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
  MODIFY `post_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
