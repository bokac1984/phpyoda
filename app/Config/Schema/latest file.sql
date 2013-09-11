DROP TABLE IF EXISTS `phpyoda`.`abouts`;
DROP TABLE IF EXISTS `phpyoda`.`acos`;
DROP TABLE IF EXISTS `phpyoda`.`aros`;
DROP TABLE IF EXISTS `phpyoda`.`aros_acos`;
DROP TABLE IF EXISTS `phpyoda`.`comments`;
DROP TABLE IF EXISTS `phpyoda`.`contacts`;
DROP TABLE IF EXISTS `phpyoda`.`groups`;
DROP TABLE IF EXISTS `phpyoda`.`portfolios`;
DROP TABLE IF EXISTS `phpyoda`.`portfolios_tags`;
DROP TABLE IF EXISTS `phpyoda`.`posts`;
DROP TABLE IF EXISTS `phpyoda`.`tags`;
DROP TABLE IF EXISTS `phpyoda`.`users`;


CREATE TABLE `phpyoda`.`abouts` (
	`id` int(11) NOT NULL AUTO_INCREMENT,
	`text` text CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,	PRIMARY KEY  (`id`)) 	DEFAULT CHARSET=latin1,
	COLLATE=latin1_swedish_ci,
	ENGINE=InnoDB;

CREATE TABLE `phpyoda`.`acos` (
	`id` int(10) NOT NULL AUTO_INCREMENT,
	`parent_id` int(10) DEFAULT NULL,
	`model` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
	`foreign_key` int(10) DEFAULT NULL,
	`alias` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
	`lft` int(10) DEFAULT NULL,
	`rght` int(10) DEFAULT NULL,	PRIMARY KEY  (`id`)) 	DEFAULT CHARSET=latin1,
	COLLATE=latin1_swedish_ci,
	ENGINE=InnoDB;

CREATE TABLE `phpyoda`.`aros` (
	`id` int(10) NOT NULL AUTO_INCREMENT,
	`parent_id` int(10) DEFAULT NULL,
	`model` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
	`foreign_key` int(10) DEFAULT NULL,
	`alias` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
	`lft` int(10) DEFAULT NULL,
	`rght` int(10) DEFAULT NULL,	PRIMARY KEY  (`id`)) 	DEFAULT CHARSET=latin1,
	COLLATE=latin1_swedish_ci,
	ENGINE=InnoDB;

CREATE TABLE `phpyoda`.`aros_acos` (
	`id` int(10) NOT NULL AUTO_INCREMENT,
	`aro_id` int(10) NOT NULL,
	`aco_id` int(10) NOT NULL,
	`_create` varchar(2) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT '0' NOT NULL,
	`_read` varchar(2) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT '0' NOT NULL,
	`_update` varchar(2) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT '0' NOT NULL,
	`_delete` varchar(2) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT '0' NOT NULL,	PRIMARY KEY  (`id`),
	UNIQUE KEY `ARO_ACO_KEY` (`aro_id`, `aco_id`)) 	DEFAULT CHARSET=latin1,
	COLLATE=latin1_swedish_ci,
	ENGINE=InnoDB;

CREATE TABLE `phpyoda`.`comments` (
	`id` int(11) NOT NULL AUTO_INCREMENT,
	`post_id` int(11) NOT NULL,
	`text` text CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,	PRIMARY KEY  (`id`)) 	DEFAULT CHARSET=latin1,
	COLLATE=latin1_swedish_ci,
	ENGINE=InnoDB;

CREATE TABLE `phpyoda`.`contacts` (
	`id` int(11) NOT NULL AUTO_INCREMENT,
	`name` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
	`email` varchar(150) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
	`message` text CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
	`ip_address` varchar(200) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
	`read` int(4) NOT NULL,
	`created` datetime NOT NULL,	PRIMARY KEY  (`id`)) 	DEFAULT CHARSET=latin1,
	COLLATE=latin1_swedish_ci,
	ENGINE=InnoDB;

CREATE TABLE `phpyoda`.`groups` (
	`id` int(11) NOT NULL AUTO_INCREMENT,
	`group_name` varchar(80) CHARACTER SET utf8 COLLATE utf8_bin DEFAULT NULL,
	`created` datetime NOT NULL,
	`modified` timestamp NULL,	PRIMARY KEY  (`id`)) 	DEFAULT CHARSET=utf8,
	COLLATE=utf8_bin,
	ENGINE=InnoDB;

CREATE TABLE `phpyoda`.`portfolios` (
	`id` int(11) NOT NULL AUTO_INCREMENT,
	`screen_shot` varchar(150) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
	`project_name` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
	`technologies` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
	`description` text CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
	`order` int(11) NOT NULL,	PRIMARY KEY  (`id`)) 	DEFAULT CHARSET=latin1,
	COLLATE=latin1_swedish_ci,
	ENGINE=InnoDB;

CREATE TABLE `phpyoda`.`portfolios_tags` (
	`portfolio_id` int(11) NOT NULL AUTO_INCREMENT,
	`tag_id` int(11) NOT NULL,	KEY `portfolio_id` (`portfolio_id`),
	KEY `tag_id` (`tag_id`),
	PRIMARY KEY  (`portfolio_id`)) 	DEFAULT CHARSET=latin1,
	COLLATE=latin1_swedish_ci,
	ENGINE=InnoDB;

CREATE TABLE `phpyoda`.`posts` (
	`id` int(11) NOT NULL AUTO_INCREMENT,
	`user_id` int(11) NOT NULL,
	`title` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
	`body` text CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
	`created` datetime DEFAULT NULL,
	`modified` datetime DEFAULT NULL,	PRIMARY KEY  (`id`)) 	DEFAULT CHARSET=latin1,
	COLLATE=latin1_swedish_ci,
	ENGINE=InnoDB;

CREATE TABLE `phpyoda`.`tags` (
	`id` int(11) NOT NULL AUTO_INCREMENT,
	`tag` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,	PRIMARY KEY  (`id`)) 	DEFAULT CHARSET=latin1,
	COLLATE=latin1_swedish_ci,
	ENGINE=InnoDB;

CREATE TABLE `phpyoda`.`users` (
	`id` int(11) NOT NULL AUTO_INCREMENT,
	`group_id` int(11) NOT NULL,
	`username` varchar(80) CHARACTER SET utf8 COLLATE utf8_bin DEFAULT NULL,
	`password` varchar(80) CHARACTER SET utf8 COLLATE utf8_bin DEFAULT NULL,
	`first_name` varchar(80) CHARACTER SET utf8 COLLATE utf8_bin DEFAULT NULL,
	`last_name` varchar(80) CHARACTER SET utf8 COLLATE utf8_bin DEFAULT NULL,
	`email` varchar(80) CHARACTER SET utf8 COLLATE utf8_bin DEFAULT NULL,
	`created` datetime NOT NULL,
	`modified` timestamp NULL,
	`is_active` tinyint(1) DEFAULT '1',
	`is_banned` tinyint(1) DEFAULT '0',	PRIMARY KEY  (`id`),
	KEY `rln_groups_users` (`group_id`)) 	DEFAULT CHARSET=utf8,
	COLLATE=utf8_bin,
	ENGINE=InnoDB;

