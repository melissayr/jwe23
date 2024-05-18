-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Erstellungszeit: 18. Mai 2024 um 10:45
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
-- Datenbank: `getajob`
--

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `benutzer`
--

CREATE TABLE `benutzer` (
  `id` int(11) NOT NULL,
  `benutzername` varchar(255) NOT NULL,
  `passwort` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Daten für Tabelle `benutzer`
--

INSERT INTO `benutzer` (`id`, `benutzername`, `passwort`) VALUES
(1, 'reim.melissa.y@gmail.com', '$2y$10$jMQpTF87jVmEYMo1nsDFb.2RiYwwaZV/jo8Fu73yyTS9z9j8l45cu');

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `jobs`
--

CREATE TABLE `jobs` (
  `id` int(10) UNSIGNED NOT NULL,
  `jobs` varchar(255) NOT NULL,
  `titel` varchar(50) NOT NULL,
  `kategorie_id` int(10) UNSIGNED NOT NULL,
  `qualifikationen` varchar(255) NOT NULL,
  `dienstort` varchar(50) NOT NULL,
  `stundenausmaß` int(50) NOT NULL,
  `mindestgehalt_euro` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Daten für Tabelle `jobs`
--

INSERT INTO `jobs` (`id`, `jobs`, `titel`, `kategorie_id`, `qualifikationen`, `dienstort`, `stundenausmaß`, `mindestgehalt_euro`) VALUES
(1, 'Web Programmierung, Web Design, ', 'Web-Entwickler/in', 4, '', '', 0, 0),
(2, 'Kinderpädagogik, Kindererziehung', 'Erzieher/in', 3, '', '', 0, 0),
(3, 'Inneneinrichtung, Innendesign, Kunst', 'Innenarchitekt', 1, '', '', 0, 0),
(5, 'Augen untersuchen', 'Augenarzt', 5, '', '', 0, 0),
(16, 'Bilanzierung, Buchhaltung', 'Buchhalter/in', 2, '', '', 0, 0),
(18, 'Administration, Planung', 'IT Systemadministrator/in', 4, '', '', 0, 0),
(19, 'Entwickeln, Programmieren', 'Softwareentwickler/in', 4, '', '', 0, 0),
(20, 'Heilung Therapie', 'Humanenergetik', 5, '', '', 0, 0);

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `kategorien`
--

CREATE TABLE `kategorien` (
  `id` int(10) UNSIGNED NOT NULL,
  `kategorien` varchar(255) NOT NULL,
  `sonstige` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Daten für Tabelle `kategorien`
--

INSERT INTO `kategorien` (`id`, `kategorien`, `sonstige`) VALUES
(1, 'Bau, Architektur, Vermessung', ''),
(2, 'Dienstleistung', ''),
(3, 'Soziales, Pädagogik', ''),
(4, 'IT, Computer', ''),
(5, 'Gesundheit', '');

--
-- Indizes der exportierten Tabellen
--

--
-- Indizes für die Tabelle `benutzer`
--
ALTER TABLE `benutzer`
  ADD PRIMARY KEY (`id`);

--
-- Indizes für die Tabelle `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`id`) USING BTREE;

--
-- Indizes für die Tabelle `kategorien`
--
ALTER TABLE `kategorien`
  ADD PRIMARY KEY (`id`) USING BTREE;

--
-- AUTO_INCREMENT für exportierte Tabellen
--

--
-- AUTO_INCREMENT für Tabelle `benutzer`
--
ALTER TABLE `benutzer`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT für Tabelle `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT für Tabelle `kategorien`
--
ALTER TABLE `kategorien`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
