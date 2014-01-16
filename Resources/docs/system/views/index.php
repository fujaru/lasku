<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
	"http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">

<head>
	<title>Lasku Documentation</title>
	<meta http-equiv="content-type" content="text/html;charset=utf-8" />
	<link type="text/css" rel="stylesheet" href="<?=BASEURL?>static/css/style.css" />
</head>

<body>
	<noscript class="modal"><div class="wrapper"><div class="inner-wrapper">
		<h1>Take a break.</h1>
		<p>
			We're sorry, but JavaScript is required to run this application correctly.
			Please enable JavaScript on your web browser first and try again.
		</p>
	</div></div></noscript>

	<div id="NavBar">
		<div class="left-side">
			<ul class="menu">
				<li class=""><span>Lasku <?=VERSION?> Documentation</span></li>
			</ul><!--.menu-->
		</div><!--.left-side-->
	</div><!--#NavBar-->

	<div id="Main">
		<div class="wrapper">
			<div id="Sidebar">
				<?=$menu_content?>
			</div><!--#Sidebar-->
			<div id="MainContent">
<!--
				<div id="PathInfo"><?=$path_info?></div>
-->
				<?=$page_content?>
				
				<div class="copyright">&copy; 2014 Fajar Chandra</div>
			</div><!--#MainContent-->
		</div>
		<div id="MainGradientT"></div>
		<div id="MainGradientB"></div>
	</div><!--#Main-->


</body>

</html>
