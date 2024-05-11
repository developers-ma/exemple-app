-- MySQL dump 10.13  Distrib 8.0.36, for Linux (x86_64)
--
-- Host: mysql    Database: laravel
-- ------------------------------------------------------
-- Server version	8.0.32

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `cache`
--

DROP TABLE IF EXISTS `cache`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `cache` (
  `key` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `value` mediumtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `expiration` int NOT NULL,
  PRIMARY KEY (`key`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cache`
--

LOCK TABLES `cache` WRITE;
/*!40000 ALTER TABLE `cache` DISABLE KEYS */;
INSERT INTO `cache` VALUES ('9f24cad30dba1a53720757a77611c737','i:1;',1715431392),('9f24cad30dba1a53720757a77611c737:timer','i:1715431392;',1715431392);
/*!40000 ALTER TABLE `cache` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `cache_locks`
--

DROP TABLE IF EXISTS `cache_locks`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `cache_locks` (
  `key` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `owner` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `expiration` int NOT NULL,
  PRIMARY KEY (`key`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cache_locks`
--

LOCK TABLES `cache_locks` WRITE;
/*!40000 ALTER TABLE `cache_locks` DISABLE KEYS */;
/*!40000 ALTER TABLE `cache_locks` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `failed_jobs`
--

DROP TABLE IF EXISTS `failed_jobs`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `failed_jobs` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `failed_jobs`
--

LOCK TABLES `failed_jobs` WRITE;
/*!40000 ALTER TABLE `failed_jobs` DISABLE KEYS */;
/*!40000 ALTER TABLE `failed_jobs` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `films`
--

DROP TABLE IF EXISTS `films`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `films` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `movie_id` bigint unsigned NOT NULL,
  `genre_ids` json NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `image_url` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `films_movie_id_unique` (`movie_id`)
) ENGINE=InnoDB AUTO_INCREMENT=70 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `films`
--

LOCK TABLES `films` WRITE;
/*!40000 ALTER TABLE `films` DISABLE KEYS */;
INSERT INTO `films` VALUES (47,967847,'[14, 12, 35]','Ghostbusters: Frozen Empire','The Spengler family returns to where it all started – the iconic New York City firehouse – to team up with the original Ghostbusters, who\'ve developed a top-secret research lab to take busting ghosts to the next level. But when the discovery of an ancient artifact unleashes an evil force, Ghostbusters new and old must join forces to protect their home and save the world from a second Ice Age.','https://image.tmdb.org/t/p/w500/e1J2oNzSBdou01sUvriVuoYp0pJ.jpg','2024-05-11 06:13:49','2024-05-11 06:13:49'),(48,799583,'[28, 10752, 35]','The Ministry of Ungentlemanly Warfare','A true story about a secret British World War II organization; the Special Operations Executive. Founded by Winston Churchill, their irregular warfare against the Germans helped to change the course of the war, and gave birth to modern black operations.','https://image.tmdb.org/t/p/w500/n840hCSYlk7al8n1HcqZ11ca068.jpg','2024-05-11 06:13:49','2024-05-11 06:13:49'),(49,653346,'[878, 12, 28]','Kingdom of the Planet of the Apes','Several generations in the future following Caesar\'s reign, apes are now the dominant species and live harmoniously while humans have been reduced to living in the shadows. As a new tyrannical ape leader builds his empire, one young ape undertakes a harrowing journey that will cause him to question all that he has known about the past and to make choices that will define a future for apes and humans alike.','https://image.tmdb.org/t/p/w500/gKkl37BQuKTanygYQG1pyYgLVgf.jpg','2024-05-11 06:13:49','2024-05-11 06:13:49'),(50,196322,'[18, 9648, 10765]','','Jason Dessen is abducted into an alternate version of his life. To get back to his true family, he embarks on a harrowing journey to save them from the most terrifying foe imaginable: himself.','https://image.tmdb.org/t/p/w500/c6MRUtPk0nEPQ9FBD9RdRKt2rIm.jpg','2024-05-11 06:13:49','2024-05-11 06:13:49'),(51,1111873,'[27, 53, 35]','Abigail','After a group of would-be criminals kidnap the 12 year old ballerina daughter of a powerful underworld figure, all they have to do to collect a $50 million ransom is watch the girl overnight. In an isolated mansion, the captors start to dwindle, one by one, and they discover, to their mounting horror, that they’re locked inside with no normal little girl.','https://image.tmdb.org/t/p/w500/5Uq8P6MPj9Ppsns5t82AiCiUaWE.jpg','2024-05-11 06:13:49','2024-05-11 06:13:49'),(52,239770,'[10759, 18, 10765]','','The Doctor and his companion travel across time and space encountering incredible friends and foes.','https://image.tmdb.org/t/p/w500/y0oixiNRCAfRlt98DeCD5eLidxq.jpg','2024-05-11 06:13:49','2024-05-11 06:13:49'),(53,1093231,'[10749, 35]','Mother of the Bride','A doting mom jets off to a tropical island resort for her daughter\'s wedding — only to discover the groom\'s father is the ex she hasn\'t seen in decades.','https://image.tmdb.org/t/p/w500/vdTvwykMWvVgdaViBVRh8IFTku5.jpg','2024-05-11 06:13:49','2024-05-11 06:13:49'),(54,241257,'[18, 9648]','','A ragtag crew of podcasters sets out to investigate mysterious disappearances from decades earlier in a charming Irish town with dark, dreadful secrets.','https://image.tmdb.org/t/p/w500/fvpYJkQaeon5kmxioIPHFmgA2v5.jpg','2024-05-11 06:13:50','2024-05-11 06:13:50'),(55,693134,'[878, 12]','Dune: Part Two','Follow the mythic journey of Paul Atreides as he unites with Chani and the Fremen while on a path of revenge against the conspirators who destroyed his family. Facing a choice between the love of his life and the fate of the known universe, Paul endeavors to prevent a terrible future only he can foresee.','https://image.tmdb.org/t/p/w500/czembW0Rk1Ke7lCJGahbOhdCuhV.jpg','2024-05-11 06:13:50','2024-05-11 06:13:50'),(56,940721,'[878, 27, 28]','Godzilla Minus One','Postwar Japan is at its lowest point when a new crisis emerges in the form of a giant monster, baptized in the horrific power of the atomic bomb.','https://image.tmdb.org/t/p/w500/hkxxMIGaiCTmrEArK7J56JTKUlB.jpg','2024-05-11 06:13:50','2024-05-11 06:13:50'),(57,250670,'[18]','','When Ruby unwittingly witnesses an explosive secret at Maxton Hall private school, the arrogant millionaire heir James Beaufort has to deal with the quick-witted scholarship student for better or worse: He is determined to silence Ruby. Their passionate exchange of words unexpectedly ignites a spark...','https://image.tmdb.org/t/p/w500/poe7azEgbyew5PVlWSYpFQBjwD7.jpg','2024-05-11 06:13:50','2024-05-11 06:13:50'),(58,1049574,'[28, 53]','Darkness of Man','Russell Hatch, an Interpol operative who takes on the role of father figure to Jayden, the son of an informant killed in a routine raid gone wrong. Years later, Hatch finds himself protecting Jayden and his uncle from a group of merciless gangs in an all-out turf war, stopping at nothing to protect Jayden and fight anyone getting in his way. Including supposed allies with hidden agendas and nefarious intents.','https://image.tmdb.org/t/p/w500/tsj5oYBRoF5PuTYrfe1Hw6fsxfG.jpg','2024-05-11 06:13:50','2024-05-11 06:13:50'),(59,843527,'[10749, 35]','The Idea of You','40-year-old single mom Solène begins an unexpected romance with 24-year-old Hayes Campbell, the lead singer of August Moon, the hottest boy band on the planet.','https://image.tmdb.org/t/p/w500/zDi2U7WYkdIoGYHcYbM9X5yReVD.jpg','2024-05-11 06:13:50','2024-05-11 06:13:50'),(60,57243,'[10759, 18, 10765]','','The Doctor is a Time Lord: a 900 year old alien with 2 hearts, part of a gifted civilization who mastered time travel. The Doctor saves planets for a living—more of a hobby actually, and the Doctor\'s very, very good at it.','https://image.tmdb.org/t/p/w500/4edFyasCrkH4MKs6H4mHqlrxA6b.jpg','2024-05-11 06:13:50','2024-05-11 06:13:50'),(61,106379,'[10759, 10765, 9648]','','The story of haves and have-nots in a world in which there’s almost nothing left to have. 200 years after the apocalypse, the gentle denizens of luxury fallout shelters are forced to return to the irradiated hellscape their ancestors left behind — and are shocked to discover an incredibly complex, gleefully weird, and highly violent universe waiting for them.','https://image.tmdb.org/t/p/w500/AnsSKR9LuK0T9bAOcPVA3PUvyWj.jpg','2024-05-11 06:13:50','2024-05-11 06:13:50'),(62,251883,'[18, 35]','','After a painful breakup, a young lawyer dives head first into the confusing world of modern dating, with the unwavering support of her best friends.','https://image.tmdb.org/t/p/w500/bipLD6IHbMQ4F2jZlBrAEz4ddOl.jpg','2024-05-11 06:13:50','2024-05-11 06:13:50'),(63,111111,'[16, 10759, 10765]','','In a brewing war between the gods of Olympus and the titans, Heron, a commoner living on the outskirts of ancient Greece, becomes mankind\'s best hope of surviving an evil demon army, when he discovers the secrets of his past.','https://image.tmdb.org/t/p/w500/zXRR5tgGLtKrRmuN4ko9SLAdCiZ.jpg','2024-05-11 06:13:50','2024-05-11 06:13:50'),(64,786892,'[878, 28, 12]','Furiosa: A Mad Max Saga','As the world falls, young Furiosa is snatched from the Green Place of Many Mothers into the hands of a great biker horde led by the warlord Dementus. Sweeping through the wasteland, they encounter the citadel presided over by Immortan Joe. The two tyrants wage war for dominance, and Furiosa must survive many trials as she puts together the means to find her way home.','https://image.tmdb.org/t/p/w500/pKaA8VvfkNfEMUPMiiuL5qSPQYy.jpg','2024-05-11 06:13:50','2024-05-11 06:13:50'),(65,1047020,'[53, 80]','The Last Stop in Yuma County','While awaiting the next fuel truck at a middle-of-nowhere Arizona rest stop, a traveling young knife salesman is thrust into a high-stakes hostage situation by the arrival of two similarly stranded bank robbers with no qualms about using cruelty—or cold, hard steel—to protect their bloodstained, ill-gotten fortune.','https://image.tmdb.org/t/p/w500/u6ae2MMh8PpSamO3cIttLM5B18v.jpg','2024-05-11 06:13:50','2024-05-11 06:13:50'),(66,844185,'[35, 36]','Unfrosted','In a time when milk and cereal ruled breakfast, a fierce corporate battle begins over a revolutionary new pastry.','https://image.tmdb.org/t/p/w500/efvnagceBlmNG10BKnSOEqI6VtP.jpg','2024-05-11 06:13:50','2024-05-11 06:13:50'),(67,1183002,'[53]','The Image of You','Identical twins Anna and Zoe find their bond tested over Anna\'s new love, Nick. While the trusting Anna is head over heels, her skeptical sister Zoe senses a web of deceit. But as Zoe digs for the truth, they\'re all pulled into a dangerous game where honesty could prove fatal.','https://image.tmdb.org/t/p/w500/gboq2oB6QNBcW32V0A8uOajTwXU.jpg','2024-05-11 12:13:38','2024-05-11 12:13:38'),(68,7451,'[28, 12, 53, 80]','xXx','Xander Cage is your standard adrenaline junkie with no fear and a lousy attitude. When the US Government \"recruits\" him to go on a mission, he\'s not exactly thrilled. His mission: to gather information on an organization that may just be planning the destruction of the world, led by the nihilistic Yorgi.','https://image.tmdb.org/t/p/w500/xeEw3eLeSFmJgXZzmF2Efww0q3s.jpg','2024-05-11 12:13:38','2024-05-11 12:13:38'),(69,95842,'[18]','','Zhang Qing, a present-day college student in culture and history major wants to study in professor Ye\'s postgraduate class, so he decides to write a historical fiction to elaborate his perspective of analyzing ancient literature history with modern concept. In the fiction, Zhang himself acts as a young man Fan Xian with mysterious life who lives in a remote seaside town of Kingdom Qing in his childhood, under the help of a mysterious mentor and a blindfolded watchman. Fan goes to the capital when he grows up, where he experiences plenty of ordeal and temper. Fan persists in adhering the rule of justice and goodness and lives his own glorious life.','https://image.tmdb.org/t/p/w500/7NXlOAFSUPBujmWbnUmqnwNZQhO.jpg','2024-05-11 12:13:38','2024-05-11 12:13:38');
/*!40000 ALTER TABLE `films` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `genres`
--

DROP TABLE IF EXISTS `genres`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `genres` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `genre_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `genres`
--

LOCK TABLES `genres` WRITE;
/*!40000 ALTER TABLE `genres` DISABLE KEYS */;
INSERT INTO `genres` VALUES (1,'28','Action','2024-05-10 21:07:14','2024-05-10 21:07:14'),(2,'12','Adventure','2024-05-10 21:07:14','2024-05-10 21:07:14'),(3,'16','Animation','2024-05-10 21:07:14','2024-05-10 21:07:14'),(4,'35','Comedy','2024-05-10 21:07:14','2024-05-10 21:07:14'),(5,'80','Crime','2024-05-10 21:07:14','2024-05-10 21:07:14'),(6,'99','Documentary','2024-05-10 21:07:14','2024-05-10 21:07:14'),(7,'18','Drama','2024-05-10 21:07:14','2024-05-10 21:07:14'),(8,'10751','Family','2024-05-10 21:07:14','2024-05-10 21:07:14'),(9,'14','Fantasy','2024-05-10 21:07:14','2024-05-10 21:07:14'),(10,'36','History','2024-05-10 21:07:14','2024-05-10 21:07:14'),(11,'27','Horror','2024-05-10 21:07:14','2024-05-10 21:07:14'),(12,'10402','Music','2024-05-10 21:07:14','2024-05-10 21:07:14'),(13,'9648','Mystery','2024-05-10 21:07:14','2024-05-10 21:07:14'),(14,'10749','Romance','2024-05-10 21:07:14','2024-05-10 21:07:14'),(15,'878','Science Fiction','2024-05-10 21:07:14','2024-05-10 21:07:14'),(16,'10770','TV Movie','2024-05-10 21:07:14','2024-05-10 21:07:14'),(17,'53','Thriller','2024-05-10 21:07:14','2024-05-10 21:07:14'),(18,'10752','War','2024-05-10 21:07:14','2024-05-10 21:07:14'),(19,'37','Western','2024-05-10 21:07:14','2024-05-10 21:07:14');
/*!40000 ALTER TABLE `genres` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `job_batches`
--

DROP TABLE IF EXISTS `job_batches`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `job_batches` (
  `id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `total_jobs` int NOT NULL,
  `pending_jobs` int NOT NULL,
  `failed_jobs` int NOT NULL,
  `failed_job_ids` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `options` mediumtext COLLATE utf8mb4_unicode_ci,
  `cancelled_at` int DEFAULT NULL,
  `created_at` int NOT NULL,
  `finished_at` int DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `job_batches`
--

LOCK TABLES `job_batches` WRITE;
/*!40000 ALTER TABLE `job_batches` DISABLE KEYS */;
/*!40000 ALTER TABLE `job_batches` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `jobs`
--

DROP TABLE IF EXISTS `jobs`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `jobs` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `queue` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `attempts` tinyint unsigned NOT NULL,
  `reserved_at` int unsigned DEFAULT NULL,
  `available_at` int unsigned NOT NULL,
  `created_at` int unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `jobs_queue_index` (`queue`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `jobs`
--

LOCK TABLES `jobs` WRITE;
/*!40000 ALTER TABLE `jobs` DISABLE KEYS */;
/*!40000 ALTER TABLE `jobs` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `migrations`
--

DROP TABLE IF EXISTS `migrations`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `migrations` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=106 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `migrations`
--

LOCK TABLES `migrations` WRITE;
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;
INSERT INTO `migrations` VALUES (99,'0001_01_01_000000_create_users_table',1),(100,'0001_01_01_000001_create_cache_table',1),(101,'0001_01_01_000002_create_jobs_table',1),(102,'2024_05_09_203337_add_two_factor_columns_to_users_table',1),(103,'2024_05_09_203359_create_personal_access_tokens_table',1),(104,'2024_05_10_124736_create_films_table',1),(105,'2024_05_10_184227_create_genres_table',1);
/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `password_reset_tokens`
--

DROP TABLE IF EXISTS `password_reset_tokens`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `password_reset_tokens`
--

LOCK TABLES `password_reset_tokens` WRITE;
/*!40000 ALTER TABLE `password_reset_tokens` DISABLE KEYS */;
/*!40000 ALTER TABLE `password_reset_tokens` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `personal_access_tokens`
--

DROP TABLE IF EXISTS `personal_access_tokens`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `personal_access_tokens` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint unsigned NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `personal_access_tokens`
--

LOCK TABLES `personal_access_tokens` WRITE;
/*!40000 ALTER TABLE `personal_access_tokens` DISABLE KEYS */;
/*!40000 ALTER TABLE `personal_access_tokens` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `sessions`
--

DROP TABLE IF EXISTS `sessions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `sessions` (
  `id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint unsigned DEFAULT NULL,
  `ip_address` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_agent` text COLLATE utf8mb4_unicode_ci,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_activity` int NOT NULL,
  PRIMARY KEY (`id`),
  KEY `sessions_user_id_index` (`user_id`),
  KEY `sessions_last_activity_index` (`last_activity`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `sessions`
--

LOCK TABLES `sessions` WRITE;
/*!40000 ALTER TABLE `sessions` DISABLE KEYS */;
INSERT INTO `sessions` VALUES ('dl6VtuSaMmjOKaVNSACLDXQh0gmIF4UC7nLfWhZH',1,'172.24.0.1','Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/15.6.1 Safari/605.1.15','YTo2OntzOjY6Il90b2tlbiI7czo0MDoiVlYzdDNEY0FmclM4bjZxcmNBaHUxbm83MDdZMnFFNnB1UFFGS0JOTCI7czozOiJ1cmwiO2E6MDp7fXM6OToiX3ByZXZpb3VzIjthOjE6e3M6MzoidXJsIjtzOjI3OiJodHRwOi8vbG9jYWxob3N0L2NhdGVnb3JpZXMiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX1zOjUwOiJsb2dpbl93ZWJfNTliYTM2YWRkYzJiMmY5NDAxNTgwZjAxNGM3ZjU4ZWE0ZTMwOTg5ZCI7aToxO3M6MjE6InBhc3N3b3JkX2hhc2hfc2FuY3R1bSI7czo2MDoiJDJ5JDEyJGtIMElhM0NvWmN1N2RzYlFpUzVuM3V1Qi9ESHF2Z3g5S3V2djJNTEd1bnpvTUtqQmRTS0UyIjt9',1715409142),('OGEie09iYsi0Dchccjumxe9BPbKM9A8pQSTKTvfc',1,'172.24.0.1','Mozilla/5.0 (Macintosh; Intel Mac OS X 10.15; rv:125.0) Gecko/20100101 Firefox/125.0','YTo2OntzOjY6Il90b2tlbiI7czo0MDoiUVpWaGtpMGZ5SGNQdXp5bDEzY1p0d1JUWlFOcWtUSHAyYXViRWJJOSI7czozOiJ1cmwiO2E6MDp7fXM6OToiX3ByZXZpb3VzIjthOjE6e3M6MzoidXJsIjtzOjE2OiJodHRwOi8vbG9jYWxob3N0Ijt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czo1MDoibG9naW5fd2ViXzU5YmEzNmFkZGMyYjJmOTQwMTU4MGYwMTRjN2Y1OGVhNGUzMDk4OWQiO2k6MTtzOjIxOiJwYXNzd29yZF9oYXNoX3NhbmN0dW0iO3M6NjA6IiQyeSQxMiRrSDBJYTNDb1pjdTdkc2JRaVM1bjN1dUIvREhxdmd4OUt1dnYyTUxHdW56b01LakJkU0tFMiI7fQ==',1715406574),('oiB3Z2elxv8A2zJKaa7Iq7ZhyfrDEo2SLmRJnShG',1,'172.24.0.1','Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/124.0.0.0 Safari/537.36','YTo2OntzOjY6Il90b2tlbiI7czo0MDoiUjdjb05WR2hmdWZTOUZjUHJDSE9PQWFuWU9LZGxtMm5lM21wV09hdSI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czozOiJ1cmwiO2E6MDp7fXM6OToiX3ByZXZpb3VzIjthOjE6e3M6MzoidXJsIjtzOjE2OiJodHRwOi8vbG9jYWxob3N0Ijt9czo1MDoibG9naW5fd2ViXzU5YmEzNmFkZGMyYjJmOTQwMTU4MGYwMTRjN2Y1OGVhNGUzMDk4OWQiO2k6MTtzOjIxOiJwYXNzd29yZF9oYXNoX3NhbmN0dW0iO3M6NjA6IiQyeSQxMiRrSDBJYTNDb1pjdTdkc2JRaVM1bjN1dUIvREhxdmd4OUt1dnYyTUxHdW56b01LakJkU0tFMiI7fQ==',1715409607),('X1n9bIoWsOZwSTP64IzkEMuRwltCMRInyfex0pc6',1,'172.24.0.1','Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/124.0.0.0 Safari/537.36','YTo2OntzOjY6Il90b2tlbiI7czo0MDoiUG43cldqSE1XVjcwSG52NUdMVkNsNkNQMEdPbVZrd1RoU2hkTTk1WCI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czozOiJ1cmwiO2E6MDp7fXM6OToiX3ByZXZpb3VzIjthOjE6e3M6MzoidXJsIjtzOjI5OiJodHRwOi8vbG9jYWxob3N0L2ZpbG0vNDcvZWRpdCI7fXM6NTA6ImxvZ2luX3dlYl81OWJhMzZhZGRjMmIyZjk0MDE1ODBmMDE0YzdmNThlYTRlMzA5ODlkIjtpOjE7czoyMToicGFzc3dvcmRfaGFzaF9zYW5jdHVtIjtzOjYwOiIkMnkkMTIka0gwSWEzQ29aY3U3ZHNiUWlTNW4zdXVCL0RIcXZneDlLdXZ2Mk1MR3Vuem9NS2pCZFNLRTIiO30=',1715435735);
/*!40000 ALTER TABLE `sessions` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `users` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `two_factor_secret` text COLLATE utf8mb4_unicode_ci,
  `two_factor_recovery_codes` text COLLATE utf8mb4_unicode_ci,
  `two_factor_confirmed_at` timestamp NULL DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `current_team_id` bigint unsigned DEFAULT NULL,
  `profile_photo_path` varchar(2048) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1,'salaheddine','salaheddine@developer.ma',NULL,'$2y$12$kH0Ia3CoZcu7dsbQiS5n3uuB/DHqvgx9Kuvv2MLGunzoMKjBdSKE2',NULL,NULL,NULL,NULL,NULL,NULL,'2024-05-10 21:07:08','2024-05-10 21:07:08');
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

-- Dump completed on 2024-05-11 14:59:19
