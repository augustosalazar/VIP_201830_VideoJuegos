CREATE DATABASE  IF NOT EXISTS `down` /*!40100 DEFAULT CHARACTER SET latin1 */;
USE `down`;
-- MySQL dump 10.13  Distrib 5.7.17, for macos10.12 (x86_64)
--
-- Host: 127.0.0.1    Database: down
-- ------------------------------------------------------
-- Server version	5.7.20

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
-- Table structure for table `Evento`
--

DROP TABLE IF EXISTS `Evento`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Evento` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `timeStamp` varchar(45) DEFAULT NULL,
  `tipo` varchar(45) DEFAULT NULL,
  `coordenadaInicio` varchar(45) DEFAULT NULL,
  `coordenadaFin` varchar(45) DEFAULT NULL,
  `idElemento` varchar(45) DEFAULT NULL,
  `idSesionActividad` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Evento`
--

LOCK TABLES `Evento` WRITE;
/*!40000 ALTER TABLE `Evento` DISABLE KEYS */;
/*!40000 ALTER TABLE `Evento` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `Jugador`
--

DROP TABLE IF EXISTS `Jugador`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Jugador` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `idJugador` varchar(45) DEFAULT NULL,
  `nombreJugador` varchar(45) DEFAULT NULL,
  `nivelJujador` int(11) DEFAULT NULL,
  `edadJugador` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Jugador`
--

LOCK TABLES `Jugador` WRITE;
/*!40000 ALTER TABLE `Jugador` DISABLE KEYS */;
/*!40000 ALTER TABLE `Jugador` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `SesionActividad`
--

DROP TABLE IF EXISTS `SesionActividad`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `SesionActividad` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `timeStampInicio` varchar(45) DEFAULT NULL,
  `timeStampFin` varchar(45) DEFAULT NULL,
  `tiempoPrimeraActividadSignificativa` varchar(45) DEFAULT NULL,
  `sesionActividadcol` varchar(45) DEFAULT NULL,
  `nivelExito` varchar(45) DEFAULT NULL,
  `detalleCalificacion` varchar(45) DEFAULT NULL,
  `idSesionMiniJuego` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `SesionActividad`
--

LOCK TABLES `SesionActividad` WRITE;
/*!40000 ALTER TABLE `SesionActividad` DISABLE KEYS */;
/*!40000 ALTER TABLE `SesionActividad` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `SesionJuego`
--

DROP TABLE IF EXISTS `SesionJuego`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `SesionJuego` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `IdSesion` varchar(45) DEFAULT NULL,
  `timeStamp` varchar(45) DEFAULT NULL,
  `idJugador` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `SesionJuego`
--

LOCK TABLES `SesionJuego` WRITE;
/*!40000 ALTER TABLE `SesionJuego` DISABLE KEYS */;
/*!40000 ALTER TABLE `SesionJuego` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `SesionMiniJuego`
--

DROP TABLE IF EXISTS `SesionMiniJuego`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `SesionMiniJuego` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `idSesionMinijuego` varchar(45) DEFAULT NULL,
  `timeStamp` varchar(45) DEFAULT NULL,
  `idSesionJuego` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `SesionMiniJuego`
--

LOCK TABLES `SesionMiniJuego` WRITE;
/*!40000 ALTER TABLE `SesionMiniJuego` DISABLE KEYS */;
/*!40000 ALTER TABLE `SesionMiniJuego` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2018-09-27 12:19:13
