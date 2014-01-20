<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
	"http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">

<head>
	<title><?=APP_NAME?> &bull; Login</title>
	<?php include Kohana::find_file('views', 'templates/plain/meta'); ?>
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
<link type="text/css" rel="stylesheet" href="<?=Skin::css('session/login')?>" />
</head>

<body>
	<?php include Kohana::find_file('views', 'templates/plain/header'); ?>
	
	<?=Form::open()?>
		<?=Form::hidden('referrer', $referrer)?>
	
		<div id="LoginFormContainer"><div class="wrapper">
			<table class="form">
				<tr>
					<th><?=Form::label('email', 'Email')?></th>
					<td><?=Form::input('email', null, array('class' => 'full-width'))?></td>
				</tr>
				<tr>
					<th><?=Form::label('password', 'Password')?></th>
					<td><?=Form::password('password', null, array('class' => 'full-width'))?></td>
				</tr>
				<tr>
					<td></td>
					<td>
						<?=Form::submit(null, 'Login')?>
					</td>
				</tr>
			</table>
		</div></div><!--#LoginFormContainer-->
	
	<?=Form::close()?>
	
	<?php include Kohana::find_file('views', 'templates/plain/footer'); ?>
</body>

</html>
