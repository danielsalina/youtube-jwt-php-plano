-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 08, 2024 at 09:47 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `youtube`
--

-- --------------------------------------------------------

--
-- Table structure for table `productos`
--

CREATE TABLE `productos` (
  `id` int(11) NOT NULL,
  `nombre` varchar(255) NOT NULL,
  `descripcion` text DEFAULT NULL,
  `precio` decimal(10,2) NOT NULL,
  `creado_en` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `productos`
--

INSERT INTO `productos` (`id`, `nombre`, `descripcion`, `precio`, `creado_en`) VALUES
(3, 'Producto 3', 'Descripción del Producto 3', 8.99, '2024-08-24 14:58:00'),
(4, 'Producto 4', 'Descripción del Producto 4', 12.99, '2024-08-24 14:58:00'),
(5, 'Producto 5', 'Descripción del Producto 5', 5.99, '2024-08-24 14:58:00'),
(6, 'Producto 7', 'Descripción del Producto 7', 10.99, '2024-08-24 15:07:40'),
(7, 'Producto 8', 'Descripción del Producto 8', 15.99, '2024-08-24 15:07:40'),
(8, 'Producto 9', 'Descripción del Producto 9', 8.99, '2024-08-24 15:07:40'),
(9, 'Producto 10', 'Descripción del Producto 10', 12.99, '2024-08-24 15:07:40'),
(10, 'Producto 11', 'Descripción del Producto 11', 5.99, '2024-08-24 15:07:40'),
(11, 'Producto 12', 'Descripción del Producto 12', 10.99, '2024-08-24 15:07:40'),
(12, 'Producto', 'Descripción del Producto 12', 554.00, '2024-08-24 15:07:40'),
(13, 'Producto 13', 'Descripción del Producto 13', 554.00, '2024-08-24 15:07:40'),
(14, 'Producto 15', 'Descripción del Producto 15', 12.99, '2024-08-24 15:07:40'),
(15, 'Producto 16', 'Descripción del Producto 16', 5.99, '2024-08-24 15:07:40'),
(16, 'Producto 17', 'Descripción del Producto 17', 10.99, '2024-08-24 15:07:40'),
(17, 'Producto 18', 'Descripción del Producto 18', 15.99, '2024-08-24 15:07:40'),
(18, 'Producto 19', 'Descripción del Producto 19', 8.99, '2024-08-24 15:07:40'),
(19, 'Producto 20', 'Descripción del Producto 20', 12.99, '2024-08-24 15:07:40'),
(24, 'pepe', 'descripcion', 777.00, '2024-09-07 13:13:00');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`) VALUES
(10, 'Juan Pérez', 'juan@perez.com', '$2y$10$RAvdiMi.NwF3nwFnvuBygemxDPg1B.HbxGMORkndoWrszKqd.NfMa');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `productos`
--
ALTER TABLE `productos`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `productos`
--
ALTER TABLE `productos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
