-- phpMyAdmin SQL Dump
-- version 3.5.1
-- http://www.phpmyadmin.net
--
-- Client: localhost
-- Généré le: Sam 03 Novembre 2012 à 17:33
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
  `created_at` datetime NOT NULL,
  `edited_at` datetime NOT NULL,
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
  `slug` varchar(255) NOT NULL,
  `nom` varchar(255) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `nom` (`nom`),
  KEY `parent_id` (`parent_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=33 ;

--
-- Contenu de la table `categories`
--

INSERT INTO `categories` (`id`, `parent_id`, `slug`, `nom`) VALUES
(1, NULL, 'actualites', 'Actualités'),
(4, NULL, 'a-la-une', 'A la une'),
(5, NULL, 'texte-recrutement', 'Texte recrutement'),
(6, 1, 'bretagne', 'Actualités Bretagne'),
(7, 1, 'pays-de-la-loire', 'Actualités Pays de la Loire'),
(8, NULL, 'informations-de-contact', 'Informations de contact'),
(31, NULL, 'bruissements', 'Bruissements'),
(32, NULL, 'actions', 'Actions');

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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=9 ;

--
-- Contenu de la table `criteres`
--

INSERT INTO `criteres` (`id`, `type`, `position`, `nom`, `critere_category_id`) VALUES
(1, 'checkbox', 0, '44', 1),
(2, 'checkbox', 0, '35', 1),
(3, 'checkbox', 0, 'Attaché d''agence', 2),
(5, 'checkbox', 0, 'Particulier', 5),
(6, 'checkbox', 0, 'Collaborateur d''agence', 2),
(7, 'checkbox', NULL, 'Chargé de clientèle', 2),
(8, 'textarea', NULL, 'Autres : assurance crédit et crédits', 6);

-- --------------------------------------------------------

--
-- Structure de la table `critere_categories`
--

CREATE TABLE IF NOT EXISTS `critere_categories` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `parent_id` int(11) DEFAULT NULL,
  `position` int(5) DEFAULT NULL,
  `nom` varchar(255) NOT NULL,
  `public` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=9 ;

--
-- Contenu de la table `critere_categories`
--

INSERT INTO `critere_categories` (`id`, `parent_id`, `position`, `nom`, `public`) VALUES
(1, NULL, 0, 'Mobilité graphique', 1),
(2, NULL, 1, 'Type d''emploi recherché', 1),
(3, NULL, 2, 'Chargé de clientèle', 0),
(5, 3, 0, 'Typologie de Clientèle', 0),
(6, NULL, NULL, 'Techniques acquises', 0);

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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=101 ;

--
-- Contenu de la table `critere_value`
--

INSERT INTO `critere_value` (`id`, `critere_id`, `fiche_id`, `value`) VALUES
(1, 8, 1, 'Autres : assurance crédit et crédits'),
(9, 8, 3, 'Autres : assurance crédit et crédits'),
(26, 1, 8, '1'),
(27, 2, 8, '1'),
(28, 7, 8, '1'),
(29, 3, 8, '1'),
(30, 6, 8, '1'),
(31, 5, 8, '1'),
(32, 8, 8, 'Autres : assurance crédit et crédits'),
(33, 1, 9, '1'),
(34, 2, 9, '1'),
(35, 7, 9, '1'),
(36, 3, 9, '1'),
(37, 6, 9, '1'),
(38, 5, 9, '1'),
(39, 8, 9, 'Autres : assurance crédit et crédits'),
(47, 1, 11, '1'),
(48, 2, 11, '1'),
(49, 3, 11, '1'),
(50, 5, 11, '1'),
(51, 8, 11, 'Autres : assurance crédit et crédits'),
(52, 1, 12, '1'),
(53, 3, 12, '1'),
(54, 6, 12, '1'),
(55, 5, 12, '1'),
(56, 8, 12, 'Gestion des assurances de voitures de prestige'),
(57, 1, 14, '1'),
(58, 3, 14, '1'),
(59, 6, 14, '1'),
(60, 5, 14, '1'),
(61, 8, 14, 'Gestion des assurances de voitures de prestige'),
(62, 2, 17, '1'),
(63, 7, 17, '1'),
(64, 3, 17, '1'),
(65, 8, 17, 'Autres : assurance crédit et crédits'),
(66, 8, 21, 'Autres : assurance crédit et crédits'),
(67, 2, 28, '1'),
(68, 7, 28, '1'),
(69, 3, 28, '1'),
(70, 8, 28, 'Autres : assurance crédit et crédits'),
(71, 2, 29, '1'),
(72, 7, 29, '1'),
(73, 3, 29, '1'),
(74, 8, 29, 'Autres : assurance crédit et crédits'),
(75, 2, 30, '1'),
(76, 7, 30, '1'),
(77, 3, 30, '1'),
(78, 8, 30, 'Autres : assurance crédit et crédits'),
(79, 2, 31, '1'),
(80, 7, 31, '1'),
(81, 3, 31, '1'),
(82, 8, 31, 'Autres : assurance crédit et crédits'),
(83, 1, 32, '1'),
(84, 3, 32, '1'),
(85, 6, 32, '1'),
(86, 5, 32, '1'),
(87, 8, 32, 'test1'),
(88, 1, 34, '1'),
(89, 2, 34, '1'),
(90, 3, 34, '1'),
(91, 6, 34, '1'),
(92, 8, 34, 'Autres : assurance crédit et crédits'),
(93, 8, 41, 'Autres : assurance crédit et crédits'),
(94, 1, 42, '1'),
(95, 5, 42, '1'),
(96, 8, 42, 'Autres : assurance crédit et crédits'),
(97, 2, 43, '1'),
(98, 3, 43, '1'),
(99, 8, 43, 'Autres : assurance crédit et crédits');

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
  PRIMARY KEY (`id`),
  UNIQUE KEY `email_2` (`email`),
  KEY `email` (`email`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=47 ;

--
-- Contenu de la table `fiches`
--

INSERT INTO `fiches` (`id`, `statut`, `auteur`, `nom`, `prenom`, `adresse`, `code_postal`, `ville`, `portable`, `fixe`, `email`, `date_naissance`, `message`, `pdf`, `exp`) VALUES
(1, 'new', 'anonyme', 'Bobby', 'Joe', '44 rue', '44000', 'Nantes', '0616974929', '0616974929', 'bobby@gmail.com', '1991-01-01', 'Salut', '', 0),
(3, 'validated', 'anonyme', 'Alain ', 'Bernard', '87 rue des eglises', '13000', 'Marseille', '0210201020', '0265789878', 'tests@gmail.com', '2011-03-02', 'Essai tests', '', 0),
(8, 'validated', 'anonyme', 'Dalibard', 'Marc', '15 rue du père Noël', '99999', 'Mont Blanc', '0123456789', '0123456789', 'pere.noel@gmail.com', '1910-01-01', 'babedi babeda', '', 1),
(9, 'validated', 'anonyme', 'Cooper', 'Shedonl', 'route de Pasadena', '00000', 'PASADENA', '0909090909', '0808080808', 'cs@cs.fr', '2012-01-01', 'message de test', '', 1),
(11, 'validated', 'anonyme', 'Dutest', 'Michel', '5 rue du web', '35000', 'Rennes', '0789568956', '0663549487', 'michou.t@aol.com', '1959-12-31', '', '', 1),
(12, 'validated', 'anonyme', 'Lanvin', 'William', '2, rue des champs élysées', '75000', 'Paris', '0606000006', '0101000001', 'williamlanvinparis@gmail.com', '1980-06-04', 'Très motivé', '', 1),
(14, 'validated', 'anonyme', 'Lanvin', 'William', '2, rue des champs élysées', '75000', 'Paris', '0606000006', '0101000001', 'williamlanvinparis75@gmail.com', '1980-06-04', 'Très motivé', '', 1),
(17, 'validated', 'anonyme', 'ROBERT ', 'Marcel', '8 rue des etoile', '45000', 'Orleans', '12534678', '12345689', 'Valval@gmail.com', '2006-08-16', 'Tests message', '', 0),
(21, 'validated', 'anonyme', 'Nayme', 'Paul', '7 chemin du net', '49000', 'Angers', '08050407009', '0908070804', 'naymep@free.fr', '1959-12-31', '', '', 0),
(28, 'validated', 'anonyme', 'GALLOIS ', 'simone', '8 all�e des �toiles', '45000', 'Orleans', '12534678', '12345689', 'Valval1@gmail.com', '2006-08-16', 'Tests message', NULL, 0),
(29, 'validated', 'anonyme', 'ROBERT ', 'Marcel', '8 rue des etoile', '45000', 'Orleans', '012534678', '012345689', 'Tests1@gmail.com', '2006-08-16', 'Tests message', NULL, 0),
(30, 'validated', 'anonyme', 'GALLOIS ', 'simone', '8 all�e des �toiles', '45000', 'Orleans', '012534678', '012345689', 'Tests2@gmail.com', '2006-08-16', 'Tests message', NULL, 0),
(31, 'validated', 'anonyme', 'GALLOIS ', 'simone', '8 all�e des �toiles', '45000', 'Orleans', '012534678', '', 'Test32@gmail.com', '2006-08-16', 'Tests message', NULL, 0),
(32, 'validated', 'anonyme', 'Laure', 'Blandin', '5, rue des �toiles', '44000', 'Nantes', '600000000', '200000000', 'laure.blandin@gmail.com', '1980-06-04', 'Très motivé', NULL, 1),
(34, 'validated', 'anonyme', 'Bartowski', 'Chuck', 'rue de burbank', '43224', 'BURBANK', '0404040404', '0303030303', 'cbcb@yahoo.fr', '2012-01-01', 'test de message', '', 0),
(41, 'validated', 'anonyme', 'Nayme', 'Paul', '7 chemin du net', '49000', 'Angers', '08050407009', '0908070804', 'naymep1@free.fr', '1959-12-31', '', '', 0),
(42, 'validated', 'anonyme', 'Mal', 'Eleanor', '45 rue du commerce', '85000', 'La Roche sur Yon', '08058407009', '0908070885', 'emal1@wanadoo.fr', '1959-12-31', '', '', 1),
(43, 'validated', 'anonyme', 'Henry', 'Charles', '12 square des vents', '44000', 'Nantes', '08050407777', '0908070877', 'charlesh1@gmail.com', '1959-12-31', '', '', 0);

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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=21 ;

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
(9, 'Informations de contact', '<p>Emné FAKHRY<br>\r\n4, rue de l’Héronnière<br>\r\n44000 Nantes<br>\r\n<strong>Mail</strong>&nbsp;: rg-paysloire@agea.fr<br>\r\n<strong>Portable</strong>&nbsp;: 06 58 69 00 73<br>\r\n<strong>Fax</strong>&nbsp;: 02 40 69 81 14</p>', 'informations-de-contact', 8),
(18, 'A la une, c''est super', 'Ouais on est là dans le bruissement de chambre t''as uv', 'a-la-une-c-est-super', 31),
(20, 'Bruissement numéro 1', 'Superbe bruissement', '', 31);

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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

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
  ADD CONSTRAINT `critere_value_ibfk_2` FOREIGN KEY (`critere_id`) REFERENCES `criteres` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `critere_value_ibfk_1` FOREIGN KEY (`fiche_id`) REFERENCES `fiches` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `posts`
--
ALTER TABLE `posts`
  ADD CONSTRAINT `posts_ibfk_1` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
