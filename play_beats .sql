-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 18, 2023 at 08:45 AM
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
-- Database: `play_beats`
--

-- --------------------------------------------------------

--
-- Table structure for table `favorites`
--

CREATE TABLE `favorites` (
  `artist_name` varchar(100) NOT NULL,
  `album` varchar(100) DEFAULT NULL,
  `song_name` varchar(100) NOT NULL,
  `song_url` varchar(250) NOT NULL,
  `id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `favorites`
--

INSERT INTO `favorites` (`artist_name`, `album`, `song_name`, `song_url`, `id`) VALUES
(' Pritam,Arijit Singh, Amitabh B', 'Tu Jhoothi Main Maakkar ', 'O Bedardeya', 'https://youtu.be/EdftT8GMU1U', 36),
('Alan Walker', '', 'Faded', 'https://youtu.be/60ItHLz5WEA', 41),
('Arijit Singh', 'Citylights', 'Muskurane', 'https://youtu.be/HQ4Ox7mLqds', 42),
('Pritam|Arijit,Nikhita,Amitabh', 'Tu Jhoothi Main Maakkar ', 'Tere Pyaar Mein', 'https://youtu.be/IMg_UUJVpMo', 37);

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

CREATE TABLE `login` (
  `id` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `user_type` varchar(5) DEFAULT 'user'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `login`
--

INSERT INTO `login` (`id`, `username`, `email`, `password`, `user_type`) VALUES
(1, 'admin1', 'admin1@gmail.com', '21101298', 'admin'),
(8, 'david', 'david1234@gmail.com', '172522ec1028ab781d9dfd17eaca4427', 'user'),
(16, 'harry', 'harry.potter@gmail.com', '3b87c97d15e8eb11e51aa25e9a5770e9', 'user'),
(12, 'jass', 'jasmine@gmail.com', 'fbcb2b590a2bb5ddb797fec0906e6c32', 'user'),
(3, 'nuha', 'nuha@gmail.com', '81dc9bdb52d04dc20036dbd8313ed055', 'user'),
(18, 'nusrat', 'nusrat.jahan.nuha@gmail.com', '23908ccbb8ff74c2759400f4a35dab9b', 'user'),
(19, 'robin.tajwar', 'robin.tajwar@gmail.com', '8ee60a2e00c90d7e00d5069188dc115b', 'user'),
(14, 'tom', 'tom109@gmail.com', '34b7da764b21d298ef307d04d8152dc5', 'user'),
(15, 'tom_and_jerry', 'tomandjerry@gmail.com', '30035607ee5bb378c71ab434a6d05410', 'user'),
(13, 'warner_loves_music', 'warner56@gmail.com', '1660885848050e9ca9746ddd54e2de25', 'user');

-- --------------------------------------------------------

--
-- Table structure for table `songs`
--

CREATE TABLE `songs` (
  `artist_name` varchar(100) NOT NULL,
  `album` varchar(100) DEFAULT NULL,
  `song_name` varchar(100) NOT NULL,
  `song_url` varchar(250) NOT NULL,
  `channel_name` varchar(100) NOT NULL,
  `channel_url` varchar(250) NOT NULL,
  `id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `songs`
--

INSERT INTO `songs` (`artist_name`, `album`, `song_name`, `song_url`, `channel_name`, `channel_url`, `id`) VALUES
(' Pritam,Arijit Singh, Amitabh B', 'Tu Jhoothi Main Maakkar ', 'O Bedardeya', 'https://youtu.be/ByIZIKFmHOA', 'T-Series', 'https://www.youtube.com/@tseries/channels', 14),
('Alan Walker', '', 'Faded', 'https://youtu.be/60ItHLz5WEA', 'Alan Walker', 'www.youtube.com/channel/UCJrOtniJ0-NWz37R30urifQ', 18),
('Arijit Singh', 'Citylights', 'Muskurane', 'https://youtu.be/HQ4Ox7mLqds', 'SonyMusicIndiaVEVO', 'https://www.youtube.com/@sonymusicindiaVEVO', 19),
('Armaan Malik', '', 'next 2 me', 'https://youtu.be/NXgLhgIpU-Y', 'Armaan Malik', 'www.youtube.com/channel/UC1GBYS8_8cXRDM3yOYHeyWw', 17),
('Darshan Raval', 'Shershaah ', 'Kabhi Tumhe', 'https://youtu.be/ByIZIKFmHOA', 'Sony Music India', 'https://www.youtube.com/@SonyMusicIndia', 21),
('Post Malone, Swae Lee', '', 'Sunflower', 'https://youtu.be/ApXoWvfEYVU', 'Post Malone ', 'https://www.youtube.com/channel/UCeLHszkByNZtPKcaVXOCOQQ', 16),
('Pritam|Arijit,Nikhita,Amitabh', 'Tu Jhoothi Main Maakkar ', 'Tere Pyaar Mein', 'https://youtu.be/IMg_UUJVpMo', 'T-Series', 'https://www.youtube.com/@tseries/channels', 15),
('Tanishk,Armaan, Zahrah,Salma,Rashmi Virag', 'Gumraah', 'Ghar Nahi Jaana', 'https://youtu.be/LQjc7WFfDiU', 'T-Series', 'https://www.youtube.com/@tseries', 11);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `favorites`
--
ALTER TABLE `favorites`
  ADD PRIMARY KEY (`artist_name`,`song_name`),
  ADD KEY `id` (`id`);

--
-- Indexes for table `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`username`),
  ADD UNIQUE KEY `id` (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `songs`
--
ALTER TABLE `songs`
  ADD PRIMARY KEY (`artist_name`,`song_name`),
  ADD KEY `id` (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `favorites`
--
ALTER TABLE `favorites`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- AUTO_INCREMENT for table `login`
--
ALTER TABLE `login`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `songs`
--
ALTER TABLE `songs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
