<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
	"http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">

<head>
	<title><?=APP_NAME?> &bull; Dashboard</title>
	<?php include Kohana::find_file('views', 'templates/default/meta'); ?>
	<link type="text/css" rel="stylesheet" href="<?=Skin::css('dashboard/index')?>" />
</head>

<body>
	<?php include Kohana::find_file('views', 'templates/default/header'); ?>
	
	<div id="TopBar">
		<div class="left-panel">
			<h1>Dashboard</h1>
		</div>
	</div><!--#TopBar-->
	
	<div id="MidPanel" class="has-top">
		<div class="section">
			<h2>Overdue Invoices</h2>
			<table class="table highlight full-width">
				<tr>
					<th>Invoice #</th>
					<th>Date</th>
					<th>Client</th>
					<th class="align-right"><small>FX</small> Amount</th>
					<th class="align-right"><small>FX</small> Rate</th>
					<th class="align-right"><small>IDR</small> Amount</th>
					<th class="align-right">Balance</th>
					<th>Status</th>
				</tr>
				<tr>
					<td>14123049</td>
					<td>5 Jul 2014</td>
					<td>Mr Bean</td>
					<td class="align-right">100 USD</td>
					<td class="align-right">1,200,000 IDR</td>
					<td class="align-right">12,000 <small>IDR/USD</small></td>
					<td class="align-right">0</td>
					<td><span class="status">Paid</span></td>
				</tr>
				<tr>
					<td>14123049</td>
					<td>5 Jul 2014</td>
					<td>Mr Bean</td>
					<td class="align-right">100 USD</td>
					<td class="align-right">1,200,000 IDR</td>
					<td class="align-right">12,000 <small>IDR/USD</small></td>
					<td class="align-right">0</td>
					<td><span class="status">Paid</span></td>
				</tr>
				<tr>
					<td>14123049</td>
					<td>5 Jul 2014</td>
					<td>Mr Bean</td>
					<td class="align-right">100 USD</td>
					<td class="align-right">1,200,000 IDR</td>
					<td class="align-right">12,000 <small>IDR/USD</small></td>
					<td class="align-right">0</td>
					<td><span class="status">Paid</span></td>
				</tr>
				<tr>
					<td>14123049</td>
					<td>5 Jul 2014</td>
					<td>Mr Bean</td>
					<td class="align-right">100 USD</td>
					<td class="align-right">1,200,000 IDR</td>
					<td class="align-right">12,000 <small>IDR/USD</small></td>
					<td class="align-right">0</td>
					<td><span class="status">Paid</span></td>
				</tr>
				<tr>
					<td>14123049</td>
					<td>5 Jul 2014</td>
					<td>Mr Bean</td>
					<td class="align-right">100 USD</td>
					<td class="align-right">1,200,000 IDR</td>
					<td class="align-right">12,000 <small>IDR/USD</small></td>
					<td class="align-right">0</td>
					<td><span class="status">Paid</span></td>
				</tr>
				<tr>
					<th colspan="8" class="align-center"><a href="#">View all</a></th>
				</tr>
			</table>
		</div>
		
		<div class="section">
			<h2>Pending Payments</h2>
			<table class="table highlight full-width">
				<tr>
					<th>Invoice #</th>
					<th>Date</th>
					<th>Client</th>
					<th class="align-right">Amount (FX)</th>
					<th class="align-right">Amount</th>
					<th class="align-right">Exchange Rate</th>
					<th class="align-right">Balance</th>
					<th>Status</th>
				</tr>
				<tr>
					<td>14123049</td>
					<td>5 Jul 2014</td>
					<td>Mr Bean</td>
					<td class="align-right">100 USD</td>
					<td class="align-right">1,200,000 IDR</td>
					<td class="align-right">12,000 <small>IDR/USD</small></td>
					<td class="align-right">0</td>
					<td><span class="status">Paid</span></td>
				</tr>
				<tr>
					<td>14123049</td>
					<td>5 Jul 2014</td>
					<td>Mr Bean</td>
					<td class="align-right">100 USD</td>
					<td class="align-right">1,200,000 IDR</td>
					<td class="align-right">12,000 <small>IDR/USD</small></td>
					<td class="align-right">0</td>
					<td><span class="status">Paid</span></td>
				</tr>
				<tr>
					<td>14123049</td>
					<td>5 Jul 2014</td>
					<td>Mr Bean</td>
					<td class="align-right">100 USD</td>
					<td class="align-right">1,200,000 IDR</td>
					<td class="align-right">12,000 <small>IDR/USD</small></td>
					<td class="align-right">0</td>
					<td><span class="status">Paid</span></td>
				</tr>
				<tr>
					<td>14123049</td>
					<td>5 Jul 2014</td>
					<td>Mr Bean</td>
					<td class="align-right">100 USD</td>
					<td class="align-right">1,200,000 IDR</td>
					<td class="align-right">12,000 <small>IDR/USD</small></td>
					<td class="align-right">0</td>
					<td><span class="status">Paid</span></td>
				</tr>
				<tr>
					<td>14123049</td>
					<td>5 Jul 2014</td>
					<td>Mr Bean</td>
					<td class="align-right">100 USD</td>
					<td class="align-right">1,200,000 IDR</td>
					<td class="align-right">12,000 <small>IDR/USD</small></td>
					<td class="align-right">0</td>
					<td><span class="status">Paid</span></td>
				</tr>
				<tr>
					<th colspan="8" class="align-center"><a href="#">View all</a></th>
				</tr>
			</table>
		</div>
		
		<div class="section">
			<h2>Recent Invoices</h2>
			<table class="table highlight full-width">
				<tr>
					<th>Invoice #</th>
					<th>Date</th>
					<th>Client</th>
					<th class="align-right">Amount (FX)</th>
					<th class="align-right">Amount</th>
					<th class="align-right">Exchange Rate</th>
					<th class="align-right">Balance</th>
					<th>Status</th>
				</tr>
				<tr>
					<td>14123049</td>
					<td>5 Jul 2014</td>
					<td>Mr Bean</td>
					<td class="align-right">100 USD</td>
					<td class="align-right">1,200,000 IDR</td>
					<td class="align-right">12,000 <small>IDR/USD</small></td>
					<td class="align-right">0</td>
					<td><span class="status">Paid</span></td>
				</tr>
				<tr>
					<td>14123049</td>
					<td>5 Jul 2014</td>
					<td>Mr Bean</td>
					<td class="align-right">100 USD</td>
					<td class="align-right">1,200,000 IDR</td>
					<td class="align-right">12,000 <small>IDR/USD</small></td>
					<td class="align-right">0</td>
					<td><span class="status">Paid</span></td>
				</tr>
				<tr>
					<td>14123049</td>
					<td>5 Jul 2014</td>
					<td>Mr Bean</td>
					<td class="align-right">100 USD</td>
					<td class="align-right">1,200,000 IDR</td>
					<td class="align-right">12,000 <small>IDR/USD</small></td>
					<td class="align-right">0</td>
					<td><span class="status">Paid</span></td>
				</tr>
				<tr>
					<td>14123049</td>
					<td>5 Jul 2014</td>
					<td>Mr Bean</td>
					<td class="align-right">100 USD</td>
					<td class="align-right">1,200,000 IDR</td>
					<td class="align-right">12,000 <small>IDR/USD</small></td>
					<td class="align-right">0</td>
					<td><span class="status">Paid</span></td>
				</tr>
				<tr>
					<td>14123049</td>
					<td>5 Jul 2014</td>
					<td>Mr Bean</td>
					<td class="align-right">100 USD</td>
					<td class="align-right">1,200,000 IDR</td>
					<td class="align-right">12,000 <small>IDR/USD</small></td>
					<td class="align-right">0</td>
					<td><span class="status">Paid</span></td>
				</tr>
				<tr>
					<th colspan="8" class="align-center"><a href="#">View all</a></th>
				</tr>
			</table>
		</div>
		
		<div class="section">
			<h2>Recent Quotes</h2>
			<table class="table highlight full-width">
				<tr>
					<th>Invoice #</th>
					<th>Date</th>
					<th>Client</th>
					<th class="align-right">Amount (FX)</th>
					<th class="align-right">Amount</th>
					<th class="align-right">Exchange Rate</th>
					<th class="align-right">Balance</th>
					<th>Status</th>
				</tr>
				<tr>
					<td>14123049</td>
					<td>5 Jul 2014</td>
					<td>Mr Bean</td>
					<td class="align-right">100 USD</td>
					<td class="align-right">1,200,000 IDR</td>
					<td class="align-right">12,000 <small>IDR/USD</small></td>
					<td class="align-right">0</td>
					<td><span class="status">Paid</span></td>
				</tr>
				<tr>
					<td>14123049</td>
					<td>5 Jul 2014</td>
					<td>Mr Bean</td>
					<td class="align-right">100 USD</td>
					<td class="align-right">1,200,000 IDR</td>
					<td class="align-right">12,000 <small>IDR/USD</small></td>
					<td class="align-right">0</td>
					<td><span class="status">Paid</span></td>
				</tr>
				<tr>
					<td>14123049</td>
					<td>5 Jul 2014</td>
					<td>Mr Bean</td>
					<td class="align-right">100 USD</td>
					<td class="align-right">1,200,000 IDR</td>
					<td class="align-right">12,000 <small>IDR/USD</small></td>
					<td class="align-right">0</td>
					<td><span class="status">Paid</span></td>
				</tr>
				<tr>
					<td>14123049</td>
					<td>5 Jul 2014</td>
					<td>Mr Bean</td>
					<td class="align-right">100 USD</td>
					<td class="align-right">1,200,000 IDR</td>
					<td class="align-right">12,000 <small>IDR/USD</small></td>
					<td class="align-right">0</td>
					<td><span class="status">Paid</span></td>
				</tr>
				<tr>
					<td>14123049</td>
					<td>5 Jul 2014</td>
					<td>Mr Bean</td>
					<td class="align-right">100 USD</td>
					<td class="align-right">1,200,000 IDR</td>
					<td class="align-right">12,000 <small>IDR/USD</small></td>
					<td class="align-right">0</td>
					<td><span class="status">Paid</span></td>
				</tr>
				<tr>
					<th colspan="8" class="align-center"><a href="#">View all</a></th>
				</tr>
			</table>
		</div>
	</div><!--#MidPanel-->
	
	<?php include Kohana::find_file('views', 'templates/default/footer'); ?>
</body>

</html>
