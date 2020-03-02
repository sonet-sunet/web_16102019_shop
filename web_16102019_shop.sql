-- phpMyAdmin SQL Dump
<<<<<<< HEAD
-- version 4.8.3
=======
-- version 4.8.0.1
>>>>>>> origin/catalog-filters
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1
-- Время создания: Фев 28 2020 г., 10:00
-- Версия сервера: 10.1.32-MariaDB
-- Версия PHP: 7.2.5

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
) ENGINE=InnoDB AUTO_INCREMENT=27 DEFAULT CHARSET=utf8;

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
(17, 16, 1),
(18, 18, 1),
(19, 18, 2),
(20, 18, 4),
(21, 19, 1),
(22, 19, 2),
(23, 19, 3),
(24, 20, 1),
(25, 20, 2),
(26, 20, 3);

-- --------------------------------------------------------

--
-- Структура таблицы `categories`
--

CREATE TABLE IF NOT EXISTS `categories` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `categories`
--

INSERT INTO `categories` (`id`, `name`) VALUES
(1, 'Куртки'),
(2, 'Джинсы'),
(3, 'Ботинки'),
(4, 'Кеды');

-- --------------------------------------------------------

--
-- Структура таблицы `categories_products`
--

CREATE TABLE IF NOT EXISTS `categories_products` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `product_id` int(11) NOT NULL,
  `categories_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `categories_products`
--

INSERT INTO `categories_products` (`id`, `product_id`, `categories_id`) VALUES
(1, 1, 3),
(2, 2, 1),
(3, 3, 1),
(4, 4, 1),
(5, 5, 1),
(6, 6, 1),
(7, 7, 1),
(8, 8, 1),
(9, 9, 1),
(10, 10, 1),
(11, 11, 1),
(12, 12, 1),
(13, 13, 1),
(14, 14, 1),
(15, 15, 1),
(16, 16, 1);

-- --------------------------------------------------------

--
-- Структура таблицы `deliveries`
--

CREATE TABLE IF NOT EXISTS `deliveries` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `delivery_price` float NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `deliveries`
--

INSERT INTO `deliveries` (`id`, `name`, `delivery_price`) VALUES
(1, 'Курьерская доставка', 500);

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
-- Структура таблицы `orders`
--

CREATE TABLE IF NOT EXISTS `orders` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `full_price` float NOT NULL,
  `status` varchar(255) NOT NULL,
  `payment_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `date_create` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `delivery_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `orders`
--

INSERT INTO `orders` (`id`, `full_price`, `status`, `payment_id`, `user_id`, `date_create`, `delivery_id`) VALUES
(1, 10800, 'accepted', 2, 1, '2020-02-13 20:34:00', 1);

-- --------------------------------------------------------

--
-- Структура таблицы `order_items`
--

CREATE TABLE IF NOT EXISTS `order_items` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `order_id` int(11) NOT NULL,
  `sizes_products_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `price` float NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `order_items`
--

INSERT INTO `order_items` (`id`, `order_id`, `sizes_products_id`, `quantity`, `price`) VALUES
(1, 1, 6, 2, 10800);

-- --------------------------------------------------------

--
-- Структура таблицы `payments`
--

CREATE TABLE IF NOT EXISTS `payments` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `payments`
--

INSERT INTO `payments` (`id`, `name`) VALUES
(1, 'Наличные при получении'),
(2, 'Картой при получении');

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
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `products`
--

INSERT INTO `products` (`id`, `active`, `name`, `price`, `photo`, `sku`, `description`) VALUES
(1, '1', 'Ботинки Красивые', 5400, '/images/catalog/10.jpg', '425453', 'Описание про ботинки'),
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
(16, '1', 'Кожаная куртка 8', 22500, '/images/catalog/2.jpg', '8459845', 'Описание про кожаную куртку 4'),
(17, '1', 'Тест', 1900, '', 'sdfasdf33qs', ''),
(18, '1', 'Тест 2', 1900, '', 'sdfasdf33qs', ''),
(19, '1', 'Тестирование', 123123, '', 'sdfasdf33qs', 'efdf'),
(20, '1', 'Тестирование', 123123, '/images/catalog/logo.png', 'sdfasdf33qs', 'efdf');

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

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `first_name` varchar(100) NOT NULL,
  `last_name` varchar(100) NOT NULL,
  `address` text NOT NULL,
  `city` varchar(100) NOT NULL,
  `postcode` int(11) NOT NULL,
  `phone` varchar(50) NOT NULL,
  `email` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`id`, `first_name`, `last_name`, `address`, `city`, `postcode`, `phone`, `email`) VALUES
(1, 'Михаил', 'Ботинкин', 'улица Короткая Спасская, 78, кв. 99', 'Москва', 148903, '891691691691', 'misha-sandal@ya.ru');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
