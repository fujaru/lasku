<?php defined('SYSPATH') or die('No direct script access.');

$releases = include INSTPATH.'releases'.EXT;

$admin_user = "admin@".$_SERVER['HTTP_HOST'];
$admin_pass = "admin";

// Render
include INSTPATH.'views/finish'.EXT;
