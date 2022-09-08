
CREATE SCHEMA IF NOT EXISTS `odisseia` DEFAULT CHARACTER SET utf8 ;
USE `odisseia` ;

-- -----------------------------------------------------
-- Table `odisseia`.`usuario`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `odisseia`.`usuario` (
  `idusuario` INT NOT NULL AUTO_INCREMENT,
  `nome` VARCHAR(200) NULL,
  `login` VARCHAR(200) NULL,
  `email` VARCHAR(200) NULL,
  `senha` VARCHAR(200) NULL,
  `sobre` VARCHAR(200) NULL,
  `regiao` VARCHAR(200) NULL,
  `website` VARCHAR(200) NULL,
  PRIMARY KEY (`idusuario`))



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
    REFERENCES `odisseia`.`usuario` (`idusuario`)
    ON DELETE CASCADE
    ON UPDATE CASCADE)



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
  `astrofoto` VARCHAR(250) NULL,
  `idusuario` INT NOT NULL,
  PRIMARY KEY (`idartigos`),
  CONSTRAINT `fk_artigos_usuario1`
    FOREIGN KEY (`idusuario`)
    REFERENCES `odisseia`.`usuario` (`idusuario`)
    ON DELETE CASCADE
    ON UPDATE CASCADE)



-- -----------------------------------------------------
-- Table `odisseia`.`simulacao`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `odisseia`.`simulacao` (
  `idsimulacao` INT NOT NULL AUTO_INCREMENT,
  `nome_simu` VARCHAR(250) NULL,
  `descricao` VARCHAR(250) NULL,
  PRIMARY KEY (`idsimulacao`))



-- -----------------------------------------------------
-- Table `odisseia`.`historico`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `odisseia`.`historico` (
  `idusuario` INT NOT NULL AUTO_INCREMENT,
  `idsimulacao` INT NOT NULL AUTO_INCREMENT,
  `raio` DECIMAL NULL,
  `cor` VARCHAR(200) NULL,
  `distancia` VARCHAR(200) NULL,
  `data` DATE NULL,
  PRIMARY KEY (`idusuario`, `idsimulacao`),
  CONSTRAINT `fk_usuario_has_simulacao_usuario1`
    FOREIGN KEY (`idusuario`)
    REFERENCES `odisseia`.`usuario` (`idusuario`)
    ON DELETE CASCADE
    ON UPDATE CASCADE,
  CONSTRAINT `fk_usuario_has_simulacao_simulacao1`
    FOREIGN KEY (`idsimulacao`)
    REFERENCES `odisseia`.`simulacao` (`idsimulacao`)
    ON DELETE CASCADE
    ON UPDATE CASCADE)


