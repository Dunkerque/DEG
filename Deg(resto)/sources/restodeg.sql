SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL,ALLOW_INVALID_DATES';

DROP SCHEMA IF EXISTS `restodeg` ;
CREATE SCHEMA IF NOT EXISTS `restodeg` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci ;
USE `restodeg` ;

-- -----------------------------------------------------
-- Table `restodeg`.`users`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `restodeg`.`users` ;

CREATE  TABLE IF NOT EXISTS `restodeg`.`users` (
  `id_users` MEDIUMINT(9) NOT NULL AUTO_INCREMENT ,
  `login` VARCHAR(45) NOT NULL ,
  `password` VARCHAR(512) NOT NULL ,
  `email` VARCHAR(45) NOT NULL ,
  `nom` VARCHAR(45) NOT NULL ,
  `prenom` VARCHAR(45) NOT NULL ,
  `adresse` VARCHAR(45) NOT NULL ,
  `code_postal` VARCHAR(45) NOT NULL ,
  `ville` VARCHAR(45) NOT NULL ,
  `info_complementaire` VARCHAR(45) NULL ,
  `birthday` DATE NULL ,
  `fidel_point` SMALLINT(6) NULL ,
  PRIMARY KEY (`id_users`) ,
  UNIQUE INDEX `id_users_UNIQUE` (`id_users` ASC) ,
  UNIQUE INDEX `login_UNIQUE` (`login` ASC) )
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `restodeg`.`reservation`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `restodeg`.`reservation` ;

CREATE  TABLE IF NOT EXISTS `restodeg`.`reservation` (
  `id_reservation` MEDIUMINT(9) NOT NULL AUTO_INCREMENT ,
  `num_tables` SMALLINT(6) NULL ,
  `horaires` DATETIME NOT NULL ,
  `users_id_users` MEDIUMINT(9) NOT NULL ,
  PRIMARY KEY (`id_reservation`) ,
  UNIQUE INDEX `id_reservation_UNIQUE` (`id_reservation` ASC) ,
  INDEX `fk_reservation_users1_idx` (`users_id_users` ASC) ,
  CONSTRAINT `fk_reservation_users1`
    FOREIGN KEY (`users_id_users` )
    REFERENCES `restodeg`.`users` (`id_users` )
    ON DELETE CASCADE
    ON UPDATE CASCADE)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `restodeg`.`plats`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `restodeg`.`plats` ;

CREATE  TABLE IF NOT EXISTS `restodeg`.`plats` (
  `id_plats` SMALLINT(6) NOT NULL AUTO_INCREMENT ,
  `nom_plats` VARCHAR(16) NOT NULL ,
  `contenu_plats` VARCHAR(128) NULL ,
  `tarif_plats` VARCHAR(45) NOT NULL ,
  PRIMARY KEY (`id_plats`) ,
  UNIQUE INDEX `id_plats_UNIQUE` (`id_plats` ASC) ,
  UNIQUE INDEX `nom_plats_UNIQUE` (`nom_plats` ASC) )
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `restodeg`.`menus`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `restodeg`.`menus` ;

CREATE  TABLE IF NOT EXISTS `restodeg`.`menus` (
  `id_menus` SMALLINT(6) NOT NULL ,
  `nom_menus` VARCHAR(45) NOT NULL ,
  `contenu_menus` VARCHAR(45) NULL ,
  `tarif_menu` VARCHAR(45) NOT NULL ,
  `plats_id_plats` SMALLINT(6) NOT NULL ,
  PRIMARY KEY (`id_menus`) ,
  INDEX `fk_menus_plats1_idx` (`plats_id_plats` ASC) ,
  CONSTRAINT `fk_menus_plats1`
    FOREIGN KEY (`plats_id_plats` )
    REFERENCES `restodeg`.`plats` (`id_plats` )
    ON DELETE CASCADE
    ON UPDATE CASCADE)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `restodeg`.`Commandes`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `restodeg`.`Commandes` ;

CREATE  TABLE IF NOT EXISTS `restodeg`.`Commandes` (
  `id_cmd` INT(11) NOT NULL AUTO_INCREMENT ,
  `a_emporter` TINYINT(1) NULL ,
  `livraison` TINYINT(1) NULL ,
  `cmd_en_attentes` TINYINT(1) NULL ,
  `cmd_en_cours` TINYINT(1) NULL ,
  `cmd_prêtes` TINYINT(1) NULL ,
  `cmd_livraison_en_cours` TINYINT(1) NULL ,
  `tarif_cmd` DOUBLE NULL ,
  `users_id_users` MEDIUMINT(9) NOT NULL ,
  `plats_id_plats` SMALLINT(6) NOT NULL ,
  `menus_id_menus` SMALLINT(6) NOT NULL ,
  PRIMARY KEY (`id_cmd`) ,
  UNIQUE INDEX `id_commandes_UNIQUE` (`id_cmd` ASC) ,
  INDEX `fk_Commandes_users1_idx` (`users_id_users` ASC) ,
  INDEX `fk_Commandes_plats1_idx` (`plats_id_plats` ASC) ,
  INDEX `fk_Commandes_menus1_idx` (`menus_id_menus` ASC) ,
  CONSTRAINT `fk_Commandes_users1`
    FOREIGN KEY (`users_id_users` )
    REFERENCES `restodeg`.`users` (`id_users` )
    ON DELETE CASCADE
    ON UPDATE CASCADE,
  CONSTRAINT `fk_Commandes_plats1`
    FOREIGN KEY (`plats_id_plats` )
    REFERENCES `restodeg`.`plats` (`id_plats` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_Commandes_menus1`
    FOREIGN KEY (`menus_id_menus` )
    REFERENCES `restodeg`.`menus` (`id_menus` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `restodeg`.`livre_or`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `restodeg`.`livre_or` ;

CREATE  TABLE IF NOT EXISTS `restodeg`.`livre_or` (
  `id_livre_or` INT NOT NULL ,
  `date` DATE NULL ,
  `commentaires` VARCHAR(45) NULL ,
  `users_id_users` MEDIUMINT(9) NOT NULL ,
  PRIMARY KEY (`id_livre_or`) ,
  INDEX `fk_livre_or_users1_idx` (`users_id_users` ASC) ,
  CONSTRAINT `fk_livre_or_users1`
    FOREIGN KEY (`users_id_users` )
    REFERENCES `restodeg`.`users` (`id_users` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;

USE `restodeg` ;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
