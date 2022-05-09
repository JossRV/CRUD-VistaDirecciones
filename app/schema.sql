CREATE SCHEMA `direcciones` DEFAULT CHARACTER SET utf8mb4 ;
CREATE TABLE `direcciones`.`t_direcciones` (
  `id_direccion` INT NOT NULL AUTO_INCREMENT,
  `calle` VARCHAR(45) NULL,
  `colonia` VARCHAR(45) NULL,
  `delegacion` VARCHAR(45) NULL,
  `estado` VARCHAR(45) NULL,
  `CP` VARCHAR(45) NULL,
  PRIMARY KEY (`id_direccion`));
  CREATE TABLE `direcciones`.`t_personas` (
  `id_persona` INT NOT NULL AUTO_INCREMENT,
  `id_direccion` INT NOT NULL,
  `nombre` VARCHAR(45) NULL,
  `paterno` VARCHAR(45) NULL,
  `materno` VARCHAR(45) NULL,
  PRIMARY KEY (`id_persona`),
  INDEX `id_direccion_idx` (`id_direccion` ASC),
  CONSTRAINT `fk_t_personas`
    FOREIGN KEY (`id_direccion`)
    REFERENCES `direcciones`.`t_direcciones` (`id_direccion`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION);
USE `direcciones`;
CREATE  OR REPLACE VIEW `v_personas_direcciones` AS 
SELECT
	persona.id_persona AS idPersona,
    persona.nombre AS nombrePersona,
    persona.paterno AS paterno,
    persona.materno AS materno,
    direccion.calle AS calle,
    direccion.colonia AS colonia,
    direccion.delegacion AS delegacion,
    direccion.estado AS estado,
    direccion.cp AS cp
FROM
	t_personas AS persona
		INNER JOIN
	t_direcciones AS direccion ON persona.id_direccion = direccion.id_direccion;
