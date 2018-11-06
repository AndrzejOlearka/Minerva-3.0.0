-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Czas generowania: 06 Lis 2018, 02:35
-- Wersja serwera: 10.1.36-MariaDB
-- Wersja PHP: 7.2.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Baza danych: `minervabase`
--

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `basic_equipment`
--

CREATE TABLE `basic_equipment` (
  `user` varchar(20) COLLATE utf8_polish_ci NOT NULL,
  `ambers` int(11) NOT NULL,
  `agates` int(11) NOT NULL,
  `malachites` int(11) NOT NULL,
  `turquoises` int(11) NOT NULL,
  `amethysts` int(11) NOT NULL,
  `topazes` int(11) NOT NULL,
  `emeralds` int(11) NOT NULL,
  `rubies` int(11) NOT NULL,
  `sapphires` int(11) NOT NULL,
  `diamonds` int(11) NOT NULL,
  `silver` int(11) NOT NULL,
  `gold` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

--
-- Zrzut danych tabeli `basic_equipment`
--

INSERT INTO `basic_equipment` (`user`, `ambers`, `agates`, `malachites`, `turquoises`, `amethysts`, `topazes`, `emeralds`, `rubies`, `sapphires`, `diamonds`, `silver`, `gold`) VALUES
('adrian', 9, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
('andus', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
('gosia', 42238, 4521, 0, 1143, 45, 0, 0, 0, 0, 0, 0, 0);

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `expeditions_data`
--

CREATE TABLE `expeditions_data` (
  `user` varchar(20) COLLATE utf8_polish_ci NOT NULL,
  `expedition_number` int(11) NOT NULL,
  `expedition_prize` tinyint(1) NOT NULL,
  `expedition_start` datetime NOT NULL,
  `expedition_end` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

--
-- Zrzut danych tabeli `expeditions_data`
--

INSERT INTO `expeditions_data` (`user`, `expedition_number`, `expedition_prize`, `expedition_start`, `expedition_end`) VALUES
('adrian', 0, 1, '2018-11-05 22:32:14', '2018-11-05 22:32:24'),
('andus', 0, 0, '2018-11-05 22:07:53', '2018-11-05 22:07:53'),
('gosia', 0, 0, '2018-11-06 00:03:04', '2018-11-06 00:03:10');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `guilds_data`
--

CREATE TABLE `guilds_data` (
  `id_guild` int(11) NOT NULL,
  `guild_name` varchar(20) COLLATE utf8_polish_ci NOT NULL,
  `guild_leader` int(11) NOT NULL,
  `guild_description` text COLLATE utf8_polish_ci NOT NULL,
  `guild_members` int(11) NOT NULL,
  `guild_exp` int(11) NOT NULL,
  `guild_avatar` varchar(255) COLLATE utf8_polish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

--
-- Zrzut danych tabeli `guilds_data`
--

INSERT INTO `guilds_data` (`id_guild`, `guild_name`, `guild_leader`, `guild_description`, `guild_members`, `guild_exp`, `guild_avatar`) VALUES
(4, 'Anduskowo', 5, 'Anduskowo to gildia dla fanÃ³w butÃ³w aaaaa', 1, 0, 'guild-avatar.JPG');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `mines_data`
--

CREATE TABLE `mines_data` (
  `user` varchar(20) COLLATE utf8_polish_ci NOT NULL,
  `mines_ambers` int(11) NOT NULL,
  `mines_agates` int(11) NOT NULL,
  `mines_malachites` int(11) NOT NULL,
  `mines_turquoises` int(11) NOT NULL,
  `mines_amethysts` int(11) NOT NULL,
  `mines_topazes` int(11) NOT NULL,
  `mines_emeralds` int(11) NOT NULL,
  `mines_rubies` int(11) NOT NULL,
  `mines_sapphires` int(11) NOT NULL,
  `mines_diamonds` int(11) NOT NULL,
  `mines_gold` int(11) NOT NULL,
  `mines_silver` int(11) NOT NULL,
  `daily_prize` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

--
-- Zrzut danych tabeli `mines_data`
--

INSERT INTO `mines_data` (`user`, `mines_ambers`, `mines_agates`, `mines_malachites`, `mines_turquoises`, `mines_amethysts`, `mines_topazes`, `mines_emeralds`, `mines_rubies`, `mines_sapphires`, `mines_diamonds`, `mines_gold`, `mines_silver`, `daily_prize`) VALUES
('adrian', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '2018-11-05 22:31:12'),
('andus', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '2018-11-05 22:07:53'),
('gosia', 1, 2, 0, 1, 0, 0, 0, 0, 0, 0, 0, 0, '2018-11-05 20:00:06');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `rare_equipment`
--

CREATE TABLE `rare_equipment` (
  `user` varchar(20) COLLATE utf8_polish_ci NOT NULL,
  `crystals` int(11) DEFAULT NULL,
  `morganites` int(11) DEFAULT NULL,
  `fluorites` int(11) DEFAULT NULL,
  `painites` int(11) DEFAULT NULL,
  `aquamarines` int(11) DEFAULT NULL,
  `jadeites` int(11) DEFAULT NULL,
  `cymophanes` int(11) DEFAULT NULL,
  `opals` int(11) DEFAULT NULL,
  `pearls` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

--
-- Zrzut danych tabeli `rare_equipment`
--

INSERT INTO `rare_equipment` (`user`, `crystals`, `morganites`, `fluorites`, `painites`, `aquamarines`, `jadeites`, `cymophanes`, `opals`, `pearls`) VALUES
('adrian', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
('andus', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
('gosia', NULL, NULL, 9, NULL, 17, 7, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `trips_data`
--

CREATE TABLE `trips_data` (
  `user` varchar(20) COLLATE utf8_polish_ci NOT NULL,
  `trip_number` int(11) NOT NULL,
  `trip_prize` tinyint(1) NOT NULL,
  `trip_start` datetime NOT NULL,
  `trip_end` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

--
-- Zrzut danych tabeli `trips_data`
--

INSERT INTO `trips_data` (`user`, `trip_number`, `trip_prize`, `trip_start`, `trip_end`) VALUES
('adrian', 0, 0, '2018-11-05 22:31:12', '2018-11-05 22:31:12'),
('andus', 0, 0, '2018-11-05 22:07:53', '2018-11-05 22:07:53'),
('gosia', 0, 0, '2018-11-06 01:01:02', '2018-11-06 01:01:15');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `user_data`
--

CREATE TABLE `user_data` (
  `id` int(11) NOT NULL,
  `user` varchar(20) COLLATE utf8_polish_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_polish_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_polish_ci NOT NULL,
  `level` int(20) NOT NULL,
  `exp` int(20) NOT NULL,
  `premium_end` datetime NOT NULL,
  `coins` int(20) NOT NULL,
  `id_guild` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

--
-- Zrzut danych tabeli `user_data`
--

INSERT INTO `user_data` (`id`, `user`, `password`, `email`, `level`, `exp`, `premium_end`, `coins`, `id_guild`) VALUES
(5, 'gosia', '$2y$10$S9dy4finqnmxHrtgAzn0duLy5/MjeyIEnqcj.z7ZDIztv97OYkhaG', 'gosia@op.pl', 10, 5663011, '2018-11-07 12:17:08', 18576, 4),
(6, 'andus', '$2y$10$1ag0xfUOqkFloV4kRyc9BOscg0EhwAJT31iyVitaJsp7atVZg/HiG', 'andus@op.pl', 1, 1, '2018-11-05 22:07:53', 5, 0),
(7, 'adrian', '$2y$10$elwnPwlqULhUNr98rBhgQ.8o7H9bUXKO7W0yE/3JgweUhX/80iZsG', 'adrian@op.pl', 1, 201, '2018-11-05 22:31:11', 3, 0);

--
-- Indeksy dla zrzutów tabel
--

--
-- Indeksy dla tabeli `basic_equipment`
--
ALTER TABLE `basic_equipment`
  ADD PRIMARY KEY (`user`);

--
-- Indeksy dla tabeli `expeditions_data`
--
ALTER TABLE `expeditions_data`
  ADD PRIMARY KEY (`user`);

--
-- Indeksy dla tabeli `guilds_data`
--
ALTER TABLE `guilds_data`
  ADD PRIMARY KEY (`id_guild`);

--
-- Indeksy dla tabeli `mines_data`
--
ALTER TABLE `mines_data`
  ADD PRIMARY KEY (`user`);

--
-- Indeksy dla tabeli `rare_equipment`
--
ALTER TABLE `rare_equipment`
  ADD PRIMARY KEY (`user`);

--
-- Indeksy dla tabeli `trips_data`
--
ALTER TABLE `trips_data`
  ADD PRIMARY KEY (`user`);

--
-- Indeksy dla tabeli `user_data`
--
ALTER TABLE `user_data`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT dla tabeli `guilds_data`
--
ALTER TABLE `guilds_data`
  MODIFY `id_guild` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT dla tabeli `user_data`
--
ALTER TABLE `user_data`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
