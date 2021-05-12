$(document).ready(function () {

	$('.portfolio_block').on('mouseover',function(event) {
		$('.photo_shadow').stop()
						.animate({opacity: 1},600);
		$(this).find('.photo_shadow').stop();
		$(this).find('.photo_shadow').animate({opacity: 0},400);
	});

	$('.portfolio_block').mouseout(function() {
		$('.photo_shadow').stop()
						.animate({opacity: 0},600);
	});
});
