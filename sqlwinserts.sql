-- phpMyAdmin SQL Dump
-- version 3.4.5
-- http://www.phpmyadmin.net
--
-- Client: localhost
-- Généré le : Jeu 25 Octobre 2012 à 10:00
-- Version du serveur: 5.0.27
-- Version de PHP: 5.3.8

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
-- Structure de la table `posts`
--

CREATE TABLE IF NOT EXISTS `posts` (
  `id` int(11) NOT NULL auto_increment,
  `titre` varchar(255) NOT NULL,
  `corps` text NOT NULL,
  `slug` varchar(255) NOT NULL,
  `category_id` int(11) NOT NULL,
  PRIMARY KEY  (`id`),
  UNIQUE KEY `slug` (`slug`),
  KEY `posts_ibfk_1` (`category_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=10 ;

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

--
-- Contraintes pour les tables exportées
--

--
-- Contraintes pour la table `posts`
--
ALTER TABLE `posts`
  ADD CONSTRAINT `posts_ibfk_1` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
