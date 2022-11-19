
-- Schema odisseia
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `odisseia` DEFAULT CHARACTER SET utf8 ;
USE `odisseia` ;

-- -----------------------------------------------------
-- Table `odisseia`.`usuario`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `odisseia`.`usuario` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `nome` VARCHAR(200) NULL,
  `login` VARCHAR(200) NULL,
  `email` VARCHAR(200) NULL,
  `senha` VARCHAR(200) NULL,
  `sobre` VARCHAR(200) NULL,
  `regiao` VARCHAR(200) NULL,
  `website` VARCHAR(200) NULL,
  `ficheiro` VARCHAR(255) NULL,

  PRIMARY KEY (`id`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `odisseia`.`astrofotografia`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `odisseia`.`astrofotografia` (
  `idastro` INT NOT NULL AUTO_INCREMENT,
  `nome_astro` VARCHAR(200) NULL,
  `equipamento` VARCHAR(200) NULL,
  `detalhes` VARCHAR(200) NULL,
  `ficheiro` VARCHAR(255) NULL,
  `idusuario` INT NOT NULL,
  PRIMARY KEY (`idastro`),
  CONSTRAINT `fk_astrofotografia_usuario`
    FOREIGN KEY (`idusuario`)
    REFERENCES `odisseia`.`usuario` (`id`)
    ON DELETE CASCADE
    ON UPDATE CASCADE)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `odisseia`.`artigos`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `odisseia`.`artigos` (
  `idartigos` INT NOT NULL AUTO_INCREMENT,
  `nome_art` VARCHAR(200) NULL,
  `texto` VARCHAR(200) NULL,
  `infos` VARCHAR(200) NULL,
  `ficheiroI` VARCHAR(255) NULL,
  `ficheiroII` VARCHAR(255) NULL,
  `idusuario` INT NOT NULL,
  PRIMARY KEY (`idartigos`),
  CONSTRAINT `fk_artigos_usuario1`
    FOREIGN KEY (`idusuario`)
    REFERENCES `odisseia`.`usuario` (`id`)
    ON DELETE CASCADE
    ON UPDATE CASCADE)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `odisseia`.`anexos`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `odisseia`.`anexos` (
  `idastro` INT NOT NULL,
  `idartigos` INT NOT NULL,
  PRIMARY KEY (`idastro`, `idartigos`),
  CONSTRAINT `fk_astrofotografia_has_artigos_astrofotografia1`
    FOREIGN KEY (`idastro`)
    REFERENCES `odisseia`.`astrofotografia` (`idastro`)
    ON DELETE CASCADE
    ON UPDATE CASCADE,
  CONSTRAINT `fk_astrofotografia_has_artigos_artigos1`
    FOREIGN KEY (`idartigos`)
    REFERENCES `odisseia`.`artigos` (`idartigos`)
    ON DELETE CASCADE
    ON UPDATE CASCADE)
ENGINE = InnoDB;

