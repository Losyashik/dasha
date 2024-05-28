-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1
-- Время создания: Май 28 2024 г., 08:45
-- Версия сервера: 10.4.28-MariaDB
-- Версия PHP: 8.2.4

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
  `full_description` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL CHECK (json_valid(`full_description`)),
  `image` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Дамп данных таблицы `programs`
--

INSERT INTO `programs` (`id`, `name`, `description`, `full_description`, `image`) VALUES
(3, 'Йога', 'Очень древняя практика для поиска целостности в занятиях и в жизни. Йога состоит из асан (упражнений), дыхательных техник и медитаций (пассивных и активных), поэтому развивает человека всесторонне — через тело, ум и эмоции. Хотя изначально йога — это духовная практика, в больших городах духовность занимает её малую часть. Многие техники адаптируются под задачи учеников, и акцент делается на работу с телом и дыханием.', '[{\"id\":\"ub4cHUtg12\",\"type\":\"paragraph\",\"data\":{\"text\":\"Можно ощутить пользу от занятий йогой, и как изменяется организм, уже в первые недели регулярных тренировок. Но при соблюдении главного условия – научится слушать голос наставника и следовать его инструкциям. Опытные преподаватели всего за несколько занятий закладывают основы правильного взаимодействия со своим телом, учат снятию напряжения и расслаблению. Верное выполнение упражнений дает быстрый результат, который выражается в улучшении самочувствия и физической формы.\"}}]', './assets/images/programs/Yoga1684026530.jpg'),
(4, 'Тренажерный зал', 'Если вам нужно быстро и эффективно «вылепить» красивую фигуру, избавиться от лишнего веса или просто чувствовать себя сильным и здоровым человеком, без тренажерного зала не обойтись.\r\n\r\nПри каждом зале есть тренер, который профессионально определит особенности вашего организма и разработает индивидуальную программу занятий, с помощью которой достичь цели – похудеть, накачать мышцы или оздоровиться – будет просто.', '', './assets/images/programs/Trenajernyiy_zal1684026672.jpg'),
(5, 'Персональные тренировки', 'Персональные тренировки недаром пользуются популярностью, ведь это один из самых эффективных способов обрести фигуру мечты. Сегодня мы поговорим о том, как правильно составить план индивидуальных занятий с инструктором.', '[{\"id\":\"9Jy9hFcLZt\",\"type\":\"paragraph\",\"data\":{\"text\":\"Наконец решились посетить фитнес-зал или хотите получить от занятий максимум пользы? Одним из лучших вариантов станет персональная тренировка. Говоря простыми словами, к вам будет прикреплен тренер. Он поможет составить план занятий, будет следить за техникой выполнения упражнений и даст рекомендации относительно питания.\"}},{\"id\":\"QVgHKF356f\",\"type\":\"paragraph\",\"data\":{\"text\":\"Такие тренировки отличаются массой преимуществ:\",\"level\":2}},{\"id\":\"vquakHJ8zZ\",\"type\":\"list\",\"data\":{\"style\":\"unordered\",\"items\":[\"безопасностью — инструктор всегда рядом и следит за каждым движением, что снижает риск травматизма;\",\"индивидуальностью — занятия проходят в подходящем вам темпе с учетом физической подготовки и фактической формы;<br>\",\"результативностью — при следовании советам тренера похудеть или набрать мышечную массу можно в кратчайшие сроки;<br>\",\"мотивацией — опытный наставник направит и поможет настроиться на продуктивную тренировку.<br>\"]}},{\"id\":\"FAqphGD9WI\",\"type\":\"paragraph\",\"data\":{\"text\":\"В большей степени персональная тренировка актуальна для новичков и спортсменов, не прогрессирующих долгое время. Подойдет он и тем, кто стесняется заниматься самостоятельно или не может заставить себя начать.\"}}]', './assets/images/programs/Personalnyie_trenirovki1684026810.трен.jpg'),
(6, 'Групповые тренировки ', 'Занятия в фитнес-клубах, которые проводятся в группах под руководством инструктора. Групповые тренировки могут быть совершенно разного спортивного направления: от несложного пилатеса до ударного кроссфита.', '', './assets/images/programs/Gruppovyie_trenirovki_1684026910.тен.jpg'),
(7, 'Спортивные игры', 'Спортивные и подвижные игры полезны людям любого возраста. Физическая активность, сопряженная с соревнованием и азартом даёт ни с чем несравнимое удовольствие. Взрослые люди до преклонных лет чувствуют себя бодрыми и молодыми, если играют в теннис, гольф, бадминтон. Детям игровая физическая деятельность дает дополнительные стимулы роста и развития.', '', './assets/images/programs/Sportivnyie_igryi1684027047.игры.jpg'),
(8, 'Детский фитнес', 'Детский фитнес предполагает применение разнообразного оборудования, в первую очередь тренажёров и тренировочных устройств. Занятия им не только развивают координацию, гибкость и силовые качества, но и чувство ритма, артистичность, обеспечивают развитие моторики ребенка, правильной осанки.', '', './assets/images/programs/Detskiy_fitnes1684027096.фит.jpg');

-- --------------------------------------------------------

--
-- Структура таблицы `program_images`
--

CREATE TABLE `program_images` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `id_program` bigint(20) UNSIGNED NOT NULL,
  `image` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

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
-- Индексы таблицы `program_images`
--
ALTER TABLE `program_images`
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
-- AUTO_INCREMENT для таблицы `program_images`
--
ALTER TABLE `program_images`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

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
