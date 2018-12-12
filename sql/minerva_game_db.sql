-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Czas generowania: 12 Gru 2018, 20:21
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
-- Baza danych: `minerva_game_db`
--

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `banned_users`
--

CREATE TABLE `banned_users` (
  `user` varchar(20) COLLATE utf8_polish_ci NOT NULL,
  `banning_date` datetime NOT NULL,
  `nick_change_required` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

--
-- Zrzut danych tabeli `banned_users`
--

INSERT INTO `banned_users` (`user`, `banning_date`, `nick_change_required`) VALUES
('mariola', '2019-01-03 19:26:19', 1);

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
('admin', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
('adrian', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
('andus', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
('gosia', 91406, 21115, 10, 5386, 45, 0, 0, 0, 0, 0, 111, 2316),
('mariola', 185, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0);

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
('admin', 0, 0, '2018-11-23 22:20:30', '2018-11-23 22:20:30'),
('adrian', 0, 0, '2018-12-02 10:05:38', '2018-12-02 10:05:38'),
('andus', 0, 0, '2018-11-05 22:07:53', '2018-11-05 22:07:53'),
('gosia', 0, 0, '2018-12-05 23:06:55', '2018-12-05 23:07:05'),
('mariola', 0, 0, '2018-11-16 10:28:49', '2018-11-16 10:28:59');

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
(5, 'Anduskowo', 5, 'Anduskowo to gildia dla fanÃ³w butÃ³w aaaaa', 1, 1800, 'guild-avatar.JPG');

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
('admin', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '2018-11-23 22:20:30'),
('adrian', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '2018-12-02 10:05:38'),
('andus', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '2018-11-05 22:07:53'),
('gosia', 6, 2, 0, 1, 0, 0, 0, 0, 0, 0, 1, 0, '2018-11-22 23:55:10'),
('mariola', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '2018-11-15 23:20:43');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `moderators`
--

CREATE TABLE `moderators` (
  `user` varchar(20) COLLATE utf8_polish_ci NOT NULL,
  `advance_date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

--
-- Zrzut danych tabeli `moderators`
--

INSERT INTO `moderators` (`user`, `advance_date`) VALUES
('gosia', '2018-11-25 00:01:56');

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
('admin', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
('adrian', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
('andus', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
('gosia', 450, NULL, 26, NULL, 17, 52, NULL, NULL, NULL),
('mariola', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);

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
('admin', 0, 0, '2018-11-23 22:20:30', '2018-11-23 22:20:30'),
('adrian', 0, 0, '2018-12-02 10:05:38', '2018-12-02 10:05:38'),
('andus', 0, 0, '2018-11-05 22:07:53', '2018-11-05 22:07:53'),
('gosia', 0, 0, '2018-12-05 22:59:01', '2018-12-05 22:59:21'),
('mariola', 0, 0, '2018-11-16 09:43:14', '2018-11-16 09:43:34');

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
(5, 'gosia', '$2y$10$S9dy4finqnmxHrtgAzn0duLy5/MjeyIEnqcj.z7ZDIztv97OYkhaG', 'gosia@op.pl', 10, 12954161, '2018-11-25 19:01:29', 46521, 5),
(6, 'andus', '$2y$10$1ag0xfUOqkFloV4kRyc9BOscg0EhwAJT31iyVitaJsp7atVZg/HiG', 'andus@op.pl', 1, 1, '2018-11-05 22:07:53', 5, 0),
(8, 'mariola', '$2y$10$tgKOG3Va6nbGDwKDqNsIzucxAILM.Pc3pXvQvh4iOwxjX0XeiShxS', 'maria@op.pl', 2, 1199, '2018-11-18 23:20:43', 993, 0),
(9, 'admin', '$2y$10$5WyGDcTvaverKGK.B49AwOWHSJ4G5pSpaOPj4GualrqhhjX6wGXPW', 'admin@gmail.com', 1, 1, '2018-11-26 22:20:30', 5, 0),
(10, 'adrian', '$2y$10$c.SFU9OrkFmh7DW7KeacWudVGZoBlTMP7MRAzYNSafbB9TfK3Xy4C', 'adrian@op.pl', 1, 1, '2018-12-05 10:05:38', 5, 0);

--
-- Indeksy dla zrzutów tabel
--

--
-- Indeksy dla tabeli `banned_users`
--
ALTER TABLE `banned_users`
  ADD PRIMARY KEY (`user`);

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
-- Indeksy dla tabeli `moderators`
--
ALTER TABLE `moderators`
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
  MODIFY `id_guild` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT dla tabeli `user_data`
--
ALTER TABLE `user_data`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
