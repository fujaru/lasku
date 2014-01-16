<?php defined('SYSPATH') or die('No direct script access.');


/* BEGIN TESTING */

$tests = array();
$releases = include INSTPATH.'releases'.EXT;
$ver_exists = false;

// Current Lasku Version
$tests['version'] = array(
	'label' => "Existing Lasku Installation",
);
if(!file_exists(APPPATH.'config/lasku.version'.EXT)) {
	$tests['version']['value'] = 'Not Found';
}
elseif(version_compare(include APPPATH.'config/lasku.version'.EXT, end($releases), '<=')) {
	$ver_exists = true;
	$ver_now = include APPPATH.'config/lasku.version'.EXT;
	$ver_new = end($releases);
	if($ver_now == $ver_new) {
		$tests['version']['value'] = "{$ver_now} to be reinstalled with the same version";
	}
	else {
		$tests['version']['value'] = "{$ver_now} to be upgraded to {$ver_new}";
	}
}
else {
	$ver_now = include APPPATH.'config/lasku.version'.EXT;
	$ver_new = end($releases);
	$tests['version']['error'] = true;
	$tests['version']['value'] = "Currently installed version {$ver_now} is newer than the latest version provided by this installer {$ver_new}";
}

// PHP version
$tests['php'] = array(
	'label' => "PHP Version",
);
if(version_compare(PHP_VERSION, '5.3.3', '>=')) {
	$tests['php']['value'] = PHP_VERSION;
}
else {
	$tests['php']['error'] = true;
	$tests['php']['value'] = "Lasku requires PHP version 5.3.3 or newer, this version is ".PHP_VERSION;
}

// Installer file
$tests['installer'] = array(
	'label' => "Installer Script",
);
if(is_dir(DOCROOT) AND file_exists(DOCROOT.'install'.EXT) AND is_writable(DOCROOT.'install'.EXT)) {
	$tests['installer']['value'] = DOCROOT.'install'.EXT;
}
else {
	$tests['installer']['error'] = true;
	$tests['installer']['value'] = "File <code>".DOCROOT.'install'.EXT."</code> is not writable.";
}

// Config dir
$tests['config'] = array(
	'label' => "Config Directory",
);
if(is_dir(APPPATH) AND is_dir(APPPATH.'config') AND is_writable(APPPATH.'config')) {
	$tests['config']['value'] = APPPATH.'config';
}
else {
	$tests['config']['error'] = true;
	$tests['config']['value'] = "Directory <code>".APPPATH.'config'."</code> is not writable.";
}

// Cache dir
$tests['cache'] = array(
	'label' => "Cache Directory",
);
if(is_dir(APPPATH) AND is_dir(APPPATH.'cache') AND is_writable(APPPATH.'cache')) {
	$tests['cache']['value'] = APPPATH.'cache';
}
else {
	$tests['cache']['error'] = true;
	$tests['cache']['value'] = "Directory <code>".APPPATH.'cache'."</code> is not writable.";
}

// Logs dir
$tests['logs'] = array(
	'label' => "Logs Directory",
);
if(is_dir(APPPATH) AND is_dir(APPPATH.'logs') AND is_writable(APPPATH.'logs')) {
	$tests['logs']['value'] = APPPATH.'logs';
}
else {
	$tests['logs']['error'] = true;
	$tests['logs']['value'] = "Directory <code>".APPPATH.'logs'."</code> is not writable.";
}

// PCRE UTF-8
$tests['pcre'] = array(
	'label' => "PCRE UTF-8",
);
if(! @preg_match('/^.$/u', 'ñ')) {
	$tests['pcre']['error'] = true;
	$tests['pcre']['value'] = '<a href="http://php.net/pcre">PCRE</a> has not been compiled with UTF-8 support.';
}
elseif (! @preg_match('/^\pL$/u', 'ñ')) {
	$tests['pcre']['error'] = true;
	$tests['pcre']['value'] = '<a href="http://php.net/pcre">PCRE</a> has not been compiled with Unicode support.';
}
else {
	$tests['pcre']['value'] = 'Enabled';
}

// MySQLi
$tests['mysqli'] = array(
	'label' => "MySQLi Extension",
);
if(function_exists('mysqli_connect')) {
	$tests['mysqli']['value'] = 'Loaded';
}
else {
	$tests['mysqli']['error'] = true;
	$tests['mysqli']['value'] = 'The <a href="http://php.net/mysqli">MySQLi</a> extension is either not loaded or not compiled in.';
}

// SPL
$tests['spl'] = array(
	'label' => "SPL",
);
if(function_exists('spl_autoload_register')) {
	$tests['spl']['value'] = 'Loaded';
}
else {
	$tests['spl']['error'] = true;
	$tests['spl']['value'] = 'PHP <a href="http://www.php.net/spl">SPL</a> is either not loaded or not compiled in.';
}

// Reflection
$tests['reflection'] = array(
	'label' => "Reflection Class",
);
if(class_exists('ReflectionClass')) {
	$tests['reflection']['value'] = 'Loaded';
}
else {
	$tests['reflection']['error'] = true;
	$tests['reflection']['value'] = 'PHP <a href="http://www.php.net/reflection">reflection</a> is either not loaded or not compiled in.';
}

// Filters
$tests['filter'] = array(
	'label' => "Filters",
);
if(function_exists('filter_list')) {
	$tests['filter']['value'] = 'Loaded';
}
else {
	$tests['filter']['error'] = true;
	$tests['filter']['value'] = 'The <a href="http://www.php.net/filter">filter</a> extension is either not loaded or not compiled in.';
}

// Iconv
$tests['iconv'] = array(
	'label' => "Iconv Extension",
);
if(extension_loaded('iconv')) {
	$tests['iconv']['value'] = 'Loaded';
}
else {
	$tests['iconv']['error'] = true;
	$tests['iconv']['value'] = 'The <a href="http://php.net/iconv">iconv</a> extension is not loaded.';
}

// Mbstring not overloaded
if (extension_loaded('mbstring')) {
	$tests['mbstring'] = array(
		'label' => "Mbstring Not Overloaded",
	);
	if(ini_get('mbstring.func_overload') & MB_OVERLOAD_STRING) {
		$tests['mbstring']['error'] = true;
		$tests['mbstring']['value'] = 'The <a href="http://php.net/mbstring">mbstring</a> extension is overloading PHP\'s native string functions.';
	}
	else {
		$tests['mbstring']['value'] = 'Pass';
	}
}

// Ctype
$tests['ctype'] = array(
	'label' => "Character Type (CTYPE) Extension",
);
if(! function_exists('ctype_digit')) {
	$tests['ctype']['error'] = true;
	$tests['ctype']['value'] = 'The <a href="http://php.net/ctype">ctype</a> extension is not enabled.';
}
else {
	$tests['ctype']['value'] = 'Enabled';
}

// URI Determination
$tests['uri'] = array(
	'label' => "URI Determination",
);
if(isset($_SERVER['REQUEST_URI']) OR isset($_SERVER['PHP_SELF']) OR isset($_SERVER['PATH_INFO'])) {
	$tests['uri']['value'] = 'Pass';
}
else {
	$tests['uri']['error'] = true;
	$tests['uri']['value'] = "Neither <code>\$_SERVER['REQUEST_URI']</code>, <code>\$_SERVER['PHP_SELF']</code>, or <code>\$_SERVER['PATH_INFO']</code> is available.";
}

/* CONFIGURATIONS */

$init_defaults = array(
	'base_url' => BASEURL,
	'index_file' => 'index.php',
);
if($ver_exists AND file_exists(APPPATH.'config/bootstrap.init'.EXT)) {
	$init_own = include APPPATH.'config/bootstrap.init'.EXT;
	$init_defaults = array_merge($init_defaults, $init_own);
}
$init = array_merge($init_defaults, @isset($_POST['init']) ? $_POST['init'] : array());
$database_defaults = array(
	'hostname' => 'localhost',
	'username' => 'root',
	'password' => '',
	'database' => 'lasku',
);
if($ver_exists AND file_exists(APPPATH.'config/database'.EXT)) {
	$database_own = include APPPATH.'config/database'.EXT;
	$database_defaults = array_merge($database_defaults, $database_own['default']['connection']);
}
$database = array_merge($database_defaults, @isset($_POST['database']) ? $_POST['database'] : array());

$timezone = include INSTPATH.'defaults/bootstrap.timezone'.EXT;
if($ver_exists AND file_exists(APPPATH.'config/bootstrap.timezone'.EXT)) {
	$timezone = include APPPATH.'config/bootstrap.timezone'.EXT;
}

// Get timezone lise
$timezones = include INSTPATH.'defaults/timezones'.EXT;

// Render
include INSTPATH.'views/test'.EXT;
