-- phpMyAdmin SQL Dump
-- version 4.7.9
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le :  ven. 30 nov. 2018 à 00:27
-- Version du serveur :  5.7.21
-- Version de PHP :  7.2.4

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

--
-- Déchargement des données de la table `deck`
--

INSERT INTO `deck` (`id`, `name`, `description`, `mark`, `autor_id`, `statut`, `comment_user`) VALUES
(1, 'Voiture', 'Deck sur les voitures !\r\n\r\nbla\r\né$àù\r\n\r\nbla', '0.2', 1, 'private', NULL),
(2, 'Moto', 'Deck sur les Moto\r\nhdrhrhhhr\r\nrhrrh\r\nrhrhhrhr\r\nHRhrhh\r\nHRhrrhh', '0.5', 1, 'public', NULL);

--
-- Déchargement des données de la table `passed`
--

INSERT INTO `passed` (`id`, `date_passed`, `number_game`, `score_user`, `user_id`, `deck_id`) VALUES
(1, '2018-11-02 00:00:00', 5, 2, 1, 1),
(2, '2018-11-15 00:00:00', 3, 7, 2, 2);

--
-- Déchargement des données de la table `user`
--

INSERT INTO `user` (`id`, `username`, `password`, `profile_picture`, `statut`, `birth_date`, `sex`, `region`, `email`) VALUES
(1, 'sami', '$2y$10$X4EADxrqQdBRfGw/RyKZMe3Nw1bgxK3CjqJ1PQU2H36bWIgS716jC', 'https://raw.githubusercontent.com/projetInformatiqueIntech/MemoCards/master/Project/Public/img/linux.png', 'membre', '1005-01-13', 'F', 'ile_de_france', 'sami@gmail.com');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
