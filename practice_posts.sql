-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Фев 12 2020 г., 06:44
-- Версия сервера: 8.0.12
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
-- База данных: `practice_posts`
--

-- --------------------------------------------------------

--
-- Структура таблицы `posts`
--

CREATE TABLE `posts` (
  `id` int(11) NOT NULL,
  `title` varchar(30) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `description` text CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `datePublication` date NOT NULL,
  `photo` varchar(150) NOT NULL,
  `user_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `posts`
--

INSERT INTO `posts` (`id`, `title`, `description`, `datePublication`, `photo`, `user_id`) VALUES
(1, 'Правилы безопасности', '                                  -Прыгать с обрывов и случайных вышек, не проверив дно.\r\n-Заплывать за буйки или пытаться переплывать водоемы.\r\n-Выплывать на судоходный фарватер.\r\n-Купаться в нетрезвом виде.\r\n-Устраивать в воде опасные игры.\r\n-Долго купаться в холодной воде\r\n-Далеко отплывать от берега на надувных матрасах и кругах, если вы не умеете плавать.                                    ', '2020-01-13', '3.jpg', NULL),
(3, 'Фрукты', '                                                                                         Бананы яблоки ананасы                                                                                    ', '2020-01-13', '5.jpg', NULL),
(5, 'Котёнок', '                                   vvvvvvvvv                                  ', '2020-01-21', '1.jpg', NULL),
(8, 'крыса 1', '                       Любит сыр и бегать', '2020-01-22', '2.jpg', NULL),
(13, 'Питомцы', '                                          впвыпвкп                           ', '2020-01-27', '4.jpg', NULL),
(14, 'Крыска Генри', '           Живет в маленьком уютном домике и любит кушать сыр                                                    ', '2020-01-27', '6.jpg', NULL),
(15, 'Статья 23', '                                  выоамполавопмлавоь ьльлдьаклпмоьлкоьпмл  льлалкпмкуппкупнекнрпкер рн кнке\r\nке рпкер\r\n е\r\nек\r\nр е\r\nнпр \r\nнеп\r\nр\r\nне \r\nр\r\nнпр             ', '2020-01-28', '3.jpg', NULL);

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE `users` (
  `name_user` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `login` varchar(30) NOT NULL,
  `password` varchar(256) NOT NULL,
  `id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`name_user`, `login`, `password`, `id`) VALUES
('Admin', 'Admin', '1111', 1),
('Nastya', 'Nastya', '2222', 2);

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `posts_users_id_fk` (`user_id`);

--
-- Индексы таблицы `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `posts`
--
ALTER TABLE `posts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `posts`
--
ALTER TABLE `posts`
  ADD CONSTRAINT `posts_users_id_fk` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
