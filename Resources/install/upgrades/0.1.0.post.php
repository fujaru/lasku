<?php

$pdo->exec("
	INSERT INTO `user` (
		email, password, full_name, is_admin
	) VALUES (
		'admin@{$_SERVER['HTTP_HOST']}',
		MD5('admin'),
		'System Administrator',
		1
	)
");
