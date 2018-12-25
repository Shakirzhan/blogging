-- phpMyAdmin SQL Dump
-- version 4.7.7
-- https://www.phpmyadmin.net/
--
-- Хост: localhost
-- Время создания: Дек 25 2018 г., 19:28
-- Версия сервера: 5.7.21-20-beget-5.7.21-20-1-log
-- Версия PHP: 5.6.38

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `l903311f_admin`
--

-- --------------------------------------------------------

--
-- Структура таблицы `category`
--
-- Создание: Дек 25 2018 г., 14:34
-- Последнее обновление: Дек 25 2018 г., 14:39
--

DROP TABLE IF EXISTS `category`;
CREATE TABLE `category` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `sort_order` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `category`
--

INSERT INTO `category` (`id`, `name`, `sort_order`) VALUES
(1, 'Финансы', 1),
(2, 'Кино', 2),
(3, 'Спорт', 3),
(4, 'Авто', 4),
(5, 'Здоровье', 5),
(6, 'Путешествия', 6);

-- --------------------------------------------------------

--
-- Структура таблицы `ipaddress_likes_map`
--
-- Создание: Дек 12 2018 г., 17:07
--

DROP TABLE IF EXISTS `ipaddress_likes_map`;
CREATE TABLE `ipaddress_likes_map` (
  `id` int(8) NOT NULL,
  `tutorial_id` int(8) NOT NULL,
  `ip_address` varchar(255) NOT NULL,
  `user_id` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `ipaddress_likes_map`
--

INSERT INTO `ipaddress_likes_map` (`id`, `tutorial_id`, `ip_address`, `user_id`) VALUES
(99, 1, '217.23.180.102', 'Galim-1'),
(100, 2, '217.23.180.102', 'Galim-2'),
(101, 1, '217.23.180.102', 'DamiG-1'),
(102, 2, '217.23.180.102', 'DamiG-2'),
(104, 2, '217.23.180.102', 'Fall-2'),
(111, 1, '217.23.180.102', 'LP-1'),
(112, 2, '217.23.180.102', 'LP-2'),
(114, 4, '178.206.137.153', 'admin-4'),
(118, 3, '178.206.137.153', 'admin-3'),
(119, 9, '178.206.137.153', 'admin-9'),
(121, 7, '217.23.180.102', 'admin-7'),
(123, 6, '217.23.180.102', 'admin-6'),
(124, 8, '178.205.191.210', 'admin-8'),
(125, 11, '178.206.125.214', 'admin-11'),
(126, 5, '178.206.125.214', 'admin-5');

-- --------------------------------------------------------

--
-- Структура таблицы `news`
--
-- Создание: Дек 25 2018 г., 14:29
-- Последнее обновление: Дек 25 2018 г., 15:54
--

DROP TABLE IF EXISTS `news`;
CREATE TABLE `news` (
  `id` int(11) NOT NULL,
  `picture` varchar(255) NOT NULL,
  `caption` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `love` int(11) NOT NULL DEFAULT '0',
  `comments` int(11) NOT NULL DEFAULT '0',
  `date` date NOT NULL,
  `category_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `news`
--

INSERT INTO `news` (`id`, `picture`, `caption`, `description`, `love`, `comments`, `date`, `category_id`) VALUES
(1, 'img/18.11.2018.1542559431.jpg', '#1: Оператор онлайн-записи к врачам пожаловался на Минздрав в Верховный суд', '#1: Структура Минкомсвязи ФГБУ НИИ «Восход», разрабатывающая для государства программное обеспечение для обработки данных, подала жалобу в Верховный суд по делу против Минздрава. В компании утверждают, что Минздрав не оплатил ее услуги в 2016 году на сумму более 90 млн руб. Среди услуг НИИ — работа компьютеров в больницах, электронные картотеки и онлайн-запись к врачу.\r\nСтруктура Минкомсвязи ФГБУ НИИ «Восход», разрабатывающая для государства программное обеспечение для обработки данных, подала жалобу в Верховный суд по делу против Минздрава. В компании утверждают, что Минздрав не оплатил ее услуги в 2016 году на сумму более 90 млн руб. Среди услуг НИИ — работа компьютеров в больницах, электронные картотеки и онлайн-запись к врачу.\r\nСтруктура Минкомсвязи ФГБУ НИИ «Восход», разрабатывающая для государства программное обеспечение для обработки данных, подала жалобу в Верховный суд по делу против Минздрава. В компании утверждают, что Минздрав не оплатил ее услуги в 2016 году на сумму более 90 млн руб. Среди услуг НИИ — работа компьютеров в больницах, электронные картотеки и онлайн-запись к врачу.\r\nСтруктура Минкомсвязи ФГБУ НИИ «Восход», разрабатывающая для государства программное обеспечение для обработки данных, подала жалобу в Верховный суд по делу против Минздрава. В компании утверждают, что Минздрав не оплатил ее услуги в 2016 году на сумму более 90 млн руб. Среди услуг НИИ — работа компьютеров в больницах, электронные картотеки и онлайн-запись к врачу.\r\nСтруктура Минкомсвязи ФГБУ НИИ «Восход», разрабатывающая для государства программное обеспечение для обработки данных, подала жалобу в Верховный суд по делу против Минздрава. В компании утверждают, что Минздрав не оплатил ее услуги в 2016 году на сумму более 90 млн руб. Среди услуг НИИ — работа компьютеров в больницах, электронные картотеки и онлайн-запись к врачу.', 3, 0, '2018-11-18', 1),
(2, 'img/18.11.2018.1542529343.jpg', 'Владимир Крупнов: ', 'Вы занимаетесь производством сим-карт, пластиковых карт и для Visa, и для Mastercard, и для всех крупных компаний. Вы полностью соответствуете всем новым технологиям и стандартам? Я правильно понимаю, что вы делаете пластиковые карты для большого количества банков в России, и, может быть, даже за границей?\r\n\r\nМы обслуживаем сотни банков, как в России, так и за границей, в том числе работаем с нашими ведущими кредитными организациями. Однако речь не только о производстве пластиковых карт — мы занимаемся цифровой безопасностью, digital. Карта сама по себе бесполезна, она играет роль только как носитель неких \"ключей\", как возможность сгенерировать некую криптограмму.\r\nМы обслуживаем сотни банков, как в России, так и за границей, в том числе работаем с нашими ведущими кредитными организациями. Однако речь не только о производстве пластиковых карт — мы занимаемся цифровой безопасностью, digital. Карта сама по себе бесполезна, она играет роль только как носитель неких \"ключей\", как возможность сгенерировать некую криптограмму.\r\nМы обслуживаем сотни банков, как в России, так и за границей, в том числе работаем с нашими ведущими кредитными организациями. Однако речь не только о производстве пластиковых карт — мы занимаемся цифровой безопасностью, digital. Карта сама по себе бесполезна, она играет роль только как носитель неких \"ключей\", как возможность сгенерировать некую криптограмму.\r\nМы обслуживаем сотни банков, как в России, так и за границей, в том числе работаем с нашими ведущими кредитными организациями. Однако речь не только о производстве пластиковых карт — мы занимаемся цифровой безопасностью, digital. Карта сама по себе бесполезна, она играет роль только как носитель неких \"ключей\", как возможность сгенерировать некую криптограмму.\r\nМы обслуживаем сотни банков, как в России, так и за границей, в том числе работаем с нашими ведущими кредитными организациями. Однако речь не только о производстве пластиковых карт — мы занимаемся цифровой безопасностью, digital. Карта сама по себе бесполезна, она играет роль только как носитель неких \"ключей\", как возможность сгенерировать некую криптограмму.', 4, 0, '2018-09-29', 1),
(3, 'template/images/blog/01/03.png', 'Владимир Крупнов: \"Технологический прогресс двигают лень и хакеры\"', 'Вы занимаетесь производством сим-карт, пластиковых карт и для Visa, и для Mastercard, и для всех крупных компаний. Вы полностью соответствуете всем новым технологиям и стандартам? Я правильно понимаю, что вы делаете пластиковые карты для большого количества банков в России, и, может быть, даже за границей?\r\n\r\nМы обслуживаем сотни банков, как в России, так и за границей, в том числе работаем с нашими ведущими кредитными организациями. Однако речь не только о производстве пластиковых карт — мы занимаемся цифровой безопасностью, digital. Карта сама по себе бесполезна, она играет роль только как носитель неких \"ключей\", как возможность сгенерировать некую криптограмму.\r\nМы обслуживаем сотни банков, как в России, так и за границей, в том числе работаем с нашими ведущими кредитными организациями. Однако речь не только о производстве пластиковых карт — мы занимаемся цифровой безопасностью, digital. Карта сама по себе бесполезна, она играет роль только как носитель неких \"ключей\", как возможность сгенерировать некую криптограмму.\r\nМы обслуживаем сотни банков, как в России, так и за границей, в том числе работаем с нашими ведущими кредитными организациями. Однако речь не только о производстве пластиковых карт — мы занимаемся цифровой безопасностью, digital. Карта сама по себе бесполезна, она играет роль только как носитель неких \"ключей\", как возможность сгенерировать некую криптограмму.\r\nМы обслуживаем сотни банков, как в России, так и за границей, в том числе работаем с нашими ведущими кредитными организациями. Однако речь не только о производстве пластиковых карт — мы занимаемся цифровой безопасностью, digital. Карта сама по себе бесполезна, она играет роль только как носитель неких \"ключей\", как возможность сгенерировать некую криптограмму.\r\nМы обслуживаем сотни банков, как в России, так и за границей, в том числе работаем с нашими ведущими кредитными организациями. Однако речь не только о производстве пластиковых карт — мы занимаемся цифровой безопасностью, digital. Карта сама по себе бесполезна, она играет роль только как носитель неких \"ключей\", как возможность сгенерировать некую криптограмму.', 1, 0, '2018-10-31', 1),
(4, 'template/images/blog/01/03.jpg', 'Владимир Крупнов: \"Технологический прогресс двигают лень и хакеры\"', 'Вы занимаетесь производством сим-карт, пластиковых карт и для Visa, и для Mastercard, и для всех крупных компаний. Вы полностью соответствуете всем новым технологиям и стандартам? Я правильно понимаю, что вы делаете пластиковые карты для большого количества банков в России, и, может быть, даже за границей?\r\n\r\nМы обслуживаем сотни банков, как в России, так и за границей, в том числе работаем с нашими ведущими кредитными организациями. Однако речь не только о производстве пластиковых карт — мы занимаемся цифровой безопасностью, digital. Карта сама по себе бесполезна, она играет роль только как носитель неких \"ключей\", как возможность сгенерировать некую криптограмму.\r\nМы обслуживаем сотни банков, как в России, так и за границей, в том числе работаем с нашими ведущими кредитными организациями. Однако речь не только о производстве пластиковых карт — мы занимаемся цифровой безопасностью, digital. Карта сама по себе бесполезна, она играет роль только как носитель неких \"ключей\", как возможность сгенерировать некую криптограмму.\r\nМы обслуживаем сотни банков, как в России, так и за границей, в том числе работаем с нашими ведущими кредитными организациями. Однако речь не только о производстве пластиковых карт — мы занимаемся цифровой безопасностью, digital. Карта сама по себе бесполезна, она играет роль только как носитель неких \"ключей\", как возможность сгенерировать некую криптограмму.\r\nМы обслуживаем сотни банков, как в России, так и за границей, в том числе работаем с нашими ведущими кредитными организациями. Однако речь не только о производстве пластиковых карт — мы занимаемся цифровой безопасностью, digital. Карта сама по себе бесполезна, она играет роль только как носитель неких \"ключей\", как возможность сгенерировать некую криптограмму.\r\nМы обслуживаем сотни банков, как в России, так и за границей, в том числе работаем с нашими ведущими кредитными организациями. Однако речь не только о производстве пластиковых карт — мы занимаемся цифровой безопасностью, digital. Карта сама по себе бесполезна, она играет роль только как носитель неких \"ключей\", как возможность сгенерировать некую криптограмму.', 1, 0, '2018-10-31', 2),
(5, 'template/images/blog/01/04.jpg', 'Оператор онлайн-записи к врачам пожаловался на Минздрав в Верховный суд', 'Структура Минкомсвязи ФГБУ НИИ «Восход», разрабатывающая для государства программное обеспечение для обработки данных, подала жалобу в Верховный суд по делу против Минздрава. В компании утверждают, что Минздрав не оплатил ее услуги в 2016 году на сумму более 90 млн руб. Среди услуг НИИ — работа компьютеров в больницах, электронные картотеки и онлайн-запись к врачу.\r\nСтруктура Минкомсвязи ФГБУ НИИ «Восход», разрабатывающая для государства программное обеспечение для обработки данных, подала жалобу в Верховный суд по делу против Минздрава. В компании утверждают, что Минздрав не оплатил ее услуги в 2016 году на сумму более 90 млн руб. Среди услуг НИИ — работа компьютеров в больницах, электронные картотеки и онлайн-запись к врачу.\r\nСтруктура Минкомсвязи ФГБУ НИИ «Восход», разрабатывающая для государства программное обеспечение для обработки данных, подала жалобу в Верховный суд по делу против Минздрава. В компании утверждают, что Минздрав не оплатил ее услуги в 2016 году на сумму более 90 млн руб. Среди услуг НИИ — работа компьютеров в больницах, электронные картотеки и онлайн-запись к врачу.\r\nСтруктура Минкомсвязи ФГБУ НИИ «Восход», разрабатывающая для государства программное обеспечение для обработки данных, подала жалобу в Верховный суд по делу против Минздрава. В компании утверждают, что Минздрав не оплатил ее услуги в 2016 году на сумму более 90 млн руб. Среди услуг НИИ — работа компьютеров в больницах, электронные картотеки и онлайн-запись к врачу.\r\nСтруктура Минкомсвязи ФГБУ НИИ «Восход», разрабатывающая для государства программное обеспечение для обработки данных, подала жалобу в Верховный суд по делу против Минздрава. В компании утверждают, что Минздрав не оплатил ее услуги в 2016 году на сумму более 90 млн руб. Среди услуг НИИ — работа компьютеров в больницах, электронные картотеки и онлайн-запись к врачу.', 1, 0, '2018-10-31', 2),
(6, 'template/images/blog/01/005.png', 'Оператор онлайн-записи к врачам пожаловался на Минздрав в Верховный суд', 'Структура Минкомсвязи ФГБУ НИИ «Восход», разрабатывающая для государства программное обеспечение для обработки данных, подала жалобу в Верховный суд по делу против Минздрава. В компании утверждают, что Минздрав не оплатил ее услуги в 2016 году на сумму более 90 млн руб. Среди услуг НИИ — работа компьютеров в больницах, электронные картотеки и онлайн-запись к врачу.\r\nСтруктура Минкомсвязи ФГБУ НИИ «Восход», разрабатывающая для государства программное обеспечение для обработки данных, подала жалобу в Верховный суд по делу против Минздрава. В компании утверждают, что Минздрав не оплатил ее услуги в 2016 году на сумму более 90 млн руб. Среди услуг НИИ — работа компьютеров в больницах, электронные картотеки и онлайн-запись к врачу.\r\nСтруктура Минкомсвязи ФГБУ НИИ «Восход», разрабатывающая для государства программное обеспечение для обработки данных, подала жалобу в Верховный суд по делу против Минздрава. В компании утверждают, что Минздрав не оплатил ее услуги в 2016 году на сумму более 90 млн руб. Среди услуг НИИ — работа компьютеров в больницах, электронные картотеки и онлайн-запись к врачу.\r\nСтруктура Минкомсвязи ФГБУ НИИ «Восход», разрабатывающая для государства программное обеспечение для обработки данных, подала жалобу в Верховный суд по делу против Минздрава. В компании утверждают, что Минздрав не оплатил ее услуги в 2016 году на сумму более 90 млн руб. Среди услуг НИИ — работа компьютеров в больницах, электронные картотеки и онлайн-запись к врачу.\r\nСтруктура Минкомсвязи ФГБУ НИИ «Восход», разрабатывающая для государства программное обеспечение для обработки данных, подала жалобу в Верховный суд по делу против Минздрава. В компании утверждают, что Минздрав не оплатил ее услуги в 2016 году на сумму более 90 млн руб. Среди услуг НИИ — работа компьютеров в больницах, электронные картотеки и онлайн-запись к врачу.', 1, 0, '2018-10-31', 3),
(7, 'template/images/blog/01/06.jpg', 'Оператор онлайн-записи к врачам пожаловался на Минздрав в Верховный суд', 'Структура Минкомсвязи ФГБУ НИИ «Восход», разрабатывающая для государства программное обеспечение для обработки данных, подала жалобу в Верховный суд по делу против Минздрава. В компании утверждают, что Минздрав не оплатил ее услуги в 2016 году на сумму более 90 млн руб. Среди услуг НИИ — работа компьютеров в больницах, электронные картотеки и онлайн-запись к врачу.\r\nСтруктура Минкомсвязи ФГБУ НИИ «Восход», разрабатывающая для государства программное обеспечение для обработки данных, подала жалобу в Верховный суд по делу против Минздрава. В компании утверждают, что Минздрав не оплатил ее услуги в 2016 году на сумму более 90 млн руб. Среди услуг НИИ — работа компьютеров в больницах, электронные картотеки и онлайн-запись к врачу.\r\nСтруктура Минкомсвязи ФГБУ НИИ «Восход», разрабатывающая для государства программное обеспечение для обработки данных, подала жалобу в Верховный суд по делу против Минздрава. В компании утверждают, что Минздрав не оплатил ее услуги в 2016 году на сумму более 90 млн руб. Среди услуг НИИ — работа компьютеров в больницах, электронные картотеки и онлайн-запись к врачу.\r\nСтруктура Минкомсвязи ФГБУ НИИ «Восход», разрабатывающая для государства программное обеспечение для обработки данных, подала жалобу в Верховный суд по делу против Минздрава. В компании утверждают, что Минздрав не оплатил ее услуги в 2016 году на сумму более 90 млн руб. Среди услуг НИИ — работа компьютеров в больницах, электронные картотеки и онлайн-запись к врачу.\r\nСтруктура Минкомсвязи ФГБУ НИИ «Восход», разрабатывающая для государства программное обеспечение для обработки данных, подала жалобу в Верховный суд по делу против Минздрава. В компании утверждают, что Минздрав не оплатил ее услуги в 2016 году на сумму более 90 млн руб. Среди услуг НИИ — работа компьютеров в больницах, электронные картотеки и онлайн-запись к врачу.', 1, 0, '2018-10-31', 3),
(8, 'template/images/blog/01/07.jpg', 'Оператор онлайн-записи к врачам пожаловался на Минздрав в Верховный суд', 'Структура Минкомсвязи ФГБУ НИИ «Восход», разрабатывающая для государства программное обеспечение для обработки данных, подала жалобу в Верховный суд по делу против Минздрава. В компании утверждают, что Минздрав не оплатил ее услуги в 2016 году на сумму более 90 млн руб. Среди услуг НИИ — работа компьютеров в больницах, электронные картотеки и онлайн-запись к врачу.\r\nСтруктура Минкомсвязи ФГБУ НИИ «Восход», разрабатывающая для государства программное обеспечение для обработки данных, подала жалобу в Верховный суд по делу против Минздрава. В компании утверждают, что Минздрав не оплатил ее услуги в 2016 году на сумму более 90 млн руб. Среди услуг НИИ — работа компьютеров в больницах, электронные картотеки и онлайн-запись к врачу.\r\nСтруктура Минкомсвязи ФГБУ НИИ «Восход», разрабатывающая для государства программное обеспечение для обработки данных, подала жалобу в Верховный суд по делу против Минздрава. В компании утверждают, что Минздрав не оплатил ее услуги в 2016 году на сумму более 90 млн руб. Среди услуг НИИ — работа компьютеров в больницах, электронные картотеки и онлайн-запись к врачу.\r\nСтруктура Минкомсвязи ФГБУ НИИ «Восход», разрабатывающая для государства программное обеспечение для обработки данных, подала жалобу в Верховный суд по делу против Минздрава. В компании утверждают, что Минздрав не оплатил ее услуги в 2016 году на сумму более 90 млн руб. Среди услуг НИИ — работа компьютеров в больницах, электронные картотеки и онлайн-запись к врачу.\r\nСтруктура Минкомсвязи ФГБУ НИИ «Восход», разрабатывающая для государства программное обеспечение для обработки данных, подала жалобу в Верховный суд по делу против Минздрава. В компании утверждают, что Минздрав не оплатил ее услуги в 2016 году на сумму более 90 млн руб. Среди услуг НИИ — работа компьютеров в больницах, электронные картотеки и онлайн-запись к врачу.', 1, 0, '2018-10-31', 4),
(9, 'template/images/blog/01/08.jpg', 'Оператор онлайн-записи к врачам пожаловался на Минздрав в Верховный суд', 'Структура Минкомсвязи ФГБУ НИИ «Восход», разрабатывающая для государства программное обеспечение для обработки данных, подала жалобу в Верховный суд по делу против Минздрава. В компании утверждают, что Минздрав не оплатил ее услуги в 2016 году на сумму более 90 млн руб. Среди услуг НИИ — работа компьютеров в больницах, электронные картотеки и онлайн-запись к врачу.\r\nСтруктура Минкомсвязи ФГБУ НИИ «Восход», разрабатывающая для государства программное обеспечение для обработки данных, подала жалобу в Верховный суд по делу против Минздрава. В компании утверждают, что Минздрав не оплатил ее услуги в 2016 году на сумму более 90 млн руб. Среди услуг НИИ — работа компьютеров в больницах, электронные картотеки и онлайн-запись к врачу.\r\nСтруктура Минкомсвязи ФГБУ НИИ «Восход», разрабатывающая для государства программное обеспечение для обработки данных, подала жалобу в Верховный суд по делу против Минздрава. В компании утверждают, что Минздрав не оплатил ее услуги в 2016 году на сумму более 90 млн руб. Среди услуг НИИ — работа компьютеров в больницах, электронные картотеки и онлайн-запись к врачу.\r\nСтруктура Минкомсвязи ФГБУ НИИ «Восход», разрабатывающая для государства программное обеспечение для обработки данных, подала жалобу в Верховный суд по делу против Минздрава. В компании утверждают, что Минздрав не оплатил ее услуги в 2016 году на сумму более 90 млн руб. Среди услуг НИИ — работа компьютеров в больницах, электронные картотеки и онлайн-запись к врачу.\r\nСтруктура Минкомсвязи ФГБУ НИИ «Восход», разрабатывающая для государства программное обеспечение для обработки данных, подала жалобу в Верховный суд по делу против Минздрава. В компании утверждают, что Минздрав не оплатил ее услуги в 2016 году на сумму более 90 млн руб. Среди услуг НИИ — работа компьютеров в больницах, электронные картотеки и онлайн-запись к врачу.', 1, 0, '2018-10-31', 4),
(11, 'img/18.11.2018.1542564901.jpg', '#11: Оператор онлайн-записи к врачам пожаловался на Минздрав в Верховный суд', '#11: Структура Минкомсвязи ФГБУ НИИ «Восход», разрабатывающая для государства программное обеспечение для обработки данных, подала жалобу в Верховный суд по делу против Минздрава. В компании утверждают, что Минздрав не оплатил ее услуги в 2016 году на сумму более 90 млн руб. Среди услуг НИИ — работа компьютеров в больницах, электронные картотеки и онлайн-запись к врачу.\r\nСтруктура Минкомсвязи ФГБУ НИИ «Восход», разрабатывающая для государства программное обеспечение для обработки данных, подала жалобу в Верховный суд по делу против Минздрава. В компании утверждают, что Минздрав не оплатил ее услуги в 2016 году на сумму более 90 млн руб. Среди услуг НИИ — работа компьютеров в больницах, электронные картотеки и онлайн-запись к врачу.\r\nСтруктура Минкомсвязи ФГБУ НИИ «Восход», разрабатывающая для государства программное обеспечение для обработки данных, подала жалобу в Верховный суд по делу против Минздрава. В компании утверждают, что Минздрав не оплатил ее услуги в 2016 году на сумму более 90 млн руб. Среди услуг НИИ — работа компьютеров в больницах, электронные картотеки и онлайн-запись к врачу.\r\nСтруктура Минкомсвязи ФГБУ НИИ «Восход», разрабатывающая для государства программное обеспечение для обработки данных, подала жалобу в Верховный суд по делу против Минздрава. В компании утверждают, что Минздрав не оплатил ее услуги в 2016 году на сумму более 90 млн руб. Среди услуг НИИ — работа компьютеров в больницах, электронные картотеки и онлайн-запись к врачу.\r\nСтруктура Минкомсвязи ФГБУ НИИ «Восход», разрабатывающая для государства программное обеспечение для обработки данных, подала жалобу в Верховный суд по делу против Минздрава. В компании утверждают, что Минздрав не оплатил ее услуги в 2016 году на сумму более 90 млн руб. Среди услуг НИИ — работа компьютеров в больницах, электронные картотеки и онлайн-запись к врачу.', 1, 0, '2018-11-17', 4),
(12, 'img/25.12.2018.1545744795.jpg', '1# Demo', 'Demo', 0, 0, '2018-12-25', 5),
(13, 'img/25.12.2018.1545745833.jpg', '1# Demo', 'Demo', 0, 0, '2018-12-25', 6);

-- --------------------------------------------------------

--
-- Структура таблицы `tbl_comment`
--
-- Создание: Дек 12 2018 г., 17:07
-- Последнее обновление: Дек 25 2018 г., 10:19
--

DROP TABLE IF EXISTS `tbl_comment`;
CREATE TABLE `tbl_comment` (
  `comment_id` int(11) NOT NULL,
  `parent_comment_id` int(11) NOT NULL,
  `comment` varchar(200) NOT NULL,
  `comment_sender_name` varchar(40) NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `itemID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `tbl_comment`
--

INSERT INTO `tbl_comment` (`comment_id`, `parent_comment_id`, `comment`, `comment_sender_name`, `date`, `itemID`) VALUES
(13, 0, 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliq Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi', 'alex@mail.com', '2018-11-03 12:31:06', 1),
(14, 0, 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliq Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi', 'alex@mail.com', '2018-11-03 13:30:45', 5),
(15, 14, 'Lorem ipsum dolor sit amet, consectetur adipisicing elit...', 'samarbaev99@mail.ru', '2018-11-03 13:31:02', 5),
(16, 14, 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliq Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi', 'zinchenko.us@gmail.com', '2018-11-03 13:47:37', 5),
(17, 13, 'Структура Минкомсвязи ФГБУ НИИ «Восход», разрабатывающая для государства программное обеспечение для обработки данных, подала жалобу в Верховный суд по делу против Минздрава.', 'map@mail.ru', '2018-11-03 13:54:25', 1),
(18, 0, ' Структура Минкомсвязи ФГБУ НИИ «Восход», разрабатывающая для государства программное обеспечение для обработки данных, подала жалобу в Верховный суд по делу против Минздрава. В компании утверждают, ч', 'admin@mail.ru', '2018-11-03 14:06:26', 7),
(19, 0, 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliq Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi...', 'dimon@mail.ru', '2018-11-06 18:34:17', 2),
(20, 19, 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliq...', 'alex@mail.com', '2018-11-06 18:35:30', 2),
(21, 0, 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliq...', 'samin@mail.ru', '2018-11-07 06:12:59', 9),
(22, 21, 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliq Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi...', 'has@mail.ru', '2018-11-07 06:13:59', 9),
(23, 0, 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliq Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi', 'alex@mail.ru', '2018-11-07 06:27:49', 3),
(31, 13, '2. Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliq Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi...', 'mail@mail.ru', '2018-11-07 06:56:54', 1),
(32, 30, 'demos!!!', 'samarbaev99@mail.ru', '2018-12-12 17:29:20', 1),
(33, 0, 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliq Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi...', 'samarbaev99@mail.ru', '2018-12-12 17:36:01', 11),
(34, 33, 'Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi..........', 'samarbaev99@mail.ru', '2018-12-12 17:36:23', 11),
(35, 0, 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliq...', 'samarbaev99@mail.ru', '2018-12-25 10:19:23', 5);

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--
-- Создание: Дек 12 2018 г., 17:07
-- Последнее обновление: Дек 25 2018 г., 11:16
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(32) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`id`, `username`, `password`) VALUES
(10, 'Galim', '4f5d5e751d296ba6911d4c074334efc9'),
(9, 'admin', '9fca35d6dc4f602f7a99de75e52440e9'),
(11, 'surrok1@mail.ru', '33885f57b98d2b03c7edbc1dd2f93c32'),
(12, 'Wan', '77abaa51f9e66d4018c3cc309211780e'),
(13, 'asdadasd', '6d717c311b4743d3d9c89516d3b199ce'),
(14, 'asd', '54b3d9033cc4ca118d6a3137ea0c48f7');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `ipaddress_likes_map`
--
ALTER TABLE `ipaddress_likes_map`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `user_id` (`user_id`),
  ADD KEY `user_id_2` (`user_id`);

--
-- Индексы таблицы `news`
--
ALTER TABLE `news`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `tbl_comment`
--
ALTER TABLE `tbl_comment`
  ADD PRIMARY KEY (`comment_id`);

--
-- Индексы таблицы `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `category`
--
ALTER TABLE `category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT для таблицы `ipaddress_likes_map`
--
ALTER TABLE `ipaddress_likes_map`
  MODIFY `id` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=127;

--
-- AUTO_INCREMENT для таблицы `news`
--
ALTER TABLE `news`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT для таблицы `tbl_comment`
--
ALTER TABLE `tbl_comment`
  MODIFY `comment_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT для таблицы `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
