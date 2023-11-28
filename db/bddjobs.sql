-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : mar. 21 nov. 2023 à 15:42
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
  `intitAct` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `activite`
--

INSERT INTO `activite` (`idAct`, `intitAct`) VALUES
(2, 'Agroalimentaire'),
(3, 'Aide à domicile'),
(1, 'Autres'),
(4, 'Banque / Assurance'),
(5, 'Bois / Papier / Carton / Imprimerie'),
(6, 'BTP / Matériaux de construction'),
(7, 'Chimie / Parachimie'),
(8, 'Commerce / Négoce / Distribution'),
(9, 'Édition / Communication / Multimédia'),
(10, 'Électronique / Électricité'),
(11, 'Études et conseils'),
(12, 'Industrie pharmaceutique'),
(13, 'Informatique / Télécoms'),
(14, 'Machines et équipements / Automobile'),
(15, 'Métallurgie / Travail du métal'),
(16, 'Plastique / Caoutchouc'),
(17, 'Services aux entreprises'),
(18, 'Textile / Habillement / Chaussure'),
(19, 'Transports / Logistique');

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
(1, 2, 1);

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
  `idValidation` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `offre`
--

INSERT INTO `offre` (`idOffre`, `intitoffre`, `idAct`, `lieuTravail`, `idContrat`, `debutPeriod`, `finPeriod`, `descOffre`, `idEmployeur`, `idValidation`) VALUES
(1, 'Caissier H/F E.Leclerc', 2, 'Auchan', 1, '2023-11-11', '2023-11-11', 'À l\'aide.', 2, 0),
(2, 'Livreur GLS', 4, 'France', 2, '2023-12-11', '2024-01-19', 'Permis B Requis.', 3, 0),
(3, 'Garde Enfant', 3, '42 Rue de l\'Infini', 3, '2023-11-10', NULL, 'Tout les Week-end 18h-22h', 2, 0),
(4, 'Livreur de stupéfiants', 2, 'France', 1, '2023-11-17', NULL, 'Rdv 20h45 Place de l\'Étoile', 3, 0),
(12, 'Offre test', 1, 'Lieu de test', 1, '2023-11-23', '2023-11-25', 'Description de test', 2, 0);

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
(2, 'Validée');

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
  `passwd` text NOT NULL,
  `tel` varchar(20) NOT NULL,
  `imgUser` text NOT NULL DEFAULT 'defaultUser.png',
  `cvUser` text DEFAULT NULL,
  `idStatut` tinyint(4) NOT NULL,
  `bio` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `utilisateur`
--

INSERT INTO `utilisateur` (`idUser`, `civilite`, `nom`, `prenom`, `email`, `passwd`, `tel`, `imgUser`, `cvUser`, `idStatut`, `bio`) VALUES
(1, 1, 'Baroche', 'Mael', 'test@mail.com', '1234', '0123456789', 'defaultUser.png', NULL, 1, NULL),
(2, 1, 'Baroche', 'Nael', 'test@exemple.com', '6789', '0102030405', 'defaultUser.png', NULL, 2, NULL),
(3, 2, 'Onyme', 'Anne', 'aa', 'a', '0987654321', 'defaultUser.png', NULL, 3, NULL),
(4, 3, 'Maroche', 'Baël', 'exemple@mail.org', '9516', '0624931567', '\'user.png\'', NULL, 3, NULL),
(6, 1, 'L\'Observateur', 'TechRusse', 'techrusse@mythologicarte.fr', '$2y$10$e/puVD63PiKLI0ZpgMtkJeU0IVxoXBZzEzWdtXjGMLwhPyM5Y/AYe', '0123456788', 'defaultUser.png', NULL, 3, NULL);

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
  MODIFY `idAct` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT pour la table `civilites`
--
ALTER TABLE `civilites`
  MODIFY `idCivil` tinyint(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT pour la table `offre`
--
ALTER TABLE `offre`
  MODIFY `idOffre` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT pour la table `statut`
--
ALTER TABLE `statut`
  MODIFY `idStatut` tinyint(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT pour la table `statutcandid`
--
ALTER TABLE `statutcandid`
  MODIFY `idStatut` tinyint(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT pour la table `typecontrat`
--
ALTER TABLE `typecontrat`
  MODIFY `idContrat` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT pour la table `utilisateur`
--
ALTER TABLE `utilisateur`
  MODIFY `idUser` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `candidature`
--
ALTER TABLE `candidature`
  ADD CONSTRAINT `candidature_ibfk_1` FOREIGN KEY (`idStatut`) REFERENCES `statutcandid` (`idStatut`),
  ADD CONSTRAINT `fkIdEtudiant` FOREIGN KEY (`idEtudiant`) REFERENCES `utilisateur` (`idUser`),
  ADD CONSTRAINT `fkIdOffre` FOREIGN KEY (`idOffre`) REFERENCES `offre` (`idOffre`);

--
-- Contraintes pour la table `offre`
--
ALTER TABLE `offre`
  ADD CONSTRAINT `fkIdEmployeur` FOREIGN KEY (`idEmployeur`) REFERENCES `utilisateur` (`idUser`),
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
