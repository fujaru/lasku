<?php defined('SYSPATH') OR die('No direct access allowed.');
return array(

	'driver'       => 'Lasku',
	'hash_method'  => 'md5',
	'hash_key'     => 'laskuyo',
	'lifetime'     => 1209600,
	'session_type' => Session::$default,
	'session_key'  => 'auth_user',

);
