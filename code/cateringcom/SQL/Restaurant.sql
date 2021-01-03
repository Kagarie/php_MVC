-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost
-- Généré le : mer. 30 déc. 2020 à 00:11
-- Version du serveur :  10.5.8-MariaDB
-- Version de PHP : 7.4.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `Restaurant`
--

-- --------------------------------------------------------

--
-- Structure de la table `admin`
--

CREATE TABLE `admin` (
  `nom` varchar(20) NOT NULL,
  `prenom` varchar(20) NOT NULL,
  `mail` varchar(50) NOT NULL,
  `mtp` varchar(120) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `admin`
--

INSERT INTO `admin` (`nom`, `prenom`, `mail`, `mtp`) VALUES
('', '', '', '$2y$10$7Fn7WSguSEdYDLSDViDh9e7ZTq1inrCLX8NgFdhoy7aYGHqJx/80W'),
('Admin', 'admin', 'admin.admin@admin.com', '$2y$10$vwdvnAMwqnxDQbN586zVdeMjuZyQDrzbKDqMTH/xDuvF40WEzcG0a'),
('Gégé', 'Gérant', 'gege@gege.com', '$2y$10$GXaiGSseDIWSlzvboA3umO2FjSl6nk17UVms3VnrfYlZ6IGXtFHeq'),
('secondAdmin', 'Second', 'second@second.gmail', '$2y$10$S3.xlnbe6dxPM9fEGXqia.FJ.SKx6hZKi.OLUuOQuklF.nWrVywDG'),
('test', 'test', 'test@test.com', '$2y$10$bgOb.JJb7dHCfcY3xjZXy.pixYeqYubgR8v6bDVedi639i8CizS5m');

-- --------------------------------------------------------

--
-- Structure de la table `client`
--

CREATE TABLE `client` (
  `id` int(11) NOT NULL,
  `nom` varchar(20) NOT NULL,
  `prenom` varchar(20) NOT NULL,
  `mail` varchar(50) NOT NULL,
  `mtp` varchar(120) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `client`
--

INSERT INTO `client` (`id`, `nom`, `prenom`, `mail`, `mtp`) VALUES
(8, 'test', 'test', 'test@test.test', 'test'),
(12, 'secondTest', 'secondTest', 'secondTest@second.second', '$2y$10$UT48/AUqbGRVq4ICdV0l.umjVpwMqVWBQQ7T4/BKEni49xtd9/A6e'),
(13, '4test', '4test', '4test@4.4', '$2y$10$vi7pXulclHO826BtKET1xuKbZv7ymSNWx85f.SHOn/hnWdlZiwizK');

-- --------------------------------------------------------

--
-- Structure de la table `plat`
--

CREATE TABLE `plat` (
  `nomPlat` varchar(20) NOT NULL,
  `typePlat` varchar(10) NOT NULL,
  `prix` decimal(4,2) NOT NULL,
  `pathImage` varchar(80) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `plat`
--

INSERT INTO `plat` (`nomPlat`, `typePlat`, `prix`, `pathImage`) VALUES
('fish and chips', 'Poisson', '7.00', 'mesImages/7.00.fish.jpeg'),
('Hommard', 'Poisson', '12.00', 'mesImages/12.00.hommard.jpeg'),
('Le boeuf', 'Viande', '8.00', 'mesImages/8.00.boeuf.jpeg'),
('Le poulet', 'Viande', '6.00', 'mesImages/6.00.poulet.jpeg'),
('Salade Ceasar', 'Salade', '8.95', 'mesImages/8.95.salade2.jpeg'),
('Salade verte', 'Salade', '3.00', 'mesImages/3.00.salade.jpeg'),
('Saumon', 'Poisson', '8.00', 'mesImages/8.00.saumon.jpeg'),
('soupe', 'Soupe', '5.00', 'mesImages/5.00.soupe.jpeg');

-- --------------------------------------------------------

--
-- Structure de la table `restaurant`
--

CREATE TABLE `restaurant` (
  `nomRestaurant` varchar(30) NOT NULL,
  `admin` varchar(20) NOT NULL,
  `numClient` int(11) NOT NULL,
  `nomPlat` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`nom`);

--
-- Index pour la table `client`
--
ALTER TABLE `client`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `plat`
--
ALTER TABLE `plat`
  ADD PRIMARY KEY (`nomPlat`);

--
-- Index pour la table `restaurant`
--
ALTER TABLE `restaurant`
  ADD PRIMARY KEY (`nomRestaurant`),
  ADD KEY `nomPlat` (`nomPlat`),
  ADD KEY `numClient` (`numClient`),
  ADD KEY `admin` (`admin`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `client`
--
ALTER TABLE `client`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `restaurant`
--
ALTER TABLE `restaurant`
  ADD CONSTRAINT `restaurant_ibfk_2` FOREIGN KEY (`nomPlat`) REFERENCES `plat` (`nomPlat`),
  ADD CONSTRAINT `restaurant_ibfk_3` FOREIGN KEY (`numClient`) REFERENCES `client` (`id`),
  ADD CONSTRAINT `restaurant_ibfk_4` FOREIGN KEY (`admin`) REFERENCES `admin` (`nom`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
