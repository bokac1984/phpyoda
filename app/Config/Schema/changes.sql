# 16.09.2013.
ALTER TABLE  `comments` ADD  `gravatar` VARCHAR( 250 ) NOT NULL DEFAULT  '' AFTER  `email`

# 12.10.2013
ALTER TABLE  `posts` ADD  `comments_allowed` TINYINT NOT NULL DEFAULT  '1'

ALTER TABLE  `posts` ADD  `published` TINYINT NOT NULL DEFAULT  '0' AFTER  `modified`
