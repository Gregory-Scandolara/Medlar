-- --------------------------------------------------------
-- Servidor:                     127.0.0.1
-- Versão do servidor:           10.4.25-MariaDB - mariadb.org binary distribution
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
CREATE DATABASE IF NOT EXISTS `medlar` /*!40100 DEFAULT CHARACTER SET utf8mb4 */;
USE `medlar`;

-- Copiando estrutura para tabela medlar.estoque
CREATE TABLE IF NOT EXISTS `estoque` (
  `idestoque` int(11) NOT NULL AUTO_INCREMENT,
  `idremedio` int(11) NOT NULL,
  `caixas` int(11) NOT NULL,
  `unid_cp` int(11) NOT NULL,
  `add_cp` int(11) NOT NULL,
  `obs_estoque` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`idestoque`) USING BTREE,
  KEY `FK_estoque_medicamentos` (`idremedio`),
  CONSTRAINT `FK_estoque_medicamentos` FOREIGN KEY (`idremedio`) REFERENCES `medicamentos` (`idremedio`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=44 DEFAULT CHARSET=utf8mb4;

-- Copiando dados para a tabela medlar.estoque: ~15 rows (aproximadamente)
REPLACE INTO `estoque` (`idestoque`, `idremedio`, `caixas`, `unid_cp`, `add_cp`, `obs_estoque`) VALUES
	(26, 1, 0, 0, 0, NULL),
	(27, 1, 0, 0, 0, NULL),
	(28, 2, 0, 0, 0, NULL),
	(30, 31, 0, 0, 0, NULL),
	(31, 32, 0, 0, 0, NULL),
	(32, 33, 0, 0, 0, NULL),
	(33, 36, 0, 0, 0, NULL),
	(36, 32, 12, 2, 23, NULL),
	(37, 32, 12, 2, 23, NULL),
	(38, 3, 12, 10, 120, NULL),
	(39, 2, 12, 10, 117, NULL),
	(40, 2, 2, 2, 4, NULL),
	(41, 36, 12, 2, 24, NULL),
	(42, 0, 0, 0, 0, NULL),
	(43, 0, 0, 0, 0, NULL);

-- Copiando estrutura para tabela medlar.idosos
CREATE TABLE IF NOT EXISTS `idosos` (
  `ididoso` int(11) NOT NULL AUTO_INCREMENT,
  `nome_idoso` varchar(50) NOT NULL,
  `nascimento` date DEFAULT NULL,
  `genero` char(1) NOT NULL DEFAULT '',
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
) ENGINE=InnoDB AUTO_INCREMENT=79 DEFAULT CHARSET=utf8mb4;

-- Copiando dados para a tabela medlar.idosos: ~14 rows (aproximadamente)
REPLACE INTO `idosos` (`ididoso`, `nome_idoso`, `nascimento`, `genero`, `alergia`, `comorbidade`, `obs_idoso`, `cpf_idoso`, `nome_resp`, `telefone_resp`, `cpf_resp`, `parentesco`, `endereco_resp`) VALUES
	(1, 'pessoa 1 ', '2021-12-14', 'F', 'pao', 'asma', '', '8323284', 'responsavel', '123245', '0', 'vo', '0'),
	(2, 'pessoa 2', '2021-12-08', 'M', 'leite', 'auzaimer', 'sla', '346547', 'caio', '239356', '0', 'sobrinho', 'sao paulo'),
	(8, 'pessoa 3', '2022-02-10', 'M', 'leite', 'auzaimer', 'sla', '346547', 'caiod', '23935637', '0', 'sobrinho', 'sao paulo'),
	(11, 'pessoa 4', '2022-03-01', 'M', 'leite', 'auzaimer', 'sla', '346547', 'caio', '23935637', '0', 'sobrinho', 'sao paulo'),
	(13, 'pessoa 5', '2022-03-28', 'M', 'trigo', 'asma', 'sla', '2147483647', 'carlos', '2147483647', '0', 'tio', 'ifdsiogfgdgfg'),
	(41, 'pessoa 6', '1922-03-14', 'F', 'camarao', 'auzaimer', 'not have', '2147483647', 'greg', '2147483647', '0', 'conhecido', 'embaixo da ponte'),
	(49, 'pessoa 7', '2022-08-03', 'M', 'leite', 'auzaimer', 'sla', '346547', 'caio', '239356', '43563464', 'sobrinho', 'sao paulo'),
	(58, 'pessoa 8', '2022-08-31', 'M', 'peixe', 'epatite', 'nao sei', '32978562', 'caio', '23935637', '', 'sobrinho', 'sao paulo'),
	(62, 'claudete', '2022-08-09', 'F', 'leite', 'auzaimer', 'sla', '346547', 'caiod', '375735', '43563464', 'conhecido', 'embaixo da ponte'),
	(63, 'juvenaldo', '1945-06-14', 'M', 'frutos do mar', 'asma', 'nao tem', '39578358', 'dani', '346637', '45674747', 'neto', 'embaixo da ponte'),
	(74, 'pessoa 25', '2022-09-17', 'O', 'leite', 'epatite', '', '34654757858', 'caiod', '23935637', '45674747', 'sobrinho', 'embaixo da ponte'),
	(75, 'JÃºlia May', '2005-01-17', 'F', 'Pessoas', 'Cega', 'Mau humorada', '09090909090', 'Marcia Maciel', '519080808080', '080808080', 'MamÃ£e', 'rua vinte e um de maio 020202'),
	(76, 'paula', '2004-08-17', 'F', 'nada', '', 'gosta de gato', '000000000000000000', 'claudete', '0000000000', '0000000000', 'mamÃ£e', 'turvo'),
	(77, 'caroline da silva', '2004-10-28', 'F', 'mel', 'problemas respiratÃ³rios', 'carente', '55263455', 'duty', '48996157624', '4515256212', 'mamae', 'santa pink');

-- Copiando estrutura para tabela medlar.medicamentos
CREATE TABLE IF NOT EXISTS `medicamentos` (
  `idremedio` int(11) NOT NULL AUTO_INCREMENT,
  `nome_remed` varchar(50) NOT NULL DEFAULT '',
  `dosagem` varchar(50) NOT NULL,
  `obs_remed` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`idremedio`)
) ENGINE=InnoDB AUTO_INCREMENT=56 DEFAULT CHARSET=utf8mb4;

-- Copiando dados para a tabela medlar.medicamentos: ~26 rows (aproximadamente)
REPLACE INTO `medicamentos` (`idremedio`, `nome_remed`, `dosagem`, `obs_remed`) VALUES
	(0, 'medicamento 1', 'xxx', 'xxxxxxxxxxxxxxxxx'),
	(1, 'medicamento 1', 'xxx', 'sla'),
	(2, 'medicamento 2', 'xxx', 'sla'),
	(3, 'medicamento 3', 'xxx', 'sla'),
	(31, 'medicamento 4', 'xxx', 'sla'),
	(32, 'medicamento 5', 'xxx', 'nao sei'),
	(33, 'medicamento 6', 'xxx', 'nao tomar muito'),
	(36, 'medicamento 7', 'xxx', 'nao tomar muito'),
	(37, 'medicamento 8', 'xxx', 'nao sei'),
	(38, 'medicamento 9', 'xxx', 'nao sei'),
	(39, '', '', ''),
	(40, 'xxxxxxxxxxxxx', 'xxx', 'xxxxxxxxxxxxxxxxx'),
	(41, 'xxxxxxxxxxxx', 'xxx', 'xxxxxxxxxxxxxxxxx'),
	(42, 'xxxxxxxxxxxxxx', 'xxx', 'xxxxxxxxxxxxxxxxx'),
	(43, 'xxxxxxxxxxx', 'xxx', 'xxxxxxxxxxxxxxxxx'),
	(44, 'xxxxxxxxxx', 'xxx', 'xxxxxxxxxxxxxxxxx'),
	(45, 'xxxxxxxxx', 'xxx', 'xxxxxxxxxxxxxxxxx'),
	(47, 'xxxxxxxxx', 'xxx', 'xxxxxxxxxxxxxxxxx'),
	(48, 'xxxxxxxxx', 'xxx', 'xxxxxxxxxxxxxxxxx'),
	(49, 'remedio 13', '200', 'sla'),
	(50, 'remedio 13', '200', 'sla'),
	(51, 'remedio 13', '200', 'sla'),
	(52, 'remedio 13', '200', 'sla'),
	(53, 'remedio 13', '200', 'sla'),
	(54, 'remedio 13', '200', 'sla'),
	(55, 'remedio 13', '200', 'sla');

-- Copiando estrutura para tabela medlar.utiliza
CREATE TABLE IF NOT EXISTS `utiliza` (
  `idutiliza` int(11) NOT NULL AUTO_INCREMENT,
  `ididoso` int(11) NOT NULL DEFAULT 0,
  `idremedio` int(11) NOT NULL,
  `posologia` int(2) NOT NULL DEFAULT 0,
  `horario` time NOT NULL,
  `obs_remed_idoso` varchar(50) DEFAULT NULL,
  `checagem` date DEFAULT NULL,
  `data_inicio` date DEFAULT NULL,
  `data_fim` date DEFAULT NULL,
  PRIMARY KEY (`idutiliza`),
  KEY `FK_utiliza_idosos` (`ididoso`),
  KEY `idremedio` (`idremedio`),
  CONSTRAINT `FK_utiliza_idosos` FOREIGN KEY (`ididoso`) REFERENCES `idosos` (`ididoso`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `FK_utiliza_medicamentos` FOREIGN KEY (`idremedio`) REFERENCES `medicamentos` (`idremedio`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=97 DEFAULT CHARSET=utf8mb4;

-- Copiando dados para a tabela medlar.utiliza: ~17 rows (aproximadamente)
REPLACE INTO `utiliza` (`idutiliza`, `ididoso`, `idremedio`, `posologia`, `horario`, `obs_remed_idoso`, `checagem`, `data_inicio`, `data_fim`) VALUES
	(38, 58, 2, 0, '00:00:00', 'nao sei', '2022-10-15', NULL, NULL),
	(40, 58, 32, 0, '00:00:00', 'sla', '2022-10-15', NULL, NULL),
	(64, 2, 1, 1, '00:00:06', 'sla', '2022-10-03', NULL, NULL),
	(67, 2, 31, 1, '00:00:11', '', '2022-10-13', NULL, NULL),
	(68, 2, 31, 1, '00:00:11', '', '2022-10-13', NULL, NULL),
	(69, 2, 32, 1, '00:00:05', '', '2022-10-13', NULL, NULL),
	(70, 2, 38, 1, '00:00:14', 'sla', '2022-10-13', NULL, NULL),
	(71, 2, 38, 1, '00:00:14', 'sla', '2022-10-13', NULL, NULL),
	(72, 2, 38, 1, '00:00:14', 'sla', '2022-10-05', NULL, NULL),
	(73, 2, 36, 1, '00:00:15', 'sla', '2022-10-13', NULL, NULL),
	(87, 1, 3, 1, '23:31:00', '', NULL, '2022-09-12', '2022-09-20'),
	(88, 1, 37, 1, '00:13:00', '', '2022-10-13', '2022-09-06', '2022-10-06'),
	(92, 1, 2, 1, '22:06:00', '', '2022-10-13', '2022-09-21', '0000-00-00'),
	(93, 75, 2, 1, '23:08:00', 'aguinha is good', NULL, '2022-09-06', '0000-00-00'),
	(94, 1, 32, 1, '23:12:00', 'aguinha is good', NULL, '2022-09-08', '2022-09-28'),
	(95, 77, 55, 2, '23:12:00', 'tomar com aguinha', NULL, '2022-10-07', '0000-00-00'),
	(96, 1, 32, 1, '12:12:21', '', '2022-10-13', '2022-10-05', '2022-10-18');

/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
