-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1
-- Время создания: Мар 02 2020 г., 08:36
-- Версия сервера: 10.1.35-MariaDB
-- Версия PHP: 7.2.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `web_16102019_shop`
--
CREATE DATABASE IF NOT EXISTS `web_16102019_shop` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `web_16102019_shop`;

-- --------------------------------------------------------

--
-- Структура таблицы `catalogs`
--

CREATE TABLE IF NOT EXISTS `catalogs` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `catalogs`
--

INSERT INTO `catalogs` (`id`, `name`) VALUES
(1, 'Мужское'),
(2, 'Женское'),
(3, 'Детям'),
(4, 'Новинкам');

-- --------------------------------------------------------

--
-- Структура таблицы `catalogs_products`
--

CREATE TABLE IF NOT EXISTS `catalogs_products` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `product_id` int(11) NOT NULL,
  `catalog_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `catalogs_products`
--

INSERT INTO `catalogs_products` (`id`, `product_id`, `catalog_id`) VALUES
(1, 1, 1),
(2, 2, 1),
(3, 2, 4),
(4, 3, 1),
(5, 4, 1),
(6, 5, 1),
(7, 6, 1),
(8, 7, 1),
(9, 8, 1),
(10, 9, 1),
(11, 10, 1),
(12, 11, 1),
(13, 12, 1),
(14, 13, 1),
(15, 14, 1),
(16, 15, 1),
(17, 16, 1);

-- --------------------------------------------------------

--
-- Структура таблицы `clients`
--

CREATE TABLE IF NOT EXISTS `clients` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(100) NOT NULL,
  `create_date` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `clients`
--

INSERT INTO `clients` (`id`, `email`, `create_date`) VALUES
(1, '660321@yandex.ru', '2020-03-02 10:33:58');

-- --------------------------------------------------------

--
-- Структура таблицы `managers`
--

CREATE TABLE IF NOT EXISTS `managers` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `fio` varchar(255) NOT NULL,
  `email` varchar(200) NOT NULL,
  `pass` varchar(100) NOT NULL,
  `access` varchar(10) NOT NULL DEFAULT 'NO',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `managers`
--

INSERT INTO `managers` (`id`, `fio`, `email`, `pass`, `access`) VALUES
(1, 'Вячеслав Жуков', 'slava.zhukov@gmail.com', 'admin', 'YES');

-- --------------------------------------------------------

--
-- Структура таблицы `products`
--

CREATE TABLE IF NOT EXISTS `products` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `active` enum('0','1') NOT NULL DEFAULT '1',
  `name` varchar(255) NOT NULL,
  `price` float NOT NULL,
  `photo` varchar(255) NOT NULL,
  `sku` varchar(255) NOT NULL,
  `description` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `products`
--

INSERT INTO `products` (`id`, `active`, `name`, `price`, `photo`, `sku`, `description`) VALUES
(1, '1', 'Ботинки', 5400, '/images/catalog/10.jpg', '425453', 'Описание про ботинки'),
(2, '1', 'Кожаная куртка', 22500, '/images/catalog/2.jpg', '8459845', 'Описание про кожаную куртку'),
(3, '1', 'Куртка синяя 2', 5400, '/images/catalog/1.jpg', '425453', 'Описание про синею куртку 2'),
(4, '1', 'Кожаная куртка 2', 22500, '/images/catalog/2.jpg', '8459845', 'Описание про кожаную куртку 2'),
(5, '1', 'Куртка синяя 3', 5400, '/images/catalog/1.jpg', '425453', 'Описание про синею куртку'),
(6, '1', 'Кожаная куртка 3', 22500, '/images/catalog/2.jpg', '8459845', 'Описание про кожаную куртку'),
(7, '1', 'Куртка синяя 4', 5400, '/images/catalog/1.jpg', '425453', 'Описание про синею куртку 4'),
(8, '1', 'Кожаная куртка 4', 22500, '/images/catalog/2.jpg', '8459845', 'Описание про кожаную куртку 4'),
(9, '1', 'Куртка синяя 5', 5400, '/images/catalog/1.jpg', '425453', 'Описание про синею куртку'),
(10, '1', 'Кожаная куртка 5', 22500, '/images/catalog/2.jpg', '8459845', 'Описание про кожаную куртку'),
(11, '1', 'Куртка синяя 6', 5400, '/images/catalog/1.jpg', '425453', 'Описание про синею куртку 2'),
(12, '1', 'Кожаная куртка 6', 22500, '/images/catalog/2.jpg', '8459845', 'Описание про кожаную куртку 2'),
(13, '1', 'Куртка синяя 7', 5400, '/images/catalog/1.jpg', '425453', 'Описание про синею куртку'),
(14, '1', 'Кожаная куртка 7', 22500, '/images/catalog/2.jpg', '8459845', 'Описание про кожаную куртку'),
(15, '1', 'Куртка синяя 8', 5400, '/images/catalog/1.jpg', '425453', 'Описание про синею куртку 4'),
(16, '1', 'Кожаная куртка 8', 22500, '/images/catalog/2.jpg', '8459845', 'Описание про кожаную куртку 4');

-- --------------------------------------------------------

--
-- Структура таблицы `sizes`
--

CREATE TABLE IF NOT EXISTS `sizes` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `size` varchar(100) NOT NULL,
  `priority` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `sizes`
--

INSERT INTO `sizes` (`id`, `size`, `priority`) VALUES
(1, '35', 0),
(2, '36', 0),
(3, '37', 0),
(4, '38', 0),
(5, '39', 0),
(6, '40', 0),
(7, '41', 0),
(8, '42', 0),
(9, '43', 0),
(10, '44', 0),
(11, '45', 0),
(12, '46', 0),
(13, '47', 0),
(14, '48', 0),
(15, '49', 0);

-- --------------------------------------------------------

--
-- Структура таблицы `sizes_products`
--

CREATE TABLE IF NOT EXISTS `sizes_products` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `size_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `sizes_products`
--

INSERT INTO `sizes_products` (`id`, `size_id`, `product_id`, `quantity`) VALUES
(1, 6, 1, 10),
(2, 7, 1, 6),
(3, 8, 1, 0),
(4, 9, 1, 5),
(5, 10, 1, 4),
(6, 11, 1, 3),
(7, 12, 1, 3);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
