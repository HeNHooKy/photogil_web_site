$(document).ready(function () {

$('.review_content').css('display','inline-block')
					.hide();


var length = $('#review_block').attr('data-number')-1;			
var number = 0;

$('[number = '+number+']').show();

$('#block_next').on('click', function() {
	
	$('[number = '+number+']').hide();
	number++;
	if(number > length) number = 0;
	$('[number = '+number+']').stop()
							.animate({opacity: 'show'},600);

});

$('#block_prev').on('click', function() {
	
	$('[number = '+number+']').hide();
	number--;
	if(number < 0) number = length;
	$('[number = '+number+']').stop()
							.animate({opacity: 'show'},600);


});

})
