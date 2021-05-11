-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1
-- Время создания: Окт 25 2020 г., 20:40
-- Версия сервера: 10.4.14-MariaDB
-- Версия PHP: 7.4.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `chat`
--

-- --------------------------------------------------------

--
-- Структура таблицы `frends`
--

CREATE TABLE `frends` (
  `us_f1` int(11) NOT NULL,
  `us_f2` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `frends`
--

INSERT INTO `frends` (`us_f1`, `us_f2`) VALUES
(1, 8),
(1, 9);

-- --------------------------------------------------------

--
-- Структура таблицы `messegs`
--

CREATE TABLE `messegs` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `user_id_2` int(11) NOT NULL,
  `messeg` text NOT NULL,
  `time` time NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `messegs`
--

INSERT INTO `messegs` (`id`, `user_id`, `user_id_2`, `messeg`, `time`) VALUES
(1, 2, 3, 'Привет как дела', '20:01:14'),
(2, 3, 2, 'привет нормально, ты видел Марка?', '20:01:14'),
(16, 1, 5, 'привет как пожываеш', '23:34:56'),
(20, 5, 1, 'привет нормально  а ты как ?', '23:41:50'),
(56, 1, 23, 'тест непонятно кому ', '22:05:13'),
(57, 1, 7, 'и  тут тоже все робить ', '23:11:12'),
(77, 1, 2, 'Ваня  привіт ', '23:30:33'),
(78, 2, 1, 'привіт   радий бачити ', '23:31:32'),
(97, 1, 3, 'TEST', '18:22:57'),
(98, 1, 4, 'тест ', '18:26:59'),
(99, 1, 2, 'TEST Ajax ', '18:39:54'),
(100, 1, 6, 'TEST ajax ', '18:40:52'),
(101, 1, 2, ' twst 2 ', '18:47:15'),
(102, 1, 3, '777777', '19:44:48'),
(103, 1, 3, '777777', '19:45:04'),
(104, 1, 3, '777777', '19:45:15'),
(105, 1, 1, 'zaaz', '19:49:02');

-- --------------------------------------------------------

--
-- Структура таблицы `polzovateli`
--

CREATE TABLE `polzovateli` (
  `id` int(11) NOT NULL,
  `photo` varchar(255) NOT NULL,
  `name` varchar(100) NOT NULL,
  `phone` varchar(20) NOT NULL,
  `emeil` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `data` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `polzovateli`
--

INSERT INTO `polzovateli` (`id`, `photo`, `name`, `phone`, `emeil`, `password`, `data`) VALUES
(1, 'images/adninLogo.png', 'Aleksvin8888', '09 9203947', 'aleksvin8888@gmail.com', '1234', '2020-10-03'),
(2, 'images/User-icon2.png', 'Ваня', '98-54-24', 'vanya@in.ua', '1234', '2020-10-02'),
(3, 'images/User-icon3.png', 'Коля', '25-55-87', 'kolya@in.ua', '1234', '2020-10-02'),
(4, 'images/User-icon4.png', 'Андрей', '25-25-88', 'andrey@in.ua', '1234', '2020-10-02'),
(5, 'images/User-icon5.png', 'Марко', '25-77-88', 'marko@in.ua', '1234', '2020-10-02'),
(6, 'images/User-icon5.png', 'Владислав', '56-54-85', 'Vlad@in.ua', '1234', '2020-10-02'),
(7, 'images/User-icon5.png', 'Мирон', '99-55-88', 'Muron@in.ua', '1234', '2020-10-02'),
(8, 'images/User-icon5.png', 'Ольга', '99-55-88', 'Olyga@in.ua', '1234', '2020-10-02'),
(9, 'images/User-icon5.png', 'Ирина', '99-55-88', 'Iryna@in.ua', '1234', '2020-10-02'),
(10, 'images/User-icon5.png', 'Юля', '25-00-88', 'Yliya@in.ua', '1234', '2020-10-02'),
(11, 'images/User-icon5.png', 'Boss', '25-77-88', 'Boss@in.ua', '1234', '2020-10-02'),
(12, 'images/User-icon5.png', 'Марина', '33-77-88', 'Marina@in.ua', '1234', '2020-10-02'),
(13, 'images/User-icon5.png', 'Марина', '33-99-22', 'Marina2@in.ua', '1234', '2020-10-02'),
(23, '', '', '', '22', '22', '2020-10-05');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `frends`
--
ALTER TABLE `frends`
  ADD UNIQUE KEY `us_f1` (`us_f1`,`us_f2`);

--
-- Индексы таблицы `messegs`
--
ALTER TABLE `messegs`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `polzovateli`
--
ALTER TABLE `polzovateli`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `messegs`
--
ALTER TABLE `messegs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=106;

--
-- AUTO_INCREMENT для таблицы `polzovateli`
--
ALTER TABLE `polzovateli`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=75;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
