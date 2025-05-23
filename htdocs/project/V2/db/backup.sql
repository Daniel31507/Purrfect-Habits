-- phpMyAdmin SQL Dump
-- version 5.2.2
-- https://www.phpmyadmin.net/
--
-- Host: mysql-db
-- Erstellungszeit: 23. Mai 2025 um 13:51
-- Server-Version: 9.2.0
-- PHP-Version: 8.2.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Datenbank: `purrDB`
--

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `habits`
--

CREATE TABLE `habits` (
  `ID` int NOT NULL,
  `name` varchar(100) NOT NULL,
  `type` varchar(100) NOT NULL,
  `description` varchar(500) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `icon` varchar(100) NOT NULL,
  `mainIcon_path` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Daten für Tabelle `habits`
--

INSERT INTO `habits` (`ID`, `name`, `type`, `description`, `icon`, `mainIcon_path`) VALUES
(1, 'Schlafmangel', 'gesundheit', 'Zu wenig Schlaf kann die kognitive Leistung und das Wohlbefinden beeinträchtigen.', '😴', '../img/icons/schlafmangel.png'),
(2, 'Bildschirmzeit', 'gesundheit', 'Zu viel Zeit vor Bildschirmen kann die Schlafqualität und Produktivität verringern.', '📱', '../img/icons/bildschirmzeit.png'),
(3, 'Ernährung', 'gesundheit', 'Eine unausgewogene Ernährung kann langfristig die Gesundheit beeinträchtigen.', '🥗', '../img/icons/ernährung.png'),
(4, 'Bewegungsmangel', 'gesundheit', 'Zu wenig körperliche Aktivität kann das Risiko für verschiedene Krankheiten erhöhen.', '🚶', '../img/icons/bewegungsmangel.png'),
(5, 'Wasserzufuhr', 'gesundheit', 'Zu wenig Wasser trinken kann zu Konzentrationsproblemen und Kopfschmerzen führen.', '💧', '../img/icons/wasserzufuhr.png'),
(6, 'Stress', 'mental', 'Dauerhafter Stress kann die mentale Gesundheit und Leistungsfähigkeit beeinträchtigen.', '⚡', '../img/icons/stress.png'),
(7, 'Soziale Isolation', 'mental', 'Wenig soziale Kontakte können das Wohlbefinden und die mentale Gesundheit beeinträchtigen.', '🏠', '../img/icons/isolation.png'),
(8, 'Prokrastination', 'mental', 'Probleme oder Aufgaben immer wieder aufzuschieben kann zu Sorgen und Stress führen.', '⏰', '../img/icons/prokastination.png');

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `habits_tips`
--

CREATE TABLE `habits_tips` (
  `ID` int NOT NULL,
  `habitID` int NOT NULL,
  `note` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Daten für Tabelle `habits_tips`
--

INSERT INTO `habits_tips` (`ID`, `habitID`, `note`) VALUES
(1, 1, 'Gehe jeden Tag zur gleichen Zeit ins Bett.'),
(2, 1, 'Vermeide Bildschirmzeit mindestens eine Stunde vor dem Schlafen.'),
(3, 1, 'Nutze eine Abendroutine, um dich zu entspannen.'),
(4, 1, 'Sorge für eine angenehme Schlafumgebung (dunkel, kühl, ruhig).'),
(5, 1, 'Vermeide Koffein am späten Nachmittag und Abend.'),
(6, 2, 'Mache regelmäßige Pausen von Bildschirmen (z. B. 20-20-20 Regel).'),
(7, 2, 'Nutze Blaulichtfilter oder Nachtmodus am Abend.'),
(8, 2, 'Reduziere Bildschirmzeit vor dem Schlafengehen.'),
(9, 2, 'Plane bildschirmfreie Zeiten, z. B. beim Essen oder in sozialen Runden.'),
(10, 2, 'Nutze alternative Aktivitäten wie Lesen oder Sport.');

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `users`
--

CREATE TABLE `users` (
  `ID` int NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `habitID` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Indizes der exportierten Tabellen
--

--
-- Indizes für die Tabelle `habits`
--
ALTER TABLE `habits`
  ADD PRIMARY KEY (`ID`);

--
-- Indizes für die Tabelle `habits_tips`
--
ALTER TABLE `habits_tips`
  ADD PRIMARY KEY (`ID`);

--
-- Indizes für die Tabelle `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT für exportierte Tabellen
--

--
-- AUTO_INCREMENT für Tabelle `habits`
--
ALTER TABLE `habits`
  MODIFY `ID` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT für Tabelle `habits_tips`
--
ALTER TABLE `habits_tips`
  MODIFY `ID` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT für Tabelle `users`
--
ALTER TABLE `users`
  MODIFY `ID` int NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
