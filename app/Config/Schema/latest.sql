
DROP TABLE IF EXISTS `phpyoda`.`abouts`;
DROP TABLE IF EXISTS `phpyoda`.`comments`;
DROP TABLE IF EXISTS `phpyoda`.`contacts`;
DROP TABLE IF EXISTS `phpyoda`.`groups`;
DROP TABLE IF EXISTS `phpyoda`.`portfolios`;
DROP TABLE IF EXISTS `phpyoda`.`portfolios_tags`;
DROP TABLE IF EXISTS `phpyoda`.`posts`;
DROP TABLE IF EXISTS `phpyoda`.`tags`;


CREATE TABLE `phpyoda`.`abouts` (
	`id` int(11) NOT NULL AUTO_INCREMENT,
	`text` text CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,	PRIMARY KEY  (`id`)) 	DEFAULT CHARSET=latin1,
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
