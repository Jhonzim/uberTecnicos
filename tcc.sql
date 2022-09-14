

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";

CREATE TABLE `Categoria_servico` (
  `ID` int(8) NOT NULL,
  `Tipo` varchar(128) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;



CREATE TABLE `Servico` (
  `Numero` int(11) NOT NULL,
  `Valor` float DEFAULT NULL,
  `Local` varchar(255) DEFAULT NULL,
  `Data_inicio` date DEFAULT NULL,
  `Data_fim` date DEFAULT NULL,
  `Status` int(11) DEFAULT NULL,
  `fk_Tecnicos_Codigo` int(11) DEFAULT NULL,
  `fk_Contratante_Servico` int(11) DEFAULT NULL,
  `fk_Categoria_servico_ID` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;



CREATE TABLE `Tecnico` (
  `ID` int(8) NOT NULL,
  `Foto_pessoal` varchar(128) NOT NULL DEFAULT '',
  `CPF` varchar(16) NOT NULL,
  `Nome` varchar(128) NOT NULL,
  `Senha` varchar(16) NOT NULL,
  `Email` varchar(128) NOT NULL,
  `Endereco` varchar(255) NOT NULL DEFAULT '',
  `Curriculo` varchar(128) NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;


CREATE TABLE `Tec_Serv` (
  `fk_Tecnicos_Codigo` int(11) DEFAULT NULL,
  `fk_Categoria_servico_ID` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;



CREATE TABLE `Usuario` (
  `ID` int(8) NOT NULL,
  `Foto_pessoal` varchar(128) DEFAULT '',
  `CPF` varchar(16) NOT NULL,
  `Nome` varchar(128) NOT NULL,
  `Senha` varchar(16) NOT NULL,
  `Email` varchar(128) NOT NULL,
  `Endereco` varchar(255) NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;


ALTER TABLE `Categoria_servico`
  ADD PRIMARY KEY (`ID`);

ALTER TABLE `Servico`
  ADD PRIMARY KEY (`Numero`);


ALTER TABLE `Tecnico`
  ADD PRIMARY KEY (`ID`);

ALTER TABLE `Usuario`
  ADD PRIMARY KEY (`ID`);


ALTER TABLE `Categoria_servico`
  MODIFY `ID` int(8) NOT NULL AUTO_INCREMENT;

ALTER TABLE `Tecnico`
  MODIFY `ID` int(8) NOT NULL AUTO_INCREMENT;

ALTER TABLE `Usuario`
  MODIFY `ID` int(8) NOT NULL AUTO_INCREMENT;
COMMIT;


