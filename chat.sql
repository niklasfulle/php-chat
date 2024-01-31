-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Erstellungszeit: 08. Okt 2017 um 00:27
-- Server-Version: 10.1.25-MariaDB
-- PHP-Version: 5.6.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Datenbank: `chat`
--

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `benutzer`
--

CREATE TABLE `benutzer` (
  `BenutzerName` varchar(50) COLLATE utf8_german2_ci NOT NULL,
  `Vorname` varchar(50) COLLATE utf8_german2_ci DEFAULT NULL,
  `Nachname` varchar(50) COLLATE utf8_german2_ci DEFAULT NULL,
  `Password` varchar(512) COLLATE utf8_german2_ci DEFAULT NULL,
  `Last_IP` varchar(50) COLLATE utf8_german2_ci DEFAULT NULL,
  `ProfilBild` varchar(50) COLLATE utf8_german2_ci DEFAULT NULL,
  `Warnungen` int(10) DEFAULT NULL,
  `BenutzerKlasse` varchar(50) COLLATE utf8_german2_ci DEFAULT NULL,
  `BenutzerStatus` varchar(50) COLLATE utf8_german2_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_german2_ci;

--
-- Daten für Tabelle `benutzer`
--

INSERT INTO `benutzer` (`BenutzerName`, `Vorname`, `Nachname`, `Password`, `Last_IP`, `ProfilBild`, `Warnungen`, `BenutzerKlasse`, `BenutzerStatus`) VALUES
('Barabas.Rob', 'Robert', 'Barabas', 'aa7b28b37025e1f1ceb489b1494a922b48873466b70ffdd8ae3cf8f5db4fcb79', '172.16.242.120', 'default.png', 0, '2', '1'),
('Fechner.Oli', 'Oliver', 'Fechner', '7f9f06964136bbd5f70404ee96a576997f433be6cf7094d64a487b63a859d4b5', '172.16.242.122', 'default.png', 0, '1', '1'),
('Fulle.Nik', 'Niklas', 'Fulle', '2e4b601f92c277bb036783488c9d0fe7a67eb3da844ec9a2d8984b923770bb0f', '::1', 'Fulle.Nik.png', 0, '2', '1'),
('Test.Tes', 'Test', 'Test', '2e4b601f92c277bb036783488c9d0fe7a67eb3da844ec9a2d8984b923770bb0f', '::1', 'default.png', 0, '1', '1');

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `bugreports`
--

CREATE TABLE `bugreports` (
  `ReportNr` int(11) NOT NULL,
  `Seite` varchar(32) COLLATE utf8_german2_ci NOT NULL,
  `Funktion` varchar(128) COLLATE utf8_german2_ci NOT NULL,
  `Ueberschrift` varchar(128) COLLATE utf8_german2_ci NOT NULL,
  `Fehlerbeschreibung` varchar(1024) COLLATE utf8_german2_ci NOT NULL,
  `Status` int(5) NOT NULL,
  `Zeit` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_german2_ci;

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `filter`
--

CREATE TABLE `filter` (
  `Nr` int(11) NOT NULL,
  `FilterWort` varchar(50) COLLATE utf8_german2_ci NOT NULL,
  `Replaceer2` varchar(1024) COLLATE utf8_german2_ci NOT NULL,
  `Status` int(2) NOT NULL,
  `Klasse` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_german2_ci;

--
-- Daten für Tabelle `filter`
--

INSERT INTO `filter` (`Nr`, `FilterWort`, `Replaceer2`, `Status`, `Klasse`) VALUES
(1, 'Arschloch', '</a><div class=dropdown6 ><a id=chatNachricht1>********</a><div class=dropdown6-content><p id=Admin1>Arschloch</p></div></div><a id=chatNachricht>', 1, 1),
(2, 'ARSCHLOCH', '</a><div class=dropdown6 ><a id=chatNachricht1>********</a><div class=dropdown6-content><p id=Admin1>ARSCHLOCH</p></div></div><a id=chatNachricht>', 1, 2),
(3, 'arschloch', '</a><div class=dropdown6 ><a id=chatNachricht1>********</a><div class=dropdown6-content><p id=Admin1>arschloch</p></div></div><a id=chatNachricht>', 1, 2),
(4, 'Penis', '</a><div class=dropdown6 ><a id=chatNachricht1>********</a><div class=dropdown6-content><p id=Admin1>Penis</p></div></div><a id=chatNachricht>', 1, 1),
(5, 'PENIS', '</a><div class=dropdown6 ><a id=chatNachricht1>********</a><div class=dropdown6-content><p id=Admin1>PENIS</p></div></div><a id=chatNachricht>', 1, 2),
(6, 'penis', '</a><div class=dropdown6 ><a id=chatNachricht1>********</a><div class=dropdown6-content><p id=Admin1>penis</p></div></div><a id=chatNachricht>', 1, 2),
(7, 'Sex', '</a><div class=dropdown6 ><a id=chatNachricht1>********</a><div class=dropdown6-content><p id=Admin1>Sex</p></div></div><a id=chatNachricht>', 1, 1),
(8, 'SEX', '</a><div class=dropdown6 ><a id=chatNachricht1>********</a><div class=dropdown6-content><p id=Admin1>SEX</p></div></div><a id=chatNachricht>', 1, 2),
(9, 'sex', '</a><div class=dropdown6 ><a id=chatNachricht1>********</a><div class=dropdown6-content><p id=Admin1>sex</p></div></div><a id=chatNachricht>', 1, 2),
(10, 'Fick dich', '</a><div class=dropdown6 ><a id=chatNachricht1>********</a><div class=dropdown6-content><p id=Admin1>Fick dich</p></div></div><a id=chatNachricht>', 1, 1),
(11, 'FICK DICH', '</a><div class=dropdown6 ><a id=chatNachricht1>********</a><div class=dropdown6-content><p id=Admin1>FICK DICH</p></div></div><a id=chatNachricht>', 1, 2),
(12, 'fick dich', '</a><div class=dropdown6 ><a id=chatNachricht1>********</a><div class=dropdown6-content><p id=Admin1>fick dich</p></div></div><a id=chatNachricht>', 1, 2),
(13, 'Fotze', '</a><div class=dropdown6 ><a id=chatNachricht1>********</a><div class=dropdown6-content><p id=Admin1>Fotze</p></div></div><a id=chatNachricht>', 1, 1),
(14, 'FOTZE', '</a><div class=dropdown6 ><a id=chatNachricht1>********</a><div class=dropdown6-content><p id=Admin1>FOTZE</p></div></div><a id=chatNachricht>', 1, 2),
(15, 'fotze', '</a><div class=dropdown6 ><a id=chatNachricht1>********</a><div class=dropdown6-content><p id=Admin1>fotze</p></div></div><a id=chatNachricht>', 1, 2),
(16, 'Fuck you', '</a><div class=dropdown6 ><a id=chatNachricht1>********</a><div class=dropdown6-content><p id=Admin1>Fuck you</p></div></div><a id=chatNachricht>', 1, 1),
(17, 'FUCK YOU', '</a><div class=dropdown6 ><a id=chatNachricht1>********</a><div class=dropdown6-content><p id=Admin1>FUCK YOU</p></div></div><a id=chatNachricht>', 1, 2),
(18, 'fuck you', '</a><div class=dropdown6 ><a id=chatNachricht1>********</a><div class=dropdown6-content><p id=Admin1>fuck you</p></div></div><a id=chatNachricht>', 1, 2),
(19, 'Ficken', '</a><div class=dropdown6 ><a id=chatNachricht1>********</a><div class=dropdown6-content><p id=Admin1>Ficken</p></div></div><a id=chatNachricht>', 1, 1),
(20, 'FICKEN', '</a><div class=dropdown6 ><a id=chatNachricht1>********</a><div class=dropdown6-content><p id=Admin1>FICKEN</p></div></div><a id=chatNachricht>', 1, 2),
(21, 'ficken', '</a><div class=dropdown6 ><a id=chatNachricht1>********</a><div class=dropdown6-content><p id=Admin1>ficken</p></div></div><a id=chatNachricht>', 1, 2),
(22, 'Boobs', '</a><div class=dropdown6 ><a id=chatNachricht1>********</a><div class=dropdown6-content><p id=Admin1>Boobs</p></div></div><a id=chatNachricht>', 1, 1),
(23, 'BOOBS', '</a><div class=dropdown6 ><a id=chatNachricht1>********</a><div class=dropdown6-content><p id=Admin1>BOOBS</p></div></div><a id=chatNachricht>', 1, 2),
(24, 'boobs', '</a><div class=dropdown6 ><a id=chatNachricht1>********</a><div class=dropdown6-content><p id=Admin1>boobs</p></div></div><a id=chatNachricht>', 1, 2),
(25, 'Behindert', '</a><div class=dropdown6 ><a id=chatNachricht1>********</a><div class=dropdown6-content><p id=Admin1>Behindert</p></div></div><a id=chatNachricht>', 1, 1),
(26, 'BEHINDERT', '</a><div class=dropdown6 ><a id=chatNachricht1>********</a><div class=dropdown6-content><p id=Admin1>BEHINDERT</p></div></div><a id=chatNachricht>', 1, 2),
(27, 'behindert', '</a><div class=dropdown6 ><a id=chatNachricht1>********</a><div class=dropdown6-content><p id=Admin1>behindert</p></div></div><a id=chatNachricht>', 1, 2),
(28, 'Titten', '</a><div class=dropdown6 ><a id=chatNachricht1>********</a><div class=dropdown6-content><p id=Admin1>Titten</p></div></div><a id=chatNachricht>', 1, 1),
(29, 'TITTEN', '</a><div class=dropdown6 ><a id=chatNachricht1>********</a><div class=dropdown6-content><p id=Admin1>TITTEN</p></div></div><a id=chatNachricht>', 1, 2),
(30, 'titten', '</a><div class=dropdown6 ><a id=chatNachricht1>********</a><div class=dropdown6-content><p id=Admin1>titten</p></div></div><a id=chatNachricht>', 1, 2),
(31, 'Hurensohn', '</a><div class=dropdown6 ><a id=chatNachricht1>********</a><div class=dropdown6-content><p id=Admin1>Hurensohn</p></div></div><a id=chatNachricht>', 1, 1),
(32, 'HURENSOHN', '</a><div class=dropdown6 ><a id=chatNachricht1>********</a><div class=dropdown6-content><p id=Admin1>HURENSOHN</p></div></div><a id=chatNachricht>', 1, 2),
(33, 'hurensohn', '</a><div class=dropdown6 ><a id=chatNachricht1>********</a><div class=dropdown6-content><p id=Admin1>hurensohn</p></div></div><a id=chatNachricht>', 1, 2),
(34, 'Hure', '</a><div class=dropdown6 ><a id=chatNachricht1>********</a><div class=dropdown6-content><p id=Admin1>Hure</p></div></div><a id=chatNachricht>', 1, 1),
(35, 'HURE', '</a><div class=dropdown6 ><a id=chatNachricht1>********</a><div class=dropdown6-content><p id=Admin1>HURE</p></div></div><a id=chatNachricht>', 1, 2),
(36, 'hure', '</a><div class=dropdown6 ><a id=chatNachricht1>********</a><div class=dropdown6-content><p id=Admin1>hure</p></div></div><a id=chatNachricht>', 1, 2),
(37, 'Huso', '</a><div class=dropdown6 ><a id=chatNachricht1>********</a><div class=dropdown6-content><p id=Admin1>Huso</p></div></div><a id=chatNachricht>', 1, 1),
(38, 'HUSO', '</a><div class=dropdown6 ><a id=chatNachricht1>********</a><div class=dropdown6-content><p id=Admin1>HUSO</p></div></div><a id=chatNachricht>', 1, 2),
(39, 'huso', '</a><div class=dropdown6 ><a id=chatNachricht1>********</a><div class=dropdown6-content><p id=Admin1>huso</p></div></div><a id=chatNachricht>', 1, 2);

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `freunde`
--

CREATE TABLE `freunde` (
  `BenutzerName` varchar(50) CHARACTER SET latin1 COLLATE latin1_german1_ci NOT NULL,
  `BenutzerNameFreund` varchar(50) CHARACTER SET latin1 COLLATE latin1_german1_ci NOT NULL,
  `Status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_german2_ci;

--
-- Daten für Tabelle `freunde`
--

INSERT INTO `freunde` (`BenutzerName`, `BenutzerNameFreund`, `Status`) VALUES
('Fulle.Nik', 'Test.Tes', 1),
('Test.Tes', 'Fulle.Nik', 1);

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `nachricht`
--

CREATE TABLE `nachricht` (
  `NachrichtenNr` int(11) NOT NULL,
  `Von` varchar(50) CHARACTER SET latin1 COLLATE latin1_german1_ci NOT NULL,
  `Nachricht` varchar(512) CHARACTER SET latin1 COLLATE latin1_german1_ci NOT NULL,
  `Typ` varchar(10) CHARACTER SET latin1 COLLATE latin1_german1_ci NOT NULL,
  `Time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `Status` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_german2_ci;

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `post`
--

CREATE TABLE `post` (
  `PostNr` int(11) NOT NULL,
  `Von` varchar(50) CHARACTER SET latin1 COLLATE latin1_german1_ci NOT NULL,
  `An` varchar(50) CHARACTER SET latin1 COLLATE latin1_german1_ci NOT NULL,
  `Nachricht` varchar(1024) CHARACTER SET latin1 COLLATE latin1_german1_ci NOT NULL,
  `Time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_german2_ci;

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `privatnachricht`
--

CREATE TABLE `privatnachricht` (
  `NachrichtenNr` int(11) NOT NULL,
  `Von` varchar(50) CHARACTER SET latin1 COLLATE latin1_german1_ci NOT NULL,
  `An` varchar(50) CHARACTER SET latin1 COLLATE latin1_german1_ci NOT NULL,
  `Nachricht` varchar(512) CHARACTER SET latin1 COLLATE latin1_german1_ci NOT NULL,
  `Typ` varchar(10) CHARACTER SET latin1 COLLATE latin1_german1_ci NOT NULL,
  `Status` int(4) NOT NULL,
  `Time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_german2_ci;

--
-- Daten für Tabelle `privatnachricht`
--

INSERT INTO `privatnachricht` (`NachrichtenNr`, `Von`, `An`, `Nachricht`, `Typ`, `Status`, `Time`) VALUES
(1, 'Fulle.Nik', 'Test.Tes', 'awdaw', 'Text', 1, '2017-10-07 22:21:14'),
(2, 'Fulle.Nik', 'Test.Tes', 'wada', 'Text', 1, '2017-10-07 22:21:14'),
(3, 'Fulle.Nik', 'Test.Tes', 'dwa', 'Text', 1, '2017-10-07 22:21:14'),
(4, 'Fulle.Nik', 'Test.Tes', 'dwadaw', 'Text', 1, '2017-10-07 22:21:14'),
(5, 'Fulle.Nik', 'Test.Tes', 'awda', 'Text', 1, '2017-10-07 22:21:14');

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `smile`
--

CREATE TABLE `smile` (
  `Nr` int(10) NOT NULL,
  `SmileCode` varchar(32) CHARACTER SET latin1 COLLATE latin1_german1_ci NOT NULL,
  `SmileBild` varchar(1024) CHARACTER SET latin1 COLLATE latin1_german1_ci NOT NULL,
  `SmileBild1` varchar(1024) CHARACTER SET latin1 COLLATE latin1_german1_ci NOT NULL,
  `Status` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_german2_ci;

--
-- Daten für Tabelle `smile`
--

INSERT INTO `smile` (`Nr`, `SmileCode`, `SmileBild`, `SmileBild1`, `Status`) VALUES
(1, ':D', '</a><div id=Admin class=dropdown7><img id=Smile src=Bilder/Smile/grinning.png></img><div class=dropdown7-content><p id=Admin>:D</p></div></div><a id=chatNachricht>', '</a><img id=Smile1 src=Bilder/Smile/grinning.png></img><a id=chatNachricht>', 1),
(2, ':)', '</a><div id=Admin class=dropdown7><img id=Smile src=Bilder/Smile/smiley-face.png></img><div class=dropdown7-content><p id=Admin>:)</p></div></div><a id=chatNachricht>', '</a><img id=Smile1 src=Bilder/Smile/smiley-face.png></img><a id=chatNachricht>', 1),
(3, ':(', '</a><div id=Admin class=dropdown7><img id=Smile src=Bilder/Smile/frowny-face.png></img><div class=dropdown7-content><p id=Admin>:(</p></div></div><a id=chatNachricht>', '</a><img id=Smile1 src=Bilder/Smile/frowny-face.png></img><a id=chatNachricht>', 1),
(4, ':O', '</a><div id=Admin class=dropdown7><img id=Smile src=Bilder/Smile/gasp.png></img><div class=dropdown7-content><p id=Admin>:O</p></div></div><a id=chatNachricht>', '</a><img id=Smile1 src=Bilder/Smile/gasp.png></img><a id=chatNachricht>', 1),
(5, '-_-', '</a><div id=Admin class=dropdown7><img id=Smile src=Bilder/Smile/squint.png></img><div class=dropdown7-content><p id=Admin>-_-</p></div></div><a id=chatNachricht>', '</a><img id=Smile1 src=Bilder/Smile/squint.png></img><a id=chatNachricht>', 1),
(6, 'O_O', '</a><div id=Admin class=dropdown7><img id=Smile src=Bilder/Smile/shocked.png></img><div class=dropdown7-content><p id=Admin>O_O</p></div></div><a id=chatNachricht>', '</a><img id=Smile1 src=Bilder/Smile/shocked.png></img><a id=chatNachricht>', 1),
(7, ';)', '</a><div id=Admin class=dropdown7><img id=Smile src=Bilder/Smile/winking-smiley.png></img><div class=dropdown7-content><p id=Admin>;)</p></div></div><a id=chatNachricht>', '</a><img id=Smile1 src=Bilder/Smile/winking-smiley.png></img><a id=chatNachricht>', 1),
(8, 'O_o', '</a><div id=Admin class=dropdown7><img id=Smile src=Bilder/Smile/unsure.png></img><div class=dropdown7-content><p id=Admin>O_o</p></div></div><a id=chatNachricht>', '</a><img id=Smile1 src=Bilder/Smile/unsure.png></img><a id=chatNachricht>', 1),
(9, ':Â´(', '</a><div id=Admin class=dropdown7><img id=Smile src=Bilder/Smile/crying.png></img><div class=dropdown7-content><p id=Admin>:Â´(</p></div></div><a id=chatNachricht>', '</a><img id=Smile1 src=Bilder/Smile/crying.png></img><a id=chatNachricht>', 1),
(10, '8)', '</a><div id=Admin class=dropdown7><img id=Smile src=Bilder/Smile/sunglasses.png></img><div class=dropdown7-content><p id=Admin>8)</p></div></div><a id=chatNachricht>', '</a><img id=Smile1 src=Bilder/Smile/sunglasses.png></img><a id=chatNachricht>', 1),
(11, ':P', '</a><div id=Admin class=dropdown7><img id=Smile src=Bilder/Smile/tongue-out.png></img><div class=dropdown7-content><p id=Admin>:P</p></div></div><a id=chatNachricht>', '</a><img id=Smile1 src=Bilder/Smile/tongue-out.png></img><a id=chatNachricht>', 1),
(12, ':poop:', '</a><div id=Admin class=dropdown7><img id=Smile src=Bilder/Smile/poop.png></img><div class=dropdown7-content><p id=Admin>:poop:</p></div></div><a id=chatNachricht>', '</a><img id=Smile1 src=Bilder/Smile/poop.png></img><a id=chatNachricht>', 1),
(13, ':nerd:', '</a><div id=Admin class=dropdown7><img id=Smile src=Bilder/Smile/smiley-with-glasses.png></img><div class=dropdown7-content><p id=Admin>:nerd:</p></div></div><a id=chatNachricht>', '</a><img id=Smile1 src=Bilder/Smile/smiley-with-glasses.png></img><a id=chatNachricht>', 1),
(14, ':heart:', '</a><div id=Admin class=dropdown7><img id=Smile src=Bilder/Smile/heart.png></img><div class=dropdown7-content><p id=Admin>:heart:</p></div></div><a id=chatNachricht>', '</a><img id=Smile1 src=Bilder/Smile/heart.png></img><a id=chatNachricht>', 1),
(15, ':love:', '</a><div id=Admin class=dropdown7><img id=Smile src=Bilder/Smile/kiss-emoji.png></img><div class=dropdown7-content><p id=Admin>:love:</p></div></div><a id=chatNachricht>', '</a><img id=Smile1 src=Bilder/Smile/kiss-emoji.png></img><a id=chatNachricht>', 1),
(16, ':devil:', '</a><div id=Admin class=dropdown7><img id=Smile src=Bilder/Smile/devil-smiley.png></img><div class=dropdown7-content><p id=Admin>:devil:</p></div></div><a id=chatNachricht>', '</a><img id=Smile1 src=Bilder/Smile/devil-smiley.png></img><a id=chatNachricht>', 1),
(17, 'Kappa', '</a><div id=Admin class=dropdown7><img id=Smile src=Bilder/Smile/Kappa.png></img><div class=dropdown7-content><p id=Admin>Kappa</p></div></div><a id=chatNachricht>', '</a><img id=Smile1 src=Bilder/Smile/Kappa.png></img><a id=chatNachricht>', 1);

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `spiele`
--

CREATE TABLE `spiele` (
  `SpieleNr` int(10) NOT NULL,
  `SpielBereichNr` int(10) NOT NULL,
  `Name` varchar(256) CHARACTER SET latin1 COLLATE latin1_german1_ci NOT NULL,
  `SpieleLink` varchar(1024) CHARACTER SET latin1 COLLATE latin1_german1_ci NOT NULL,
  `SpielTyp` int(10) NOT NULL,
  `Beschriebung` varchar(2048) CHARACTER SET latin1 COLLATE latin1_german1_ci NOT NULL,
  `SpielerAnzahl` int(11) NOT NULL,
  `Status` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_german2_ci;

--
-- Daten für Tabelle `spiele`
--

INSERT INTO `spiele` (`SpieleNr`, `SpielBereichNr`, `Name`, `SpieleLink`, `SpielTyp`, `Beschriebung`, `SpielerAnzahl`, `Status`) VALUES
(1, 1, 'TicTacToe', './Spiele/TicTacToe/index.html', 2, 'TicTacToe', 2, 0),
(3, 1, 'LightsOut', './Spiele/LightsOut/index.html', 1, 'LightsOut', 1, 1),
(4, 2, 'Schach', './Spiele/Schach/index.html', 2, 'Schach', 2, 1),
(5, 2, 'Tetris', './Spiele/Tetris/index.html', 1, 'Tetris', 1, 1);

--
-- Indizes der exportierten Tabellen
--

--
-- Indizes für die Tabelle `benutzer`
--
ALTER TABLE `benutzer`
  ADD PRIMARY KEY (`BenutzerName`);

--
-- Indizes für die Tabelle `bugreports`
--
ALTER TABLE `bugreports`
  ADD PRIMARY KEY (`ReportNr`),
  ADD UNIQUE KEY `ReportNr` (`ReportNr`);

--
-- Indizes für die Tabelle `filter`
--
ALTER TABLE `filter`
  ADD PRIMARY KEY (`Nr`);

--
-- Indizes für die Tabelle `nachricht`
--
ALTER TABLE `nachricht`
  ADD PRIMARY KEY (`NachrichtenNr`),
  ADD UNIQUE KEY `NachrichtenNr` (`NachrichtenNr`);

--
-- Indizes für die Tabelle `post`
--
ALTER TABLE `post`
  ADD PRIMARY KEY (`PostNr`),
  ADD UNIQUE KEY `PostNr` (`PostNr`);

--
-- Indizes für die Tabelle `privatnachricht`
--
ALTER TABLE `privatnachricht`
  ADD PRIMARY KEY (`NachrichtenNr`),
  ADD UNIQUE KEY `NachrichtenNr` (`NachrichtenNr`);

--
-- Indizes für die Tabelle `smile`
--
ALTER TABLE `smile`
  ADD UNIQUE KEY `Nr` (`Nr`);

--
-- Indizes für die Tabelle `spiele`
--
ALTER TABLE `spiele`
  ADD PRIMARY KEY (`SpieleNr`);

--
-- AUTO_INCREMENT für exportierte Tabellen
--

--
-- AUTO_INCREMENT für Tabelle `bugreports`
--
ALTER TABLE `bugreports`
  MODIFY `ReportNr` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT für Tabelle `filter`
--
ALTER TABLE `filter`
  MODIFY `Nr` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;
--
-- AUTO_INCREMENT für Tabelle `nachricht`
--
ALTER TABLE `nachricht`
  MODIFY `NachrichtenNr` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT für Tabelle `post`
--
ALTER TABLE `post`
  MODIFY `PostNr` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT für Tabelle `privatnachricht`
--
ALTER TABLE `privatnachricht`
  MODIFY `NachrichtenNr` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT für Tabelle `smile`
--
ALTER TABLE `smile`
  MODIFY `Nr` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
--
-- AUTO_INCREMENT für Tabelle `spiele`
--
ALTER TABLE `spiele`
  MODIFY `SpieleNr` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
