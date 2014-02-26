# added last login to users
ALTER TABLE `users` ADD `last_login` DATETIME NOT NULL ;

ALTER TABLE `pictures` CHANGE `cover` `cover` TINYINT(1) NOT NULL DEFAULT '0';
ALTER TABLE `pictures` CHANGE `display` `display` TINYINT(1) NOT NULL DEFAULT '0';
