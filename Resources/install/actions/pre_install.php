<?php defined('SYSPATH') or die('No direct script access.');

require_once INSTPATH.'helpers/config'.EXT;

$releases = include INSTPATH.'releases'.EXT;

// Check existing installation and apply basic configurations

if(!file_exists(APPPATH.'config/lasku.version'.EXT)) {
	$init_def = include INSTPATH.'defaults/bootstrap.init'.EXT;
	$init = array_merge($init_def, @$_POST['init']);
	write_config(APPPATH.'config/bootstrap.init'.EXT, $init);
	
	$timezone_def = include INSTPATH.'defaults/bootstrap.timezone'.EXT;
	$timezone = @$_POST['timezone'];
	write_config(APPPATH.'config/bootstrap.timezone'.EXT, $timezone);
	
	$database_def = include INSTPATH.'defaults/database'.EXT;
	$database = $database_def;
	$database['default']['connection'] = array_merge($database['default']['connection'], @$_POST['database']);
	write_config(APPPATH.'config/database'.EXT, $database);
	
	write_config(APPPATH.'config/lasku.version'.EXT, '0', "VERSION STORED TO MAINTAIN UPGRADES -- DO NOT CHANGE");
	
	write_config(APPPATH.'config/lasku.installer'.EXT, array('install-key' => substr(md5(time().rand(0, 1000)), 0, 8)));
}
elseif(isset($_POST['force-reconf'])) {
	$init_def = include INSTPATH.'defaults/bootstrap.init'.EXT;
	$init_own = include APPPATH.'config/bootstrap.init'.EXT;
	$init = array_merge($init_def, $init_own, @$_POST['init']);
	write_config(APPPATH.'config/bootstrap.init'.EXT, $init);
	
	$timezone_def = include INSTPATH.'defaults/bootstrap.timezone'.EXT;
	$timezone_own = include APPPATH.'config/bootstrap.timezone'.EXT;
	$timezone = @$_POST['timezone'];
	write_config(APPPATH.'config/bootstrap.timezone'.EXT, $timezone);
	
	$database_def = include INSTPATH.'defaults/database'.EXT;
	$database_own = include APPPATH.'config/database'.EXT;
	$database = array_merge($database_def, $database_own);
	$database['default']['connection'] = array_merge($database['default']['connection'], @$_POST['database']);
	write_config(APPPATH.'config/database'.EXT, $database);
}

// Render
include INSTPATH.'views/pre_install'.EXT;
