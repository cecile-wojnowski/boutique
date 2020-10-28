-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3308
-- Généré le :  mer. 28 oct. 2020 à 09:27
-- Version du serveur :  8.0.18
-- Version de PHP :  7.3.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `boutique`
--

-- --------------------------------------------------------

--
-- Structure de la table `categories`
--

DROP TABLE IF EXISTS `categories`;
CREATE TABLE IF NOT EXISTS `categories` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(255) NOT NULL,
  `nom_header` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `categories`
--

INSERT INTO `categories` (`id`, `nom`, `nom_header`) VALUES
(1, 'fruits', 'Fruits'),
(2, 'legumes', 'Légumes'),
(3, 'fruits_coques', 'Fruits à coque');

-- --------------------------------------------------------

--
-- Structure de la table `historique`
--

DROP TABLE IF EXISTS `historique`;
CREATE TABLE IF NOT EXISTS `historique` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_produit` varchar(255) NOT NULL,
  `quantite` int(11) NOT NULL,
  `date_achat` datetime NOT NULL,
  `id_utilisateur` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `historique`
--

INSERT INTO `historique` (`id`, `id_produit`, `quantite`, `date_achat`, `id_utilisateur`) VALUES
(1, '9', 2, '2020-10-16 11:43:12', 3),
(2, '2', 1, '2020-10-16 11:48:33', 3),
(3, '7', 2, '2020-10-16 11:59:00', 3),
(4, '1', 2, '2020-10-16 11:59:00', 3),
(5, '4', 2, '2020-10-16 12:07:31', 1),
(6, '8', 1, '2020-10-16 13:54:24', 1),
(7, '3', 1, '2020-10-16 13:55:18', 1);

-- --------------------------------------------------------

--
-- Structure de la table `produits`
--

DROP TABLE IF EXISTS `produits`;
CREATE TABLE IF NOT EXISTS `produits` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(255) NOT NULL,
  `prix` int(11) NOT NULL,
  `description` text NOT NULL,
  `image` varchar(255) NOT NULL,
  `date_ajout` datetime NOT NULL,
  `stock` int(11) NOT NULL,
  `valorisation` tinyint(1) NOT NULL,
  `prix_solde` int(11) DEFAULT NULL,
  `id_categorie` int(11) DEFAULT NULL,
  `id_sous_categorie` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `id_sous_categorie` (`id_sous_categorie`),
  KEY `prod/cat` (`id_categorie`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `produits`
--

INSERT INTO `produits` (`id`, `nom`, `prix`, `description`, `image`, `date_ajout`, `stock`, `valorisation`, `prix_solde`, `id_categorie`, `id_sous_categorie`) VALUES
(1, 'Amandes', 15, 'Depuis toujours, les amandes sont connues pour leurs propriétés bénéfiques.\r\nNos amandes sont pures càd qu’elles ne sont pas torréfiées, ni frites, ni salées ou sucrées. ', 'almonds.jpg', '2020-10-16 10:31:08', 198, 0, NULL, 3, 1),
(2, 'Pommes Royal Gala', 4, 'La pomme qui fait l\'unanimité grâce à son goût sucré et à sa polyvalence en cuisine', 'apples.jpg', '2020-10-16 10:32:34', 349, 1, 2, 1, 5),
(3, 'Ail', 15, 'L\'ail rose de Lautrec a un goût sucré et subtil, ce qui lui permet de s\'accorder avec tous les plats, mettez un fleuron de la gastronomie française dans votre assiette !', 'garlic.jpg', '2020-10-16 10:36:46', 33, 0, NULL, 2, 14),
(4, 'Oignons Verts', 4, 'Appelé également oignon nouveau ou ciboule, l\'oignon vert est une plante aromatique de la famille des amaryllidacées.', 'green-onion.jpg', '2020-10-16 10:40:22', 21, 1, 2, 2, 7),
(5, 'Pistaches', 9, 'Fraiches, sans sel ajouté', 'pistachio.jpg', '2020-10-16 10:45:51', 4, 1, 4, 3, 16),
(6, 'Pommes Granny Smith', 5, 'Amateur de pommes acidulées, légèrement sucrées et toujours bio', 'pommes-granny.jpg', '2020-10-16 10:46:56', 0, 1, 3, 1, 5),
(7, 'Oignons Rouges', 7, 'C\'est comme le vert et le jaune mais rouge', 'red-onions.jpg', '2020-10-16 10:47:55', 43, 0, NULL, 2, 7),
(8, 'Tomates rondes', 6, 'Tomates rondes bio.', 'tomatoes2.jpg', '2020-10-16 09:00:00', 29, 1, 3, 2, 4),
(9, 'Tomates coeur de boeuf', 10, 'Tomates coeur de boeuf bio.', 'tomatoes.jpg', '2020-10-16 12:00:00', 18, 0, NULL, 2, 4),
(10, 'Potimarron', 10, 'Potimarron bio.', 'pumpkin2.jpg', '2020-10-16 13:00:00', 6, 1, 4, 2, 3),
(11, 'Patisson', 8, 'Patisson bio.', 'pumpkin.jpg', '2020-10-16 10:00:00', 10, 0, NULL, 2, 3);

-- --------------------------------------------------------

--
-- Structure de la table `sous_categories`
--

DROP TABLE IF EXISTS `sous_categories`;
CREATE TABLE IF NOT EXISTS `sous_categories` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(255) NOT NULL,
  `id_categorie` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `supp_sous_cat` (`id_categorie`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `sous_categories`
--

INSERT INTO `sous_categories` (`id`, `nom`, `id_categorie`) VALUES
(1, 'Amandes', 3),
(3, 'Courges', 2),
(4, 'Tomates', 2),
(5, 'Pommes', 1),
(7, 'Oignons', 2),
(16, 'Pistaches', 3);

-- --------------------------------------------------------

--
-- Structure de la table `utilisateurs`
--

DROP TABLE IF EXISTS `utilisateurs`;
CREATE TABLE IF NOT EXISTS `utilisateurs` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(255) NOT NULL,
  `prenom` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `adresse` varchar(255) NOT NULL,
  `etat_panier` tinyint(1) DEFAULT NULL,
  `admin` tinyint(1) DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `utilisateurs`
--

INSERT INTO `utilisateurs` (`id`, `nom`, `prenom`, `password`, `email`, `adresse`, `etat_panier`, `admin`) VALUES
(1, 'Admin', 'Admin', '$2y$10$wYBNdJhv5Emfs7nmJtlesuwPL3cMfMYModaa.Dt.kCnNqgxcVObAu', 'admin@laplateforme.io', 'Quelque part ', NULL, 1),
(2, 'Siegl', 'Maxime', '$2y$10$jiRTPNWIdVphBwq5a2BXD.UDBvR4cug4lCkAQtWrreGXF9fPEW/f6', 'maxime.siegl@laplateforme.io', '3rue de chez moi, 13000 Marseille', NULL, 1),
(3, 'Wojnowski', 'Cécile', '$2y$10$SitZvOkPYtAwuY5Jq9hX3OJDQaw6fkbkvXD4BRBAR/LSkMG2Xpusq', 'cecile@laplateforme.io', '5 avenue des goudes, 67900 Les goudes', NULL, 0);

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `produits`
--
ALTER TABLE `produits`
  ADD CONSTRAINT `prod/cat` FOREIGN KEY (`id_categorie`) REFERENCES `categories` (`id`) ON DELETE CASCADE;

--
-- Contraintes pour la table `sous_categories`
--
ALTER TABLE `sous_categories`
  ADD CONSTRAINT `supp_sous_cat` FOREIGN KEY (`id_categorie`) REFERENCES `categories` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
