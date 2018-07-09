<?php $menu = 'admin'; ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
	"http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">

<head>
	<title><?=APP_NAME?> &bull; Company Profile</title>
	<?php include Kohana::find_file('views', 'templates/default/meta'); ?>
	<link type="text/css" rel="stylesheet" href="<?=Skin::css('company/profile')?>" />
	<script type="text/javascript">
		$(function() {
			$('#EditBtn').click(function() {
				location.href = "<?=URL::site("company/edit/{$id}")?>";
			});
		});
	</script>
</head>

<body>
	<?php include Kohana::find_file('views', 'templates/default/header'); ?>
	
	<div id="TopBar">
		<div class="left-panel">
			<h1>Company Profile</h1>
		</div>
		
		<div class="right-panel">
			<?=Form::button(NULL, 'Edit Company', array('id' => 'EditBtn'))?>
		</div>
	</div><!--#TopBar-->
	
	<div id="MidPanel" class="has-top">
		<div class="section">
			<h2><?=$company_data['name']?></h2>
			
			<div class="label">Address</div>
			<div class="value">
				<?=$company_data['address1'] != '' ? $company_data['address1']."<br />" : ''?>
				<?=$company_data['address2'] != '' ? $company_data['address2']."<br />" : ''?>
				<?=$company_data['city'] != '' OR $company_data['zip'] != '' ? "{$company_data['city']} {$company_data['zip']}<br />" : ''?>
				<?=$company_data['state'] != '' ? $company_data['state']."<br />" : ''?>
				<?=$company_data['country'] != '' ? $company_data['country']."<br />" : ''?>
			</div>
			
			<?php if($company_data['phone'] != '') : ?>
				<div class="label">Phone</div>
				<div class="value"><?=$company_data['phone']?></div>
			<?php endif; ?>
			
			<?php if($company_data['mobile'] != '') : ?>
				<div class="label">Mobile</div>
				<div class="value"><?=$company_data['mobile']?></div>
			<?php endif; ?>
			
			<?php if($company_data['fax'] != '') : ?>
				<div class="label">Fax</div>
				<div class="value"><?=$company_data['fax']?></div>
			<?php endif; ?>
			
			<?php if($company_data['email'] != '') : ?>
				<div class="label">Email</div>
				<div class="value"><a href="mailto:<?=$company_data['email']?>"><?=$company_data['email']?></a></div>
			<?php endif; ?>
			
			<?php if($company_data['website'] != '') : ?>
				<div class="label">Website</div>
				<div class="value"><a href="<?=$company_data['website']?>"><?=$company_data['website']?></a></div>
			<?php endif; ?>
		</div>
	</div><!--#MidPanel-->
	
	<?php include Kohana::find_file('views', 'templates/default/footer'); ?>
</body>

</html>
