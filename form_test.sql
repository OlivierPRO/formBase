-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost
-- Généré le :  mer. 15 jan. 2020 à 16:33
-- Version du serveur :  8.0.18
-- Version de PHP :  7.3.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `form_test`
--

-- --------------------------------------------------------

--
-- Structure de la table `test_departments`
--

CREATE TABLE `test_departments` (
  `id` int(11) NOT NULL,
  `depNumbers` int(11) NOT NULL,
  `depName` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `test_departments`
--

INSERT INTO `test_departments` (`id`, `depNumbers`, `depName`) VALUES
(1, 1, 'Ain'),
(2, 2, 'Aisne'),
(3, 3, 'Allier'),
(4, 4, 'Alpes-de-Haute-Provence'),
(5, 5, 'Hautes-Alpes'),
(6, 6, 'Alpes-Maritimes'),
(7, 7, 'Ardèche'),
(8, 8, 'Ardennes'),
(9, 9, 'Ariège'),
(10, 10, 'Aube'),
(11, 11, 'Aude'),
(12, 12, 'Aveyron'),
(13, 13, 'Bouches-du-Rhône'),
(14, 14, 'Calvados'),
(15, 15, 'Cantal'),
(16, 16, 'Charente'),
(17, 17, 'Charente-Maritime'),
(18, 18, 'Cher'),
(19, 19, 'Corrèze'),
(20, 20, 'Corse-du-Sud'),
(21, 21, 'Côte-d\'Or'),
(22, 22, 'Côtes-d\'Armor'),
(23, 23, 'Creuse'),
(24, 24, 'Dordogne'),
(25, 25, 'Doubs'),
(26, 26, 'Drôme'),
(27, 27, 'Eure'),
(28, 28, 'Eure-et-Loir'),
(29, 29, 'Finistère'),
(30, 30, 'Gard'),
(31, 31, 'Haute-Garonne'),
(32, 32, 'Gers'),
(33, 33, 'Gironde'),
(34, 34, 'Hérault'),
(35, 35, 'Ille-et-Vilaine'),
(36, 36, 'Indre'),
(37, 37, 'Indre-et-Loire'),
(38, 38, 'Isère'),
(39, 39, 'Jura'),
(40, 40, 'Landes'),
(41, 41, 'Loir-et-Cher'),
(42, 42, 'Loire'),
(43, 43, 'Haute-Loire'),
(44, 44, 'Loire-Atlantique'),
(45, 45, 'Loiret'),
(46, 46, 'Lot'),
(47, 47, 'Lot-et-Garonne'),
(48, 48, 'Lozère'),
(49, 49, 'Maine-et-Loire'),
(50, 50, 'Manche'),
(51, 51, 'Marne'),
(52, 52, 'Haute-Marne'),
(53, 53, 'Mayenne'),
(54, 54, 'Meurthe-et-Moselle'),
(55, 55, 'Meuse'),
(56, 56, 'Morbihan'),
(57, 57, 'Moselle'),
(58, 58, 'Nièvre'),
(59, 59, 'Nord'),
(60, 60, 'Oise'),
(61, 61, 'Orne'),
(62, 62, 'Pas-de-Calais'),
(63, 63, 'Puy-de-Dôme'),
(64, 64, 'Pyrénées-Atlantiques'),
(65, 65, 'Hautes-Pyrénées'),
(66, 66, 'Pyrénées-Orientales'),
(67, 67, 'Bas-Rhin'),
(68, 68, 'Haut-Rhin'),
(69, 69, 'Rhône'),
(70, 70, 'Haute-Saône'),
(71, 71, 'Saône-et-Loire'),
(72, 72, 'Sarthe'),
(73, 73, 'Savoie'),
(74, 74, 'Haute-Savoie'),
(75, 75, 'Paris'),
(76, 76, 'Seine-Maritime'),
(77, 77, 'Seine-et-Marne'),
(78, 78, 'Yvelines'),
(79, 79, 'Deux-Sèvres'),
(80, 80, 'Somme'),
(81, 81, 'Tarn'),
(82, 82, 'Tarn-et-Garonne'),
(83, 83, 'Var'),
(84, 84, 'Vaucluse'),
(85, 85, 'Vendée'),
(86, 86, 'Vienne'),
(87, 87, 'Haute-Vienne'),
(88, 88, 'Vosges'),
(89, 89, 'Yonne'),
(90, 90, 'Territoire de Belfort'),
(91, 91, 'Essonne'),
(92, 92, 'Hauts-de-Seine'),
(93, 93, 'Seine-Saint-Denis'),
(94, 94, 'Val-de-Marne'),
(95, 95, 'Val-d\'Oise'),
(96, 971, 'Guadeloupe'),
(97, 972, 'Martinique'),
(98, 973, 'Guyane'),
(99, 974, 'La Réunion'),
(100, 975, 'St-Pierre-et-Miquelon'),
(101, 976, 'Mayotte'),
(102, 986, 'Wallis et Futuna'),
(103, 987, 'Polynésie Française'),
(104, 988, 'Nouvelle Calédonie');

-- --------------------------------------------------------

--
-- Structure de la table `test_roles`
--

CREATE TABLE `test_roles` (
  `id` int(11) NOT NULL,
  `roles` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `test_user`
--

CREATE TABLE `test_user` (
  `id` int(11) NOT NULL,
  `firstname` varchar(50) NOT NULL,
  `lastname` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `pseudo` varchar(50) NOT NULL,
  `mail` varchar(255) NOT NULL,
  `phone` int(11) NOT NULL,
  `photo` varchar(255) NULL,
  `infos` text NOT NULL,
  `id_test_roles` int(11) NOT NULL,
  `id_test_departments` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `test_departments`
--
ALTER TABLE `test_departments`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `test_roles`
--
ALTER TABLE `test_roles`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `test_user`
--
ALTER TABLE `test_user`
  ADD PRIMARY KEY (`id`),
  ADD KEY `test_user_test_roles_FK` (`id_test_roles`),
  ADD KEY `test_user_test_departments0_FK` (`id_test_departments`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `test_departments`
--
ALTER TABLE `test_departments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=105;

--
-- AUTO_INCREMENT pour la table `test_roles`
--
ALTER TABLE `test_roles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `test_user`
--
ALTER TABLE `test_user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `test_user`
--
ALTER TABLE `test_user`
  ADD CONSTRAINT `test_user_test_departments0_FK` FOREIGN KEY (`id_test_departments`) REFERENCES `test_departments` (`id`),
  ADD CONSTRAINT `test_user_test_roles_FK` FOREIGN KEY (`id_test_roles`) REFERENCES `test_roles` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
