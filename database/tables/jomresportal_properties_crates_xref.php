<?php
/**
 * Core file.
 *
 * @author Vince Wooll <sales@jomres.net>
 *
 * @version Jomres 9.23.5
 *
 * @copyright	2005-2020 Vince Wooll
 * Jomres (tm) PHP, CSS & Javascript files are released under both MIT and GPL2 licenses. This means that you can choose the license that best suits your project, and use it accordingly
 **/

// ################################################################
defined('_JOMRES_INITCHECK') or die('');
// ################################################################
/**
 *
 * @package Jomres\Core\Database
 *
 * Database creation during installation
 *
 **/
$query = "
CREATE TABLE IF NOT EXISTS `#__jomresportal_properties_crates_xref` (
	`id` INT UNSIGNED NOT NULL AUTO_INCREMENT,
	`property_id` INT UNSIGNED NOT NULL DEFAULT 0,
	`crate_id` INT UNSIGNED NOT NULL DEFAULT 0,
	PRIMARY KEY(`id`),
	INDEX `property_id` (`property_id`)
	)
	ENGINE = MyISAM
	DEFAULT CHARSET = utf8mb4 
	COLLATE = utf8mb4_unicode_ci;
";

if (!doInsertSql($query)) {
	$this->setMessage('Error, unable to create the #__jomresportal_properties_crates_xref table', 'danger');
}
