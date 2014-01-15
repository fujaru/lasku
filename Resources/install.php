<?php
// Sanity check, install should only be checked from index.php
defined('SYSPATH') or exit('Installation must be loaded from within index.php!');

/**
 * Lasku Installation Script
 * 
 * This script will guide users to easily install/upgrade Lasku on 
 * Web Servers. Basically the installation process consists of 3 steps:
 * 
 * 1. Environment tests and configurations
 * 2. Installation/upgrades
 * 3. Post-screen
 */

// Check install dir
if(is_dir(__DIR__.'/install/'))
	define('INSTPATH', __DIR__.'/install/');
else 
	exit('Installation directory does not exists!');

// Check action
switch(@$_POST['action']) {
	// Welcome screen, 
	case 'welcome':
	default:
		require INSTPATH.'actions/welcome'.EXT;
		break;
		
	// Environment tests and configuration options
	case 'test':
		require INSTPATH.'actions/test'.EXT;
		break;
		
	// Pre-install
	case 'preinst':
		require INSTPATH.'actions/pre_install'.EXT;
		break;
		
}
