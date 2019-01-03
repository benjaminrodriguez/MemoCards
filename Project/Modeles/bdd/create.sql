-- phpMyAdmin SQL Dump
-- version 4.7.9
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le :  lun. 17 déc. 2018 à 12:38
-- Version du serveur :  5.7.21
-- Version de PHP :  7.2.4

SET FOREIGN_KEY_CHECKS=0;
SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `memocards`
--
CREATE DATABASE IF NOT EXISTS `memocards` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `memocards`;

-- --------------------------------------------------------

--
-- Structure de la table `categorie`
--

DROP TABLE IF EXISTS `categorie`;
CREATE TABLE IF NOT EXISTS `categorie` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `description` mediumtext NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `comments_deck`
--

DROP TABLE IF EXISTS `comments_deck`;
CREATE TABLE IF NOT EXISTS `comments_deck` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `content` longtext NOT NULL,
  `autor_id` int(11) NOT NULL,
  `deck_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_comments_deck_deck1_idx` (`deck_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `deck`
--

DROP TABLE IF EXISTS `deck`;
CREATE TABLE IF NOT EXISTS `deck` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `description` mediumtext,
  `autor_id` int(11) NOT NULL,
  `status` varchar(10) NOT NULL,
  `picture` varchar(255) NOT NULL,
  `date_creation` date NOT NULL,
  `mark` int(11) DEFAULT NULL,
  `categorie_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_deck_categorie1_idx` (`categorie_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `hashtag`
--

DROP TABLE IF EXISTS `hashtag`;
CREATE TABLE IF NOT EXISTS `hashtag` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `hashtag_has_deck`
--

DROP TABLE IF EXISTS `hashtag_has_deck`;
CREATE TABLE IF NOT EXISTS `hashtag_has_deck` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `deck_id` int(11) NOT NULL,
  `hashtag_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_hashtag_has_deck_deck1_idx` (`deck_id`),
  KEY `fk_hashtag_has_deck_hashtag1_idx` (`hashtag_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `hobbies`
--

DROP TABLE IF EXISTS `hobbies`;
CREATE TABLE IF NOT EXISTS `hobbies` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `hobby` varchar(45) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `hobbies_has_user`
--

DROP TABLE IF EXISTS `hobbies_has_user`;
CREATE TABLE IF NOT EXISTS `hobbies_has_user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `hobbies_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_hobbies_has_user_user1_idx` (`user_id`),
  KEY `fk_hobbies_has_user_hobbies1_idx` (`hobbies_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `message`
--

DROP TABLE IF EXISTS `message`;
CREATE TABLE IF NOT EXISTS `message` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `date` datetime NOT NULL,
  `content_message` longtext NOT NULL,
  `autor_id` int(11) NOT NULL,
  `subject_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_message_subject1_idx` (`subject_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `mp_forum`
--

DROP TABLE IF EXISTS `mp_forum`;
CREATE TABLE IF NOT EXISTS `mp_forum` (
  `mp_id` int(11) NOT NULL AUTO_INCREMENT,
  `mp_expediteur` int(11) NOT NULL,
  `mp_receveur` int(11) NOT NULL,
  `mp_titre` varchar(255) NOT NULL,
  `mp_text` longtext NOT NULL,
  `mp_time` int(11) NOT NULL,
  `mp_lu` enum('0','1') NOT NULL,
  `user_id` int(11) NOT NULL,
  PRIMARY KEY (`mp_id`),
  KEY `fk_mp_forum_user1_idx` (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `passed`
--

DROP TABLE IF EXISTS `passed`;
CREATE TABLE IF NOT EXISTS `passed` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `date_passed` datetime DEFAULT NULL,
  `number_game` int(11) DEFAULT NULL,
  `score_user` int(11) DEFAULT NULL,
  `user_id` int(11) NOT NULL,
  `deck_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_passed_user1_idx` (`user_id`),
  KEY `fk_passed_deck1_idx` (`deck_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `recto`
--

DROP TABLE IF EXISTS `recto`;
CREATE TABLE IF NOT EXISTS `recto` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `question_cards` varchar(255) NOT NULL,
  `deck_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_recto_deck1_idx` (`deck_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `subject`
--

DROP TABLE IF EXISTS `subject`;
CREATE TABLE IF NOT EXISTS `subject` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `date_posted` datetime NOT NULL,
  `content` longtext NOT NULL,
  `status` varchar(15) NOT NULL,
  `user_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_subject_user1_idx` (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `succes_rate`
--

DROP TABLE IF EXISTS `succes_rate`;
CREATE TABLE IF NOT EXISTS `succes_rate` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `level_cards` int(11) NOT NULL,
  `chain` int(11) NOT NULL,
  `played_cards` int(11) DEFAULT NULL,
  `verso_id` int(11) NOT NULL,
  `nb_succes` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_succes_rate_verso_idx` (`verso_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `user`
--

DROP TABLE IF EXISTS `user`;
CREATE TABLE IF NOT EXISTS `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(25) NOT NULL,
  `password` varchar(255) NOT NULL,
  `profile_picture` varchar(255) NOT NULL,
  `status` varchar(45) NOT NULL,
  `birth_date` date NOT NULL,
  `sex` varchar(1) NOT NULL,
  `region` varchar(45) NOT NULL,
  `email` varchar(255) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `username_UNIQUE` (`username`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `verso`
--

DROP TABLE IF EXISTS `verso`;
CREATE TABLE IF NOT EXISTS `verso` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `answer_cards` varchar(255) NOT NULL,
  `statut_cards` varchar(5) NOT NULL,
  `recto_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_verso_recto1_idx` (`recto_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `comments_deck`
--
ALTER TABLE `comments_deck`
  ADD CONSTRAINT `fk_comments_deck_deck1` FOREIGN KEY (`deck_id`) REFERENCES `deck` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Contraintes pour la table `deck`
--
ALTER TABLE `deck`
  ADD CONSTRAINT `fk_deck_categorie1` FOREIGN KEY (`categorie_id`) REFERENCES `categorie` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Contraintes pour la table `hashtag_has_deck`
--
ALTER TABLE `hashtag_has_deck`
  ADD CONSTRAINT `fk_hashtag_has_deck_deck1` FOREIGN KEY (`deck_id`) REFERENCES `deck` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_hashtag_has_deck_hashtag1` FOREIGN KEY (`hashtag_id`) REFERENCES `hashtag` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Contraintes pour la table `hobbies_has_user`
--
ALTER TABLE `hobbies_has_user`
  ADD CONSTRAINT `fk_hobbies_has_user_hobbies1` FOREIGN KEY (`hobbies_id`) REFERENCES `hobbies` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_hobbies_has_user_user1` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Contraintes pour la table `message`
--
ALTER TABLE `message`
  ADD CONSTRAINT `fk_message_subject1` FOREIGN KEY (`subject_id`) REFERENCES `subject` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Contraintes pour la table `mp_forum`
--
ALTER TABLE `mp_forum`
  ADD CONSTRAINT `fk_mp_forum_user1` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Contraintes pour la table `passed`
--
ALTER TABLE `passed`
  ADD CONSTRAINT `fk_passed_deck1` FOREIGN KEY (`deck_id`) REFERENCES `deck` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_passed_user1` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Contraintes pour la table `recto`
--
ALTER TABLE `recto`
  ADD CONSTRAINT `fk_recto_deck1` FOREIGN KEY (`deck_id`) REFERENCES `deck` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Contraintes pour la table `subject`
--
ALTER TABLE `subject`
  ADD CONSTRAINT `fk_subject_user1` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Contraintes pour la table `succes_rate`
--
ALTER TABLE `succes_rate`
  ADD CONSTRAINT `fk_succes_rate_verso` FOREIGN KEY (`verso_id`) REFERENCES `verso` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Contraintes pour la table `verso`
--
ALTER TABLE `verso`
  ADD CONSTRAINT `fk_verso_recto1` FOREIGN KEY (`recto_id`) REFERENCES `recto` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;
SET FOREIGN_KEY_CHECKS=1;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
