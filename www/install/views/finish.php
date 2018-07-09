<?php
$step = 'finish';
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
			max-width: 500px;
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
			Congratulations! Lasku <?=end($releases)?> has been successfully installed on your 
			system. You may now login to the application.
		</p>
		
		<p>
			First time login can be done using 
			the following user: <br />
			Username: <b><code><?=$admin_user?></code></b> &nbsp;
			Password: <b><code><?=$admin_pass?></code></b>
		</p>
		
		<p>
			Don't forget to change the password once you're logged in.
		</p>
		
		<?php if($installer_disabled) : ?>
			<p>
				<b>Note:</b> The installer script is now disabled. Please consult 
				<a href="<?=BASEURL?>docs">User Documentation</a> for details 
				if you want to rerun the installation script again.
			</p>
		<?php else : ?>
			<p>
				<b>Note:</b> Seems like we couldn't automatically disable the installer. 
				You will need to manually remove <b>/install.php</b> 
				file before you can login.
			</p>
		<?php endif; ?>
		
		<form action="<?=BASEURL?>" method="post">
			<p><input type="submit" value="Go to Login Page" /></p>
		</form>
		
		<p><small>&copy; 2014 Fajar Chandra.</small></p>
	</div></div><!--#CenterPanel-->
	
	<?php include INSTPATH.'views/templates/footer'.EXT; ?>
</body>

</html>
