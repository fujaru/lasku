<?php
/**
 * Header part of the base template.
 * This file comes as a pair with footer.php.
 */
$browser_names = array(
	'Mozilla Firefox', 
	'Google Chrome',
	'Safari', 
);

$flash = Lasku::flash();
if($flash != NULL) {
	$flash_class = 'info';
	if(($flash['flags'] & Lasku::FLASH_INFO) == Lasku::FLASH_INFO)
		$flash_class = 'info';
	if(($flash['flags'] & Lasku::FLASH_WARNING) == Lasku::FLASH_WARNING)
		$flash_class = 'warning';
	if(($flash['flags'] & Lasku::FLASH_ERROR) == Lasku::FLASH_ERROR)
		$flash_class = 'error';
}
?>
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
			browser. How about <?=$browser_names[rand(0, count($browser_names)-1)]?>?
		</p>
	</div></div></div>
<![endif]-->

<?php if($flash != NULL) : ?>
	<div id="FlashMessage" class="<?=$flash_class?> show"><div class="wrapper">
		<?=$flash['message']?>
	</div></div><!--#FlashMessage-->
<?php endif; ?>
