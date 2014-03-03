# komentar ovdje
ALTER TABLE `error_logs` ADD `read` TINYINT(1) NOT NULL ;
ALTER TABLE `error_logs` CHANGE `read` `read` TINYINT(1) NOT NULL DEFAULT '0';