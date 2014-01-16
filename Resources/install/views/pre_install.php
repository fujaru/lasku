<?php
$step = 'install';
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
	<script type="text/javascript">
		function onload() {
			setTimeout(function() {
				document.forms['InstallForm'].submit();
			}, 1000);
		}
	</script>
</head>

<body onload="onload();">
	<?php include INSTPATH.'views/templates/header'.EXT; ?>
	
	<div id="CenterPanel"><div class="wrapper">
		
		<h1>Lasku Installation</h1>
		<p>
			Installing/upgrading Lasku <?=end($releases)?>. Please be patient...
		</p>
		
		<form name="InstallForm" method="post">
			<input type="hidden" name="action" value="install" />
		</form>
		
	</div></div><!--#CenterPanel-->
	
	<?php include INSTPATH.'views/templates/footer'.EXT; ?>
</body>

</html>
