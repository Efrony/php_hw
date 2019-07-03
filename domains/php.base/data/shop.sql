-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Июн 30 2019 г., 18:24
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
  `id_session` varchar(60) COLLATE utf8_bin NOT NULL,
  `id_product` int(11) NOT NULL,
  `quantity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Дамп данных таблицы `cart`
--

INSERT INTO `cart` (`id`, `id_session`, `id_product`, `quantity`) VALUES
(210, '9bet2losuj2gf6ju5si89ocq16a54dru', 12, 1),
(211, '9bet2losuj2gf6ju5si89ocq16a54dru', 12, 1),
(212, '9bet2losuj2gf6ju5si89ocq16a54dru', 12, 1),
(219, 'vgrosrl491j3fo7k2cjn5g943o11gh68', 12, 1),
(220, 'vgrosrl491j3fo7k2cjn5g943o11gh68', 6, 1),
(221, 'vgrosrl491j3fo7k2cjn5g943o11gh68', 13, 1),
(222, '4q6kee13a3gqcsl4p37os59kt9hqm4fg', 11, 1),
(223, 'dq4lpv589g07csvp3lnge5v4hnq0huef', 13, 1),
(224, 'dq4lpv589g07csvp3lnge5v4hnq0huef', 13, 1),
(225, 'dq4lpv589g07csvp3lnge5v4hnq0huef', 13, 1),
(226, 'dq4lpv589g07csvp3lnge5v4hnq0huef', 13, 1),
(227, 'dq4lpv589g07csvp3lnge5v4hnq0huef', 6, 1),
(228, 'dq4lpv589g07csvp3lnge5v4hnq0huef', 6, 1),
(229, 'dq4lpv589g07csvp3lnge5v4hnq0huef', 6, 1),
(230, 'dq4lpv589g07csvp3lnge5v4hnq0huef', 6, 1),
(231, 'dq4lpv589g07csvp3lnge5v4hnq0huef', 6, 1);

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
(13, 104, '4535435345345', '324233434324444444444', '2019-06-24 13:32:24', '432@43243244343242344444444444'),
(4, 105, 'rwer', 'rwew', '2019-06-30 11:47:30', '432@43243244343242344444444444');

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
(4, 'jersey', 10, 'red', 'Compellingly actualize fully researched processes before proactive outsourcing. Progressively syndicate collaborative architectures before cutting-edge services.', 21),
(5, 'pants', 3, 'black', 'Compellingly actualize fully researched processes before proactive outsourcing. Progressively syndicate collaborative architectures before cutting-edge services.', 22),
(6, 'pants', 38, 'black', 'Compellingly actualize fully researched processes before proactive outsourcing. Progressively syndicate collaborative architectures before cutting-edge services.', 23),
(7, 'pants', 3, 'black', 'Compellingly actualize fully researched processes before proactive outsourcing. Progressively syndicate collaborative architectures before cutting-edge services.', 24),
(8, 'pants', 2, 'green', 'Compellingly actualize fully researched processes before proactive outsourcing. Progressively syndicate collaborative architectures before cutting-edge services.', 40),
(9, 'pants', 1, 'green', 'Compellingly actualize fully researched processes before proactive outsourcing. Progressively syndicate collaborative architectures before cutting-edge services.', 35),
(10, 'pants', 3, 'green', 'Compellingly actualize fully researched processes before proactive outsourcing. Progressively syndicate collaborative architectures before cutting-edge services.', 36),
(11, 'sweatshirt', 68, 'blue', 'Compellingly actualize fully researched processes before proactive outsourcing. Progressively syndicate collaborative architectures before cutting-edge services.', 32),
(12, 'sweatshirt', 29, 'blue', 'Compellingly actualize fully researched processes before proactive outsourcing. Progressively syndicate collaborative architectures before cutting-edge services.', 23),
(13, 'sweatshirt', 65, 'red', 'Compellingly actualize fully researched processes before proactive outsourcing. Progressively syndicate collaborative architectures before cutting-edge services.', 43),
(14, 'sweatshirt', 21, 'red', 'Compellingly actualize fully researched processes before proactive outsourcing. Progressively syndicate collaborative architectures before cutting-edge services.', 54);

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(45) COLLATE utf8_bin NOT NULL,
  `email` varchar(100) COLLATE utf8_bin NOT NULL,
  `password` varchar(100) COLLATE utf8_bin NOT NULL,
  `phone` varchar(45) COLLATE utf8_bin NOT NULL,
  `hash` varchar(120) COLLATE utf8_bin DEFAULT NULL,
  `id_cart_session` varchar(45) COLLATE utf8_bin DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `phone`, `hash`, `id_cart_session`) VALUES
(47, 'admin', 'admin@admin.com', '$2y$10$o/uFwQ9t5Ogqd8z1yxBS3e1NMygXTk/8ciYj8zy11zhrO.jXK4qc.', '999', '14986416925d18d41c93f3b8.02856505', 'vgrosrl491j3fo7k2cjn5g943o11gh68'),
(48, 'admin', 'admin@admin.ru', '$2y$10$/RE0jzgEzFqw7Q6uSWP3JeDK/4o3S9en5cq/sYWk0N4QMCtldY3OC', '999', '18396495235d18d39f08fdc7.57894595', '4q6kee13a3gqcsl4p37os59kt9hqm4fg'),
(50, '', 'efron.vit@gmail.com', '$2y$10$7WBTGzHlqoXGSzDg.wqoreORvOEK89SDbVqkbWW0kOD./lCJ0Iyp.', '123', '7004530325d18d2c6ec32e4.26357871', 'dq4lpv589g07csvp3lnge5v4hnq0huef');

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
-- Индексы таблицы `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `cart`
--
ALTER TABLE `cart`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=232;

--
-- AUTO_INCREMENT для таблицы `comments`
--
ALTER TABLE `comments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=106;

--
-- AUTO_INCREMENT для таблицы `product`
--
ALTER TABLE `product`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;

--
-- AUTO_INCREMENT для таблицы `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
