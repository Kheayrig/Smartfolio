-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1
-- Время создания: Апр 24 2022 г., 09:18
-- Версия сервера: 10.4.22-MariaDB
-- Версия PHP: 8.1.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `users`
--

-- --------------------------------------------------------

--
-- Структура таблицы `api_keys`
--

CREATE TABLE `api_keys` (
  `api_key` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `appName` varchar(100) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='api';

-- --------------------------------------------------------

--
-- Структура таблицы `passwords`
--

CREATE TABLE `passwords` (
  `user-id` int(11) NOT NULL,
  `pwd` varchar(128) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='list of users-pwd (need to test auth)';

--
-- Дамп данных таблицы `passwords`
--

INSERT INTO `passwords` (`user-id`, `pwd`) VALUES
(3, 'Eqwdmzw0'),
(4, 'Ljyathx1'),
(5, 'Bwvmbmk2'),
(6, 'Lnvjura3'),
(7, 'Ylvbzsb4'),
(8, 'Sdoortr5'),
(9, 'Ccudgbc6'),
(10, 'Qmrfowt7'),
(11, 'Rhbjknj8'),
(12, 'Yzhztvn9'),
(13, 'Pvsuaur10'),
(14, 'Iojqlpf11'),
(15, 'Sdmrmik12'),
(16, 'Spxftee13'),
(17, 'Nyinreg14'),
(18, 'Shwjhyg15'),
(19, 'Ymzjzmg16'),
(20, 'Eolbzzu17'),
(21, 'Ybvozmv18'),
(22, 'Xfngdxe19'),
(23, 'Ssuhjuw20'),
(24, 'Wbtmvah21'),
(25, 'Megvbjn22'),
(26, 'Leymtwf23'),
(27, 'Sfvvann24'),
(28, 'Yynebsp25'),
(29, 'Bzgxadw26'),
(30, 'Nrjybpx27'),
(31, 'Ggjtpum28'),
(32, 'Fdzocoo29'),
(33, 'Foavudl30'),
(34, 'Xjpykak31'),
(35, 'Fisesrh32'),
(36, 'Raemwus33'),
(37, 'Pdiidjh34'),
(38, 'Gnukxzl35'),
(39, 'Fdhcoyr36'),
(40, 'Tpjecpl37'),
(41, 'Fqstgif38'),
(42, 'Nbbwcip39'),
(43, 'Epxiula40'),
(44, 'Vuzyiui41'),
(45, 'Uxlojuw42'),
(46, 'Irovevn43'),
(47, 'Svldibn44'),
(48, 'Jfwbirf45'),
(49, 'Gtrafsi46'),
(50, 'Mevkocn47'),
(51, 'Mywloxk48'),
(52, 'Vnhlabd49');

-- --------------------------------------------------------

--
-- Структура таблицы `portfolio`
--

CREATE TABLE `portfolio` (
  `id` int(11) NOT NULL,
  `firstName` varchar(35) NOT NULL,
  `lastName` varchar(35) NOT NULL,
  `patronymic` varchar(35) NOT NULL,
  `email` varchar(255) NOT NULL,
  `birthdate` date DEFAULT NULL,
  `gender` varchar(6) DEFAULT NULL,
  `phone` varchar(12) NOT NULL,
  `tg_nick` varchar(35) DEFAULT NULL,
  `img` varchar(255) DEFAULT NULL,
  `profession` varchar(100) NOT NULL,
  `salary` bigint(11) NOT NULL,
  `skills` text NOT NULL,
  `programs` text NOT NULL,
  `exp` text NOT NULL,
  `work_place` varchar(255) DEFAULT NULL,
  `education` text DEFAULT NULL,
  `about` text DEFAULT NULL,
  `achievements` text DEFAULT NULL,
  `city` varchar(50) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='portfolio''s list';

-- --------------------------------------------------------

--
-- Структура таблицы `sessions`
--

CREATE TABLE `sessions` (
  `user_key` varchar(100) NOT NULL,
  `email` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `sessions`
--

INSERT INTO `sessions` (`user_key`, `email`) VALUES
('93c406fd81a3a335f13d1ecabee094b4815f1034bcbdaddea62022-04-22 21:08:20', 'chernysheva.v@example.com'),
('c7c383acacca5faa6b70e598210157897805b54062b16c69352022-04-22 21:13:14', 'chernysheva.v@example.com'),
('d4a86a505491309c5c39339d898bb1d9d29aedbb1b9f4f15532022-04-22 21:13:36', 'chernysheva.v@example.com'),
('ccf798cabc901672bc8a1b06cdecd98cbe37a574ef744047692022-04-22 21:13:45', 'chernysheva.v@example.com'),
('b1eeb23c1a3768307f53f67131e1fc9a8115cefebd794d3cf32022-04-22 21:16:51', 'chernysheva.v@example.com'),
('952ff7b39f7c9eaf7ca4eeb3ab76f21af4a16defbfc989a75e2022-04-22 21:18:00', 'chernysheva.v@example.com'),
('466dd89fafd701926cec47f613b2f9eae2bf687cfb826a6e6d2022-04-22 22:16:52', 'chernysheva.v@example.com'),
('21dcd8200a8e17616aae78f7efe0a841911f78c8c24a3fa98a2022-04-22 22:36:35', 'chernysheva.v@example.com'),
('59911fdc1f2ad37d2779278a7edd789e56db65ebaa6ed17a9a2022-04-23 02:25:14', 'chernysheva.v@example.com'),
('9b14f5489cf8636a1bac85b015c617099ed9d495bf519004232022-04-23 03:12:45', 'chernysheva.v@example.com'),
('433d85e4ba05343be671822d7bb5dbed79cedcdbe7b7b9a6da2022-04-23 03:16:48', 'chernysheva.v@example.com'),
('8b12a5c1e80ad868dbaed5643c797843e3291eecf7022ac8c62022-04-23 03:34:19', 'chernysheva.v@example.com'),
('025f955b15c05f4d97eb6d11782ddcfd383fb599755302bdab2022-04-23 03:42:32', 'chernysheva.v@example.com'),
('6afe7c27ec0bbcf709a343d49e701e6f2162c2cc6d4dfcf1c92022-04-23 04:18:42', 'chernysheva.v@example.com'),
('e918ceb16a443861a9aa52fbbc608a98f3eeb2708e0bbc0c572022-04-23 21:55:06', 'chernysheva.v@example.com'),
('43adf02fcc1f123c0b2fa25d2dabd9577f07fb1d9c5b4bd8322022-04-23 21:55:42', 'chernysheva.v@example.com'),
('df6a3367d16425c4aadb1524e9cb3ebe7f2d2221316c38e6022022-04-23 23:31:06', 'chernysheva.v@example.com'),
('2a82d49076862193f50d96a2cc66667a0e0ecb81cde6a01ef22022-04-24 00:35:25', 'chernysheva.v@example.com'),
('c1b184e3d1a12dfc547edc758299c8afea575acdb3bb4abc672022-04-24 00:36:40', 'chernysheva.v@example.com'),
('244834593db89c8374493c4c7535f130d7bb7cf62268f049122022-04-24 05:37:18', 'chernysheva.v@example.com'),
('ffb18b3f6ac1495d2fb048bc1ceef34802330fa59ed7142a132022-04-24 06:01:25', 'chernysheva.v@example.com'),
('d737f101aeedbb7dced5dcb18b6268dbb937e921af495365702022-04-24 06:34:27', 'chernysheva.v@example.com'),
('392f7100f6fd58ba67fc17fcf07c2e5ad84a3417711ea3c3062022-04-24 06:34:42', 'chernysheva.v@example.com'),
('caf1c1d38396df62897c69a5e6580e9b299e245c89a5a21e4c2022-04-24 06:38:19', 'potapova.v@example.com'),
('1523d03d06b9c2e401498170c02e6cc25ea9d129673e56aad62022-04-24 06:59:09', 'potapova.v@example.com'),
('e247a6b6e2d41bc6872b0825069c55418d96e76e73f0f5146b2022-04-24 07:00:21', 'potapova.v@example.com'),
('c9a8c253abf8d3d462b589fc8ee18a76cbc736eb97853e41822022-04-24 07:23:44', 'potapova.v@example.com'),
('f038cbfab9dc0a7322c1c2b79a31cf77709b8f7a046a4146de2022-04-24 07:24:37', 'potapova.v@example.com'),
('01d171e73f188f94afce4ade33bda6c17e076cf3e24ccf516f2022-04-24 07:25:30', 'potapova.v@example.com'),
('d74df3af204dffb67c2df2290470aa75156dda2ab4eb91a3722022-04-24 07:40:39', 'potapova.v@example.com'),
('9e7cd5cb83b52de10223e239d50d7ea15cae999ed055d172422022-04-24 07:41:19', 'potapova.v@example.com'),
('a8df9a11be9dbfcbf591203c251f365dd2ac677d554556e94c2022-04-24 07:45:59', 'potapova.v@example.com');

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE `users` (
  `id` int(11) UNSIGNED NOT NULL,
  `email` varchar(255) NOT NULL,
  `hash` varchar(255) NOT NULL,
  `salt` varchar(8) NOT NULL,
  `firstName` varchar(35) NOT NULL,
  `lastName` varchar(35) NOT NULL,
  `patronymic` varchar(20) NOT NULL,
  `gender` varchar(6) NOT NULL,
  `birthdate` date NOT NULL,
  `phone` varchar(12) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='list of users';

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`id`, `email`, `hash`, `salt`, `firstName`, `lastName`, `patronymic`, `gender`, `birthdate`, `phone`) VALUES
(3, 'chernysheva.v@example.com', '$2y$10$mpxmHp5L1bPCzc7Gr8t1cecLys2S7OYA6.jYV1Cx/KawRoKKqVitO', 'WXpXR5HS', 'Виктория', 'Чернышева', 'Фёдоровна', 'female', '1979-06-16', '+79533774195'),
(4, 'potapova.v@example.com', '$2y$10$25A2hAgzpM7nNh/SeT/6/uhWem4hlUUCycBgn7niMEtT9WHLcSbRm', 'PBKPucc4', 'Василиса', 'Потапова', 'Глебовна', 'female', '1997-11-23', '+79535431443'),
(5, 'kozlova.e@example.com', '$2y$10$q.1wamSN1u/QFqeHScVRa.9/EHuTgOWygssWM/2OUFtE2.b0AqNG2', 'vBih0RMR', 'Елизавета', 'Козлова', 'Руслановна', 'female', '1972-10-24', '+79537432188'),
(6, 'orlov.s@example.com', '$2y$10$6FeDCfxHT2msGjAqjWApa.MZcSPz6EVzMz23zHY0khh4alYu6t7eO', 'F5ms15Yl', 'Степан', 'Орлов', 'Дмитриевич', 'male', '2001-09-03', '+79539777237'),
(7, 'novikova.v@example.com', '$2y$10$17KwOGFzvuOu5yDj5YVZqe0QWu.zkcu682ntMzCwAQIAu.Giy/3Qa', 'Azjh043A', 'Варвара', 'Новикова', 'Даниэльевна', 'female', '1977-12-10', '+79535399125'),
(8, 'gromova.a@example.com', '$2y$10$4R5FoJIFqF7WpK9d6Wt6GOJKy9g7W2HfopbCQXY.uZ8/3Wae6.3x6', 'Y09LXKgI', 'Анисия', 'Громова', 'Дмитриевна', 'female', '1990-01-05', '+79535403621'),
(9, 'petrovskaia.a@example.com', '$2y$10$2NIY1s/697T9WkM56kogsOQDzYjsViHrVXQLLZMe/HokIvFyO17hy', 'Yqq2oppL', 'Анна', 'Петровская', 'Артёмовна', 'female', '1986-04-25', '+79536864058'),
(10, 'rubtsova.p@example.com', '$2y$10$0ByAKdbsQualswN32AHgJOw3n6HLg1Gyi1rkj11eZs56HVbgEgux6', 'Q4NdjndP', 'Полина', 'Рубцова', 'Дмитриевна', 'female', '1985-10-25', '+79534737404'),
(11, 'vinogradov.g@example.com', '$2y$10$prMYCMr4viFtT2vsd3QeQe5l6sBkMRSDojFlvNiScufrmolqCjFHS', '5VXK82fq', 'Глеб', 'Виноградов', 'Егорович', 'male', '1984-11-11', '+79532557433'),
(12, 'antonov.m@example.com', '$2y$10$zQOCH9MwUowcI8Gy4BG2MOS/FoeVRKYvdPm9gYwX/8nS9vHeP4ANS', 'cDYc7eqi', 'Михаил', 'Антонов', 'Егорович', 'male', '2001-11-11', '+79536902220'),
(13, 'lvov.d@example.com', '$2y$10$QNdWYl5tP.334V61ZEiFCeJlBmbXDHhS/BFLPxc6czE.jvhNDjEp.', 'e4ekGpVJ', 'Даниль', 'Львов', 'Макарович', 'male', '1973-02-02', '+79532314807'),
(14, 'filatov.f@example.com', '$2y$10$C.B9IxVZzOvY3Pg/brVG/.16N3zkjyLaASpmLMVwCX8XTM1MeoHqW', 'jOHi0wCF', 'Фёдор', 'Филатов', 'Владимирович', 'male', '1994-07-10', '+79535335980'),
(15, 'makarova.e@example.com', '$2y$10$g2oGQ/FgaGbbHbE3p3AAnepANi1wAvg502aSrlpjMcDAyheHJJ6im', '4LITPN0j', 'Эвелина', 'Макарова', 'Владимировна', 'female', '1995-10-18', '+79538357264'),
(16, 'dmitrieva.s@example.com', '$2y$10$2qaxFzw7F97rJosnqzb6h.44LCdGFokEO3KEHMeaB/8O5vmJqlbNu', 'xCiKk1aL', 'София', 'Дмитриева', 'Александровна', 'female', '1994-01-21', '+79533244021'),
(17, 'sofronov.m@example.com', '$2y$10$xGjBUD1CG3.XqbCoO6LPnuMFmZVANMWJ0gd3AahnFTJLLQUTFWLfC', '9VKsScTu', 'Макар', 'Софронов', 'Олегович', 'male', '1970-07-21', '+79537450362'),
(18, 'iudin.a@example.com', '$2y$10$s.cwYlywS6tVyR.hslCx2u34hzg.6Keae6GuCzeiB0XvECpdMWPNu', 'Ey9LDKwo', 'Андрей', 'Юдин', 'Александрович', 'male', '1978-05-25', '+79534897479'),
(19, 'eremin.m@example.com', '$2y$10$qwL1gilzGs2MwmNx65xCYuXvY/i9lZchrDyif1Kl.IXwGumBKOYo2', 'YcxAoYH3', 'Максим', 'Еремин', 'Максимович', 'male', '1979-02-18', '+79536115911'),
(20, 'dmitriev.s@example.com', '$2y$10$0AghrFWvHkluzsUjvrKud.Ljt960OfsE1M.Gm8Wcv9J0islClmUlS', 'ee7hCjA8', 'Савва', 'Дмитриев', 'Никитич', 'male', '1998-04-03', '+79537713026'),
(21, 'nikulina.k@example.com', '$2y$10$OyTcMFS7WUlboTTt7V7tIeVRpslVy.tWB1pawom8jCssmFU4EaDLG', 'U1Fv9mPn', 'Каролина', 'Никулина', 'Кирилловна', 'female', '1970-08-01', '+79536270256'),
(22, 'aleksandrova.e@example.com', '$2y$10$P.b7ViCLYiAuIKL9bqgWgOgi2iSTadPZGULbqLxAtLz.kjxGuMLRq', 'grTQxM8v', 'Екатерина', 'Александрова', 'Тимуровна', 'female', '1979-05-26', '+79538561671'),
(23, 'popov.s@example.com', '$2y$10$gXV.9xoWQbd9hhtXHVIH5ONnw4OkWMxxXCljwMr0psPKgL.WZcUKG', 'Y2EwtyCU', 'Семён', 'Попов', 'Степанович', 'male', '1984-03-26', '+79531874683'),
(24, 'shubin.m@example.com', '$2y$10$hZTm4Luvv8E8kDLKBkgIAuCG3vOQ.LW41X9Nt39Ig5Ax/5C0gGfy.', 'CYaNS2EW', 'Михаил', 'Шубин', 'Алексеевич', 'male', '1990-10-23', '+79532558591'),
(25, 'kalinina.a@example.com', '$2y$10$I7xV/u/LqdNIsxGVo6A1NOW.HLQ4CuQWBBC4uxLotfrNcDAjRQBKa', 'Zw4Q2Y30', 'Анна', 'Калинина', 'Константиновна', 'female', '1994-11-15', '+79532115605'),
(26, 'stepanova.a@example.com', '$2y$10$1emCk7913Q/KOdSQqbAcxOdHXJiV979RW.2NvWZns461Wr.2jKbwK', 'ZOvuA2pP', 'Арина', 'Степанова', 'Матвеевна', 'female', '1984-03-18', '+79536864094'),
(27, 'zakharova.s@example.com', '$2y$10$eZ3cW9oaLlkCCGUf4BWXRO5GsfnGF7DqByzqVgOeVFkyiDJc4P7pe', 'ihClTC39', 'София', 'Захарова', 'Макаровна', 'female', '1980-02-28', '+79534188694'),
(28, 'leonov.l@example.com', '$2y$10$NW6nwP0.4rbVs3giV.aXbOQjOu7CX3AmIeFkcUYs0q/YLcJkoPrhW', 'rcOUdwO2', 'Лев', 'Леонов', 'Андреевич', 'male', '2002-03-25', '+79214412049'),
(29, 'kravtsov.m@example.com', '$2y$10$Mt3Opq1Ep5ioNwusK29NhO7XGRs3Rc3GPi75H/svEAEVwOdRnia16', 'If8zIBgw', 'Макар', 'Кравцов', 'Давидович', 'male', '1983-01-01', '+79216988534'),
(30, 'rudneva.a@example.com', '$2y$10$VB/DO.eaHDAK4s0teBkjiOf8dZeHOXlEB0yABn2g2zWcbT.C5CNyW', '43qzNyoY', 'Анна', 'Руднева', 'Станиславовна', 'female', '1989-08-02', '+79212250243'),
(31, 'vlasov.g@example.com', '$2y$10$IC.hceeFAns4TfT6LB618uxmcN381tGZCg5/w2pQAg/XlIlBHY/mu', 'owJRY25p', 'Герман', 'Власов', 'Макарович', 'male', '1995-05-13', '+79219393730'),
(32, 'ivanov.t@example.com', '$2y$10$yOGI72vCLZNLYk6re476rO83hitnQSeRzfJGT3qhloIUYJE8QqQIa', 'do7xIf7F', 'Тимофей', 'Иванов', 'Даниилович', 'male', '1993-05-06', '+79213118937'),
(33, 'poliakova.s@example.com', '$2y$10$JHCNB3h8b38yS5W4M02XleEMDWj/odfgeoioIo27MiomGuUhysaaO', 'OJHMM6Ex', 'Софья', 'Полякова', 'Ильинична', 'female', '1982-03-26', '+79211210652'),
(34, 'pakhomov.e@example.com', '$2y$10$0ZbsKf8QeN5iWi8s9yVd3.Rv2LwNtRngvE84.YvodRj9dyXqnmxWi', 'rJ6CO9TT', 'Евгений', 'Пахомов', 'Матвеевич', 'male', '1997-03-13', '+79217801622'),
(35, 'filippova.e@example.com', '$2y$10$a1rLxsr/7W/7Sv42wA8TjOWiNAiPG8As6xd3gvMxDvOajr3b.KpAq', 'Xnq9hqJx', 'Ева', 'Филиппова', 'Эмильевна', 'female', '1987-10-01', '+79216301524'),
(36, 'kuznetsova.v@example.com', '$2y$10$GMUwKD80kUKgYVxTHzpHpOmUrvlkLMRI7vs2BeW94OwmT6KUSBiLm', '04DtpJt8', 'Варвара', 'Кузнецова', 'Матвеевна', 'female', '1992-07-21', '+79212328455'),
(37, 'egorova.v@example.com', '$2y$10$Iw16PpaEeeMO7oumiaqkyO0R7Eezob0V0SiL8Q7QKTYPqZIVWqjkC', 'Xp8IfthT', 'Василиса', 'Егорова', 'Евгеньевна', 'female', '1990-09-30', '+79219352530'),
(38, 'skvortsova.m@example.com', '$2y$10$uo5BrAhjdwiEVnRCIjEFruB2XyayqVF.59WVMWVpXwDnXRDHAwAWK', '8mpQarfS', 'Мария', 'Скворцова', 'Алексеевна', 'female', '1997-12-14', '+79216501740'),
(39, 'ershov.m@example.com', '$2y$10$ZSyPSQOpuhNrKEsOfyCioeT6jQRbR6iTE3TQ2WPYLmxw783AY2zGO', 'CDY3M0sl', 'Марк', 'Ершов', 'Лукич', 'male', '1996-05-27', '+79217750458'),
(40, 'filimonov.r@example.com', '$2y$10$AtvvsRhy4gElnEz4KgmRf.x6NTiQ7geQAVAnu3LKaLSJE3F0NsHtK', 'nF6CdI1w', 'Роман', 'Филимонов', 'Иванович', 'male', '1980-12-05', '+79212904693'),
(41, 'ignatev.p@example.com', '$2y$10$uRwgxITL.wDDIGDk/SkG1ea6dSyUvyQRHL3FZwDcP8j7lAWfCCeby', 'rv7B1DEg', 'Павел', 'Игнатьев', 'Михайлович', 'male', '1975-11-01', '+79211764213'),
(42, 'sychev.t@example.com', '$2y$10$kmLdmfzsdghH/Q86h3uki.xG8k5FCrUGpot9iF26TK0EmPmv24O2W', 'cY2BLiq9', 'Тимофей', 'Сычев', 'Маркович', 'male', '1985-11-19', '+79219954293'),
(43, 'baranova.s@example.com', '$2y$10$mpbr6/06C88.fIgms6R2QuXa20xOPMKNN6Hfqs3EPg5sEymD8UuWS', 'HmQZJZ3z', 'София', 'Баранова', 'Степановна', 'female', '1995-04-01', '+79216276642'),
(44, 'eremin.p@example.com', '$2y$10$ybPeqqAdn4aG4njG472lNuL8yW5LMam8AISV1u7fikyyuJE3h3wwe', 'Zy8hx9nf', 'Платон', 'Еремин', 'Михайлович', 'male', '1970-12-06', '+79216506767'),
(45, 'filatova.a@example.com', '$2y$10$ymF5PBylw6XqxtrMSGGKh.9NkElFEtfzwdeSJyhmcb0ibBgmP/Sc2', 'S9PDxO51', 'Александра', 'Филатова', 'Ярославовна', 'female', '1979-03-23', '+79217835455'),
(46, 'akimov.r@example.com', '$2y$10$6skDwOB7gCgs/SGuL7oIR.n6IvAAotpMSkA9KWmbheUR4UsE2lG1K', 'I4y8eVKR', 'Роберт', 'Акимов', 'Никитич', 'male', '1984-04-21', '+79214644050'),
(47, 'egorov.g@example.com', '$2y$10$NCn/e3M9uJrIwMHZijqoOulZDoht3N.GF0LFA0JgCfIb2utwhUWX6', 'ccfgw6QF', 'Григорий', 'Егоров', 'Артёмович', 'male', '2001-02-20', '+79211476059'),
(48, 'terenteva.u@example.com', '$2y$10$jz5/OH/EZDOtmaF3tDIQAuO/FCJNvou34bdZIMsOfSUzzPiLbslJ6', '4gNGL1YN', 'Ульяна', 'Терентьева', 'Тимофеевна', 'female', '1977-10-11', '+79213210997'),
(49, 'ivanova.a@example.com', '$2y$10$EfAQMHKX9OV7tle6MzSwEedTZ7oEop0bLbqWBtN2ropIWwY6wDkfO', '66q2uRFy', 'Арина', 'Иванова', 'Андреевна', 'female', '1998-01-19', '+79216896433'),
(50, 'zolotarev.m@example.com', '$2y$10$bSuAKOT144.bHx3XfyITCO3T8ft46M9ZnvNLJ0AxmSl9fALk.PcGq', 'D582YV3y', 'Михаил', 'Золотарев', 'Никитич', 'male', '1977-01-18', '+79218637856'),
(51, 'fedorova.a@example.com', '$2y$10$YIeoPfoc7oMFzpKXEqmBvOvxxETPqx3aQivfYr40iOPPwtgo9pAOu', 'YM44s4ue', 'Алиса', 'Федорова', 'Эмильевна', 'female', '1981-08-29', '+79213978408'),
(52, 'nazarov.a@example.com', '$2y$10$DmZ5arvpCL9P.huKsb6ZE.7.nC7t8F2KKq/DM677e6UbiXlRUZGXG', 'B3d8F6e0', 'Андрей', 'Назаров', 'Александрович', 'male', '1971-11-18', '+79216034799');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `api_keys`
--
ALTER TABLE `api_keys`
  ADD PRIMARY KEY (`api_key`);

--
-- Индексы таблицы `passwords`
--
ALTER TABLE `passwords`
  ADD UNIQUE KEY `id` (`user-id`);

--
-- Индексы таблицы `portfolio`
--
ALTER TABLE `portfolio`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `users`
--
ALTER TABLE `users`
  ADD UNIQUE KEY `id` (`id`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `phone` (`phone`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `portfolio`
--
ALTER TABLE `portfolio`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT для таблицы `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=53;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
