<?php defined('SYSPATH') or die('No direct script access.');

require_once INSTPATH.'helpers/config'.EXT;

$releases = include INSTPATH.'releases'.EXT;

$admin_user = "admin@".$_SERVER['HTTP_HOST'];
$admin_pass = "admin";

$pdo = null;

/**
 * Execute SQL queries using native mysql client with shell_exec
 * 
 * @param array Parameters containing hostname, username, password, and database
 * @param string Path of SQL file
 * @return string
 */
function query_mysql(array $params, $input_file)
{
	return shell_exec("mysql --host=\"{$params['hostname']}\" --user=\"{$params['username']}\" --password=\"{$params['password']}\" \"{$params['database']}\" < \"{$input_file}\"");
}

/**
 * Execute SQL queries using PHP PDO
 * 
 * @param array Parameters containing hostname, username, password, and database
 * @param string Path of SQL file
 * @return PDOStatement
 */
function query_pdo(array $params, $input_file)
{
	pdo_connect($params);
	
	$sql = file_get_contents($input_file);
	return $pdo->exec($sql);
}

function pdo_connect($params) {
	global $pdo;
	
	if($pdo != null)
		return false;
		
	echo "Connecting to database `{$params['database']}` as `{$params['username']}@{$params['hostname']}`...";
	$dsn = "mysql:dbname={$params['database']};host={$params['hostname']}";
	$pdo = new pdo($dsn, $params['username'], $params['password']);
	return $pdo;
}

/**
 * Execute upgrades
 *
 * @return null
 */
function execute()
{
	global $pdo, $releases;
	
	$params = array();
	$conf_database = include APPPATH.'config/database'.EXT;
	$params = $conf_database['default']['connection'];
	
	// Setup connection
	//pdo_connect();
	
	// Try to use mysql program from shell
	if(function_exists('shell_exec')) {
		$query_method = 'query_mysql';
		echo "Using native MySQL driver.\n";
	}
	// If not available, use PDO
	else {
		$query_method = 'query_pdo';
		echo "Using PDO driver.\n";
	}
	
	// Check current version number and index
	$ver_now = include APPPATH.'config/lasku.version'.EXT;
	$ver_start = 0;
	foreach($releases as $ver_index => $ver_name) {
		if(version_compare($ver_now, $ver_name, '<')) {
			$ver_start = $ver_index;
			break;
		}
	}
	
	// Do upgrades
	echo "Upgrading from {$ver_now} to ".end($releases)."...\n";
	
	for($i = $ver_start; $i < count($releases); $i++) {
		$skipped = true;
		echo "{$releases[$i]}";
		
		// Pre-PHP script
		if(file_exists(INSTPATH.'upgrades/'.$releases[$i].'.pre'.EXT)) {
			call_user_func(function($i) {
				global $releases;
				include INSTPATH.'upgrades/'.$releases[$i].'.pre'.EXT;
			}, $i);
			$skipped = false;
			echo " PRE";
		}
		
		// SQL script
		if(file_exists(INSTPATH.'upgrades/'.$releases[$i].'.sql')) {
			$query_method($params, INSTPATH.'upgrades/'.$releases[$i].'.sql');
			$skipped = false;
			echo " SQL";
		}
		
		// Post-PHP script
		if(file_exists(INSTPATH.'upgrades/'.$releases[$i].'.post'.EXT)) {
			call_user_func(function($i) {
				global $releases;
				include INSTPATH.'upgrades/'.$releases[$i].'.post'.EXT;
			}, $i);
			$skipped = false;
			echo " POST";
		}
		
		if($skipped) {
			echo " - skipped\n";
		}
		else {
			echo " - OK\n";
		}
	}
}

ob_start();
execute();
ob_end_clean();

// Update version tag
write_config(APPPATH.'config/lasku.version'.EXT, end($releases), "VERSION STORED TO MAINTAIN UPGRADES -- DO NOT CHANGE");

// Disable Installer
$installer_disabled = @rename(DOCROOT.'install'.EXT, DOCROOT.'install.bak'.EXT);

// Render
include INSTPATH.'views/finish'.EXT;
