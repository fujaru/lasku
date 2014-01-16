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
		p.note {
			font-size: 0.9em;
			color: #888;
		}
	</style>
</head>

<body>
	<?php include INSTPATH.'views/templates/header-plain'.EXT; ?>
	
	<div id="CenterPanel"><div class="wrapper">
		<h1>Take a Break</h1>
		<p>
			The website you're viewing is currently under maintenance. 
			We apologize for any inconvenience caused.<br />
			Please come again later!
		</p>
		
		<p class="note">
			<b>Note for Administrators:</b>
			If you unintentionally seeing this message, you might have 
			not disabled the installer script. Please consult user 
			documentation for more information.
		</p>
		
		<p><small>&copy; 2014 Fajar Chandra.</small></p>
	</div></div><!--#CenterPanel-->
	
	<?php include INSTPATH.'views/templates/footer'.EXT; ?>
</body>

</html>
