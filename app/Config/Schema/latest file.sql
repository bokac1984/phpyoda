-- phpMyAdmin SQL Dump
-- version 3.4.10.1deb1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Sep 11, 2013 at 03:48 PM
-- Server version: 5.5.32
-- PHP Version: 5.3.10-1ubuntu3.8

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
  `active` tinyint(4) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `abouts`
--

INSERT INTO `abouts` (`id`, `text`, `active`) VALUES
(1, '<p>Hi, I am Bojan.&nbsp;</p>\r\n\r\n<p>From the first time I had opportunity to touch keyboard I wanted to change something in the computer, to do something on my own.&nbsp;During my college years, I got the chance to really get in to programming. Some classes I took there showed us different algorithms and styles how to make code. But that alone wasn&#39;t enough, I started to code on my own and for my on pleasure.</p>\r\n\r\n<p>Since then I worked with Java, C, C++, C# but what I felt most comfortable with was PHP, and developing something that will be on the Web. Later I become familiar with certain frameworks such as CakePHP, Yii, CodeIgniter and design pattern concepts. I supose that was natural way of things for me. You can see some of my latest works under&nbsp;<a href="http://phpyoda.com/portfolio" target="_blank">portfolios</a>.</p>\r\n\r\n<p>Other than programming I love riding a bycicle, love to play chess (you can find me on chess.com as&nbsp;<a href="http://www.chess.com/members/view/bokac1984" target="_blank">bokac1984</a>), I love all sorts of sports, except for baseball due to my insufficient knowlegde about it maybe.</p>\r\n', 1),
(2, '<p>asd</p>\r\n', 0);

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=113 ;

--
-- Dumping data for table `acos`
--

INSERT INTO `acos` (`id`, `parent_id`, `model`, `foreign_key`, `alias`, `lft`, `rght`) VALUES
(1, NULL, NULL, NULL, 'controllers', 1, 192),
(8, 1, NULL, NULL, 'Groups', 2, 15),
(9, 8, NULL, NULL, 'index', 3, 4),
(10, 8, NULL, NULL, 'view', 5, 6),
(11, 8, NULL, NULL, 'add', 7, 8),
(12, 8, NULL, NULL, 'edit', 9, 10),
(13, 8, NULL, NULL, 'delete', 11, 12),
(14, 1, NULL, NULL, 'Pages', 16, 21),
(15, 14, NULL, NULL, 'display', 17, 18),
(22, 1, NULL, NULL, 'Users', 22, 41),
(23, 22, NULL, NULL, 'login', 23, 24),
(24, 22, NULL, NULL, 'logout', 25, 26),
(25, 22, NULL, NULL, 'index', 27, 28),
(26, 22, NULL, NULL, 'view', 29, 30),
(27, 22, NULL, NULL, 'add', 31, 32),
(28, 22, NULL, NULL, 'edit', 33, 34),
(29, 22, NULL, NULL, 'delete', 35, 36),
(31, 1, NULL, NULL, 'AclExtras', 42, 43),
(32, 1, NULL, NULL, 'Contacts', 44, 57),
(33, 32, NULL, NULL, 'index', 45, 46),
(34, 32, NULL, NULL, 'view', 47, 48),
(35, 32, NULL, NULL, 'add', 49, 50),
(36, 32, NULL, NULL, 'edit', 51, 52),
(37, 32, NULL, NULL, 'delete', 53, 54),
(38, 1, NULL, NULL, 'Portfolios', 58, 73),
(39, 38, NULL, NULL, 'index', 59, 60),
(40, 38, NULL, NULL, 'view', 61, 62),
(41, 38, NULL, NULL, 'add', 63, 64),
(42, 38, NULL, NULL, 'edit', 65, 66),
(43, 38, NULL, NULL, 'delete', 67, 68),
(45, 1, NULL, NULL, 'Acl', 74, 135),
(46, 45, NULL, NULL, 'Acl', 75, 82),
(47, 46, NULL, NULL, 'index', 76, 77),
(48, 46, NULL, NULL, 'admin_index', 78, 79),
(49, 45, NULL, NULL, 'Acos', 83, 96),
(50, 49, NULL, NULL, 'admin_index', 84, 85),
(51, 49, NULL, NULL, 'admin_empty_acos', 86, 87),
(52, 49, NULL, NULL, 'admin_build_acl', 88, 89),
(53, 49, NULL, NULL, 'admin_prune_acos', 90, 91),
(54, 49, NULL, NULL, 'admin_synchronize', 92, 93),
(55, 45, NULL, NULL, 'Aros', 97, 134),
(56, 55, NULL, NULL, 'admin_index', 98, 99),
(57, 55, NULL, NULL, 'admin_check', 100, 101),
(58, 55, NULL, NULL, 'admin_users', 102, 103),
(59, 55, NULL, NULL, 'admin_update_user_role', 104, 105),
(60, 55, NULL, NULL, 'admin_ajax_role_permissions', 106, 107),
(61, 55, NULL, NULL, 'admin_role_permissions', 108, 109),
(62, 55, NULL, NULL, 'admin_user_permissions', 110, 111),
(63, 55, NULL, NULL, 'admin_empty_permissions', 112, 113),
(64, 55, NULL, NULL, 'admin_clear_user_specific_permissions', 114, 115),
(65, 55, NULL, NULL, 'admin_grant_all_controllers', 116, 117),
(66, 55, NULL, NULL, 'admin_deny_all_controllers', 118, 119),
(67, 55, NULL, NULL, 'admin_get_role_controller_permission', 120, 121),
(68, 55, NULL, NULL, 'admin_grant_role_permission', 122, 123),
(69, 55, NULL, NULL, 'admin_deny_role_permission', 124, 125),
(70, 55, NULL, NULL, 'admin_get_user_controller_permission', 126, 127),
(71, 55, NULL, NULL, 'admin_grant_user_permission', 128, 129),
(72, 55, NULL, NULL, 'admin_deny_user_permission', 130, 131),
(73, 1, NULL, NULL, 'Abouts', 136, 151),
(74, 73, NULL, NULL, 'index', 137, 138),
(75, 73, NULL, NULL, 'view', 139, 140),
(76, 73, NULL, NULL, 'add', 141, 142),
(77, 73, NULL, NULL, 'edit', 143, 144),
(78, 73, NULL, NULL, 'delete', 145, 146),
(79, 73, NULL, NULL, 'blackhole', 147, 148),
(81, 32, NULL, NULL, 'blackhole', 55, 56),
(82, 8, NULL, NULL, 'blackhole', 13, 14),
(83, 14, NULL, NULL, 'blackhole', 19, 20),
(84, 38, NULL, NULL, 'getTags', 69, 70),
(85, 38, NULL, NULL, 'blackhole', 71, 72),
(87, 22, NULL, NULL, 'about', 37, 38),
(88, 22, NULL, NULL, 'blackhole', 39, 40),
(89, 46, NULL, NULL, 'blackhole', 80, 81),
(90, 49, NULL, NULL, 'blackhole', 94, 95),
(91, 55, NULL, NULL, 'blackhole', 132, 133),
(92, 1, NULL, NULL, 'DebugKit', 152, 161),
(93, 92, NULL, NULL, 'ToolbarAccess', 153, 160),
(94, 93, NULL, NULL, 'history_state', 154, 155),
(95, 93, NULL, NULL, 'sql_explain', 156, 157),
(96, 93, NULL, NULL, 'blackhole', 158, 159),
(97, 1, NULL, NULL, 'Uploader', 162, 163),
(98, 1, NULL, NULL, 'Blog', 164, 189),
(99, 98, NULL, NULL, 'Posts', 165, 178),
(100, 99, NULL, NULL, 'index', 166, 167),
(101, 99, NULL, NULL, 'view', 168, 169),
(102, 99, NULL, NULL, 'add', 170, 171),
(103, 99, NULL, NULL, 'edit', 172, 173),
(104, 99, NULL, NULL, 'delete', 174, 175),
(105, 99, NULL, NULL, 'blackhole', 176, 177),
(106, 73, NULL, NULL, 'listAll', 149, 150),
(107, 98, NULL, NULL, 'BlogSettings', 179, 182),
(108, 107, NULL, NULL, 'blackhole', 180, 181),
(109, 98, NULL, NULL, 'Comments', 183, 188),
(110, 109, NULL, NULL, 'blackhole', 184, 185),
(111, 109, NULL, NULL, 'add', 186, 187),
(112, 1, NULL, NULL, 'Interactive', 190, 191);

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `aros_acos`
--

INSERT INTO `aros_acos` (`id`, `aro_id`, `aco_id`, `_create`, `_read`, `_update`, `_delete`) VALUES
(1, 1, 1, '1', '1', '1', '1'),
(2, 2, 1, '-1', '-1', '-1', '-1');

-- --------------------------------------------------------

--
-- Table structure for table `blog_settings`
--

DROP TABLE IF EXISTS `blog_settings`;
CREATE TABLE IF NOT EXISTS `blog_settings` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `value` tinyint(4) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

DROP TABLE IF EXISTS `categories`;
CREATE TABLE IF NOT EXISTS `categories` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

DROP TABLE IF EXISTS `comments`;
CREATE TABLE IF NOT EXISTS `comments` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `parent_id` int(11) NOT NULL,
  `post_id` int(11) NOT NULL,
  `text` text NOT NULL,
  `commentator` varchar(50) NOT NULL,
  `website` varchar(150) NOT NULL,
  `email` varchar(150) NOT NULL,
  `ip_address` varchar(200) NOT NULL,
  `approved` tinyint(4) NOT NULL DEFAULT '0',
  `deleted` tinyint(4) NOT NULL DEFAULT '0',
  `created` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`id`, `parent_id`, `post_id`, `text`, `commentator`, `website`, `email`, `ip_address`, `approved`, `deleted`, `created`) VALUES
(1, 0, 8, '', 'bokac', '', 'bokac1984@gmail.com', '127.0.0.1', 0, 0, '2013-09-10 22:58:01'),
(2, 0, 8, '', 'FDI', '', 'bokac1984@gmail.com', '127.0.0.1', 0, 0, '2013-09-10 23:33:29'),
(3, 0, 1, '', 'bokac', '', 'bokac1984@gmail.com', '127.0.0.1', 0, 0, '2013-09-10 23:34:26');

-- --------------------------------------------------------

--
-- Table structure for table `contacts`
--

DROP TABLE IF EXISTS `contacts`;
CREATE TABLE IF NOT EXISTS `contacts` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  `website` varchar(250) NOT NULL,
  `email` varchar(150) NOT NULL,
  `message` text NOT NULL,
  `ip_address` varchar(200) NOT NULL,
  `read` tinyint(4) NOT NULL,
  `created` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `contacts`
--

INSERT INTO `contacts` (`id`, `name`, `website`, `email`, `message`, `ip_address`, `read`, `created`) VALUES
(1, 'Bojan', '', 'bokac1984@gmail.com', 'New message here <h1>TestM</h1>', '127.0.0.1', 1, '2013-08-01 01:49:12'),
(2, 'sdasd', '', 'sada@gad.ok', 'dasda', '127.0.0.1', 1, '2013-08-30 13:58:10'),
(3, 'sdasd', '', 'sada@gad.ok', 'fsdfds', '127.0.0.1', 0, '2013-09-10 22:07:24');

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
-- Table structure for table `images`
--

DROP TABLE IF EXISTS `images`;
CREATE TABLE IF NOT EXISTS `images` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `uploaded` varchar(200) NOT NULL,
  `thumbnail` varchar(200) NOT NULL,
  `medium` varchar(200) NOT NULL,
  `portfolio_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `portfolio_id` (`portfolio_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `portfolios`
--

DROP TABLE IF EXISTS `portfolios`;
CREATE TABLE IF NOT EXISTS `portfolios` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `screen_shot` varchar(150) NOT NULL,
  `project_name` varchar(50) NOT NULL,
  `description` text NOT NULL,
  `order` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `portfolios_tags`
--

DROP TABLE IF EXISTS `portfolios_tags`;
CREATE TABLE IF NOT EXISTS `portfolios_tags` (
  `portfolio_id` int(11) NOT NULL,
  `tag_id` int(11) NOT NULL,
  KEY `portfolio_id` (`portfolio_id`),
  KEY `tag_id` (`tag_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

DROP TABLE IF EXISTS `posts`;
CREATE TABLE IF NOT EXISTS `posts` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `slug` varchar(250) NOT NULL,
  `body` text,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`id`, `user_id`, `title`, `slug`, `body`, `created`, `modified`) VALUES
(1, 1, 'Trouble with CakePHP''s HBTM', 'trouble-with-cakephp-s-hbtm', '<p>This is my first project using PHP.</p>\r\n\r\n<p>Sample Code here:</p>\r\n\r\n<pre class="brush:php;">\r\n	public function beforeValidate(Model $Model) {\r\n		extract($this-&gt;settings[$Model-&gt;alias]);\r\n		if ($run !== &#39;beforeValidate&#39;) {\r\n			return true;\r\n		}\r\n		if (is_string($this-&gt;settings[$Model-&gt;alias][&#39;trigger&#39;])) {\r\n			if (!$Model-&gt;{$this-&gt;settings[$Model-&gt;alias][&#39;trigger&#39;]}) {\r\n				return true;\r\n			}\r\n		}\r\n		return $this-&gt;generateSlug($Model);\r\n	}</pre>\r\n\r\n<p>&nbsp;</p>\r\n', '2013-08-28 17:50:24', '2013-09-02 18:11:29'),
(2, 1, 'this is one long title2', 'this-is-one-long-title2', '<p>dasdasdasd</p>\r\n\r\n&lt;pre&gt;Code&lt;/pre&gt;\r\n', '2013-09-01 00:59:58', '2013-09-02 17:54:57'),
(3, 1, 'First post here', 'First-post-here', '<p>Some random text here savedsds</p>\r\n', '2013-09-01 01:55:26', '2013-09-01 01:55:26'),
(4, 1, 'First post heredd', 'first-post-heredd', '<pre>Some random text here</pre>\r\n', '2013-09-01 01:56:01', '2013-09-02 17:53:54'),
(5, 1, 'this is one long title', 'this-is-one-long-title', '<p>adsasd</p>\r\n', '2013-09-02 15:02:19', '2013-09-02 15:02:19'),
(6, 1, 'this is one long title', 'this-is-one-long-title', '<p>safasdd</p>\r\n', '2013-09-02 15:02:50', '2013-09-02 15:02:50'),
(7, 1, 'Save problems with HABTM associations in CakePHP', 'save-problems-with-habtm-associations-in-cakephp', '<p>Save data should look like this: s</p>\r\n\r\n<p>&nbsp;</p>\r\n', '2013-09-02 19:54:45', '2013-09-02 20:42:02'),
(8, 1, 'This would be the first post on my blog', 'this-would-be-the-first-post-on-my-blog', '<p>Sa</p>\r\n', '2013-09-10 17:26:33', '2013-09-10 17:26:33');

-- --------------------------------------------------------

--
-- Table structure for table `posts_tags`
--

DROP TABLE IF EXISTS `posts_tags`;
CREATE TABLE IF NOT EXISTS `posts_tags` (
  `post_id` int(11) NOT NULL,
  `tag_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `posts_tags`
--

INSERT INTO `posts_tags` (`post_id`, `tag_id`) VALUES
(8, 1);

-- --------------------------------------------------------

--
-- Table structure for table `tags`
--

DROP TABLE IF EXISTS `tags`;
CREATE TABLE IF NOT EXISTS `tags` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `tag` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=21 ;

--
-- Dumping data for table `tags`
--

INSERT INTO `tags` (`id`, `tag`) VALUES
(1, 'cakwe'),
(2, 'fdfsdf'),
(3, 'dsavea'),
(4, 'fgfgfdg'),
(5, 'fsfsdfsdf'),
(9, '5regr'),
(11, 'ghghghggf'),
(12, 'first'),
(13, 'projet'),
(14, 'fdsfsdfs'),
(15, 'savedd'),
(16, 'fgfgdfg'),
(17, 'gdfgdfg'),
(18, '4rth'),
(19, 'Ennio'),
(20, 'morricone');

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