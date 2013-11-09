# 09.11.2013 - UPDATED ON LIVE
ALTER TABLE  `users` ADD  `nickname` VARCHAR( 50 ) NOT NULL AFTER  `last_name` ;
UPDATE  `phpyoda`.`users` SET  `nickname` =  'Bokac' WHERE  `users`.`id` =1;
# 16.09.2013.
ALTER TABLE  `comments` ADD  `gravatar` TINYINT NOT NULL DEFAULT  '0' AFTER  `email`;

# 12.10.2013
ALTER TABLE  `posts` ADD  `comments_allowed` TINYINT NOT NULL DEFAULT  '1';

ALTER TABLE  `posts` ADD  `published` TINYINT NOT NULL DEFAULT  '0' AFTER  `modified`;
