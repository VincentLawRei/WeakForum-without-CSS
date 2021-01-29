-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Янв 29 2021 г., 17:17
-- Версия сервера: 8.0.19
-- Версия PHP: 7.1.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `forum`
--

-- --------------------------------------------------------

--
-- Структура таблицы `forum`
--

CREATE TABLE `forum` (
  `id` int UNSIGNED NOT NULL,
  `topic` int NOT NULL,
  `message` text CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `user` varchar(60) NOT NULL,
  `date` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `forum`
--

INSERT INTO `forum` (`id`, `topic`, `message`, `user`, `date`) VALUES
(1, 1, 'Lorem ipsum, dolor sit, amet consectetur adipisicing elit. Nobis maxime ipsa natus amet soluta autem, placeat expedita ut similique laborum incidunt inventore? ', '11', 1604820993),
(2, 1, 'Lorem ipsum, dolor sit, amet consectetur adipisicing elit. Nobis maxime ipsa natus amet soluta autem, placeat expedita ut similique laborum incidunt inventore? ', '11', 1604821555),
(6, 1, '67868', '11', 1604825143),
(7, 1, '67868', '11', 1604825160),
(8, 1, '124124', '13', 1604825319),
(9, 1, '123124', '13', 1604825323),
(12, 1, '1515', '11', 1604825594),
(13, 1, '31231', '11', 1604825600),
(14, 1, '1234', '11', 1604828438),
(15, 2, '1214', '11', 1604828483),
(16, 2, '41414', '11', 1604828488),
(18, 1, '22', '11', 1604830230),
(19, 3, '123123', '11', 1604830502),
(20, 1, ':(', '14', 1604830736),
(21, 1, '52525', '14', 1604941756),
(22, 1, '1515', '11', 1604941800),
(23, 1, '1515', '11', 1604941805),
(24, 1, '7373', '11', 1604941808),
(25, 3, '123123', '11', 1604999008),
(26, 3, '3', '11', 1605178515),
(27, 1, '21', '11', 1605184693),
(28, 1, '2525', '11', 1611564781),
(29, 1, '1525', '11', 1611789252),
(30, 1, '15215', '11', 1611789257),
(31, 1, '12525', '11', 1611789260),
(32, 1, '123123', '11', 1611789428),
(33, 1, '234234', '11', 1611791350),
(34, 1, '2323', '11', 1611791355),
(39, 13, 'One Two Three Four Five', '11', 1611793611),
(40, 13, '2222', '11', 1611793626),
(41, 2, '124124', '11', 1611795012),
(42, 14, '46666666666', '11', 1611929178),
(43, 13, '33', '18', 1611929648);

-- --------------------------------------------------------

--
-- Структура таблицы `topics`
--

CREATE TABLE `topics` (
  `id` int UNSIGNED NOT NULL,
  `topic_name` varchar(100) NOT NULL,
  `author_id` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `topics`
--

INSERT INTO `topics` (`id`, `topic_name`, `author_id`) VALUES
(1, 'Games', 11),
(2, 'IT & Technologies', 11),
(3, 'Movies', 11),
(13, 'FirstGoodTopic', 11),
(14, '4646', 11);

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE `users` (
  `id` int UNSIGNED NOT NULL,
  `login` varchar(32) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `email` varchar(32) NOT NULL,
  `password` varchar(75) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `date` int NOT NULL,
  `role` varchar(30) NOT NULL DEFAULT 'user'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`id`, `login`, `email`, `password`, `date`, `role`) VALUES
(7, 'secondadmin', '1234321@ya.ru', '$2y$10$HUW.QRT1T8zlnTlmjJXL6u/j5gEAcYznorRVg03yYFDy3YgeowjNC', 0, 'admin'),
(11, '525252', '525252@yandex.ru', '$2y$10$Djw/pz8qSTO1fASw38cX1u4vt3Fec6TDspa6aJORl8flsAM4Iclh.', 1604408372, 'admin'),
(12, '12341234', '12341234@mail.ru', '$2y$10$bC3ltxEaJlZD3/Rks.fEyuTbtRZEmlSxkaNBr5zNV8fPyd66h3cky', 1604577610, 'user'),
(13, '12344321', '1234321@yandex.ru', '$2y$10$IdeqjoRI4roomJVbC8Wwmu3r2KUQ0evjx.djqArOpXW9E8kAlaBUi', 1604825271, 'user'),
(14, 'OlegIvanov', 'olegivanov@gmail.com', '$2y$10$aRQaZ87gtMdQtLZ3UOHAwORFY1pUC/kF8xwIkAWrrRksLmtBj40uu', 1604830708, 'user'),
(15, '777777', '777777@ya.ru', '$2y$10$vM6QmfQgW6T57dn2Dmmaq.GJjvA/mi37LmkPDd.0BopcAv1eVek.a', 1605181983, 'user'),
(16, '7777777', '7777777@ya.ru', '$2y$10$rqD161aKGv1W7Ehvtm8Lc.xaSzY5TJnz4Bs/oDQMgZw5H5MxZtbei', 1605182567, 'user'),
(17, '161060160', 'towtowot@yandex.ru', '$2y$10$mHV7Bp.aevpItLrCxvoYwOyAypXAucTkbTE.CWSICuDM7ovaJFLEC', 1611929228, 'user'),
(18, '424242', '424242@yandex.ru', '$2y$10$SWiRk/61qFWRsfKXzhl89OA5WDxpMVHVH2z6FQo8eXvAy2s/CsP/C', 1611929287, 'user');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `forum`
--
ALTER TABLE `forum`
  ADD UNIQUE KEY `id` (`id`);

--
-- Индексы таблицы `topics`
--
ALTER TABLE `topics`
  ADD UNIQUE KEY `id` (`id`);

--
-- Индексы таблицы `users`
--
ALTER TABLE `users`
  ADD UNIQUE KEY `id` (`id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `forum`
--
ALTER TABLE `forum`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;

--
-- AUTO_INCREMENT для таблицы `topics`
--
ALTER TABLE `topics`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT для таблицы `users`
--
ALTER TABLE `users`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
