-- MySQL Workbench Forward Engineering

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION';

-- -----------------------------------------------------
-- Schema rezepteverwaltung
-- -----------------------------------------------------

-- -----------------------------------------------------
-- Schema rezepteverwaltung
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `rezepteverwaltung` DEFAULT CHARACTER SET utf8 ;
USE `rezepteverwaltung` ;

-- -----------------------------------------------------
-- Table `rezepteverwaltung`.`Rezeptname`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `rezepteverwaltung`.`Rezeptname` (
  `rez_id` INT NOT NULL AUTO_INCREMENT,
  `rez_name` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`rez_id`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `rezepteverwaltung`.`Zubereitung`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `rezepteverwaltung`.`Zubereitung` (
  `zub_id` INT NOT NULL AUTO_INCREMENT,
  `zub_beschreibung` TEXT NOT NULL,
  `rez_id` INT NOT NULL,
  PRIMARY KEY (`zub_id`),
  INDEX `fk_Zubereitung_Rezeptname1_idx` (`rez_id` ASC) VISIBLE,
  CONSTRAINT `fk_Zubereitung_Rezeptname1`
    FOREIGN KEY (`rez_id`)
    REFERENCES `rezepteverwaltung`.`Rezeptname` (`rez_id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `rezepteverwaltung`.`Zutat`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `rezepteverwaltung`.`Zutat` (
  `zut_id` INT NOT NULL AUTO_INCREMENT,
  `zut_name` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`zut_id`),
  UNIQUE INDEX `zut_name_UNIQUE` (`zut_name` ASC) VISIBLE)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `rezepteverwaltung`.`Einheit`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `rezepteverwaltung`.`Einheit` (
  `ein_id` INT NOT NULL,
  `ein_name` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`ein_id`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `rezepteverwaltung`.`Zutat_Einheit`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `rezepteverwaltung`.`Zutat_Einheit` (
  `zuei_id` INT NOT NULL AUTO_INCREMENT,
  `zut_id` INT NOT NULL,
  `ein_id` INT NOT NULL,
  PRIMARY KEY (`zuei_id`),
  INDEX `fk_Zutat_has_Einheit_Einheit1_idx` (`ein_id` ASC) VISIBLE,
  INDEX `fk_Zutat_has_Einheit_Zutat_idx` (`zut_id` ASC) VISIBLE,
  CONSTRAINT `fk_Zutat_has_Einheit_Zutat`
    FOREIGN KEY (`zut_id`)
    REFERENCES `rezepteverwaltung`.`Zutat` (`zut_id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_Zutat_has_Einheit_Einheit1`
    FOREIGN KEY (`ein_id`)
    REFERENCES `rezepteverwaltung`.`Einheit` (`ein_id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `rezepteverwaltung`.`Rezept`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `rezepteverwaltung`.`Rezept` (
  `zuei_id` INT NOT NULL,
  `zub_id` INT NOT NULL,
  `zubein_menge` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`zuei_id`, `zub_id`),
  INDEX `fk_Zutat_Einheit_has_Zubereitung_Zubereitung1_idx` (`zub_id` ASC) VISIBLE,
  INDEX `fk_Zutat_Einheit_has_Zubereitung_Zutat_Einheit1_idx` (`zuei_id` ASC) VISIBLE,
  CONSTRAINT `fk_Zutat_Einheit_has_Zubereitung_Zutat_Einheit1`
    FOREIGN KEY (`zuei_id`)
    REFERENCES `rezepteverwaltung`.`Zutat_Einheit` (`zuei_id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_Zutat_Einheit_has_Zubereitung_Zubereitung1`
    FOREIGN KEY (`zub_id`)
    REFERENCES `rezepteverwaltung`.`Zubereitung` (`zub_id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;

-- -----------------------------------------------------
-- Data for table `rezepteverwaltung`.`Rezeptname`
-- -----------------------------------------------------
START TRANSACTION;
USE `rezepteverwaltung`;
INSERT INTO `rezepteverwaltung`.`Rezeptname` (`rez_id`, `rez_name`) VALUES (1, 'Mamorkuchen');
INSERT INTO `rezepteverwaltung`.`Rezeptname` (`rez_id`, `rez_name`) VALUES (2, 'Schnitzerl');
INSERT INTO `rezepteverwaltung`.`Rezeptname` (`rez_id`, `rez_name`) VALUES (3, 'Wiener Schnitzerl');
INSERT INTO `rezepteverwaltung`.`Rezeptname` (`rez_id`, `rez_name`) VALUES (4, 'Kirschkuchen');

COMMIT;


-- -----------------------------------------------------
-- Data for table `rezepteverwaltung`.`Zubereitung`
-- -----------------------------------------------------
START TRANSACTION;
USE `rezepteverwaltung`;
INSERT INTO `rezepteverwaltung`.`Zubereitung` (`zub_id`, `zub_beschreibung`, `rez_id`) VALUES (1, 'Mischen Sie alle Zutaten zu einem Teig', 1);
INSERT INTO `rezepteverwaltung`.`Zubereitung` (`zub_id`, `zub_beschreibung`, `rez_id`) VALUES (2, 'Salzen, nicht klopfen sondern drücken', 2);
INSERT INTO `rezepteverwaltung`.`Zubereitung` (`zub_id`, `zub_beschreibung`, `rez_id`) VALUES (3, 'Verwenden Sie extra dünn geschnittene Filetschnitten', 3);
INSERT INTO `rezepteverwaltung`.`Zubereitung` (`zub_id`, `zub_beschreibung`, `rez_id`) VALUES (4, 'Mixen fertig', 4);
INSERT INTO `rezepteverwaltung`.`Zubereitung` (`zub_id`, `zub_beschreibung`, `rez_id`) VALUES (5, 'Mit Kirschen belegen fertig!', 4);
INSERT INTO `rezepteverwaltung`.`Zubereitung` (`zub_id`, `zub_beschreibung`, `rez_id`) VALUES (6, 'Großer Kuchen!', 4);
INSERT INTO `rezepteverwaltung`.`Zubereitung` (`zub_id`, `zub_beschreibung`, `rez_id`) VALUES (7, 'Alles verrühren und mit Kirschen beleger', 4);

COMMIT;


-- -----------------------------------------------------
-- Data for table `rezepteverwaltung`.`Zutat`
-- -----------------------------------------------------
START TRANSACTION;
USE `rezepteverwaltung`;
INSERT INTO `rezepteverwaltung`.`Zutat` (`zut_id`, `zut_name`) VALUES (1, 'Mehl');
INSERT INTO `rezepteverwaltung`.`Zutat` (`zut_id`, `zut_name`) VALUES (2, 'Eier');
INSERT INTO `rezepteverwaltung`.`Zutat` (`zut_id`, `zut_name`) VALUES (3, 'Salz');
INSERT INTO `rezepteverwaltung`.`Zutat` (`zut_id`, `zut_name`) VALUES (4, 'Kakopulver');

COMMIT;


-- -----------------------------------------------------
-- Data for table `rezepteverwaltung`.`Einheit`
-- -----------------------------------------------------
START TRANSACTION;
USE `rezepteverwaltung`;
INSERT INTO `rezepteverwaltung`.`Einheit` (`ein_id`, `ein_name`) VALUES (1, 'Prise');
INSERT INTO `rezepteverwaltung`.`Einheit` (`ein_id`, `ein_name`) VALUES (2, 'dag');
INSERT INTO `rezepteverwaltung`.`Einheit` (`ein_id`, `ein_name`) VALUES (3, 'Stück');
INSERT INTO `rezepteverwaltung`.`Einheit` (`ein_id`, `ein_name`) VALUES (4, 'kg');

COMMIT;


-- -----------------------------------------------------
-- Data for table `rezepteverwaltung`.`Zutat_Einheit`
-- -----------------------------------------------------
START TRANSACTION;
USE `rezepteverwaltung`;
INSERT INTO `rezepteverwaltung`.`Zutat_Einheit` (`zuei_id`, `zut_id`, `ein_id`) VALUES (1, 1, 2);
INSERT INTO `rezepteverwaltung`.`Zutat_Einheit` (`zuei_id`, `zut_id`, `ein_id`) VALUES (2, 1, 4);
INSERT INTO `rezepteverwaltung`.`Zutat_Einheit` (`zuei_id`, `zut_id`, `ein_id`) VALUES (3, 2, 3);
INSERT INTO `rezepteverwaltung`.`Zutat_Einheit` (`zuei_id`, `zut_id`, `ein_id`) VALUES (4, 3, 1);
INSERT INTO `rezepteverwaltung`.`Zutat_Einheit` (`zuei_id`, `zut_id`, `ein_id`) VALUES (5, 4, 2);

COMMIT;


-- -----------------------------------------------------
-- Data for table `rezepteverwaltung`.`Rezept`
-- -----------------------------------------------------
START TRANSACTION;
USE `rezepteverwaltung`;
INSERT INTO `rezepteverwaltung`.`Rezept` (`zuei_id`, `zub_id`, `zubein_menge`) VALUES (1, 1, '50');
INSERT INTO `rezepteverwaltung`.`Rezept` (`zuei_id`, `zub_id`, `zubein_menge`) VALUES (3, 1, '4');
INSERT INTO `rezepteverwaltung`.`Rezept` (`zuei_id`, `zub_id`, `zubein_menge`) VALUES (4, 1, '1');
INSERT INTO `rezepteverwaltung`.`Rezept` (`zuei_id`, `zub_id`, `zubein_menge`) VALUES (5, 1, '20');
INSERT INTO `rezepteverwaltung`.`Rezept` (`zuei_id`, `zub_id`, `zubein_menge`) VALUES (1, 2, '20');
INSERT INTO `rezepteverwaltung`.`Rezept` (`zuei_id`, `zub_id`, `zubein_menge`) VALUES (3, 2, '2');
INSERT INTO `rezepteverwaltung`.`Rezept` (`zuei_id`, `zub_id`, `zubein_menge`) VALUES (4, 2, '3');

COMMIT;

