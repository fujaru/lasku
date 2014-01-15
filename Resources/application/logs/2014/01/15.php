<?php defined('SYSPATH') OR die('No direct script access.'); ?>

2014-01-15 04:29:11 --- EMERGENCY: Kohana_Exception [ 0 ]: A valid cookie salt is required. Please set Cookie::$salt in your bootstrap.php. For more information check the documentation ~ SYSPATH/classes/Kohana/Cookie.php [ 151 ] in /home/fajar/Projects/Doublejar/lasku/Resources/system/classes/Kohana/Cookie.php:67
2014-01-15 04:29:11 --- DEBUG: #0 /home/fajar/Projects/Doublejar/lasku/Resources/system/classes/Kohana/Cookie.php(67): Kohana_Cookie::salt('PHPSESSID', NULL)
#1 /home/fajar/Projects/Doublejar/lasku/Resources/system/classes/Kohana/Request.php(151): Kohana_Cookie::get('PHPSESSID')
#2 /home/fajar/Projects/Doublejar/lasku/Resources/index.php(117): Kohana_Request::factory(true, Array, false)
#3 {main} in /home/fajar/Projects/Doublejar/lasku/Resources/system/classes/Kohana/Cookie.php:67