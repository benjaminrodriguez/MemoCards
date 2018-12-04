-- phpMyAdmin SQL Dump
-- version 4.7.9
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Dec 04, 2018 at 08:18 AM
-- Server version: 5.7.21
-- PHP Version: 7.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `memocards`
--
CREATE DATABASE IF NOT EXISTS `memocards` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `memocards`;

--
-- Dumping data for table `categorie`
--

INSERT INTO `categorie` (`id`, `name`, `description`) VALUES
(1, 'Sports', ''),
(2, 'Culture générale', ''),
(3, 'Langue', ''),
(4, 'Histoire', ''),
(5, 'Géographie', ''),
(6, 'Maths', ''),
(7, 'Philosophie', ''),
(8, 'Informatique', ''),
(9, 'Cuisine', ''),
(10, 'Automobiles', ''),
(11, 'Passions', ''),
(12, 'Losirs', ''),
(13, 'Series', ''),
(14, 'Films', ''),
(15, 'TV', ''),
(16, 'Proverbes', '');

--
-- Dumping data for table `deck`
--

INSERT INTO `deck` (`id`, `name`, `description`, `autor_id`, `status`, `picture`, `date_creation`, `categorie_id`) VALUES
(2, 'Code de la route !', 'Des petites cartes pour vous aider à passer le code de la route !', 2, 'privated', './Public/img/appareil_photo.jpg', '2018-12-03', 10),
(3, 'Les verbes irréguliers en Anglais', 'Ce decks vous permet de réviser vos vers irréguliers en anglais !', 2, 'privated', 'http://1.bp.blogspot.com/-sKKeuKwdtbk/USrgyWXTuII/AAAAAAAABtg/qHU-X0S_ixk/s1600/title+example.gif', '2018-12-04', 3);

--
-- Dumping data for table `passed`
--

INSERT INTO `passed` (`id`, `date_passed`, `number_game`, `score_user`, `user_id`, `deck_id`) VALUES
(8, NULL, NULL, NULL, 2, 2),
(9, NULL, NULL, NULL, 2, 3);

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `username`, `password`, `profile_picture`, `status`, `birth_date`, `sex`, `region`, `email`) VALUES
(2, 'sami', '$2y$10$vXpp.lZoawYiRTp6sx4koeUQjVxRNitYU0q43a0JyTsPzpgYx597y', 'https://raw.githubusercontent.com/projetInformatiqueIntech/MemoCards/master/Project/Public/img/pp/blue.png', 'membre', '2018-12-04', 'F', 'ile_de_france', 'samikara13@gmail.com'),
(3, 'ben', '$2y$10$imu56uGWqoo2I5sU/U68mOYJJ0Hf/Ck32/opERIihjCmItMxU37yW', 'https://raw.githubusercontent.com/projetInformatiqueIntech/MemoCards/master/Project/Public/img/pp/purple.png', 'membre', '2018-11-29', 'F', 'ile_de_france', 'benjamin-rodriguez@outlook.fr'),
(4, 'yann', '$2y$10$4C9Z3pl4qkPgSTUHBxm7V.dVw6UQBRMYhEXgApoDtlOUzOprQrfDK', 'https://raw.githubusercontent.com/projetInformatiqueIntech/MemoCards/master/Project/Public/img/pp/pink.png', 'membre', '2018-11-26', 'M', 'pays_de_la_loire', 'yoyo@gmail.com'),
(5, 'toto', '$2y$10$p9MRQYdntG4Dz.ENWVKhe.iZ472FxCJupYpM667Ei4T8b8KdEAr0W', 'https://raw.githubusercontent.com/projetInformatiqueIntech/MemoCards/master/Project/Public/img/pp/pink.png', 'membre', '2018-11-29', 'F', 'paca', 'toto@gmail.com');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
