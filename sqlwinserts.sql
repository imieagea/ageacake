-- phpMyAdmin SQL Dump
-- version 3.5.1
-- http://www.phpmyadmin.net
--
-- Client: localhost
-- Généré le: Ven 26 Octobre 2012 à 12:45
-- Version du serveur: 5.5.24-log
-- Version de PHP: 5.4.3

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de données: `ageacake`
--

-- --------------------------------------------------------

--
-- Structure de la table `avis_fiches`
--

CREATE TABLE IF NOT EXISTS `avis_fiches` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `texte` text NOT NULL,
  `fiche_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fiches_ibfk_1` (`fiche_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Structure de la table `categories`
--

CREATE TABLE IF NOT EXISTS `categories` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `parent_id` int(11) DEFAULT NULL,
  `slug` varchar(50) NOT NULL,
  `nom` varchar(255) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `nom` (`nom`),
  KEY `parent_id` (`parent_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=9 ;

--
-- Contenu de la table `categories`
--

INSERT INTO `categories` (`id`, `parent_id`, `slug`, `nom`) VALUES
(1, NULL, 'actualites', 'Actualités'),
(4, NULL, 'a-la-une', 'A la une'),
(5, NULL, 'texte-recrutement', 'Texte recrutement'),
(6, 1, 'bretagne', 'Actualités Bretagne'),
(7, 1, 'pays-de-la-loire', 'Actualités Pays de la Loire'),
(8, NULL, 'informations-de-contact', 'Informations de contact');

-- --------------------------------------------------------

--
-- Structure de la table `contenus`
--

CREATE TABLE IF NOT EXISTS `contenus` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `titre` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `contenu` text NOT NULL,
  `ordre` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `slug` (`slug`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ;

--
-- Contenu de la table `contenus`
--

INSERT INTO `contenus` (`id`, `titre`, `slug`, `contenu`, `ordre`) VALUES
(1, 'Qui sommes-nous ?', 'qui-sommes-nous', '<p>\r\nLorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam metus orci, pellentesque vitae semper at, consequat ut urna. </p>', 1),
(3, 'Espace Orientation Jeune', 'espace-orientation-jeune', '<p>\r\nLorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam metus orci, pellentesque vitae semper at, consequat ut urna. </p>', 3),
(4, 'Adhérer', 'adherer', '<p>\r\nLorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam metus orci, pellentesque vitae semper at, consequat ut urna. </p>', 2);

-- --------------------------------------------------------

--
-- Structure de la table `criteres`
--

CREATE TABLE IF NOT EXISTS `criteres` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `type` varchar(20) NOT NULL,
  `position` int(5) DEFAULT NULL,
  `nom` varchar(255) NOT NULL,
  `critere_category_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `criteres_ibfk_1` (`critere_category_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=8 ;

--
-- Contenu de la table `criteres`
--

INSERT INTO `criteres` (`id`, `type`, `position`, `nom`, `critere_category_id`) VALUES
(1, 'checkbox', 0, '44', 1),
(2, 'checkbox', 0, '35', 1),
(3, 'checkbox', 0, 'Attaché d''agence', 2),
(5, 'checkbox', 0, 'Particulier', 5),
(6, 'checkbox', 0, 'Collaborateur d''agence', 2),
(7, 'checkbox', NULL, 'Chargé de clientèle', 2);

-- --------------------------------------------------------

--
-- Structure de la table `critere_categories`
--

CREATE TABLE IF NOT EXISTS `critere_categories` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `parent_id` int(11) NOT NULL,
  `position` int(5) DEFAULT NULL,
  `nom` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=6 ;

--
-- Contenu de la table `critere_categories`
--

INSERT INTO `critere_categories` (`id`, `parent_id`, `position`, `nom`) VALUES
(1, 0, 0, 'Mobilité graphique'),
(2, 0, 1, 'Type d''emploi recherché'),
(3, 0, 2, 'Chargé de clientèle'),
(5, 3, 0, 'Typologie de Clientèle');

-- --------------------------------------------------------

--
-- Structure de la table `critere_value`
--

CREATE TABLE IF NOT EXISTS `critere_value` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `critere_id` int(11) NOT NULL,
  `fiche_id` int(11) NOT NULL,
  `value` varchar(255) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fiches_ibfk_2` (`fiche_id`),
  KEY `criteres_ibfk_2` (`critere_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Structure de la table `fiches`
--

CREATE TABLE IF NOT EXISTS `fiches` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `statut` varchar(10) NOT NULL DEFAULT 'new',
  `auteur` varchar(20) NOT NULL DEFAULT 'anonyme',
  `nom` varchar(255) NOT NULL,
  `prenom` varchar(255) NOT NULL,
  `adresse` varchar(255) NOT NULL,
  `code_postal` varchar(255) NOT NULL,
  `ville` varchar(255) NOT NULL,
  `portable` varchar(20) NOT NULL,
  `fixe` varchar(20) DEFAULT NULL,
  `email` varchar(255) NOT NULL,
  `date_naissance` date DEFAULT NULL,
  `message` tinytext,
  `pdf` varchar(255) DEFAULT NULL,
  `exp` int(1) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Structure de la table `groups`
--

CREATE TABLE IF NOT EXISTS `groups` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=6 ;

--
-- Contenu de la table `groups`
--

INSERT INTO `groups` (`id`, `nom`) VALUES
(4, 'Administrateurs'),
(5, 'Agents');

-- --------------------------------------------------------

--
-- Structure de la table `partenaires`
--

CREATE TABLE IF NOT EXISTS `partenaires` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(255) NOT NULL,
  `link` varchar(255) DEFAULT NULL,
  `pdf` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Structure de la table `posts`
--

CREATE TABLE IF NOT EXISTS `posts` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `titre` varchar(255) NOT NULL,
  `corps` text NOT NULL,
  `slug` varchar(255) NOT NULL,
  `category_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `slug` (`slug`),
  KEY `posts_ibfk_1` (`category_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=10 ;

--
-- Contenu de la table `posts`
--

INSERT INTO `posts` (`id`, `titre`, `corps`, `slug`, `category_id`) VALUES
(1, 'A la une, c''est super', '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam metus orci, pellentesque vitae semper at, consequat ut urna. Phasellus auctor, sem quis vestibulum hendrerit, mauris elit gravida lacus, id dignissim magna nunc at nibh. Cras viverra eleifend est, in rhoncus massa porta sed. Integer cursus tincidunt libero, non venenatis quam placerat id. Praesent molestie ultrices velit a posuere. Sed a magna sagittis odio sagittis egestas. Nullam imperdiet venenatis ullamcorper. Donec tempus leo ac justo ornare et accumsan augue euismod.</p>', 'c-super', 4),
(3, 'Les agents généraux recrutent', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam metus orci, pellentesque vitae semper at, consequat ut urna. Phasellus auctor, sem quis vestibulum hendrerit, mauris elit gravida lacus, id dignissim magna nunc at nibh. Cras viverra eleifend est, in rhoncus massa porta.', 'les-agents-generaux-recrutent', 5),
(4, 'actu en bretagne OMG', '<p>\r\nLorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam metus orci, pellentesque vitae semper at, consequat ut urna. </p>', 'actu-en-bretagne-omg', 6),
(5, 'Une actus pays de la loire', '<p>\r\nLorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam metus orci, pellentesque vitae semper at, consequat ut urna. </p>', 'une-atus-pays-de-la-loire', 7),
(6, 'Une actus pays de la loire2', '<p>\r\nLorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam metus orci, pellentesque vitae semper at, consequat ut urna. </p>', 'une-atus-pays-de-la-loire2', 7),
(7, 'Une actus pays de la loire3', '<p>\r\nLorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam metus orci, pellentesque vitae semper at, consequat ut urna. </p>', 'une-atus-pays-de-la-loire3', 7),
(8, 'actu en bretagne OMG2', '<p>\r\nLorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam metus orci, pellentesque vitae semper at, consequat ut urna. </p>', 'actu-en-bretagne-omg2', 6),
(9, 'Informations de contact', '<p>Emné FAKHRY<br>\r\n4, rue de l’Héronnière<br>\r\n44000 Nantes<br>\r\n<strong>Mail</strong>&nbsp;: rg-paysloire@agea.fr<br>\r\n<strong>Portable</strong>&nbsp;: 06 58 69 00 73<br>\r\n<strong>Fax</strong>&nbsp;: 02 40 69 81 14</p>', 'informations-de-contact', 8);

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(255) NOT NULL,
  `password` varchar(50) NOT NULL,
  `role` varchar(20) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `username` (`username`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ;

--
-- Contenu de la table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `role`) VALUES
(1, 'Admin', '035d9cd0f35e08faf59015dd18be6127fb00ce5f', 'admin'),
(2, 'bobby', '94da1b94b8d4e5e5161d01369a92f50258682c75', 'admin'),
(3, 'test', '8945c045f369958ee7fede1471b2780dee1424a0', 'agent');

--
-- Contraintes pour les tables exportées
--

--
-- Contraintes pour la table `avis_fiches`
--
ALTER TABLE `avis_fiches`
  ADD CONSTRAINT `fiches_ibfk_1` FOREIGN KEY (`fiche_id`) REFERENCES `fiches` (`id`);

--
-- Contraintes pour la table `categories`
--
ALTER TABLE `categories`
  ADD CONSTRAINT `categories_ibfk_1` FOREIGN KEY (`parent_id`) REFERENCES `categories` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `criteres`
--
ALTER TABLE `criteres`
  ADD CONSTRAINT `criteres_ibfk_1` FOREIGN KEY (`critere_category_id`) REFERENCES `critere_categories` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `critere_value`
--
ALTER TABLE `critere_value`
  ADD CONSTRAINT `criteres_ibfk_2` FOREIGN KEY (`critere_id`) REFERENCES `criteres` (`id`),
  ADD CONSTRAINT `fiches_ibfk_2` FOREIGN KEY (`fiche_id`) REFERENCES `fiches` (`id`);

--
-- Contraintes pour la table `posts`
--
ALTER TABLE `posts`
  ADD CONSTRAINT `posts_ibfk_1` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
