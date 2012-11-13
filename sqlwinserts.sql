-- phpMyAdmin SQL Dump
-- version 3.3.10
-- http://www.phpmyadmin.net
--
-- Serveur: localhost
-- Généré le : Mar 13 Novembre 2012 à 10:20
-- Version du serveur: 5.0.44
-- Version de PHP: 5.2.5-pl1-gentoo
CREATE DATABASE legrand4   DEFAULT CHARACTER SET utf8 DEFAULT COLLATE utf8_general_ci;

USE legrand4;

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de données: `legrand4`
--

-- --------------------------------------------------------

--
-- Structure de la table `avis_fiches`
--

CREATE TABLE IF NOT EXISTS `avis_fiches` (
  `id` int(11) NOT NULL auto_increment,
  `texte` text NOT NULL,
  `fiche_id` int(11) NOT NULL,
  `created_at` datetime NOT NULL,
  `edited_at` datetime NOT NULL,
  PRIMARY KEY  (`id`),
  KEY `fiches_ibfk_1` (`fiche_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

--
-- Contenu de la table `avis_fiches`
--


-- --------------------------------------------------------

--
-- Structure de la table `categories`
--

CREATE TABLE IF NOT EXISTS `categories` (
  `id` int(11) NOT NULL auto_increment,
  `parent_id` int(11) default NULL,
  `slug` varchar(255) NOT NULL,
  `nom` varchar(255) NOT NULL,
  PRIMARY KEY  (`id`),
  UNIQUE KEY `nom` (`nom`),
  KEY `parent_id` (`parent_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=36 ;

--
-- Contenu de la table `categories`
--

INSERT INTO `categories` (`id`, `parent_id`, `slug`, `nom`) VALUES
(1, NULL, 'actualites', 'Actualités'),
(4, NULL, 'a-la-une', 'A la une'),
(5, NULL, 'texte-recrutement', 'Texte recrutement'),
(6, 1, 'actualites-bretagne', 'Actualités Bretagne'),
(7, 1, 'pays-de-la-loire', 'Actualités Pays de la Loire'),
(8, NULL, 'informations-de-contact', 'Informations de contact'),
(31, NULL, 'bruissements', 'Bruissements'),
(32, NULL, 'actions', 'Actions'),
(33, 32, 'bretagne', 'Bretagne'),
(34, 32, 'pays-de-la-loire', 'Pays de la Loire'),
(35, 32, 'nos-actions', 'Nos actions');

-- --------------------------------------------------------

--
-- Structure de la table `contenus`
--

CREATE TABLE IF NOT EXISTS `contenus` (
  `id` int(11) NOT NULL auto_increment,
  `titre` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `contenu` text NOT NULL,
  `ordre` int(11) default NULL,
  PRIMARY KEY  (`id`),
  UNIQUE KEY `slug` (`slug`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=11 ;

--
-- Contenu de la table `contenus`
--

INSERT INTO `contenus` (`id`, `titre`, `slug`, `contenu`, `ordre`) VALUES
(1, 'Qui sommes-nous ?', 'qui-sommes-nous', '<ul>\r\n <li style="text-align: justify;">\r\n   <strong>QUI EST L&rsquo;AGENT GÉNÉRAL D&rsquo;ASSURANCE&nbsp;?</strong></li>\r\n</ul>\r\n<p style="text-align: justify;">\r\n &nbsp;</p>\r\n<p style="text-align: justify;">\r\n  IL EST AVANT TOUT UN CHEF D&rsquo;ENTREPRISE INDÉPENDANT.</p>\r\n<p style="text-align: justify;">\r\n &nbsp;</p>\r\n<p style="text-align: justify;">\r\n  Intermédiaire entre la compagnie d&rsquo;assurance qu&rsquo;il représente et ses clients, sa mission principale est de couvrir les besoins de ces derniers.</p>\r\n<p style="text-align: justify;">\r\n Dans l&rsquo;intérêt général, il propose donc une gamme complète de produits et services adaptés.</p>\r\n<p style="text-align: justify;">\r\n &nbsp;</p>\r\n<p style="text-align: justify;">\r\n  Être agent général c&rsquo;est :</p>\r\n<p style="text-align: justify;">\r\n  &nbsp;- Être un entrepreneur responsable.</p>\r\n<p style="text-align: justify;">\r\n &nbsp;- Être un professionnel qui, par ses compétences, apporte des garanties idéales à son client.</p>\r\n<p style="text-align: justify;">\r\n &nbsp;- Être un manager soucieux du développement de son entreprise.</p>\r\n<p style="text-align: justify;">\r\n  &nbsp;</p>\r\n<p style="text-align: justify;">\r\n  C&rsquo;est pourquoi l&rsquo;agent général d&rsquo;assurance est un professionnel de confiance et :</p>\r\n<p style="text-align: justify;">\r\n &nbsp;</p>\r\n<p style="text-align: justify;">\r\n  - de PROXIMITÉ : il est impliqué dans la vie locale, conaît son environnement, tout ceci dans le but d&rsquo;apporter une expertise des plus adaptées à chacun. On compte sur notre territoire 1 agent pour 4725 habitants.</p>\r\n<p style="text-align: justify;">\r\n - à l&rsquo;ÉCOUTE : il sait être présent lorsque son assuré a besoin de lui, notamment en cas de sinistre.</p>\r\n<p style="text-align: justify;">\r\n - fort de CONSEILS : il connaît et sait anticiper les préoccupations personnelles et professionnelles de ses assurés, et leur apporte un conseil toujours plus approrié.</p>\r\n<p style="text-align: justify;">\r\n  &nbsp;</p>\r\n<p style="text-align: justify;">\r\n  &nbsp;</p>\r\n<p style="text-align: justify;">\r\n  <strong>&laquo; À CHAQUE ASSURÉ SA SITUATION, DONC À CHAQUE ASSURÉ SON CONTRAT&raquo;</strong></p>\r\n<p style="text-align: justify;">\r\n  &nbsp;</p>\r\n<p style="text-align: justify;">\r\n  &nbsp;</p>\r\n<p style="text-align: justify;">\r\n  &nbsp;</p>\r\n<ul>\r\n  <li style="text-align: justify;">\r\n   <strong>QU&rsquo;EST AGEA ?</strong></li>\r\n</ul>\r\n<p style="margin-left: 66pt; text-align: justify;">\r\n &nbsp;</p>\r\n<p style="text-align: justify;">\r\n  AGEA c&rsquo;est la FÉDÉRATION NATIONALE DES SYNDICATS D&rsquo;AGENTS GÉNÉRAUX D&rsquo;ASSURANCE.</p>\r\n<p style="text-align: justify;">\r\n &nbsp;</p>\r\n<p style="text-align: justify;">\r\n  Elle rassemble 14 syndicats de sociétés d&rsquo;assurance.</p>\r\n<p style="text-align: justify;">\r\n  La fédération s&rsquo;organise en chambres régionales et départementales.</p>\r\n<p style="text-align: justify;">\r\n Chaque région a son plan d&rsquo;actions.</p>\r\n<p style="text-align: justify;">\r\n &nbsp;</p>\r\n<p style="text-align: justify;">\r\n  <strong>LA CHAMBRE DES PAYS DE LA LOIRE</strong></p>\r\n<p style="text-align: justify;">\r\n  4 rue de l&rsquo;héronnière</p>\r\n<p style="text-align: justify;">\r\n 44000 NANTES</p>\r\n<p style="text-align: justify;">\r\n  02 40 69 51 10</p>\r\n<p style="text-align: justify;">\r\n  assurances.legrand@orange.fr</p>\r\n<p style="text-align: justify;">\r\n  &nbsp;</p>\r\n<p style="text-align: justify;">\r\n  <strong>COMPOSITION DU BUREAU</strong></p>\r\n<p style="text-align: justify;">\r\n  - Président : Yves-Alain LEGRAND</p>\r\n<p style="text-align: justify;">\r\n  - Président adjoint et président AGEA 49 : Fernando GONCAVLES</p>\r\n<p style="text-align: justify;">\r\n - Président AGEA 44 : Bruno ROUILLON</p>\r\n<p style="text-align: justify;">\r\n  - Président AGEA 53 : Bruno JUBIN</p>\r\n<p style="text-align: justify;">\r\n - Président AGEA 72 : Xavier BERTRAND</p>\r\n<p style="text-align: justify;">\r\n - Président AGEA 85 : Amédée DUPOND</p>\r\n<p style="text-align: justify;">\r\n - Conseillers du président : Joël BERT, Dominique ROGER</p>\r\n<p style="text-align: justify;">\r\n - Secrétaire : Christophe BARBIEUX</p>\r\n<p style="text-align: justify;">\r\n  - Trésorier de région : Gonzague de CASLOU</p>\r\n<p style="text-align: justify;">\r\n  - Syndic : Laurent ROUILLIER</p>\r\n<p style="text-align: justify;">\r\n  - Délégué aux nouveaux agents (DNA) : Jean-Emmanuel GOUIN</p>\r\n<p style="text-align: justify;">\r\n - Délégué pédagogique régional (DPR) : Jean-Louis LE BRIS</p>\r\n<p style="text-align: justify;">\r\n - Délégué aux jeunes retraités : Joël BERT</p>\r\n<p style="text-align: justify;">\r\n  - Délégué fiscal : Pierre-Yves MERRIEN</p>\r\n<p style="text-align: justify;">\r\n  &nbsp;</p>\r\n<p style="text-align: justify;">\r\n  &nbsp;</p>\r\n<p style="text-align: justify;">\r\n  <strong>LA CHAMBRE DE LA BRETAGNE</strong></p>\r\n<p style="text-align: justify;">\r\n  9 rue Alain Fergent</p>\r\n<p style="text-align: justify;">\r\n 29260 LESNEVEN</p>\r\n<p style="text-align: justify;">\r\n  02 98 83 02 05</p>\r\n<p style="text-align: justify;">\r\n  rg-bretagne@agea.fr</p>\r\n<p style="text-align: justify;">\r\n &nbsp;</p>\r\n<p style="text-align: justify;">\r\n  <strong>COMPOSITION DU BUREAU</strong></p>\r\n<p style="text-align: justify;">\r\n  - Président : Jean-François DESCLEVES</p>\r\n<p style="text-align: justify;">\r\n - Président adjoint : Sylvie MANACH</p>\r\n<p style="text-align: justify;">\r\n - Président AGEA 22 : Irène BONNY</p>\r\n<p style="text-align: justify;">\r\n - Président AGEA 29 : Éric ABALLEA</p>\r\n<p style="text-align: justify;">\r\n  - Président AGEA 35 : Hervé BEJA</p>\r\n<p style="text-align: justify;">\r\n  - Président AGEA 56 : Danuel GUIHARD</p>\r\n<p style="text-align: justify;">\r\n  - Trésorier de région : Michel HUARD</p>\r\n<p style="text-align: justify;">\r\n  - Délégué aux nouveaux agents (DNA) : Jean-François DESCLEVES</p>\r\n<p style="text-align: justify;">\r\n - Délégué pédagogique régional (DPR) : Yves TOMBETTE</p>\r\n<p style="text-align: justify;">\r\n  - Délégué fiscal : Philippe LEPRINCE</p>\r\n', 1),
(3, 'Espace Orientation Jeune', 'espace-orientation-jeune', '<p>\r\n  A venir</p>\r\n', 3),
(4, 'Adhérer', 'adhrer', '<p style="text-align: justify;">\r\n  <strong>Aujourd&rsquo;hui, 62% des agents généraux d&rsquo;assurance sont adhérents AGEA.</strong></p>\r\n<p style="text-align: justify;">\r\n  &nbsp;</p>\r\n<p style="text-align: justify;">\r\n  ADHÉRER, C&rsquo;EST :</p>\r\n<p style="text-align: justify;">\r\n  - Bénéficier des services d&rsquo;information et de conseils liés à l&rsquo;activité professionnelle.</p>\r\n<p style="text-align: justify;">\r\n - Participer au renforcement de la profession et à la défense de ses intérêts.</p>\r\n<p style="text-align: justify;">\r\n  - Être garanti par une assurance de protection juridique.</p>\r\n<p style="text-align: justify;">\r\n &nbsp;</p>\r\n<p style="text-align: justify;">\r\n  <strong>LES PRINCIPALES MISSIONS D&rsquo;AGEA : CONSEILLER, INFORMER, FORMER</strong></p>\r\n<p style="text-align: justify;">\r\n &nbsp;</p>\r\n<p style="text-align: justify;">\r\n  &nbsp;</p>\r\n<p style="text-align: justify;">\r\n  ÊTRE ADHÉRENT AGEA C&rsquo;EST :</p>\r\n<p style="text-align: justify;">\r\n  &nbsp;- Avoir une équipe de juristes spécialisés dans le domaine juridique, social et fiscal à sa disposition.</p>\r\n<p style="text-align: justify;">\r\n  &nbsp;- Avoir un contrat de protection juridique souscrit par AGEA à son bénéfice.</p>\r\n<p style="text-align: justify;">\r\n  &nbsp;- Avoir un accès à une offre formation permettant de développer ses compétences dans différents domaines.</p>\r\n<p style="text-align: justify;">\r\n &nbsp;- Avoir accès à une offre cap compétence conçue sur mesure pour développer le niveau de compétences de ses salariés.</p>\r\n<p style="text-align: justify;">\r\n  &nbsp;- Recevoir une information régulière et en temps réel par le biais de la lettre AGEA, la lettre électronique hebdomadaire et le site internet agea.fr.</p>\r\n<p style="text-align: justify;">\r\n  &nbsp;- Recevoir un accueil spécifique lorsque l&rsquo;on est nouvel agent.</p>\r\n<p style="text-align: justify;">\r\n &nbsp;- Bénéficier d&rsquo;avantages adhérents avec des conditions préférentielles auprès de différents prestataires (téléphonie, logiciels, fournitures...).</p>\r\n<p style="text-align: justify;">\r\n &nbsp;</p>\r\n<p style="text-align: justify;">\r\n  &nbsp;</p>\r\n<p style="text-align: justify;">\r\n  C&rsquo;EST AUSSI PARTICIPER À DES TEMPS FORTS EN RÉGION :</p>\r\n<p style="text-align: justify;">\r\n  - Le congrès régional, réunissant tous les agents de la région une fois par an pour faire un point, c&rsquo;est également l&rsquo;occasion de faire intervenir des conférenciers.</p>\r\n<p style="text-align: justify;">\r\n - Le conseil de région, réunissant les membres du bureau qui a lieu si besoin s&rsquo;en fait ressentir.</p>\r\n<p style="text-align: justify;">\r\n  - Des rencontres débats sur des sujets touchants les agents généraux</p>\r\n<p style="text-align: justify;">\r\n  &nbsp;</p>\r\n<p style="text-align: justify;">\r\n  &nbsp;</p>\r\n<p style="text-align: justify;">\r\n  La cotisation :</p>\r\n<p style="text-align: justify;">\r\n 1ère année : 325 &euro; proratisés à partir du 1er février</p>\r\n<p style="text-align: justify;">\r\n  2ème année : 430&euro;</p>\r\n<p style="text-align: justify;">\r\n  3ème année : commissions annualisées -30%</p>\r\n<p style="text-align: justify;">\r\n 4ème année : commissions annualisées -10%</p>\r\n<p style="text-align: justify;">\r\n Par la suite : 3,70 pour 1000 sur les commissions annualisées</p>\r\n<p style="text-align: justify;">\r\n &nbsp;</p>\r\n<p style="text-align: justify;">\r\n  NB : Le tarif d&rsquo;adhésion est plafonné à 3150 &euro; même en cas d&rsquo;association</p>\r\n<p style="text-align: justify;">\r\n &nbsp;</p>\r\n<p style="text-align: justify;">\r\n  &nbsp;</p>\r\n<p style="text-align: justify;">\r\n  Comment se répartie-t-elle ?</p>\r\n<p style="text-align: justify;">\r\n  &nbsp;</p>\r\n<p style="text-align: justify;">\r\n  AGEA Fédération Nationale : finance les structures de la fédération,&nbsp; l&rsquo;ensemble des juristes, des fiscalistes, la protection juridique...</p>\r\n<p style="text-align: justify;">\r\n Syndicat Compagnie : finance les structures de la compagnie à l&rsquo;année, les congrès...</p>\r\n<p style="text-align: justify;">\r\n AGEA Région : finance les actions régionales et contribue à réaliser le plan d&rsquo;action de la région.</p>\r\n<p style="text-align: justify;">\r\n &nbsp;</p>\r\n<p style="text-align: justify;">\r\n  &nbsp;</p>\r\n<p style="text-align: justify;">\r\n  <strong><u>AJOUTER&nbsp;: répartition de la cotisation en %</u></strong></p>\r\n<p style="text-align: justify;">\r\n  &nbsp;</p>\r\n<p style="text-align: justify;">\r\n  &nbsp;</p>\r\n<p style="text-align: justify;">\r\n  Pour plus d&rsquo;informations :</p>\r\n<p style="text-align: justify;">\r\n  - Contactez Serge FRIEDMAN ou Anaïs LEROY, service gestion des adhérents : 01.44.01.18.71 / 01.44.01.18.70</p>\r\n<p style="text-align: justify;">\r\n  - Rendez vous sur www.agea.fr, rubrique &laquo;nous rejoindre&raquo;, &laquo;adhérer pourquoi comment?&raquo;</p>\r\n<p style="text-align: justify;">\r\n &nbsp;</p>\r\n<p style="text-align: justify;">\r\n  À NOTER :</p>\r\n<p style="text-align: justify;">\r\n C&rsquo;est l&rsquo;adhésion AGEA qui permet d&rsquo;adhérer conjointement au syndicat de compagnie.</p>\r\n', 2),
(10, 'Mentions légales', 'mentions-legales', 'contenu', -1);

-- --------------------------------------------------------

--
-- Structure de la table `criteres`
--

CREATE TABLE IF NOT EXISTS `criteres` (
  `id` int(11) NOT NULL auto_increment,
  `type` varchar(20) NOT NULL,
  `position` int(5) default NULL,
  `nom` varchar(255) NOT NULL,
  `critere_category_id` int(11) NOT NULL,
  PRIMARY KEY  (`id`),
  KEY `criteres_ibfk_1` (`critere_category_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=75 ;

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
(9, 'checkbox', NULL, '49', 1),
(10, 'checkbox', NULL, '85', 1),
(11, 'checkbox', NULL, '72', 1),
(12, 'checkbox', NULL, '53', 1),
(13, 'checkbox', NULL, '22', 1),
(14, 'checkbox', NULL, '29', 1),
(15, 'checkbox', NULL, 'CDI', 10),
(16, 'checkbox', NULL, 'CDD', 10),
(17, 'checkbox', NULL, 'Stage', 10),
(18, 'checkbox', NULL, 'Emploi saisonnier', 10),
(20, 'checkbox', NULL, 'Autre', 2),
(21, 'checkbox', NULL, 'Contrat d''alternance', 10),
(22, 'checkbox', NULL, 'Professionnel', 5),
(23, 'checkbox', NULL, 'Entreprise', 5),
(24, 'checkbox', NULL, 'Gestion', 11),
(25, 'checkbox', NULL, 'Souscription', 11),
(26, 'checkbox', NULL, 'Auto/Moto', 12),
(27, 'checkbox', NULL, 'Habitation', 12),
(28, 'checkbox', NULL, 'Santé', 12),
(29, 'checkbox', NULL, 'Epargne & Retraite', 12),
(30, 'checkbox', NULL, 'Prévoyance', 12),
(31, 'checkbox', NULL, 'Banque', 12),
(32, 'checkbox', NULL, 'Navigation/Plaisance', 12),
(33, 'checkbox', NULL, 'Multirisques', 12),
(34, 'checkbox', NULL, 'Prévoyance TNS', 12),
(35, 'checkbox', NULL, 'Collective', 12),
(36, 'checkbox', NULL, 'Entreprise', 12),
(37, 'checkbox', NULL, 'Agricole', 12),
(38, 'checkbox', NULL, 'Construction', 12),
(40, 'checkbox', NULL, 'Auto/Moto', 13),
(41, 'checkbox', NULL, 'Habitation', 13),
(42, 'checkbox', NULL, 'Multirisques professionnelles', 13),
(43, 'checkbox', NULL, 'Entreprise', 13),
(44, 'checkbox', NULL, 'RC', 13),
(45, 'textarea', NULL, 'Autre', 12),
(46, 'textarea', NULL, 'Autre', 13),
(47, 'checkbox', NULL, 'Ouverture', 13),
(48, 'checkbox', NULL, 'Gestion', 13),
(49, 'checkbox', NULL, 'Réglement', 13),
(50, 'checkbox', NULL, 'Commercial guichet', 14),
(51, 'checkbox', NULL, 'Vente téléphonique', 14),
(52, 'checkbox', NULL, 'Prospection/Phoning', 14),
(53, 'checkbox', NULL, 'Encaissement', 15),
(54, 'checkbox', NULL, 'Chèque de réglement', 15),
(55, 'checkbox', NULL, 'Quittancement et rappels', 15),
(56, 'checkbox', NULL, 'Comptabilité générale', 15),
(57, 'checkbox', NULL, 'Sédentaire', 17),
(58, 'checkbox', NULL, 'Extérieur', 17),
(59, 'checkbox', NULL, '56', 1),
(61, 'checkbox', NULL, 'Particulier', 17),
(62, 'checkbox', NULL, 'Professionnelle', 17),
(63, 'checkbox', NULL, 'Entreprise', 17),
(64, 'checkbox', NULL, 'IARD', 17),
(65, 'checkbox', NULL, 'Collective', 17),
(66, 'checkbox', NULL, 'Assurances de personnes', 17),
(67, 'checkbox', NULL, 'Vie', 17),
(68, 'checkbox', NULL, 'Patrimoine', 17),
(69, 'textarea', NULL, 'Encadrement et animation du personnel', 16),
(70, 'textarea', NULL, 'Représentation de l''agence', 16),
(71, 'textarea', NULL, 'Développement commercial', 16),
(72, 'textarea', NULL, 'Expertise technique', 16),
(73, 'textarea', NULL, 'Autres compétences du candidat', 6),
(74, 'textarea', NULL, 'Avis du RH', 6);

-- --------------------------------------------------------

--
-- Structure de la table `critere_categories`
--

CREATE TABLE IF NOT EXISTS `critere_categories` (
  `id` int(11) NOT NULL auto_increment,
  `parent_id` int(11) default NULL,
  `position` int(5) default NULL,
  `nom` varchar(255) NOT NULL,
  `public` tinyint(1) NOT NULL default '0',
  PRIMARY KEY  (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=18 ;

--
-- Contenu de la table `critere_categories`
--

INSERT INTO `critere_categories` (`id`, `parent_id`, `position`, `nom`, `public`) VALUES
(1, NULL, 0, 'Mobilité géographique', 1),
(2, NULL, 1, 'Type d''emploi recherché', 1),
(5, 6, 0, 'Typologie de Clientèle', 0),
(6, NULL, NULL, 'Techniques acquises', 0),
(10, NULL, NULL, 'Type de contrat recherché', 1),
(11, 6, NULL, 'Typologie d''activité', 0),
(12, 6, NULL, 'Typologie de produits', 0),
(13, 6, NULL, 'Gesion des sinistres', 0),
(14, 6, NULL, 'Pratiques commerciales', 0),
(15, 6, NULL, 'Comptabilité', 0),
(16, NULL, NULL, 'Attaché d''agence', 0),
(17, NULL, NULL, 'Chargé de clientèle', 0);

-- --------------------------------------------------------

--
-- Structure de la table `critere_value`
--

CREATE TABLE IF NOT EXISTS `critere_value` (
  `id` int(11) NOT NULL auto_increment,
  `critere_id` int(11) NOT NULL,
  `fiche_id` int(11) NOT NULL,
  `value` varchar(255) NOT NULL,
  PRIMARY KEY  (`id`),
  KEY `fiches_ibfk_2` (`fiche_id`),
  KEY `criteres_ibfk_2` (`critere_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=377 ;

--
-- Contenu de la table `critere_value`
--

INSERT INTO `critere_value` (`id`, `critere_id`, `fiche_id`, `value`) VALUES
(74, 24, 60, '1'),
(75, 38, 60, '1'),
(76, 30, 60, '1'),
(77, 34, 60, '1'),
(78, 41, 60, '1'),
(79, 42, 60, '1'),
(80, 48, 60, '1'),
(81, 49, 60, '1'),
(82, 52, 60, '1'),
(83, 53, 60, '1'),
(84, 54, 60, '1'),
(85, 5, 60, '1'),
(86, 16, 60, '1'),
(87, 62, 60, '1'),
(88, 63, 60, '1'),
(89, 67, 60, '1'),
(90, 10, 60, '1'),
(91, 14, 60, '1'),
(92, 1, 60, '1'),
(93, 20, 60, '1'),
(94, 3, 60, '1'),
(95, 74, 60, 'pas mal'),
(96, 73, 60, 'motivé'),
(97, 45, 60, 'faible en espagnol'),
(98, 46, 60, 'parle 12 langues'),
(99, 69, 60, 'parfait'),
(100, 70, 60, 'jamais'),
(101, 71, 60, 'souvent'),
(102, 72, 60, 'parfois'),
(106, 21, 62, '1'),
(107, 13, 62, '1'),
(108, 6, 62, '1'),
(109, 3, 62, '1'),
(110, 15, 61, '1'),
(111, 2, 61, '1'),
(112, 3, 61, '1'),
(344, 24, 63, '1'),
(345, 25, 63, '1'),
(346, 26, 63, '1'),
(347, 27, 63, '1'),
(348, 28, 63, '1'),
(349, 29, 63, '1'),
(350, 30, 63, '1'),
(351, 31, 63, '1'),
(352, 50, 63, '1'),
(353, 51, 63, '1'),
(354, 52, 63, '1'),
(355, 53, 63, '1'),
(356, 22, 63, '1'),
(357, 5, 63, '1'),
(358, 15, 63, '1'),
(359, 58, 63, '1'),
(360, 61, 63, '1'),
(361, 62, 63, '1'),
(362, 64, 63, '1'),
(363, 67, 63, '1'),
(364, 68, 63, '1'),
(365, 57, 63, '1'),
(366, 9, 63, '1'),
(367, 1, 63, '1'),
(368, 6, 63, '1'),
(369, 74, 63, 'Avis du RH\r\nAncienne salarié du réseau AXA, elle a négocié son licenciement parce que la nouvelle politique commerciale ne correspondait pas à ce qu’on devait attendre d’un chargé clientèle (plus de chiffres, moins de conseils, incitation à proposer des p'),
(370, 73, 63, 'Autres compétences du candidat'),
(371, 45, 63, 'Autre'),
(372, 46, 63, 'Autre'),
(373, 69, 63, 'Encadrement et animation du personnel'),
(374, 70, 63, 'Représentation de l''agence'),
(375, 71, 63, 'Développement commercial'),
(376, 72, 63, 'Expertise technique');

-- --------------------------------------------------------

--
-- Structure de la table `fiches`
--

CREATE TABLE IF NOT EXISTS `fiches` (
  `id` int(11) NOT NULL auto_increment,
  `statut` varchar(10) NOT NULL default 'new',
  `auteur` varchar(20) NOT NULL default 'anonyme',
  `nom` varchar(255) NOT NULL,
  `prenom` varchar(255) NOT NULL,
  `adresse` varchar(255) NOT NULL,
  `code_postal` varchar(255) NOT NULL,
  `ville` varchar(255) NOT NULL,
  `portable` varchar(20) NOT NULL,
  `fixe` varchar(20) default NULL,
  `email` varchar(255) NOT NULL,
  `date_naissance` date default NULL,
  `message` tinytext,
  `pdf` varchar(255) default NULL,
  `exp` int(1) default NULL,
  PRIMARY KEY  (`id`),
  UNIQUE KEY `email_2` (`email`),
  KEY `email` (`email`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=64 ;

--
-- Contenu de la table `fiches`
--

INSERT INTO `fiches` (`id`, `statut`, `auteur`, `nom`, `prenom`, `adresse`, `code_postal`, `ville`, `portable`, `fixe`, `email`, `date_naissance`, `message`, `pdf`, `exp`) VALUES
(57, 'validated', 'anonyme', 'William', 'Janeau', '4 rue de l''héronnière', '44000', 'Nantes', '0600000000', '0240695110', 'williamjaneau@gmail.com', '1989-02-24', '<p>\r\n  Très motivé</p>\r\n', 'test-de-logique-pdf0-58167100-1352370364.pdf', 1),
(58, 'rejected', 'anonyme', 'test', 'test', 'test', '40000', 'test', '0659800000', '', 'test@test.com', '2012-01-01', 'test', NULL, 0),
(59, 'rejected', 'anonyme', 'test', 'test', 'test', '40000', 'test', '0659800000', '', 'test@test2.com', '2012-01-01', '<p>\r\n test</p>\r\n', NULL, 0),
(60, 'validated', 'anonyme', 'Paris', 'Lanvin', '75 rue des champs', '75000', 'Paris', '0606000006', '0101000001', 'lanvinlanvinparisparis@lanvinparis.fr', '1976-01-01', '<p>\r\n  candidat</p>\r\n', '4im2-carte-tudiant-wj-pdf0-38677600-1352455957.pdf', 1),
(61, 'rejected', 'anonyme', 'Lanvin', 'William', '2, rue des champs élysées', '75000', 'Paris', '0606000006', '0101000001', 'williamlanvinparis75@gmail.com', '1980-01-01', '', NULL, 1),
(62, 'new', 'anonyme', 'Lanvin', 'Janeau', '2, rue des champs élysées', '44000', 'Nantes', '0606000006', '0101000001', 'williamjaneauazerty@gmail.com', '2012-01-01', '', '4im2-carte-tudiant-wj-pdf0-00041900-1352460839.pdf', 1),
(63, 'validated', 'anonyme', 'BEILVERT', 'Rachel', '55, avenue Léon Gambetta', '49300', 'Chollet', '0674638975', '', 'rachel.belvert@orange.fr', '2012-01-01', '<p>\r\n <strong><u>Zone de travail souhaité:</u></strong> Nantes et alentours, Chollet et alentoures, et tout le 49.</p>\r\n', '44-49-beilvert-rachel-pdf0-76756400-1352481520.pdf', 1);

-- --------------------------------------------------------

--
-- Structure de la table `groups`
--

CREATE TABLE IF NOT EXISTS `groups` (
  `id` int(11) NOT NULL auto_increment,
  `nom` varchar(100) NOT NULL,
  PRIMARY KEY  (`id`)
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
  `id` int(11) NOT NULL auto_increment,
  `nom` varchar(255) NOT NULL,
  `link` varchar(255) default NULL,
  `pdf` varchar(255) NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Contenu de la table `partenaires`
--

INSERT INTO `partenaires` (`id`, `nom`, `link`, `pdf`) VALUES
(1, 'assurances', 'www.google.fr', '4im2-carte-tudiant-wj-pdf0-78518900-1352452876.pdf');

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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=21 ;

--
-- Contenu de la table `posts`
--

INSERT INTO `posts` (`id`, `titre`, `corps`, `slug`, `category_id`) VALUES
(1, 'Lancement du site inter-régional', '<p style="text-align: justify;">\r\n AGEA Pays de la Loire et AGEA Bretagne se sont unis pour faire de ce site un véritable outil de travail.&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</p>\r\n<p style="text-align: justify;">\r\n  AGEA Côtes Ouest regroupe plus de 1300 agents généraux d&#39;assurance qui emploient plus de 3500 collaborateurs. Face aux difficultés du marché de l&#39;empoi, face à la mobilité géographique en augmentation, nous avons souhaité faire de ce site, inter-régional, le point de rencontre entre les employeurs et leurs futurs collaborateurs.</p>\r\n<p style="text-align: justify;">\r\n  A travers ce site vous retrouverez aussi toute l&#39;actulaité de la profession, les actions menées par les agents généraux et trés prochainement l&#39;agent le plus proche chez vous.</p>\r\n<p style="text-align: justify;">\r\n &nbsp;</p>\r\n<p style="text-align: justify;">\r\n  &nbsp;</p>\r\n', 'c-super', 4),
(3, 'Les agents généraux recrutent', '<p style="text-align: justify;">\r\n  <strong>3500</strong> collaborateurs d&#39;agence répartis sur les Pays de la Loire et la Bretagne travaillent chez des agents généraux d&#39;assurance dans les domaines de la <strong>gestion</strong>, le <strong>commercial, </strong>l&#39;<strong>administration</strong> et le <strong>management</strong>.</p>\r\n<p style="text-align: justify;">\r\n  Ce sont autant d&#39;opportunités d&#39;emploi que vous nous offrons!</p>\r\n', 'les-agents-generaux-recrutent2', 5),
(9, 'Informations de contact', '<p>Emné FAKHRY<br>\r\n4, rue de l’Héronnière<br>\r\n44000 Nantes<br>\r\n<strong>Mail</strong>&nbsp;: rg-paysloire@agea.fr<br>\r\n<strong>Portable</strong>&nbsp;: 06 58 69 00 73<br>\r\n<strong>Fax</strong>&nbsp;: 02 40 69 81 14</p>', 'informations-de-contact', 8),
(11, 'Actualite 1', '<p>\r\n  test</p>\r\n', 'actualite-1', 6),
(12, 'Actualite 2', '<p>\r\n  test 2</p>\r\n', 'actualite-2', 7),
(13, 'Les objets volés', '<p>\r\n <strong>CAMPAGNE LANCÉE EN DÉCEMBRE 2011</strong></p>\r\n<p>\r\n  &nbsp;</p>\r\n<p>\r\n Sensible au bien être de ses concitoyens, AGEA Pays de la Loire s&rsquo;est associé à la gendarmerie départementale en Loire Atlantique en créant un site internet ayant pour but d&rsquo;attirer l&rsquo;attention sur le fait qu&rsquo;il est important de conserver des traces de nos objets personnels.</p>\r\n<p>\r\n  En effet, en cas de vol, des objets clairement identifiés sont plus faciles à retrouver. De même, une meilleure alimentation du fichier &quot;FOVES&quot; permettrait d&rsquo;identifier davantage d&rsquo;auteurs de vol et de receleurs d&rsquo;objets volés.</p>\r\n<p>\r\n  &nbsp;</p>\r\n<p>\r\n Un site web a été créé dans le cadre de cette action, pour le visiter :</p>\r\n<p>\r\n  <a href="http://www.objets-voles.fr"><strong>http://www.objets-voles.fr</strong></a></p>\r\n', 'les-objets-vols', 34),
(15, 'Comme un poisson dans l''eau', '<p>\r\n <strong>LES AGENTS GÉNÉRAUX D&rsquo;ASSURANCE DES PAYS DE LA LOIRE RELÈVENT LE CHALLENGE AVEC OLIVIA.</strong></p>\r\n<p>\r\n &nbsp;</p>\r\n<p>\r\n À l&rsquo;initiative de la Chambre de la Sarthe, nous avons conclu un partenariat avec Olivia LA HONDE qui s&rsquo;est lancée dans une belle aventure : la traversée de l&rsquo;Atlantique à l&rsquo;aviron en solitaire, sans assistance et sans escale, dans le cadre de la course Bouvet Guyane 2012.</p>\r\n<p>\r\n Il s&rsquo;agit de la troisième édition de cette course qui relie Dakar à Cayenne (Guyane), elle a rassemblé pour cette édition 23 rameurs à bord de canots strictement identiques et conçus pour cette traversée de 4700 km. Le départ a été donné dimanche 29 janvier 2012 à 10 heures.</p>\r\n<p>\r\n  Olivia LA HONDE, &laquo; notre rameuse &raquo; s&rsquo;est lancée pour 40 à 60 jours de navigation sur son canot de 8 m de long sur 1,60 m de large.</p>\r\n<p>\r\n Olivia est la seule femme de la course, parrainée par Gérard D&rsquo;ABOVILLE et Alain SOUCHON, elle est porteuse de toutes les valeurs de solidarité, de courage, de dépassement de soi, d&rsquo;émotion et d&rsquo;écologie.</p>\r\n<p>\r\n &nbsp;</p>\r\n<p>\r\n Ces valeurs que partagent les Agents Généraux d&rsquo;Assurance des Pays de la Loire, nous ont conduit à être aux côtés d&rsquo;Olivia et c&rsquo;est pourquoi nous l&rsquo;avons supportée tout au long de cette aventure.</p>\r\n<p>\r\n  &nbsp;</p>\r\n<p>\r\n Pour plus d&rsquo;informations :</p>\r\n<p>\r\n site web de la course : <a href="http://www.ramesguyane.com">http://www.ramesguyane.com</a></p>\r\n<p>\r\n  site web de l&rsquo;association d&rsquo;Olivia : <a href="http://www.commeunpoisson-asso.fr">http://www.commeunpoisson-asso.fr</a></p>\r\n', 'comme-un-poisson-dans-l-eau', 34),
(16, 'La voiture tonneau SASER/AGEA', '<p>\r\n  <strong>LA RÉGION PAYS DE LA LOIRE A DÉVELOPPÉ UN PARTENARIAT AVEC L&rsquo;ASSOCIATION SASER POUR LA PRÉVENTION ROUTIÈRE.</strong></p>\r\n<p>\r\n &nbsp;</p>\r\n<p>\r\n Dans ce cadre, la région a financé l&#39;acquisition d&#39;une voiture tonneau qui est utilisée dans de nombreux salons et manifestations.</p>\r\n<p>\r\n Dans le cadre du TOUR OPTIC 2000, la voiture tonneau SASSER/AGEA a par exemple été présente sur un stand informant des dangers de l&rsquo;alcool au volant dans les lieux suivants :</p>\r\n<p>\r\n -&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; parc d&rsquo;expositions de Beaune</p>\r\n<p>\r\n -&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Petit port d&rsquo;Aix les Bains</p>\r\n<p>\r\n -&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Stade Marcel Michelin de Clermont-Ferrand</p>\r\n<p>\r\n  -&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Esplanade des arènes de Nîmes</p>\r\n<p>\r\n  -&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Place Masséna à Nice</p>\r\n<p>\r\n &nbsp;</p>\r\n<p>\r\n Lien video de la voiture&nbsp;: <a href="http://www.youtube.com/watch?feature=player_embedded&amp;v=Qyd4ltt358Y">http://www.youtube.com/watch?feature=player_embedded&amp;v=Qyd4ltt358Y</a></p>\r\n<p>\r\n  &nbsp;</p>\r\n', 'la-voiture-tonneau-saser-agea', 34),
(17, 'Les tonnerres de Brest 2012', '<p>\r\n  Quatre ans après avoir largué les amarres, petits et grands voiliers sont de retour dans la cité du Ponant pour célébrer comme il se doit les 20 ans des fêtes maritimes.</p>\r\n<p>\r\n  &nbsp;</p>\r\n<p>\r\n AGEA Bretagne a donné à cette occasion aux agents généraux et leurs conjoints la possibilité exceptionnelle de participer, le lundi 16 juillet 2012, à une journée inoubliable sur un magnifique voilier, le Joanna Saturna, aux couleurs d&rsquo;AGEA Bretagne.</p>\r\n', 'les-tonnerres-de-brest-2012', 33),
(18, 'Arbre de Noël', '<p>\r\n  C&rsquo;est parce que les fêtes de fin d&rsquo;année sont des moments&nbsp; où l&rsquo;on aime se retrouver qu&rsquo;AGEA Bretagne organise chaque année pour les enfants des agents généraux d&rsquo;assurance de la région et leurs collaborateurs un arbre de Noël dans différentes villes.</p>\r\n<p>\r\n &nbsp;</p>\r\n<p>\r\n Au programme :</p>\r\n<p>\r\n - 1 spectacle</p>\r\n<p>\r\n  - 2 animations</p>\r\n<p>\r\n - Un cadeau pour les enfants</p>\r\n<p>\r\n - Goûter pour tous</p>\r\n<p>\r\n &nbsp;</p>\r\n<p>\r\n En 2011, cet évènement aura réuni pas moins de 346 participants dont 200 enfants.</p>\r\n', 'arbre-de-nol', 33),
(19, 'Les agents généraux s''affichent, septembre 2011', '<p>\r\n Dans le but d&rsquo;être reconnaissables mais également de communiquer leur professionnalisme, leur implication dans le métier, et également leur fierté de l&rsquo;exercer dans le respect de ses exigences les agents généraux d&rsquo;assurances se sont vu remettre par la AGEA Bretagne une plaque &laquo; Agent général d&rsquo;assurance AGEA &raquo; à fixer sur la devanture de leur agence.</p>\r\n<p>\r\n  &nbsp;</p>\r\n<p>\r\n Pour accompagner cette action, un concours photo a été mis en place avec pour participants les agents. Ces derniers devaient faire parvenir à la région une photo de la plaque une fois fixée sur les murs de leur agence. Les photos des plaques posées au sol et/ou non accrochées étaient exclues du tirage.</p>\r\n<p>\r\n  &nbsp;</p>\r\n<p>\r\n 3 agents ont alors été tirés au sort, le premier s&rsquo;est vu offrir un IPad, quant aux 2nd et 3ème, ils ont chacun reçu un IPod.</p>\r\n', 'les-agents-gnraux-s-affichent-septembre-2011', 33),
(20, 'bruissement 1', '<a href=''/app/webroot/bruissements/4im2-carte-tudiant-wj-pdf0-34030000-1352461209.pdf''>Télécharger le bruissement</a>', 'bruissement-1', 31);

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL auto_increment,
  `username` varchar(255) NOT NULL,
  `password` varchar(50) NOT NULL,
  `role` varchar(20) NOT NULL,
  PRIMARY KEY  (`id`),
  UNIQUE KEY `username` (`username`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ;

--
-- Contenu de la table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `role`) VALUES
(1, 'Admin', '035d9cd0f35e08faf59015dd18be6127fb00ce5f', 'admin'),
(4, 'Agent', '54513e7afdd4fac838f0c6499856c9473db766a5', 'agent');

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
