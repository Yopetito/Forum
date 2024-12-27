-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               8.0.40 - MySQL Community Server - GPL
-- Server OS:                    Win64
-- HeidiSQL Version:             12.1.0.6537
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


-- Dumping database structure for forum_yofer
CREATE DATABASE IF NOT EXISTS `forum_yofer` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci */ /*!80016 DEFAULT ENCRYPTION='N' */;
USE `forum_yofer`;

-- Dumping structure for table forum_yofer.category
CREATE TABLE IF NOT EXISTS `category` (
  `id_category` int NOT NULL AUTO_INCREMENT,
  `name` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL DEFAULT '0',
  PRIMARY KEY (`id_category`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Dumping data for table forum_yofer.category: ~5 rows (approximately)
REPLACE INTO `category` (`id_category`, `name`) VALUES
	(1, 'Cooking'),
	(2, 'Music'),
	(3, 'Gaming'),
	(4, 'Crypto'),
	(5, 'Politique');

-- Dumping structure for table forum_yofer.post
CREATE TABLE IF NOT EXISTS `post` (
  `id_post` int NOT NULL AUTO_INCREMENT,
  `message` text NOT NULL,
  `creationDate` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `topic_id` int NOT NULL,
  `user_id` int NOT NULL,
  PRIMARY KEY (`id_post`),
  KEY `topic_id` (`topic_id`),
  KEY `user_id` (`user_id`),
  CONSTRAINT `FK_post_topic` FOREIGN KEY (`topic_id`) REFERENCES `topic` (`id_topic`),
  CONSTRAINT `FK_post_user` FOREIGN KEY (`user_id`) REFERENCES `user` (`id_user`)
) ENGINE=InnoDB AUTO_INCREMENT=71 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Dumping data for table forum_yofer.post: ~35 rows (approximately)
REPLACE INTO `post` (`id_post`, `message`, `creationDate`, `topic_id`, `user_id`) VALUES
	(1, 'c\'est mieux de la viande', '2024-12-17 12:23:53', 1, 9),
	(2, 'nah cest mieux des fuits de mer', '2024-12-17 12:24:21', 1, 8),
	(3, 'oui ils font toujours des tours', '2024-12-17 12:24:53', 12, 9),
	(4, 'ils sont un peu vieux non?', '2024-12-17 12:25:09', 12, 8),
	(5, 'a bon? il jouai pas de la guitarre?', '2024-12-17 12:25:33', 13, 9),
	(6, 'nah! de la trompette je te dis !', '2024-12-17 12:25:51', 13, 8),
	(7, 'c\'est vraiment de la bombe la trompette quand meme.', '2024-12-19 00:23:35', 13, 9),
	(8, 'message de test post dans topic', '2024-12-19 10:34:53', 2, 9),
	(9, 'message de test post dans topic', '2024-12-19 10:35:14', 3, 9),
	(10, 'message de test post dans topic', '2024-12-19 10:35:28', 4, 9),
	(11, 'message de test post dans topic', '2024-12-19 10:35:39', 5, 9),
	(12, 'message de test post dans topic', '2024-12-19 10:35:51', 6, 9),
	(13, 'message de test post dans topic', '2024-12-19 10:36:00', 7, 9),
	(14, 'message de test post dans topic', '2024-12-19 10:36:14', 8, 9),
	(15, 'message de test post dans topic', '2024-12-19 10:36:26', 9, 9),
	(16, 'message de test post dans topic', '2024-12-19 10:36:31', 10, 9),
	(17, 'message de test post dans topic', '2024-12-19 10:36:44', 11, 9),
	(18, 'message de test post dans topic', '2024-12-19 10:36:55', 14, 9),
	(19, 'message de test post dans topic', '2024-12-19 10:37:10', 15, 9),
	(22, 'message post de test. ajoutons un message dans le topic id 13, trump joue de la guitarre', '2024-12-19 15:09:33', 13, 9),
	(23, 'post, salut laury !!!! ', '2024-12-19 15:11:10', 13, 9),
	(24, 'c&#039;est n&#039;importe quoi quand meme ces crypto!', '2024-12-19 15:12:54', 5, 9),
	(25, 'arthur ca va?\r\n', '2024-12-20 19:31:20', 12, 9),
	(59, 'premier post !\r\n', '2024-12-27 17:57:22', 28, 9),
	(60, 'second post', '2024-12-27 18:01:19', 28, 9),
	(61, 'post test', '2024-12-27 18:01:37', 15, 9),
	(62, 'wow\r\n', '2024-12-27 18:02:02', 28, 8),
	(63, 'je peux v&eacute;rouiller ce topic. ONLY ME', '2024-12-27 18:02:28', 29, 8),
	(64, 'test', '2024-12-27 18:02:55', 28, 10),
	(65, 'ghjghj', '2024-12-27 19:46:43', 13, 9),
	(66, 'fgfgh', '2024-12-27 19:46:45', 13, 9),
	(67, 'df', '2024-12-27 19:47:54', 28, 9),
	(68, 'dfg', '2024-12-27 19:47:56', 28, 9),
	(69, 'dfgdrtr', '2024-12-27 19:47:58', 28, 9),
	(70, 'fvbncvn', '2024-12-27 19:48:01', 28, 9);

-- Dumping structure for table forum_yofer.topic
CREATE TABLE IF NOT EXISTS `topic` (
  `id_topic` int NOT NULL AUTO_INCREMENT,
  `title` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `creationDate` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `locked` tinyint NOT NULL DEFAULT '0',
  `category_id` int NOT NULL,
  `user_id` int NOT NULL,
  PRIMARY KEY (`id_topic`),
  KEY `category_id` (`category_id`),
  KEY `user_id` (`user_id`),
  CONSTRAINT `FK_topic_category` FOREIGN KEY (`category_id`) REFERENCES `category` (`id_category`),
  CONSTRAINT `FK_topic_user` FOREIGN KEY (`user_id`) REFERENCES `user` (`id_user`)
) ENGINE=InnoDB AUTO_INCREMENT=30 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Dumping data for table forum_yofer.topic: ~17 rows (approximately)
REPLACE INTO `topic` (`id_topic`, `title`, `creationDate`, `locked`, `category_id`, `user_id`) VALUES
	(1, 'Bouché a la reine, viande ou fruits de mer ?', '2024-12-17 12:11:01', 0, 1, 9),
	(2, 'Pates cuites ou aldente ', '2024-12-17 12:11:20', 0, 1, 9),
	(3, 'le chien ca ce mange pas !', '2024-12-17 12:11:48', 0, 1, 9),
	(4, 'NFT ? ca augmente !', '2024-12-17 12:12:09', 0, 4, 9),
	(5, 'Qu\'en pensez vous du bitcoin ', '2024-12-17 12:12:22', 0, 4, 9),
	(6, 'Ethereum ca pump ! ', '2024-12-17 12:12:46', 0, 4, 9),
	(7, 'POE 2, c\'est magnifique ! ', '2024-12-17 12:13:15', 0, 3, 9),
	(8, 'LOL c\'est le meilleur MOBA', '2024-12-17 12:13:34', 0, 3, 9),
	(9, 'Final Fantasy c\'est pour les roleplayers!', '2024-12-17 12:13:53', 0, 3, 9),
	(10, 'Linkin Park is back !', '2024-12-17 12:15:32', 0, 2, 9),
	(11, 'Emily Armstrong chante trop bien ! ', '2024-12-17 12:15:54', 0, 2, 9),
	(12, 'Si non, RHCP font encore des tours! ', '2024-12-17 12:19:42', 0, 2, 9),
	(13, 'Trump joue de la trompette !', '2024-12-17 12:20:35', 0, 5, 9),
	(14, 'Macron joue de la basse', '2024-12-17 12:21:05', 0, 5, 9),
	(15, 'Putin joue de la batterie ', '2024-12-17 12:21:28', 0, 5, 9),
	(28, 'TOpic a remplir ! ', '2024-12-27 17:57:22', 0, 5, 9),
	(29, 'topic a v&eacute;rouiller par yofer', '2024-12-27 18:02:28', 1, 5, 8);

-- Dumping structure for table forum_yofer.user
CREATE TABLE IF NOT EXISTS `user` (
  `id_user` int NOT NULL AUTO_INCREMENT,
  `email` varchar(50) NOT NULL,
  `nickname` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT 'ROLE_USER',
  `registrationDate` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id_user`),
  UNIQUE KEY `email` (`email`),
  UNIQUE KEY `nickname` (`nickname`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Dumping data for table forum_yofer.user: ~3 rows (approximately)
REPLACE INTO `user` (`id_user`, `email`, `nickname`, `password`, `role`, `registrationDate`) VALUES
	(7, 'test2@exemple.com', 'test2', '$2y$10$M4tsbHufmJA4iB.W4VG3deaeWvnxbNLhJ11ElQXhcKnZO9BzRHG7m', 'ROLE_USER', '2024-12-23 11:01:40'),
	(8, 'yofer@exemple.com', 'yofer', '$2y$10$pPf775g6maUdyQ3kgEzMJuuv.x5vq3/0e1h3wO14DJjcfKNZcYmke', 'ROLE_USER', '2024-12-23 13:24:34'),
	(9, 'admin@exemple.com', 'admin', '$2y$10$cJu2nvIZU.xXVvNySvElIO6yyInVvPED2aNSf4.ALkXOz.Wekrv7e', 'ROLE_ADMIN', '2024-12-23 13:41:24'),
	(10, 'sabby@exemple.com', 'sabby', '$2y$10$UgdrpDLCPza9MYx0QZraVuC1WrnNPoDlIm4qFSADuisxfsdQBkAMK', 'ROLE_USER', '2024-12-27 16:29:20'),
	(11, 'pepito@exemple.com', 'pepito', '$2y$10$RF3z2pzuJFqfQiZG6ijpGOxXbEq7VHnXDJYQjZEUDOQky67tTALki', 'ROLE_USER', '2024-12-27 16:29:32'),
	(12, 'regex@exemple.com', 'regex', '$2y$10$Z0K8tqUyD8J.Rc1agRe/HucyLJDVhkjg6FkPwNMAoM6NeHnGcGV92', 'ROLE_USER', '2024-12-27 18:12:38');

/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
