-- MySQL dump 10.13  Distrib 8.0.34, for Win64 (x86_64)
--
-- Host: localhost    Database: fw
-- ------------------------------------------------------
-- Server version	8.0.34

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!50503 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `tb_carrito`
--

DROP TABLE IF EXISTS `tb_carrito`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tb_carrito` (
  `id_ca` int NOT NULL AUTO_INCREMENT,
  `nombre_producto` varchar(40) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `cantidad_pro` int NOT NULL,
  `precio_pro` float NOT NULL,
  `fecha_agre` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id_ca`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tb_carrito`
--

LOCK TABLES `tb_carrito` WRITE;
/*!40000 ALTER TABLE `tb_carrito` DISABLE KEYS */;
/*!40000 ALTER TABLE `tb_carrito` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tb_categoria`
--

DROP TABLE IF EXISTS `tb_categoria`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tb_categoria` (
  `id_categoria` int NOT NULL,
  `categoria` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
  PRIMARY KEY (`id_categoria`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tb_categoria`
--

LOCK TABLES `tb_categoria` WRITE;
/*!40000 ALTER TABLE `tb_categoria` DISABLE KEYS */;
INSERT INTO `tb_categoria` VALUES (1,'Ropa para Damas y caballeros'),(3,'ropa infantil'),(4,'calzado para todos'),(5,'accesorios para todos');
/*!40000 ALTER TABLE `tb_categoria` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tb_detalle_factura`
--

DROP TABLE IF EXISTS `tb_detalle_factura`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tb_detalle_factura` (
  `id_detalle` int NOT NULL AUTO_INCREMENT,
  `id_factura` int NOT NULL,
  `id_producto` int NOT NULL,
  `cantidad` int NOT NULL,
  `precio_unitario` float NOT NULL,
  `subtotal` float NOT NULL,
  PRIMARY KEY (`id_detalle`),
  KEY `id_factura` (`id_factura`),
  KEY `id_producto` (`id_producto`),
  CONSTRAINT `tb_detalle_factura_ibfk_1` FOREIGN KEY (`id_factura`) REFERENCES `tb_facturas` (`id_factura`),
  CONSTRAINT `tb_detalle_factura_ibfk_2` FOREIGN KEY (`id_producto`) REFERENCES `tb_productos` (`id_producto`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tb_detalle_factura`
--

LOCK TABLES `tb_detalle_factura` WRITE;
/*!40000 ALTER TABLE `tb_detalle_factura` DISABLE KEYS */;
/*!40000 ALTER TABLE `tb_detalle_factura` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tb_facturas`
--

DROP TABLE IF EXISTS `tb_facturas`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tb_facturas` (
  `id_factura` int NOT NULL AUTO_INCREMENT,
  `documento_usuario` int NOT NULL,
  `metodo_pago` varchar(50) NOT NULL,
  `fecha_factura` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `direccion` varchar(255) DEFAULT NULL,
  `telefono` varchar(20) DEFAULT NULL,
  `total` float NOT NULL,
  PRIMARY KEY (`id_factura`),
  KEY `documento_usuario` (`documento_usuario`),
  CONSTRAINT `tb_facturas_ibfk_1` FOREIGN KEY (`documento_usuario`) REFERENCES `tb_usuarios` (`documento`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tb_facturas`
--

LOCK TABLES `tb_facturas` WRITE;
/*!40000 ALTER TABLE `tb_facturas` DISABLE KEYS */;
/*!40000 ALTER TABLE `tb_facturas` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tb_favoritos`
--

DROP TABLE IF EXISTS `tb_favoritos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tb_favoritos` (
  `id_favo` int NOT NULL AUTO_INCREMENT,
  `nombre_produc` varchar(50) NOT NULL,
  `cantidad_fav` int NOT NULL,
  `fecga_agreg` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id_favo`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tb_favoritos`
--

LOCK TABLES `tb_favoritos` WRITE;
/*!40000 ALTER TABLE `tb_favoritos` DISABLE KEYS */;
INSERT INTO `tb_favoritos` VALUES (3,'conjunto',1,'2024-08-24 02:39:35'),(4,'aretes',1,'2024-08-27 02:18:12');
/*!40000 ALTER TABLE `tb_favoritos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tb_fecha_especial`
--

DROP TABLE IF EXISTS `tb_fecha_especial`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tb_fecha_especial` (
  `id` int NOT NULL AUTO_INCREMENT,
  `evento` varchar(255) NOT NULL,
  `fecha_inicio` date NOT NULL,
  `fecha_fin` date NOT NULL,
  `color_evento` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tb_fecha_especial`
--

LOCK TABLES `tb_fecha_especial` WRITE;
/*!40000 ALTER TABLE `tb_fecha_especial` DISABLE KEYS */;
/*!40000 ALTER TABLE `tb_fecha_especial` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tb_imagenes`
--

DROP TABLE IF EXISTS `tb_imagenes`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tb_imagenes` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nombre_imagen` varchar(255) NOT NULL,
  `ruta_imagen` varchar(255) NOT NULL,
  `fecha_subida` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tb_imagenes`
--

LOCK TABLES `tb_imagenes` WRITE;
/*!40000 ALTER TABLE `tb_imagenes` DISABLE KEYS */;
/*!40000 ALTER TABLE `tb_imagenes` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tb_likes`
--

DROP TABLE IF EXISTS `tb_likes`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tb_likes` (
  `id_like` int NOT NULL AUTO_INCREMENT,
  `producto_id` int NOT NULL,
  `usuario_id` int NOT NULL,
  `valor` varchar(20) NOT NULL,
  PRIMARY KEY (`id_like`),
  KEY `producto_id` (`producto_id`),
  KEY `usuario_id` (`usuario_id`),
  CONSTRAINT `tb_likes_ibfk_1` FOREIGN KEY (`producto_id`) REFERENCES `tb_productos` (`id_producto`),
  CONSTRAINT `tb_likes_ibfk_2` FOREIGN KEY (`usuario_id`) REFERENCES `tb_usuarios` (`documento`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tb_likes`
--

LOCK TABLES `tb_likes` WRITE;
/*!40000 ALTER TABLE `tb_likes` DISABLE KEYS */;
INSERT INTO `tb_likes` VALUES (3,5,1235,'like'),(4,1,12345,'like'),(6,3,12345,'like'),(10,5,12345,'like'),(14,6,159,'like'),(15,5,159,'like');
/*!40000 ALTER TABLE `tb_likes` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tb_lista_deseos`
--

DROP TABLE IF EXISTS `tb_lista_deseos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tb_lista_deseos` (
  `id_deseo` int NOT NULL AUTO_INCREMENT,
  `documento` int NOT NULL,
  `nombre_producto` varchar(150) NOT NULL,
  `foto_referencia` varchar(255) DEFAULT NULL,
  `fecha_creacion` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id_deseo`),
  KEY `documento_usuario` (`documento`),
  CONSTRAINT `tb_lista_deseos_ibfk_1` FOREIGN KEY (`documento`) REFERENCES `tb_usuarios` (`documento`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tb_lista_deseos`
--

LOCK TABLES `tb_lista_deseos` WRITE;
/*!40000 ALTER TABLE `tb_lista_deseos` DISABLE KEYS */;
INSERT INTO `tb_lista_deseos` VALUES (1,123,'lola','camisa.png','2024-08-14 04:27:26');
/*!40000 ALTER TABLE `tb_lista_deseos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tb_productos`
--

DROP TABLE IF EXISTS `tb_productos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tb_productos` (
  `id_producto` int NOT NULL,
  `nombre_producto` varchar(150) NOT NULL,
  `precio` float NOT NULL,
  `cantidad` int NOT NULL,
  `detalles` varchar(150) NOT NULL,
  `color` varchar(50) DEFAULT NULL,
  `tallas` varchar(50) DEFAULT NULL,
  `ruta_img` varchar(250) DEFAULT NULL,
  `id_categoria` int NOT NULL DEFAULT '1',
  PRIMARY KEY (`id_producto`),
  KEY `fk_categoria` (`id_categoria`),
  CONSTRAINT `fk_categoria` FOREIGN KEY (`id_categoria`) REFERENCES `tb_categoria` (`id_categoria`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tb_productos`
--

LOCK TABLES `tb_productos` WRITE;
/*!40000 ALTER TABLE `tb_productos` DISABLE KEYS */;
INSERT INTO `tb_productos` VALUES (1,'vestido para dama',65000,5,'vestido para dama para distinta ocasión','beige','tallas s','../img\\66cf3a8890c09.png',1),(3,'vestido',50000,4,'vestido de una buena calidad y de un buen material, para toda ocasion','negro','talla M','../img\\mujer3.png',1),(4,'aretes',70000,3,'esto son unos accesorios','dorados',NULL,'DSF.png',5),(5,'camisa',35,3,'conjunto elegante','rojo','talla M','../img\\mujer8.png',1),(6,'conjunto de bebe',40000,2,'este es un conjunto para bebe','vinotinto','talla 2','infantil3.png',3),(12,'vestido',50000,10,'vestido','negro','talla m','../img/66cf377662e90.png',1);
/*!40000 ALTER TABLE `tb_productos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tb_usuarios`
--

DROP TABLE IF EXISTS `tb_usuarios`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tb_usuarios` (
  `documento` int NOT NULL,
  `nombre` varchar(30) NOT NULL,
  `apellido` varchar(30) NOT NULL,
  `correo` varchar(50) NOT NULL,
  `contraseña` varchar(255) DEFAULT NULL,
  `fecha` varchar(30) NOT NULL,
  `foto` varchar(2000) DEFAULT NULL,
  `rol` int NOT NULL,
  PRIMARY KEY (`documento`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tb_usuarios`
--

LOCK TABLES `tb_usuarios` WRITE;
/*!40000 ALTER TABLE `tb_usuarios` DISABLE KEYS */;
INSERT INTO `tb_usuarios` VALUES (123,'cindy','nero','cindy@gmail.com','321','2004-03-02','6e6a48600ac28f39d22ff3ff145a0982.jpg',1),(159,'ronal','lopez','ronal@gmail.com','$2y$12$QPdD5k./n.WTviHqa23MHufdSlNAg1qNSXPYE5mE3ZlEgBmpF4/y2','2024-08-16','66cf60d80a0ac.png',1),(1235,'maria','pp','mariaa@gmail.com','$2y$12$oxqn5Smdp3Gc3YCyujb9Pue0BPnvGVstfZ6SXL5jAf0MqSbcaOJEe','2024-09-03',NULL,1),(12345,'maria','pp','maria@gmail.com','$2y$12$Krdc25vybYpCrpDc/Xi9wu5dUHf4DBDZ0CKBJrzAO5ByQjkF8xoVy','2024-08-27',NULL,1),(123456,'marcela','florez','marcela@gmail.com','$2y$12$jUvcLJ7lE7QTJPurQWK9RO.xjcQ6ka7bjSuHNMcvfbyFeEoyCR0PW','2024-08-10','66cf3389d9983.png',0);
/*!40000 ALTER TABLE `tb_usuarios` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Temporary view structure for view `vista_productos_likes`
--

DROP TABLE IF EXISTS `vista_productos_likes`;
/*!50001 DROP VIEW IF EXISTS `vista_productos_likes`*/;
SET @saved_cs_client     = @@character_set_client;
/*!50503 SET character_set_client = utf8mb4 */;
/*!50001 CREATE VIEW `vista_productos_likes` AS SELECT 
 1 AS `id_producto`,
 1 AS `nombre_producto`,
 1 AS `precio`,
 1 AS `cantidad`,
 1 AS `detalles`,
 1 AS `color`,
 1 AS `tallas`,
 1 AS `ruta_img`,
 1 AS `total_likes`*/;
SET character_set_client = @saved_cs_client;

--
-- Dumping events for database 'fw'
--

--
-- Dumping routines for database 'fw'
--

--
-- Final view structure for view `vista_productos_likes`
--

/*!50001 DROP VIEW IF EXISTS `vista_productos_likes`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8mb4 */;
/*!50001 SET character_set_results     = utf8mb4 */;
/*!50001 SET collation_connection      = utf8mb4_0900_ai_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`root`@`localhost` SQL SECURITY DEFINER */
/*!50001 VIEW `vista_productos_likes` AS select `p`.`id_producto` AS `id_producto`,`p`.`nombre_producto` AS `nombre_producto`,`p`.`precio` AS `precio`,`p`.`cantidad` AS `cantidad`,`p`.`detalles` AS `detalles`,`p`.`color` AS `color`,`p`.`tallas` AS `tallas`,`p`.`ruta_img` AS `ruta_img`,count(`l`.`id_like`) AS `total_likes` from (`tb_productos` `p` left join `tb_likes` `l` on((`p`.`id_producto` = `l`.`producto_id`))) group by `p`.`id_producto` */;
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

-- Dump completed on 2024-08-28 13:24:07
