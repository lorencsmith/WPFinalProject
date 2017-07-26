CREATE TABLE `user`.`flight` (
`id` INT NOT NULL AUTO_INCREMENT ,
`destination` VARCHAR( 225 ) NOT NULL ,
`price` INT( 11 ) NOT NULL ,
`seats_left` INT (11) NOT NULL,
`book_date` DATETIME NOT NULL ,
PRIMARY KEY ( `id` )
) ENGINE = InnoDB;