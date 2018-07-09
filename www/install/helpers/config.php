<?php defined('SYSPATH') or die('No direct script access.');

function write_config($filename, $options, $comments = null) {
	$file = "<?php defined('SYSPATH') or die('No direct script access.');\n";
	if($comments != null) {
		$file .= "/*************************************************** \n\n";
		$file .= "{$comments}\n\n";
		$file .= " ***************************************************/\n";
	}
	$file .= 'return ' . var_export($options, true) . ";\n";
	file_put_contents($filename, $file);
}
