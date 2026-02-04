-- MySQL dump 10.13  Distrib 8.0.44, for Win64 (x86_64)
--
-- Host: 127.0.0.1    Database: sudohired_db
-- ------------------------------------------------------
-- Server version	8.0.44

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
-- Table structure for table `applications`
--

DROP TABLE IF EXISTS `applications`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `applications` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `job_listing_id` bigint unsigned NOT NULL,
  `user_id` bigint unsigned NOT NULL,
  `resume_path` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `applications_job_listing_id_foreign` (`job_listing_id`),
  KEY `applications_user_id_foreign` (`user_id`),
  CONSTRAINT `applications_job_listing_id_foreign` FOREIGN KEY (`job_listing_id`) REFERENCES `job_listings` (`id`) ON DELETE CASCADE,
  CONSTRAINT `applications_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `applications`
--

LOCK TABLES `applications` WRITE;
/*!40000 ALTER TABLE `applications` DISABLE KEYS */;
INSERT INTO `applications` VALUES (4,5,2,'cvs/FbfV8Tqp5HYDoo8SWWcheRlbWKXkge9UcxAWTo1M.pdf','2026-02-03 21:37:29','2026-02-03 21:37:29');
/*!40000 ALTER TABLE `applications` ENABLE KEYS */;
UNLOCK TABLES;

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
INSERT INTO `cache` VALUES ('laravel-cache-7a43e92daf54cdaa1d312a58e332823d','i:1;',1770233983),('laravel-cache-7a43e92daf54cdaa1d312a58e332823d:timer','i:1770233983;',1770233983),('laravel-cache-80993dd10733e658c7e5887de52b9e66','i:1;',1770232123),('laravel-cache-80993dd10733e658c7e5887de52b9e66:timer','i:1770232123;',1770232123),('laravel-cache-a4e735c13d8b2c893edd1b2974b15a5d','i:1;',1769979139),('laravel-cache-a4e735c13d8b2c893edd1b2974b15a5d:timer','i:1769979139;',1769979139),('laravel-cache-aaa@hot|127.0.0.1','i:1;',1769711890),('laravel-cache-aaa@hot|127.0.0.1:timer','i:1769711890;',1769711890),('laravel-cache-assa@hotmail.com|127.0.0.1','i:1;',1769979139),('laravel-cache-assa@hotmail.com|127.0.0.1:timer','i:1769979139;',1769979139),('laravel-cache-c525a5357e97fef8d3db25841c86da1a','i:1;',1770235827),('laravel-cache-c525a5357e97fef8d3db25841c86da1a:timer','i:1770235827;',1770235827),('laravel-cache-c640b9759b94fb4d40a1928ba82607da','i:1;',1769711890),('laravel-cache-c640b9759b94fb4d40a1928ba82607da:timer','i:1769711890;',1769711890),('laravel-cache-e508636caa4232e637c27f0ee0ccc7dd','i:1;',1769979290),('laravel-cache-e508636caa4232e637c27f0ee0ccc7dd:timer','i:1769979290;',1769979290),('laravel-cache-thais__lira@hotmail.com|127.0.0.1','i:1;',1769979290),('laravel-cache-thais__lira@hotmail.com|127.0.0.1:timer','i:1769979290;',1769979290);
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
-- Table structure for table `companies`
--

DROP TABLE IF EXISTS `companies`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `companies` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `logo` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` text COLLATE utf8mb4_unicode_ci,
  `city` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `companies`
--

LOCK TABLES `companies` WRITE;
/*!40000 ALTER TABLE `companies` DISABLE KEYS */;
INSERT INTO `companies` VALUES (1,'Incubadora de Unicórnios S.A.','companyPhotos/LfGXTaZOZYKR8RB8tPJsFYnYMxG4pl2h5HQGA4vT.png','Somos “uma família” no sentido de: muita proximidade, muita mensagem fora de hora e celebração quando o deploy não cai. Crescimento rápido (de responsabilidades também).','Porto','2026-01-20 15:44:07','2026-02-03 21:31:53'),(2,'Global Tech & Coffee','logos/coffe.png','Transformamos café em features. Em semanas boas, sai código limpo; em semanas normais, sai “hotfix com carinho” e um post-it dizendo “depois refatoramos”.','Porto','2026-01-20 15:44:07','2026-01-20 15:44:07'),(3,'Algoritmo Tirânico Ltd','logos/algor.png','Amamos dados e automação. O algoritmo decide bastante coisa, mas prometemos que ainda existe alguém para aprovar (quando a agenda deixa).','Lisboa','2026-01-20 15:44:07','2026-01-20 15:44:07'),(4,'Exploração Digital 360','logos/inova.png','Inovação é prioridade — desde que não mexa no que está em produção. Modernizamos aos poucos: primeiro o discurso, depois o backlog, e um dia… o sistema.','Leiria','2026-01-20 15:44:07','2026-01-20 15:44:07'),(5,'Cérebro na Nuvem','logos/braincloud.png','Startup em modo “quase pronto”: ainda estamos a descobrir o produto, mas já sabemos o que queremos numa vaga: alguém que faça backend, frontend e “mais uma coisinha”.','Aveiro','2026-01-20 15:44:07','2026-02-03 21:30:33');
/*!40000 ALTER TABLE `companies` ENABLE KEYS */;
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
-- Table structure for table `job_listings`
--

DROP TABLE IF EXISTS `job_listings`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `job_listings` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `salary` decimal(10,2) NOT NULL,
  `work_type` enum('remote','hybrid','onsite') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'onsite',
  `requirements` text COLLATE utf8mb4_unicode_ci,
  `release_date` date DEFAULT NULL,
  `inscription_end_date` date NOT NULL,
  `company_id` bigint unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `job_listings_company_id_foreign` (`company_id`),
  CONSTRAINT `job_listings_company_id_foreign` FOREIGN KEY (`company_id`) REFERENCES `companies` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=24 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `job_listings`
--

LOCK TABLES `job_listings` WRITE;
/*!40000 ALTER TABLE `job_listings` DISABLE KEYS */;
INSERT INTO `job_listings` VALUES (1,'Desenvolvedor Júnior (Nível Deus)','Procuramos jovem com 25 anos de experiência em Rust (linguagem lançada em 2010).','https://images.emojiterra.com/google/noto-emoji/unicode-16.0/color/svg/1f531.svg',950.00,'onsite','Ter descoberto a cura para uma doença rara e possuir um Nobel de Física. Se souber fazer café, é um bónus. Saber lidar com Jira, Trello, Notion e Excel — porque o caos precisa de redundância.','2026-01-20','2026-02-19',1,'2026-01-20 15:44:51','2026-01-20 15:44:51'),(2,'Estagiário de Backend Seniorizado','Precisa dominar o ecossistema Javascript inteiro (incluindo as bibliotecas que serão lançadas na próxima semana). ','https://images.emojiterra.com/google/noto-emoji/unicode-16.0/color/svg/1f9d1-1f9b3.svg',700.00,'hybrid','Domínio total de PHP, Java, C++, Python, Fortran e montagem de reatores nucleares. Deve ser capaz de escrever código com os pés enquanto resolve um Cubo Mágico com os olhos vendados.','2026-01-20','2026-02-19',2,'2026-01-20 15:44:51','2026-01-20 15:44:51'),(3,'Fullstack Jr. Ninja das Sombras','Procuramos alguém que consiga dominar o Jutsu Multiclones das Sombras para dar conta do backlog sozinho, enquanto vive em Genjutsu achando que o deploy de sexta-feira vai correr bem.','https://images.emojiterra.com/google/noto-emoji/unicode-16.0/color/svg/1f977.svg',1100.00,'remote','Provar que não precisa de dormir e que consegue refatorar o kernel do Linux em 15 minutos.Capacidade de aceitar \"feedback construtivo\" de quem não sabe a diferença entre Java e JavaScript.','2026-01-20','2026-02-19',3,'2026-01-20 15:44:51','2026-01-20 15:44:51'),(4,'Suporte Lvl 1 (Mestre das Galáxias)','Atendimento ao cliente e manutenção de naves espaciais.','https://images.emojiterra.com/google/noto-emoji/unicode-16.0/color/svg/1f30c.svg',850.00,'onsite','Fluência em 12 idiomas (incluindo Klingon) e ter sido o arquiteto original da Grande Muralha da China.Mestrado em artes místicas para adivinhar o que o cliente quis dizer com \"quero algo mais clean e intuitivo\".','2026-01-20','2026-02-19',4,'2026-01-20 15:44:51','2026-01-20 15:44:51'),(5,'Analista de Dados Vidente','Não usamos Excel. Queremos alguém que preveja o mercado financeiro usando apenas a borra do café. ','https://images.emojiterra.com/google/noto-emoji/unicode-16.0/color/svg/1f52e.svg',1200.00,'hybrid','Ter previsto a queda do Império Romano e possuir um doutorado em Telepatia Aplicada.','2026-01-20','2026-02-19',5,'2026-01-20 15:44:51','2026-01-20 15:44:51'),(6,'QA Júnior (Oráculo de Bugs)','Procuramos QA capaz de encontrar bugs antes do código existir. ','https://images.emojiterra.com/google/noto-emoji/unicode-16.0/color/svg/1f52e.svg',900.00,'hybrid','Ter feito regressão em software de missão lunar e identificar falhas olhando apenas para o logotipo. Experiência com “telepatia de stack trace” é valorizada.','2026-01-26','2026-02-25',1,'2026-01-26 18:19:59','2026-01-26 18:19:59'),(7,'DevOps Pleno (Domador de Nuvens)','Precisa automatizar deploys em 37 provedores de cloud simultaneamente, incluindo uma “nuvem” feita com Raspberry Pi e um modem de 2005.','https://images.emojiterra.com/google/noto-emoji/unicode-16.0/color/svg/1f32c.svg',1600.00,'remote','Garantir 99.9999% de uptime mesmo quando a internet cair.','2026-01-26','2026-02-25',2,'2026-01-26 18:19:59','2026-01-26 18:19:59'),(8,'Product Owner (Leitor de Mentes)','Responsável por descobrir requisitos que o cliente não sabe que tem e documentar tudo em 3 post-its.','https://images.emojiterra.com/google/noto-emoji/unicode-16.0/color/svg/1f9e0.svg',1400.00,'onsite','Antecipar mudanças de escopo 2 sprints antes do gerente pensar nelas. Certificação em “diplomacia com stakeholders” é obrigatória.','2026-01-26','2026-02-25',3,'2026-01-26 18:19:59','2026-01-26 18:19:59'),(9,'Frontend Jr. (Mestre do CSS Inexplicável)','Transformar qualquer layout em pixel-perfect, inclusive screenshots tremidos tirados do WhatsApp. ','https://images.emojiterra.com/google/noto-emoji/unicode-16.0/color/svg/269b.svg',1050.00,'remote','Centralizar div em ambiente hostil e fazer o Safari obedecer sem chorar.','2026-01-26','2026-02-25',4,'2026-01-26 18:19:59','2026-01-26 18:19:59'),(10,'Backend Laravel (Feiticeiro do Eloquent)','Criar APIs tão rápidas que respondem antes do request chegar. ','https://images.emojiterra.com/google/noto-emoji/unicode-16.0/color/svg/1fa84.svg',1500.00,'hybrid','Otimizar queries que ainda não foram escritas e corrigir N+1 usando apenas intuição. Bónus: falar fluentemente “SQL antigo”.','2026-01-26','2026-02-25',5,'2026-01-26 18:19:59','2026-01-26 18:19:59'),(11,'Analista de Segurança (Caçador de Fantasmas Digitais)','Detectar ataques que não aconteceram e escrever relatórios que o board entende.','https://images.emojiterra.com/google/noto-emoji/unicode-16.0/color/svg/1f47b.svg',1800.00,'onsite','Derrubar uma botnet com um cabo Ethernet e um olhar de desaprovação. Bónus: saber conversar com firewall em tom calmo.','2026-01-26','2026-02-25',1,'2026-01-26 18:19:59','2026-01-26 18:19:59'),(12,'Suporte N2 (Exorcista de Impressoras)','Resolver incidentes críticos causados por “não sei o que aconteceu, só parou”.','https://images.emojiterra.com/google/noto-emoji/unicode-16.0/color/svg/1f5a8.svg',950.00,'onsite','Fazer impressoras voltarem a funcionar por persuasão, reiniciar servidores com elegância e explicar DNS para humanos sem trauma.','2026-01-26','2026-02-25',2,'2026-01-26 18:19:59','2026-01-26 18:19:59'),(13,'Mobile Dev (Domador de iOS e Android)','Manter 1 codebase que funciona em todos os devices, incluindo um Android de 2012 com tela rachada. ','https://images.emojiterra.com/google/noto-emoji/unicode-16.0/color/svg/1f4f1.svg',1700.00,'hybrid','Resolver crash “só acontece no telemóvel do CEO” em menos de 10 minutos.Conseguir compilar o projeto na primeira tentativa.','2026-01-26','2026-02-25',3,'2026-01-26 18:19:59','2026-01-26 18:19:59'),(14,'Data Engineer (Alquimista de Pipelines)','Construir pipelines que nunca quebram, mesmo quando a fonte de dados é um Excel com 14 abas e emojis.','https://images.emojiterra.com/google/noto-emoji/unicode-16.0/color/1024px/1f680.png',1900.00,'remote','Transformar caos em tabelas limpas e convencer o time a parar de enviar CSV por e-mail.Ter disponibilidade para reuniões que poderiam ser um email — e para emails que viram reuniões.','2026-01-26','2026-02-25',4,'2026-01-26 18:19:59','2026-01-26 18:19:59'),(15,'UI/UX Designer (Arquiteto do Inexistente)','Desenhar interfaces premium para requisitos que mudam diariamente. ','https://images.emojiterra.com/google/noto-emoji/unicode-16.0/color/1024px/1f680.png',1300.00,'hybrid','Criar 3 versões finais até o almoço, defender decisões com argumentos e sobreviver ao “faz igual ao Instagram, mas diferente”.','2026-01-26','2026-02-25',5,'2026-01-26 18:19:59','2026-01-26 18:19:59');
/*!40000 ALTER TABLE `job_listings` ENABLE KEYS */;
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
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `migrations`
--

LOCK TABLES `migrations` WRITE;
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;
INSERT INTO `migrations` VALUES (1,'0001_01_01_000000_create_users_table',1),(2,'0001_01_01_000001_create_cache_table',1),(3,'0001_01_01_000002_create_jobs_table',1),(4,'2026_01_20_112758_create_companies_table',1),(5,'2026_01_20_112925_create_job_listings_table',1),(6,'2026_01_20_122151_add_two_factor_columns_to_users_table',1),(7,'2026_01_20_140551_add_is_admin_to_users_table',1),(8,'2026_01_20_151242_add_details_to_job_listings_table',1),(9,'2026_01_22_141906_add_city_to_companies_table',2),(10,'2026_01_29_171336_add_description_to_job_listings_table',3),(11,'2026_02_01_184111_alter_job_listings_release_date_nullable',4),(12,'2026_02_01_211956_create_applications_table',4);
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
INSERT INTO `sessions` VALUES ('3Oweb2QKJIs8KylYqK7tFQJV3Yujq7vo0DzhHaF2',NULL,'127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/144.0.0.0 Safari/537.36','YTozOntzOjY6Il90b2tlbiI7czo0MDoiMHJIRG5iYU1mZDhUV1V4V2FLck1hZ25nbjg4UUNldVlNSG8wN1BpcCI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czo5OiJfcHJldmlvdXMiO2E6Mjp7czozOiJ1cmwiO3M6MjE6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMCI7czo1OiJyb3V0ZSI7czoxMjoibGF5b3V0cy5ob21lIjt9fQ==',1770235794);
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
  `is_admin` tinyint(1) NOT NULL DEFAULT '0',
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `two_factor_secret` text COLLATE utf8mb4_unicode_ci,
  `two_factor_recovery_codes` text COLLATE utf8mb4_unicode_ci,
  `two_factor_confirmed_at` timestamp NULL DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1,'admin','admin@gmail.com',1,NULL,'$2y$12$kBvR8KiIdnBECEUrNuVxQe0T3/oIKl4RwM6emL3IO8JrV3DY2LwOe',NULL,NULL,NULL,NULL,'2026-01-20 15:28:10','2026-01-20 15:28:10'),(2,'user','user@gmail.com',0,NULL,'$2y$12$2ufJ/vMNcWiSUu9DaceDtu7hyPalyvbCtUdAvOvSp/pZL7Fiwz9ZC',NULL,NULL,NULL,NULL,'2026-01-22 15:16:06','2026-01-22 15:16:06');
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

-- Dump completed on 2026-02-04 20:11:38
