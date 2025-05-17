-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:8889
-- Generation Time: May 17, 2025 at 10:21 PM
-- Server version: 8.0.35
-- PHP Version: 8.2.20

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `alouda_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `page`
--

CREATE TABLE `page` (
  `id_page` int NOT NULL,
  `pg_tone` varchar(50) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci DEFAULT NULL,
  `pg_message` text CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci,
  `pg_object` varchar(50) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci DEFAULT NULL,
  `pg_file` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci DEFAULT NULL,
  `pg_gif` text CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci,
  `pg_sounds` varchar(50) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci DEFAULT NULL,
  `pg_creationdate` date DEFAULT NULL,
  `id_projects` int NOT NULL,
  `id_users` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;

--
-- Dumping data for table `page`
--

INSERT INTO `page` (`id_page`, `pg_tone`, `pg_message`, `pg_object`, `pg_file`, `pg_gif`, `pg_sounds`, `pg_creationdate`, `id_projects`, `id_users`) VALUES
(4, 'happy', 'Bienvenue sur la page de lancement de notre marque beauté K by Karen !', 'Présentation de K by Karen', 'k-by-karen.html', NULL, NULL, '2025-05-18', 1, 1),
(5, 'sad', 'Cette page regroupe les travaux de design UX réalisés pour 2025 : wireframes, prototypes...', 'Projet UI/UX 2025', 'uiux-2025.html', NULL, NULL, '2025-05-18', 2, 1),
(6, 'angry', 'Aperçu de la troisième page avec un contenu court pour démonstration.', 'Page Exemple 3', '#', NULL, NULL, '2025-05-18', 3, 1),
(7, 'happy', 'Bienvenue sur la page de lancement de notre marque beauté K by Karen !', 'Présentation de K by Karen', 'k-by-karen.html', NULL, NULL, '2025-05-18', 1, 1),
(8, 'sad', 'Cette page regroupe les travaux de design UX réalisés pour 2025 : wireframes, prototypes...', 'Projet UI/UX 2025', 'uiux-2025.html', NULL, NULL, '2025-05-18', 2, 1),
(9, 'angry', 'Aperçu de la troisième page avec un contenu court pour démonstration.', 'Page Exemple 3', '#', NULL, NULL, '2025-05-18', 3, 1);

-- --------------------------------------------------------

--
-- Table structure for table `projects`
--

CREATE TABLE `projects` (
  `id_projects` int NOT NULL,
  `pj_name` varchar(50) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci NOT NULL,
  `id_users` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;

--
-- Dumping data for table `projects`
--

INSERT INTO `projects` (`id_projects`, `pj_name`, `id_users`) VALUES
(1, 'Site vitrine', 1),
(2, 'Application mobile', 1),
(3, 'Blog personnel', 2);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id_users` int NOT NULL,
  `user_name` varchar(50) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci NOT NULL,
  `user_email` varchar(50) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci NOT NULL,
  `user_password` varchar(50) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id_users`, `user_name`, `user_email`, `user_password`) VALUES
(1, 'Karen Andriantasy', 'kar3nmitia@gmail.com', 'motdepassehaché'),
(2, 'Jean Dupont', 'jean.dupont@example.com', 'motdepassehaché');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `page`
--
ALTER TABLE `page`
  ADD PRIMARY KEY (`id_page`),
  ADD KEY `id_projects` (`id_projects`),
  ADD KEY `id_users` (`id_users`);

--
-- Indexes for table `projects`
--
ALTER TABLE `projects`
  ADD PRIMARY KEY (`id_projects`),
  ADD KEY `id_users` (`id_users`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id_users`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `page`
--
ALTER TABLE `page`
  MODIFY `id_page` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `projects`
--
ALTER TABLE `projects`
  MODIFY `id_projects` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id_users` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `page`
--
ALTER TABLE `page`
  ADD CONSTRAINT `page_ibfk_1` FOREIGN KEY (`id_projects`) REFERENCES `projects` (`id_projects`),
  ADD CONSTRAINT `page_ibfk_2` FOREIGN KEY (`id_users`) REFERENCES `users` (`id_users`);

--
-- Constraints for table `projects`
--
ALTER TABLE `projects`
  ADD CONSTRAINT `projects_ibfk_1` FOREIGN KEY (`id_users`) REFERENCES `users` (`id_users`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
