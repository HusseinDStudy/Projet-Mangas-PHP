mangas.sql
Qui a accès
Non partagé
Propriétés système
Type
SQL
Taille
5 Ko
Espace de stockage utilisé
11 Ko
Emplacement
bd
Propriétaire
moi
Date de modification
27 sept. 2021 par moi
Ouvert
22:46 par moi
Date de création
27 sept. 2021 avec Google Drive Web
Ajouter une description
Téléchargement autorisé pour les lecteurs
-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Client :  127.0.0.1
-- Généré le :  Lun 16 Octobre 2017 à 09:34
-- Version du serveur :  10.1.8-MariaDB
-- Version de PHP :  5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `mangas`
--

-- --------------------------------------------------------

--
-- Structure de la table `dessinateur`
--

CREATE TABLE `dessinateur` (
  `id_dessinateur` int(11) NOT NULL,
  `nom_dessinateur` varchar(50) COLLATE utf8_bin NOT NULL,
  `prenom_dessinateur` varchar(50) COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Contenu de la table `dessinateur`
--

INSERT INTO `dessinateur` (`id_dessinateur`, `nom_dessinateur`, `prenom_dessinateur`) VALUES
(1, 'TITE', 'Kubo'),
(2, 'ONE', ''),
(3, 'TORIYAMA', 'Akira'),
(4, 'YUSUKE', 'Murata'),
(5, 'OBA', 'Tsugumi'),
(6, 'IWAAKI', 'Hitoshi '),
(7, 'OBATA', 'Takeshi '),
(8, 'TOGASHI', 'Yoshihiro ');

-- --------------------------------------------------------

--
-- Structure de la table `genre`
--

CREATE TABLE `genre` (
  `id_genre` int(11) NOT NULL,
  `lib_genre` varchar(50) COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Contenu de la table `genre`
--

INSERT INTO `genre` (`id_genre`, `lib_genre`) VALUES
(1, 'Aventure'),
(2, 'Tanche-de-vie'),
(3, 'Action'),
(4, 'Science-fiction'),
(5, 'Suspense'),
(6, 'Policier'),
(7, 'Sport');

-- --------------------------------------------------------

--
-- Structure de la table `manga`
--

CREATE TABLE `manga` (
  `id_manga` int(11) NOT NULL,
  `id_dessinateur` int(11) NOT NULL,
  `id_scenariste` int(11) NOT NULL,
  `prix` decimal(10,2) NOT NULL,
  `titre` varchar(250) COLLATE utf8_bin NOT NULL,
  `couverture` varchar(50) COLLATE utf8_bin NOT NULL,
  `id_genre` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Contenu de la table `manga`
--

INSERT INTO `manga` (`id_manga`, `id_dessinateur`, `id_scenariste`, `prix`, `titre`, `couverture`, `id_genre`) VALUES
(1, 1, 1, '12.50', 'Bleach', 'bleach.jpg', 1),
(2, 7, 7, '25.00', 'One Punch Man', 'One Punch Man.jpg', 1),
(3, 7, 7, '7.50', 'Dragon Ball Z', 'dbz.jpg', 1),
(4, 7, 7, '18.00', 'Parasyte', 'college-fou-fou-fou.jpg', 4),
(5, 7, 7, '14.25', 'Hunter X Hunter', 'hack_01_m.jpg', 1),
(6, 7, 5, '12.50', 'Death Note', 'Death-Note.jpg', 6),
(7, 3, 5, '45.00', 'Goldorak', 'Goldorak.jpg', 4),
(8, 4, 5, '50.00', 'Barakamon', 'Barakamon.jpg', 3),
(9, 3, 3, '45.00', 'Jojo\'s bizarre adventure - Saison 5 - Golden Wind 	', 'Jojo\'s bizarre adventure.jpg', 1),
(10, 3, 4, '15.00', 'college-fou-fou-fou', 'college-fou-fou-fou.jpg', 2),
(11, 6, 4, '25.00', ' 	Jojo\'s bizarre adventure - Saison 5 - Golden Wind ', 'Jojo\'s bizarre adventure', 3),
(12, 1, 3, '10.00', 'yu-gi-oh-5d-jp-9_m', 'yu-gi-oh-5d-jp-9_m.jpg', 1);

-- --------------------------------------------------------

--
-- Structure de la table `scenariste`
--

CREATE TABLE `scenariste` (
  `id_scenariste` int(11) NOT NULL,
  `nom_scenariste` varchar(50) COLLATE utf8_bin NOT NULL,
  `prenom_scenariste` varchar(50) COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Contenu de la table `scenariste`
--

INSERT INTO `scenariste` (`id_scenariste`, `nom_scenariste`, `prenom_scenariste`) VALUES
(1, 'TITE', 'Kubo'),
(2, 'ONE', ''),
(3, 'TORIYAMA', 'Akira'),
(4, 'YUSUKE', 'Murata'),
(5, 'OBA', 'Tsugumi'),
(6, 'IWAAKI', 'Hitoshi '),
(7, 'OBATA', 'Takeshi '),
(8, 'TOGASHI', 'Yoshihiro ');

--
-- Index pour les tables exportées
--

--
-- Index pour la table `dessinateur`
--
ALTER TABLE `dessinateur`
  ADD PRIMARY KEY (`id_dessinateur`);

--
-- Index pour la table `genre`
--
ALTER TABLE `genre`
  ADD PRIMARY KEY (`id_genre`);

--
-- Index pour la table `manga`
--
ALTER TABLE `manga`
  ADD PRIMARY KEY (`id_manga`),
  ADD KEY `fk_manga_genre` (`id_genre`),
  ADD KEY `fk_manga_scenariste` (`id_scenariste`),
  ADD KEY `fk_manga_dessinateur` (`id_dessinateur`);

--
-- Index pour la table `scenariste`
--
ALTER TABLE `scenariste`
  ADD PRIMARY KEY (`id_scenariste`);

--
-- AUTO_INCREMENT pour les tables exportées
--

--
-- AUTO_INCREMENT pour la table `dessinateur`
--
ALTER TABLE `dessinateur`
  MODIFY `id_dessinateur` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT pour la table `manga`
--
ALTER TABLE `manga`
  MODIFY `id_manga` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT pour la table `scenariste`
--
ALTER TABLE `scenariste`
  MODIFY `id_scenariste` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- Contraintes pour les tables exportées
--

--
-- Contraintes pour la table `manga`
--
ALTER TABLE `manga`
  ADD CONSTRAINT `fk_manga_dessinateur` FOREIGN KEY (`id_dessinateur`) REFERENCES `dessinateur` (`id_dessinateur`),
  ADD CONSTRAINT `fk_manga_genre` FOREIGN KEY (`id_genre`) REFERENCES `genre` (`id_genre`),
  ADD CONSTRAINT `fk_manga_scenariste` FOREIGN KEY (`id_scenariste`) REFERENCES `scenariste` (`id_scenariste`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
