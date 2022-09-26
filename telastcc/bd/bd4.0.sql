-- --------------------------------------------------------
-- Servidor:                     127.0.0.1
-- Versão do servidor:           10.4.22-MariaDB - mariadb.org binary distribution
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


-- Copiando estrutura para tabela medlar.estoque
CREATE TABLE IF NOT EXISTS `estoque` (
  `idestoque` int(11) NOT NULL AUTO_INCREMENT,
  `idremedio` int(11) NOT NULL,
  `caixas` int(11) NOT NULL,
  `unid_cp` int(11) NOT NULL,
  `add_cp` int(11) NOT NULL,
  `obs` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`idestoque`) USING BTREE,
  KEY `FK_estoque_medicamentos` (`idremedio`),
  CONSTRAINT `FK_estoque_medicamentos` FOREIGN KEY (`idremedio`) REFERENCES `medicamentos` (`idremedio`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=38 DEFAULT CHARSET=utf8mb4;

-- Copiando dados para a tabela medlar.estoque: ~12 rows (aproximadamente)
REPLACE INTO `estoque` (`idestoque`, `idremedio`, `caixas`, `unid_cp`, `add_cp`, `obs`) VALUES
	(26, 1, 0, 0, 0, NULL),
	(27, 1, 0, 0, 0, NULL),
	(28, 2, 0, 0, 0, NULL),
	(29, 3, 0, 0, 0, NULL),
	(30, 31, 0, 0, 0, NULL),
	(31, 32, 0, 0, 0, NULL),
	(32, 33, 0, 0, 0, NULL),
	(33, 36, 0, 0, 0, NULL),
	(34, 37, 0, 0, 0, NULL),
	(35, 38, 0, 0, 0, NULL),
	(36, 32, 12, 2, 24, NULL),
	(37, 32, 12, 2, 24, NULL);

-- Copiando estrutura para tabela medlar.idosos
CREATE TABLE IF NOT EXISTS `idosos` (
  `ididoso` int(11) NOT NULL AUTO_INCREMENT,
  `nome_idoso` varchar(50) NOT NULL,
  `nascimento` date DEFAULT NULL,
  `genero` varchar(1) NOT NULL DEFAULT '',
  `alergia` varchar(50) NOT NULL,
  `comorbidade` varchar(50) NOT NULL,
  `obs` varchar(50) DEFAULT NULL,
  `numero_sus` varchar(50) NOT NULL DEFAULT '',
  `cpf` varchar(50) NOT NULL DEFAULT '0',
  `plano_saude` varchar(3) NOT NULL DEFAULT '',
  `nome_resp` varchar(50) NOT NULL,
  `telefone_resp` varchar(50) NOT NULL DEFAULT '0',
  `cpf_resp` varchar(50) NOT NULL DEFAULT '0',
  `parentesco` varchar(50) NOT NULL,
  `endereco_resp` varchar(50) NOT NULL,
  PRIMARY KEY (`ididoso`)
) ENGINE=InnoDB AUTO_INCREMENT=68 DEFAULT CHARSET=utf8mb4;

-- Copiando dados para a tabela medlar.idosos: ~10 rows (aproximadamente)
REPLACE INTO `idosos` (`ididoso`, `nome_idoso`, `nascimento`, `genero`, `alergia`, `comorbidade`, `obs`, `numero_sus`, `cpf`, `plano_saude`, `nome_resp`, `telefone_resp`, `cpf_resp`, `parentesco`, `endereco_resp`) VALUES
	(1, 'pessoa 1', '2021-12-14', 'F', 'pao', 'asma', '', '92838', '8323284', 'sim', 'rogerio', '123245', '0', 'vo', 'av inacio pinto'),
	(2, 'pessoa 2', '2021-12-08', 'M', 'leite', 'auzaimer', 'sla', '34364757', '346547', 'nao', 'caio', '239356', '0', 'sobrinho', 'sao paulo'),
	(8, 'pessoa 3', '2022-02-10', 'M', 'leite', 'auzaimer', 'sla', '34364757', '346547', 'nao', 'caiod', '23935637', '0', 'sobrinho', 'sao paulo'),
	(11, 'pessoa 4', '2022-03-01', 'M', 'leite', 'auzaimer', 'sla', '34364757', '346547', 'nao', 'caio', '23935637', '0', 'sobrinho', 'sao paulo'),
	(13, 'pessoa 5', '2022-03-28', 'M', 'trigo', 'asma', 'sla', '23242356', '2147483647', 'sim', 'carlos', '2147483647', '0', 'tio', 'ifdsiogfgdgfg'),
	(41, 'pessoa 6', '1922-03-14', 'F', 'camarao', 'auzaimer', 'not have', '2147483647', '2147483647', 'nao', 'greg', '2147483647', '0', 'conhecido', 'embaixo da ponte'),
	(49, 'pessoa 7', '2022-08-03', 'M', 'leite', 'auzaimer', 'sla', '34364757', '346547', 'sim', 'caio', '239356', '43563464', 'sobrinho', 'sao paulo'),
	(58, 'pessoa 8', '2022-08-31', 'M', 'peixe', 'epatite', 'nao sei', '34364757', '32978562', 'sim', 'caio', '23935637', '', 'sobrinho', 'sao paulo'),
	(62, 'claudete', '2022-08-09', 'F', 'leite', 'auzaimer', 'sla', '34364757', '346547', 'sim', 'caiod', '375735', '43563464', 'conhecido', 'embaixo da ponte'),
	(63, 'juvenaldo', '1945-06-14', 'M', 'frutos do mar', 'asma', 'nao tem', '349865346', '39578358', 'nao', 'dani', '346637', '45674747', 'neto', 'embaixo da ponte');

-- Copiando estrutura para tabela medlar.medicamentos
CREATE TABLE IF NOT EXISTS `medicamentos` (
  `idremedio` int(11) NOT NULL AUTO_INCREMENT,
  `nome_remed` varchar(50) NOT NULL DEFAULT '',
  `dosagem` varchar(50) NOT NULL,
  `descricao` varchar(50) NOT NULL DEFAULT '',
  `obs` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`idremedio`)
) ENGINE=InnoDB AUTO_INCREMENT=56 DEFAULT CHARSET=utf8mb4;

-- Copiando dados para a tabela medlar.medicamentos: ~23 rows (aproximadamente)
REPLACE INTO `medicamentos` (`idremedio`, `nome_remed`, `dosagem`, `descricao`, `obs`) VALUES
	(0, 'medicamento 1', 'xxx', 'xxxxxxxxxxxxxxx', 'xxxxxxxxxxxxxxxxx'),
	(1, 'medicamento 1', 'xxx', 'dores', 'sla'),
	(2, 'medicamento 2', 'xxx', 'fsgfsfdgs', 'sla'),
	(3, 'medicamento 3', 'xxx', 'dores', 'sla'),
	(31, 'medicamento 4', 'xxx', 'dores', 'sla'),
	(32, 'medicamento 5', 'xxx', 'dor renal', 'nao sei'),
	(33, 'medicamento 6', 'xxx', 'dor de cabeça', 'nao tomar muito'),
	(36, 'medicamento 7', 'xxx', 'dor de cabeça', 'nao tomar muito'),
	(37, 'medicamento 8', 'xxx', 'dores', 'nao sei'),
	(38, 'medicamento 9', 'xxx', 'dor renal', 'nao sei'),
	(39, '', '', '', ''),
	(40, 'xxxxxxxxxxxxx', 'xxx', 'xxxxxxxxxxxxxxx', 'xxxxxxxxxxxxxxxxx'),
	(41, 'xxxxxxxxxxxx', 'xxx', 'xxxxxxxxxxxxxxx', 'xxxxxxxxxxxxxxxxx'),
	(42, 'xxxxxxxxxxxxxx', 'xxx', 'xxxxxxxxxxxxxxx', 'xxxxxxxxxxxxxxxxx'),
	(43, 'xxxxxxxxxxx', 'xxx', 'xxxxxxxxxxxxxxx', 'xxxxxxxxxxxxxxxxx'),
	(44, 'xxxxxxxxxx', 'xxx', 'xxxxxxxxxxxxxxx', 'xxxxxxxxxxxxxxxxx'),
	(45, 'xxxxxxxxx', 'xxx', 'xxxxxxxxxxxxxxx', 'xxxxxxxxxxxxxxxxx'),
	(47, 'xxxxxxxxx', 'xxx', 'xxxxxxxxxxxxxxx', 'xxxxxxxxxxxxxxxxx'),
	(48, 'xxxxxxxxx', 'xxx', 'xxxxxxxxxxxxxxx', 'xxxxxxxxxxxxxxxxx'),
	(49, 'remedio 13', '200', 'dores', 'sla'),
	(50, 'remedio 13', '200', 'dores', 'sla'),
	(51, 'remedio 13', '200', 'dores', 'sla'),
	(52, 'remedio 13', '200', 'dores', 'sla'),
	(53, 'remedio 13', '200', 'dores', 'sla'),
	(54, 'remedio 13', '200', 'dores', 'sla'),
	(55, 'remedio 13', '200', 'dores', 'sla');

-- Copiando estrutura para tabela medlar.utiliza
CREATE TABLE IF NOT EXISTS `utiliza` (
  `idutiliza` int(11) NOT NULL AUTO_INCREMENT,
  `ididoso` int(11) NOT NULL DEFAULT 0,
  `idremedio` int(11) NOT NULL,
  `posologia` int(11) NOT NULL DEFAULT 0,
  `horario` time NOT NULL,
  `periodo` int(11) NOT NULL DEFAULT 0,
  `obs` varchar(50) DEFAULT NULL,
  `checagem` varchar(5) DEFAULT NULL,
  PRIMARY KEY (`idutiliza`),
  KEY `FK_utiliza_idosos` (`ididoso`),
  KEY `idremedio` (`idremedio`),
  CONSTRAINT `FK_utiliza_idosos` FOREIGN KEY (`ididoso`) REFERENCES `idosos` (`ididoso`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `FK_utiliza_medicamentos` FOREIGN KEY (`idremedio`) REFERENCES `medicamentos` (`idremedio`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=76 DEFAULT CHARSET=utf8mb4;

-- Copiando dados para a tabela medlar.utiliza: ~15 rows (aproximadamente)
REPLACE INTO `utiliza` (`idutiliza`, `ididoso`, `idremedio`, `posologia`, `horario`, `periodo`, `obs`, `checagem`) VALUES
	(38, 58, 2, 0, '00:00:00', 0, 'nao sei', NULL),
	(40, 58, 32, 0, '00:00:00', 0, 'sla', NULL),
	(63, 1, 2, 1, '00:00:00', 30, 'sla', NULL),
	(64, 2, 1, 1, '00:00:06', 30, 'sla', NULL),
	(65, 1, 1, 1, '00:00:06', 1, '1', NULL),
	(66, 2, 3, 1, '00:00:09', 1, '', NULL),
	(67, 2, 31, 1, '00:00:11', 1, '', NULL),
	(68, 2, 31, 1, '00:00:11', 1, '', NULL),
	(69, 2, 32, 1, '00:00:05', 1, '', NULL),
	(70, 2, 38, 1, '00:00:14', 1, 'sla', NULL),
	(71, 2, 38, 1, '00:00:14', 1, 'sla', NULL),
	(72, 2, 38, 1, '00:00:14', 1, 'sla', NULL),
	(73, 2, 36, 1, '00:00:15', 30, 'sla', NULL),
	(74, 1, 36, 1, '05:00:00', 3, 'sla', NULL),
	(75, 1, 36, 1, '05:00:00', 3, 'sla', NULL);

/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
