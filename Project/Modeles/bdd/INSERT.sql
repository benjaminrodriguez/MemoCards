-- phpMyAdmin SQL Dump
-- version 4.7.9
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le :  lun. 17 déc. 2018 à 08:44
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


--
-- Déchargement des données de la table `user`
--

INSERT INTO `user` (`id`, `username`, `password`, `profile_picture`, `status`, `birth_date`, `sex`, `region`, `email`) VALUES
(1, 'Membre', '$2y$10$kVNwPH4NHPRKE8/S8XU0j.Nylavuiv7u5h2atJRW8P7kCniH3t7a6', 'https://raw.githubusercontent.com/projetInformatiqueIntech/MemoCards/master/Project/Public/img/pp/blue.png', 'ancien', '2018-12-04', 'M', 'ile_de_france', 'samra13@gmail.com'),
(2, 'sami', '$2y$10$kVNwPH4NHPRKE8/S8XU0j.Nylavuiv7u5h2atJRW8P7kCniH3t7a6', 'https://raw.githubusercontent.com/projetInformatiqueIntech/MemoCards/master/Project/Public/img/pp/blue.png', 'membre', '2018-12-04', 'M', 'ile_de_france', 'samikara13@gmail.com'),
(3, 'ben', '$2y$10$imu56uGWqoo2I5sU/U68mOYJJ0Hf/Ck32/opERIihjCmItMxU37yW', 'https://raw.githubusercontent.com/projetInformatiqueIntech/MemoCards/master/Project/Public/img/pp/purple.png', 'membre', '2018-11-29', 'F', 'ile_de_france', 'benjamin-rodriguez@outlook.fr'),
(4, 'yann', '$2y$10$4C9Z3pl4qkPgSTUHBxm7V.dVw6UQBRMYhEXgApoDtlOUzOprQrfDK', 'https://raw.githubusercontent.com/projetInformatiqueIntech/MemoCards/master/Project/Public/img/pp/pink.png', 'membre', '2018-11-26', 'M', 'pays_de_la_loire', 'yoyo@gmail.com'),
(5, 'toto', '$2y$10$p9MRQYdntG4Dz.ENWVKhe.iZ472FxCJupYpM667Ei4T8b8KdEAr0W', 'https://raw.githubusercontent.com/projetInformatiqueIntech/MemoCards/master/Project/Public/img/pp/pink.png', 'membre', '2018-11-29', 'F', 'paca', 'toto@gmail.com'),
(6, 'admin', '$2y$10$gCe0OqAnYiLCw/STczF2SOgQr5DNGM2XeRx7jRXi18JIHxuDR7op6', 'https://raw.githubusercontent.com/projetInformatiqueIntech/MemoCards/master/Project/Public/img/pp/yellow.png', 'membre', '2018-12-05', 'F', 'ile_de_france', 'samikara13@gmail.com');




--
-- Déchargement des données de la table `categorie`
--

INSERT INTO `categorie` (`id`, `name`, `description`) VALUES
(1, 'Sports', ''),
(2, 'Culture', ''),
(3, 'Langue', ''),
(4, 'Histoire', ''),
(5, 'Géographie', ''),
(6, 'Maths', ''),
(7, 'Philosophie', ''),
(8, 'Informatique', ''),
(9, 'Cuisine', ''),
(10, 'Automobiles', ''),
(11, 'Passions', ''),
(12, 'Loisirs', ''),
(13, 'Series', ''),
(14, 'Films', ''),
(15, 'TV', ''),
(16, 'Proverbes', '');

--
-- Déchargement des données de la table `deck`
--

INSERT INTO `deck` (`id`, `name`, `description`, `autor_id`, `status`, `picture`, `date_creation`, `categorie_id`) VALUES
(2, 'Code de la route !', 'Des petites cartes pour vous aider à passer le code de la route !', 2, 'privated', './Public/img/appareil_photo.jpg', '2018-12-03', 10),
(3, 'Les verbes irréguliers en Anglais', 'Ce decks vous permet de réviser vos vers irréguliers en anglais !', 2, 'privated', 'http://1.bp.blogspot.com/-sKKeuKwdtbk/USrgyWXTuII/AAAAAAAABtg/qHU-X0S_ixk/s1600/title+example.gif', '2018-12-04', 3),
(17, 'Php / MySql', 'Un petit deck fort sympatique pour vous aider à vous améliorer !', 2, 'privated', 'http://www.developpement-informatique.com/img/cours/Basededonn%C3%A9esMySQLetPHPavecunexemple.png', '2018-12-16', 8),
(18, 'Culture Générale', 'Améliorer votre culture !', 2, 'public', 'https://econcoursinfirmier.fr/wp-content/uploads/2017/06/culturegenerale-400x155.jpg', '2018-12-16', 2),
(19, 'Culture sport', 'Améliorer votre culture sur le sport avec ce deck !', 2, 'public', 'http://laligue03.org/wp-content/uploads/2015/05/sport.png', '2018-12-16', 1),
(20, 'deck de ben', 'pp', 3, 'privated', './Public/img/appareil_photo.jpg', '2018-12-16', 5);



--
-- Déchargement des données de la table `passed`
--

INSERT INTO `passed` (`id`, `date_passed`, `number_game`, `score_user`, `user_id`, `deck_id`) VALUES
(24, NULL, 7, 14, 2, 18),
(25, NULL, 2, 6, 2, 19),
(26, NULL, 8, 42, 3, 20);

--
-- Déchargement des données de la table `recto`
--

INSERT INTO `recto` (`id`, `question_cards`, `deck_id`) VALUES
(10, 'Maison ?', 3),
(13, 'ee ?', 2),
(15, 'php ?', 17),
(16, 'Sql ?', 17),
(17, '$_SESSION ?', 17),
(18, 'Var ?', 17),
(19, 'Quel pays a une feuille d\'erable sur son drapeau ?', 18),
(20, 'Quel roi de France a été guillotiné ?', 18),
(21, 'Qu’a-t-on célébré en France le 11 novembre dernier ?', 18),
(22, 'Quel pays a décidé par référendum de quitter l’Union Européenne en 2016 ?', 18),
(23, 'Qui est le Premier Ministre français à la date du 17 novembre 2018 ?', 18),
(24, 'Quel état américain est actuellement ravagé par les flammes, avec plus de 55.000 hectares brûlés ?', 18),
(25, 'Quel célèbre écrivain débute son plaidoyer en faveur du capitaine Dreyfus par \"J\'accuse...\" ?', 18),
(26, 'À quel animal l\'adjectif \"hippique\" se rapporte-t-il ?', 18),
(27, 'Complétez la liste : Athos, Porthos et...', 18),
(28, 'Quelle est la première personne du singulier du verbe \"appeler\" au présent de l\'indicatif ?', 18),
(29, 'Quel homme politique a pris le pouvoir à partir de 1959 à Cuba ?', 18),
(30, 'Qui a gagné la coupe du Monde de Football 1998 ?', 19),
(31, 'Qui est le judoka français le plus titré ?', 19),
(32, 'Quel sport peut se jouer à 7, 13 ou 15 joueurs', 19),
(33, 'Quel sport se joue avec un ballon ovale ?', 19),
(34, 'Quel sport a pratiqué Pete Sampras ?', 19),
(35, 'Dans quel sport peut on remporter le Bouclier de Brennus ?', 19),
(36, 'Qui est Zlatan Ibrahimovic ?', 19),
(37, 'Quelle est la périodicité des jeux Olympiques d’été ?', 19),
(38, 'Lors du Tour de France cycliste, qui est récompensé d’un maillot blanc à pois rouges ?', 19),
(39, 'Quel nom porte un terrain de tennis ?', 19),
(40, 'Dans quel sport emploie-t-on les termes suivants : split, spare, strike ?', 19),
(41, 'Au judo, quel est le grade le plus élevé parmi les ceintures ?', 19),
(42, 'Dans quelle discipline sportive s’est illustré Sebastien Loeb ?', 19),
(43, 'En rugby, quel pays ne participe pas au tournoi des Six-Nations ?', 19),
(44, 'Aux Etats-Unis, qu’est-ce que la NBA ?', 19),
(45, 'mm?', 20);

--
-- Déchargement des données de la table `subject`
--

INSERT INTO `subject` (`id`, `title`, `date_posted`, `content`, `status`, `user_id`) VALUES
(1, 'test', '2018-12-13 02:59:32', ' blabla', 'ouvert', 2),
(2, 'voiture', '2018-12-13 03:42:46', ' comment sont construites les voitures ?', 'ouvert', 2),
(9, 'moto', '2018-12-13 04:12:37', 'vroum vroum', 'ouvert', 2),
(13, 'mm', '2018-12-13 04:18:34', ' mmmm', 'ouvert', 2),
(14, 'Sujet by ben', '2018-12-13 15:15:48', ' bla bla', 'ouvert', 3),
(15, 'Nouveau sujet', '2018-12-13 15:53:51', 'ttt', 'ouvert', 3),
(16, 'Lorem', '2018-12-13 23:12:27', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Eveniet iure atque explicabo quo delectus consequatur, tenetur officia vero soluta odio a temporibus exercitationem unde accusantium incidunt et in nulla praesentium.Lorem ipsum dolor sit amet consectetur adipisicing elit. Eveniet iure atque explicabo quo delectus consequatur, tenetur officia vero soluta odio a temporibus exercitationem unde accusantium incidunt et in nulla praesentium.Lorem ipsum dolor sit amet consectetur adipisicing elit. Eveniet iure atque explicabo quo delectus consequatur, tenetur officia vero soluta odio a temporibus exercitationem unde accusantium incidunt et in nulla praesentium.Lorem ipsum dolor sit amet consectetur adipisicing elit. Eveniet iure atque explicabo quo delectus consequatur, tenetur officia vero soluta odio a temporibus exercitationem unde accusantium incidunt et in nulla praesentium.Lorem ipsum dolor sit amet consectetur adipisicing elit. Eveniet iure atque explicabo quo delectus consequatur, tenetur officia vero soluta odio a temporibus exercitationem unde accusantium incidunt et in nulla praesentium.Lorem ipsum dolor sit amet consectetur adipisicing elit. Eveniet iure atque explicabo quo delectus consequatur, tenetur officia vero soluta odio a temporibus exercitationem unde accusantium incidunt et in nulla praesentium.Lorem ipsum dolor sit amet consectetur adipisicing elit. Eveniet iure atque explicabo quo delectus consequatur, tenetur officia vero soluta odio a temporibus exercitationem unde accusantium incidunt et in nulla praesentium.Lorem ipsum dolor sit amet consectetur adipisicing elit. Eveniet iure atque explicabo quo delectus consequatur, tenetur officia vero soluta odio a temporibus exercitationem unde accusantium incidunt et in nulla praesentium.Lorem ipsum dolor sit amet consectetur adipisicing elit. Eveniet iure atque explicabo quo delectus consequatur, tenetur officia vero soluta odio a temporibus exercitationem unde accusantium incidunt et in nulla praesentium.Lorem ipsum dolor sit amet consectetur adipisicing elit. Eveniet iure atque explicabo quo delectus consequatur, tenetur officia vero soluta odio a temporibus exercitationem unde accusantium incidunt et in nulla praesentium.Lorem ipsum dolor sit amet consectetur adipisicing elit. Eveniet iure atque explicabo quo delectus consequatur, tenetur officia vero soluta odio a temporibus exercitationem unde accusantium incidunt et in nulla praesentium.Lorem ipsum dolor sit amet consectetur adipisicing elit. Eveniet iure atque explicabo quo delectus consequatur, tenetur officia vero soluta odio a temporibus exercitationem unde accusantium incidunt et in nulla praesentium.', 'ouvert', 2);


--
-- Déchargement des données de la table `verso`
--

INSERT INTO `verso` (`id`, `answer_cards`, `statut_cards`, `recto_id`) VALUES
(10, 'home', 'T', 10),
(11, 'ee', 'T', 13),
(13, 'php', 'T', 15),
(14, 'Sql', 'T', 16),
(15, '$_SESSION', 'T', 17),
(16, 'Var', 'T', 18),
(17, 'Canada', 'T', 19),
(18, 'Louis XVI', 'T', 20),
(19, 'armistice ', 'T', 21),
(20, 'Royaume-Uni', 'T', 22),
(21, 'Edouard Philippe', 'T', 23),
(22, 'Californie', 'T', 24),
(23, 'Emile Zola', 'T', 25),
(24, 'cheval', 'T', 26),
(25, 'Aramis', 'T', 27),
(26, 'J\'appelle', 'T', 28),
(27, 'Fidel Castro', 'T', 29),
(28, 'France', 'T', 30),
(29, 'Teddy Riner', 'T', 31),
(30, 'rugby', 'T', 32),
(31, 'rugby', 'T', 33),
(32, 'Tennis', 'T', 34),
(33, 'rugby', 'T', 35),
(34, 'foot', 'T', 36),
(35, '4 ans', 'T', 37),
(36, 'grimpeur', 'T', 38),
(37, 'terre', 'T', 39),
(38, 'bowling', 'T', 40),
(39, 'rouge', 'T', 41),
(40, 'rallye', 'T', 42),
(41, 'Espagne', 'T', 43),
(42, 'National Basketball Association', 'T', 44),
(43, 'mm', 'T', 45);



--
-- Déchargement des données de la table `succes_rate`
--

INSERT INTO `succes_rate` (`id`, `level_cards`, `chain`, `played_cards`, `verso_id`, `nb_succes`) VALUES
(7, 0, 0, NULL, 10, 0),
(10, 4, 4, 4, 11, 4),
(12, 4, 4, 4, 13, 4),
(13, 3, 3, 3, 14, 3),
(14, 2, 2, 2, 15, 2),
(15, 2, 2, 2, 16, 2),
(16, 3, 3, 3, 17, 3),
(17, 0, 0, 2, 18, 1),
(18, 0, 0, 2, 19, 1),
(19, 0, 0, 2, 20, 1),
(20, 1, 1, 3, 21, 2),
(21, 0, 0, 2, 22, 1),
(22, 2, 2, 2, 23, 2),
(23, 0, 0, 2, 24, 1),
(24, 0, 0, 2, 25, 1),
(25, 2, 2, 2, 26, 2),
(26, 0, 0, 2, 27, 1),
(27, 0, 0, NULL, 28, 0),
(28, 0, 0, NULL, 29, 0),
(29, 0, 0, NULL, 30, 0),
(30, 0, 0, NULL, 31, 0),
(31, 0, 0, NULL, 32, 0),
(32, 0, 0, NULL, 30, 0),
(33, 0, 0, NULL, 34, 0),
(34, 0, 0, NULL, 35, 0),
(35, 0, 0, NULL, 36, 0),
(36, 0, 0, NULL, 37, 0),
(37, 0, 0, NULL, 38, 0),
(38, 0, 0, NULL, 39, 0),
(39, 0, 0, NULL, 40, 0),
(40, 0, 0, NULL, 41, 0),
(41, 0, 0, NULL, 42, 0),
(42, 0, 0, NULL, 43, 0);



--
-- Déchargement des données de la table `message`
--

INSERT INTO `message` (`id`, `date`, `content_message`, `autor_id`, `subject_id`) VALUES
(1, '2018-12-13 13:14:32', 'test de nouveau commentaire', 2, 13),
(2, '2018-12-13 13:51:10', '<i> ( Message supprimé ) </i>', 2, 13),
(3, '2018-12-13 13:53:39', 'Pas d\'accord !\r\n', 3, 13),
(4, '2018-12-13 14:49:48', 'no', 3, 13),
(5, '2018-12-13 15:04:34', 'test', 3, 13),
(6, '2018-12-13 15:17:35', 'test de commentaire dans le sujet de ben', 3, 14),
(7, '2018-12-13 15:18:14', 'cool ça fonctionne', 3, 14),
(8, '2018-12-13 15:53:58', 'j\'ai réussi', 3, 15),
(9, '2018-12-13 15:54:06', 'cool story bro\r\n', 3, 15),
(10, '2018-12-15 14:45:04', '<i> ( Message supprimé ) </i>', 2, 15),
(11, '2018-12-16 03:12:01', '<i> ( Message supprimé ) </i>', 2, 1);

INSERT INTO `comments_deck` (`id`, `content`, `autor_id`, `deck_id`, `mark`) VALUES
(8, '', 2, 19, 0),
(9, '', 2, 18, 0);



SET FOREIGN_KEY_CHECKS=1;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
