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
INSERT INTO `cache` VALUES ('a99554985c886c50bc357b9bcf3f2b2c','i:1;',1715739632),('a99554985c886c50bc357b9bcf3f2b2c:timer','i:1715739632;',1715739632);
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
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `films`
--

LOCK TABLES `films` WRITE;
/*!40000 ALTER TABLE `films` DISABLE KEYS */;
INSERT INTO `films` VALUES (1,823464,'[878, 28, 12]','Godzilla x Kong: The New Empire','Following their explosive showdown, Godzilla and Kong must reunite against a colossal undiscovered threat hidden within our world, challenging their very existence – and our own.','https://image.tmdb.org/t/p/w500/tMefBSflR6PGQLv7WvFPpKLZkyk.jpg','2024-05-15 01:32:21','2024-05-15 02:13:45'),(2,239770,'[10759, 18, 10765]','Doctor Who','The Doctor and his companion travel across time and space encountering incredible friends and foes.','https://image.tmdb.org/t/p/w500/8FHthx4Vu81J4X5BTLhJYK9Gtbs.jpg','2024-05-15 01:32:21','2024-05-15 02:13:45'),(3,653346,'[878, 12, 28]','Kingdom of the Planet of the Apes','Several generations in the future following Caesar\'s reign, apes are now the dominant species and live harmoniously while humans have been reduced to living in the shadows. As a new tyrannical ape leader builds his empire, one young ape undertakes a harrowing journey that will cause him to question all that he has known about the past and to make choices that will define a future for apes and humans alike.','https://image.tmdb.org/t/p/w500/gKkl37BQuKTanygYQG1pyYgLVgf.jpg','2024-05-15 01:32:21','2024-05-15 02:13:45'),(4,693134,'[878, 12]','Dune: Part Two','Follow the mythic journey of Paul Atreides as he unites with Chani and the Fremen while on a path of revenge against the conspirators who destroyed his family. Facing a choice between the love of his life and the fate of the known universe, Paul endeavors to prevent a terrible future only he can foresee.','https://image.tmdb.org/t/p/w500/czembW0Rk1Ke7lCJGahbOhdCuhV.jpg','2024-05-15 01:32:21','2024-05-15 02:13:45'),(5,85937,'[16, 10759, 10765]','Demon Slayer: Kimetsu no Yaiba','It is the Taisho Period in Japan. Tanjiro, a kindhearted boy who sells charcoal for a living, finds his family slaughtered by a demon. To make matters worse, his younger sister Nezuko, the sole survivor, has been transformed into a demon herself. Though devastated by this grim reality, Tanjiro resolves to become a “demon slayer” so that he can turn his sister back into a human, and kill the demon that massacred his family.','https://image.tmdb.org/t/p/w500/xUfRZu2mi8jH6SzQEJGP6tjBuYj.jpg','2024-05-15 01:32:21','2024-05-15 02:13:45'),(6,967847,'[14, 12, 35]','Ghostbusters: Frozen Empire','After the original team developed a top-secret research laboratory to take the shattered ghosts to the next level. But when the discovery of an ancient artifact unleashes an evil force, both new and old must join forces to protect their homeland and save the world from the Second Ice Age... from the very thing that unleashes an unstoppable force from the depths of history. As chaos reigns and pure evil plunges the world into darkness, the Ghostbusters must step forward once again to save humanity from the brink of doom. With two generations of Ghostbusters fighting side by side, the stakes have never been higher. Will they be able to avert the inevitable before everything freezes?','https://image.tmdb.org/t/p/w500/e1J2oNzSBdou01sUvriVuoYp0pJ.jpg','2024-05-15 01:32:21','2024-05-15 02:13:45'),(7,57243,'[10759, 18, 10765]','Doctor Who','The Doctor is a Time Lord: a 900 year old alien with 2 hearts, part of a gifted civilization who mastered time travel. The Doctor saves planets for a living—more of a hobby actually, and the Doctor\'s very, very good at it.','https://image.tmdb.org/t/p/w500/4edFyasCrkH4MKs6H4mHqlrxA6b.jpg','2024-05-15 01:32:21','2024-05-15 02:13:45'),(8,1111873,'[27, 53]','Abigail','A group of criminals kidnaps a teenage ballet dancer, the daughter of a notorious gang leader, in order to obtain a ransom of $50 million, but over time, they discover that she is not just an ordinary girl. After the kidnappers begin to diminish, one by one, they discover, to their increasing horror, that they are locked inside with an unusual girl.','https://image.tmdb.org/t/p/w500/7qxG0zyt29BI0IzFDfsps62kbQi.jpg','2024-05-15 01:32:21','2024-05-15 02:13:45'),(9,799583,'[28, 10752, 18]','The Ministry of Ungentlemanly Warfare','Taking place during World War II, the British Army assigns a group of competent soldiers to carry out a mission against the Nazi forces behind enemy lines... A true story about a secret British World War II organization; the Special Operations Executive. Founded by Winston Churchill, their irregular warfare against the Germans helped to change the course of the war, and gave birth to modern black operations.','https://image.tmdb.org/t/p/w500/8aF0iAKH9MJMYAZdi0Slg77RYa2.jpg','2024-05-15 01:32:21','2024-05-15 02:13:45'),(10,1087388,'[27, 53]','Sting','After raising an unnervingly talented spider in secret, 12-year-old Charlotte must face the truth about her pet and fight for her family\'s survival.','https://image.tmdb.org/t/p/w500/zuSAZIG1PSrxFwPeAlGtg9LTwxo.jpg','2024-05-15 01:32:21','2024-05-15 02:13:45'),(11,940721,'[878, 27, 28]','Godzilla Minus One','Postwar Japan is at its lowest point when a new crisis emerges in the form of a giant monster, baptized in the horrific power of the atomic bomb.','https://image.tmdb.org/t/p/w500/hkxxMIGaiCTmrEArK7J56JTKUlB.jpg','2024-05-15 01:32:21','2024-05-15 02:13:45'),(12,196322,'[18, 9648, 10765]','Dark Matter','Jason Dessen is abducted into an alternate version of his life. To get back to his true family, he embarks on a harrowing journey to save them from the most terrifying foe imaginable: himself.','https://image.tmdb.org/t/p/w500/c6MRUtPk0nEPQ9FBD9RdRKt2rIm.jpg','2024-05-15 01:32:21','2024-05-15 02:13:45'),(13,250670,'[18]','Maxton Hall - The World Between Us','When Ruby unwittingly witnesses an explosive secret at Maxton Hall private school, the arrogant millionaire heir James Beaufort has to deal with the quick-witted scholarship student for better or worse: He is determined to silence Ruby. Their passionate exchange of words unexpectedly ignites a spark...','https://image.tmdb.org/t/p/w500/poe7azEgbyew5PVlWSYpFQBjwD7.jpg','2024-05-15 01:32:21','2024-05-15 02:13:45'),(14,1093231,'[10749, 35]','Mother of the Bride','A doting mom jets off to a tropical island resort for her daughter\'s wedding — only to discover the groom\'s father is the ex she hasn\'t seen in decades.','https://image.tmdb.org/t/p/w500/vdTvwykMWvVgdaViBVRh8IFTku5.jpg','2024-05-15 01:32:21','2024-05-15 02:13:45'),(15,639720,'[35, 14, 10751]','IF','A girl discovers she can see everyone\'s imaginary friends and embarks on a magical adventure to reconnect forgotten IFs with their kids.','https://image.tmdb.org/t/p/w500/xbKFv4KF3sVYuWKllLlwWDmuZP7.jpg','2024-05-15 01:32:21','2024-05-15 02:13:45'),(16,786892,'[878, 28, 12]','Furiosa: A Mad Max Saga','As the world falls, young Furiosa is snatched from the Green Place of Many Mothers into the hands of a great biker horde led by the warlord Dementus. Sweeping through the wasteland, they encounter the citadel presided over by Immortan Joe. The two tyrants wage war for dominance, and Furiosa must survive many trials as she puts together the means to find her way home.','https://image.tmdb.org/t/p/w500/iADOJ8Zymht2JPMoy3R7xceZprc.jpg','2024-05-15 01:32:21','2024-05-15 02:13:45'),(17,1015634,'[14, 35]','Sasquatch Sunset','In the misty forests of North America, a family of Sasquatches—possibly the last of their enigmatic kind—embark on an absurdist, epic, hilarious, and ultimately poignant journey over the course of one year. These shaggy and noble giants fight for survival as they find themselves on a collision course with the ever-changing world around them.','https://image.tmdb.org/t/p/w500/s43rgDGRDOB12prgK9YfWPEIyAh.jpg','2024-05-15 01:32:21','2024-05-15 02:13:45'),(18,1148713,'[53, 80, 18]','The Courier','After shrewdly seizing his chance to join a money-laundering scheme, a modest valet dives into a world of fast cash, fast cars — and an inevitable crash.','https://image.tmdb.org/t/p/w500/smiEA0WTErj1FlowpAuEGPJKyZp.jpg','2024-05-15 01:32:21','2024-05-15 02:13:45'),(19,241257,'[18, 9648]','Bodkin','A ragtag crew of podcasters sets out to investigate mysterious disappearances from decades earlier in a charming Irish town with dark, dreadful secrets.','https://image.tmdb.org/t/p/w500/fvpYJkQaeon5kmxioIPHFmgA2v5.jpg','2024-05-15 01:32:21','2024-05-15 02:13:45'),(20,106379,'[10765, 10759, 9648]','Fallout','The story of haves and have-nots in a world in which there’s almost nothing left to have. 200 years after the apocalypse, the gentle denizens of luxury fallout shelters are forced to return to the irradiated hellscape their ancestors left behind — and are shocked to discover an incredibly complex, gleefully weird, and highly violent universe waiting for them.','https://image.tmdb.org/t/p/w500/AnsSKR9LuK0T9bAOcPVA3PUvyWj.jpg','2024-05-15 01:32:21','2024-05-15 02:13:45');
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
INSERT INTO `genres` VALUES (1,'28','Action','2024-05-15 01:32:21','2024-05-15 01:32:21'),(2,'12','Adventure','2024-05-15 01:32:22','2024-05-15 01:32:22'),(3,'16','Animation','2024-05-15 01:32:22','2024-05-15 01:32:22'),(4,'35','Comedy','2024-05-15 01:32:22','2024-05-15 01:32:22'),(5,'80','Crime','2024-05-15 01:32:22','2024-05-15 01:32:22'),(6,'99','Documentary','2024-05-15 01:32:22','2024-05-15 01:32:22'),(7,'18','Drama','2024-05-15 01:32:22','2024-05-15 01:32:22'),(8,'10751','Family','2024-05-15 01:32:22','2024-05-15 01:32:22'),(9,'14','Fantasy','2024-05-15 01:32:22','2024-05-15 01:32:22'),(10,'36','History','2024-05-15 01:32:22','2024-05-15 01:32:22'),(11,'27','Horror','2024-05-15 01:32:22','2024-05-15 01:32:22'),(12,'10402','Music','2024-05-15 01:32:22','2024-05-15 01:32:22'),(13,'9648','Mystery','2024-05-15 01:32:22','2024-05-15 01:32:22'),(14,'10749','Romance','2024-05-15 01:32:22','2024-05-15 01:32:22'),(15,'878','Science Fiction','2024-05-15 01:32:22','2024-05-15 01:32:22'),(16,'10770','TV Movie','2024-05-15 01:32:22','2024-05-15 01:32:22'),(17,'53','Thriller','2024-05-15 01:32:22','2024-05-15 01:32:22'),(18,'10752','War','2024-05-15 01:32:22','2024-05-15 01:32:22'),(19,'37','Western','2024-05-15 01:32:22','2024-05-15 01:32:22');
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
) ENGINE=InnoDB AUTO_INCREMENT=113 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `migrations`
--

LOCK TABLES `migrations` WRITE;
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;
INSERT INTO `migrations` VALUES (106,'0001_01_01_000000_create_users_table',1),(107,'0001_01_01_000001_create_cache_table',1),(108,'0001_01_01_000002_create_jobs_table',1),(109,'2024_05_09_203337_add_two_factor_columns_to_users_table',1),(110,'2024_05_09_203359_create_personal_access_tokens_table',1),(111,'2024_05_10_124736_create_films_table',1),(112,'2024_05_10_184227_create_genres_table',1);
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
INSERT INTO `sessions` VALUES ('gKBO2HUZSnJnyov8cavdakYNnbzeR2KFSuy2mK7q',1,'172.21.0.1','Mozilla/6.0 (Macintosh; Intel Mac OS X 41_55_7) AppleWebKit/37.16 (KHTML, like Gecko) Chrome/14.0.0.0 Safari/537.36','YTo2OntzOjY6Il90b2tlbiI7czo0MDoiZHNNS2dkY1kwQk9SejdxdkJkWUFsNzNGcFZIM0luNUVydDhSZ1RjQiI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czozOiJ1cmwiO2E6MDp7fXM6OToiX3ByZXZpb3VzIjthOjE6e3M6MzoidXJsIjtzOjE2OiJodHRwOi8vbG9jYWxob3N0Ijt9czo1MDoibG9naW5fd2ViXzU5YmEzNmFkZGMyYjJmOTQwMTU4MGYwMTRjN2Y1OGVhNGUzMDk4OWQiO2k6MTtzOjIxOiJwYXNzd29yZF9oYXNoX3NhbmN0dW0iO3M6NjA6IiQyeSQxMiRuNFZMQUhjeTFLWG9lMUk2by92aFgucjdzbG53dDFOVXAwLjFaMy9QVVhSeHFDN004cGV2SyI7fQ==',1715742172);
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
INSERT INTO `users` VALUES (1,'salaheddine es-sbai','salaheddine@developer.ma',NULL,'$2y$12$n4VLAHcy1KXoe1I6o/vhX.r7slnwt1NUp0.1Z3/PUXRxqC7M8pevK',NULL,NULL,NULL,NULL,NULL,NULL,'2024-05-15 01:32:15','2024-05-15 02:58:29');
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

-- Dump completed on 2024-05-15  3:15:19
