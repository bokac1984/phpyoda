-- phpMyAdmin SQL Dump
-- version 3.4.10.1deb1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jul 30, 2013 at 01:30 PM
-- Server version: 5.5.32
-- PHP Version: 5.3.10-1ubuntu3.7

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `phpyoda`
--

-- --------------------------------------------------------

--
-- Table structure for table `abouts`
--

DROP TABLE IF EXISTS `abouts`;
CREATE TABLE IF NOT EXISTS `abouts` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `text` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `abouts`
--

INSERT INTO `abouts` (`id`, `text`) VALUES
(1, 'ja sam bojan');

-- --------------------------------------------------------

--
-- Table structure for table `acos`
--

DROP TABLE IF EXISTS `acos`;
CREATE TABLE IF NOT EXISTS `acos` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `parent_id` int(10) DEFAULT NULL,
  `model` varchar(255) DEFAULT NULL,
  `foreign_key` int(10) DEFAULT NULL,
  `alias` varchar(255) DEFAULT NULL,
  `lft` int(10) DEFAULT NULL,
  `rght` int(10) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=73 ;

--
-- Dumping data for table `acos`
--

INSERT INTO `acos` (`id`, `parent_id`, `model`, `foreign_key`, `alias`, `lft`, `rght`) VALUES
(1, NULL, NULL, NULL, 'controllers', 1, 142),
(2, 1, NULL, NULL, 'Comments', 2, 13),
(3, 2, NULL, NULL, 'index', 3, 4),
(4, 2, NULL, NULL, 'view', 5, 6),
(5, 2, NULL, NULL, 'add', 7, 8),
(6, 2, NULL, NULL, 'edit', 9, 10),
(7, 2, NULL, NULL, 'delete', 11, 12),
(8, 1, NULL, NULL, 'Groups', 14, 25),
(9, 8, NULL, NULL, 'index', 15, 16),
(10, 8, NULL, NULL, 'view', 17, 18),
(11, 8, NULL, NULL, 'add', 19, 20),
(12, 8, NULL, NULL, 'edit', 21, 22),
(13, 8, NULL, NULL, 'delete', 23, 24),
(14, 1, NULL, NULL, 'Pages', 26, 29),
(15, 14, NULL, NULL, 'display', 27, 28),
(16, 1, NULL, NULL, 'Posts', 30, 41),
(17, 16, NULL, NULL, 'index', 31, 32),
(18, 16, NULL, NULL, 'view', 33, 34),
(19, 16, NULL, NULL, 'add', 35, 36),
(20, 16, NULL, NULL, 'edit', 37, 38),
(21, 16, NULL, NULL, 'delete', 39, 40),
(22, 1, NULL, NULL, 'Users', 42, 59),
(23, 22, NULL, NULL, 'login', 43, 44),
(24, 22, NULL, NULL, 'logout', 45, 46),
(25, 22, NULL, NULL, 'index', 47, 48),
(26, 22, NULL, NULL, 'view', 49, 50),
(27, 22, NULL, NULL, 'add', 51, 52),
(28, 22, NULL, NULL, 'edit', 53, 54),
(29, 22, NULL, NULL, 'delete', 55, 56),
(31, 1, NULL, NULL, 'AclExtras', 60, 61),
(32, 1, NULL, NULL, 'Contacts', 62, 73),
(33, 32, NULL, NULL, 'index', 63, 64),
(34, 32, NULL, NULL, 'view', 65, 66),
(35, 32, NULL, NULL, 'add', 67, 68),
(36, 32, NULL, NULL, 'edit', 69, 70),
(37, 32, NULL, NULL, 'delete', 71, 72),
(38, 1, NULL, NULL, 'Portfolios', 74, 85),
(39, 38, NULL, NULL, 'index', 75, 76),
(40, 38, NULL, NULL, 'view', 77, 78),
(41, 38, NULL, NULL, 'add', 79, 80),
(42, 38, NULL, NULL, 'edit', 81, 82),
(43, 38, NULL, NULL, 'delete', 83, 84),
(44, 22, NULL, NULL, 'contact', 57, 58),
(45, 1, NULL, NULL, 'Acl', 86, 141),
(46, 45, NULL, NULL, 'Acl', 87, 92),
(47, 46, NULL, NULL, 'index', 88, 89),
(48, 46, NULL, NULL, 'admin_index', 90, 91),
(49, 45, NULL, NULL, 'Acos', 93, 104),
(50, 49, NULL, NULL, 'admin_index', 94, 95),
(51, 49, NULL, NULL, 'admin_empty_acos', 96, 97),
(52, 49, NULL, NULL, 'admin_build_acl', 98, 99),
(53, 49, NULL, NULL, 'admin_prune_acos', 100, 101),
(54, 49, NULL, NULL, 'admin_synchronize', 102, 103),
(55, 45, NULL, NULL, 'Aros', 105, 140),
(56, 55, NULL, NULL, 'admin_index', 106, 107),
(57, 55, NULL, NULL, 'admin_check', 108, 109),
(58, 55, NULL, NULL, 'admin_users', 110, 111),
(59, 55, NULL, NULL, 'admin_update_user_role', 112, 113),
(60, 55, NULL, NULL, 'admin_ajax_role_permissions', 114, 115),
(61, 55, NULL, NULL, 'admin_role_permissions', 116, 117),
(62, 55, NULL, NULL, 'admin_user_permissions', 118, 119),
(63, 55, NULL, NULL, 'admin_empty_permissions', 120, 121),
(64, 55, NULL, NULL, 'admin_clear_user_specific_permissions', 122, 123),
(65, 55, NULL, NULL, 'admin_grant_all_controllers', 124, 125),
(66, 55, NULL, NULL, 'admin_deny_all_controllers', 126, 127),
(67, 55, NULL, NULL, 'admin_get_role_controller_permission', 128, 129),
(68, 55, NULL, NULL, 'admin_grant_role_permission', 130, 131),
(69, 55, NULL, NULL, 'admin_deny_role_permission', 132, 133),
(70, 55, NULL, NULL, 'admin_get_user_controller_permission', 134, 135),
(71, 55, NULL, NULL, 'admin_grant_user_permission', 136, 137),
(72, 55, NULL, NULL, 'admin_deny_user_permission', 138, 139);

-- --------------------------------------------------------

--
-- Table structure for table `aros`
--

DROP TABLE IF EXISTS `aros`;
CREATE TABLE IF NOT EXISTS `aros` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `parent_id` int(10) DEFAULT NULL,
  `model` varchar(255) DEFAULT NULL,
  `foreign_key` int(10) DEFAULT NULL,
  `alias` varchar(255) DEFAULT NULL,
  `lft` int(10) DEFAULT NULL,
  `rght` int(10) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `aros`
--

INSERT INTO `aros` (`id`, `parent_id`, `model`, `foreign_key`, `alias`, `lft`, `rght`) VALUES
(1, NULL, 'Group', 1, NULL, 1, 2),
(2, NULL, 'Group', 2, NULL, 3, 4);

-- --------------------------------------------------------

--
-- Table structure for table `aros_acos`
--

DROP TABLE IF EXISTS `aros_acos`;
CREATE TABLE IF NOT EXISTS `aros_acos` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `aro_id` int(10) NOT NULL,
  `aco_id` int(10) NOT NULL,
  `_create` varchar(2) NOT NULL DEFAULT '0',
  `_read` varchar(2) NOT NULL DEFAULT '0',
  `_update` varchar(2) NOT NULL DEFAULT '0',
  `_delete` varchar(2) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  UNIQUE KEY `ARO_ACO_KEY` (`aro_id`,`aco_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `aros_acos`
--

INSERT INTO `aros_acos` (`id`, `aro_id`, `aco_id`, `_create`, `_read`, `_update`, `_delete`) VALUES
(1, 1, 1, '1', '1', '1', '1'),
(2, 2, 1, '-1', '-1', '-1', '-1'),
(3, 2, 16, '1', '1', '1', '1');

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

DROP TABLE IF EXISTS `comments`;
CREATE TABLE IF NOT EXISTS `comments` (
  `id` int(11) NOT NULL,
  `post_id` int(11) NOT NULL,
  `text` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `contacts`
--

DROP TABLE IF EXISTS `contacts`;
CREATE TABLE IF NOT EXISTS `contacts` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  `email` varchar(150) NOT NULL,
  `message` text NOT NULL,
  `ip_address` varchar(200) NOT NULL,
  `read` tinyint(4) NOT NULL,
  `created` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

--
-- Dumping data for table `contacts`
--

INSERT INTO `contacts` (`id`, `name`, `email`, `message`, `ip_address`, `read`, `created`) VALUES
(1, 'dasd', 'sada@gad.ok', 'adsd', '', 0, '0000-00-00 00:00:00'),
(2, 'dasd', 'sada@gad.ok', 'sade', '127.0.0.1', 0, '0000-00-00 00:00:00'),
(3, 'dasd', 'sada@gad.ok', 'dasd', '127.0.0.1', 0, '0000-00-00 00:00:00'),
(4, 'dasd', 'sada@gad.ok', 'dasd', '127.0.0.1', 0, '0000-00-00 00:00:00'),
(5, 'sad', 'sada@gad.ok', 'ads', '127.0.0.1', 0, '0000-00-00 00:00:00'),
(6, 'sdf', 'sada@gad.ok', 'sfd', '127.0.0.1', 0, '2013-07-29 20:30:09'),
(7, 'boki', 'test@test.com', '&quot;hi&quot;', '127.0.0.1', 0, '2013-07-29 23:45:36'),
(8, 'sad', 'sada@gad.ok', '"das"', '127.0.0.1', 0, '2013-07-30 01:50:00');

-- --------------------------------------------------------

--
-- Table structure for table `groups`
--

DROP TABLE IF EXISTS `groups`;
CREATE TABLE IF NOT EXISTS `groups` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `group_name` varchar(80) COLLATE utf8_bin DEFAULT NULL,
  `created` datetime NOT NULL,
  `modified` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=3 ;

--
-- Dumping data for table `groups`
--

INSERT INTO `groups` (`id`, `group_name`, `created`, `modified`) VALUES
(1, 'administrators', '2013-05-21 22:02:58', '2013-05-21 20:02:58'),
(2, 'managers', '2013-05-21 22:03:12', '2013-05-21 20:03:12');

-- --------------------------------------------------------

--
-- Table structure for table `portfolios`
--

DROP TABLE IF EXISTS `portfolios`;
CREATE TABLE IF NOT EXISTS `portfolios` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `text` text NOT NULL,
  `screen_shot` varchar(150) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

DROP TABLE IF EXISTS `posts`;
CREATE TABLE IF NOT EXISTS `posts` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `body` text,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `group_id` int(11) NOT NULL,
  `username` varchar(80) COLLATE utf8_bin DEFAULT NULL,
  `password` varchar(80) COLLATE utf8_bin DEFAULT NULL,
  `first_name` varchar(80) COLLATE utf8_bin DEFAULT NULL,
  `last_name` varchar(80) COLLATE utf8_bin DEFAULT NULL,
  `email` varchar(80) COLLATE utf8_bin DEFAULT NULL,
  `created` datetime NOT NULL,
  `modified` timestamp NULL DEFAULT NULL,
  `is_active` tinyint(1) DEFAULT '1',
  `is_banned` tinyint(1) DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `rln_groups_users` (`group_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=2 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `group_id`, `username`, `password`, `first_name`, `last_name`, `email`, `created`, `modified`, `is_active`, `is_banned`) VALUES
(1, 1, 'admin', 'f40dd2d6d8d1f534793d227ac82ed85709f33361', '', '', '', '2013-05-21 22:03:32', '2013-05-21 20:03:32', 1, 0);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
