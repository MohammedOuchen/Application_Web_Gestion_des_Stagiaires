-- phpMyAdmin SQL Dump
-- version 3.5.1
-- http://www.phpmyadmin.net
--
-- Client: localhost
-- Généré le: Mar 03 Mars 2020 à 21:57
-- Version du serveur: 5.5.24-log
-- Version de PHP: 5.4.3

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de données: `stage`
--

-- --------------------------------------------------------

--
-- Structure de la table `abscence`
--

CREATE TABLE IF NOT EXISTS `abscence` (
  `id_abscence` int(11) NOT NULL AUTO_INCREMENT,
  `date_abscence` date NOT NULL,
  `justification` varchar(40) NOT NULL,
  `cin` varchar(8) NOT NULL,
  PRIMARY KEY (`id_abscence`),
  KEY `cin` (`cin`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=17 ;

--
-- Contenu de la table `abscence`
--

INSERT INTO `abscence` (`id_abscence`, `date_abscence`, `justification`, `cin`) VALUES
(1, '0000-00-00', '111', '122'),
(2, '0000-00-00', 's', 'dd'),
(3, '0000-00-00', 'nn', 'nn'),
(4, '0000-00-00', '11', '1'),
(5, '0000-00-00', 'oui', 'cb123'),
(6, '2019-05-14', 's', 'dd'),
(7, '2019-05-10', 'non', 'CB123'),
(8, '2019-05-23', 'oui', 'cb123'),
(9, '2019-05-23', 'oui', 'cb123'),
(10, '2019-05-10', 'oui', 'cc'),
(11, '0000-00-00', 'non', 'CB123111'),
(12, '2019-05-17', 'oui', 'CB12322'),
(13, '2019-05-17', 'oui', 'CB12322'),
(14, '0000-00-00', 'non', 'cb123'),
(15, '0000-00-00', 'oui', 'CB123'),
(16, '0000-00-00', 'oui', 'CB123');

-- --------------------------------------------------------

--
-- Structure de la table `affectation`
--

CREATE TABLE IF NOT EXISTS `affectation` (
  `id_stage` int(11) NOT NULL,
  `cin` varchar(8) NOT NULL,
  `date_debut` date NOT NULL,
  `date_fin` date NOT NULL,
  `note` int(11) NOT NULL,
  KEY `id_stage` (`id_stage`,`cin`),
  KEY `id_stage_2` (`id_stage`),
  KEY `cin` (`cin`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `affectation`
--

INSERT INTO `affectation` (`id_stage`, `cin`, `date_debut`, `date_fin`, `note`) VALUES
(2, 'fa123', '2019-05-01', '2019-05-30', 15),
(2, 'CB123', '2019-05-03', '2019-05-31', 0),
(2, 'CB123', '2019-04-03', '2019-05-09', 0),
(2, 'fa123', '2019-05-24', '2019-05-31', 0);

-- --------------------------------------------------------

--
-- Structure de la table `compte`
--

CREATE TABLE IF NOT EXISTS `compte` (
  `Nom_d_utilisateur` varchar(30) NOT NULL,
  `mot_de_pass` varchar(30) NOT NULL,
  `role` varchar(20) NOT NULL,
  PRIMARY KEY (`Nom_d_utilisateur`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `compte`
--

INSERT INTO `compte` (`Nom_d_utilisateur`, `mot_de_pass`, `role`) VALUES
('aaa', 'aaa', 'stagiaire'),
('ayoub', '123456789', 'stagiaire'),
('chedad', '123456', 'stagiaire'),
('chedad2', '123456', 'stagiaire'),
('chedad4', '123456', 'stagiaire'),
('ffff', 'fff', 'stagiaire'),
('med', '123', 'stagiaire'),
('medouchen18', '123456789', 'administrateur'),
('mohammed', '123456789', 'secraitaire'),
('ocp', '123456', 'stagiaire'),
('ouchen21', '123456', 'stagiaire'),
('qq', 'qq', 'stagiaire'),
('rajaa', '123456', 'stagiaire'),
('soufyan', '123456789', 'stagiaire');

-- --------------------------------------------------------

--
-- Structure de la table `encadrant`
--

CREATE TABLE IF NOT EXISTS `encadrant` (
  `cin_encadrant` varchar(15) NOT NULL,
  `nom_encadrant` varchar(50) NOT NULL,
  `prenom_encadrant` varchar(50) NOT NULL,
  `date_de_naissance` date NOT NULL,
  `tel` varchar(25) NOT NULL,
  `Email` varchar(80) NOT NULL,
  `Adresse` varchar(60) NOT NULL,
  PRIMARY KEY (`cin_encadrant`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `encadrant`
--

INSERT INTO `encadrant` (`cin_encadrant`, `nom_encadrant`, `prenom_encadrant`, `date_de_naissance`, `tel`, `Email`, `Adresse`) VALUES
('CB123', 'kkk', 'hhhhhhh', '2019-05-15', '066666', 'medouchen19@gmail.com', 'nnn');

-- --------------------------------------------------------

--
-- Structure de la table `fichier`
--

CREATE TABLE IF NOT EXISTS `fichier` (
  `id_fichier` int(11) NOT NULL AUTO_INCREMENT,
  `type` varchar(40) NOT NULL,
  `nom_fichier` varchar(30) NOT NULL,
  `cin` varchar(8) DEFAULT NULL,
  PRIMARY KEY (`id_fichier`),
  KEY `cin` (`cin`),
  KEY `cin_2` (`cin`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=11 ;

--
-- Contenu de la table `fichier`
--

INSERT INTO `fichier` (`id_fichier`, `type`, `nom_fichier`, `cin`) VALUES
(1, 'cv', 'cc', NULL),
(2, 'cv', 'cvcc.txt', 'fa123'),
(3, 'cv', 'cvcc.txt', 'fa123'),
(4, 'carte_d_idetite', 'carte_d_idetitecc.jpg', 'fa123'),
(5, 'Demande_de_stage', 'Demande_de_stagecc.jpg', 'fa123'),
(6, 'Demande_de_stage', 'Demande_de_stagecc.pdf', 'fa123'),
(7, 'Demande_de_stage', 'Demande_de_stagecc.pdf', 'fa123'),
(8, 'cv', 'cvbn123.png', 'bn123'),
(9, 'cv', 'cvddd.jpg', 'ddd'),
(10, 'cv', 'cva.png', 'a');

-- --------------------------------------------------------

--
-- Structure de la table `group`
--

CREATE TABLE IF NOT EXISTS `group` (
  `id_group` varchar(10) NOT NULL,
  `nom_group` varchar(10) NOT NULL,
  PRIMARY KEY (`id_group`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `group`
--

INSERT INTO `group` (`id_group`, `nom_group`) VALUES
('0', '0'),
('1', '1'),
('2', '2');

-- --------------------------------------------------------

--
-- Structure de la table `stage`
--

CREATE TABLE IF NOT EXISTS `stage` (
  `id_stage` int(11) NOT NULL AUTO_INCREMENT,
  `sujet` varchar(200) NOT NULL,
  `description` varchar(100) NOT NULL,
  PRIMARY KEY (`id_stage`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Contenu de la table `stage`
--

INSERT INTO `stage` (`id_stage`, `sujet`, `description`) VALUES
(2, 'application web ', 'gestion des stagiares ');

-- --------------------------------------------------------

--
-- Structure de la table `stagiaire`
--

CREATE TABLE IF NOT EXISTS `stagiaire` (
  `cin` varchar(30) NOT NULL,
  `nom` varchar(50) NOT NULL,
  `prenom` varchar(50) NOT NULL,
  `tel` varchar(30) DEFAULT NULL,
  `date_de_naissnce` varchar(30) DEFAULT NULL,
  `mail` varchar(50) NOT NULL,
  `adresse` varchar(30) DEFAULT NULL,
  `niveau` varchar(30) DEFAULT NULL,
  `filiere` varchar(30) DEFAULT NULL,
  `etat` varchar(30) DEFAULT NULL,
  `id_compte` varchar(30) DEFAULT NULL,
  `id_group` varchar(10) DEFAULT NULL,
  `cin_encadrant` varchar(8) DEFAULT NULL,
  PRIMARY KEY (`cin`),
  KEY `cin_encadrant` (`cin_encadrant`),
  KEY `id_compte` (`id_compte`),
  KEY `id_compte_2` (`id_compte`),
  KEY `cin_encadrant_2` (`cin_encadrant`),
  KEY `cin_encadrant_3` (`cin_encadrant`),
  KEY `id_group` (`id_group`),
  KEY `id_group_2` (`id_group`),
  KEY `id_group_3` (`id_group`),
  KEY `id_group_4` (`id_group`),
  KEY `id_group_5` (`id_group`),
  KEY `id_group_6` (`id_group`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `stagiaire`
--

INSERT INTO `stagiaire` (`cin`, `nom`, `prenom`, `tel`, `date_de_naissnce`, `mail`, `adresse`, `niveau`, `filiere`, `etat`, `id_compte`, `id_group`, `cin_encadrant`) VALUES
('a', 'aa', 'aa', '+212649463284', '2019-05-29', 'sss@gssmail.com', 'Qut El houda Blog 5 NR 36 BENI', 'bac+1', 'sss', 'demandeur', 'aaa', NULL, NULL),
('bn123', 'soufyan', 'solmi', '0649463284', '2019-05-17', 'soufyan@gmail.com', 'Beni Mellel, khribouga', 'bac+3', 'informatique', 'demandeur', 'soufyan', NULL, NULL),
('c123456789', 'ouchen', 'mohammed', '06493284', '10/10/1989', 'medouchen19@gmail.com', 'Beni Mellel, khribouga', NULL, NULL, NULL, 'medouchen18', '0', NULL),
('CB123', 'mohammed', 'ouchen', '0649463284', '2019-05-17', 'medouchen2019@gmail.com', 'Beni Mellel, khribouga', 'bac+5', 'informatique', 'stagiaire', NULL, '2', 'CB123'),
('cb123456789', 'ayoub ', 'ouchen', '+212649463284', '2019-05-17', 'AYOUBSOULMI@GMAIL.COM', 'Qut El houda Blog 5 NR 36 BENI', 'bac+3', 'informatique', '', 'ayoub', NULL, NULL),
('ddd', 'ddd', 'dd', '06-49-46-32-84', '2019-05-08', 'dd@gmail.com', 'Qut El houda Blog 5 NR 36 BENI', 'bac+1', 'informatique', 'demandeur', 'ocp', NULL, NULL),
('fa123', 'med', 'ouchen', '0649463284', '2019-05-16', 'medouchen138@gmail.com', 'Beni Mellel, khribouga', 'bac+1', 'informatique', 'stagiaire', 'chedad4', NULL, NULL),
('qq', 'aass', 'qq', NULL, NULL, 'qq@gmail.com', NULL, NULL, NULL, NULL, 'qq', NULL, NULL),
('ra123', 'rajaa', 'ouchen', NULL, NULL, 'raaje@gmail.com', NULL, NULL, NULL, NULL, 'rajaa', NULL, NULL),
('ss', 'kkkk', 'ss', NULL, NULL, 'sss@gmail.com', NULL, NULL, NULL, NULL, 'med', NULL, NULL);

--
-- Contraintes pour les tables exportées
--

--
-- Contraintes pour la table `affectation`
--
ALTER TABLE `affectation`
  ADD CONSTRAINT `affectation_ibfk_1` FOREIGN KEY (`id_stage`) REFERENCES `stage` (`id_stage`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `affectation_ibfk_2` FOREIGN KEY (`cin`) REFERENCES `stagiaire` (`cin`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `fichier`
--
ALTER TABLE `fichier`
  ADD CONSTRAINT `fichier_ibfk_1` FOREIGN KEY (`cin`) REFERENCES `stagiaire` (`cin`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `stagiaire`
--
ALTER TABLE `stagiaire`
  ADD CONSTRAINT `stagiaire_ibfk_2` FOREIGN KEY (`cin_encadrant`) REFERENCES `encadrant` (`cin_encadrant`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `stagiaire_ibfk_5` FOREIGN KEY (`id_compte`) REFERENCES `compte` (`Nom_d_utilisateur`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `stagiaire_ibfk_6` FOREIGN KEY (`id_group`) REFERENCES `group` (`id_group`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
