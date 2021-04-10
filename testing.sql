-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Апр 11 2021 г., 00:53
-- Версия сервера: 10.3.22-MariaDB
-- Версия PHP: 7.4.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `testing`
--

-- --------------------------------------------------------

--
-- Структура таблицы `actors`
--

CREATE TABLE `actors` (
  `id` int(11) NOT NULL,
  `actors` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `actors`
--

INSERT INTO `actors` (`id`, `actors`) VALUES
(232, '2222'),
(233, 'Mel'),
(234, 'Brooks'),
(235, 'Clevon'),
(236, 'Little'),
(237, 'Harvey'),
(238, 'Korman'),
(239, 'Gene'),
(240, 'Wilder'),
(241, 'Slim'),
(242, 'Pickens'),
(243, 'Madeline'),
(244, 'Kahn'),
(245, 'Humphrey'),
(246, 'Bogart'),
(247, 'Ingrid'),
(248, 'Bergman'),
(249, 'Claude'),
(250, 'Rains'),
(251, 'Peter'),
(252, 'Lorre'),
(253, 'Audrey'),
(254, 'Hepburn'),
(255, 'Cary'),
(256, 'Grant'),
(257, 'Walter'),
(258, 'Matthau'),
(259, 'James'),
(260, 'Coburn'),
(261, 'George'),
(262, 'Kennedy'),
(263, 'Paul'),
(264, 'Newman'),
(265, 'Strother'),
(266, 'Martin'),
(267, 'Robert'),
(268, 'Redford'),
(269, 'Katherine'),
(270, 'Ross'),
(271, 'Shaw'),
(272, 'Charles'),
(273, 'Durning'),
(274, 'Jim'),
(275, 'Henson'),
(276, 'Frank'),
(277, 'Oz'),
(278, 'Dave'),
(279, 'Geolz'),
(280, 'Austin'),
(281, 'Pendleton'),
(282, 'John'),
(283, 'Travolta'),
(284, 'Danny'),
(285, 'DeVito'),
(286, 'Renne'),
(287, 'Russo'),
(288, 'Hackman'),
(289, 'Dennis'),
(290, 'Farina'),
(291, 'Joe'),
(292, 'Pesci'),
(293, 'Marrisa'),
(294, 'Tomei'),
(295, 'Fred'),
(296, 'Gwynne'),
(297, 'Lane'),
(298, 'Smith'),
(299, 'Ralph'),
(300, 'Macchio'),
(301, 'Russell'),
(302, 'Crowe'),
(303, 'Joaquin'),
(304, 'Phoenix'),
(305, 'Connie'),
(306, 'Nielson'),
(307, 'Harrison'),
(308, 'Ford'),
(309, 'Mark'),
(310, 'Hamill'),
(311, 'Carrie'),
(312, 'Fisher'),
(313, 'Alec'),
(314, 'Guinness'),
(315, 'Earl'),
(316, 'Jones'),
(317, 'Karen'),
(318, 'Allen'),
(319, 'Nathan'),
(320, 'Fillion'),
(321, 'Alan'),
(322, 'Tudyk'),
(323, 'Adam'),
(324, 'Baldwin'),
(325, 'Ron'),
(326, 'Glass'),
(327, 'Jewel'),
(328, 'Staite'),
(329, 'Gina'),
(330, 'Torres'),
(331, 'Morena'),
(332, 'Baccarin'),
(333, 'Sean'),
(334, 'Maher'),
(335, 'Summer'),
(336, 'Glau'),
(337, 'Chiwetel'),
(338, 'Ejiofor'),
(339, 'Barbara'),
(340, 'Hershey'),
(341, 'Hopper'),
(342, 'Matthew'),
(343, 'Broderick'),
(344, 'Ally'),
(345, 'Sheedy'),
(346, 'Dabney'),
(347, 'Coleman'),
(348, 'Wood'),
(349, 'Barry'),
(350, 'Corbin'),
(351, 'Bill'),
(352, 'Pullman'),
(353, 'Candy'),
(354, 'Rick'),
(355, 'Moranis'),
(356, 'Daphne'),
(357, 'Zuniga'),
(358, 'Joan'),
(359, 'Rivers'),
(360, 'Kenneth'),
(361, 'Mars'),
(362, 'Terri'),
(363, 'Garr'),
(364, 'Boyle'),
(365, 'Val'),
(366, 'Kilmer'),
(367, 'Gabe'),
(368, 'Jarret'),
(369, 'Michelle'),
(370, 'Meyrink'),
(371, 'William'),
(372, 'Atherton'),
(373, 'Tom'),
(374, 'Cruise'),
(375, 'Kelly'),
(376, 'McGillis'),
(377, 'Anthony'),
(378, 'Edwards'),
(379, 'Skerritt');

-- --------------------------------------------------------

--
-- Структура таблицы `actors_films`
--

CREATE TABLE `actors_films` (
  `id` int(11) NOT NULL,
  `film_id` smallint(6) NOT NULL,
  `actor_id` smallint(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `actors_films`
--

INSERT INTO `actors_films` (`id`, `film_id`, `actor_id`) VALUES
(3621, 327, 232),
(3622, 328, 233),
(3623, 328, 234),
(3624, 328, 235),
(3625, 328, 236),
(3626, 328, 237),
(3627, 328, 238),
(3628, 328, 239),
(3629, 328, 240),
(3630, 328, 241),
(3631, 328, 242),
(3632, 328, 243),
(3633, 328, 244),
(3634, 329, 245),
(3635, 329, 246),
(3636, 329, 247),
(3637, 329, 248),
(3638, 329, 249),
(3639, 329, 250),
(3640, 329, 251),
(3641, 329, 252),
(3642, 330, 253),
(3643, 330, 254),
(3644, 330, 255),
(3645, 330, 256),
(3646, 330, 257),
(3647, 330, 258),
(3648, 330, 259),
(3649, 330, 260),
(3650, 330, 261),
(3651, 330, 262),
(3652, 331, 263),
(3653, 331, 264),
(3654, 331, 261),
(3655, 331, 262),
(3656, 331, 265),
(3657, 331, 266),
(3658, 332, 263),
(3659, 332, 264),
(3660, 332, 267),
(3661, 332, 268),
(3662, 332, 269),
(3663, 332, 270),
(3664, 333, 267),
(3665, 333, 268),
(3666, 333, 263),
(3667, 333, 264),
(3668, 333, 271),
(3669, 333, 272),
(3670, 333, 273),
(3671, 334, 274),
(3672, 334, 275),
(3673, 334, 276),
(3674, 334, 277),
(3675, 334, 278),
(3676, 334, 279),
(3677, 334, 233),
(3678, 334, 234),
(3679, 334, 259),
(3680, 334, 260),
(3681, 334, 272),
(3682, 334, 273),
(3683, 334, 280),
(3684, 334, 281),
(3685, 335, 282),
(3686, 335, 283),
(3687, 335, 284),
(3688, 335, 285),
(3689, 335, 286),
(3690, 335, 287),
(3691, 335, 239),
(3692, 335, 288),
(3693, 335, 289),
(3694, 335, 290),
(3695, 336, 291),
(3696, 336, 292),
(3697, 336, 293),
(3698, 336, 294),
(3699, 336, 295),
(3700, 336, 296),
(3701, 336, 280),
(3702, 336, 281),
(3703, 336, 297),
(3704, 336, 298),
(3705, 336, 299),
(3706, 336, 300),
(3707, 337, 301),
(3708, 337, 302),
(3709, 337, 303),
(3710, 337, 304),
(3711, 337, 305),
(3712, 337, 306),
(3713, 338, 307),
(3714, 338, 308),
(3715, 338, 309),
(3716, 338, 310),
(3717, 338, 311),
(3718, 338, 312),
(3719, 338, 313),
(3720, 338, 314),
(3721, 338, 259),
(3722, 338, 315),
(3723, 338, 316),
(3724, 339, 307),
(3725, 339, 308),
(3726, 339, 317),
(3727, 339, 318),
(3728, 340, 319),
(3729, 340, 320),
(3730, 340, 321),
(3731, 340, 322),
(3732, 340, 323),
(3733, 340, 324),
(3734, 340, 325),
(3735, 340, 326),
(3736, 340, 327),
(3737, 340, 328),
(3738, 340, 329),
(3739, 340, 330),
(3740, 340, 331),
(3741, 340, 332),
(3742, 340, 333),
(3743, 340, 334),
(3744, 340, 335),
(3745, 340, 336),
(3746, 340, 337),
(3747, 340, 338),
(3748, 341, 239),
(3749, 341, 288),
(3750, 341, 339),
(3751, 341, 340),
(3752, 341, 289),
(3753, 341, 341),
(3754, 342, 342),
(3755, 342, 343),
(3756, 342, 344),
(3757, 342, 345),
(3758, 342, 346),
(3759, 342, 347),
(3760, 342, 282),
(3761, 342, 348),
(3762, 342, 349),
(3763, 342, 350),
(3764, 343, 351),
(3765, 343, 352),
(3766, 343, 282),
(3767, 343, 353),
(3768, 343, 233),
(3769, 343, 234),
(3770, 343, 354),
(3771, 343, 355),
(3772, 343, 356),
(3773, 343, 357),
(3774, 343, 358),
(3775, 343, 359),
(3776, 344, 239),
(3777, 344, 240),
(3778, 344, 360),
(3779, 344, 361),
(3780, 344, 362),
(3781, 344, 363),
(3782, 344, 288),
(3783, 344, 251),
(3784, 344, 364),
(3785, 345, 365),
(3786, 345, 366),
(3787, 345, 367),
(3788, 345, 368),
(3789, 345, 369),
(3790, 345, 370),
(3791, 345, 371),
(3792, 345, 372),
(3793, 346, 373),
(3794, 346, 374),
(3795, 346, 375),
(3796, 346, 376),
(3797, 346, 365),
(3798, 346, 366),
(3799, 346, 377),
(3800, 346, 378),
(3801, 346, 379);

-- --------------------------------------------------------

--
-- Структура таблицы `films`
--

CREATE TABLE `films` (
  `id` mediumint(9) NOT NULL,
  `title` varchar(75) COLLATE utf8mb4_unicode_ci NOT NULL,
  `year` year(4) NOT NULL,
  `format` enum('VHS','DVD','Blu-Ray') COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `films`
--

INSERT INTO `films` (`id`, `title`, `year`, `format`) VALUES
(327, '222322s12', 2021, 'VHS'),
(328, 'Blazing Saddles', 1974, 'VHS'),
(329, 'Casablanca', 1942, 'DVD'),
(330, 'Charade', 1953, 'DVD'),
(331, 'Cool Hand Luke', 1967, 'VHS'),
(332, 'Butch Cassidy and the Sundance Kid', 1969, 'VHS'),
(333, 'The Sting', 1973, 'DVD'),
(334, 'The Muppet Movie', 1979, 'DVD'),
(335, 'Get Shorty ', 1995, 'DVD'),
(336, 'My Cousin Vinny', 1992, 'DVD'),
(337, 'Gladiator', 2000, 'Blu-Ray'),
(338, 'Star Wars', 1977, 'Blu-Ray'),
(339, 'Raiders of the Lost Ark', 1981, 'DVD'),
(340, 'Serenity', 2005, 'Blu-Ray'),
(341, 'Hooisers', 1986, 'VHS'),
(342, 'WarGames', 1983, 'VHS'),
(343, 'Spaceballs', 1987, 'DVD'),
(344, 'Young Frankenstein', 1974, 'VHS'),
(345, 'Real Genius', 1985, 'VHS'),
(346, 'Top Gun', 1986, 'DVD');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `actors`
--
ALTER TABLE `actors`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `actors_films`
--
ALTER TABLE `actors_films`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `films`
--
ALTER TABLE `films`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `actors`
--
ALTER TABLE `actors`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=380;

--
-- AUTO_INCREMENT для таблицы `actors_films`
--
ALTER TABLE `actors_films`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3802;

--
-- AUTO_INCREMENT для таблицы `films`
--
ALTER TABLE `films`
  MODIFY `id` mediumint(9) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=347;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
