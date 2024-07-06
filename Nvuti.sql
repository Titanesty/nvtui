-- phpMyAdmin SQL Dump
-- version 4.4.15.10
-- https://www.phpmyadmin.net
--
-- Хост: localhost
-- Время создания: Фев 04 2020 г., 22:08
-- Версия сервера: 5.7.23-24
-- Версия PHP: 5.3.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `u0916156_zreshehsrbser`
--

-- --------------------------------------------------------

--
-- Структура таблицы `kot_admin`
--

CREATE TABLE IF NOT EXISTS `kot_admin` (
  `id` int(11) NOT NULL,
  `bank` varchar(50) NOT NULL,
  `zarabotok` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `kot_admin`
--

INSERT INTO `kot_admin` (`id`, `bank`, `zarabotok`) VALUES
(1, '464.73999999999944', '360.64000000000163');

-- --------------------------------------------------------

--
-- Структура таблицы `kot_bots`
--

CREATE TABLE IF NOT EXISTS `kot_bots` (
  `id` int(11) NOT NULL,
  `bot_login` varchar(50) NOT NULL,
  `bot_min_bet` varchar(50) NOT NULL DEFAULT '1',
  `bot_max_bet` varchar(50) NOT NULL DEFAULT '100',
  `status` varchar(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Структура таблицы `kot_chance`
--

CREATE TABLE IF NOT EXISTS `kot_chance` (
  `id` int(11) NOT NULL,
  `per` varchar(2) NOT NULL,
  `chance` varchar(3) NOT NULL,
  `is_drop` varchar(1) NOT NULL DEFAULT '1',
  `active` varchar(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Структура таблицы `kot_chat`
--

CREATE TABLE IF NOT EXISTS `kot_chat` (
  `id` int(11) NOT NULL,
  `vk_id` int(11) NOT NULL,
  `id_users` int(11) NOT NULL,
  `login` text NOT NULL,
  `photo` text NOT NULL,
  `mess` text NOT NULL,
  `prava` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Структура таблицы `kot_config`
--

CREATE TABLE IF NOT EXISTS `kot_config` (
  `id` int(11) NOT NULL,
  `sitename` varchar(50) NOT NULL DEFAULT 'KotDev',
  `sitedomen` varchar(50) NOT NULL,
  `sitegroup` varchar(50) NOT NULL,
  `sitesupport` varchar(150) NOT NULL,
  `sitekey` varchar(150) NOT NULL,
  `sitemail` varchar(50) NOT NULL,
  `min_bonus_size` varchar(50) NOT NULL DEFAULT '1',
  `max_bonus_size` varchar(50) NOT NULL DEFAULT '10',
  `min_withdraw_sum` varchar(50) NOT NULL DEFAULT '50',
  `bonus_reg` varchar(50) NOT NULL DEFAULT '5',
  `fk_id` varchar(50) NOT NULL,
  `fk_secret_1` varchar(50) NOT NULL,
  `fk_secret_2` varchar(50) NOT NULL,
  `dep_withdraw` varchar(50) NOT NULL DEFAULT '0',
  `min_bet` varchar(50) NOT NULL DEFAULT '1',
  `max_bet` varchar(50) NOT NULL DEFAULT '1000',
  `min_per` varchar(50) NOT NULL DEFAULT '1',
  `max_per` varchar(50) NOT NULL DEFAULT '95',
  `fake_online` varchar(50) NOT NULL DEFAULT '0',
  `fake_interval` varchar(50) NOT NULL DEFAULT '0',
  `min_sum_dep` varchar(50) NOT NULL DEFAULT '1',
  `id_vk` varchar(500) NOT NULL,
  `token_vk` varchar(500) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `kot_config`
--

INSERT INTO `kot_config` (`id`, `sitename`, `sitedomen`, `sitegroup`, `sitesupport`, `sitekey`, `sitemail`, `min_bonus_size`, `max_bonus_size`, `min_withdraw_sum`, `bonus_reg`, `fk_id`, `fk_secret_1`, `fk_secret_2`, `dep_withdraw`, `min_bet`, `max_bet`, `min_per`, `max_per`, `fake_online`, `fake_interval`, `min_sum_dep`, `id_vk`, `token_vk`) VALUES
(1, 'Nvuti', 'test', 'test', 'test', '', 'test', '1', '20', '20', '2', '123', '123', '123', '5', '1', '100000', '1', '95', '0', '555555555', '1', '123', '123');

-- --------------------------------------------------------

--
-- Структура таблицы `kot_games`
--

CREATE TABLE IF NOT EXISTS `kot_games` (
  `id` int(11) NOT NULL,
  `user_id` varchar(50) NOT NULL,
  `login` varchar(50) NOT NULL,
  `number` varchar(50) NOT NULL,
  `cel` varchar(50) NOT NULL,
  `sum` varchar(50) NOT NULL,
  `chance` int(11) NOT NULL,
  `type` varchar(50) NOT NULL,
  `win_summa` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Структура таблицы `kot_payments`
--

CREATE TABLE IF NOT EXISTS `kot_payments` (
  `id` int(11) NOT NULL,
  `user_id` varchar(50) NOT NULL,
  `suma` varchar(50) NOT NULL,
  `data` varchar(50) NOT NULL,
  `qiwi` varchar(50) NOT NULL,
  `transaction` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Структура таблицы `kot_promo`
--

CREATE TABLE IF NOT EXISTS `kot_promo` (
  `id` int(11) NOT NULL,
  `date` varchar(50) NOT NULL,
  `is_admin` varchar(1) NOT NULL DEFAULT '0',
  `name` varchar(50) NOT NULL,
  `sum` varchar(50) NOT NULL,
  `active` varchar(50) NOT NULL,
  `actived` varchar(50) NOT NULL DEFAULT '0',
  `id_active` varchar(1500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Структура таблицы `kot_user`
--

CREATE TABLE IF NOT EXISTS `kot_user` (
  `id` int(11) NOT NULL,
  `login` varchar(50) NOT NULL,
  `vk_name` varchar(50) NOT NULL,
  `pass` varchar(50) NOT NULL,
  `balance` varchar(50) NOT NULL,
  `img` varchar(250) NOT NULL,
  `hash` varchar(50) NOT NULL,
  `social` varchar(150) NOT NULL,
  `bdate` varchar(50) NOT NULL,
  `online` varchar(1) NOT NULL DEFAULT '1',
  `admin` varchar(1) NOT NULL DEFAULT '0',
  `ban` varchar(1) NOT NULL DEFAULT '0',
  `sliv` varchar(1) NOT NULL DEFAULT '0',
  `win` varchar(1) NOT NULL DEFAULT '0',
  `ref_id` varchar(11) NOT NULL DEFAULT '0',
  `ip` varchar(50) NOT NULL,
  `date_reg` varchar(50) NOT NULL,
  `online_time` varchar(50) NOT NULL,
  `chat_ban` varchar(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Структура таблицы `kot_withdraws`
--

CREATE TABLE IF NOT EXISTS `kot_withdraws` (
  `id` int(11) NOT NULL,
  `user_id` varchar(50) NOT NULL,
  `ps` varchar(50) NOT NULL,
  `wallet` varchar(50) NOT NULL,
  `sum` varchar(50) NOT NULL,
  `date` varchar(50) NOT NULL,
  `status` varchar(1) NOT NULL DEFAULT '0',
  `fake` varchar(1) NOT NULL DEFAULT '0',
  `login_fake` varchar(50) NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Структура таблицы `mines-game`
--

CREATE TABLE IF NOT EXISTS `mines-game` (
  `id` int(11) NOT NULL,
  `id_users` int(11) NOT NULL,
  `login` text NOT NULL,
  `num_mines` int(11) NOT NULL,
  `bet` int(11) NOT NULL,
  `mines` text NOT NULL,
  `click` text NOT NULL,
  `onOff` text NOT NULL,
  `result` text NOT NULL,
  `step` int(11) NOT NULL,
  `win` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `kot_admin`
--
ALTER TABLE `kot_admin`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `kot_bots`
--
ALTER TABLE `kot_bots`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `kot_chance`
--
ALTER TABLE `kot_chance`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `kot_chat`
--
ALTER TABLE `kot_chat`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `kot_config`
--
ALTER TABLE `kot_config`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `kot_games`
--
ALTER TABLE `kot_games`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `kot_payments`
--
ALTER TABLE `kot_payments`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `kot_promo`
--
ALTER TABLE `kot_promo`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `kot_user`
--
ALTER TABLE `kot_user`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `kot_withdraws`
--
ALTER TABLE `kot_withdraws`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `mines-game`
--
ALTER TABLE `mines-game`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `kot_bots`
--
ALTER TABLE `kot_bots`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT для таблицы `kot_chance`
--
ALTER TABLE `kot_chance`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT для таблицы `kot_chat`
--
ALTER TABLE `kot_chat`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT для таблицы `kot_config`
--
ALTER TABLE `kot_config`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT для таблицы `kot_games`
--
ALTER TABLE `kot_games`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT для таблицы `kot_payments`
--
ALTER TABLE `kot_payments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT для таблицы `kot_promo`
--
ALTER TABLE `kot_promo`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT для таблицы `kot_user`
--
ALTER TABLE `kot_user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT для таблицы `kot_withdraws`
--
ALTER TABLE `kot_withdraws`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT для таблицы `mines-game`
--
ALTER TABLE `mines-game`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
