<?php
/**
 * Leo bootstrap menu Module
 * 
 * @version		$Id: file.php $Revision
 * @package		modules
 * @subpackage	$Subpackage.
 * @copyright	Copyright (C) September 2012 LeoTheme.Com <@emai:leotheme@gmail.com>.All rights reserved.
 * @license		GNU General Public License version 2
 */
 
/* REQUIRED */
if (!defined('_PS_VERSION_'))
	exit;
include_once('/../../../config/config.inc.php');
include_once('/../../../init.php');

$res = (bool)Db::getInstance()->execute('
	CREATE TABLE IF NOT EXISTS `'._DB_PREFIX_.'btmegamenu` (
	  `id_btmegamenu` int(11) NOT NULL AUTO_INCREMENT,
	  `image` varchar(255) NOT NULL,
	  `id_parent` int(11) NOT NULL,
	  `is_group` tinyint(1) NOT NULL,
	  `width` varchar(255) DEFAULT NULL,
	  `submenu_width` varchar(255) DEFAULT NULL,
	  `colum_width` varchar(255) DEFAULT NULL,
	  `submenu_colum_width` varchar(255) DEFAULT NULL,
	  `item` varchar(255) DEFAULT NULL,
	  `colums` varchar(255) DEFAULT NULL,
	  `type` varchar(255) NOT NULL,
	  `is_content` tinyint(1) NOT NULL,
	  `show_title` tinyint(1) NOT NULL,
	  `type_submenu` varchar(10) NOT NULL,
	  `level_depth` smallint(6) NOT NULL,
	  `active` tinyint(1) NOT NULL,
	  `position` int(11) NOT NULL,
	  `show_sub` tinyint(1) NOT NULL,
	  `url` varchar(255) DEFAULT NULL,
	  `target` varchar(25) DEFAULT NULL,
	  `privacy` smallint(6) DEFAULT NULL,
	  `position_type` varchar(25) DEFAULT NULL,
	  `menu_class` varchar(25) DEFAULT NULL,
	  `content` text,
	  `submenu_content` text,
	  `level` int(11) NOT NULL,
	  `left` int(11) NOT NULL,
	  `right` int(11) NOT NULL,
	  `date_add` datetime DEFAULT NULL,
	  `date_upd` datetime DEFAULT NULL,
	  PRIMARY KEY (`id_btmegamenu`)
	) ENGINE='._MYSQL_ENGINE_.'  DEFAULT CHARSET=utf8;
');
$res &= (bool)Db::getInstance()->execute('
	CREATE TABLE IF NOT EXISTS `'._DB_PREFIX_.'btmegamenu_lang` (
	  `id_btmegamenu` int(11) NOT NULL,
	  `id_lang` int(11) NOT NULL,
	  `title` varchar(255) DEFAULT NULL,
	  `description` text,
	  `content_text` text,
	  `submenu_content_text` text,
	  PRIMARY KEY (`id_btmegamenu`,`id_lang`)
	) ENGINE='._MYSQL_ENGINE_.' DEFAULT CHARSET=utf8;
');
$res &= (bool)Db::getInstance()->execute('
	CREATE TABLE IF NOT EXISTS `'._DB_PREFIX_.'btmegamenu_shop` (
	  `id_btmegamenu` int(11) NOT NULL DEFAULT \'0\',
	  `id_shop` int(11) NOT NULL DEFAULT \'0\',
	  PRIMARY KEY (`id_btmegamenu`,`id_shop`)
	) ENGINE='._MYSQL_ENGINE_.' DEFAULT CHARSET=utf8;
');
/* */
$res &= (bool)Db::getInstance()->execute('
	INSERT INTO `'._DB_PREFIX_.'btmegamenu`(`image`,`id_parent`,`is_group`,`colums`) VALUES(\'\', 0, 1, 1)
');
foreach($this->_languages as $lang){
	$res &= (bool)Db::getInstance()->execute('
		INSERT INTO `'._DB_PREFIX_.'btmegamenu_lang`(`id_btmegamenu`,`id_lang`,`title`) VALUES(1, '.(int)$lang['id_lang'].', \'Root\')
	');
}
$res &= (bool)Db::getInstance()->execute('
	INSERT INTO `'._DB_PREFIX_.'btmegamenu_shop`(`id_btmegamenu`,`id_shop`) VALUES( 1, '.(int)($this->context->shop->id).' )
');
/* END REQUIRED */


