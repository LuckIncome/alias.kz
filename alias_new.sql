-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Хост: srv-pleskdb28.ps.kz:3306
-- Время создания: Сен 23 2021 г., 10:46
-- Версия сервера: 10.2.39-MariaDB
-- Версия PHP: 7.4.22

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `alias_new`
--

-- --------------------------------------------------------

--
-- Структура таблицы `applications`
--

CREATE TABLE `applications` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `company` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

--
-- Дамп данных таблицы `applications`
--

INSERT INTO `applications` (`id`, `company`, `phone`, `email`, `created_at`, `updated_at`) VALUES
(1, 'xxx', 'xxx', 'xxx', '2021-07-23 13:22:02', '2021-07-23 13:22:02'),
(2, 'xxx', 'xxx', 'xxx', '2021-07-23 13:22:02', '2021-07-23 13:22:02'),
(3, 'xxx', 'xxx', 'xxx', '2021-07-23 13:22:02', '2021-07-23 13:22:02'),
(4, 'Дархан-Кайсар', '+77078210007', 'yerlan2007@gmail.com', '2021-08-19 06:36:10', '2021-08-19 06:36:10'),
(5, 'ТОО \"АСТИНК Лтд\"', '+7 (705) 777-68-58', 'astink2016@mail.ru', '2021-08-19 22:18:08', '2021-08-19 22:18:08'),
(6, 'Нургазы', '+7 (702) 000-39-29', 'uuuuu@outlook.com', '2021-08-22 09:15:06', '2021-08-22 09:15:06'),
(7, 'Адиль и Эльдар ТОО', '+7 (700) 448-40-48', 'aliasvalve@gmail.com', '2021-08-22 21:22:17', '2021-08-22 21:22:17'),
(8, 'Moore Group', '+7 (177) 416-08-92', 'dkcupp@sbcglobal.net', '2021-08-23 18:12:13', '2021-08-23 18:12:13'),
(9, 'Аян', '+7 (700) 089-99-05', 'ayansr86@mail.ru', '2021-08-23 23:06:28', '2021-08-23 23:06:28'),
(10, 'Сталь Сервис Казахстан', '+7 (771) 046-51-51', '114@steels.kz', '2021-08-24 02:58:10', '2021-08-24 02:58:10'),
(11, 'АО \"КазНИИСА\"', '+7 (778) 121-70-00', 'msharipov@kazniisa.kz', '2021-08-24 04:30:13', '2021-08-24 04:30:13');

-- --------------------------------------------------------

--
-- Структура таблицы `attachmentable`
--

CREATE TABLE `attachmentable` (
  `id` int(10) UNSIGNED NOT NULL,
  `attachmentable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `attachmentable_id` int(10) UNSIGNED NOT NULL,
  `attachment_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

-- --------------------------------------------------------

--
-- Структура таблицы `attachments`
--

CREATE TABLE `attachments` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `original_name` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `mime` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `extension` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `size` bigint(20) NOT NULL DEFAULT 0,
  `sort` int(11) NOT NULL DEFAULT 0,
  `path` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `alt` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `hash` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `disk` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'public',
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `group` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

--
-- Дамп данных таблицы `attachments`
--

INSERT INTO `attachments` (`id`, `name`, `original_name`, `mime`, `extension`, `size`, `sort`, `path`, `description`, `alt`, `hash`, `disk`, `user_id`, `group`, `created_at`, `updated_at`) VALUES
(1, 'c021ed84f3fb3f6415c8b7b394dbc5384ea1666a', 'image.png', 'image/png', 'png', 121503, 0, '2021/07/23/', NULL, NULL, 'c73dee926b488803b0409f2727b13940bd7d7331', 'public', 1, NULL, '2021-07-23 13:22:16', '2021-07-23 13:22:16'),
(5, 'f5d5e21841f5c91061a24cb55e6534d9a707b217', 'Valve.jpeg', 'image/jpeg', 'jpeg', 762005, 0, '2021/09/15/', NULL, NULL, 'e9af6c5898843b931a448d6da800c9f56eef1cba', 'public', 1, NULL, '2021-09-15 02:43:58', '2021-09-15 02:43:58');

-- --------------------------------------------------------

--
-- Структура таблицы `categories`
--

CREATE TABLE `categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `hide` tinyint(1) NOT NULL DEFAULT 0,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `seo_keywords` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `seo_description` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

--
-- Дамп данных таблицы `categories`
--

INSERT INTO `categories` (`id`, `hide`, `name`, `slug`, `seo_keywords`, `seo_description`, `description`, `created_at`, `updated_at`) VALUES
(1, 0, 'Задвижки', 'zadvizki', 'xxx', 'xxx', NULL, '2021-07-23 13:22:02', '2021-08-24 02:31:56'),
(2, 0, 'Краны', 'krany', 'xxx', 'xxx', NULL, '2021-07-23 13:22:02', '2021-07-23 13:22:02'),
(3, 0, 'Обратные клапана', 'obratnye-klapana', 'xxx', 'xxx', NULL, '2021-07-23 13:22:02', '2021-07-23 13:22:02'),
(4, 0, 'Вентиля', 'ventilya', 'xxx', 'xxx', NULL, '2021-07-23 13:22:02', '2021-07-23 13:22:02'),
(5, 0, 'Противопожарная безопасность', 'protivopozarnaya-bezopasnost', 'xxx', 'xxx', NULL, '2021-07-23 13:22:02', '2021-07-23 13:22:02'),
(6, 0, 'Фильтры', 'filtry', 'xxx', 'xxx', NULL, '2021-07-23 13:22:02', '2021-07-23 13:22:02'),
(7, 0, 'Резьбовые фитинги для труб', 'rezbovye-fitingi-dlya-trub', 'xxx', 'xxx', NULL, '2021-07-23 13:22:02', '2021-07-23 13:22:02'),
(8, 0, 'Сварные фитинги для труб', 'svarnye-fitingi-dlya-trub', 'xxx', 'xxx', NULL, '2021-07-23 13:22:02', '2021-07-23 13:22:02'),
(9, 0, 'ПЭ фитинги', 'pe-fitingi', 'xxx', 'xxx', NULL, '2021-07-23 13:22:02', '2021-07-23 13:22:02'),
(10, 0, 'PPR фитинги', 'ppr-fitingi', 'xxx', 'xxx', NULL, '2021-07-23 13:22:02', '2021-07-23 13:22:02'),
(11, 0, 'Электроды диски отрезные', 'elektrody-diski-otreznye', 'xxx', 'xxx', NULL, '2021-07-23 13:22:02', '2021-07-23 13:22:02'),
(12, 0, 'Нержавейка', 'nerzaveika', 'xxx', 'xxx', NULL, '2021-07-23 13:22:02', '2021-07-23 13:22:02'),
(13, 0, 'Прочие', 'procie', 'xxx', 'xxx', NULL, '2021-07-23 13:22:02', '2021-07-23 13:22:02');

-- --------------------------------------------------------

--
-- Структура таблицы `certificates`
--

CREATE TABLE `certificates` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `hide` tinyint(1) NOT NULL DEFAULT 0,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` bigint(20) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

--
-- Дамп данных таблицы `certificates`
--

INSERT INTO `certificates` (`id`, `hide`, `name`, `image`, `created_at`, `updated_at`) VALUES
(1, 0, 'Сертификат 1', 1, '2021-07-23 13:22:02', '2021-07-23 13:22:02'),
(2, 0, 'Сертификат 2', 1, '2021-07-23 13:22:02', '2021-07-23 13:22:02'),
(3, 0, 'Сертификат 3', 1, '2021-07-23 13:22:02', '2021-07-23 13:22:02');

-- --------------------------------------------------------

--
-- Структура таблицы `contacts`
--

CREATE TABLE `contacts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `hide` tinyint(1) NOT NULL DEFAULT 0,
  `city` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

--
-- Дамп данных таблицы `contacts`
--

INSERT INTO `contacts` (`id`, `hide`, `city`, `created_at`, `updated_at`) VALUES
(1, 0, 'Алматы', '2021-07-23 13:22:02', '2021-07-23 13:22:02'),
(2, 0, 'Нур-Султан', '2021-07-23 13:22:02', '2021-07-23 13:22:02'),
(3, 0, 'Актау', '2021-07-23 13:22:02', '2021-07-23 13:22:02'),
(4, 0, 'Актобе', '2021-07-23 13:22:02', '2021-07-23 13:22:02'),
(5, 0, 'Атырау', '2021-07-23 13:22:02', '2021-07-23 13:22:02'),
(6, 0, 'Кызылорда', '2021-07-23 13:22:02', '2021-07-23 13:22:02'),
(7, 0, 'Караганда', '2021-07-23 13:22:02', '2021-07-23 13:22:02'),
(8, 0, 'Павлодар', '2021-07-23 13:22:02', '2021-07-23 13:22:02'),
(9, 0, 'Уральск', '2021-07-23 13:22:02', '2021-07-23 13:22:02'),
(10, 0, 'Усть-Каменогорск', '2021-07-23 13:22:02', '2021-07-23 13:22:02'),
(11, 0, 'Шымкент', '2021-07-23 13:22:02', '2021-07-23 13:22:02'),
(12, 0, 'Туркестан', '2021-07-23 13:22:02', '2021-07-23 13:22:02');

-- --------------------------------------------------------

--
-- Структура таблицы `contact_addresses`
--

CREATE TABLE `contact_addresses` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `contact_id` bigint(20) UNSIGNED NOT NULL,
  `value` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

--
-- Дамп данных таблицы `contact_addresses`
--

INSERT INTO `contact_addresses` (`id`, `contact_id`, `value`, `created_at`, `updated_at`) VALUES
(1, 1, 'пр. Райымбека, 312 (уг. ул. Брусиловского)', '2021-07-23 13:22:02', '2021-07-23 13:22:02'),
(2, 1, 'ул.Красногорская, 69 (район 70-го разъезда)', '2021-07-23 13:22:02', '2021-07-23 13:22:02'),
(3, 2, 'ул. Павлова 37/3 (база Строй Комплект) 1-этаж кабинет №2 индекс  010000', '2021-07-23 13:22:02', '2021-09-02 03:22:13'),
(4, 3, 'район базы ОРСа, магазин АЛЬХАМ, индекс 130000', '2021-09-02 03:30:41', '2021-09-02 03:38:00'),
(5, 4, 'пр-т 312 стрелковой дивизии 11б территории Дастан Индекс 030000', '2021-09-02 03:53:29', '2021-09-02 03:53:29'),
(6, 5, 'ул. Майлина 81, индекс 060002', '2021-09-02 03:56:41', '2021-09-02 03:56:41'),
(7, 6, 'ул. Жаппасбай батыра 40, индекс 120700', '2021-09-02 04:04:57', '2021-09-02 04:04:57'),
(8, 7, 'ул.Резника 5 офис 8 индекс 100022', '2021-09-13 02:34:24', '2021-09-13 02:34:24'),
(9, 8, 'ул.Ломова 180/3 индекс 140013', '2021-09-13 02:42:46', '2021-09-13 02:42:46'),
(10, 9, 'ул.Мирзояна д.1/2А индекс 090003', '2021-09-13 02:43:45', '2021-09-13 02:44:42'),
(11, 10, 'пер-к 6й Паровозный 8 индекс 070009', '2021-09-13 02:57:37', '2021-09-13 02:57:37'),
(12, 11, 'ул.Акназар хана2/6 индекс 160012', '2021-09-13 03:12:27', '2021-09-13 03:12:27'),
(13, 12, 'ул. 10лет независимости 18а офис Макамбай ата 3этаж', '2021-09-13 03:18:07', '2021-09-13 03:18:07');

-- --------------------------------------------------------

--
-- Структура таблицы `contact_emails`
--

CREATE TABLE `contact_emails` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `contact_id` bigint(20) UNSIGNED NOT NULL,
  `value` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

--
-- Дамп данных таблицы `contact_emails`
--

INSERT INTO `contact_emails` (`id`, `contact_id`, `value`, `created_at`, `updated_at`) VALUES
(3, 1, 'aliasvalve@gmail.com', '2021-07-23 13:22:02', '2021-08-25 00:29:24'),
(4, 2, 'Astana.avg@gmail.com', '2021-09-02 03:24:20', '2021-09-02 03:24:20'),
(5, 3, 'avg_aktau@mail.ru', '2021-09-02 03:45:55', '2021-09-02 03:45:55'),
(6, 4, 'avgvalveaktobe@gmail.com', '2021-09-02 03:54:08', '2021-09-02 03:54:08'),
(7, 5, 'avgatyrau@gmail.com', '2021-09-02 03:58:30', '2021-09-02 03:58:30'),
(8, 6, 'avg_kyzylorda@mail.ru', '2021-09-02 04:08:46', '2021-09-02 04:08:46'),
(9, 7, 'avgkrg@mail.ru', '2021-09-13 02:32:54', '2021-09-13 02:32:54'),
(10, 8, 'avg_pavlodar@mail.ru', '2021-09-13 02:41:14', '2021-09-13 02:41:14'),
(11, 8, 'avgpavlodar@gmail.com', '2021-09-13 02:41:46', '2021-09-13 02:41:46'),
(12, 9, 'alias_zko@mail.ru', '2021-09-13 02:46:51', '2021-09-13 02:46:51'),
(13, 10, 'avg_ukg@mail.ru', '2021-09-13 02:53:11', '2021-09-13 02:53:11'),
(14, 11, 'Avg_shymkent@mail.ru', '2021-09-13 03:11:19', '2021-09-13 03:11:19'),
(15, 12, 'terkestan.avg@mail.ru', '2021-09-13 03:16:28', '2021-09-13 03:16:28');

-- --------------------------------------------------------

--
-- Структура таблицы `contact_phones`
--

CREATE TABLE `contact_phones` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `contact_id` bigint(20) UNSIGNED NOT NULL,
  `value` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

--
-- Дамп данных таблицы `contact_phones`
--

INSERT INTO `contact_phones` (`id`, `contact_id`, `value`, `created_at`, `updated_at`) VALUES
(2, 1, '+7 (771) 789 30 46', '2021-07-23 13:22:02', '2021-09-02 02:40:04'),
(3, 1, '+7 (771) 780 87 37', '2021-07-23 13:22:02', '2021-07-23 13:22:02'),
(4, 1, '+7 (771) 789 30 47', '2021-09-02 02:39:12', '2021-09-02 02:39:12'),
(5, 1, '+7 (771) 780 87 24', '2021-09-02 02:40:43', '2021-09-02 02:40:43'),
(6, 2, '+7 (717) 254 56 43', '2021-09-02 03:15:06', '2021-09-02 03:15:06'),
(7, 2, '+7 (771) 780 87 45', '2021-09-02 03:16:25', '2021-09-02 03:16:25'),
(8, 2, '+7 (771) 754 55 64', '2021-09-02 03:16:54', '2021-09-02 03:17:30'),
(9, 2, '+7 (771) 754 15 23', '2021-09-02 03:23:11', '2021-09-02 03:23:11'),
(10, 3, '+7 (771) 780 87 38', '2021-09-02 03:40:10', '2021-09-02 03:40:10'),
(11, 3, '+7 (701) 117 08 15', '2021-09-02 03:45:17', '2021-09-02 03:45:17'),
(12, 4, '+7 (771) 780 87 44', '2021-09-02 03:50:14', '2021-09-02 03:50:14'),
(13, 4, '+7 (771) 780 87 33', '2021-09-02 03:51:05', '2021-09-02 03:51:05'),
(14, 4, '+7 (708) 221 30 58', '2021-09-02 03:51:26', '2021-09-02 03:51:26'),
(15, 5, '+7 (712) 246 61 63', '2021-09-02 04:01:39', '2021-09-02 04:01:39'),
(16, 5, '+7 (771) 780 87 34', '2021-09-02 04:02:14', '2021-09-02 04:02:14'),
(17, 5, '+7 (771) 780 87 35', '2021-09-02 04:02:38', '2021-09-02 04:02:38'),
(19, 6, '+7 (771) 780 87 48', '2021-09-02 04:06:50', '2021-09-02 04:06:50'),
(20, 6, '+7 (771) 780 87 49', '2021-09-02 04:07:10', '2021-09-02 04:07:10'),
(21, 7, '+7 (771) 780 87 29', '2021-09-13 02:30:57', '2021-09-13 02:30:57'),
(22, 7, '+7 (701) 316 13 96', '2021-09-13 02:31:27', '2021-09-13 02:31:27'),
(23, 7, '+7 (705) 317 57 26', '2021-09-13 02:31:52', '2021-09-13 02:31:52'),
(24, 8, '+7 (771) 780 87 41', '2021-09-13 02:35:30', '2021-09-13 02:35:30'),
(25, 8, '+7 (771) 780 87 42', '2021-09-13 02:35:55', '2021-09-13 02:35:55'),
(26, 8, '+7 (718) 260 90 78', '2021-09-13 02:37:41', '2021-09-13 02:37:41'),
(27, 9, '+7 (771) 780 87 43', '2021-09-13 02:48:16', '2021-09-13 02:48:16'),
(28, 9, '+7 (771) 780 87 36', '2021-09-13 02:48:53', '2021-09-13 02:48:53'),
(29, 10, '+7 (771) 780 87 26', '2021-09-13 02:54:04', '2021-09-13 02:54:04'),
(30, 10, '+7 (771) 780 87 25', '2021-09-13 02:54:26', '2021-09-13 02:54:26'),
(31, 10, '+7 (723) 254 30 92', '2021-09-13 02:54:47', '2021-09-13 02:54:47'),
(32, 11, '+7 (771) 780 87 32', '2021-09-13 03:03:09', '2021-09-13 03:03:09'),
(33, 11, '+7 (771) 780 87 31', '2021-09-13 03:03:28', '2021-09-13 03:03:28'),
(34, 12, '+7 (775) 126 36 26', '2021-09-13 03:13:57', '2021-09-13 03:13:57'),
(35, 12, '+7 (771) 552 19 39', '2021-09-13 03:14:21', '2021-09-13 03:14:21');

-- --------------------------------------------------------

--
-- Структура таблицы `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

-- --------------------------------------------------------

--
-- Структура таблицы `footers`
--

CREATE TABLE `footers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `hide` tinyint(1) NOT NULL DEFAULT 0,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `value` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

--
-- Дамп данных таблицы `footers`
--

INSERT INTO `footers` (`id`, `hide`, `name`, `description`, `value`, `created_at`, `updated_at`) VALUES
(1, 0, 'address', 'Адрес', 'г.Алматы ул.Райымбека 312 офис 201', '2021-07-23 13:22:02', '2021-07-23 13:22:02'),
(2, 0, 'email', 'Почта', 'aliasvalve@gmail.com', '2021-07-23 13:22:02', '2021-07-23 13:22:02'),
(3, 0, 'phone-1', 'Телефонный номер 1', '8 727 344 07 64', '2021-07-23 13:22:02', '2021-07-23 13:22:02'),
(4, 0, 'phone-2', 'Телефонный номер 2', '383 75-96', '2021-07-23 13:22:02', '2021-07-23 13:22:02'),
(5, 0, 'mobile-phone-1', 'Мобильный номер 1', '8 771 780 87 24', '2021-07-23 13:22:02', '2021-07-23 13:22:02'),
(6, 0, 'mobile-phone-2', 'Мобильный номер 2', '8 775 221 63 25', '2021-07-23 13:22:02', '2021-07-23 13:22:02');

-- --------------------------------------------------------

--
-- Структура таблицы `headers`
--

CREATE TABLE `headers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `hide` tinyint(1) NOT NULL DEFAULT 0,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `value` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

--
-- Дамп данных таблицы `headers`
--

INSERT INTO `headers` (`id`, `hide`, `name`, `description`, `value`, `created_at`, `updated_at`) VALUES
(1, 0, 'phone', 'Номер телефона', '8 771 780 87 37', '2021-07-23 13:22:02', '2021-07-23 13:22:02'),
(2, 0, 'schedule-mf', 'Пн-Пт', '9:00-18:00', '2021-07-23 13:22:02', '2021-07-23 13:22:02'),
(3, 0, 'schedule-saturday', 'Суббота', '9:00-13:00', '2021-07-23 13:22:02', '2021-07-23 13:22:02'),
(4, 0, 'schedule-sunday', 'Воскресенье', 'выходной', '2021-07-23 13:22:02', '2021-07-23 13:22:02');

-- --------------------------------------------------------

--
-- Структура таблицы `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

--
-- Дамп данных таблицы `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2015_04_12_000000_create_orchid_users_table', 1),
(4, '2015_10_19_214424_create_orchid_roles_table', 1),
(5, '2015_10_19_214425_create_orchid_role_users_table', 1),
(6, '2016_08_07_125128_create_orchid_attachmentstable_table', 1),
(7, '2017_09_17_125801_create_notifications_table', 1),
(8, '2019_08_19_000000_create_failed_jobs_table', 1),
(9, '2021_07_13_114250_create_social_networks_table', 1),
(10, '2021_07_14_070740_create_categories_table', 1),
(11, '2021_07_14_142701_create_subcategories_table', 1),
(12, '2021_07_15_123400_create_products_table', 1),
(13, '2021_07_17_085211_create_news_table', 1),
(14, '2021_07_17_085211_create_reviews_table', 1),
(15, '2021_07_17_085212_create_contacts_table', 1),
(16, '2021_07_17_085212_create_promotions_table', 1),
(17, '2021_07_17_085213_create_certificates_table', 1),
(18, '2021_07_17_085214_create_footers_table', 1),
(19, '2021_07_17_085214_create_headers_table', 1),
(20, '2021_07_17_140536_create_contact_emails_table', 1),
(21, '2021_07_17_140539_create_contact_phones_table', 1),
(22, '2021_07_19_170827_create_contact_addresses_table', 1),
(23, '2021_07_23_100533_create_applications_table', 1),
(24, '2021_07_23_100544_create_seo_table', 1);

-- --------------------------------------------------------

--
-- Структура таблицы `news`
--

CREATE TABLE `news` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `hide` tinyint(1) NOT NULL DEFAULT 0,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `seo_keywords` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `seo_description` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `text` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` bigint(20) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

--
-- Дамп данных таблицы `news`
--

INSERT INTO `news` (`id`, `hide`, `name`, `title`, `slug`, `seo_keywords`, `seo_description`, `text`, `image`, `created_at`, `updated_at`) VALUES
(1, 0, 'Заголовок новости 1', 'xxx', 'zagolovok-novosti-1', 'xxx', 'xxx', 'Повседневная практика показывает, что постоянное информационно-пропагандистское обеспечение нашей деятельности требуют определения и уточнения дальнейших направлений развития.', 1, '2021-07-23 13:22:02', '2021-07-23 13:22:02'),
(2, 0, 'Заголовок новости 2', 'xxx', 'zagolovok-novosti-2', 'xxx', 'xxx', 'Повседневная практика показывает, что постоянное информационно-пропагандистское обеспечение нашей деятельности требуют определения и уточнения дальнейших направлений развития.', 1, '2021-07-23 13:22:02', '2021-07-23 13:22:02'),
(3, 0, 'Заголовок новости 3', 'xxx', 'zagolovok-novosti-3', 'xxx', 'xxx', 'Повседневная практика показывает, что постоянное информационно-пропагандистское обеспечение нашей деятельности требуют определения и уточнения дальнейших направлений развития.', 1, '2021-07-23 13:22:02', '2021-07-23 13:22:02'),
(4, 0, 'Заголовок новости 4', 'xxx', 'zagolovok-novosti-4', 'xxx', 'xxx', 'Повседневная практика показывает, что постоянное информационно-пропагандистское обеспечение нашей деятельности требуют определения и уточнения дальнейших направлений развития.', 1, '2021-07-23 13:22:02', '2021-07-23 13:22:02'),
(5, 0, 'Заголовок новости 5', 'xxx', 'zagolovok-novosti-5', 'xxx', 'xxx', 'Повседневная практика показывает, что постоянное информационно-пропагандистское обеспечение нашей деятельности требуют определения и уточнения дальнейших направлений развития.', 1, '2021-07-23 13:22:02', '2021-07-23 13:22:02'),
(6, 0, 'Заголовок новости 6', 'xxx', 'zagolovok-novosti-6', 'xxx', 'xxx', 'Повседневная практика показывает, что постоянное информационно-пропагандистское обеспечение нашей деятельности требуют определения и уточнения дальнейших направлений развития.', 1, '2021-07-23 13:22:02', '2021-07-23 13:22:02'),
(7, 0, 'Заголовок новости 7', 'xxx', 'zagolovok-novosti-7', 'xxx', 'xxx', 'Повседневная практика показывает, что постоянное информационно-пропагандистское обеспечение нашей деятельности требуют определения и уточнения дальнейших направлений развития.', 1, '2021-07-23 13:22:02', '2021-07-23 13:22:02'),
(8, 0, 'Заголовок новости 8', 'xxx', 'zagolovok-novosti-8', 'xxx', 'xxx', 'Повседневная практика показывает, что постоянное информационно-пропагандистское обеспечение нашей деятельности требуют определения и уточнения дальнейших направлений развития.', 1, '2021-07-23 13:22:02', '2021-07-23 13:22:02'),
(9, 0, 'Заголовок новости 9', 'xxx', 'zagolovok-novosti-9', 'xxx', 'xxx', 'Повседневная практика показывает, что постоянное информационно-пропагандистское обеспечение нашей деятельности требуют определения и уточнения дальнейших направлений развития.', 1, '2021-07-23 13:22:02', '2021-07-23 13:22:02'),
(10, 0, 'Заголовок новости 10', 'xxx', 'zagolovok-novosti-10', 'xxx', 'xxx', 'Повседневная практика показывает, что постоянное информационно-пропагандистское обеспечение нашей деятельности требуют определения и уточнения дальнейших направлений развития.', 1, '2021-07-23 13:22:02', '2021-07-23 13:22:02');

-- --------------------------------------------------------

--
-- Структура таблицы `notifications`
--

CREATE TABLE `notifications` (
  `id` char(36) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `notifiable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `notifiable_id` bigint(20) UNSIGNED NOT NULL,
  `data` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `read_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

-- --------------------------------------------------------

--
-- Структура таблицы `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

-- --------------------------------------------------------

--
-- Структура таблицы `products`
--

CREATE TABLE `products` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `hide` tinyint(1) NOT NULL DEFAULT 0,
  `category_id` bigint(20) UNSIGNED NOT NULL,
  `subcategory_id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `seo_keywords` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `seo_description` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` bigint(20) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

--
-- Дамп данных таблицы `products`
--

INSERT INTO `products` (`id`, `hide`, `category_id`, `subcategory_id`, `title`, `slug`, `seo_keywords`, `seo_description`, `name`, `description`, `image`, `created_at`, `updated_at`) VALUES
(1, 0, 1, 1, 'xxx', 'zatvor-stalnoi-flancevyi', 'xxx', 'xxx', 'Затвор стальной фланцевый', '<p>Тип задвижки 30ч6бр - параллельная с выдвижным шпинделем.</p>', 1, '2021-07-23 13:22:02', '2021-07-23 13:22:18'),
(2, 0, 2, 2, 'xxx', 'fiting-polietilen', 'xxx', 'xxx', 'Фитинг Полиэтилен', 'Установочное положение 30ч6бр любое, кроме положения – маховиком вниз.', 1, '2021-07-23 13:22:02', '2021-07-23 13:22:02'),
(3, 0, 3, 3, 'xxx', 'zatvor-stalnoi-flancevyi-2', 'xxx', 'xxx', 'Затвор стальной фланцевый 2', 'Вид управления задвижки чугунной 30ч6бр – ручной привод.', 1, '2021-07-23 13:22:02', '2021-07-23 13:22:02'),
(4, 0, 1, 2, 'Тестовый товар', 'тестовый товар', 'Тестовый товар', 'Тестовый товар', 'Тестовый товар', NULL, 5, '2021-09-14 08:03:33', '2021-09-15 02:44:01');

-- --------------------------------------------------------

--
-- Структура таблицы `promotions`
--

CREATE TABLE `promotions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `hide` tinyint(1) NOT NULL DEFAULT 0,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `seo_keywords` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `seo_description` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `text` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` bigint(20) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

--
-- Дамп данных таблицы `promotions`
--

INSERT INTO `promotions` (`id`, `hide`, `name`, `title`, `slug`, `seo_keywords`, `seo_description`, `text`, `image`, `created_at`, `updated_at`) VALUES
(1, 0, 'Предоставляем скидку всем нашим клиентам 1', 'xxx', 'predostavlyaem-skidku-vsem-nasim-klientam-1', 'xxx', 'xxx', 'Повседневная практика показывает, что постоянное информационно-пропагандистское обеспечение нашей деятельности требуют определения и уточнения дальнейших направлений развития.', 1, '2021-07-23 13:22:02', '2021-07-23 13:22:02'),
(2, 0, 'Предоставляем скидку всем нашим клиентам 2', 'xxx', 'predostavlyaem-skidku-vsem-nasim-klientam-2', 'xxx', 'xxx', 'Повседневная практика показывает, что постоянное информационно-пропагандистское обеспечение нашей деятельности требуют определения и уточнения дальнейших направлений развития.', 1, '2021-07-23 13:22:02', '2021-07-23 13:22:02'),
(3, 0, 'Предоставляем скидку всем нашим клиентам 3', 'xxx', 'predostavlyaem-skidku-vsem-nasim-klientam-3', 'xxx', 'xxx', 'Повседневная практика показывает, что постоянное информационно-пропагандистское обеспечение нашей деятельности требуют определения и уточнения дальнейших направлений развития.', 1, '2021-07-23 13:22:02', '2021-07-23 13:22:02'),
(4, 0, 'Предоставляем скидку всем нашим клиентам 4', 'xxx', 'predostavlyaem-skidku-vsem-nasim-klientam-4', 'xxx', 'xxx', 'Повседневная практика показывает, что постоянное информационно-пропагандистское обеспечение нашей деятельности требуют определения и уточнения дальнейших направлений развития.', 1, '2021-07-23 13:22:02', '2021-07-23 13:22:02'),
(5, 0, 'Предоставляем скидку всем нашим клиентам 5', 'xxx', 'predostavlyaem-skidku-vsem-nasim-klientam-5', 'xxx', 'xxx', 'Повседневная практика показывает, что постоянное информационно-пропагандистское обеспечение нашей деятельности требуют определения и уточнения дальнейших направлений развития.', 1, '2021-07-23 13:22:02', '2021-07-23 13:22:02'),
(6, 0, 'Предоставляем скидку всем нашим клиентам 6', 'xxx', 'predostavlyaem-skidku-vsem-nasim-klientam-6', 'xxx', 'xxx', 'Повседневная практика показывает, что постоянное информационно-пропагандистское обеспечение нашей деятельности требуют определения и уточнения дальнейших направлений развития.', 1, '2021-07-23 13:22:02', '2021-07-23 13:22:02'),
(7, 0, 'Предоставляем скидку всем нашим клиентам 7', 'xxx', 'predostavlyaem-skidku-vsem-nasim-klientam-7', 'xxx', 'xxx', 'Повседневная практика показывает, что постоянное информационно-пропагандистское обеспечение нашей деятельности требуют определения и уточнения дальнейших направлений развития.', 1, '2021-07-23 13:22:02', '2021-07-23 13:22:02'),
(8, 0, 'Предоставляем скидку всем нашим клиентам 8', 'xxx', 'predostavlyaem-skidku-vsem-nasim-klientam-8', 'xxx', 'xxx', 'Повседневная практика показывает, что постоянное информационно-пропагандистское обеспечение нашей деятельности требуют определения и уточнения дальнейших направлений развития.', 1, '2021-07-23 13:22:02', '2021-07-23 13:22:02'),
(9, 0, 'Предоставляем скидку всем нашим клиентам 9', 'xxx', 'predostavlyaem-skidku-vsem-nasim-klientam-9', 'xxx', 'xxx', 'Повседневная практика показывает, что постоянное информационно-пропагандистское обеспечение нашей деятельности требуют определения и уточнения дальнейших направлений развития.', 1, '2021-07-23 13:22:02', '2021-07-23 13:22:02'),
(10, 0, 'Предоставляем скидку всем нашим клиентам 10', 'xxx', 'predostavlyaem-skidku-vsem-nasim-klientam-10', 'xxx', 'xxx', 'Повседневная практика показывает, что постоянное информационно-пропагандистское обеспечение нашей деятельности требуют определения и уточнения дальнейших направлений развития.', 1, '2021-07-23 13:22:02', '2021-07-23 13:22:02');

-- --------------------------------------------------------

--
-- Структура таблицы `reviews`
--

CREATE TABLE `reviews` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `hide` tinyint(1) NOT NULL DEFAULT 0,
  `author` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `quote` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` bigint(20) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

--
-- Дамп данных таблицы `reviews`
--

INSERT INTO `reviews` (`id`, `hide`, `author`, `quote`, `image`, `created_at`, `updated_at`) VALUES
(1, 0, 'ТОО “IMarketing”', 'Хочу поблагодарить проект-менеджера Шевченко Дарью, за отличную работу и индивидуальный подход к каждому запросу. Мы давно работаем с компанией \"AVG\". Качество сервиса на высшем уровне! Всегда на связи. Все наши пожелания учитываются и всегда идут на встречу.', 1, '2021-07-23 13:22:02', '2021-08-25 04:12:53'),
(2, 0, 'ТОО “IMarketing”', 'Хочу поблагодарить проект-менеджера Шевченко Дарью, за отличную работу и индивидуальный подход к каждому запросу. Мы давно работаем с компанией \"AVG\". Качество сервиса на высшем уровне! Всегда на связи. Все наши пожелания учитываются и всегда идут на встречу.', 1, '2021-07-23 13:22:02', '2021-07-23 13:22:02'),
(3, 0, 'ТОО “IMarketing”', 'Хочу поблагодарить проект-менеджера Шевченко Дарью, за отличную работу и индивидуальный подход к каждому запросу. Мы давно работаем с компанией \"AVG\". Качество сервиса на высшем уровне! Всегда на связи. Все наши пожелания учитываются и всегда идут на встречу.', 1, '2021-07-23 13:22:02', '2021-07-23 13:22:02'),
(4, 0, 'ТОО “IMarketing”', 'Хочу поблагодарить проект-менеджера Шевченко Дарью, за отличную работу и индивидуальный подход к каждому запросу. Мы давно работаем с компанией \"AVG\". Качество сервиса на высшем уровне! Всегда на связи. Все наши пожелания учитываются и всегда идут на встречу.', 1, '2021-07-23 13:22:02', '2021-07-23 13:22:02'),
(5, 0, 'ТОО “IMarketing”', 'Хочу поблагодарить проект-менеджера Шевченко Дарью, за отличную работу и индивидуальный подход к каждому запросу. Мы давно работаем с компанией \"AVG\". Качество сервиса на высшем уровне! Всегда на связи. Все наши пожелания учитываются и всегда идут на встречу.', 1, '2021-07-23 13:22:02', '2021-07-23 13:22:02'),
(6, 0, 'ТОО “IMarketing”', 'Хочу поблагодарить проект-менеджера Шевченко Дарью, за отличную работу и индивидуальный подход к каждому запросу. Мы давно работаем с компанией \"AVG\". Качество сервиса на высшем уровне! Всегда на связи. Все наши пожелания учитываются и всегда идут на встречу.', 1, '2021-07-23 13:22:02', '2021-07-23 13:22:02'),
(7, 0, 'ТОО “IMarketing”', 'Хочу поблагодарить проект-менеджера Шевченко Дарью, за отличную работу и индивидуальный подход к каждому запросу. Мы давно работаем с компанией \"AVG\". Качество сервиса на высшем уровне! Всегда на связи. Все наши пожелания учитываются и всегда идут на встречу.', 1, '2021-07-23 13:22:02', '2021-07-23 13:22:02'),
(8, 0, 'ТОО “IMarketing”', 'Хочу поблагодарить проект-менеджера Шевченко Дарью, за отличную работу и индивидуальный подход к каждому запросу. Мы давно работаем с компанией \"AVG\". Качество сервиса на высшем уровне! Всегда на связи. Все наши пожелания учитываются и всегда идут на встречу.', 1, '2021-07-23 13:22:02', '2021-07-23 13:22:02'),
(9, 0, 'ТОО “IMarketing”', 'Хочу поблагодарить проект-менеджера Шевченко Дарью, за отличную работу и индивидуальный подход к каждому запросу. Мы давно работаем с компанией \"AVG\". Качество сервиса на высшем уровне! Всегда на связи. Все наши пожелания учитываются и всегда идут на встречу.', 1, '2021-07-23 13:22:02', '2021-07-23 13:22:02'),
(10, 0, 'ТОО “IMarketing”', 'Хочу поблагодарить проект-менеджера Шевченко Дарью, за отличную работу и индивидуальный подход к каждому запросу. Мы давно работаем с компанией \"AVG\". Качество сервиса на высшем уровне! Всегда на связи. Все наши пожелания учитываются и всегда идут на встречу.', 1, '2021-07-23 13:22:02', '2021-07-23 13:22:02');

-- --------------------------------------------------------

--
-- Структура таблицы `roles`
--

CREATE TABLE `roles` (
  `id` int(10) UNSIGNED NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `permissions` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

-- --------------------------------------------------------

--
-- Структура таблицы `role_users`
--

CREATE TABLE `role_users` (
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `role_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

-- --------------------------------------------------------

--
-- Структура таблицы `seo`
--

CREATE TABLE `seo` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `page` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `seo_keywords` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `seo_description` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

--
-- Дамп данных таблицы `seo`
--

INSERT INTO `seo` (`id`, `page`, `title`, `seo_keywords`, `seo_description`, `created_at`, `updated_at`) VALUES
(1, 'main', 'Главная | Alias', 'xxx', 'xxx', '2021-07-23 13:22:02', '2021-07-23 13:22:02'),
(2, 'about', 'О нас | Alias', 'xxx', 'xxx', '2021-07-23 13:22:02', '2021-07-23 13:22:02'),
(3, 'branches', 'Филиалы | Alias', 'xxx', 'xxx', '2021-07-23 13:22:02', '2021-07-23 13:22:02'),
(4, 'certificates', 'Сертификаты | Alias', 'xxx', 'xxx', '2021-07-23 13:22:02', '2021-07-23 13:22:02'),
(5, 'contacts', 'Контакты | Alias', 'xxx', 'xxx', '2021-07-23 13:22:02', '2021-07-23 13:22:02'),
(6, 'news', 'Новости | Alias', 'xxx', 'xxx', '2021-07-23 13:22:02', '2021-07-23 13:22:02'),
(7, 'products', 'Товары | Alias', 'xxx', 'xxx', '2021-07-23 13:22:02', '2021-07-23 13:22:02'),
(8, 'promotions', 'Акции | Alias', 'xxx', 'xxx', '2021-07-23 13:22:02', '2021-07-23 13:22:02'),
(9, 'reviews', 'Отзывы | Alias', 'xxx', 'xxx', '2021-07-23 13:22:02', '2021-07-23 13:22:02'),
(10, 'search', 'Поиск | Alias', 'xxx', 'xxx', '2021-07-23 13:22:02', '2021-07-23 13:22:02');

-- --------------------------------------------------------

--
-- Структура таблицы `social_networks`
--

CREATE TABLE `social_networks` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `hide` tinyint(1) NOT NULL DEFAULT 0,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `link` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

--
-- Дамп данных таблицы `social_networks`
--

INSERT INTO `social_networks` (`id`, `hide`, `description`, `name`, `link`, `created_at`, `updated_at`) VALUES
(1, 0, 'Facebook', 'facebook', '#', '2021-07-23 13:22:02', '2021-07-23 13:22:02'),
(2, 0, 'Instagram', 'instagram', '#', '2021-07-23 13:22:02', '2021-07-23 13:22:02'),
(3, 0, 'В Контакте', 'vk', '#', '2021-07-23 13:22:02', '2021-07-23 13:22:02');

-- --------------------------------------------------------

--
-- Структура таблицы `subcategories`
--

CREATE TABLE `subcategories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `hide` tinyint(1) NOT NULL DEFAULT 0,
  `category_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `seo_keywords` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `seo_description` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

--
-- Дамп данных таблицы `subcategories`
--

INSERT INTO `subcategories` (`id`, `hide`, `category_id`, `name`, `slug`, `seo_keywords`, `seo_description`, `description`, `created_at`, `updated_at`) VALUES
(1, 0, 1, 'Чугунные', 'cugunnye', 'xxx', 'xxx', NULL, '2021-07-23 13:22:02', '2021-07-23 13:22:02'),
(2, 0, 1, 'Стальные', 'stalnye', 'xxx', 'xxx', NULL, '2021-07-23 13:22:02', '2021-07-23 13:22:02'),
(3, 0, 1, 'Фланцевые', 'flancevye', 'xxx', 'xxx', NULL, '2021-07-23 13:22:02', '2021-07-23 13:22:02'),
(4, 0, 1, 'чугунные задвижки с обрезиненным клином', 'chygynsobrezinennimklinom', 'хх', 'хх', NULL, '2021-09-22 02:56:47', '2021-09-22 02:57:14');

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `permissions` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`, `permissions`) VALUES
(1, 'admin', 'admin@alias.kz', NULL, '$2y$10$lmQu7fMgMzw8EWlsHZTlD.kPTQ1KCEdhkZo.dy5xQ3Z0gTCKoMEOW', 'uvqyj0D7qvz5GWmrAAcf3q5OnL5roCgI6KK5YxnmJ9gu68iKwVylmCeESmmO', '2021-07-23 13:22:06', '2021-08-25 04:51:55', '{\"platform.systems.attachment\":\"1\",\"platform.systems.users\":\"1\",\"platform.systems.roles\":\"1\",\"platform.index\":\"1\"}');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `applications`
--
ALTER TABLE `applications`
  ADD PRIMARY KEY (`id`) USING BTREE;

--
-- Индексы таблицы `attachmentable`
--
ALTER TABLE `attachmentable`
  ADD PRIMARY KEY (`id`) USING BTREE,
  ADD KEY `attachmentable_attachmentable_type_attachmentable_id_index` (`attachmentable_type`,`attachmentable_id`) USING BTREE,
  ADD KEY `attachmentable_attachment_id_foreign` (`attachment_id`) USING BTREE;

--
-- Индексы таблицы `attachments`
--
ALTER TABLE `attachments`
  ADD PRIMARY KEY (`id`) USING BTREE;

--
-- Индексы таблицы `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`) USING BTREE,
  ADD UNIQUE KEY `categories_slug_unique` (`slug`) USING BTREE;

--
-- Индексы таблицы `certificates`
--
ALTER TABLE `certificates`
  ADD PRIMARY KEY (`id`) USING BTREE;

--
-- Индексы таблицы `contacts`
--
ALTER TABLE `contacts`
  ADD PRIMARY KEY (`id`) USING BTREE;

--
-- Индексы таблицы `contact_addresses`
--
ALTER TABLE `contact_addresses`
  ADD PRIMARY KEY (`id`) USING BTREE,
  ADD KEY `contact_addresses_contact_id_foreign` (`contact_id`) USING BTREE;

--
-- Индексы таблицы `contact_emails`
--
ALTER TABLE `contact_emails`
  ADD PRIMARY KEY (`id`) USING BTREE,
  ADD KEY `contact_emails_contact_id_foreign` (`contact_id`) USING BTREE;

--
-- Индексы таблицы `contact_phones`
--
ALTER TABLE `contact_phones`
  ADD PRIMARY KEY (`id`) USING BTREE,
  ADD KEY `contact_phones_contact_id_foreign` (`contact_id`) USING BTREE;

--
-- Индексы таблицы `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`) USING BTREE,
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`) USING BTREE;

--
-- Индексы таблицы `footers`
--
ALTER TABLE `footers`
  ADD PRIMARY KEY (`id`) USING BTREE;

--
-- Индексы таблицы `headers`
--
ALTER TABLE `headers`
  ADD PRIMARY KEY (`id`) USING BTREE;

--
-- Индексы таблицы `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`) USING BTREE;

--
-- Индексы таблицы `news`
--
ALTER TABLE `news`
  ADD PRIMARY KEY (`id`) USING BTREE,
  ADD UNIQUE KEY `news_slug_unique` (`slug`) USING BTREE;

--
-- Индексы таблицы `notifications`
--
ALTER TABLE `notifications`
  ADD PRIMARY KEY (`id`) USING BTREE,
  ADD KEY `notifications_notifiable_type_notifiable_id_index` (`notifiable_type`,`notifiable_id`) USING BTREE;

--
-- Индексы таблицы `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`) USING BTREE;

--
-- Индексы таблицы `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`) USING BTREE,
  ADD UNIQUE KEY `products_slug_unique` (`slug`) USING BTREE,
  ADD KEY `products_category_id_foreign` (`category_id`) USING BTREE,
  ADD KEY `products_subcategory_id_foreign` (`subcategory_id`) USING BTREE;

--
-- Индексы таблицы `promotions`
--
ALTER TABLE `promotions`
  ADD PRIMARY KEY (`id`) USING BTREE,
  ADD UNIQUE KEY `promotions_slug_unique` (`slug`) USING BTREE;

--
-- Индексы таблицы `reviews`
--
ALTER TABLE `reviews`
  ADD PRIMARY KEY (`id`) USING BTREE;

--
-- Индексы таблицы `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`) USING BTREE,
  ADD UNIQUE KEY `roles_slug_unique` (`slug`) USING BTREE;

--
-- Индексы таблицы `role_users`
--
ALTER TABLE `role_users`
  ADD PRIMARY KEY (`user_id`,`role_id`) USING BTREE,
  ADD KEY `role_users_role_id_foreign` (`role_id`) USING BTREE;

--
-- Индексы таблицы `seo`
--
ALTER TABLE `seo`
  ADD PRIMARY KEY (`id`) USING BTREE;

--
-- Индексы таблицы `social_networks`
--
ALTER TABLE `social_networks`
  ADD PRIMARY KEY (`id`) USING BTREE;

--
-- Индексы таблицы `subcategories`
--
ALTER TABLE `subcategories`
  ADD PRIMARY KEY (`id`) USING BTREE,
  ADD UNIQUE KEY `subcategories_slug_unique` (`slug`) USING BTREE,
  ADD KEY `subcategories_category_id_foreign` (`category_id`) USING BTREE;

--
-- Индексы таблицы `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`) USING BTREE,
  ADD UNIQUE KEY `users_email_unique` (`email`) USING BTREE;

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `applications`
--
ALTER TABLE `applications`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT для таблицы `attachmentable`
--
ALTER TABLE `attachmentable`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT для таблицы `attachments`
--
ALTER TABLE `attachments`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT для таблицы `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT для таблицы `certificates`
--
ALTER TABLE `certificates`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT для таблицы `contacts`
--
ALTER TABLE `contacts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT для таблицы `contact_addresses`
--
ALTER TABLE `contact_addresses`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT для таблицы `contact_emails`
--
ALTER TABLE `contact_emails`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT для таблицы `contact_phones`
--
ALTER TABLE `contact_phones`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT для таблицы `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT для таблицы `footers`
--
ALTER TABLE `footers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT для таблицы `headers`
--
ALTER TABLE `headers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT для таблицы `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT для таблицы `news`
--
ALTER TABLE `news`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT для таблицы `products`
--
ALTER TABLE `products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT для таблицы `promotions`
--
ALTER TABLE `promotions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT для таблицы `reviews`
--
ALTER TABLE `reviews`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT для таблицы `roles`
--
ALTER TABLE `roles`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT для таблицы `seo`
--
ALTER TABLE `seo`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT для таблицы `social_networks`
--
ALTER TABLE `social_networks`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT для таблицы `subcategories`
--
ALTER TABLE `subcategories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT для таблицы `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `attachmentable`
--
ALTER TABLE `attachmentable`
  ADD CONSTRAINT `attachmentable_attachment_id_foreign` FOREIGN KEY (`attachment_id`) REFERENCES `attachments` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ограничения внешнего ключа таблицы `contact_addresses`
--
ALTER TABLE `contact_addresses`
  ADD CONSTRAINT `contact_addresses_contact_id_foreign` FOREIGN KEY (`contact_id`) REFERENCES `contacts` (`id`);

--
-- Ограничения внешнего ключа таблицы `contact_emails`
--
ALTER TABLE `contact_emails`
  ADD CONSTRAINT `contact_emails_contact_id_foreign` FOREIGN KEY (`contact_id`) REFERENCES `contacts` (`id`);

--
-- Ограничения внешнего ключа таблицы `contact_phones`
--
ALTER TABLE `contact_phones`
  ADD CONSTRAINT `contact_phones_contact_id_foreign` FOREIGN KEY (`contact_id`) REFERENCES `contacts` (`id`);

--
-- Ограничения внешнего ключа таблицы `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`),
  ADD CONSTRAINT `products_subcategory_id_foreign` FOREIGN KEY (`subcategory_id`) REFERENCES `subcategories` (`id`);

--
-- Ограничения внешнего ключа таблицы `role_users`
--
ALTER TABLE `role_users`
  ADD CONSTRAINT `role_users_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `role_users_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ограничения внешнего ключа таблицы `subcategories`
--
ALTER TABLE `subcategories`
  ADD CONSTRAINT `subcategories_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
