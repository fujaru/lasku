<?php
// Define constants
// Don't forget trailing slash
define('BASEPATH', __DIR__.'/');
define('SYSPATH', BASEPATH.'system/');
define('BASEURL', preg_replace('/^(.*\\/)[^\\/]*$/', '$1', $_SERVER['SCRIPT_NAME']));
define('EXT', '.php');

// Lasku version
define('VERSION', trim(file_get_contents(SYSPATH.'VERSION')));

// Load libraries
require_once SYSPATH.'classes/Parsedown'.EXT;

// Load global contents
$menu_md = file_get_contents(BASEPATH.'pages/menu.md');
$menu_content = Parsedown::instance()->parse($menu_md);
$menu_content = preg_replace("/href=\"([^:\\.]*?)\"/", 'href="'.BASEURL.'index.php/$1"', $menu_content);

// Load page contents
$page_file = (isset($_SERVER['PATH_INFO']) AND trim($_SERVER['PATH_INFO']) != '/') ? $_SERVER['PATH_INFO'] : 'index';
if(!file_exists(BASEPATH."pages/{$page_file}.md")) {
	http_response_code(404);
	$page_file = 'error/404';
}
$page_md = file_get_contents(BASEPATH."pages/{$page_file}.md");
$page_content = Parsedown::instance()->parse($page_md);

// Path info
$path_info = isset($_SERVER['PATH_INFO']) ? $_SERVER['PATH_INFO'] : '/';

include SYSPATH.'views/index'.EXT;
