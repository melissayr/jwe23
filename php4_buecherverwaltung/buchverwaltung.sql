-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Erstellungszeit: 28. Aug 2024 um 12:17
-- Server-Version: 10.4.32-MariaDB
-- PHP-Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Datenbank: `buchverwaltung`
--

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `buecher`
--

CREATE TABLE `buecher` (
  `id` int(11) NOT NULL,
  `titel` varchar(255) NOT NULL,
  `autor` varchar(255) NOT NULL,
  `genre` varchar(255) NOT NULL,
  `isbn` varchar(13) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Daten für Tabelle `buecher`
--

INSERT INTO `buecher` (`id`, `titel`, `autor`, `genre`, `isbn`) VALUES
(1, 'Der Vorleser', 'Bernhard Schlink', 'Roman', '9783257231110'),
(2, 'Harry Potter und der Stein der Weisen', 'J.K. Rowling', 'Fantasy', '9783551354013'),
(3, 'Moby Dick', 'Herman Melville', 'Abenteuer', '9780142437247'),
(4, '1984', 'George Orwell', 'Dystopie', '9780451524935'),
(5, 'Harry Potter Teil 2', 'J.K. Rowling', 'Fantasy', ' 978355135422');

--
-- Indizes der exportierten Tabellen
--

--
-- Indizes für die Tabelle `buecher`
--
ALTER TABLE `buecher`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT für exportierte Tabellen
--

--
-- AUTO_INCREMENT für Tabelle `buecher`
--
ALTER TABLE `buecher`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
