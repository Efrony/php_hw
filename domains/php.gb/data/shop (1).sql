-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Июн 27 2019 г., 23:45
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
-- Структура таблицы `cart`
--

CREATE TABLE `cart` (
  `id` int(11) NOT NULL,
  `id_session` int(11) NOT NULL,
  `id_product` int(11) NOT NULL,
  `quantity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Дамп данных таблицы `cart`
--

INSERT INTO `cart` (`id`, `id_session`, `id_product`, `quantity`) VALUES
(1, 1, 1, 1),
(2, 2, 2, 2),
(3, 444, 44444, 3),
(160, 111, 6, 1),
(168, 111, 13, 1),
(172, 222, 4, 1),
(177, 222, 7, 1),
(181, 222, 9, 1),
(183, 222, 8, 1);

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
  `rating` int(11) NOT NULL,
  `color` varchar(45) COLLATE utf8_bin DEFAULT NULL,
  `discription` varchar(200) COLLATE utf8_bin DEFAULT NULL,
  `price` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Дамп данных таблицы `product`
--

INSERT INTO `product` (`id`, `name`, `rating`, `color`, `discription`, `price`) VALUES
(3, 'jersey', 21, 'red', 'Compellingly actualize fully researched processes before proactive outsourcing. Progressively syndicate collaborative architectures before cutting-edge services.', 20),
(4, 'jersey', 9, 'red', 'Compellingly actualize fully researched processes before proactive outsourcing. Progressively syndicate collaborative architectures before cutting-edge services.', 21),
(5, 'pants', 2, 'black', 'Compellingly actualize fully researched processes before proactive outsourcing. Progressively syndicate collaborative architectures before cutting-edge services.', 22),
(6, 'pants', 38, 'black', 'Compellingly actualize fully researched processes before proactive outsourcing. Progressively syndicate collaborative architectures before cutting-edge services.', 23),
(7, 'pants', 3, 'black', 'Compellingly actualize fully researched processes before proactive outsourcing. Progressively syndicate collaborative architectures before cutting-edge services.', 24),
(8, 'pants', 2, 'green', 'Compellingly actualize fully researched processes before proactive outsourcing. Progressively syndicate collaborative architectures before cutting-edge services.', 40),
(9, 'pants', 1, 'green', 'Compellingly actualize fully researched processes before proactive outsourcing. Progressively syndicate collaborative architectures before cutting-edge services.', 35),
(10, 'pants', 3, 'green', 'Compellingly actualize fully researched processes before proactive outsourcing. Progressively syndicate collaborative architectures before cutting-edge services.', 36),
(11, 'sweatshirt', 68, 'blue', 'Compellingly actualize fully researched processes before proactive outsourcing. Progressively syndicate collaborative architectures before cutting-edge services.', 32),
(12, 'sweatshirt', 27, 'blue', 'Compellingly actualize fully researched processes before proactive outsourcing. Progressively syndicate collaborative architectures before cutting-edge services.', 23),
(13, 'sweatshirt', 64, 'red', 'Compellingly actualize fully researched processes before proactive outsourcing. Progressively syndicate collaborative architectures before cutting-edge services.', 43),
(14, 'sweatshirt', 21, 'red', 'Compellingly actualize fully researched processes before proactive outsourcing. Progressively syndicate collaborative architectures before cutting-edge services.', 54);

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`id`);

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
-- AUTO_INCREMENT для таблицы `cart`
--
ALTER TABLE `cart`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=184;

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
