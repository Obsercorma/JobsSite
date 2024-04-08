-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : lun. 08 avr. 2024 à 09:22
-- Version du serveur : 10.4.22-MariaDB
-- Version de PHP : 7.4.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `bddjobs`
--
CREATE DATABASE IF NOT EXISTS `bddjobs` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `bddjobs`;

-- --------------------------------------------------------

--
-- Structure de la table `activite`
--

CREATE TABLE `activite` (
  `idAct` int(11) NOT NULL,
  `intitAct` varchar(100) NOT NULL,
  `estActif` tinyint(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `activite`
--

INSERT INTO `activite` (`idAct`, `intitAct`, `estActif`) VALUES
(1, 'Autres', 1),
(4, 'Banque / Assurance', 1),
(5, 'Bois / Papier / Carton / Imprimerie', 1),
(6, 'BTP / Matériaux de construction', 0),
(7, 'Chimie / Parachimie', 0),
(8, 'Commerce / Négoce / Distribution', 1),
(9, 'Édition / Communication / Multimédia', 1),
(10, 'Électronique / Électricité', 1),
(11, 'Études et conseils', 1),
(12, 'Industrie pharmaceutique', 1),
(13, 'Informatique / Télécoms', 1),
(14, 'Machines et équipements / Automobile', 1),
(15, 'Métallurgie / Travail du métal', 1),
(16, 'Plastique / Caoutchouc', 1),
(17, 'Services aux entreprises', 1),
(18, 'Textile / Habillement / Chaussure', 1),
(19, 'Transports / Logistique', 1),
(23, 'Aide à domicile', 1);

-- --------------------------------------------------------

--
-- Structure de la table `candidature`
--

CREATE TABLE `candidature` (
  `idEtudiant` int(11) NOT NULL,
  `idOffre` int(11) NOT NULL,
  `idStatut` tinyint(4) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `candidature`
--

INSERT INTO `candidature` (`idEtudiant`, `idOffre`, `idStatut`) VALUES
(17, 15, 1);

-- --------------------------------------------------------

--
-- Structure de la table `civilites`
--

CREATE TABLE `civilites` (
  `idCivil` tinyint(4) NOT NULL,
  `intitCivil` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `civilites`
--

INSERT INTO `civilites` (`idCivil`, `intitCivil`) VALUES
(1, 'Monsieur'),
(2, 'Madame'),
(3, 'Autre');

-- --------------------------------------------------------

--
-- Structure de la table `offre`
--

CREATE TABLE `offre` (
  `idOffre` int(11) NOT NULL,
  `intitoffre` varchar(255) NOT NULL,
  `idAct` int(11) NOT NULL,
  `lieuTravail` varchar(100) NOT NULL,
  `idContrat` int(11) NOT NULL,
  `debutPeriod` date NOT NULL,
  `finPeriod` date DEFAULT NULL,
  `descOffre` text NOT NULL,
  `idEmployeur` int(11) NOT NULL,
  `estValide` tinyint(4) NOT NULL DEFAULT 0,
  `estRetire` tinyint(1) NOT NULL DEFAULT 0,
  `datePublication` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `offre`
--

INSERT INTO `offre` (`idOffre`, `intitoffre`, `idAct`, `lieuTravail`, `idContrat`, `debutPeriod`, `finPeriod`, `descOffre`, `idEmployeur`, `estValide`, `estRetire`, `datePublication`) VALUES
(15, 'Agent de sécurité', 4, '1 rue de Moskova', 2, '2024-03-26', '2024-06-26', 'Vous travaillerez en tant qu\'agent de sécurité.', 9, 1, 1, '2024-03-26');

-- --------------------------------------------------------

--
-- Structure de la table `statut`
--

CREATE TABLE `statut` (
  `idStatut` tinyint(4) NOT NULL,
  `intitStatut` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `statut`
--

INSERT INTO `statut` (`idStatut`, `intitStatut`) VALUES
(1, 'Étudiant'),
(2, 'Employeur (Particulier)'),
(3, 'Employeur (Professionnel)');

-- --------------------------------------------------------

--
-- Structure de la table `statutcandid`
--

CREATE TABLE `statutcandid` (
  `idStatut` tinyint(4) NOT NULL,
  `intitStatut` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `statutcandid`
--

INSERT INTO `statutcandid` (`idStatut`, `intitStatut`) VALUES
(1, 'En Attente'),
(2, 'Validée'),
(3, 'Refusé');

-- --------------------------------------------------------

--
-- Structure de la table `typecontrat`
--

CREATE TABLE `typecontrat` (
  `idContrat` int(11) NOT NULL,
  `intitContrat` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `typecontrat`
--

INSERT INTO `typecontrat` (`idContrat`, `intitContrat`) VALUES
(2, 'CDD'),
(3, 'CDI'),
(1, 'Ponctuel');

-- --------------------------------------------------------

--
-- Structure de la table `utilisateur`
--

CREATE TABLE `utilisateur` (
  `idUser` int(11) NOT NULL,
  `civilite` tinyint(4) NOT NULL,
  `nom` varchar(30) NOT NULL,
  `prenom` varchar(30) NOT NULL,
  `email` varchar(255) NOT NULL,
  `passwd` varchar(60) NOT NULL,
  `tel` varchar(10) NOT NULL,
  `imgUser` varchar(255) NOT NULL DEFAULT '''defaultUser.png''',
  `cvUser` varchar(255) DEFAULT NULL,
  `idStatut` tinyint(4) NOT NULL,
  `bio` text DEFAULT NULL,
  `isBan` tinyint(1) NOT NULL DEFAULT 0,
  `isAdmin` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `utilisateur`
--

INSERT INTO `utilisateur` (`idUser`, `civilite`, `nom`, `prenom`, `email`, `passwd`, `tel`, `imgUser`, `cvUser`, `idStatut`, `bio`, `isBan`, `isAdmin`) VALUES
(8, 1, 'Marc', 'Francis', 'marc@gmail.com', '$2y$10$nyNy.OgipbazEIXK7MpTiu32nVJlKxxHjd.hypGLU/cQ1IUaN5eZi', '0612345678', 'defaultUser.png', NULL, 1, NULL, 0, 0),
(9, 2, 'Marci', 'Francisa', 'mardi@gmail.com', '$2y$10$DEA2R.muuKN7CTxFwV5kj.nfAdiKXY3DvoyL0jP2YY/TRH5RUi2KW', '0458652384', 'defaultUser.png', NULL, 3, NULL, 0, 0),
(10, 1, 'aa', 'aa', 'anthony@gmail.com', '$2y$10$8WCRdigfiTKmoDkcxPavIelSZV3NvZC98sqAUH9XBKbi/0t.Ou5Bi', '11111', 'defaultUser.png', NULL, 2, NULL, 1, 0),
(11, 2, 'FLAFLA', 'Thomito', 'thotho@gmail.com', '$2y$10$KtaDOvsv9G/asqI5gf2VPOYAmgsrEX2sUlQvcNfWU8hCrgLYGo0hS', '77777', 'defaultUser.png', NULL, 1, NULL, 1, 0),
(17, 1, 'JS', 'Jest', 'jestjs@example.org', '$2y$10$ERCYUj7gkKnpXahPMjN/Vub7aIOXiL47fPQbiNh4eBpPx9VT78rsK', '0624897531', 'defaultUser.png', 'storage/ead28feaf5.pdf', 1, NULL, 0, 0),
(18, 1, 'Le Grand', 'TechRusse', 'techrusse@test.fr', '$2y$10$5MsjrvnMD1rGm42oCfnrUOLnR79q8WnwUDMLnOMq9xMBRMSa0whtK', '0612345655', '\'defaultUser.png\'', NULL, 3, NULL, 0, 1);

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `activite`
--
ALTER TABLE `activite`
  ADD PRIMARY KEY (`idAct`),
  ADD UNIQUE KEY `intitAct` (`intitAct`);

--
-- Index pour la table `candidature`
--
ALTER TABLE `candidature`
  ADD PRIMARY KEY (`idEtudiant`,`idOffre`),
  ADD KEY `fkIdOffre` (`idOffre`),
  ADD KEY `fkIdStatut` (`idStatut`);

--
-- Index pour la table `civilites`
--
ALTER TABLE `civilites`
  ADD PRIMARY KEY (`idCivil`);

--
-- Index pour la table `offre`
--
ALTER TABLE `offre`
  ADD PRIMARY KEY (`idOffre`),
  ADD KEY `fkTypeContrat` (`idContrat`),
  ADD KEY `fkIdEmployeur` (`idEmployeur`),
  ADD KEY `fkidAct` (`idAct`);

--
-- Index pour la table `statut`
--
ALTER TABLE `statut`
  ADD PRIMARY KEY (`idStatut`);

--
-- Index pour la table `statutcandid`
--
ALTER TABLE `statutcandid`
  ADD PRIMARY KEY (`idStatut`);

--
-- Index pour la table `typecontrat`
--
ALTER TABLE `typecontrat`
  ADD PRIMARY KEY (`idContrat`),
  ADD UNIQUE KEY `intitContrat` (`intitContrat`);

--
-- Index pour la table `utilisateur`
--
ALTER TABLE `utilisateur`
  ADD PRIMARY KEY (`idUser`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `tel` (`tel`),
  ADD KEY `fkCivil` (`civilite`),
  ADD KEY `fkIdStatut` (`idStatut`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `activite`
--
ALTER TABLE `activite`
  MODIFY `idAct` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT pour la table `civilites`
--
ALTER TABLE `civilites`
  MODIFY `idCivil` tinyint(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT pour la table `offre`
--
ALTER TABLE `offre`
  MODIFY `idOffre` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT pour la table `statut`
--
ALTER TABLE `statut`
  MODIFY `idStatut` tinyint(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT pour la table `statutcandid`
--
ALTER TABLE `statutcandid`
  MODIFY `idStatut` tinyint(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT pour la table `typecontrat`
--
ALTER TABLE `typecontrat`
  MODIFY `idContrat` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT pour la table `utilisateur`
--
ALTER TABLE `utilisateur`
  MODIFY `idUser` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `candidature`
--
ALTER TABLE `candidature`
  ADD CONSTRAINT `candidature_ibfk_1` FOREIGN KEY (`idStatut`) REFERENCES `statutcandid` (`idStatut`),
  ADD CONSTRAINT `fkIdEtudiant` FOREIGN KEY (`idEtudiant`) REFERENCES `utilisateur` (`idUser`),
  ADD CONSTRAINT `fkIdOffre` FOREIGN KEY (`idOffre`) REFERENCES `offre` (`idOffre`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `offre`
--
ALTER TABLE `offre`
  ADD CONSTRAINT `fkIdEmployeur` FOREIGN KEY (`idEmployeur`) REFERENCES `utilisateur` (`idUser`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fkTypeContrat` FOREIGN KEY (`idContrat`) REFERENCES `typecontrat` (`idContrat`),
  ADD CONSTRAINT `fkidAct` FOREIGN KEY (`idAct`) REFERENCES `activite` (`idAct`);

--
-- Contraintes pour la table `utilisateur`
--
ALTER TABLE `utilisateur`
  ADD CONSTRAINT `fkIdStatut` FOREIGN KEY (`idStatut`) REFERENCES `statut` (`idStatut`),
  ADD CONSTRAINT `utilisateur_ibfk_1` FOREIGN KEY (`civilite`) REFERENCES `civilites` (`idCivil`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
