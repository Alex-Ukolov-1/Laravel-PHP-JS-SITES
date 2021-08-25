-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Авг 25 2021 г., 13:10
-- Версия сервера: 5.5.62
-- Версия PHP: 7.1.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `epub`
--

-- --------------------------------------------------------

--
-- Структура таблицы `articles`
--

CREATE TABLE `articles` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `slug` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `description` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `content` text COLLATE utf8_unicode_ci NOT NULL,
  `subcategory` int(10) UNSIGNED NOT NULL,
  `author` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Дамп данных таблицы `articles`
--

INSERT INTO `articles` (`id`, `title`, `slug`, `description`, `content`, `subcategory`, `author`, `created_at`, `updated_at`) VALUES
(1, 'Первая тестовая статья', 'pervaya-testovaya-statya', 'Это тестовая статья', '[audio]/files/6[/audio]\r\n[sign]Пробная аудиозапись[/sign]\r\n\r\n[video]/files/7[/video]\r\n[sign]Пробный видеофайл[/sign]\r\n\r\n[spoiler=Пример спойлера]Это абзац в спойлере\r\n[h1]Заголовок в спойлере[/h1]\r\nЭто ещё один абзац в спойлере[/spoiler]\r\n\r\n[lightbox=/files/3]/files/2[/lightbox]', 1, 1, '2021-01-23 07:54:18', '2021-02-08 08:42:20'),
(3, 'Вторая тестовая статья', 'vtoraya-testovaya-statya', 'Это вторая тестовая статья', '[h1]Заголовок первого уровня[/h1]\r\n[h2]Заголовок второго уровня[/h2]\r\n[h3]Заголовок третьего уровня[/h3]\r\n\r\nПростой абзац\r\n\r\n[h4]Заголовок четвёртого уровня[/h4]\r\n[h5]Заголовок пятого уровня[/h5]\r\n\r\n[b]Полужирный текст[/b]\r\n[I]Курсивный текст[/I]\r\n\r\n[url=http://www.google.ru]Гиперссылка на сайт Google[/url]\r\n\r\n<hr>\r\n[center]Текст, выровненный по середине[/center]\r\n[right]Текст, выровненный по правому краю[/right]\r\n\r\nПример текста фиксированного форматирования:\r\n[code]var i = 0;\r\nvar k = 1;\r\ndocument.write(\"Привет!!!\");\r\n[/code]\r\n\r\n[img]/files/1[/img]\r\n[sign]Изображение[/sign]\r\n\r\n[url=/files/8]Скачать архив с примером Web-страницы[/url]\r\n', 1, 1, '2021-01-23 08:19:42', '2021-02-08 08:41:47'),
(4, 'Компьютерная стратегическая игра', 'kompyuternaya-strategicheskaya-igra', 'Понятие компьютерной стратегической игры', '[b]Стратегическая игра[/b] — популярный жанр компьютерных игр, в котором залогом достижения победы является планирование и стратегическое мышление.\r\n\r\n[I]Цитата из Википедии[/I].\r\n\r\nСм. подробнее [url=https://ru.wikipedia.org/wiki/%D0%9A%D0%BE%D0%BC%D0%BF%D1%8C%D1%8E%D1%82%D0%B5%D1%80%D0%BD%D0%B0%D1%8F_%D1%81%D1%82%D1%80%D0%B0%D1%82%D0%B5%D0%B3%D0%B8%D1%87%D0%B5%D1%81%D0%BA%D0%B0%D1%8F_%D0%B8%D0%B3%D1%80%D0%B0]здесь[/url].', 6, 5, '2021-01-25 07:59:17', '2021-02-08 08:48:28'),
(7, 'Warcraft', 'warcraft', 'Статья об игре Warcraft', '[b]Warcraft: Orcs & Humans[/b] (от англ. warcraft — военное ремесло, orcs and humans — орки и люди) — компьютерная игра в жанре стратегии в реальном времени, выпущенная компанией Blizzard Entertainment в 1994 году для DOS, а позже — для Macintosh. Стратегии в реальном времени Warcraft и Command & Conquer от Westwood Studios сильно повысили популярность жанра. Warcraft и его сиквелы являются одной из самых успешных франшиз в истории компьютерных игр.\r\n\r\n[I]Цитата из Википедии[/I].\r\n\r\nСм. подробнее [url=https://ru.wikipedia.org/wiki/Warcraft:_Orcs_%26_Humans]здесь[/url].\r\n\r\n[img]/files/13[/img]\r\n[sign]Ночь[/sign]\r\n', 6, 5, '2021-01-25 08:15:06', '2021-02-08 08:51:01'),
(8, 'Web-обозреватели', 'web-obozrevateli', 'Эта статья посвящена Web-обозревателям', 'Популярные в настоящее время Web-обозреватели:\r\n\r\n* Microsoft Internet Explorer;\r\n* Microsoft Edge;\r\n* Mozilla Firefox;\r\n* Opera;\r\n* Google Chrome;\r\n* Vivaldi.\r\n\r\n[img]/files/1[/img]\r\n[sign]Просто картинка[/sign]\r\n', 1, 1, '2021-01-26 06:35:05', '2021-02-08 08:45:07'),
(9, '434334', '434334', '545445', 'ererererer', 7, 5, '2021-08-22 15:31:03', '2021-08-22 15:31:03'),
(12, '23', '23', '343434', '/files/17', 7, 5, '2021-08-22 15:32:21', '2021-08-22 15:32:21'),
(13, 'reer', 'reer', 'yytyttyty', 'uyyyyyyy8887878787/files/18/files/18', 5, 6, '2021-08-23 11:08:28', '2021-08-23 11:08:28'),
(14, '3234', '3234', 'rtrtrtrttrtr', 'rtrtrttr', 4, 6, '2021-08-23 14:29:24', '2021-08-23 14:29:24'),
(16, '65565656', '56565656', '655', '434334', 3, 6, '2021-08-24 10:53:00', '2021-08-24 10:53:00');

-- --------------------------------------------------------

--
-- Структура таблицы `categories`
--

CREATE TABLE `categories` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `slug` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `order` tinyint(3) UNSIGNED NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Дамп данных таблицы `categories`
--

INSERT INTO `categories` (`id`, `name`, `slug`, `order`, `created_at`, `updated_at`) VALUES
(1, 'Web', 'web', 0, '2021-01-18 08:59:45', '2021-01-18 09:02:00'),
(2, 'Интернет', 'internet', 10, '2021-01-18 09:02:12', '2021-02-02 05:49:35'),
(3, 'Программирование', 'programmirovanie', 0, '2021-01-18 09:02:32', '2021-01-18 09:02:32'),
(5, 'Игры', 'igry', 5, '2021-01-18 09:02:55', '2021-01-18 09:02:55');

-- --------------------------------------------------------

--
-- Структура таблицы `comments`
--

CREATE TABLE `comments` (
  `id` int(10) UNSIGNED NOT NULL,
  `author` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `content` text COLLATE utf8_unicode_ci NOT NULL,
  `article` int(10) UNSIGNED NOT NULL,
  `hidden` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Дамп данных таблицы `comments`
--

INSERT INTO `comments` (`id`, `author`, `email`, `content`, `article`, `hidden`, `created_at`, `updated_at`) VALUES
(1, 'strateg', 'strateg@gaming.com', 'Автор статьи -  поклонник Warcraft? Наш человек!', 7, 0, '2021-01-27 05:55:36', '2021-02-08 08:53:41'),
(2, 'Недовольный', 'superuser@megasite.ru', 'А чего так мало написал?\r\n\r\nВ Википедии я и сам могу посмотреть...\r\n\r\nАвтор, давай, пиши ещё!!!\r\n\r\nДа побольше!!!', 4, 0, '2021-01-27 05:59:15', '2021-02-08 08:55:35'),
(4, 'ijkiopjij', 'ff@mail.ru', 'oijkiojojoin', 1, 1, '2021-01-27 06:05:30', '2021-02-08 08:58:12'),
(5, 'admin', 'admin@mail.ru', 'Предупреждаю: бессмысленные комментарии будут скрываться или удаляться!\r\n\r\nРедакторы, внимательно следите за оставляемыми посетителями комментариями!', 1, 0, '2021-01-27 06:22:37', '2021-02-08 08:57:54'),
(7, 'Мимоход', 'mimohod@mail.ru', 'Ну вот вам осмысленный комментарий, admin! Довольны? ;)', 1, 0, '2021-01-30 07:31:29', '2021-02-08 08:59:33'),
(9, 'hyyy', 'bronzesilver2000@gmail.com', 'ytytyt', 12, 0, '2021-08-23 11:02:59', '2021-08-23 11:02:59');

-- --------------------------------------------------------

--
-- Структура таблицы `files`
--

CREATE TABLE `files` (
  `id` int(10) UNSIGNED NOT NULL,
  `type` tinyint(3) UNSIGNED NOT NULL,
  `extension` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `description` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `user` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Дамп данных таблицы `files`
--

INSERT INTO `files` (`id`, `type`, `extension`, `description`, `user`, `created_at`, `updated_at`) VALUES
(1, 0, 'jpg', 'Изображение 1', 1, '2021-01-31 06:41:32', '2021-01-31 06:41:32'),
(2, 0, 'jpg', 'Изображение 2 (полное)', 1, '2021-01-31 07:44:30', '2021-01-31 07:44:30'),
(3, 0, 'jpg', 'Изображение 2 (миниатюра)', 1, '2021-01-31 07:45:02', '2021-01-31 07:45:02'),
(6, 1, 'mp3', 'Пробная аудиозапись', 1, '2021-01-31 07:56:59', '2021-01-31 07:56:59'),
(7, 2, 'mp4', 'Пробный видеофайл', 1, '2021-01-31 08:13:09', '2021-01-31 08:13:09'),
(8, 3, 'zip', 'Пример Web-страницы', 1, '2021-01-31 08:16:32', '2021-01-31 08:16:32'),
(13, 0, 'jpg', 'Ночь', 5, '2021-01-31 08:47:25', '2021-01-31 08:47:25'),
(14, 0, 'jpg', 'XP Platinum', 1, '2021-02-01 06:20:21', '2021-02-01 06:20:21'),
(15, 0, 'jpg', 'Ice planet', 1, '2021-02-01 06:20:34', '2021-02-01 06:20:34'),
(16, 0, 'jpg', 'CiTech', 1, '2021-02-01 06:21:32', '2021-02-01 06:21:32'),
(17, 0, 'jpg', '45544545', 5, '2021-08-22 15:30:52', '2021-08-22 15:30:52'),
(18, 0, 'png', 'tt66t665', 6, '2021-08-23 11:08:18', '2021-08-23 11:08:18'),
(19, 0, 'jpg', 'trrtrt', 6, '2021-08-23 14:29:14', '2021-08-23 14:29:14'),
(20, 0, 'png', 'tytyty', 6, '2021-08-24 10:52:23', '2021-08-24 10:52:23'),
(21, 0, 'png', 'tytyty', 6, '2021-08-24 10:52:30', '2021-08-24 10:52:30');

-- --------------------------------------------------------

--
-- Структура таблицы `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Дамп данных таблицы `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(3, '2014_10_12_000000_create_users_table', 1),
(4, '2014_10_12_100000_create_password_resets_table', 1),
(9, '2017_01_17_132650_create_categories_table', 2),
(10, '2017_01_18_091448_create_subcategories_table', 2),
(11, '2017_01_20_105442_create_articles_table', 3),
(13, '2017_01_26_112802_create_comments_table', 4),
(18, '2017_01_30_104844_create_files_table', 5);

-- --------------------------------------------------------

--
-- Структура таблицы `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Структура таблицы `subcategories`
--

CREATE TABLE `subcategories` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `slug` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `category` int(10) UNSIGNED NOT NULL,
  `order` tinyint(3) UNSIGNED NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Дамп данных таблицы `subcategories`
--

INSERT INTO `subcategories` (`id`, `name`, `slug`, `category`, `order`, `created_at`, `updated_at`) VALUES
(1, 'WWW', 'www', 2, 0, '2017-01-18 10:19:33', '2017-01-18 10:19:33'),
(2, 'Торренты', 'torrenty', 2, 0, '2017-01-18 10:19:50', '2017-01-18 10:19:50'),
(3, 'HTML', 'html', 1, 3, '2017-01-18 10:20:04', '2017-02-02 05:53:06'),
(4, 'CSS', 'css', 1, 0, '2017-01-18 10:20:28', '2017-01-18 10:20:28'),
(5, 'Шутеры', 'shutery', 5, 0, '2017-01-18 10:20:43', '2017-01-18 10:20:43'),
(6, 'Стратегии', 'strategii', 5, 0, '2017-01-18 10:20:53', '2017-01-24 05:27:34'),
(7, 'PHP', 'php', 3, 0, '2017-01-18 10:21:13', '2017-01-18 10:21:13');

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `role` varchar(1) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'a',
  `remember_token` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `role`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'admin@mail.ru', '$2y$10$sii3HQwKh7xRqjzvqcMMOO4soxA/z6bVjQYobV3x8ka8JBLsrQerS', 'm', 'H1GkO2cSnS0nd8C2ANO5uQX7R9g3sQ7HMUdb2BHWRtjtGZO9tAETvMhp0LRQ', '2017-01-13 08:59:17', '2021-08-23 14:29:54'),
(5, 'author', 'author@site.ru', '$2y$10$kas.cUUnEdC6sL7F68uDrOy8OUPctEE8b9K6CnEcPc4QjJzFZS/Rq', 'a', 'RMCv6QbDJrALq5GQanu1Ck8ObjVln9SQjg9yCfFJ1p3pEpNm0UHNfvIa892o', '2017-01-17 08:53:14', '2021-08-23 11:03:55'),
(6, 'editor', 'editor@site.ru', '$2y$10$crqMt57r/RKec0DUd./9GeB85YEyHttUEzxepT/FD3ZG3NAmkQOKS', 'e', 'r55duP4iV80NcTxC1grVTITeyRMWIHUDwtv3uJ1KhmKuUltbGzpKt17aNeo0', '2017-01-17 08:53:59', '2021-08-23 14:29:50');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `articles`
--
ALTER TABLE `articles`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `articles_title_unique` (`title`),
  ADD UNIQUE KEY `articles_slug_unique` (`slug`),
  ADD KEY `articles_subcategory_foreign` (`subcategory`),
  ADD KEY `articles_author_foreign` (`author`);

--
-- Индексы таблицы `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `categories_name_unique` (`name`),
  ADD UNIQUE KEY `categories_slug_unique` (`slug`),
  ADD KEY `categories_order_index` (`order`);

--
-- Индексы таблицы `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `comments_article_foreign` (`article`),
  ADD KEY `comments_hidden_index` (`hidden`);

--
-- Индексы таблицы `files`
--
ALTER TABLE `files`
  ADD PRIMARY KEY (`id`),
  ADD KEY `files_user_foreign` (`user`),
  ADD KEY `files_type_index` (`type`);

--
-- Индексы таблицы `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`),
  ADD KEY `password_resets_token_index` (`token`);

--
-- Индексы таблицы `subcategories`
--
ALTER TABLE `subcategories`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `subcategories_name_unique` (`name`),
  ADD UNIQUE KEY `subcategories_slug_unique` (`slug`),
  ADD KEY `subcategories_category_foreign` (`category`),
  ADD KEY `subcategories_order_index` (`order`);

--
-- Индексы таблицы `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `articles`
--
ALTER TABLE `articles`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT для таблицы `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT для таблицы `comments`
--
ALTER TABLE `comments`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT для таблицы `files`
--
ALTER TABLE `files`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT для таблицы `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT для таблицы `subcategories`
--
ALTER TABLE `subcategories`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT для таблицы `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `articles`
--
ALTER TABLE `articles`
  ADD CONSTRAINT `articles_author_foreign` FOREIGN KEY (`author`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `articles_subcategory_foreign` FOREIGN KEY (`subcategory`) REFERENCES `subcategories` (`id`);

--
-- Ограничения внешнего ключа таблицы `comments`
--
ALTER TABLE `comments`
  ADD CONSTRAINT `comments_article_foreign` FOREIGN KEY (`article`) REFERENCES `articles` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ограничения внешнего ключа таблицы `files`
--
ALTER TABLE `files`
  ADD CONSTRAINT `files_user_foreign` FOREIGN KEY (`user`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ограничения внешнего ключа таблицы `subcategories`
--
ALTER TABLE `subcategories`
  ADD CONSTRAINT `subcategories_category_foreign` FOREIGN KEY (`category`) REFERENCES `categories` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
