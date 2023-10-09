-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : dim. 03 sep. 2023 à 14:05
-- Version du serveur : 10.4.28-MariaDB
-- Version de PHP : 8.0.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `garage`
--

-- --------------------------------------------------------

--
-- Structure de la table `administrateur`
--

CREATE TABLE `administrateur` (
  `idADMINISTRATEUR` int(10) UNSIGNED NOT NULL,
  `login` varchar(45) NOT NULL,
  `password` varchar(45) NOT NULL,
  `created_at` date DEFAULT NULL,
  `updated_at` date DEFAULT NULL,
  `deleted_at` date DEFAULT NULL,
  `role` varchar(45) DEFAULT NULL,
  `garage_idGarage` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Structure de la table `avis`
--

CREATE TABLE `avis` (
  `idAvis` int(10) UNSIGNED NOT NULL,
  `nom` varchar(45) NOT NULL,
  `prenom` varchar(45) DEFAULT NULL,
  `contenu` text DEFAULT NULL,
  `note` decimal(3,2) DEFAULT NULL,
  `created_at` date DEFAULT NULL,
  `updated_at` date DEFAULT NULL,
  `deleted_at` date DEFAULT NULL,
  `garage_idGarage` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Structure de la table `contactform`
--

CREATE TABLE `contactform` (
  `idContactform` int(10) UNSIGNED NOT NULL,
  `nom` varchar(45) NOT NULL,
  `prenom` varchar(45) NOT NULL,
  `email` varchar(45) NOT NULL,
  `telephone` varchar(15) NOT NULL,
  `message` text NOT NULL,
  `date_reception` datetime DEFAULT NULL,
  `lu` tinyint(4) DEFAULT NULL,
  `garage_idGarage` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Structure de la table `employes`
--

CREATE TABLE `employes` (
  `idEMPLOYES` int(10) UNSIGNED NOT NULL,
  `login` varchar(45) NOT NULL,
  `password` varchar(45) NOT NULL,
  `role` varchar(45) NOT NULL,
  `created_at` date DEFAULT NULL,
  `updated_at` date DEFAULT NULL,
  `deleted_at` date DEFAULT NULL,
  `garage_idGarage` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Structure de la table `garage`
--

CREATE TABLE `garage` (
  `idGarage` int(10) UNSIGNED NOT NULL,
  `nom` varchar(45) DEFAULT NULL,
  `adresse` varchar(45) DEFAULT NULL,
  `telephone` varchar(15) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Structure de la table `horaires`
--

CREATE TABLE `horaires` (
  `idHoraires` int(10) UNSIGNED NOT NULL,
  `jour` varchar(15) NOT NULL,
  `heure_matin_ouverture` time DEFAULT NULL,
  `heure_matin_fermeture` time DEFAULT NULL,
  `heure_apresmidi_ouverture` time DEFAULT NULL,
  `heure_apresmidi_fermeture` time DEFAULT NULL,
  `updated_at` date DEFAULT NULL,
  `garage_idGarage` int(10) UNSIGNED NOT NULL,
  `ferme` tinyint(4) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Structure de la table `prestation`
--

CREATE TABLE `prestation` (
  `idPrestation` int(10) UNSIGNED NOT NULL,
  `nom` varchar(45) NOT NULL,
  `photoPrestation` varchar(45) NOT NULL,
  `description` text NOT NULL,
  `prix` decimal(6,2) NOT NULL,
  `created_at` date DEFAULT NULL,
  `updated_at` date DEFAULT NULL,
  `deleted_at` date DEFAULT NULL,
  `categorie` varchar(45) NOT NULL,
  `garage_idGarage` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Structure de la table `utilisateurs`
--

CREATE TABLE `utilisateurs` (
  `idUtilisateurs` int(10) UNSIGNED NOT NULL,
  `nom` varchar(45) NOT NULL,
  `prenom` varchar(45) NOT NULL,
  `email` varchar(45) NOT NULL,
  `telephone` varchar(15) NOT NULL,
  `garage_idGarage` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Structure de la table `vehicule`
--

CREATE TABLE `vehicule` (
  `idVehicule` int(10) UNSIGNED NOT NULL,
  `famille` varchar(45) NOT NULL,
  `marque` varchar(45) NOT NULL,
  `modele` varchar(45) NOT NULL,
  `annee` year(4) NOT NULL,
  `kilometrage` int(11) NOT NULL,
  `boitevitesse` varchar(45) NOT NULL,
  `energie` varchar(45) NOT NULL,
  `datecirculation` date NOT NULL,
  `puissance` varchar(45) NOT NULL,
  `places` int(11) NOT NULL,
  `couleur` varchar(45) NOT NULL,
  `reference` varchar(15) NOT NULL,
  `prix` decimal(9,2) NOT NULL,
  `imageVoiture` varchar(250) NOT NULL,
  `imageCritere` varchar(250) NOT NULL,
  `description` text NOT NULL,
  `created_at` date DEFAULT NULL,
  `updated_at` date DEFAULT NULL,
  `deleted_at` date DEFAULT NULL,
  `garage_idGarage` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `vehicule`
--

INSERT INTO `vehicule` (`idVehicule`, `famille`, `marque`, `modele`, `annee`, `kilometrage`, `boitevitesse`, `energie`, `datecirculation`, `puissance`, `places`, `couleur`, `reference`, `prix`, `imageVoiture`, `imageCritere`, `description`, `created_at`, `updated_at`, `deleted_at`, `garage_idGarage`) VALUES
(1, 'Berline', 'Peugeot', '208', '2022', 23000, 'automatique', 'Essence', '2023-08-22', '5', 5, 'Rouge', '2023-lk-15', 12000.00, '', '', 'ddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddd', NULL, NULL, NULL, 1),
(4, 'SUV', 'Renault', 'CLIO', '2018', 150000, 'automatique', 'Essence', '2023-08-28', '4', 5, 'Rouge', '2023-lk-12', 7000.00, '', '', 'ggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggg', NULL, NULL, NULL, 1);

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `administrateur`
--
ALTER TABLE `administrateur`
  ADD PRIMARY KEY (`idADMINISTRATEUR`,`garage_idGarage`),
  ADD KEY `fk_administrateur_garage1_idx` (`garage_idGarage`);

--
-- Index pour la table `avis`
--
ALTER TABLE `avis`
  ADD PRIMARY KEY (`idAvis`,`garage_idGarage`),
  ADD KEY `fk_avis_garage1_idx` (`garage_idGarage`);

--
-- Index pour la table `contactform`
--
ALTER TABLE `contactform`
  ADD PRIMARY KEY (`idContactform`,`garage_idGarage`),
  ADD KEY `fk_contactform_garage1_idx` (`garage_idGarage`);

--
-- Index pour la table `employes`
--
ALTER TABLE `employes`
  ADD PRIMARY KEY (`idEMPLOYES`,`garage_idGarage`),
  ADD KEY `fk_employes_garage1_idx` (`garage_idGarage`);

--
-- Index pour la table `garage`
--
ALTER TABLE `garage`
  ADD PRIMARY KEY (`idGarage`);

--
-- Index pour la table `horaires`
--
ALTER TABLE `horaires`
  ADD PRIMARY KEY (`idHoraires`,`garage_idGarage`),
  ADD KEY `fk_horaires_garage1_idx` (`garage_idGarage`);

--
-- Index pour la table `prestation`
--
ALTER TABLE `prestation`
  ADD PRIMARY KEY (`idPrestation`,`garage_idGarage`),
  ADD KEY `fk_prestation_garage1_idx` (`garage_idGarage`);

--
-- Index pour la table `utilisateurs`
--
ALTER TABLE `utilisateurs`
  ADD PRIMARY KEY (`idUtilisateurs`,`garage_idGarage`),
  ADD KEY `fk_utilisateurs_garage1_idx` (`garage_idGarage`);

--
-- Index pour la table `vehicule`
--
ALTER TABLE `vehicule`
  ADD PRIMARY KEY (`idVehicule`,`garage_idGarage`),
  ADD KEY `fk_vehicule_garage_idx` (`garage_idGarage`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `administrateur`
--
ALTER TABLE `administrateur`
  MODIFY `idADMINISTRATEUR` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `avis`
--
ALTER TABLE `avis`
  MODIFY `idAvis` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `contactform`
--
ALTER TABLE `contactform`
  MODIFY `idContactform` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `employes`
--
ALTER TABLE `employes`
  MODIFY `idEMPLOYES` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `garage`
--
ALTER TABLE `garage`
  MODIFY `idGarage` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `horaires`
--
ALTER TABLE `horaires`
  MODIFY `idHoraires` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `prestation`
--
ALTER TABLE `prestation`
  MODIFY `idPrestation` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `utilisateurs`
--
ALTER TABLE `utilisateurs`
  MODIFY `idUtilisateurs` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `vehicule`
--
ALTER TABLE `vehicule`
  MODIFY `idVehicule` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
