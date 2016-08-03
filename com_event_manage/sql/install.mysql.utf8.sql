CREATE TABLE IF NOT EXISTS `#__event_manage_event` (
`id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT,

`ordering` INT(11)  NOT NULL ,
`state` TINYINT(1)  NOT NULL ,
`checked_out` INT(11)  NOT NULL ,
`checked_out_time` DATETIME NOT NULL DEFAULT '0000-00-00 00:00:00',
`created_by` INT(11)  NOT NULL ,
`name` VARCHAR(500)  NOT NULL ,
`start_date` VARCHAR(250)  NOT NULL ,
`end_date` VARCHAR(255)  NOT NULL ,
`description` TEXT NOT NULL ,
`prize` VARCHAR(255)  NOT NULL ,
`terms` VARCHAR(255)  NOT NULL ,
PRIMARY KEY (`id`)
) DEFAULT COLLATE=utf8_general_ci;

