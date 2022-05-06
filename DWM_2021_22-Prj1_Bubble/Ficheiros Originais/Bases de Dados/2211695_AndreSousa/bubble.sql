-- MySQL Workbench Forward Engineering

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION';

-- -----------------------------------------------------
-- Schema mydb
-- -----------------------------------------------------

-- -----------------------------------------------------
-- Schema mydb
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `mydb` DEFAULT CHARACTER SET utf8 ;
USE `mydb` ;

-- -----------------------------------------------------
-- Table `mydb`.`Utilizador`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `mydb`.`Utilizador` (
  `IDUtilizador` INT GENERATED ALWAYS AS () VIRTUAL,
  `Nome` VARCHAR(45) NULL,
  `Apelido` VARCHAR(45) NULL,
  `email` VARCHAR(45) NULL,
  `telefone` VARCHAR(13) NULL,
  `tipoConta` INT GENERATED ALWAYS AS () VIRTUAL,
  `DataAdesao` DATE GENERATED ALWAYS AS () VIRTUAL,
  `DataNascimento` DATE NULL,
  `EstadoConta` INT GENERATED ALWAYS AS () VIRTUAL,
  `fotoPerfil` VARCHAR(45) NULL,
  `fotoCapa` VARCHAR(45) NULL,
  PRIMARY KEY (`IDUtilizador`),
  UNIQUE INDEX `IDUtilizador_UNIQUE` (`IDUtilizador` ASC) VISIBLE,
  UNIQUE INDEX `Nome_UNIQUE` (`Nome` ASC) VISIBLE,
  UNIQUE INDEX `Apelido_UNIQUE` (`Apelido` ASC) VISIBLE,
  UNIQUE INDEX `telefone_UNIQUE` (`telefone` ASC) VISIBLE,
  UNIQUE INDEX `email_UNIQUE` (`email` ASC) VISIBLE)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mydb`.`Publicacoes`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `mydb`.`Publicacoes` (
  `IDPub` INT GENERATED ALWAYS AS () VIRTUAL,
  `Titulo` VARCHAR(45) NOT NULL,
  `Desc` LONGTEXT NOT NULL,
  `num_comentarios` INT NULL,
  `num_likes` INT NULL,
  `DataPublicacao` DATE NOT NULL,
  `CaminhoFoto` VARCHAR(45) NULL,
  `Utilizador_IDUtilizador` INT NOT NULL,
  PRIMARY KEY (`IDPub`, `Utilizador_IDUtilizador`),
  UNIQUE INDEX `IDUtilizador_UNIQUE` (`IDPub` ASC) VISIBLE,
  INDEX `fk_Publicacoes_Utilizador1_idx` (`Utilizador_IDUtilizador` ASC) VISIBLE,
  CONSTRAINT `fk_Publicacoes_Utilizador1`
    FOREIGN KEY (`Utilizador_IDUtilizador`)
    REFERENCES `mydb`.`Utilizador` (`IDUtilizador`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mydb`.`Mensagens`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `mydb`.`Mensagens` (
  `IDMensagem` INT GENERATED ALWAYS AS () VIRTUAL,
  `DataEnvio` DATE NULL,
  `DataVista` DATE NULL,
  `Mensagem` VARCHAR(45) NULL,
  `Utilizador_IDUtilizador` INT NOT NULL,
  PRIMARY KEY (`IDMensagem`, `Utilizador_IDUtilizador`),
  UNIQUE INDEX `IDUtilizador_UNIQUE` (`IDMensagem` ASC) VISIBLE,
  UNIQUE INDEX `Nome_UNIQUE` (`DataEnvio` ASC) VISIBLE,
  UNIQUE INDEX `Apelido_UNIQUE` (`DataVista` ASC) VISIBLE,
  INDEX `fk_Mensagens_Utilizador1_idx` (`Utilizador_IDUtilizador` ASC) VISIBLE,
  CONSTRAINT `fk_Mensagens_Utilizador1`
    FOREIGN KEY (`Utilizador_IDUtilizador`)
    REFERENCES `mydb`.`Utilizador` (`IDUtilizador`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mydb`.`Amizades`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `mydb`.`Amizades` (
  `IDPedido` INT GENERATED ALWAYS AS () VIRTUAL,
  `Destinatario` VARCHAR(45) NOT NULL,
  `Remetente` VARCHAR(45) NOT NULL,
  `Estado` VARCHAR(45) NOT NULL,
  `DataPedido` VARCHAR(45) NOT NULL,
  `DataAmizade` VARCHAR(45) NOT NULL,
  `Utilizador_IDUtilizador` INT NOT NULL,
  PRIMARY KEY (`IDPedido`, `Utilizador_IDUtilizador`),
  INDEX `fk_Amizades_Utilizador1_idx` (`Utilizador_IDUtilizador` ASC) VISIBLE,
  CONSTRAINT `fk_Amizades_Utilizador1`
    FOREIGN KEY (`Utilizador_IDUtilizador`)
    REFERENCES `mydb`.`Utilizador` (`IDUtilizador`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mydb`.`Comentarios`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `mydb`.`Comentarios` (
  `IDComentario` INT GENERATED ALWAYS AS () VIRTUAL,
  `Comentario` VARCHAR(45) NULL,
  `DataComentario` VARCHAR(45) NULL,
  `Utilizador_IDUtilizador` INT NOT NULL,
  PRIMARY KEY (`IDComentario`, `Utilizador_IDUtilizador`),
  UNIQUE INDEX `IDUtilizador_UNIQUE` (`IDComentario` ASC) VISIBLE,
  INDEX `fk_Comentarios_Utilizador1_idx` (`Utilizador_IDUtilizador` ASC) VISIBLE,
  CONSTRAINT `fk_Comentarios_Utilizador1`
    FOREIGN KEY (`Utilizador_IDUtilizador`)
    REFERENCES `mydb`.`Utilizador` (`IDUtilizador`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mydb`.`Notificacoes`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `mydb`.`Notificacoes` (
  `IDNotifi` INT GENERATED ALWAYS AS () VIRTUAL,
  `Vista` VARCHAR(45) NULL,
  `Utilizador_IDUtilizador` INT NOT NULL,
  PRIMARY KEY (`IDNotifi`, `Utilizador_IDUtilizador`),
  UNIQUE INDEX `IDUtilizador_UNIQUE` (`IDNotifi` ASC) VISIBLE,
  INDEX `fk_Notificacoes_Utilizador1_idx` (`Utilizador_IDUtilizador` ASC) VISIBLE,
  CONSTRAINT `fk_Notificacoes_Utilizador1`
    FOREIGN KEY (`Utilizador_IDUtilizador`)
    REFERENCES `mydb`.`Utilizador` (`IDUtilizador`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mydb`.`DefinicoesSite`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `mydb`.`DefinicoesSite` (
  `IDPag` INT GENERATED ALWAYS AS () VIRTUAL,
  `ficheiroCSS` VARCHAR(45) NOT NULL,
  `url` VARCHAR(45) NOT NULL,
  `tituloPag` VARCHAR(45) NOT NULL,
  `KeywordsPag` VARCHAR(45) NOT NULL,
  `descricaoSite` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`IDPag`),
  UNIQUE INDEX `IDUtilizador_UNIQUE` (`IDPag` ASC) VISIBLE,
  UNIQUE INDEX `url_UNIQUE` (`url` ASC) VISIBLE)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mydb`.`FAQS`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `mydb`.`FAQS` (
  `IDFaq` INT GENERATED ALWAYS AS () VIRTUAL,
  `Titulo` VARCHAR(45) NOT NULL,
  `Desc` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`IDFaq`),
  UNIQUE INDEX `IDUtilizador_UNIQUE` (`IDFaq` ASC) VISIBLE)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mydb`.`Empregos`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `mydb`.`Empregos` (
  `IDEmprego` INT GENERATED ALWAYS AS () VIRTUAL,
  `Titulo` VARCHAR(45) NOT NULL,
  `DataPub` DATE NULL,
  `Localizacao` VARCHAR(45) NOT NULL,
  `SalarioMinimo` INT NULL,
  `Tipo` VARCHAR(20) NOT NULL,
  `Horarios` VARCHAR(45) NOT NULL,
  `Categorias` VARCHAR(45) NULL,
  `SalarioMaximo` INT NULL,
  `Descricao` VARCHAR(255) NULL,
  `Utilizador_IDUtilizador` INT NOT NULL,
  PRIMARY KEY (`IDEmprego`, `Utilizador_IDUtilizador`),
  UNIQUE INDEX `IDEmprego_UNIQUE` (`IDEmprego` ASC) VISIBLE,
  INDEX `fk_Empregos_Utilizador1_idx` (`Utilizador_IDUtilizador` ASC) VISIBLE,
  CONSTRAINT `fk_Empregos_Utilizador1`
    FOREIGN KEY (`Utilizador_IDUtilizador`)
    REFERENCES `mydb`.`Utilizador` (`IDUtilizador`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mydb`.`Empresas`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `mydb`.`Empresas` (
  `IDEvento` INT GENERATED ALWAYS AS () VIRTUAL,
  `Nome` VARCHAR(45) NOT NULL,
  `descricao` VARCHAR(45) NOT NULL,
  `localizacao` VARCHAR(45) NOT NULL,
  `especialidade` VARCHAR(45) NOT NULL,
  `fotoPerfil` VARCHAR(45) NULL,
  `fotoCapa` VARCHAR(45) NULL,
  `Utilizador_IDUtilizador` INT NOT NULL,
  PRIMARY KEY (`IDEvento`, `Utilizador_IDUtilizador`),
  UNIQUE INDEX `IDUtilizador_UNIQUE` (`IDEvento` ASC) VISIBLE,
  UNIQUE INDEX `url_UNIQUE` (`descricao` ASC) VISIBLE,
  INDEX `fk_Empresas_Utilizador1_idx` (`Utilizador_IDUtilizador` ASC) VISIBLE,
  CONSTRAINT `fk_Empresas_Utilizador1`
    FOREIGN KEY (`Utilizador_IDUtilizador`)
    REFERENCES `mydb`.`Utilizador` (`IDUtilizador`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mydb`.`Eventos`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `mydb`.`Eventos` (
  `IDEvento` INT GENERATED ALWAYS AS () VIRTUAL,
  `Nome` VARCHAR(45) NOT NULL,
  `descricao` VARCHAR(45) NOT NULL,
  `localizacao` VARCHAR(45) NOT NULL,
  `tipo` VARCHAR(45) NOT NULL,
  `CaminhoFoto` VARCHAR(45) NULL,
  `Utilizador_IDUtilizador` INT NOT NULL,
  PRIMARY KEY (`IDEvento`, `Utilizador_IDUtilizador`),
  UNIQUE INDEX `IDUtilizador_UNIQUE` (`IDEvento` ASC) VISIBLE,
  UNIQUE INDEX `url_UNIQUE` (`descricao` ASC) VISIBLE,
  INDEX `fk_Eventos_Utilizador1_idx` (`Utilizador_IDUtilizador` ASC) VISIBLE,
  CONSTRAINT `fk_Eventos_Utilizador1`
    FOREIGN KEY (`Utilizador_IDUtilizador`)
    REFERENCES `mydb`.`Utilizador` (`IDUtilizador`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mydb`.`Comunidades`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `mydb`.`Comunidades` (
  `IDComunidade` INT GENERATED ALWAYS AS () VIRTUAL,
  `Nome` VARCHAR(45) NOT NULL,
  `descricao` VARCHAR(45) NOT NULL,
  `identificador` VARCHAR(45) NOT NULL,
  `Utilizador_IDUtilizador` INT NOT NULL,
  PRIMARY KEY (`IDComunidade`, `Utilizador_IDUtilizador`),
  UNIQUE INDEX `IDUtilizador_UNIQUE` (`IDComunidade` ASC) VISIBLE,
  UNIQUE INDEX `url_UNIQUE` (`descricao` ASC) VISIBLE,
  UNIQUE INDEX `identificador_UNIQUE` (`identificador` ASC) VISIBLE,
  INDEX `fk_Comunidades_Utilizador1_idx` (`Utilizador_IDUtilizador` ASC) VISIBLE,
  CONSTRAINT `fk_Comunidades_Utilizador1`
    FOREIGN KEY (`Utilizador_IDUtilizador`)
    REFERENCES `mydb`.`Utilizador` (`IDUtilizador`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mydb`.`Marketplace`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `mydb`.`Marketplace` (
  `IDAnuncio` INT GENERATED ALWAYS AS () VIRTUAL,
  `Nome` VARCHAR(45) NOT NULL,
  `descricao` VARCHAR(45) NOT NULL,
  `tipo` VARCHAR(45) NOT NULL,
  `caminhoFoto` VARCHAR(45) NOT NULL,
  `Utilizador_IDUtilizador` INT NOT NULL,
  PRIMARY KEY (`IDAnuncio`, `Utilizador_IDUtilizador`, `caminhoFoto`),
  UNIQUE INDEX `IDUtilizador_UNIQUE` (`IDAnuncio` ASC) VISIBLE,
  UNIQUE INDEX `url_UNIQUE` (`descricao` ASC) VISIBLE,
  INDEX `fk_Marketplace_Utilizador1_idx` (`Utilizador_IDUtilizador` ASC) VISIBLE,
  CONSTRAINT `fk_Marketplace_Utilizador1`
    FOREIGN KEY (`Utilizador_IDUtilizador`)
    REFERENCES `mydb`.`Utilizador` (`IDUtilizador`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mydb`.`guardado`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `mydb`.`guardado` (
  `Utilizador_IDUtilizador` INT NOT NULL,
  `Publicacoes_IDPub` INT NOT NULL,
  `Publicacoes_Utilizador_IDUtilizador` INT NOT NULL,
  PRIMARY KEY (`Utilizador_IDUtilizador`, `Publicacoes_IDPub`, `Publicacoes_Utilizador_IDUtilizador`),
  INDEX `fk_guardado_Publicacoes1_idx` (`Publicacoes_IDPub` ASC, `Publicacoes_Utilizador_IDUtilizador` ASC) VISIBLE,
  CONSTRAINT `fk_guardado_Utilizador1`
    FOREIGN KEY (`Utilizador_IDUtilizador`)
    REFERENCES `mydb`.`Utilizador` (`IDUtilizador`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_guardado_Publicacoes1`
    FOREIGN KEY (`Publicacoes_IDPub` , `Publicacoes_Utilizador_IDUtilizador`)
    REFERENCES `mydb`.`Publicacoes` (`IDPub` , `Utilizador_IDUtilizador`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mydb`.`DefinicoesUser`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `mydb`.`DefinicoesUser` (
  `DarkMode` INT NULL,
  `Utilizador_IDUtilizador` INT NOT NULL,
  PRIMARY KEY (`Utilizador_IDUtilizador`),
  CONSTRAINT `fk_DefinicoesUser_Utilizador1`
    FOREIGN KEY (`Utilizador_IDUtilizador`)
    REFERENCES `mydb`.`Utilizador` (`IDUtilizador`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
