<noscript>
	<div class="ScreenModalDialog"><div class="wrapper"><div class="inner-wrapper">
		<h1>Have a cup of coffee.</h1>
		<p>
			We're sorry, but JavaScript is required to run this application correctly.
			Please enable JavaScript on your web browser first and try again.
		</p>
	</div></div></div>
</noscript>

<!--[if lte IE 7]>
	<div class="ScreenModalDialog"><div class="wrapper"><div class="inner-wrapper">
		<h1>Using a (modern) web browser won't hurt you.</h1>
		<p>
			We're sorry, but your version of Internet Explorer is not supported. 
			Please upgrade your Internet Explorer or try another modern web 
			browser.
		</p>
	</div></div></div>
<![endif]-->

<div id="NavBar">
	<div class="left-side">
		<ul class="menu">
			<li class="<?= @$step == 'welcome' ? 'selected' : '' ?>"><span>Welcome</span></li>
			<li class="<?= @$step == 'test' ? 'selected' : '' ?>"><span>Configuration</span></li>
			<li class="<?= @$step == 'install' ? 'selected' : '' ?>"><span>Install/Upgrade</span></li>
			<li class="<?= @$step == 'finish' ? 'selected' : '' ?>"><span>Finish</span></li>
		</ul><!--.menu-->
	</div><!--.left-side-->
</div><!--#NavBar-->

<div id="Main">
	<div class="wrapper">
