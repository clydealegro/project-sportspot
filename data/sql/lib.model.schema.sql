
# This is a fix for InnoDB in MySQL >= 4.1.x
# It "suspends judgement" for fkey relationships until are tables are set.
SET FOREIGN_KEY_CHECKS = 0;

#-----------------------------------------------------------------------------
#-- account
#-----------------------------------------------------------------------------

DROP TABLE IF EXISTS `account`;


CREATE TABLE `account`
(
	`account_id` INTEGER(11)  NOT NULL AUTO_INCREMENT,
	`email` VARCHAR(45),
	`password` VARCHAR(45)  NOT NULL,
	`first_name` VARCHAR(45)  NOT NULL,
	`last_name` VARCHAR(45)  NOT NULL,
	`status` TINYINT(1) default 1 NOT NULL,
	`created_at` DATETIME  NOT NULL,
	`updated_at` DATETIME,
	PRIMARY KEY (`account_id`),
	UNIQUE KEY `account_U_1` (`email`)
)Engine=InnoDB;

#-----------------------------------------------------------------------------
#-- account_to_photo
#-----------------------------------------------------------------------------

DROP TABLE IF EXISTS `account_to_photo`;


CREATE TABLE `account_to_photo`
(
	`account_id` INTEGER(11)  NOT NULL,
	`photo_id` INTEGER(11)  NOT NULL,
	`id` INTEGER(11)  NOT NULL AUTO_INCREMENT,
	PRIMARY KEY (`id`),
	KEY `fk_account_to_photo_account1`(`account_id`),
	KEY `fk_account_to_photo_photo1`(`photo_id`),
	CONSTRAINT `account_to_photo_FK_1`
		FOREIGN KEY (`account_id`)
		REFERENCES `account` (`account_id`)
		ON UPDATE RESTRICT
		ON DELETE RESTRICT,
	CONSTRAINT `account_to_photo_FK_2`
		FOREIGN KEY (`photo_id`)
		REFERENCES `photo` (`photo_id`)
		ON UPDATE RESTRICT
		ON DELETE RESTRICT
)Engine=InnoDB;

#-----------------------------------------------------------------------------
#-- announcement
#-----------------------------------------------------------------------------

DROP TABLE IF EXISTS `announcement`;


CREATE TABLE `announcement`
(
	`announcement_id` INTEGER(11)  NOT NULL AUTO_INCREMENT,
	`listing_id` INTEGER(11)  NOT NULL,
	`title` VARCHAR(45),
	`description` TEXT,
	`created_at` DATETIME,
	`updated_at` DATETIME,
	PRIMARY KEY (`announcement_id`),
	KEY `fk_announcement_listing1`(`listing_id`),
	CONSTRAINT `announcement_FK_1`
		FOREIGN KEY (`listing_id`)
		REFERENCES `listing` (`listing_id`)
		ON UPDATE RESTRICT
		ON DELETE RESTRICT
)Engine=InnoDB;

#-----------------------------------------------------------------------------
#-- availability
#-----------------------------------------------------------------------------

DROP TABLE IF EXISTS `availability`;


CREATE TABLE `availability`
(
	`availability_id` INTEGER(11)  NOT NULL AUTO_INCREMENT,
	`day` TINYINT(1),
	`opening_time` TIME,
	`closing_time` TIME,
	PRIMARY KEY (`availability_id`)
)Engine=InnoDB;

#-----------------------------------------------------------------------------
#-- category
#-----------------------------------------------------------------------------

DROP TABLE IF EXISTS `category`;


CREATE TABLE `category`
(
	`category_id` INTEGER(11)  NOT NULL AUTO_INCREMENT,
	`name` VARCHAR(45),
	`description` TEXT,
	PRIMARY KEY (`category_id`)
)Engine=InnoDB;

#-----------------------------------------------------------------------------
#-- listing
#-----------------------------------------------------------------------------

DROP TABLE IF EXISTS `listing`;


CREATE TABLE `listing`
(
	`listing_id` INTEGER(11)  NOT NULL AUTO_INCREMENT,
	`account_id` INTEGER(11)  NOT NULL,
	`name` VARCHAR(45),
	`complete_address` VARCHAR(45),
	`details` TEXT,
	`contact_person` VARCHAR(45),
	`contact_number` VARCHAR(45),
	PRIMARY KEY (`listing_id`),
	KEY `fk_listing_account1`(`account_id`),
	CONSTRAINT `listing_FK_1`
		FOREIGN KEY (`account_id`)
		REFERENCES `account` (`account_id`)
		ON UPDATE RESTRICT
		ON DELETE RESTRICT
)Engine=InnoDB;

#-----------------------------------------------------------------------------
#-- listing_to_availability
#-----------------------------------------------------------------------------

DROP TABLE IF EXISTS `listing_to_availability`;


CREATE TABLE `listing_to_availability`
(
	`listing_id` INTEGER(11)  NOT NULL,
	`availability_id` INTEGER(11)  NOT NULL,
	`id` INTEGER(11)  NOT NULL AUTO_INCREMENT,
	PRIMARY KEY (`id`),
	KEY `fk_listing_to_availability_availability1`(`availability_id`),
	KEY `fk_listing_to_availability_listing1`(`listing_id`),
	CONSTRAINT `listing_to_availability_FK_1`
		FOREIGN KEY (`listing_id`)
		REFERENCES `listing` (`listing_id`)
		ON UPDATE RESTRICT
		ON DELETE RESTRICT,
	CONSTRAINT `listing_to_availability_FK_2`
		FOREIGN KEY (`availability_id`)
		REFERENCES `availability` (`availability_id`)
		ON UPDATE RESTRICT
		ON DELETE RESTRICT
)Engine=InnoDB;

#-----------------------------------------------------------------------------
#-- listing_to_category
#-----------------------------------------------------------------------------

DROP TABLE IF EXISTS `listing_to_category`;


CREATE TABLE `listing_to_category`
(
	`category_id` INTEGER(11)  NOT NULL,
	`listing_id` INTEGER(11)  NOT NULL,
	`id` INTEGER(11)  NOT NULL AUTO_INCREMENT,
	PRIMARY KEY (`id`),
	KEY `fk_listingsToCategory_category1`(`category_id`),
	KEY `fk_listingsToCategory_listings1`(`listing_id`),
	CONSTRAINT `listing_to_category_FK_1`
		FOREIGN KEY (`category_id`)
		REFERENCES `category` (`category_id`)
		ON UPDATE RESTRICT
		ON DELETE RESTRICT,
	CONSTRAINT `listing_to_category_FK_2`
		FOREIGN KEY (`listing_id`)
		REFERENCES `listing` (`listing_id`)
		ON UPDATE RESTRICT
		ON DELETE RESTRICT
)Engine=InnoDB;

#-----------------------------------------------------------------------------
#-- listing_to_photo
#-----------------------------------------------------------------------------

DROP TABLE IF EXISTS `listing_to_photo`;


CREATE TABLE `listing_to_photo`
(
	`listing_id` INTEGER(11)  NOT NULL,
	`photo_id` INTEGER(11)  NOT NULL,
	`id` INTEGER(11)  NOT NULL AUTO_INCREMENT,
	PRIMARY KEY (`id`),
	KEY `fk_listing_to_photo_listing1`(`listing_id`),
	KEY `fk_listing_to_photo_photo1`(`photo_id`),
	CONSTRAINT `listing_to_photo_FK_1`
		FOREIGN KEY (`listing_id`)
		REFERENCES `listing` (`listing_id`)
		ON UPDATE RESTRICT
		ON DELETE RESTRICT,
	CONSTRAINT `listing_to_photo_FK_2`
		FOREIGN KEY (`photo_id`)
		REFERENCES `photo` (`photo_id`)
		ON UPDATE RESTRICT
		ON DELETE RESTRICT
)Engine=InnoDB;

#-----------------------------------------------------------------------------
#-- map_info
#-----------------------------------------------------------------------------

DROP TABLE IF EXISTS `map_info`;


CREATE TABLE `map_info`
(
	`map_info_id` INTEGER(11)  NOT NULL AUTO_INCREMENT,
	`listing_id` INTEGER(11)  NOT NULL,
	`region` INTEGER(11),
	`city_municipality` VARCHAR(45),
	`google_latitude` DECIMAL(10,10),
	`google_longitude` DECIMAL(10,10),
	PRIMARY KEY (`map_info_id`),
	KEY `fk_listing_to_map`(`listing_id`),
	CONSTRAINT `map_info_FK_1`
		FOREIGN KEY (`listing_id`)
		REFERENCES `listing` (`listing_id`)
		ON UPDATE RESTRICT
		ON DELETE RESTRICT
)Engine=InnoDB;

#-----------------------------------------------------------------------------
#-- photo
#-----------------------------------------------------------------------------

DROP TABLE IF EXISTS `photo`;


CREATE TABLE `photo`
(
	`photo_id` INTEGER(11)  NOT NULL,
	`context` VARCHAR(45),
	`context_id` INTEGER(11),
	`title` VARCHAR(45),
	`caption` VARCHAR(45),
	`filename` VARCHAR(45),
	PRIMARY KEY (`photo_id`)
)Engine=InnoDB;

#-----------------------------------------------------------------------------
#-- token
#-----------------------------------------------------------------------------

DROP TABLE IF EXISTS `token`;


CREATE TABLE `token`
(
	`id` INTEGER(10)  NOT NULL AUTO_INCREMENT,
	`expires_at` DATETIME  NOT NULL,
	`token` VARCHAR(250)  NOT NULL,
	PRIMARY KEY (`id`)
)Engine=InnoDB;

# This restores the fkey checks, after having unset them earlier
SET FOREIGN_KEY_CHECKS = 1;
