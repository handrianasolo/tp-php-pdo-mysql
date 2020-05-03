-- phpMyAdmin SQL Dump
-- version 4.0.4
-- http://www.phpmyadmin.net
--
-- Client: localhost
-- Généré le: Jeu 03 Octobre 2019 à 19:08
-- Version du serveur: 5.6.12-log
-- Version de PHP: 5.4.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Base de données: `db_formulaire`
--
CREATE DATABASE IF NOT EXISTS `db_formulaire` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `db_formulaire`;

-- --------------------------------------------------------

--
-- Structure de la table `tb_article`
--

CREATE TABLE IF NOT EXISTS `tb_article` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(100) NOT NULL,
  `content` text NOT NULL,
  `date` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Contenu de la table `tb_article`
--

INSERT INTO `tb_article` (`id`, `title`, `content`, `date`) VALUES
(1, 'article1', 'description of article one', '2019-09-03 02:09:17');

-- --------------------------------------------------------

--
-- Structure de la table `tb_comment`
--

CREATE TABLE IF NOT EXISTS `tb_comment` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `parent_comment_id` int(11) NOT NULL,
  `comment` varchar(100) CHARACTER SET utf8 NOT NULL,
  `comment_sender_name` varchar(100) CHARACTER SET utf8 NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Structure de la table `tb_formulaire`
--

CREATE TABLE IF NOT EXISTS `tb_formulaire` (
  `id_formulaire` int(11) NOT NULL AUTO_INCREMENT,
  `pseudo` varchar(100) NOT NULL,
  `age` int(11) NOT NULL,
  `sexe` varchar(7) NOT NULL,
  `mobile` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  PRIMARY KEY (`id_formulaire`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=16 ;

--
-- Contenu de la table `tb_formulaire`
--

INSERT INTO `tb_formulaire` (`id_formulaire`, `pseudo`, `age`, `sexe`, `mobile`, `email`) VALUES
(11, 'TESTEUR 1', 1, 'Homme', '0111111111', 'testeur1@yahoo.com'),
(12, 'TESTEUR 2', 2, 'Homme', '0222222222', 'testeur2@yahoo.com'),
(13, 'TESTEUR 3', 3, 'Homme', '0333333333', 'testeur3@yahoo.com'),
(14, 'TESTEUR 4', 4, 'Homme', '0444444444', 'testeur4@yahoo.com'),
(15, 'TESTEUR 5', 5, 'Homme', '0555555555', 'testeur5@yahoo.com');

-- --------------------------------------------------------

--
-- Structure de la table `tb_login`
--

CREATE TABLE IF NOT EXISTS `tb_login` (
  `id_login` int(11) NOT NULL AUTO_INCREMENT,
  `user_login` varchar(50) NOT NULL,
  `user_pass` varchar(50) NOT NULL,
  PRIMARY KEY (`id_login`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=14 ;

--
-- Contenu de la table `tb_login`
--

INSERT INTO `tb_login` (`id_login`, `user_login`, `user_pass`) VALUES
(13, 'admin', '21232f297a57a5a743894a0e4a801fc3');

