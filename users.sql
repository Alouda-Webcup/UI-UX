-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: May 17, 2025 at 10:54 PM
-- Server version: 8.0.31
-- PHP Version: 8.0.26

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
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id_users` int NOT NULL AUTO_INCREMENT,
  `user_name` varchar(50) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci NOT NULL,
  `user_email` varchar(50) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci NOT NULL,
  `user_password` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci NOT NULL,
  PRIMARY KEY (`id_users`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id_users`, `user_name`, `user_email`, `user_password`) VALUES
(6, 'Paul', 'pol@alouda.com', '$2y$10$7RJs0cNMRglzfp89MbIce.1F7Na4btAZ0RS0lPwhDEQK6qt5cqqV6'),
(7, 'Pil', 'pil@alouda.com', '$2y$10$lOnNE8Dul21Lu.S9i6mFPeh.n8.mfmAbT2eiV7juFcN02H2tMmsb.'),
(8, 'Luna', 'lun@alouda.com', '$2y$10$d6sF/e/dfZUTP8Y8r2hYFOeAjpj0s5mZgBlOPHaC7vaqvKE/oPPte'),
(9, 'mona', 'mona@alouda.com', '$2y$10$ZGrAYkbRqdYxQdVS7IgeOuub4AHM1Njy27oqRQOoO3V4HbVj5z2k2'),
(10, 'Dean', 'din@alouda.com', '$2y$10$QM2U.nHWqp9C2r5rvC3OFulzhBcCl8FJG8tfLBRrixhGadV8Lsfa6'),
(11, 'Tom', 'tom@alouda.com', '$2y$10$yEh328443HHUgWg9ymlmbel/f2AoBFtZ6x9/1IS1xnz5y9xp215NG'),
(12, 'Tomi', 'tomi@alouda.com', '$2y$10$31oaG8HTh.cmEJ94L8U.3.YDPHYwcYVsy.N4M7X7fGdnwAUthLmp6');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
