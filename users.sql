-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Сен 15 2020 г., 23:07
-- Версия сервера: 5.7.25
-- Версия PHP: 7.2.22

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `tasklist`
--

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `login` varchar(16) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password_hash` varchar(60) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`id`, `login`, `password_hash`, `created_at`) VALUES
(5, 'admin', '$2y$10$zLg.gQR62gBiQEkZJVfRTuNgYyur.uGOUECo3nLSydP0uL0gc41ri', '2020-09-15 15:56:11'),
(6, 'check', '$2y$10$BEi3.sBCuJJQwwxfT7v4QOVDpekRNu9m7x8kPdHtbPKkr5u4ptHHe', '2020-09-15 16:12:39'),
(7, 'nnnn', '$2y$10$GV6QnNYZO6uQVS36hjPfY.lPWqtejzr8GSptqpumeQLVdbFq5AZv2', '2020-09-15 16:33:36'),
(8, 'check1', '$2y$10$EeMO.1u8vAT/mca8.UoIfOR6Dpsmpypsqa6QzKa.6qTE3zy1nzdYK', '2020-09-15 16:40:49'),
(9, 'Hend', '$2y$10$a/qAqR7dgF7ymHzSYMk70Oz58073wAVWmd9CFLo.1B1Lwr/UUkGHO', '2020-09-15 16:47:55'),
(10, 'Admin2', '$2y$10$Qgdxt.o/8AmV.fcemlgRTeCrUJxVXO4L4/VaHOG2v/Ed/imcQY3Ci', '2020-09-15 17:04:57'),
(11, 'admin3', '$2y$10$D9WFvKuABr.onhGDS6R7MeU0edn1UWA2ihaYId0JcCy17aXPjJGpC', '2020-09-15 17:08:10');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
