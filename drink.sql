-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Värd: 127.0.0.1
-- Tid vid skapande: 17 mars 2026 kl 13:49
-- Serverversion: 10.4.32-MariaDB
-- PHP-version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Databas: `drink`
--

-- --------------------------------------------------------

--
-- Tabellstruktur `tbl_drinks`
--

CREATE TABLE `tbl_drinks` (
  `id` int(11) NOT NULL,
  `drinkname` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `ingredients` text NOT NULL,
  `recipe` text NOT NULL,
  `alcoholic` tinyint(4) NOT NULL,
  `rating` float NOT NULL DEFAULT 3 COMMENT '1-5 is rating possibilities'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumpning av Data i tabell `tbl_drinks`
--

INSERT INTO `tbl_drinks` (`id`, `drinkname`, `description`, `ingredients`, `recipe`, `alcoholic`, `rating`) VALUES
(2, 'Bloody Mary', 'Almost a salad, eh?', '6 cl Vodka\r\n20 cl Tomato juice\r\nSalt & pepper\r\nA dash of Tabasco sauce\r\nStalk of sellery for decoration', 'Pour Tomato juice in tall glass.\r\nAdd vodka.\r\nAdd salt, pepper and Tabasco after your own taste.\r\nGarnish with sellery.', 1, 0.5),
(3, 'Atheist revenge', 'Makes you unbelieve.', '10cl Absinthe\r\n10cl Vodka\r\n10cl White Rum\r\n10cl Chocolade sauce', 'Mix all stuff, shake into a big bang.\r\nDrink.', 1, 4.7),
(5, 'Ambatudrink', 'This drink is just what you need to buss!', '30cl Food safe 99% ethanol\r\n50cl Extra creamy cream\r\n', 'Put everything in mixer and shake shake until you bust.', 1, 65),
(7, 'test', 'this drink is a test', '10cl test\r\n10cl test2\r\n5cl test3\r\n2cl test4', 'Add test to bowl\r\nmix in test2\r\nshake\r\nadd test3 and stir\r\nsprinkle on test4', 0, 3);

-- --------------------------------------------------------

--
-- Tabellstruktur `tbl_rating`
--

CREATE TABLE `tbl_rating` (
  `id` int(11) NOT NULL,
  `drink_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `rating` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumpning av Data i tabell `tbl_rating`
--

INSERT INTO `tbl_rating` (`id`, `drink_id`, `user_id`, `rating`) VALUES
(1, 5, 1, 5),
(2, 3, 1, 4),
(3, 2, 1, 1),
(4, 2, 7, 1),
(5, 5, 7, 4),
(6, 3, 7, 1),
(7, 7, 1, 1);

-- --------------------------------------------------------

--
-- Tabellstruktur `tbl_user`
--

CREATE TABLE `tbl_user` (
  `id` int(11) NOT NULL,
  `username` varchar(32) NOT NULL,
  `password` varchar(255) NOT NULL,
  `userlevel` int(11) NOT NULL DEFAULT 5,
  `lastlogin` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `realname` varchar(80) NOT NULL,
  `mail` varchar(100) NOT NULL,
  `created` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumpning av Data i tabell `tbl_user`
--

INSERT INTO `tbl_user` (`id`, `username`, `password`, `userlevel`, `lastlogin`, `realname`, `mail`, `created`) VALUES
(1, 'mans', 'e99a18c428cb38d5f260853678922e03', 67000, '2026-02-13 09:32:54', 'Måns Jansson', 'mans.jansson@hotmail.com', '2026-02-10 13:39:45'),
(2, 'LoveAndLightTV', 'f3d84dfa7dfbabf9e1104c813586f3e5', 10000, '1980-02-02 17:53:21', 'Michael Willis Heard', 'loveandlighttv@gmail.com', '2026-02-26 08:54:55'),
(7, 'noob', 'e99a18c428cb38d5f260853678922e03', 10, '2026-03-10 13:34:10', 'noob', 'noob@noob', '2026-03-10 13:20:58');

--
-- Index för dumpade tabeller
--

--
-- Index för tabell `tbl_drinks`
--
ALTER TABLE `tbl_drinks`
  ADD PRIMARY KEY (`id`);

--
-- Index för tabell `tbl_rating`
--
ALTER TABLE `tbl_rating`
  ADD PRIMARY KEY (`id`);

--
-- Index för tabell `tbl_user`
--
ALTER TABLE `tbl_user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT för dumpade tabeller
--

--
-- AUTO_INCREMENT för tabell `tbl_drinks`
--
ALTER TABLE `tbl_drinks`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT för tabell `tbl_rating`
--
ALTER TABLE `tbl_rating`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT för tabell `tbl_user`
--
ALTER TABLE `tbl_user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
