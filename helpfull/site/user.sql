-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Июл 16 2021 г., 14:20
-- Версия сервера: 10.3.22-MariaDB-log
-- Версия PHP: 7.1.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `user`
--

-- --------------------------------------------------------

--
-- Структура таблицы `photo`
--

CREATE TABLE `photo` (
  `id_photo` int(100) UNSIGNED NOT NULL,
  `id` int(100) NOT NULL,
  `photo` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `photo`
--

INSERT INTO `photo` (`id_photo`, `id`, `photo`) VALUES
(1, 1, '3.jpg'),
(2, 1, '2.jpg'),
(3, 2, '1.jpg'),
(4, 2, '4.jpg'),
(5, 1, '1.jpg'),
(6, 2, 'cherry,png'),
(7, 2, 'cherry,png'),
(8, 2, 'cherry,png'),
(9, 2, 'cherry,png');

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE `users` (
  `id` int(11) UNSIGNED NOT NULL,
  `login` varchar(100) CHARACTER SET utf8 NOT NULL,
  `pass` varchar(32) CHARACTER SET utf8 NOT NULL,
  `email` varchar(50) CHARACTER SET utf8 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`id`, `login`, `pass`, `email`) VALUES
(1, 'alex', '12345', 'alexukolov@mail.com'),
(2, 'boris', '303030', 'borissemenev@mail.com'),
(3, 'arthur', '1919', 'conandoyl@mail.com'),
(4, 'archibald', 'wer12345wer', 'archibaldthegreat@mail.com'),
(5, 'dima', '909090', 'Уколов павел @mail.comевгеньевич'),
(6, 'jojo', 'armani', 'full@mail.com'),
(7, 'vera', '2011', 'vera@mail.com'),
(8, 'varaaa', '20111', 'varvara@mail.com'),
(9, 'gogo', '321', 'Уколов Алексей Павлович@mail.com'),
(10, 'viniamin', '404040', 'vinya@mail.com'),
(14, 'beknambek', 'werty', 'beknambek@mail.com');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `photo`
--
ALTER TABLE `photo`
  ADD PRIMARY KEY (`id_photo`);

--
-- Индексы таблицы `users`
--
ALTER TABLE `users`
  ADD UNIQUE KEY `id` (`id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `photo`
--
ALTER TABLE `photo`
  MODIFY `id_photo` int(100) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT для таблицы `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `photo`
--
ALTER TABLE `photo`
  ADD CONSTRAINT `photo_ibfk_1` FOREIGN KEY (`id_photo`) REFERENCES `users` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
