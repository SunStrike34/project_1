-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1
-- Время создания: Фев 13 2024 г., 19:02
-- Версия сервера: 10.4.27-MariaDB
-- Версия PHP: 8.1.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `project_1`
--

-- --------------------------------------------------------

--
-- Структура таблицы `images`
--

CREATE TABLE `images` (
  `id_image` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `href` varchar(255) NOT NULL,
  `format` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Дамп данных таблицы `images`
--

INSERT INTO `images` (`id_image`, `name`, `href`, `format`) VALUES
(6, '717b19cee8e485ff338b2a7ca54b1ecc', '/project/upload/', 'jpg'),
(10, 'a5b825fe7ffbae8145172c48a0aa5641', '/project/upload/', 'jpg'),
(11, 'e2b6439872154aceb2d22ff62f388a89', '/project/upload/', 'jpg');

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` tinyint(1) NOT NULL,
  `username` varchar(255) DEFAULT NULL,
  `job_title` varchar(255) DEFAULT NULL,
  `status` varchar(255) DEFAULT NULL,
  `image` int(11) DEFAULT NULL,
  `phone` varchar(255) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `vk` varchar(255) DEFAULT NULL,
  `telegram` varchar(255) DEFAULT NULL,
  `instagram` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`id`, `email`, `password`, `role`, `username`, `job_title`, `status`, `image`, `phone`, `address`, `vk`, `telegram`, `instagram`) VALUES
(17, 'admin11444@yan.com', '$2y$10$DaRqhPyo7DclFQRde59vUOKaBZvzIFnmnMiwAGPOo.lG2PrQ5ACGK', 1, 'dtyhkd', 'sdrtykty', 'success', 6, 'sdtyktyk', 'dtykdtyhk', 'dtykd', 'dtykdty', 'dtykdthkd'),
(18, 'oliver.kopyov@smartadminwebap.com', '$2y$10$dJ48W63EoOCR.tPuwJSoCupx/k1ftM52SbTVFZ4U.FVCzpruXEMEy', 0, 'Oliver Kopyov', 'IT Director, Gotbootstrap Inc.', 'success', 10, '45734753457', '15 Charist St, Detroit, MI, 48212, USA', 'asd', 'sdf', 'dfg'),
(19, 'Alita@smartadminwebapp.com', '$2y$10$F7Dh.a5kcMYT2ZjtBMc3huyHgFmWkxK3rFF29RLySyj9TlLTkgksi', 0, 'Alita Gray', 'Project Manager, Gotbootstrap Inc.', 'warning', NULL, '+1 313-461-1347', '134 Hamtrammac, Detroit, MI, 48314, USA', 'asd', 'fgh', 'hjk'),
(20, 'john.cook@smartadminwebapp.com', '$2y$10$Ro8oanPG.1SbQHXI1/Ei/ejo1PKZtUjiVieedMX3laMKQBbc2Kb/e', 0, 'Dr. John Cook PhD', 'Human Resources, Gotbootstrap Inc.', 'danger', NULL, '+1 313-779-1347', '55 Smyth Rd, Detroit, MI, 48341, USA', 'zxcv', 'zxs', 'sdf');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `images`
--
ALTER TABLE `images`
  ADD PRIMARY KEY (`id_image`);

--
-- Индексы таблицы `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `images`
--
ALTER TABLE `images`
  MODIFY `id_image` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT для таблицы `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
