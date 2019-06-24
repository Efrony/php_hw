-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Июн 24 2019 г., 20:49
-- Версия сервера: 8.0.15
-- Версия PHP: 7.2.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `shop`
--

-- --------------------------------------------------------

--
-- Структура таблицы `comments`
--

CREATE TABLE `comments` (
  `id_product` int(11) DEFAULT NULL,
  `id` int(11) NOT NULL,
  `text` varchar(200) COLLATE utf8_bin NOT NULL,
  `name` varchar(45) COLLATE utf8_bin NOT NULL,
  `date` datetime DEFAULT NULL,
  `email` varchar(45) COLLATE utf8_bin DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Дамп данных таблицы `comments`
--

INSERT INTO `comments` (`id_product`, `id`, `text`, `name`, `date`, `email`) VALUES
(12, 90, 'ПРИВЕТ', 'admin', '2019-06-24 00:13:24', 'admin@admin'),
(13, 93, 'Отличный магаз!', 'Гость', '2019-06-24 00:14:24', '432@4324324'),
(3, 99, 'comment', 'коммент', '2019-06-24 13:13:24', 'comment@com'),
(3, 100, 'fefsf', 'dgggdfg', '2019-06-24 13:13:24', '432@43243244343242344444444444'),
(11, 101, 'ыыыыыыыыыыыыыыыыыыыыыыыыыыыыыыыыы', 'admin', '2019-06-24 13:15:24', 'admin@admin'),
(13, 103, '4534534', 'dgggdfg', '2019-06-24 13:32:24', '432@43243244343242344444444444'),
(13, 104, '4535435345345', '324233434324444444444', '2019-06-24 13:32:24', '432@43243244343242344444444444');

-- --------------------------------------------------------

--
-- Структура таблицы `product`
--

CREATE TABLE `product` (
  `id` int(11) NOT NULL,
  `name` varchar(45) COLLATE utf8_bin NOT NULL,
  `rating` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Дамп данных таблицы `product`
--

INSERT INTO `product` (`id`, `name`, `rating`) VALUES
(3, 'jersey_red_0.jpg', 20),
(4, 'jersey_red_1.jpg', 4),
(5, 'pants_black_0.jpg', 2),
(6, 'pants_black_1.jpg', 24),
(7, 'pants_black_2.jpg', 2),
(8, 'pants_green_0.jpg', 2),
(9, 'pants_green_1.jpg', 1),
(10, 'pants_green_2.jpg', 2),
(11, 'sweatshirt_blue_0.jpg', 50),
(12, 'sweatshirt_blue_1.jpg', 25),
(13, 'sweatshirt_red_0.jpg', 34),
(14, 'sweatshirt_red_1.jpg', 8);

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `comments`
--
ALTER TABLE `comments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=105;

--
-- AUTO_INCREMENT для таблицы `product`
--
ALTER TABLE `product`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
