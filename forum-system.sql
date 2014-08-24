SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL,ALLOW_INVALID_DATES';

-- -----------------------------------------------------
-- Schema forum_system
-- -----------------------------------------------------
DROP SCHEMA IF EXISTS `forum_system` ;
CREATE SCHEMA IF NOT EXISTS `forum_system` DEFAULT CHARACTER SET utf8 ;
USE `forum_system` ;

-- -----------------------------------------------------
-- Table `forum_system`.`users`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `forum_system`.`users` ;

CREATE TABLE IF NOT EXISTS `forum_system`.`users` (
  `user_id` INT(11) NOT NULL AUTO_INCREMENT,
  `username` VARCHAR(50) NOT NULL,
  `password` VARCHAR(150) NOT NULL,
  `email` VARCHAR(50) NOT NULL,
  `avatar_path` VARCHAR(100) NULL,
  `auth_token` VARCHAR(150) NULL DEFAULT NULL,
  `registered_on` DATETIME NOT NULL DEFAULT NOW(),
  PRIMARY KEY (`user_id`),
  UNIQUE INDEX `username_UNIQUE` (`username` ASC),
  UNIQUE INDEX `email_UNIQUE` (`email` ASC))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `forum_system`.`categories`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `forum_system`.`categories` ;

CREATE TABLE IF NOT EXISTS `forum_system`.`categories` (
  `category_id` INT NOT NULL AUTO_INCREMENT,
  `name` VARCHAR(80) NOT NULL,
  PRIMARY KEY (`category_id`),
  UNIQUE INDEX `name_UNIQUE` (`name` ASC))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `forum_system`.`questions`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `forum_system`.`questions` ;

CREATE TABLE IF NOT EXISTS `forum_system`.`questions` (
  `question_id` INT(11) NOT NULL AUTO_INCREMENT,
  `title` VARCHAR(50) NOT NULL,
  `text` TEXT NOT NULL,
  `user_id` INT(11) NOT NULL,
  `category_id` INT NOT NULL,
  PRIMARY KEY (`question_id`),
  INDEX `fk_questions_users1_idx` (`user_id` ASC),
  INDEX `fk_questions_categories1_idx` (`category_id` ASC),
  CONSTRAINT `fk_questions_users1`
    FOREIGN KEY (`user_id`)
    REFERENCES `forum_system`.`users` (`user_id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_questions_categories1`
    FOREIGN KEY (`category_id`)
    REFERENCES `forum_system`.`categories` (`category_id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `forum_system`.`tags`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `forum_system`.`tags` ;

CREATE TABLE IF NOT EXISTS `forum_system`.`tags` (
  `tag_id` INT(11) NOT NULL AUTO_INCREMENT,
  `name` VARCHAR(40) NOT NULL,
  PRIMARY KEY (`tag_id`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `forum_system`.`questions_tags`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `forum_system`.`questions_tags` ;

CREATE TABLE IF NOT EXISTS `forum_system`.`questions_tags` (
  `question_id` INT(11) NOT NULL,
  `tag_id` INT(11) NOT NULL,
  INDEX `fk_questions_tags_questions_idx` (`question_id` ASC),
  INDEX `fk_questions_tags_tags1_idx` (`tag_id` ASC),
  CONSTRAINT `fk_questions_tags_questions`
    FOREIGN KEY (`question_id`)
    REFERENCES `forum_system`.`questions` (`question_id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_questions_tags_tags1`
    FOREIGN KEY (`tag_id`)
    REFERENCES `forum_system`.`tags` (`tag_id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `forum_system`.`answers`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `forum_system`.`answers` ;

CREATE TABLE IF NOT EXISTS `forum_system`.`answers` (
  `answer_id` INT NOT NULL AUTO_INCREMENT,
  `text` TEXT NOT NULL,
  `date_created` DATETIME NOT NULL DEFAULT NOW(),
  `question_id` INT(11) NOT NULL,
  `users_user_id` INT(11) NOT NULL,
  PRIMARY KEY (`answer_id`),
  INDEX `fk_answers_questions1_idx` (`question_id` ASC),
  INDEX `fk_answers_users1_idx` (`users_user_id` ASC),
  CONSTRAINT `fk_answers_questions1`
    FOREIGN KEY (`question_id`)
    REFERENCES `forum_system`.`questions` (`question_id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_answers_users1`
    FOREIGN KEY (`users_user_id`)
    REFERENCES `forum_system`.`users` (`user_id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;