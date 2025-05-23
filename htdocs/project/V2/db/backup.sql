-- phpMyAdmin SQL Dump
-- version 5.2.2
-- https://www.phpmyadmin.net/
--
-- Host: mysql-db
-- Erstellungszeit: 23. Mai 2025 um 16:54
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
(10, 2, 'Nutze alternative Aktivitäten wie Lesen oder Sport.'),
(11, 3, 'Achte auf eine ausgewogene Ernährung mit viel Gemüse und Proteinen.'),
(12, 3, 'Reduziere Zucker und verarbeitete Lebensmittel.'),
(13, 3, 'Trinke ausreichend Wasser über den Tag verteilt.'),
(14, 3, 'Koche öfter selbst, um Kontrolle über Zutaten zu haben.'),
(15, 3, 'Plane deine Mahlzeiten im Voraus, um ungesunde Snacks zu vermeiden.'),
(16, 4, 'Baue Bewegung in deinen Alltag ein (z. B. Treppen statt Aufzug).'),
(17, 4, 'Setze dir feste Zeiten für Sport oder Spaziergänge.'),
(18, 4, 'Probiere verschiedene Sportarten, um eine passende zu finden.'),
(19, 4, 'Nutze Stehpausen bei der Arbeit, um Bewegung zu fördern.'),
(20, 4, 'Verknüpfe Bewegung mit Spaß, z. B. durch Musik oder Freunde.'),
(21, 5, 'Trinke ein Glas Wasser direkt nach dem Aufstehen.'),
(22, 5, 'Nutze eine Trinkflasche, um deinen Wasserkonsum im Blick zu behalten.'),
(23, 5, 'Setze dir Erinnerungen, um regelmäßig Wasser zu trinken.'),
(24, 5, 'Geschmacksvarianten wie Zitronenwasser können helfen.'),
(25, 5, 'Ersetze Softdrinks und Kaffee öfter durch Wasser.'),
(26, 6, 'Nutze Atemtechniken zur schnellen Entspannung.'),
(27, 6, 'Plane bewusste Entspannungszeiten ein (z. B. Meditation).'),
(28, 6, 'Reduziere Stressfaktoren durch besseres Zeitmanagement.'),
(29, 6, 'Bewege dich regelmäßig, um Stress abzubauen.'),
(30, 6, 'Sprich mit Freunden oder Familie über deine Belastungen.'),
(31, 7, 'Plane regelmäßige Treffen mit Freunden oder Familie.'),
(32, 7, 'Nimm an Gruppenaktivitäten oder Vereinen teil.'),
(33, 7, 'Nutze Videoanrufe, wenn persönliche Treffen nicht möglich sind.'),
(34, 7, 'Baue kleine soziale Interaktionen in deinen Alltag ein.'),
(35, 7, 'Sei offen für neue Kontakte und Gelegenheiten zum Austausch.'),
(36, 8, 'Setze dir konkrete Ziele: Formuliere klare und erreichbare Ziele, um die Aufgabe überschaubar zu machen und die Prokrastination zu vermeiden.'),
(37, 8, 'Nutze die 5-Minuten-Regel: Starte eine Aufgabe, indem du dich verpflichtest, nur 5 Minuten daran zu arbeiten. Oft wirst du länger bleiben, wenn du erst einmal angefangen hast.\r\n'),
(38, 8, 'Führe eine To-Do-Liste: Halte deine Aufgaben schriftlich fest und arbeite sie systematisch ab. Das Abhaken erledigter Aufgaben gibt dir ein Erfolgserlebnis\r\n'),
(39, 8, 'Arbeite mit Zeitblöcken: Teile deine Arbeit in feste Zeiträume (z. B. Pomodoro-Technik) ein, um dich besser zu fokussieren und die Prokrastination zu überwinden.\r\n'),
(40, 8, 'Vermeide Ablenkungen: Schalte Benachrichtigungen aus und schaffe dir eine ruhige Arbeitsumgebung, um konzentriert und effektiv zu bleiben.\r\n');

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
  MODIFY `ID` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- AUTO_INCREMENT für Tabelle `users`
--
ALTER TABLE `users`
  MODIFY `ID` int NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;