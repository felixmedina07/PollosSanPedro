

CREATE TABLE `bancos_casa` (
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
  KEY `bancosC_ibfk_1` (`cod_usu`),
  CONSTRAINT `bancosC_ibfk_1` FOREIGN KEY (`cod_usu`) REFERENCES `usuarios` (`cod_usu`) ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

INSERT INTO bancos_casa VALUES("1","01020344556677889987","J40346843","mercantil","pollosanpedro2@gmail.com","A","1","2020-02-27 09:37:08","2020-11-30 03:52:30","","");
INSERT INTO bancos_casa VALUES("2","01034567899043657522","J40346843","banesco","pollosanpedro@hotmail.com","A","1","2020-02-27 09:38:13","2020-11-30 03:31:10","2020-03-21 08:25:25","2020-03-21 08:26:53");
INSERT INTO bancos_casa VALUES("3","01056787454343443132","J29789065","venezuela","bancopollo@gmail.com","B","1","2020-05-12 12:07:37","","2020-11-30 03:57:35","");
INSERT INTO bancos_casa VALUES("4","01343434343434344344","V29580458","bicentenario","felixbicentenario@gmail.com","A","1","2020-06-15 05:48:02","","","");
INSERT INTO bancos_casa VALUES("5","09432423423466666445","J28569567","provincial","provincial@gmail.com","A","1","2020-11-24 10:17:35","","2020-11-30 04:02:22","2020-11-30 04:03:01");
INSERT INTO bancos_casa VALUES("6","00000000000000000000","V8101904","efectivo","efectivo@gmail.com","A","1","2021-10-26 10:49:58","","","");



CREATE TABLE `bancos_casa_resp` (
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

INSERT INTO bancos_casa_resp VALUES("1","01020344556677889987","J40346843","mercantil","pollosanpedro2@gmail.com","A","1","2020-02-27 09:37:08","2020-11-30 03:52:30","","");
INSERT INTO bancos_casa_resp VALUES("2","01034567899043657522","J40346843","banesco","pollosanpedro@hotmail.com","A","1","2020-02-27 09:38:13","2020-11-30 03:31:10","","");
INSERT INTO bancos_casa_resp VALUES("3","01056787454343443132","J29789065","venezuela","bancopollo@gmail.com","B","1","2020-05-12 12:07:37","","","");
INSERT INTO bancos_casa_resp VALUES("4","01343434343434344344","V29580458","bicentenario","felixbicentenario@gmail.com","A","1","2020-06-15 17:48:02","","","");
INSERT INTO bancos_casa_resp VALUES("5","09432423423466666445","J28569567","provincial","provincial@gmail.com","A","1","2020-11-24 22:17:35","","2020-11-30 04:02:22","2020-11-30 04:03:01");
INSERT INTO bancos_casa_resp VALUES("6","00000000000000000000","V8101904","efectivo","efectivo@gmail.com","A","1","2021-10-26 22:49:58","","","");



CREATE TABLE `bancos_cliente` (
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
  KEY `bancos_cliente_ibfk_2` (`cod_cli`),
  CONSTRAINT `bancos_cliente_ibfk_1` FOREIGN KEY (`cod_usu`) REFERENCES `usuarios` (`cod_usu`) ON UPDATE CASCADE,
  CONSTRAINT `bancos_cliente_ibfk_2` FOREIGN KEY (`cod_cli`) REFERENCES `cliente` (`cod_cli`) ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

INSERT INTO bancos_cliente VALUES("1","rosana coromoto medina ","02030587986554233421","ahorro","J50986754","bicentenario","rosanamedina2@gmail.com","04140070021","A","1","1","2020-02-27 09:40:36","","","");
INSERT INTO bancos_cliente VALUES("2","rosana coromoto medina","02016578954378875434","corriente","J8095668","venezuela","rosanamedina1@gmail.com","04140070021","A","1","1","2020-02-27 09:42:24","","","");
INSERT INTO bancos_cliente VALUES("3","jose felix medina","04050687967534213456","corriente","J8095668","mercantil","josemedina@gmail.com","04247734274","A","2","1","2020-02-27 09:47:21","2020-12-02 12:16:29","2020-03-21 08:25:35","2020-03-21 08:26:17");
INSERT INTO bancos_cliente VALUES("4","jose felix medina ","05067843671265437890","corriente","J09566856","provincial","josemedina@gmail.com","04247199694","A","2","1","2020-02-27 09:49:01","","","");
INSERT INTO bancos_cliente VALUES("5","maribel medina","07986745234567875625","ahorro","V28016569","banesco","mom_maribel@gmail.com","04247008458","A","4","1","2020-03-21 09:28:56","2020-12-01 12:13:32","","");
INSERT INTO bancos_cliente VALUES("6","rosana medina","00000000000000000000","efectivo","V8095668","efectivo","rosanamedinazm@gmail.com","04140070021","A","1","1","2021-10-26 10:51:33","","","");



CREATE TABLE `bancos_cliente_resp` (
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

INSERT INTO bancos_cliente_resp VALUES("1","rosana coromoto medina ","02030587986554233421","ahorro","J50986754","bicentenario","rosanamedina2@gmail.com","04140070021","A","1","1","2020-02-27 09:40:36","","","");
INSERT INTO bancos_cliente_resp VALUES("2","rosana coromoto medina","02016578954378875434","corriente","J8095668","venezuela","rosanamedina1@gmail.com","04140070021","A","1","1","2020-02-27 09:42:24","","","");
INSERT INTO bancos_cliente_resp VALUES("3","jose felix medina","04050687967534213456","corriente","J8095668","mercantil","josemedina@gmail.com","04247734274","A","2","1","2020-02-27 09:47:21","2020-12-02 12:16:29","","");
INSERT INTO bancos_cliente_resp VALUES("4","jose felix medina ","05067843671265437890","corriente","J09566856","provincial","josemedina@gmail.com","04247199694","A","2","1","2020-02-27 09:49:01","","","");
INSERT INTO bancos_cliente_resp VALUES("5","maribel medina","07986745234567875625","ahorro","V28016569","banesco","mom_maribel@gmail.com","04247008458","A","4","1","2020-03-21 21:28:56","2020-12-01 12:13:32","","");
INSERT INTO bancos_cliente_resp VALUES("6","rosana medina","00000000000000000000","efectivo","V8095668","efectivo","rosanamedinazm@gmail.com","04140070021","A","1","1","2021-10-26 22:51:33","","","");



CREATE TABLE `bancos_trabajadores` (
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
  KEY `bnc_trab_ibfk_2` (`cod_tra`),
  CONSTRAINT `bnc_trab_ibfk_1` FOREIGN KEY (`cod_usu`) REFERENCES `usuarios` (`cod_usu`) ON UPDATE CASCADE,
  CONSTRAINT `bnc_trab_ibfk_2` FOREIGN KEY (`cod_tra`) REFERENCES `trabajadores` (`cod_tra`) ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

INSERT INTO bancos_trabajadores VALUES("4","felix jesus medina ","34243254353453453556","corriente","V29580458","Venezuela","f@gmail.com","04140070021","A","2","1","2020-11-26 09:27:41","2020-12-02 12:46:00","","");
INSERT INTO bancos_trabajadores VALUES("6","jose benitez","01023456789021346543","corriente","J97896575","banesco","joseperez1@gmail.com","04140070021","A","52","1","2020-12-02 11:08:20","2020-12-02 11:10:47","2020-12-02 11:08:43","2020-12-02 11:08:51");



CREATE TABLE `bancos_trabajadores_resp` (
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

INSERT INTO bancos_trabajadores_resp VALUES("4","felix jesus medina ","34243254353453453556","corriente","V29580458","Venezuela","f@gmail.com","04140070021","A","2","1","2020-11-26 09:27:41","2020-12-02 12:46:00","","");
INSERT INTO bancos_trabajadores_resp VALUES("5","tulio felipe zambrano nazal","01057698325476980974","ahorro","J89076543","bicentenario","tuliofelipe@gmail.com","04247734274","B","3","1","2020-11-30 14:26:49","","2020-12-02 12:44:34","");
INSERT INTO bancos_trabajadores_resp VALUES("6","jose benitez","01023456789021346543","corriente","J97896575","banesco","joseperez1@gmail.com","04140070021","A","52","1","2020-12-02 11:08:20","2020-12-02 11:10:47","2020-12-02 11:08:43","2020-12-02 11:08:51");



CREATE TABLE `bienesnacionales` (
  `idbienesnacionales` int(11) NOT NULL,
  `tipo` varchar(45) DEFAULT NULL,
  `modelo` varchar(45) DEFAULT NULL,
  `estatus` char(1) DEFAULT NULL,
  PRIMARY KEY (`idbienesnacionales`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO bienesnacionales VALUES("1","A349","A33348","A");
INSERT INTO bienesnacionales VALUES("2","A349","A33345","A");
INSERT INTO bienesnacionales VALUES("3","A346","A33348","A");



CREATE TABLE `bitacora` (
  `idbitacora` int(11) NOT NULL,
  `movimiento` varchar(425) DEFAULT NULL,
  `fecha` date DEFAULT NULL,
  `hora` time DEFAULT NULL,
  `descripcion` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`idbitacora`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO bitacora VALUES("1","create","2021-10-27","02:55:04","se creo el bien nacionalA346");
INSERT INTO bitacora VALUES("2","update","2021-10-27","02:57:59","seactualizo el bien nacional A349");



CREATE TABLE `cargos` (
  `idcargos` int(11) NOT NULL,
  `tipo` varchar(255) DEFAULT NULL,
  `estatus` char(1) DEFAULT NULL,
  PRIMARY KEY (`idcargos`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO cargos VALUES("1","tec","A");
INSERT INTO cargos VALUES("2","secretary","A");
INSERT INTO cargos VALUES("3","admin","A");



CREATE TABLE `cartuchos` (
  `idcartuchos` int(11) NOT NULL,
  `tipo` varchar(45) DEFAULT NULL,
  `modelo` varchar(45) DEFAULT NULL,
  `estatus` char(1) DEFAULT NULL,
  PRIMARY KEY (`idcartuchos`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO cartuchos VALUES("1","toner","A33348","A");



CREATE TABLE `cliente` (
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
  KEY `cliente_ibfk_1` (`cod_usu`),
  CONSTRAINT `cliente_ibfk_1` FOREIGN KEY (`cod_usu`) REFERENCES `usuarios` (`cod_usu`) ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

INSERT INTO cliente VALUES("1","rosana ","medina","V8095668","V80956689","toico palo gordo","rosanamedina@gmail.com","04140070021","A","1","2020-02-27 09:34:32","","","","39472674cb9663dedfb55537704699109ec8f1b7");
INSERT INTO cliente VALUES("2","jose","medina","V8108469","J81084698","pueblo nuevo - Core 2","medina_josefasa@gmail.com","04247199694","A","1","2020-02-27 09:35:45","2020-07-29 05:32:09","2020-03-21 08:09:53","2020-03-21 08:26:07","");
INSERT INTO cliente VALUES("3","diego","contreras","V26789456","J2455566","toico","felixdiego@gmail.com","04140070021","B","1","2020-03-17 10:16:45","","2020-03-21 08:49:39","2020-03-21 08:49:27","");
INSERT INTO cliente VALUES("4","maribel","medina","V88933242","V88933242","las pilas","maribel@gmail.com","03424234234","A","1","2020-03-18 02:36:39","2020-05-08 11:29:08","","","");
INSERT INTO cliente VALUES("5","felipe Ignacio","hernandez sanches","V29580451","V295804511","palo gordo","blas@gmail.com","04140070020","A","1","2020-11-07 04:00:09","2021-10-17 01:19:46","","","");



CREATE TABLE `cliente_resp` (
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

INSERT INTO cliente_resp VALUES("1","rosana ","medina","V8095668","V80956689","toico palo gordo","rosanamedina@gmail.com","04140070021","A","1","2020-02-27 09:34:32","","","");
INSERT INTO cliente_resp VALUES("2","jose","medina","V8108469","J81084698","pueblo nuevo","medina_jose@gmail.com","04247199694","A","1","2020-02-27 09:35:45","","","");
INSERT INTO cliente_resp VALUES("3","diego","contreras","V26789456","J2455566","toico","felixdiego@gmail.com","04140070021","A","1","2020-03-17 22:16:45","","","");
INSERT INTO cliente_resp VALUES("4","maribel","medina","V88933242","V88933242","asdasd","maribel@gmail.com","03424234234","A","1","2020-03-18 02:36:39","","","");
INSERT INTO cliente_resp VALUES("5","felipe Ignacio","hernandez sanches","V29580451","V295804511","palo gordo","blas@gmail.com","04140070020","A","1","2020-11-07 04:00:09","2021-10-17 01:19:46","","");



CREATE TABLE `cuadres` (
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
  KEY `cuadres_ibfk_4` (`cod_des`),
  CONSTRAINT `cuadres_ibfk_1` FOREIGN KEY (`cod_usu`) REFERENCES `usuarios` (`cod_usu`) ON UPDATE CASCADE,
  CONSTRAINT `cuadres_ibfk_2` FOREIGN KEY (`cod_pro`) REFERENCES `productos` (`cod_pro`) ON UPDATE CASCADE,
  CONSTRAINT `cuadres_ibfk_3` FOREIGN KEY (`cod_cli`) REFERENCES `cliente` (`cod_cli`) ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

INSERT INTO cuadres VALUES("1","1.000","0.000","0.000","0.000","3125000.00","A","1","7","1","1","2020-02-27 09:56:34","","");
INSERT INTO cuadres VALUES("2","1.000","10.000","10.000","10.000","4625000.00","A","2","1","1","1","2020-03-18 11:58:20","2020-03-21 08:27:18","2020-03-21 08:27:27");



CREATE TABLE `cuadres_resp` (
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

INSERT INTO cuadres_resp VALUES("1","1.000","0.000","0.000","0.000","3125000.00","A","1","7","1","1","2020-02-27 09:56:34","","");
INSERT INTO cuadres_resp VALUES("2","1.000","10.000","10.000","10.000","4625000.00","A","2","1","1","1","2020-03-18 23:58:20","","");



CREATE TABLE `cuentas` (
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
  KEY `cuentas_ibfk_5` (`cod_bnc`),
  CONSTRAINT `cuentas_ibfk_1` FOREIGN KEY (`cod_usu`) REFERENCES `usuarios` (`cod_usu`) ON UPDATE CASCADE,
  CONSTRAINT `cuentas_ibfk_2` FOREIGN KEY (`cod_des`) REFERENCES `despacho` (`cod_des`) ON UPDATE CASCADE,
  CONSTRAINT `cuentas_ibfk_3` FOREIGN KEY (`cod_cli`) REFERENCES `cliente` (`cod_cli`) ON UPDATE CASCADE,
  CONSTRAINT `cuentas_ibfk_4` FOREIGN KEY (`cod_bnk`) REFERENCES `bancos_cliente` (`cod_bnk`) ON UPDATE CASCADE,
  CONSTRAINT `cuentas_ibfk_5` FOREIGN KEY (`cod_bnc`) REFERENCES `bancos_casa` (`cod_bnc`) ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;

INSERT INTO cuentas VALUES("1","02233","7500000.00","7500000.00","2020-02-26","0.00","A","2","2","1","3","1","2020-02-27 10:09:30","","","");
INSERT INTO cuentas VALUES("2","54546","6250000.00","6250000.00","2020-02-26","0.00","A","1","2","1","4","1","2020-02-27 10:11:47","","2020-03-21 08:25:56","2020-03-21 08:27:09");
INSERT INTO cuentas VALUES("3","564645656","6250000.00","6250000.00","2020-03-19","0.00","A","3","1","2","2","1","2020-02-27 10:12:40","2020-03-21 09:34:51","2020-03-21 11:32:33","2020-03-21 11:32:47");
INSERT INTO cuentas VALUES("4","909","4875000.00","4875000.00","2020-03-20","0.00","A","4","2","2","6","1","2020-02-27 10:23:22","2020-03-21 11:16:19","","");
INSERT INTO cuentas VALUES("5","453","4875000.00","4875000.00","2020-02-26","0.00","A","3","1","2","6","1","2020-02-27 10:26:15","","","");
INSERT INTO cuentas VALUES("6","435435345","7750000.00","7750000.00","2020-03-19","0.00","A","5","2","4","9","1","2020-03-21 09:29:33","2020-03-21 09:36:56","","");
INSERT INTO cuentas VALUES("7","808","5625000.00","5625000.00","2020-03-21","0.00","A","5","1","4","10","1","2020-03-21 10:47:24","2020-03-21 11:20:35","","");
INSERT INTO cuentas VALUES("8","00000000","1200.00","1200.00","2021-10-26","0.00","A","6","6","1","11","1","2021-10-26 10:52:44","","","");



CREATE TABLE `cuentas_resp` (
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

INSERT INTO cuentas_resp VALUES("1","02233","7500000","7500000","2020-02-26","0.00","A","2","2","1","3","1","2020-02-27 10:09:30","","","");
INSERT INTO cuentas_resp VALUES("2","54546","6250000","6250000","2020-02-26","0.00","A","1","2","1","4","1","2020-02-27 10:11:47","","","");
INSERT INTO cuentas_resp VALUES("3","3525","6250000","3250000","2020-02-26","3000000.00","A","3","1","2","2","1","2020-02-27 10:12:40","","","");
INSERT INTO cuentas_resp VALUES("4","342435345435345345","4875000","2000000","2020-02-26","2875000.00","A","4","2","2","6","1","2020-02-27 10:23:22","","","");
INSERT INTO cuentas_resp VALUES("5","453","4875000","4875000","2020-02-26","0.00","A","3","1","2","6","1","2020-02-27 10:26:15","","","");
INSERT INTO cuentas_resp VALUES("6","43424234","7750000","3750000","2020-03-20","4000000.00","A","5","2","4","9","1","2020-03-21 21:29:33","","","");
INSERT INTO cuentas_resp VALUES("7","675676","5625000","2625000","2020-03-20","3000000.00","A","5","1","4","10","1","2020-03-21 22:47:24","","","");
INSERT INTO cuentas_resp VALUES("8","00000000","1200","1200","2021-10-26","0.00","A","6","6","1","11","1","2021-10-26 22:52:44","","","");



CREATE TABLE `departamentos` (
  `iddepartamentos` int(11) NOT NULL,
  `nombre` varchar(255) DEFAULT NULL,
  `jefe` varchar(255) DEFAULT NULL,
  `estatus` char(1) DEFAULT NULL,
  PRIMARY KEY (`iddepartamentos`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO departamentos VALUES("1","informatica","Douglas Perez","A");
INSERT INTO departamentos VALUES("2","Emergencia","Maria Suarez","A");



CREATE TABLE `despacho` (
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
  KEY `despacho_ibfk_3` (`cod_pro`),
  CONSTRAINT `despacho_ibfk_1` FOREIGN KEY (`cod_usu`) REFERENCES `usuarios` (`cod_usu`) ON UPDATE CASCADE,
  CONSTRAINT `despacho_ibfk_2` FOREIGN KEY (`cod_cli`) REFERENCES `cliente` (`cod_cli`) ON UPDATE CASCADE,
  CONSTRAINT `despacho_ibfk_3` FOREIGN KEY (`cod_pro`) REFERENCES `productos` (`cod_pro`) ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8;

INSERT INTO despacho VALUES("1","4625000.00","92.50","1.00","0.50","0.50","0.50","25.000","10.000","10.000","10.000","3125000.00","500000.00","500000.00","500000.00","","B","1","2","1","2020-02-27","2020-02-27 09:49:37","","","");
INSERT INTO despacho VALUES("2","6250000.00","125.00","2.00","0.00","0.00","0.00","50.000","0.000","0.000","0.000","6250000.00","0.00","0.00","0.00","0.00","A","1","2","1","2020-02-27","2020-02-27 09:50:54","","2020-03-21 08:25:45","2020-03-21 08:27:01");
INSERT INTO despacho VALUES("3","7500000.00","150.00","3.00","0.00","0.00","0.00","60.000","0.000","0.000","0.000","7500000.00","0.00","0.00","0.00","0.00","A","1","1","1","2020-02-27","2020-02-27 09:52:49","","","");
INSERT INTO despacho VALUES("4","6250000.00","125.00","2.00","1.00","0.50","0.00","40.000","15.000","10.000","0.000","5000000.00","750000.00","500000.00","0.00","0.00","A","1","1","1","2020-02-27","2020-02-27 09:53:22","","","");
INSERT INTO despacho VALUES("5","11250000.00","225.00","4.00","0.00","0.00","0.00","90.000","0.000","0.000","0.000","11250000.00","0.00","0.00","0.00","","A","1","1","1","2020-02-27","2020-02-27 09:54:11","","","");
INSERT INTO despacho VALUES("6","4875000.00","97.50","1.00","1.00","0.50","0.50","25.000","10.000","10.000","15.000","3125000.00","500000.00","500000.00","750000.00","0.00","A","1","2","1","2020-02-27","2020-02-27 09:54:46","","","");
INSERT INTO despacho VALUES("8","7000000.00","140.00","2.00","0.50","0.00","0.00","50.000","15.000","0.000","0.000","6250000.00","750000.00","0.00","0.00","","A","1","1","1","2020-03-18","2020-03-18 11:57:37","","","");
INSERT INTO despacho VALUES("9","7750000.00","155.00","2.00","0.00","0.00","0.00","50.000","10.000","10.000","10.000","6250000.00","500000.00","500000.00","500000.00","","A","1","4","1","2020-03-21","2020-03-21 02:38:36","","","");
INSERT INTO despacho VALUES("10","5625000.00","112.50","1.00","0.00","0.00","0.00","45.000","0.000","0.000","0.000","5625000.00","0.00","0.00","0.00","0.00","A","1","4","1","2020-03-21","2020-03-21 10:44:33","","","");
INSERT INTO despacho VALUES("11","1200.00","120.00","1.00","1.00","1.00","1.00","40.000","10.000","5.000","5.000","1000.00","100.00","50.00","50.00","0.00","A","1","1","1","2021-10-26","2021-10-26 10:41:36","","","");
INSERT INTO despacho VALUES("12","1350.00","135.00","2.00","1.00","0.00","0.00","52.000","5.000","0.000","0.000","1300.00","50.00","0.00","0.00","","A","1","1","1","2021-10-27","2021-10-27 10:29:39","","","");



CREATE TABLE `despacho_resp` (
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
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8;

INSERT INTO despacho_resp VALUES("1","4625000.00","92.50","1.00","0.50","0.50","0.50","25.000","10.000","10.000","10.000","3125000.00","500000.00","500000.00","500000.00","A","1","2","1","2020-02-27","2020-02-27 09:49:37","","","");
INSERT INTO despacho_resp VALUES("2","6250000.00","125.00","2.00","0.00","0.00","0.00","50.000","0.000","0.000","0.000","6250000.00","0.00","0.00","0.00","A","1","2","1","2020-02-27","2020-02-27 09:50:54","","","");
INSERT INTO despacho_resp VALUES("3","7500000.00","150.00","3.00","0.00","0.00","0.00","60.000","0.000","0.000","0.000","7500000.00","0.00","0.00","0.00","A","1","1","1","2020-02-27","2020-02-27 09:52:49","","","");
INSERT INTO despacho_resp VALUES("4","6250000.00","125.00","2.00","1.00","0.50","0.00","40.000","15.000","10.000","0.000","5000000.00","750000.00","500000.00","0.00","A","1","1","1","2020-02-27","2020-02-27 09:53:22","","","");
INSERT INTO despacho_resp VALUES("5","11250000.00","225.00","4.00","0.00","0.00","0.00","90.000","0.000","0.000","0.000","11250000.00","0.00","0.00","0.00","A","1","1","1","2020-02-27","2020-02-27 09:54:11","","","");
INSERT INTO despacho_resp VALUES("6","4875000.00","97.50","1.00","1.00","0.50","0.50","25.000","10.000","10.000","15.000","3125000.00","500000.00","500000.00","750000.00","A","1","2","1","2020-02-27","2020-02-27 09:54:46","","","");
INSERT INTO despacho_resp VALUES("7","3125000.00","62.50","1.00","0.00","0.00","0.00","25.000","0.000","0.000","0.000","3125000.00","0.00","0.00","0.00","A","1","1","1","2020-02-27","2020-02-27 09:55:13","","","");
INSERT INTO despacho_resp VALUES("8","7000000.00","140.00","2.00","0.50","0.00","0.00","50.000","15.000","0.000","0.000","6250000.00","750000.00","0.00","0.00","A","1","1","1","2020-03-18","2020-03-18 23:57:37","","","");
INSERT INTO despacho_resp VALUES("9","7750000.00","155.00","2.00","0.00","0.00","0.00","50.000","10.000","10.000","10.000","6250000.00","500000.00","500000.00","500000.00","A","1","4","1","2020-03-21","2020-03-21 14:38:36","","","");
INSERT INTO despacho_resp VALUES("10","5625000.00","112.50","1.00","0.00","0.00","0.00","45.000","0.000","0.000","0.000","5625000.00","0.00","0.00","0.00","A","1","4","1","2020-03-21","2020-03-21 22:44:33","","","");
INSERT INTO despacho_resp VALUES("11","1200.00","120.00","1.00","1.00","1.00","1.00","40.000","10.000","5.000","5.000","1000.00","100.00","50.00","50.00","A","1","1","1","2021-10-26","2021-10-26 22:41:36","","","");
INSERT INTO despacho_resp VALUES("12","1350.00","135.00","2.00","1.00","0.00","0.00","52.000","5.000","0.000","0.000","1300.00","50.00","0.00","0.00","A","1","1","1","2021-10-27","2021-10-27 10:29:39","","","");



CREATE TABLE `detalle_bienes` (
  `iddetalle_bienes` int(11) NOT NULL,
  `codigo` varchar(45) DEFAULT NULL,
  `estatus` char(1) DEFAULT NULL,
  `bienesnacionales_idbienesnacionales` int(11) NOT NULL,
  `departamentos_iddepartamentos` int(11) NOT NULL,
  PRIMARY KEY (`iddetalle_bienes`),
  KEY `fk_detalle_bienes_bienesnacionales1_idx` (`bienesnacionales_idbienesnacionales`),
  KEY `fk_detalle_bienes_departamentos1_idx` (`departamentos_iddepartamentos`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO detalle_bienes VALUES("1","2349","A","1","1");
INSERT INTO detalle_bienes VALUES("2","2345","A","2","2");
INSERT INTO detalle_bienes VALUES("3","2347","A","3","1");



CREATE TABLE `detalle_cartuchos` (
  `iddetalle_cartuchos` int(11) NOT NULL,
  `codigo` varchar(45) DEFAULT NULL,
  `estatus` char(1) DEFAULT NULL,
  `cartuchos_idcartuchos` int(11) NOT NULL,
  `departamentos_iddepartamentos` int(11) NOT NULL,
  PRIMARY KEY (`iddetalle_cartuchos`),
  KEY `fk_detalle_cartuchos_cartuchos1_idx` (`cartuchos_idcartuchos`),
  KEY `fk_detalle_cartuchos_departamentos1_idx` (`departamentos_iddepartamentos`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO detalle_cartuchos VALUES("1","trwf457","A","1","2");



CREATE TABLE `firmadigital` (
  `idfirmadigital` int(11) NOT NULL,
  `firmante` varchar(255) DEFAULT NULL,
  `codigounico` varchar(45) DEFAULT NULL,
  `estatus` char(1) DEFAULT NULL,
  PRIMARY KEY (`idfirmadigital`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;




CREATE TABLE `inventario` (
  `idinventario` int(11) NOT NULL,
  `articulo` varchar(255) DEFAULT NULL,
  `cantidad` int(100) DEFAULT NULL,
  `estatus` char(1) DEFAULT NULL,
  PRIMARY KEY (`idinventario`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO inventario VALUES("1","rodillo de impresion","0","A");
INSERT INTO inventario VALUES("2","rodillo de limpieza","0","A");
INSERT INTO inventario VALUES("3","tolva","0","A");
INSERT INTO inventario VALUES("4","lampara","0","A");
INSERT INTO inventario VALUES("5","toner","0","A");
INSERT INTO inventario VALUES("6","tinta","0","A");



CREATE TABLE `nomina` (
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
  KEY `nomina_ibfk_4` (`cod_bnt`),
  CONSTRAINT `nomina_ibfk_1` FOREIGN KEY (`cod_usu`) REFERENCES `usuarios` (`cod_usu`) ON UPDATE CASCADE,
  CONSTRAINT `nomina_ibfk_2` FOREIGN KEY (`cod_tra`) REFERENCES `trabajadores` (`cod_tra`) ON UPDATE CASCADE,
  CONSTRAINT `nomina_ibfk_3` FOREIGN KEY (`cod_bnc`) REFERENCES `bancos_casa` (`cod_bnc`) ON UPDATE CASCADE,
  CONSTRAINT `nomina_ibfk_4` FOREIGN KEY (`cod_bnt`) REFERENCES `bancos_trabajadores` (`cod_bnt`) ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;

INSERT INTO nomina VALUES("1","07689","200.00","2020-11-27","A","2","4","2","1","2020-11-27 02:14:43","2020-12-02 12:37:14","","");
INSERT INTO nomina VALUES("4","088","900.00","2020-11-28","A","1","4","2","1","2020-11-27 06:52:10","","","");
INSERT INTO nomina VALUES("5","255667","250.00","2020-12-02","A","2","4","2","1","2020-12-02 12:28:56","2020-12-02 12:29:21","","");
INSERT INTO nomina VALUES("6","0607","255.00","2020-12-03","A","1","4","2","1","2020-12-02 10:55:34","2020-12-02 10:56:01","","");
INSERT INTO nomina VALUES("7","0345","300.00","2020-12-03","A","2","6","52","1","2020-12-02 11:09:44","","","");



CREATE TABLE `nomina_resp` (
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

INSERT INTO nomina_resp VALUES("1","07689","200.00","2020-11-27","A","2","4","2","1","2020-11-27 18:49:39","2020-12-02 12:37:14","","");
INSERT INTO nomina_resp VALUES("2","088","900.00","2020-11-28","A","1","4","2","1","2020-11-27 18:52:10","","","");
INSERT INTO nomina_resp VALUES("3","255667","250.00","2020-12-02","A","4","4","2","1","2020-12-02 00:28:56","","","");
INSERT INTO nomina_resp VALUES("4","0607","250.00","2020-12-03","A","1","4","2","1","2020-12-02 10:55:34","","","");
INSERT INTO nomina_resp VALUES("5","0345","300.00","2020-12-03","A","2","6","52","1","2020-12-02 11:09:44","","","");



CREATE TABLE `pedidos` (
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
  KEY `id_fbk_pedidos_2` (`cod_usu`),
  CONSTRAINT `id_fbk_pedidos_1` FOREIGN KEY (`cod_cli`) REFERENCES `cliente` (`cod_cli`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `id_fbk_pedidos_2` FOREIGN KEY (`cod_usu`) REFERENCES `usuarios` (`cod_usu`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

INSERT INTO pedidos VALUES("2","2.00","2.00","1.50","1.00","A","1","1","2021-10-25","Cancelado","2021-10-25 02:15:54","2021-10-27 10:26:56","2021-10-25 11:15:54","2021-10-25 11:16:06");
INSERT INTO pedidos VALUES("3","3.00","0.50","0.50","0.50","A","1","16","2021-10-26","Pendiente","2021-10-25 02:16:23","2021-10-26 11:05:39","","");
INSERT INTO pedidos VALUES("4","3.00","0.00","0.00","0.00","A","1","","2021-10-27","Pendiente","2021-10-27 09:05:01","","","");



CREATE TABLE `pedidos_resp` (
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
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

INSERT INTO pedidos_resp VALUES("1","2.00","2.00","1.00","1.00","A","1","1","2021-10-25","Cancelado","2021-10-24 03:09:57","2021-10-25 12:27:29","","");
INSERT INTO pedidos_resp VALUES("2","2.00","2.00","1.50","1.00","A","1","1","2021-10-25","Cancelado","2021-10-25 14:15:54","2021-10-27 10:26:56","","");
INSERT INTO pedidos_resp VALUES("3","3.00","0.50","0.50","0.50","A","1","16","2021-10-26","Pendiente","2021-10-25 14:16:23","2021-10-26 11:05:39","","");
INSERT INTO pedidos_resp VALUES("4","3.00","0.00","0.00","0.00","A","1","","2021-10-27","Pendiente","2021-10-27 09:05:01","","","");



CREATE TABLE `precios` (
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
  KEY `precios_ibfk_2` (`cod_pde`),
  CONSTRAINT `precios_ibfk_1` FOREIGN KEY (`cod_usu`) REFERENCES `usuarios` (`cod_usu`) ON UPDATE CASCADE,
  CONSTRAINT `precios_ibfk_2` FOREIGN KEY (`cod_pde`) REFERENCES `productos_precios` (`cod_pde`) ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

INSERT INTO precios VALUES("1","50.00","5.00","10.00","1","A","1","1","","","","");
INSERT INTO precios VALUES("2","60.00","7.00","5.00","1","A","2","1","","","","");



CREATE TABLE `precios_resp` (
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




CREATE TABLE `productos` (
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
  KEY `producto_ibfk_2` (`cod_edo`),
  CONSTRAINT `producto_ibfk_1` FOREIGN KEY (`cod_usu`) REFERENCES `usuarios` (`cod_usu`) ON UPDATE CASCADE,
  CONSTRAINT `producto_ibfk_2` FOREIGN KEY (`cod_edo`) REFERENCES `proovedor` (`cod_edo`) ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

INSERT INTO productos VALUES("1","10.00","2.50","1.00","1.00","1.00","25.00","10.00","10.00","10.00","2.50","20","2.600","1100","101.000","111.000","53.000","A","A","2020-02-25","2020-02-27","2","1","2020-02-27 09:30:23","2021-10-26 10:41:02","2020-03-21 08:41:55","2020-03-21 08:42:07");
INSERT INTO productos VALUES("3","10000.00","3.50","1.00","1.00","1.50","35000.00","10000.00","15000.00","10000.00","2.50","20","2.600","2000","200.000","200.000","100.000","A","B","2020-03-13","2020-03-16","1","1","2020-03-16 11:18:23","2021-10-20 11:32:36","2020-03-21 08:48:57","2020-03-21 08:49:06");



CREATE TABLE `productos_precios` (
  `cod_pde` int(11) NOT NULL AUTO_INCREMENT,
  `nom_pde` varchar(50) NOT NULL,
  `est_pde` varchar(1) NOT NULL,
  `cod_usu` int(11) NOT NULL,
  `cre_pde` datetime DEFAULT NULL,
  `upd_pde` datetime DEFAULT NULL,
  `del_pde` datetime DEFAULT NULL,
  `res_pde` datetime DEFAULT NULL,
  PRIMARY KEY (`cod_pde`),
  KEY `producto_precio_ibfk_1` (`cod_usu`),
  CONSTRAINT `producto_precio_ibfk_1` FOREIGN KEY (`cod_usu`) REFERENCES `usuarios` (`cod_usu`) ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

INSERT INTO productos_precios VALUES("1","pollo","A","1","","","","");
INSERT INTO productos_precios VALUES("2","patas","A","1","","","","");



CREATE TABLE `productos_precios_resp` (
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




CREATE TABLE `productos_resp` (
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

INSERT INTO productos_resp VALUES("1","10.00","2.50","1.00","1.00","1.00","25.00","10.00","10.00","10.00","2.50","20","2.600","1100","101.000","111.000","53.000","A","A","2020-02-25","2020-02-27","1","1","2020-02-27 09:30:23","2021-10-26 10:41:02","","");
INSERT INTO productos_resp VALUES("2","40000.00","2.60","1.00","1.00","1.00","104000.00","40000.00","40000.00","40000.00","2.50","20","2.600","2000","200.000","200.000","100.000","A","B","2020-02-24","2020-02-26","2","1","2020-02-27 09:32:54","","","");
INSERT INTO productos_resp VALUES("3","10000.00","3.50","1.00","1.00","1.50","35000.00","10000.00","15000.00","10000.00","2.50","20","2.600","2000","200.000","200.000","100.000","A","B","2020-03-13","2020-03-16","1","1","2020-03-16 11:18:23","2021-10-20 11:32:36","","");
INSERT INTO productos_resp VALUES("4","2000.00","1.00","1.00","1.00","1.00","2000.00","2000.00","2000.00","2000.00","2.50","20","2.600","500","50.000","50.000","25.000","A","B","2020-03-16","2020-03-18","2","1","2020-03-16 11:48:57","","","");



CREATE TABLE `proovedor` (
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
  KEY `proovedor_ibfk_1` (`cod_usu`),
  CONSTRAINT `proovedor_ibfk_1` FOREIGN KEY (`cod_usu`) REFERENCES `usuarios` (`cod_usu`) ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8;

INSERT INTO proovedor VALUES("1","tobi pollo","V2280","alejandra@gmail.com","tachira-concordia","A","1","2020-02-27 09:29:04","2020-12-01 12:49:34","","");
INSERT INTO proovedor VALUES("2","guasima pollo","J9096731","guasimapollo@gmail.com","falcon venezuela","A","1","2020-02-27 09:29:35","2020-10-31 06:01:50","","");
INSERT INTO proovedor VALUES("10","okispollo","J8096735","okispollo@gmail.com","fafdsfcs","A","1","2020-03-18 02:35:33","","2020-03-21 08:27:41","2020-03-21 08:28:45");
INSERT INTO proovedor VALUES("11","guasimodopollo","J2858045","guasi@gmail.com","valencia-tachira","A","1","2020-03-18 02:40:20","2020-12-01 11:43:21","2020-07-09 08:56:13","2020-07-09 08:56:29");



CREATE TABLE `proovedor_resp` (
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

INSERT INTO proovedor_resp VALUES("1","tobi pollo","V2280","alejandra@gmail.com","tachira-concordia","A","1","2020-02-27 09:29:04","2020-12-01 12:49:34","","");
INSERT INTO proovedor_resp VALUES("2","guasima pollo","J9096734","guasimapollo@gmail.com","valencia","A","1","2020-02-27 09:29:35","","","");
INSERT INTO proovedor_resp VALUES("3","felixpo","J9096735","felix@gmail.com","guarumitos","A","1","2020-03-18 02:28:04","","","");
INSERT INTO proovedor_resp VALUES("4","felixpo","J9096735","felix@gmail.com","guarumitos","A","1","2020-03-18 02:28:06","","","");
INSERT INTO proovedor_resp VALUES("5","felixpo","J9096735","felix@gmail.com","guarumitos","A","1","2020-03-18 02:28:08","","","");
INSERT INTO proovedor_resp VALUES("6","felixpo","J9096735","felix@gmail.com","guarumitos","A","1","2020-03-18 02:28:08","","","");
INSERT INTO proovedor_resp VALUES("7","felixpo","J9096735","felix@gmail.com","guarumitos","A","1","2020-03-18 02:28:09","","","");
INSERT INTO proovedor_resp VALUES("8","felixpo","J9096735","felix@gmail.com","guarumitos","A","1","2020-03-18 02:28:09","","","");
INSERT INTO proovedor_resp VALUES("9","felixpo","J9096735","felix@gmail.com","guarumitos","A","1","2020-03-18 02:28:10","","","");
INSERT INTO proovedor_resp VALUES("10","okispollo","J8096735","okispollo@gmail.com","fafdsfcs","A","1","2020-03-18 02:35:33","","","");
INSERT INTO proovedor_resp VALUES("11","guasimodopollo","J2858045","guasi@gmail.com","valencia-tachira","A","1","2020-03-18 02:40:20","2020-12-01 11:43:21","","");



CREATE TABLE `recarga_cartuchos` (
  `idrecarga_cartuchos` int(11) NOT NULL,
  `mes` varchar(45) DEFAULT NULL,
  `entrada` date DEFAULT NULL,
  `salida` date DEFAULT NULL,
  `observaciones` varchar(255) DEFAULT NULL,
  `estatus` char(1) DEFAULT NULL,
  `detalle_cartuchos_iddetalle_cartuchos` int(11) NOT NULL,
  `tecnicos_idtecnicos` int(11) NOT NULL,
  `inventario_idinventario` int(11) NOT NULL,
  PRIMARY KEY (`idrecarga_cartuchos`),
  KEY `fk_recarga_cartuchos_detalle_cartuchos1_idx` (`detalle_cartuchos_iddetalle_cartuchos`),
  KEY `fk_recarga_cartuchos_tecnicos1_idx` (`tecnicos_idtecnicos`),
  KEY `fk_recarga_cartuchos_inventario1_idx` (`inventario_idinventario`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;




CREATE TABLE `reparacion_bienes` (
  `idreparacion_bienes` int(11) NOT NULL,
  `mes` varchar(45) DEFAULT NULL,
  `entrada` date DEFAULT NULL,
  `salida` date DEFAULT NULL,
  `observaciones` varchar(255) DEFAULT NULL,
  `estatus` char(1) DEFAULT NULL,
  `detalle_bienes_iddetalle_bienes` int(11) NOT NULL,
  `tecnicos_idtecnicos` int(11) NOT NULL,
  PRIMARY KEY (`idreparacion_bienes`),
  KEY `fk_reparacion_bienes_detalle_bienes1_idx` (`detalle_bienes_iddetalle_bienes`),
  KEY `fk_reparacion_bienes_tecnicos1_idx` (`tecnicos_idtecnicos`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO reparacion_bienes VALUES("1","Septiembre","2000-09-20","2001-09-21","hshajsgajbsa","A","2","1");



CREATE TABLE `reporte_bienes` (
  `idreporte_bienes` int(11) NOT NULL,
  `mes` varchar(45) DEFAULT NULL,
  `expedicion` date DEFAULT NULL,
  `reparacion_bienes_idreparacion_bienes` int(11) NOT NULL,
  `firmadigital_idfirmadigital` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;




CREATE TABLE `reporte_cartuchos` (
  `idreporte_cartuchos` int(11) NOT NULL,
  `mes` varchar(45) DEFAULT NULL,
  `expedicion` date DEFAULT NULL,
  `recarga_cartuchos_idrecarga_cartuchos` int(11) NOT NULL,
  `firmadigital_idfirmadigital` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;




CREATE TABLE `tecnicos` (
  `idtecnicos` int(11) NOT NULL,
  `nombre` varchar(255) DEFAULT NULL,
  `codigo` varchar(45) NOT NULL,
  `estatus` char(1) DEFAULT NULL,
  `usuarios_idusuarios1` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO tecnicos VALUES("1","Eduardo Rivas","thgr321","A","2");
INSERT INTO tecnicos VALUES("2","Jorge Neres","yhhg56","A","3");
INSERT INTO tecnicos VALUES("3","Luis Perez","tfgert","A","4");



CREATE TABLE `trabajadores` (
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
  KEY `trabajadores_ibfk_1` (`cod_usu`),
  CONSTRAINT `trabajadores_ibfk_1` FOREIGN KEY (`cod_usu`) REFERENCES `usuarios` (`cod_usu`) ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=53 DEFAULT CHARSET=utf8;

INSERT INTO trabajadores VALUES("1","jose","medina","8108469","pueblo nuevo","felix_josefa@gmail.com","04247199694","B","1","2020-05-09 11:50:31","2020-05-09 03:07:37","2020-05-12 01:48:59","");
INSERT INTO trabajadores VALUES("2","felix  con","jesus","V8018469","palo gordo-toico-naran","felixjesus@gmail.com","04247734274","A","1","2020-05-09 11:51:03","2020-12-02 10:42:49","2020-12-02 10:53:43","2020-12-02 10:54:05");
INSERT INTO trabajadores VALUES("3","tulio","zambrano","V16578472","barrio obrero","tuliocortes@gmail.com","04167824316","A","1","2020-05-09 04:14:57","2020-05-14 12:55:44","","");
INSERT INTO trabajadores VALUES("5","manuel","cepeda","V8096665","junco","manuelcepeda@gmail.com","04267897653","B","1","2020-05-12 11:57:41","","2020-05-12 01:49:08","");
INSERT INTO trabajadores VALUES("6","manolo","suarez","V26789540","palo gordo","manolosuarez@gmail.com","0412345789","B","1","2020-05-12 12:01:56","","2020-05-12 01:49:07","");
INSERT INTO trabajadores VALUES("7","fdfds","fdsfsdf","5234234","fddsf","gsdfsd","524234","B","1","2020-05-12 12:03:33","","2020-05-14 12:55:31","");
INSERT INTO trabajadores VALUES("9","kkkk","","5646456","","","","B","1","2020-05-12 12:05:35","","2020-05-12 12:28:03","");
INSERT INTO trabajadores VALUES("11","jose","m","423423","asdasd","","","B","1","2020-05-12 12:06:30","","2020-05-12 12:32:15","");
INSERT INTO trabajadores VALUES("12","dsyuio","adsads","7898776","dasdasd","dsadasd@hotmail.com","4324234","B","1","2020-05-12 12:12:40","","2020-11-26 01:29:46","2020-11-26 01:29:32");
INSERT INTO trabajadores VALUES("15","jose","","V59654321","","","","B","1","2020-05-12 12:33:13","","2020-05-12 12:38:03","");
INSERT INTO trabajadores VALUES("16","jun","","V4234324","","","","B","1","2020-05-12 12:33:39","","2020-05-12 12:38:05","");
INSERT INTO trabajadores VALUES("18","jon","","V56465","","","","B","1","2020-05-12 12:34:20","","2020-05-12 12:37:57","");
INSERT INTO trabajadores VALUES("19","jan","","V4535345","","","","B","1","2020-05-12 12:35:47","","2020-05-12 12:37:55","");
INSERT INTO trabajadores VALUES("20","jon ","","V2221132","","","","B","1","2020-05-12 12:36:42","","2020-05-12 12:37:59","");
INSERT INTO trabajadores VALUES("21","jon ","","V22211323","","","","B","1","2020-05-12 12:36:45","","2020-05-12 12:38:00","");
INSERT INTO trabajadores VALUES("22","sdasdasd","","V29009765","","","","B","1","2020-05-12 12:37:47","","2020-05-12 12:38:08","");
INSERT INTO trabajadores VALUES("23","felix","medina","V12345670","palo grande","felixmedina@gmail.com","04247734274","A","1","2020-05-12 01:30:56","2020-12-01 01:54:16","2020-12-01 01:01:53","2020-12-01 01:02:23");
INSERT INTO trabajadores VALUES("24","juan","mendez","V31456907","juncis","juncis@gmail.com","056564523","A","1","2020-05-12 01:33:14","","2020-05-12 01:49:01","2020-12-02 11:04:42");
INSERT INTO trabajadores VALUES("25","jone","sdadasd","1111133","erfgdhfh","","4234234243","B","1","2020-05-12 01:35:11","","2020-05-12 01:49:10","");
INSERT INTO trabajadores VALUES("26","jones","sadasda","444455566","dsdfsf","","423432","B","1","2020-05-12 01:36:18","","2020-05-12 01:48:57","");
INSERT INTO trabajadores VALUES("27","junes","sdasd","777666","asdasda","","432543535","B","1","2020-05-12 01:42:05","","2020-05-12 01:49:04","");
INSERT INTO trabajadores VALUES("28","janes","dasdasd","568909754","","","","B","1","2020-05-12 01:43:27","","2020-05-14 12:35:23","");
INSERT INTO trabajadores VALUES("29","jine","fadfsf","2453534","sfsdfsd","tuliogarcia@gmail.com","5345654","B","1","2020-05-12 01:45:43","2020-05-14 12:54:48","2020-05-14 12:55:37","");
INSERT INTO trabajadores VALUES("30","jn","fdsdfsdf","235654758","","","","B","1","2020-05-12 01:47:13","","2020-05-14 12:35:26","");
INSERT INTO trabajadores VALUES("31","ty","rggdfgdfg","999999","","","","B","1","2020-05-12 01:48:17","","2020-05-14 12:55:08","");
INSERT INTO trabajadores VALUES("32","rr","","4354","","","","B","1","2020-05-12 01:48:49","","2020-05-14 12:55:04","");
INSERT INTO trabajadores VALUES("33","yu","","6789","","","","B","1","2020-05-12 01:51:07","","2020-05-14 12:55:19","");
INSERT INTO trabajadores VALUES("34","eee","","432","","","","B","1","2020-05-12 01:55:42","","2020-05-14 12:35:19","");
INSERT INTO trabajadores VALUES("35","sc","","6342100","","","","B","1","2020-05-12 02:01:11","","2020-05-14 12:55:16","");
INSERT INTO trabajadores VALUES("38","nm","","982","","","","B","1","2020-05-12 02:02:12","","2020-05-14 12:55:02","");
INSERT INTO trabajadores VALUES("39","k","","45111","","","","B","1","2020-05-12 02:05:01","","2020-05-14 12:35:28","");
INSERT INTO trabajadores VALUES("40","mbnhgh","","6781001","","","","B","1","2020-05-12 02:08:26","","2020-05-14 12:55:00","");
INSERT INTO trabajadores VALUES("41","lon","","444","","","","B","1","2020-05-12 02:15:04","","2020-05-14 12:35:31","");
INSERT INTO trabajadores VALUES("43","Medina","asdasda","V42342356","toico ","s@gmail.com","04126577888","A","1","2020-11-07 06:24:40","2020-11-26 06:41:36","","");
INSERT INTO trabajadores VALUES("44","yoselin","castillo","V3123123","yosei","bb@gmail.com","04123123334","B","1","2020-11-07 06:28:27","2020-11-30 12:25:47","2020-12-01 11:51:32","");
INSERT INTO trabajadores VALUES("45","felixx","rwe","V29580433","asdasd","felix@gmail.es","42424","B","1","2020-11-07 06:30:31","2020-12-01 01:00:01","2020-12-01 01:54:23","");
INSERT INTO trabajadores VALUES("46","petrofosefina ","luna","V90578654","palo gordo","petrajosefa@gmail.com","04147724274","B","1","2020-11-26 12:53:49","","2020-12-01 01:54:30","");
INSERT INTO trabajadores VALUES("47","manuel ","perez","V8018169","loibon","loibon@gmail.com","04127776655","A","1","2020-11-26 12:58:45","","","");
INSERT INTO trabajadores VALUES("48","josue","molina","V21789654","moneli","molina@gmail.com","04123456785","A","1","2020-11-26 02:01:17","","","");
INSERT INTO trabajadores VALUES("49","Jesus David","Medina Medina","V29581457","toico palogordo","jesus@gmail.com","04140070021","A","1","2020-12-01 11:50:25","2020-12-01 11:50:39","","");
INSERT INTO trabajadores VALUES("50","jose hernandez","labrador","V21560789","palo gordo","jose1@gmail.com","04140070020","A","1","2020-12-02 10:36:20","2020-12-02 10:40:19","","");
INSERT INTO trabajadores VALUES("51","manuel hernandez","perez moreno","V9109456","junco","perez@gmail.com","04247724376","A","1","2020-12-02 10:45:54","2020-12-02 10:46:08","","");
INSERT INTO trabajadores VALUES("52","jose manuel","perez benitez","V27456780","palmira","manueljose@gmail.com","04140070021","A","1","2020-12-02 11:06:41","2020-12-02 11:06:56","2020-12-02 11:07:04","2020-12-02 11:07:19");



CREATE TABLE `trabajadores_resp` (
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

INSERT INTO trabajadores_resp VALUES("1","felix","jose","V29580357","junco","felix@gmail.com","04140070021","A","1","2020-05-08 19:28:56","","","");
INSERT INTO trabajadores_resp VALUES("2","felix  con","jesus","V8018469","palo gordo-toico-naran","felixjesus@gmail.com","04247734274","A","1","2020-05-09 11:51:03","2020-12-02 10:42:49","2020-12-02 10:53:43","2020-12-02 10:54:05");
INSERT INTO trabajadores_resp VALUES("6","manuel","cepeda","V8096665","junco","manuelcepeda@gmail.com","04267897653","A","1","2020-05-12 11:57:42","","","");
INSERT INTO trabajadores_resp VALUES("7","manolo","suarez","V26789540","palo gordo","manolosuarez@gmail.com","0412345789","A","1","2020-05-12 12:01:56","","","");
INSERT INTO trabajadores_resp VALUES("8","fdfds","fdsfsdf","5234234","fddsf","gsdfsd","524234","A","1","2020-05-12 12:03:33","","","");
INSERT INTO trabajadores_resp VALUES("9","dasdas","dasdasd","431242","sdadasd","dsadasd","341323","A","1","2020-05-12 12:04:59","","","");
INSERT INTO trabajadores_resp VALUES("12","dsyuio","adsads","7898776","dasdasd","dsadasd@hotmail.com","4324234","A","1","2020-05-12 12:12:40","","","");
INSERT INTO trabajadores_resp VALUES("21","felix","medina","V12345679","palo grande","felixmedinamedina@gmail.com","04247734274","A","1","2020-05-12 13:30:56","","","");
INSERT INTO trabajadores_resp VALUES("22","juan","mendez","V31456907","juncis","juncis@gmail.com","056564523","A","1","2020-05-12 13:33:14","","","");
INSERT INTO trabajadores_resp VALUES("23","felix","medina","V12345670","palo grande","felixmedina@gmail.com","04247734274","A","1","2020-05-12 13:35:11","2020-12-01 01:54:16","2020-12-01 01:01:53","2020-12-01 01:02:23");
INSERT INTO trabajadores_resp VALUES("26","janes","dasdasd","568909754","","","","A","1","2020-05-12 13:43:27","","","");
INSERT INTO trabajadores_resp VALUES("27","jine","fadfsf","2453534","sfsdfsd","sdffsdf","5345654","A","1","2020-05-12 13:45:43","","","");
INSERT INTO trabajadores_resp VALUES("28","jn","fdsdfsdf","235654758","","","","A","1","2020-05-12 13:47:13","","","");
INSERT INTO trabajadores_resp VALUES("29","ty","rggdfgdfg","999999","","","","A","1","2020-05-12 13:48:17","","","");
INSERT INTO trabajadores_resp VALUES("30","rr","","4354","","","","A","1","2020-05-12 13:48:49","","","");
INSERT INTO trabajadores_resp VALUES("31","yu","","6789","","","","A","1","2020-05-12 13:51:08","","","");
INSERT INTO trabajadores_resp VALUES("32","eee","","432","","","","A","1","2020-05-12 13:55:42","","","");
INSERT INTO trabajadores_resp VALUES("33","sc","","6342100","","","","A","1","2020-05-12 14:01:11","","","");
INSERT INTO trabajadores_resp VALUES("34","nm","","982","","","","A","1","2020-05-12 14:02:12","","","");
INSERT INTO trabajadores_resp VALUES("35","k","","45111","","","","A","1","2020-05-12 14:05:01","","","");
INSERT INTO trabajadores_resp VALUES("36","mbnhgh","","6781001","","","","A","1","2020-05-12 14:08:26","","","");
INSERT INTO trabajadores_resp VALUES("37","lon","","444","","","","A","1","2020-05-12 14:15:04","","","");
INSERT INTO trabajadores_resp VALUES("38","dsadasd","","09","","","","A","1","2020-05-12 14:15:34","","","");
INSERT INTO trabajadores_resp VALUES("39","asdasdasd","asdasda","V42342356","dasdasd","s@gmail.com","04126577888","A","1","2020-11-07 06:24:40","","","");
INSERT INTO trabajadores_resp VALUES("40","dasdsadasdaa","dasdasd","V3123123","eqweqeq","bb@gmail.com","04123123334","A","1","2020-11-07 06:28:27","","","");
INSERT INTO trabajadores_resp VALUES("41","felix","dasdasd","V29580458","dasdad","felix@gmail.com","04140070021","A","1","2020-11-07 06:30:31","","","");
INSERT INTO trabajadores_resp VALUES("42","petrofosefina ","luna","V90578654","palo gordo","petrajosefa@gmail.com","04147724274","A","1","2020-11-26 00:53:49","","","");
INSERT INTO trabajadores_resp VALUES("43","manuel ","perez","V8018169","loibon","loibon@gmail.com","04127776655","A","1","2020-11-26 00:58:45","","","");
INSERT INTO trabajadores_resp VALUES("44","yoselin","castillo","V3123123","yosei","bb@gmail.com","04123123334","B","1","2020-11-26 02:01:17","2020-11-30 12:25:47","2020-12-01 11:51:32","");
INSERT INTO trabajadores_resp VALUES("45","JesusDavid","Medina Medina","V29581457","toico palogordo","jesus@gmail.com","04140070021","A","1","2020-12-01 23:50:25","","","");
INSERT INTO trabajadores_resp VALUES("50","jose ignacio","labrador","V21560789","palo gordo","jose@gmail.com","04140070020","A","1","2020-12-02 10:36:20","","","");
INSERT INTO trabajadores_resp VALUES("51","manuel hernandez","perez moreno","V9109456","junco","perez@gmail.com","04247724376","A","1","2020-12-02 10:45:54","2020-12-02 10:46:08","","");
INSERT INTO trabajadores_resp VALUES("52","jose manuel","perez benitez","V27456780","palmira","manueljose@gmail.com","04140070021","A","1","2020-12-02 11:06:41","2020-12-02 11:06:56","2020-12-02 11:07:04","2020-12-02 11:07:19");



CREATE TABLE `usuarios` (
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

INSERT INTO usuarios VALUES("1","felix","felixmedina07052000@gmail.com","f214c5aec4eb32e4264cd390ea0fcbaf960b8a3e","A","A","2020-02-27 09:27:56","2020-10-31 04:44:27","","2021-10-27 11:25:38","");
INSERT INTO usuarios VALUES("2","marbe","marbe@gmail.com","3af1b547a8dd07a5ac0bcf962ec852b3f060b716","E","B","2020-03-18 03:07:57","2020-03-21 08:53:19","2020-11-29 11:46:31","2020-03-21 08:53:29","");
INSERT INTO usuarios VALUES("3","jose","jose@gmail.com","5b53cad999b409898a88133ca9851b097abb500d","S","B","2020-03-19 02:26:32","2020-10-31 04:44:33","2020-12-01 11:21:41","2020-03-19 02:45:26","2020-03-19 02:44:56");
INSERT INTO usuarios VALUES("4","kevin","kevin@gmail.com","1c51e553cb863175222ebd166abc152cca513a50","E","B","2020-07-02 11:42:16","2020-07-02 11:44:37","2020-12-01 11:21:37","2020-07-02 11:44:51","");
INSERT INTO usuarios VALUES("5","luis","luis@gmail.com","a77fc64da554424bfcbb1ce6036a1f814073fe28","V","B","2020-10-31 04:46:19","","2020-11-29 11:46:55","","");
INSERT INTO usuarios VALUES("8","lol","lol@gmail.com","a75b563181dea35f4a19ef34324aedfaa388caa1","V","B","2020-10-31 04:53:46","","2020-11-29 11:46:43","","");
INSERT INTO usuarios VALUES("12","kfff","kfkf@gmail.com","09595e7223d759a4aaff9dae7bf5ce01fd99eb45","V","B","2020-11-24 10:14:21","","2020-11-29 11:46:36","","");
INSERT INTO usuarios VALUES("13","manojose","jesus@gmail.com","a5083dfb85980adefa5f376b49899e24342359f5","V","B","2020-11-25 12:58:56","","2020-11-29 11:46:45","","");
INSERT INTO usuarios VALUES("14","josefiladelfia","jesus@gmail.com","a5083dfb85980adefa5f376b49899e24342359f5","V","B","2020-11-25 12:59:42","","2020-11-29 11:46:40","","");
INSERT INTO usuarios VALUES("15","luisa","luisa@gmail.com","f214c5aec4eb32e4264cd390ea0fcbaf960b8a3e","S","B","2020-11-29 11:43:45","2020-11-29 11:47:19","2020-12-02 12:08:40","2020-11-30 05:27:23","");
INSERT INTO usuarios VALUES("16","Yony","jonny@gmail.com","a561cc40b00bf2eee32a8a41c46d8b58d43e3af3","E","A","2020-12-01 11:28:13","2020-12-02 12:08:35","","2021-10-26 11:05:16","");
INSERT INTO usuarios VALUES("17","prueba","prueba@gmail.com","93301ada8177f4b7841620847f3d06d41febdd1d","S","A","2020-12-01 11:40:07","2020-12-01 11:41:39","","2020-12-01 11:40:51","");
INSERT INTO usuarios VALUES("18","alejandro","alejandro@gmail.com","b6ad73304cfbf1f5123fe69d961c6a06c99516ad","V","A","2021-10-17 11:39:42","","","2021-10-17 11:40:40","");
INSERT INTO usuarios VALUES("19","ffefe","feee@gmail.com","f74fa39850ccb1c516d542ad6a4b717985972201","I","A","2021-10-17 02:09:13","","","","");
INSERT INTO usuarios VALUES("20","felix2","chucho@gmail.com","50136d56438ea71652842fa72addd334d71e2e31","V","A","2021-10-17 02:18:05","","","2021-10-17 02:18:17","");



CREATE TABLE `usuarios_resp` (
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

INSERT INTO usuarios_resp VALUES("1","felix","felixmedina07052000@gmail.com","f214c5aec4eb32e4264cd390ea0fcbaf960b8a3e","A","A","2020-02-27 09:27:56","2020-10-31 04:44:27","","","");
INSERT INTO usuarios_resp VALUES("2","marbe","marbe@gmail.com","fb3122091edeff3ecea93e9347d20ee8caec987b","V","A","2020-03-18 15:07:58","","","","");
INSERT INTO usuarios_resp VALUES("3","jose","jose@gmail.com","5b53cad999b409898a88133ca9851b097abb500d","S","B","2020-03-19 02:26:32","2020-10-31 04:44:33","2020-12-01 11:21:41","","");
INSERT INTO usuarios_resp VALUES("4","kevin","kevin@gmail.com","1c51e553cb863175222ebd166abc152cca513a50","E","B","2020-07-02 11:42:16","2020-07-02 11:44:37","2020-12-01 11:21:37","","");
INSERT INTO usuarios_resp VALUES("5","luis","luis@gmail.com","a77fc64da554424bfcbb1ce6036a1f814073fe28","V","A","2020-10-31 16:46:19","","","","");
INSERT INTO usuarios_resp VALUES("6","lola","lola@gmail.com","2a5bb5475ac143cc17acc38d28e97ad2cb2114d5","V","A","2020-10-31 16:48:58","","","","");
INSERT INTO usuarios_resp VALUES("7","lodas","lodas@gmail.com","db8cdd9e722cfe60a69883da73e78df77c9120e8","V","A","2020-10-31 16:50:05","","","","");
INSERT INTO usuarios_resp VALUES("8","lol","lol@gmail.com","a75b563181dea35f4a19ef34324aedfaa388caa1","V","A","2020-10-31 16:53:46","","","","");
INSERT INTO usuarios_resp VALUES("9","lului","loiloi@gmail.com","e80a628d28c05d8490c3be35b26cfc3c49a1b6ac","V","A","2020-10-31 17:53:31","","","","");
INSERT INTO usuarios_resp VALUES("10","jesus","jesus@gmail.com","a5083dfb85980adefa5f376b49899e24342359f5","S","B","2020-10-31 18:11:38","2020-12-01 01:06:57","2020-12-01 11:21:44","","");
INSERT INTO usuarios_resp VALUES("11","focas","jesus@gmail.com","d27f4469be6eadfde078a1e371c9d67d3f7512c7","V","A","2020-11-24 22:05:02","","","","");
INSERT INTO usuarios_resp VALUES("12","kfff","kfkf@gmail.com","09595e7223d759a4aaff9dae7bf5ce01fd99eb45","V","A","2020-11-24 22:14:21","","","","");
INSERT INTO usuarios_resp VALUES("13","manojose","jesus@gmail.com","a5083dfb85980adefa5f376b49899e24342359f5","V","A","2020-11-25 00:58:56","","","","");
INSERT INTO usuarios_resp VALUES("14","josefiladelfia","jesus@gmail.com","a5083dfb85980adefa5f376b49899e24342359f5","V","A","2020-11-25 00:59:42","","","","");
INSERT INTO usuarios_resp VALUES("15","luisa","luisa@gmail.com","f214c5aec4eb32e4264cd390ea0fcbaf960b8a3e","S","B","2020-11-29 23:43:45","2020-11-29 11:47:19","2020-12-02 12:08:40","","");
INSERT INTO usuarios_resp VALUES("16","Yony","jonny@gmail.com","a561cc40b00bf2eee32a8a41c46d8b58d43e3af3","E","A","2020-12-01 23:28:13","2020-12-02 12:08:35","","","");
INSERT INTO usuarios_resp VALUES("17","prueba","prueba@gmail.com","93301ada8177f4b7841620847f3d06d41febdd1d","S","A","2020-12-01 23:40:08","2020-12-01 11:41:39","","","");
INSERT INTO usuarios_resp VALUES("18","alejandro","alejandro@gmail.com","b6ad73304cfbf1f5123fe69d961c6a06c99516ad","V","A","2021-10-17 11:39:42","","","","");
INSERT INTO usuarios_resp VALUES("19","ffefe","feee@gmail.com","f74fa39850ccb1c516d542ad6a4b717985972201","I","A","2021-10-17 14:09:13","","","","");
INSERT INTO usuarios_resp VALUES("20","felix2","chucho@gmail.com","50136d56438ea71652842fa72addd334d71e2e31","V","A","2021-10-17 14:18:05","","","","");

