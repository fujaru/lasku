<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
	"http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">

<head>
	<?php include INSTPATH.'views/templates/meta'.EXT; ?>
	<style type="text/css">
		@keyframes break-show {
			0% {
				height: 200%;
				overflow: hidden;
			}
			
			50% {
				height: 90%;
			}
			
			100% {
				height: 100%;
				overflow: auto;
			}
		}
		
		#Main {
			top: 0;
			margin: 20px;
		}
		
		#Main .wrapper {
			overflow: hidden;
		}

		#CenterPanel {
			display: table;
			height: 100%;
			width: 100%;
			max-width: 400px;
			margin: auto;
			animation-name: break-show;
			animation-duration: 1s;
			-moz-animation-name: break-show;
			-moz-animation-duration: 1s;
		}
		#CenterPanel .wrapper {
			display: table-cell;
			vertical-align: middle;
			text-align: center;
		}
		small {
			color: #aaa;
		}
		p.note {
			font-size: 0.9em;
			color: #888;
		}
	</style>
</head>

<body>
	<?php include INSTPATH.'views/templates/header-plain'.EXT; ?>
	
	<div id="CenterPanel"><div class="wrapper">
		<h1>Take a Break</h1>
		<p>
			The website you're viewing is currently under maintenance. 
			We apologize for any inconvenience caused.<br />
			Please come again later!
		</p>
		
		<p class="note">
			<b>Note for Administrators:</b>
			The installer script disables application access. You'll 
			need disable it first once maintenance is done.
			Please consult user documentation for details.
		</p>
		
		<p><small>&copy; 2014 Fajar Chandra.</small></p>
	</div></div><!--#CenterPanel-->
	
	<?php include INSTPATH.'views/templates/footer'.EXT; ?>
</body>

</html>
