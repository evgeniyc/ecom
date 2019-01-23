-- phpMyAdmin SQL Dump
-- version 4.7.9
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Дек 09 2018 г., 13:20
-- Версия сервера: 5.7.21
-- Версия PHP: 7.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `ci`
--

-- --------------------------------------------------------

--
-- Структура таблицы `cats`
--

DROP TABLE IF EXISTS `cats`;
CREATE TABLE IF NOT EXISTS `cats` (
  `id` tinyint(3) UNSIGNED NOT NULL AUTO_INCREMENT,
  `brand` varchar(12) NOT NULL,
  `img` varchar(12) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=29 DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `cats`
--

INSERT INTO `cats` (`id`, `brand`, `img`) VALUES
(26, 'Nokia', 'noki.jpg'),
(25, 'Apple', 'ap.png'),
(24, 'Xiaomi', 'mi.png'),
(22, 'Meizu', 'meiz.png'),
(21, 'Sony', 'son.png'),
(27, 'Lenovo', 'len.png'),
(28, 'Motorola', 'moto.png');

-- --------------------------------------------------------

--
-- Структура таблицы `charact`
--

DROP TABLE IF EXISTS `charact`;
CREATE TABLE IF NOT EXISTS `charact` (
  `id` smallint(5) UNSIGNED NOT NULL,
  `dims` varchar(12) NOT NULL,
  `disp` tinyint(3) UNSIGNED NOT NULL,
  `disp_type` char(4) NOT NULL,
  `cam_size` tinyint(3) UNSIGNED NOT NULL,
  `bat` smallint(5) UNSIGNED NOT NULL,
  `weight` smallint(5) UNSIGNED NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `charact`
--

INSERT INTO `charact` (`id`, `dims`, `disp`, `disp_type`, `cam_size`, `bat`, `weight`) VALUES
(2, '250*100*20', 5, 'IPS', 12, 2700, 250);

-- --------------------------------------------------------

--
-- Структура таблицы `items`
--

DROP TABLE IF EXISTS `items`;
CREATE TABLE IF NOT EXISTS `items` (
  `id` smallint(5) UNSIGNED NOT NULL AUTO_INCREMENT,
  `model` varchar(32) NOT NULL,
  `descr` text NOT NULL,
  `thumb` varchar(16) NOT NULL DEFAULT 'not_photo.jpg',
  `img` smallint(5) UNSIGNED NOT NULL,
  `cat` tinyint(3) UNSIGNED DEFAULT NULL,
  `charact` smallint(5) UNSIGNED NOT NULL,
  `price` smallint(5) UNSIGNED NOT NULL,
  PRIMARY KEY (`id`),
  KEY `model` (`model`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `items`
--

INSERT INTO `items` (`id`, `model`, `descr`, `thumb`, `img`, `cat`, `charact`, `price`) VALUES
(1, 'SP-130', 'Это описание модели SP-130. Это описание модели SP-130. Это описание модели SP-130. Это описание модели SP-130. Это описание модели SP-130. Это описание модели SP-130. Это описание модели SP-130. Это описание модели SP-130. Это описание модели SP-130. Это описание модели SP-130. Это описание модели SP-130. Это описание модели SP-130. Это описание модели SP-130. ', 'meizu2.jpg', 0, 18, 0, 1200),
(2, 'Lumia a100', 'Это небольшое описание модели. Здесь всякое такое описание. Это небольшое описание модели. Здесь всякое такое описание. Это небольшое описание модели. Здесь всякое такое описание. Это небольшое описание модели. Здесь всякое такое описание. Это небольшое описание модели. Здесь всякое такое описание. Это небольшое описание модели. Здесь всякое такое описание. Это небольшое описание модели. Здесь всякое такое описание. Это небольшое описание модели. Здесь всякое такое описание.', 'nokia2.jpg', 0, 26, 0, 2500),
(3, 'IMP-12', 'Это описание модели IMP-12. Это описание модели IMP-12. Это описание модели IMP-12. Это описание модели IMP-12. Это описание модели IMP-12. Это описание модели IMP-12. Это описание модели IMP-12. Это описание модели IMP-12. ', 'meizu2.jpg', 0, 21, 0, 2300);

-- --------------------------------------------------------

--
-- Структура таблицы `item_charact`
--

DROP TABLE IF EXISTS `item_charact`;
CREATE TABLE IF NOT EXISTS `item_charact` (
  `item_id` smallint(5) UNSIGNED NOT NULL,
  `charact` varchar(32) NOT NULL,
  `value` varchar(32) NOT NULL,
  PRIMARY KEY (`item_id`,`charact`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Структура таблицы `orders`
--

DROP TABLE IF EXISTS `orders`;
CREATE TABLE IF NOT EXISTS `orders` (
  `id` smallint(6) NOT NULL AUTO_INCREMENT,
  `item_id` smallint(5) UNSIGNED NOT NULL,
  `qty` tinyint(3) UNSIGNED NOT NULL DEFAULT '1',
  `price` smallint(5) UNSIGNED NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `user` smallint(6) NOT NULL,
  `status` enum('new','processing','done') NOT NULL DEFAULT 'new',
  `payed` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `orders`
--

INSERT INTO `orders` (`id`, `item_id`, `qty`, `price`, `date`, `user`, `status`, `payed`) VALUES
(1, 2, 2, 2500, '2018-12-06 19:56:18', 1, 'new', 0);

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` smallint(5) UNSIGNED NOT NULL AUTO_INCREMENT,
  `login` char(32) NOT NULL,
  `email` varchar(32) NOT NULL,
  `pass` varchar(32) NOT NULL,
  `status` enum('admin','editor','user','') NOT NULL DEFAULT 'user',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`id`, `login`, `email`, `pass`, `status`) VALUES
(1, 'admin', 'admin@mail.com', '21232f297a57a5a743894a0e4a801fc3', 'admin'),
(3, 'editor', 'ditor@mail.com', '5aee9dbd2a188839105073571bee1b1f', 'editor');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
