<?php $menu = 'client'; ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
	"http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">

<head>
	<title><?=APP_NAME?> &bull; Client List</title>
	<?php include Kohana::find_file('views', 'templates/default/meta'); ?>
	<link type="text/css" rel="stylesheet" href="<?=Skin::css('client/list')?>" />
	<script type="text/javascript">
		Page = {};
		Page.add_url = "<?=URL::site('client/add')?>";
		Page.edit_url = "<?=URL::site('client/edit/{ID}')?>";
		Page.delete_url = "<?=URL::site('client/delete/{ID}')?>";
		Page.client_data = <?=json_encode($client_details)?>;
	</script>
	<script type="text/javascript" src="<?=URL::base()?>static/js/client/list.js"></script>
</head>

<body>
	<?php include Kohana::find_file('views', 'templates/default/header'); ?>
	
	<div id="TopBar">
		<div class="left-panel">
			<h1>Client List</h1>
		</div>
		
		<div class="right-panel">
			<div class="filter-buttons">
				<?=Form::button(NULL, 'Active')?>
				<?=Form::button(NULL, 'Inactive')?>
				<?=Form::button(NULL, 'All')?>
			</div>
			<?=Form::button(NULL, 'Add Client', array('id' => 'AddBtn', 'class' => 'ok'))?>
			<form id="SearchForm">
				<?php // remove whitespace between fields
					echo Form::input('search', '', array('placeholder' => 'Search...'));
					echo Form::submit(NULL, 'Search', array('title' => 'Search'));
				?>
			</form>
		</div>
	</div><!--#TopBar-->
	
	<div id="MidPanel" class="has-top">
		<div id="ClientDetails">
			<div class="Heading">
				<h2>CLIENT NAME</h2>
				
				<div class="button-list">
					<?=Form::button(NULL, '&times;', array('id' => 'DetailsCloseBtn', 'title' => 'Close'))?>
				</div>
			</div>
			
			<div class="Links">
				<div class="button-list">
					<?=Form::button(NULL, 'Quotes')?>
					<?=Form::button(NULL, 'Invoices')?>
					<?=Form::button(NULL, 'Edit', array('id' => 'EditBtn'))?>
					<?=Form::button(NULL, 'Delete', array('id' => 'DeleteBtn', 'class' => 'delete', 'adisabled' => 'disabled'))?>
				</div>
				<div class="status StatusLabel">
					<span class="status">STATUS</span>
				</div>
			</div>
			
			<div class="Content">
			</div><!--.Content-->
		</div><!--#ClientDetails-->
		
		<div id="ClientList" class="section">
			<table id="ClientTable" class="table highlight full-width">
				<tr>
					<th>Client Name</th>
					<th>Email</th>
					<th>Phone</th>
					<th class="align-right"><small>IDR</small> Balance</th>
					<th>Status</th>
				</tr>
				<?php foreach($client_data as $item) : ?>
				<tr data-id="<?=$item['id']?>">
					<td><?=$item['name']?></td>
					<td><?=$item['email']?></td>
					<td><?=$item['phone']?></td>
					<td class="align-right">0</td>
					<td><span class="status <?=$item['is_active'] ? 'active' : 'inactive'?>"><?=$item['is_active'] ? 'Active' : 'Inactive'?></span></td>
				</tr>
				<?php endforeach; ?>
			</table>
		</div>
	</div><!--#MidPanel-->
	
	<?php include Kohana::find_file('views', 'templates/default/footer'); ?>
</body>

</html>
