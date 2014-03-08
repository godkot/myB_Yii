-- phpMyAdmin SQL Dump
-- version 3.5.1
-- http://www.phpmyadmin.net
--
-- Хост: localhost
-- Время создания: Фев 11 2014 г., 08:40
-- Версия сервера: 5.5.24-log
-- Версия PHP: 5.3.13

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- База данных: `blog_kot`
--

-- --------------------------------------------------------

--
-- Структура таблицы `admin_users`
--

CREATE TABLE IF NOT EXISTS `admin_users` (
  `id_admuser` int(11) NOT NULL AUTO_INCREMENT,
  `nikname_admuser` varchar(50) NOT NULL,
  `date_admuser` datetime NOT NULL,
  `photo_admuser` varchar(255) NOT NULL,
  `fio_admuser` varchar(255) NOT NULL,
  `text_admuser` text NOT NULL,
  `email_admuser` varchar(255) NOT NULL,
  `password_admuser` varchar(255) NOT NULL,
  `rights_admuser` varchar(255) NOT NULL COMMENT 'Просмотр, Редактирование, Добавление, Удаление (№ раздела - V,E,A,D;)',
  `type_admuser` varchar(255) NOT NULL,
  `lastdate_admuser` datetime NOT NULL,
  PRIMARY KEY (`id_admuser`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COMMENT='Администраторы' AUTO_INCREMENT=2 ;

--
-- Дамп данных таблицы `admin_users`
--

INSERT INTO `admin_users` (`id_admuser`, `nikname_admuser`, `date_admuser`, `photo_admuser`, `fio_admuser`, `text_admuser`, `email_admuser`, `password_admuser`, `rights_admuser`, `type_admuser`, `lastdate_admuser`) VALUES
(1, 'godkot', '2014-01-31 00:00:00', '', 'Ашурков Константин', 'Я профессиональный программист, имею высшее образование. В 2006 году закончил Донбасскую Государственную Машиностроительную Академию, кафедра КИТП, специальность инженер программист.', 'godkot@mail.ru', 'osdset', 'ALL', 'root', '2014-01-31 00:00:00');

-- --------------------------------------------------------

--
-- Структура таблицы `blog`
--

CREATE TABLE IF NOT EXISTS `blog` (
  `id_blog` int(11) NOT NULL AUTO_INCREMENT,
  `partition_blog` int(11) NOT NULL,
  `cat_blog` int(11) NOT NULL,
  `type_blog` int(11) NOT NULL,
  `date_blog` datetime NOT NULL,
  `author_blog` int(11) NOT NULL,
  `titletxt_blog` varchar(255) NOT NULL,
  `anons_blog` varchar(255) NOT NULL,
  `text_blog` text NOT NULL,
  `titleimg_blog` varchar(255) NOT NULL,
  `image_blog` varchar(255) NOT NULL,
  `gallery_blog` text NOT NULL,
  `videolink_blog` varchar(255) NOT NULL,
  `videofile_blog` varchar(255) NOT NULL,
  `audiolink_blog` varchar(255) NOT NULL,
  `audiofile_blog` varchar(255) NOT NULL,
  `link_blog` varchar(255) NOT NULL,
  `quote_blog` varchar(255) NOT NULL,
  `related_blog` varchar(255) NOT NULL COMMENT 'Похожие статьи блога (1,2,3)',
  `permalink_blog` varchar(255) NOT NULL,
  `show_blog` int(11) NOT NULL,
  `sort_blog` int(11) NOT NULL,
  `countview_blog` int(11) NOT NULL,
  `tags_blog` varchar(255) NOT NULL,
  `uri_blog` varchar(255) NOT NULL,
  `seotitle_blog` varchar(255) NOT NULL,
  `seokeywords_blog` varchar(255) NOT NULL,
  `seodesc_blog` varchar(255) NOT NULL,
  PRIMARY KEY (`id_blog`),
  KEY `partition_blog` (`partition_blog`),
  KEY `cat_blog` (`cat_blog`),
  KEY `type_blog` (`type_blog`),
  KEY `author_blog` (`author_blog`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='Записи в Блоге' AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Структура таблицы `category_blog`
--

CREATE TABLE IF NOT EXISTS `category_blog` (
  `id_catblog` int(11) NOT NULL AUTO_INCREMENT,
  `partition_catblog` int(11) NOT NULL,
  `title_catblog` varchar(255) NOT NULL,
  `link_catblog` varchar(255) NOT NULL,
  `show_catblog` int(11) NOT NULL,
  `sort_catblog` int(11) NOT NULL,
  PRIMARY KEY (`id_catblog`),
  KEY `partition_catblog` (`partition_catblog`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='Категории Блога' AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Структура таблицы `category_portfolio`
--

CREATE TABLE IF NOT EXISTS `category_portfolio` (
  `id_catport` int(11) NOT NULL AUTO_INCREMENT,
  `partition_catport` int(11) NOT NULL,
  `title_catport` varchar(255) NOT NULL,
  `name_catport` varchar(255) NOT NULL,
  `show_catport` int(11) NOT NULL,
  `sort_catport` int(11) NOT NULL,
  PRIMARY KEY (`id_catport`),
  KEY `partition_catport` (`partition_catport`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='Категории портфолио' AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Структура таблицы `clients`
--

CREATE TABLE IF NOT EXISTS `clients` (
  `id_clients` int(11) NOT NULL AUTO_INCREMENT,
  `date_clients` datetime NOT NULL,
  `title_clients` varchar(255) NOT NULL,
  `text_clients` text NOT NULL,
  `name_clients` varchar(255) NOT NULL,
  `img_clients` varchar(255) NOT NULL,
  `link_clients` varchar(255) NOT NULL,
  `show_clients` int(11) NOT NULL,
  PRIMARY KEY (`id_clients`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='Клиенты на главной' AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Структура таблицы `comment`
--

CREATE TABLE IF NOT EXISTS `comment` (
  `id_comment` int(11) NOT NULL AUTO_INCREMENT,
  `partition_comment` int(11) NOT NULL,
  `idfor_comment` int(11) NOT NULL,
  `iduser_comment` int(11) NOT NULL,
  `date_comment` datetime NOT NULL,
  `text_comment` text NOT NULL,
  `enable_comment` int(11) NOT NULL,
  `show_comment` int(11) NOT NULL,
  PRIMARY KEY (`id_comment`),
  KEY `partition_comment` (`partition_comment`),
  KEY `iduser_comment` (`iduser_comment`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='Комментарии' AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Структура таблицы `contact`
--

CREATE TABLE IF NOT EXISTS `contact` (
  `id_contact` int(11) NOT NULL AUTO_INCREMENT,
  `partition_contact` int(11) NOT NULL,
  `title_contact` varchar(255) NOT NULL,
  `titletxt_contact` varchar(255) NOT NULL,
  `text_contact` text NOT NULL,
  `img_contact` varchar(255) NOT NULL,
  `map_contact` varchar(255) NOT NULL,
  `company_contact` varchar(255) NOT NULL,
  `fio_contact` varchar(255) NOT NULL,
  `adres_contact` varchar(255) NOT NULL,
  `telephone_contact` varchar(255) NOT NULL,
  `email_contact` varchar(255) NOT NULL,
  `countview_contact` int(11) NOT NULL,
  `tags_contact` varchar(255) NOT NULL,
  `uri_contact` varchar(255) NOT NULL,
  `seotitle_contact` varchar(255) NOT NULL,
  `seokeywords_contact` varchar(255) NOT NULL,
  `seodesc_contact` varchar(255) NOT NULL,
  PRIMARY KEY (`id_contact`),
  KEY `partition_contact` (`partition_contact`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='Раздел Контакты' AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Структура таблицы `faq`
--

CREATE TABLE IF NOT EXISTS `faq` (
  `id_faq` int(11) NOT NULL AUTO_INCREMENT,
  `partition_faq` int(11) NOT NULL,
  `question_faq` text NOT NULL,
  `answer_faq` text NOT NULL,
  `show_faq` int(11) NOT NULL,
  `countview_faq` int(11) NOT NULL,
  `tags_faq` varchar(255) NOT NULL,
  `uri_faq` varchar(255) NOT NULL,
  `seotitle_faq` varchar(255) NOT NULL,
  `seokeywords_faq` varchar(255) NOT NULL,
  `seodesc_faq` varchar(255) NOT NULL,
  PRIMARY KEY (`id_faq`),
  KEY `partition_faq` (`partition_faq`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='Вопрос-Ответ' AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Структура таблицы `main_menu`
--

CREATE TABLE IF NOT EXISTS `main_menu` (
  `id_menu` int(11) NOT NULL AUTO_INCREMENT,
  `type_menu` varchar(255) NOT NULL,
  `title_menu` varchar(255) NOT NULL,
  `link_menu` varchar(255) NOT NULL,
  `level_menu` int(11) NOT NULL,
  `idsub_menu` varchar(255) NOT NULL,
  `show_menu` int(11) NOT NULL,
  `sort_menu` int(11) NOT NULL,
  PRIMARY KEY (`id_menu`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COMMENT='Главное меню' AUTO_INCREMENT=7 ;

--
-- Дамп данных таблицы `main_menu`
--

INSERT INTO `main_menu` (`id_menu`, `type_menu`, `title_menu`, `link_menu`, `level_menu`, `idsub_menu`, `show_menu`, `sort_menu`) VALUES
(1, 'main', 'Главная', 'Site/main/', 0, '2,3', 1, 1),
(2, 'testimonials', 'Рекомендации', 'Site/testimonials/', 1, '', 1, 1),
(3, 'faq', 'Вопросы', 'Site/faq/', 1, '', 1, 2),
(4, 'blog', 'Блог', 'Site/blog/', 0, '', 1, 2),
(5, 'works', 'Работы', 'Site/works/', 0, '', 1, 3),
(6, 'contact', 'Контакты', 'Site/contact/', 0, '', 1, 4);

-- --------------------------------------------------------

--
-- Структура таблицы `partition`
--

CREATE TABLE IF NOT EXISTS `partition` (
  `id_partition` int(11) NOT NULL AUTO_INCREMENT,
  `title_partition` varchar(255) NOT NULL,
  `type_partition` int(11) NOT NULL,
  `idmenu_partition` int(11) NOT NULL,
  `show_partition` int(11) NOT NULL,
  `countview_partition` int(11) NOT NULL,
  `date_partition` datetime NOT NULL,
  `author_partition` int(11) NOT NULL,
  `password_partition` varchar(255) NOT NULL,
  `tags_partition` varchar(255) NOT NULL,
  `uri_partition` varchar(255) NOT NULL,
  `seotitle_partition` varchar(255) NOT NULL,
  `seokeywords_partition` varchar(255) NOT NULL,
  `seodesc_partition` varchar(255) NOT NULL,
  PRIMARY KEY (`id_partition`),
  KEY `type_partition` (`type_partition`),
  KEY `author_partition` (`author_partition`),
  KEY `idmenu_partition` (`idmenu_partition`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COMMENT='Разделы сайта' AUTO_INCREMENT=3 ;

--
-- Дамп данных таблицы `partition`
--

INSERT INTO `partition` (`id_partition`, `title_partition`, `type_partition`, `idmenu_partition`, `show_partition`, `countview_partition`, `date_partition`, `author_partition`, `password_partition`, `tags_partition`, `uri_partition`, `seotitle_partition`, `seokeywords_partition`, `seodesc_partition`) VALUES
(2, 'Главная страница', 1, 1, 1, 0, '2014-01-31 00:00:00', 1, 'osdset', 'HTML5, CSS3, JAVASCRIPT, JQUERY,AJAX, PHP, MYSQL, CMS, JOOMLA, WORDPRESS, DRUPAL, OPENCART, FRAMEWORK, CODEIGNITER, YII', 'site/index/', 'Ашурков К.К - WEB РАЗРАБОТЧИК', 'HTML5, CSS3, JAVASCRIPT, JQUERY,AJAX, PHP, MYSQL, CMS, JOOMLA, WORDPRESS, DRUPAL, OPENCART, FRAMEWORK, CODEIGNITER, YII', 'WEB РАЗРАБОТЧИК HTML5&CSS3, JAVASCRIPT(JQUERY,AJAX), PHP5&MYSQL FRAMEWORK: CODEIGNITER, YII Доверьте мне разработку Вашего проекта и я сделаю Вам современный сайт.');

-- --------------------------------------------------------

--
-- Структура таблицы `portfolio`
--

CREATE TABLE IF NOT EXISTS `portfolio` (
  `id_portfolio` int(11) NOT NULL AUTO_INCREMENT,
  `partition_portfolio` int(11) NOT NULL,
  `category_portfolio` int(11) NOT NULL,
  `type_portfolio` int(11) NOT NULL,
  `titletxt_portfolio` varchar(255) NOT NULL,
  `anons_portfolio` varchar(255) NOT NULL,
  `titleimg_portfolio` varchar(255) NOT NULL,
  `client_portfolio` varchar(255) NOT NULL,
  `date_portfolio` datetime NOT NULL,
  `info_portfolio` varchar(255) NOT NULL,
  `link_portfolio` varchar(255) NOT NULL,
  `text_portfolio` text NOT NULL,
  `photo_portfolio` varchar(255) NOT NULL,
  `show_portfolio` int(11) NOT NULL,
  `sort_portfolio` int(11) NOT NULL,
  `countview_portfolio` int(11) NOT NULL,
  `tags_portfolio` varchar(255) NOT NULL,
  `uri_portfolio` varchar(255) NOT NULL,
  `seotitle_portfolio` varchar(255) NOT NULL,
  `seokeywords_portfolio` varchar(255) NOT NULL,
  `seodesc_portfolio` varchar(255) NOT NULL,
  PRIMARY KEY (`id_portfolio`),
  KEY `partition_portfolio` (`partition_portfolio`),
  KEY `category_portfolio` (`category_portfolio`),
  KEY `type_portfolio` (`type_portfolio`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='Работы в портфолио' AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Структура таблицы `skills`
--

CREATE TABLE IF NOT EXISTS `skills` (
  `id_skills` int(11) NOT NULL AUTO_INCREMENT,
  `title_skills` varchar(255) NOT NULL,
  `value_skills` int(11) NOT NULL,
  `show_skills` int(11) NOT NULL,
  PRIMARY KEY (`id_skills`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='Умения на главной' AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Структура таблицы `testimonials`
--

CREATE TABLE IF NOT EXISTS `testimonials` (
  `id_testimonials` int(11) NOT NULL AUTO_INCREMENT,
  `partition_testimonials` int(11) NOT NULL,
  `title_testimonials` varchar(255) NOT NULL,
  `anons_testimonials` varchar(255) NOT NULL,
  `body_testimonials` text NOT NULL,
  `img_testimonials` varchar(255) NOT NULL,
  `author_testimonials` varchar(255) NOT NULL,
  `link_testimonials` varchar(255) NOT NULL,
  `show_testimonials` int(11) NOT NULL,
  `countview_testimonials` int(11) NOT NULL,
  `tags_testimonials` varchar(255) NOT NULL,
  `uri_testimonials` varchar(255) NOT NULL,
  `seotitle_testimonials` varchar(255) NOT NULL,
  `seokeywords_testimonials` varchar(255) NOT NULL,
  `seodesc_testimonials` varchar(255) NOT NULL,
  PRIMARY KEY (`id_testimonials`),
  KEY `partition_testimonials` (`partition_testimonials`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='Раздел Рекомендации' AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Структура таблицы `text`
--

CREATE TABLE IF NOT EXISTS `text` (
  `id_text` int(11) NOT NULL AUTO_INCREMENT,
  `partition_text` int(11) NOT NULL,
  `title_text` varchar(255) NOT NULL,
  `anons_text` text NOT NULL,
  `body_text` text NOT NULL,
  `img_text` varchar(255) NOT NULL,
  `show_text` int(11) NOT NULL,
  `countview_text` int(11) NOT NULL,
  `tags_text` varchar(255) NOT NULL,
  `uri_text` varchar(255) NOT NULL,
  `seotitle_text` varchar(255) NOT NULL,
  `seokeywords_text` varchar(255) NOT NULL,
  `seodesc_text` varchar(255) NOT NULL,
  PRIMARY KEY (`id_text`),
  KEY `partition_text` (`partition_text`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COMMENT='Текстовый раздел' AUTO_INCREMENT=6 ;

--
-- Дамп данных таблицы `text`
--

INSERT INTO `text` (`id_text`, `partition_text`, `title_text`, `anons_text`, `body_text`, `img_text`, `show_text`, `countview_text`, `tags_text`, `uri_text`, `seotitle_text`, `seokeywords_text`, `seodesc_text`) VALUES
(1, 2, 'ОБО МНЕ', '<p>Я профессиональный программист, имею высшее образование.\n                                            В 2006 году закончил Донбасскую Государственную Машиностроительную Академию, кафедра <abbr title="Компьютерные Информационные Технологии Проектирования">КИТП</abbr>, специальность инженер программист.</p>', 'Я профессиональный программист, имею высшее образование. В 2006 году закончил Донбасскую Государственную Машиностроительную Академию, кафедра КИТП, специальность инженер программист.', 'images/iconSweets/icon-1.png', 1, 0, 'ОБО МНЕ', '/site/index/about', 'ОБО МНЕ', '', ''),
(2, 2, 'MERKURYII 3.1', '<p>Мой опыт разработки web-проектов, позволил мне понять, что необходимо заказчику для простого и удобного администрирования сайта. Я разработал собственную <abbr title="система управления содержимым">CMS</abbr> на базе frameworka Yii.</p>', 'Мой опыт разработки web-проектов, позволил мне понять, что необходимо заказчику для простого и удобного администрирования сайта. Я разработал собственную CMS на базе frameworka Yii.', 'images/iconSweets/icon-2.png', 1, 0, 'MERKURYII 3.1', '/site/index/merkuryii', 'MERKURYII 3.1', 'MERKURYII 3.1', 'MERKURYII 3.1'),
(3, 2, 'ПРЕИМУЩЕСТВА', '<p>Правильная семантика HTML5. <br> <abbr title="Ваш сайт будет правильно отображаться на всех устройствах (телефон, планшет, ПК)">Адаптивный дизайн.</abbr> <br> <abbr title="Если сайт на EasyLink">Простая, удобная админка.</abbr> <br> Разработка на FrameWork Yii <br> Тестирование безопасности сайта <br> Бессрочная поддержка сайта</p>', '', 'images/iconSweets/icon-4.png', 1, 0, 'ПРЕИМУЩЕСТВА', '/site/index/advantages', 'ПРЕИМУЩЕСТВА', 'ПРЕИМУЩЕСТВА', 'ПРЕИМУЩЕСТВА'),
(4, 2, 'ПОЧЕМУ Я!', '<p>Я несколько лет работал в профессиональной <strong>WEB - студии</strong>, прошел все этапы разработки сайтов. В один момент я решил работать <strong>самостоятельно</strong>, в этом я вижу больше плюсов, как для меня так и для моих клиентов. Я практически всегда работаю один и только я отвечаю за <strong>конечный результат</strong>. Я полностью концентрируюсь на новом проекте и ни кто меня не отвлекает. Я готов предложить Вам четкие <a title="Этапы разработки проекта" href="#">этапы разработки проекта.</a></p>\n\n                                <p>WEB студии сейчас в основном превратились в <strong>посредников</strong>. Менеджеров в студии работает больше чем программистов и дизайнеров. Они оценят Вас и Ваш проект и скажут Вам сумму которая к разработке проекта не имеет ни какого отнашения. Они найдут <strong>исполнителя</strong>, который за небольшую сумму выполнит весь заказ. Часто исполнители это студенты не имеющие опыта в разработке сайтов. От этого страдает качество сайта.</p>\n                                <p>Я предлагаю Вам <strong>прозрачные отношения</strong>. Я являюсь <strong>разработчиком</strong>, а не менеджером. Я всегда на связи со своими клиентами. Вы сможете <strong>следить за разработкой</strong> сайта на моем сервере. Я дорожу <strong>репутацией</strong> и поэтому стараюсь делать <strong>качественные сайты.</strong></p>', 'Я несколько лет работал в профессиональной WEB - студии, прошел все этапы разработки сайтов. В один момент я решил работать самостоятельно, в этом я вижу больше плюсов, как для меня так и для моих клиентов. Я практически всегда работаю один и только я отвечаю за конечный результат. Я полностью концентрируюсь на новом проекте и ни кто меня не отвлекает. Я готов предложить Вам четкие этапы разработки проекта.\r\n\r\nWEB студии сейчас в основном превратились в посредников. Менеджеров в студии работает больше чем программистов и дизайнеров. Они оценят Вас и Ваш проект и скажут Вам сумму которая к разработке проекта не имеет ни какого отнашения. Они найдут исполнителя, который за небольшую сумму выполнит весь заказ. Часто исполнители это студенты не имеющие опыта в разработке сайтов. От этого страдает качество сайта.\r\n\r\nЯ предлагаю Вам прозрачные отношения. Я являюсь разработчиком, а не менеджером. Я всегда на связи со своими клиентами. Вы сможете следить за разработкой сайта на моем сервере. Я дорожу репутацией и поэтому стараюсь делать качественные сайты.', '', 1, 1, '', '', '', '', ''),
(5, 2, 'АДАПТИВНЫЙ ДИЗАЙН', '<p>В последнее время интернет динамично развивается и становится все больше различных гаджетов с доступом в интернет (телефоны, планшеты, автомагнитолы, ТВ и т.д.). Я разрабатываю сайты адаптированные под различные разрешения, размер и орентацию экрана устройств. Сайт будет корректно и удобно отображаться и на маленьком экране мобильного телефона, и на большом экране телевизора. <br> Посмотрите как отображается мой сайт на разных устройствах - <a target="_blank" title="Проверка адаптивного дизайна" href="http://responsivetest.net/#u=http://livedemo00.template-help.com/wordpress_43885/">ПРОВЕРИТЬ</a></p>', 'В последнее время интернет динамично развивается и становится все больше различных гаджетов с доступом в интернет (телефоны, планшеты, автомагнитолы, ТВ и т.д.). Я разрабатываю сайты адаптированные под различные разрешения, размер и орентацию экрана устройств. Сайт будет корректно и удобно отображаться и на маленьком экране мобильного телефона, и на большом экране телевизора. \r\nПосмотрите как отображается мой сайт на разных устройствах - ПРОВЕРИТЬ', 'images/responsive2.png', 1, 1, 'АДАПТИВНЫЙ ДИЗАЙН', '', 'АДАПТИВНЫЙ ДИЗАЙН', 'АДАПТИВНЫЙ ДИЗАЙН', 'АДАПТИВНЫЙ ДИЗАЙН');

-- --------------------------------------------------------

--
-- Структура таблицы `type_blog`
--

CREATE TABLE IF NOT EXISTS `type_blog` (
  `id_typeblog` int(11) NOT NULL AUTO_INCREMENT,
  `title_typeblog` varchar(255) NOT NULL,
  `name_typeblog` varchar(255) NOT NULL,
  `show_typeblog` int(11) NOT NULL,
  `sort_typeblog` int(11) NOT NULL,
  PRIMARY KEY (`id_typeblog`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='Тип записи в Блоге' AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Структура таблицы `type_partition`
--

CREATE TABLE IF NOT EXISTS `type_partition` (
  `id_typepart` int(11) NOT NULL AUTO_INCREMENT,
  `title_typepart` varchar(255) NOT NULL,
  `name_typepart` varchar(255) NOT NULL,
  `show_typepart` int(11) NOT NULL,
  `sort_typepart` int(11) NOT NULL,
  PRIMARY KEY (`id_typepart`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COMMENT='Типы Разделов сайта (Текст, Блог, Галерея)' AUTO_INCREMENT=8 ;

--
-- Дамп данных таблицы `type_partition`
--

INSERT INTO `type_partition` (`id_typepart`, `title_typepart`, `name_typepart`, `show_typepart`, `sort_typepart`) VALUES
(1, 'Главная', 'main', 1, 1),
(2, 'Блог', 'blog', 1, 2),
(3, 'Портфолио', 'works', 1, 3),
(4, 'Контакты', 'contact', 1, 4),
(5, 'Рекомендации', 'testimonials', 1, 5),
(6, 'Вопрос-Ответ', 'faq', 1, 6),
(7, 'Текст', 'text', 1, 7);

-- --------------------------------------------------------

--
-- Структура таблицы `type_portfolio`
--

CREATE TABLE IF NOT EXISTS `type_portfolio` (
  `id_typeport` int(11) NOT NULL AUTO_INCREMENT,
  `title_typeport` varchar(255) NOT NULL,
  `name_typeport` varchar(255) NOT NULL,
  `show_typeport` int(11) NOT NULL,
  `sort_typeport` int(11) NOT NULL,
  PRIMARY KEY (`id_typeport`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='Тип работы в портфолио (Видео, Аудио, Слайдер)' AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Структура таблицы `users_statistic`
--

CREATE TABLE IF NOT EXISTS `users_statistic` (
  `id_userstat` int(11) NOT NULL AUTO_INCREMENT,
  `ip_userstat` varchar(255) NOT NULL,
  `name_userstat` varchar(255) NOT NULL,
  `email_userstat` varchar(255) NOT NULL,
  `web_userstat` varchar(255) NOT NULL,
  `photo_userstat` varchar(255) NOT NULL,
  `fierstdate_userstat` datetime NOT NULL,
  `lastdate_userstat` datetime NOT NULL,
  `view_userstat` varchar(255) NOT NULL COMMENT '(№ раздела - кол. просмотров;)',
  `countview_userstat` int(11) NOT NULL,
  `new_userstat` int(11) NOT NULL,
  PRIMARY KEY (`id_userstat`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='Статистика пользователей' AUTO_INCREMENT=1 ;

--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `blog`
--
ALTER TABLE `blog`
  ADD CONSTRAINT `blog_ibfk_1` FOREIGN KEY (`partition_blog`) REFERENCES `partition` (`id_partition`) ON UPDATE CASCADE,
  ADD CONSTRAINT `blog_ibfk_2` FOREIGN KEY (`cat_blog`) REFERENCES `category_blog` (`id_catblog`) ON UPDATE CASCADE,
  ADD CONSTRAINT `blog_ibfk_3` FOREIGN KEY (`type_blog`) REFERENCES `type_blog` (`id_typeblog`) ON UPDATE CASCADE,
  ADD CONSTRAINT `blog_ibfk_4` FOREIGN KEY (`author_blog`) REFERENCES `admin_users` (`id_admuser`) ON UPDATE CASCADE;

--
-- Ограничения внешнего ключа таблицы `category_blog`
--
ALTER TABLE `category_blog`
  ADD CONSTRAINT `category_blog_ibfk_1` FOREIGN KEY (`partition_catblog`) REFERENCES `partition` (`id_partition`) ON UPDATE CASCADE;

--
-- Ограничения внешнего ключа таблицы `category_portfolio`
--
ALTER TABLE `category_portfolio`
  ADD CONSTRAINT `category_portfolio_ibfk_1` FOREIGN KEY (`partition_catport`) REFERENCES `partition` (`id_partition`) ON UPDATE CASCADE;

--
-- Ограничения внешнего ключа таблицы `comment`
--
ALTER TABLE `comment`
  ADD CONSTRAINT `comment_ibfk_1` FOREIGN KEY (`partition_comment`) REFERENCES `partition` (`id_partition`) ON UPDATE CASCADE,
  ADD CONSTRAINT `comment_ibfk_2` FOREIGN KEY (`iduser_comment`) REFERENCES `users_statistic` (`id_userstat`) ON UPDATE CASCADE;

--
-- Ограничения внешнего ключа таблицы `contact`
--
ALTER TABLE `contact`
  ADD CONSTRAINT `contact_ibfk_1` FOREIGN KEY (`partition_contact`) REFERENCES `partition` (`id_partition`) ON UPDATE CASCADE;

--
-- Ограничения внешнего ключа таблицы `faq`
--
ALTER TABLE `faq`
  ADD CONSTRAINT `faq_ibfk_1` FOREIGN KEY (`partition_faq`) REFERENCES `partition` (`id_partition`) ON UPDATE CASCADE;

--
-- Ограничения внешнего ключа таблицы `partition`
--
ALTER TABLE `partition`
  ADD CONSTRAINT `partition_ibfk_1` FOREIGN KEY (`type_partition`) REFERENCES `type_partition` (`id_typepart`) ON UPDATE CASCADE,
  ADD CONSTRAINT `partition_ibfk_2` FOREIGN KEY (`idmenu_partition`) REFERENCES `main_menu` (`id_menu`) ON UPDATE CASCADE,
  ADD CONSTRAINT `partition_ibfk_3` FOREIGN KEY (`author_partition`) REFERENCES `admin_users` (`id_admuser`) ON UPDATE CASCADE;

--
-- Ограничения внешнего ключа таблицы `portfolio`
--
ALTER TABLE `portfolio`
  ADD CONSTRAINT `portfolio_ibfk_1` FOREIGN KEY (`partition_portfolio`) REFERENCES `partition` (`id_partition`) ON UPDATE CASCADE,
  ADD CONSTRAINT `portfolio_ibfk_2` FOREIGN KEY (`category_portfolio`) REFERENCES `category_portfolio` (`id_catport`) ON UPDATE CASCADE,
  ADD CONSTRAINT `portfolio_ibfk_3` FOREIGN KEY (`type_portfolio`) REFERENCES `type_portfolio` (`id_typeport`) ON UPDATE CASCADE;

--
-- Ограничения внешнего ключа таблицы `testimonials`
--
ALTER TABLE `testimonials`
  ADD CONSTRAINT `testimonials_ibfk_1` FOREIGN KEY (`partition_testimonials`) REFERENCES `partition` (`id_partition`) ON UPDATE CASCADE;

--
-- Ограничения внешнего ключа таблицы `text`
--
ALTER TABLE `text`
  ADD CONSTRAINT `text_ibfk_1` FOREIGN KEY (`partition_text`) REFERENCES `partition` (`id_partition`) ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
