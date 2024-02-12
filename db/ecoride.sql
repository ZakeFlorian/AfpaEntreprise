-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost:3306
-- Généré le : lun. 22 jan. 2024 à 14:58
-- Version du serveur : 8.0.30
-- Version de PHP : 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `ecoride`
--

-- --------------------------------------------------------

--
-- Structure de la table `admin`
--

CREATE TABLE `admin` (
  `id_admin` int NOT NULL,
  `email_admin` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `password_admin` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `admin`
--

INSERT INTO `admin` (`id_admin`, `email_admin`, `password_admin`) VALUES
(1, 'ArmandDurand@gmail.com', 'ArmyBEoir');

-- --------------------------------------------------------

--
-- Structure de la table `challengespecial`
--

CREATE TABLE `challengespecial` (
  `id_specialchallenge` int NOT NULL,
  `StartingDate_challenge` date DEFAULT NULL,
  `endingdate_challenge` date DEFAULT NULL,
  `name_challenge` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `description_challenge` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `transport_challenge` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `Image_challenge` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `ID_Entreprise` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `challengespecial`
--

INSERT INTO `challengespecial` (`id_specialchallenge`, `StartingDate_challenge`, `endingdate_challenge`, `name_challenge`, `description_challenge`, `transport_challenge`, `Image_challenge`, `ID_Entreprise`) VALUES
(1, '2024-02-04', '2024-02-04', 'Marche à pied', 'Marcher une distance donnée', 'A pied', 'img.jpg', 1),
(2, '2024-04-04', '2024-04-04', 'Cyclisme', 'Rouler à velo une distance donnée', 'En Velo', 'img.jpg', 1);

-- --------------------------------------------------------

--
-- Structure de la table `challenge_possede_mode_de_transport`
--

CREATE TABLE `challenge_possede_mode_de_transport` (
  `id_specialchallenge` int NOT NULL,
  `id_modedetransport` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Structure de la table `entreprise`
--

CREATE TABLE `entreprise` (
  `ID_Entreprise` int NOT NULL,
  `name_entreprise` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `email_entreprise` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `password_entreprise` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `siretnumber_entreprise` varchar(14) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `adresse_entreprise` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `zipcode_entreprise` varchar(5) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `city_entreprise` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `Image_entreprise` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `entreprise`
--

INSERT INTO `entreprise` (`ID_Entreprise`, `name_entreprise`, `email_entreprise`, `password_entreprise`, `siretnumber_entreprise`, `adresse_entreprise`, `zipcode_entreprise`, `city_entreprise`, `Image_entreprise`) VALUES
(1, 'LunaTech Solutions', 'LunaTech@gmail.com', 'kamini43', '28859301929402', '8 Rue de Rivoli', '75001', 'Paris', 'img.jpg'),
(2, 'Phoenix Consulting and Design', 'PhoenixCo@yahoo.com', 'MarlyGomont23', '12279402390923', '25 avenue du Général de Gaulle', '69110', 'Lyon', 'img.jpg');

-- --------------------------------------------------------

--
-- Structure de la table `modedetransport`
--

CREATE TABLE `modedetransport` (
  `id_modedetransport` int NOT NULL,
  `Type_modedetransport` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `modedetransport`
--

INSERT INTO `modedetransport` (`id_modedetransport`, `Type_modedetransport`) VALUES
(1, 'velo'),
(2, 'Marche à pied'),
(3, 'Skate'),
(4, 'trotinette'),
(5, 'Roller');

-- --------------------------------------------------------

--
-- Structure de la table `trajet`
--

CREATE TABLE `trajet` (
  `id_trajet` int NOT NULL,
  `date_trajet` date DEFAULT NULL,
  `distance_trajet` float(3,2) DEFAULT NULL,
  `traveltime_trajet` time DEFAULT NULL,
  `image_trajet` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `id_modedetransport` int NOT NULL,
  `id_utilisateur` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Structure de la table `utilisateur`
--

CREATE TABLE `utilisateur` (
  `id_utilisateur` int NOT NULL,
  `firstname_utilisateur` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `lastname_utilisateur` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `nickname_utilisateur` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `birthdate_utilisateur` date DEFAULT NULL,
  `email_utilisateur` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `password_utilisateur` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `description_utilisateur` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `Image_utilisateur` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `ID_Entreprise` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `utilisateur`
--

INSERT INTO `utilisateur` (`id_utilisateur`, `firstname_utilisateur`, `lastname_utilisateur`, `nickname_utilisateur`, `birthdate_utilisateur`, `email_utilisateur`, `password_utilisateur`, `description_utilisateur`, `Image_utilisateur`, `ID_Entreprise`) VALUES
(1, 'John', 'Smith', 'Ace', '1995-12-03', 'johnsmith123@gmail.com', 'DragonFire789!', 'Un aventurier intrépide', 'img.jpg', 1),
(2, 'Emily', 'Johnson', 'Dottie', '1988-05-11', 'emilyjohnson334@gmail.com', 'SecretAgent007$', 'Une danseuse étoile', 'img.jpg', 1),
(3, 'Michael', 'Davis', 'Sparky', '1979-05-21', 'michoudavis@yahoo.com', 'Wonderland123*', 'Un intellectuel érudit', 'img.jpg', 2),
(4, 'Sophia', 'Anderson', 'Skipper', '2001-03-04', 'sophieanderson44@yahoo.com', 'GalaxyQuest456#', 'Une athlète olympique', 'img.jpg', 1),
(5, 'William', 'Thompson', 'Buzzy', '1993-07-16', 'willthom@gmail.com', 'PirateAdventure!', 'Un champion de boxe', 'img.jpg', 2),
(6, 'Olivia', 'Martinez', 'Scooter', '1965-12-29', 'oliviamartinez13@yahoo.com', 'MagicSpell789$', 'Une scientifique renommée', 'img.jpg', 2),
(9, 'Florian', 'Malet', 'Zake', '2003-03-04', 'stephe76bs4@outlook.fr', '$2y$10$RR..aQkOcDpyS3Wpwcb5KuzhDcMSFyG6axHgRm296Diycdu.ETpHO', NULL, NULL, 1),
(12, 'Florian', 'Malet', 'Zake', '2003-03-04', 'stephe76bs8@outlook.fr', '$2y$10$1wyhd9em73bwIj.hiqr4IeHur2NFmbT/OQDzIySOZ/dFii1dPSB1C', NULL, NULL, 1),
(14, 'Richard', 'Papillon', 'Shox', '1994-04-25', 'papillon.richard@csgo.fr', '$2y$10$SNQRl7Wsg0bpclatf3.sk.94M4x0RQNGc/I2h4yNicyELW0bMFv4.', NULL, NULL, 1),
(15, 'dzq', 'dzq', 'dzq', '2003-03-04', 'dzqdzq', '$2y$10$A4AHo18IYi1uUn5F50xbbeUcNEexv0X7.5wh3Pf/Ur2fBiO2qmggi', NULL, NULL, 1);

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id_admin`),
  ADD UNIQUE KEY `password_admin` (`password_admin`);

--
-- Index pour la table `challengespecial`
--
ALTER TABLE `challengespecial`
  ADD PRIMARY KEY (`id_specialchallenge`),
  ADD KEY `ID_Entreprise` (`ID_Entreprise`);

--
-- Index pour la table `challenge_possede_mode_de_transport`
--
ALTER TABLE `challenge_possede_mode_de_transport`
  ADD PRIMARY KEY (`id_specialchallenge`,`id_modedetransport`),
  ADD KEY `id_modedetransport` (`id_modedetransport`);

--
-- Index pour la table `entreprise`
--
ALTER TABLE `entreprise`
  ADD PRIMARY KEY (`ID_Entreprise`),
  ADD UNIQUE KEY `siretnumber_entreprise` (`siretnumber_entreprise`);

--
-- Index pour la table `modedetransport`
--
ALTER TABLE `modedetransport`
  ADD PRIMARY KEY (`id_modedetransport`);

--
-- Index pour la table `trajet`
--
ALTER TABLE `trajet`
  ADD PRIMARY KEY (`id_trajet`),
  ADD KEY `id_modedetransport` (`id_modedetransport`),
  ADD KEY `id_utilisateur` (`id_utilisateur`);

--
-- Index pour la table `utilisateur`
--
ALTER TABLE `utilisateur`
  ADD PRIMARY KEY (`id_utilisateur`),
  ADD UNIQUE KEY `email_utilisateur` (`email_utilisateur`),
  ADD UNIQUE KEY `password_utilisateur` (`password_utilisateur`),
  ADD KEY `ID_Entreprise` (`ID_Entreprise`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `admin`
--
ALTER TABLE `admin`
  MODIFY `id_admin` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT pour la table `challengespecial`
--
ALTER TABLE `challengespecial`
  MODIFY `id_specialchallenge` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT pour la table `entreprise`
--
ALTER TABLE `entreprise`
  MODIFY `ID_Entreprise` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT pour la table `modedetransport`
--
ALTER TABLE `modedetransport`
  MODIFY `id_modedetransport` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT pour la table `trajet`
--
ALTER TABLE `trajet`
  MODIFY `id_trajet` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `utilisateur`
--
ALTER TABLE `utilisateur`
  MODIFY `id_utilisateur` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `challengespecial`
--
ALTER TABLE `challengespecial`
  ADD CONSTRAINT `challengespecial_ibfk_1` FOREIGN KEY (`ID_Entreprise`) REFERENCES `entreprise` (`ID_Entreprise`);

--
-- Contraintes pour la table `challenge_possede_mode_de_transport`
--
ALTER TABLE `challenge_possede_mode_de_transport`
  ADD CONSTRAINT `challenge_possede_mode_de_transport_ibfk_1` FOREIGN KEY (`id_specialchallenge`) REFERENCES `challengespecial` (`id_specialchallenge`),
  ADD CONSTRAINT `challenge_possede_mode_de_transport_ibfk_2` FOREIGN KEY (`id_modedetransport`) REFERENCES `modedetransport` (`id_modedetransport`);

--
-- Contraintes pour la table `trajet`
--
ALTER TABLE `trajet`
  ADD CONSTRAINT `trajet_ibfk_1` FOREIGN KEY (`id_modedetransport`) REFERENCES `modedetransport` (`id_modedetransport`),
  ADD CONSTRAINT `trajet_ibfk_2` FOREIGN KEY (`id_utilisateur`) REFERENCES `utilisateur` (`id_utilisateur`);

--
-- Contraintes pour la table `utilisateur`
--
ALTER TABLE `utilisateur`
  ADD CONSTRAINT `utilisateur_ibfk_1` FOREIGN KEY (`ID_Entreprise`) REFERENCES `entreprise` (`ID_Entreprise`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
