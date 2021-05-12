$(document).ready(function() {

	if($(window).scrollTop() > 100) {
		$('#photo_1').css('background-attachment','scroll')
					.css('background-position', ' 50% 0px');
	}
	if($(window).scrollTop() < 100) {
		$('#photo_1').css('background-attachment','fixed')
					.css('background-position', ' 50% ' + (372-($(window).scrollTop()/2))+'px');
	}
});

$(window).on('scroll', function() {

	if($(window).scrollTop() > 100) {
		$('#photo_1').css('background-attachment','scroll')
					.css('background-position', ' 50% 0px');
	}
	if($(window).scrollTop() < 100) {
		$('#photo_1').css('background-attachment','fixed')
					.css('background-position', ' 50% ' + (372-($(window).scrollTop()/2))+'px');
	}

});