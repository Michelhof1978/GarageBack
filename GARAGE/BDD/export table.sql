-- MySQL Workbench Forward Engineering

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION';

-- -----------------------------------------------------
-- Schema GARAGE
-- -----------------------------------------------------

-- -----------------------------------------------------
-- Schema GARAGE
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `GARAGE` DEFAULT CHARACTER SET utf8mb4 ;
USE `GARAGE` ;

-- -----------------------------------------------------
-- Table `GARAGE`.`garage`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `GARAGE`.`garage` (
  `idGarage` INT UNSIGNED NOT NULL AUTO_INCREMENT,
  `nom` VARCHAR(45) NULL,
  `adresse` VARCHAR(45) NULL,
  `telephone` VARCHAR(15) NULL,
  PRIMARY KEY (`idGarage`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `GARAGE`.`administrateur`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `GARAGE`.`administrateur` (
  `idADMINISTRATEUR` INT UNSIGNED NOT NULL AUTO_INCREMENT,
  `login` VARCHAR(45) NOT NULL,
  `password` VARCHAR(45) NOT NULL,
  `created_at` DATE NULL,
  `updated_at` DATE NULL,
  `deleted_at` DATE NULL,
  `role` VARCHAR(45) NULL,
  `garage_idGarage` INT UNSIGNED NOT NULL,
  PRIMARY KEY (`idADMINISTRATEUR`, `garage_idGarage`),
  INDEX `fk_administrateur_garage1_idx` (`garage_idGarage` ASC))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `GARAGE`.`employes`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `GARAGE`.`employes` (
  `idEMPLOYES` INT UNSIGNED NOT NULL AUTO_INCREMENT,
  `login` VARCHAR(45) NOT NULL,
  `email` VARCHAR(45) NOT NULL,
  `role` VARCHAR(45) NOT NULL,
  `created_at` DATE NULL,
  `updated_at` DATE NULL,
  `deleted_at` DATE NULL,
  `garage_idGarage` INT UNSIGNED NOT NULL,
  PRIMARY KEY (`idEMPLOYES`, `garage_idGarage`),
  INDEX `fk_employes_garage1_idx` (`garage_idGarage` ASC))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `GARAGE`.`horaires`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `GARAGE`.`horaires` (
  `idHoraires` INT UNSIGNED NOT NULL AUTO_INCREMENT,
  `jour` VARCHAR(15) NOT NULL,
  `heure_matin_ouverture` TIME NULL,
  `heure_matin_fermeture` TIME NULL,
  `heure_apresmidi_ouverture` TIME NULL,
  `heure_apresmidi_fermeture` TIME NULL,
  `updated_at` DATE NULL,
  `garage_idGarage` INT UNSIGNED NOT NULL,
  `ferme` TINYINT NULL,
  PRIMARY KEY (`idHoraires`, `garage_idGarage`),
  INDEX `fk_horaires_garage1_idx` (`garage_idGarage` ASC))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `GARAGE`.`contactform`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `GARAGE`.`contactform` (
  `idContactform` INT UNSIGNED NOT NULL AUTO_INCREMENT,
  `nom` VARCHAR(45) NOT NULL,
  `prenom` VARCHAR(45) NOT NULL,
  `email` VARCHAR(45) NOT NULL,
  `telephone` VARCHAR(15) NOT NULL,
  `message` TEXT NOT NULL,
  `date_reception` DATETIME NULL,
  `lu` TINYINT(0) NULL,
  `garage_idGarage` INT UNSIGNED NOT NULL,
  PRIMARY KEY (`idContactform`, `garage_idGarage`),
  INDEX `fk_contactform_garage1_idx` (`garage_idGarage` ASC))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `GARAGE`.`prestation`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `GARAGE`.`prestation` (
  `idPrestation` INT UNSIGNED NOT NULL AUTO_INCREMENT,
  `nom` VARCHAR(45) NOT NULL,
  `photoPrestation` VARCHAR(45) NOT NULL,
  `description` TEXT NOT NULL,
  `prix` DECIMAL(6,2) NOT NULL,
  `created_at` DATE NULL,
  `updated_at` DATE NULL,
  `deleted_at` DATE NULL,
  `categorie` VARCHAR(45) NOT NULL,
  `garage_idGarage` INT UNSIGNED NOT NULL,
  PRIMARY KEY (`idPrestation`, `garage_idGarage`),
  INDEX `fk_prestation_garage1_idx` (`garage_idGarage` ASC))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `GARAGE`.`avis`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `GARAGE`.`avis` (
  `idAvis` INT UNSIGNED NOT NULL AUTO_INCREMENT,
  `nom` VARCHAR(45) NOT NULL,
  `prenom` VARCHAR(45) NULL,
  `contenu` TEXT NULL,
  `note` DECIMAL(3,2) NULL,
  `created_at` DATE NULL,
  `updated_at` DATE NULL,
  `deleted_at` DATE NULL,
  `garage_idGarage` INT UNSIGNED NOT NULL,
  PRIMARY KEY (`idAvis`, `garage_idGarage`),
  INDEX `fk_avis_garage1_idx` (`garage_idGarage` ASC))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `GARAGE`.`vehicule`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `GARAGE`.`vehicule` (
  `idVehicule` INT UNSIGNED NOT NULL AUTO_INCREMENT,
  `famille` VARCHAR(45) NOT NULL,
  `marque` VARCHAR(45) NOT NULL,
  `modele` VARCHAR(45) NOT NULL,
  `annee` YEAR NOT NULL,
  `kilometrage` INT NOT NULL,
  `boitevitesse` VARCHAR(45) NOT NULL,
  `energie` VARCHAR(45) NOT NULL,
  `datecirculation` DATE NOT NULL,
  `puissance` VARCHAR(45) NOT NULL,
  `places` INT NOT NULL,
  `couleur` VARCHAR(45) NOT NULL,
  `reference` VARCHAR(15) NOT NULL,
  `prix` DECIMAL(9,2) NOT NULL,
  `imageVoiture` VARCHAR(250) NOT NULL,
  `imageCritere` VARCHAR(250) NOT NULL,
  `description` TEXT NOT NULL,
  `created_at` DATE NULL,
  `updated_at` DATE NULL,
  `deleted_at` DATE NULL,
  `garage_idGarage` INT UNSIGNED NOT NULL,
  PRIMARY KEY (`idVehicule`, `garage_idGarage`),
  INDEX `fk_vehicule_garage_idx` (`garage_idGarage` ASC))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `GARAGE`.`utilisateurs`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `GARAGE`.`utilisateurs` (
  `idUtilisateurs` INT UNSIGNED NOT NULL AUTO_INCREMENT,
  `nom` VARCHAR(45) NOT NULL,
  `prenom` VARCHAR(45) NOT NULL,
  `email` VARCHAR(45) NOT NULL,
  `telephone` VARCHAR(15) NOT NULL,
  `garage_idGarage` INT UNSIGNED NOT NULL,
  PRIMARY KEY (`idUtilisateurs`, `garage_idGarage`),
  INDEX `fk_utilisateurs_garage1_idx` (`garage_idGarage` ASC))
ENGINE = InnoDB;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
