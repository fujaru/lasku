<?php

// Workaround to load auth config.
class Session {
	public static $default = NULL;
}
$auth_conf = include MODPATH.'lasku/config/auth'.EXT;

$admin_password = hash_hmac($auth_conf['hash_method'], 'admin', $auth_conf['hash_key']);

$pdo->exec("
	INSERT INTO `user` (
		email, password, full_name, is_admin
	) VALUES (
		'admin@{$_SERVER['HTTP_HOST']}',
		'{$admin_password}',
		'System Administrator',
		1
	)
");
