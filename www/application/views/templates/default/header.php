<?php
/**
 * Header part of the Default template.
 * This file comes as a pair with footer.php.
 */
?>
<?php include Kohana::find_file('views', 'templates/base/header'); ?>

<div id="NavBar">
	<div class="left-side">
		<ul class="menu">
			<li class="<?= @$menu == 'dashboard' ? 'selected' : '' ?>"><a href="<?=URL::site('dashboard')?>">Dashboard</a></li>
			<li class="<?= @$menu == 'client' ? 'selected' : '' ?>">
				<a>Clients</a>
				<ul>
					<li><a href="<?=URL::site('client')?>">Client List</a></li>
					<li><a href="<?=URL::site('client/add')?>">Add Client</a></li>
				</ul>
			</li>
			<li class="<?= @$menu == 'quote' ? 'selected' : '' ?>">
				<a>Quotes</a>
				<ul>
					<li><a href="#">Quote List</a></li>
					<li><a href="#">Create Quote</a></li>
				</ul>
			</li>
			<li class="<?= @$menu == 'invoice' ? 'selected' : '' ?>">
				<a>Invoices</a>
				<ul>
					<li><a href="#">Invoice List</a></li>
					<li><a href="#">Create Invoice</a></li>
					<li class="separator"></li>
					<li><a href="#">Recurring Invoices</a></li>
				</ul>
			</li>
			<li class="<?= @$menu == 'payment' ? 'selected' : '' ?>">
				<a>Payments</a>
				<ul>
					<li><a href="#">Payment List</a></li>
					<li><a href="#">Create Payment</a></li>
					<li class="separator"></li>
					<li><a href="#">Pending Payments</a></li>
				</ul>
			</li>
			<li class="<?= @$menu == 'report' ? 'selected' : '' ?>">
				<a href="">Reports</a>
				<ul>
					<li><a href="#">Payment History</a></li>
					<li><a href="#">Sales by Client</a></li>
				</ul>
			</li>
		</ul><!--.menu-->
	</div><!--.left-side-->
	
	<div class="right-side">
		<ul class="menu">
			<li><a href="<?=URL::site('user/profile')?>">Mr Bean</a></li>
			<li class="<?= @$menu == 'admin' ? 'selected' : '' ?>">
				<a title="Administration" class="icon admin">Administration</a>
				<ul>
					<li><a href="<?=URL::site('company/profile')?>">Company Profile</a></li>
					<li><a href="#">Item Catalog</a></li>
					<li><a href="#">Tax Rates</a></li>
					<li><a href="#">Payment Methods</a></li>
					<li><a href="#">Invoice Groups</a></li>
					<li class="separator"></li>
					<li><a href="#">Email Templates</a></li>
					<li><a href="#">Invoice Templates</a></li>
					<li class="separator"></li>
					<li><a href="#">User Accounts</a></li>
					<li><a href="#">System Settings</a></li>
				</ul>
			</li>
			<li><a href="<?=URL::site('docs')?>" title="Documentation" class="icon help" target="_blank">Documentation</a></li>
			<li><a href="<?=URL::site('session/logout')?>" title="Logout" class="icon logout">Logout</a></li>
		</ul><!--.menu-->
	</div><!--.right-side-->
</div><!--#NavBar-->

<div id="Main">
	<div class="wrapper">
