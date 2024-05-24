-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1
-- Время создания: Май 15 2023 г., 16:01
-- Версия сервера: 10.4.28-MariaDB
-- Версия PHP: 8.0.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `sila`
--
CREATE DATABASE IF NOT EXISTS `sila` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `sila`;

-- --------------------------------------------------------

--
-- Структура таблицы `application`
--

CREATE TABLE `application` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `id_program` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `numberPhone` varchar(15) NOT NULL,
  `time` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Дамп данных таблицы `application`
--

INSERT INTO `application` (`id`, `id_program`, `name`, `numberPhone`, `time`) VALUES
(6, 4, 'Тестер', '33333333', '2023-05-15 16:44:58'),
(7, 7, 'Тестер', '33333333', '2023-05-15 16:55:02'),
(8, 8, 'Тестер', '33333333', '2023-05-15 16:57:18'),
(9, 6, 'Тестер', '33333333', '2023-05-15 16:58:20');

-- --------------------------------------------------------

--
-- Структура таблицы `programs`
--

CREATE TABLE `programs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(50) NOT NULL,
  `description` text NOT NULL,
  `image` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Дамп данных таблицы `programs`
--

INSERT INTO `programs` (`id`, `name`, `description`, `image`) VALUES
(3, 'Йога', 'Очень древняя практика для поиска целостности в занятиях и в жизни. Йога состоит из асан (упражнений), дыхательных техник и медитаций (пассивных и активных), поэтому развивает человека всесторонне — через тело, ум и эмоции. Хотя изначально йога — это духовная практика, в больших городах духовность занимает её малую часть. Многие техники адаптируются под задачи учеников, и акцент делается на работу с телом и дыханием.', './assets/images/programs/Yoga1684026530.jpg'),
(4, 'Тренажерный зал', 'Если вам нужно быстро и эффективно «вылепить» красивую фигуру, избавиться от лишнего веса или просто чувствовать себя сильным и здоровым человеком, без тренажерного зала не обойтись.\r\n\r\nПри каждом зале есть тренер, который профессионально определит особенности вашего организма и разработает индивидуальную программу занятий, с помощью которой достичь цели – похудеть, накачать мышцы или оздоровиться – будет просто.', './assets/images/programs/Trenajernyiy_zal1684026672.jpg'),
(5, 'Персональные тренировки', 'Персональные тренировки недаром пользуются популярностью, ведь это один из самых эффективных способов обрести фигуру мечты. Сегодня мы поговорим о том, как правильно составить план индивидуальных занятий с инструктором.', './assets/images/programs/Personalnyie_trenirovki1684026810.трен.jpg'),
(6, 'Групповые тренировки ', 'Занятия в фитнес-клубах, которые проводятся в группах под руководством инструктора. Групповые тренировки могут быть совершенно разного спортивного направления: от несложного пилатеса до ударного кроссфита.', './assets/images/programs/Gruppovyie_trenirovki_1684026910.тен.jpg'),
(7, 'Спортивные игры', 'Спортивные и подвижные игры полезны людям любого возраста. Физическая активность, сопряженная с соревнованием и азартом даёт ни с чем несравнимое удовольствие. Взрослые люди до преклонных лет чувствуют себя бодрыми и молодыми, если играют в теннис, гольф, бадминтон. Детям игровая физическая деятельность дает дополнительные стимулы роста и развития.', './assets/images/programs/Sportivnyie_igryi1684027047.игры.jpg'),
(8, 'Детский фитнес', 'Детский фитнес предполагает применение разнообразного оборудования, в первую очередь тренажёров и тренировочных устройств. Занятия им не только развивают координацию, гибкость и силовые качества, но и чувство ритма, артистичность, обеспечивают развитие моторики ребенка, правильной осанки.', './assets/images/programs/Detskiy_fitnes1684027096.фит.jpg');

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(50) NOT NULL,
  `login` varchar(255) NOT NULL,
  `password` text NOT NULL,
  `passwordView` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`id`, `name`, `login`, `password`, `passwordView`) VALUES
(1, 'admin', 'admin', '$2y$10$hbRLMnkpb1BJbBD1dFE4WOF22ZaTHL0I.6zyZvVaHxGbtT2zyhaxy', 'admin');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `application`
--
ALTER TABLE `application`
  ADD UNIQUE KEY `id` (`id`),
  ADD KEY `id_program` (`id_program`);

--
-- Индексы таблицы `programs`
--
ALTER TABLE `programs`
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
-- AUTO_INCREMENT для таблицы `application`
--
ALTER TABLE `application`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT для таблицы `programs`
--
ALTER TABLE `programs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT для таблицы `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `application`
--
ALTER TABLE `application`
  ADD CONSTRAINT `application_ibfk_1` FOREIGN KEY (`id_program`) REFERENCES `programs` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
