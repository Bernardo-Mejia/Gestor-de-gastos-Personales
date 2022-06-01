-- MariaDB dump 10.19  Distrib 10.4.24-MariaDB, for Win64 (AMD64)
--
-- Host: localhost    Database: gastos_ingresos
-- ------------------------------------------------------
-- Server version	10.4.24-MariaDB

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `categorias`
--

DROP TABLE IF EXISTS `categorias`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `categorias` (
  `idCategoria` int(11) NOT NULL,
  `Categoria` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`idCategoria`),
  UNIQUE KEY `idCategorias_UNIQUE` (`idCategoria`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `categorias`
--

LOCK TABLES `categorias` WRITE;
/*!40000 ALTER TABLE `categorias` DISABLE KEYS */;
INSERT INTO `categorias` VALUES (1,'Alimentos'),(2,'Bebidas'),(3,'Vestido'),(4,'Transporte'),(5,'Entretenimiento/diversión'),(6,'Telefonía celular'),(7,'Educación'),(8,'Salud'),(9,'Electrónico'),(10,'Cuidado personal'),(11,'Otro');
/*!40000 ALTER TABLE `categorias` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `forma_pago`
--

DROP TABLE IF EXISTS `forma_pago`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `forma_pago` (
  `idForma_Pago` int(10) unsigned NOT NULL,
  `Forma_Pago` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`idForma_Pago`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `forma_pago`
--

LOCK TABLES `forma_pago` WRITE;
/*!40000 ALTER TABLE `forma_pago` DISABLE KEYS */;
INSERT INTO `forma_pago` VALUES (1,'Efectivo'),(2,'Tarjeta de crédito'),(3,'Tarjeta de débito');
/*!40000 ALTER TABLE `forma_pago` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `gastos`
--

DROP TABLE IF EXISTS `gastos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `gastos` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `Tipo_comp_idTipo_comp` int(11) NOT NULL,
  `Categorias_idCategorias` int(11) NOT NULL,
  `Usuario_idUsuario` int(10) unsigned NOT NULL,
  `Forma_Pago_idForma_Pago` int(10) unsigned NOT NULL,
  `Establecimiento` varchar(45) NOT NULL,
  `IDGasto` int(11) DEFAULT NULL,
  `Fecha` date DEFAULT NULL,
  `Hora` time DEFAULT NULL,
  `producto_servicio` varchar(45) DEFAULT NULL,
  `Monto` decimal(7,2) DEFAULT NULL,
  `cant` int(11) DEFAULT NULL,
  `Subtotal` decimal(7,2) DEFAULT NULL,
  PRIMARY KEY (`ID`),
  KEY `fk_Gastos_Tipo_comp1_idx` (`Tipo_comp_idTipo_comp`),
  KEY `fk_Gastos_Categorias1_idx` (`Categorias_idCategorias`),
  KEY `fk_Gastos_Usuario1_idx` (`Usuario_idUsuario`),
  KEY `fk_Gastos_Forma_Pago1_idx` (`Forma_Pago_idForma_Pago`),
  CONSTRAINT `fk_Gastos_Categorias1` FOREIGN KEY (`Categorias_idCategorias`) REFERENCES `categorias` (`idCategoria`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_Gastos_Forma_Pago1` FOREIGN KEY (`Forma_Pago_idForma_Pago`) REFERENCES `forma_pago` (`idForma_Pago`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_Gastos_Tipo_comp1` FOREIGN KEY (`Tipo_comp_idTipo_comp`) REFERENCES `tipo_comp` (`idTipo_comp`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_Gastos_Usuario1` FOREIGN KEY (`Usuario_idUsuario`) REFERENCES `usuarios` (`idUsuario`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=3081 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `gastos`
--

LOCK TABLES `gastos` WRITE;
/*!40000 ALTER TABLE `gastos` DISABLE KEYS */;
INSERT INTO `gastos` VALUES (3000,1,4,1000,1,'Pemex',1,'2022-03-22','13:36:22','Gasolina',23.11,17,400.00),(3001,6,1,1000,2,'Oxxo',2,'2022-03-24','14:23:11','Torta',16.00,2,32.00),(3002,1,3,1000,1,'Cool Shirt',3,'2022-03-25','11:21:22','Camiseta',300.00,1,300.00),(3003,4,9,1000,2,'Reparaciones de equipos',4,'2022-03-25','14:47:22','Cargador de celuar',200.00,1,200.00),(3004,6,4,1000,1,'Pemex',5,'2022-03-28','13:12:06','Gasolina',21.43,23,500.00),(3005,1,1,1000,1,'Carnes Don Juan',6,'2022-03-28','17:23:11','Carne de res',100.00,2,200.00),(3006,4,7,1000,2,'Udemy',7,'2022-03-29','12:23:11','Curso de Python',350.00,1,350.00),(3007,5,6,1000,1,'SIX',8,'2022-03-30','11:45:57','Recarga',100.00,1,100.00),(3008,5,8,1000,1,'Farmacias del Ahorro',9,'2022-04-02','12:34:28','Paquete de cubrebocas',200.00,1,200.00),(3009,5,2,1000,1,'SIX',10,'2022-04-02','11:45:57','Coca-Cola 3L',31.00,1,31.00),(3010,1,10,1000,1,'Farmacias del Ahorro',11,'2022-04-03','10:26:45','Desodorante',45.00,2,90.00),(3011,6,1,1000,1,'Puesto de comida',12,'2022-04-05','11:23:11','Sandwich',20.00,1,20.00),(3012,6,2,1000,1,'Puesto de comida',12,'2022-04-05','11:23:11','Refresco de 600ml',15.00,1,15.00),(3013,1,4,1000,1,'Pemex',13,'2022-04-08','13:57:51','Gasolina',21.43,14,300.00),(3014,5,3,1000,1,'clothing store',14,'2022-04-09','17:34:11','Pantalón',250.00,1,250.00),(3015,3,9,1000,2,'Mercado Libre',15,'2022-04-10','15:34:22','Batería para laptop',1700.00,1,1700.00),(3016,4,9,1000,1,'TONY',16,'2022-04-11','13:25:05','Memoria USB 16GB',200.00,2,400.00),(3017,6,1,1000,1,'Establecimiento de frutas',17,'2022-04-11','14:23:54','Manzanas',45.00,2,90.00),(3018,6,1,1000,1,'Establecimiento de frutas',17,'2022-04-11','14:23:54','Cuarto de limón',20.00,1,20.00),(3019,1,7,1000,2,'Udemy',18,'2022-04-14','11:23:55','Curso de Desarrollo Web',400.00,1,400.00),(3020,1,6,1000,1,'SIX',19,'2022-04-14','17:23:55','Recarga',100.00,1,100.00),(3021,6,1,1000,1,'Carnes Don Juan',20,'2022-04-15','14:28:44','Costilla de puerco',120.00,1,120.00),(3022,6,1,1000,1,'Carnes Don Juan',20,'2022-04-15','14:28:44','Carne de res',100.00,1,100.00),(3023,5,2,1000,2,'SIX',21,'2022-04-15','15:20:10','Coca-Cola 3L',31.00,1,31.00),(3024,5,11,1000,2,'SIX',21,'2022-04-15','15:20:10','Croqueta Ganador',34.00,2,68.00),(3025,5,1,1000,2,'SIX',21,'2022-04-15','15:20:10','Tortillas',18.00,2,36.00),(3026,1,4,1000,1,'Pemex',22,'2022-04-16','18:27:46','Gasolina',21.43,5,100.00),(3027,3,7,1000,2,'Udemy',23,'2022-04-17','23:45:11','Curso de Angular',150.00,1,150.00),(3028,1,4,1000,1,'Pemex',24,'2022-04-18','12:30:11','Gasolina',21.43,9,200.00),(3029,6,1,1000,1,'Carnes Don Juan',25,'2022-04-18','13:05:11','Carne molida',2.00,50,100.00),(3030,1,10,1000,1,'SIX',26,'2022-04-20','11:23:11','Jabón Palmolive',21.00,4,84.00),(3031,1,10,1000,1,'SIX',26,'2022-04-20','11:23:11','Shampoo head and shoulders',2.00,110,220.00),(3032,1,11,1000,1,'SIX',26,'2022-04-20','11:23:11','Croqueta Ganador',34.00,4,136.00),(3033,1,4,1000,2,'Pemex',27,'2022-04-21','09:45:02','Gasolina',21.43,5,100.00),(3034,6,2,1000,1,'Cafetería del TESCHA',28,'2022-04-21','17:29:00','Agua de jamaica',16.00,1,16.00),(3035,3,4,1000,1,'Pemex',29,'2022-04-22','10:13:22','Gasolina',21.43,14,300.00),(3036,1,6,1000,1,'Tiendas 3B',30,'2022-04-22','12:45:23','Recarga',100.00,1,100.00),(3037,4,5,1000,2,'Disney',31,'2022-04-22','13:11:44','Pago de suscripción a Disney+',159.00,1,159.00),(3038,1,6,1000,1,'Tiendas 3B',32,'2022-04-23','15:31:43','Recarga',100.00,1,100.00),(3039,1,2,1000,1,'SIX',33,'2022-04-23','17:09:56','Refresco Squirt de 600ml',14.00,1,14.00),(3040,1,1,1000,1,'SIX',33,'2022-04-23','17:09:56','Sabritas 42g',12.00,1,12.00),(3041,1,4,1000,1,'Pemex',34,'2022-04-24','18:40:05','Gasolina',21.43,9,200.00),(3042,5,6,1000,1,'Tiendas 3B',34,'2022-04-26','14:23:54','Recarga',100.00,1,100.00),(3043,1,1,1000,1,'Canicería',35,'2022-04-27','08:40:16','Pechuga de pollo',130.00,1,130.00),(3044,1,1,1000,1,'Canicería',35,'2022-04-27','08:40:16','Carne molida',120.00,1,120.00),(3045,1,1,1000,1,'Soriana',36,'2022-04-27','08:46:27','Lechuga',12.50,2,25.00),(3046,1,1,1000,1,'Soriana',36,'2022-04-27','08:46:27','Jitomate',30.00,1,30.00),(3047,1,1,1000,1,'Soriana',36,'2022-04-27','08:46:27','Pan',12.00,5,60.00),(3048,1,10,1000,1,'Soriana',36,'2022-04-27','08:46:27','Shampoo head and shoulders',60.00,1,60.00),(3049,1,1,1000,1,'Soriana',36,'2022-04-27','08:46:27','Sandwich',15.00,2,30.00),(3050,1,4,1000,1,'Pemex',37,'2022-04-29','13:59:21','Gasolina',22.00,14,310.00),(3051,5,8,1000,1,'Farmacias del Ahorro',38,'2022-04-30','11:23:00','Paquete de cubrebocas',200.00,1,200.00),(3052,5,5,1000,1,'Steam',39,'2022-04-30','20:45:33','Juego PvZ',56.00,1,56.00),(3053,6,2,1000,1,'Cafetería del TESCHA',40,'2022-05-02','15:30:30','Agua de orchata',16.00,1,16.00),(3054,4,9,1000,1,'Mercado Libre',41,'2022-05-04','11:45:57','Memoria RAM DDR4 8GB',860.00,1,860.00),(3055,1,1,1000,1,'Verdulería San Juan',42,'2022-05-05','10:34:22','Zanahoria',24.00,1,24.00),(3056,1,1,1000,1,'SIX',43,'2022-05-07','09:23:11','Pan blanco Bimbo',42.00,1,42.00),(3057,1,1,1000,1,'SIX',43,'2022-05-07','09:23:11','Medio de Jamón de pierna',50.00,1,50.00),(3058,1,1,1000,1,'SIX',43,'2022-05-07','09:23:11','Cuarto de queso doble crema',31.00,1,31.00),(3059,5,11,1000,1,'Soriana',44,'2022-05-09','10:01:30','Aceite de transmisión automática',149.00,1,149.00),(3060,5,10,1000,1,'Farmacia',45,'2022-05-11','11:46:27','Desodorante',54.00,1,54.00),(3061,4,11,1000,1,'Casa Proyectos',46,'2022-05-12','16:30:00','Pago 1 de paquete de graduación',400.00,1,400.00),(3062,1,7,1000,1,'Udemy',47,'2022-05-15','10:23:44','Curso de Python',129.00,1,129.00),(3063,6,10,1000,1,'SIX',48,'2022-05-16','11:23:59','Jabón Palmolive',21.00,4,84.00),(3064,1,8,1000,1,'Consultorio Médico de Jesús',49,'2022-05-18','08:30:00','Consulta médica',100.00,1,100.00),(3065,1,8,1000,1,'Consultorio Médico de Jesús',49,'2022-05-18','08:30:00','Ketotifeno Solución',100.00,1,100.00),(3066,1,8,1000,1,'Consultorio Médico de Jesús',49,'2022-05-18','08:30:00','Doxiciclina 100 mg',65.00,1,65.00),(3067,1,8,1000,1,'Consultorio Médico de Jesús',49,'2022-05-18','08:30:00','Epinastina 20 mg',65.00,1,65.00),(3068,5,11,1000,1,'SIX',50,'2022-05-20','19:56:03','Croqueta Ganador',34.00,4,136.00),(3069,6,1,1000,1,'Tienda Don Luis',51,'2022-05-20','21:30:00','Salchichas',30.00,1,30.00),(3070,5,8,1000,1,'Farmacias del Ahorro',52,'2022-05-23','10:23:55','Aspirinas',50.00,1,50.00),(3071,6,6,1000,1,'SIX',53,'2022-05-24','08:46:27','Recarga',100.00,1,100.00),(3072,1,1,1000,1,'SIX',54,'2022-05-25','11:23:44','Pan blanco Bimbo',42.00,1,42.00),(3073,1,1,1000,1,'SIX',54,'2022-05-25','11:23:44','Cuarto de Jamón de pierna',25.00,1,25.00),(3074,6,1,1000,1,'Establecimiento de frutas',55,'2022-05-27','10:20:00','Manzanas',45.00,1,45.00),(3075,6,1,1000,1,'Establecimiento de frutas',55,'2022-05-27','10:20:00','Kilo de Calabaza',33.00,1,33.00),(3076,6,1,1000,1,'Establecimiento de frutas',55,'2022-05-27','10:20:00','Kilo de uvas',90.00,1,90.00),(3077,1,10,1000,1,'Farmacias Guadalajara',56,'2022-05-28','09:57:10','Pasta dental colgate',45.00,1,45.00),(3078,1,10,1000,1,'Farmacias Guadalajara',56,'2022-05-28','09:57:10','Cepillo dental ORAL-B',60.00,1,60.00),(3079,6,2,1000,1,'Cafetería del TESCHA',57,'2022-05-30','16:00:00','Agua de orchata',16.00,1,16.00),(3080,1,11,1000,1,'SIX',58,'2022-05-30','21:07:10','Croqueta Ganador',34.00,2,68.00);
/*!40000 ALTER TABLE `gastos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Temporary table structure for view `gastos_por_categorias`
--

DROP TABLE IF EXISTS `gastos_por_categorias`;
/*!50001 DROP VIEW IF EXISTS `gastos_por_categorias`*/;
SET @saved_cs_client     = @@character_set_client;
SET character_set_client = utf8;
/*!50001 CREATE TABLE `gastos_por_categorias` (
  `Categoría` tinyint NOT NULL,
  `Cantidad` tinyint NOT NULL,
  `Total` tinyint NOT NULL
) ENGINE=MyISAM */;
SET character_set_client = @saved_cs_client;

--
-- Table structure for table `ingresos`
--

DROP TABLE IF EXISTS `ingresos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `ingresos` (
  `idIngreso` int(10) unsigned NOT NULL,
  `Usuario_idUsuario` int(10) unsigned NOT NULL,
  `Ingreso` decimal(7,2) DEFAULT NULL,
  `Fecha` date DEFAULT NULL,
  `Hora` varchar(45) DEFAULT NULL,
  `Subtotal` decimal(7,3) DEFAULT NULL,
  `Saldo` decimal(7,3) DEFAULT NULL,
  PRIMARY KEY (`idIngreso`),
  KEY `fk_Ingreso_Usuario1_idx` (`Usuario_idUsuario`),
  CONSTRAINT `fk_Ingreso_Usuario1` FOREIGN KEY (`Usuario_idUsuario`) REFERENCES `usuarios` (`idUsuario`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ingresos`
--

LOCK TABLES `ingresos` WRITE;
/*!40000 ALTER TABLE `ingresos` DISABLE KEYS */;
INSERT INTO `ingresos` VALUES (2000,1000,200.00,'2022-03-09','16:23:22',0.000,200.000),(2001,1000,1000.00,'2022-03-21',' 15:23:03',0.000,1200.000),(2002,1000,200.00,'2022-03-26','14:56:22',468.000,668.000),(2003,1000,500.00,'2022-03-27','14:47:22',668.000,1168.000),(2004,1000,400.00,'2022-04-01','12:35:07',18.000,418.000),(2005,1000,500.00,'2022-04-07','20:23:21',62.000,562.000),(2006,1000,1000.00,'2022-04-09','22:23:44',12.000,1012.000),(2007,1000,700.00,'2022-04-10','13:23:11',1012.000,1712.000),(2008,1000,500.00,'2022-04-10','21:23:19',12.000,512.000),(2009,1000,1000.00,'2022-04-13','14:45:04',2.000,1002.000),(2010,1000,500.00,'2022-04-17','22:04:56',47.000,547.000),(2011,1000,500.00,'2022-04-19','12:02:10',97.000,597.000),(2012,1000,700.00,'2022-04-21','22:46:24',41.000,741.000),(2013,1000,500.00,'2022-04-24','15:45:33',56.000,556.000),(2014,1000,250.00,'2022-04-25','11:45:57',356.000,606.000),(2015,1000,1250.00,'2022-04-29','10:12:45',51.000,1301.000),(2016,1000,500.00,'2022-05-03','11:45:57',719.000,1219.000),(2017,1000,500.00,'2022-05-10','12:45:22',63.000,563.000),(2018,1000,700.00,'2022-05-14','16:23:55',109.000,809.000),(2019,1000,500.00,'2022-05-22','20:30:00',100.000,600.000),(2020,1000,500.00,'2022-05-31','12:00:00',26.000,526.000);
/*!40000 ALTER TABLE `ingresos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tipo_comp`
--

DROP TABLE IF EXISTS `tipo_comp`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tipo_comp` (
  `idTipo_comp` int(11) NOT NULL,
  `Tipo_compra` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`idTipo_comp`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tipo_comp`
--

LOCK TABLES `tipo_comp` WRITE;
/*!40000 ALTER TABLE `tipo_comp` DISABLE KEYS */;
INSERT INTO `tipo_comp` VALUES (1,'Ticket'),(2,'Boleto'),(3,'Nota de remisión'),(4,'Factura'),(5,'Recibo'),(6,'N/E');
/*!40000 ALTER TABLE `tipo_comp` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Temporary table structure for view `total_gastos`
--

DROP TABLE IF EXISTS `total_gastos`;
/*!50001 DROP VIEW IF EXISTS `total_gastos`*/;
SET @saved_cs_client     = @@character_set_client;
SET character_set_client = utf8;
/*!50001 CREATE TABLE `total_gastos` (
  `Total` tinyint NOT NULL,
  `Total de gastos` tinyint NOT NULL
) ENGINE=MyISAM */;
SET character_set_client = @saved_cs_client;

--
-- Table structure for table `usuario_login`
--

DROP TABLE IF EXISTS `usuario_login`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `usuario_login` (
  `id` int(5) NOT NULL AUTO_INCREMENT,
  `idUsuario` int(10) unsigned DEFAULT NULL,
  `nombre` varchar(40) DEFAULT NULL,
  `password` varchar(30) DEFAULT NULL,
  `correo` varchar(50) DEFAULT NULL,
  `tipo_usuario` int(5) DEFAULT 1,
  `usuario` varchar(30) DEFAULT 'usuario',
  PRIMARY KEY (`id`),
  KEY `idUsuario` (`idUsuario`)
) ENGINE=InnoDB AUTO_INCREMENT=502 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `usuario_login`
--

LOCK TABLES `usuario_login` WRITE;
/*!40000 ALTER TABLE `usuario_login` DISABLE KEYS */;
INSERT INTO `usuario_login` VALUES (500,1000,'bernardo','computadoras703','bernardo_mp@tesch.edu.mx',2,'admin'),(501,1001,'mariana','computadoras703','mariana_lc@tesch.edu.mx',1,'usuario');
/*!40000 ALTER TABLE `usuario_login` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `usuarios`
--

DROP TABLE IF EXISTS `usuarios`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `usuarios` (
  `idUsuario` int(10) unsigned NOT NULL,
  `Nombre_Usuario` varchar(45) DEFAULT NULL,
  `Edad` int(3) DEFAULT NULL,
  `Genero` varchar(10) DEFAULT NULL,
  `tipo_usuario` tinyint(2) DEFAULT 1,
  PRIMARY KEY (`idUsuario`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `usuarios`
--

LOCK TABLES `usuarios` WRITE;
/*!40000 ALTER TABLE `usuarios` DISABLE KEYS */;
INSERT INTO `usuarios` VALUES (1000,'Bernardo Mejía Pérez',21,'Masculino',2),(1001,'Maria López Cerda',26,'Femenino',1);
/*!40000 ALTER TABLE `usuarios` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Final view structure for view `gastos_por_categorias`
--

/*!50001 DROP TABLE IF EXISTS `gastos_por_categorias`*/;
/*!50001 DROP VIEW IF EXISTS `gastos_por_categorias`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = cp850 */;
/*!50001 SET character_set_results     = cp850 */;
/*!50001 SET collation_connection      = cp850_general_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`root`@`localhost` SQL SECURITY DEFINER */
/*!50001 VIEW `gastos_por_categorias` AS select `categorias`.`Categoria` AS `Categor�a`,count(0) AS `Cantidad`,sum(`gastos`.`Subtotal`) AS `Total` from (`gastos` join `categorias` on(`gastos`.`Categorias_idCategorias` = `categorias`.`idCategoria`)) group by `gastos`.`Categorias_idCategorias` order by sum(`gastos`.`Subtotal`) desc */;
/*!50001 SET character_set_client      = @saved_cs_client */;
/*!50001 SET character_set_results     = @saved_cs_results */;
/*!50001 SET collation_connection      = @saved_col_connection */;

--
-- Final view structure for view `total_gastos`
--

/*!50001 DROP TABLE IF EXISTS `total_gastos`*/;
/*!50001 DROP VIEW IF EXISTS `total_gastos`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = cp850 */;
/*!50001 SET character_set_results     = cp850 */;
/*!50001 SET collation_connection      = cp850_general_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`root`@`localhost` SQL SECURITY DEFINER */
/*!50001 VIEW `total_gastos` AS select count(0) AS `Total`,sum(`gastos`.`Subtotal`) AS `Total de gastos` from `gastos` */;
/*!50001 SET character_set_client      = @saved_cs_client */;
/*!50001 SET character_set_results     = @saved_cs_results */;
/*!50001 SET collation_connection      = @saved_col_connection */;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2022-05-31 15:42:01
