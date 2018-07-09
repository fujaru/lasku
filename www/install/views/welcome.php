<?php
$step = 'welcome';
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
	"http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">

<head>
	<?php include INSTPATH.'views/templates/meta'.EXT; ?>
	<style type="text/css">
		#CenterPanel {
			display: table;
			height: 100%;
			width: 100%;
			max-width: 400px;
			margin: auto;
		}
		#CenterPanel .wrapper {
			display: table-cell;
			vertical-align: middle;
			text-align: center;
		}
		small {
			color: #aaa;
		}
	</style>
</head>

<body>
	<?php include INSTPATH.'views/templates/header'.EXT; ?>
	
	<div id="CenterPanel"><div class="wrapper">
		<h1>Lasku Installation</h1>
		<p>
			Welcome to Lasku Online Invoicing System. This installation script will guide you to 
			install/upgrade Lasku on your system.
		</p>
		
		<form method="post">
			<input type="hidden" name="action" value="test" />
			<p><input type="submit" value="Continue" /></p>
		</form>
		
		<p><small>&copy; 2014 Fajar Chandra.</small></p>
	</div></div><!--#CenterPanel-->
	
	<?php include INSTPATH.'views/templates/footer'.EXT; ?>
</body>

</html>
