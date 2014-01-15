<?php
$step = 'test';
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
	"http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">

<head>
	<?php include INSTPATH.'views/templates/meta'.EXT; ?>
</head>

<body>
	<?php include INSTPATH.'views/templates/header'.EXT; ?>
	
	<h1>Lasku Installation</h1>
	<p>
		Welcome to Lasku Online Invoicing System. This installation script will guide you to 
		install Lasku on your system.
	</p>
	
	<h2>Environment Tests</h2>
	<p>
		The following tests have been performed to determine if Lasku will 
		work in your environment. If any of the tests have failed, consult 
		the documentation for more information on how to correct the problem.
	</p>
	
	<table class="table">
		<?php foreach($tests as $test) : ?>
			<tr>
				<td><?=$test['label']?></td>
				<td class="<?= @$test['error'] ? 'error' : 'success' ?>"><?=$test['value']?></td>
			</tr>
		<?php endforeach; ?>
	</table>
	
	<h2>Basic Configurations</h2>
	<p><i>
		An existing installation of Lasku is found. We will try to reuse 
		its configurations. If you want to change the settings, you can 
		do it here.
	</i></p>
	<p>
		The following are basic configuration options required to install 
		Lasku. While these configuration options are most likely unchanged 
		at all, you could find them in several files under 
		<b>/application/config</b> directory if you wish to change them 
		later.
	</p>
	
	<form method="post">
		<input type="hidden" name="action" value="preinst" />
		
		<table class="form">
			<tr>
				<th>Base URL</th>
				<td>http://<?=$_SERVER['HTTP_HOST']?><input type="text" name="init[base_url]" value="<?=$init['base_url']?>" /></td>
			</tr>
			<tr>
				<td colspan="2"><hr /></td>
			</tr>
			<tr>
				<th>Database Hostname</th>
				<td><input type="text" name="database[hostname]" value="localhost" /></td>
			</tr>
			<tr>
				<th>Database Username</th>
				<td><input type="text" name="database[username]" value="" /></td>
			</tr>
			<tr>
				<th>Database Password</th>
				<td><input type="password" name="database[password]" value="" /></td>
			</tr>
			<tr>
				<th>Database Name</th>
				<td><input type="text" name="database[database]" value="" /></td>
			</tr>
		</table>
		
		<p>
			<input type="submit" value="Begin Installation/Upgrade" />
			<input type="reset" value="Reset Configuration" />
		</p>
	
	</form>
	
	<?php include INSTPATH.'views/templates/footer'.EXT; ?>
</body>

</html>
