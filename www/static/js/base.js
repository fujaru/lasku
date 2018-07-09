/**
 * Base Javascripts for all pages
 * 
 * This script requires jQuery 2.*
 * 
 * @author Fajar Chandra
 * @since  0.1.0
 */
 
var Base = {};

$(function() {
	/* Event Bindings */
	$('#FlashMessage > .wrapper').click(Base.FlashMessage_onClick);
	$(window).load(Base.Window_onLoad);
});

Base.Window_onLoad = function() {
	/* Hide flash message */
	setTimeout(function() {
		$('#FlashMessage').removeClass('show');
	}, 5000);
};

Base.FlashMessage_onClick = function() {
	$('#FlashMessage').removeClass('show');
};
