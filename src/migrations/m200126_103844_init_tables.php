<?php

class m200126_103844_init_tables extends \yii\db\Migration
{
	public function up()
	{
	    $this->execute('CREATE TABLE IF NOT EXISTS `address` (
	`id` INT(11) UNSIGNED NOT NULL AUTO_INCREMENT,
	`complex` INT(11) NULL DEFAULT NULL,
	`complex_house` VARCHAR(6) NULL DEFAULT NULL,
	`complex_structure` VARCHAR(6) NULL DEFAULT NULL,
	`street` VARCHAR(64) NULL DEFAULT NULL,
	`street_house` VARCHAR(16) NULL DEFAULT NULL,
	`street_structure` VARCHAR(16) NULL DEFAULT NULL,
	`map_x` DECIMAL(12,8) NULL DEFAULT NULL,
	`map_y` DECIMAL(12,8) NULL DEFAULT NULL,
	`construction_year` INT(11) NULL DEFAULT NULL,
	`status` ENUM(\'Active\',\'Blocked\',\'Deleted\') NOT NULL DEFAULT \'Active\',
	`changed` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
	PRIMARY KEY (`id`)
)
COLLATE=\'utf8_general_ci\'
ENGINE=InnoDB');
	    $this->execute('CREATE TABLE IF NOT EXISTS `seller` (
	`id` INT(11) UNSIGNED NOT NULL AUTO_INCREMENT,
	`type` VARCHAR(6) NOT NULL,
	`name` VARCHAR(128) NOT NULL,
	`info` TEXT NOT NULL,
	`site` VARCHAR(128) NOT NULL,
	`status` ENUM(\'Active\',\'Blocked\',\'Deleted\') NOT NULL DEFAULT \'Active\',
	`changed` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
	PRIMARY KEY (`id`)
)
COLLATE=\'utf8_general_ci\'
ENGINE=InnoDB');
	    $this->execute('CREATE TABLE IF NOT EXISTS `seller_phone` (
	`id` INT(11) UNSIGNED NOT NULL AUTO_INCREMENT,
	`seller_id` INT(10) UNSIGNED NOT NULL,
	`phone` VARCHAR(16) NOT NULL,
	`status` ENUM(\'Active\',\'Blocked\',\'Deleted\') NOT NULL DEFAULT \'Active\',
	`changed` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
	PRIMARY KEY (`id`),
	INDEX `FK_seller_phone_seller` (`seller_id`),
	CONSTRAINT `FK_seller_phone_seller` FOREIGN KEY (`seller_id`) REFERENCES `seller` (`id`) ON UPDATE CASCADE ON DELETE CASCADE
)
COLLATE=\'utf8_general_ci\'
ENGINE=InnoDB');
	    $this->execute('CREATE TABLE IF NOT EXISTS `source` (
	`id` INT(11) UNSIGNED NOT NULL AUTO_INCREMENT,
	`name` VARCHAR(64) NOT NULL,
	`shortname` VARCHAR(32) NOT NULL,
	`url` VARCHAR(64) NOT NULL,
	`status` ENUM(\'Active\',\'Blocked\',\'Deleted\') NOT NULL DEFAULT \'Active\',
	`changed` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
	PRIMARY KEY (`id`)
)
COLLATE=\'utf8_general_ci\'
ENGINE=InnoDB');
	    $this->execute('CREATE TABLE IF NOT EXISTS `advert` (
	`id` INT(11) UNSIGNED NOT NULL AUTO_INCREMENT,
	`type` VARCHAR(12) NOT NULL,
	`address_id` INT(10) UNSIGNED NOT NULL,
	`floor` INT(10) UNSIGNED NULL DEFAULT NULL,
	`floor_max` INT(10) UNSIGNED NULL DEFAULT NULL,
	`space_total` INT(10) UNSIGNED NULL DEFAULT NULL,
	`space_living` INT(10) UNSIGNED NULL DEFAULT NULL,
	`space_cookroom` INT(10) UNSIGNED NULL DEFAULT NULL,
	`balcony` INT(10) UNSIGNED NULL DEFAULT NULL,
	`phone` ENUM(\'yes\',\'no\') NULL DEFAULT NULL,
	`steel_door` ENUM(\'yes\',\'no\') NULL DEFAULT NULL,
	`information` TEXT NOT NULL,
	`exchange` ENUM(\'yes\',\'no\') NULL DEFAULT NULL,
	`price` INT(11) NOT NULL,
	`seller_id` INT(10) UNSIGNED NOT NULL,
	`source_code` VARCHAR(16) NOT NULL,
	`source_id` INT(11) NOT NULL,
	`url` VARCHAR(256) NOT NULL,
	`created` TIMESTAMP NULL DEFAULT NULL,
	`expired` INT(11) NOT NULL,
	`status` ENUM(\'Active\',\'Blocked\',\'Deleted\') NOT NULL DEFAULT \'Active\',
	`changed` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
	PRIMARY KEY (`id`),
	INDEX `FK_advert_address` (`address_id`),
	INDEX `FK_advert_seller` (`seller_id`),
	CONSTRAINT `FK_advert_address` FOREIGN KEY (`address_id`) REFERENCES `address` (`id`) ON UPDATE CASCADE ON DELETE CASCADE,
	CONSTRAINT `FK_advert_seller` FOREIGN KEY (`seller_id`) REFERENCES `seller` (`id`) ON UPDATE CASCADE ON DELETE CASCADE
)
COLLATE=\'utf8_general_ci\'
ENGINE=InnoDB');
	    $this->execute('CREATE TABLE IF NOT EXISTS `user` (
	`id` INT(10) UNSIGNED NOT NULL AUTO_INCREMENT,
	`type` ENUM(\'user\',\'manager\',\'admin\') NOT NULL DEFAULT \'user\',
	`email` VARCHAR(50) NOT NULL,
	`phone` BIGINT(20) UNSIGNED NULL DEFAULT NULL,
	`password` VARCHAR(50) NOT NULL,
	`created` TIMESTAMP NOT NULL,
		`status` ENUM(\'Active\',\'Blocked\',\'Deleted\') NOT NULL DEFAULT \'Active\',
	`changed` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
	PRIMARY KEY (`id`),
	UNIQUE INDEX `email` (`email`)
)
COLLATE=\'utf8_general_ci\'
ENGINE=InnoDB');
	}

	public function down()
	{
		echo "m200126_103844_init_tables does not support migration down.\n";
		return false;
	}

	/*
	// Use safeUp/safeDown to do migration with transaction
	public function safeUp()
	{
	}

	public function safeDown()
	{
	}
	*/
}