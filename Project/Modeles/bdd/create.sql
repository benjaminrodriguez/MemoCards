-- MySQL Script generated by MySQL Workbench
-- Sat Nov 24 14:01:01 2018
-- Model: New Model    Version: 1.0
-- MySQL Workbench Forward Engineering

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION';

-- -----------------------------------------------------
-- Schema memocards
-- -----------------------------------------------------

-- -----------------------------------------------------
-- Schema memocards
-- -----------------------------------------------------
CREATE DATABASE IF NOT EXISTS `memocards` DEFAULT CHARACTER SET utf8 ;
USE `memocards` ;

-- -----------------------------------------------------
-- Table `memocards`.`user`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `memocards`.`user` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `username` VARCHAR(25) NOT NULL,
  `password` VARCHAR(255) NOT NULL,
  `profil_picture` VARCHAR(255) NULL,
  `statut` VARCHAR(45) NOT NULL,
  `age` DATE NOT NULL,
  `sexe` VARCHAR(1) NOT NULL,
  `region` VARCHAR(45) NOT NULL,
  `email` VARCHAR(255) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE INDEX `username_UNIQUE` (`username` ASC) )
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `memocards`.`deck`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `memocards`.`deck` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `name` VARCHAR(255) NOT NULL,
  `description` MEDIUMTEXT NULL,
  `mark` DECIMAL(1,1) NULL,
  `autor_id` INT NOT NULL,
  `statut` VARCHAR(10) NOT NULL,
  `comment_user` MEDIUMTEXT NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `memocards`.`recto`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `memocards`.`recto` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `question_cards` VARCHAR(255) NOT NULL,
  `deck_id` INT NOT NULL,
  PRIMARY KEY (`id`),
  INDEX `fk_recto_deck1_idx` (`deck_id` ASC) ,
  CONSTRAINT `fk_recto_deck1`
    FOREIGN KEY (`deck_id`)
    REFERENCES `memocards`.`deck` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `memocards`.`verso`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `memocards`.`verso` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `answer_cards` VARCHAR(255) NOT NULL,
  `statut_cards` VARCHAR(5) NOT NULL,
  `recto_id` INT NOT NULL,
  PRIMARY KEY (`id`),
  INDEX `fk_verso_recto1_idx` (`recto_id` ASC) ,
  CONSTRAINT `fk_verso_recto1`
    FOREIGN KEY (`recto_id`)
    REFERENCES `memocards`.`recto` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `memocards`.`succes_rate`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `memocards`.`succes_rate` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `level_cards` INT NOT NULL,
  `chain` INT(11) NOT NULL,
  `played_cards` INT NULL,
  `verso_id` INT NOT NULL,
  PRIMARY KEY (`id`),
  INDEX `fk_succes_rate_verso_idx` (`verso_id` ASC) ,
  CONSTRAINT `fk_succes_rate_verso`
    FOREIGN KEY (`verso_id`)
    REFERENCES `memocards`.`verso` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `memocards`.`passed`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `memocards`.`passed` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `date_passed` DATETIME NOT NULL,
  `number_game` INT NOT NULL,
  `score_user` INT NOT NULL,
  `user_id` INT NOT NULL,
  `deck_id` INT NOT NULL,
  PRIMARY KEY (`id`),
  INDEX `fk_passed_user1_idx` (`user_id` ASC) ,
  INDEX `fk_passed_deck1_idx` (`deck_id` ASC) ,
  CONSTRAINT `fk_passed_user1`
    FOREIGN KEY (`user_id`)
    REFERENCES `memocards`.`user` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_passed_deck1`
    FOREIGN KEY (`deck_id`)
    REFERENCES `memocards`.`deck` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `memocards`.`comments_deck`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `memocards`.`comments_deck` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `content` LONGTEXT NOT NULL,
  `autor_id` INT NOT NULL,
  `deck_id` INT NOT NULL,
  PRIMARY KEY (`id`),
  INDEX `fk_comments_deck_deck1_idx` (`deck_id` ASC) ,
  CONSTRAINT `fk_comments_deck_deck1`
    FOREIGN KEY (`deck_id`)
    REFERENCES `memocards`.`deck` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `memocards`.`message`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `memocards`.`message` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `date` DATETIME NOT NULL,
  `content_message` LONGTEXT NOT NULL,
  `autor_id` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `memocards`.`subject`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `memocards`.`subject` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `name` VARCHAR(255) NOT NULL,
  `date_posted` DATETIME NOT NULL,
  `intitule` MEDIUMTEXT NOT NULL,
  `statut` VARCHAR(15) NOT NULL,
  `user_id` INT NOT NULL,
  PRIMARY KEY (`id`),
  INDEX `fk_subject_user1_idx` (`user_id` ASC) ,
  CONSTRAINT `fk_subject_user1`
    FOREIGN KEY (`user_id`)
    REFERENCES `memocards`.`user` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `memocards`.`message_has_subject`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `memocards`.`message_has_subject` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `subject_id` INT NOT NULL,
  `message_id` INT NOT NULL,
  PRIMARY KEY (`id`),
  INDEX `fk_message_has_subject_subject1_idx` (`subject_id` ASC) ,
  INDEX `fk_message_has_subject_message1_idx` (`message_id` ASC) ,
  CONSTRAINT `fk_message_has_subject_subject1`
    FOREIGN KEY (`subject_id`)
    REFERENCES `memocards`.`subject` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_message_has_subject_message1`
    FOREIGN KEY (`message_id`)
    REFERENCES `memocards`.`message` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `memocards`.`categorie`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `memocards`.`categorie` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `name` VARCHAR(255) NOT NULL,
  `description` MEDIUMTEXT NOT NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `memocards`.`categorie_has_deck`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `memocards`.`categorie_has_deck` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `deck_id` INT NOT NULL,
  `categorie_id` INT NOT NULL,
  PRIMARY KEY (`id`),
  INDEX `fk_categorie_has_deck_deck1_idx` (`deck_id` ASC) ,
  INDEX `fk_categorie_has_deck_categorie1_idx` (`categorie_id` ASC) ,
  CONSTRAINT `fk_categorie_has_deck_deck1`
    FOREIGN KEY (`deck_id`)
    REFERENCES `memocards`.`deck` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_categorie_has_deck_categorie1`
    FOREIGN KEY (`categorie_id`)
    REFERENCES `memocards`.`categorie` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `memocards`.`hashtag`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `memocards`.`hashtag` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `name` VARCHAR(255) NOT NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `memocards`.`hashtag_has_deck`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `memocards`.`hashtag_has_deck` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `deck_id` INT NOT NULL,
  `hashtag_id` INT NOT NULL,
  PRIMARY KEY (`id`),
  INDEX `fk_hashtag_has_deck_deck1_idx` (`deck_id` ASC) ,
  INDEX `fk_hashtag_has_deck_hashtag1_idx` (`hashtag_id` ASC) ,
  CONSTRAINT `fk_hashtag_has_deck_deck1`
    FOREIGN KEY (`deck_id`)
    REFERENCES `memocards`.`deck` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_hashtag_has_deck_hashtag1`
    FOREIGN KEY (`hashtag_id`)
    REFERENCES `memocards`.`hashtag` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `memocards`.`hobbies`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `memocards`.`hobbies` (
  `id` INT NOT NULL,
  `hobby` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `memocards`.`hobbies_has_user`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `memocards`.`hobbies_has_user` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `hobbies_id` INT NOT NULL,
  `user_id` INT NOT NULL,
  INDEX `fk_hobbies_has_user_user1_idx` (`user_id` ASC) ,
  INDEX `fk_hobbies_has_user_hobbies1_idx` (`hobbies_id` ASC) ,
  PRIMARY KEY (`id`),
  CONSTRAINT `fk_hobbies_has_user_hobbies1`
    FOREIGN KEY (`hobbies_id`)
    REFERENCES `memocards`.`hobbies` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_hobbies_has_user_user1`
    FOREIGN KEY (`user_id`)
    REFERENCES `memocards`.`user` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;