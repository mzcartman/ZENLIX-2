# ************************************************************
# Sequel Pro SQL dump
# Версия 3408
#
# http://www.sequelpro.com/
# http://code.google.com/p/sequel-pro/
#
# Адрес: 127.0.0.1 (MySQL 5.6.16)
# Схема: hd_prod
# Время создания: 2014-10-12 15:21:40 +0000
# ************************************************************


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


# Дамп таблицы approved_info
# ------------------------------------------------------------

DROP TABLE IF EXISTS `approved_info`;

CREATE TABLE `approved_info` (
  `id` int(8) NOT NULL AUTO_INCREMENT,
  `fio` varchar(256) DEFAULT NULL,
  `login` varchar(256) DEFAULT NULL,
  `tel` varchar(256) DEFAULT NULL,
  `unit_desc` varchar(1024) DEFAULT NULL,
  `adr` varchar(256) DEFAULT NULL,
  `email` varchar(256) DEFAULT NULL,
  `posada` varchar(256) DEFAULT NULL,
  `user_from` int(11) DEFAULT NULL,
  `date_app` datetime DEFAULT NULL,
  `client_id` int(11) DEFAULT NULL,
  `skype` varchar(256) DEFAULT NULL,
  `type_op` varchar(256) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id` (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;

DROP TABLE IF EXISTS `messages`;

CREATE TABLE `messages` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `user_from` int(11) DEFAULT NULL,
  `user_to` int(11) DEFAULT NULL,
  `date_op` datetime DEFAULT NULL,
  `msg` varchar(4096) DEFAULT '',
  `type_msg` varchar(128) NOT NULL DEFAULT 'main',
  `is_read` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=24 DEFAULT CHARSET=utf8;


# Дамп таблицы comments
# ------------------------------------------------------------

DROP TABLE IF EXISTS `comments`;

CREATE TABLE `comments` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `t_id` int(11) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `comment_text` varchar(2048) DEFAULT NULL,
  `dt` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;



# Дамп таблицы deps
# ------------------------------------------------------------

DROP TABLE IF EXISTS `deps`;

CREATE TABLE `deps` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(1024) DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

LOCK TABLES `deps` WRITE;
/*!40000 ALTER TABLE `deps` DISABLE KEYS */;

INSERT INTO `deps` (`id`, `name`, `status`)
VALUES
	(1,'Отдел WEB-разработки',1),
	(2,'Сектор хостинга',1),
	(3,'Отдел SEO, рекламы и маркетинга',0),
	(4,'Отдел безопастности сети',1),
	(5,'Отдел поддержки пользователей',1);

/*!40000 ALTER TABLE `deps` ENABLE KEYS */;
UNLOCK TABLES;


# Дамп таблицы files
# ------------------------------------------------------------

DROP TABLE IF EXISTS `files`;

CREATE TABLE `files` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `ticket_hash` varchar(512) DEFAULT NULL,
  `original_name` varchar(512) DEFAULT NULL,
  `file_hash` varchar(512) DEFAULT NULL,
  `file_type` varchar(512) DEFAULT NULL,
  `file_size` int(11) DEFAULT NULL,
  `file_ext` varchar(12) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;



# Дамп таблицы helper
# ------------------------------------------------------------

DROP TABLE IF EXISTS `helper`;

CREATE TABLE `helper` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `user_init_id` int(128) DEFAULT NULL,
  `unit_to_id` varchar(11) DEFAULT NULL,
  `dt` datetime DEFAULT NULL,
  `title` varchar(1024) DEFAULT NULL,
  `message` longtext,
  `hashname` varchar(512) DEFAULT NULL,
  `client_flag` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;



# Дамп таблицы notes
# ------------------------------------------------------------

DROP TABLE IF EXISTS `notes`;

CREATE TABLE `notes` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `hashname` varchar(512) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `message` longtext,
  `dt` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

DROP TABLE IF EXISTS `news`;
CREATE TABLE `news` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `date_op` datetime DEFAULT NULL,
  `msg` varchar(512) CHARACTER SET latin1 DEFAULT NULL,
  `init_user_id` int(11) DEFAULT NULL,
  `target_user` varchar(128) DEFAULT NULL,
  `ticket_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=10 DEFAULT CHARSET=utf8;


DROP TABLE IF EXISTS `notification_msg_pool`;

CREATE TABLE `notification_msg_pool` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `delivers_id` varchar(512) DEFAULT NULL,
  `type_op` varchar(512) DEFAULT NULL,
  `ticket_id` int(11) DEFAULT NULL,
  `dt` datetime DEFAULT NULL,
  `chat_msg_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=56 DEFAULT CHARSET=utf8;



# Дамп таблицы notification_pool
# ------------------------------------------------------------

DROP TABLE IF EXISTS `notification_pool`;

CREATE TABLE `notification_pool` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `delivers_id` varchar(512) DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT '0',
  `type_op` varchar(512) DEFAULT NULL,
  `ticket_id` int(11) DEFAULT NULL,
  `dt` datetime DEFAULT NULL,
  `chat_msg_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;



# Дамп таблицы perf
# ------------------------------------------------------------

DROP TABLE IF EXISTS `perf`;

CREATE TABLE `perf` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `param` varchar(512) NOT NULL DEFAULT '',
  `value` varchar(512) NOT NULL DEFAULT '',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

LOCK TABLES `perf` WRITE;
/*!40000 ALTER TABLE `perf` DISABLE KEYS */;

INSERT INTO `perf` (`id`, `param`, `value`)
VALUES
	(1,'title_header','ZENLIX'),
	(2,'hostname','localhost/web/ZENLIX/'),
	(3,'mail','info@it.domain'),
	(4,'days2arch','3'),
	(5,'name_of_firm','ZENLIX'),
	(6,'fix_subj','true'),
	(7,'first_login','false'),
	(8,'file_uploads','true'),
	(9,'debug_mode','false'),
	(10,'mail_active','true'),
	(11,'mail_host','smtp.gmail.com'),
	(12,'mail_port','587'),
	(13,'mail_auth','true'),
	(14,'mail_auth_type','tls'),
	(15,'mail_username','it@mail.gmail'),
	(16,'mail_password','pass'),
	(17,'mail_from','it@mail.gmail'),
	(18,'mail_debug','false'),
	(19,'mail_type','sendmail'),
	(20,'file_types','gif|jpe?g|png|doc|xls|rtf|pdf|zip|rar|bmp|docx|xlsx'),
	(21,'file_size','2097152'),
	(22,'pb_api','api'),
	(23,'ldap_ip','ip'),
	(24,'ldap_domain','ldap.local'),
	(25,'version','2.0'),
	(26,'node_port','8080'),
  (27,'time_zone','Europe/Kiev');

/*!40000 ALTER TABLE `perf` ENABLE KEYS */;
UNLOCK TABLES;


# Дамп таблицы posada
# ------------------------------------------------------------

DROP TABLE IF EXISTS `posada`;

CREATE TABLE `posada` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(512) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

LOCK TABLES `posada` WRITE;
/*!40000 ALTER TABLE `posada` DISABLE KEYS */;

INSERT INTO `posada` (`id`, `name`)
VALUES
	(1,'администратор'),
	(2,'координатор');

/*!40000 ALTER TABLE `posada` ENABLE KEYS */;
UNLOCK TABLES;


# Дамп таблицы subj
# ------------------------------------------------------------

DROP TABLE IF EXISTS `subj`;

CREATE TABLE `subj` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(512) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

LOCK TABLES `subj` WRITE;
/*!40000 ALTER TABLE `subj` DISABLE KEYS */;

INSERT INTO `subj` (`id`, `name`)
VALUES
	(25,'Система'),
	(28,'Интернет и локальная сеть'),
	(30,'Телефония'),
	(31,'Другое'),
	(32,'Компьютеры и переферия'),
	(33,'Принтеры (обслуживание)'),
	(35,'Видеонаблюдение'),
	(36,'Установка ПО');

/*!40000 ALTER TABLE `subj` ENABLE KEYS */;
UNLOCK TABLES;


# Дамп таблицы ticket_log
# ------------------------------------------------------------

DROP TABLE IF EXISTS `ticket_log`;

CREATE TABLE `ticket_log` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `date_op` datetime DEFAULT NULL,
  `msg` varchar(512) CHARACTER SET latin1 DEFAULT NULL,
  `init_user_id` int(11) DEFAULT NULL,
  `to_user_id` varchar(128) DEFAULT NULL,
  `ticket_id` int(11) DEFAULT NULL,
  `to_unit_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;



# Дамп таблицы tickets
# ------------------------------------------------------------

DROP TABLE IF EXISTS `tickets`;

CREATE TABLE `tickets` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `user_init_id` int(11) DEFAULT NULL,
  `user_to_id` varchar(11) DEFAULT NULL,
  `date_create` datetime DEFAULT NULL,
  `subj` varchar(512) DEFAULT NULL,
  `msg` longtext,
  `client_id` int(11) DEFAULT NULL,
  `unit_id` int(11) DEFAULT NULL,
  `status` int(11) DEFAULT '0',
  `hash_name` varchar(512) DEFAULT NULL,
  `comment` varchar(1024) DEFAULT NULL,
  `arch` int(11) DEFAULT '0',
  `is_read` int(11) DEFAULT '0',
  `lock_by` int(11) DEFAULT '0',
  `last_edit` datetime DEFAULT NULL,
  `ok_by` int(11) DEFAULT '0',
  `prio` int(4) NOT NULL DEFAULT '0',
  `ok_date` datetime NOT NULL,
  `last_update` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;



# Дамп таблицы units
# ------------------------------------------------------------

DROP TABLE IF EXISTS `units`;

CREATE TABLE `units` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(512) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

LOCK TABLES `units` WRITE;
/*!40000 ALTER TABLE `units` DISABLE KEYS */;

INSERT INTO `units` (`id`, `name`)
VALUES
	(1,'Бухгалтерия'),
	(2,'Кадры');

/*!40000 ALTER TABLE `units` ENABLE KEYS */;
UNLOCK TABLES;


# Дамп таблицы users
# ------------------------------------------------------------

DROP TABLE IF EXISTS `users`;

CREATE TABLE `users` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `fio` varchar(512) DEFAULT NULL,
  `login` varchar(64) NOT NULL DEFAULT '',
  `pass` varchar(64) NOT NULL DEFAULT '',
  `status` int(11) NOT NULL DEFAULT '1',
  `priv` int(11) DEFAULT '0',
  `unit` varchar(11) NOT NULL DEFAULT '0',
  `is_admin` int(4) NOT NULL DEFAULT '0',
  `is_client` int(4) NOT NULL DEFAULT '0',
  `email` varchar(128) DEFAULT NULL,
  `messages` varchar(2048) NOT NULL DEFAULT '',
  `lang` varchar(11) NOT NULL DEFAULT 'ru',
  `priv_add_client` int(11) NOT NULL DEFAULT '1',
  `priv_edit_client` int(11) NOT NULL DEFAULT '1',
  `last_time` datetime DEFAULT NULL,
  `ldap_key` int(11) NOT NULL DEFAULT '0',
  `pb` varchar(512) DEFAULT NULL,
  `messages_title` varchar(2048) NOT NULL DEFAULT '',
  `usr_img` varchar(512) DEFAULT NULL,
  `uniq_id` varchar(512) DEFAULT NULL,
  `posada` varchar(512) DEFAULT NULL,
  `tel` varchar(512) DEFAULT NULL,
  `skype` varchar(512) DEFAULT NULL,
  `unit_desc` varchar(1024) DEFAULT NULL,
  `adr` varchar(1024) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=16 DEFAULT CHARSET=utf8;

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;

INSERT INTO `users` (`id`, `fio`, `login`, `pass`, `status`, `priv`, `unit`, `is_admin`, `is_client`, `email`, `messages`, `lang`, `priv_add_client`, `priv_edit_client`, `last_time`, `ldap_key`, `pb`, `messages_title`, `usr_img`, `uniq_id`, `posada`, `tel`, `skype`, `unit_desc`, `adr`)
VALUES
	(1, 'System Account', 'system', '81dc9bdb52d04dc20036dbd8313ed055', 1, 2, '1,2,3', 8, 0, '', 'Это необходимо для того, что бы знать кто её выполняет и не происходили дубликаты выполнения одной и той же задачи.', 'ru', 1, 1, '2014-10-23 15:23:49', 0, '', 'Пожалуйста, не забывайте блокировать заявки!', '', '7371a131b959f3527cbde59f0e5caf96', '', '', 'rustem_ck', '', '');


/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;



/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
