<?php $menu = 'client'; ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
	"http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">

<head>
	<title><?=APP_NAME?> &bull; Edit Company</title>
	<?php include Kohana::find_file('views', 'templates/default/meta'); ?>
	<link type="text/css" rel="stylesheet" href="<?=Skin::css('company/edit')?>" />
	<script type="text/javascript">
		$(function() {
			$('#CancelBtn').click(function() { 
				location.href = "<?=$referrer?>";
				return false;
			});
		});
	</script>
</head>

<body>
	<?php include Kohana::find_file('views', 'templates/default/header'); ?>
	
	<div id="TopBar">
		<div class="left-panel">
			<h1>Edit Company</h1>
		</div>
		
		<div class="right-panel">
		</div>
	</div><!--#TopBar-->
	
	<?=Form::open()?>
	
	<?=Form::hidden('referrer', $referrer)?>
	
	<div id="MidPanel" class="has-top has-bottom">
		<?php if(isset($errors)) : ?>
			<div class="error-box">
				<?php foreach($errors as $error) : ?>
				<div><?=$error?></div>
				<?php endforeach; ?>
			</div>
		<?php endif; ?>
		
		<fieldset class="BasicInfo clear-both">
			<legend>Basic Information</legend>
			<table class="form">
				<tr>
					<th>Name</th>
					<td><?=Form::input('name', @$post['name'])?></td>
				</tr>
				<tr>
					<th>Address</th>
					<td><?=Form::input('address1', @$post['address1'])?></td>
				</tr>
				<tr>
					<td></td>
					<td><?=Form::input('address2', @$post['address2'])?></td>
				</tr>
				<tr>
					<th>City</th>
					<td><?=Form::input('city', @$post['city'])?></td>
				</tr>
				<tr>
					<th>State / Province</th>
					<td><?=Form::input('state', @$post['state'])?></td>
				</tr>
				<tr>
					<th>Zip / Postal Code</th>
					<td><?=Form::input('zip', @$post['zip'], array('maxlength' => 15))?></td>
				</tr>
				<tr>
					<th>Country</th>
					<td><?=Form::input('country', @$post['country'])?></td>
				</tr>
			</table>
		</fieldset>
		
		<fieldset class="ContactInfo">
			<legend>Contact Information</legend>
			<table class="form">
				<tr>
					<th>Phone</th>
					<td><?=Form::input('phone', @$post['phone'], array('maxlength' => 25))?></td>
				</tr>
				<tr>
					<th>Mobile</th>
					<td><?=Form::input('mobile', @$post['mobile'], array('maxlength' => 25))?></td>
				</tr>
				<tr>
					<th>Fax</th>
					<td><?=Form::input('fax', @$post['fax'], array('maxlength' => 25))?></td>
				</tr>
				<tr>
					<th>Email</th>
					<td><?=Form::input('email', @$post['email'], array('maxlength' => 100))?></td>
				</tr>
				<tr>
					<th>Website</th>
					<td><?=Form::input('website', @$post['website'])?></td>
				</tr>
			</table>
		</fieldset>
		
		<div class="clear-both"></div>
		
	</div><!--#MidPanel-->
	
	<div id="BottomBar">
		<div class="left-panel">
			<?=Form::submit(NULL, 'Save', array('class' => 'ok'))?>
			<?=Form::button(NULL, 'Cancel', array('id' => 'CancelBtn', 'class' => 'cancel'))?>
		</div>
		
		<div class="right-panel">
		</div>
	</div><!--#BottomBar-->
	
	<?=Form::close()?>
	
	<?php include Kohana::find_file('views', 'templates/default/footer'); ?>
</body>

</html>
