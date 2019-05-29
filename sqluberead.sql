-- MySQL Workbench Forward Engineering

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL,ALLOW_INVALID_DATES';

-- -----------------------------------------------------
-- Schema mydb
-- -----------------------------------------------------

-- -----------------------------------------------------
-- Schema mydb
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `mydb` DEFAULT CHARACTER SET utf8 ;
-- -----------------------------------------------------
-- Schema ubereat
-- -----------------------------------------------------

-- -----------------------------------------------------
-- Schema ubereat
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `ubereat` DEFAULT CHARACTER SET latin1 ;
USE `mydb` ;

-- -----------------------------------------------------
-- Table `mydb`.`categoria`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `mydb`.`categoria` (
  `idcategoria` INT NOT NULL AUTO_INCREMENT,
  `descr` VARCHAR(45) NULL,
  PRIMARY KEY (`idcategoria`))
ENGINE = InnoDB;

USE `ubereat` ;

-- -----------------------------------------------------
-- Table `ubereat`.`clientes`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `ubereat`.`clientes` (
  `id` INT(11) NOT NULL AUTO_INCREMENT,
  `name` VARCHAR(100) NOT NULL,
  `contact` VARCHAR(100) NOT NULL,
  `address` VARCHAR(100) NOT NULL,
  `note` VARCHAR(100) NOT NULL,
  PRIMARY KEY (`id`, `name`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = latin1;


-- -----------------------------------------------------
-- Table `ubereat`.`Proveedor`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `ubereat`.`Proveedor` (
  `id` INT(11) NOT NULL AUTO_INCREMENT,
  `suppliername` VARCHAR(100) NOT NULL,
  `contactperson` VARCHAR(100) NOT NULL,
  `address` VARCHAR(100) NOT NULL,
  `contactno` VARCHAR(11) NOT NULL,
  `note` VARCHAR(200) NOT NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = latin1;


-- -----------------------------------------------------
-- Table `ubereat`.`Productos`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `ubereat`.`Productos` (
  `id` INT(11) NOT NULL AUTO_INCREMENT,
  `name` VARCHAR(100) NOT NULL,
  `quantity` INT(11) NOT NULL,
  `purchase` INT(11) NOT NULL,
  `retail` INT(11) NOT NULL,
  `categoria_idcategoria` INT NOT NULL,
  `Proveedor_id` INT(11) NOT NULL,
  PRIMARY KEY (`id`),
  INDEX `fk_Productos_categoria1_idx` (`categoria_idcategoria` ASC),
  INDEX `fk_Productos_Proveedor1_idx` (`Proveedor_id` ASC))
ENGINE = InnoDB
DEFAULT CHARACTER SET = latin1;


-- -----------------------------------------------------
-- Table `ubereat`.`usuarios`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `ubereat`.`usuarios` (
  `userid` INT(11) NOT NULL AUTO_INCREMENT,
  `username` VARCHAR(50) NOT NULL,
  `password` VARCHAR(50) NOT NULL,
  `access` VARCHAR(50) NOT NULL,
  PRIMARY KEY (`userid`))
ENGINE = InnoDB
AUTO_INCREMENT = 3
DEFAULT CHARACTER SET = latin1;


-- -----------------------------------------------------
-- Table `ubereat`.`ventas`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `ubereat`.`ventas` (
  `id` INT(11) NOT NULL AUTO_INCREMENT,
  `clientes_id` INT(11) NOT NULL,
  `userid` INT(11) NOT NULL,
  `fecha` DATE NOT NULL,
  `total` INT(11) NOT NULL,
  `licitado` INT(11) NOT NULL,
  `cambiado` INT(11) NOT NULL,
  PRIMARY KEY (`id`),
  INDEX `fk_sales_users1_idx` (`userid` ASC),
  INDEX `fk_ventas_clientes1_idx` (`clientes_id` ASC))
ENGINE = InnoDB
DEFAULT CHARACTER SET = latin1;


-- -----------------------------------------------------
-- Table `ubereat`.`ventas_has_Productos`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `ubereat`.`ventas_has_Productos` (
  `ventas_id` INT(11) NOT NULL,
  `Productos_id` INT(11) NOT NULL,
  PRIMARY KEY (`ventas_id`, `Productos_id`),
  INDEX `fk_ventas_has_Productos_Productos1_idx` (`Productos_id` ASC),
  INDEX `fk_ventas_has_Productos_ventas1_idx` (`ventas_id` ASC))
ENGINE = InnoDB
DEFAULT CHARACTER SET = latin1;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
