-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Erstellungszeit: 18. Nov 2022 um 14:20
-- Server-Version: 10.4.25-MariaDB
-- PHP-Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Datenbank: `be17_cr5_animal_adoption_felix_budin`
--
CREATE DATABASE IF NOT EXISTS `be17_cr5_animal_adoption_felix_budin` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `be17_cr5_animal_adoption_felix_budin`;

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `adoption`
--

CREATE TABLE `adoption` (
  `id` int(11) NOT NULL,
  `fk_pet_id` int(11) NOT NULL,
  `fk_user_id` int(11) NOT NULL,
  `adopt_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Daten für Tabelle `adoption`
--

INSERT INTO `adoption` (`id`, `fk_pet_id`, `fk_user_id`, `adopt_date`) VALUES
(2, 2, 2, '2022-11-18'),
(3, 2, 2, '2022-11-18'),
(4, 1, 2, '2022-11-18'),
(5, 5, 2, '2022-11-18'),
(6, 5, 2, '2022-11-18'),
(7, 5, 2, '2022-11-18'),
(8, 5, 2, '2022-11-18');

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `animals`
--

CREATE TABLE `animals` (
  `id` int(11) NOT NULL,
  `name` varchar(30) NOT NULL,
  `picture` varchar(255) DEFAULT NULL,
  `breed` varchar(30) NOT NULL,
  `age` int(11) NOT NULL,
  `type` varchar(30) NOT NULL,
  `description` varchar(30) NOT NULL,
  `character` varchar(30) NOT NULL,
  `location` varchar(30) NOT NULL,
  `status` enum('available','adopted') DEFAULT 'available'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Daten für Tabelle `animals`
--

INSERT INTO `animals` (`id`, `name`, `picture`, `breed`, `age`, `type`, `description`, `character`, `location`, `status`) VALUES
(1, 'Alpha', 'alpha.jpg', 'Abyssinian Cat', 5, 'M', 'brown', 'Always up for cuddles', 'White Street 2', 'available'),
(2, 'Beta', 'beta.jpg', 'American Bobtail', 2, 'M', 'brown', 'Loves snack time', 'Black Street 3.', 'adopted'),
(3, 'Ceasar', 'ceasar.jpg', 'American Curl', 9, 'M', 'black and white', 'Always up for cuddles', 'Orange Street 4.', 'available'),
(4, 'Domingo', 'domingo.jpg', 'American Shorthair', 6, 'M', 'black and white', 'Loves snack time', 'Violet Street 5', 'available'),
(5, 'Emil', 'emil.jpg', 'American Wirehair', 9, 'L', 'red', 'Always up for cuddles', 'Yellow Street 6.', 'available'),
(6, 'Fred', 'fred.jpg', 'Chow Chow', 1, 'M', 'orange', 'Loves snack time', 'Red Street 7', 'available'),
(7, 'Gustav', 'gustav.jpg', 'Afghan', 2, 'XL', 'black', 'Always up for cuddles', 'Purple Street 8.', 'available'),
(8, 'Heidi', 'heidi.jpg', 'Chinchilla', 3, 'XS', 'grey', 'Loves snack time', 'Blue Street 9', 'available'),
(9, 'Isa', 'isa.jpg', 'Alaskan Malamute', 8, 'XL', 'black and white', 'Always up for cuddles', 'Pink Street 10', 'available'),
(10, 'Joseph', 'joseph.jpg', 'American Hairless Terrier', 8, 'XL', 'beige', 'Loves snack time', 'Green Street 11', 'available'),
(11, 'Kurt', 'kurt.jpg', 'Grey Parrot', 3, 'S', 'grey', 'Always up for cuddles', 'Beige Street 12', 'available'),
(12, 'Lumpi', 'lumpi.jpg', 'Fox Terrier', 2, 'M', 'mixed', 'Loves snack time', 'Dark Street 13', 'available');

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `first_name` varchar(30) NOT NULL,
  `last_name` varchar(30) NOT NULL,
  `picture` varchar(255) DEFAULT NULL,
  `address` varchar(30) NOT NULL,
  `email` varchar(30) NOT NULL,
  `password` varchar(255) NOT NULL,
  `status` enum('user','adm') NOT NULL DEFAULT 'user',
  `date_of_birth` date DEFAULT NULL,
  `phone_number` int(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Daten für Tabelle `users`
--

INSERT INTO `users` (`id`, `first_name`, `last_name`, `picture`, `address`, `email`, `password`, `status`, `date_of_birth`, `phone_number`) VALUES
(1, 'admin', 'admin', 'avatar.png', '', 'admin@mail.com', '8d969eef6ecad3c29a3a629280e686cf0c3f5d5a86aff3ca12020c923adc6c92', 'adm', '2022-11-18', 0),
(2, 'user1', 'user', '6377565dbd970.png', 'teststreet', 'user@mail.com', '8d969eef6ecad3c29a3a629280e686cf0c3f5d5a86aff3ca12020c923adc6c92', 'user', '2022-11-18', 0);

--
-- Indizes der exportierten Tabellen
--

--
-- Indizes für die Tabelle `adoption`
--
ALTER TABLE `adoption`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_pet_id` (`fk_pet_id`),
  ADD KEY `fk_user_id` (`fk_user_id`);

--
-- Indizes für die Tabelle `animals`
--
ALTER TABLE `animals`
  ADD PRIMARY KEY (`id`);

--
-- Indizes für die Tabelle `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT für exportierte Tabellen
--

--
-- AUTO_INCREMENT für Tabelle `adoption`
--
ALTER TABLE `adoption`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT für Tabelle `animals`
--
ALTER TABLE `animals`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT für Tabelle `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
