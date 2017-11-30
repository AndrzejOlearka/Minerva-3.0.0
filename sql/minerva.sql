-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Czas generowania: 30 Lis 2017, 18:33
-- Wersja serwera: 10.1.26-MariaDB
-- Wersja PHP: 7.1.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Baza danych: `minerva`
--

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `minerva`
--

CREATE TABLE `minerva` (
  `id` int(11) NOT NULL,
  `user` text COLLATE utf8_polish_ci NOT NULL,
  `password` text COLLATE utf8_polish_ci NOT NULL,
  `email` text COLLATE utf8_polish_ci NOT NULL,
  `bursztyny` int(11) NOT NULL,
  `agaty` int(11) NOT NULL,
  `malachity` int(11) NOT NULL,
  `turkusy` int(11) NOT NULL,
  `ametysty` int(11) NOT NULL,
  `topazy` int(11) NOT NULL,
  `szmaragdy` int(11) NOT NULL,
  `rubiny` int(11) NOT NULL,
  `szafiry` int(11) NOT NULL,
  `diamenty` int(11) NOT NULL,
  `srebro` int(11) NOT NULL,
  `zloto` int(11) NOT NULL,
  `monety` int(1) UNSIGNED NOT NULL,
  `exp` int(11) NOT NULL,
  `level` int(11) NOT NULL,
  `dnipremium` int(11) NOT NULL,
  `nrzadania` int(11) NOT NULL,
  `czasrozpoczecia` datetime DEFAULT '0000-00-00 00:00:00',
  `czaszakonczenia` datetime DEFAULT '0000-00-00 00:00:00',
  `kopalnia1` int(11) NOT NULL,
  `kopalnia2` int(11) NOT NULL,
  `kopalnia3` int(11) NOT NULL,
  `kopalnia4` int(11) NOT NULL,
  `kopalnia5` int(11) NOT NULL,
  `kopalnia6` int(11) NOT NULL,
  `kopalnia7` int(11) NOT NULL,
  `kopalnia8` int(11) NOT NULL,
  `kopalnia9` int(11) NOT NULL,
  `kopalnia10` int(11) NOT NULL,
  `kopalnia11` int(11) NOT NULL,
  `kopalnia12` int(11) NOT NULL,
  `nagrodastart` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

--
-- Zrzut danych tabeli `minerva`
--

INSERT INTO `minerva` (`id`, `user`, `password`, `email`, `bursztyny`, `agaty`, `malachity`, `turkusy`, `ametysty`, `topazy`, `szmaragdy`, `rubiny`, `szafiry`, `diamenty`, `srebro`, `zloto`, `monety`, `exp`, `level`, `dnipremium`, `nrzadania`, `czasrozpoczecia`, `czaszakonczenia`, `kopalnia1`, `kopalnia2`, `kopalnia3`, `kopalnia4`, `kopalnia5`, `kopalnia6`, `kopalnia7`, `kopalnia8`, `kopalnia9`, `kopalnia10`, `kopalnia11`, `kopalnia12`, `nagrodastart`) VALUES
(1, 'admin', 'pojeb111', 'olejek111@gmail.com', 100, 100, 100, 100, 100, 100, 100, 100, 100, 100, 100, 100, 100, 100, 100, 1, 0, '2017-10-30 00:00:00', NULL, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '0000-00-00'),
(2, 'admin2', 'pojeb111', 'ando@gmail.com', 100, 100, 100, 100, 100, 100, 100, 100, 100, 100, 100, 100, 100, 100, 100, 1, 0, '2017-10-30 00:00:00', NULL, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '0000-00-00'),
(31, 'andus', '$2y$10$/gPg9G34Z5nu6at60xUOwum2ilo53rj.nwEVHdHafeG/9Jmzdv1/y', 'andus123@gmail.com', 12672, 22091, 6863, 1221, 701, 477, 240, 157, 67, 39, 2875, 2245, 52166, 71248, 6, 1, 0, '2017-11-30 17:36:19', '2017-11-30 17:36:29', 5, 5, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, '2017-12-01'),
(58, 'Adrianek', '$2y$10$nIj.yKH55RaNq2SEPD3rG.mRW8CScR7nXe/k5UbamN9YgHZzNkODy', 'olea@gmail.com', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 5, 1, 1, 1, 0, '2017-10-30 00:00:00', NULL, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '0000-00-00'),
(59, 'bambusek', '$2y$10$ospiWoVC4zFsoxVH6WT7nulbOEbfqIqQW6SBemD9P.OwXSTHRv3wC', 'olejek141@gmail.com', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 5, 1, 1, 1, 0, '2017-10-30 00:00:00', NULL, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '0000-00-00'),
(60, 'gumijagody', '$2y$10$501EM5asSwzGxLE7d1yqOOpn4g5YGMnUcC452LYLY9kkx0OQ7fl8m', 'olejek43@gmail.com', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 5, 1, 1, 1, 0, '2017-10-30 00:00:00', NULL, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '0000-00-00'),
(66, 'andzia', '$2y$10$fli33bAv9iKcgH8pnQ88J.3tzOgLnl6hST1mHKwzWD0zhnnFORAX2', 'ole43@gmail.com', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 5, 1, 1, 1, 0, '2017-10-30 00:00:00', NULL, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '0000-00-00'),
(67, 'gosia', '$2y$10$L3JBX7P0hOePK1L8KRhWUOPBvTH9uLt21ag7CKYr/7BmR7EOnFmXe', 'panda123@gmail.com', 12, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 3, 201, 1, 1, 0, '2017-11-16 14:20:37', '2017-11-16 14:20:47', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '2017-11-14');

--
-- Indeksy dla zrzutów tabel
--

--
-- Indexes for table `minerva`
--
ALTER TABLE `minerva`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT dla tabeli `minerva`
--
ALTER TABLE `minerva`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=68;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
