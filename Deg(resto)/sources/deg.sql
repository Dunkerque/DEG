SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL,ALLOW_INVALID_DATES';

DROP SCHEMA IF EXISTS `mydb` ;
CREATE SCHEMA IF NOT EXISTS `mydb` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci ;
USE `mydb` ;

-- -----------------------------------------------------
-- Table `mydb`.`users`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `mydb`.`users` ;

CREATE  TABLE IF NOT EXISTS `mydb`.`users` (
  `id_users` INT NOT NULL AUTO_INCREMENT ,
  `login` VARCHAR(45) NOT NULL ,
  `password` VARCHAR(512) NOT NULL ,
  `nom` VARCHAR(45) NOT NULL ,
  `prenom` VARCHAR(45) NOT NULL ,
  `adresse` VARCHAR(45) NOT NULL ,
  `code_postal` VARCHAR(45) NOT NULL ,
  `ville` VARCHAR(45) NOT NULL ,
  `email` VARCHAR(45) NOT NULL ,
  `birthday` DATE NULL ,
  `fidel_point` SMALLINT(6) NULL ,
  PRIMARY KEY (`id_users`) ,
  UNIQUE INDEX `id_users_UNIQUE` (`id_users` ASC) ,
  UNIQUE INDEX `login_UNIQUE` (`login` ASC) ,
  UNIQUE INDEX `email_UNIQUE` (`email` ASC) )
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mydb`.`reservation`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `mydb`.`reservation` ;

CREATE  TABLE IF NOT EXISTS `mydb`.`reservation` (
  `id_reservation` MEDIUMINT(9) NOT NULL AUTO_INCREMENT ,
  `num_tables` SMALLINT(6) NULL ,
  `horaires` DATETIME NOT NULL ,
  `users_id_users` INT NOT NULL ,
  PRIMARY KEY (`id_reservation`) ,
  UNIQUE INDEX `id_reservation_UNIQUE` (`id_reservation` ASC) ,
  INDEX `fk_reservation_users1_idx` (`users_id_users` ASC) ,
  CONSTRAINT `fk_reservation_users1`
    FOREIGN KEY (`users_id_users` )
    REFERENCES `mydb`.`users` (`id_users` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mydb`.`plats`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `mydb`.`plats` ;

CREATE  TABLE IF NOT EXISTS `mydb`.`plats` (
  `id_plats` SMALLINT(6) NOT NULL AUTO_INCREMENT ,
  `nom_plats` VARCHAR(16) NOT NULL ,
  `contenu_plats` VARCHAR(128) NULL ,
  `tarif_plats` VARCHAR(45) NOT NULL ,
  PRIMARY KEY (`id_plats`) ,
  UNIQUE INDEX `id_plats_UNIQUE` (`id_plats` ASC) ,
  UNIQUE INDEX `nom_plats_UNIQUE` (`nom_plats` ASC) )
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mydb`.`menus`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `mydb`.`menus` ;

CREATE  TABLE IF NOT EXISTS `mydb`.`menus` (
  `id_menus` SMALLINT(6) NOT NULL ,
  `nom_menus` VARCHAR(45) NOT NULL ,
  `contenu_menus` VARCHAR(45) NULL ,
  `tarif_menu` VARCHAR(45) NOT NULL ,
  `plats_id_plats` SMALLINT(6) NOT NULL ,
  PRIMARY KEY (`id_menus`) ,
  INDEX `fk_menus_plats1_idx` (`plats_id_plats` ASC) ,
  CONSTRAINT `fk_menus_plats1`
    FOREIGN KEY (`plats_id_plats` )
    REFERENCES `mydb`.`plats` (`id_plats` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;

USE `mydb` ;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
