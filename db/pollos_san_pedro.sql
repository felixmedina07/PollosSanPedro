-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1:3306
-- Tiempo de generación: 27-10-2021 a las 04:57:37
-- Versión del servidor: 5.7.31
-- Versión de PHP: 7.3.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `pollos_san_pedro`
--

DELIMITER $$
--
-- Procedimientos
--
DROP PROCEDURE IF EXISTS `sp_mostrar_cliente`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_mostrar_cliente` ()  select cod_cli,
		nom_cli,
		ape_cli,
		ced_cli,
		rif_cli,
		ads_cli
 from cliente WHERE est_cli = 'A'$$

DROP PROCEDURE IF EXISTS `sp_mostrar_nomina`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_mostrar_nomina` ()  NO SQL
SELECT n.nrf_nom,
             n.cnp_nom,
             n.fcu_nom,
             t.nom_tra,
             t.ape_tra,
             bc.nom_bnc,
             bt.nom_bnt,
             n.cod_nom
      FROM nomina AS n
      INNER JOIN bancos_trabajadores AS bt
      ON n.cod_bnt=bt.cod_bnt
      INNER JOIN bancos_casa AS bc
      ON n.cod_bnc=bc.cod_bnc
      INNER JOIN trabajadores AS t
      ON n.cod_tra=t.cod_tra 
      AND n.est_nom='A'$$

DROP PROCEDURE IF EXISTS `sp_mostrar_pedidos`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_mostrar_pedidos` ()  NO SQL
SELECT  c.nom_cli,
        p.cpo_ped,
        p.cpa_ped,
        p.cmo_ped,
        p.cal_ped,
        p.fec_ped,
        p.inf_ped
        FROM pedidos as p
        INNER JOIN cliente as c
     ON p.cod_cli=c.cod_cli$$

DROP PROCEDURE IF EXISTS `sp_mostrar_trabajadores`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_mostrar_trabajadores` ()  NO SQL
SELECT nom_tra,ape_tra,ced_tra,ads_tra,cor_tra,tel_tra from trabajadores where est_tra = 'A'$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `bancos_casa`
--

DROP TABLE IF EXISTS `bancos_casa`;
CREATE TABLE IF NOT EXISTS `bancos_casa` (
  `cod_bnc` int(11) NOT NULL AUTO_INCREMENT,
  `nuc_bnc` varchar(50) NOT NULL,
  `rcd_bnc` varchar(50) NOT NULL,
  `nom_bnc` varchar(50) NOT NULL,
  `cor_bnc` varchar(50) NOT NULL,
  `est_bnc` varchar(2) NOT NULL,
  `cod_usu` int(11) NOT NULL,
  `cre_bnc` datetime DEFAULT NULL,
  `upd_bnc` datetime DEFAULT NULL,
  `del_bnc` datetime DEFAULT NULL,
  `res_bnc` datetime DEFAULT NULL,
  PRIMARY KEY (`cod_bnc`),
  KEY `bancosC_ibfk_1` (`cod_usu`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `bancos_casa`
--

INSERT INTO `bancos_casa` (`cod_bnc`, `nuc_bnc`, `rcd_bnc`, `nom_bnc`, `cor_bnc`, `est_bnc`, `cod_usu`, `cre_bnc`, `upd_bnc`, `del_bnc`, `res_bnc`) VALUES
(1, '01020344556677889987', 'J40346843', 'mercantil', 'pollosanpedro2@gmail.com', 'A', 1, '2020-02-27 09:37:08', '2020-11-30 03:52:30', NULL, NULL),
(2, '01034567899043657522', 'J40346843', 'banesco', 'pollosanpedro@hotmail.com', 'A', 1, '2020-02-27 09:38:13', '2020-11-30 03:31:10', '2020-03-21 08:25:25', '2020-03-21 08:26:53'),
(3, '01056787454343443132', 'J29789065', 'venezuela', 'bancopollo@gmail.com', 'B', 1, '2020-05-12 12:07:37', NULL, '2020-11-30 03:57:35', NULL),
(4, '01343434343434344344', 'V29580458', 'bicentenario', 'felixbicentenario@gmail.com', 'A', 1, '2020-06-15 05:48:02', NULL, NULL, NULL),
(5, '09432423423466666445', 'J28569567', 'provincial', 'provincial@gmail.com', 'A', 1, '2020-11-24 10:17:35', NULL, '2020-11-30 04:02:22', '2020-11-30 04:03:01'),
(6, '00000000000000000000', 'V8101904', 'efectivo', 'efectivo@gmail.com', 'A', 1, '2021-10-26 10:49:58', NULL, NULL, NULL);

--
-- Disparadores `bancos_casa`
--
DROP TRIGGER IF EXISTS `bancos_casa_AI`;
DELIMITER $$
CREATE TRIGGER `bancos_casa_AI` AFTER INSERT ON `bancos_casa` FOR EACH ROW INSERT INTO bancos_casa_resp(nuc_bnc,rcd_bnc,nom_bnc,cor_bnc,est_bnc,cod_usu,cre_bnc) VALUES
(NEW.nuc_bnc,NEW.rcd_bnc,NEW.nom_bnc,NEW.cor_bnc,NEW.est_bnc,NEW.cod_usu,NOW())
$$
DELIMITER ;
DROP TRIGGER IF EXISTS `bancos_casa_BU`;
DELIMITER $$
CREATE TRIGGER `bancos_casa_BU` BEFORE UPDATE ON `bancos_casa` FOR EACH ROW IF(NEW.cod_bnc = OLD.cod_bnc)THEN
UPDATE bancos_casa_resp SET nuc_bnc=NEW.nuc_bnc,
                            rcd_bnc=NEW.rcd_bnc,
                            nom_bnc=NEW.nom_bnc,
                            cor_bnc=NEW.cor_bnc,
                            est_bnc=NEW.est_bnc,
                            upd_bnc=NEW.upd_bnc 
WHERE cod_bnc=NEW.cod_bnc;

IF(NEW.est_bnc='B' && OLD.est_bnc='A') THEN
UPDATE bancos_casa_resp SET del_bnc=NEW.del_bnc WHERE cod_bnc=NEW.cod_bnc;
END IF;

IF(NEW.est_bnc='A' && OLD.est_bnc='B') THEN
UPDATE bancos_casa_resp SET res_bnc=NEW.res_bnc WHERE cod_bnc=NEW.cod_bnc;
END IF;
END IF
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `bancos_casa_resp`
--

DROP TABLE IF EXISTS `bancos_casa_resp`;
CREATE TABLE IF NOT EXISTS `bancos_casa_resp` (
  `cod_bnc` int(11) NOT NULL AUTO_INCREMENT,
  `nuc_bnc` varchar(45) NOT NULL,
  `rcd_bnc` varchar(45) NOT NULL,
  `nom_bnc` varchar(45) NOT NULL,
  `cor_bnc` varchar(50) NOT NULL,
  `est_bnc` varchar(2) NOT NULL,
  `cod_usu` int(11) NOT NULL,
  `cre_bnc` datetime DEFAULT NULL,
  `upd_bnc` datetime DEFAULT NULL,
  `del_bnc` datetime DEFAULT NULL,
  `res_bnc` datetime DEFAULT NULL,
  PRIMARY KEY (`cod_bnc`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `bancos_casa_resp`
--

INSERT INTO `bancos_casa_resp` (`cod_bnc`, `nuc_bnc`, `rcd_bnc`, `nom_bnc`, `cor_bnc`, `est_bnc`, `cod_usu`, `cre_bnc`, `upd_bnc`, `del_bnc`, `res_bnc`) VALUES
(1, '01020344556677889987', 'J40346843', 'mercantil', 'pollosanpedro2@gmail.com', 'A', 1, '2020-02-27 09:37:08', '2020-11-30 03:52:30', NULL, NULL),
(2, '01034567899043657522', 'J40346843', 'banesco', 'pollosanpedro@hotmail.com', 'A', 1, '2020-02-27 09:38:13', '2020-11-30 03:31:10', NULL, NULL),
(3, '01056787454343443132', 'J29789065', 'venezuela', 'bancopollo@gmail.com', 'B', 1, '2020-05-12 12:07:37', NULL, NULL, NULL),
(4, '01343434343434344344', 'V29580458', 'bicentenario', 'felixbicentenario@gmail.com', 'A', 1, '2020-06-15 17:48:02', NULL, NULL, NULL),
(5, '09432423423466666445', 'J28569567', 'provincial', 'provincial@gmail.com', 'A', 1, '2020-11-24 22:17:35', NULL, '2020-11-30 04:02:22', '2020-11-30 04:03:01'),
(6, '00000000000000000000', 'V8101904', 'efectivo', 'efectivo@gmail.com', 'A', 1, '2021-10-26 22:49:58', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `bancos_cliente`
--

DROP TABLE IF EXISTS `bancos_cliente`;
CREATE TABLE IF NOT EXISTS `bancos_cliente` (
  `cod_bnk` int(11) NOT NULL AUTO_INCREMENT,
  `not_bnk` varchar(50) NOT NULL,
  `ncu_bnk` varchar(50) NOT NULL,
  `tpc_bnk` varchar(50) NOT NULL,
  `rcd_bnk` varchar(20) NOT NULL,
  `nom_bnk` varchar(50) NOT NULL,
  `cor_bnk` varchar(50) DEFAULT NULL,
  `tti_bnk` varchar(50) NOT NULL,
  `est_bnk` varchar(1) NOT NULL,
  `cod_cli` int(11) NOT NULL,
  `cod_usu` int(11) NOT NULL,
  `cre_bnk` datetime DEFAULT NULL,
  `upd_bnk` datetime DEFAULT NULL,
  `del_bnk` datetime DEFAULT NULL,
  `res_bnk` datetime DEFAULT NULL,
  PRIMARY KEY (`cod_bnk`),
  KEY `bancos_cliente_ibfk_1` (`cod_usu`),
  KEY `bancos_cliente_ibfk_2` (`cod_cli`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `bancos_cliente`
--

INSERT INTO `bancos_cliente` (`cod_bnk`, `not_bnk`, `ncu_bnk`, `tpc_bnk`, `rcd_bnk`, `nom_bnk`, `cor_bnk`, `tti_bnk`, `est_bnk`, `cod_cli`, `cod_usu`, `cre_bnk`, `upd_bnk`, `del_bnk`, `res_bnk`) VALUES
(1, 'rosana coromoto medina ', '02030587986554233421', 'ahorro', 'J50986754', 'bicentenario', 'rosanamedina2@gmail.com', '04140070021', 'A', 1, 1, '2020-02-27 09:40:36', NULL, NULL, NULL),
(2, 'rosana coromoto medina', '02016578954378875434', 'corriente', 'J8095668', 'venezuela', 'rosanamedina1@gmail.com', '04140070021', 'A', 1, 1, '2020-02-27 09:42:24', NULL, NULL, NULL),
(3, 'jose felix medina', '04050687967534213456', 'corriente', 'J8095668', 'mercantil', 'josemedina@gmail.com', '04247734274', 'A', 2, 1, '2020-02-27 09:47:21', '2020-12-02 12:16:29', '2020-03-21 08:25:35', '2020-03-21 08:26:17'),
(4, 'jose felix medina ', '05067843671265437890', 'corriente', 'J09566856', 'provincial', 'josemedina@gmail.com', '04247199694', 'A', 2, 1, '2020-02-27 09:49:01', NULL, NULL, NULL),
(5, 'maribel medina', '07986745234567875625', 'ahorro', 'V28016569', 'banesco', 'mom_maribel@gmail.com', '04247008458', 'A', 4, 1, '2020-03-21 09:28:56', '2020-12-01 12:13:32', NULL, NULL),
(6, 'rosana medina', '00000000000000000000', 'efectivo', 'V8095668', 'efectivo', 'rosanamedinazm@gmail.com', '04140070021', 'A', 1, 1, '2021-10-26 10:51:33', NULL, NULL, NULL);

--
-- Disparadores `bancos_cliente`
--
DROP TRIGGER IF EXISTS `bancos_cliente_AI`;
DELIMITER $$
CREATE TRIGGER `bancos_cliente_AI` AFTER INSERT ON `bancos_cliente` FOR EACH ROW INSERT INTO bancos_cliente_resp(not_bnk,ncu_bnk,tpc_bnk,rcd_bnk,nom_bnk,cor_bnk,tti_bnk,est_bnk,cod_cli,cod_usu,cre_bnk) VALUES(NEW.not_bnk,NEW.ncu_bnk,NEW.tpc_bnk,NEW.rcd_bnk,NEW.nom_bnk,NEW.cor_bnk,NEW.tti_bnk,NEW.est_bnk,NEW.cod_cli,NEW.cod_usu,NOW())
$$
DELIMITER ;
DROP TRIGGER IF EXISTS `bancos_cliente_BU`;
DELIMITER $$
CREATE TRIGGER `bancos_cliente_BU` BEFORE UPDATE ON `bancos_cliente` FOR EACH ROW IF(NEW.cod_bnk = OLD.cod_bnk)THEN
UPDATE bancos_cliente_resp SET not_bnk=NEW.not_bnk,
			    ncu_bnk=NEW.ncu_bnk,
                            tpc_bnk=NEW.tpc_bnk,
                            rcd_bnk=NEW.rcd_bnk,
                            nom_bnk=NEW.nom_bnk,
                            cor_bnk=NEW.cor_bnk,
                            tti_bnk=NEW.tti_bnk,
                            est_bnk=NEW.est_bnk,
                            cod_cli=NEW.cod_cli,
                            upd_bnk=NEW.upd_bnk 
WHERE cod_bnk=NEW.cod_bnk;

IF(NEW.est_bnk='B' && OLD.est_bnk='A') THEN
UPDATE bancos_cliente_resp SET del_bnk=NEW.del_bnk WHERE cod_bnk=NEW.cod_bnk;
END IF;

IF(NEW.est_bnk='A' && OLD.est_bnk='B') THEN
UPDATE bancos_cliente_resp SET res_bnk=NEW.res_bnk WHERE cod_bnk=NEW.cod_bnk;
END IF;
END IF
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `bancos_cliente_resp`
--

DROP TABLE IF EXISTS `bancos_cliente_resp`;
CREATE TABLE IF NOT EXISTS `bancos_cliente_resp` (
  `cod_bnk` int(11) NOT NULL AUTO_INCREMENT,
  `not_bnk` varchar(45) NOT NULL,
  `ncu_bnk` varchar(45) NOT NULL,
  `tpc_bnk` varchar(45) NOT NULL,
  `rcd_bnk` varchar(20) NOT NULL,
  `nom_bnk` varchar(45) NOT NULL,
  `cor_bnk` varchar(50) DEFAULT NULL,
  `tti_bnk` varchar(50) NOT NULL,
  `est_bnk` varchar(2) NOT NULL,
  `cod_cli` int(11) NOT NULL,
  `cod_usu` int(11) NOT NULL,
  `cre_bnk` datetime DEFAULT NULL,
  `upd_bnk` datetime DEFAULT NULL,
  `del_bnk` datetime DEFAULT NULL,
  `res_bnk` datetime DEFAULT NULL,
  PRIMARY KEY (`cod_bnk`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `bancos_cliente_resp`
--

INSERT INTO `bancos_cliente_resp` (`cod_bnk`, `not_bnk`, `ncu_bnk`, `tpc_bnk`, `rcd_bnk`, `nom_bnk`, `cor_bnk`, `tti_bnk`, `est_bnk`, `cod_cli`, `cod_usu`, `cre_bnk`, `upd_bnk`, `del_bnk`, `res_bnk`) VALUES
(1, 'rosana coromoto medina ', '02030587986554233421', 'ahorro', 'J50986754', 'bicentenario', 'rosanamedina2@gmail.com', '04140070021', 'A', 1, 1, '2020-02-27 09:40:36', NULL, NULL, NULL),
(2, 'rosana coromoto medina', '02016578954378875434', 'corriente', 'J8095668', 'venezuela', 'rosanamedina1@gmail.com', '04140070021', 'A', 1, 1, '2020-02-27 09:42:24', NULL, NULL, NULL),
(3, 'jose felix medina', '04050687967534213456', 'corriente', 'J8095668', 'mercantil', 'josemedina@gmail.com', '04247734274', 'A', 2, 1, '2020-02-27 09:47:21', '2020-12-02 12:16:29', NULL, NULL),
(4, 'jose felix medina ', '05067843671265437890', 'corriente', 'J09566856', 'provincial', 'josemedina@gmail.com', '04247199694', 'A', 2, 1, '2020-02-27 09:49:01', NULL, NULL, NULL),
(5, 'maribel medina', '07986745234567875625', 'ahorro', 'V28016569', 'banesco', 'mom_maribel@gmail.com', '04247008458', 'A', 4, 1, '2020-03-21 21:28:56', '2020-12-01 12:13:32', NULL, NULL),
(6, 'rosana medina', '00000000000000000000', 'efectivo', 'V8095668', 'efectivo', 'rosanamedinazm@gmail.com', '04140070021', 'A', 1, 1, '2021-10-26 22:51:33', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `bancos_trabajadores`
--

DROP TABLE IF EXISTS `bancos_trabajadores`;
CREATE TABLE IF NOT EXISTS `bancos_trabajadores` (
  `cod_bnt` int(11) NOT NULL AUTO_INCREMENT,
  `not_bnt` varchar(50) NOT NULL,
  `ncu_bnt` varchar(25) NOT NULL,
  `tpc_bnt` varchar(20) NOT NULL,
  `rcd_bnt` varchar(20) NOT NULL,
  `nom_bnt` varchar(50) NOT NULL,
  `cor_bnt` varchar(60) NOT NULL,
  `tti_bnt` varchar(16) NOT NULL,
  `est_bnt` varchar(1) NOT NULL,
  `cod_tra` int(11) NOT NULL,
  `cod_usu` int(11) NOT NULL,
  `cre_bnt` datetime NOT NULL,
  `upd_bnt` datetime DEFAULT NULL,
  `del_bnt` datetime DEFAULT NULL,
  `res_bnt` datetime DEFAULT NULL,
  PRIMARY KEY (`cod_bnt`),
  KEY `bnc_trab_ibfk_1` (`cod_usu`),
  KEY `bnc_trab_ibfk_2` (`cod_tra`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `bancos_trabajadores`
--

INSERT INTO `bancos_trabajadores` (`cod_bnt`, `not_bnt`, `ncu_bnt`, `tpc_bnt`, `rcd_bnt`, `nom_bnt`, `cor_bnt`, `tti_bnt`, `est_bnt`, `cod_tra`, `cod_usu`, `cre_bnt`, `upd_bnt`, `del_bnt`, `res_bnt`) VALUES
(4, 'felix jesus medina ', '34243254353453453556', 'corriente', 'V29580458', 'Venezuela', 'f@gmail.com', '04140070021', 'A', 2, 1, '2020-11-26 09:27:41', '2020-12-02 12:46:00', NULL, NULL),
(6, 'jose benitez', '01023456789021346543', 'corriente', 'J97896575', 'banesco', 'joseperez1@gmail.com', '04140070021', 'A', 52, 1, '2020-12-02 11:08:20', '2020-12-02 11:10:47', '2020-12-02 11:08:43', '2020-12-02 11:08:51');

--
-- Disparadores `bancos_trabajadores`
--
DROP TRIGGER IF EXISTS `bancos_trabajadores_AI`;
DELIMITER $$
CREATE TRIGGER `bancos_trabajadores_AI` AFTER INSERT ON `bancos_trabajadores` FOR EACH ROW INSERT INTO bancos_trabajadores_resp(not_bnt,ncu_bnt,tpc_bnt,rcd_bnt,nom_bnt,cor_bnt,tti_bnt,est_bnt,cod_tra,cod_usu,cre_bnt) VALUES(NEW.not_bnt,NEW.ncu_bnt,NEW.tpc_bnt,NEW.rcd_bnt,NEW.nom_bnt,NEW.cor_bnt,NEW.tti_bnt,NEW.est_bnt,NEW.cod_tra,NEW.cod_usu,NOW())
$$
DELIMITER ;
DROP TRIGGER IF EXISTS `bancos_trabajadores_BU`;
DELIMITER $$
CREATE TRIGGER `bancos_trabajadores_BU` BEFORE UPDATE ON `bancos_trabajadores` FOR EACH ROW IF(NEW.cod_bnt = OLD.cod_bnt)THEN
UPDATE bancos_trabajadores_resp SET not_bnt=NEW.not_bnt,
							ncu_bnt=NEW.ncu_bnt,
                            tpc_bnt=NEW.tpc_bnt,
                            rcd_bnt=NEW.rcd_bnt,
                            nom_bnt=NEW.nom_bnt,
                            cor_bnt=NEW.cor_bnt,
                            tti_bnt=NEW.tti_bnt,
                            est_bnt=NEW.est_bnt,
                            cod_tra=New.cod_tra,
                            upd_bnt=NEW.upd_bnt 
WHERE cod_bnt=NEW.cod_bnt;

IF(NEW.est_bnt='B' && OLD.est_bnt='A') THEN
UPDATE bancos_trabajadores_resp SET del_bnt=NEW.del_bnt WHERE cod_bnt=NEW.cod_bnt;
END IF;

IF(NEW.est_bnt='A' && OLD.est_bnt='B') THEN
UPDATE bancos_trabajadores_resp SET res_bnt=NEW.res_bnt WHERE cod_bnt=NEW.cod_bnt;
END IF;
END IF
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `bancos_trabajadores_resp`
--

DROP TABLE IF EXISTS `bancos_trabajadores_resp`;
CREATE TABLE IF NOT EXISTS `bancos_trabajadores_resp` (
  `cod_bnt` int(11) NOT NULL AUTO_INCREMENT,
  `not_bnt` varchar(50) NOT NULL,
  `ncu_bnt` varchar(25) NOT NULL,
  `tpc_bnt` varchar(20) NOT NULL,
  `rcd_bnt` varchar(20) NOT NULL,
  `nom_bnt` varchar(50) NOT NULL,
  `cor_bnt` varchar(60) NOT NULL,
  `tti_bnt` varchar(16) NOT NULL,
  `est_bnt` varchar(1) NOT NULL,
  `cod_tra` int(11) NOT NULL,
  `cod_usu` int(11) NOT NULL,
  `cre_bnt` datetime DEFAULT NULL,
  `upd_bnt` datetime DEFAULT NULL,
  `del_bnt` datetime DEFAULT NULL,
  `res_bnt` datetime DEFAULT NULL,
  PRIMARY KEY (`cod_bnt`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `bancos_trabajadores_resp`
--

INSERT INTO `bancos_trabajadores_resp` (`cod_bnt`, `not_bnt`, `ncu_bnt`, `tpc_bnt`, `rcd_bnt`, `nom_bnt`, `cor_bnt`, `tti_bnt`, `est_bnt`, `cod_tra`, `cod_usu`, `cre_bnt`, `upd_bnt`, `del_bnt`, `res_bnt`) VALUES
(4, 'felix jesus medina ', '34243254353453453556', 'corriente', 'V29580458', 'Venezuela', 'f@gmail.com', '04140070021', 'A', 2, 1, '2020-11-26 09:27:41', '2020-12-02 12:46:00', NULL, NULL),
(5, 'tulio felipe zambrano nazal', '01057698325476980974', 'ahorro', 'J89076543', 'bicentenario', 'tuliofelipe@gmail.com', '04247734274', 'B', 3, 1, '2020-11-30 14:26:49', NULL, '2020-12-02 12:44:34', NULL),
(6, 'jose benitez', '01023456789021346543', 'corriente', 'J97896575', 'banesco', 'joseperez1@gmail.com', '04140070021', 'A', 52, 1, '2020-12-02 11:08:20', '2020-12-02 11:10:47', '2020-12-02 11:08:43', '2020-12-02 11:08:51');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cliente`
--

DROP TABLE IF EXISTS `cliente`;
CREATE TABLE IF NOT EXISTS `cliente` (
  `cod_cli` int(11) NOT NULL AUTO_INCREMENT,
  `nom_cli` varchar(50) NOT NULL,
  `ape_cli` varchar(50) NOT NULL,
  `ced_cli` varchar(20) NOT NULL,
  `rif_cli` varchar(20) NOT NULL,
  `ads_cli` varchar(255) NOT NULL,
  `cor_cli` varchar(50) NOT NULL,
  `tel_cli` varchar(50) NOT NULL,
  `est_cli` varchar(2) NOT NULL,
  `cod_usu` int(11) NOT NULL,
  `cre_cli` datetime DEFAULT NULL,
  `upd_cli` datetime DEFAULT NULL,
  `del_cli` datetime DEFAULT NULL,
  `res_cli` datetime DEFAULT NULL,
  `pas_cli` text,
  PRIMARY KEY (`cod_cli`),
  KEY `cliente_ibfk_1` (`cod_usu`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `cliente`
--

INSERT INTO `cliente` (`cod_cli`, `nom_cli`, `ape_cli`, `ced_cli`, `rif_cli`, `ads_cli`, `cor_cli`, `tel_cli`, `est_cli`, `cod_usu`, `cre_cli`, `upd_cli`, `del_cli`, `res_cli`, `pas_cli`) VALUES
(1, 'rosana ', 'medina', 'V8095668', 'V80956689', 'toico palo gordo', 'rosanamedina@gmail.com', '04140070021', 'A', 1, '2020-02-27 09:34:32', NULL, NULL, NULL, '39472674cb9663dedfb55537704699109ec8f1b7'),
(2, 'jose', 'medina', 'V8108469', 'J81084698', 'pueblo nuevo - Core 2', 'medina_josefasa@gmail.com', '04247199694', 'A', 1, '2020-02-27 09:35:45', '2020-07-29 05:32:09', '2020-03-21 08:09:53', '2020-03-21 08:26:07', ''),
(3, 'diego', 'contreras', 'V26789456', 'J2455566', 'toico', 'felixdiego@gmail.com', '04140070021', 'B', 1, '2020-03-17 10:16:45', NULL, '2020-03-21 08:49:39', '2020-03-21 08:49:27', ''),
(4, 'maribel', 'medina', 'V88933242', 'V88933242', 'las pilas', 'maribel@gmail.com', '03424234234', 'A', 1, '2020-03-18 02:36:39', '2020-05-08 11:29:08', NULL, NULL, ''),
(5, 'felipe Ignacio', 'hernandez sanches', 'V29580451', 'V295804511', 'palo gordo', 'blas@gmail.com', '04140070020', 'A', 1, '2020-11-07 04:00:09', '2021-10-17 01:19:46', NULL, NULL, '');

--
-- Disparadores `cliente`
--
DROP TRIGGER IF EXISTS `cliente_AI`;
DELIMITER $$
CREATE TRIGGER `cliente_AI` AFTER INSERT ON `cliente` FOR EACH ROW INSERT INTO
cliente_resp(nom_cli,ape_cli,ced_cli,rif_cli,ads_cli,cor_cli,tel_cli,est_cli,cod_usu,cre_cli) VALUES(NEW.nom_cli,NEW.ape_cli,NEW.ced_cli,NEW.rif_cli,NEW.ads_cli,NEW.cor_cli,NEW.tel_cli,NEW.est_cli,NEW.cod_usu,NOW())
$$
DELIMITER ;
DROP TRIGGER IF EXISTS `cliente_BU`;
DELIMITER $$
CREATE TRIGGER `cliente_BU` BEFORE UPDATE ON `cliente` FOR EACH ROW IF(NEW.cod_cli = OLD.cod_cli)THEN
UPDATE cliente_resp SET nom_cli=NEW.nom_cli,
							ape_cli=NEW.ape_cli,
                            ced_cli=NEW.ced_cli,
                            rif_cli=NEW.rif_cli,
                            ads_cli=NEW.ads_cli,
                            cor_cli=NEW.cor_cli,
                            tel_cli=NEW.tel_cli,
                            est_cli=NEW.est_cli,
                            upd_cli=NEW.upd_cli 
WHERE cod_cli=NEW.cod_cli;

IF(NEW.est_cli='B' && OLD.est_cli='A') THEN
UPDATE cliente_resp SET del_cli=NEW.del_cli WHERE cod_cli=NEW.cod_cli;
END IF;

IF(NEW.est_cli='A' && OLD.est_cli='B') THEN
UPDATE cliente_resp SET res_cli=NEW.res_cli WHERE cod_cli=NEW.cod_cli;
END IF;
END IF
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cliente_resp`
--

DROP TABLE IF EXISTS `cliente_resp`;
CREATE TABLE IF NOT EXISTS `cliente_resp` (
  `cod_cli` int(11) NOT NULL AUTO_INCREMENT,
  `nom_cli` varchar(50) NOT NULL,
  `ape_cli` varchar(50) NOT NULL,
  `ced_cli` varchar(45) NOT NULL,
  `rif_cli` varchar(45) NOT NULL,
  `ads_cli` varchar(50) NOT NULL,
  `cor_cli` varchar(45) NOT NULL,
  `tel_cli` varchar(45) NOT NULL,
  `est_cli` varchar(2) NOT NULL,
  `cod_usu` int(11) NOT NULL,
  `cre_cli` datetime DEFAULT NULL,
  `upd_cli` datetime DEFAULT NULL,
  `del_cli` datetime DEFAULT NULL,
  `res_cli` datetime DEFAULT NULL,
  PRIMARY KEY (`cod_cli`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `cliente_resp`
--

INSERT INTO `cliente_resp` (`cod_cli`, `nom_cli`, `ape_cli`, `ced_cli`, `rif_cli`, `ads_cli`, `cor_cli`, `tel_cli`, `est_cli`, `cod_usu`, `cre_cli`, `upd_cli`, `del_cli`, `res_cli`) VALUES
(1, 'rosana ', 'medina', 'V8095668', 'V80956689', 'toico palo gordo', 'rosanamedina@gmail.com', '04140070021', 'A', 1, '2020-02-27 09:34:32', NULL, NULL, NULL),
(2, 'jose', 'medina', 'V8108469', 'J81084698', 'pueblo nuevo', 'medina_jose@gmail.com', '04247199694', 'A', 1, '2020-02-27 09:35:45', NULL, NULL, NULL),
(3, 'diego', 'contreras', 'V26789456', 'J2455566', 'toico', 'felixdiego@gmail.com', '04140070021', 'A', 1, '2020-03-17 22:16:45', NULL, NULL, NULL),
(4, 'maribel', 'medina', 'V88933242', 'V88933242', 'asdasd', 'maribel@gmail.com', '03424234234', 'A', 1, '2020-03-18 02:36:39', NULL, NULL, NULL),
(5, 'felipe Ignacio', 'hernandez sanches', 'V29580451', 'V295804511', 'palo gordo', 'blas@gmail.com', '04140070020', 'A', 1, '2020-11-07 04:00:09', '2021-10-17 01:19:46', NULL, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cuadres`
--

DROP TABLE IF EXISTS `cuadres`;
CREATE TABLE IF NOT EXISTS `cuadres` (
  `cod_cua` int(11) NOT NULL AUTO_INCREMENT,
  `cpo_cua` float(10,3) NOT NULL,
  `cpa_cua` float(10,3) DEFAULT NULL,
  `cal_cua` float(10,3) DEFAULT NULL,
  `cmo_cua` float(10,3) DEFAULT NULL,
  `pre_cua` float(15,2) NOT NULL,
  `est_cua` varchar(2) NOT NULL,
  `cod_cli` int(11) NOT NULL,
  `cod_des` int(11) NOT NULL,
  `cod_pro` int(11) NOT NULL,
  `cod_usu` int(11) NOT NULL,
  `cre_cua` datetime DEFAULT NULL,
  `del_cua` datetime DEFAULT NULL,
  `res_cua` datetime DEFAULT NULL,
  PRIMARY KEY (`cod_cua`),
  KEY `cuadres_ibfk_1` (`cod_usu`),
  KEY `cuadres_ibfk_2` (`cod_pro`),
  KEY `cuadres_ibfk_3` (`cod_cli`),
  KEY `cuadres_ibfk_4` (`cod_des`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `cuadres`
--

INSERT INTO `cuadres` (`cod_cua`, `cpo_cua`, `cpa_cua`, `cal_cua`, `cmo_cua`, `pre_cua`, `est_cua`, `cod_cli`, `cod_des`, `cod_pro`, `cod_usu`, `cre_cua`, `del_cua`, `res_cua`) VALUES
(1, 1.000, 0.000, 0.000, 0.000, 3125000.00, 'A', 1, 7, 1, 1, '2020-02-27 09:56:34', NULL, NULL),
(2, 1.000, 10.000, 10.000, 10.000, 4625000.00, 'A', 2, 1, 1, 1, '2020-03-18 11:58:20', '2020-03-21 08:27:18', '2020-03-21 08:27:27');

--
-- Disparadores `cuadres`
--
DROP TRIGGER IF EXISTS `cuadres_AI`;
DELIMITER $$
CREATE TRIGGER `cuadres_AI` AFTER INSERT ON `cuadres` FOR EACH ROW INSERT INTO
cuadres_resp(cpo_cua,cpa_cua,cal_cua,cmo_cua
,pre_cua,est_cua,cod_cli,cod_des,cod_pro,cod_usu,cre_cua) VALUES
(NEW.cpo_cua,NEW.cpa_cua,NEW.cal_cua,NEW.cmo_cua,NEW.pre_cua,NEW.est_cua,NEW.cod_cli,NEW.cod_des,NEW.cod_pro,NEW.cod_usu,NOW())
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cuadres_resp`
--

DROP TABLE IF EXISTS `cuadres_resp`;
CREATE TABLE IF NOT EXISTS `cuadres_resp` (
  `cod_cua` int(11) NOT NULL AUTO_INCREMENT,
  `cpo_cua` float(10,3) NOT NULL,
  `cpa_cua` float(10,3) DEFAULT NULL,
  `cal_cua` float(10,3) DEFAULT NULL,
  `cmo_cua` float(10,3) DEFAULT NULL,
  `pre_cua` float(15,2) NOT NULL,
  `est_cua` varchar(2) NOT NULL,
  `cod_cli` int(11) NOT NULL,
  `cod_des` int(11) NOT NULL,
  `cod_pro` int(11) NOT NULL,
  `cod_usu` int(11) NOT NULL,
  `cre_cua` datetime DEFAULT NULL,
  `del_cua` datetime DEFAULT NULL,
  `res_cua` datetime DEFAULT NULL,
  PRIMARY KEY (`cod_cua`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `cuadres_resp`
--

INSERT INTO `cuadres_resp` (`cod_cua`, `cpo_cua`, `cpa_cua`, `cal_cua`, `cmo_cua`, `pre_cua`, `est_cua`, `cod_cli`, `cod_des`, `cod_pro`, `cod_usu`, `cre_cua`, `del_cua`, `res_cua`) VALUES
(1, 1.000, 0.000, 0.000, 0.000, 3125000.00, 'A', 1, 7, 1, 1, '2020-02-27 09:56:34', NULL, NULL),
(2, 1.000, 10.000, 10.000, 10.000, 4625000.00, 'A', 2, 1, 1, 1, '2020-03-18 23:58:20', NULL, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cuentas`
--

DROP TABLE IF EXISTS `cuentas`;
CREATE TABLE IF NOT EXISTS `cuentas` (
  `cod_cue` int(11) NOT NULL AUTO_INCREMENT,
  `nrf_cue` varchar(30) NOT NULL,
  `cnt_cue` float(20,2) NOT NULL,
  `cnp_cue` float(20,2) NOT NULL,
  `fcu_cue` date NOT NULL,
  `ctc_cue` float(15,2) DEFAULT NULL,
  `est_cue` varchar(1) NOT NULL,
  `cod_bnk` int(11) NOT NULL,
  `cod_bnc` int(11) NOT NULL,
  `cod_cli` int(11) NOT NULL,
  `cod_des` int(11) NOT NULL,
  `cod_usu` int(11) NOT NULL,
  `cre_cue` datetime DEFAULT NULL,
  `upd_cue` datetime DEFAULT NULL,
  `del_cue` datetime DEFAULT NULL,
  `res_cue` datetime DEFAULT NULL,
  PRIMARY KEY (`cod_cue`),
  KEY `cuentas_ibfk_1` (`cod_usu`),
  KEY `cuentas_ibfk_2` (`cod_des`),
  KEY `cuentas_ibfk_3` (`cod_cli`),
  KEY `cuentas_ibfk_4` (`cod_bnk`),
  KEY `cuentas_ibfk_5` (`cod_bnc`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `cuentas`
--

INSERT INTO `cuentas` (`cod_cue`, `nrf_cue`, `cnt_cue`, `cnp_cue`, `fcu_cue`, `ctc_cue`, `est_cue`, `cod_bnk`, `cod_bnc`, `cod_cli`, `cod_des`, `cod_usu`, `cre_cue`, `upd_cue`, `del_cue`, `res_cue`) VALUES
(1, '02233', 7500000.00, 7500000.00, '2020-02-26', 0.00, 'A', 2, 2, 1, 3, 1, '2020-02-27 10:09:30', NULL, NULL, NULL),
(2, '54546', 6250000.00, 6250000.00, '2020-02-26', 0.00, 'A', 1, 2, 1, 4, 1, '2020-02-27 10:11:47', NULL, '2020-03-21 08:25:56', '2020-03-21 08:27:09'),
(3, '564645656', 6250000.00, 6250000.00, '2020-03-19', 0.00, 'A', 3, 1, 2, 2, 1, '2020-02-27 10:12:40', '2020-03-21 09:34:51', '2020-03-21 11:32:33', '2020-03-21 11:32:47'),
(4, '909', 4875000.00, 4875000.00, '2020-03-20', 0.00, 'A', 4, 2, 2, 6, 1, '2020-02-27 10:23:22', '2020-03-21 11:16:19', NULL, NULL),
(5, '453', 4875000.00, 4875000.00, '2020-02-26', 0.00, 'A', 3, 1, 2, 6, 1, '2020-02-27 10:26:15', NULL, NULL, NULL),
(6, '435435345', 7750000.00, 7750000.00, '2020-03-19', 0.00, 'A', 5, 2, 4, 9, 1, '2020-03-21 09:29:33', '2020-03-21 09:36:56', NULL, NULL),
(7, '808', 5625000.00, 5625000.00, '2020-03-21', 0.00, 'A', 5, 1, 4, 10, 1, '2020-03-21 10:47:24', '2020-03-21 11:20:35', NULL, NULL),
(8, '00000000', 1200.00, 1200.00, '2021-10-26', 0.00, 'A', 6, 6, 1, 11, 1, '2021-10-26 10:52:44', NULL, NULL, NULL);

--
-- Disparadores `cuentas`
--
DROP TRIGGER IF EXISTS `cuentas_AI`;
DELIMITER $$
CREATE TRIGGER `cuentas_AI` AFTER INSERT ON `cuentas` FOR EACH ROW INSERT INTO cuentas_resp(nrf_cue,cnt_cue,cnp_cue,fcu_cue,ctc_cue,est_cue,cod_bnk,cod_bnc,cod_cli,cod_des,cod_usu,cre_cue) VALUES (NEW.nrf_cue,NEW.cnt_cue,NEW.cnp_cue,NEW.fcu_cue,NEW.ctc_cue,NEW.est_cue,NEW.cod_bnk,NEW.cod_bnc,NEW.cod_cli,NEW.cod_des,NEW.cod_usu,NOW())
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cuentas_resp`
--

DROP TABLE IF EXISTS `cuentas_resp`;
CREATE TABLE IF NOT EXISTS `cuentas_resp` (
  `cod_cue` int(11) NOT NULL AUTO_INCREMENT,
  `nrf_cue` varchar(30) NOT NULL,
  `cnt_cue` int(11) NOT NULL,
  `cnp_cue` int(11) NOT NULL,
  `fcu_cue` date NOT NULL,
  `ctc_cue` float(15,2) NOT NULL,
  `est_cue` varchar(2) NOT NULL,
  `cod_bnk` int(11) NOT NULL,
  `cod_bnc` int(11) NOT NULL,
  `cod_cli` int(11) NOT NULL,
  `cod_des` int(11) NOT NULL,
  `cod_usu` int(11) NOT NULL,
  `cre_cue` datetime DEFAULT NULL,
  `upd_cue` datetime DEFAULT NULL,
  `del_cue` datetime DEFAULT NULL,
  `res_cue` datetime DEFAULT NULL,
  PRIMARY KEY (`cod_cue`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `cuentas_resp`
--

INSERT INTO `cuentas_resp` (`cod_cue`, `nrf_cue`, `cnt_cue`, `cnp_cue`, `fcu_cue`, `ctc_cue`, `est_cue`, `cod_bnk`, `cod_bnc`, `cod_cli`, `cod_des`, `cod_usu`, `cre_cue`, `upd_cue`, `del_cue`, `res_cue`) VALUES
(1, '02233', 7500000, 7500000, '2020-02-26', 0.00, 'A', 2, 2, 1, 3, 1, '2020-02-27 10:09:30', NULL, NULL, NULL),
(2, '54546', 6250000, 6250000, '2020-02-26', 0.00, 'A', 1, 2, 1, 4, 1, '2020-02-27 10:11:47', NULL, NULL, NULL),
(3, '3525', 6250000, 3250000, '2020-02-26', 3000000.00, 'A', 3, 1, 2, 2, 1, '2020-02-27 10:12:40', NULL, NULL, NULL),
(4, '342435345435345345', 4875000, 2000000, '2020-02-26', 2875000.00, 'A', 4, 2, 2, 6, 1, '2020-02-27 10:23:22', NULL, NULL, NULL),
(5, '453', 4875000, 4875000, '2020-02-26', 0.00, 'A', 3, 1, 2, 6, 1, '2020-02-27 10:26:15', NULL, NULL, NULL),
(6, '43424234', 7750000, 3750000, '2020-03-20', 4000000.00, 'A', 5, 2, 4, 9, 1, '2020-03-21 21:29:33', NULL, NULL, NULL),
(7, '675676', 5625000, 2625000, '2020-03-20', 3000000.00, 'A', 5, 1, 4, 10, 1, '2020-03-21 22:47:24', NULL, NULL, NULL),
(8, '00000000', 1200, 1200, '2021-10-26', 0.00, 'A', 6, 6, 1, 11, 1, '2021-10-26 22:52:44', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `despacho`
--

DROP TABLE IF EXISTS `despacho`;
CREATE TABLE IF NOT EXISTS `despacho` (
  `cod_des` int(11) NOT NULL AUTO_INCREMENT,
  `pre_des` float(20,2) NOT NULL,
  `prd_des` float(20,2) NOT NULL,
  `cpo_des` float(15,2) NOT NULL,
  `cpa_des` float(15,2) DEFAULT NULL,
  `cal_des` float(15,2) DEFAULT NULL,
  `cmo_des` float(15,2) DEFAULT NULL,
  `pok_des` float(6,3) NOT NULL,
  `pak_des` float(6,3) DEFAULT NULL,
  `alk_des` float(6,3) DEFAULT NULL,
  `mok_des` float(6,3) DEFAULT NULL,
  `ppo_des` float(20,2) NOT NULL,
  `ppa_des` float(20,2) DEFAULT NULL,
  `pal_des` float(20,2) DEFAULT NULL,
  `pmo_des` float(20,2) DEFAULT NULL,
  `ctc_des` float(15,2) DEFAULT NULL,
  `est_des` varchar(1) NOT NULL,
  `cod_pro` int(11) NOT NULL,
  `cod_cli` int(11) NOT NULL,
  `cod_usu` int(11) NOT NULL,
  `fec_des` date DEFAULT NULL,
  `cre_des` datetime DEFAULT NULL,
  `upd_des` datetime DEFAULT NULL,
  `del_des` datetime DEFAULT NULL,
  `res_des` datetime DEFAULT NULL,
  PRIMARY KEY (`cod_des`),
  KEY `despacho_ibfk_1` (`cod_usu`),
  KEY `despacho_ibfk_2` (`cod_cli`),
  KEY `despacho_ibfk_3` (`cod_pro`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `despacho`
--

INSERT INTO `despacho` (`cod_des`, `pre_des`, `prd_des`, `cpo_des`, `cpa_des`, `cal_des`, `cmo_des`, `pok_des`, `pak_des`, `alk_des`, `mok_des`, `ppo_des`, `ppa_des`, `pal_des`, `pmo_des`, `ctc_des`, `est_des`, `cod_pro`, `cod_cli`, `cod_usu`, `fec_des`, `cre_des`, `upd_des`, `del_des`, `res_des`) VALUES
(1, 4625000.00, 92.50, 1.00, 0.50, 0.50, 0.50, 25.000, 10.000, 10.000, 10.000, 3125000.00, 500000.00, 500000.00, 500000.00, NULL, 'B', 1, 2, 1, '2020-02-27', '2020-02-27 09:49:37', NULL, NULL, NULL),
(2, 6250000.00, 125.00, 2.00, 0.00, 0.00, 0.00, 50.000, 0.000, 0.000, 0.000, 6250000.00, 0.00, 0.00, 0.00, 0.00, 'A', 1, 2, 1, '2020-02-27', '2020-02-27 09:50:54', NULL, '2020-03-21 08:25:45', '2020-03-21 08:27:01'),
(3, 7500000.00, 150.00, 3.00, 0.00, 0.00, 0.00, 60.000, 0.000, 0.000, 0.000, 7500000.00, 0.00, 0.00, 0.00, 0.00, 'A', 1, 1, 1, '2020-02-27', '2020-02-27 09:52:49', NULL, NULL, NULL),
(4, 6250000.00, 125.00, 2.00, 1.00, 0.50, 0.00, 40.000, 15.000, 10.000, 0.000, 5000000.00, 750000.00, 500000.00, 0.00, 0.00, 'A', 1, 1, 1, '2020-02-27', '2020-02-27 09:53:22', NULL, NULL, NULL),
(5, 11250000.00, 225.00, 4.00, 0.00, 0.00, 0.00, 90.000, 0.000, 0.000, 0.000, 11250000.00, 0.00, 0.00, 0.00, NULL, 'A', 1, 1, 1, '2020-02-27', '2020-02-27 09:54:11', NULL, NULL, NULL),
(6, 4875000.00, 97.50, 1.00, 1.00, 0.50, 0.50, 25.000, 10.000, 10.000, 15.000, 3125000.00, 500000.00, 500000.00, 750000.00, 0.00, 'A', 1, 2, 1, '2020-02-27', '2020-02-27 09:54:46', NULL, NULL, NULL),
(8, 7000000.00, 140.00, 2.00, 0.50, 0.00, 0.00, 50.000, 15.000, 0.000, 0.000, 6250000.00, 750000.00, 0.00, 0.00, NULL, 'A', 1, 1, 1, '2020-03-18', '2020-03-18 11:57:37', NULL, NULL, NULL),
(9, 7750000.00, 155.00, 2.00, 0.00, 0.00, 0.00, 50.000, 10.000, 10.000, 10.000, 6250000.00, 500000.00, 500000.00, 500000.00, NULL, 'A', 1, 4, 1, '2020-03-21', '2020-03-21 02:38:36', NULL, NULL, NULL),
(10, 5625000.00, 112.50, 1.00, 0.00, 0.00, 0.00, 45.000, 0.000, 0.000, 0.000, 5625000.00, 0.00, 0.00, 0.00, 0.00, 'A', 1, 4, 1, '2020-03-21', '2020-03-21 10:44:33', NULL, NULL, NULL),
(11, 1200.00, 120.00, 1.00, 1.00, 1.00, 1.00, 40.000, 10.000, 5.000, 5.000, 1000.00, 100.00, 50.00, 50.00, 0.00, 'A', 1, 1, 1, '2021-10-26', '2021-10-26 10:41:36', NULL, NULL, NULL);

--
-- Disparadores `despacho`
--
DROP TRIGGER IF EXISTS `despacho_AI`;
DELIMITER $$
CREATE TRIGGER `despacho_AI` AFTER INSERT ON `despacho` FOR EACH ROW INSERT INTO despacho_resp(pre_des,prd_des,cpo_des,cpa_des,cal_des,cmo_des,pok_des,pak_des,alk_des,mok_des,ppo_des,ppa_des,pal_des,pmo_des,est_des,cod_pro,cod_cli,cod_usu,fec_des,cre_des) VALUES(NEW.pre_des,NEW.prd_des,NEW.cpo_des,NEW.cpa_des,NEW.cal_des,NEW.cmo_des,NEW.pok_des,NEW.pak_des,NEW.alk_des,NEW.mok_des,NEW.ppo_des,NEW.ppa_des,NEW.pal_des,NEW.pmo_des,NEW.est_des,NEW.cod_pro,NEW.cod_cli,NEW.cod_usu,NEW.fec_des,NOW())
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `despacho_resp`
--

DROP TABLE IF EXISTS `despacho_resp`;
CREATE TABLE IF NOT EXISTS `despacho_resp` (
  `cod_des` int(11) NOT NULL AUTO_INCREMENT,
  `pre_des` float(20,2) NOT NULL,
  `prd_des` float(20,2) NOT NULL,
  `cpo_des` float(15,2) NOT NULL,
  `cpa_des` float(15,2) DEFAULT NULL,
  `cal_des` float(15,2) DEFAULT NULL,
  `cmo_des` float(15,2) DEFAULT NULL,
  `pok_des` float(6,3) NOT NULL,
  `pak_des` float(6,3) DEFAULT NULL,
  `alk_des` float(6,3) DEFAULT NULL,
  `mok_des` float(6,3) DEFAULT NULL,
  `ppo_des` float(20,2) NOT NULL,
  `ppa_des` float(20,2) DEFAULT NULL,
  `pal_des` float(20,2) DEFAULT NULL,
  `pmo_des` float(20,2) DEFAULT NULL,
  `est_des` varchar(1) NOT NULL,
  `cod_pro` int(11) NOT NULL,
  `cod_cli` int(11) NOT NULL,
  `cod_usu` int(11) NOT NULL,
  `fec_des` date DEFAULT NULL,
  `cre_des` datetime DEFAULT NULL,
  `upd_des` datetime DEFAULT NULL,
  `del_des` datetime DEFAULT NULL,
  `res_des` datetime DEFAULT NULL,
  PRIMARY KEY (`cod_des`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `despacho_resp`
--

INSERT INTO `despacho_resp` (`cod_des`, `pre_des`, `prd_des`, `cpo_des`, `cpa_des`, `cal_des`, `cmo_des`, `pok_des`, `pak_des`, `alk_des`, `mok_des`, `ppo_des`, `ppa_des`, `pal_des`, `pmo_des`, `est_des`, `cod_pro`, `cod_cli`, `cod_usu`, `fec_des`, `cre_des`, `upd_des`, `del_des`, `res_des`) VALUES
(1, 4625000.00, 92.50, 1.00, 0.50, 0.50, 0.50, 25.000, 10.000, 10.000, 10.000, 3125000.00, 500000.00, 500000.00, 500000.00, 'A', 1, 2, 1, '2020-02-27', '2020-02-27 09:49:37', NULL, NULL, NULL),
(2, 6250000.00, 125.00, 2.00, 0.00, 0.00, 0.00, 50.000, 0.000, 0.000, 0.000, 6250000.00, 0.00, 0.00, 0.00, 'A', 1, 2, 1, '2020-02-27', '2020-02-27 09:50:54', NULL, NULL, NULL),
(3, 7500000.00, 150.00, 3.00, 0.00, 0.00, 0.00, 60.000, 0.000, 0.000, 0.000, 7500000.00, 0.00, 0.00, 0.00, 'A', 1, 1, 1, '2020-02-27', '2020-02-27 09:52:49', NULL, NULL, NULL),
(4, 6250000.00, 125.00, 2.00, 1.00, 0.50, 0.00, 40.000, 15.000, 10.000, 0.000, 5000000.00, 750000.00, 500000.00, 0.00, 'A', 1, 1, 1, '2020-02-27', '2020-02-27 09:53:22', NULL, NULL, NULL),
(5, 11250000.00, 225.00, 4.00, 0.00, 0.00, 0.00, 90.000, 0.000, 0.000, 0.000, 11250000.00, 0.00, 0.00, 0.00, 'A', 1, 1, 1, '2020-02-27', '2020-02-27 09:54:11', NULL, NULL, NULL),
(6, 4875000.00, 97.50, 1.00, 1.00, 0.50, 0.50, 25.000, 10.000, 10.000, 15.000, 3125000.00, 500000.00, 500000.00, 750000.00, 'A', 1, 2, 1, '2020-02-27', '2020-02-27 09:54:46', NULL, NULL, NULL),
(7, 3125000.00, 62.50, 1.00, 0.00, 0.00, 0.00, 25.000, 0.000, 0.000, 0.000, 3125000.00, 0.00, 0.00, 0.00, 'A', 1, 1, 1, '2020-02-27', '2020-02-27 09:55:13', NULL, NULL, NULL),
(8, 7000000.00, 140.00, 2.00, 0.50, 0.00, 0.00, 50.000, 15.000, 0.000, 0.000, 6250000.00, 750000.00, 0.00, 0.00, 'A', 1, 1, 1, '2020-03-18', '2020-03-18 23:57:37', NULL, NULL, NULL),
(9, 7750000.00, 155.00, 2.00, 0.00, 0.00, 0.00, 50.000, 10.000, 10.000, 10.000, 6250000.00, 500000.00, 500000.00, 500000.00, 'A', 1, 4, 1, '2020-03-21', '2020-03-21 14:38:36', NULL, NULL, NULL),
(10, 5625000.00, 112.50, 1.00, 0.00, 0.00, 0.00, 45.000, 0.000, 0.000, 0.000, 5625000.00, 0.00, 0.00, 0.00, 'A', 1, 4, 1, '2020-03-21', '2020-03-21 22:44:33', NULL, NULL, NULL),
(11, 1200.00, 120.00, 1.00, 1.00, 1.00, 1.00, 40.000, 10.000, 5.000, 5.000, 1000.00, 100.00, 50.00, 50.00, 'A', 1, 1, 1, '2021-10-26', '2021-10-26 22:41:36', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `nomina`
--

DROP TABLE IF EXISTS `nomina`;
CREATE TABLE IF NOT EXISTS `nomina` (
  `cod_nom` int(11) NOT NULL AUTO_INCREMENT,
  `nrf_nom` varchar(25) NOT NULL,
  `cnp_nom` float(20,2) NOT NULL,
  `fcu_nom` date NOT NULL,
  `est_nom` varchar(1) NOT NULL,
  `cod_bnc` int(11) NOT NULL,
  `cod_bnt` int(11) NOT NULL,
  `cod_tra` int(11) NOT NULL,
  `cod_usu` int(11) NOT NULL,
  `cre_nom` datetime DEFAULT NULL,
  `upd_nom` datetime DEFAULT NULL,
  `del_nom` datetime DEFAULT NULL,
  `res_nom` datetime DEFAULT NULL,
  PRIMARY KEY (`cod_nom`),
  KEY `nomina_ibfk_1` (`cod_usu`),
  KEY `nomina_ibfk_2` (`cod_tra`),
  KEY `nomina_ibfk_3` (`cod_bnc`),
  KEY `nomina_ibfk_4` (`cod_bnt`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `nomina`
--

INSERT INTO `nomina` (`cod_nom`, `nrf_nom`, `cnp_nom`, `fcu_nom`, `est_nom`, `cod_bnc`, `cod_bnt`, `cod_tra`, `cod_usu`, `cre_nom`, `upd_nom`, `del_nom`, `res_nom`) VALUES
(1, '07689', 200.00, '2020-11-27', 'A', 2, 4, 2, 1, '2020-11-27 02:14:43', '2020-12-02 12:37:14', NULL, NULL),
(4, '088', 900.00, '2020-11-28', 'A', 1, 4, 2, 1, '2020-11-27 06:52:10', NULL, NULL, NULL),
(5, '255667', 250.00, '2020-12-02', 'A', 2, 4, 2, 1, '2020-12-02 12:28:56', '2020-12-02 12:29:21', NULL, NULL),
(6, '0607', 255.00, '2020-12-03', 'A', 1, 4, 2, 1, '2020-12-02 10:55:34', '2020-12-02 10:56:01', NULL, NULL),
(7, '0345', 300.00, '2020-12-03', 'A', 2, 6, 52, 1, '2020-12-02 11:09:44', NULL, NULL, NULL);

--
-- Disparadores `nomina`
--
DROP TRIGGER IF EXISTS `nomina_AI`;
DELIMITER $$
CREATE TRIGGER `nomina_AI` AFTER INSERT ON `nomina` FOR EACH ROW INSERT INTO nomina_resp(nrf_nom,cnp_nom,fcu_nom,est_nom,cod_bnc,cod_bnt,cod_tra,cod_usu,cre_nom) VALUES (NEW.nrf_nom,NEW.cnp_nom,NEW.fcu_nom,NEW.est_nom,NEW.cod_bnc,NEW.cod_bnt,NEW.cod_tra,NEW.cod_usu,NOW())
$$
DELIMITER ;
DROP TRIGGER IF EXISTS `nomina_BU`;
DELIMITER $$
CREATE TRIGGER `nomina_BU` BEFORE UPDATE ON `nomina` FOR EACH ROW IF(NEW.cod_nom = OLD.cod_nom)THEN
UPDATE nomina_resp SET 		nrf_nom=NEW.nrf_nom,
                            cnp_nom=NEW.cnp_nom,
                            fcu_nom=NEW.fcu_nom,
                            cod_bnc=NEW.cod_bnc,
                            cod_bnt=NEW.cod_bnt,
                            cod_tra=NEW.cod_tra,
                            upd_nom=NEW.upd_nom 
WHERE cod_nom=NEW.cod_nom;

IF(NEW.est_nom='B' && OLD.est_nom='A') THEN
UPDATE nomina_resp SET del_nom=NEW.del_nom WHERE cod_nom=NEW.cod_nom;
END IF;

IF(NEW.est_nom='A' && OLD.est_nom='B') THEN
UPDATE nomina_resp SET res_nom=NEW.res_nom WHERE cod_nom=NEW.cod_nom;
END IF;
END IF
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `nomina_resp`
--

DROP TABLE IF EXISTS `nomina_resp`;
CREATE TABLE IF NOT EXISTS `nomina_resp` (
  `cod_nom` int(11) NOT NULL AUTO_INCREMENT,
  `nrf_nom` varchar(25) NOT NULL,
  `cnp_nom` float(20,2) NOT NULL,
  `fcu_nom` date NOT NULL,
  `est_nom` varchar(1) NOT NULL,
  `cod_bnc` int(11) NOT NULL,
  `cod_bnt` int(11) NOT NULL,
  `cod_tra` int(11) NOT NULL,
  `cod_usu` int(11) NOT NULL,
  `cre_nom` datetime DEFAULT NULL,
  `upd_nom` datetime DEFAULT NULL,
  `del_nom` datetime DEFAULT NULL,
  `res_nom` datetime DEFAULT NULL,
  PRIMARY KEY (`cod_nom`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `nomina_resp`
--

INSERT INTO `nomina_resp` (`cod_nom`, `nrf_nom`, `cnp_nom`, `fcu_nom`, `est_nom`, `cod_bnc`, `cod_bnt`, `cod_tra`, `cod_usu`, `cre_nom`, `upd_nom`, `del_nom`, `res_nom`) VALUES
(1, '07689', 200.00, '2020-11-27', 'A', 2, 4, 2, 1, '2020-11-27 18:49:39', '2020-12-02 12:37:14', NULL, NULL),
(2, '088', 900.00, '2020-11-28', 'A', 1, 4, 2, 1, '2020-11-27 18:52:10', NULL, NULL, NULL),
(3, '255667', 250.00, '2020-12-02', 'A', 4, 4, 2, 1, '2020-12-02 00:28:56', NULL, NULL, NULL),
(4, '0607', 250.00, '2020-12-03', 'A', 1, 4, 2, 1, '2020-12-02 10:55:34', NULL, NULL, NULL),
(5, '0345', 300.00, '2020-12-03', 'A', 2, 6, 52, 1, '2020-12-02 11:09:44', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pedidos`
--

DROP TABLE IF EXISTS `pedidos`;
CREATE TABLE IF NOT EXISTS `pedidos` (
  `cod_ped` int(11) NOT NULL AUTO_INCREMENT,
  `cpo_ped` float(14,2) NOT NULL,
  `cpa_ped` float(14,2) NOT NULL,
  `cmo_ped` float(14,2) NOT NULL,
  `cal_ped` float(14,2) NOT NULL,
  `est_ped` varchar(1) NOT NULL,
  `cod_cli` int(11) NOT NULL,
  `cod_usu` int(11) DEFAULT NULL,
  `fec_ped` date NOT NULL,
  `inf_ped` enum('Pendiente','Recibido','Entregado','Cancelado') NOT NULL,
  `cre_ped` datetime DEFAULT NULL,
  `upd_ped` datetime DEFAULT NULL,
  `del_ped` datetime DEFAULT NULL,
  `res_ped` datetime DEFAULT NULL,
  PRIMARY KEY (`cod_ped`),
  KEY `id_fbk_pedidos_1` (`cod_cli`),
  KEY `id_fbk_pedidos_2` (`cod_usu`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `pedidos`
--

INSERT INTO `pedidos` (`cod_ped`, `cpo_ped`, `cpa_ped`, `cmo_ped`, `cal_ped`, `est_ped`, `cod_cli`, `cod_usu`, `fec_ped`, `inf_ped`, `cre_ped`, `upd_ped`, `del_ped`, `res_ped`) VALUES
(2, 2.00, 2.00, 1.50, 1.00, 'A', 1, 16, '2021-10-25', 'Pendiente', '2021-10-25 02:15:54', '2021-10-26 11:05:32', '2021-10-25 11:15:54', '2021-10-25 11:16:06'),
(3, 3.00, 0.50, 0.50, 0.50, 'A', 1, 16, '2021-10-26', 'Pendiente', '2021-10-25 02:16:23', '2021-10-26 11:05:39', NULL, NULL);

--
-- Disparadores `pedidos`
--
DROP TRIGGER IF EXISTS `pedidos_AI`;
DELIMITER $$
CREATE TRIGGER `pedidos_AI` AFTER INSERT ON `pedidos` FOR EACH ROW INSERT INTO 
pedidos_resp(cpo_ped,cpa_ped,cmo_ped,cal_ped,est_ped,cod_cli,fec_ped,inf_ped,cre_ped)
VALUES (NEW.cpo_ped,NEW.cpa_ped,NEW.cmo_ped,NEW.cal_ped,NEW.est_ped,NEW.cod_cli,NEW.fec_ped,NEW.inf_ped,NOW())
$$
DELIMITER ;
DROP TRIGGER IF EXISTS `pedidos_BU`;
DELIMITER $$
CREATE TRIGGER `pedidos_BU` BEFORE UPDATE ON `pedidos` FOR EACH ROW UPDATE pedidos_resp SET 
cpo_ped=NEW.cpo_ped,					cpa_ped=NEW.cpa_ped,                    cmo_ped=NEW.cmo_ped,                   cal_ped=NEW.cal_ped,                      fec_ped=NEW.fec_ped,                      inf_ped=NEW.inf_ped,                     
upd_ped=NEW.upd_ped,
cod_usu=NEW.cod_usu
WHERE cod_ped=NEW.cod_ped
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pedidos_resp`
--

DROP TABLE IF EXISTS `pedidos_resp`;
CREATE TABLE IF NOT EXISTS `pedidos_resp` (
  `cod_ped` int(11) NOT NULL AUTO_INCREMENT,
  `cpo_ped` float(14,2) NOT NULL,
  `cpa_ped` float(14,2) NOT NULL,
  `cmo_ped` float(14,2) NOT NULL,
  `cal_ped` float(14,2) NOT NULL,
  `est_ped` varchar(1) NOT NULL,
  `cod_cli` int(11) NOT NULL,
  `cod_usu` int(11) DEFAULT NULL,
  `fec_ped` date NOT NULL,
  `inf_ped` enum('Pendiente','Recibido','Entregado','Cancelado') NOT NULL,
  `cre_ped` datetime DEFAULT NULL,
  `upd_ped` datetime DEFAULT NULL,
  `del_ped` datetime DEFAULT NULL,
  `res_ped` datetime DEFAULT NULL,
  PRIMARY KEY (`cod_ped`),
  KEY `id_fbk_pedidos_1` (`cod_cli`),
  KEY `id_fbk_pedidos_2` (`cod_usu`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `pedidos_resp`
--

INSERT INTO `pedidos_resp` (`cod_ped`, `cpo_ped`, `cpa_ped`, `cmo_ped`, `cal_ped`, `est_ped`, `cod_cli`, `cod_usu`, `fec_ped`, `inf_ped`, `cre_ped`, `upd_ped`, `del_ped`, `res_ped`) VALUES
(1, 2.00, 2.00, 1.00, 1.00, 'A', 1, 1, '2021-10-25', 'Cancelado', '2021-10-24 03:09:57', '2021-10-25 12:27:29', NULL, NULL),
(2, 2.00, 2.00, 1.50, 1.00, 'A', 1, 16, '2021-10-25', 'Pendiente', '2021-10-25 14:15:54', '2021-10-26 11:05:32', NULL, NULL),
(3, 3.00, 0.50, 0.50, 0.50, 'A', 1, 16, '2021-10-26', 'Pendiente', '2021-10-25 14:16:23', '2021-10-26 11:05:39', NULL, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `precios`
--

DROP TABLE IF EXISTS `precios`;
CREATE TABLE IF NOT EXISTS `precios` (
  `cod_pre` int(11) NOT NULL AUTO_INCREMENT,
  `prb_pre` float(18,2) NOT NULL,
  `prp_pre` float(15,2) NOT NULL,
  `prd_pre` float(10,2) NOT NULL,
  `tpr_pre` int(11) NOT NULL,
  `est_pre` varchar(1) NOT NULL,
  `cod_pde` int(11) NOT NULL,
  `cod_usu` int(11) NOT NULL,
  `cre_pre` datetime DEFAULT NULL,
  `upd_pre` datetime DEFAULT NULL,
  `del_pre` datetime DEFAULT NULL,
  `res_pre` datetime DEFAULT NULL,
  PRIMARY KEY (`cod_pre`),
  KEY `precios_ibfk_1` (`cod_usu`),
  KEY `precios_ibfk_2` (`cod_pde`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `precios`
--

INSERT INTO `precios` (`cod_pre`, `prb_pre`, `prp_pre`, `prd_pre`, `tpr_pre`, `est_pre`, `cod_pde`, `cod_usu`, `cre_pre`, `upd_pre`, `del_pre`, `res_pre`) VALUES
(1, 50.00, 5.00, 10.00, 1, 'A', 1, 1, NULL, NULL, NULL, NULL),
(2, 60.00, 7.00, 5.00, 1, 'A', 2, 1, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `precios_resp`
--

DROP TABLE IF EXISTS `precios_resp`;
CREATE TABLE IF NOT EXISTS `precios_resp` (
  `cod_pre` int(11) NOT NULL AUTO_INCREMENT,
  `prb_pre` float(18,2) NOT NULL,
  `prp_pre` float(15,2) NOT NULL,
  `prd_pre` float(10,2) NOT NULL,
  `tpr_pre` int(11) NOT NULL,
  `est_pre` varchar(1) NOT NULL,
  `cod_pde` int(11) NOT NULL,
  `cod_usu` int(11) NOT NULL,
  `cre_pre` datetime DEFAULT NULL,
  `upd_pre` datetime DEFAULT NULL,
  `del_pre` datetime DEFAULT NULL,
  `res_pre` datetime DEFAULT NULL,
  PRIMARY KEY (`cod_pre`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `productos`
--

DROP TABLE IF EXISTS `productos`;
CREATE TABLE IF NOT EXISTS `productos` (
  `cod_pro` int(11) NOT NULL AUTO_INCREMENT,
  `tas_pro` float(15,2) NOT NULL,
  `tpo_pro` float(15,2) NOT NULL,
  `tpa_pro` float(15,2) NOT NULL,
  `tmo_pro` float(15,2) NOT NULL,
  `tal_pro` float(15,2) NOT NULL,
  `ppo_pro` float(15,2) NOT NULL,
  `ppa_pro` float(15,2) NOT NULL,
  `pal_pro` float(15,2) NOT NULL,
  `pmo_pro` float(15,2) NOT NULL,
  `csp_pro` float(6,2) NOT NULL,
  `ces_pro` int(10) NOT NULL,
  `prp_pro` float(10,3) NOT NULL,
  `cpo_pro` int(20) NOT NULL,
  `cpa_pro` float(15,3) NOT NULL,
  `cal_pro` float(15,3) NOT NULL,
  `cmo_pro` float(15,3) NOT NULL,
  `est_pro` varchar(1) NOT NULL,
  `act_pro` varchar(1) NOT NULL,
  `fcp_pro` date NOT NULL,
  `fdp_pro` date NOT NULL,
  `cod_edo` int(11) NOT NULL,
  `cod_usu` int(11) NOT NULL,
  `cre_pro` datetime DEFAULT NULL,
  `upd_pro` datetime DEFAULT NULL,
  `del_pro` datetime DEFAULT NULL,
  `res_pro` datetime DEFAULT NULL,
  PRIMARY KEY (`cod_pro`),
  KEY `producto_ibfk_1` (`cod_usu`),
  KEY `producto_ibfk_2` (`cod_edo`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `productos`
--

INSERT INTO `productos` (`cod_pro`, `tas_pro`, `tpo_pro`, `tpa_pro`, `tmo_pro`, `tal_pro`, `ppo_pro`, `ppa_pro`, `pal_pro`, `pmo_pro`, `csp_pro`, `ces_pro`, `prp_pro`, `cpo_pro`, `cpa_pro`, `cal_pro`, `cmo_pro`, `est_pro`, `act_pro`, `fcp_pro`, `fdp_pro`, `cod_edo`, `cod_usu`, `cre_pro`, `upd_pro`, `del_pro`, `res_pro`) VALUES
(1, 10.00, 2.50, 1.00, 1.00, 1.00, 25.00, 10.00, 10.00, 10.00, 2.50, 20, 2.600, 1140, 106.000, 111.000, 53.000, 'A', 'A', '2020-02-25', '2020-02-27', 2, 1, '2020-02-27 09:30:23', '2021-10-26 10:41:02', '2020-03-21 08:41:55', '2020-03-21 08:42:07'),
(3, 10000.00, 3.50, 1.00, 1.00, 1.50, 35000.00, 10000.00, 15000.00, 10000.00, 2.50, 20, 2.600, 2000, 200.000, 200.000, 100.000, 'A', 'B', '2020-03-13', '2020-03-16', 1, 1, '2020-03-16 11:18:23', '2021-10-20 11:32:36', '2020-03-21 08:48:57', '2020-03-21 08:49:06');

--
-- Disparadores `productos`
--
DROP TRIGGER IF EXISTS `productos_AI`;
DELIMITER $$
CREATE TRIGGER `productos_AI` AFTER INSERT ON `productos` FOR EACH ROW INSERT INTO productos_resp(tas_pro,tpo_pro,tpa_pro,tmo_pro,tal_pro,ppo_pro,ppa_pro,pal_pro,pmo_pro,csp_pro,ces_pro,prp_pro,cpo_pro,cpa_pro,cal_pro,cmo_pro,est_pro,act_pro,fcp_pro,fdp_pro,cod_edo,cod_usu,cre_pro) VALUES(NEW.tas_pro,NEW.tpo_pro,NEW.tpa_pro,NEW.tmo_pro,NEW.tal_pro,NEW.ppo_pro,NEW.ppa_pro,NEW.pal_pro,NEW.pmo_pro,NEW.csp_pro,NEW.ces_pro,NEW.prp_pro,NEW.cpo_pro,NEW.cpa_pro,NEW.cal_pro,NEW.cmo_pro,NEW.est_pro,NEW.act_pro,NEW.fcp_pro,NEW.fdp_pro,NEW.cod_edo,NEW.cod_usu,NOW())
$$
DELIMITER ;
DROP TRIGGER IF EXISTS `productos_BU`;
DELIMITER $$
CREATE TRIGGER `productos_BU` BEFORE UPDATE ON `productos` FOR EACH ROW IF(NEW.cod_pro = OLD.cod_pro)THEN
UPDATE productos_resp SET tas_pro=NEW.tas_pro,
							tpo_pro=NEW.tpo_pro,
                            tpa_pro=NEW.tpa_pro,
                            tmo_pro=NEW.tmo_pro,
                            tal_pro=NEW.tal_pro,
                            ppo_pro=NEW.ppo_pro,
                            ppa_pro=NEW.ppa_pro,
                            pal_pro=NEW.pal_pro,
                            pmo_pro=NEW.pmo_pro,
                            csp_pro=NEW.csp_pro,
                            ces_pro=NEW.ces_pro,
                            prp_pro=NEW.prp_pro,
                            cpo_pro=NEW.cpo_pro,
                            cpa_pro=NEW.cpa_pro,
                            cal_pro=NEW.cal_pro,
                            cmo_pro=NEW.cmo_pro,
                            act_pro=NEW.act_pro,
                            est_pro=NEW.est_pro,
                            upd_pro=NEW.upd_pro 
WHERE cod_pro=NEW.cod_pro;

IF(NEW.est_pro='B' && OLD.est_pro='A') THEN
UPDATE productos_resp SET del_pro=NEW.del_pro WHERE cod_pro=NEW.cod_pro;
END IF;

IF(NEW.est_pro='A' && OLD.est_pro='B') THEN
UPDATE productos_resp SET res_pro=NEW.res_pro WHERE cod_pro=NEW.cod_pro;
END IF;
END IF
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `productos_precios`
--

DROP TABLE IF EXISTS `productos_precios`;
CREATE TABLE IF NOT EXISTS `productos_precios` (
  `cod_pde` int(11) NOT NULL AUTO_INCREMENT,
  `nom_pde` varchar(50) NOT NULL,
  `est_pde` varchar(1) NOT NULL,
  `cod_usu` int(11) NOT NULL,
  `cre_pde` datetime DEFAULT NULL,
  `upd_pde` datetime DEFAULT NULL,
  `del_pde` datetime DEFAULT NULL,
  `res_pde` datetime DEFAULT NULL,
  PRIMARY KEY (`cod_pde`),
  KEY `producto_precio_ibfk_1` (`cod_usu`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `productos_precios`
--

INSERT INTO `productos_precios` (`cod_pde`, `nom_pde`, `est_pde`, `cod_usu`, `cre_pde`, `upd_pde`, `del_pde`, `res_pde`) VALUES
(1, 'pollo', 'A', 1, NULL, NULL, NULL, NULL),
(2, 'patas', 'A', 1, NULL, NULL, NULL, NULL);

--
-- Disparadores `productos_precios`
--
DROP TRIGGER IF EXISTS `productos_precios_BU`;
DELIMITER $$
CREATE TRIGGER `productos_precios_BU` BEFORE UPDATE ON `productos_precios` FOR EACH ROW IF(NEW.cod_pde = OLD.cod_pde)THEN
UPDATE productos_precios_resp SET nom_pde=NEW.nom_pde,
                          est_pde=NEW.est_pde,
                          upd_pde=NEW.upd_pde 
WHERE cod_pde=NEW.cod_pde;

IF(NEW.est_pde='B' && OLD.est_pde='A') THEN
UPDATE productos_precios_resp SET del_pde=NEW.del_pde WHERE cod_pde=NEW.cod_pde;
END IF;

IF(NEW.est_pde='A' && OLD.est_pde='B') THEN
UPDATE productos_precios_resp SET res_pde=NEW.res_pde WHERE cod_pde=NEW.cod_pde;
END IF;
END IF
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `productos_precios_resp`
--

DROP TABLE IF EXISTS `productos_precios_resp`;
CREATE TABLE IF NOT EXISTS `productos_precios_resp` (
  `cod_pde` int(11) NOT NULL AUTO_INCREMENT,
  `nom_pde` varchar(50) NOT NULL,
  `est_pde` varchar(1) NOT NULL,
  `cod_usu` int(11) NOT NULL,
  `cre_pde` datetime DEFAULT NULL,
  `upd_pde` datetime DEFAULT NULL,
  `del_pde` datetime DEFAULT NULL,
  `res_pde` datetime DEFAULT NULL,
  PRIMARY KEY (`cod_pde`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `productos_resp`
--

DROP TABLE IF EXISTS `productos_resp`;
CREATE TABLE IF NOT EXISTS `productos_resp` (
  `cod_pro` int(11) NOT NULL AUTO_INCREMENT,
  `tas_pro` float(15,2) NOT NULL,
  `tpo_pro` float(15,2) NOT NULL,
  `tpa_pro` float(15,2) NOT NULL,
  `tmo_pro` float(15,2) NOT NULL,
  `tal_pro` float(15,2) NOT NULL,
  `ppo_pro` float(15,2) NOT NULL,
  `ppa_pro` float(15,2) NOT NULL,
  `pal_pro` float(15,2) NOT NULL,
  `pmo_pro` float(15,2) NOT NULL,
  `csp_pro` float(6,2) NOT NULL,
  `ces_pro` int(10) NOT NULL,
  `prp_pro` float(10,3) NOT NULL,
  `cpo_pro` int(20) NOT NULL,
  `cpa_pro` float(15,3) NOT NULL,
  `cal_pro` float(15,3) NOT NULL,
  `cmo_pro` float(15,3) NOT NULL,
  `est_pro` varchar(1) NOT NULL,
  `act_pro` varchar(2) NOT NULL,
  `fcp_pro` date NOT NULL,
  `fdp_pro` date NOT NULL,
  `cod_edo` int(11) NOT NULL,
  `cod_usu` int(11) NOT NULL,
  `cre_pro` datetime DEFAULT NULL,
  `upd_pro` datetime DEFAULT NULL,
  `del_pro` datetime DEFAULT NULL,
  `res_pro` datetime DEFAULT NULL,
  PRIMARY KEY (`cod_pro`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `productos_resp`
--

INSERT INTO `productos_resp` (`cod_pro`, `tas_pro`, `tpo_pro`, `tpa_pro`, `tmo_pro`, `tal_pro`, `ppo_pro`, `ppa_pro`, `pal_pro`, `pmo_pro`, `csp_pro`, `ces_pro`, `prp_pro`, `cpo_pro`, `cpa_pro`, `cal_pro`, `cmo_pro`, `est_pro`, `act_pro`, `fcp_pro`, `fdp_pro`, `cod_edo`, `cod_usu`, `cre_pro`, `upd_pro`, `del_pro`, `res_pro`) VALUES
(1, 10.00, 2.50, 1.00, 1.00, 1.00, 25.00, 10.00, 10.00, 10.00, 2.50, 20, 2.600, 1140, 106.000, 111.000, 53.000, 'A', 'A', '2020-02-25', '2020-02-27', 1, 1, '2020-02-27 09:30:23', '2021-10-26 10:41:02', NULL, NULL),
(2, 40000.00, 2.60, 1.00, 1.00, 1.00, 104000.00, 40000.00, 40000.00, 40000.00, 2.50, 20, 2.600, 2000, 200.000, 200.000, 100.000, 'A', 'B', '2020-02-24', '2020-02-26', 2, 1, '2020-02-27 09:32:54', NULL, NULL, NULL),
(3, 10000.00, 3.50, 1.00, 1.00, 1.50, 35000.00, 10000.00, 15000.00, 10000.00, 2.50, 20, 2.600, 2000, 200.000, 200.000, 100.000, 'A', 'B', '2020-03-13', '2020-03-16', 1, 1, '2020-03-16 11:18:23', '2021-10-20 11:32:36', NULL, NULL),
(4, 2000.00, 1.00, 1.00, 1.00, 1.00, 2000.00, 2000.00, 2000.00, 2000.00, 2.50, 20, 2.600, 500, 50.000, 50.000, 25.000, 'A', 'B', '2020-03-16', '2020-03-18', 2, 1, '2020-03-16 11:48:57', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `proovedor`
--

DROP TABLE IF EXISTS `proovedor`;
CREATE TABLE IF NOT EXISTS `proovedor` (
  `cod_edo` int(11) NOT NULL AUTO_INCREMENT,
  `nom_edo` varchar(50) NOT NULL,
  `rif_edo` varchar(11) NOT NULL,
  `cor_edo` varchar(50) NOT NULL,
  `dir_edo` varchar(250) NOT NULL,
  `est_edo` varchar(1) NOT NULL,
  `cod_usu` int(11) NOT NULL,
  `cre_edo` datetime DEFAULT NULL,
  `upd_edo` datetime DEFAULT NULL,
  `del_edo` datetime DEFAULT NULL,
  `res_edo` datetime DEFAULT NULL,
  PRIMARY KEY (`cod_edo`),
  KEY `proovedor_ibfk_1` (`cod_usu`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `proovedor`
--

INSERT INTO `proovedor` (`cod_edo`, `nom_edo`, `rif_edo`, `cor_edo`, `dir_edo`, `est_edo`, `cod_usu`, `cre_edo`, `upd_edo`, `del_edo`, `res_edo`) VALUES
(1, 'tobi pollo', 'V2280', 'alejandra@gmail.com', 'tachira-concordia', 'A', 1, '2020-02-27 09:29:04', '2020-12-01 12:49:34', NULL, NULL),
(2, 'guasima pollo', 'J9096731', 'guasimapollo@gmail.com', 'falcon venezuela', 'A', 1, '2020-02-27 09:29:35', '2020-10-31 06:01:50', NULL, NULL),
(10, 'okispollo', 'J8096735', 'okispollo@gmail.com', 'fafdsfcs', 'A', 1, '2020-03-18 02:35:33', NULL, '2020-03-21 08:27:41', '2020-03-21 08:28:45'),
(11, 'guasimodopollo', 'J2858045', 'guasi@gmail.com', 'valencia-tachira', 'A', 1, '2020-03-18 02:40:20', '2020-12-01 11:43:21', '2020-07-09 08:56:13', '2020-07-09 08:56:29');

--
-- Disparadores `proovedor`
--
DROP TRIGGER IF EXISTS `proovedor_AI`;
DELIMITER $$
CREATE TRIGGER `proovedor_AI` AFTER INSERT ON `proovedor` FOR EACH ROW INSERT INTO proovedor_resp (nom_edo,rif_edo,cor_edo,dir_edo,est_edo,cod_usu,cre_edo) 
VALUES (NEW.nom_edo,NEW.rif_edo,NEW.cor_edo,NEW.dir_edo,NEW.est_edo,NEW.cod_usu,NOW())
$$
DELIMITER ;
DROP TRIGGER IF EXISTS `proveedor_BU`;
DELIMITER $$
CREATE TRIGGER `proveedor_BU` BEFORE UPDATE ON `proovedor` FOR EACH ROW IF(NEW.cod_edo = OLD.cod_edo)THEN
UPDATE proovedor_resp SET nom_edo=NEW.nom_edo,
						  rif_edo=NEW.rif_edo,
                          cor_edo=NEW.cor_edo,
                          dir_edo=NEW.dir_edo,
                          est_edo=NEW.est_edo,
                          upd_edo=NEW.upd_edo 
WHERE cod_edo=NEW.cod_edo;

IF(NEW.est_edo='B' && OLD.est_edo='A') THEN
UPDATE proovedor_resp SET del_edo=NEW.del_edo WHERE cod_edo=NEW.cod_edo;
END IF;

IF(NEW.est_edo='A' && OLD.est_edo='B') THEN
UPDATE proovedor_resp SET res_edo=NEW.res_edo WHERE cod_edo=NEW.cod_edo;
END IF;
END IF
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `proovedor_resp`
--

DROP TABLE IF EXISTS `proovedor_resp`;
CREATE TABLE IF NOT EXISTS `proovedor_resp` (
  `cod_edo` int(11) NOT NULL AUTO_INCREMENT,
  `nom_edo` varchar(50) NOT NULL,
  `rif_edo` varchar(11) NOT NULL,
  `cor_edo` varchar(50) NOT NULL,
  `dir_edo` varchar(250) NOT NULL,
  `est_edo` varchar(1) NOT NULL,
  `cod_usu` int(11) NOT NULL,
  `cre_edo` datetime DEFAULT NULL,
  `upd_edo` datetime DEFAULT NULL,
  `del_edo` datetime DEFAULT NULL,
  `res_edo` datetime DEFAULT NULL,
  PRIMARY KEY (`cod_edo`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `proovedor_resp`
--

INSERT INTO `proovedor_resp` (`cod_edo`, `nom_edo`, `rif_edo`, `cor_edo`, `dir_edo`, `est_edo`, `cod_usu`, `cre_edo`, `upd_edo`, `del_edo`, `res_edo`) VALUES
(1, 'tobi pollo', 'V2280', 'alejandra@gmail.com', 'tachira-concordia', 'A', 1, '2020-02-27 09:29:04', '2020-12-01 12:49:34', NULL, NULL),
(2, 'guasima pollo', 'J9096734', 'guasimapollo@gmail.com', 'valencia', 'A', 1, '2020-02-27 09:29:35', NULL, NULL, NULL),
(3, 'felixpo', 'J9096735', 'felix@gmail.com', 'guarumitos', 'A', 1, '2020-03-18 02:28:04', NULL, NULL, NULL),
(4, 'felixpo', 'J9096735', 'felix@gmail.com', 'guarumitos', 'A', 1, '2020-03-18 02:28:06', NULL, NULL, NULL),
(5, 'felixpo', 'J9096735', 'felix@gmail.com', 'guarumitos', 'A', 1, '2020-03-18 02:28:08', NULL, NULL, NULL),
(6, 'felixpo', 'J9096735', 'felix@gmail.com', 'guarumitos', 'A', 1, '2020-03-18 02:28:08', NULL, NULL, NULL),
(7, 'felixpo', 'J9096735', 'felix@gmail.com', 'guarumitos', 'A', 1, '2020-03-18 02:28:09', NULL, NULL, NULL),
(8, 'felixpo', 'J9096735', 'felix@gmail.com', 'guarumitos', 'A', 1, '2020-03-18 02:28:09', NULL, NULL, NULL),
(9, 'felixpo', 'J9096735', 'felix@gmail.com', 'guarumitos', 'A', 1, '2020-03-18 02:28:10', NULL, NULL, NULL),
(10, 'okispollo', 'J8096735', 'okispollo@gmail.com', 'fafdsfcs', 'A', 1, '2020-03-18 02:35:33', NULL, NULL, NULL),
(11, 'guasimodopollo', 'J2858045', 'guasi@gmail.com', 'valencia-tachira', 'A', 1, '2020-03-18 02:40:20', '2020-12-01 11:43:21', NULL, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `trabajadores`
--

DROP TABLE IF EXISTS `trabajadores`;
CREATE TABLE IF NOT EXISTS `trabajadores` (
  `cod_tra` int(11) NOT NULL AUTO_INCREMENT,
  `nom_tra` varchar(50) NOT NULL,
  `ape_tra` varchar(50) NOT NULL,
  `ced_tra` varchar(15) NOT NULL,
  `ads_tra` varchar(100) DEFAULT NULL,
  `cor_tra` varchar(60) NOT NULL,
  `tel_tra` varchar(14) NOT NULL,
  `est_tra` varchar(1) NOT NULL,
  `cod_usu` int(11) NOT NULL,
  `cre_tra` datetime DEFAULT NULL,
  `upd_tra` datetime DEFAULT NULL,
  `del_tra` datetime DEFAULT NULL,
  `res_tra` datetime DEFAULT NULL,
  PRIMARY KEY (`cod_tra`),
  KEY `trabajadores_ibfk_1` (`cod_usu`)
) ENGINE=InnoDB AUTO_INCREMENT=53 DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `trabajadores`
--

INSERT INTO `trabajadores` (`cod_tra`, `nom_tra`, `ape_tra`, `ced_tra`, `ads_tra`, `cor_tra`, `tel_tra`, `est_tra`, `cod_usu`, `cre_tra`, `upd_tra`, `del_tra`, `res_tra`) VALUES
(1, 'jose', 'medina', '8108469', 'pueblo nuevo', 'felix_josefa@gmail.com', '04247199694', 'B', 1, '2020-05-09 11:50:31', '2020-05-09 03:07:37', '2020-05-12 01:48:59', NULL),
(2, 'felix  con', 'jesus', 'V8018469', 'palo gordo-toico-naran', 'felixjesus@gmail.com', '04247734274', 'A', 1, '2020-05-09 11:51:03', '2020-12-02 10:42:49', '2020-12-02 10:53:43', '2020-12-02 10:54:05'),
(3, 'tulio', 'zambrano', 'V16578472', 'barrio obrero', 'tuliocortes@gmail.com', '04167824316', 'A', 1, '2020-05-09 04:14:57', '2020-05-14 12:55:44', NULL, NULL),
(5, 'manuel', 'cepeda', 'V8096665', 'junco', 'manuelcepeda@gmail.com', '04267897653', 'B', 1, '2020-05-12 11:57:41', NULL, '2020-05-12 01:49:08', NULL),
(6, 'manolo', 'suarez', 'V26789540', 'palo gordo', 'manolosuarez@gmail.com', '0412345789', 'B', 1, '2020-05-12 12:01:56', NULL, '2020-05-12 01:49:07', NULL),
(7, 'fdfds', 'fdsfsdf', '5234234', 'fddsf', 'gsdfsd', '524234', 'B', 1, '2020-05-12 12:03:33', NULL, '2020-05-14 12:55:31', NULL),
(9, 'kkkk', '', '5646456', '', '', '', 'B', 1, '2020-05-12 12:05:35', NULL, '2020-05-12 12:28:03', NULL),
(11, 'jose', 'm', '423423', 'asdasd', '', '', 'B', 1, '2020-05-12 12:06:30', NULL, '2020-05-12 12:32:15', NULL),
(12, 'dsyuio', 'adsads', '7898776', 'dasdasd', 'dsadasd@hotmail.com', '4324234', 'B', 1, '2020-05-12 12:12:40', NULL, '2020-11-26 01:29:46', '2020-11-26 01:29:32'),
(15, 'jose', '', 'V59654321', '', '', '', 'B', 1, '2020-05-12 12:33:13', NULL, '2020-05-12 12:38:03', NULL),
(16, 'jun', '', 'V4234324', '', '', '', 'B', 1, '2020-05-12 12:33:39', NULL, '2020-05-12 12:38:05', NULL),
(18, 'jon', '', 'V56465', '', '', '', 'B', 1, '2020-05-12 12:34:20', NULL, '2020-05-12 12:37:57', NULL),
(19, 'jan', '', 'V4535345', '', '', '', 'B', 1, '2020-05-12 12:35:47', NULL, '2020-05-12 12:37:55', NULL),
(20, 'jon ', '', 'V2221132', '', '', '', 'B', 1, '2020-05-12 12:36:42', NULL, '2020-05-12 12:37:59', NULL),
(21, 'jon ', '', 'V22211323', '', '', '', 'B', 1, '2020-05-12 12:36:45', NULL, '2020-05-12 12:38:00', NULL),
(22, 'sdasdasd', '', 'V29009765', '', '', '', 'B', 1, '2020-05-12 12:37:47', NULL, '2020-05-12 12:38:08', NULL),
(23, 'felix', 'medina', 'V12345670', 'palo grande', 'felixmedina@gmail.com', '04247734274', 'A', 1, '2020-05-12 01:30:56', '2020-12-01 01:54:16', '2020-12-01 01:01:53', '2020-12-01 01:02:23'),
(24, 'juan', 'mendez', 'V31456907', 'juncis', 'juncis@gmail.com', '056564523', 'A', 1, '2020-05-12 01:33:14', NULL, '2020-05-12 01:49:01', '2020-12-02 11:04:42'),
(25, 'jone', 'sdadasd', '1111133', 'erfgdhfh', '', '4234234243', 'B', 1, '2020-05-12 01:35:11', NULL, '2020-05-12 01:49:10', NULL),
(26, 'jones', 'sadasda', '444455566', 'dsdfsf', '', '423432', 'B', 1, '2020-05-12 01:36:18', NULL, '2020-05-12 01:48:57', NULL),
(27, 'junes', 'sdasd', '777666', 'asdasda', '', '432543535', 'B', 1, '2020-05-12 01:42:05', NULL, '2020-05-12 01:49:04', NULL),
(28, 'janes', 'dasdasd', '568909754', '', '', '', 'B', 1, '2020-05-12 01:43:27', NULL, '2020-05-14 12:35:23', NULL),
(29, 'jine', 'fadfsf', '2453534', 'sfsdfsd', 'tuliogarcia@gmail.com', '5345654', 'B', 1, '2020-05-12 01:45:43', '2020-05-14 12:54:48', '2020-05-14 12:55:37', NULL),
(30, 'jn', 'fdsdfsdf', '235654758', '', '', '', 'B', 1, '2020-05-12 01:47:13', NULL, '2020-05-14 12:35:26', NULL),
(31, 'ty', 'rggdfgdfg', '999999', '', '', '', 'B', 1, '2020-05-12 01:48:17', NULL, '2020-05-14 12:55:08', NULL),
(32, 'rr', '', '4354', '', '', '', 'B', 1, '2020-05-12 01:48:49', NULL, '2020-05-14 12:55:04', NULL),
(33, 'yu', '', '6789', '', '', '', 'B', 1, '2020-05-12 01:51:07', NULL, '2020-05-14 12:55:19', NULL),
(34, 'eee', '', '432', '', '', '', 'B', 1, '2020-05-12 01:55:42', NULL, '2020-05-14 12:35:19', NULL),
(35, 'sc', '', '6342100', '', '', '', 'B', 1, '2020-05-12 02:01:11', NULL, '2020-05-14 12:55:16', NULL),
(38, 'nm', '', '982', '', '', '', 'B', 1, '2020-05-12 02:02:12', NULL, '2020-05-14 12:55:02', NULL),
(39, 'k', '', '45111', '', '', '', 'B', 1, '2020-05-12 02:05:01', NULL, '2020-05-14 12:35:28', NULL),
(40, 'mbnhgh', '', '6781001', '', '', '', 'B', 1, '2020-05-12 02:08:26', NULL, '2020-05-14 12:55:00', NULL),
(41, 'lon', '', '444', '', '', '', 'B', 1, '2020-05-12 02:15:04', NULL, '2020-05-14 12:35:31', NULL),
(43, 'Medina', 'asdasda', 'V42342356', 'toico ', 's@gmail.com', '04126577888', 'A', 1, '2020-11-07 06:24:40', '2020-11-26 06:41:36', NULL, NULL),
(44, 'yoselin', 'castillo', 'V3123123', 'yosei', 'bb@gmail.com', '04123123334', 'B', 1, '2020-11-07 06:28:27', '2020-11-30 12:25:47', '2020-12-01 11:51:32', NULL),
(45, 'felixx', 'rwe', 'V29580433', 'asdasd', 'felix@gmail.es', '42424', 'B', 1, '2020-11-07 06:30:31', '2020-12-01 01:00:01', '2020-12-01 01:54:23', NULL),
(46, 'petrofosefina ', 'luna', 'V90578654', 'palo gordo', 'petrajosefa@gmail.com', '04147724274', 'B', 1, '2020-11-26 12:53:49', NULL, '2020-12-01 01:54:30', NULL),
(47, 'manuel ', 'perez', 'V8018169', 'loibon', 'loibon@gmail.com', '04127776655', 'A', 1, '2020-11-26 12:58:45', NULL, NULL, NULL),
(48, 'josue', 'molina', 'V21789654', 'moneli', 'molina@gmail.com', '04123456785', 'A', 1, '2020-11-26 02:01:17', NULL, NULL, NULL),
(49, 'Jesus David', 'Medina Medina', 'V29581457', 'toico palogordo', 'jesus@gmail.com', '04140070021', 'A', 1, '2020-12-01 11:50:25', '2020-12-01 11:50:39', NULL, NULL),
(50, 'jose hernandez', 'labrador', 'V21560789', 'palo gordo', 'jose1@gmail.com', '04140070020', 'A', 1, '2020-12-02 10:36:20', '2020-12-02 10:40:19', NULL, NULL),
(51, 'manuel hernandez', 'perez moreno', 'V9109456', 'junco', 'perez@gmail.com', '04247724376', 'A', 1, '2020-12-02 10:45:54', '2020-12-02 10:46:08', NULL, NULL),
(52, 'jose manuel', 'perez benitez', 'V27456780', 'palmira', 'manueljose@gmail.com', '04140070021', 'A', 1, '2020-12-02 11:06:41', '2020-12-02 11:06:56', '2020-12-02 11:07:04', '2020-12-02 11:07:19');

--
-- Disparadores `trabajadores`
--
DROP TRIGGER IF EXISTS `trabajadores_AI`;
DELIMITER $$
CREATE TRIGGER `trabajadores_AI` AFTER INSERT ON `trabajadores` FOR EACH ROW INSERT INTO
trabajadores_resp(nom_tra,ape_tra,ced_tra,ads_tra,cor_tra,tel_tra,est_tra,cod_usu,cre_tra) VALUES(NEW.nom_tra,NEW.ape_tra,NEW.ced_tra,NEW.ads_tra,NEW.cor_tra,NEW.tel_tra,NEW.est_tra,New.cod_usu,NOW())
$$
DELIMITER ;
DROP TRIGGER IF EXISTS `trabajadores_BU`;
DELIMITER $$
CREATE TRIGGER `trabajadores_BU` BEFORE UPDATE ON `trabajadores` FOR EACH ROW IF(NEW.cod_tra = OLD.cod_tra)THEN
UPDATE trabajadores_resp SET nom_tra=NEW.nom_tra,
                          ape_tra=NEW.ape_tra,
                          ced_tra=NEW.ced_tra,
                          ads_tra=NEW.ads_tra,
                          cor_tra=NEW.cor_tra,
                          tel_tra=NEW.tel_tra,
                          est_tra=NEW.est_tra,
                          upd_tra=NEW.upd_tra 
WHERE cod_tra=NEW.cod_tra;

IF(NEW.est_tra='B' && OLD.est_tra='A') THEN
UPDATE trabajadores_resp SET del_tra=NEW.del_tra WHERE cod_tra=NEW.cod_tra;
END IF;

IF(NEW.est_tra='A' && OLD.est_tra='B') THEN
UPDATE trabajadores_resp SET res_tra=NEW.res_tra WHERE cod_tra=NEW.cod_tra;
END IF;
END IF
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `trabajadores_resp`
--

DROP TABLE IF EXISTS `trabajadores_resp`;
CREATE TABLE IF NOT EXISTS `trabajadores_resp` (
  `cod_tra` int(11) NOT NULL AUTO_INCREMENT,
  `nom_tra` varchar(50) NOT NULL,
  `ape_tra` varchar(50) NOT NULL,
  `ced_tra` varchar(9) NOT NULL,
  `ads_tra` varchar(100) DEFAULT NULL,
  `cor_tra` varchar(60) NOT NULL,
  `tel_tra` varchar(12) NOT NULL,
  `est_tra` varchar(1) NOT NULL,
  `cod_usu` int(11) NOT NULL,
  `cre_tra` datetime DEFAULT NULL,
  `upd_tra` datetime DEFAULT NULL,
  `del_tra` datetime DEFAULT NULL,
  `res_tra` datetime DEFAULT NULL,
  PRIMARY KEY (`cod_tra`)
) ENGINE=InnoDB AUTO_INCREMENT=53 DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `trabajadores_resp`
--

INSERT INTO `trabajadores_resp` (`cod_tra`, `nom_tra`, `ape_tra`, `ced_tra`, `ads_tra`, `cor_tra`, `tel_tra`, `est_tra`, `cod_usu`, `cre_tra`, `upd_tra`, `del_tra`, `res_tra`) VALUES
(1, 'felix', 'jose', 'V29580357', 'junco', 'felix@gmail.com', '04140070021', 'A', 1, '2020-05-08 19:28:56', NULL, NULL, NULL),
(2, 'felix  con', 'jesus', 'V8018469', 'palo gordo-toico-naran', 'felixjesus@gmail.com', '04247734274', 'A', 1, '2020-05-09 11:51:03', '2020-12-02 10:42:49', '2020-12-02 10:53:43', '2020-12-02 10:54:05'),
(6, 'manuel', 'cepeda', 'V8096665', 'junco', 'manuelcepeda@gmail.com', '04267897653', 'A', 1, '2020-05-12 11:57:42', NULL, NULL, NULL),
(7, 'manolo', 'suarez', 'V26789540', 'palo gordo', 'manolosuarez@gmail.com', '0412345789', 'A', 1, '2020-05-12 12:01:56', NULL, NULL, NULL),
(8, 'fdfds', 'fdsfsdf', '5234234', 'fddsf', 'gsdfsd', '524234', 'A', 1, '2020-05-12 12:03:33', NULL, NULL, NULL),
(9, 'dasdas', 'dasdasd', '431242', 'sdadasd', 'dsadasd', '341323', 'A', 1, '2020-05-12 12:04:59', NULL, NULL, NULL),
(12, 'dsyuio', 'adsads', '7898776', 'dasdasd', 'dsadasd@hotmail.com', '4324234', 'A', 1, '2020-05-12 12:12:40', NULL, NULL, NULL),
(21, 'felix', 'medina', 'V12345679', 'palo grande', 'felixmedinamedina@gmail.com', '04247734274', 'A', 1, '2020-05-12 13:30:56', NULL, NULL, NULL),
(22, 'juan', 'mendez', 'V31456907', 'juncis', 'juncis@gmail.com', '056564523', 'A', 1, '2020-05-12 13:33:14', NULL, NULL, NULL),
(23, 'felix', 'medina', 'V12345670', 'palo grande', 'felixmedina@gmail.com', '04247734274', 'A', 1, '2020-05-12 13:35:11', '2020-12-01 01:54:16', '2020-12-01 01:01:53', '2020-12-01 01:02:23'),
(26, 'janes', 'dasdasd', '568909754', '', '', '', 'A', 1, '2020-05-12 13:43:27', NULL, NULL, NULL),
(27, 'jine', 'fadfsf', '2453534', 'sfsdfsd', 'sdffsdf', '5345654', 'A', 1, '2020-05-12 13:45:43', NULL, NULL, NULL),
(28, 'jn', 'fdsdfsdf', '235654758', '', '', '', 'A', 1, '2020-05-12 13:47:13', NULL, NULL, NULL),
(29, 'ty', 'rggdfgdfg', '999999', '', '', '', 'A', 1, '2020-05-12 13:48:17', NULL, NULL, NULL),
(30, 'rr', '', '4354', '', '', '', 'A', 1, '2020-05-12 13:48:49', NULL, NULL, NULL),
(31, 'yu', '', '6789', '', '', '', 'A', 1, '2020-05-12 13:51:08', NULL, NULL, NULL),
(32, 'eee', '', '432', '', '', '', 'A', 1, '2020-05-12 13:55:42', NULL, NULL, NULL),
(33, 'sc', '', '6342100', '', '', '', 'A', 1, '2020-05-12 14:01:11', NULL, NULL, NULL),
(34, 'nm', '', '982', '', '', '', 'A', 1, '2020-05-12 14:02:12', NULL, NULL, NULL),
(35, 'k', '', '45111', '', '', '', 'A', 1, '2020-05-12 14:05:01', NULL, NULL, NULL),
(36, 'mbnhgh', '', '6781001', '', '', '', 'A', 1, '2020-05-12 14:08:26', NULL, NULL, NULL),
(37, 'lon', '', '444', '', '', '', 'A', 1, '2020-05-12 14:15:04', NULL, NULL, NULL),
(38, 'dsadasd', '', '09', '', '', '', 'A', 1, '2020-05-12 14:15:34', NULL, NULL, NULL),
(39, 'asdasdasd', 'asdasda', 'V42342356', 'dasdasd', 's@gmail.com', '04126577888', 'A', 1, '2020-11-07 06:24:40', NULL, NULL, NULL),
(40, 'dasdsadasdaa', 'dasdasd', 'V3123123', 'eqweqeq', 'bb@gmail.com', '04123123334', 'A', 1, '2020-11-07 06:28:27', NULL, NULL, NULL),
(41, 'felix', 'dasdasd', 'V29580458', 'dasdad', 'felix@gmail.com', '04140070021', 'A', 1, '2020-11-07 06:30:31', NULL, NULL, NULL),
(42, 'petrofosefina ', 'luna', 'V90578654', 'palo gordo', 'petrajosefa@gmail.com', '04147724274', 'A', 1, '2020-11-26 00:53:49', NULL, NULL, NULL),
(43, 'manuel ', 'perez', 'V8018169', 'loibon', 'loibon@gmail.com', '04127776655', 'A', 1, '2020-11-26 00:58:45', NULL, NULL, NULL),
(44, 'yoselin', 'castillo', 'V3123123', 'yosei', 'bb@gmail.com', '04123123334', 'B', 1, '2020-11-26 02:01:17', '2020-11-30 12:25:47', '2020-12-01 11:51:32', NULL),
(45, 'JesusDavid', 'Medina Medina', 'V29581457', 'toico palogordo', 'jesus@gmail.com', '04140070021', 'A', 1, '2020-12-01 23:50:25', NULL, NULL, NULL),
(50, 'jose ignacio', 'labrador', 'V21560789', 'palo gordo', 'jose@gmail.com', '04140070020', 'A', 1, '2020-12-02 10:36:20', NULL, NULL, NULL),
(51, 'manuel hernandez', 'perez moreno', 'V9109456', 'junco', 'perez@gmail.com', '04247724376', 'A', 1, '2020-12-02 10:45:54', '2020-12-02 10:46:08', NULL, NULL),
(52, 'jose manuel', 'perez benitez', 'V27456780', 'palmira', 'manueljose@gmail.com', '04140070021', 'A', 1, '2020-12-02 11:06:41', '2020-12-02 11:06:56', '2020-12-02 11:07:04', '2020-12-02 11:07:19');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

DROP TABLE IF EXISTS `usuarios`;
CREATE TABLE IF NOT EXISTS `usuarios` (
  `cod_usu` int(11) NOT NULL AUTO_INCREMENT,
  `nom_usu` varchar(45) NOT NULL,
  `ema_usu` varchar(55) NOT NULL,
  `pas_usu` varchar(45) NOT NULL,
  `rol_usu` varchar(45) NOT NULL,
  `est_usu` varchar(2) NOT NULL,
  `cre_usu` datetime DEFAULT NULL,
  `upd_usu` datetime DEFAULT NULL,
  `del_usu` datetime DEFAULT NULL,
  `las_usu` datetime DEFAULT NULL,
  `res_usu` datetime DEFAULT NULL,
  PRIMARY KEY (`cod_usu`)
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`cod_usu`, `nom_usu`, `ema_usu`, `pas_usu`, `rol_usu`, `est_usu`, `cre_usu`, `upd_usu`, `del_usu`, `las_usu`, `res_usu`) VALUES
(1, 'felix', 'felixmedina07052000@gmail.com', 'f214c5aec4eb32e4264cd390ea0fcbaf960b8a3e', 'A', 'A', '2020-02-27 09:27:56', '2020-10-31 04:44:27', NULL, '2021-10-27 12:22:51', NULL),
(2, 'marbe', 'marbe@gmail.com', '3af1b547a8dd07a5ac0bcf962ec852b3f060b716', 'E', 'B', '2020-03-18 03:07:57', '2020-03-21 08:53:19', '2020-11-29 11:46:31', '2020-03-21 08:53:29', NULL),
(3, 'jose', 'jose@gmail.com', '5b53cad999b409898a88133ca9851b097abb500d', 'S', 'B', '2020-03-19 02:26:32', '2020-10-31 04:44:33', '2020-12-01 11:21:41', '2020-03-19 02:45:26', '2020-03-19 02:44:56'),
(4, 'kevin', 'kevin@gmail.com', '1c51e553cb863175222ebd166abc152cca513a50', 'E', 'B', '2020-07-02 11:42:16', '2020-07-02 11:44:37', '2020-12-01 11:21:37', '2020-07-02 11:44:51', NULL),
(5, 'luis', 'luis@gmail.com', 'a77fc64da554424bfcbb1ce6036a1f814073fe28', 'V', 'B', '2020-10-31 04:46:19', NULL, '2020-11-29 11:46:55', NULL, NULL),
(8, 'lol', 'lol@gmail.com', 'a75b563181dea35f4a19ef34324aedfaa388caa1', 'V', 'B', '2020-10-31 04:53:46', NULL, '2020-11-29 11:46:43', NULL, NULL),
(12, 'kfff', 'kfkf@gmail.com', '09595e7223d759a4aaff9dae7bf5ce01fd99eb45', 'V', 'B', '2020-11-24 10:14:21', NULL, '2020-11-29 11:46:36', NULL, NULL),
(13, 'manojose', 'jesus@gmail.com', 'a5083dfb85980adefa5f376b49899e24342359f5', 'V', 'B', '2020-11-25 12:58:56', NULL, '2020-11-29 11:46:45', NULL, NULL),
(14, 'josefiladelfia', 'jesus@gmail.com', 'a5083dfb85980adefa5f376b49899e24342359f5', 'V', 'B', '2020-11-25 12:59:42', NULL, '2020-11-29 11:46:40', NULL, NULL),
(15, 'luisa', 'luisa@gmail.com', 'f214c5aec4eb32e4264cd390ea0fcbaf960b8a3e', 'S', 'B', '2020-11-29 11:43:45', '2020-11-29 11:47:19', '2020-12-02 12:08:40', '2020-11-30 05:27:23', NULL),
(16, 'Yony', 'jonny@gmail.com', 'a561cc40b00bf2eee32a8a41c46d8b58d43e3af3', 'E', 'A', '2020-12-01 11:28:13', '2020-12-02 12:08:35', NULL, '2021-10-26 11:05:16', NULL),
(17, 'prueba', 'prueba@gmail.com', '93301ada8177f4b7841620847f3d06d41febdd1d', 'S', 'A', '2020-12-01 11:40:07', '2020-12-01 11:41:39', NULL, '2020-12-01 11:40:51', NULL),
(18, 'alejandro', 'alejandro@gmail.com', 'b6ad73304cfbf1f5123fe69d961c6a06c99516ad', 'V', 'A', '2021-10-17 11:39:42', NULL, NULL, '2021-10-17 11:40:40', NULL),
(19, 'ffefe', 'feee@gmail.com', 'f74fa39850ccb1c516d542ad6a4b717985972201', 'I', 'A', '2021-10-17 02:09:13', NULL, NULL, NULL, NULL),
(20, 'felix2', 'chucho@gmail.com', '50136d56438ea71652842fa72addd334d71e2e31', 'V', 'A', '2021-10-17 02:18:05', NULL, NULL, '2021-10-17 02:18:17', NULL);

--
-- Disparadores `usuarios`
--
DROP TRIGGER IF EXISTS `usuarios_AI`;
DELIMITER $$
CREATE TRIGGER `usuarios_AI` AFTER INSERT ON `usuarios` FOR EACH ROW INSERT INTO usuarios_resp(nom_usu,ema_usu,pas_usu,rol_usu,est_usu,cre_usu) VALUES(NEW.nom_usu,NEW.ema_usu,NEW.pas_usu,NEW.rol_usu,NEW.est_usu,NOW())
$$
DELIMITER ;
DROP TRIGGER IF EXISTS `usuarios_BU`;
DELIMITER $$
CREATE TRIGGER `usuarios_BU` BEFORE UPDATE ON `usuarios` FOR EACH ROW IF(NEW.cod_usu = OLD.cod_usu)THEN
UPDATE usuarios_resp SET nom_usu=NEW.nom_usu,
                         nom_usu=NEW.nom_usu,
                         pas_usu=NEW.pas_usu,
                         rol_usu=NEW.rol_usu,
                         est_usu=NEW.est_usu,
                         upd_usu=NEW.upd_usu 
WHERE cod_usu=NEW.cod_usu;

IF(NEW.est_usu='B' && OLD.est_usu='A') THEN
UPDATE usuarios_resp SET del_usu=NEW.del_usu WHERE cod_usu=NEW.cod_usu;
END IF;

IF(NEW.est_usu='A' && OLD.est_usu='B') THEN
UPDATE usuarios_resp SET res_usu=NEW.res_usu WHERE cod_usu=NEW.cod_usu;
END IF;
END IF
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios_resp`
--

DROP TABLE IF EXISTS `usuarios_resp`;
CREATE TABLE IF NOT EXISTS `usuarios_resp` (
  `cod_usu` int(11) NOT NULL AUTO_INCREMENT,
  `nom_usu` varchar(45) NOT NULL,
  `ema_usu` varchar(55) NOT NULL,
  `pas_usu` varchar(45) NOT NULL,
  `rol_usu` varchar(45) NOT NULL,
  `est_usu` varchar(2) NOT NULL,
  `cre_usu` datetime DEFAULT NULL,
  `upd_usu` datetime DEFAULT NULL,
  `del_usu` datetime DEFAULT NULL,
  `las_usu` datetime DEFAULT NULL,
  `res_usu` datetime DEFAULT NULL,
  PRIMARY KEY (`cod_usu`)
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `usuarios_resp`
--

INSERT INTO `usuarios_resp` (`cod_usu`, `nom_usu`, `ema_usu`, `pas_usu`, `rol_usu`, `est_usu`, `cre_usu`, `upd_usu`, `del_usu`, `las_usu`, `res_usu`) VALUES
(1, 'felix', 'felixmedina07052000@gmail.com', 'f214c5aec4eb32e4264cd390ea0fcbaf960b8a3e', 'A', 'A', '2020-02-27 09:27:56', '2020-10-31 04:44:27', NULL, NULL, NULL),
(2, 'marbe', 'marbe@gmail.com', 'fb3122091edeff3ecea93e9347d20ee8caec987b', 'V', 'A', '2020-03-18 15:07:58', NULL, NULL, NULL, NULL),
(3, 'jose', 'jose@gmail.com', '5b53cad999b409898a88133ca9851b097abb500d', 'S', 'B', '2020-03-19 02:26:32', '2020-10-31 04:44:33', '2020-12-01 11:21:41', NULL, NULL),
(4, 'kevin', 'kevin@gmail.com', '1c51e553cb863175222ebd166abc152cca513a50', 'E', 'B', '2020-07-02 11:42:16', '2020-07-02 11:44:37', '2020-12-01 11:21:37', NULL, NULL),
(5, 'luis', 'luis@gmail.com', 'a77fc64da554424bfcbb1ce6036a1f814073fe28', 'V', 'A', '2020-10-31 16:46:19', NULL, NULL, NULL, NULL),
(6, 'lola', 'lola@gmail.com', '2a5bb5475ac143cc17acc38d28e97ad2cb2114d5', 'V', 'A', '2020-10-31 16:48:58', NULL, NULL, NULL, NULL),
(7, 'lodas', 'lodas@gmail.com', 'db8cdd9e722cfe60a69883da73e78df77c9120e8', 'V', 'A', '2020-10-31 16:50:05', NULL, NULL, NULL, NULL),
(8, 'lol', 'lol@gmail.com', 'a75b563181dea35f4a19ef34324aedfaa388caa1', 'V', 'A', '2020-10-31 16:53:46', NULL, NULL, NULL, NULL),
(9, 'lului', 'loiloi@gmail.com', 'e80a628d28c05d8490c3be35b26cfc3c49a1b6ac', 'V', 'A', '2020-10-31 17:53:31', NULL, NULL, NULL, NULL),
(10, 'jesus', 'jesus@gmail.com', 'a5083dfb85980adefa5f376b49899e24342359f5', 'S', 'B', '2020-10-31 18:11:38', '2020-12-01 01:06:57', '2020-12-01 11:21:44', NULL, NULL),
(11, 'focas', 'jesus@gmail.com', 'd27f4469be6eadfde078a1e371c9d67d3f7512c7', 'V', 'A', '2020-11-24 22:05:02', NULL, NULL, NULL, NULL),
(12, 'kfff', 'kfkf@gmail.com', '09595e7223d759a4aaff9dae7bf5ce01fd99eb45', 'V', 'A', '2020-11-24 22:14:21', NULL, NULL, NULL, NULL),
(13, 'manojose', 'jesus@gmail.com', 'a5083dfb85980adefa5f376b49899e24342359f5', 'V', 'A', '2020-11-25 00:58:56', NULL, NULL, NULL, NULL),
(14, 'josefiladelfia', 'jesus@gmail.com', 'a5083dfb85980adefa5f376b49899e24342359f5', 'V', 'A', '2020-11-25 00:59:42', NULL, NULL, NULL, NULL),
(15, 'luisa', 'luisa@gmail.com', 'f214c5aec4eb32e4264cd390ea0fcbaf960b8a3e', 'S', 'B', '2020-11-29 23:43:45', '2020-11-29 11:47:19', '2020-12-02 12:08:40', NULL, NULL),
(16, 'Yony', 'jonny@gmail.com', 'a561cc40b00bf2eee32a8a41c46d8b58d43e3af3', 'E', 'A', '2020-12-01 23:28:13', '2020-12-02 12:08:35', NULL, NULL, NULL),
(17, 'prueba', 'prueba@gmail.com', '93301ada8177f4b7841620847f3d06d41febdd1d', 'S', 'A', '2020-12-01 23:40:08', '2020-12-01 11:41:39', NULL, NULL, NULL),
(18, 'alejandro', 'alejandro@gmail.com', 'b6ad73304cfbf1f5123fe69d961c6a06c99516ad', 'V', 'A', '2021-10-17 11:39:42', NULL, NULL, NULL, NULL),
(19, 'ffefe', 'feee@gmail.com', 'f74fa39850ccb1c516d542ad6a4b717985972201', 'I', 'A', '2021-10-17 14:09:13', NULL, NULL, NULL, NULL),
(20, 'felix2', 'chucho@gmail.com', '50136d56438ea71652842fa72addd334d71e2e31', 'V', 'A', '2021-10-17 14:18:05', NULL, NULL, NULL, NULL);

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `bancos_casa`
--
ALTER TABLE `bancos_casa`
  ADD CONSTRAINT `bancosC_ibfk_1` FOREIGN KEY (`cod_usu`) REFERENCES `usuarios` (`cod_usu`) ON UPDATE CASCADE;

--
-- Filtros para la tabla `bancos_cliente`
--
ALTER TABLE `bancos_cliente`
  ADD CONSTRAINT `bancos_cliente_ibfk_1` FOREIGN KEY (`cod_usu`) REFERENCES `usuarios` (`cod_usu`) ON UPDATE CASCADE,
  ADD CONSTRAINT `bancos_cliente_ibfk_2` FOREIGN KEY (`cod_cli`) REFERENCES `cliente` (`cod_cli`) ON UPDATE CASCADE;

--
-- Filtros para la tabla `bancos_trabajadores`
--
ALTER TABLE `bancos_trabajadores`
  ADD CONSTRAINT `bnc_trab_ibfk_1` FOREIGN KEY (`cod_usu`) REFERENCES `usuarios` (`cod_usu`) ON UPDATE CASCADE,
  ADD CONSTRAINT `bnc_trab_ibfk_2` FOREIGN KEY (`cod_tra`) REFERENCES `trabajadores` (`cod_tra`) ON UPDATE CASCADE;

--
-- Filtros para la tabla `cliente`
--
ALTER TABLE `cliente`
  ADD CONSTRAINT `cliente_ibfk_1` FOREIGN KEY (`cod_usu`) REFERENCES `usuarios` (`cod_usu`) ON UPDATE CASCADE;

--
-- Filtros para la tabla `cuadres`
--
ALTER TABLE `cuadres`
  ADD CONSTRAINT `cuadres_ibfk_1` FOREIGN KEY (`cod_usu`) REFERENCES `usuarios` (`cod_usu`) ON UPDATE CASCADE,
  ADD CONSTRAINT `cuadres_ibfk_2` FOREIGN KEY (`cod_pro`) REFERENCES `productos` (`cod_pro`) ON UPDATE CASCADE,
  ADD CONSTRAINT `cuadres_ibfk_3` FOREIGN KEY (`cod_cli`) REFERENCES `cliente` (`cod_cli`) ON UPDATE CASCADE;

--
-- Filtros para la tabla `cuentas`
--
ALTER TABLE `cuentas`
  ADD CONSTRAINT `cuentas_ibfk_1` FOREIGN KEY (`cod_usu`) REFERENCES `usuarios` (`cod_usu`) ON UPDATE CASCADE,
  ADD CONSTRAINT `cuentas_ibfk_2` FOREIGN KEY (`cod_des`) REFERENCES `despacho` (`cod_des`) ON UPDATE CASCADE,
  ADD CONSTRAINT `cuentas_ibfk_3` FOREIGN KEY (`cod_cli`) REFERENCES `cliente` (`cod_cli`) ON UPDATE CASCADE,
  ADD CONSTRAINT `cuentas_ibfk_4` FOREIGN KEY (`cod_bnk`) REFERENCES `bancos_cliente` (`cod_bnk`) ON UPDATE CASCADE,
  ADD CONSTRAINT `cuentas_ibfk_5` FOREIGN KEY (`cod_bnc`) REFERENCES `bancos_casa` (`cod_bnc`) ON UPDATE CASCADE;

--
-- Filtros para la tabla `despacho`
--
ALTER TABLE `despacho`
  ADD CONSTRAINT `despacho_ibfk_1` FOREIGN KEY (`cod_usu`) REFERENCES `usuarios` (`cod_usu`) ON UPDATE CASCADE,
  ADD CONSTRAINT `despacho_ibfk_2` FOREIGN KEY (`cod_cli`) REFERENCES `cliente` (`cod_cli`) ON UPDATE CASCADE,
  ADD CONSTRAINT `despacho_ibfk_3` FOREIGN KEY (`cod_pro`) REFERENCES `productos` (`cod_pro`) ON UPDATE CASCADE;

--
-- Filtros para la tabla `nomina`
--
ALTER TABLE `nomina`
  ADD CONSTRAINT `nomina_ibfk_1` FOREIGN KEY (`cod_usu`) REFERENCES `usuarios` (`cod_usu`) ON UPDATE CASCADE,
  ADD CONSTRAINT `nomina_ibfk_2` FOREIGN KEY (`cod_tra`) REFERENCES `trabajadores` (`cod_tra`) ON UPDATE CASCADE,
  ADD CONSTRAINT `nomina_ibfk_3` FOREIGN KEY (`cod_bnc`) REFERENCES `bancos_casa` (`cod_bnc`) ON UPDATE CASCADE,
  ADD CONSTRAINT `nomina_ibfk_4` FOREIGN KEY (`cod_bnt`) REFERENCES `bancos_trabajadores` (`cod_bnt`) ON UPDATE CASCADE;

--
-- Filtros para la tabla `pedidos`
--
ALTER TABLE `pedidos`
  ADD CONSTRAINT `id_fbk_pedidos_1` FOREIGN KEY (`cod_cli`) REFERENCES `cliente` (`cod_cli`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `id_fbk_pedidos_2` FOREIGN KEY (`cod_usu`) REFERENCES `usuarios` (`cod_usu`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `precios`
--
ALTER TABLE `precios`
  ADD CONSTRAINT `precios_ibfk_1` FOREIGN KEY (`cod_usu`) REFERENCES `usuarios` (`cod_usu`) ON UPDATE CASCADE,
  ADD CONSTRAINT `precios_ibfk_2` FOREIGN KEY (`cod_pde`) REFERENCES `productos_precios` (`cod_pde`) ON UPDATE CASCADE;

--
-- Filtros para la tabla `productos`
--
ALTER TABLE `productos`
  ADD CONSTRAINT `producto_ibfk_1` FOREIGN KEY (`cod_usu`) REFERENCES `usuarios` (`cod_usu`) ON UPDATE CASCADE,
  ADD CONSTRAINT `producto_ibfk_2` FOREIGN KEY (`cod_edo`) REFERENCES `proovedor` (`cod_edo`) ON UPDATE CASCADE;

--
-- Filtros para la tabla `productos_precios`
--
ALTER TABLE `productos_precios`
  ADD CONSTRAINT `producto_precio_ibfk_1` FOREIGN KEY (`cod_usu`) REFERENCES `usuarios` (`cod_usu`) ON UPDATE CASCADE;

--
-- Filtros para la tabla `proovedor`
--
ALTER TABLE `proovedor`
  ADD CONSTRAINT `proovedor_ibfk_1` FOREIGN KEY (`cod_usu`) REFERENCES `usuarios` (`cod_usu`) ON UPDATE CASCADE;

--
-- Filtros para la tabla `trabajadores`
--
ALTER TABLE `trabajadores`
  ADD CONSTRAINT `trabajadores_ibfk_1` FOREIGN KEY (`cod_usu`) REFERENCES `usuarios` (`cod_usu`) ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
