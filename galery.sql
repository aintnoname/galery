-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 06, 2018 at 08:35 PM
-- Server version: 10.1.28-MariaDB
-- PHP Version: 5.6.32

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `galery`
--

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `id` int(11) NOT NULL,
  `photo_id` int(11) NOT NULL,
  `author` varchar(100) NOT NULL,
  `comment` text NOT NULL,
  `created` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`id`, `photo_id`, `author`, `comment`, `created`) VALUES
(16, 22, 'Marijana', 'Bas lepa slika', '2018-06-22 18:55:34'),
(17, 23, 'Marijana', 'Lepo cvece', '2018-06-22 18:55:48'),
(18, 25, 'Marijana', 'Sedi zaba sama na listu lokvanja', '2018-06-22 18:56:01');

-- --------------------------------------------------------

--
-- Table structure for table `photos`
--

CREATE TABLE `photos` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `title` varchar(100) NOT NULL,
  `description` text NOT NULL,
  `filename` varchar(100) NOT NULL,
  `type` varchar(50) NOT NULL,
  `size` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `photos`
--

INSERT INTO `photos` (`id`, `user_id`, `title`, `description`, `filename`, `type`, `size`) VALUES
(22, 5, 'Pingvini', 'Pingvini se igraju na suncu', 'Penguins.jpg', 'image/jpeg', 777835),
(23, 5, 'Lale', 'Zute lale', 'Tulips.jpg', 'image/jpeg', 620888),
(25, 5, 'Nova slika', 'Nova slika', 'Hydrangeas.jpg', 'image/jpeg', 595284);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `first_name` varchar(100) NOT NULL,
  `last_name` varchar(100) NOT NULL,
  `city` varchar(100) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(100) NOT NULL,
  `salt` varchar(255) NOT NULL,
  `joined` datetime NOT NULL,
  `user_image` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `first_name`, `last_name`, `city`, `email`, `password`, `salt`, `joined`, `user_image`) VALUES
(4, 'boki', 'Boris', 'Stekovic', 'Beograd', 'boki@gmail.com', '8b62d71b7035e1648c0fc6230c0b826115bd3e7c28799579c625cb11fb48c6e6', 'Ô®”;±\Z…K$¿ÅÈíl+:ëns‰5„œò^)©…ñt%', '2018-05-31 14:50:27', ''),
(5, 'dule', 'Dusan', 'Nikolic', 'Belgrade', 'dule@gmail.com', '11c36005e63e2092b6f7a7227ccd34ede69ee1a2f6bfa79b408874d66b3fa1c0', '¾©ØQ~è@,n~‚yÏ½\nLÃ˜‹\0*ãe,à', '2018-06-01 14:17:30', ''),
(6, 'maja', 'Marijana', 'Nikolic', 'Beograd', 'maja@gmail.com', '18d54da1765636b8760d90b5b80adbbc3ff27be172507ef030652b5c110bc34f', '÷·*YÁÉÈ*û È×Çô—++ÿ†ÅÝ4ŒÌoK', '2018-06-20 20:48:21', ''),
(7, 'drago', 'Dragan', 'Petrovic', 'Pozarevac', 'drago@gmail.com', '88905f1f9125f84498ed3d6127af9ef17cefc2ec57665a61295b669afe829597', 'á‚®døŠF„¾ˆ0UA­:Wzík¼à·U•™Qr\"', '2018-06-25 19:18:30', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `photos`
--
ALTER TABLE `photos`
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
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `photos`
--
ALTER TABLE `photos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
