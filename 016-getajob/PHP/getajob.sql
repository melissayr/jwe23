-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Erstellungszeit: 25. Mai 2024 um 09:27
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
  `titel` varchar(255) NOT NULL,
  `kategorie_id` int(10) UNSIGNED NOT NULL,
  `qualifikation` varchar(255) NOT NULL,
  `dienstort` varchar(50) NOT NULL,
  `stundenausmaß` varchar(255) NOT NULL,
  `mindestgehalt_euro` varchar(255) NOT NULL,
  `datum` datetime NOT NULL DEFAULT current_timestamp(),
  `aktiv` timestamp(6) NOT NULL DEFAULT current_timestamp(6) ON UPDATE current_timestamp(6)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Daten für Tabelle `jobs`
--

INSERT INTO `jobs` (`id`, `jobs`, `titel`, `kategorie_id`, `qualifikation`, `dienstort`, `stundenausmaß`, `mindestgehalt_euro`, `datum`, `aktiv`) VALUES
(1, 'Web Programmierung, Web Design, ', 'Web-Entwickler/in', 4, 'Abschluss', 'Salzburg', '25', '3000', '2024-05-18 11:50:39', '2024-05-24 21:35:08.773002'),
(2, 'Kinderpädagogik, Kindererziehung', 'Erzieher/in', 3, 'Studium ', 'Wien', '30', '3500', '2024-05-18 11:50:39', '2024-05-24 21:35:08.773002'),
(3, 'Inneneinrichtung, Innendesign, Kunst', 'Innenarchitekt', 1, 'Hochschulreife', 'Graz', '38', '4000', '2024-05-18 11:50:39', '2024-05-24 21:35:08.773002'),
(5, 'Augen untersuchen', 'Augenarzt', 3, 'Studium oder ähnliche Abschlüsse ', 'Graz', '30', '2500', '2024-05-18 11:50:39', '2024-05-25 07:03:25.359065'),
(19, 'Entwickeln, Programmieren', 'Softwareentwickler/in', 4, 'Studium oder ähnliche Abschlüsse ', 'Salzburg', '40', '4000', '2024-05-18 11:50:39', '2024-05-24 21:35:08.773002'),
(22, 'Allgemeine Bürotätigkeiten', 'Bürokaufmann/frau', 2, 'Mittlerer Bildungsabschluss', 'Salzburg', '30', '2500', '2024-05-24 13:28:53', '2024-05-24 21:35:08.773002'),
(27, 'Website gestalten', 'UI/UX Designer/in', 4, 'Studium oder ähnliche Abschlüsse ', 'Wien', '25', '2000', '2024-05-24 15:55:05', '2024-05-24 21:35:08.773002'),
(28, 'Administration, Planung', ' Ingenieur Bau', 1, 'Studium oder ähnliche Abschlüsse ', 'Salzburg', '35', '3000', '2024-05-24 19:34:24', '2024-05-24 21:35:08.773002');

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `kategorien`
--

CREATE TABLE `kategorien` (
  `id` int(10) UNSIGNED NOT NULL,
  `kategorien` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Daten für Tabelle `kategorien`
--

INSERT INTO `kategorien` (`id`, `kategorien`) VALUES
(1, 'Bau, Architektur,Vermessung'),
(2, 'Dienstleistung'),
(3, 'Soziales'),
(4, 'IT, Computer'),
(5, 'Gesundheit');

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
  ADD PRIMARY KEY (`id`) USING BTREE,
  ADD KEY `kategorie id` (`kategorie_id`);

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
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT für Tabelle `kategorien`
--
ALTER TABLE `kategorien`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Constraints der exportierten Tabellen
--

--
-- Constraints der Tabelle `jobs`
--
ALTER TABLE `jobs`
  ADD CONSTRAINT `kategorie id` FOREIGN KEY (`kategorie_id`) REFERENCES `kategorien` (`id`) ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
