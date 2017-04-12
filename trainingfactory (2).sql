-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Gegenereerd op: 12 apr 2017 om 07:00
-- Serverversie: 5.7.14
-- PHP-versie: 5.6.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `trainingfactory`
--

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `lesson`
--

CREATE TABLE `lesson` (
  `id` int(25) NOT NULL,
  `time` varchar(25) NOT NULL,
  `date` date NOT NULL,
  `location` varchar(50) NOT NULL,
  `max_persons` int(10) NOT NULL,
  `person_id` int(25) NOT NULL,
  `training_id` int(25) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Gegevens worden geëxporteerd voor tabel `lesson`
--

INSERT INTO `lesson` (`id`, `time`, `date`, `location`, `max_persons`, `person_id`, `training_id`) VALUES
(1, '250', '2017-03-31', 'de goot', 255, 1, 1);

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `person`
--

CREATE TABLE `person` (
  `id` int(25) NOT NULL,
  `loginname` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL DEFAULT 'qwerty',
  `firstname` varchar(50) NOT NULL,
  `preprovision` varchar(25) DEFAULT NULL,
  `lastname` varchar(50) NOT NULL,
  `dateofbirth` varchar(50) NOT NULL,
  `gender` varchar(100) NOT NULL,
  `emailaddress` varchar(50) NOT NULL,
  `hiring_date` varchar(50) DEFAULT NULL,
  `salary` float DEFAULT NULL,
  `street` varchar(50) DEFAULT NULL,
  `postal_code` varchar(25) DEFAULT NULL,
  `place` varchar(50) DEFAULT NULL,
  `role` enum('member','instructor','admin') NOT NULL,
  `deleted` int(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Gegevens worden geëxporteerd voor tabel `person`
--

INSERT INTO `person` (`id`, `loginname`, `password`, `firstname`, `preprovision`, `lastname`, `dateofbirth`, `gender`, `emailaddress`, `hiring_date`, `salary`, `street`, `postal_code`, `place`, `role`, `deleted`) VALUES
(1, 'instructorer', 'qwerty', 'adje123', '', 'minie', '1932-02-28', 'apache attack helicopter', 'adjeminie@example.com', '2017-03-22', 50.99, 'a', 'b', 'c', 'instructor', 0),
(2, 'member', 'qwerty', 'mem', '', 'ber', '2017-04-06', 'pannekoeker', 'pannekoek@member.com', NULL, 0, '', '', '', 'member', 0),
(3, 'admin', 'qwerty', 'ad', NULL, 'min', '2017-04-19', 'men', 'men@admin.com', NULL, NULL, NULL, NULL, NULL, 'admin', 0),
(6, 'test', 'qwerty', 'test', NULL, 'test', '5-5-2016', 'men', 'email@email.com', '5-5-2016', 50.5, 'tszst', 'tset', 'test', 'instructor', 1),
(25, 'a', 'a', 'a', 'a', 'a', '2017-04-07', 'a', '', NULL, NULL, '', '', '', 'member', 0);

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `registration`
--

CREATE TABLE `registration` (
  `id` int(25) NOT NULL,
  `payment` int(1) DEFAULT '0',
  `person_id` int(25) NOT NULL,
  `lesson_id` int(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Gegevens worden geëxporteerd voor tabel `registration`
--

INSERT INTO `registration` (`id`, `payment`, `person_id`, `lesson_id`) VALUES
(2, 0, 25, 1);

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `training`
--

CREATE TABLE `training` (
  `id` int(25) NOT NULL,
  `description` varchar(100) NOT NULL,
  `duration` int(10) NOT NULL,
  `extra_costs` varchar(10) DEFAULT NULL,
  `deleted` int(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Gegevens worden geëxporteerd voor tabel `training`
--

INSERT INTO `training` (`id`, `description`, `duration`, `extra_costs`, `deleted`) VALUES
(1, 'trainen', 90, '17', 0),
(2, 'kaas eten', 50, 'null', 1);

--
-- Indexen voor geëxporteerde tabellen
--

--
-- Indexen voor tabel `lesson`
--
ALTER TABLE `lesson`
  ADD PRIMARY KEY (`id`),
  ADD KEY `person_id` (`person_id`),
  ADD KEY `training_id` (`training_id`);

--
-- Indexen voor tabel `person`
--
ALTER TABLE `person`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `loginname` (`loginname`);

--
-- Indexen voor tabel `registration`
--
ALTER TABLE `registration`
  ADD PRIMARY KEY (`id`),
  ADD KEY `person_id` (`person_id`),
  ADD KEY `lesson_id` (`lesson_id`);

--
-- Indexen voor tabel `training`
--
ALTER TABLE `training`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT voor geëxporteerde tabellen
--

--
-- AUTO_INCREMENT voor een tabel `lesson`
--
ALTER TABLE `lesson`
  MODIFY `id` int(25) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT voor een tabel `person`
--
ALTER TABLE `person`
  MODIFY `id` int(25) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;
--
-- AUTO_INCREMENT voor een tabel `registration`
--
ALTER TABLE `registration`
  MODIFY `id` int(25) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT voor een tabel `training`
--
ALTER TABLE `training`
  MODIFY `id` int(25) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- Beperkingen voor geëxporteerde tabellen
--

--
-- Beperkingen voor tabel `lesson`
--
ALTER TABLE `lesson`
  ADD CONSTRAINT `lesson_ibfk_1` FOREIGN KEY (`person_id`) REFERENCES `person` (`id`),
  ADD CONSTRAINT `training_id` FOREIGN KEY (`training_id`) REFERENCES `training` (`id`);

--
-- Beperkingen voor tabel `registration`
--
ALTER TABLE `registration`
  ADD CONSTRAINT `lesson_id` FOREIGN KEY (`lesson_id`) REFERENCES `lesson` (`id`),
  ADD CONSTRAINT `person_id` FOREIGN KEY (`person_id`) REFERENCES `person` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
