-- MySQL dump 10.13  Distrib 5.5.32, for Linux (i686)
--
-- Host: localhost    Database: gridsoa_asistentic
-- ------------------------------------------------------
-- Server version	5.5.32-cll

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `acudiente`
--

DROP TABLE IF EXISTS `acudiente`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `acudiente` (
  `id_acudiente` int(11) NOT NULL AUTO_INCREMENT,
  `prinom_acu` varchar(50) NOT NULL,
  `segnom_acu` varchar(50) DEFAULT NULL,
  `priape_acu` varchar(50) NOT NULL,
  `segape_acu` varchar(50) DEFAULT NULL,
  `tipo_docu_acu` varchar(3) NOT NULL,
  `num_docu_acu` varchar(20) NOT NULL,
  `telefono` varchar(15) DEFAULT NULL,
  `direccion` varchar(60) NOT NULL,
  `pass_acu` text,
  `email` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id_acudiente`),
  UNIQUE KEY `num_docu_acu` (`num_docu_acu`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `acudiente`
--

LOCK TABLES `acudiente` WRITE;
/*!40000 ALTER TABLE `acudiente` DISABLE KEYS */;
INSERT INTO `acudiente` (`id_acudiente`, `prinom_acu`, `segnom_acu`, `priape_acu`, `segape_acu`, `tipo_docu_acu`, `num_docu_acu`, `telefono`, `direccion`, `pass_acu`, `email`) VALUES (1,'marta','','sanchez','','CC','123456789','4455421','calle 15 # 9-51','a346bc80408d9b2a5063fd1bddb20e2d5586ec30',''),(2,'ana','','cruz','','CC','965584411','2489956','manzana 1 casa 1 arcabal','53c2fc05431848b9eed14937be9ac25300269cdc',''),(3,'carlos','','sanchez','','CC','65456445','7258956','carrera 13 # 10-25','776e873578a0c2777ec3ef41112d32ed405df1fc',''),(4,'maria','','sanchez','','CC','925411','3142599958','calle 1 # 10-25','ce8bbbafcf0c51986c010280005b60ee05af7bde',''),(5,'luz','','mendez','','CC','545887744','2458745','manzana i casa 3 cafasur','3c2b8a4e17ae0d7ec5500861306398498d87bf45',''),(6,'luis','','Gonzales','','CC','4554488','2391052','carrera 3 # 1-25','93c34c62eb1086d0b19817242cdd263ed05f95ba',''),(7,'alvaro','','cruz','','CC','7788944556','45422178','manzana 1 casa 12 san rafael','34e9a31048ce783f92a141c7ef215043798a00c7',''),(8,'ana','sofia','salazar','','CC','88741125','2482121','calle 8 # 7-51','712a0d442c385ceae863c50aa664f7b0a5831ec0',''),(10,'Oscar','','sanchez','','CC','8877455','7259845','carrera 5 # 15-42','6c878fcdaab30014b9f9770e1f10c5287f3b4d94',''),(11,'luis','','Espinoza','','CC','78899552','2145987','calle 8 # 10 - 25 Centro','37664a0b6111fca5e2311353893367677bd046f9',''),(12,'luis','','Diaz','','CC','5221100223','7889541','manzana a casa 3 cafasur','d053013a7f66dd105d6f368232f41ef78ee7f07c',''),(13,'Cesar','','Lara','','CC','112233566698','7293837','calle 4 # 11-21','a49873978517df85ab88eda4495059422f76fdc3','andres@netmasters.co');
/*!40000 ALTER TABLE `acudiente` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `alumnos`
--

DROP TABLE IF EXISTS `alumnos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `alumnos` (
  `id_alumno` int(11) NOT NULL AUTO_INCREMENT,
  `prinom_al` varchar(50) NOT NULL,
  `segnom_al` varchar(50) DEFAULT NULL,
  `priape_al` varchar(50) NOT NULL,
  `segape_al` varchar(50) DEFAULT NULL,
  `tipo_docu_al` varchar(2) NOT NULL,
  `num_docu_al` varchar(20) NOT NULL,
  `fech_nac` date NOT NULL,
  `retirado` tinyint(1) DEFAULT '0',
  `fech_retiro` date DEFAULT NULL,
  `causa_retiro` text,
  `id_grupo` tinyint(4) NOT NULL,
  `num_id_acudiente` varchar(20) NOT NULL,
  `rh` varchar(3) NOT NULL,
  `seguridad_social` varchar(50) DEFAULT NULL,
  `foto` varchar(100) DEFAULT NULL,
  `sexo` varchar(9) NOT NULL,
  PRIMARY KEY (`id_alumno`),
  UNIQUE KEY `num_docu_al` (`num_docu_al`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `alumnos`
--

LOCK TABLES `alumnos` WRITE;
/*!40000 ALTER TABLE `alumnos` DISABLE KEYS */;
INSERT INTO `alumnos` (`id_alumno`, `prinom_al`, `segnom_al`, `priape_al`, `segape_al`, `tipo_docu_al`, `num_docu_al`, `fech_nac`, `retirado`, `fech_retiro`, `causa_retiro`, `id_grupo`, `num_id_acudiente`, `rh`, `seguridad_social`, `foto`, `sexo`) VALUES (1,'Roberto','Andres','Diaz','Ricardo','CC','1070594513','1988-11-21',0,NULL,NULL,3,'112233566698','O+','Coomeva','roberto.jpg','1'),(2,'Juan','Sebastian','Cruz','Perdomo','TI','1120025','2001-05-01',0,NULL,NULL,3,'112233566698','O+','comparta','sebastian.jpg','1'),(3,'Nayibe','Soraya','Sanchez','Leon','TI','87452212','1998-05-05',0,NULL,NULL,3,'112233566698','A-','sisben','nayibe.jpg','2'),(4,'Cristhian','Camilo','Garcia','Sanchez','TI','1005532','2001-04-22',0,NULL,NULL,4,'925411','A+','comparta','camilo.jpg','1'),(5,'Jessica','','Gomez','','TI','155588997','2003-01-12',0,NULL,NULL,3,'112233566698','B+','caprecom','hermosa.jpg','2'),(6,'Carlos ','','Arias','','RC','55147466','2006-06-05',0,NULL,NULL,6,'4554488','A+','sisben','','1'),(7,'Maria','','Corredor','','TI','88854477','1999-04-24',0,NULL,NULL,8,'2147483647','B-','comparta','','2'),(8,'Esteban','','Salazar','','TI','587744112','1999-05-05',0,NULL,NULL,7,'88741125','AB+','sisben','','1'),(9,'Jessica','','Salazar','','TI','4455774122','1999-04-27',0,NULL,NULL,9,'4554488','AB-','sisben','','2'),(10,'Amparo','','Diaz','','TI','788998555','2002-05-04',0,NULL,NULL,10,'8877455','O+','comparta','','2'),(11,'Marcos','','Espinoza','','TI','7895641','1996-05-15',0,NULL,NULL,11,'78899552','B+','sisben','','1'),(12,'Andres','','Diaz','','TI','8323952','1995-05-01',0,NULL,NULL,12,'2147483647','AB+','comparta','','1'),(13,'Carlos ','','Lara','','TI','44555222','1998-05-06',0,NULL,NULL,12,'2147483647','O-','sisben','','1');
/*!40000 ALTER TABLE `alumnos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `asign_academica`
--

DROP TABLE IF EXISTS `asign_academica`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `asign_academica` (
  `id_asignacion` int(11) NOT NULL AUTO_INCREMENT,
  `id_grupo` tinyint(4) NOT NULL,
  `id_docente` int(11) NOT NULL,
  `id_asignatura` tinyint(4) NOT NULL,
  `lunes` tinyint(1) DEFAULT NULL,
  `hora_inicio_lunes` time DEFAULT NULL,
  `hora_fin_lunes` time DEFAULT NULL,
  `martes` tinyint(1) DEFAULT NULL,
  `hora_inicio_martes` time DEFAULT NULL,
  `hora_fin_martes` time DEFAULT NULL,
  `miercoles` tinyint(1) DEFAULT NULL,
  `hora_inicio_miercoles` time DEFAULT NULL,
  `hora_fin_miercoles` time DEFAULT NULL,
  `jueves` tinyint(1) DEFAULT NULL,
  `hora_inicio_jueves` time DEFAULT NULL,
  `hora_fin_jueves` time DEFAULT NULL,
  `viernes` tinyint(1) DEFAULT NULL,
  `hora_inicio_viernes` time DEFAULT NULL,
  `hora_fin_viernes` time DEFAULT NULL,
  `sabado` tinyint(1) DEFAULT NULL,
  `hora_inicio_sabado` time DEFAULT NULL,
  `hora_fin_sabado` time DEFAULT NULL,
  PRIMARY KEY (`id_asignacion`),
  UNIQUE KEY `id_grupo,id_docente,id_asignatura` (`id_grupo`,`id_docente`,`id_asignatura`)
) ENGINE=InnoDB AUTO_INCREMENT=61 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `asign_academica`
--

LOCK TABLES `asign_academica` WRITE;
/*!40000 ALTER TABLE `asign_academica` DISABLE KEYS */;
INSERT INTO `asign_academica` (`id_asignacion`, `id_grupo`, `id_docente`, `id_asignatura`, `lunes`, `hora_inicio_lunes`, `hora_fin_lunes`, `martes`, `hora_inicio_martes`, `hora_fin_martes`, `miercoles`, `hora_inicio_miercoles`, `hora_fin_miercoles`, `jueves`, `hora_inicio_jueves`, `hora_fin_jueves`, `viernes`, `hora_inicio_viernes`, `hora_fin_viernes`, `sabado`, `hora_inicio_sabado`, `hora_fin_sabado`) VALUES (1,1,4,2,0,'00:00:00','00:00:00',0,'00:00:00','00:00:00',0,'00:00:00','00:00:00',0,'00:00:00','00:00:00',0,'00:00:00','00:00:00',1,'06:00:00','07:00:00'),(2,1,5,3,0,'00:00:00','00:00:00',0,'00:00:00','00:00:00',0,'00:00:00','00:00:00',0,'00:00:00','00:00:00',0,'00:00:00','00:00:00',1,'07:00:00','08:00:00'),(3,1,6,4,0,'00:00:00','00:00:00',0,'00:00:00','00:00:00',0,'00:00:00','00:00:00',0,'00:00:00','00:00:00',0,'00:00:00','00:00:00',1,'08:00:00','09:00:00'),(4,1,7,5,0,'00:00:00','00:00:00',0,'00:00:00','00:00:00',0,'00:00:00','00:00:00',0,'00:00:00','00:00:00',0,'00:00:00','00:00:00',1,'09:00:00','10:00:00'),(5,1,8,6,0,'00:00:00','00:00:00',0,'00:00:00','00:00:00',0,'00:00:00','00:00:00',0,'00:00:00','00:00:00',0,'00:00:00','00:00:00',1,'10:00:00','11:00:00'),(6,1,9,7,0,'00:00:00','00:00:00',0,'00:00:00','00:00:00',0,'00:00:00','00:00:00',0,'00:00:00','00:00:00',0,'00:00:00','00:00:00',1,'11:00:00','12:00:00'),(7,1,10,8,0,'00:00:00','00:00:00',0,'00:00:00','00:00:00',0,'00:00:00','00:00:00',0,'00:00:00','00:00:00',0,'00:00:00','00:00:00',1,'12:00:00','13:00:00'),(8,1,11,9,0,'00:00:00','00:00:00',0,'00:00:00','00:00:00',0,'00:00:00','00:00:00',0,'00:00:00','00:00:00',0,'00:00:00','00:00:00',1,'14:00:00','15:00:00'),(9,1,12,10,0,'00:00:00','00:00:00',0,'00:00:00','00:00:00',0,'00:00:00','00:00:00',0,'00:00:00','00:00:00',0,'00:00:00','00:00:00',1,'15:00:00','16:00:00'),(10,1,13,11,0,'00:00:00','00:00:00',0,'00:00:00','00:00:00',0,'00:00:00','00:00:00',0,'00:00:00','00:00:00',0,'00:00:00','00:00:00',1,'16:00:00','17:00:00'),(11,1,14,12,0,'00:00:00','00:00:00',0,'00:00:00','00:00:00',0,'00:00:00','00:00:00',0,'00:00:00','00:00:00',0,'00:00:00','00:00:00',1,'17:00:00','18:00:00'),(12,1,15,13,0,'00:00:00','00:00:00',0,'00:00:00','00:00:00',0,'00:00:00','00:00:00',0,'00:00:00','00:00:00',0,'00:00:00','00:00:00',1,'18:00:00','19:00:00'),(13,2,4,2,0,'00:00:00','00:00:00',0,'00:00:00','00:00:00',0,'00:00:00','00:00:00',0,'00:00:00','00:00:00',0,'00:00:00','00:00:00',1,'06:00:00','07:00:00'),(14,2,5,3,0,'00:00:00','00:00:00',0,'00:00:00','00:00:00',0,'00:00:00','00:00:00',0,'00:00:00','00:00:00',0,'00:00:00','00:00:00',1,'07:00:00','08:00:00'),(15,2,6,4,0,'00:00:00','00:00:00',0,'00:00:00','00:00:00',0,'00:00:00','00:00:00',0,'00:00:00','00:00:00',0,'00:00:00','00:00:00',1,'08:00:00','09:00:00'),(16,2,7,5,0,'00:00:00','00:00:00',0,'00:00:00','00:00:00',0,'00:00:00','00:00:00',0,'00:00:00','00:00:00',0,'00:00:00','00:00:00',1,'09:00:00','10:00:00'),(17,2,8,6,0,'00:00:00','00:00:00',0,'00:00:00','00:00:00',0,'00:00:00','00:00:00',0,'00:00:00','00:00:00',0,'00:00:00','00:00:00',1,'10:00:00','11:00:00'),(18,2,10,7,0,'00:00:00','00:00:00',0,'00:00:00','00:00:00',0,'00:00:00','00:00:00',0,'00:00:00','00:00:00',0,'00:00:00','00:00:00',0,'12:00:00','13:00:00'),(19,2,11,9,0,'00:00:00','00:00:00',0,'00:00:00','00:00:00',0,'00:00:00','00:00:00',0,'00:00:00','00:00:00',0,'00:00:00','00:00:00',1,'13:00:00','14:00:00'),(20,2,12,10,0,'00:00:00','00:00:00',0,'00:00:00','00:00:00',0,'00:00:00','00:00:00',0,'00:00:00','00:00:00',0,'00:00:00','00:00:00',1,'14:00:00','15:00:00'),(21,2,13,11,0,'00:00:00','00:00:00',0,'00:00:00','00:00:00',0,'00:00:00','00:00:00',0,'00:00:00','00:00:00',0,'00:00:00','00:00:00',1,'15:00:00','16:00:00'),(22,2,14,12,0,'00:00:00','00:00:00',0,'00:00:00','00:00:00',0,'00:00:00','00:00:00',0,'00:00:00','00:00:00',0,'00:00:00','00:00:00',0,'16:00:00','17:00:00'),(23,2,15,13,0,'00:00:00','00:00:00',0,'00:00:00','00:00:00',0,'00:00:00','00:00:00',0,'00:00:00','00:00:00',0,'00:00:00','00:00:00',1,'18:00:00','19:00:00'),(24,3,16,2,0,'00:00:00','00:00:00',0,'00:00:00','00:00:00',0,'00:00:00','00:00:00',0,'00:00:00','00:00:00',1,'04:00:00','06:00:00',1,'02:00:00','03:00:00'),(25,3,16,3,0,'00:00:00','00:00:00',0,'00:00:00','00:00:00',0,'00:00:00','00:00:00',0,'00:00:00','00:00:00',0,'00:00:00','00:00:00',1,'07:00:00','08:00:00'),(26,3,16,4,0,'00:00:00','00:00:00',0,'00:00:00','00:00:00',0,'00:00:00','00:00:00',0,'00:00:00','00:00:00',0,'00:00:00','00:00:00',1,'08:00:00','09:00:00'),(27,3,16,5,0,'00:00:00','00:00:00',0,'00:00:00','00:00:00',0,'00:00:00','00:00:00',0,'00:00:00','00:00:00',0,'00:00:00','00:00:00',1,'09:00:00','10:00:00'),(28,3,16,6,0,'00:00:00','00:00:00',0,'00:00:00','00:00:00',0,'00:00:00','00:00:00',0,'00:00:00','00:00:00',0,'00:00:00','00:00:00',1,'10:00:00','11:00:00'),(30,3,16,7,0,'00:00:00','00:00:00',0,'00:00:00','00:00:00',0,'00:00:00','00:00:00',0,'00:00:00','00:00:00',0,'00:00:00','00:00:00',1,'12:00:00','13:00:00'),(31,3,16,9,0,'00:00:00','00:00:00',0,'00:00:00','00:00:00',0,'00:00:00','00:00:00',0,'00:00:00','00:00:00',0,'00:00:00','00:00:00',1,'13:00:00','00:00:14'),(32,3,16,10,0,'00:00:00','00:00:00',0,'00:00:00','00:00:00',0,'00:00:00','00:00:00',0,'00:00:00','00:00:00',0,'00:00:00','00:00:00',1,'14:00:00','15:00:00'),(33,3,16,11,0,'00:00:00','00:00:00',0,'00:00:00','00:00:00',0,'00:00:00','00:00:00',0,'00:00:00','00:00:00',0,'00:00:00','00:00:00',1,'15:00:00','16:00:00'),(34,3,16,12,0,'00:00:00','00:00:00',0,'00:00:00','00:00:00',0,'00:00:00','00:00:00',0,'00:00:00','00:00:00',0,'00:00:00','00:00:00',1,'16:00:00','17:00:00'),(35,3,16,13,0,'00:00:00','00:00:00',0,'00:00:00','00:00:00',0,'00:00:00','00:00:00',0,'00:00:00','00:00:00',0,'00:00:00','00:00:00',1,'17:00:00','18:00:00'),(36,4,4,2,0,'00:00:00','00:00:00',0,'00:00:00','00:00:00',0,'00:00:00','00:00:00',0,'00:00:00','00:00:00',0,'00:00:00','00:00:00',1,'06:00:00','07:00:00'),(38,4,5,3,0,'00:00:00','00:00:00',0,'00:00:00','00:00:00',0,'00:00:00','00:00:00',0,'00:00:00','00:00:00',0,'00:00:00','00:00:00',1,'07:00:00','08:00:00'),(39,4,6,4,0,'00:00:00','00:00:00',0,'00:00:00','00:00:00',0,'00:00:00','00:00:00',0,'00:00:00','00:00:00',0,'00:00:00','00:00:00',0,'08:00:00','09:00:00'),(40,4,7,5,0,'00:00:00','00:00:00',0,'00:00:00','00:00:00',0,'00:00:00','00:00:00',0,'00:00:00','00:00:00',0,'00:00:00','00:00:00',0,'09:00:00','10:00:00'),(41,4,8,6,0,'00:00:00','00:00:00',0,'00:00:00','00:00:00',0,'00:00:00','00:00:00',0,'00:00:00','00:00:00',0,'00:00:00','00:00:00',1,'10:00:00','11:00:00'),(42,4,9,7,0,'00:00:00','00:00:00',0,'00:00:00','00:00:00',0,'00:00:00','00:00:00',0,'00:00:00','00:00:00',0,'00:00:00','00:00:00',1,'11:00:00','12:00:00'),(43,4,10,8,0,'00:00:00','00:00:00',0,'00:00:00','00:00:00',0,'00:00:00','00:00:00',0,'00:00:00','00:00:00',0,'00:00:00','00:00:00',1,'12:00:00','13:00:00'),(44,4,11,9,0,'00:00:00','00:00:00',0,'00:00:00','00:00:00',0,'00:00:00','00:00:00',0,'00:00:00','00:00:00',0,'00:00:00','00:00:00',1,'13:00:00','14:00:00'),(45,4,12,10,0,'00:00:00','00:00:00',0,'00:00:00','00:00:00',0,'00:00:00','00:00:00',0,'00:00:00','00:00:00',0,'00:00:00','00:00:00',1,'14:00:00','15:00:00'),(46,4,13,11,0,'00:00:00','00:00:00',0,'00:00:00','00:00:00',0,'00:00:00','00:00:00',0,'00:00:00','00:00:00',0,'00:00:00','00:00:00',0,'15:00:00','16:00:00'),(47,4,14,12,0,'00:00:00','00:00:00',0,'00:00:00','00:00:00',0,'00:00:00','00:00:00',0,'00:00:00','00:00:00',0,'00:00:00','00:00:00',1,'16:00:00','17:00:00'),(48,4,15,13,0,'00:00:00','00:00:00',0,'00:00:00','00:00:00',0,'00:00:00','00:00:00',0,'00:00:00','00:00:00',0,'00:00:00','00:00:00',1,'18:00:00','19:00:00'),(49,5,4,2,0,'00:00:00','00:00:00',0,'00:00:00','00:00:00',0,'00:00:00','00:00:00',0,'00:00:00','00:00:00',0,'00:00:00','00:00:00',0,'06:00:00','07:00:00'),(50,5,5,3,0,'00:00:00','00:00:00',0,'00:00:00','00:00:00',0,'00:00:00','00:00:00',0,'00:00:00','00:00:00',0,'00:00:00','00:00:00',1,'07:00:00','08:00:00'),(51,5,6,4,0,'00:00:00','00:00:00',0,'00:00:00','00:00:00',0,'00:00:00','00:00:00',0,'00:00:00','00:00:00',0,'00:00:00','00:00:00',1,'08:00:00','09:00:00'),(52,5,7,5,0,'00:00:00','00:00:00',0,'00:00:00','00:00:00',0,'00:00:00','00:00:00',0,'00:00:00','00:00:00',0,'00:00:00','00:00:00',1,'09:00:00','10:00:00'),(53,5,8,6,0,'00:00:00','00:00:00',0,'00:00:00','00:00:00',0,'00:00:00','00:00:00',0,'00:00:00','00:00:00',0,'00:00:00','00:00:00',1,'10:00:00','11:00:00'),(54,5,9,7,0,'00:00:00','00:00:00',0,'00:00:00','00:00:00',0,'00:00:00','00:00:00',0,'00:00:00','00:00:00',0,'00:00:00','00:00:00',1,'11:00:00','12:00:00'),(55,5,10,8,0,'00:00:00','00:00:00',0,'00:00:00','00:00:00',0,'00:00:00','00:00:00',0,'00:00:00','00:00:00',0,'00:00:00','00:00:00',1,'12:00:00','13:00:00'),(56,5,11,9,0,'00:00:00','00:00:00',0,'00:00:00','00:00:00',0,'00:00:00','00:00:00',0,'00:00:00','00:00:00',0,'00:00:00','00:00:00',1,'13:00:00','14:00:00'),(57,5,12,10,0,'00:00:00','00:00:00',0,'00:00:00','00:00:00',0,'00:00:00','00:00:00',0,'00:00:00','00:00:00',0,'00:00:00','00:00:00',1,'14:00:00','15:00:00'),(58,5,13,11,0,'00:00:00','00:00:00',0,'00:00:00','00:00:00',0,'00:00:00','00:00:00',0,'00:00:00','00:00:00',0,'00:00:00','00:00:00',0,'15:00:00','16:00:00'),(59,5,14,12,0,'00:00:00','00:00:00',0,'00:00:00','00:00:00',0,'00:00:00','00:00:00',0,'00:00:00','00:00:00',0,'00:00:00','00:00:00',1,'16:00:00','17:00:00'),(60,5,15,13,0,'00:00:00','00:00:00',0,'00:00:00','00:00:00',0,'00:00:00','00:00:00',0,'00:00:00','00:00:00',0,'00:00:00','00:00:00',1,'18:00:00','19:00:00');
/*!40000 ALTER TABLE `asign_academica` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `asignaturas`
--

DROP TABLE IF EXISTS `asignaturas`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `asignaturas` (
  `id_asignatura` tinyint(4) NOT NULL AUTO_INCREMENT,
  `nom_asignatura` varchar(100) NOT NULL,
  PRIMARY KEY (`id_asignatura`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `asignaturas`
--

LOCK TABLES `asignaturas` WRITE;
/*!40000 ALTER TABLE `asignaturas` DISABLE KEYS */;
INSERT INTO `asignaturas` (`id_asignatura`, `nom_asignatura`) VALUES (2,'Educaci&Atilde;&sup3;n F&Atilde;&shy;sica '),(3,'Sistemas'),(4,'Biolog&Atilde;&shy;a '),(5,'C&Atilde;&iexcl;lculo'),(6,'Historia'),(7,'Tr&Atilde;&shy;gonometria'),(8,'Lengua Castellana'),(9,'Ingl&Atilde;&copy;s'),(10,'Geograf&Atilde;&shy;a '),(11,'&Atilde;‰tica y Valores'),(12,'Filosof&Atilde;&shy;a '),(13,'F&Atilde;&shy;sica '),(14,'Qu&Atilde;&shy;mica ');
/*!40000 ALTER TABLE `asignaturas` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `asistencia`
--

DROP TABLE IF EXISTS `asistencia`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `asistencia` (
  `id_alumno` int(11) NOT NULL,
  `id_asignacion` int(11) NOT NULL,
  `fecha` datetime NOT NULL,
  PRIMARY KEY (`id_alumno`,`id_asignacion`,`fecha`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `asistencia`
--

LOCK TABLES `asistencia` WRITE;
/*!40000 ALTER TABLE `asistencia` DISABLE KEYS */;
INSERT INTO `asistencia` (`id_alumno`, `id_asignacion`, `fecha`) VALUES (1,24,'2013-05-18 02:44:21'),(1,24,'2013-05-18 02:58:19'),(2,24,'2013-05-18 02:53:59'),(3,24,'2013-05-17 00:00:00'),(3,26,'2013-05-18 08:21:40'),(5,24,'2013-05-18 02:55:12');
/*!40000 ALTER TABLE `asistencia` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `datos_institucionales`
--

DROP TABLE IF EXISTS `datos_institucionales`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `datos_institucionales` (
  `nom_institucion` varchar(100) NOT NULL DEFAULT 'xxxx',
  `nit_institucion` varchar(20) NOT NULL DEFAULT 'xxxx',
  `dir_institucion` varchar(50) NOT NULL DEFAULT 'xxxx',
  `tel_institucion` varchar(15) NOT NULL DEFAULT 'xxxx',
  `mun_institucion` varchar(100) NOT NULL DEFAULT 'xxxx',
  `dep_institucion` varchar(100) NOT NULL DEFAULT 'xxxx'
) ENGINE=MyISAM DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `datos_institucionales`
--

LOCK TABLES `datos_institucionales` WRITE;
/*!40000 ALTER TABLE `datos_institucionales` DISABLE KEYS */;
INSERT INTO `datos_institucionales` (`nom_institucion`, `nit_institucion`, `dir_institucion`, `tel_institucion`, `mun_institucion`, `dep_institucion`) VALUES ('Instituci&Atilde;&sup3;n Educativa T&Atilde;&copy;cnica Felix Tiberio Guzm&Atilde;&iexcl;n ','55020889985','Carrera 10 # 16-50','123456789','Espinal','Tolima');
/*!40000 ALTER TABLE `datos_institucionales` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `docentes`
--

DROP TABLE IF EXISTS `docentes`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `docentes` (
  `id_docente` int(11) NOT NULL AUTO_INCREMENT,
  `prinom_doc` varchar(50) NOT NULL,
  `segnom_doc` varchar(50) DEFAULT NULL,
  `priape_doc` varchar(50) NOT NULL,
  `segape_doc` varchar(50) DEFAULT NULL,
  `email_doc` varchar(50) NOT NULL,
  `pass_doc` text NOT NULL,
  `admin` tinyint(1) DEFAULT '0',
  PRIMARY KEY (`id_docente`),
  UNIQUE KEY `email_doc` (`email_doc`)
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `docentes`
--

LOCK TABLES `docentes` WRITE;
/*!40000 ALTER TABLE `docentes` DISABLE KEYS */;
INSERT INTO `docentes` (`id_docente`, `prinom_doc`, `segnom_doc`, `priape_doc`, `segape_doc`, `email_doc`, `pass_doc`, `admin`) VALUES (1,'Roberto','Andres','Diaz','Ricardo','robertoandresdiaz@gmail.com','fb795a2f16886bac706ffef518e7e091d3fa8ac0',1),(2,'Juan','Sebastian','Cruz','Perdomo','jscruzper@outlook.com','9c93ad3eb8e93b04ebf284dfb8dc08c98451582f',1),(3,'Cristhian','Camilo ','Garcia','Sanchez','cristhiang_0422@hotmail.com','45db86935f290900e3057a4765b48a03bed4d7cb',1),(4,'Carlos','','Perez','sosa','ffjh@hjgjjdg.com','3d464fc8701eccca088afc2ccf2457e56755cccd',0),(5,'Juan','','gonzalez','vargas','hhjdsj@jfjhfs.com','50c26bbd291af6388f90e1eafe76cc000feb7229',0),(6,'Andrea','','galindo','','hjkjsfd@hjksdfakj.com','3c3a0dd481ab7c72c454db2e22d6fd9bac1f15f5',0),(7,'Edna','','vargas','lopez','jhfj@hjsf.com','edaf6c01d5c3f93a4c080576efba475f6c140879',0),(8,'Zulma','','prada','yepes','jdjkdfsjk@hdsfjkfsd.com','12d285e6c6d82c4d55e83a6cf04015d691aa8425',0),(9,'Camilo','','sanchez','nu&Atilde;&plusmn;ez','hjsdf@jd.com','32de1e566f074335eaf5a99fedba43204c6db12a',0),(10,'Andres','','corredor','losada','sdfhjdf@djd.com','850b143293965de847f45ea2d4a7ebb53c59a3ae',0),(11,'Hector','','ortiz','garzon','dfu@hdj.com','e18fc62de7a3b10b36c6d17fb5e961d635718cb6',0),(12,'Lionel','andres','messi','Cuccittini','jhsdfhj@dhfd.com','4ae64f83a12bf8893f4127760c300a0ec3cfcf9e',0),(13,'Carlos','andres','gonzalez','losada','dii@dfi.com','91fbdc544f6329aeb83c9d2a6e59898dd0070191',0),(14,'Camilo','andres','ortiz','nu&Atilde;&plusmn;ez','ieiie@jdo.com','fd01e57777f3293f87fe710e47cc334817be3886',0),(15,'Andrea','fernanda','corredor','garzon','iefn@ei.com','b87910ea10c2395b934a55912dd61c5ffba51f13',0),(16,'Camilo','','Garcia','Sanchez','kmilo.g0422@gmail.com','2db0c595b243fbc68005ffcb73b1bae8ec30ff34',0),(17,'Nayibe','Soraya','Sanchez','Le&Atilde;&sup3;n ','nsanchez@itfip.edu.co','34d917c038b66e0cca68ac0943e4e95a3ca47249',1);
/*!40000 ALTER TABLE `docentes` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `grados`
--

DROP TABLE IF EXISTS `grados`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `grados` (
  `id_grado` tinyint(4) NOT NULL AUTO_INCREMENT,
  `nom_grado` varchar(20) NOT NULL,
  PRIMARY KEY (`id_grado`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `grados`
--

LOCK TABLES `grados` WRITE;
/*!40000 ALTER TABLE `grados` DISABLE KEYS */;
INSERT INTO `grados` (`id_grado`, `nom_grado`) VALUES (1,'Sexto'),(2,'S&Atilde;&copy;ptimo'),(3,'Octavo'),(4,'Noveno'),(5,'D&Atilde;&copy;cimo'),(6,'Once');
/*!40000 ALTER TABLE `grados` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `grupos`
--

DROP TABLE IF EXISTS `grupos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `grupos` (
  `id_grupo` tinyint(4) NOT NULL AUTO_INCREMENT,
  `nom_grupo` varchar(6) NOT NULL,
  `id_grado` tinyint(4) NOT NULL,
  `id_jornada` tinyint(4) NOT NULL,
  `id_sede` tinyint(4) NOT NULL,
  `id_director` int(11) NOT NULL,
  PRIMARY KEY (`id_grupo`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `grupos`
--

LOCK TABLES `grupos` WRITE;
/*!40000 ALTER TABLE `grupos` DISABLE KEYS */;
INSERT INTO `grupos` (`id_grupo`, `nom_grupo`, `id_grado`, `id_jornada`, `id_sede`, `id_director`) VALUES (1,'601',1,1,1,4),(2,'602',1,1,1,5),(3,'701',2,1,1,6),(4,'702',2,1,1,7),(5,'801',3,1,1,8),(6,'802',3,1,1,9),(7,'902',4,1,1,10),(8,'901',4,1,1,11),(9,'1001',5,1,1,12),(10,'1002',5,1,1,13),(11,'1101',6,1,1,14),(12,'1102',6,1,1,15);
/*!40000 ALTER TABLE `grupos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `jornadas`
--

DROP TABLE IF EXISTS `jornadas`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `jornadas` (
  `id_jornada` tinyint(4) NOT NULL AUTO_INCREMENT,
  `nom_jornada` varchar(30) NOT NULL,
  PRIMARY KEY (`id_jornada`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `jornadas`
--

LOCK TABLES `jornadas` WRITE;
/*!40000 ALTER TABLE `jornadas` DISABLE KEYS */;
INSERT INTO `jornadas` (`id_jornada`, `nom_jornada`) VALUES (1,'Ma&Atilde;&plusmn;ana'),(2,'Tarde');
/*!40000 ALTER TABLE `jornadas` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `observaciones`
--

DROP TABLE IF EXISTS `observaciones`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `observaciones` (
  `id_alumno` int(11) NOT NULL,
  `id_docente` int(11) NOT NULL,
  `fecha` datetime NOT NULL,
  `observacion` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `observaciones`
--

LOCK TABLES `observaciones` WRITE;
/*!40000 ALTER TABLE `observaciones` DISABLE KEYS */;
INSERT INTO `observaciones` (`id_alumno`, `id_docente`, `fecha`, `observacion`) VALUES (2,1,'2013-05-17 03:31:41','El joven incita la violencia en el aula de clases'),(2,2,'2013-05-17 04:03:37','El estudiante lanza papeles en clase'),(2,1,'2013-05-17 04:04:11','El estudiante falla mucho a clases, normalmente cuando asiste se va temprano a su casa y ademas no entrega los trabajos asignados para fuera de clase.'),(5,16,'2013-05-18 01:07:34','Fomenta el desorden en el aula de clase'),(1,16,'2013-05-18 02:42:34','El joven incita a la violencia en el aula'),(2,16,'2013-05-18 02:51:24','El joven le falta el respeto al docente'),(2,16,'2013-05-18 02:53:50','El joven falsifica los datos de su acudiente'),(5,16,'2013-05-18 02:56:00','La estudiante llega tarde al aula de clase'),(5,16,'2013-05-18 02:56:59','La alumna no cumple con las espectativas del curso'),(1,16,'2013-05-18 02:59:30','El estudisnte fomenta la indiciplina en el pstio del colegio'),(1,16,'2013-05-18 03:00:45','El estudiante agredio a un compa&Atilde;&plusmn;ero en el salon'),(3,16,'2013-05-18 03:03:40','La estudiante fomenta desorden en el salon'),(3,16,'2013-05-18 03:05:09','Ls estudiante agredio fisicamente a un compa&Atilde;&plusmn;ero'),(1,16,'2013-05-18 08:54:01','prueba de asisrentic'),(1,16,'2013-05-18 10:44:48','Ptobando cin Gordillo'),(1,16,'2013-05-18 22:03:26','El joven trata mal a su amiga clara');
/*!40000 ALTER TABLE `observaciones` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `pensum`
--

DROP TABLE IF EXISTS `pensum`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `pensum` (
  `id_pensum` int(11) NOT NULL AUTO_INCREMENT,
  `id_asignatura` tinyint(4) NOT NULL,
  `id_grado` tinyint(4) NOT NULL,
  PRIMARY KEY (`id_pensum`),
  UNIQUE KEY `id_asignatura` (`id_asignatura`,`id_grado`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `pensum`
--

LOCK TABLES `pensum` WRITE;
/*!40000 ALTER TABLE `pensum` DISABLE KEYS */;
/*!40000 ALTER TABLE `pensum` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `sedes`
--

DROP TABLE IF EXISTS `sedes`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `sedes` (
  `id_sede` tinyint(4) NOT NULL AUTO_INCREMENT,
  `nom_sede` varchar(150) NOT NULL,
  PRIMARY KEY (`id_sede`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `sedes`
--

LOCK TABLES `sedes` WRITE;
/*!40000 ALTER TABLE `sedes` DISABLE KEYS */;
INSERT INTO `sedes` (`id_sede`, `nom_sede`) VALUES (1,'Industrial'),(2,'Ana Gilma Torres de Parra'),(3,'Mar&Atilde;&shy;a Auxiliadora');
/*!40000 ALTER TABLE `sedes` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2013-09-19  0:49:31
