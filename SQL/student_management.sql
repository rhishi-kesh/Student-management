-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Aug 04, 2023 at 03:49 PM
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
-- Database: `student_management`
--

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

DROP TABLE IF EXISTS `students`;
CREATE TABLE IF NOT EXISTS `students` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `roll` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `department` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `semester` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `shift` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `father_name` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `mother_name` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `address` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `number` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `file` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `students`
--

INSERT INTO `students` (`id`, `name`, `roll`, `department`, `semester`, `shift`, `father_name`, `mother_name`, `address`, `number`, `file`, `time`) VALUES
(5, 'syful islam', '184990', 'Computer', '7th', '1st', 'abul bashar', 'rohima begum', 'faridgong,chandpur', '01716726510', 'syful.jpg', '2023-03-06 19:20:34'),
(7, 'mujahidul islam', '481793', 'Computer', '7th', '1st', 'monir hossain patwary', 'rokeya begum', 'ramgoti,laksmipur', '01883599436', '308124285_997666101630666_1612012088266705072_n.jpg', '2023-03-06 19:20:34'),
(8, 'mayin uddin tuhin', '481775', 'Computer', '7th', '1st', 'abdul motin', 'toyaba begum', 'sadar,nokhali', '01850603597', '315714262_1316165759195189_6121457152354644947_n.jpg', '2023-03-06 19:20:34'),
(15, 'Reshi kash', '481765', 'Computer', '7th', '1st', 'Surja kumar', 'bijal rani', 'kabirhat,noakhali', '01629005872', 'rhishi-profile (2).jpeg', '2023-08-03 15:36:52'),
(16, 'abul hasan piyas', '481768', 'Computer', '7th', '1st', 'abul kalam', 'bibi rohima', 'companygonj,noakhali', '01871467330', 'nafiz.jpg', '2023-03-09 12:35:57'),
(17, 'Mirajul Islam Nafees', '184989', 'Computer', '7th', '1st', 'Md Aftabul  Islam Mojumder', 'Nasrin Sultana', 'Chauddagram, Cumilla', '01812459738', 'nafees.jpg', '2023-08-04 15:34:07');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(100) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `email` varchar(100) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `password` varchar(200) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `c_password` varchar(200) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `photo` varchar(100) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `email` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `c_password`, `photo`, `date`) VALUES
(16, 'Rhishi kesh', 'admin@gmail.com', '12345678', '12345678', 'rhishi-profile (2).jpeg', '2023-08-03 15:33:17');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
