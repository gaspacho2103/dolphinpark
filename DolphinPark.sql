-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Май 02 2024 г., 20:22
-- Версия сервера: 8.0.30
-- Версия PHP: 8.0.22

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `DolphinPark`
--

-- --------------------------------------------------------

--
-- Структура таблицы `Aboniments`
--

CREATE TABLE `Aboniments` (
  `Id` int NOT NULL,
  `UserLogin` varchar(24) NOT NULL,
  `AbonimentCode` int NOT NULL,
  `TarifName` varchar(32) NOT NULL,
  `BuyDate` date NOT NULL,
  `CloseDate` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Дамп данных таблицы `Aboniments`
--

INSERT INTO `Aboniments` (`Id`, `UserLogin`, `AbonimentCode`, `TarifName`, `BuyDate`, `CloseDate`) VALUES
(1, 'Kurt Cobaine', 512325, 'RELAX MINI', '2024-04-10', '2024-05-10'),
(2, 'arcada123', 88741144, 'DOLPHIN +', '2024-04-30', '2024-05-30'),
(3, 'agwefwe', 466804229, 'STANDART', '2024-04-30', '2024-05-30'),
(4, 'alyosha21', 330278393, 'DOLPHIN +', '2024-04-30', '2024-05-30'),
(5, 'alyosha21', 456285829, 'DOLPHIN +', '2024-04-30', '2024-05-30'),
(6, 'alyosha21', 989006238, 'RELAX MINI', '2024-04-30', '2024-05-30'),
(7, 'alyosha21', 89314766, 'STANDART', '2024-04-30', '2024-05-30'),
(8, 'arcada123', 260808194, 'RELAX MINI', '2024-05-02', '2024-06-02'),
(9, 'kolyan21', 51850357, 'RELAX MINI', '2024-04-30', '2024-05-30'),
(11, 'gaspacho21', 824439342, 'DOLPHIN +', '2024-05-01', '2024-06-01');

-- --------------------------------------------------------

--
-- Структура таблицы `Company`
--

CREATE TABLE `Company` (
  `Telephone` varchar(20) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NOT NULL,
  `Email` varchar(42) NOT NULL,
  `Telegram` varchar(64) NOT NULL,
  `Youtube` varchar(64) NOT NULL,
  `Instagram` varchar(64) NOT NULL,
  `Vkontakte` varchar(64) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Дамп данных таблицы `Company`
--

INSERT INTO `Company` (`Telephone`, `Email`, `Telegram`, `Youtube`, `Instagram`, `Vkontakte`) VALUES
('+791752717423', 'dolphinpark@mail.ru', 't.me/hotspot123', 'youtube', 'instagram', 'vk');

-- --------------------------------------------------------

--
-- Структура таблицы `Geo`
--

CREATE TABLE `Geo` (
  `Id` int NOT NULL,
  `Address` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Дамп данных таблицы `Geo`
--

INSERT INTO `Geo` (`Id`, `Address`) VALUES
(1, 'г. Саратов, Пушкина 77/2'),
(2, 'г. Саратов, Ломоносова 38А'),
(3, 'г. Энгельс, Маяковского 73');

-- --------------------------------------------------------

--
-- Структура таблицы `Rates`
--

CREATE TABLE `Rates` (
  `Id` int NOT NULL,
  `Name` varchar(32) NOT NULL,
  `Conditions` varchar(255) NOT NULL,
  `Days` int NOT NULL,
  `Price` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Дамп данных таблицы `Rates`
--

INSERT INTO `Rates` (`Id`, `Name`, `Conditions`, `Days`, `Price`) VALUES
(1, 'RELAX MINI', 'Набор для купания', 30, 1200),
(2, 'STANDART', 'Набор для купания, Вход с гостями', 30, 2200),
(3, 'DOLPHIN +', 'Набор для купания, Вход с гостями, VIP-горки, Сауна', 30, 3700);

-- --------------------------------------------------------

--
-- Структура таблицы `Reviews`
--

CREATE TABLE `Reviews` (
  `Id` int NOT NULL,
  `UserLogin` varchar(24) NOT NULL,
  `Comment` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Дамп данных таблицы `Reviews`
--

INSERT INTO `Reviews` (`Id`, `UserLogin`, `Comment`) VALUES
(1, 'gaspacho21', 'Отзыв админа'),
(2, 'lobaloba22', 'ааа?'),
(3, 'lobaloba22', 'ага'),
(5, 'kolyan21', 'вы кто такие все?'),
(6, 'bydka123', 'шуршим шуршим');

-- --------------------------------------------------------

--
-- Структура таблицы `Users`
--

CREATE TABLE `Users` (
  `Id` int NOT NULL,
  `Name` varchar(124) NOT NULL,
  `Login` varchar(24) NOT NULL,
  `Email` varchar(42) NOT NULL,
  `Password` varchar(255) NOT NULL,
  `AbonimentCode` int NOT NULL,
  `Status` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Дамп данных таблицы `Users`
--

INSERT INTO `Users` (`Id`, `Name`, `Login`, `Email`, `Password`, `AbonimentCode`, `Status`) VALUES
(1, 'Вальдемар Гаусс', 'arcada123', 'vladimirbatya69@gmail.com', '086e1b7e1c12ba37cd473670b3a15214', 0, 0),
(4, 'Снежана Губа', 'agwefwe', 'maxytko108@gmail.com', '086e1b7e1c12ba37cd473670b3a15214', 0, 0),
(5, 'Лобан Греческий', 'lobaloba22', 'email@gmail.ru', '086e1b7e1c12ba37cd473670b3a15214', 0, 0),
(6, 'Никитка Гулаг', 'alyosha21', 'test123@gmail.com', '086e1b7e1c12ba37cd473670b3a15214', 0, 0),
(7, 'Коля Псих', 'kolyan21', 'poko@mail.ru', '086e1b7e1c12ba37cd473670b3a15214', 0, 0),
(9, 'Вальдемар Ткацкий', 'gaspacho21', 'maxytko108@gmail.com', '086e1b7e1c12ba37cd473670b3a15214', 824439342, 1);

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `Aboniments`
--
ALTER TABLE `Aboniments`
  ADD PRIMARY KEY (`Id`);

--
-- Индексы таблицы `Geo`
--
ALTER TABLE `Geo`
  ADD PRIMARY KEY (`Id`);

--
-- Индексы таблицы `Rates`
--
ALTER TABLE `Rates`
  ADD PRIMARY KEY (`Id`);

--
-- Индексы таблицы `Reviews`
--
ALTER TABLE `Reviews`
  ADD PRIMARY KEY (`Id`);

--
-- Индексы таблицы `Users`
--
ALTER TABLE `Users`
  ADD PRIMARY KEY (`Id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `Aboniments`
--
ALTER TABLE `Aboniments`
  MODIFY `Id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT для таблицы `Geo`
--
ALTER TABLE `Geo`
  MODIFY `Id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT для таблицы `Rates`
--
ALTER TABLE `Rates`
  MODIFY `Id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT для таблицы `Reviews`
--
ALTER TABLE `Reviews`
  MODIFY `Id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT для таблицы `Users`
--
ALTER TABLE `Users`
  MODIFY `Id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
