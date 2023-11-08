-- MariaDB dump 10.19-11.0.2-MariaDB, for osx10.18 (arm64)
--
-- Host: localhost    Database: ppExtranet
-- ------------------------------------------------------
-- Server version	11.0.2-MariaDB

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
-- Table structure for table `activities`
--

DROP TABLE IF EXISTS `activities`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `activities` (
  `activityId` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT 'Autocreated',
  `activityName` varchar(50) NOT NULL COMMENT 'Autocreated',
  `activityDescription` varchar(191) NOT NULL,
  PRIMARY KEY (`activityId`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 ;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `activities`
--

LOCK TABLES `activities` WRITE;
/*!40000 ALTER TABLE `activities` DISABLE KEYS */;
INSERT INTO `activities` VALUES
(1,'login','logged in'),
(2,'logout','logged out');
/*!40000 ALTER TABLE `activities` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `activityLog`
--

DROP TABLE IF EXISTS `activityLog`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `activityLog` (
  `activityLogTimestamp` datetime NOT NULL,
  `activityLogId` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT 'Autocreated',
  `userId` int(10) unsigned NOT NULL,
  `activityId` int(10) unsigned NOT NULL COMMENT 'Autocreated',
  PRIMARY KEY (`activityLogId`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `activityLog`
--

LOCK TABLES `activityLog` WRITE;
/*!40000 ALTER TABLE `activityLog` DISABLE KEYS */;
/*!40000 ALTER TABLE `activityLog` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `clients`
--

DROP TABLE IF EXISTS `clients`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `clients` (
  `clientId` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT 'Autocreated',
  `clientName` varchar(50) NOT NULL COMMENT 'Autocreated',
  PRIMARY KEY (`clientId`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `clients`
--

LOCK TABLES `clients` WRITE;
/*!40000 ALTER TABLE `clients` DISABLE KEYS */;
INSERT INTO `clients` VALUES
(1,'client #1'),
(2,'client #2');
/*!40000 ALTER TABLE `clients` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `deployments`
--

DROP TABLE IF EXISTS `deployments`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `deployments` (
  `deploymentId` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `deploymentCommitDate` datetime NOT NULL,
  `deploymentDate` datetime NOT NULL,
  `deploymentCommitMessage` varchar(765) NOT NULL,
  `deploymentCommitAuthor` varchar(255) DEFAULT NULL,
  `deploymentCommitSha` varchar(256) NOT NULL,
  PRIMARY KEY (`deploymentId`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 ;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `deployments`
--

LOCK TABLES `deployments` WRITE;
/*!40000 ALTER TABLE `deployments` DISABLE KEYS */;
/*!40000 ALTER TABLE `deployments` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `orders`
--

DROP TABLE IF EXISTS `orders`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `orders` (
  `orderId` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT 'Autocreated',
  `orderName` varchar(50) NOT NULL COMMENT 'Autocreated',
  `userId` int(10) unsigned NOT NULL,
  PRIMARY KEY (`orderId`),
  KEY `orders_users_userId_fk` (`userId`),
  CONSTRAINT `orders_users_userId_fk` FOREIGN KEY (`userId`) REFERENCES `users` (`userId`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `orders`
--

LOCK TABLES `orders` WRITE;
/*!40000 ALTER TABLE `orders` DISABLE KEYS */;
INSERT INTO `orders` VALUES
(1,'order #1',1),
(2,'order #2',1);
/*!40000 ALTER TABLE `orders` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `permissions`
--

DROP TABLE IF EXISTS `permissions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `permissions` (
  `permissionId` tinyint(3) unsigned NOT NULL AUTO_INCREMENT,
  `permissionName` varchar(191) DEFAULT NULL,
  PRIMARY KEY (`permissionId`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `permissions`
--

LOCK TABLES `permissions` WRITE;
/*!40000 ALTER TABLE `permissions` DISABLE KEYS */;
INSERT INTO `permissions` VALUES
(1,'CAN_ADD_USERS'),
(2,'CAN_ADD_SITES'),
(3,'IS_SUPERADMIN');
/*!40000 ALTER TABLE `permissions` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `settings`
--

DROP TABLE IF EXISTS `settings`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `settings` (
  `settingName` varchar(255) NOT NULL,
  `settingValue` varchar(765) DEFAULT NULL,
  PRIMARY KEY (`settingName`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 ;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `settings`
--

LOCK TABLES `settings` WRITE;
/*!40000 ALTER TABLE `settings` DISABLE KEYS */;
INSERT INTO `settings` VALUES ('projectVersion','0'),('translationUpdateLastRun','2021-02-22 00:00:00');
/*!40000 ALTER TABLE `settings` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `sites`
--

DROP TABLE IF EXISTS `sites`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `sites` (
  `siteId` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT 'Autocreated',
  `siteName` varchar(50) NOT NULL COMMENT 'Autocreated',
  `clientId` int(10) unsigned DEFAULT NULL,
  `adminId` int(10) unsigned NOT NULL COMMENT 'userId who has the admin rights to this office',
  PRIMARY KEY (`siteId`),
  KEY `sites_clients_clientId_fk` (`clientId`),
  CONSTRAINT `sites_clients_clientId_fk` FOREIGN KEY (`clientId`) REFERENCES `clients` (`clientId`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `sites`
--

LOCK TABLES `sites` WRITE;
/*!40000 ALTER TABLE `sites` DISABLE KEYS */;
INSERT INTO `sites` VALUES
(1,'site #1',NULL,1),
(2,'site #2',NULL,1);
/*!40000 ALTER TABLE `sites` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `translationLanguages`
--

DROP TABLE IF EXISTS `translationLanguages`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `translationLanguages` (
  `translationLanguageCode` varchar(255) NOT NULL,
  `translationLanguageName` varchar(255) NOT NULL,
  PRIMARY KEY (`translationLanguageCode`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 ;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `translationLanguages`
--

LOCK TABLES `translationLanguages` WRITE;
/*!40000 ALTER TABLE `translationLanguages` DISABLE KEYS */;
INSERT INTO `translationLanguages` VALUES
('af','Afrikaans'),
('am','Amharic'),
('ar','Arabic'),
('az','Azerbaijani'),
('be','Belarusian'),
('bg','Bulgarian'),
('bn','Bengali'),
('bs','Bosnian'),
('ca','Catalan'),
('ceb','Cebuano'),
('co','Corsican'),
('cs','Czech'),
('cy','Welsh'),
('da','Danish'),
('de','German'),
('el','Greek'),
('en','English'),
('eo','Esperanto'),
('es','Spanish'),
('et','Estonian'),
('eu','Basque'),
('fa','Persian'),
('fi','Finnish'),
('fr','French'),
('fy','Frisian'),
('ga','Irish'),
('gd','Scots Gaelic'),
('gl','Galician'),
('gu','Gujarati'),
('ha','Hausa'),
('haw','Hawaiian'),
('he','Hebrew'),
('hi','Hindi'),
('hmn','Hmong'),
('hr','Croatian'),
('ht','Haitian'),
('hu','Hungarian'),
('hy','Armenian'),
('id','Indonesian'),
('ig','Igbo'),
('is','Icelandic'),
('it','Italian'),
('ja','Japanese'),
('jv','Javanese'),
('ka','Georgian'),
('kk','Kazakh'),
('km','Khmer'),
('kn','Kannada'),
('ko','Korean'),
('ku','Kurdish'),
('ky','Kyrgyz'),
('la','Latin'),
('lb','Luxembourgish'),
('lo','Lao'),
('lt','Lithuanian'),
('lv','Latvian'),
('mg','Malagasy'),
('mi','Maori'),
('mk','Macedonian'),
('ml','Malayalam'),
('mn','Mongolian'),
('mr','Marathi'),
('ms','Malay'),
('mt','Maltese'),
('my','Myanmar'),
('ne','Nepali'),
('nl','Dutch'),
('no','Norwegian'),
('ny','Nyanja (Chichewa)'),
('or','Odia (Oriya)'),
('pa','Punjabi'),
('pl','Polish'),
('ps','Pashto'),
('pt','Portuguese'),
('ro','Romanian'),
('ru','Russian'),
('rw','Kinyarwanda'),
('sd','Sindhi'),
('si','Sinhala (Sinhalese)'),
('sk','Slovak'),
('sl','Slovenian'),
('sm','Samoan'),
('sn','Shona'),
('so','Somali'),
('sq','Albanian'),
('sr','Serbian'),
('st','Sesotho'),
('su','Sundanese'),
('sv','Swedish'),
('sw','Swahili'),
('ta','Tamil'),
('te','Telugu'),
('tg','Tajik'),
('th','Thai'),
('tk','Turkmen'),
('tl','Tagalog (Filipino)'),
('tr','Turkish'),
('tt','Tatar'),
('ug','Uyghur'),
('uk','Ukrainian'),
('ur','Urdu'),
('uz','Uzbek'),
('vi','Vietnamese'),
('xh','Xhosa'),
('yi','Yiddish'),
('yo','Yoruba'),
('zh','Chinese'),
('zu','Zulu');
/*!40000 ALTER TABLE `translationLanguages` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `translations`
--

DROP TABLE IF EXISTS `translations`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `translations` (
  `translationId` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `translationPhrase` varchar(765) CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL,
  `translationState` varchar(255) NOT NULL DEFAULT 'existsInCode',
  `TranslationSource` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`translationId`),
  UNIQUE KEY `translations_translationPhrase_uindex` (`translationPhrase`)
) ENGINE=InnoDB AUTO_INCREMENT=53 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `translations`
--

LOCK TABLES `translations` WRITE;
/*!40000 ALTER TABLE `translations` DISABLE KEYS */;
/*!40000 ALTER TABLE `translations` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `users` (
  `userId` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `userName` varchar(191) NOT NULL,
  `userEmail` varchar(191) NOT NULL,
  `userPassword` varchar(191) NOT NULL,
  `userDeleted` tinyint(1) unsigned NOT NULL DEFAULT 0,
  `userRole` tinyint(3) unsigned NOT NULL DEFAULT 4,
  `siteId` int(10) unsigned DEFAULT NULL,
  PRIMARY KEY (`userId`),
  KEY `users_sites_siteId_fk` (`siteId`),
  CONSTRAINT `users_sites_siteId_fk` FOREIGN KEY (`siteId`) REFERENCES `sites` (`siteId`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES
(1,'Demo User','demo@example.com','$2y$10$vTje.ndUFKHyuotY99iYkO.2aHJUgOsy2x0RMXP1UmrTe6CQsKbtm',0,1,1);
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2023-11-08 21:19:31
