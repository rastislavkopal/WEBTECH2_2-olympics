-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Hostiteľ: localhost:3306
-- Čas generovania: Št 04.Mar 2021, 09:57
-- Verzia serveru: 8.0.23-0ubuntu0.20.04.1
-- Verzia PHP: 8.0.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Databáza: `zadanie2`
--

-- --------------------------------------------------------

--
-- Štruktúra tabuľky pre tabuľku `olympics`
--

CREATE TABLE `olympics` (
  `id` int NOT NULL,
  `type` varchar(5) COLLATE utf8_slovak_ci NOT NULL,
  `year` year NOT NULL,
  `ord` int NOT NULL,
  `city` varchar(50) COLLATE utf8_slovak_ci NOT NULL,
  `country` varchar(50) COLLATE utf8_slovak_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_slovak_ci;

--
-- Sťahujem dáta pre tabuľku `olympics`
--

INSERT INTO `olympics` (`id`, `type`, `year`, `ord`, `city`, `country`) VALUES
(1, 'LOH', 1948, 14, 'Londýn', 'UK'),
(2, 'LOH', 1952, 15, 'Helsinki', 'Fínsko'),
(3, 'LOH', 1956, 16, 'Melbourne/Štokholm', 'Austrália/Švédsko'),
(4, 'LOH', 1960, 17, 'Rím', 'Taliansko'),
(5, 'LOH', 1964, 18, 'Tokio', 'Japonsko'),
(6, 'LOH', 1968, 19, 'Mexiko', 'Mexiko'),
(7, 'LOH', 1972, 20, 'Mníchov', 'Nemecko'),
(8, 'LOH', 1976, 21, 'Montreal', 'Kanada'),
(9, 'LOH', 1980, 22, 'Moskva', 'Sovietsky zväz'),
(10, 'LOH', 1984, 23, 'Los Angeles', 'USA'),
(11, 'LOH', 1988, 24, 'Soul', 'Južná Kórea'),
(12, 'LOH', 1992, 25, 'Barcelona', 'Španielsko'),
(13, 'LOH', 1996, 26, 'Atlanta', 'USA'),
(14, 'LOH', 2000, 27, 'Sydney', 'Austrália'),
(15, 'LOH', 2004, 28, 'Atény', 'Grécko'),
(16, 'LOH', 2008, 29, 'Peking/Hongkong', 'Čína'),
(17, 'LOH', 2012, 30, 'Londýn', 'UK'),
(18, 'LOH', 2016, 31, 'Rio de Janeiro', 'Brazília'),
(19, 'LOH', 2020, 32, 'Tokio', 'Japonsko'),
(20, 'ZOH', 1964, 9, 'Innsbruck', 'Rakúsko'),
(21, 'ZOH', 1968, 10, 'Grenoble', 'Francúzsko'),
(22, 'ZOH', 1972, 11, 'Sapporo', 'Japonsko'),
(23, 'ZOH', 1976, 12, 'Innsbruck', 'Rakúsko'),
(24, 'ZOH', 1980, 13, 'Lake Placid', 'USA'),
(25, 'ZOH', 1984, 14, 'Sarajevo', 'Juhoslávia'),
(26, 'ZOH', 1988, 15, 'Calgary', 'Kanada'),
(27, 'ZOH', 1992, 16, 'Albertville', 'Francúzsko'),
(28, 'ZOH', 1994, 17, 'Lillehammer', 'Nórsko'),
(29, 'ZOH', 1998, 18, 'Nagano', 'Japonsko'),
(30, 'ZOH', 2002, 19, 'Salt Lake City', 'USA'),
(31, 'ZOH', 2006, 20, 'Turín', 'Taliansko'),
(32, 'ZOH', 2010, 21, 'Vancouver', 'Kanada'),
(33, 'ZOH', 2014, 22, 'Soči', 'Rusko'),
(34, 'ZOH', 2018, 23, 'Pjongčang', 'Kórea'),
(35, 'ZOH', 2022, 24, 'Peking', 'Čína');

-- --------------------------------------------------------

--
-- Štruktúra tabuľky pre tabuľku `persons`
--

CREATE TABLE `persons` (
  `id` int NOT NULL,
  `name` varchar(50) COLLATE utf8_slovak_ci NOT NULL,
  `surname` varchar(50) COLLATE utf8_slovak_ci NOT NULL,
  `birth_day` varchar(20) COLLATE utf8_slovak_ci NOT NULL,
  `birth_place` varchar(50) COLLATE utf8_slovak_ci NOT NULL,
  `birth_country` varchar(50) COLLATE utf8_slovak_ci NOT NULL,
  `death_day` varchar(15) CHARACTER SET utf8 COLLATE utf8_slovak_ci DEFAULT NULL,
  `death_place` varchar(50) CHARACTER SET utf8 COLLATE utf8_slovak_ci DEFAULT NULL,
  `death_country` varchar(50) CHARACTER SET utf8 COLLATE utf8_slovak_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_slovak_ci;

--
-- Sťahujem dáta pre tabuľku `persons`
--

INSERT INTO `persons` (`id`, `name`, `surname`, `birth_day`, `birth_place`, `birth_country`, `death_day`, `death_place`, `death_country`) VALUES
(1, 'Peter', 'Hochschorner', '7.9.1979', 'Bratislava', 'Slovensko', '', '', ''),
(2, 'Pavol', 'Hochschorner', '7.9.1979', 'Bratislava', 'Slovensko', '', '', ''),
(3, 'Elena', 'Kaliská', '19.1.1972', 'Zvolen', 'Slovensko', '', '', ''),
(4, 'Anastasiya', 'Kuzmina', '28.8.1984', 'Ťumeň', 'Sovietsky zväz', '', '', ''),
(5, 'Michal', 'Martikán', '18.5.1979', 'Liptovský Mikuláš', 'Slovensko', '', '', ''),
(6, 'Ondrej', 'Nepela', '22.1.1951', 'Bratislava', 'Slovensko', '2.2.1989', 'Mannheim', 'Nemecko'),
(7, 'Jozef', 'Pribilinec', '6.7.1960', 'Kopernica', 'Slovensko', '', '', ''),
(8, 'Anton', 'Tkáč', '30.3.1951', 'Lozorno', 'Slovensko', '', '', ''),
(9, 'Ján', 'Zachara', '27.8.1928', 'Kubrá pri Trenčíne', 'Slovensko', '', '', ''),
(10, 'Július', 'Torma', '7.3.1922', 'Budapešť', 'Maďarsko', '23.10.1991', 'Praha', 'Česko'),
(11, 'Stanislav', 'Seman', '6.8.1952', 'Košice', 'Slovensko', '', '', ''),
(12, 'František', 'Kunzo', '17.9.1954', 'Spišský Hrušov', 'Slovensko', '', '', ''),
(13, 'Miloslav', 'Mečíř', '19.5.1964', 'Bojnice', 'Slovensko', '', '', ''),
(14, 'Radoslav', 'Židek', '15.10.1981', 'Žilina', 'Slovensko', '', '', ''),
(15, 'Pavol', 'Hurajt', '4.2.1978', 'Poprad', 'Slovensko', '', '', ''),
(16, 'Matej', 'Tóth', '10.2.1983', 'Nitra', 'Slovensko', '', '', ''),
(17, 'Matej', 'Beňuš', '2.11.1987', 'Bratislava', 'Slovensko', '', '', ''),
(18, 'Ladislav', 'Škantár', '11.2.1983', 'Kežmarok', 'Slovensko', '', '', ''),
(19, 'Peter', 'Škantár', '20.7.1982', 'Kežmarok', 'Slovensko', '', '', ''),
(20, 'Erik', 'Vlček', '29.12.1981', 'Komárno', 'Slovensko', '', '', ''),
(21, 'Juraj', 'Tarr', '18.2.1979', 'Komárno', 'Slovensko', '', '', ''),
(22, 'Denis', 'Myšák', '30.11.1995', 'Bojnice', 'Slovensko', '', '', ''),
(23, 'Tibor', 'Linka', '13.2.1995', 'Šamorín', 'Slovensko', '', '', '');

-- --------------------------------------------------------

--
-- Štruktúra tabuľky pre tabuľku `placements`
--

CREATE TABLE `placements` (
  `id` int NOT NULL,
  `person_id` int NOT NULL,
  `oh_id` int NOT NULL,
  `placing` int NOT NULL,
  `discipline` varchar(50) COLLATE utf8_slovak_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_slovak_ci;

--
-- Sťahujem dáta pre tabuľku `placements`
--

INSERT INTO `placements` (`id`, `person_id`, `oh_id`, `placing`, `discipline`) VALUES
(1, 1, 14, 1, 'vodný slalom - C2'),
(2, 1, 15, 1, 'vodný slalom - C2'),
(3, 1, 16, 1, 'vodný slalom - C2'),
(4, 1, 17, 3, 'vodný slalom - C2'),
(5, 2, 14, 1, 'vodný slalom - C2'),
(6, 2, 15, 1, 'vodný slalom - C2'),
(7, 2, 16, 1, 'vodný slalom - C2'),
(8, 2, 17, 3, 'vodný slalom - C2'),
(9, 3, 13, 19, 'vodný slalom - K1'),
(10, 3, 14, 4, 'vodný slalom - K1'),
(11, 3, 15, 1, 'vodný slalom - K1'),
(12, 3, 16, 1, 'vodný slalom - K1'),
(13, 4, 32, 1, 'biatlon - šprint na 7.5 km'),
(14, 5, 13, 1, 'vodný slalom - C1'),
(15, 5, 14, 2, 'vodný slalom - C1'),
(16, 5, 15, 2, 'vodný slalom - C1'),
(17, 5, 16, 1, 'vodný slalom - C1'),
(18, 5, 17, 3, 'vodný slalom - C1'),
(19, 6, 20, 22, 'krasokorčuľovanie'),
(20, 6, 21, 8, 'krasokorčuľovanie'),
(21, 6, 22, 1, 'krasokorčuľovanie'),
(22, 7, 11, 1, 'atletika - chôdza'),
(23, 8, 8, 1, 'dráhová cyklistika - šprint'),
(24, 9, 2, 1, 'box do 57 kg'),
(25, 10, 1, 1, 'box do 67 kg'),
(26, 11, 9, 1, 'futbal'),
(27, 12, 9, 1, 'futbal'),
(28, 13, 11, 1, 'tenis'),
(29, 4, 32, 2, 'biatlon - stíhacie preteky na 10 km'),
(30, 15, 32, 3, 'biatlon - hromadný štart'),
(31, 14, 31, 2, 'snoubordkros'),
(32, 4, 33, 1, 'biatlon - šprint na 7.5 km'),
(33, 4, 34, 1, 'biatlon - hromadný štart'),
(34, 4, 34, 2, 'biatlon - stíhacie preteky na 10 km'),
(35, 4, 34, 2, 'biatlon - vytrvalostné preteky na 15 km'),
(36, 18, 18, 1, 'vodný slalom - C2'),
(37, 19, 18, 1, 'vodný slalom - C2'),
(38, 16, 18, 1, 'atletika - chôdza'),
(39, 17, 18, 2, 'vodný slalom - C1'),
(40, 20, 18, 2, 'kanoistika - K4 na 1000m'),
(41, 21, 18, 2, 'kanoistika - K4 na 1000m'),
(42, 22, 18, 2, 'kanoistika - K4 na 1000m'),
(43, 23, 18, 2, 'kanoistika - K4 na 1000m');

--
-- Kľúče pre exportované tabuľky
--

--
-- Indexy pre tabuľku `olympics`
--
ALTER TABLE `olympics`
  ADD PRIMARY KEY (`id`);

--
-- Indexy pre tabuľku `persons`
--
ALTER TABLE `persons`
  ADD PRIMARY KEY (`id`);

--
-- Indexy pre tabuľku `placements`
--
ALTER TABLE `placements`
  ADD PRIMARY KEY (`id`),
  ADD KEY `PERSON_FK` (`person_id`),
  ADD KEY `OLYMPICS_FK` (`oh_id`);

--
-- AUTO_INCREMENT pre exportované tabuľky
--

--
-- AUTO_INCREMENT pre tabuľku `olympics`
--
ALTER TABLE `olympics`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT pre tabuľku `persons`
--
ALTER TABLE `persons`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT pre tabuľku `placements`
--
ALTER TABLE `placements`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;

--
-- Obmedzenie pre exportované tabuľky
--

--
-- Obmedzenie pre tabuľku `placements`
--
ALTER TABLE `placements`
  ADD CONSTRAINT `OLYMPICS_FK` FOREIGN KEY (`oh_id`) REFERENCES `olympics` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  ADD CONSTRAINT `PERSON_FK` FOREIGN KEY (`person_id`) REFERENCES `persons` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
