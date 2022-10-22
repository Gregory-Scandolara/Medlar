-- --------------------------------------------------------
-- Servidor:                     127.0.0.1
-- Versão do servidor:           8.0.30 - MySQL Community Server - GPL
-- OS do Servidor:               Win64
-- HeidiSQL Versão:              12.1.0.6537
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


-- Copiando estrutura do banco de dados para medlar
CREATE DATABASE IF NOT EXISTS `medlar` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci */ /*!80016 DEFAULT ENCRYPTION='N' */;
USE `medlar`;

-- Copiando estrutura para tabela medlar.idosos
CREATE TABLE IF NOT EXISTS `idosos` (
  `ididoso` int NOT NULL AUTO_INCREMENT,
  `nome_idoso` varchar(50) NOT NULL,
  `nascimento` date DEFAULT NULL,
  `genero` varchar(1) NOT NULL DEFAULT '',
  `alergia` varchar(50) NOT NULL,
  `comorbidade` varchar(50) NOT NULL,
  `obs_idoso` varchar(50) DEFAULT NULL,
  `cpf_idoso` varchar(50) NOT NULL DEFAULT '0',
  `nome_resp` varchar(50) NOT NULL,
  `telefone_resp` varchar(50) NOT NULL DEFAULT '0',
  `cpf_resp` varchar(50) NOT NULL DEFAULT '0',
  `parentesco` varchar(50) NOT NULL,
  `endereco_resp` varchar(50) NOT NULL,
  PRIMARY KEY (`ididoso`)
) ENGINE=InnoDB AUTO_INCREMENT=81 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Exportação de dados foi desmarcado.

-- Copiando estrutura para tabela medlar.medicamentos
CREATE TABLE IF NOT EXISTS `medicamentos` (
  `idremedio` int NOT NULL AUTO_INCREMENT,
  `nome_remed` varchar(50) NOT NULL DEFAULT '',
  `dosagem` varchar(50) NOT NULL,
  `obs_remed` varchar(50) DEFAULT NULL,
  `caixas` int DEFAULT NULL,
  `unid_cp` int DEFAULT NULL,
  `add_cp` int DEFAULT NULL,
  `obs_estoque` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  PRIMARY KEY (`idremedio`)
) ENGINE=InnoDB AUTO_INCREMENT=56 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Exportação de dados foi desmarcado.

-- Copiando estrutura para tabela medlar.utiliza
CREATE TABLE IF NOT EXISTS `utiliza` (
  `idutiliza` int NOT NULL AUTO_INCREMENT,
  `ididoso` int NOT NULL DEFAULT '0',
  `idremedio` int NOT NULL,
  `posologia` int NOT NULL DEFAULT '0',
  `horario` time NOT NULL,
  `obs_remed_idoso` varchar(50) DEFAULT NULL,
  `checagem` date DEFAULT NULL,
  `data_inicio` date DEFAULT NULL,
  `data_fim` date DEFAULT NULL,
  PRIMARY KEY (`idutiliza`),
  KEY `FK_utiliza_idosos` (`ididoso`),
  KEY `idremedio` (`idremedio`),
  CONSTRAINT `FK_utiliza_idosos` FOREIGN KEY (`ididoso`) REFERENCES `idosos` (`ididoso`),
  CONSTRAINT `FK_utiliza_medicamentos` FOREIGN KEY (`idremedio`) REFERENCES `medicamentos` (`idremedio`)
) ENGINE=InnoDB AUTO_INCREMENT=111 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Exportação de dados foi desmarcado.

/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
